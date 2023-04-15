<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;



class DetailedAttendanceExport implements FromArray,WithHeadings,ShouldAutoSize,WithEvents,WithCustomStartCell,WithStrictNullComparison
{
     /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $heading_dates;
    private $reportresponse;
    private $dates_1;
    public function __construct($data)
    {
          $this->dates_1=$data[0];
          $this->heading_dates=$data[1];
          $this->reportresponse=$data[2];

    }

    public function headings():array
    {
        return[
            $this->dates_1,
            $this->heading_dates
        ];
     }

     public function startCell(): string
     {
         return 'A3';
     }
     public function registerEvents(): array {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;
                $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);
                $sheet->getParent()->getActiveSheet()->getProtection()->setPassword('Abs@123');
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
                $cellRange = 'A2:AT2'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);


            },
        ];
    }


    public function array(): array
    {
           $single_employee= array();

       // dd(count($this->reportresponse));
        for($i=0;$i<count($this->reportresponse);$i++){
            array_push($single_employee,$this->reportresponse[$i]);
        }

        return  $single_employee;

    }


    // public function collection()
    // {
    //    //dd($this->attendanceResponseArray);

    //    return new Collection([
    //     [1, 2, 3]
    //     ]);
    // }
}
