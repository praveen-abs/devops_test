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
        Schema::create('vmt_investment_form_secpat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('vmt_investment_forms');
            $table->foreignId('sec_pat_id')->constrained('vmt_investment_section_particulars');
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
        Schema::dropIfExists('vmt_investment_form_secpat');
    }
};
