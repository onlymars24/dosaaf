<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Finish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyFinish
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
        if(Finish::where([
            ['id', '=', $request->id],
            ['user_id', '=', Auth::id()]
        ])->first()){
            return $next($request);
        }
        return redirect('/');
    }
}
