<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\VmtEmployeePaySlip;
use App\Models\Compensatory;
use App\Models\User;
use App\Imports\VmtPaySlip;
use App\Services\VmtEmployeePayCheckService;


/*




*/
class VmtPayCheckController extends Controller
{
     public function showPaycheckDashboard(Request $request){
        $id = auth()->user()->id;
        $data =  DB::table('vmt_employee_details')
                ->join('vmt_employee_office_details','vmt_employee_office_details.user_id','=','vmt_employee_details.userid')
                ->join('vmt_employee_payslip','vmt_employee_payslip.user_id','=','vmt_employee_details.userid')
                ->where('vmt_employee_details.userid', auth()->user()->id)->orderBy('vmt_employee_payslip.created_at', 'DESC')
                ->get();

        if($data->count() != 0)
        {

            foreach ($data as $key => $value) {
                // code...
        // dd($value->epfemployer);
            $dataVmtHome = [];
            $dataVmtHome['NET_TAKE_HOME'] = $value->NET_TAKE_HOME ?? "" ;
            $dataVmtHome['TOTAL_DEDUCTIONS'] = $value->TOTAL_DEDUCTIONS ?? "" ;
            $dataVmtHome['TOTAL_CON'] = $value->TOTAL_DEDUCTIONS+$value->NET_TAKE_HOME ?? "" ;
            $dataVmtHome['epfemployer'] = $value->epfemployer ?? "" ;
            $dataVmtHome['your_employee'] = $value->epfemployee ?? "" ;
            $dataVmtHome['TOTAL_FIXED_GROSS'] = $value->TOTAL_FIXED_GROSS ?? "" ;
            $dataVmtHome['dob'] = $value->dob ?? "" ;
            $json_PayCheck = json_encode($dataVmtHome);
            }

        // dd($data)
            $compensatory =  Compensatory::where('user_id', auth()->user()->id)->first();
            $result['CTC'] = 0;
            $result['TOTAL_EARNED_GROSS'] = 0;
            $result['TOTAL_DEDUCTIONS'] = 0;
            $result['BASIC'] = 0;
            $result['HRA'] = 0;
            $result['TOTAL_FIXED_GROSS'] = 0;
            $result['EPFR'] = 0;
            $result['TOTAL_PF_WAGES'] = 0;

            if ($data && $data[0]) {
                $result['CTC'] = $data[0]->CTC;
                $result['TOTAL_EARNED_GROSS'] = $data[0]->TOTAL_EARNED_GROSS;
                $result['TOTAL_DEDUCTIONS'] = $data[0]->TOTAL_DEDUCTIONS;
                $result['BASIC'] = $data[0]->BASIC;
                $result['HRA'] = $data[0]->HRA;
                $result['TOTAL_FIXED_GROSS'] = $data[0]->TOTAL_FIXED_GROSS;
                $result['EPFR'] = $data[0]->EPFR;

                $result['BASIC'] = $data[0]->BASIC;
                $result['HRA'] = $data[0]->HRA;
                $result['NET_TAKE_HOME'] = $data[0]->NET_TAKE_HOME;
                $result['PAYROLL_MONTH'] = $data[0]->PAYROLL_MONTH;
            }
            foreach($data as $d) {
                //$result['TOTAL_PF_WAGES'] += $d->PF_WAGES;
                $result['TOTAL_PF_WAGES'] += 0;
            }

            return view('paycheckDashboard' , compact('data', 'result', 'compensatory','json_PayCheck'));

        }
        else
        {
            //dd("no payslip data");

            return view('nodata_payCheckDashboard');

        }


    }


    public function getEmployeePayslipDetailsAsHTML(Request $request, VmtEmployeePayCheckService $employeePayCheckService){

        $user_code = null;

        //If empty, then show current user profile page
        if (empty($request->uid)) {
            $user_code = $request->user_code;
        } else {
            $user_code = User::find(Crypt::decryptString($request->uid))->user_code;
            //dd("Enc User details from request : ".$user);
        }

        return $employeePayCheckService->getEmployeePayslipDetailsAsHTML($user_code, $request->month, $request->year);
    }

