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
        Schema::create('vmt_employee_attendance', function (Blueprint $table) {
            $table->id();
            $table->string("date")->nullable();
            $table->dateTime("checkin_time")->nullable();
            $table->dateTime("checkout_time")->nullable();            
            $table->string("shift_type")->nullable();
            $table->string("leave_type_id")->nullable();
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
        Schema::dropIfExists('vmt_employee_attendance');
    }
};
