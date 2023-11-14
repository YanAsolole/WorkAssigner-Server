<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      $users = User::all();
      return ['data_user' => UserResource::collection($users)];
   }
      
   public function show(string $id)
   {
      $user = User::findOrFail($id);
      return ['data_user' => new UserResource($user)];
   }
   
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
   
   public function destroy(string $id)
   {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json(null, 204);
   }
}
