<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO 
        Schema::create('vmt_employee_details', function (Blueprint $table) {
            $table->id();
            $table->text("emp_no")->nullable();
            $table->text("emp_name")->nullable();
            $table->text("gender")->nullable();
            $table->text("designation")->nullable();
            $table->text("department")->nullable();
            $table->text("status")->nullable();
            $table->text("doj")->nullable();
            $table->text("dol")->nullable();
            $table->text("location")->nullable();
            $table->text("dob")->nullable();
            $table->text("father_name")->nullable();
            $table->text("pan_number")->nullable();
            $table->text("pan_ack")->nullable();
            $table->text("aadhar_number")->nullable();
            $table->text("uan")->nullable();
            $table->text("epf_number")->nullable();
            $table->text("esic_number")->nullable();
            $table->text("marrital_status")->nullable();
            $table->text("basic")->nullable();
            $table->text("hra")->nullable();
            $table->text("child_edu_allowance")->nullable();
            $table->text("spl_alw")->nullable();
            $table->text("total_fixed_gross")->nullable();
            $table->text("epfemployer")->nullable();
            $table->text("esicemployer")->nullable();
            $table->text("ctc")->nullable();
            $table->text("epfemployee")->nullable();
            $table->text("esicemployee")->nullable();
            $table->text("pt")->nullable();
            $table->text("net")->nullable();
            $table->text("esic_applicability")->nullable();
            $table->text("mobile_number")->nullable();
            $table->text("email_id")->nullable();
            $table->text("bank_name")->nullable();
            $table->text("bank_ifsc_code")->nullable();
            $table->text("bank_account_number")->nullable();
            $table->text("present_address")->nullable();
            $table->text("permanent_address")->nullable();
            $table->text("father_age")->nullable();
            $table->text("mother_name")->nullable();
            $table->text("mother_age")->nullable();
            $table->text("spouse_name")->nullable();
            $table->text("spouse_age")->nullable();
            $table->text("kid_name")->nullable();
            $table->text("kid_age")->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('passport')->nullable();
            $table->string('voters_id')->nullable();
            $table->string('dl_file')->nullable();
            $table->string('education_certificate')->nullable();
            $table->string('reliving_letter')->nullable();

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
        Schema::dropIfExists('vmt_employee_details');
    }
}
