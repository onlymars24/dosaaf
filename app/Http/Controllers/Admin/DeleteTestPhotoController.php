<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteTestPhotoController extends Controller
{
    public function handler($id, $alias, $key){
        $module = Module::where([
            ['id', '=', $id],
            ['alias', '=', $alias]
        ])->first();
        if(!$module){
            return redirect()->route('admin.edit.module.test', ['id' => $id]);
        }
        $list = json_decode($module->list);
        $imgList = $list[3];
        Storage::delete($imgList[$key]);
        $imgList[$key] = null;
        $list[3] = (array) $imgList;
        $module->list = json_encode($list);
        $module->save();
        return redirect()->route('admin.edit.module.test', ['id' => $id]);
    }
}
