<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmtEmployee extends Model
{
    use HasFactory;
    protected $table ="vmt_employee_details";

    public function getUserDetail() {
        return $this->belongsTo(User::class);
    }
}
