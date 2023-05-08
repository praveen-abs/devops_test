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
        Schema::create('vmt_inv_section', function (Blueprint $table) {
            $table->id();
            $table->text('section');
            $table->text('particular');
            $table->text('reference');
            $table->integer('max_amount');
            $table->text('proofs');
            $table->text('status');
            $table->text('actions');
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
        Schema::dropIfExists('vmt_inv_section');
    }
};
