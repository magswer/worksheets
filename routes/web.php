<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/professor-dashboard', [ProfessorController::class, 'index'])
//     ->middleware(['auth', 'role:professor'])
//     ->name('ProfessorDashboardComponent');

// Route::get('/student-dashboard', [StudentController::class, 'index'])
//     ->middleware(['auth', 'role:student'])
//     ->name('StudentDashboardComponent');

require __DIR__.'/auth.php';
