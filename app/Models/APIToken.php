<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIToken extends Model
{
    protected $table = 'api_token';
    protected $fillable = [
        'name',
        'client_secret',
        'client_id',
        'access_token',
        'refresh_token',
        'token_time',
        'created_by',
        'updated_by',
        'source',
    ];

}
