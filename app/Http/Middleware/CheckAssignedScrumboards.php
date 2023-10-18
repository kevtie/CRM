<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAssignedScrumboards
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $scrumboards = auth()->user()->Scrumboard;
        if($scrumboards->where('id', $request->scrumId)->isEmpty()){
            return back();
        }
        return $next($request);
    }
}
