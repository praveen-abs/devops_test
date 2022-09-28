<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\VmtOrgRoles;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = VmtOrgRoles::all();
        return $roles;
    }

    // public function permissionListForRoles($id){
    //     $role = Role::find($id);
    //     $pList =  $role->getAllPermissions();
    //     $pArry = [];
    //     foreach ($pList as $key => $value) {
    //         // code...
    //         $pArry[] = $value->name;
    //     }
    //     return $pArry;
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = VmtOrgRoles::all();
        return view('vmt_createEditRoles', compact('roles'));
    }


    // assign roles view
    public function assignRoles()
    {

        $users = User::all();
        $roles = VmtOrgRoles::all();
        return view('vmt_assignRoles', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = VmtOrgRoles::create(['name' => $request->name, 'is_active' => 1]);
        return "Role saved";
    }


    public function assignRolesToUser(Request $request){
        $role = VmtOrgRoles::find($request->role_id);
        $user = User::find($request->user_id);
        $user->org_role =$role->id;
        $user->save();
        return "Assigned";
    }

    // Delete Roles
    public function deleteRoles(Request $request)
    {
        //
        VmtOrgRoles::find($request->id)->delete();
        return 'Role Deleted';
        dd($request->all());
    }
}
