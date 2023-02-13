<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Course;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCourse
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
        if(Course::find($request->id) && 
            Progress::where([
                ['course_id', '=', $request->id],
                ['user_id', '=', Auth::id()]
            ])->first()){
            return $next($request);
        }
        return redirect('/');
    }
}
