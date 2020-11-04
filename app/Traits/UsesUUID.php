<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUUID
{
    protected static function bootUsesUuid()
    {

        static::creating(function ($model) {
                $model->uuid = (string) Str::uuid();

        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
