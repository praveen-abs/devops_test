<?php

namespace App\Exports;

use App\Models\VmtPMS_KPIFormReviewsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VmtPmsReviewsReport implements FromCollection,WithHeadings,WithStyles,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Employee Name',
            'Employee Code',
            'Calendar Year',
            'Assignment Period',
        ];
    }

    public function columnWidths(): array{
        return[
            'A' => 20.86,
            'B' => 14.29,
            'C' => 20.86,
            'D' => 25.86,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }

    public function collection()
    {
        $query_pms_data=VmtPMS_KPIFormReviewsModel::
                        leftJoin('users','users.id', '=','vmt_pms_kpiform_reviews.assignee_id')
                        ->leftJoin('vmt_employee_office_details','vmt_employee_office_details.user_id', '=', 'vmt_pms_kpiform_reviews.assignee_id')
                        ->leftJoin('vmt_pms_kpiform_assigned','vmt_pms_kpiform_assigned.assignee_id', '=', 'vmt_pms_kpiform_reviews.assignee_id')
                        ->where('vmt_pms_kpiform_reviews.is_assignee_submitted','<>',1)
                        ->orWhereNull('vmt_pms_kpiform_reviews.is_assignee_submitted')
                        ->select('users.name','users.user_code','vmt_pms_kpiform_assigned.calendar_type','vmt_pms_kpiform_assigned.assignment_period')
                        ->get();

        return $query_pms_data;



    }
}
