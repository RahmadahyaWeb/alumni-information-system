<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(User $user)
    {
        $alumnus = Alumnus::where('id', $user->alumnus->id)->first();
        $this->authorize('update', $alumnus);
        $jobs = Job::all();
        return view('frontend.profile', compact('user', 'alumnus', 'jobs'));
    }

    public function update(Request $request, Alumnus $alumnus)
    {
        $this->authorize('update', $alumnus);
        $request->validate([
            'email' => 'required|email',
            'company' => 'nullable',
            'job_id' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
        ], $message = [
            'job_id.required' => 'The job type field is required.'
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->storeAs('public/alumni', $image->hashName());
            Storage::delete('public/alumni/' . $alumnus->photo);
            $alumnus->update([
                'email' => $request->email,
                'company' => $request->company,
                'job_id' => $request->job_id,
                'photo' => $image->hashName(),
            ]);
        } else {
            $alumnus->update([
                'email' => $request->email,
                'company' => $request->company,
                'job_id' => $request->job_id,
            ]);
        }
        User::where('alumnus_id', $alumnus->id)->update([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Your profile successfully updated!');
    }

    public function changePassword(Request $request, Alumnus $alumnus)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('alumnus_id', $alumnus->id)
            ->update([
                'password' => Hash::make($request->password)
            ]);
        return redirect()->back()->with('success', 'Your password successfully updated!');
    }
}
