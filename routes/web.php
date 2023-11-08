<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('layouts/master');});

Route::get('/Lister', [\App\Http\Controllers\MangasController:: class,'listerEmployes']);

Route::get('/AjouterMangas', [\App\Http\Controllers\MangasController:: class,'FormAjouterMangas']);

Route::post('/postAjouterManga',[\App\Http\Controllers\MangasController::class,'PostAjouterMangas']);




