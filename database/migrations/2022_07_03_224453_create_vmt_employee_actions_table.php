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
        Schema::create('vmt_employee_actions', function (Blueprint $table) {
            $table->id();
            $table->string("action_type")->nullable();
            $table->string("action_message")->nullable();
            $table->string("action_status")->nullable();
            $table->dateTime("trigger_date")->nullable();
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
        Schema::dropIfExists('vmt_employee_actions');
    }
};
