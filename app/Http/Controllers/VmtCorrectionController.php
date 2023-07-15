<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtEmployeeReimbursements;
use App\Models\User;
use App\Models\VmtDocuments;
use App\Models\VmtEmployeeDocuments;
use App\Models\VmtEmployeePayroll;
use App\Models\VmtClientMaster;
use App\Models\VmtPayroll;
use App\Models\VmtEmployeeWorkShifts;
use App\Models\VmtEmployeePaySlipV2;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeeLeaves;
use App\Models\VmtStaffAttendanceDevice;
use App\Models\VmtEmployee;
use App\Models\VmtEmployeeStatutoryDetails;
use App\Models\VmtBloodGroup;
use App\Models\VmtMaritalStatus;
use App\Models\Bank;
use App\Models\Compensatory;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtWorkShifts;
use Carbon\Carbon;
Use Exception;

class VmtCorrectionController extends Controller
{
    public function processsExpense(Request $request)
    {
        $reimbursement_details = VmtEmployeeReimbursements::select('id', 'vehicle_type_id', 'distance_travelled', 'total_expenses')
            ->get();
        foreach ($reimbursement_details as $single_details) {
            if ($single_details->vehicle_type_id == 1) {
                $totalExpense = 3.5 * $single_details->distance_travelled;
                $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                $UpdateDetails->total_expenses = $totalExpense;
                $UpdateDetails->save();
            } else if ($single_details->vehicle_type_id == 2) {
                $totalExpense = 6 * $single_details->distance_travelled;
                $UpdateDetails = VmtEmployeeReimbursements::where('id', '=',  $single_details->id)->first();
                $UpdateDetails->total_expenses = $totalExpense;
                $UpdateDetails->save();
                // dd('---------------');

                //  dd( $single_details);
            }
        }
        return  $reimbursement_details;
    }

