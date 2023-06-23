<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmtPermodulePermission extends Model
{
    use HasFactory;

    protected $table = 'vmt_permodule_permission';

    protected $fillable = ['per_module_id','permission_id'];
}
