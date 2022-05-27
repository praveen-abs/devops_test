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
        $selfData      =   User::select('id', 'name')->where('id', $id)->first();
        $userHierarchy   =   VmtEmployeeHierarchy::where('user_id', $id)->get();
        if($userHierarchy->count() > 0){
            $childIds    =   $userHierarchy->pluck('child_nodes');
            $parentIds   =   $userHierarchy->pluck('parent_id');
            //$parentArray =   [];
            \Log::error('parent');
            \Log::error($parentIds);
            if($parentIds[0] != null){
               $parentData =   User::select('id', 'name')->where('id', $parentIds[0])->first();
            }
            //$selfData    =   User::select('id', 'name')->where('id')->first(); 
            $childArray  = [];  
            $childData   =   User::select('id', 'name')->whereIn('id', $childIds)->get();
            
            foreach ($childData as $key => $value) {
                // code...
                $childArray[] = array(
                                    "text" => array( "name" => $value->name ),
                                    "_json_id" => $value->id
                                );
            }

           
            if(isset($parentData)){
                $reponseArray =  array(
                    "text"     => array( "name" => $parentData->name ),
                    "_json_id" => $parentData->id,
                    "children" => array(
                        array(
                            "text" => array("name" => $selfData->name),
                            "_json_id" => $selfData->id,
                            "children" => $childArray,
                        )
                    )
                );    
                \Log::error('----------------');
                \Log::error($reponseArray);
                \Log::error('---------------');
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
        


        if($parentId->count() == 0){
            $parentId           =   VmtEmployeeHierarchy::where('child_nodes', $id)->pluck('user_id');
        }

        $nodeArray          =   [];
        $parentData    =   User::select('id', 'name')->whereIn('id', $parentId)->get();
        $childrenData     =   User::select('id', 'name')->whereIn('id', $childrenIds)->get();


        $childrenArray = [];
        foreach ($childrenData as $key => $value) {
            // code...
            $childrenArray[] = array("text" => array("name" => $value->name));
        }

        $selfArray = array("text" =>array("name" => $selfData->name), "children" => $childrenArray);

        $structuredData  = array(
            "text" => array("name" => $parentData[0]->name), 
            "children" => $selfArray,
        );

        return $structuredData; 
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
