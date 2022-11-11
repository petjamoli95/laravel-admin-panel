<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return Inertia::render('Companies/Index', [
            'companies' => $companies->toArray()
        ]);
    }

    public function create()
    {
        return Inertia::render('Companies/Create');
    }

    public function store(CompanyRequest $request)
    {
        $name = $request->input('name');
        $img = $request->file('logo');
        $extension = $img->getClientOriginalExtension();
        $path = "logos/" . $name . "/" . $name . "logo." . $extension;

        $company = new Company();
        $company->name = $name;
        $company->email = $request->input('email');
        if (!empty($img)) {
            Storage::disk('public')->put($path, file_get_contents($img));
            $company->logo = Storage::url($path);
        }
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index');
    }

    public function edit($id)
    {
        $company = Company::where('id', $id)->get();

        return Inertia::render('Companies/Edit', [
            'company' => $company->toArray()
        ]);
    }

    public function update(CompanyRequest $request)
    {
        Company::where('id', $request->id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'website' => $request->input('website')
            ]);
        
        return redirect()->route('companies.index');
    }

    public function destroy($id)
    {
        Company::where('id', $id)->delete();
    }
}