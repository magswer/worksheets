<?php

namespace App\Http\Controllers;

abstract class StudentController
{
    public function index()
{
    // Count how many fichas the student has completed
    $completedCount = CompletedFicha::where('user_id', auth()->id())->count();
    return view('student.dashboard', compact('completedCount'));
}
}