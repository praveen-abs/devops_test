<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

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
}
