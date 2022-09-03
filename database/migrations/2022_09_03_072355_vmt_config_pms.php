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
        Schema::create('vmt_config_pms', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->text('selected_columns')->nullable();
            $table->text('selected_head')->nullable();
            $table->text('column_header')->nullable();
            $table->text('selected_reviewlevel')->nullable();
            $table->timestamps('created_at');
            $table->string('updated_at');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vmt_config_pms');
    }
};
