<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class RequestVacancyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'requirements' => 'required',
            'job_type' => 'required',
            'email' => 'required|email'
        ]);

        Vacancy::create([
            'company_name' => $request->company_name,
            'position' => $request->position,
            'salary' => $request->salary,
            'requirements' => $request->requirements,
            'job_type' => $request->job_type,
            'email' => $request->email,
            'status' => 0
        ]);

        return view('auth.success');
    }
}
