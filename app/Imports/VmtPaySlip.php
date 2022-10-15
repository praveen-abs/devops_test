<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Models\VmtEmployeePaySlip;
use App\Models\User;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared;

class VmtPaySlip implements ToModel,  WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    //public function collection(Collection $row)
    //{
        //
        //dd($collection);
        //foreach ($collection as $key => $value) {
            // code...

        //}
    public function model(array $row)
    {

        return $row; 
       /* $errorMessage = "";
            //dd($row);
            $user_id = User::where('user_code',$row['emp_no'])->value('id');

            if (!isset($row['emp_no']) && $user_id) {

                $errorMessage .=$row['emp_name'];
                return $errorMessage;
            }else{
            return new VmtEmployeePaySlip([
            "EMP_NO" => $row['emp_no'],
            "user_id" => $user_id,
            "Gender" => $row['gender'],
            "DESIGNATION" => $row['designation'],
            "DEPARTMENT" => $row['department'],
            "DOJ" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['doj'])->format('Y-m-d'),
            "LOCATION" => $row['location'],
            "DOB" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob'])->format('Y-m-d'),
            "Father_Name" => $row['father_name'],
            "PAN_Number" => $row['pan_number'],
            "Aadhar_Number" => $row['aadhar_number'],
            "UAN" => $row['uan'],
            "EPF_Number" => $row["epf_number"], // => "EPF123"
            "ESIC_Number" => $row["esic_number"], // => "Not Applicable",
            "Bank_Name" => $row["bank_name"],
            "Account_Number" => $row["account_number"],
            "Bank_IFSC_Code" => $row["bank_ifsc_code"],
            "PAYROLL_MONTH" => $row["payroll_month"],
            "BASIC" => $row["basic"],
            "HRA" => $row["hra"],
            "CHILD_EDU_ALLOWANCE" => $row["child_edu_allowance"],
            "SPL_ALW" => $row["spl_alw"],
            "TOTAL_FIXED_GROSS" => $row["total_fixed_gross"],
            "MONTH_DAYS" => $row["month_days"],
            "Worked_Days" => $row["worked_days"],
            "Arrears_Days" => $row["arrears_days"],
            "LOP" => $row["lop"],
            "Earned_BASIC" => $row["earned_basic"],
            "BASIC_ARREAR" => $row["basic_arrear"],
            "Earned_HRA" => $row["earned_hra"],
            "HRA_ARREAR" => $row["hra_arrear"],
            "Earned_CHILD_EDU_ALLOWANCE" => $row["earned_child_edu_allowance"],
            "CHILD_EDU_ALLOWANCE_ARREAR" => $row["child_edu_allowance_arrear"],
            "Earned_SPL_ALW" => $row["earned_spl_alw"],
            "SPL_ALW_ARREAR" => $row["spl_alw_arrear"],
            "Overtime" => $row["overtime"],
            "TOTAL_EARNED_GROSS" => $row["total_earned_gross"],
            "PF_WAGES" => $row["pf_wages"],
            "PF_WAGES_ARREAR_EPFR" => $row["pf_wages_arrear"],
            "EPFR" => $row["epfr"],
            "EPFR_ARREAR"   => $row["epfr_arrear"],
            "EDLI_CHARGES" => $row["edli_charges"],
            "EDLI_CHARGES_ARREARS" => $row["edli_charges_arrears"],
            "PF_ADMIN_CHARGES" => $row["pf_admin_charges"],
            "PF_ADMIN_CHARGES_ARREARS" => $row["pf_admin_charges_arrears"],
            "EMPLOYER_ESI" => $row["employer_esi"],
            "Employer_LWF" => $row["employer_lwf"],
            "CTC" => $row["ctc"],
            "EPF_EE" => $row["epf_ee"],
            "EPF_EE_ARREAR" => $row['epf_ee_arrear'],
            "EMPLOYEE_ESIC" => $row['employee_esic'],
            "PROF_TAX" => $row['prof_tax'],
            "TDS" => $row["tds"],
            "SAL_ADV" => $row['sal_adv'],
            "CANTEEN_DEDN" => $row['canteen_dedn'],
            "OTHER_DEDUC" => $row["other_deduc"],
            "LWF" => $row["lwf"],
            "TOTAL_DEDUCTIONS" => $row["total_deductions"],
            "NET_TAKE_HOME" => $row["net_take_home"],
            "Rupees" => $row["rupees"],
            "EL_Opn_Bal" => $row["el_opn_bal"],
            "Availed_EL" => $row["availed_el"],
            "Balance_EL" => $row["balance_el"],
            "Rename" => $row['rename'],
            "Email" => $row['email'],
            "Greetings" => $row['greetings']
        ]);
        }*/
    }

    }
    //}
