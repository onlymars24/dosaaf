<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intramural;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntramuralsCatalogController extends Controller
{
    public function show(){
        $intramurals = Intramural::all();
        return view('admin.intramurals-catalog', ['intramurals' => $intramurals]);
    }
}
