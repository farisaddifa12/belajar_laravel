<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource
Route::resource('/santris', \App\Http\Controllers\SantriController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);   
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/groups', \App\Http\Controllers\GroupController::class);
Route::resource('/mapels', \App\Http\Controllers\MapelController::class);
Route::get('/absensis', [App\Http\Controllers\AbsensiController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
