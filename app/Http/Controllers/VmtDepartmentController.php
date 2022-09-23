<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department; 

class VmtDepartmentController extends Controller
{

    public function showPage(Request $request)
    {

        $departments  =  Department::simplePaginate(2);
        return view('vmt_department', compact('departments'));
    }
}
