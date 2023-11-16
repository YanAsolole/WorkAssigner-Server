<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Resources\LaporanResource;

class LaporanController extends Controller
{
<<<<<<< HEAD
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $laporan = Laporan::all();
      return ['data_laporan' => LaporanResource::collection($laporan)];
   }
=======
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
>>>>>>> 7acb1dbd223f8944660abcb32e3b4968cdc37ea3

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

   public function dataLaporan()
   {
      $laporan = Laporan::all();
      return DataTables::of($laporan)->make(true);
      // return [
      //    "draw" => 1,
      //    "recordsTotal" => 57,
      //    "recordsFiltered" => 57,
      //    "data" => $laporan
      // ];
   }
   public function indexLaporan()
   {
      return view('tableLaporan');
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
