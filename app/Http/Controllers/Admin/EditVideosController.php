<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EditVideosController extends Controller
{
    public function show($id){
        $module = Module::find($id);
        return view('admin.add-video', ['module' => $module]);
    }

    public function handler($id, Request $request){
        $this->validate($request, [
            'video.*' => 'mimes:mp4|max:2000000',
            'video' => 'required'
        ]);
        $module = Module::find($id);
        $list = (array) json_decode($module->list);
        
        $files = $request->file('video');
        foreach($files as $file){
            $list[] = $file->store(FoldersService::VIDEOS);
        }
        $module->list = json_encode($list);
        $module->save();
        return redirect()->route('admin.edit.module.videos', ['id' => $id]);
    }
}