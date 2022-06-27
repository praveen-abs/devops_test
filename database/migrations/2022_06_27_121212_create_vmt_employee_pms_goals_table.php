<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtEmployeePmsGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO 
        Schema::create('vmt_employee_pms_goals_table', function (Blueprint $table) {
            $table->id();
            $table->text("kpi_table_id")->nullable();
            $table->text("assignment_period")->nullable();
            $table->text("coverage")->nullable();
            $table->text("reviewer_id")->nullable();
            $table->text("employee_id")->nullable();
            $table->text("mail_link")->nullable();
            $table->text("author_id")->nullable();
            $table->boolean("self_approved")->nullable();
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
        Schema::dropIfExists('vmt_employee_pms_goals_table');
    }
}
