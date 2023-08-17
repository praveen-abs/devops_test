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
        Schema::create('vmt_payroll_epf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('vmt_client_master');
            $table->text('epf_number');
            $table->text('epf_deduction_cycle');
            $table->integer('is_epf_num_default');
            $table->text('epf_rule');
            $table->text('epf_contrib_type');
            $table->text('pro_rated_lop_status');
            $table->text('can_consider_salcomp_pf');
            $table->text('employer_contrib_in_ctc');
            $table->text('employer_edli_contri_in_ctc');
            $table->text('admin_charges_in_ctc');
            $table->text('override_pf_contrib_rate');
            $table->text('status');
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
        Schema::dropIfExists('vmt_payroll_epf');
    }
};
