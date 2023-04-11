<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vmtHolidayslistHolidays extends Model
{
    use HasFactory;
    protected $table = 'vmt_holidayslist_holidays';

    protected $fillable = [
        'holiday_list_id',
        'holiday_id',
    ];
}
