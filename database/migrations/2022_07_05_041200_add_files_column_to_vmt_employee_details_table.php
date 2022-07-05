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
        Schema::table('vmt_employee_details', function (Blueprint $table) {
            //
            $table->text('aadhar_card_file')->after('kid_age')->nullable();
            $table->text('pan_card_file')->after('aadhar_card_file')->nullable();
            $table->text('passport_file')->after('pan_card_file')->nullable();
            $table->text('voters_id_file')->after('passport_file')->nullable();
            $table->text('dl_file')->after('voters_id_file')->nullable();
            $table->text('education_certificate_file')->after('dl_file')->nullable();
            $table->text('reliving_letter_file')->after('education_certificate_file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_employee_details', function (Blueprint $table) {
            //
        });
    }
};
