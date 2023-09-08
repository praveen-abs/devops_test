<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtSalaryRevisionService;

class VmtSalaryRevisionController extends Controller
{

    public function getAllEmployeeData(Request $request, VmtSalaryRevisionService $vmtSalaryRevisionService){

        return  $vmtSalaryRevisionService->getAllEmployeeData();
    }
    







}
