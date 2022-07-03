<?php

use App\Models\VmtLeaves;
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
        Schema::create('vmt_leaves', function (Blueprint $table) {
            $table->id();
            $table->string("leave_type")->nullable();
            $table->string("leave_max_limit")->nullable();
            $table->timestamps();
        });

        VmtLeaves::create(['leave_type' => 'sick_leave','leave_max_limit' => '10']);
        VmtLeaves::create(['leave_type' => 'lop_leave','leave_max_limit' => '5']);
        VmtLeaves::create(['leave_type' => 'casual_leave','leave_max_limit' => '3']);
        VmtLeaves::create(['leave_type' => 'compensatory_leave','leave_max_limit' => '2']);
        VmtLeaves::create(['leave_type' => 'flexidayoff_leave','leave_max_limit' => '8']);
                         

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vmt_leaves');
    }
};
