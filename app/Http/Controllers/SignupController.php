<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reset;
use Illuminate\Support\Str;
use App\Models\Verification;
use Illuminate\Http\Request;
use App\Mail\MailSignupVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function form(Request $request){
        $flash = $request->session()->get('flash');
        return view('signup', ['flash' => $flash]);
    }

    public function handler(Request $request){
        dd($request);
        $this->validate($request, [
            'email' => 'bail|required|email|unique:users',
            'name' => 'required',
            'surname' => 'required',
            'region' => 'required',
            'status' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'phone' => 'bail|required|size:17|unique:users',
            'check-private-policy' => 'accepted'
        ]);
        $password = Str::random(10);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'password' => Hash::make($password),
            'organization' => $request->organization,
            'region' => $request->region,
            'city' => $request->city,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'status' => $request->status,
            'remember_token' => Str::random(10),
            'selector' => Str::random(250),
        ]);
        $reset = Reset::create([
            'selector' => null,
            'user_id' => $user->id,
        ]);
        Mail::to($user->email)->send(new MailSignupVerification($user->id, $user->selector, $user->email, $password));
        $request->session()->flash('flash', 'На указанный email должна прийти ссылка с подтверждением регистрации и паролем.');
        return redirect()->route('signup');
    }
}