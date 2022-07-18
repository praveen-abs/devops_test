<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtEmployeeExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vmt_employee_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('user_id');
            $table->string('company_name');
            $table->string('location');
            $table->string('job_position');
            $table->date('period_from');
            $table->date('period_to');
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
        Schema::dropIfExists('vmt_employee_experiences');
    }
}
