<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;

class HRMSBaseAPIController extends Controller
{
    protected function getUserStatus($userId)
    {
        return  User::where('id', $userId)
                    ->where('active', 1)
                    ->where('is_admin', 0)
                    ->where('is_onboarded', 1)
                    ->first();
    }
}
