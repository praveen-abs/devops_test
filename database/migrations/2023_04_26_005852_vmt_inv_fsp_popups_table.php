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
        Schema::create('vmt_inv_fsp_popups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fsp_id')->constrained('vmt_investment_form_secpat');
            $table->foreignId('popupfield_id')->constrained('vmt_inv_popup_fields');

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
        Schema::dropIfExists('vmt_inv_fsp_popups');
    }
};
