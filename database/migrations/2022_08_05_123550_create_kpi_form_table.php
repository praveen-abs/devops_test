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
        Schema::create('vmt_kpi_form_table', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->text('dimension');
            $table->text('kpi');
            $table->text('operational_definition');
            $table->text('measure');
            $table->text('frequency');
            $table->text('target');
            $table->text('stretch_target');
            $table->text('source');
            $table->text('kpi_weightage');
            $table->string('author_id');
            $table->string('author_name');
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
        Schema::dropIfExists('vmt_kpi_form_table');
    }
};
