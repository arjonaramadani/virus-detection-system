<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6'
            ]);
            
        // return $validatedData;
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $user->update([
            'name' => $request->name
        ]);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user,'acess_token'=>$accessToken]);

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData)){
            // return response(['message'=>'Invalid credentials']);
            return response()->json(['message' =>'Invalid credentials'],401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
}
