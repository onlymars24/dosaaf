<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function show(){
        $users = User::all();
        $usersNew = [];
        foreach($users as $user){
            $temp = [];
            $temp['SNP'] = $user->surname.' '.$user->name.' '.$user->patronymic;
            $temp['amount'] = $user->courses->count();
            $temp['date'] = date('d.m.Y', strtotime($user->created_at));
            $temp['id'] = $user->id;
            $usersNew[]= $temp;
        }
        return view('admin.users', ['users' => $usersNew]);
    }
}
