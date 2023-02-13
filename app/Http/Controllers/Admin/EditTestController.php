<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Services\FoldersService;
use App\Http\Controllers\Controller;

class EditTestController extends Controller
{
    public function show($id){
        $module = Module::find($id);
        $arr = [];
        $list = json_decode($module->list);
        
        
        if(!empty($list)){
            $arr['questions'] = $list[0];
            $arr['answersSets'] = $list[1];
            $arr['correctAnswers'] = $list[2];
            $arr['images'] = $list[3];
        }

        return view('admin.add-test', ['module' => $module, 'arr' => $arr]);
    }

    public function handler(Request $request, $id){
        $this->validate($request, [
            'photo.*' => 'mimes:png,jpg'
        ]);
        $module = Module::find($id);
        $list = json_decode($module->list);
        if(!empty($list)){
            $imgList = $list[3];            
        }
        $arr = [];

        //заполняет вопросы
        $temp = [];
        foreach($request->question as $el){
            $temp[] = $el;
        }
        $count = count($temp);
        $arr[] = $temp;
        $temp = [];

        //заполняет наборы ответов
        for($i = 0; $i < $count; $i++){
            $tempInner = [];
            if(!empty($request->answer1[$i])){
                $tempInner[] = $request->answer1[$i];
            }
            if(!empty($request->answer2[$i])){
                $tempInner[] = $request->answer2[$i];
            }
            if(!empty($request->answer3[$i])){
                $tempInner[] = $request->answer3[$i];
            }
            if(!empty($request->answer4[$i])){
                $tempInner[] = $request->answer4[$i];
            }
            if(!empty($request->answer5[$i])){
                $tempInner[] = $request->answer5[$i];
            }
            if(!empty($request->answer6[$i])){
                $tempInner[] = $request->answer6[$i];
            }
           
            $temp[] = $tempInner;
        }
        $arr[] = $temp;
        $temp = [];
        
        //заполняет правильные ответы
        foreach($request->correct as $el){
            $temp[] = $el-1;
        }
        $arr[] = $temp;
        $temp = [];

        //заполняет картинки
        for($i = 0; $i < $count; $i++){
            if(isset($request->file('photo')[$i])){
                $temp[$i] = $request->file('photo')[$i]->store(FoldersService::TESTS);
            }
            elseif(isset($imgList[$i])){
                $temp[$i] = $imgList[$i];
            }
            else{
                $temp[$i] = null;
            }
        }
        $arr[] = $temp;
        $temp = [];
        $module->list = json_encode($arr);
        $module->save();
        return redirect()->route('admin.edit.module.test', ['id' => $id]);
    }
}