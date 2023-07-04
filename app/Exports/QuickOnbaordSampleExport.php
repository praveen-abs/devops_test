<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class QuickOnbaordSampleExport implements FromArray, ShouldAutoSize, WithHeadings, WithCustomStartCell, WithStyles, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $title;
    protected $client_list;
    function __construct($onbaord_details)
    {
        $this->title = $onbaord_details['title'];
        $this->client_list = $onbaord_details['client_list'];
    }

    public function startCell(): string
    {
        return 'A2';
    }
    public function styles(Worksheet $sheet)
    {
        //For First Row
        $sheet->mergeCells('A1:AV1')->setCellValue('A1', $this->title);
        $sheet->getStyle('A1:AV1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('002060');
        $sheet->getStyle('A1:AV1')->getFont()->setBold(true)->getColor()->setRGB('ffffff');
        $sheet->getStyle('A1:AV1')->getAlignment()->setHorizontal('center');
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


    public function registerEvents(): array
    {
        return [
            // handle by a closure.
            AfterSheet::class => function (AfterSheet $event) {

                //get layout counts (add 1 to rows for heading row)
                // $row_count = $this->results->count() + 1;
                // $column_count = count($this->results[0]->toArray());
                $row_count = 10;
                $column_count = 0;

                // set dropdown column
                $gender_column = 'E';
                $legal_entity_column = 'H';

                // set dropdown options
                $gender_options = [
                    'Male',
                    'Female',
                ];
                $legal_entity_option= [
                   'one',
                   'two'
                ];

                // set dropdown list for first data row
                $validation_gender = $event->sheet->getCell("{$gender_column}3")->getDataValidation();
                $validation_gender->setType(DataValidation::TYPE_LIST);
                $validation_gender->setErrorStyle(DataValidation::STYLE_INFORMATION);
                $validation_gender->setAllowBlank(false);
                $validation_gender->setShowInputMessage(true);
                $validation_gender->setShowErrorMessage(true);
                $validation_gender->setShowDropDown(true);
                $validation_gender->setErrorTitle('Input error');
                $validation_gender->setError('Value is not in list.');
                $validation_gender->setPromptTitle('Pick from list');
                $validation_gender->setPrompt('Please pick a value from the drop-down list.');
                $validation_gender->setFormula1(sprintf('"%s"', implode(',',  $gender_options)));

                $validation_entity = $event->sheet->getCell("{$legal_entity_column}3")->getDataValidation();
                $validation_entity->setType(DataValidation::TYPE_LIST);
                $validation_entity->setErrorStyle(DataValidation::STYLE_INFORMATION);
                $validation_entity->setAllowBlank(false);
                $validation_entity->setShowInputMessage(true);
                $validation_entity->setShowErrorMessage(true);
                $validation_entity->setShowDropDown(true);
                $validation_entity->setErrorTitle('Input error');
                $validation_entity->setError('Value is not in list.');
                $validation_entity->setPromptTitle('Pick from list');
                $validation_entity->setPrompt('Please pick a value from the drop-down list.');
                $validation_entity->setFormula1(sprintf('"%s"', implode(',',   $legal_entity_option)));
                // $validation_entity->setFormula1($this->client_list);

                //clone validation to remaining rows
                for ($i = 3; $i <= $row_count; $i++) {
                    $event->sheet->getCell("{$gender_column}{$i}")->setDataValidation(clone  $validation_gender);
                    $event->sheet->getCell("{$legal_entity_column}{$i}")->setDataValidation(clone    $validation_entity);
                }

                // set columns to autosize
                for ($i = 1; $i <= $column_count; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },

        ];
    }
}
