<?php

namespace App\Services;

use App\Models\User;

use App\Models\VmtInvestmentForm;

use App\Mail\VmtAttendanceMail_Regularization;
use App\Mail\RequestLeaveMail;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use \Datetime;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class VmtInvestmentsService
{

    public function getInvestmentsFormDetails($form_name)
    {
        //Todo : validate form name using Validator
        //Get investment form

        $inv_form_details = VmtInvestmentForm::join('vmt_investment_form_secpat', 'vmt_investment_form_secpat.form_id', '=', 'vmt_investment_forms.id')
            ->join('vmt_investment_section_particulars', 'vmt_investment_section_particulars.id', '=', 'vmt_investment_form_secpat.sec_pat_id') //Get sections_particulars id
            ->join('vmt_investment_sections', 'vmt_investment_sections.id', '=', 'vmt_investment_section_particulars.section_id') // Get Sections
            ->join('vmt_investment_particulars', 'vmt_investment_particulars.id', '=', 'vmt_investment_section_particulars.particular_id') // Get Particular id

            ->where('vmt_investment_forms.form_name', $form_name)

            ->get([
                'vmt_investment_sections.section_name as section_name',
                'vmt_investment_particulars.particular_name as particular_name',
                'vmt_investment_particulars.references as references',
                'vmt_investment_particulars.amount_max_limit as amount_max_limit',
            ]);

          //  dd( $inv_form_details);

        return $inv_form_details;
    }

}
