<?php

namespace App\Http\Controllers\Api;

use App\Models\Finish;
use App\Models\Module;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $progress = Progress::where([
            ['id', '=', $id],
            ['alias', '=', $request->alias]
        ])->first();
        if(empty($progress)){
            abort(404);
        }
        $list = $progress->list;
        $list = json_decode($list);
        $top = $list->{$request->module_id}->fraction->top;
        return $top;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $progress_id)
    {
        $progress = Progress::where([
            ['id', '=', $progress_id],
            ['alias', '=', $request->progress_alias]
        ])->first();
        $list = json_decode($progress->list);
        if($list->{$request->module_id}->fraction->top > $request->top){
            return;
        }
        $list->{$request->module_id}->fraction->top = $request->top;
        $list->{$request->module_id}->percent = round($list->{$request->module_id}->fraction->top / $list->{$request->module_id}->fraction->bottom * 100);
        $result = '';
        $module = Module::find($request->module_id);
        if($list->{$request->module_id}->percent >= $module->min_level){
            $result = 'passed';
        }
        else{
            $result = 'none';
        }
        $list->{$request->module_id}->result = $result;

        $count = 0;
        $passed_count = 0;
        foreach($list as $el){
            $count++;
            if($el->result == 'passed'){
                $passed_count++;
            }
        }

        $progress->list = json_encode($list);
        $progress->entire_progress = round($passed_count / $count * 100);
        if(round($passed_count / $count * 100) == 100){
            $progress->passed = true;
            $finish = Finish::where([
                ['user_id', '=', $progress->user_id],
                ['course_id', '=', $progress->course_id]
            ])->first();
            $finish->passed = true;
            $finish->finish_date = date("Y-m-d H:i:s");
            $finish->save();
        }
        $progress->save();
        return $list;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}