<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vmt_config_master', function (Blueprint $table) {
            $table->id();
            $table->text("config_name");
            $table->text("config_value");
            $table->timestamps();
        });

        //Default Configs

        DB::table('vmt_config_master')->insert(array(
            ['config_name'=>'client_code', 'config_value'=>'ABS'],
            ['config_name'=>'can_send_appointmentletter_after_onboarding', 'config_value'=>'true'],
    
        ));        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_config_master');
    }
};
