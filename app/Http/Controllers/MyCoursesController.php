<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public function show(){
        $courses = Auth::user()->courses;
        return view('my-courses', ['courses' => $courses]);
    }
}
