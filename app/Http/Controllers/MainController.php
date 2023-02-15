<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function main(Request $request){

        $conditions = [
            ['hidden', '=', 0]
        ];
        if(!empty($request->type)){
            $conditions[] = ['type_id', '=', $request->type];
        }
        if(!empty($request->category)){
            $conditions[] = ['category_id', '=', $request->category];
        }
        if(!empty($conditions)){
            $courses = Course::where($conditions)->paginate(6);
        }
        else{
            $courses = Course::paginate(6);
        }
        $types = Type::has('courses')->get();
        $categories = Category::has('courses')->get();
        // \Log::info('Информация:', [$categories]);        
        return view('main', [
            'courses' => $courses,
            'types' => $types,
            'categories' => $categories
        ]);
    }
}