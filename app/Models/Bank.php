<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'bank_list';

    protected $fillable = [
        'bank_name',
        'min_length',
        'max_length',
        'status',
    ];
}
