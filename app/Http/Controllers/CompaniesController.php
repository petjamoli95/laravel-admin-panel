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
        $request->validate([
            'name' => 'required|unique:companies,name|max:160',
            'email' => 'unique|email|max:255',
            'logo' => 'file|dimensions:max_width=100,max_height=100',
            'website' => 'url|max:64'
        ]);

        $name = $request->input('name');
        $img = $request->file('logo');
        $extension = $img->getClientOriginalExtension();
        $path = "logos/" . $name . "/" . $name . "logo." . $extension;

        $imgsize = getimagesize($img);
        $width = $imgsize[0];
        $height = $imgsize[1];

        $company = new Company();
        $company->name = $name;
        $company->email = $request->input('email');
        Storage::disk('public')->put($path, file_get_contents($img));
        $company->logo = $path;
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies');
    }
}