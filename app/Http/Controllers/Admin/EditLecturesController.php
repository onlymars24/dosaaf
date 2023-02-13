<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EditLecturesController extends Controller
{
    public function show($id){
        $module = Module::find($id);
        return view('admin.add-lecture', ['module' => $module]);
    }

    public function handler($id, Request $request){
        $this->validate($request, [
            'lecture.*' => 'mimes:pdf|max:5000',
            'lecture' => 'required'
        ]);
        $module = Module::find($id);
        $list = (array) json_decode($module->list);
        
        $files = $request->file('lecture');
        foreach($files as $file){
            $list[] = $file->store(FoldersService::LECTURES);
        }
        $module->list = json_encode($list);
        $module->save();
        return redirect()->route('admin.edit.module.lectures', ['id' => $id]);
    }
}