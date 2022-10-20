<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Inertia\Inertia;

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
        return Inertia::render('Employees/AddEmployee');
    }
}
