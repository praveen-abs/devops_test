<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuickOnbaordSampleExport implements FromArray, ShouldAutoSize, WithHeadings, WithCustomStartCell, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $title;

    function __construct($onbaord_details)
    {
        $this->title = $onbaord_details['title'];
    }

    public function startCell(): string
    {
        return 'A2';
    }
    public function styles(Worksheet $sheet)
    {
    }

    public function headings(): array
    {
        return [
            'Employee Code',
            'Employee Name',
            'Official Email',
            'Mobile Number',
            'Gender',
            'Date Of Birth (dd-mmm-yyyy)',
            'Date of Joined (dd-mmm-yyyy)',
            'Legal Entity',
            'Department',
            'Business Unit',
            'Designation',
            'Location',
            'Worker Type',
            'Reporting Manager Employee Code',
            'Work Phone',
            'Personal Email',
            'Marital Status',
            'Father Name',
            'Physically Handicapped',
            'Pan Number',
            'Salary Payment Mode',
            'Aadhaar Number',
            'Basic',
            'Dearness Allowance',
            'VDA',
            'House Rent Allowance',
            'Child Education Allowance',
            'Communication Allowance',
            'Food Allowance',
            'Travel Reimbursement (LTA)',
            'Special Allowance',
            'Other Allowance',
            'Vehicle Reimbursement',
            'Driver Salary',
            'Washing Allowance',
            'Unifrom Allowance',
            'Total Fixed Gross',
            'Employer EPF',
            'Employer ESIC',
            'Employer LWF',
            'Employer Insurance',
            'Cost to Company (CTC)',
            'Employee EPF',
            'Employee ESIC',
            'Employee PT',
            'Employee LWF',
            'Employee Insurance',
            'Net Take Home'
        ];
    }


    public function array(): array
    {

        return [];
    }
}
