<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyVacancyController extends Controller
{
    public function index()
    {
        $vacancies = DB::table('vacancies')
            ->join('companies', 'companies.id', '=', 'vacancies.company_id')
            ->where('companies.email', '=', Auth::user()->email)
            ->select('*')
            ->get();

        return view('frontend.companies.vacancies', compact('vacancies'));
    }

    public function create()
    {
        return view('frontend.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'salary' => 'required|numeric',
            'requirements' => 'required',
            'job_type' => 'required',
        ]);

        Vacancy::create([
            'position' => $request->position,
            'salary' => $request->salary,
            'requirements' => $request->requirements,
            'job_type' => $request->job_type,
            'company_id' => Auth::user()->company->id
        ]);

        return redirect()->route('vacancy.index')->with('success', 'Your vacancy was created');
    }
}
