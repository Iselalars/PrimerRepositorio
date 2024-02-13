<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/alumnos', AlumnoController::class);
