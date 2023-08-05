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
        //
        Schema::table('vmt_payroll_components', function (Blueprint $table) {

            $table->text('flat_amount')->after('calculation_method_id');
            $table->text('percentage')->after('flat_amount');


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
        Schema::table('vmt_payroll_components', function (Blueprint $table) {

            $table->dropColumn('flat_amount');
            $table->dropColumn('percentage');


        });

    }
};
