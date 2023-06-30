<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Company!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.companies.index', [
            'companies' => Company::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email'
        ]);

        Company::create($attributes);

        return redirect()->route('companies.index')->with('success', 'Company was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $company->id,
        ]);

        $company->update($attributes);

        User::where('company_id', $company->id)->update([
            'email' => $request->email,
            'name' => $request->name
        ]);

        return redirect()->route('companies.index')->with('success', 'Company was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company was deleted!');
    }
}
