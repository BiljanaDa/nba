<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForbiddenCommentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     public function handle(Request $request, Closure $next)
     {
         $forbidden_words = [
             'hate',
             'stupid',
             'idiot',
         ];
 
         foreach ($forbidden_words as $word) {
             if(strstr($request->content, $word)) {
                return response(view('pages.forbidden-comment'));
             }
         }
 
         return $next($request);
 
     }
}
