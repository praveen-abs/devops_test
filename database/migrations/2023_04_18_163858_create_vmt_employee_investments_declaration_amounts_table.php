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
        Schema::create('vmt_emp_investments_dec_amt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_sectionparticular_id')->constrained('vmt_investment_form_secpat');
            $table->integer("declaration_amount");
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
        Schema::dropIfExists('vmt_emp_investments_dec_amt');
    }
};
