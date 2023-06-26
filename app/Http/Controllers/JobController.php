<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Job!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.jobs.index', [
            'jobs' => Job::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'type_of_job' => 'required|unique:jobs'
        ]);

        Job::create($attributes);

        return redirect()->route('jobs.index')->with('success', 'Job was created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $attributes = $request->validate([
            'type_of_job' => 'required|unique:jobs,type_of_job,' . $job->id
        ]);

        $job->update($attributes);

        return redirect()->route('jobs.index')->with('success', 'Job was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->loadCount('alumnus');
        if ($job->alumnus_count > 0){
            return redirect()->route('jobs.index')->with('error', 'Failed to delete job!');
        } else {
            $job->delete();
            return redirect()->route('jobs.index')->with('success', 'Job was deleted');
        }
    }
}
