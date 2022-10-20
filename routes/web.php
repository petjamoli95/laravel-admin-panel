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
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })
        ->name('dashboard');
    
    Route::get('/companies', [CompaniesController::class, 'index'])
        ->name('companies');

    Route::get('/companies/add', [CompaniesController::class, 'create'])
        ->name('addcompany');
    
    Route::get('/employees', [EmployeesController::class, 'index'])
        ->name('employees');

    Route::get('/employees/add', [EmployeesController::class, 'create'])
        ->name('addemployee');
});

require __DIR__.'/auth.php';
