<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpParser\Node\Stmt\TryCatch;

class User extends Controller
{
    public function login(Request $request)
    {
      // $input_request = $request->input();
      // $validator = Validator::make($input_request, [
      //     'email'     => 'required|exists:users,email',
      //     'password'  => 'required',
      // ]);
  
      // if ($validator->fails()) {
      //   $error = $validator->messages()->first();
      //   $response['status'] = false;
      //   $response['message'] = $error;
      //   return response()->json($response, 400);
      // }
  
      // $data = [
      //     'email'     => $input_request['email'],
      //     'password'  => $input_request['password']
      // ];
  
      // if (auth()->attempt($data)) {
      //   $user       = Auth::user();
      //   $objToken   = auth()->user()->createToken('LaravelAuthApp');
      //   $strToken   = $objToken->accessToken;
      //   $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now());
  
      //   return response()->json([
      //     'token'       => $strToken,
      //     'expires_in'  => $expiration,
      //     'data'        => $user
      //   ], 200);
  
      // } else {
  
      //   return response()->json([
      //     'error' => 'Email atau Password alah',
      //     'status' => false
      //   ], 401);
  
      // }
    }
  
}
