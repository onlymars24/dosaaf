<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LecturesController extends Controller
{
    public function show(
        $module_id,
        $module_alias,
        $progress_id,
        $progress_alias
    )
    {
        $user = User::find(Auth::id());
        $user->last_active = date('Y-m-d H:i:s');
        $user->save();
        $module = Module::where([
            ['id', '=', $module_id],
            ['alias', '=', $module_alias]
        ])->first();
        $progress = Progress::where([
            ['id', '=', $progress_id],
            ['alias', '=', $progress_alias]
        ])->first();
        $list = json_decode($progress->list);
        if(empty($module) ||
            empty($progress) ||
            $module->type != 'lectures' ||
            empty($list->{$module_id})
        )
        {
            abort(404);
        }
        $course = $module->course;
    	return view('lectures', ['course' => $course]);
    }
}
