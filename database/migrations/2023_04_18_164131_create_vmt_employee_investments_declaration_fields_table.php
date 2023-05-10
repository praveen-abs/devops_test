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
        Schema::create('vmt_emp_investments_dec_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_sectionparticular_id')->constrained('vmt_investment_form_secpat');
            $table->foreignId('declaration_field_id')->constrained('vmt_investment_declarations_fields');
            $table->integer("declaration_field_value");
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
        Schema::dropIfExists('vmt_emp_investments_dec_fields');
    }
};
