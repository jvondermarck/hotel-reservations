<?php

namespace App\Http\Controllers;

use App\Models\PersonCount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonCountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personCounts = PersonCount::all();
        return response()->json($personCounts, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'age_category_id' => 'required|uuid',
            'count' => 'required|integer'
        ]);

        $personCount = new PersonCount;
        $personCount->age_category_id = $validatedData['age_category_id'];
        $personCount->count = $validatedData['count'];
        $personCount->save();

        return response()->json(['message' => 'Person count created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personCount = PersonCount::findOrFail($id);
        return response()->json($personCount, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'age_category_id' => 'required|uuid',
            'count' => 'required|integer'
        ]);

        $personCount = PersonCount::findOrFail($id);
        $personCount->age_category_id = $validatedData['age_category_id'];
        $personCount->count = $validatedData['count'];
        $personCount->save();

        return response()->json(['message' => 'Person count updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personCount = PersonCount::findOrFail($id);
        $personCount->delete();

        return response()->json(['message' => 'Person count deleted successfully'], 200);
    }
}
