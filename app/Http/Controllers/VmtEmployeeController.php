<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployeeHierarchy;
use App\Models\VmtEmployee;
use App\Imports\VmtEmployee as VmtEmployeeImport;

class VmtEmployeeController extends Controller
{
    //
    public function index(Request $request){
        $users  = User::all();
        return view('vmt_view_employee_hierarchy', compact('users'));
    }

    //
    public function showEmployeeDirectory(Request $request){
        $vmtEmployees = VmtEmployee::all();
        return view('vmt_employeeDirectory', compact('vmtEmployees'));
    }

    //
    public function getChildForUser($id, Request $request){
        $childrenIds  =  VmtEmployeeHierarchy::where('user_id', $id)->pluck('child_nodes');
        return $childrenIds;
    }

    //
    public function create(){
        $users  = User::all();
        $edit   = true;
        return view('vmt_create_modify_employee_hierarchy', compact('users', 'edit'));
    }

    public function edit(){
        $users  = User::all();
        $edit   = true;
        return view('vmt_create_modify_employee_hierarchy', compact('users', 'edit'));
    }

    public function viewHierarchy($id){
        $selfData        =   User::select('id', 'name')->where('id', $id)->first();
        $userHierarchy   =   VmtEmployeeHierarchy::where('user_id', $id)->get();
        if($userHierarchy->count() > 0){
            $childIds    =   $userHierarchy->pluck('child_nodes');
            $parentIds   =   $userHierarchy->pluck('parent_id');

            if($parentIds[0] != null){
               $parentData =   User::select('id', 'name')->where('id', $parentIds[0])->first();
            }

            $childArray  = [];  
            $childData   =   User::select('id', 'name')->whereIn('id', $childIds)->get();
            
            foreach ($childData as $key => $value) {
                $childArray[] = array( "text" => array( "name" => $value->name ), "_json_id" => $value->id);
            }
           
            if(isset($parentData)){
                $reponseArray   =  array(
                    "text"      => array( "name" => $parentData->name ),"_json_id" => $parentData->id,
                    "children"  => array(
                        array(
                            "text"      => array("name" => $selfData->name),
                            "_json_id"  => $selfData->id, "children" => $childArray,
                        )
                    )
                );
                return $reponseArray;
            }else{
                return array(
                    "text"     => array( "name" => $selfData->name ),
                    "_json_id" => $selfData->id,
                    "children" => $childArray
                );  
            }
            return array('child' => $childIds, 'parent' => $parentIds, "self_id" => $id);
        }else{
            return array(
                "text"     => array( "name" => $selfData->name ),
                "_json_id" => $selfData->id,
                "children" => []
            ); 
        }
    }

    // 
    public function store(Request $request){
        $prevChilds = VmtEmployeeHierarchy::where('user_id', $request->parent)->get();
        foreach ($prevChilds as $key => $value) {
            $value->delete();
        }

        $parentNode  = VmtEmployeeHierarchy::where('child_nodes', $request->parent)->first();
        //dd($parentNode);
        if($parentNode){
            $parentId  = $parentNode->user_id; 
        }else{
            $parentId  = null;
        }
        if($request->has('childs')){
            $childrenList   = $request->childs;
            $totalChild     = count($childrenList);
            if($totalChild > 0){
                foreach ($childrenList as $key => $childVal) {
                    // code...
                    $newHierarchy              = new VmtEmployeeHierarchy; 
                    $newHierarchy->user_id     = $request->parent;
                    $newHierarchy->child_nodes = $childVal;
                    $newHierarchy->child_count = $totalChild;
                    $newHierarchy->parent_id    = $parentId;
                    $newHierarchy->save();
                }
            }
            return "Saved";
        }else{
            return "Please select node";
        }
       
    }

    //
    public function getChildrenList($id)
    {
        // code...
        return VmtEmployeeHierarchy::where('user_id', $id)->get();
    }

    // store employee details in DB
    public function storeEmployeeData(Request $request){
        dd($request->all());
    }


    // show bulk upload form
    public function bulkUploadEmployee(Request $request){
        return view('vmt_uploadEmployees');
    }

    // store employeess from excel sheet to database
    public function storeBulkEmployee(Request $request){
        $importDataArry = \Excel::import(new VmtEmployeeImport, request()->file('file'));
        return "Processed";
    }
}
