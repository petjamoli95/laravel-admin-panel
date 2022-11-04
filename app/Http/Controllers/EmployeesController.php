<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Inertia\Inertia;
use App\Models\Company;


class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return Inertia::render('Employees/Index', [
            'employees' => $employees->toArray()
        ]);
    }

    public function create()
    {

        $companies = Company::all();

        return Inertia::render('Employees/Create', [
            'companies' => $companies->toArray()
        ]);
    }

    public function store(Request $request)
    {
        $regex = 'regex:/^(?:((\+?\d{2,3})|(\(\+?\d{2,3}\))) ?)?(((\d{2}[\ \-\.]?){3,5}\d{2})|((\d{3}[\ \-\.]?){2}\d{4}))$/';

        $request->validate([
            'firstname' => 'required|max:80',
            'lastname' => 'required|max:80',
            'company' => 'required|max:160',
            'email' => 'email|unique:employees,email|max:255',
            'phone' => $regex
        ]);

        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company = $request->get('company');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $companies = Company::all();
        $employee = Employee::where('id', $id);

        return Inertia::render('Employees/Edit', [
            'employee' => $employee,
            'companies' => $companies->toArray()
        ]);
    }
}
