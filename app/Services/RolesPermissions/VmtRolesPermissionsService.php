<?php

namespace App\Services;

use App\Models\VmtRolesDescription;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class VmtRolesPermissionsService {


    public function getAllRoles(){

        try{

            $all_roles_in_database = Role::all()->pluck('name');


          return response()->json([
                            "status" => "success",
                            "message" => "",
                            "data" => $all_roles_in_database,
          ]);
          }
           catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching roles",
                "data" => $e,
            ]);
        }
    }

    /*
        Get all permissions for the given role

    */
    public function getAllPermissions(){

        try{

          $all_permission_in_database = Permission::all()->pluck('name');

          return response()->json([
            "status" => "success",
            "message" => "",
            "data" => $all_permission_in_database,
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "Error while fetching permission ",
                "data" => $e,
            ]);
        }




    }



    public function getAssignedUsers_ForGivenRole(){

        try{

            $all_users_with_all_their_roles = User::with('roles')->get();

            return response()->json([
              "status" => "success",
              "message" => "",
              "data" => $all_users_with_all_their_roles,
              ]);
          }
          catch (\Exception $e) {
              return response()->json([
                  "status" => "failure",
                  "message" => "Error while fetching assign_userroles",
                  "data" => $e,
              ]);
          }


    }

    public function createRole($role_name,$role_description){

        $validator = Validator::make(
            $data = [
                'role_name' => $role_name,
                'role_description' => $role_description,

            ],
            $rules = [
                'role_name' => 'required',
                'role_description' => 'required',

            ],
            $messages = [
                'required' => 'Field :attribute is missing',

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }

        try{

            $create_roles = new Role;
            $create_roles->name = $role_name;
            $create_roles->guard_name = "web";
            $create_roles->save();

            //   $roles = $create_roles;

            $roles_description = new VmtRolesDescription;
            $roles_description->roles_id = $create_roles->id;
            $roles_description->description =$role_description;
            $roles_description->save();

            return response()->json([
                "status" => "success",
                "message" => "Saved",
                "data" =>"",
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "",
                "data" => $e,
            ]);
        }


    }


    /*
        Get the Role details such as description, title, permissions
    */
    public function getRoleDetails($role_name){

        $validator = Validator::make(
            $data = [
                'role_name' => $role_name
            ],
            $rules = [
                'role_name' => 'required|exists:roles,name'
            ],
            $messages = [
                'required' => 'Field :attribute is missing',
                'exists' => 'Field :attribute is invalid',

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => $validator->errors()->all()
            ]);
        }
        try{

            $role_details = Role::findByName($role_name)->permissions;

            return response()->json([
                "status" => "success",
                "message" => "",
                "data" =>$role_details,
                ]);
        }
        catch (\Exception $e) {
            return response()->json([
                "status" => "failure",
                "message" => "",
                "data" => $e,
            ]);
        }






    }


    /*
        Updates the Role details such as description, title
    */
    public function updateRoleDetails($role_id, $updated_role_name, $updated_role_description, $updated_permissions_array){

             $update_role = Role::find($role_id);

            if(($update_role)->exists()){

                dd($update_role);

            }






    }

    /*
        Updates the permissions for the given Role

    */
    public function updatePermissions_ForGivenRole(){

    }

    public function deleteRole(){

    }

    public function createPermission(){

    }

    /*
        Get Permission details such as description, title
    */
    public function getPermissionDetails(){

    }

    /*
        Updates the Permission details such as description, title
    */
    public function updatePermissionDetails(){

    }

    public function deletePermission(){

    }

    /*
        Assign roles for the given array of users.
        This also handles updates
    */
    public function assignRoleToUsers(){

    }



}
