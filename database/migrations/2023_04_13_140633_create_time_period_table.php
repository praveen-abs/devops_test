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
        Schema::table('vmt_time_period', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('abbrevation');
            $table->date('start_month');
            $table->date('end_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_time_period', function (Blueprint $table) {
            Schema::dropIfExists('vmt_time_period');
        });
    }
};
