<?php

namespace App\Http\Controllers\Admin;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocController extends Controller
{
    public function show($id){
        $progress = Progress::find($id);
        return view('admin.doc', ['progress' => $progress]);
    }

    public function approve($id){
        $progress = Progress::find($id);
        $progress->docs_status = 'approved';
        $progress->save();
        return redirect()->route('admin.docs');
    }

    public function reject($id){
        $progress = Progress::find($id);
        $progress->docs_status = 'rejected';
        $progress->docs = null;
        $progress->save();
        return redirect()->route('admin.docs');
    }
}