<?php

namespace App\Services;

use App\Models\Module;
use Illuminate\Support\Facades\Storage;


class ModuleService{
    public static function delete($id){
        $module = Module::find($id);
        $list = json_decode($module->list);
        if(!empty($list)){
            if($module->type == 'test'){
                $list = $list[3];
            }
            foreach($list as $el){
                if(!empty($el)){
                    Storage::delete($el);
                }
            }            
        }
        $module->delete();            
    }
}