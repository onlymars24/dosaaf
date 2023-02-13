<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Finish;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleEditionIsAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $module = Module::find($request->id);
        $id = $module->course->id;
        if(Finish::where([['course_id', '=', $id], ['passed', '=', false]])->first()){
            return redirect()->route('admin.catalog');
        }
        return $next($request);
    }
}
