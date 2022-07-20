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
        Schema::create('vmt_holidays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('holiday_name')->nullable();
            $table->dateTime('holiday_date')->nullable();
            $table->text('holiday_description')->nullable();
            $table->text('image')->nullable();

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_holidays');
    }
};
