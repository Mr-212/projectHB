<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreClosingLogs extends Model
{
    use HasFactory;
    protected $table = 'pre_closing_logs';

    protected $fillable = [
      'property_id',
      'pre_closing_id',
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
