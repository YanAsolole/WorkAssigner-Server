<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Resources\LaporanResource;

class LaporanController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $laporan = Laporan::all();
      return ['data_laporan' => LaporanResource::collection($laporan)];
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
