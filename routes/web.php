<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/surveys', [SurveyController::class, 'index']);
Route::post('/surveys', [SurveyController::class, 'store']); 

Route::resource('/santris', \App\Http\Controllers\SantriController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);   
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/groups', \App\Http\Controllers\GroupController::class);
Route::resource('/mapels', \App\Http\Controllers\MapelController::class);
Route::get('/absensis', [\App\Http\Controllers\AbsensiController::class, 'absensis'])->name('absensis');
Route::get('/absensis', [App\Http\Controllers\AbsensiController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
