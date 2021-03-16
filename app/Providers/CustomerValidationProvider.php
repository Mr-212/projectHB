<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomerValidationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extendImplicit('accepted_if_not_null',function ($attribute, $value, $parameters,$validator){

//            dd($attribute);
            $data = $validator->getData();
            $param = $parameters[0];

            if(isset($parameters[0]) &&  !empty(data_get($data,$param))) {
//                dd(data_get($data,$param));
               $validator->sometimes($attribute,'accepted',function ($data){

                   return !empty($data['client']['co_applicant_email']);
//                   if(isset($data['client']['co_applicant_email']) && empty($data['client']['co_applicant_email']))
//                        return false;
//                   else
//                       return true;
               });
            }
//
//            return false;
//            $validator->sometimes($attribute,'accepted',function ($v){
////                if(isset($parameters[0]) &&  !is_null(data_get($validator->getData(),$parameters[0]))) {
//////                dd('here');
////                return true;
////            }
//            });

        });


    }
}
