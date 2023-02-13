<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Services\FoldersService;
use Illuminate\Support\Facades\Storage;

class TrainingFormController extends Controller
{
    public function show($id){
        $progress = Progress::find($id);
        if($progress->docs_status == 'approved'){
            return redirect()->route('training', ['id' => $progress->course->id]);
        }
        if($progress->docs_status == 'rejected' || $progress->docs_status == 'standby'){
            return redirect()->route('training.answer', ['id' => $progress->id]);
        }
        $docs = json_decode($progress->course->docs);
        return view('training-form', ['progress' => $progress, 'docs' => $docs]); 
    }

    public function handler(Request $request, $id){
        $this->validate($request, [
            'doc' => 'required',
            'doc.*' => 'required|mimes:pdf|max:5000'
        ]);
        $progress = Progress::find($id);
        $files = $request->file('doc');
        $docs = [];
        if(!empty($progress->docs)){
            foreach(json_decode($progress->docs) as $doc){
                Storage::delete($doc);
            }
        }
        foreach($files as $file){
            $file = $file->store(FoldersService::DOCS);
            $docs[] = $file;
        }
        $progress->docs = json_encode($docs);
        $progress->docs_status = 'standby';
        $progress->save();
        return redirect()->route('training.answer', ['id' => $id]); 
    }
}
