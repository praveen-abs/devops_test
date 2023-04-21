<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VmtBloodGroup;
use App\Models\VmtMaritalStatus;
use Illuminate\Support\Facades\Request;

class HRMSBaseAPIController extends Controller
{
    protected function getUserStatus($userId)
    {
        return  User::where('id', $userId)
            ->where('active', 1)
            ->where('is_ssa', 0)
            ->where('is_onboarded', 1)
            ->first();
    }

    public function getAllUsers(Request $request)
    {


        return User::where('is_ssa', '0')
            ->where('active', '1')
            ->get(['id', 'name', 'user_code']);
    }


    public function getAllBloodgroups(Request $request)
    {
        return VmtBloodGroup::all()->pluck('name');
    }


    public function getAllMaritalStatus(Request $request)
    {
        return VmtMaritalStatus::all()->pluck('name');
    }
}
