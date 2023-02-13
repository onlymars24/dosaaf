<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Category;
use App\Models\Intramural;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;

class EditIntramuralController extends Controller
{
    public function show($id){
        $intramural = Intramural::find($id);
        $categories = Category::all();
        $types = Type::all();
        return view('admin.edit-intramural', ['intramural' => $intramural, 'categories' => $categories, 'types' => $types]);
    }

    public function handler(Request $request, $id){
        $flag = CourseService::catAndTypeCheck($request);
        if($flag){
            $request->session()->flash('flash', 'Заполните поля с типом и категорией');
        }
        $this->validate($request, [
            'title' => 'required',
            'outsider_descr' => 'required',
            'inner_descr' => 'required',
            'avatar' => 'mimes:png,jpg',
            'doc' => 'mimes:pdf'
        ]);
        if($flag){
            return redirect()->route('admin.create.intramular');
        }
        $catAndTypeData = CourseService::catAndTypeCreation($request);
        $intramural = Intramural::find($id);
        $intramural->update($request->except('_token', 'hidden', 'type', 'category'));
        $intramural->type_id = $catAndTypeData['type']->id;
        $intramural->category_id = $catAndTypeData['category']->id;
        if(!empty($request->file('avatar'))){
            $intramural->avatar = $request->file('avatar')->store(FoldersService::AVATARS);
        }
        if(!empty($request->file('doc'))){
            $intramural->doc = $request->file('doc')->store(FoldersService::DOCS);
        }
        if(!empty($request->hidden)){
            $intramural->hidden = true;
        }
        else{
            $intramural->hidden = false;
        }
        $intramural->save();
        return redirect()->route('admin.intramurals.catalog');
    }
}