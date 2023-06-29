<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Vacancy!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.vacancies.index', [
            'vacancies' => Vacancy::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'company' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'requirements' => 'required',
            'job_type' => 'required',
            'status' => 'required'
        ]);

        Vacancy::create($attributes);

        return redirect()->route('vacancies.index')->with('success', 'Vacancy was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $attributes = $request->validate([
            'company' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'requirements' => 'required',
            'job_type' => 'required',
            'status' => 'required'
        ]);

        $vacancy->update($attributes);

        return redirect()->route('vacancies.index')->with('success', 'Vacancy was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index')->with('success', 'Vacancy was deleted');
    }
}
