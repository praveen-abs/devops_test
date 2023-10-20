<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Carbon\Carbon;

class HalfDayReportExport implements FromArray,WithStrictNullComparison,WithHeadings,ShouldAutoSize,WithDrawings,WithCustomStartCell,WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $report;
    protected $last_row;
    protected $public_client_logo_path;
    protected $last_header_column;
    private $headers;
    protected $client_name;
    protected $date;


    public function __construct($data,$client_name,$public_client_logo_path,$date)
    {
      // dd($data);
        $this->report = $data['rows'];
        $this->last_row=count($this->report)+7;
        $this->client_name = $client_name;
        $this->date = $date;
        $this->public_client_logo_path = $public_client_logo_path;
        // dd( $this->public_client_logo_path );
        $this->last_header_column = num2alpha(count($data['headers']) - 1);
        $this->headers = $data['headers'];
    }
    public function headings():array
    {
        return $this->headers;
     }
     public function startCell(): string
     {
         return 'A5';
     }
    public function array(): array
    {
        return $this->report;
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getParent()->getActiveSheet()->getPageSetup()->setpaperSize(1);
        $sheet->getParent()->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getParent()->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3);

        ///$sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);


        //For Remove Grid Lines
        $sheet->setShowGridlines(false);

        $sheet->mergeCells('C1:E1')->setCellValue('C1', "Legal Entity : " .$this->client_name);
        $sheet->getStyle('C1:E1')->getFont()->setBold(true);

        //For Second Row
        $sheet->mergeCells('C2:E2')->setCellValue('C2', "Report Type : " .' HalfDay Report');
        $sheet->getStyle('C2:E2')->getFont()->setBold(true);

        //For Third Row
        $sheet->mergeCells('C3:E3')->setCellValue('C3', "Period : ".$this->date);
        $sheet->getStyle('C3:E3')->getFont()->setBold(true);
        //for fourth row
        // $sheet->mergeCells('C4:E4')->setCellValue('C4', "Category : ". $this->category);
        // $sheet->getStyle('C4:E4')->getFont()->setBold(true);

        $sheet->getStyle('A5:' . $this->last_header_column . '5')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('002164');
        $sheet->getStyle('A5:' . $this->last_header_column . '5')->getFont()->setBold(true)
            ->getColor()->setRGB('ffffff');
        //for allignment
        // $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $range = 'A5:'. $this->last_header_column.$this->last_row-1;
        $sheet->getStyle('C1:E1')->getFont()->setBold(true);
        $style = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ];

        $sheet->mergeCells('A'.$this->last_row.':G'.$this->last_row)->setCellValue('A'.$this->last_row, " This report is generated by ABShrms Payroll Software : ".Carbon::now()->format('d-M-Y'));
        $sheet->getStyle('A'.$this->last_row.':G'.$this->last_row)->getFont()->setBold(true);
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setPath($this->public_client_logo_path);
        $drawing->setHeight(1200);
        $drawing->setWidth(224);
        $drawing->setCoordinates('A1');
        return $drawing;
    }
}
