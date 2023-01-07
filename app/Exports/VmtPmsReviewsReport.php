<?php

namespace App\Exports;

use App\Models\VmtPMS_KPIFormReviewsModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;





class VmtPmsReviewsReport implements FromCollection,WithHeadings,WithStyles,WithColumnWidths,WithCustomStartCell,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $calender_type;
    protected $year;
    protected $assignment_period;
    protected $is_assignee_submitted;
    //protected $is_reviewer_accepted;
    protected $manager_id;
    protected $manager_name;
    protected $getHttpHost;

    function __construct($calendar_type, $year, $assignment_period, $is_assignee_submitted,$getHttpHost)
    {
        $this->calendar_type = $calendar_type;
        $this->year=$year;
        $this->assignment_period = $assignment_period;
        $this->getHttpHost = $getHttpHost;




        if($is_assignee_submitted==1 ){
            $this->is_assignee_submitted=$is_assignee_submitted;
        }else{
            $this->is_assignee_submitted=null;
        }
    }



             //For column widths
    public function columnWidths(): array{
        return[
            'A' => 14.29 ,
            'B' => 27.57,
            'C' => 13.00,
            'D' => 24.29,
            'E' => 9.57,
            'F' => 22.71,
            'G' => 27,
            'H' => 21.43,
            'I' => 23.57
        ];
    }

       //For first Row Col span
    public function registerEvents(): array {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;

                $sheet->mergeCells('A1:I1');
                $sheet->setCellValue('A1', "OKR / PMS - Review Report -".$this->getHttpHost);


                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => array('argb' => '00000000'),
                        ],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => array('argb' => 'ffff31')
                        ]

                ];
                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);


            },
        ];
    }

                   // For Headings
    public function headings():array
    {
        return[
            'Employee Code',
            'Employee Name',
            'Calendar Type',
            'Year',
            'Frequency',
            'Assignment Period',
            'Employees Submission Status',
            'Manager Review Status',
            'Manager Name',

            // 'HR Score Published Status'
                 ];
     }



      //For styles
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            2    => ['font' => ['bold' => true]],

        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function collection()
    {
        $query_pms_data=VmtPMS_KPIFormReviewsModel::
                        leftJoin('users','users.id', '=','vmt_pms_kpiform_reviews.assignee_id')
                        ->leftJoin('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.id', '=', 'vmt_pms_kpiform_reviews.vmt_pms_kpiform_assigned_id')
                        ->where([
                            //['vmt_pms_kpiform_assigned.calendar_type','=',$this->calendar_type],
                            ['vmt_pms_kpiform_assigned.year','=',$this->year],
                            ['vmt_pms_kpiform_assigned.assignment_period','=',$this->assignment_period],
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
                                   //'vmt_pms_kpiform_reviews.is_reviewer_accepted', //For Manager name
                                   'vmt_pms_kpiform_reviews.is_reviewer_submitted',


                                 )
                        ->get();




        foreach($query_pms_data as $singleData){


            if($singleData->is_reviewer_accepted!=""){

            }
            if($singleData->calendar_type=="financial_year"){
                $singleData->calendar_type="Financial Year";
                if($singleData->frequency=='quarterly'){
                    $singleData->frequency='Quarterly';
                    $start_year=substr($singleData->year,8,4);
                    $end_year=substr($singleData->year,24,4);
                    if($singleData->assignment_period == "q1"){
                        $singleData->assignment_period = "Q1 (Apr-".$start_year." - Jun-".$start_year .")";
                    }
                    else if($singleData->assignment_period == "q2")
                    {
                        $singleData->assignment_period = "Q2 (July-".$start_year." - Sept-".$start_year .")";
                    }
                    else if($singleData->assignment_period == "q3")
                    {
                        $singleData->assignment_period = "Q3 (Oct-".$start_year." - Dec-".$start_year .")";
                    }else if($singleData->assignment_period == "q4")
                    {
                        $singleData->assignment_period = "Q4 (Jan-".$end_year." - March-".$end_year .")";
                    }
                }else if($singleData->frequency=='monthly'){
                    $singleData->frequency='Monthly';
                    $month=$singleData->assignment_period;
                    switch($month){
                        case "apr":
                            $singleData->assignment_period = "April - ".$start_year;
                            break;
                        case "may":
                            $singleData->assignment_period = "May - ".$start_year;
                            break;
                        case "june":
                             $singleData->assignment_period = "June - ".$start_year;
                            break;
                        case "july":
                            $singleData->assignment_period = "July - ".$start_year;
                            break;
                        case "aug":
                            $singleData->assignment_period = "August - ".$start_year;
                            break;
                        case "sept":
                            $singleData->assignment_period = "September - ".$start_year;
                            break;
                        case "oct":
                            $singleData->assignment_period = "October - ".$start_year;
                            break;
                        case "nov":
                             $singleData->assignment_period = "November - ".$start_year;
                            break;
                        case "dec":
                            $singleData->assignment_period = "December - ".$start_year;
                            break;
                        case "jan":
                            $singleData->assignment_period = "January - ".$end_year;
                            break;
                        case "feb":
                            $singleData->assignment_period = "February - ".$end_year;
                            break;
                        case "mar":
                            $singleData->assignment_period = "March - ".$end_year;
                            break;




                    }
                }else if($singleData->frequency=='yearly'){

                }

            }else if($singleData->calendar_type=="calendar_year"){
                $singleData->calendar_type="Calendar Year";
            }





            if($singleData->is_assignee_submitted == "1"){
                $singleData->is_assignee_submitted = "Submitted";
            }
            else
            {
                $singleData->is_assignee_submitted = "Not Yet Submitted";
            }

               //For Manager Name and review Status
            $reviewerStatus=(json_decode($singleData->is_reviewer_submitted, true));
            $array_key = array_keys($reviewerStatus);

              //For Manager Review
            if($reviewerStatus[$array_key[0]]==1){
                $singleData->is_reviewer_submitted = "Reviewed";
            }else{
                $singleData->is_reviewer_submitted = "Not Yet Reviewed";
            }

            //For Manager Name

                  $manager_id=$array_key[0];
                //   $singleData->is_reviewer_accepted=$array_key[0];
                //$manager_name=User::where('user_code','=',$manager_id)->get();
                $singleData->manager_name= User::find($manager_id)->name;


        }

        $space=array(" "," ");
        $date=array(date("Y/m/d"),"This report is generated by ABShrms and OKR Software");

        $query_pms_data->push($space);
        $query_pms_data->push($date);


        //dd($query_pms_data->toArray());



        return $query_pms_data;

        //dd($manager_name);
        //return $manager_name;


        //dd(substr($singleData->year,24,4));
        // dd($this->calendar_type,
        //    $this->year,
        //    $this->assignment_period,
        //    $this->is_assignee_submitted );




    }
}
