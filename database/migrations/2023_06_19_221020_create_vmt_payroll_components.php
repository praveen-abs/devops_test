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
        Schema::create('vmt_payroll_components', function (Blueprint $table) {
            $table->id();
            $table->text('comp_name');
            $table->text('comp_type_id');
            $table->text('comp_nature_id');
            $table->text('category_id');
            $table->text('calculation_method');
            $table->text('taxability');
            $table->text('epf');
            $table->text('esi');
            $table->text('pt');
            $table->text('lwf');
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
        Schema::dropIfExists('vmt_payroll_components');
    }
};
