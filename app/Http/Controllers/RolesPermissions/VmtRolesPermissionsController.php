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
    public function getAllPermissions(Request $request , VmtRolesPermissionsService $serviceVmtRolesPermissionsService){

        return $serviceVmtRolesPermissionsService->getAllPermissions();
    }



    public function getAssignedUsers_ForGivenRole(Request $request  , VmtRolesPermissionsService $serviceVmtRolesPermissionsService){

        return $serviceVmtRolesPermissionsService->getAssignedUsers_ForGivenRole();

    }

    public function createRole(Request $request, VmtRolesPermissionsService $serviceVmtRolesPermissionsService){

        // $request->role_name = "CEO";
        // $request->role_description = "all access of the company";

        return $serviceVmtRolesPermissionsService->createRole($request->role_name ,$request->role_description);
    }


    /*
        Get the Role details such as description, title, permissions
    */
    public function getRoleDetails(Request $request, VmtRolesPermissionsService $serviceVmtRolesPermissionsService){

        // $request->role_name = "superadmin";
        return $serviceVmtRolesPermissionsService->getRoleDetails($request->role_name);
    }

    /*
        Updates the Role details such as description, title
    */
    public function updateRoleDetails(Request $request , VmtRolesPermissionsService $serviceVmtRolesPermissionsService){

        $request->role_id = "1";
        return $serviceVmtRolesPermissionsService->updateRoleDetails($request->role_id, $request->updated_role_name, $request->updated_role_description, $request->updated_permissions_array);
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
