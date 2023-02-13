<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function form(Request $request){
        $flash = $request->session()->get('flash');
        return view('signin', ['flash' => $flash]);
    }

    public function handler(Request $request){
        if (!Auth::attempt($request->except('_token'))) {
            $request->session()->flash('flash', 'Неправильный логин или пароль.');
            return redirect()->route('signin');
        }
        if (Auth::user()->register_verified == 0) {
            $request->session()->flash('flash', 'Неправильный логин или пароль.');
            Auth::logout();
            return redirect()->route('signin');
        }
        return redirect()->route('main');
    }
}