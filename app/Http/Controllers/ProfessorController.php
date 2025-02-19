<?php

namespace App\Http\Controllers;

use App\Models\Worksheet;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $worksheets = auth()->user()->worksheets;

        return response()->json($worksheets);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|json', 
        ]);

        $worksheet = auth()->user()->worksheets()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($worksheet, 201);
    }

    public function edit(Worksheet $worksheet)
    {
        if ($worksheet->created_by !== auth()->id()) {
            return abort(403, 'Unauthorized');
        }

        return response()->json($worksheet);
    }

    public function update(Request $request, Worksheet $worksheet)
    {
        if ($worksheet->created_by !== auth()->id()) {
            return abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|json',
        ]);

        $worksheet->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($worksheet);
    }

    public function destroy(Worksheet $worksheet)
    {
        if ($worksheet->created_by !== auth()->id()) {
            return abort(403, 'Unauthorized');
        }

        $worksheet->delete();

        return response()->json(['message' => 'Worksheet deleted successfully']);
    }
}
