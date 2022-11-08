<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
    ]);
})
    ->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })
        ->name('dashboard');
    
    Route::get('companies', [CompaniesController::class, 'index'])
        ->name('companies.index');

    Route::get('companies/create', [CompaniesController::class, 'create'])
        ->name('companies.create');

    Route::post('companies/store', [CompaniesController::class, 'store']);

    Route::get('companies/{id}/edit', [CompaniesController::class, 'edit'])
        ->name('companies.edit');

    Route::put('companies/{id}', [CompaniesController::class, 'update'])
        ->name('companies.update');
        
    Route::delete('companies/{id}', [CompaniesController::class, 'destroy'])
        ->name('companies.destroy');



    Route::get('employees', [EmployeesController::class, 'index'])
        ->name('employees.index');

    Route::get('employees/create', [EmployeesController::class, 'create'])
        ->name('employees.create');

    Route::post('employees/store', [EmployeesController::class, 'store']);

    Route::get('employees/{id}/edit', [EmployeesController::class, 'edit'])
        ->name('employees.edit');

    Route::put('employees/{id}', [EmployeesController::class, 'update'])
        ->name('employees.update');

    Route::delete('employees/{id}', [EmployeesController::class, 'destroy'])
        ->name('employees.destroy');
});

require __DIR__.'/auth.php';