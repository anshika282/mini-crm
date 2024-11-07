<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
Route::post('login', function () {
    return view('index');
});
Route::get('/employees/{employee}/profile-picture', [EmployeeController::class, 'showProfilePicture'])
    ->name('employees.profile_picture');
