<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtEmployeeOfficeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // S NO 
        Schema::create('vmt_employee_office_details', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->integer("user_id");//Link between USERS and VmtEmployeeOfficeDetails table
            $table->text("department")->nullable();
            $table->text("process")->nullable();
            $table->text("designation")->nullable();
            $table->text("cost_center")->nullable();
            $table->text("confirmation_period")->nullable();
            $table->text("holiday_location")->nullable();
            $table->text("l1_manager_code")->nullable();
            $table->text("l1_manager_designation")->nullable();
            $table->text("l1_manager_name")->nullable();
            $table->text("l2_manager_code")->nullable();
            $table->text("l2_manager_designation")->nullable();
            $table->text("l2_manager_name")->nullable();
            $table->text("l3_manager_code")->nullable();
            $table->text("l3_manager_designation")->nullable();
            $table->text("l3_manager_name")->nullable();
            $table->text("l4_manager_code")->nullable();
            $table->text("l4_manager_designation")->nullable();
            $table->text("l4_manager_name")->nullable();
            $table->text("work_location")->nullable();
            $table->text("officical_mail")->nullable();
            $table->text("official_mobile")->nullable();
            $table->text("emp_notice")->nullable();
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
        Schema::dropIfExists('vmt_employee_office_details');
    }
}
