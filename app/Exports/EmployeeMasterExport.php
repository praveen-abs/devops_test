<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EmployeeMasterExport implements FromArray, ShouldAutoSize, WithHeadings, WithStyles, WithDrawings, WithCustomStartCell
{
    protected $data;
    protected $headers;
    protected $last_header_column;
    protected $public_client_logo_path;
    protected $client_name;
    protected $date;
    protected $last_row;



    public function __construct($data, $headers, $client_name, $public_client_logo_path,$date)
    {

        $this->data = $data;
        $this->date = $date;
        $this->headers = $headers;
        $this->client_name = $client_name;
        $this->public_client_logo_path = $public_client_logo_path;
        $this->last_header_column = num2alpha(count($headers) - 1);
        $this->last_row = count($this->data)+1;
    }
    public function startCell(): string
    {
        return 'A5';
    }
    public function headings(): array
    {
        return [$this->headers];
    }
    public function array(): array
    {
        return [$this->data];
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
        $sheet->mergeCells('C1:D1')->setCellValue('C1', "Legal Entity : " .$this->client_name);
        $sheet->getStyle('C1:D1')->getFont()->setBold(true);

        //For Second Row
        $sheet->mergeCells('C2:D2')->setCellValue('C2', "Report Type : " .' Employee CTC Report');
        $sheet->getStyle('C2:D2')->getFont()->setBold(true);

        //For Third Row
        $sheet->mergeCells('C3:D3')->setCellValue('C3', "Period : ".$this->date);
        $sheet->getStyle('C3:D3')->getFont()->setBold(true);
        //for fourth row
        $sheet->mergeCells('C4:D4')->setCellValue('C4', "Category : ".'Active,'.'Resigned,'. 'Yet to activate,'. 'Draft');
        $sheet->getStyle('C4:D4')->getFont()->setBold(true);

        $sheet->getStyle('A5:' . $this->last_header_column . '5')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('002164');
        $sheet->getStyle('A5:' . $this->last_header_column . '5')->getFont()->setBold(true)
            ->getColor()->setRGB('ffffff');

            //last row 
            $sheet->mergeCells('A'.$this->last_row.':G'.$this->last_row)->setCellValue('A'.$this->last_row, "Period : ".$this->date);
            $sheet->getStyle('A'.$this->last_row.':G'.$this->last_row)->getFont()->setBold(true);
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