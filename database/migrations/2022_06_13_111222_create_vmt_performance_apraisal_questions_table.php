<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateVmtPerformanceApraisalQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // S NO   KPI   Measure Frequency   Target  stretch_target  Source  
        Schema::create('vmt_performance_apraisal_questions', function (Blueprint $table) {
            $table->id();
            $table->text("dimension")->nullable();
            $table->text("kpi")->nullable();
            $table->text("operational_definition")->nullable();
            $table->text("measure")->nullable();
            $table->text("frequency")->nullable();
            $table->text("target")->nullable();
            $table->text("stretch_target")->nullable();
            $table->text("source")->nullable();
            $table->text("kpi_weightage")->nullable();
            $table->text("author_id")->nullable();
            $table->text("author_name")->nullable();
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
        Schema::dropIfExists('vmt_performance_apraisal_questions');
    }
}
