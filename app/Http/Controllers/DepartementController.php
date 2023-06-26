<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Departement!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.departements.index', [
            'departements' => Departement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:departements',
        ]);

        Departement::create($attributes);

        return redirect()->route('departements.index')->with('success', 'Departement was created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        return view('admin.departements.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:departements,name,' . $departement->id,
        ]);

        $departement->update($attributes);
        return redirect()->route('departements.index')->with('success', 'Departement was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->loadCount('alumnus');
        if ($departement->alumnus_count > 0) {
            return redirect()->route('departements.index')->with('error', 'Failed to delete departement!');
        } else {
            $departement->delete();
            return redirect()->route('departements.index')->with('success', 'Departement was deleted');
        }
    }
}
