<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::prefix('professor')->middleware('role:professor')->group(function () {
        Route::get('/worksheets', [ProfessorController::class, 'index'])->name('professor.worksheets.index');
        Route::get('/worksheets/create', [ProfessorController::class, 'create'])->name('professor.worksheets.create');
        Route::post('/worksheets', [ProfessorController::class, 'store'])->name('professor.worksheets.store');
        Route::get('/worksheets/{worksheet}', [ProfessorController::class, 'show'])->name('professor.worksheets.show');
        Route::get('/worksheets/{worksheet}/edit', [ProfessorController::class, 'edit'])->name('professor.worksheets.edit');
        Route::put('/worksheets/{worksheet}', [ProfessorController::class, 'update'])->name('professor.worksheets.update');
        Route::delete('/worksheets/{worksheet}', [ProfessorController::class, 'destroy'])->name('professor.worksheets.destroy');
    });

    Route::get('/student/completed-worksheets', [StudentController::class, 'getCompletedWorksheets'])
    ->name('student.completedWorksheets');
});


require __DIR__.'/auth.php';
