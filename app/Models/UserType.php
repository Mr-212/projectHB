<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserType extends Model
{
    use HasFactory,UsesUUID;

    protected $table = 'user_type';
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'source',
    ];

    public static function boot()
    {
        parent::boot();
        self::bootUsesUuid();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