    public function addingReimbursementsDataForSpecificMonth(Request $request)
    {
        $existing_data = VmtEmployeeReimbursements::where('user_id', $request->user_id)
            ->whereMonth('date', $request->month)
            ->get()->toArray();
        $response = array();
        foreach ($existing_data as $single_data) {
            try {
                $new_record = new VmtEmployeeReimbursements;
                $new_record->user_id = $single_data['user_id'];
                $new_record->reimbursement_type_id = $single_data['reimbursement_type_id'];
                $new_record->date = Carbon::parse($single_data['date'])->addMonth()->toDateString();
                $new_record->reviewer_id = $single_data['reviewer_id'];
                $new_record->status = 'Pending';
                $new_record->from = $single_data['from'];
                $new_record->to = $single_data['to'];
                $new_record->vehicle_type_id = $single_data['vehicle_type_id'];
                $new_record->distance_travelled = $single_data['distance_travelled'];
                $new_record->total_expenses = $single_data['total_expenses'];
                $new_record->save();
                $response = array_merge($response, array(Carbon::parse($single_data['date'])->addMonth()->toDateString() => $new_record->toArray()));
            } catch (\Exception $e) {
                dd($e);
            }
        }

        return $response;
    }
    public function  checkallemployeeonboardingstatus()
    {

        $query_all_users_details = User::get();
        try {
            foreach ($query_all_users_details as $single_user_data) {
                //get the mandatory document id
                $mandatory_doc_ids = VmtDocuments::where('is_mandatory', '1')->pluck('id');

                //get the employees uploaded documents mandatory id
                $user_uploaded_docs_ids = VmtEmployeeDocuments::whereIn('doc_id', $mandatory_doc_ids)
                    ->where('vmt_employee_documents.user_id', $single_user_data->id)
                    ->pluck('doc_id');

                if (count($mandatory_doc_ids) == count($user_uploaded_docs_ids)) {
                    //set the onboard status to 1
                    $currentUser = User::where('id', $single_user_data->id)->first();
                    $currentUser->is_onboarded = '1';
                    $currentUser->save();
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function  addAllEmployeePayslipDetails()
    {

        /*Get all employee payslip details */

        $query_all_payslip = VmtEmployeePaySlip::all();

        /* save single payrollmonth in vmt_payroll*/
        $emp_payroll_month = VmtEmployeePaySlip::whereYear('created_at', '2022')->orwhereYear('created_at', '2023')->distinct('created_at')->orderBy('PAYROLL_MONTH', 'ASC')->pluck('PAYROLL_MONTH');

        $client_details_id = VmtClientMaster::get("id");

        foreach ($client_details_id as $key => $singleclient) {

            foreach ($emp_payroll_month as $key => $singlepayrollmonth) {
                $Payroll_data = VmtPayroll::where('client_id', $singleclient->id)->where('payroll_date', $singlepayrollmonth)->first();
                if (empty($Payroll_data)) {
                    $query_payroll = new Vmtpayroll;
                    $query_payroll->client_id = $singleclient->id;
                    $query_payroll->payroll_date = $singlepayrollmonth;
                    $query_payroll->save();
                }
            }
        }



        /* save user id and payroll id in the table vmt_emp_payroll*/
        foreach ($query_all_payslip as $key => $singleuserdata) {
            $client_id = User::where('id', $singleuserdata->user_id)->first()->client_id;
            $payroll_id = VmtPayroll::where('payroll_date', $singleuserdata->PAYROLL_MONTH)
                ->where('client_id', $client_id)->first()->id;
            $emp_payroll_data = VmtEmployeePayroll::where('payroll_id', $payroll_id)->where('user_id', $singleuserdata->user_id)->first();
            if (empty($emp_payroll_data)) {
                $query_payroll_data = new VmtEmployeePayroll;
                $query_payroll_data->user_id = $singleuserdata->user_id;
                $query_payroll_data->payroll_id = $payroll_id;
                $query_payroll_data->save();
            }
        }
        /*save all employee payslip details in vmt_employee_payslipv2 */

        foreach ($query_all_payslip as $key => $singlepayslipdetails) {

            $client_id = User::where('id', $singlepayslipdetails->user_id)->first()->client_id;
            $payroll_id = VmtPayroll::where('payroll_date', $singlepayslipdetails->PAYROLL_MONTH)
                ->where('client_id', $client_id)->first()->id;
            $emp_payroll_id = VmtEmployeePayroll::where('user_id', $singlepayslipdetails->user_id)->where('payroll_id', $payroll_id)->first()->id;

            /*get payroll id from vmt_emp_payroll in order to filter payroll_date and find emp_payroll_id */
            $emp_payslip_data = VmtEmployeePaySlipV2::where('emp_payroll_id', $emp_payroll_id)->first();
            if (empty($emp_payslip_data)) {
                $emppayslip = new VmtEmployeePaySlipV2;
                $emppayslip->emp_payroll_id = $emp_payroll_id;
                $emppayslip->basic = $singlepayslipdetails->BASIC;
                $emppayslip->hra = $singlepayslipdetails->HRA;
                $emppayslip->child_edu_allowance = $singlepayslipdetails->CHILD_EDU_ALLOWANCE;
                $emppayslip->spl_alw = $singlepayslipdetails->SPL_ALW;
                $emppayslip->total_fixed_gross = $singlepayslipdetails->TOTAL_FIXED_GROSS;
                $emppayslip->month_days = $singlepayslipdetails->MONTH_DAYS;
                $emppayslip->worked_Days = $singlepayslipdetails->Worked_Days;
                $emppayslip->arrears_Days = $singlepayslipdetails->Arrears_Days;
                $emppayslip->lop = $singlepayslipdetails->LOP;
                $emppayslip->earned_basic = $singlepayslipdetails->Earned_BASIC;
                $emppayslip->basic_arrear = $singlepayslipdetails->BASIC_ARREAR;
                $emppayslip->earned_hra = $singlepayslipdetails->Earned_HRA;
                $emppayslip->hra_arrear = $singlepayslipdetails->HRA_ARREAR;
                $emppayslip->earned_child_edu_allowance = $singlepayslipdetails->Earned_CHILD_EDU_ALLOWANCE;
                $emppayslip->child_edu_allowance_arrear = $singlepayslipdetails->CHILD_EDU_ALLOWANCE_ARREAR;
                $emppayslip->earned_spl_alw = $singlepayslipdetails->Earned_SPL_ALW;
                $emppayslip->spl_alw_arrear = $singlepayslipdetails->SPL_ALW_ARREAR;
                $emppayslip->overtime = $singlepayslipdetails->Overtime;
                $emppayslip->total_earned_gross = $singlepayslipdetails->TOTAL_EARNED_GROSS;
                $emppayslip->pf_wages = $singlepayslipdetails->PF_WAGES;
                $emppayslip->pf_wages_arrear = $singlepayslipdetails->PF_WAGES_ARREAR_EPFR;
                $emppayslip->epfr = $singlepayslipdetails->EPFR;
                $emppayslip->epfr_arrear = $singlepayslipdetails->EPFR_ARREAR;
                $emppayslip->edli_charges = $singlepayslipdetails->EDLI_CHARGES;
                $emppayslip->edli_charges_arrears = $singlepayslipdetails->EDLI_CHARGES_ARREARS;
                $emppayslip->pf_admin_charges = $singlepayslipdetails->PF_ADMIN_CHARGES;
                $emppayslip->pf_admin_charges_arrears = $singlepayslipdetails->PF_ADMIN_CHARGES_ARREARS;
                $emppayslip->employer_esi = $singlepayslipdetails->EMPLOYER_ESI;
                $emppayslip->employer_lwf = $singlepayslipdetails->Employer_LWF;
                $emppayslip->ctc = $singlepayslipdetails->CTC;
                $emppayslip->epf_ee = $singlepayslipdetails->EPF_EE;
                $emppayslip->epf_ee_arrear = $singlepayslipdetails->EPF_EE_ARREAR;
                $emppayslip->employee_esic = $singlepayslipdetails->EMPLOYEE_ESIC;
                $emppayslip->prof_tax = $singlepayslipdetails->PROF_TAX;
                $emppayslip->income_tax = $singlepayslipdetails->income_tax;
                $emppayslip->sal_adv = $singlepayslipdetails->SAL_ADV;
                $emppayslip->canteen_dedn = $singlepayslipdetails->CANTEEN_DEDN;
                $emppayslip->other_deduc = $singlepayslipdetails->OTHER_DEDUC;
                $emppayslip->lwf = $singlepayslipdetails->LWF;
                $emppayslip->total_deductions = $singlepayslipdetails->TOTAL_DEDUCTIONS;
                $emppayslip->net_take_home = $singlepayslipdetails->NET_TAKE_HOME;
                $emppayslip->rupees = $singlepayslipdetails->Rupees;
                $emppayslip->el_opn_bal = $singlepayslipdetails->EL_Opn_Bal;
                $emppayslip->availed_el = $singlepayslipdetails->Availed_EL;
                $emppayslip->balance_el = $singlepayslipdetails->Balance_EL;
                $emppayslip->sl_opn_bal = $singlepayslipdetails->SL_Opn_Bal;
                $emppayslip->availed_sl = $singlepayslipdetails->Availed_SL;
                $emppayslip->balance_sl = $singlepayslipdetails->Balance_SL;
                $emppayslip->greetings = $singlepayslipdetails->Greetings;
                $emppayslip->travel_conveyance = $singlepayslipdetails->travel_conveyance;
                $emppayslip->other_earnings = $singlepayslipdetails->other_earnings;
                $emppayslip->save();
            }
        }
    }


    public function addElbalancewithjsonString(Request $request)
    {
        $data = '[{"user_code": "DM001","el_balance": 15},{ "user_code": "DM002", "el_balance": 15},
        {
         "user_code": "DM003",
         "el_balance": 15
        },
        {
         "user_code": "DM004",
         "el_balance": 15
        },
        {
         "user_code": "DM006",
         "el_balance": 5.5
        },
        {
         "user_code": "DM007",
         "el_balance": 6
        },
        {
         "user_code": "DM009",
         "el_balance": 10.5
        },
        {
         "user_code": "DM012",
         "el_balance": 8.5
        },
        {
         "user_code": "DM016",
         "el_balance": 15
        },
        {
         "user_code": "DM018",
         "el_balance": 6
        },
        {
         "user_code": "DM019",
         "el_balance": 9.5
        },
        {
         "user_code": "DM021",
         "el_balance": 1
        },
        {
         "user_code": "DM022",
         "el_balance": 5
        },
        {
         "user_code": "DM024",
         "el_balance": 9
        },
        {
         "user_code": "DM026",
         "el_balance": 8.5
        },
        {
         "user_code": "DM028",
         "el_balance": 6
        },
        {
         "user_code": "DM029",
         "el_balance": 9
        },
        {
         "user_code": "DM032",
         "el_balance": 5
        },
        {
         "user_code": "DM034",
         "el_balance": 12
        },
        {
         "user_code": "DM038",
         "el_balance": 9.5
        },
        {
         "user_code": "DM045",
         "el_balance": 6.5
        },
        {
         "user_code": "DM054",
         "el_balance": 15
        },
        {
         "user_code": "DM059",
         "el_balance": 5
        },
        {
         "user_code": "DM069",
         "el_balance": 13
        },
        {
         "user_code": "DM071",
         "el_balance": 11
        },
        {
         "user_code": "DM079",
         "el_balance": 8.5
        },
        {
         "user_code": "DM088",
         "el_balance": 6
        },
        {
         "user_code": "DM091",
         "el_balance": 3
        },
        {
         "user_code": "DM094",
         "el_balance": 8
        },
        {
         "user_code": "DM095",
         "el_balance": 7
        },
        {
         "user_code": "DM101",
         "el_balance": 5
        },
        {
         "user_code": "DM103",
         "el_balance": 6
        },
        {
         "user_code": "DM104",
         "el_balance": 5
        },
        {
         "user_code": "DM106",
         "el_balance": 9
        },
        {
         "user_code": "DM107",
         "el_balance": 4
        },
        {
         "user_code": "DM109",
         "el_balance": 8
        },
        {
         "user_code": "DM110",
         "el_balance": 7
        },
        {
         "user_code": "DM112",
         "el_balance": 14
        },
        {
         "user_code": "DM113",
         "el_balance": 6
        },
        {
         "user_code": "DM115",
         "el_balance": 7
        },
        {
         "user_code": "DM117",
         "el_balance": 2
        },
        {
         "user_code": "DM118",
         "el_balance": 12.5
        },
        {
         "user_code": "DM120",
         "el_balance": 9
        },
        {
         "user_code": "DM122",
         "el_balance": 6
        },
        {
         "user_code": "DM123",
         "el_balance": 6
        },
        {
         "user_code": "DM124",
         "el_balance": 7
        },
        {
         "user_code": "DM125",
         "el_balance": 5
        },
        {
         "user_code": "DM127",
         "el_balance": 8.5
        },
        {
         "user_code": "DM128",
         "el_balance": 6
        },
        {
         "user_code": "DM131",
         "el_balance": 5
        },
        {
         "user_code": "DM134",
         "el_balance": 6
        },
        {
         "user_code": "DM140",
         "el_balance": 7
        },
        {
         "user_code": "DM141",
         "el_balance": 8.5
        },
        {
         "user_code": "DM145",
         "el_balance": 9
        },
        {
         "user_code": "DM146",
         "el_balance": 7
        },
        {
         "user_code": "DM148",
         "el_balance": 9
        },
        {
         "user_code": "DM149",
         "el_balance": 10
        },
        {
         "user_code": "DM150",
         "el_balance": 8
        },
        {
         "user_code": "DM151",
         "el_balance": 5.5
        },
        {
         "user_code": "DM153",
         "el_balance": 8
        },
        {
         "user_code": "DM154",
         "el_balance": 6
        },
        {
         "user_code": "DM156",
         "el_balance": 9
        },
        {
         "user_code": "DM159",
         "el_balance": 5
        }
       ]';

        $data = preg_replace('/\s+/', '', $data);
        $el_balance_json = json_decode($data, true);
        $leave_type_id = 1;
        foreach ($el_balance_json as $single_user) {
            $user_id = User::where('user_code', $single_user['user_code'])->first();
            if ($user_id == null) {
                dd($single_user['user_code'] . ' does not exists in database');
            } else {

                try {


                    $employee_leave = new VmtEmployeeLeaves;
                    $employee_leave->user_id = $user_id->id;
                    $employee_leave->leave_type_id =   $leave_type_id;
                    $employee_leave->start_date = '2022-06-01';
                    $employee_leave->end_date = '2022-06-10';
                    $employee_leave->total_leave_datetime = $single_user['el_balance'];
                    $employee_leave->status = 'Approved';
                    $employee_leave->save();
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }
        }

        return 'Leave Balance Added Sucessfully';
    }

    public function changeAttendanceBioMatricIdToHrmsUserid(Request $request)
    {
        $dunamis = '[
            {
             "attendance_id": "DMC026",
             "user_id": "DM161"
            },
            {
             "attendance_id": "DMC027",
             "user_id": "DM162"
            },
            {
             "attendance_id": "DMC028",
             "user_id": "DM163"
            },
            {
             "attendance_id": "DMC032",
             "user_id": "DM165"
            },
            {
             "attendance_id": "DMC034",
             "user_id": "DM166"
            },
            {
             "attendance_id": "DMC035",
             "user_id": "DM167"
            },
            {
             "attendance_id": "DMC041",
             "user_id": "DM169"
            },
            {
             "attendance_id": "DMC042",
             "user_id": "DM170"
            },
            {
             "attendance_id": "DMC049",
             "user_id": "DM172"
            },
            {
             "attendance_id": "DMC050",
             "user_id": "DM173"
            },
            {
             "attendance_id": "DMC051",
             "user_id": "DM175"
            },
            {
             "attendance_id": "DMC053",
             "user_id": "DM174"
            },
            {
             "attendance_id": "DMC054",
             "user_id": "DM176"
            },
            {
             "attendance_id": "DMC056",
             "user_id": "DM177"
            },
            {
             "attendance_id": "DMC057",
             "user_id": "DM178"
            },
            {
             "attendance_id": "DMC062",
             "user_id": "DM179"
            },
            {
             "attendance_id": "DMC063",
             "user_id": "DM180"
            },
            {
             "attendance_id": "DMC064",
             "user_id": "DM181"
            },
            {
             "attendance_id": "DMC066",
             "user_id": "DM182"
            },
            {
             "attendance_id": "DMC65",
             "user_id": "DM183"
            },
            {
             "attendance_id": "DMC067",
             "user_id": "DM184"
            },
            {
             "attendance_id": "DMC078",
             "user_id": "DM185"
            }
           ]';

        //Removing Extra Spaace and white space in string
        $dunamis = preg_replace('/\s+/', '',   $dunamis);
        $dunamis = json_decode($dunamis, true);
        $not_existed_user = array('The Give User IDS Does Not Exists In DataBase Please Check Ur Json data');
        $not_existed_attedance_id = array('The Give Attendance IDS Does Not Exists In DataBase Please Check Ur Json data');
        $update_ids = array('Scuessfully Updated');
        foreach ($dunamis as $single_id) {
            if (User::where('user_code', $single_id['user_id'])->exists()) {
                if (VmtStaffAttendanceDevice::where('user_Id', $single_id['attendance_id'])->exists()) {

                    try {
                        $staff_attedance = VmtStaffAttendanceDevice::where('user_Id', $single_id['attendance_id'])
                            ->update(['user_Id' => $single_id['user_id']]);
                        array_push($update_ids, $single_id['user_id']);
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                } else {
                    array_push($not_existed_attedance_id, $single_id['attendance_id']);
                }
            } else {
                array_push($not_existed_user, $single_id['user_id']);
            }
        }

        return response()->json([
            'not_existed_user' => $not_existed_user,
            'not_existed_attedance_id' =>  $not_existed_attedance_id,
            'update_ids' =>  $update_ids
        ]);
    }


    //Adding Work Shift for dunamis
    public function addingWorkShiftForAllEmployees(Request $request)
    {
        $number_of_flexi_shift = 3;
        $all_employees = User::where('is_ssa', 0)->get();
        foreach ($all_employees as $single_employee) {
            if (
                $single_employee->user_code == 'DM054' || $single_employee->user_code == 'DM145' || $single_employee->user_code == 'DM178' ||
                $single_employee->user_code == 'DM176' || $single_employee->user_code == 'DM183'
            ) {
                try {
                    $employee_work_shift = new VmtEmployeeWorkShifts;
                    $employee_work_shift->user_id = $single_employee->id;
                    $employee_work_shift->work_shift_id = 2;
                    $employee_work_shift->is_active = 1;
                    $employee_work_shift->flexi_shift_status=0;
                    $employee_work_shift->save();
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            } else if ($single_employee->user_code == 'DM109') {
                try {
                    $employee_work_shift = new VmtEmployeeWorkShifts;
                    $employee_work_shift->user_id = $single_employee->id;
                    $employee_work_shift->work_shift_id = 3;
                    $employee_work_shift->is_active = 1;
                    $employee_work_shift->flexi_shift_status=0;
                    $employee_work_shift->save();
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            } else if (
                $single_employee->user_code == 'DM182' || $single_employee->user_code == 'DM150' || $single_employee->user_code == 'DM179' || $single_employee->user_code == 'DM095' ||
                $single_employee->user_code == 'DMC101' || $single_employee->user_code == 'DMC136' || $single_employee->user_code == 'DMC133' || $single_employee->user_code == 'DMC129' || $single_employee->user_code == 'DM019' ||
                $single_employee->user_code == 'DM165' || $single_employee->user_code == 'DM153' || $single_employee->user_code == 'DM170' || $single_employee->user_code == 'DMC069' || $single_employee->user_code == 'DM045'
            ) {
                for ($i = 1; $i <= $number_of_flexi_shift; $i++) {
                    try {
                        $employee_work_shift = new VmtEmployeeWorkShifts;
                        $employee_work_shift->user_id = $single_employee->id;
                        $employee_work_shift->work_shift_id = VmtWorkShifts::where('shift_name', 'Shift ' .$i)->first('id')->id;
                        $employee_work_shift->is_active = 1;
                        $employee_work_shift->flexi_shift_status=1;
                        $employee_work_shift->save();
                    } catch (Exception $e) {
                        dd($e->getMessage());
                    }
                }
            } else {
                try {
                    $employee_work_shift = new VmtEmployeeWorkShifts;
                    $employee_work_shift->user_id = $single_employee->id;
                    $employee_work_shift->work_shift_id = 1;
                    $employee_work_shift->is_active = 1;
                    $employee_work_shift->flexi_shift_status=0;
                    $employee_work_shift->save();
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            }
        }

        return "Employee Work Shift Added";
    }
//update all employee master data

  public function updateMasterdataUploads(){

        return view('vmt_MasterEmployeedata_Upload');

    }

    public function importMasetrEmployeesExcelData(Request $request)
    {

        $validator =    Validator::make(
            $request->all(),
            ['file' => 'required|file|mimes:xls,xlsx'],
            ['required' => 'The :attribute is required.']
        );


        if ($validator->passes()) {

                $importDataArry = \Excel::toArray(new VmtMasterImport, request()->file('file'));
                //DD($importDataArry );
                return $this->storeMasterdEmployeesData($importDataArry);
        } else {
            $data['failed'] = $validator->errors()->all();
            return response()->json($data);
        }

    }

    private function storeMasterdEmployeesData($data)
    {

        ini_set('max_execution_time', 300);
        //For output jsonresponse
        $data_array = [];
        $isAllRecordsValid = true;

        $rules = [];
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $data;
        $currentRowInExcel = 0;
        if(empty($excelRowdata_row )){
            return $rowdata_response = [
                'status' => 'failure',
                'message' => 'Please fill the excel',
            ];

        }else{
        foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {

            $currentRowInExcel++;

            //Validation
            $rules = [
                'employee_code' =>'required|exists:users,user_code' ,
                'name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'email' => 'required',
                'doj' => 'nullable|required_unless:doj,!=,NULL&date',
                'dob' => 'nullable|required_unless:doj,!=,NULL&date&before:-18 years',
                'epf_number' => 'required',
                'esic_number' => 'nullable|required_unless:esic_number,!=,NULL&numeric',
                'uan_number' => 'nullable|required_unless:uan_number,!=,NULL&numeric',
                'pan_number' => 'nullable|required_unless:pan_number,!=,NULL&regex:/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u',
                'aadhar_number' => 'required|required_unless:aadhar_number,!=,NULL&regex:/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u',
                'mobile_number' => 'nullable|required_unless:mobile_number,!=,NULL&regex:/^([0-9]{10})?$/u&numeric',
                'father_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'mother_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                //'martial_status' => 'nullable|exists:vmt_marital_status,name',
                'martial_status' => ['nullable',
                        function ($attribute, $value, $fail) {

                            if($value !== 'NULL'){
                                $result =VmtMaritalStatus::where('name',$value)->first();

                                if (empty($result)) {
                                    $fail($value .'<b>:doesnt exist in application.Kindly create one' );
                                }
                            }
                        },
                    ],
                'spouse_name' => 'nullable|required_unless:marital_status,Unmarried&regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                //'blood_group' =>'nullable|required_unless:blood_group,!=,NULL&exists:vmt_bloodgroup,name&regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                'blood_group' => ['nullable',
                        function ($attribute, $value, $fail) {

                            if($value !== 'NULL'){
                                $result =VmtBloodGroup::where('bank_name',$value)->first();

                                if (empty($result)) {
                                    $fail($value .'<b>:doesnt exist in application.Kindly create one' );
                                }
                            }
                        },
                    ],
               // 'bank_name' => 'nullable|required_unless:bank_name,!=,null&exists:vmt_banks,bank_name',
                'bank_name' => ['nullable',
                        function ($attribute, $value, $fail) {

                            if($value !== 'NULL'){
                                $result =Bank::where('bank_name',$value)->first();

                                if (empty($result)) {
                                    $fail($value .'<b>:doesnt exist in application.Kindly create one' );
                                }
                            }
                        },
                    ],
                'bank_ifsc_code' => 'required|required_unless:bank_ifsc_code,!=,NULL&regex:/(^([A-Z]){4}0([A-Z0-9]){6}?$)/u',
                'bank_account_number' => 'nullable|required_unless:blood_group,!=,NULL&numeric',
                'current_address' => 'required',
                'basic' => 'required|numeric',
                'hra' => 'required|numeric',
                'statutory_bonus' => 'required|numeric',
                'child_education_allowance' => 'required|numeric',
                'lta' => 'required|numeric',
                'transport_allowance' => 'required|numeric',
                'medical_allowance' => 'required|numeric',
                'education_allowance' => 'required|numeric',
                'other_allowance' => 'required|numeric',
                'gross' => 'required|numeric',
                'epf_employer_contribution' => 'required|numeric',
                'epf_employee_contribution' => 'required|numeric',
                'esic_employer_contribution' => 'required|numeric',
                'insurance' => 'required|numeric',
                'professional_tax' => 'required|numeric',
                'labour_welfare_fund' => 'required|numeric',
                'net_income' => 'required|numeric',
                'dearness_allowance' => 'required|numeric',

            ];

            $messages = [
                'numeric' => 'Field <b>:attribute</b> should be numeric',
                'date' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
                'in' => 'Field <b>:attribute</b> should have the following values : :values .',
                'required' => 'Field <b>:attribute</b> is required',
                'regex' => 'Field <b>:attribute</b> is invalid',
                'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                'unique' => 'Field <b>:attribute</b> should be unique',
                'dob.before' => 'Field <b>:attribute</b> should be above 18 years',
                'email' => 'Field <b>:attribute</b> is invalid',
                'pan_no.required_if' =>'Field <b>:attribute</b> is required if <b>pan ack</b> not provided ',
                'pan_ack.required_if' =>'Field <b>:attribute</b> is required if <b>pan no</b> not provided ',
                'required_unless' => 'Field <b>:attribute</b> is invalid',
                'exists' => 'Field <b>:attribute</b> doesnt exist in application.Kindly create one',

            ];

            $validator = Validator::make($excelRowdata, $rules, $messages);

            if (!$validator->passes()) {

                $rowDataValidationResult = [
                    'row_number' => $currentRowInExcel,
                    'status' => 'failure',
                    'message' => 'In Excel Row - '.$excelRowdata['employee_code'].' : ' . $currentRowInExcel . ' has following error(s)',
                    'error_fields' => json_encode($validator->errors()),
                ];

                array_push($data_array, $rowDataValidationResult);

                $isAllRecordsValid = false;
            }
        }
        } //for loop

        //Runs only if all excel records are valid
        if ($isAllRecordsValid) {
            foreach ($excelRowdata_row[0]  as $key => $excelRowdata) {
                $rowdata_response = $this->storeSingleRecord_MasterEmployee($excelRowdata);

                array_push($data_array, $rowdata_response);
            }
            return  $responseJSON = [
                'status' => $rowdata_response['status'],
                'message' => "Excelsheet data import success",
                'mail_status' => $rowdata_response['mail_status'] ?? "failure",
                'data' =>$data_array,
                'error_data' =>$rowdata_response['data']
            ];

        } else {

            return  $responseJSON = [
                'status' =>'failure',
                'message'=> "Please fix the below excelsheet data",
                'data' => $data_array
            ];

        }

        return response()->json($responseJSON);
    }

      /*

        $outputArray should be passed from parent function.
    */
    private function storeSingleRecord_MasterEmployee($row)

    {
        //DB level validation

          try{

            $response = $this->Update_MasterEmployeeData(data: $row);

              $status =  $response['status'];

             if( $response['status'] == "success")
                $message =  $row['employee_code']  . ' added successfully';
             else
                $message =  $row['employee_code']  . ' has failed';

                    return  $rowdata_response = [

                        'status' => $response['status'],
                        'message' => $message,
                        'data' =>$response['data']
                    ];


            } catch(\Exception $e) {
                //dd($e);
               // $this->deleteUser($user->id);

               return $rowdata_response = [
                'status' => $status,
                'message' =>'',
                'data' =>  $e->getMessage(),
            ];
            }

        }
        private function Update_MasterEmployeeData($data){

            try{
     //dd($data);
                $data_count =count($data);
                $success_count =0;
                $failure_count =0;
                $failure_data = array();

                $user_id = User::where('user_code',$data['employee_code'])->where('active','<>','-1')->first();

                if(!empty($user_id)){

                    $user_id =$user_id->id;


                $update_Userdata = User::where('id',$user_id)->first();
                $update_Userdata->name = $data['name'];
                $update_Userdata->email = empty($data["email"]) ? '' : $data["email"];
                $update_Userdata->save();


                $update_employee_data =VmtEmployee::where('userid',$user_id)->first();
                $doj=$data["doj"] ?? '';
                $dob=$data["dob"] ?? '';
                $update_employee_data->doj   =  $doj ? $this->getdateFormatForDb($doj) : '';
                $update_employee_data->dob   =  $dob ? $this->getdateFormatForDb($dob) : '';
                $data_mobile_number = empty($data["mobile_number"]) ? "" : strval($data["mobile_number"]);
                $update_employee_data->mobile_number  = $data_mobile_number;
                $update_employee_data->aadhar_number = $data["aadhar_number"] ?? '';
                $update_employee_data->pan_number   =  isset($data["pan_number"]) ? ($data["pan_number"]) : " ";

                $martial_status_id =VmtMaritalStatus::where('name',ucfirst($data["martial_status"]))->first();
                $update_employee_data->marital_status_id =!empty($martial_status_id) ? $martial_status_id->id :'';

                $blood_group_id =VmtBloodGroup::where('name',$data["blood_group"])->first();
                $update_employee_data->blood_group_id  =  !empty($blood_group_id) ? $blood_group_id->id : '';

                $bank_id =Bank::where('bank_name',$data["bank_name"])->first();
                $update_employee_data->bank_id   = !empty($bank_id) ? $bank_id->id : '';

                $update_employee_data->bank_account_number  = $data["bank_account_number"] ?? '';
                $update_employee_data->bank_ifsc_code  = $data["bank_ifsc_code"] ?? '';
                $update_employee_data->current_address_line_1   = $data["current_address"] ?? '';
                $update_employee_data->save();


                if(!empty($data['father_name'])){
                    $emp_father_data = VmtEmployeeFamilyDetails::where('user_id',$user_id)->where('relationship','Father');

                    if($emp_father_data->exists()){

                        $emp_father_data=$emp_father_data->first();

                    }else{
                        $emp_father_data = new VmtEmployeeFamilyDetails;
                    }
                    $emp_father_data->name =   $data['father_name'];
                    $emp_father_data->save();
                }
                if(!empty($data['mother_name'])){

                    $emp_mother_data = VmtEmployeeFamilyDetails::where('user_id',$user_id)->where('relationship','Mother');

                    if($emp_mother_data->exists()){

                        $emp_mother_data=$emp_mother_data->first();

                    }else{
                        $emp_mother_data = new VmtEmployeeFamilyDetails;
                    }
                    $emp_mother_data->name =   $data['mother_name'];
                    $emp_mother_data->save();
                }
                if( !empty($data['spouse_name'])){

                    $emp_spouse_data = VmtEmployeeFamilyDetails::where('user_id',$user_id)->where('gender','Female')->where('relationship','Spouse');

                    if($emp_spouse_data->exists()){
                        $emp_spouse_data=$emp_spouse_data->first();
                        $emp_spouse_data->name =   $data['spouse_name'];
                        $emp_spouse_data->save();
                    }else{
                        $emp_spouse_data = new VmtEmployeeFamilyDetails;
                        $emp_spouse_data->name =   $data['spouse_name'];
                        $emp_spouse_data->save();
                    }
                    $emp_spouse_male_data = VmtEmployeeFamilyDetails::where('user_id',$user_id)->where('gender','male')->where('relationship','Spouse');

                    if($emp_spouse_male_data->exists()){
                        $emp_spouse_male_data=$emp_spouse_male_data->first();
                        $emp_spouse_data->name =   $data['spouse_name'];
                        $emp_spouse_data->save();
                    }else{
                        $emp_spouse_male_data = new VmtEmployeeFamilyDetails;
                        $emp_spouse_data->name =   $data['spouse_name'];
                        $emp_spouse_data->save();
                    }

                }

                $newEmployee_statutoryDetails =VmtEmployeeStatutoryDetails::where('user_id',$user_id);
                if($newEmployee_statutoryDetails->exists()){
                    $newEmployee_statutoryDetails=$newEmployee_statutoryDetails->first();
                }else{
                    $newEmployee_statutoryDetails=new VmtEmployeeStatutoryDetails;
                    $newEmployee_statutoryDetails->user_id = $user_id;
                }

                $newEmployee_statutoryDetails->uan_number = $data["uan_number"] ?? '';
                $newEmployee_statutoryDetails->epf_number = $data["epf_number"] ?? '';
                $newEmployee_statutoryDetails->esic_number = $data["esic_number"] ?? '';
                $newEmployee_statutoryDetails->save();

                $compensatory =Compensatory::where('user_id',$user_id)->first();
                $compensatory->basic = $data["basic"] ?? '';
                $compensatory->hra = $data["hra"] ?? '';
                $compensatory->Statutory_bonus = $data["statutory_bonus"] ?? '' ;
                $compensatory->child_education_allowance = $data["child_education_allowance"] ?? '' ;
                $compensatory->lta = $data["lta"] ?? '' ;
                $compensatory->transport_allowance = $data["transport_allowance"] ?? '' ;
                $compensatory->medical_allowance = $data["medical_allowance"] ?? '' ;
                $compensatory->education_allowance = $data["education_allowance"] ?? '' ;
                $compensatory->other_allowance = $data["other_allowance"] ?? '' ;
                $compensatory->gross = $data["gross"] ?? '' ;
                $compensatory->epf_employer_contribution = $data["epf_employer_contribution"] ?? '' ;
                $compensatory->epf_employee_contribution = $data["epf_employee_contribution"] ?? '' ;
                $compensatory->esic_employer_contribution = $data["esic_employer_contribution"] ?? '' ;
                $compensatory->insurance = $data["insurance"] ?? '' ;
                $compensatory->dearness_allowance = $data["dearness_allowance"] ?? '' ;
                $compensatory->professional_tax = $data["professional_tax"] ?? '' ;
                $compensatory->labour_welfare_fund = $data["labour_welfare_fund"] ?? '' ;
                $compensatory->net_income = $data["net_income"] ?? '' ;
                $compensatory->save();


            }
            return $response=([
                'status' => 'success',
                'message' =>'Master data updated successfully',
                'data' => ['success count '.$success_count,
                           ]
            ]);




            }catch(Exception $e){
                return $response = ([
                    'status' => 'failure',
                    'message' =>'error while upadateing master info',
                    'data' =>  $e->getMessage() .' error_line'.$e->getline(),
                ]);

            }

        }
        private function getdateFormatForDb($date){


            try{
                //Check if its in proper format
                $processed_date = \DateTime::createFromFormat('d-m-Y', $date);

                //If date is in 'd-m-y' format, then convert into one
                if( $processed_date)
                {
                    //Then convert to Y-m-d
                    $processed_date =  $processed_date->format('Y-m-d');

                }
                else
                {
                    //If date is not in 'd-m-y' format, then convert into 'd-m-y'

                    $processed_date = DateTime::createFromFormat('Y-m-d', $date);
                    $processed_date->format('Y-m-d');
                }

                return $processed_date;
            }
            catch(\Exception $e){
                return $response = ([
                    'status' => 'failure',
                    'message' =>'Error for input date',
                    'data' =>  $e->getMessage() .' error_line'.$e->getline(),
                ]);

            }
        }


}
