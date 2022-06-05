<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtEmployeePayslipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO 
        Schema::create('vmt_employee_payslip', function (Blueprint $table) {
            $table->id();
            $table->text("EMP_NO")->nullable(); 
            $table->text("EMP_NAME")->nullable();
            $table->text("Gender")->nullable();
            $table->text("DESIGNATION")->nullable();
            $table->text("DEPARTMENT")->nullable();
            $table->text("DOJ")->nullable();
            $table->text("LOCATION")->nullable();
            $table->text("DOB")->nullable();
            $table->text("Father_Name")->nullable();
            $table->text("PAN_Number")->nullable();
            $table->text("Aadhar_Number")->nullable();
            $table->text("UAN")->nullable();
            $table->text("EPF_Number")->nullable();
            $table->text("ESIC_Number")->nullable(); 
            $table->text("Bank_Name")->nullable();
            $table->text("Account_Number")->nullable();
            $table->text("Bank_IFSC_Code")->nullable();
            $table->text("PAYROLL_MONTH")->nullable();
            $table->text("BASIC")->nullable();
            $table->text("HRA")->nullable();
            $table->text("CHILD_EDU_ALLOWANCE")->nullable();
            $table->text("SPL_ALW")->nullable();
            $table->text("TOTAL_FIXED_GROSS")->nullable();
            $table->text("MONTH_DAYS")->nullable();
            $table->text("Worked_Days")->nullable();
            $table->text("Arrears_Days")->nullable();
            $table->text("LOP")->nullable();
            $table->text("Earned_BASIC")->nullable();
            $table->text("BASIC_ARREAR")->nullable();
            $table->text("Earned_HRA")->nullable();
            $table->text("HRA_ARREAR")->nullable();
            $table->text("Earned_CHILD_EDU_ALLOWANCE")->nullable();
            $table->text("CHILD_EDU_ALLOWANCE_ARREAR")->nullable();
            $table->text("Earned_SPL_ALW")->nullable();
            $table->text("SPL_ALW_ARREAR")->nullable();
            $table->text("Overtime")->nullable();
            $table->text("TOTAL_EARNED_GROSS")->nullable();
            $table->text("PF_WAGES")->nullable();
            $table->text("PF_WAGES_ARREAR_EPFR")->nullable();
            $table->text("EPFR")->nullable();
            $table->text("EPFR_ARREAR")->nullable();
            $table->text("EDLI_CHARGES")->nullable();
            $table->text("EDLI_CHARGES_ARREARS")->nullable();
            $table->text("PF_ADMIN_CHARGES")->nullable();
            $table->text("PF_ADMIN_CHARGES_ARREARS")->nullable();
            $table->text("EMPLOYER_ESI")->nullable();
            $table->text("Employer_LWF")->nullable();
            $table->text("CTC")->nullable();
            $table->text("EPF_EE")->nullable();
            $table->text("EPF_EE_ARREAR")->nullable();
            $table->text("EMPLOYEE_ESIC")->nullable();
            $table->text("PROF_TAX")->nullable();
            $table->text("TDS")->nullable();
            $table->text("SAL_ADV")->nullable();
            $table->text("CANTEEN_DEDN")->nullable();
            $table->text("OTHER_DEDUC")->nullable();
            $table->text("LWF")->nullable();
            $table->text("TOTAL_DEDUCTIONS")->nullable();
            $table->text("NET_TAKE_HOME")->nullable();
            $table->text("Rupees")->nullable();
            $table->text("EL_Opn_Bal")->nullable();
            $table->text("Availed_EL")->nullable();
            $table->text("Balance_EL")->nullable();
            $table->text("Rename")->nullable();
            $table->text("Email")->nullable();
            $table->text("Greetings")->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_employee_payslip');
    }
}
