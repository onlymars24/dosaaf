<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function show($id){
        $finish = Finish::find($id);
        if(!$finish->checked){
            $finish->checked = true;
            $finish->save();
        }
        return '';
    }

    public function sent($id){
        $finish = Finish::find($id);
        $finish->sent = true;
        $finish->save();
        return '';
    }
}
