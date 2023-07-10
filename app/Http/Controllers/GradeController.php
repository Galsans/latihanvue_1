<?php

namespace App\Http\Controllers;

use App\Models\grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grade = Grade::all();
        return $grade;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kelas'=>'required',
            'jurusan'=>'required',
            'walikelas'=>'required',
        ]);
        grade::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(grade $grade)
    {
        //
        return $grade;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grade $grade)
    {
        //
        $request->validate([
            'kelas'=>'required',
            'jurusan'=>'required',
            'walikelas'=>'required',
        ]);
        $grade->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grade $grade)
    {
        //
        $grade->delete();
        return response()->json([
            'message'=>'grade deleted'
        ]);
    }
}
