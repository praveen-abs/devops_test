<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtEmployeeCompensatoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO 
        Schema::create('vmt_employee_compensatory_details', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("basic");
            $table->string("hra");
            $table->string("Statutory_bonus");
            $table->string("child_education_allowance");
            $table->string("food_coupon");
            $table->string("lta");
            $table->string("special_allowance");
            $table->string("other_allowance");
            $table->string("gross");
            $table->string("epf_employer_contribution");
            $table->string("esic_employer_contribution");
            $table->string("insurance");
            $table->string("graduity");
            $table->string("cic");
            $table->string("epf_employee");
            $table->string("esic_employee");
            $table->string("professional_tax");
            $table->string("labour_welfare_fund");
            $table->string("net_income");
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
        Schema::dropIfExists('vmt_employee_compensatory_details');
    }
}