    public function getEmployeePayslipDetailsAsPDF(Request $request, VmtEmployeePayCheckService $employeePayCheckService){

        $user_code = null;

        //If empty, then show current user profile page
        if (empty($request->uid)) {
            $user_code = $request->user_code;
        } else {
            $user_code = User::find(Crypt::decryptString($request->uid))->user_code;
            //dd("Enc User details from request : ".$user);
        }


        return $employeePayCheckService->getEmployeePayslipDetailsAsPDF($user_code, $request->month, $request->year);
    }

    public function sendMail_employeePayslip(Request $request, VmtEmployeePayCheckService $employeePayCheckService){
        return $employeePayCheckService->sendMail_employeePayslip($request->user_code, $request->month, $request->year);
    }


        /*
        Get all payslip details of all employees for the given month, year.
        Contains entire payslip detail for the given month

    */
    public function getAllEmployeesPayslipDetails(Request $request, VmtEmployeePayCheckService $employeePaySlipService){

        return $employeePaySlipService->getAllEmployeesPayslipDetails($request->month , $request->year);
    }


    public function updatePayslipReleaseStatus(Request $request, VmtEmployeePayCheckService $employeePaySlipService){

        return $employeePaySlipService->updatePayslipReleaseStatus($request->user_code , $request->month,$request->year, $request->status);

   }

   public function getEmployeeAllPayslipList(Request $request, VmtEmployeePayCheckService $employeePaySlipService){
        $user_code = null;

        //If empty, then show current user profile page
        if (empty($request->uid)) {
            $user_code = auth()->user()->user_code;
        } else {
            $user_code = User::find(Crypt::decryptString($request->uid))->user_code;
            //dd("Enc User details from request : ".$user);
        }

        return $employeePaySlipService->getEmployeeAllPayslipList($user_code);

   }


    /*
        Fetch payslips for currently logged in user

    */
    public function showSalaryDetailsPage(Request $request) {

        try{

         $enc_user_id = Crypt::encryptString(auth()->user()->id);

         $data =  DB::table('vmt_employee_payslip')
             ->where('vmt_employee_payslip.user_id', auth()->user()->id)->orderBy('PAYROLL_MONTH', 'DESC')
             ->get();


         if($data->count()!=0)
         {

             $compensatory =  Compensatory::where('user_id', auth()->user()->id)->first();
             $result['CTC'] = 0;
             $result['TOTAL_EARNED_GROSS'] = 0;
             $result['TOTAL_DEDUCTIONS'] = 0;
             $result['BASIC'] = 0;
             $result['HRA'] = 0;
             $result['TOTAL_FIXED_GROSS'] = 0;
             $result['EPFR'] = 0;
             $result['TOTAL_PF_WAGES'] = 0;

             if ($data && $data[0]) {
                 $result['CTC'] = $data[0]->CTC;
                 $result['TOTAL_EARNED_GROSS'] = $data[0]->TOTAL_EARNED_GROSS;
                 $result['TOTAL_DEDUCTIONS'] = $data[0]->TOTAL_DEDUCTIONS;
                 $result['BASIC'] = $data[0]->BASIC;
                 $result['HRA'] = $data[0]->HRA;
                 $result['TOTAL_FIXED_GROSS'] = $data[0]->TOTAL_FIXED_GROSS;
                 $result['EPFR'] = $data[0]->EPFR;

                 $result['BASIC'] = $data[0]->BASIC;
                 $result['HRA'] = $data[0]->HRA;
                 $result['NET_TAKE_HOME'] = $data[0]->NET_TAKE_HOME;
                 $result['PAYROLL_MONTH'] = $data[0]->PAYROLL_MONTH;
             }
             foreach($data as $d) {
                 $result['TOTAL_PF_WAGES'] += (int)$d->PF_WAGES;
             }

             return view('vmt_salary_details', compact('data', 'result', 'compensatory','enc_user_id'));

         }
         else
         {
             return view('vmt_nodata_salaryDetails');

         }
        }
        catch(\Exception $e){
            dd("showSalaryDetailsPage : ".$e);
        }

     }


     public function showInvestmentsPage(Request $request){
        return view('vmt_investments');

     }

     public function showForm16Page(Request $request){
        return view('vmt_form16');

     }

}
