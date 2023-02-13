<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\CourseUserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteCourseController extends Controller
{
 public function handler($id){
    $course = Course::find($id);
    $users = User::all();
    $modules = $course->modules;
    foreach($users as $user){
        if($user->courses()->find($id)){
            CourseUserService::takeAccessAway($id, $user->id);
        }
    }
    foreach($modules as $module){
        if($module->type != 'test'){
            $list =json_decode($module->list);
            if(!empty($list)){
                foreach($list as $file){
                    Storage::delete($file);
                }
            }
        }
        $module->delete();
    }
    $course->delete();
    return redirect()->route('admin.catalog');
 }
}