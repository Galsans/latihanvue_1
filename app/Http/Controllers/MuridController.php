<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Models\murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $murid = Murid::all();
        return $murid;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required',
            'grade_id'=>'required'
        ]);
        Murid::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(murid $murid)
    {
        //
        return $murid;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, murid $murid)
    {
        //
        $request->validate([
            'nama'=>'required',
        ]);
        $murid->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(murid $murid)
    {
        //
        $murid->delete();
        return response()->json([
            'message' => "Murid berhasil dihapus"
        ]);
    }
}
