<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProgress
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
        $id = '';
        if(isset($request->progress_id)){
            $id = $request->progress_id;
        }
        else{
            $id = $request->id;
        }
        if(Progress::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id()]
        ])->first()){
            return $next($request);
        }
        return redirect('/');
    }
}