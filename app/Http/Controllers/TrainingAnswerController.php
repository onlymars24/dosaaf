<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class TrainingAnswerController extends Controller
{
    public function show($id){
        $progress = Progress::find($id);
        if($progress->docs_status == 'approved'){
            return redirect()->route('training', ['id' => $progress->course->id]);
        }
        if($progress->docs_status == 'none'){
            return redirect()->route('training.form', ['id' => $progress->id]);
        }
        return view('training-answer', ['progress' => $progress]); 
    }

    public function reload($id){
        $progress = Progress::find($id);
        $progress->docs_status = 'none';
        $progress->docs = null;
        $progress->save();
        return redirect()->route('training.form', ['id' => $id]);
    }
}