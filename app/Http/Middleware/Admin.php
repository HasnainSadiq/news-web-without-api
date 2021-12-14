<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            if(auth()->user()->is_admin == 1){
                return $next($request);
            } else{
                return abort(403, "Your are not allowed to acces this page");
            }



    }

}
