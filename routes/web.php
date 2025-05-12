<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/delete/{id}', [TodolistController::class,'delete'])->name('delete');
Route::get('/tasks', [TodolistController::class, 'index'])->name('tasks');

Route::get('/create_form', [TodolistController::class, 'create'])->name('create');
Route::post('/store', [TodolistController::class, 'store'])->name('store');
Route::get('/edit/{id}', [TodolistController::class, 'edit'])->name('edit');
//Route::post('/tasks/{id}', [TodolistController::class, 'update'])->name('edit');

Route::get('/view_description/{id}', [TodolistController::class, 'view_description'])->name('view_description');
Route::get('/done/{id}', [TodolistController::class, 'done'])->name('done');







require __DIR__.'/auth.php';
