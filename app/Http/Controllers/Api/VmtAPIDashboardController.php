<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VmtAPIDashboardController extends Controller
{
    public function getMainDashboardData(Request $request)
    {
        return response()->json([
            'status' => true,
            'message'=> 'Not implemented',
            'data'   => 'Not implemented'
        ]);
    }
}
