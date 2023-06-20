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
             $table->text('approv_line_manager1')->default('0')->after('sal_adv_crd_sts');
             $table->text('approv_line_manager2')->default('0')->after('approv_line_manager1');
             $table->text('approv_hr')->default('0')->after('approv_line_manager2');
             $table->text('approv_finance_admin')->default('0')->after('approv_hr');
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
            dropColumnIfExists('vmt_emp_sal_adv_details',"approv_line_manager1");
            dropColumnIfExists('vmt_emp_sal_adv_details',"approv_line_manager2");
            dropColumnIfExists('vmt_emp_sal_adv_details',"approv_hr");
            dropColumnIfExists('vmt_emp_sal_adv_details',"approv_finance_admin");
        });
    }
};
