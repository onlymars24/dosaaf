<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intramural;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteIntramuralController extends Controller
{
    public function handler($id){
        $intramural = Intramural::find($id);
        if($intramural->avatar){
            Storage::delete($intramural->avatar);
        }
        if($intramural->doc){
            Storage::delete($intramural->doc);
        }
        $intramural->delete();
        return redirect()->route('admin.intramurals.catalog');
    }
}
