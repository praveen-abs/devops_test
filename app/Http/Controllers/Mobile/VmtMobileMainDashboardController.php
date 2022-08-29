<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VmtMobileMainDashboardController extends Controller
{
    public function getDashboarddata() {
        $users = User::all();
        return response()->json($users);
    }
}
