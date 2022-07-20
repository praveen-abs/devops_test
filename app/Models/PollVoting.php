<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolVoting extends Model
{
    use HasFactory;

    protected $table = 'polling_voting_details';

    protected $fillable = [
        'user_id',
        'polling_id',
        'selected_option',
    ];
}
