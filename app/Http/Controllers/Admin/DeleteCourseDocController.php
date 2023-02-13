<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteCourseDocController extends Controller
{
    public function handler($status, $id){
        $course = Course::find($id);
        $docs = json_decode($course->docs);
        Storage::delete($docs->{$status});
        $docs->{$status} = null;
        $course->docs = json_encode($docs);
        $course->save();
        return redirect()->route('admin.edit.course', ['id' => $id]);
    }
}