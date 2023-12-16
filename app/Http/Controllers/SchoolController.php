<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school = School::paginate(10);
        return view('index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(School::rules());
        $school = School::create($validatedData);
        return redirect('/school')->with('success', 'Успешно записахте данни за заведението');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->isAdmin != 1){
            return redirect('/school')->with('error', 'Ограничен достъп!');
        }
        $school = School::findOrFail($id);
        return view('edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->isAdmin != 1){    
            return redirect('/students')->with('error', 'Ограничен достъп!');
        }
        $validatedData=$request->validate(School::rules());
        School::whereId($id)->update($validatedData);
        return redirect('/school')->with('success', 'Данните на заведението бяха актуализирани');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->isAdmin != 1){
            return redirect('/students')->with('error', 'Ограничен достъп!');
        }
        $school = School::findOrFail($id);
        $school->delete();
        return redirect('/school')->with('success', 'Данните бяха успешно изтрити');
    }
}
