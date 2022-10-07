<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\VmtOrgRoles;
use Spatie\Permission\Models\Permission;

class VmtUserRolesPermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     *
     *  Show all the roles and permissions in the page
     *
     */
    public function index()
    {
        $roles = VmtOrgRoles::all();
        $users = User::all();

        return view('vmt_assignRoles', compact('roles','users'));
    }

    public function createRole(Request $request)
    {

    }

    public function deleteRole(Request $request)
    {

    }

    public function createPermission(Request $request)
    {

    }

    public function deletePermission(Request $request)
    {

    }


    public function assignRoleToUser(Request $request)
    {

    }

    public function assignPermissionToRole(Request $request)
    {

    }


}
