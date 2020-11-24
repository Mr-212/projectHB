<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLogs extends Model
{
    use HasFactory;
    protected $table = 'client_logs';

    protected $fillable = [
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
