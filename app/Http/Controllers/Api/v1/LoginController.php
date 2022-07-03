<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
   
    public function login(Request $request){

        $login= $request->validate([
            "email"=>"required|string",
            "password"=>"required|string"

        ]);
       
        if(! Auth::attempt($login)){
            $msg="invalid credential";
            return response()->json($msg);

        }

        $user = User::where('email', $request->email)->firstOrFail();;
        $token= $user->createToken('accesstoken')->accessToken;
        return response()->json([

            'user'=>$user,
            'access_token'=>$token
        ]);
    }

    public function put(Request $request)
    {
            $user     = User::find(Auth::id());
            $input    = $request->all();
            
            $validator =  Validator::make($input,[
            'name' => 'string|required',
            'email' => 'unique:users,email,'.$user->id.',id|string|required',
            'password' => 'sometimes|required|string'
            ]);

            if ($validator->fails()) {
            $error = Validator::message()->first();
            $response['status']   = false;
            $response['message']  = $error;
            return response()->json($response, 400);
            }

            if (!empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            }

        
        try {
                $user->fill($input);
            if ($user->save()) {
                $result['code']       = 200;
                $result['status']     = true;
                $result['message']    = "Berhasil Update user";
                $result['user']       = $user;
            }

        } catch (\Exception $e) {
            $result['status']       = false;
            $result['code']         = 500;
            $result['message']      = "Gagal Update User";
            $result['user']         = (object)[];
                $result['error']    = [
                                        'message' => $e->getMessage(),
                                        'file' => $e->getFile(),
                                        'line_of_code' => $e->getLine(),
                                        'code' => $e->getCode(),
                                     ];
        }

            if($result['status'] === true){

                 return response()->json($result,  $result['code']);

            }
            return response()->json($result,  $result['code']);
     }

     public function delete(Request $request)
     {
       
        $user     = User::find(Auth::id());
         try {
             if ($user->delete($user->id)) {
                 $result['code']       = 200;
                 $result['status']     = true;
                 $result['message']    = "Berhasil Delete user";
                 $result['user']       = $user;
             }
 
             
         } catch (\Exception $e) {
             $result['status']       = false;
             $result['code']         = 500;
             $result['message']      = "Gagal Delete User";
             $result['user']         = (object)[];
             $result['error'] = [
                 'message' => $e->getMessage(),
                 'file' => $e->getFile(),
                 'line_of_code' => $e->getLine(),
                 'code' => $e->getCode(),
             ];
            
         }
         $request->user()->token()->revoke();
         return response()->json([
             'message' => $result['message']
         ], $result['code']);
     }

    public function users()
    {
        $getuserall = new User;
        // $getallUsers= User::all();
        return response()->json($getuserall->all());

    }

}
