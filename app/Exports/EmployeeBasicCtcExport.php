<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class EmployeeBasicCtcExport implements FromArray,ShouldAutoSize
{

    protected $data;
    protected $headers;
    
    public function __construct($data,$headers)
    {
        $this->data = $data;
        $this->headers = $headers;
    }

    public function headings(): array
    {
        return [$this->headers];
    }
    public function array(): array
    {
        return [ $this->data];
    }
 
}
