<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Vacancy!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        return view('frontend.company', [
            'user' => User::where('id', Auth::id())->first()
        ]);
    }

    public function changeProfile(Request $request, User $user)
    {

        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users,email,' . $user->id,
        ]);

        if ($request->password == null) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        } else {
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
            ]);
        }

        Vacancy::where('user_id', Auth::id())->update([
            'company_name' => $request->name,
            'email' => $request->email
        ]);


        return redirect()->back()->with('success', 'Your company profile successfully updated!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.create-vacancy');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'salary' => 'required|numeric',
            'requirements' => 'required',
            'job_type' => 'required',
        ]);

        Vacancy::create([
            'user_id' => Auth::id(),
            'company_name' => Auth::user()->name,
            'position' => $request->position,
            'salary' => $request->salary,
            'requirements' => $request->requirements,
            'job_type' => $request->job_type,
            'email' => Auth::user()->email,
        ]);

        return redirect()->route('company.vacancies')->with('success', 'Your job vacancy was successfully requested!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Vacancy::findOrFail($id);
        $vacancy = $company;
        $this->authorize('update', $vacancy);
        return view('frontend.edit-vacancy', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'position' => 'required',
            'salary' => 'required|numeric',
            'requirements' => 'required',
            'job_type' => 'required',
        ]);

        $company = Vacancy::findOrFail($id);

        $company->update([
            'company_name' => Auth::user()->name,
            'position' => $request->position,
            'salary' => $request->salary,
            'requirements' => $request->requirements,
            'job_type' => $request->job_type,
            'email' => Auth::user()->email,
            'status' => 0
        ]);

        return redirect()->route('company.vacancies')->with('success', 'Your job vacancy was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Vacancy::findOrFail($id);
        $company->delete();
        return redirect()->route('company.vacancies')->with('success', 'Your job vacancy was successfully deleted!');
    }

    public function download($cv)
    {
        return Storage::disk('local')->download('public/cv/' . $cv);
    }
}
