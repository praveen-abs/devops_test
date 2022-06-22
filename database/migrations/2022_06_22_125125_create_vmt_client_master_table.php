<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtClientMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO 
        Schema::create('vmt_client_master', function (Blueprint $table) {
            $table->id();
            $table->text("client_code")->nullable();
            $table->text("client_name")->nullable();
            $table->text("address")->nullable();
            $table->text("contract_start_date")->nullable();
            $table->text("contract_end_date")->nullable();
            $table->text("cin_number")->nullable();
            $table->text("company_tan")->nullable();
            $table->text("company_pan")->nullable();
            $table->text("gst_no")->nullable();
            $table->text("epf_reg_number")->nullable();
            $table->text("esic_reg_number")->nullable();
            $table->text("prof_tax_reg_number")->nullable();
            $table->text("lwf_reg_number")->nullable();
            $table->text("authorised_person_name")->nullable();
            $table->text("authorised_person_designation")->nullable();
            $table->text("authorised_person_contact_number")->nullable();
            $table->text("authorised_person_contact_email")->nullable();
            $table->text("billing_address")->nullable();
            $table->text("shipping_address")->nullable();
            $table->text("doc_uploads")->nullable();
            $table->text("product")->nullable();
            $table->text("subscription_type")->nullable();
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
        Schema::dropIfExists('vmt_client_master');
    }
}
