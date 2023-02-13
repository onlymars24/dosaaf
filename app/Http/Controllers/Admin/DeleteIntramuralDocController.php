<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intramural;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteIntramuralDocController extends Controller
{
    public function handler($id){
        $intramural = Intramural::find($id);
        if(!empty($intramural->doc)){
            Storage::delete($intramural->doc);
            $intramural->doc = null;
            $intramural->save();
        }
        return redirect()->route('admin.edit.intramural', ['id' => $id]);
    }
}