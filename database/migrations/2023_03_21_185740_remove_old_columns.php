<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vmt_employee_details', function (Blueprint $table) {

            $table->dropColumn("emp_no");
            $table->dropColumn("status");
            $table->dropColumn("uan");
            $table->dropColumn("epf_number");
            $table->dropColumn("esic_number");


            $table->dropColumn("basic");
            $table->dropColumn("hra");
            $table->dropColumn("child_edu_allowance");
            $table->dropColumn("spl_alw");
            $table->dropColumn("total_fixed_gross");
            $table->dropColumn("epfemployer");
            $table->dropColumn("esicemployer");

            $table->dropColumn("ctc");
            $table->dropColumn("epfemployee");
            $table->dropColumn("esicemployee");
            $table->dropColumn("pt");
            $table->dropColumn("net");
            $table->dropColumn("esic_applicability");


            $table->dropColumn("experience_json");
            $table->dropColumn("family_info_json");
            $table->dropColumn("contact_json");
            $table->dropColumn("father_name");
            $table->dropColumn("mother_dob");
            $table->dropColumn("father_dob");
            $table->dropColumn("father_gender");
            $table->dropColumn("mother_gender");
            $table->dropColumn("father_age");
            $table->dropColumn("mother_name");
            $table->dropColumn("mother_age");
            $table->dropColumn("spouse_name");
            $table->dropColumn("spouse_age");
            $table->dropColumn("kid_name");
            $table->dropColumn("kid_age");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_employee_details', function (Blueprint $table) {
            $table->text("emp_no");
            $table->text("status");
            $table->text("uan");
            $table->text("epf_number");
            $table->text("esic_number");


            $table->text("basic");
            $table->text("hra");
            $table->text("child_edu_allowance");
            $table->text("spl_alw");
            $table->text("total_fixed_gross");
            $table->text("epfemployer");
            $table->text("esicemployer");

            $table->text("ctc");
            $table->text("epfemployee");
            $table->text("esicemployee");
            $table->text("pt");
            $table->text("net");
            $table->text("esic_applicability");


            $table->text("experience_json");
            $table->text("family_info_json");
            $table->text("contact_json");
            $table->text("father_name");
            $table->text("mother_dob");
            $table->text("father_dob");
            $table->text("father_gender");
            $table->text("mother_gender");
            $table->text("father_age");
            $table->text("mother_name");
            $table->text("mother_age");
            $table->text("spouse_name");
            $table->text("spouse_age");
            $table->text("kid_name");
            $table->text("kid_age");
        });
    }
};
