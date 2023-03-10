<?php

namespace App\Exports;

use App\Models\VmtEmployeeReimbursements;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class ManagerReimbursementsExport implements FromArray,ShouldAutoSize,WithHeadings,WithCustomStartCell,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $reimbursements_details;
    protected $totals;
    function __construct($reimbursements_details,$totals){
        $this->reimbursements_details=$reimbursements_details;
        $this->totals=$totals;
        $this->total_row=count($this->reimbursements_details)+3;

    }


    public function headings():array
    {
        return[
            'Employee ID',
            'Employee Name',
            'Designation',
            'Department',
            'Total Travelled KM',
            'Amount',
            'Manager Name'
                 ];
     }

     public function startCell(): string
    {
        return 'A2';
    }


    public function styles(Worksheet $sheet)
    {


        $sheet->getStyle('A2:G2')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setRGB('002164');
        $sheet->getStyle('A2:G2')->getFont()->setBold(true)
                            ->getColor()->setRGB('ffffff');

        $sheet->getStyle('A'.$this->total_row.':G'.$this->total_row)->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setRGB('002164');
        $sheet->getStyle('A'.$this->total_row.':G'.$this->total_row)->getFont()->setBold(true)
        ->getColor()->setRGB('ffffff');
        // return [
        //     // Style the first row as bold text.

        //    1   => ['font' => ['bold' => true]],

        // ];
    }

    public function array(): array
    {
        return [
            $this->reimbursements_details,
            $this->totals
        ];
    }



    // public function registerEvents(): array {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             /** @var Sheet $sheet */
    //             $sheet = $event->sheet;

    //             $sheet->mergeCells('A1:F1');
    //          //  $sheet2->mergeCells('A2:F2');
    //             $sheet->setCellValue('A1', "Legal Entity:");
    //           //$sheet2->setCellValue('A2:F2',"Month");


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
    //             $cellRange = 'A1:F1'; // All headers
    //             //$cellRange2='A2;F2';
    //             $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
    //            // $event->sheet2->getDelegate()->getStyle($cellRange2)->applyFromArray($styleArray);


    //         },
    //     ];
    // }

}
