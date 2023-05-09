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
        Schema::create('vmt_inv_emp_formdata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('f_emp_id')->constrained('vmt_inv_f_emp_assigned');
            $table->foreignId('fs_id')->constrained('vmt_inv_formsection');
            $table->integer('dec_amount');
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
        Schema::dropIfExists('vmt_inv_emp_formdata');
    }
};
