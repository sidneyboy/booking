<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'agent_name',
        // 'agent_image',
    ];
}
