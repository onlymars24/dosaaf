<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finish;
use App\Mail\MailToken;
use App\Mail\MailTrack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function show($id){
        $finish = Finish::find($id);
        if(!$finish->checked){
            $finish->checked = true;
            $finish->save();
        }
        return view('admin.notification', ['finish' => $finish, 'user' => $finish->user]);
    }

    public function handler($id, Request $request){
        $finish = Finish::find($id);
        $finish->sent = true;
        $finish->save();
        $user = $finish->user;
        $course = $finish->course;
        Mail::to($user->email)->send(new MailTrack($request->track, $course));
        return redirect()->route('admin.notifications');
    }
}
