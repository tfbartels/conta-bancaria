<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'c_password' => 'required|same:password' 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        $user->save();
        
        return response()->json(['message' => 'Successfully created user!'], 201);
    }

     /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password    
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);
        
        if(!Auth::attempt($credentials))
            return response()->json(['message' => 'Unauthorized'], 401);
        
        $user = $request->user();
        
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        //if ($request->remember_me)
          //  $token->expires_at = Carbon::now()->addWeeks(1);
        
        $token->save();
        
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer'//,
           // 'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }    

}
