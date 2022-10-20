<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Inertia\Inertia;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return Inertia::render('Companies', [
            'companies' => $companies->toArray()
        ]);
    }

    public function create()
    {
        return Inertia::render('Companies/AddCompany');
    }
}
