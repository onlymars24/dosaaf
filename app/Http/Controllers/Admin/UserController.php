<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show($id){
        $user = User::find($id);
        $progress = Progress::where('user_id', '=', $id)->get();
        $docs = [];
        foreach($progress as $el){
            if(!empty($el->docs)){
                $temp = json_decode($el->docs);
                foreach($temp as $el1){
                    $docs[$el->course->title] = $el1;
                }
            }
        }
        return view('admin.user', ['user' => $user, 'progress' => $progress, 'docs' => $docs]);
    }
}