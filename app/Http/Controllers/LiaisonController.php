<?php

namespace App\Http\Controllers;

use App\Models\Liaison;
use Illuminate\Http\Request;

class LiaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Liaison!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.liaisons.index', [
            'liaisons' => Liaison::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.liaisons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'class_of' => 'required|numeric'
        ]);

        Liaison::create($attributes);

        return redirect()->route('liaisons.index')->with('success', 'Liaison was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Liaison $liaison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Liaison $liaison)
    {
        return view('admin.liaisons.edit', compact('liaison'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Liaison $liaison)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'class_of' => 'required|numeric'
        ]);

        $liaison->update($attributes);

        return redirect()->route('liaisons.index')->with('success', 'Liaison was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Liaison $liaison)
    {
        $liaison->loadCount('alumnus');
        if ($liaison->alumnus_count > 0) {
            return redirect()->route('liaisons.index')->with('error', 'Failed to delete liaison!');
        } else {
            $liaison->delete();
            return redirect()->route('liaisons.index')->with('success', 'liaison was deleted');
        }
    }
}
