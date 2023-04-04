<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::resource("/employees", EmployeeController::class);
Route::get('/employees/{id}/managers', 'App\Http\Controllers\EmployeeController@getManagers');
Route::get('/employees/{id}/managers-salary', 'App\Http\Controllers\EmployeeController@getManagersSalary');
Route::get('/employees/k/search', 'App\Http\Controllers\EmployeeController@search');
Route::get('/employees/e/export', 'App\Http\Controllers\EmployeeController@export');
