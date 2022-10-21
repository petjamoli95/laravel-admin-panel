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

        return Inertia::render('Employees', [
            'employees' => $employees->toArray()
        ]);
    }

    public function create()
    {

        $companies = Company::all();

        return Inertia::render('Employees/AddEmployee', [
            'companies' => $companies->toArray()
        ]);
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company = $request->get('company');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        return redirect()->route('employees');
    }
}
