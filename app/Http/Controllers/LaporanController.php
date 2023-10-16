<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaporanResource;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::all();
        $laporanTransformed = $laporan->map(function($item) {
            return [
                'id' => $item->id,
                'nama_tugas' => $item->tugas->nama_tugas,
                'name' => $item->user->name,
                'nama_laporan' => $item->nama_laporan,
                'deskripsi' => $item->deskripsi,
                'keluhan' => $item->keluhan,
                'progres' => $item->progres,
                'tgl_laporan' => $item->tgl_laporan,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });
    
        return ['data_laporan' => $laporanTransformed];
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
      $laporan = Laporan::create($request->all());
      return ['data_laporan' => new laporanResource($laporan)];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $laporan = Laporan::findOrFail($id);
      return ['data_laporan' => new laporanResource($laporan)];
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
      $laporan = Laporan::findOrFail($id);
      $laporan->update($request->all());
      return ['data_laporan' => new laporanResource($laporan)];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $laporan = Laporan::findOrFail($id);
      $laporan->delete();
      return response()->json(null, 204);
    }
}
