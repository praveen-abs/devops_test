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

        Schema::dropIfExists('vmt_inv_emp_formdata');
        Schema::dropIfExists('vmt_inv_f_emp_assigned');
        Schema::dropIfExists('vmt_inv_formsection');
        Schema::dropIfExists('vmt_inv_section');
        Schema::dropIfExists('vmt_inv_section_group');
        Schema::dropIfExists('vmt_inv_form');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
