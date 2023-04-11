<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;

class PMSFormsExport implements FromArray,WithHeadings,WithColumnWidths,WithStyles
{
    protected $formDetails;
    protected $headings;
    public function __construct($pms_assignedFormDetails)
    {
        $this->headings =$pms_assignedFormDetails[0];
        $this->formDetails = $pms_assignedFormDetails[1];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function headings():array{
        //dd( $this->headings);
        return  $this->headings;
    }

    public function columnWidths(): array{
        return[
            'A' => 60 ,
            'B' => 9.57,
            'C' => 5.86,
            'D' => 17.71,
        ];
    }




    // public function registerEvents(): array {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             /** @var Sheet $sheet */
    //             $sheet = $event->sheet;

    //             $sheet->mergeCells('A1:I1');
    //             $sheet->setCellValue('A1', "OKR / PMS - Review Report -");


    //             $styleArray = [
    //                 'alignment' => [
    //                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 ],
    //                 'borders' => [
    //                     'outline' => [
    //                         'borderStyle' => Border::BORDER_THICK,
    //                         'color' => array('argb' => '00000000'),
    //                     ],
    //                 ],
    //                 'fill' => [
    //                     'fillType' => Fill::FILL_SOLID,
    //                     'startColor' => array('argb' => 'ffff31')
    //                     ]

    //             ];
    //             $cellRange = 'A1:I1'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);


    //         },
    //     ];
    // }




       //For styles
    public function styles(Worksheet $sheet){
        return [
               // Style the first row as bold text.
               1    => ['font' => ['bold' => true]],

        ];
    }


    public function array(): array
    {
          return $this->formDetails;
    }

}
