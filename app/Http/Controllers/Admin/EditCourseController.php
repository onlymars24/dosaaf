<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Course;
use App\Models\Finish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;

class EditCourseController extends Controller
{
    public function show($id){
        $course = Course::find($id);
        $categories = Category::all();
        $types = Type::all();
        $docs = json_decode($course->docs);
        return view('admin.edit-course', ['course' => $course,
        'types' => $types, 'categories' => $categories, 'docs' => $docs]);
    }

    public function handler(Request $request, $id){
        $flag = CourseService::catAndTypeCheck($request);
        if($flag){
            $request->session()->flash('flash', 'Заполните поля с типом и категорией');
        }
        $this->validate($request, [
            'avatar' => 'mimes:png,jpg',
            'category' => 'required',
            'type' => 'required',
            'title' => 'required',
            'price' => 'required',
            'period' => 'required',
            'descr' => 'required',
            'doc.*' => 'mimes:pdf|max:5000'
        ]);
        if($flag){
            return redirect()->route('admin.edit.course', ['id' => $id]);          
        }
        $catAndTypeData = CourseService::catAndTypeCreation($request);
        $course = Course::find($id);
        $course->update($request->except('_token', 'hidden', 'type', 'category'));
        $course->type_id = $catAndTypeData['type']->id;
        $course->category_id = $catAndTypeData['category']->id;
        if(!empty($request->hidden)){
            $course->hidden = true;
        }
        else{
            $course->hidden = false;
        }
        if(!empty( $request->file('avatar') ) ){
            $course->avatar = $request->file('avatar')->store(FoldersService::AVATARS);
        }
        $docsOld = json_decode($course->docs);
        $docs = [];
        if(isset($request->file('doc')['natural'])){
            $docs['natural'] = $request->file('doc')['natural']->store(FoldersService::DOCS);
        }
        else{
            $docs['natural'] = $docsOld->natural;
        }
        if(isset($request->file('doc')['legal'])){
            $docs['legal'] = $request->file('doc')['legal']->store(FoldersService::DOCS);
        }
        else{
            $docs['legal'] = $docsOld->legal;
        }
        $course->docs = $docs;
        $course->save();
        if(Finish::where(['course_id', '=', $id])->first()){
            return redirect()->route('admin.catalog');
        }
        return redirect()->route('admin.edit.modules', ['id' => $course->id]);
    }
}