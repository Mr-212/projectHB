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

class ItemCheckListDateTimeCast implements CastsAttributes
{
    public function set($model, string $key, $value, array $attributes)
    {

        return  Carbon::parse($value);
//         dd($key,$value);
         //return [$this->$key = Carbon::parse($value)];
    }

    public function get($model, string $key, $value, array $attributes)
    {
        // TODO: Implement get() method.

//       return  (Carbon::createFromFormat('Y-m-d',$value));
//       return  $value;
       // dd($key,$value);

        return  (new Carbon($value))->format('Y-m-d');
    }

}