<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 1/11/21
 * Time: 7:20 PM
 */

namespace App\Models\Casts;


use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Auth;

class ItemCheckListDateTimeCast implements CastsAttributes
{

    const FORMAT = "Y-m-d  h:i:s A T";
    const UTC_TZ = "UTC";

    private function getUserTZ(){
        return Auth::user()->tz;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return  $value = Carbon::parse($value)->setTimezone(self::UTC_TZ)->toDateTimeString();
//        return  $value = Carbon::parse($value)->toDateTimeString();

//         if(is_string($value)){
//             return  $value = Carbon::parse($value)->setTimezone('UTC')->toDateTimeString();
//         }
//         if(is_object($value)) {
////             dd(Carbon::parse($value)->toDateTimeString());
//            return $value = Carbon::parse($value)->toDateTimeString();
//
//         }
    }

    public function get($model, string $key, $value, array $attributes)
    {
        // TODO: Implement get() method.

        if(is_string($value)){
            $value = Carbon::parse($value)->setTimezone($this->getUserTZ())->format(self::FORMAT);
            return $value;

        }
        if(is_object($value)) {
            return $value->setTimezone($this->getUserTZ())->format(self::FORMAT);
        }

    }



}