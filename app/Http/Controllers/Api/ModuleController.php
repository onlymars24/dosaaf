<?php

namespace App\Http\Controllers\Api;

use App\Models\Module;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function show($module_id, Request $request)
    {
        $module = Module::where([
            ['id', '=', $module_id],
            ['alias', '=', $request->module_alias]
        ])->first();
        $progress = Progress::where([
            ['id', '=', $request->progress_id],
            ['alias', '=', $request->progress_alias]
        ])->first();
        if(empty($module) || empty($progress)){
            abort(404);
        }
        $arr[] = $module->min_level;
        $arr[] = json_decode($module->list);
        $list = json_decode($progress->list);
        $arr[] = $list->{$module_id}->fraction->top;
        return json_encode($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
