<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show($id){
        $course = Course::find($id);
        $descr_for_pay = null;
        if(Auth::check()){
            $user = Auth::user();
            $descr_for_pay = 'Пользователь: '.$user->name.' '.$user->surname.' '.$user->patronimic.'; Приобрёл курс: ID'.$course->id.'; Почта пользователя: '.$user->email.'.';
        }
        return view('course', ['course' => $course, 'descr_for_pay' => $descr_for_pay]);
    }
}
