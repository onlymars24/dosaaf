<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupVerificationController extends Controller
{
    public function verification($id, $selector){
        $user = User::where([
            ['id', '=', $id],
            ['selector', '=', $selector],
        ])->first();
        if(empty($user)){
            abort(408);
        }
        $user->register_verified = true;
        $user->selector = null;
        $user->save();
        Auth::login($user);
        return redirect()->route('main');
    }
}
