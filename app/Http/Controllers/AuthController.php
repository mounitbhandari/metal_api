<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
             'email'    => $request->email,
             'password' => $request->password,
             'name' => $request->name,
         ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }
    // https://jwt-auth.readthedocs.io/en/develop/auth-guard/
    public function login(Request $request)
    {

        //$credentials = request(['email', 'password']);
        $credentials['email']=$request->email;
        $credentials['password']=$request->password;

        $user = User::where('email', '=', $request->email)->first();
        if($user==null){
            return response()->json(['success'=>0,'token'=>null,'user'=>null,'message'=>'User does not exist'], 200);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success'=>0,'token'=>null,'user'=>null,'message'=>'User name or password does not exist'], 200);
        }


        // Get the token
        $token = auth()->login($user);
        $tokenObject = $this->respondWithToken($token);
        $tempUser = array('id'=>$user->id,'user_name'=>$user->user_name,'user_type_id'=>$user->user_type_id);

        return response()->json(['success'=>1,'token'=>$tokenObject,'user'=>$tempUser,'message'=>'Welcome'], 200);

    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function check()
    {
        return response()->json(auth()->check());
    }
    public function payload()
    {
        $payload = auth()->payload();

        // then you can access the claims directly e.g.
        $payload = auth()->payload();
        // $payload->toArray(); // = ['sub' => 123, 'exp' => 123456, 'jti' => 'asfe4fq434asdf'] etc
        return response()->json($payload->toArray());
    }
    public function refresh()
    {
        //$newToken = auth()->refresh();

        // Pass true as the first param to force the token to be blacklisted "forever".
        // The second parameter will reset the claims for the new token
        $newToken = auth()->refresh(true, true);
        return response()->json($newToken);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
