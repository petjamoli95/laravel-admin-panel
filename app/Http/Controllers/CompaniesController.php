<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $name = $request->input('name');
        $img = $request->file('logo');
        dd($img);
        $imgsize = getimagesize($img);
        $width = $imgsize[0];
        $height = $imgsize[1];
        if ($width <= 100 || $height <= 100) {
            Storage::disk('public')->put("logos/" . $name . "logo.jpg", $logo);
        }

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = Storage::url($name . "logo.jpg");
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies');
    }
}
