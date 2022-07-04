<?php

use App\Models\VmtAppraisalQuestion;
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
        Schema::table('vmt_performance_apraisal_questions', function (Blueprint $table) {
            //
        });

        VmtAppraisalQuestion::create([
            'dimension'=>"Finance",

            'kpi'=>"Ensuring Timely payout to employees on the Salary & reimbursement claimed (Target > 95%) Adherence to Statutory & Compliance regulations KCF/RR: reduce 0-1-2 ratings in KCF by Q4 assessment",

            'operational_definition'=>"Adherence to Statutory & Compliance regulations KCF/RR:reduce 0-1-2 ratings in KCF by Q4 assessment Bottom line impact",

            'measure'=>"Tracking of reimbursement should be done till Payout. Follow a comprehensive checklist & ensure NIL deviations to Statutory & compliance norms. Timely reports to Finance Team as per the requirement. Concerns raised on KCF to be ascertained & gaps in the process to be arrested. Aim to have all KCF points under 4 or 5 category by Q4",                          

            'frequency'=>"Monthly",

            'target'=>"100% Compliance",

            'stretch_target'=>"100% Compliance",

            'source'=>"System / Manual",

            'kpi_weightage'=>"15%",

            'author_id'=>"1",

            'author_name'=>"Admin"

        ]);        

        VmtAppraisalQuestion::create([
            'dimension'=>"Customer",

            'kpi'=>"Drive Improvement on Payroll & Reimbursement process Improve Reimbursement TAT (Target 100%) Quality of deliverables (Target 100%) Timely Query handling (Target 100%)",

            'operational_definition'=>"Drive Improvement on Input Adherance (Target > 85%) Improve Payroll TAT (Target 100%) Quality of deliverables (Target 100%) Timely Query handling (Target 100%) Tax Related (Insource Proof Verification & Form 16) Target 100%",

            'measure'=>"Monitor the entire process & ascertain the NVA\'s. Removing the NVA\'s will help us to strengthen the process with an improved TAT. Improve the hygiene of the process through proactive mails, regular concalls, etc. Jump to action when Client is not adhereing to timelines / proper info provided. Conduct regular calls with Clients & understand their pain areas. Take remedial action & improve upon. Records the minutes & circulate with action plan. Ensure friction free delivery by completing the task within TAT agreed with the Clients. Cultivate \"First time Right\" culture amongst Team members Monitor & ensure Queries of consultants / clients / employees are handled within TAT with appropriate & relevant response. Automate the entire reimbursement process which will inturn improve the Productivity, Quality TAT",

            'frequency'=>"Monthly",

            'target'=>"TAT : 100% Quality : 100% Query Handling TAT - 100%",

            'stretch_target'=>"Input Adherence : 95% TAT : 100% Quality : 100%",

            'source'=>"FO /BO",

            'kpi_weightage'=>"25%",

            'author_id'=>"1",

            'author_name'=>"Admin"

        ]);          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vmt_performance_apraisal_questions', function (Blueprint $table) {
            //
        });
    }
};
