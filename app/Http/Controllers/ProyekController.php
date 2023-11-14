<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Resources\ProyekResource;

class ProyekController extends Controller
{
   public function index()
   {
      $proyeks = Proyek::all();
      return ['data_proyek' => ProyekResource::collection($proyeks)];
   }
      
   public function store(Request $request)
   {
      $proyek = Proyek::create($request->all());
      return ['data_proyek' => new ProyekResource($proyek)];
   }
   
   public function show(string $id)
   {
      $proyek = Proyek::findOrFail($id);
      return ['data_proyek' => new ProyekResource($proyek)];;
   }
   
   public function update(Request $request, string $id)
   {
      $proyek = Proyek::findOrFail($id);
      $proyek->update($request->all());
      return ['data_proyek' => new ProyekResource($proyek)];;
   }
   
   public function destroy(string $id)
   {
      $proyek = Proyek::findOrFail($id);
      $proyek->delete();
      return response()->json(null, 204);
   }
}
