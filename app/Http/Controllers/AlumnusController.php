<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use App\Models\Departement;
use App\Models\Job;
use App\Models\Liaison;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Alumnus!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $alumni = Alumnus::with('departement', 'study', 'job')->get();
        return view('admin.alumnus.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alumnus.create', [
            'departements' => Departement::all(),
            'studies' => Study::all(),
            'jobs' => Job::all(),
            'liaisons' => Liaison::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:alumni|max:10',
            'gender' => 'required',
            'gpa' => 'required|numeric|max:4',
            'email' => 'required|unique:alumni|email',
            'departement_id' => 'required',
            'study_id' => 'required',
            'job_id' => 'required',
            'company' => 'nullable',
            'title_of_final_task' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'liaison_id' => 'required'
        ], $message = [
            'departement_id.required' => 'The departement field is required.',
            'study_id.required' => 'The study field is required.',
            'job_id.required' => 'The job field is required.',
            'liaison_id.required' => 'The class field is required.',
        ]);

        $image = $request->file('photo');
        $image->storeAs('public/alumni', $image->hashName());

        Alumnus::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'gpa' => $request->gpa,
            'email' => $request->email,
            'departement_id' => $request->departement_id,
            'study_id' => $request->study_id,
            'job_id' => $request->job_id,
            'company' => $request->company,
            'title_of_final_task' => $request->title_of_final_task,
            'photo' => $image->hashName(),
            'liaison_id' => $request->liaison_id
        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumnus was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumnus $alumnus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumnus $alumnus)
    {
        $departements = Departement::all();
        $studies = Study::all();
        $jobs = Job::all();
        $liaisons = Liaison::all();
        return view('admin.alumnus.edit', compact('studies', 'alumnus', 'departements', 'jobs', 'liaisons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumnus $alumnus)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:alumni,nim,' . $alumnus->id,
            'gender' => 'required',
            'gpa' => 'required|numeric',
            'email' => 'email|required|unique:alumni,email,' . $alumnus->id,
            'departement_id' => 'required',
            'study_id' => 'required',
            'job_id' => 'required',
            'company' => 'nullable',
            'title_of_final_task' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'liaison_id' => 'required'
        ], $message = [
            'departement_id.required' => 'The departement field is required.',
            'study_id.required' => 'The study field is required.',
            'job_id.required' => 'The job field is required.',
            'liaison_id.required' => 'The class field is required.',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->storeAs('public/alumni', $image->hashName());
            Storage::delete('public/alumni/' . $alumnus->photo);
            $alumnus->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'gender' => $request->gender,
                'gpa' => $request->gpa,
                'email' => $request->email,
                'departement_id' => $request->departement_id,
                'study_id' => $request->study_id,
                'job_id' => $request->job_id,
                'company' => $request->company,
                'title_of_final_task' => $request->title_of_final_task,
                'liaison_id' => $request->liaison_id,
                'photo' => $image->hashName(),
            ]);
        } else {
            $alumnus->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'gender' => $request->gender,
                'gpa' => $request->gpa,
                'email' => $request->email,
                'departement_id' => $request->departement_id,
                'study_id' => $request->study_id,
                'job_id' => $request->job_id,
                'company' => $request->company,
                'liaison_id' => $request->liaison_id,
                'title_of_final_task' => $request->title_of_final_task,
            ]);
        }
        return redirect()->route('alumni.index')->with('success', 'Alumnus was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumnus $alumnus)
    {
        Storage::delete('public/alumni/' . $alumnus->photo);
        $alumnus->delete();
        return redirect()->route('alumni.index')->with('success', 'Alumnus was deleted!');
    }
}
