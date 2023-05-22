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
        Schema::table('vmt_inv_section', function (Blueprint $table) {
            $table->text('section_options')->after('max_amount')->nullable();
        });

        Schema::table('vmt_inv_emp_formdata', function (Blueprint $table) {
            $table->text('selected_section_options')->after('json_popups_value')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('vmt_inv_emp_formdata', function (Blueprint $table) {
            $table->dropColumn('selected_section_options');
        });

        Schema::table('vmt_inv_section', function (Blueprint $table) {
            $table->dropColumn('section_options');
        });


    }
};
