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

class DetailedAttendanceExport implements FromArray, WithHeadings, ShouldAutoSize, WithCustomStartCell, WithStrictNullComparison, WithStyles
{

    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    private $heading_dates;
    private $reportresponse;
    private $total_column;
    private $header_2;
    private $heading_dates_2;

    public function __construct($data)
    {
        $this->heading_dates = $data[0];
        $this->total_column = num2alpha(count($data[1]) - 1);
        $this->header_2 = $data[1];
        $this->reportresponse = $data[2];
        $this->heading_dates_2 = $data[3];
    }

    public function headings(): array
    {
        return [
            $this->heading_dates,
            $this->header_2
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }
    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             /** @var Sheet $sheet */
    //             $sheet = $event->sheet;
    //             // $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);
    //             // $sheet->getParent()->getActiveSheet()->getProtection()->setPassword('Abs@123');
    //             $styleArray = [
    //                 'alignment' => [
    //                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 ],

    //                 'fill' => [
    //                     'fillType' => Fill::FILL_SOLID,
    //                     'startColor' => array('argb' => 'ffff31')

    //                 ]

    //             ];
    //             $cellRange = 'A2:' . $this->total_column . '2'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
    //         },
    //     ];
    // }

    public function styles(Worksheet $sheet)
    {

        // For First Four Column Headers
        for ($i = 0; $i < 4; $i++) {
            $sheet->mergeCells(num2alpha($i) . '1:' . num2alpha($i) . '2');
            $sheet->getStyle(num2alpha($i) . '1:' . num2alpha($i) . '2')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('678391');
            $sheet->getStyle(num2alpha($i) . '1')->getFont()->setBold(true)->getColor()->setRGB('ffffff');

            // $sheet->getStyle(num2alpha($i).'2:'.num2alpha($i).'3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        }
        //$sheet->getStyle('A1:EI54')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

        // Date Headings
        $i = 4;
        $j = 1;
        foreach ($this->heading_dates_2 as $single_date) {
            $sheet->mergeCells(num2alpha($i) . '1:' . num2alpha($i + 3) . '1')->setCellValue(num2alpha($i) . '1', $single_date);
            $sheet->getStyle(num2alpha($i) . '1:' . num2alpha($i + 3) . '1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('678391');
            $sheet->getStyle(num2alpha($i) . '1:' . num2alpha($i + 3) . '1')
                ->getFont()->setBold(true)->getColor()->setRGB('ffffff');
            if ($j % 2 == 0) {
                $sheet->getStyle(num2alpha($i) . '2:' . num2alpha($i + 3) . '2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('96A3AB');
            } else {
                $sheet->getStyle(num2alpha($i) . '2:' . num2alpha($i + 3) . '2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('76AABF');
            }
            $sheet->getStyle(num2alpha($i) . '2:' . num2alpha($i + 3) . '2')
                ->getFont()->setBold(true)->getColor()->setRGB('ffffff');
            $i = $i + 4;
            $j = $j + 1;
        }



        $sheet->setShowGridlines(false);
    }


    public function array(): array
    {
        $single_employee = array();


        for ($i = 0; $i < count($this->reportresponse); $i++) {
            array_push($single_employee, $this->reportresponse[$i]);
        }

        return  $single_employee;
    }
}
