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
        Schema::create('vmt_employee_attendance_v2', function (Blueprint $table) {

            #Core attendance
            $table->id();
            $table->integer('user_id');
            $table->integer('vmt_employee_workshift_id');
            $table->date('date');
            $table->text('checkin_time')->nullable();
            $table->date('checkin_date')->nullable();
            $table->text('checkout_time')->nullable();
            $table->date('checkout_date')->nullable();
            $table->text('status');
            $table->text('work_mode')->nullable(); #work, office
            $table->text('selfie_checkin')->nullable();
            $table->text('selfie_checkout')->nullable();
            $table->text('checkin_comments')->nullable();
            $table->text('checkout_comments')->nullable();
            $table->text('attendance_mode_checkin')->nullable(); #web,mobile,bio
            $table->text('attendance_mode_checkout')->nullable(); #web,mobile,bio
            $table->text('checkin_lat_long')->nullable();
            $table->text('checkout_lat_long')->nullable();
            //$table->integer('overtime')->nullable(); # can be calculated from current shifttime and checkout time + limit 

            #only during approvals
            // $table->integer('lc_status')->nullable();
            //  $table->integer('eg_status')->nullable();
            // $table->integer('lc_minutes')->nullable(); # can be calculated from current shifttime and regularized time
            // $table->integer('eg_minutes')->nullable(); # can be calculated from current shifttime and regularized time

            #MIP status , mip time , 
            #MOP status , mop time , 

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
        Schema::dropIfExists('vmt_employee_attendance_v2');
    }
};
