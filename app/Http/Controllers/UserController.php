<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
            'users' => User::with('alumnus')->get()->except(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
            'alumni' => Alumnus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alumnus_id' => 'required|unique:users'
        ], $message = [
            'alumnus_id.unique' => 'User already exists!',
            'alumnus_id.required' => 'Alumnus field is required!'
        ]);
        $alumnus = Alumnus::where('id', $request->alumnus_id)->first();
        User::create([
            'name' => $alumnus->name,
            'email' => $alumnus->email,
            'alumnus_id' => $request->alumnus_id,
            'role_id' => 2,
            'password' => Hash::make('password')
        ]);

        return redirect()->route('users.index')->with('success', 'User was created!');
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
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->route('users.index')->with('success','Password was changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
