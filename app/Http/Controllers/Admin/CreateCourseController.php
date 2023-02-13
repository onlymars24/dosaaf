<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;

class CreateCourseController extends Controller
{
    public function show(Request $request){
        $types = Type::all();
        $categories = Category::all();
        $flash = $request->session()->get('flash');
        return view('admin.create-course', [
            'types' => $types, 
            'categories' => $categories,
            'flash' => $flash
        ]);
    }

    public function handler(Request $request){
        $flag = CourseService::catAndTypeCheck($request);
        if($flag){
            $request->session()->flash('flash', 'Заполните поля с типом и категорией');
        }            
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'period' => 'required',
            'descr' => 'required',
            'avatar' => 'mimes:png,jpg',
            'doc.*' => 'mimes:pdf|max:5000'
        ]);
        if($flag){
            return redirect()->route('admin.create.course');            
        }
        $catAndTypeData = CourseService::catAndTypeCreation($request);
        $course = Course::create([
            'title' => $request->title,
            'price' => $request->price,
            'period' => $request->period,
            'descr' => $request->descr,
            'category_id' => $catAndTypeData['category']->id,
            'type_id' => $catAndTypeData['type']->id
        ]);
        if(!empty( $request->file('avatar') ) ){
            $course->avatar = $request->file('avatar')->store(FoldersService::AVATARS);
        }
        $docs = [];
        if(isset($request->file('doc')['natural'])){
            $docs['natural'] = $request->file('doc')['natural']->store(FoldersService::DOCS);
        }
        else{
            $docs['natural'] = null;
        }
        if(isset($request->file('doc')['legal'])){
            $docs['legal'] = $request->file('doc')['legal']->store(FoldersService::DOCS);
        }
        else{
            $docs['legal'] = null;
        }
        $course->docs = json_encode($docs);
        if(!empty($request->hidden)){
            $course->hidden = true;
        }
            $course->save();        
        return redirect()->route('admin.edit.modules', ['id' => $course->id]);
    }
}