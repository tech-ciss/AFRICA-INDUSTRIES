<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])
->prefix('admin')
->name('admin.')
->group(function () {
    Route::resource('categories', CategoryController::class);
});

//teste
Route::get('/admin-test', function () {
    return 'Admin autorisé';
})->middleware(['auth', 'role:admin']);

Route::get('/technicien-test', function () {
    return 'Technicien autorisé';
})->middleware(['auth', 'role:technicien']);

Route::get('/staff-test', function () {
    return 'Admin ou technicien autorisé';
})->middleware(['auth', 'role:admin,technicien']);

//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
