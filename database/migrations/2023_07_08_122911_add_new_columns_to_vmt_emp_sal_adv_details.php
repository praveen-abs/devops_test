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
        Schema::table('vmt_emp_sal_adv_details', function (Blueprint $table) {
            $table->text('sal_adv_status')->after('sal_adv_crd_sts');
            $table->text('reviewer_cmds')->after('sal_adv_status');
            $table->date('paid_date')->after('reviewer_cmds');
            $table->text('UTR_number')->after('paid_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_emp_sal_adv_details', function (Blueprint $table) {
            //
        });
    }
};
