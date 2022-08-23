<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmtPMS_KPIFormReviewsModel extends Model
{
    use HasFactory;

    protected $table = 'vmt_pms_kpiform_reviews';

    function getPmsKpiFormAssigned(){
        return $this->belongsTo(VmtPMS_KPIFormAssignedModel::class,'vmt_pms_kpiform_assigned_id');
    }
}
