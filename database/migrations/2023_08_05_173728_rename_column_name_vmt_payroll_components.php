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
            $table->renameColumn("calculation_method", "calculation_method_id");

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
            $table->dropColumn('calculation_method_id');
        });

    }
};
