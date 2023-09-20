<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $users = User::all();
      return ['data_user' => UserResource::collection($users)];
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
      //   $user = User::create($request->all());
      //   return ['data_user' => new UserResource($user)];
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      $user = User::findOrFail($id);
      return ['data_user' => new UserResource($user)];
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
        $user = User::findOrFail($id);
    
        // Enkripsi password baru
        $input = $request->all();
        if (isset($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        }
    
        $user->update($input);
    
        return ['data_user' => new UserResource($user)];
    }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json(null, 204);
   }
}
