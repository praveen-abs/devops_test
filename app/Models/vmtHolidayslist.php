<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vmtHolidayslist extends Model
{
    use HasFactory;
    protected $table = 'vmt_holidayslist';

    protected $fillable = [
        'name',
    ];
}
