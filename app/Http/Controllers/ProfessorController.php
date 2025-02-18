<?php

namespace App\Http\Controllers;

abstract class ProfessorController
{
    public function index()
{
    // Query total number of fichas for the logged-in teacher
    $fichasCount = Ficha::where('user_id', auth()->id())->count();
    return view('teacher.dashboard', compact('fichasCount'));
}

public function create()
{
    return view('teacher.fichas.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        // validate any other fields
    ]);

    Ficha::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        // store any other fields
    ]);

    return redirect()->route('professor.dashboard')->with('success', 'Ficha created!');
}

public function edit(Ficha $ficha)
{
    // optional: ensure the authenticated user owns this ficha
    return view('teacher.fichas.edit', compact('ficha'));
}

public function update(Request $request, Ficha $ficha)
{
    $request->validate([
        'name' => 'required',
        // ...
    ]);

    $ficha->update([
        'name' => $request->name,
        // ...
    ]);

    return redirect()->route('teacher.dashboard')->with('success', 'Ficha updated!');
}

public function destroy(Ficha $ficha)
{
    // optional: ensure ownership
    $ficha->delete();

    return redirect()->route('teacher.dashboard')->with('success', 'Ficha deleted!');
}
}