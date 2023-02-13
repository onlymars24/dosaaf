<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function show(){
        $finishes = Finish::where(
            'passed', '=', true
        )->orderBy('finish_date', 'desc')->get();
        return view('admin.notifications', ['finishes' => $finishes]);
    }
}
