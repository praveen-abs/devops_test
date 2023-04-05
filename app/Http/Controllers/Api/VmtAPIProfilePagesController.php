<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VmtProfilePagesService;

class VmtAPIProfilePagesController extends HRMSBaseAPIController
{

    public function fetchEmployeeProfileDetails(Request $request , VmtProfilePagesService $serviceVmtProfilePagesService){

        if( !$request->has('user_id'))
            return response()->json([
                'status' => 'failure',
                'message'=> 'user_id is missing',
                'data'   => ''
            ]);


        $data = $serviceVmtProfilePagesService->getEmployeeProfileDetails($request->user_id);

        return response()->json([
            'status' => 'success',
            'message'=> '',
            'data'   => $data
        ]);
    }
}
