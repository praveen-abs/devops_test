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


class BasicAttendanceExport implements FromArray,WithHeadings,ShouldAutoSize,WithEvents
{

    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $heading_dates;
    private $reportresponse;

    public function __construct($data)
    {
          $this->heading_dates=$data[0];
          $this->reportresponse=$data[1];
    }

    public function headings():array
    {
        return[
            $this->heading_dates
        ];
     }

     public function registerEvents(): array {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;

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
                $cellRange = 'A1:AQ1'; // All headers
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
