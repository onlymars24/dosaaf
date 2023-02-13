<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileEditController extends Controller
{
    public function show(Request $request){
    	$user = Auth::user();
    	$flash = $request->session()->get('flash');
    	return view('edit', ['user' => $user, 'flash' => $flash]);
    }

    public function handler(Request $request, $id){
     $user = Auth::user();
     $validation_arr = [
         'name' => 'required',
         'surname' => 'required',
         'region' => 'required',
         'city' => 'required',
         'address' => 'required',
         'postcode' => 'required',
     ];
     $user = User::find($id);
     if($request->phone != $user->phone){
     	$validation_arr['phone'] = 'bail|required|size:17|unique:users';
     }
     $this->validate($request, $validation_arr);
    	
     $user->update($request->except('_token'));
     $request->session()->flash('flash', 'Данные успешно изменены!');
     return redirect()->route('profile.edit');
    }
}