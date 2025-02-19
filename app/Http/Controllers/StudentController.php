<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getCompletedWorksheets()
    {
        $studentWorksheets = auth()->user()->studentWorksheets;
        return response()->json($studentWorksheets);
    }
}