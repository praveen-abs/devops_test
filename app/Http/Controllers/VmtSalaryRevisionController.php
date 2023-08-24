<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VmtSalaryRevisionService;

class VmtSalaryRevisionController extends Controller
{

public function empList(Request $request, VmtSalaryRevisionService $vmtSalaryRevisionService){

    return  $vmtSalaryRevisionService->empList();
}






}
