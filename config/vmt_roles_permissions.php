<?php

use Illuminate\Support\Str;

return [
    'roles' => [
        "superadmin",
        "admin",
        "hr",
        "manager",
        "employee",
    ],
    'permissions' => [

        'MANAGE_PAYSLIPS_can_view' => 'MANAGE_PAYSLIPS_can_view',
        'MANAGE_PAYSLIPS_release_payslip' => 'MANAGE_PAYSLIPS_release_payslip',

        'APPROVALS_can_view' => 'APPROVALS_can_view',
    ]
];
