<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Models\Finish;
use App\Models\Progress;
use Illuminate\Support\Str;

class CourseUserService{
    
    public static function giveAccess($course_id, $user_id){
        $course = Course::find($course_id);
        $user = User::find($user_id);
        $course->users()->attach($user_id);
        $modules = $course->modules->sortBy('priority');
        $list = [];
        foreach($modules as $module){
            $list[$module->id]['result'] = 'pending';
            $list[$module->id]['percent'] = 0;
            $list[$module->id]['fraction']['top'] = 0;
            $moduleList = (array) json_decode($module->list);
            if($module->type == 'test' && isset($moduleList[2])){
                $list[$module->id]['fraction']['bottom'] = count($moduleList[2]);
            }
            else{
                $list[$module->id]['fraction']['bottom'] = count($moduleList);
            }
        }
        $list = json_encode($list);
        $progress = Progress::create([
            'user_id' => $user_id,
            'course_id' => $course_id,
            'list' => $list,
            'entire_progress' => 0,
            'alias' => Str::random(100)
        ]);
        Finish::create([
            'user_id' => $user_id,
            'course_id' => $course_id
        ]);
        if($user->status != 'natural'){
            $progress->docs_status = 'approved';
            $progress->save();
        }
    }

    public static function takeAccessAway($course_id, $user_id){
        $course = Course::find($course_id);
        $course->users()->detach($user_id);
        $progress = Progress::where([
            ['course_id', '=', $course_id],
            ['user_id', '=', $user_id]
        ])->first();
        $progress->delete();
        $finish = Finish::where([
            ['course_id', '=', $course_id],
            ['user_id', '=', $user_id]
        ])->first();
        $finish->delete();
    }
}