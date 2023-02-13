<?php

namespace App\Services;

use App\Models\Type;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CourseService{
    public static function catAndTypeCheck(Request $request){
        $flag = false;
        if(
            empty($request->category[0]) || 
            (
                $request->category[0] == 'addInput' && ( !isset($request->category[1]) || empty($request->category[1]) )
            )
          )
        {
            $flag = true;
        }
        if(
            empty($request->type[0]) || 
            (
                $request->type[0] == 'addInput' && ( !isset($request->type[1]) || empty($request->type[1]) )
            )
          )
        {
            $flag = true;
        }
        return $flag;
    }

    public static function catAndTypeCreation(Request $request){
        $type = '';
        $category = '';
        if($request->input('type')[0] == 'addInput'){
            $type = $request->input('type')[1];
        }
        else{
            $type = $request->input('type')[0];
        }
        if($request->input('category')[0] == 'addInput'){
            $category = $request->input('category')[1];
        }
        else{
            $category = $request->input('category')[0];
        }
        $categoryFromDb = Category::where('name', $category)->first();
        if($categoryFromDb){
            $category = $categoryFromDb;
        }
        else{
            $category = Category::create([
                'name' => $category
            ]);
        }
        $typeFromDb = Type::where('name', $type)->first();
        if($typeFromDb){
            $type = $typeFromDb;
        }
        else{
            $type = Type::create([
                'name' => $type
            ]);
        }
        return [
            'type' => $type,
            'category' => $category
        ];
    }
}