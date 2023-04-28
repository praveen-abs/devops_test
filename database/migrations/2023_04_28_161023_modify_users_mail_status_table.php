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
        Schema::table('vmt_user_mail_status', function (Blueprint $table) {

            $table->integer("welcome_mail_status")->change();
            $table->integer("onboard_docs_approval_status")->change();
            $table->integer("acc_activation_mail_status")->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_user_mail_status');
    }
};
