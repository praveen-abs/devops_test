<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VmtDepartmentController extends Controller
{

    public function showPage(Request $request)
    {


        return view('vmt_department');
    }
}
