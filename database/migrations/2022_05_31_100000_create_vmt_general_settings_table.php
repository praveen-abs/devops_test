<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vmt_general_settings', function (Blueprint $table) {
            $table->id();
            $table->text('workflow_component')->nullable();
            $table->text('associate_wise_template')->nullable();
            $table->text('kra_competency')->nullable();
            $table->text('increment_percentage')->nullable();
            $table->text('report_component')->nullable();
            $table->text('rating_preference')->nullable();
            $table->text('annual_score_calculation')->nullable();
            $table->text('show_employee_review_rating')->nullable();
            $table->text('employee_review_components')->nullable();
            $table->text('percentage_components')->nullable();
            $table->text('percentage_groupwise')->nullable();
            $table->text('finalscore_calculation_method')->nullable();
            $table->text('achievement_based_rating')->nullable();

            $table->text('show_all_managers_to_employee')->nullable();

            $table->text('show_rated_managers')->nullable();

            $table->text('rating_period_based')->nullable();

            $table->text('rating_component')->nullable();

           
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
        Schema::dropIfExists('vmt_general_settings');
    }
}
