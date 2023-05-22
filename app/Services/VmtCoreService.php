<?php

namespace App\Services;

use App\Models\VmtReimbursementVehicleType;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtEmployeeReimbursements;
use App\Models\VmtOrgTimePeriod;

use Illuminate\Support\Facades\DB;

class VmtCoreService {


    public function getOrgTimePeriod(){

        $response = VmtOrgTimePeriod::all();

        return [
            "status" => "success",
            "message" => "",
            "data"=>$response,
        ];
    }
}
