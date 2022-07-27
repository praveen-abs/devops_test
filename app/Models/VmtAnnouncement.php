<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmtAnnouncement extends Model
{
    use HasFactory;
     protected $table = 'vmt_announcement';

    protected $fillable = [
        "ann_author_id",
        "title_data",
        "details_data",
       
     
    ];
}