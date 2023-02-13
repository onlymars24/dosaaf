<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reset;


class ResetVerificationController extends Controller
{
    public function verification($id, $selector){
        $reset = Reset::where([
            ['user_id', '=', $id],
            ['selector', '=', $selector],
        ])->first();
        if(empty($reset)){
            abort(408);
        }
        $user = User::find($reset->user_id);
        $user->password = Hash::make($reset->new_password);
        $user->save();
        $reset->new_password = null;
        $reset->selector = null;
        $reset->save();
        Auth::login($user);
        return redirect()->route('main');
    }
}