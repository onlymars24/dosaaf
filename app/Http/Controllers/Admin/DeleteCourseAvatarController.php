<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteCourseAvatarController extends Controller
{
    public function handler($id){
        $course = Course::find($id);
        Storage::delete($course->avatar);
        $course->avatar = 'kdfafsdkfjkljarasdf/default.png';
        $course->save();
        return redirect()->route('admin.edit.course', ['id' => $id]);
    }
}
