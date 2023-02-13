<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailResetVerification;

class ResetController extends Controller
{
    public function show(Request $request){
    	$flash = $request->session()->get('flash');
    	return view('reset', ['flash' => $flash]);
    }

    public function handler(Request $request){
 	   $user = User::where([
         ['email', '=', $request->email]
        ])->first();
 	   
 	   if(empty($user)){
 	   	$request->session()->flash('flash', 'Пользователя с данным email не существует!');
 	   	return redirect()->route('reset');
 	   }

 	   $reset = Reset::where([
         ['user_id', '=', $user->id],
        ])->first();
 	   // $day = 24*3600;
       $day = 10;
 	   if(time() - strtotime($reset->last_request) < $day){
 	   	$request->session()->flash('flash', 'Пароль можно менять не больше одного раза в сутки!');
 	   	return redirect()->route('reset');
 	   }

 	   $reset->selector = Str::random(250);
 	   $reset->new_password = Str::random(10);
       $reset->last_request = date("Y-m-d H:i:s");
 	   $reset->save();
	    Mail::to($request->email)->send(new MailResetVerification($user->id, $reset->selector, $reset->new_password));
        $request->session()->flash('flash', 'На ваш email пришло письмо с подтверждением о сбросе!');
        return redirect()->route('reset');
    }
}