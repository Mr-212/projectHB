<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyLogs extends Model
{
    use HasFactory;
    protected $table = 'property_logs';

    protected $fillable = [
      'property_id',
      'client_id',
      'action_type',
      'original_data',
      'new_data',
      'changes',
      'updated_by',

    ];

    protected $casts = [
        'original_data' => 'array',
        'new_data' => 'array',
        'changes'  => 'array',
    ];
}
