<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AfterRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
//        dd($response);
        if($request->isMethod('GET')){
            if(!empty($request->route()->parameters())){
                foreach ($request->route()->parameters() as $param_key => $param_val){
//                    dd(is_numeric($param_val));
                    if(is_numeric($param_val)){
                        $request->route()->setParameter($param_key,encrypt($param_val));
                        //$request->route()->setParameter($param_key,decrypt($param_val));
                    }
                }
            }


//            foreach ()
//            dd($request->route()->parameters());
        }
        return $response;
    }
}
