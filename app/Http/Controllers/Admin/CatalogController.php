<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\CourseUserService;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function show(){
        $users = User::all();
        $courses = Course::all();
        return view('admin.catalog', ['users' => $users, 'courses' => $courses]);
    }

    public function handler($course_id, Request $request){
        $course = Course::find($course_id);
        $users = User::all();
        foreach($users as $user){
            if(isset($request->{$user->id}) && !$user->courses()->find($course_id)){
                CourseUserService::giveAccess($course_id, $user->id);
            }
            elseif(!isset($request->{$user->id}) && $user->courses()->find($course_id)){
                CourseUserService::takeAccessAway($course_id, $user->id);
            }
        }
        return redirect()->route('admin.catalog');
    }
}
