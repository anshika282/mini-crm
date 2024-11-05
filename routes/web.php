<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
