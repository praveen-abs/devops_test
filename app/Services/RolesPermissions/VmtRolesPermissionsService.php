<?php

namespace App\Services;

use App\Models\VmtPermissionModule;
use App\Models\VmtPermodulePermission;
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

        // try{

          $all_permission_in_database = Permission::join('vmt_permodule_permission','vmt_permodule_permission.permission_id','=','permissions.id')
                                                    ->join('vmt_permission_module','vmt_permission_module.id','=','vmt_permodule_permission.per_module_id')
                                                    ->get([
                                                        'permissions.id as key',
                                                        'vmt_permission_module.id as module_id',
                                                        'vmt_permission_module.module_name as label',
                                                        'permissions.name',
                                                    ])->toArray();
                                                    // dd($all_permission_in_database);
                    $count = 0;                             // ->groupBy('label');
                foreach($all_permission_in_database as $single_details){

                    if (!array_key_exists($single_details["label"], $all_permission_in_database)) {

                        $all_permission_in_database[$single_details["label"]]=array();
                        array_push($all_permission_in_database[$single_details["label"]],$single_details);


                }
                unset($all_permission_in_database[$count]);
                $count++;





        //   return response()->json([
        //     "status" => "success",
        //     "message" => "",
        //     "data" => $all_permission_in_database
        //     ]);
        // }
        // catch (\Exception $e) {
        //     return response()->json([
        //         "status" => "failure",
        //         "message" => "Error while fetching permission ",
        //         "data" => $e,
        //     ]);
        // }

    }
    dd($all_permission_in_database);
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

        $validator = Validator::make(
            $data = [
                'role_id' => $role_id,
                'updated_role_name' => $updated_role_name,
                'updated_role_description' => $updated_role_description
            ],
            $rules = [
                'role_id' => 'required|exists:roles,id',
                'updated_role_name' => 'required',
                'updated_role_description' => 'required'
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
             $update_role = Role::find($role_id);

            if(($update_role)->exists()){
                $update_role->name = $updated_role_name ;
                $update_role->save();
            }

             $updated_description = VmtRolesDescription::where('roles_id',$role_id)->first();

                if(($updated_description)->exists()){
                    $updated_description->description = $updated_role_description ;
                    $updated_description->save();
                }

                return response()->json([
                    "status" => "success",
                    "message" =>"Updated successfully",
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
        Updates the permissions for the given Role

    */
    public function updatePermissions_ForGivenRole(){

    }

    public function deleteRole($role_id){

        $validator = Validator::make(
            $data = [
                'role_id' => $role_id,
            ],
            $rules = [
                'role_id' => 'required|exists:roles,id',
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
            $del_description = VmtRolesDescription::where('roles_id',$role_id)->first();
            $del_description->delete();

            $del_role = Role::find($role_id);
            $del_role->delete();

            return response()->json([
                "status" => "success",
                "message" =>"Deleted successfully",
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

    public function createPermission($permission_name, $permission_module){

        $validator = Validator::make(
            $data = [
                'permission_name' => $permission_name,
                'permission_module' => $permission_module,
            ],
            $rules = [
                'permission_name' => 'required',
                'permission_module' => 'required',
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
        //    $per_exist =  Permission::where('name',$permission_name)->first();
           $permodule_exist = VmtPermissionModule::where('module_name', $permission_module)->first();

           if(!empty($permodule_exist)){

            $create_permission = Permission::create(['name'=>$permission_name , 'guard_name'=>"web"]);
            VmtPermodulePermission::create(['per_module_id'=>$permodule_exist->id,'permission_id'=>$create_permission->id]);

           }else{

                    $create_permission = Permission::create(['name'=>$permission_name]);

                    $create_module = VmtPermissionModule::create(['module_name'=>$permission_module]);

                    VmtPermodulePermission::create(['per_module_id'=>$create_module->id,'permission_id'=>$create_permission->id]);
           }


             return response()->json([
                "status" => "success",
                "message" =>"Saved successfully",
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


        // $role_name ="master";
        // $role_permission = array("MANAGE_PAYSLIPS_can_view","MANAGE_PAYSLIPS_release_payslip");
        // $role_description = "worst";

        // $role_Exist  = Role::where('name',$role_name);

        //  if($role_Exist->exists()){

        //       $roles_des =  $role_Exist->first();
        //       VmtRolesDescription::create(['roles_id'=>$roles_des->id,'description'=>$role_description]);
        //       foreach($role_permission as $single_permission){
        //       $roles_des->givePermissionTo($single_permission);

        //     }

        //  }else{

        // $role1 = Role::create(['name' =>$role_name]);
        // VmtRolesDescription::create(['roles_id'=>$role1->id,'description'=>$role_description]);
        // foreach($role_permission as $single_permission){
        // $role1->givePermissionTo($single_permission);

        //     }

        // }


        // return "syn role permission";







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

    public function deletePermission($permission_id){


    }

    /*
        Assign roles for the given array of users.
        This also handles updates
    */
    public function assignRoleToUsers($user_code , $role_name){

        $validator = Validator::make(
            $data = [
                'user_code' => $user_code,
                'role_name' => $role_name,
            ],
            $rules = [
                'user_code' => 'required|exists:users.user_code',
                'role_name' => 'required|exists:roles.name',
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

        $user_code = User::where('user_code',$user_code);

        $user = $user_code->first();
        $user->assignRole($role_name);

        return response()->json([
            "status" => "success",
            "message" =>"Emp assign to role",
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



}
