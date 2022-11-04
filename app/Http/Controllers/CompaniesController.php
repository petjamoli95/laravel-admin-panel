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

        return Inertia::render('Companies/Index', [
            'companies' => $companies->toArray()
        ]);
    }

    public function create()
    {
        return Inertia::render('Companies/Create');
    }

    public function store(Request $request)
    {
        $regex = 'regex:/^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?\/?$/';

        $request->validate([
            'name' => 'required|unique:companies,name|max:160',
            'email' => 'unique:companies,email|email|max:255',
            'logo' => 'image|dimensions:max_width=100,max_height=100|max:80',
            'website' => $regex
        ]);

        $name = $request->input('name');
        $img = $request->file('logo');
        $extension = $img->getClientOriginalExtension();
        $path = "logos/" . $name . "/" . $name . "logo." . $extension;

        $company = new Company();
        $company->name = $name;
        $company->email = $request->input('email');
        Storage::disk('public')->put($path, file_get_contents($img));
        $company->logo = Storage::url($path);
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index');
    }

    public function edit($id)
    {
        $employee = Employee::where('id', $id);

        return Inertia::render('Companies/Edit', [
            'employee' => $employee
        ]);
    }
}