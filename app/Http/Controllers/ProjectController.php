<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $projects = Project::all();
      return ['data_project' => ProjectResource::collection($projects)];
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
      $project = Project::create($request->all());
      return ['data_project' => new ProjectResource($project)];
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      $project = Project::findOrFail($id);
      return ['data_project' => new ProjectResource($project)];;
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
      $project = Project::findOrFail($id);
      $project->update($request->all());
      return ['data_project' => new ProjectResource($project)];;
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      $project = Project::findOrFail($id);
      $project->delete();
      return response()->json(null, 204);
   }
}
