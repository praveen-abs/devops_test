<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtGeneralInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO 
        Schema::create('vmt_general_info', function (Blueprint $table) {
            $table->id();
            $table->text("short_name")->nullable(); 
            $table->text("login_instruction")->nullable();
            $table->text("logo_img")->nullable();
            $table->text("background_img")->nullable();
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
        Schema::dropIfExists('vmt_general_info');
    }
}
