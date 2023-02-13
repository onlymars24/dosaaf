<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteVideoController extends Controller
{
    public function handler($id, $key){
        $module = Module::find($id);
        $list = (array) json_decode($module->list);
        Storage::delete($list[$key]);
        unset($list[$key]);
        $module->list = $list;
        $module->save();
        return redirect()->route('admin.edit.module.videos', ['id' => $id]);
    }
}
