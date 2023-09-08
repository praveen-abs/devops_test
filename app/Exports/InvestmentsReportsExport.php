<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;



class InvestmentsReportsExport implements ShouldAutoSize, WithHeadings, WithCustomStartCell, WithStyles
{

    private $heading_dates;
    private $reportresponse;

    public function __construct($data)
    {
          $this->heading_dates=$data[0];
          $this->total_column = num2alpha(count($data[0])-1);
          $this->reportresponse=$data[1];
    }
    public function headings():array
    {
        return[
            $this->heading_dates
        ];
     }
    public function startCell(): string
    {
        return 'A2';
    }
    public function styles(Worksheet $sheet)
    {
        //For First Row
        // $sheet->mergeCells('A1:AF1')->setCellValue('A1', $this->title);
        $sheet->getStyle('A1:DH1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setRGB('002060');
        $sheet->getStyle('A1:DH1')->getFont()->setBold(true)->getColor()->setRGB('ffffff');
        $sheet->getStyle('A1:DH1')->getAlignment()->setHorizontal('center');
    }
    // public function headings():array
    // {
    //     return[
    //         'Employee Code',
    //         'Employee Name',
    //         'Gender',
    //         'PAN Number',
    //         'Date Of Birth',
    //         'Date Of Joining',
    //         'Tax Regime',
    //         'Basic',
    //         'Basic Arrears',
    //         'Dearness Allowance',
    //         'Dearness Allowance Arrears',
    //         'Variable Dearness Allowance',
    //         'Vairable Dearness Allowance Arrears',
    //         'HRA',
    //         'HRA Arrears',
    //         'Child Education Allowance',
    //         'Child Education Allowance Arrears',
    //         'Statutory Bonus',
    //         'Statutory Bonus Arrears',
    //         'Medical Allowance',
    //         'Medical Allowance Arrears',
    //         'Communicaton Allowance',
    //         'Communication Allowance Arrears',
    //         'Leave Travel Allowance',
    //         'Leave Travel Allowance Arrears',
    //         'Food Allowance',
    //         'Food Allowance Arrears',
    //         'Special Allowance',
    //         'Special Allowance Arrears',
    //         'Other Allowance',
    //         'Other Allowance Arrears',
    //         'Washing Allowance',
    //         'Washing Allowance Arrears',
    //         'Uniform Allowance',
    //         'Uniform Allowance Arrears',
    //         'Vehicle Reimbursement',
    //         'Vehicle Reimbursement Arrears',
    //         'Driver Salary Reimbursment',
    //         'Driver Salary Reimbursment Arrears',
    //         'Arrears',
    //         'Overtime',
    //         'Overtime Arrears',
    //         'Incentive',
    //         'Other Earnings',
    //         'Referral Bonus',
    //         'Annual Statutory Bonus',
    //         'Ex-Gratia',
    //         'Attendance Bonus',
    //         'Daily Allowance',
    //         'Leave Encashments',
    //         'Gift',
    //         'Annual Gross Salary',
    //         'HRA - Exemptions',
    //         'CEA - Exemptions',
    //         'LTA Exemptions',
    //         'Previous Employer Income',
    //         'Previous Employer PT',
    //         'Previous Standard Deduction u/s 16(ia)',
    //         'Gross Total Income',
    //         '(a) Salary as per provisions contained in sec.17(1)',
    //         '(b) Value of perquisites u/s 17(2)',
    //         '(c) Profits in lieu of salary under section 17(3)',
    //         '(d) Total',
    //         '2. Less: Allowance to the extent exempt u/s 10',
    //         '3.  Balance (1-2)',
    //         '(a) Standard Deduction u/s 16(ia)',
    //         '(b) Entertainment allowance u/s 16(ii)',
    //         '(c) Tax on employment u/s 16(iii)',
    //         '5. Aggregate of 4(a), (b) and (c)',
    //         '6. Income chargeable under head salaries(3-5)',
    //         '(a) Deductions u/s 24 – Interest',
    //         '(b) Other Source Of Income',
    //         '(c) 80EE Additional interest on House property',
    //         '8. Gross total income (6+7)',
    //         'i) Provident Fund',
    //         '(ii) Voluntary Provident Fund',
    //         '(iii) National Savings Certificate',
    //         '(iv) Children Tuition Fees',
    //         '(v) Mutual Fund / ELSS / ULIP / SIP',
    //         '(vi) Housing Loan Principal repayment',
    //         '(vii) Life Insurance Premium',
    //         '(viii) Sukanya Samriddhi Scheme',
    //         '(ix) Others / Fixed Deposit (5 years) & Term Deposit',
    //         '(x) NSC Accrued Interest / Approved Superannuation',
    //         '(xi) Public Provident Fund',
    //         '(xii) Life Insurance Pension Scheme (section 80CCC)',
    //         '(xiii) Employee Contribution NPS (section 80CCD) (1)',
    //         '(xiv) Employee Contribution NPS (section 80CCD) (2)',
    //         'Section 80CCE Total',
    //         '(a) 80D Mediclaim-Self',
    //         '(b) 80D Mediclaim -Parents',
    //         '(c) 80DD Handicapped Dependents',
    //         '(d) 80DDB Medical Expenses - Chronic Diseases',
    //         '(e) 80E Interest on Loan taken for Higher Education',
    //         '(f) 80U Permanent Physical disability',
    //         '(g) 80G Donation',
    //         '(h) 80GG Rent paid (HRA not received)',
    //         '(i) 80TTA Deduction of interest on savings account',
    //         '(j) 80EEA interest on certain house property',
    //         '(k) 80EEB Purchase of electric vehicle',
    //         '10. Aggregate of deductible amount under Chapter VI-A',
    //         '11.Total Income (8-10)',
    //         '12.Tax on total income',
    //         '13. Rebate u/s 87A (Taxable Income below Rs.5,00,000',
    //         '14.Total Income Tax',
    //         '15.Surcharge',
    //         '16.Education Cess @4% (On Tax computed at (14 & 15)',
    //         '17.Tax Payable (14+15+16)',
    //         '18.Less: Relief under section 89',
    //         '19.Tax Payable (17-18)',
    //         '20.Tax Deducted Till Date',
    //         '21.Previous Employer TDS',
    //         '22.Tax Due (19-20-21)',
    //         '23.Tax Deduction Per Month'
    //     ];
    //  }

    // public function registerEvents(): array {
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
    //             $cellRange = 'A2:'.$this->total_column.'2'; // All headers
    //             $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);


    //         },
    //     ];
    // }

    public function array(): array
    {
           $single_employee= array();


        for($i=0;$i<count($this->reportresponse);$i++){
            array_push($single_employee,$this->reportresponse[$i]);
        }

        return  $single_employee;

    }

    }

