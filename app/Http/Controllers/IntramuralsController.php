<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Category;
use App\Models\Intramural;
use Illuminate\Http\Request;

class IntramuralsController extends Controller
{
    public function show(Request $request){
        $conditions = [
            ['hidden', '=', 0]
        ];
        if(!empty($request->type)){
            $conditions[] = ['type_id', '=', $request->type];
        }
        if(!empty($request->category)){
            $conditions[] = ['category_id', '=', $request->category];
        }
        $intramurals = Intramural::where($conditions)->get();
        $types = Type::has('intramurals')->get();
        $categories = Category::has('intramurals')->get();
        return view('intramurals', ['types' => $types, 
                                    'categories' => $categories, 
                                    'intramurals' => $intramurals]);
    }
}
