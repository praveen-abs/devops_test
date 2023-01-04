<?php

namespace App\Exports;

use App\Models\VmtPMS_KPIFormReviewsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class VmtPmsReviewsReport implements FromCollection,WithHeadings,WithStyles,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $calender_type;
    protected $year;
    protected $assignment_period;
    protected $is_assignee_submitted;

    function __construct($calendar_type, $year, $assignment_period, $is_assignee_submitted)
    {
        $this->calendar_type = $calendar_type;
        $this->year=$year;
        $this->assignment_period = $assignment_period;

        if($is_assignee_submitted==1 || $is_assignee_submitted==0 ){
            $this->is_assignee_submitted=$is_assignee_submitted;
        }else{
            $this->is_assignee_submitted=null;
        }
    }



    public function headings():array{
        return[
            'Employee Code',
            'Employee Name',
            'Calendar Type',
            'Year',
            'Frequency',
            'Assignment Period',
            'Employees Submission Status',
            'Manager Review Status'
        ];
    }

    public function columnWidths(): array{
        return[
            'A' => 27.57,
            'B' => 14.29,
            'C' => 20.86,
            'D' => 25.86,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }

    public function collection()
    {
        $query_pms_data=VmtPMS_KPIFormReviewsModel::
                        leftJoin('users','users.id', '=','vmt_pms_kpiform_reviews.assignee_id')
                        ->leftJoin('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.id', '=', 'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id')
                        ->where([
                            ['vmt_pms_kpiform_assigned.calendar_type','=',$this->calendar_type],
                            ['vmt_pms_kpiform_assigned.year','=',$this->year],
                            ['vmt_pms_kpiform_assigned.assignment_period','=',$this->assignment_period],
                            //['vmt_pms_kpiform_assigned.assignment_period','=','dec'],
                            //['vmt_pms_kpiform_reviews.is_assignee_submitted','=',$this->is_assignee_submitted]
                        ])
                        ->select(
                                  'users.user_code',
                                  'users.name',
                                  'vmt_pms_kpiform_assigned.calendar_type',
                                  'vmt_pms_kpiform_assigned.year',
                                  'vmt_pms_kpiform_assigned.frequency',
                                  'vmt_pms_kpiform_assigned.assignment_period',
                                  'vmt_pms_kpiform_reviews.is_assignee_submitted',
                                  'vmt_pms_kpiform_reviews.is_reviewer_accepted'
                                 )
                        ->get();

        // foreach($query_pms_data as $singleData){

        //     if($singleData->calendar_type=="financial_year"){
        //         $singleData->calendar_type=="Financial Year";
        //     }else if($singleData->calendar_type=="calendar_year"){
        //         $singleData->calendar_type=="Calendar Year";
        //     }

        //     if($singleData->frequency=='quarterly'){
        //         $singleData->frequency='Quarterly';
        //         if($singleData->assignment_period == "q1"){
        //             $singleData->assignment_period = "Q1 (Apr-Jun)";
        //         }
        //         else if($singleData->assignment_period == "q2")
        //         {
        //             $singleData->assignment_period = "Q2 (July-Sept)";
        //         }
        //         else if($singleData->assignment_period == "q3")
        //         {
        //             $singleData->assignment_period = "Q3 (Oct-Dec)";
        //         }else if($singleData->assignment_period == "q4")
        //         {
        //             $singleData->assignment_period = "Q4 (Jan-Mar)";
        //         }
        //     }else if($singleData->frequency=='monthly'){
        //         $singleData->frequency='Monthly';
        //     }



        //     if($singleData->is_assignee_submitted == "1"){
        //         $singleData->is_assignee_submitted = "Submitted";
        //     }
        //     else
        //     {
        //         $singleData->is_assignee_submitted = "Not Yet Submitted";
        //     }
        // }



        dd($query_pms_data->toArray());

        //return $query_pms_data;
        //print($query_pms_data);exit;
        // dd($this->calendar_type,
        //    $this->year,
        //    $this->assignment_period,
        //    $this->is_assignee_submitted );




    }
}
