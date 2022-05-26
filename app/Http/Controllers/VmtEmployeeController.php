<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VmtEmployeeHierarchy;

class VmtEmployeeController extends Controller
{
    //
    public function index(Request $request){
        //$allNodes = VmtEmployeeHierarchy::all();

        $users  = User::all();
        return view('vmt_view_employee_hierarchy', compact('users'));
        dd($allNodes);
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
        //dd($id);
        $data['self']       =   User::select('id', 'name')->where('id', $id)->first();
        $parentId           =   VmtEmployeeHierarchy::where('user_id', $id)->pluck('parent_id');
        $childrenIds        =   VmtEmployeeHierarchy::where('user_id', $id)->pluck('child_nodes');
        if($parentId->count() == 0){
            $parentId           =   VmtEmployeeHierarchy::where('child_nodes', $id)->pluck('user_id');
        }

        $nodeArray          =   [];
        $data['parent']     =   User::select('id', 'name')->whereIn('id', $parentId)->get();
        $data['child']      =   User::select('id', 'name')->whereIn('id', $childrenIds)->get();
        return $data; 
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

}
