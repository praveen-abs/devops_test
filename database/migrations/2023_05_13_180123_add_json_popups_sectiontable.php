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
        //vmt_inv_section
        Schema::table('vmt_inv_section', function (Blueprint $table) {
            $table->json('Json_popups')->nullable()->after('max_amount');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_inv_section', function (Blueprint $table) {
            $table->dropColumn('Json_popups');
    });

    }
};;
