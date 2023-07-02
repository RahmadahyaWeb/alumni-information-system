<?php

use App\Http\Controllers\AlumnusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LiaisonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestVacancyController;
use App\Http\Controllers\SiforumController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use App\Models\Alumnus;
use App\Models\Departement;
use App\Models\Event;
use App\Models\Liaison;
use App\Models\Post;
use App\Models\Study;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// route frontpage
Route::get('/', function () {
    $departements = Departement::with('study')->get();

    return view('frontend.frontpage', [
        'alumni' => Alumnus::with('study', 'departement', 'job', 'liaison')->get(),
        'departements' => $departements,
        'studies' => Study::with('departement')->get(),
    ]);
});

// route show event
Route::get('/event/{event:title}', function (Event $event) {
    $events = Event::latest()->limit(3)->get()->except($event->id);
    $total = DB::table('events')
        ->join('alumnus_event', 'alumnus_event.event_id', '=', 'events.id')
        ->where('events.id', '=', $event->id)
        ->count('alumnus_event.alumnus_id');
    return view('frontend.show-event', compact('event', 'events', 'total'));
})->name('event.detail');

// route show vacancy
Route::get('/vacancy/{vacancy:company_name}', function (Vacancy $vacancy) {
    $vacancies = Vacancy::latest()->limit(3)->get()->except($vacancy->id);
    return view('frontend.show-vacancy', compact('vacancy', 'vacancies'));
})->name('vacancy.detail');

// route create vacancy
Route::get('/create/vacancy', function () {
    return view('frontend.create-vacancy');
})->name('vacancy.create');

// route store vacancy
Route::post('/', RequestVacancyController::class)->name('vacancy.store');



// route admin only
Route::middleware(['admin'])->group(function () {
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

        $events = DB::table('events')
            ->join('alumnus_event', 'alumnus_event.event_id', '=', 'events.id')
            ->select('events.title', DB::raw('COUNT(*) as alumnus_count'))
            ->where('status', 1)
            ->groupBy('events.title')
            ->get();

        $posts = Post::with('user')->count();
        $vacancies = Vacancy::count();


        return view('admin.dashboard', [
            'alumni' => Alumnus::with('study', 'departement', 'job', 'liaison')->get(),
            'departements' => $departements,
            'liaisons' => Liaison::get(),
            'gpas_departement' => $gpas_departement,
            'events' => $events,
            'posts' => $posts,
            'vacancies' => $vacancies
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
    // route vacancies
    Route::resource('/vacancies', VacancyController::class);
    // route siforum
    Route::get('/forum', [SiforumController::class, 'index'])->name('forum.index');
    Route::get('/forum/{post}', [SiforumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{post}', [SiforumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/delete/{post}', [SiforumController::class, 'destroy'])->name('forum.destroy');
});

// route user
Route::middleware(['auth'])->group(function () {

    // route join event
    Route::get('/join/{id}', function ($id) {
        $event = Event::find($id);
        $event->alumnus()->attach(Auth::user()->alumnus->id);
        return back()->with('success', 'Successfully joined the event');
    })->name('join');

    // route unjoin event
    Route::get('/unjoin/{id}', function ($id) {
        $event = Event::find($id);
        $event->alumnus()->detach(Auth::user()->alumnus->id);
        return back()->with('success', 'See u soon!');
    })->name('unjoin');

    // route my event
    Route::get('/my-events', function () {
        $myEvents = DB::table('events')
            ->join('alumnus_event', 'alumnus_event.event_id', '=', 'events.id')
            ->where('alumnus_event.alumnus_id', '=', Auth::user()->alumnus->id)
            ->where('events.status', '=', '1')
            ->get();
        return view('frontend.my-events', compact('myEvents'));
    })->name('myevents');

    // route profile
    Route::get('/profile/{user:name}', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/{alumnus}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{alumnus}', [ProfileController::class, 'changePassword'])->name('profile.update');

    // route post
    Route::get('/siforum', [PostController::class, 'index'])->name('siforum.index');
    Route::post('/siforum', [PostController::class, 'store'])->name('siforum.store');
    Route::get('/siforum/{post:slug}', [PostController::class, 'show'])->name('siforum.show');
    Route::put('/siforum/{post}', [PostController::class, 'update'])->name('siforum.update');
    Route::delete('/siforum/delete/{post:id}', [PostController::class, 'destroy'])->name('siforum.destroy');

});

// route logout
Route::get('/logout', LogoutController::class)->name('logout')->middleware('auth');


Route::middleware(['guest'])->group(function () {
    // route login
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
});
