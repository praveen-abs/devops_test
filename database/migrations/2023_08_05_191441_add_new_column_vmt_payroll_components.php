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
            if (!Schema::hasColumn('vmt_payroll_components', 'flat_amount')) {
                $table->text('flat_amount')->after('calculation_method_id');
            }
            if (!Schema::hasColumn('vmt_payroll_components', 'percentage')) {
                $table->text('percentage')->after('flat_amount');
            }
            if (!Schema::hasColumn('vmt_payroll_components', 'is_default_pfwages')) {
                $table->text('is_default_pfwages')->after('pt');
            }
            if (!Schema::hasColumn('vmt_payroll_components', 'comp_identifier')) {
                $table->text('comp_identifier')->after('is_default_pfwages');
            }
            if (!Schema::hasColumn('vmt_payroll_components', 'calculation_desc')) {
                $table->text('calculation_desc')->after('calculation_method_id');
            }
            if (!Schema::hasColumn('vmt_payroll_components', 'calculation_amount')) {
                $table->text('calculation_amount')->after('calculation_desc');
            }

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
            $table->dropColumn('is_default_pfwages');
            $table->dropColumn('comp_identifier');
            $table->dropColumn('calculation_desc');
            $table->dropColumn('calculation_amount');



        });

    }
};
