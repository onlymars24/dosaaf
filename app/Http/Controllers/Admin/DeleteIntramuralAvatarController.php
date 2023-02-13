<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intramural;
use Illuminate\Http\Request;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteIntramuralAvatarController extends Controller
{
    public function handler($id){
        $intramural = Intramural::find($id);
        if(!empty($intramural->avatar)){
            Storage::delete($intramural->avatar);
            $intramural->avatar = FoldersService::INTRAMURAL_DEFAULT_AVATAR;
            $intramural->save();
        }
        return redirect()->route('admin.edit.intramural', ['id' => $id]);
    }
}
