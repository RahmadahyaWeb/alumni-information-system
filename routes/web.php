<?php

use App\Http\Controllers\AlumnusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LiaisonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserController;
use App\Models\Alumnus;
use App\Models\Departement;
use App\Models\Liaison;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.app');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // route dashboard
    Route::get('/dashboard', function () {
        $departements = Departement::with('study')->withCount([
            'alumnus',
            'study',
            'alumnus as female' => function (Builder $query) {
                $query->where('gender', 'female');
            },
            'alumnus as male' => function (Builder $query) {
                $query->where('gender', 'male');
            },
        ])->get();

        $gpas_departement = DB::table('departements')
            ->join('alumni', 'alumni.departement_id', '=', 'departements.id')
            ->select(DB::raw('max(gpa) as max_gpa, departements.name as name, avg(gpa) as avg_gpa'))
            ->groupBy('departements.name')
            ->get();

        return view('admin.dashboard', [
            'alumni' => Alumnus::with('study', 'departement', 'job', 'liaison')->get(),
            'departements' => $departements,
            'liaisons' => Liaison::get(),
            'gpas_departement' => $gpas_departement

        ]);
    });
    // route liaisons
    Route::resource('/liaisons', LiaisonController::class);
    // route departements
    Route::resource('/departements', DepartementController::class);
    // route studies
    Route::resource('/studies', StudyController::class);
    // route studies
    Route::resource('/jobs', JobController::class);
    // route alumni
    Route::resource('/alumni', AlumnusController::class);
    // dropdown dependency
    Route::get('getStudy/{id}', function ($id) {
        $study = App\Models\Study::where('departement_id', $id)->get();
        return response()->json($study);
    });
    // route events
    Route::resource('/events', EventController::class);
    // route categories
    Route::resource('/categories', CategoryController::class);
    // route users
    Route::resource('/users', UserController::class);
});

Route::middleware(['auth'])->group(function () {
    // route logout
    Route::get('/logout', LogoutController::class)->name('logout');
});


Route::middleware(['guest'])->group(function () {
    // route login
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
});
