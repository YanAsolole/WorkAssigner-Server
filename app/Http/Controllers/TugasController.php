<?php

namespace App\Http\Controllers;

use App\Http\Resources\TugasResource;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $tugas = Tugas::all();
      return ['data_tugas' => TugasResource::collection($tugas)]; 
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
      $tugas = Tugas::create($request->all());
      return ['data_tugas' => new TugasResource($tugas)];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $tugas = Tugas::findOrFail($id);
      return ['data_tugas' => new TugasResource($tugas)];
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
      $tugas = Tugas::findOrFail($id);
      $tugas->update($request->all());
      return ['data_tugas' => new TugasResource($tugas)];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $tugas = Tugas::findOrFail($id);
      $tugas->delete();
      return response()->json(null, 204);
    }
}
