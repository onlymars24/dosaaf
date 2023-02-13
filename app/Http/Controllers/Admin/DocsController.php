<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function show(){
        $progress = Progress::where('docs_status', 'standby')->get();
        return view('admin.docs', ['progress' => $progress]);
    }
}
