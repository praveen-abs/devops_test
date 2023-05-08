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
        Schema::create('vmt_inv_formsection', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('vmt_inv_form');
            $table->foreignId('section_id')->constrained('vmt_inv_section');
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
        Schema::dropIfExists('vmt_inv_formsection');
    }
};
