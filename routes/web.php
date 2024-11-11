<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('/dashboard', function () {

        return view('dashboard');
    });

});

Route::get('/employees/{employee}/profile-picture', [EmployeeController::class, 'showProfilePicture'])
    ->middleware('auth')
    ->name('employees.profile_picture');

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
