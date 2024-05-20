<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('layout');
});

Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('matriculas', MatriculaController::class);
Route::resource('relatorios', RelatorioController::class);


