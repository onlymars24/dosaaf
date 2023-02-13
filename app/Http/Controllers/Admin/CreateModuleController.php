<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finish;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateModuleController extends Controller
{
    public function handler(Request $request, $id){
        if(Finish::where([['course_id', '=', $id], ['passed', '=', false]])->first()){
            return redirect()->route('admin.catalog');
        }
        Module::create([
            'type' => $request->type,
            'course_id' => $id,
            'priority' => 1,
            'alias' => Str::random(100)
        ]);
        return redirect()->route('admin.edit.modules', ['id' => $id]);
    }
}