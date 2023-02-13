<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Services\ModuleService;
use App\Http\Controllers\Controller;

class DeleteModuleController extends Controller
{
    public function handler($id){
        $module = Module::find($id);
        $courseId = $module->course->id;
        ModuleService::delete($id);
        return redirect()->route('admin.edit.modules', ['id' => $courseId]);
    }
}
