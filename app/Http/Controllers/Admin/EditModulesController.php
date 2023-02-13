<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Finish;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditModulesController extends Controller
{
    public function show($id){
        if(Finish::where([['course_id', '=', $id], ['passed', '=', false]])->first()){
            return redirect()->route('admin.catalog');
        }
        $course = Course::find($id);
        return view('admin.edit-modules', ['course' => $course]);
    }

    public function handler($id, Request $request){
        $module = Module::find($id);
        $module->update($request->except('_token'));
        $module->min_level = $request->minlevel;
        $module->save();
        return redirect('/admin/edit/module/'.$module->type.'/'.$module->id);
    }
}