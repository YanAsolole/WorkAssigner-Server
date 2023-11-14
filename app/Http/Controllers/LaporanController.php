<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaporanResource;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
   
    public function index()
    {
      $laporan = Laporan::all();
      return ['data_laporan' => LaporanResource::collection($laporan)]; 
    }
    
    public function store(Request $request)
    {
      $laporan = Laporan::create($request->all());
      return ['data_laporan' => new laporanResource($laporan)];
    }
    
    public function show(string $id)
    {
      $laporan = Laporan::findOrFail($id);
      return ['data_laporan' => new laporanResource($laporan)];
    }
    
    public function update(Request $request, string $id)
    {
      $laporan = Laporan::findOrFail($id);
      $laporan->update($request->all());
      return ['data_laporan' => new laporanResource($laporan)];
    }
    
    public function destroy(string $id)
    {
      $laporan = Laporan::findOrFail($id);
      $laporan->delete();
      return response()->json(null, 204);
    }
}
