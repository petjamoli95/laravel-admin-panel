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
        $request->validate([
            'firstname' => 'required|max:160',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'unique|email|max:255',
            'phone' => 'regex:^(?:((\+?\d{2,3})|(\(\+?\d{2,3}\))) ?)?(((\d{2}[\ \-\.]?){3,5}\d{2})|((\d{3}[\ \-\.]?){2}\d{4}))$'
        ]);

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
