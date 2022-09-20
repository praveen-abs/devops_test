<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtGeneralInfo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class VmtOrgTreeController extends Controller
{

    public function index()
    {
        return view('vmt_view_employee_hierarchy');
    }


    public function getLogoLevelOrgTree(Request $request)
    {
        $t_user_code = 0;

        if(Auth::user()->is_admin == 1)
        {
            //Get the top-most node
            $t_user_id = VmtEmployeeOfficeDetails::where('l1_manager_code','=','')
                                                ->orWhereNull('l1_manager_code')
                                                ->value('user_id');

            $t_user_code = User::where('id',$t_user_id)->value('user_code');
            //dd($t_user_code);
        }
        else
        {
            //Get the current node
            $t_user_code = Auth::user()->user_code;
        }

        $data           = $this->getUserNodeDetails($t_user_code);
        $vmtGeneralInfo = VmtGeneralInfo::first();
        $logoSrc        = asset($vmtGeneralInfo->logo_img);

        $logoNode  = array("image" => $logoSrc, "relationship" => "011", "user_code" => "ADMIN001", "name" =>"", "className" => "logo-level");

        $data['collapsed'] = false;
        $logoNode['children'] = array($data);
        return $logoNode;
    }

    public function getTwoLevelOrgTree($user_code, Request $request)
    {

        $data = $this->getUserNodeDetails($user_code);

        if($this->hasChildNodes($user_code))
            $data['children'] =$this->getChildrenForUser( $data['user_code'])['children'];

        /*
         * Grouping the node based on the department wise if department filter is set on
         * request
        */
        if(request()->get('department')){
            $childNodeObj       =  collect($data['children']);
            $db_departmentNodes =  $childNodeObj->groupBy('department')->all();
            $dArray  = [];
            // convert each db obj to node structure
            foreach($db_departmentNodes as $key => $deptNodes ){
                $j= 0;
                foreach ($deptNodes as $nodeKey => $value) {
                    // code...
                    $dArray[$j] = $value;
                    $j++;
                }
            }
            $data['children']  = $dArray;
        }

        return $data;
    }

    public function getParentForUser($user_code)
    {

    }

    public function getSiblingsForUser($user_code)
    {

    }

    public function getChildrenForUser($user_code){

        $childnode_array['children'] =[];

        if($this->hasChildNodes($user_code))
        {
            //get the child nodes of the given parent node
            $db_childNodes = $this->fetch_childrenForGivenUser($user_code);


            /*
             * Grouping the node based on the department wise if department filter is set on
             * request
            */
            if(request()->get('department')){

                $j = 0;

                // grouping children based on the department
                $db_departmentNodes =  $db_childNodes->groupBy('department_id')->all();
                $dArray  = [];

                foreach($db_departmentNodes as $key => $deptNodes ){
                    $depArray  = [];
                    // convert each db obj to node structure
                    foreach ($deptNodes as $value) {
                        // code...
                        $depArray[] = $this->getUserNodeDetails($value->user_code);
                    }
                    $dArray[$j] = array("name" => $key, "className" => "dept-level","relationship" => "111","children" => $depArray);
                    $j++;
                }
                $childnode_array['children']  = $dArray;
            }
            else{
                $i = 0;
                $t_array = [];
                //Convert each db obj to node structure
                foreach($db_childNodes as $singleDBChild)
                {
                    $t_array[$i] = $this->getUserNodeDetails($singleDBChild->user_code);
                    $i++;
                }
                $childnode_array['children']  = $t_array;
            }
        }

       //dd(json_encode($data));

       return $childnode_array;
    }


    /*
         Return a tree node data for a given user_code

    */
    private function getUserNodeDetails($user_code)
    {
        $data = array();

        $t_data['relationship']=['0','0','0']; //parent,sibling,child

        //get the given node's username,designation
        $user_data = User::where('user_code',$user_code)->where('is_admin','0')->get();
        $data['name'] = $user_data->value('name');
        $data['user_code'] = $user_data->value('user_code');
        $data['image'] = asset('images/'.$user_data->value('avatar'));
        $data['designation'] =  VmtEmployeeOfficeDetails::where('user_id',$user_data->value('id'))->value('designation');

        $data['department'] =  VmtEmployeeOfficeDetails::where('user_id',$user_data->value('id'))->value('department_id');

        ////Check if it has any parent,sibling,child nodes and relationship node

            //check parent node
            $this->hasParentNode($user_code) ? $t_data['relationship'][0]='1' : '';

            //check siblings node
            $this->hasSiblingsNode($user_code) ? $t_data['relationship'][1]='1' : '';

            //check child nodes
            $this->hasChildNodes($user_code) ? $t_data['relationship'][2]='1' : '';

        $data['relationship'] = implode($t_data['relationship']);

        return $data;
    }


    private function hasParentNode($user_code)
    {
        if(count ( $this->fetch_parentForGivenUser($user_code)) > 0)
            return true;
        else
            return false;
    }

    private function hasSiblingsNode($user_code)
    {
        if(count ( $this->fetch_siblingsForGivenUser($user_code)) > 0)
            return true;
        else
            return false;
    }

    private function hasChildNodes($user_code)
    {
        if(count ( $this->fetch_childrenForGivenUser($user_code)) > 0)
            return true;
        else
            return false;
    }

    ///// DB related methods /////

    private function fetch_childrenForGivenUser($user_code)
    {
        $children = User::leftJoin('vmt_employee_office_details','users.id','=','vmt_employee_office_details.user_id')
                            ->leftJoin('vmt_employee_details','users.id','=','vmt_employee_details.userid')
                            ->where('users.is_admin','0')
                            ->where('vmt_employee_office_details.l1_manager_code',$user_code)
                            ->select('users.name','users.id','users.user_code','vmt_employee_office_details.designation', 'vmt_employee_office_details.department_id')
                            ->get();

        return $children;
    }

    private function fetch_parentForGivenUser($user_code)
    {
        $userid = User::where('user_code',$user_code)->value('id');
        $parent_user_code = VmtEmployeeOfficeDetails::where('user_id',$userid)->value('l1_manager_code');

        $parent = User::where('user_code',$parent_user_code)->get();

        return $parent;
    }

    private function fetch_siblingsForGivenUser($user_code)
    {
        $userid = User::where('user_code',$user_code)->value('id');
        $parent_user_code = VmtEmployeeOfficeDetails::where('user_id',$userid)->value('l1_manager_code');

        $siblings = $this->fetch_childrenForGivenUser($parent_user_code);

        return $siblings;
    }


}
