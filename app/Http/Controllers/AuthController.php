<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function register(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'username' => 'required',
         'password' => 'required',
         'role' => 'required',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Ada kesalahan',
            'data' => $validator->errors()
         ]);
      }

      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);

      $success['token'] = $user->createToken('auth_token')->plainTextToken;
      $success['name'] = $user->name;

      return response()->json([
         'success' => true,
         'message' => 'Register sukses',
         'data' => $success
      ]);
   }

   public function login(Request $request)
   {
      $credentials = $request->only('username', 'password');

      if (Auth::attempt($credentials)) {
         $authenticated_user = Auth::user();
         $user = User::find($authenticated_user->id);
         $token = $user->createToken('auth_token')->plainTextToken;

         return response()->json([
            'success' => true,
            'message' => 'Login sukses',
            'data' => [
               'id' => $user->id,
               'token' => $token,
               'name' => $user->name,
               'username' => $user->username,
               'role' => $user->role,
            ]
         ]);
      } else {
         return response()->json([
            'success' => false,
            'message' => 'Cek username dan password lagi',
            'data' => null
         ]);
      }
   }

   public function logout(Request $request)
   {
      // $validator = Validator::make($request->all(), [
      //    'token' => 'required',
      // ]);

      // if ($validator->fails()) {
      //    return response()->json([
      //       'success' => false,
      //       'message' => 'Ada kesalahan', 
      //       'data' => $validator->errors()
      //    ]);
      // }

      $user = $request->all();

      if ($user) {
         $user['token']->delete();
      }
      return response()->json([
         'success' => true,
         'message' => 'Logout sukses'
      ]);
   }
}
