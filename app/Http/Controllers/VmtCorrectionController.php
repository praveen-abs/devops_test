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
use App\Models\VmtOrgTimePeriod;
use App\Models\AbsSalaryProjection;
use App\Models\abs;
use App\Models\Department;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\Compensatory;
use App\Models\VmtEmployeeFamilyDetails;
use App\Models\VmtWorkShifts;
use App\Imports\VmtMasterImport;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class VmtCorrectionController extends Controller
{
    public function processsExpense(Request $request)
    {
        $reimbursement_details = VmtEmployeeReimbursements::select('id', 'vehicle_type_id', 'distance_travelled', 'total_expenses')
            ->get();
        foreach ($reimbursement_details as $single_details) {
            if ($single_details->vehicle_type_id == 1) {
                $totalExpense = 3.5 * $single_details->distance_travelled;
                $UpdateDetails = VmtEmployeeReimbursements::where('id', '=', $single_details->id)->first();
                $UpdateDetails->total_expenses = $totalExpense;
                $UpdateDetails->save();
            } else if ($single_details->vehicle_type_id == 2) {
                $totalExpense = 6 * $single_details->distance_travelled;
                $UpdateDetails = VmtEmployeeReimbursements::where('id', '=', $single_details->id)->first();
                $UpdateDetails->total_expenses = $totalExpense;
                $UpdateDetails->save();
                // dd('---------------');

                //  dd( $single_details);
            }
        }
        return $reimbursement_details;
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
    public function checkallemployeeonboardingstatus()
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
    public function addAllEmployeePayslipDetails()
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
                    $employee_leave->leave_type_id = $leave_type_id;
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
            },
            {
                "attendance_id": "DMC084",
                "user_id": "DM190"
               },
               {
                "attendance_id": "DMC079",
                "user_id": "DM188"
               },
               {
                "attendance_id": "DMC077",
                "user_id": "DM187"
               },
               {
                "attendance_id": "DMC083",
                "user_id": "DM189"
               },
               {
                "attendance_id": "DMC087",
                "user_id": "DM192"
               },
               {
                "attendance_id": "DMC088",
                "user_id": "DM193"
               },
               {
                "attendance_id": "DMC090",
                "user_id": "DM194"
               },
               {
                "attendance_id": "DMC091",
                "user_id": "DM195"
               },
               {
                "attendance_id": "DMC093",
                "user_id": "DM196"
               },
               {
                "attendance_id": "DMC095",
                "user_id": "DM197"
               },
               {
                "attendance_id": "DMC101",
                "user_id": "DM198"
               },
               {
                "attendance_id": "DMC102",
                "user_id": "DM199"
               },
               {
                "attendance_id": "DMC103",
                "user_id": "DM200"
               },
               {
                "attendance_id": "DMC106",
                "user_id": "DM201"
               },
               {
                "attendance_id": "DMC107",
                "user_id": "DM202"
               },
               {
                "attendance_id": "DMC108",
                "user_id": "DM203"
               },
               {
                "attendance_id": "DMC109",
                "user_id": "DM204"
               },
               {
                "attendance_id": "DMC115",
                "user_id": "DM205"
               },
               {
                "attendance_id": "DMC117",
                "user_id": "DM206"
               },
               {
                "attendance_id": "DMC118",
                "user_id": "DM207"
               },
               {
                "attendance_id": "DMC119",
                "user_id": "DM208"
               },
               {
                "attendance_id": "DMC121",
                "user_id": "DM209"
               },
               {
                "attendance_id": "DMC122",
                "user_id": "DM210"
               },
               {
                "attendance_id": "DMC123",
                "user_id": "DM211"
               },
               {
                "attendance_id": "DMC126",
                "user_id": "DM212"
               },
               {
                "attendance_id": "DMC28",
                "user_id": "DM213"
               },
               {
                "attendance_id": "DMC129",
                "user_id": "DM214"
               },
               {
                "attendance_id": "DMC130",
                "user_id": "DM215"
               }
           ]';



        //Removing Extra Spaace and white space in string
        $dunamis = preg_replace('/\s+/', '', $dunamis);
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
            'not_existed_attedance_id' => $not_existed_attedance_id,
            'update_ids' => $update_ids
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
                    $employee_work_shift->flexi_shift_status = 0;
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
                    $employee_work_shift->flexi_shift_status = 0;
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
                        $employee_work_shift->work_shift_id = VmtWorkShifts::where('shift_name', 'Shift ' . $i)->first('id')->id;
                        $employee_work_shift->is_active = 1;
                        $employee_work_shift->flexi_shift_status = 1;
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
                    $employee_work_shift->flexi_shift_status = 0;
                    $employee_work_shift->save();
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            }
        }

        return "Employee Work Shift Added";
    }
    //update all employee master data

    public function updateMasterdataUploads()
    {

        return view('vmt_MasterEmployeedata_Upload');
    }

    public function importMasetrEmployeesExcelData(Request $request)
    {

        $validator = Validator::make(
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

        $corrected_data = $data;

        foreach ($corrected_data[0] as &$Single_data) {

            if (array_key_exists('dob', $Single_data) && is_int($Single_data['dob'])) {

                $Single_data['dob'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['dob'])->format('Y-m-d');
            }
            if (array_key_exists('doj', $Single_data) && is_int($Single_data['doj'])) {

                $Single_data['doj'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['doj'])->format('Y-m-d');
            }
            if (array_key_exists('dol', $Single_data) && is_int($Single_data['dol'])) {

                $Single_data['dol'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['dol'])->format('Y-m-d');
            }
            if (array_key_exists('father_dob', $Single_data) && is_int($Single_data['father_dob'])) {

                $Single_data['father_dob'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['father_dob'])->format('Y-m-d');
            }
            if (array_key_exists('mother_dob', $Single_data) && is_int($Single_data['mother_dob'])) {

                $Single_data['mother_dob'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['mother_dob'])->format('Y-m-d');
            }
            if (array_key_exists('spouse_dob', $Single_data) && is_int($Single_data['spouse_dob'])) {

                $Single_data['spouse_dob'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['spouse_dob'])->format('Y-m-d');
            }

            if (array_key_exists('child_dob', $Single_data) && is_int($Single_data['child_dob'])) {

                $Single_data['child_dob'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($Single_data['child_dob'])->format('Y-m-d');
            }
        }
        unset($Single_data);

        //dd($corrected_data);
        $rules = [];
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $corrected_data;

        $currentRowInExcel = 0;
        if (empty($excelRowdata_row)) {
            return $rowdata_response = [
                'status' => 'failure',
                'message' => 'Please fill the excel',
            ];
        } else {
            foreach ($excelRowdata_row[0] as $key => $excelRowdata) {

                $currentRowInExcel++;

                //Validation
                $rules = [
                    'employee_code' => 'required|exists:users,user_code',
                    'name' => 'required|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    'email' => 'nullable',
                    'doj' => 'nullable',
                    'dob' => 'nullable',
                    'epf_number' => 'nullable|required_unless:epf_number,!=,NULL',
                    'esic_number' => 'nullable|required_unless:esic_number,!=,NULL',
                    'uan_number' => 'nullable|required_unless:uan_number,!=,NULL',
                    //'pan_number' => 'nullable|required_unless:pan_number,!=,null|regex:/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u',
                    'pan_number' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = preg_match("/(^([A-Z]){3}P([A-Z]){1}([0-9]){4}([A-Z]){1}$)/u", $value);
                                if (!$result) {
                                    $fail($value . '<b> : ' . $attribute . ' is invalid');
                                }
                            }
                        },
                    ],
                    //'aadhar_number' => 'nullable|required_unless:aadhar_number,!=,NULL&regex:/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u',
                    'aadhar_number' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = preg_match("/(^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$)/u", $value);
                                if (!$result) {
                                    $fail($value . '<b> : ' . $attribute . ' is invalid');
                                }
                            }
                        },
                    ],
                    // 'mobile_number' => 'nullable|required_unless:mobile_number,!=,NULL&regex:/^([0-9]{10})?$/u&numeric',
                    'mobile_number' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = preg_match("/^([0-9]{10})?$/u", $value);
                                if (!$result) {
                                    $fail($value . '<b> : ' . $attribute . ' is invalid');
                                }
                            }
                        },
                    ],
                    'father_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    'mother_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    //'martial_status' => 'nullable|exists:vmt_marital_status,name',
                    'martial_status' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = VmtMaritalStatus::where('name', $value)->first();

                                if (empty($result)) {
                                    $fail($value . '<b> :' . $attribute . ' doesnt exist in application.Kindly create one');
                                }
                            }
                        },
                    ],
                    'spouse_name' => 'nullable|regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    'department' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = Department::where('name', $value)->first();

                                if (empty($result)) {
                                    $fail($value . '<b> :' . $attribute . ' doesnt exist in application.Kindly create one');
                                }
                            }
                        },
                    ],
                    //'blood_group' =>'nullable|required_unless:blood_group,!=,NULL&exists:vmt_bloodgroup,name&regex:/(^([a-zA-z. ]+)(\d+)?$)/u',
                    'blood_group' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = VmtBloodGroup::where('name', $value)->first();

                                if (empty($result)) {
                                    $fail($value . '<b> :' . $attribute . ' doesnt exist in application.Kindly create one');
                                }
                            }
                        },
                    ],
                    // 'bank_name' => 'nullable|required_unless:bank_name,!=,null&exists:vmt_banks,bank_name',
                    'bank_name' => [
                        'nullable',
                        function ($attribute, $value, $fail) {

                            if ($value !== 'NULL') {
                                $result = Bank::where('bank_name', $value)->first();

                                if (empty($result)) {
                                    $fail($value . '<b> :' . $attribute . ' doesnt exist in application.Kindly create one');
                                }
                            }
                        },
                    ],
                    //'bank_ifsc_code' => 'nullable|required_unless:bank_ifsc_code,!=,NULL|regex:/(^([A-Z]){4}0([A-Z0-9]){6}?$)/u',
                    'bank_ifsc_code' => 'nullable',
                    'bank_account_number' => 'nullable|required_unless:bank_account_number,!=,NULL',
                    'current_address' => 'nullable',
                    'basic' => 'required|numeric',
                    'hra' => 'required|numeric',
                    'statutory_bonus' => 'required|numeric',
                    'special_allowance' => 'required|numeric',
                    'child_education_allowance' => 'required|numeric',
                    'lta' => 'required|numeric',
                    'transport_allowance' => 'required|numeric',
                    'medical_allowance' => 'required|numeric',
                    'education_allowance' => 'required|numeric',
                    'other_allowance' => 'required|numeric',
                    'gross' => 'required|numeric',
                    'epf_employer_contribution' => 'nullable|numeric',
                    'epf_employee_contribution' => 'nullable|numeric',
                    'esic_employer_contribution' => 'nullable|numeric',
                    'esic_employee_contribution' => 'nullable|numeric',
                    'insurance' => 'required|numeric',
                    'professional_tax' => 'required|numeric',
                    'labour_welfare_fund' => 'required|numeric',
                    'net_income' => 'required|numeric',
                    'dearness_allowance' => 'required|numeric',

                ];

                $messages = [
                    'numeric' => 'Field <b>:attribute</b> should be numeric',
                    'date' => 'Field <b>:attribute</b> should have the following format DD-MM-YYYY ',
                    //  'date_format' => 'Field <b>:attribute</b> should have the following format DD/MM/YYYY ',
                    'in' => 'Field <b>:attribute</b> should have the following values : :values .',
                    'required' => 'Field <b>:attribute</b> is required',
                    'regex' => 'Field <b>:attribute</b> is invalid',
                    'employee_name.regex' => 'Field <b>:attribute</b> should not have special characters',
                    'unique' => 'Field <b>:attribute</b> should be unique',
                    'dob.before' => 'Field <b>:attribute</b> should be above 18 years',
                    'email' => 'Field <b>:attribute</b> is invalid',
                    'pan_no.required_if' => 'Field <b>:attribute</b> is required if <b>pan ack</b> not provided ',
                    'pan_ack.required_if' => 'Field <b>:attribute</b> is required if <b>pan no</b> not provided ',
                    'required_unless' => 'Field <b>:attribute</b> is invalid',
                    'exists' => 'Field <b>:attribute</b> doesnt exist in application.Kindly create one',

                ];

                $validator = Validator::make($excelRowdata, $rules, $messages);

                if (!$validator->passes()) {

                    $rowDataValidationResult = [
                        'row_number' => $currentRowInExcel,
                        'status' => 'failure',
                        'message' => 'In Excel Row - ' . $excelRowdata['employee_code'] . ' : ' . $currentRowInExcel . ' has following error(s)',
                        'error_fields' => json_encode($validator->errors()),
                    ];

                    array_push($data_array, $rowDataValidationResult);

                    $isAllRecordsValid = false;
                }
            }
        } //for loop

        //Runs only if all excel records are valid
        if ($isAllRecordsValid) {
            foreach ($excelRowdata_row[0] as $key => $excelRowdata) {
                $rowdata_response = $this->storeSingleRecord_MasterEmployee($excelRowdata);

                array_push($data_array, $rowdata_response);
            }
            return $responseJSON = [
                'status' => $rowdata_response['status'],
                'message' => "Excelsheet data import success",
                'mail_status' => $rowdata_response['mail_status'] ?? "failure",
                'data' => $data_array,
                'error_data' => $rowdata_response['data']
            ];
        } else {

            return $responseJSON = [
                'status' => 'failure',
                'message' => "Please fix the below excelsheet data",
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

        try {

            $response = $this->Update_MasterEmployeeData(data: $row);

            $status = $response['status'];

            if ($response['status'] == "success")
                $message = $row['employee_code'] . ' added successfully';
            else
                $message = $row['employee_code'] . ' has failed';

            return $rowdata_response = [

                'status' => $response['status'],
                'message' => $message,
                'mail_status' => '',
                'data' => $response['data']
            ];
        } catch (\Exception $e) {
            //dd($e);
            // $this->deleteUser($user->id);

            return $rowdata_response = [
                'status' => $status,
                'message' => '',
                'data' => $e->getMessage(),
            ];
        }
    }



    private function Update_MasterEmployeeData($data)
    {
        try {


            $user_data = (["name" => "name", "email" => "email"]);

            $employee_data = ([
                "gender" => "gender",
                "dob" => "dob",
                "doj" => "doj",
                "dol" => "dol",
                "pan_number" => "pan_number",
                "aadhar_number" => "aadhar_number",
                "mobile_number" => "mobile_number",
                "current_address" => "current_address_line_1",
                "permaent_address" => "permanent_address_line_1",
                "martial_status" => "marital_status_id",
                "nationality" => "nationality",
                "bank_name" => "bank_id",
                "bank_account_number" => "bank_account_number",
                "bank_ifsc_code" => "bank_ifsc_code"
            ]);

            $employee_office_details = ([
                "department" => "department",
                "designation" => "designation",
                "work_location" => "work_location",
                "officical_mail" => "officical_mail",
                "official_mobile" => "official_mobile",
                "l1_manager_code" => "l1_manager_code",
            ]);

            $employee_family_details = ([
                "father_name" => 'name',
                "father_dob" => 'dob',
                "mother_name" => 'name',
                "mother_dob" => 'dob',
                "spouse_name" => 'name',
                "spouse_dob" => 'dob',
                "child_name" => 'name',
                "child_dob" => 'dob'
            ]);

            $employee_statutory_details = (["uan_number" => "uan_number", "epf_number" => "epf_number", "esic_number" => "esic_number"]);

            $compensatory_data = ([
                "basic" => "basic",
                "hra" => "hra",
                "special_allowance" => "special_allowance",
                "statutory_bonus" => "Statutory_bonus",
                "child_education_allowance" => "child_education_allowance",
                "lta" => "lta",
                "transport_allowance" => "transport_allowance",
                "medical_allowance" => "medical_allowance",
                "education_allowance" => "education_allowance",
                "communication_allowance" => "communication_allowance",
                "food_allowance" => "food_allowance",
                "other_allowance" => 'other_allowance',
                "gross" => "gross",
                "epf_employer_contribution" => "epf_employer_contribution",
                "esic_employer_contribution" => "esic_employer_contribution",
                "insurance" => "insurance",
                "labour_welfare_fund" => "labour_welfare_fund",
                "ctc" => "cic",
                "epf_employee_contribution" => "epf_employee",
                "esic_employee_contribution" => "esic_employee",
                "dearness_allowance" => "dearness_allowance",
                "professional_tax" => "professional_tax",
                "net_income" => 'net_income'
            ]);



            $user_id = User::where('user_code', $data['employee_code'])->first();

            if (!empty($user_id)) {

                $user_id = $user_id->id;

                foreach ($data as $data_key => $single_data) {

                    foreach ($user_data as $user_key => $single_user_data) {

                        $update_Userdata = User::where('id', $user_id)->first();

                        if ($user_key == $data_key) {

                            if (!empty($update_Userdata)) {
                                $update_Userdata->$single_user_data = $single_data;
                                $update_Userdata->save();
                            }
                        }
                    }

                    foreach ($employee_data as $emp_data_key => $single_employee_data) {

                        $update_employee_data = VmtEmployee::where('userid', $user_id)->first();

                        if ($emp_data_key == $data_key) {

                            if (!empty($update_employee_data)) {

                                if ($data_key == 'dob') {

                                    $dob = $single_data;
                                    $update_employee_data->dob = $dob ? $this->getdateFormatForDb($dob) : '';
                                } else if ($data_key == 'doj') {

                                    $doj = $single_data;
                                    $update_employee_data->doj = $doj ? $this->getdateFormatForDb($doj) : '';
                                } else if ($data_key == 'dol') {

                                    $dol = $single_data;
                                    $update_employee_data->dol = $dol ? $this->getdateFormatForDb($dol) : '';
                                } else if ($data_key == 'martial_status') {

                                    $martial_status_id = VmtMaritalStatus::where('name', ucfirst($single_data ?? ''))->first();
                                    $update_employee_data->marital_status_id = !empty($martial_status_id) ? $martial_status_id->id : '';
                                } else if ($data_key == 'blood_group') {

                                    $blood_group_id = VmtBloodGroup::where('name', $single_data ?? '')->first();
                                    $update_employee_data->blood_group_id = !empty($blood_group_id) ? $blood_group_id->id : '';
                                } else if ($data_key == 'bank_name') {

                                    $bank_id = Bank::where('bank_name', $single_data ?? '')->first();
                                    $update_employee_data->bank_id = !empty($bank_id) ? $bank_id->id : '';
                                } else {
                                    $update_employee_data->$single_employee_data = $single_data;
                                }

                                $update_employee_data->save();
                            }
                        }
                    }

                    foreach ($employee_family_details as $emp_family_key => $single_emp_family) {

                        $emp_father_data = VmtEmployeeFamilyDetails::where('user_id', $user_id)->where('relationship', 'Father')->first();

                        if ($emp_family_key == $data_key) {

                            if (!empty($emp_father_data)) {

                                if ($data_key == 'father_name') {

                                    if (!empty($single_data)) {

                                        $emp_father_data->name = $single_data;
                                        $emp_father_data->save();
                                    }
                                }
                                if ($data_key == 'father_dob') {

                                    $emp_father_data->dob = $this->getdateFormatForDb($single_data);
                                    $emp_father_data->save();
                                }
                            }
                        }

                        $emp_mother_data = VmtEmployeeFamilyDetails::where('user_id', $user_id)->where('relationship', 'Mother');

                        if ($emp_mother_data->exists()) {

                            $emp_mother_data = $emp_mother_data->first();

                            if ($data_key == 'mother_name') {

                                if (!empty($single_data)) {

                                    $emp_mother_data->name = $single_data;
                                    $emp_mother_data->save();
                                }
                            } else if ($data_key == 'mother_dob') {

                                $emp_mother_data->dob = $this->getdateFormatForDb($single_data);
                                $emp_mother_data->save();
                            }
                        }

                        $emp_spouse_data = VmtEmployeeFamilyDetails::where('user_id', $user_id)->where('gender', 'Female')->where('relationship', 'Spouse');

                        if ($emp_spouse_data->exists()) {

                            $emp_spouse_data = $emp_spouse_data->first();

                            if ($data_key == 'spouse_name') {

                                if (!empty($single_data)) {

                                    $emp_spouse_data->name = $single_data;
                                    $emp_spouse_data->save();
                                }
                            } else if ($data_key == 'spouse_dob') {

                                if (!empty($single_data)) {

                                    $emp_spouse_data->dob = $this->getdateFormatForDb($single_data);
                                    $emp_spouse_data->save();
                                }
                            }
                        }

                        $emp_spouse_male_data = VmtEmployeeFamilyDetails::where('user_id', $user_id)->where('gender', 'male')->where('relationship', 'Spouse');

                        if ($emp_spouse_male_data->exists()) {

                            $emp_spouse_male_data = $emp_spouse_male_data->first();

                            if ($data_key == 'spouse_name') {

                                if (!empty($single_data)) {

                                    $emp_spouse_male_data->name = $single_data;
                                    $emp_spouse_male_data->save();
                                }
                            } else if ($data_key == 'spouse_dob') {

                                if (!empty($single_data)) {

                                    $emp_spouse_male_data->dob = $this->getdateFormatForDb($single_data);
                                    $emp_spouse_data->save();
                                }
                            }
                        }

                        $emp_child_data = VmtEmployeeFamilyDetails::where('user_id', $user_id)->where('relationship', 'Child')->first();

                        if (!empty($emp_child_data)) {
                            $emp_child_data = $emp_child_data;

                            if ($data_key == 'child_name') {
                                if (!empty($single_data)) {
                                    $emp_child_data->name = $single_data;
                                }
                                $emp_child_data->relationship = 'Children';
                                $emp_child_data->gender = '';
                                $emp_child_data->save();
                            } else if ($data_key == 'child_dob') {
                                $emp_child_data->dob = $this->getdateFormatForDb($single_data);
                                $emp_child_data->save();
                            }
                        }
                    }

                    foreach ($employee_office_details as $office_key => $single_office_data) {

                        $update_empOffice_data = VmtEmployeeOfficeDetails::where('user_id', $user_id)->first();

                        if ($office_key == $data_key) {

                            if (!empty($update_empOffice_data)) {

                                if ($data_key == 'department') {

                                    if (!empty($single_data) && $single_data != 'NULL') {
                                        $department_id = Department::where('name', $single_data)->first();
                                        $update_empOffice_data->department_id = $department_id->id;
                                    }
                                } else {
                                    $update_empOffice_data->$single_office_data = $single_data;
                                }
                                $update_empOffice_data->save();
                            }
                        }
                    }

                    foreach ($employee_statutory_details as $statutory_key => $single_statutory_data) {

                        if ($statutory_key == $data_key) {

                            $newEmployee_statutoryDetails = VmtEmployeeStatutoryDetails::where('user_id', $user_id);

                            if ($newEmployee_statutoryDetails->exists()) {
                                $newEmployee_statutoryDetails = $newEmployee_statutoryDetails->first();
                            } else {

                                $newEmployee_statutoryDetails = new VmtEmployeeStatutoryDetails;
                                $newEmployee_statutoryDetails->user_id = $user_id;
                            }
                            $newEmployee_statutoryDetails->$single_statutory_data = $single_data;
                            $newEmployee_statutoryDetails->save();
                        }
                    }

                    foreach ($compensatory_data as $comp_key => $single_comp_data) {

                        if ($comp_key == $data_key) {

                            $compensatory = Compensatory::where('user_id', $user_id);

                            if ($compensatory->exists()) {
                                $compensatory = $compensatory->first();
                            } else {
                                $compensatory = new Compensatory;
                                $compensatory->user_id = $user_id;
                            }

                            $compensatory->$single_comp_data = $single_data;
                            $compensatory->save();
                        }
                    }
                }
                return $response = ([
                    'status' => 'success',
                    'message' => 'Master data updated successfully',
                    'data' => ''
                ]);
            }
        } catch (\Exception $e) {
            return $response = ([
                'status' => 'failure',
                'message' => 'Error for input date',
                'data' => $e->getMessage() . ' error_line' . $e->getline(),
            ]);
        }
    }
    private function getdateFormatForDb($date)
    {


        try {
            $processed_date = null;
            //Check if its in proper format
            $processed_date_one = \DateTime::createFromFormat('d-m-Y', $date);
            $processed_date_three = \DateTime::createFromFormat('Y-m-d', $date);
            $processed_date_two = \DateTime::createFromFormat('d/m/Y', $date);

            //If date is in 'd-m-y' format, then convert into one
            //If date is in 'd-m-y' format, then convert into one
            if ($processed_date_one) {
                //Then convert to Y-m-d
                $processed_date = $processed_date_one->format('Y-m-d');
            } else if (!empty($processed_date_two)) {

                $processed_date = $processed_date_two->format('Y-m-d');
            } else if ($processed_date_three) {

                $processed_date = $processed_date_three->format('Y-m-d');
            } else {
                $processed_date = '';
            }


            return $processed_date;
        } catch (\Exception $e) {
            return $response = ([
                'status' => 'failure',
                'message' => 'Error for input date',
                'data' => $e->getMessage() . ' error_line ' . $e->getline(),
            ]);
        }
    }

    public function setFinanceidHrid(Request $request)
    {

        //LANGRO INDIA PRIVATE LIMITED

        $userslan = User::where('client_id', '2')->get();

        foreach ($userslan as $single_users) {

            $emp_official_details = VmtEmployeeOfficeDetails::where('user_id', $single_users->id)->first();
            $emp_official_details->hr_user_id = '238';
            $emp_official_details->fa_user__id = '185';
            $emp_official_details->save();
        }

        //    PRITI SALES CORPORATIONS

        $userspri = User::where('client_id', '3')->get();

        foreach ($userspri as $single_users) {

            $emp_official_details = VmtEmployeeOfficeDetails::where('user_id', $single_users->id)->first();
            $emp_official_details->hr_user_id = '182';
            $emp_official_details->fa_user__id = '185';
            $emp_official_details->save();
        }

        //INDCHEM MARKETING AGENCIES

        $usersind = User::where('client_id', '4')->get();

        foreach ($usersind as $single_users) {

            $emp_official_details = VmtEmployeeOfficeDetails::where('user_id', $single_users->id)->first();
            $emp_official_details->hr_user_id = '164';
            $emp_official_details->fa_user__id = '185';
            $emp_official_details->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'updated successfully',
        ]);
    }


    public function saveEmployeeAnnualProjection(Request $request)
    {

        ini_set('max_execution_time', 300);

        try {

            DB::table('abs_salary_projection')->truncate();

             $client_details = VmtClientMaster::Where('client_fullname', "!=", "All")->get(['id', 'client_name'])->toarray();


                $timeperiod = VmtOrgTimePeriod::where('status', '1')->first();
                $start_date = Carbon::parse($timeperiod->start_date)->format('Y-m-d');

                $end_date = Carbon::parse($timeperiod->end_date)->format('Y-m-01');
                $end_date = Carbon::parse($end_date)->format('Y-m-d');
                $current_date = Carbon::now();


                 $existing_employee_data = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                                           ->where('users.active', "1")->where('users.is_ssa', "0")->get(['users.id', 'vmt_employee_details.doj', 'users.client_id'])->toarray();
                // $existing_employee_data = User::join('vmt_employee_details', 'vmt_employee_details.userid', '=', 'users.id')
                //     ->where('client_id', "3")->where('users.active', "1")->where('users.id', "194")->where('users.is_ssa', "0")->get(['users.id', 'vmt_employee_details.doj', 'users.client_id'])->toarray();
              //  dd($existing_employee_data);


                foreach ($existing_employee_data as $key => $single_users) {


                    $fin_end_date = Carbon::parse($timeperiod->end_date);

                    if ($single_users['doj'] < $start_date) {

                        $fin_start_date = Carbon::parse($timeperiod->start_date);
                    } else if (Carbon::parse($single_users['doj'])->format('m') != Carbon::parse($current_date)->format('m')) {

                        $fin_start_date = Carbon::parse($single_users['doj']);
                    }

                    $date_range = CarbonPeriod::create($fin_start_date->startOfMonth()->format('Y-m-d'), '1 month', $current_date->endOfMonth()->format('Y-m-d'));


                    $finyear_date_range = CarbonPeriod::create($fin_start_date->startOfMonth()->format('Y-m-d'), '1 month', $fin_end_date->endOfMonth()->format('Y-m-d'));


                    $previous_month_payslip_date = array();
                    $financial_year_date = array();
                    $exists_month_data = array();


                    foreach ($date_range  as $key => $single_date) {

                        $payroll_date = $single_date->format('Y-m-d');

                        $previous_month_payslip_date[] = $payroll_date;

                        array_push($exists_month_data,$previous_month_payslip_date);

                    }

                    foreach ($finyear_date_range  as $key => $single_fin_date) {

                        $fin_year_date = $single_fin_date->format('Y-m-d');

                        $financial_year_date[] = $fin_year_date;
                    }



                   //dd($previous_month_payslip_date, $financial_year_date);
                   // dd( $exists_month_data);




                    foreach ($previous_month_payslip_date as $month_key => $single_month) {

                        foreach ($financial_year_date as $key => $single_fin_month) {


                            $emp_payroll = '';

                            $payroll_date = VmtPayroll::where('payroll_date',  $single_month)->where('client_id',$single_users['client_id'] );

                            if ($payroll_date->exists()) {
                                $payroll_date = $payroll_date->first();
                                $emp_payroll = VmtEmployeePayroll::where('payroll_id', $payroll_date->id)->where('user_id', $single_users['id'])->first();
                            }

                            if(in_array($single_fin_month, $exists_month_data[$month_key])) {

                                $payslip_id = VmtPayroll::join('vmt_emp_payroll', 'vmt_emp_payroll.payroll_id', '=', 'vmt_payroll.id')
                                    // ->where('vmt_payroll.client_id',  $single_users['client_id'])
                                    ->where('vmt_payroll.payroll_date',  $single_fin_month)
                                    ->where('vmt_emp_payroll.user_id', $single_users['id'])
                                    ->first(['vmt_emp_payroll.id as id']);


                                if (!empty($payslip_id)) {

                                    $payslip_details  = VmtEmployeePaySlipV2::where('emp_payroll_id', $payslip_id->id)->first();
                                }


                                if (!empty($payslip_details)) {

                                     if (!empty($emp_payroll)) {

                                        $salary_project_data = new AbsSalaryProjection;
                                        $salary_project_data->vmt_emp_payroll_id =$emp_payroll->id;
                                        $salary_project_data->payroll_months = $single_fin_month;
                                        $salary_project_data->basic = 0;
                                        $salary_project_data->hra = 0;
                                        $salary_project_data->child_edu_allowance = 0;
                                        $salary_project_data->spl_alw =0;
                                        $salary_project_data->total_fixed_gross = $payslip_details['total_fixed_gross'];
                                        $salary_project_data->month_days = $payslip_details['month_days'];
                                        $salary_project_data->worked_Days = $payslip_details['worked_Days'];
                                        $salary_project_data->arrears_Days = $payslip_details['arrears_Days'];
                                        $salary_project_data->lop = $payslip_details['lop'];
                                        $salary_project_data->earned_basic = $payslip_details['earned_basic'];
                                        $salary_project_data->basic_arrear = $payslip_details['basic_arrear'];
                                        $salary_project_data->earned_hra = $payslip_details['earned_hra'];
                                        $salary_project_data->hra_arrear = $payslip_details['hra_arrear'];
                                        $salary_project_data->earned_child_edu_allowance = $payslip_details['earned_child_edu_allowance'];
                                        $salary_project_data->child_edu_allowance_arrear = $payslip_details['child_edu_allowance_arrear'];
                                        $salary_project_data->earned_spl_alw = $payslip_details['earned_spl_alw'];
                                        $salary_project_data->spl_alw_arrear = $payslip_details['spl_alw_arrear'];
                                        $salary_project_data->overtime = $payslip_details['overtime'];
                                        $salary_project_data->total_earned_gross = $payslip_details['total_earned_gross'];
                                        $salary_project_data->pf_wages = $payslip_details['pf_wages'];
                                        $salary_project_data->pf_wages_arrear_epfr = $payslip_details['pf_wages_arrear_epfr'];
                                        $salary_project_data->epfr = $payslip_details['epfr'];
                                        $salary_project_data->epfr_arrear = $payslip_details['epfr_arrear'];
                                        $salary_project_data->edli_charges = $payslip_details['edli_charges'];
                                        $salary_project_data->edli_charges_arrears = $payslip_details['edli_charges_arrears'];
                                        $salary_project_data->pf_admin_charges = $payslip_details['pf_admin_charges'];
                                        $salary_project_data->pf_admin_charges_arrears = $payslip_details['pf_admin_charges_arrears'];
                                        $salary_project_data->employer_esi = $payslip_details['employer_esi'];
                                        $salary_project_data->employer_lwf = $payslip_details['employer_lwf'];
                                        $salary_project_data->ctc = $payslip_details['ctc'];
                                        $salary_project_data->epf_ee = $payslip_details['epf_ee'];
                                        $salary_project_data->employee_esic = $payslip_details['employee_esic'];
                                        $salary_project_data->prof_tax = $payslip_details['prof_tax'];
                                        $salary_project_data->income_tax = $payslip_details['income_tax'];
                                        $salary_project_data->sal_adv = $payslip_details['sal_adv'];
                                        $salary_project_data->canteen_dedn = $payslip_details['canteen_dedn'];
                                        $salary_project_data->other_deduc = $payslip_details['other_deduc'];
                                        $salary_project_data->lwf = $payslip_details['lwf'];
                                        $salary_project_data->total_deductions = $payslip_details['total_deductions'];
                                        $salary_project_data->net_take_home = $payslip_details['net_take_home'];
                                        $salary_project_data->rupees = $payslip_details['rupees'];
                                        $salary_project_data->el_opn_bal = $payslip_details['el_opn_bal'];
                                        $salary_project_data->availed_el = $payslip_details['availed_el'];
                                        $salary_project_data->balance_el = $payslip_details['balance_el'];
                                        $salary_project_data->sl_opn_bal = $payslip_details['sl_opn_bal'];
                                        $salary_project_data->availed_sl = $payslip_details['availed_sl'];
                                        $salary_project_data->balance_sl = $payslip_details['balance_sl'];
                                        $salary_project_data->rename = $payslip_details['rename'];
                                        $salary_project_data->greetings = $payslip_details['greetings'];
                                        $salary_project_data->stats_bonus = $payslip_details['stats_bonus'];
                                        $salary_project_data->email = $payslip_details['email'];
                                        $salary_project_data->earned_stats_bonus = $payslip_details['earned_stats_bonus'];
                                        $salary_project_data->earned_stats_arrear = $payslip_details['earned_stats_arrear'];
                                        $salary_project_data->travel_conveyance = $payslip_details['travel_conveyance'];
                                        $salary_project_data->other_earnings = $payslip_details['other_earnings'];
                                        $salary_project_data->dearness_allowance = $payslip_details['dearness_allowance'];
                                        $salary_project_data->dearness_allowance_earned = $payslip_details['dearness_allowance_earned'];
                                        $salary_project_data->dearness_allowance_arrear = $payslip_details['dearness_allowance_arrear'];
                                        $salary_project_data->vda = 0;
                                        $salary_project_data->vda_earned = $payslip_details['vda_earned'];
                                        $salary_project_data->vda_arrear = $payslip_details['vda_arrear'];
                                        $salary_project_data->vpf_arrear = $payslip_details['vpf_arrear'];
                                        $salary_project_data->communication_allowance = 0;
                                        $salary_project_data->communication_allowance_earned = $payslip_details['communication_allowance_earned'];
                                        $salary_project_data->communication_allowance_arrear = $payslip_details['communication_allowance_arrear'];
                                        $salary_project_data->food_allowance_earned = $payslip_details['food_allowance'];
                                        $salary_project_data->food_allowance_arrear = $payslip_details['food_allowance_arrear'];
                                        $salary_project_data->other_allowance =0;
                                        $salary_project_data->other_allowance_earned = $payslip_details['other_allowance_earned'];
                                        $salary_project_data->other_allowance_arrear = $payslip_details['other_allowance_arrear'];
                                        $salary_project_data->washing_allowance =0;
                                        $salary_project_data->washing_allowance_earned = $payslip_details['washing_allowance_earned'];
                                        $salary_project_data->washing_allowance_arrear = $payslip_details['washing_allowance_arrear'];
                                        $salary_project_data->uniform_allowance = 0;
                                        $salary_project_data->uniform_allowance_earned = $payslip_details['uniform_allowance_earned'];
                                        $salary_project_data->uniform_allowance_arrear = $payslip_details['uniform_allowance_arrear'];
                                        $salary_project_data->vehicle_reimbursement = 0;
                                        $salary_project_data->vehicle_reimbursement_earned = $payslip_details['vehicle_reimbursement_earned'];
                                        $salary_project_data->vehicle_reimbursement_arrear = $payslip_details['vehicle_reimbursement_arrear'];
                                        $salary_project_data->driver_salary = 0;
                                        $salary_project_data->driver_salary_earned = $payslip_details['driver_salary_earned'];
                                        $salary_project_data->driver_salary_arrear = $payslip_details['driver_salary_arrear'];
                                        $salary_project_data->fuel_reimbursement =0;
                                        $salary_project_data->fuel_reimbursement_earned = $payslip_details['fuel_reimbursement_earned'];
                                        $salary_project_data->fuel_reimbursement_arrear = $payslip_details['fuel_reimbursement_arrear'];
                                        $salary_project_data->overtime_arrear = $payslip_details['overtime_arrear'];
                                        $salary_project_data->incentive = $payslip_details['incentive'];
                                        $salary_project_data->incentive_arrear = $payslip_details['incentive_arrear'];
                                        $salary_project_data->leave_encashment = $payslip_details['leave_encashment'];
                                        $salary_project_data->leave_encashment_arrear = $payslip_details['leave_encashment_arrear'];
                                        $salary_project_data->referral_bonus = $payslip_details['referral_bonus'];
                                        $salary_project_data->referral_bonus_arrear = $payslip_details['referral_bonus_arrear'];
                                        $salary_project_data->statutory_bonus = $payslip_details['statutory_bonus'];
                                        $salary_project_data->statutory_bonus_arrear = $payslip_details['statutory_bonus_arrear'];
                                        $salary_project_data->ex_gratia = $payslip_details['ex_gratia'];
                                        $salary_project_data->gift_payment = $payslip_details['gift_payment'];
                                        $salary_project_data->gift_payment_arrear = $payslip_details['gift_payment_arrear'];
                                        $salary_project_data->attendance_bonus = $payslip_details['attendance_bonus'];
                                        $salary_project_data->attendance_bonus_arrear = $payslip_details['attendance_bonus_arrear'];
                                        $salary_project_data->daily_allowance_arrear = $payslip_details['daily_allowance_arrear'];
                                        $salary_project_data->salary_adv_arrear = $payslip_details['salary_adv_arrear'];
                                        $salary_project_data->medical_deductions = $payslip_details['medical_deductions'];
                                        $salary_project_data->uniform_deductions = $payslip_details['uniform_deductions'];
                                        $salary_project_data->loan_deductions = $payslip_details['loan_deductions'];
                                        $salary_project_data->save();
                             }
                                } else {
                                    return 'no payslip data found for ' . $single_users['id'] . 'user'  . " " . $single_month . " " . $single_fin_month;
                                }


                                //array_push($res, $payslip_details);
                    } else {

                                $compensatory_details = User::join('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'users.id')->where('user_id', $single_users['id'])->first();

                                $salary_project_data = new AbsSalaryProjection;

                                if (!empty($emp_payroll)) {

                                    $salary_project_data->vmt_emp_payroll_id = $emp_payroll->id;
                                    $salary_project_data->payroll_months = $single_fin_month;
                                    $salary_project_data->basic =  0;
                                    $salary_project_data->hra =  0;
                                    $salary_project_data->child_edu_allowance = 0;
                                    $salary_project_data->spl_alw =  0;
                                    $salary_project_data->total_fixed_gross = $compensatory_details['gross'] ?? 0;
                                    $salary_project_data->month_days = $compensatory_details['month_days'] ?? 0;
                                    $salary_project_data->worked_Days = $compensatory_details['worked_Days'] ?? 0;
                                    $salary_project_data->arrears_Days = $compensatory_details['arrears_Days'] ?? 0;
                                    $salary_project_data->lop = $compensatory_details['lop'] ?? 0;
                                    $salary_project_data->earned_basic = $compensatory_details['basic'] ?? 0;
                                    $salary_project_data->basic_arrear = $compensatory_details['basic_arrear'] ?? 0;
                                    $salary_project_data->earned_hra = $compensatory_details['hra'] ?? 0;
                                    $salary_project_data->hra_arrear = $compensatory_details['hra_arrear'] ?? 0;
                                    $salary_project_data->earned_child_edu_allowance = $compensatory_details['child_education_allowance'] ?? 0;
                                    $salary_project_data->earned_spl_alw = $compensatory_details['special_allowance'] ?? 0;
                                    $salary_project_data->overtime = $compensatory_details['overtime'] ?? 0;
                                    $salary_project_data->total_earned_gross = $compensatory_details['gross'] ?? 0;
                                    $salary_project_data->pf_wages = $compensatory_details['pf_wages'] ?? 0;
                                    $salary_project_data->pf_wages_arrear_epfr = $compensatory_details['pf_wages_arrear_epfr'] ?? 0;
                                    $salary_project_data->epfr = $compensatory_details['epfr'] ?? 0;
                                    $salary_project_data->epfr_arrear = $compensatory_details['epfr_arrear'] ?? 0;
                                    $salary_project_data->edli_charges = $compensatory_details['edli_charges'] ?? 0;
                                    $salary_project_data->edli_charges_arrears = $compensatory_details['edli_charges_arrears'] ?? 0;
                                    $salary_project_data->pf_admin_charges = $compensatory_details['pf_admin_charges'] ?? 0;
                                    $salary_project_data->pf_admin_charges_arrears = $compensatory_details['pf_admin_charges_arrears'] ?? 0;
                                    $salary_project_data->employer_esi = $compensatory_details['esic_employer_contribution'] ?? 0;
                                    $salary_project_data->employer_lwf = $compensatory_details['employer_lwf'] ?? 0;
                                    $salary_project_data->ctc = $compensatory_details['cic'] ?? 0;
                                    $salary_project_data->epf_ee = $compensatory_details['epf_employee'] ?? 0;
                                    $salary_project_data->employee_esic = $compensatory_details['esic_employee'] ?? 0;
                                    $salary_project_data->prof_tax = $compensatory_details['professional_tax'] ?? 0;
                                    $salary_project_data->income_tax = $compensatory_details['income_tax'] ?? 0;
                                    $salary_project_data->sal_adv = $compensatory_details['sal_adv'] ?? 0;
                                    $salary_project_data->canteen_dedn = $compensatory_details['canteen_dedn'] ?? 0;
                                    $salary_project_data->other_deduc = $compensatory_details['other_deduc'] ?? 0;
                                    $salary_project_data->lwf = $compensatory_details['lwf'] ?? 0;
                                    $salary_project_data->total_deductions = $compensatory_details['total_deductions'] ?? 0;
                                    $salary_project_data->net_take_home = $compensatory_details['net_income'] ?? 0;
                                    $salary_project_data->rupees = $compensatory_details['rupees'] ?? 0;
                                    $salary_project_data->el_opn_bal = $compensatory_details['el_opn_bal'] ?? 0;
                                    $salary_project_data->availed_el = $compensatory_details['availed_el'] ?? 0;
                                    $salary_project_data->balance_el = $compensatory_details['balance_el'] ?? 0;
                                    $salary_project_data->sl_opn_bal = $compensatory_details['sl_opn_bal'] ?? 0;
                                    $salary_project_data->availed_sl = $compensatory_details['availed_sl'] ?? 0;
                                    $salary_project_data->balance_sl = $compensatory_details['balance_sl'] ?? 0;
                                    $salary_project_data->rename = $compensatory_details['rename'] ?? 0;
                                    $salary_project_data->greetings = $compensatory_details['greetings'] ?? 0;
                                    $salary_project_data->stats_bonus = $compensatory_details['stats_bonus'] ?? 0;
                                    $salary_project_data->email = $compensatory_details['email'] ?? 0;
                                    $salary_project_data->earned_stats_bonus = $compensatory_details['Statutory_bonus'] ?? 0;
                                    $salary_project_data->earned_stats_arrear = $compensatory_details['earned_stats_arrear'] ?? 0;
                                    $salary_project_data->travel_conveyance = $compensatory_details['travel_conveyance'] ?? 0;
                                    $salary_project_data->other_earnings = $compensatory_details['other_earnings'] ?? 0;
                                    $salary_project_data->dearness_allowance =  0;
                                    $salary_project_data->dearness_allowance_earned = $compensatory_details['dearness_allowance']?? 0;
                                    $salary_project_data->dearness_allowance_arrear = $compensatory_details['dearness_allowance_arrear']?? 0;
                                    $salary_project_data->vda =  0;
                                    $salary_project_data->vda_earned = $compensatory_details['vda']?? 0;
                                    $salary_project_data->vda_arrear = $compensatory_details['vda_arrear']?? 0;
                                    $salary_project_data->vpf_arrear = $compensatory_details['vpf_arrear']?? 0;
                                    $salary_project_data->communication_allowance =  0;
                                    $salary_project_data->communication_allowance_earned = $compensatory_details['communication_allowance']?? 0;
                                    $salary_project_data->communication_allowance_arrear = $compensatory_details['communication_allowance_arrear']?? 0;
                                    $salary_project_data->food_allowance_earned = $compensatory_details['food_allowance']?? 0;
                                    $salary_project_data->food_allowance_arrear = $compensatory_details['food_allowance_arrear'] ?? 0;
                                    $salary_project_data->other_allowance = 0;
                                    $salary_project_data->other_allowance_earned = $compensatory_details['other_allowance'] ?? 0;
                                    $salary_project_data->other_allowance_arrear = $compensatory_details['other_allowance_arrear'] ?? 0;
                                    $salary_project_data->washing_allowance =  0;
                                    $salary_project_data->washing_allowance_earned = $compensatory_details['washing_allowance'] ?? 0;
                                    $salary_project_data->washing_allowance_arrear = $compensatory_details['washing_allowance_arrear'] ?? 0;
                                    $salary_project_data->uniform_allowance =  0;
                                    $salary_project_data->uniform_allowance_earned = $compensatory_details['uniform_allowance'] ?? 0;
                                    $salary_project_data->uniform_allowance_arrear = $compensatory_details['uniform_allowance_arrear'] ?? 0;
                                    $salary_project_data->vehicle_reimbursement =  0;
                                    $salary_project_data->vehicle_reimbursement_earned = $compensatory_details['vehicle_reimbursement'] ?? 0;
                                    $salary_project_data->vehicle_reimbursement_arrear = $compensatory_details['vehicle_reimbursement_arrear'] ?? 0;
                                    $salary_project_data->driver_salary =  0;
                                    $salary_project_data->driver_salary_earned = $compensatory_details['driver_salary'] ?? 0;
                                    $salary_project_data->driver_salary_arrear = $compensatory_details['driver_salary_arrear'] ?? 0;
                                    $salary_project_data->fuel_reimbursement = 0;
                                    $salary_project_data->fuel_reimbursement_earned = $compensatory_details['fuel_reimbursement'] ?? 0;
                                    $salary_project_data->fuel_reimbursement_arrear = $compensatory_details['fuel_reimbursement_arrear'] ?? 0;
                                    $salary_project_data->overtime_arrear = $compensatory_details['overtime_arrear'] ?? 0;
                                    $salary_project_data->incentive = $compensatory_details['incentive'] ?? 0;
                                    $salary_project_data->incentive_arrear = $compensatory_details['incentive_arrear'] ?? 0;
                                    $salary_project_data->leave_encashment = $compensatory_details['leave_encashment'] ?? 0;
                                    $salary_project_data->leave_encashment_arrear = $compensatory_details['leave_encashment_arrear'] ?? 0;
                                    $salary_project_data->referral_bonus = $compensatory_details['referral_bonus'] ?? 0;
                                    $salary_project_data->referral_bonus_arrear = $compensatory_details['referral_bonus_arrear'] ?? 0;
                                    $salary_project_data->statutory_bonus = $compensatory_details['statutory_bonus'] ?? 0;
                                    $salary_project_data->statutory_bonus_arrear = $compensatory_details['statutory_bonus_arrear'] ?? 0;
                                    $salary_project_data->ex_gratia = $compensatory_details['ex_gratia'] ?? 0;
                                    $salary_project_data->gift_payment = $compensatory_details['gift_payment'] ?? 0;
                                    $salary_project_data->gift_payment_arrear = $compensatory_details['gift_payment_arrear'] ?? 0;
                                    $salary_project_data->attendance_bonus = $compensatory_details['attendance_bonus'] ?? 0;
                                    $salary_project_data->attendance_bonus_arrear = $compensatory_details['attendance_bonus_arrear'] ?? 0;
                                    $salary_project_data->daily_allowance_arrear = $compensatory_details['daily_allowance_arrear'] ?? 0;
                                    $salary_project_data->salary_adv_arrear = $compensatory_details['salary_adv_arrear'] ?? 0;
                                    $salary_project_data->medical_deductions = $compensatory_details['medical_deductions'] ?? 0;
                                    $salary_project_data->uniform_deductions = $compensatory_details['uniform_deductions'] ?? 0;
                                    $salary_project_data->loan_deductions = $compensatory_details['loan_deductions'] ?? 0;
                                    $salary_project_data->save();
                                }
                            }
                                //array_push($res, $compensatory_details);
                        }

                    }
                }

            return $response = ([
                'status ' => "success",
                "message" => "data saved successfully",
                "data" => ""
            ]);
        } catch (\Exception $e) {
            return $response = ([
                "status" => "failure",
                "user_data" =>  $single_users['id'] . " " . $single_month,
                "user_month" => $single_users['id'] . " " . $single_month,
                "data" => $e->getmessage() . "line" . $e->getline()
            ]);
        }
    }
}
