<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class login extends Controller
{
    //
    public function login(){
        return view('login.login');
    }
    public function doLogin(LoginRequest $request){
        $credentails=$request->validated();
        if(Auth::attempt($credentails)){
            $request->session()->regenerate();
            return redirect()->intended(route('posts.index'));
        }
        return to_route('auth.login')->withErrors([
            'email'=>'invalid email',
            'password'=>'invalid password'
        ]);

    }
}
