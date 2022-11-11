<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Inertia\Inertia;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;

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

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $companies = Company::all();
        $employee = Employee::where('id', $id)->get();

        return Inertia::render('Employees/Edit', [
            'employee' => $employee->toArray(),
            'companies' => $companies->toArray()
        ]);
    }

    public function update(EmployeeRequest $request)
    {
        Employee::where('id', $request->id)->update($request->validated());

        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        Employee::where('id', $id)->delete();
    }
}
