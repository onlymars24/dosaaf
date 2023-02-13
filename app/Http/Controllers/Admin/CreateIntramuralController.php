<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Category;
use App\Models\Intramural;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;

class CreateIntramuralController extends Controller
{
    public function show(Request $request){
        $types = Type::all();
        $categories = Category::all();
        $flash = $request->session()->get('flash');
        return view('admin.create-intramural', [
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
            'outsider_descr' => 'required',
            'inner_descr' => 'required',
            'avatar' => 'mimes:png,jpg',
            'doc' => 'mimes:pdf'
        ]);
        if($flag){
            return redirect()->route('admin.create.intramural');
        }
        $catAndTypeData = CourseService::catAndTypeCreation($request);
        $intramural = Intramural::create([
            'title' => $request->title,
            'outsider_descr' => $request->outsider_descr,
            'inner_descr' => $request->inner_descr,
            'descr' => $request->descr,
            'category_id' => $catAndTypeData['category']->id,
            'type_id' => $catAndTypeData['type']->id
        ]);
        if(!empty($request->file('avatar'))){
            $intramural->avatar = $request->file('avatar')->store(FoldersService::AVATARS);
        }
        if(!empty($request->file('doc'))){
            $intramural->doc = $request->file('doc')->store(FoldersService::DOCS);
        }
        if(!empty($request->hidden)){
            $intramural->hidden = true;
        }
        $intramural->save();
        return redirect()->route('admin.intramurals.catalog');
    }
}