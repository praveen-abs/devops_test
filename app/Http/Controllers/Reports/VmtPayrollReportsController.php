<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

use App\Models\ConfigPms;
use App\Models\VmtPMS_KPIFormAssignedModel;
use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\VmtEmployeePaySlip;
use App\Models\VmtEmployeeOfficeDetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\VmtPayrollReports;
use App\Exports\VmtPmsReviewsReport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VmtPayrollReportsController extends Controller
{

    public function showPayrollReportsPage(Request $request){

        $query_payroll_year=VmtEmployeePaySlip::groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        //$query_payroll_months= VmtEmployeePaySlip::groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        $work_location= VmtEmployeeOfficeDetails::groupby('work_location')->pluck('work_location');
        $designation= VmtEmployeePaySlip::leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->groupby('vmt_employee_office_details.designation')->pluck('vmt_employee_office_details.designation');

        for($i=0; $i < count($query_payroll_year); $i++)
        {
            $query_payroll_year[$i] = date("Y",strtotime($query_payroll_year[$i]));
        }

        $payroll_available_years = array_unique($query_payroll_year->toArray());


        return view('reports.vmt_showPayrollReports', compact('work_location','designation','payroll_available_years'));
    }

    public function fetchPayrollMonthForGivenYear(Request $request){
        $payroll_month=VmtEmployeePaySlip::whereYear('vmt_employee_payslip.PAYROLL_MONTH',$request->payroll_year)->groupby('PAYROLL_MONTH')->pluck('PAYROLL_MONTH');
        for($i=0; $i < count($payroll_month); $i++)
        {

            $payroll_month[$i] = date("m",strtotime($payroll_month[$i]));
        }
        $payroll_available_months = array_unique($payroll_month->toArray());

        return $payroll_available_months;
    }


    public function generatePayrollReports(Request $request){

        $filename = 'PayrollReports_'.$request->payroll_month.'.xlsx';
        return Excel::download(new VmtPayrollReports($request->payroll_month), $filename ,null, [\Maatwebsite\Excel\Excel::XLSX]);
    }

    public function fetchPayrollReport(Request $request){
        //  dd($request->all());
        $payroll_data=VmtEmployeePaySlip::leftJoin('vmt_employee_compensatory_details', 'vmt_employee_compensatory_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('users', 'users.id', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('vmt_employee_details', 'vmt_employee_details.userid', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('vmt_employee_office_details', 'vmt_employee_office_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->leftJoin('vmt_employee_statutory_details', 'vmt_employee_statutory_details.user_id', '=', 'vmt_employee_payslip.user_id')
        ->whereYear('vmt_employee_payslip.PAYROLL_MONTH', $request->payroll_year)
        // ->orWhere('vmt_employee_office_details.work_location',$request->work_location)
        ->select('users.user_code',
                 'users.name',

                 'vmt_employee_office_details.DESIGNATION',
                 'vmt_employee_details.doj',
                 'vmt_employee_details.dob',

                 'vmt_employee_office_details.work_location',

                  'vmt_employee_details.Aadhar_Number',
                  'vmt_employee_details.PAN_Number',

                 'vmt_employee_statutory_details.uan_number',
                 'vmt_employee_statutory_details.epf_number',
                 'vmt_employee_statutory_details.esic_number',

                 'vmt_employee_details.bank_id',
                 'vmt_employee_details.bank_account_number',
                 'vmt_employee_details.bank_ifsc_code',
                 'vmt_employee_details.mobile_number',

                 'vmt_employee_office_details.officical_mail',

                 //Abry and Enitiy
                 'vmt_employee_payslip.PAYROLL_MONTH',
                 //Total Emoluments
                 'vmt_employee_payslip.BASIC',
                 'vmt_employee_payslip.HRA',
                 'vmt_employee_payslip.SPL_ALW',
                 'vmt_employee_payslip.TOTAL_FIXED_GROSS',

                 'vmt_employee_statutory_details.esic_applicable',

                 'vmt_employee_payslip.MONTH_DAYS',
                 'vmt_employee_payslip.Worked_Days',
                 'vmt_employee_payslip.Arrears_Days',
                 'vmt_employee_payslip.LOP',
                 'vmt_employee_payslip.Earned_BASIC',
                 'vmt_employee_payslip.BASIC_ARREAR',
                 'vmt_employee_payslip.Earned_HRA',
                 'vmt_employee_payslip.HRA_ARREAR',
                 'vmt_employee_payslip.Earned_SPL_ALW',
                 'vmt_employee_payslip.SPL_ALW_ARREAR',
                 'vmt_employee_payslip.Overtime',
                 //Overtime Arrears
                 'vmt_employee_payslip.TOTAL_EARNED_GROSS',
                 'vmt_employee_payslip.PF_WAGES',
                 'vmt_employee_payslip.PF_WAGES_ARREAR_EPFR',
                 'vmt_employee_payslip.EPFR',
                 'vmt_employee_payslip.EPFR_ARREAR',
                 'vmt_employee_payslip.EDLI_CHARGES',
                 'vmt_employee_payslip.EDLI_CHARGES_ARREARS',
                 'vmt_employee_payslip.PF_ADMIN_CHARGES',
                 'vmt_employee_payslip.PF_ADMIN_CHARGES_ARREARS',
                 'vmt_employee_payslip.EMPLOYER_ESI',
                 'vmt_employee_payslip.Employer_LWF',
                 'vmt_employee_payslip.CTC',
                 'vmt_employee_payslip.EPF_EE',
                 //VPF
                 'vmt_employee_payslip.EPF_EE_ARREAR',
                 'vmt_employee_payslip.EMPLOYEE_ESIC',
                 'vmt_employee_payslip.PROF_TAX',
                 //'vmt_employee_payslip.TDS',
                 //incomeTax
                 'vmt_employee_payslip.SAL_ADV',
                 'vmt_employee_payslip.CANTEEN_DEDN',
                 'vmt_employee_payslip.OTHER_DEDUC',
                 'vmt_employee_payslip.LWF',
                 'vmt_employee_payslip.TOTAL_DEDUCTIONS',
                 'vmt_employee_payslip.NET_TAKE_HOME'
        );

        // For Filter Option

        if($request->payroll_month!="all"){
            $payroll_data=$payroll_data->whereMonth('vmt_employee_payslip.PAYROLL_MONTH',$request->payroll_month);
        }


        if($request->work_location !="all"){
            $payroll_data = $payroll_data->where('vmt_employee_office_details.work_location',$request->work_location);
        }

        if (session('client_id') != '1') {
            $payroll_data = $payroll_data-> where('users.client_id', session('client_id'));
            //return ($payroll_data);
        }

        //fetch bank names
        $payroll_data = $payroll_data->get();

        foreach($payroll_data as $singlePayrollData)
        {
            $singlePayrollData['bank_name'] = Bank::find($singlePayrollData->bank_id)->bank_name;
        }

        //dd($payroll_data->get());
        //dd( $payroll_data);
        return $payroll_data;
    }

}
