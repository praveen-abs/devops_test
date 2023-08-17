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
            if (Schema::hasColumn('vmt_payroll_components', 'calculation_method')) {
                $table->renameColumn("calculation_method", "calculation_method_id");
            }
            if (Schema::hasColumn('vmt_payroll_components', 'epf')) {
                $table->renameColumn("epf", "is_part_of_epf");
            }
            if (Schema::hasColumn('vmt_payroll_components', 'esi')) {
                $table->renameColumn("esi", "is_part_of_esi");
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
            
            if (Schema::hasColumn('vmt_payroll_components', 'is_part_of_epf')) {
                $table->dropColumn('is_part_of_epf');
            }
            if (Schema::hasColumn('vmt_payroll_components', 'is_part_of_esi')) {
                $table->dropColumn('is_part_of_esi');
            }

        });

    }
};
