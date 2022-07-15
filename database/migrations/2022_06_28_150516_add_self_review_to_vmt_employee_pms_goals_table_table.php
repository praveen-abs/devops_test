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
        Schema::table('vmt_employee_pms_goals_table', function (Blueprint $table) {
            // 
            // KPI - Achievement (Self Review)  Self KPI Achievement %  Comments

            $table->text('self_kpi_review')->after('id')->nullable();
            $table->text('self_kpi_percentage')->after('self_kpi_review')->nullable();
            $table->text('self_kpi_comments')->after('self_kpi_percentage')->nullable();

            $table->text('manager_kpi_review')->after('self_kpi_comments')->nullable();
            $table->text('manager_kpi_percentage')->after('manager_kpi_review')->nullable();
            $table->text('manager_kpi_comments')->after('manager_kpi_percentage')->nullable();
            $table->text('hr_kpi_review')->after('manager_kpi_comments')->nullable();
            $table->text('hr_kpi_percentage')->after('hr_kpi_review')->nullable();
            $table->text('hr_kpi_comments')->after('hr_kpi_percentage')->nullable();
            $table->string('employee_rejection_comments')->nullable();
            $table->string('manager_rejection_comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_employee_pms_goals_table', function (Blueprint $table) {
            //
            $table->dropColumn("self_kpi_review");
            $table->dropColumn("self_kpi_percentage");
            $table->dropColumn("self_kpi_comments");
            $table->dropColumn("manager_kpi_review");
            $table->dropColumn("manager_kpi_percentage");
            $table->dropColumn("manager_kpi_comments");
            $table->dropColumn("hr_kpi_review");
            $table->dropColumn("hr_kpi_percentage");
            $table->dropColumn("hr_kpi_comments");
        });
    }
};
