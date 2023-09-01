<?php

namespace App\Services;

use App\Models\Compensatory;
use App\Models\VmtEmpSalAdvDetails;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\VmtSalaryRevision;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtLoanInterestSettings;
use App\Models\VmtSalaryAdvSettings;
use Carbon\Carbon;
use App\Models\VmtEmpAssignSalaryAdvSettings;
use App\Models\VmtInterestFreeLoanTransaction;
use App\Models\VmtInterestFreeLoanSettings;
use App\Models\VmtEmployeeInterestFreeLoanDetails;
use App\Models\VmtEmpInterestLoanDetails;
use App\Models\VmtSalaryAdvanceMasterModel;
use App\Models\VmtSalAdvTransactionRecord;
use App\Models\VmtPayroll;
use App\Models\Department;
use App\Models\State;
use App\Models\Bank;
use Exception;
use App\Models\VmtClientMaster;
use Mail;
use App\Mail\ApproveRejectLoanAndSaladvMail;
use App\Models\VVmtInterestFreeLoanTransaction;
use App\Models\VmtLoanWithInterestTransactionRecord;
use App\Mail\ApproverejectloanMail;
use App\Mail\EmpApplyLoanMail;
use App\Mail\FinanceApproverejectloanMail;
use App\Mail\ManagerApproveloanMail;
use Symfony\Component\Mailer\Exception\TransportException;




class VmtSalaryRevisionService{

  public function getAllEmployeeData(){

        try{

            $employee_data = User::where('is_ssa','<>','1')->get(['id','name']);

            return $response = ([
                "status" => "success",
                "message" => "Data fetched successfully",
                "data" => $employee_data,
            ]);

        } catch (\Exception $e) {

        return $response = ([

            "status" => "failure",
            "message" => "error while fetch data",
            "data" => $e->getmessage(),

        ]);
     }
  }
  public function saveSalaryRevisionEmpData( $user_id,$frequency,$increment_on,$percentage,$amount,$effective_date,$reason, $process_type)
  {

        try{
             $client_id = VmtClientMaster::find(session('client_id'));

             if (!empty($client_id)){
                $client_id =$client_id->id;
             }

            $save_sal_rev_data = new VmtSalaryRevision;
            $save_sal_rev_data->user_id = $user_id;
            $save_sal_rev_data->client_id = $client_id;
            $save_sal_rev_data->frequency = $frequency;
            $save_sal_rev_data->increment_on = $increment_on;
            $save_sal_rev_data->percentage = $percentage;
            $save_sal_rev_data->amount = $amount;
            $save_sal_rev_data->effective_date = $effective_date;
            $save_sal_rev_data->reason = $reason;
            $save_sal_rev_data->process_type = $process_type;
            $save_sal_rev_data->save();


            $salary_revision_data = $this->getSalaryRevisiedEmplyeeDetails();

            return $response = ([
                "status" => "success",
                "message" => "Data saved successfully",
                "data" => $save_sal_rev_data,
            ]);

        } catch (\Exception $e) {

        return $response = ([

            "status" => "failure",
            "message" => "error while save data",
            "data" => $e->getmessage(),

        ]);
     }
  }

    public function getSalaryRevisiedEmplyeeDetails(){
        try{




                return $response = ([
                    "status" => "success",
                    "message" => "Data saved successfully",
                    "data" => "",
                ]);

        } catch (\Exception $e) {

            return $response = ([

                "status" => "failure",
                "message" => "error while fetch data",
                "data" => $e->getmessage(),

            ]);
        }

    }


}
