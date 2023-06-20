<?php

namespace App\Http\Controllers\RolesPermissions;

use App\Http\Controllers\Controller;
use App\Services\VmtRolesPermissionsService;
use Illuminate\Http\Request;

class VmtRolesPermissionsController extends Controller
{


    public function showRolesPermissionsPage(Request $request){
        return view('roles_permissions.vmt_roles_permissions_main_view');
    }

    public function getAllRoles(Request $request, VmtRolesPermissionsService $serviceVmtRolesPermissionsService){
        //serviceVmtRolesPermissionsService

        return $serviceVmtRolesPermissionsService->getAllRoles();
    }

    /*
        Get all permissions for the given role

    */
    public function getAllPermissions(Request $request){

    }



    public function getAssignedUsers_ForGivenRole(Request $request){

    }

    public function createRole(Request $request){

    }


    /*
        Get the Role details such as description, title, permissions
    */
    public function getRoleDetails(Request $request){

    }

    /*
        Updates the Role details such as description, title
    */
    public function updateRoleDetails(Request $request){

    }

    /*
        Updates the permissions for the given Role

    */
    public function updatePermissions_ForGivenRole(Request $request){

    }

    public function deleteRole(Request $request){

    }

    public function createPermission(Request $request){

    }

    /*
        Get Permission details such as description, title
    */
    public function getPermissionDetails(Request $request){

    }

    /*
        Updates the Permission details such as description, title
    */
    public function updatePermissionDetails(Request $request){

    }

    public function deletePermission(Request $request){

    }

    /*
        Assign roles for the given array of users.
        This also handles updates
    */
    public function assignRoleToUsers(Request $request){

    }

}
