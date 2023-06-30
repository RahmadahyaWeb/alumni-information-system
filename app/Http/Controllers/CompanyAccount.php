<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyAccount extends Controller
{
    public function create()
    {
        return view('admin.company_account.create', [
            'companies' => Company::all()
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'company_id' => 'required|unique:users'
        ], $message = [
            'company_id.unique' => 'User already exists!',
            'company_id.required' => 'Company field is required!'
        ]);

        $company = Company::where('id', $request->company_id)->first();

        User::create([
            'name' => $company->name,
            'email' => $company->email,
            'company_id' => $company->id,
            'role_id' => 3,
            'password' => Hash::make('password')
        ]);

        return redirect()->route('users.index')->with('success', 'User was created!');
    }
}
