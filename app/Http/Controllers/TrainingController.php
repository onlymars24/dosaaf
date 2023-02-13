<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finish;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function show($id){
        $course = Course::find($id);
        $modules = $course->modules->sortBy('priority');
        $progress = Progress::where([
            ['user_id', '=', Auth::id()],
            ['course_id', '=', $id]
        ])->first();     
        if($progress->docs_status == 'none'){
            return redirect()->route('training.form', ['id' => $progress->id]);
        }
        if($progress->docs_status == 'rejected' || $progress->docs_status == 'standby'){
            return redirect()->route('training.answer', ['id' => $progress->id]);
        }
        $finish = Finish::where([
            ['user_id', '=', Auth::id()],
            ['course_id', '=', $id]
        ])->first();
        $progress_id = $progress->id;
        $progress_alias = $progress->alias;
        $entire_progress = $progress->entire_progress;
        $progress = json_decode($progress->list);
        return view('training',[
            'course' => $course,
            'modules' => $modules,
            'progress' => $progress,
            'entire_progress' => $entire_progress,
            'progress_id' => $progress_id,
            'progress_alias' => $progress_alias,
            'finish' => $finish
        ]);
    }

    public function informed($id){
        $finish = Finish::find($id);
        $finish->informed = true;
        $finish->save();
        $course = $finish->course;
        return redirect()->route('training', ['id' => $course->id]);
    }
}