<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeforeRequest
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

//        if($request->isMethod('GET')){
//            if(!empty($request->route()->parameters())){
//                foreach ($request->route()->parameters() as $param_key => $param_val){
////                    dd(is_numeric($param_val));
//                    if(is_numeric($param_val)){
////                        $request->route()->parameters()[$param_key] = decrypt($param_val);
////                        $request->route()->setParameter($param_key,encrypt($param_val));
//                        //$request->route()->setParameter($param_key,decrypt($param_val));
//                    }
//                }
//            }
////            foreach ()
////            dd($request->route()->parameters());
//        }
        return $next($request);
    }

//    public function terminate($request, $response)
//    {
//        if(!empty($request->route()->parameters())){
//            foreach ($request->route()->parameters() as $param_key => $param_val){
////                    dd(is_numeric($param_val));
//                if(is_numeric($param_val)){
////                        $request->route()->parameters()[$param_key] = decrypt($param_val);
//                        $request->route()->setParameter($param_key,encrypt($param_val));
//                    //$request->route()->setParameter($param_key,decrypt($param_val));
//                }
//            }
//        }
//    }
}
