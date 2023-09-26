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
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class BasicAttendanceExport implements FromArray, WithHeadings, ShouldAutoSize, WithCustomStartCell, WithStrictNullComparison, WithTitle, WithStyles, WithDrawings
{

    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    private $heading_dates;
    private $reportresponse;
    private $total_column;
    private $client_name;
    private $period;
    private $category;
    private $last_header_column;
    private $last_row;
    private $public_client_logo_path;

    public function __construct($data, $public_client_logo_path, $active_status, $period,$client_name)
    {
        $this->heading_dates = $data[0];
        $this->total_column = num2alpha(count($data[0]) - 1);
        $this->reportresponse = $data[1];
        $this->client_name = $client_name;
        $this->period = $period;
        $this->category = $active_status;
        $this->last_header_column = num2alpha(count($this->heading_dates) - 1);
        $this->last_row = count($data[1]) + 7;
        $this->public_client_logo_path = $public_client_logo_path;
    }

    public function title(): string
    {
        return 'Basic Attendance Report';
    }

    public function headings(): array
    {
        return [
            $this->heading_dates
        ];
    }

    public function startCell(): string
    {
        return 'A5';
    }
    //  public function registerEvents(): array {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             /** @var Sheet $sheet */
    //             $sheet = $event->sheet;
    //             // $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);
    //             // $sheet->getParent()->getActiveSheet()->getProtection()->setPassword('Abs@123');
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
    //             $cellRange = 'A5:'.$this->total_column.'5'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);



    //         },
    //     ];
    // }


    public function array(): array
    {
        $single_employee = array();


        for ($i = 0; $i < count($this->reportresponse); $i++) {
            array_push($single_employee, $this->reportresponse[$i]);
        }

        return  $single_employee;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getParent()->getActiveSheet()->getPageSetup()->setpaperSize(1);
        $sheet->getParent()->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getParent()->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3);

        ///$sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);



        //For Remove Grid Lines
        $sheet->setShowGridlines(false);

        //For First Row
        $sheet->mergeCells('C1:E1')->setCellValue('C1', "Legal Entity : " . $this->client_name);
        $sheet->getStyle('C1:E1')->getFont()->setBold(true);

        //For Second Row
        $sheet->mergeCells('C2:E2')->setCellValue('C2', "Report Type : " . ' Basic Attendance Report');
        $sheet->getStyle('C2:E2')->getFont()->setBold(true);

        //For Third Row
        $sheet->mergeCells('C3:E3')->setCellValue('C3', "Period : " . $this->period);
        $sheet->getStyle('C3:E3')->getFont()->setBold(true);
        //for fourth row
        $sheet->mergeCells('C4:E4')->setCellValue('C4', "Category : " . $this->category);
        $sheet->getStyle('C4:E4')->getFont()->setBold(true);

        $sheet->getStyle('A5:' . $this->last_header_column . '5')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('002164');
        $sheet->getStyle('A5:' . $this->last_header_column . '5')->getFont()->setBold(true)
            ->getColor()->setRGB('ffffff');
        //for allignment
        // $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $range = 'A1:' . $this->last_header_column . $this->last_row;
        $style = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ];
        $sheet->getStyle($range)->applyFromArray($style);

        //last row 
        // $sheet->mergeCells('A'.$this->last_row.':G'.$this->last_row)->setCellValue('A'.$this->last_row, "Period : ".$this->date);
        // $sheet->getStyle('A'.$this->last_row.':G'.$this->last_row)->getFont()->setBold(true);
        $sheet->mergeCells('A' . $this->last_row . ':G' . $this->last_row)->setCellValue('A' . $this->last_row, " This report is generated by ABShrms Payroll Software : " . Carbon::now()->format('d-M-Y'));
        $sheet->getStyle('A' . $this->last_row . ':G' . $this->last_row)->getFont()->setBold(true);
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName($this->client_name);
        $drawing->setDescription($this->client_name);
        $drawing->setPath($this->public_client_logo_path);
        $drawing->setHeight(1350);
        $drawing->setWidth(224);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
}
