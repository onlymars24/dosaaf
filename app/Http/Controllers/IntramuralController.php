<?php

namespace App\Http\Controllers;

use App\Models\Intramural;
use Illuminate\Http\Request;

class IntramuralController extends Controller
{
    public function show($id){
        $intramural = Intramural::find($id);
        return view('intramural', ['intramural' => $intramural]);
    }
}
