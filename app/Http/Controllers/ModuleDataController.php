<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleDataController extends Controller
{
    public function getModuleData($id){
        return json_encode(Module::find($id)->list);
    }

    public function getProgressData($course_id, $module_id){
        $progress = Progress::where([
            ['user_id', '=', Auth::id()],
            ['course_id', '=', $course_id]
        ])->first()->list;
        $progress = json_decode($progress);
        $top = $progress->{$module_id}->fraction->top;
        return $top;
    }

    public function updateProgressData($course_id, $module_id, Request $request){
        $progress = Progress::where([
            ['user_id', '=', Auth::id()],
            ['course_id', '=', $course_id]
        ])->first();
        $progressList = json_decode($progress->list);
        $progressList->{$module_id}->fraction->top = $request->top;
        $progress->list = $progressList;
        $progress->save();
    }
}
