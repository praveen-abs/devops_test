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
        Schema::table('vmt_employee_office_details', function (Blueprint $table) {
                $table->dropColumn("emp_id");
                $table->dropColumn("l2_manager_code");
                $table->dropColumn("l2_manager_designation");
                $table->dropColumn("l2_manager_name");
                $table->dropColumn("l3_manager_code");
                $table->dropColumn("l3_manager_designation");
                $table->dropColumn("l3_manager_name");
                $table->dropColumn("l4_manager_code");
                $table->dropColumn("l4_manager_designation");
                $table->dropColumn("l4_manager_name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_employee_office_details', function (Blueprint $table) {
            $table->text("emp_id");
            $table->text("l2_manager_code");
            $table->text("l2_manager_designation");
            $table->text("l2_manager_name");
            $table->text("l3_manager_code");
            $table->text("l3_manager_designation");
            $table->text("l3_manager_name");
            $table->text("l4_manager_code");
            $table->text("l4_manager_designation");
            $table->text("l4_manager_name");
        });
    }
};
