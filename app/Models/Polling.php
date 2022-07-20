<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pooling extends Model
{
    use HasFactory;

    protected $table = 'polling_questions';

    protected $fillable = [
        'question',
        'options',
    ];
}
