<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    function signin(){
        return view('auth.signin');
    }

    function registr(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:App\Models\User|email',
            'password'=>'required|min:6',
        ]);
        // $response=[
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        // ];
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $token= $user->createToken('MyAppTokens');
        if($request->expectsJson()) return response()->json($token);
        return redirect()->route('login');
        //return response()->json($response);
       // var_dump(request('name'));
    }

    function login(){
        return view('auth.signup');
    }
    function signup(Request $request){
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if (Auth::attempt($credentials)){
            $token= auth()->user()->createToken('MyAppTokens');
            if($request->expectsJson()) return response()->json($token);
            $request->session()->regenerate();
            return redirect()->intended('/article');
        } 
        return back()->withErrors([
            'email'=> 'The provided credentials do not match our records',
        ])->onlyInput('email');
    }
    function logout(Request $request){
        auth()->user()->tokens()->delete();
        if($request->expectsJson()) return response()->json('logout');
        $session = $request->session()->all();
        //Log::add($session);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $session2=$request->session()->all();
        return redirect('/');
    }
}
