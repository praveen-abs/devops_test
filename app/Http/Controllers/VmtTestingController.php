<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Imports\VmtPaySlip;
use App\Models\User;
use App\Models\VmtClientMaster;
use App\Models\VmtEmployeeAttendance;
use App\Models\VmtEmployeeLeaves;
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use PDF;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\VmtGeneralInfo;
use Illuminate\Support\Facades\Storage;
use App\Services\VmtEmployeeService;
use Attribute;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class VmtTestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /*
        Download private file.

     */
    public function downloadPrivateFile()
    {
        $private_file = "employee/emp_B090/documents/voterIdB090_22-03-2023 15-47-22.jpg";

        //dd(Storage::disk('private')->allFiles());
        // return Storage::disk('private')->download($private_file);
    }

    /*
       View private file such as image

    */
    public function viewPrivateFile()
    {
        $private_file = "employee/emp_B090/documents/voterIdB090_22-03-2023 15-47-22.jpg";

        return response()->file(storage_path('uploads/' . $private_file));
    }

    public function testingpdf()
    {
        $client_name = 'brandavatar';
        $viewfile_appointmentletter = 'vmt_appointment_templates.mailtemplate_appointmentletter_' . $client_name;
        $html =  view($viewfile_appointmentletter);

        $pdf = new Dompdf();
        $pdf->loadHtml($html, 'UTF-8');
        //    dd($pdf);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream($client_name . '.pdf');
    }
    public function fileUploadingTest(Request $request)
    {
        dd($request->all());
        $emp_code = 'SA300';
        $date = date('d-m-Y H-i-s');
        $fileName = 'aadhar_' . $emp_code . '_' . $date . '.' . $request->file->extension();
        $path = 'employee/emp_';

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $emp_document_path = Storage::disk('private');

        dd(File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true));
        if (!$emp_document_path->exists('Emp_code')) {
            File::makeDirectory('storage/app/uploads/Emp_code', 0777, true, true);
        }
        $filePath =  $request->file->storeAs('Emp_code', $fileName, 'private');
        // $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
        // $fileModel->file_path = '/storage/' . $filePath;
        // $fileModel->save();
        return back()
            ->with('success', 'File has been uploaded.')
            ->with('file', $fileName);
    }

    public function viewpdf()
    {
        $pathToFile = storage_path('uploads\employee\emp_B090\documents/' . "voterIdB090_21-03-2023 12-32-42.png");
        //$pathToFile = public_path('images/'.'avatar_SA100_2023-01-18_05_57_46pm.JPG');

        // if(!File::exists($pathToFile)){
        //     abort(404);
        // }else{
        //     $file = File::get( $pathToFile);
        //     $type = File::mimeType($pathToFile);
        //     $response = Response::make($file, 200);
        //     $response->header("Content-Type", $type);
        // }

        $base64 = base64_encode($pathToFile);
        $image_data = 'data:' . mime_content_type($pathToFile) . ';base64,' . $base64;
        // dd( $image_data);
        return view('testing', compact('pathToFile', 'image_data', 'base64'));
    }


    public function retriveFiles(Request $request)
    {
        $pathToFile = storage_path('uploads\employee\emp_B090\documents/' . "voterIdB090_21-03-2023 12-32-42.png");
        //     dd( $pathToFile);
        //     dd(Storage::disk('local')->getAdapter()->applyPathPrefix('\employee\emp_B090\documents'));
        //     dd(Storage::disk('private')->path(''));
        //     dd(Storage::disk('private')->getAdapter()->setprefixer());
        //     dd(Storage::disk('private')->get('voterIdB090_21-03-2023 12-32-42.png'));
        //      //dd(Storage::disk('private')->directories('employee/emp_B090') );
        //    dd(Storage::disk('D:\Laravelworks\lara_abs_pms\storage\uploads\employee\emp_B090\documents')->exists('voterIdB090_21-03-2023 12-32-42.png'));
        //  dd((Storage::get($pathToFile)));
        return $pathToFile;
    }

    /*
        Send appointment letter as PDF attachement in email


    */
    public function mailTest_sendAppointmentLetter(Request $request, VmtEmployeeService $employeeService)
    {

        $to_email = $request->email;
        $employeeData = array();

        //Add dummy data
        $employeeData['employee_name'] = "TestUser";
        $employeeData['employee_code'] = "ABS001";
        $employeeData['email'] = "karthigaiselvan28072000@gmail.com";

        $employeeData['basic'] = 10000;
        $employeeData['hra'] = 10000;
        $employeeData['special_allowance'] = 10000;
        $employeeData["basic"]  = 10000;
        $employeeData["statutory_bonus"] = 10000;
        $employeeData["child_education_allowance"]  = 10000;
        $employeeData["food_coupon"]  = 10000;
        $employeeData["lta"]  = 10000;
        $employeeData["special_allowance"]  = 10000;
        $employeeData["other_allowance"] = 10000;
        $employeeData['epf_employer_contribution'] = 10000;
        $employeeData['esic_employer_contribution'] = 10000;
        $employeeData['gross_monthly'] = 10000;
        $employeeData["epf_employer_contribution"] = 10000;
        $employeeData["professional_tax"] = 10000;
        $employeeData["net_income"] = 10000;

        $response = $employeeService->attachAppointmentLetterPDF($employeeData);

        return $response;
    }


    public function george_GetMonthAttendance(Request $request)
    {

        //Get all vmt_employee_attendance	 data
        // $response = VmtEmployeeAttendance::all();
        // $response = VmtEmployeeAttendance::where('user_id','142')
        //                                     ->whereMonth('date','11')
        //                                     ->get();

        $getDatas = [];

        // $response=VmtEmployeeAttendance::get();
        // $response = VmtEmployeeAttendance::select('user_id', 'date')->where('user_id', '142')->whereMonth('date', '10')->get();
        // $response=VmtEmployeeAttendance::where('user_id','142')->first();
        // $response=VmtEmployeeAttendance::where('user_id','142')->value('date');
        // $response = VmtEmployeeAttendance::find('2');
        // $response=VmtEmployeeAttendance::where('user_id','142');
        // $response = VmtEmployeeAttendance::where('user_id', '142')->count();
        // $response = VmtEmployeeLeaves::where('user_id', '142')->count();
        // $getDatas['approvedCount'] = VmtEmployeeLeaves::select('start_date')->where('user_id', '142')->where('status', 'approved')->count();
        // $getDatas['approved'] = VmtEmployeeLeaves::select('start_date')->where('status', 'approved')->whereMonth('start_date', 10)->count();
        // $getDatas['getLeaveAtt'] = User::select('name')->get();
        // $response = VmtEmployeeLeaves::where('user_id', '142')->whereMonth('start_date',12)->count();
        // $response = VmtEmployeeAttendance::select('user_id', 'date');
        // $response = VmtEmployeeAttendance::select('user_id', 'date')->where('user_id', '142');
        // $getDatas['getLeaveAtt'] = User::select('name')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->whereMonth('start_date', 10)->get();
        // $response = User::select('name', 'start_date')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', 142)->whereMonth('start_date', 10)->get();
        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', 142)->whereMonth('start_date', 10)->get();
        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', 142)->whereMonth('start_date', '>=', Carbon::now()->month)->whereMonth('start_date', '<=', Carbon::now()->month)->get();
        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', 142)->whereMonth('start_date', '>=', Carbon::now()->month)->get();
        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', 142)->whereMonth('start_date', '>=', Carbon::now()->month)->whereMonth('start_date', '<=', Carbon::now()->month)->get();
        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->whereDate('start_date')->where('users.id','=', 142)->get();

        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id','=',142);
        // $getDatas = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', '=', 142);
        // $response = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', '=', 142);

        // get types of leaves
        // $getDatas['getDataByApproved'] = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', '=', 142)->get();
        // $getDatas['getDataByLeaveType'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')->where('status', 'approved')->where('users.id', '=', 144)->get()->count();
        // $getDatas['getDataByLeaveType'] = User::select('name', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', 'approved')->where('users.id', '=', 142);
        $getDatas['getDataByLeaveType'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')
            ->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('status', 'approved')->where('users.id', '=', 144)
            ->get();
        $getDatas = [];
        $getDatas['getLeaveData'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')
            ->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('users.id', '=', 144)
            ->where('status', 'approved');

        $onDuty_leaves = $getDatas['getLeaveData']->where('leave_type', 'On Duty')->get();
        $earned_eaves = $getDatas['getLeaveData']->where('leave_type', 'Earned Leave')->get();
        $permission = $getDatas['getLeaveData']->where('leave_type', 'Permission')->get();
        $paternity_leave = $getDatas['getLeaveData']->where('leave_tyspe', 'Paternity Leave')->get();
        $maternity_leave = $getDatas['getLeaveData']->where('leave_type', 'Maternity Leave')->get();
        $compensatory_off = $getDatas['getLeaveData']->where('leave_type', 'Compensatory Off')->get();




        // $getDatas['getDataByPermission'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')->where('status', 'approved')->where('leave_type', 'Permission')->where('users.id', '=', 144)->get();
        // $getDatas['getDataByPaternityLeave'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')->where('status', 'approved')->where('leave_type', 'Paternity Leave')->where('users.id', '=', 144)->get();
        // $getDatas['getDataByMaternityLeave'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')->where('status', 'approved')->where('leave_type', 'Maternity Leave')->where('users.id', '=', 144)->get();
        // $getDatas['getDataByCompensatoryOff'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')->where('status', 'approved')->where('leave_type', 'Compensatory Off')->where('users.id', '=', 144)->get();
        // $getDatas['getDataByLeavePermission'] = User::select('name', 'leave_type', 'start_date', 'end_date', 'status')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')->where('status', 'approved')->where('leave_type','Permission')->where('users.id', '=', 144)->get();

        $getDatas['getDataAbsent'] = User::select('name', 'checkin_time', 'start_date', 'end_date', 'status')->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->where('status', '=', 'approved')->where('checkin_time', '=', ' ')->where('users.id', '=', 145)->get();
        // $count = count($response);
        // dd($count);
        // dd($response->toArray());

        // dd($response);
        dd($getDatas, $compensatory_off, $maternity_leave, $onDuty_leaves, $earned_eaves, $permission, $paternity_leave);
        // dd($getDatas);
        // return $response;
        // return $getDatas;
    }


    public function employeeDashboard(Request $req)
    {
        $storeQuery = [];

        $storeQuery['whereCheckName'] = User::select('name')->where('name', 'HARIPRIYA')->get();
        $storeQuery['like'] = User::select('name')->where('name', 'like', '%a')->get();
        $storeQuery['getById'] = User::select('id')->where('name', '=', 'HARIPRIYA')->get();
        $storeQuery['<>'] = User::select('name')->where('name', '<>', 'HARIPRIYA')->where('id', '=', '100')->get();
        $storeQuery['firstUserLeave'] = User::join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')->select('users.id', 'users.name')->where('users.name', '=', 'HARIPRIYA')->first();
        $storeQuery['findUserLeaveSpecific'] = User::join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->where('users.name', '=', 'HARIPRIYA')
            ->find(173);
        $storeQuery['findUserLeaveSpecific'] = User::pluck('name');
        $plucks = User::pluck('name');

        foreach ($plucks as $plu) {
            $store = [];
            $store = $plu;
            echo  $store;
        }

        $getDatas = [];
        $getDatas['getLeaveData'] = User::select('name', 'leave_type', 'leave_type_id', 'start_date', 'end_date', 'status')
            ->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->join('vmt_leaves', 'vmt_leaves.id', '=', 'vmt_employee_leaves.leave_type_id')
            ->where('users.id', '=', 160)
            ->where('status', 'Approved');


        // $casual_or_sick = $getDatas['getLeaveData']->where('leave_type_id', '=', 1)->get();
        $earned = $getDatas['getLeaveData']->where('leave_type_id', '=', 2)->get();
        // $maternity = $getDatas['getLeaveData']->where('leave_type_id', '=', 3)->get();
        // $paternity = $getDatas['getLeaveData']->where('leave_type_id', '=', 4)->get();
        // $onDuty = $getDatas['getLeaveData']->where('leave_type_id', '=', 6)->get();
        // $permission = $getDatas['getLeaveData']->where('leave_type_id', '=', 7)->get();
        // $compensatory_off = $getDatas['getLeaveData']->where('leave_type_id', '=', 9)->get();



        $getDatas['getDataAbsent'] = User::select('name', 'checkin_time', 'start_date', 'end_date', 'status')
            ->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->join('vmt_employee_attendance', 'vmt_employee_attendance.user_id', '=', 'users.id')
            ->whereMonth('start_date', Carbon::now()->month)
            ->whereMonth('date', Carbon::now()->month)
            ->orWhere('checkin_time', '=', '')
            ->orWhere('status', '=', '')
            ->where('users.id', '=', 160)->get()->count();


        dd($storeQuery, $getDatas, $earned);
        // dd($storeQuery, $getDatas, $casual_or_sick,  $earned, $maternity, $paternity,  $onDuty, $permission, $compensatory_off);

        return $req;
    }



    public function hrDashboard(Request $request)
    {
        $hr_dashboard = [];

        // $current_date = Carbon::now()->toDateTimeLocalString();
        $current_date = Carbon::now();
        $countDays = 31;
        // $current_date = explode('-', $current_date);
        // $current_date=$current_date[0];
        // $current_date=$current_date[1];
        // $current_date=$current_date[2];

        $newEmployeeCount = User::join('vmt_employee_details', 'vmt_employee_details.userid', 'users.id')
            ->whereRaw('DATEDIFF(?,vmt_employee_details.doj)<=?', [$current_date, $countDays])
            ->where('is_ssa', 0)->get()->count();

        // $futureJoiners = User::join('vmt_employee_details', 'vmt_employee_details.userid', 'users.id')
        //     ->whereRaw('DATEDIFF(?,vmt_employee_details.doj)>=?', [$current_date, $countDays])
        //     ->where('is_ssa', 0)->get()->count();
        $futureJoiners = User::where('is_onboarded', 0)->where('active', 0)->where('is_ssa', 0)->get()->count();
        $leftEmployeeCount = User::where('is_onboarded', 1)
            ->where('active', -1)->where('is_ssa', 0)->get()->count();



        $Notifications = [];
        $Notifications = User::where('users.id', 160);


        $leaveRequest = $Notifications->join('vmt_employee_leaves', 'vmt_employee_leaves.user_id', '=', 'users.id')
            ->join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id')
            ->select('name', 'designation', 'leaverequest_date', 'status', 'avatar')
            ->where('status', 'Pending')
            ->get();





        // get total employees
        $hr_dashboard['totalEmployees'] = User::where('is_ssa', 0)->get()->count();
        $hr_dashboard['employeeName'] = User::where('is_ssa', 1)->value('name');



        // updateSesson
        dd($hr_dashboard, $current_date, $newEmployeeCount,  $futureJoiners, $leftEmployeeCount, $Notifications, $leaveRequest);




        return $request;
    }


    public function teamOfEmployee(Request $request)
    {

        $employees = [];
        $employees['totalEmployees'] = User::join('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'users.id');
        $employees_details = $employees['totalEmployees']
            ->select('name', 'designation', 'avatar')
            ->where('designation', 'Associate Partner ')->get();
        // $employees_count = $employees_details->count();
        $employees_count = count($employees_details);

        dd($employees_details, $employees_count);
        return $request;
    }


    public function currentLogin()
    {
        return $query = User::where()->value('name');
    }


    // public function updateSessionVariable($client_id)
    // {
    //     if(empty($client_id)){
    //         session()->put('client_id',VmtClientMaster::first()->id);
    //     }
    //     else{
    //         $find_id=VmtClientMaster::find($client_id);
    //         session()->put('$client_id',$find_id->id);
    //     }

    // }
}
