<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Study!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.studies.index', [
            'studies' => Study::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.studies.create', [
            'departements' => Departement::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'              => 'required|unique:studies',
            'departement_id'    => 'required'
        ], $meesage = [
            'departement_id.required' => 'The departement field is required.'
        ]);

        Study::create($attributes);

        return redirect()->route('studies.index')->with('success', 'Study was created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Study $study)
    {
        $departements = Departement::all();
        return view('admin.studies.edit', compact('study', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Study $study)
    {
        $attributes = $request->validate([
            'name'              => 'required|unique:studies,name,' . $study->id,
            'departement_id'    => 'required'
        ]);

        $study->update($attributes);
        return redirect()->route('studies.index')->with('success', 'Study was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Study $study)
    {
        $study->loadCount('alumnus');
        if ($study->alumnus_count > 0) {
            return redirect()->route('studies.index')->with('error', 'Failed to delete study!');
        } else {
            $study->delete();
            return redirect()->route('studies.index')->with('success', 'Study deleted');
        }
    }
}
