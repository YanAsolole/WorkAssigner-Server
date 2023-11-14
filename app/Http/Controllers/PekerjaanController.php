<?php

namespace App\Http\Controllers;

use App\Http\Resources\PekerjaanResource;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
      $Pekerjaan = Pekerjaan::all();
      return ['data_pekerjaan' => PekerjaanResource::collection($Pekerjaan)]; 
    }

    public function store(Request $request)
    {
      $Pekerjaan = Pekerjaan::create($request->all());
      return ['data_pekerjaan' => new PekerjaanResource($Pekerjaan)];
    }

    public function show(string $id)
    {
      $Pekerjaan = Pekerjaan::findOrFail($id);
      return ['data_pekerjaan' => new PekerjaanResource($Pekerjaan)];
    }
    
    public function update(Request $request, string $id)
    {
      $Pekerjaan = Pekerjaan::findOrFail($id);
      $Pekerjaan->update($request->all());
      return ['data_pekerjaan' => new PekerjaanResource($Pekerjaan)];
    }

    public function destroy(string $id)
    {
      $Pekerjaan = Pekerjaan::findOrFail($id);
      $Pekerjaan->delete();
      return response()->json(null, 204);
    }
}
