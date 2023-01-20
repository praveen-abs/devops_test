@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="vendor-wrapper mt-30 card">

        <div class="card-body">
            <h6 class="">Payroll Reports</h6>

            {{-- <div class=" text-end mb-2">
                <button class="btn btn-orange me-2" id="btn_downloadReport">Download Report</button>
            </div> --}}


            <div style="display: flex; justify-content: space-evenly;margin-left: -100px" class=" text-start mb-2">
                <span>
                    <b>Payroll Month</b>
                    <select id="dropdown_payroll_month" class="form-select form-select-sm" style="width:auto;"
                        aria-label=".form-select-sm example">
                        @foreach ($payroll_months as $key => $value)
                            <option value="{{ $value }}">
                                {{ $key }}
                            </option>
                        @endforeach
                    </select>
                </span>
                <span>
                    <b>Location</b>
                    <select id="dropdown_work_location" class="form-select form-select-sm" style="width:auto;"
                        aria-label=".form-select-sm example">
                        <option value="all">---All Location----</option>
                        @foreach ($work_location as $key => $value)
                            <option value="{{ $value }}"> {{ $value }} </option>
                        @endforeach
                    </select>
                </span>
                <span>
                    <b>Designation</b>
                    <select id="dropdown_designation" class="form-select form-select-sm" style="width:auto;"
                        aria-label=".form-select-sm example">
                        <option value="all">---Select All----</option>
                        @foreach ($designation as $key => $value)
                            <option value="{{ $value }}"> {{ $value }} </option>
                        @endforeach
                    </select>
                </span>

            </div>



            <div class="vendor-table-wrapper">
                <div id="employee-table" class="noCustomize_gridjs">

                    <button id="loadData" class="btn btn-orange me-2t">Generate</button>
                    <div class="table-responsive">
                        <table id="payrollReportTable" class="display table table-striped nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Employee Code</th>
                                    <th> Employee Name</th>
                                    <th>Designation</th>
                                    <th>DOJ</th>
                                    <th>DOB</th>
                                    <th>Location</th>
                                    <th>Aadhaar Number</th>
                                    <th>PAN</th>
                                    <th>UAN</th>
                                    <th>EPF Number</th>
                                    <th>ESIC Number</th>
                                    <th>Bank Name'</th>
                                    <th>Bank Account Number</th>
                                    <th>IFSC Code</th>
                                    <th>Mobile</th>
                                    <th>Email ID</th>
                                    <th>Payroll Month</th>
                                    <th>Basic</th>
                                    <th>HRA</th>
                                    <th>Special Allowance</th>
                                    <th>Total Fixed Gross</th>
                                    <th>ESIC Applicablity</th>
                                    <th>Month Days</th>
                                    <th>Worked Days</th>
                                    <th>Arrears Days</th>
                                    <th>LOP</th>
                                    <th>Basic</th>
                                    <th>BASIC Arrears</th>
                                    <th>HRA</th>
                                    <th>HRA Arrears</th>
                                    <th>Special Allowance</th>
                                    <th>SPL ALW Arrears</th>
                                    <th>Overtime</th>
                                    <th>Total Earned Gross</th>
                                    <th>PF Wages</th>
                                    <th>PF Wages Arrear</th>
                                    <th>EPFR</th>
                                    <th>EPFR Arrears</th>
                                    <th>EDLI Charges</th>
                                    <th>EDLI Charges Arrears</th>
                                    <th>PF Admin Charges</th>
                                    <th>PF Admin Charges Arrears</th>
                                    <th>Employer ESIC</th>
                                    <th>Employer LWF</th>
                                    <th>CTC</th>
                                    <th>EPF EE</th>
                                    <th>EPF EE Arrear</th>
                                    <th>Emplyee ESIC</th>
                                    <th>Professional Tax</th>
                                    <th>Salary Advance</th>
                                    <th>Canteen Deduction</th>
                                    <th>Other Deductions</th>
                                    <th>LWF</th>
                                    <th>Total Deductions</th>
                                    <th>Net</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('script')
    {{-- <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" />



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js">
        < script >
            <script src = "https://cdn.datatables.net/1.13.1/js/dataTables.jqueryui.min.js" >
    </script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js">
        < script >
            <
            script src = "https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js" >
    </script>





    <script>
        $(document).ready(function() {
            $("#payrollReportTable").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                // responsive: {
                //     details: {
                //         display: $.fn.dataTable.Responsive.display.modal({
                //             header: function(row) {
                //                 var data = row.data();
                //                 return 'Details for ' + data[0] + ' ' + data[1];
                //             }
                //         }),
                //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                //             tableClass: 'table'
                //         })
                //     }
                //},
            });

            $('#btn_downloadReport').on('click', function(e) {
                var selectedPayRollMonth = $('#dropdown_payroll_month').find(":selected").val();
                console.log("Download payroll reports....");
                let URL = '/reports/generatePayrollReports?payroll_month=' + selectedPayRollMonth +
                    '&_token={{ csrf_token() }}';
                console.log("Generated URL : " + URL);

                window.location = URL;


                // $.ajax({
                //         url: "{{ route('generatePayrollReports') }}",
                //         type: "GET",
                //         dataType: "json",
                //         cache: false,
                //         xhrFields:{
                //             responseType: 'blob'
                //         },
                //         data: {
                //             "payroll_month":selectedPayRollMonth,
                //             "_token": "{{ csrf_token() }}",
                //         },
                //         success: function(data) {
                //             console.log("Downloading excelsheet....");
                //             var link = document.createElement('a');
                //             link.href = window.URL.createObjectURL(response);
                //             link.download = `bulk_orders.xlsx`;
                //             link.click();

                //         },
                //         error: function(data) {


                //         }
                // });

            });


            // $('#dropdown_payroll_month').on('change', function() {
            //     console.log("Selected payroll month : "+$(this).find(":selected").val());
            // });

            // $('#dropdown_payroll_month').find(":selected");

            // if (document.getElementById("employee-table")) {
            //     const grid = new gridjs.Grid({
            //         columns: [{
            //                 id: 'number',
            //                 name: 'id',
            //                 hidden: true

            //             },
            //             {
            //                 id: 'name ',
            //                 name: 'Employee Name',

            //             },
            //             {
            //                 id: 'month',
            //                 name: 'Month',
            //             },

            //         ],
            //         pagination: {
            //             limit: 10
            //         },
            //         sort: true,
            //         search: true,
            //         server: {
            //             url: '{{ route('fetchAllEmployeePayrollDetails', ['payroll_month' => 'sss']) }}',
            //             then: data => data.map(
            //                 employee => [
            //                     employee.id,
            //                     employee.name,
            //                 ]
            //             )
            //         }



            //     }).render(document.getElementById("employee-table"));


            // }
            // if (document.getElementById("employee-table")) {
            //    console.log("-----------"+selectedPayRollMonth+"---------------");

            //     const grid = new gridjs.Grid({
            //         columns: [{
            //                 id: 'user_code',
            //                 name: 'Employee Code',
            //             },
            //             {
            //                 id: 'name',
            //                 name: 'Employee Name',
            //             },
            //             {
            //                 id: 'DESIGNATION',
            //                 name: 'Designation',
            //             },
            //             {
            //                 id: 'doj',
            //                 name: 'DOJ',
            //             },
            //             {
            //                 id: 'dob',
            //                 name: 'DOB',
            //             },
            //             {
            //                 id: 'work_location',
            //                 name: 'Location',
            //             },
            //             {
            //                 id: 'Aadhar_Number',
            //                 name: 'Aadhaar Number',
            //             },
            //             {
            //                 id: 'PAN_Number',
            //                 name: 'PAN',
            //             },
            //             {
            //                 id: 'uan_number',
            //                 name: 'UAN',
            //             },
            //             {
            //                 id: 'epf_number',
            //                 name: 'EPF Number',
            //             },
            //             {
            //                 id: 'esic_number',
            //                 name: 'ESIC Number',
            //             },
            //             {
            //                 id: 'bank_id',
            //                 name: 'Bank Name',
            //             },
            //             {
            //                 id: 'bank_account_number',
            //                 name: 'Bank Account Number',
            //             },
            //             {
            //                 id: 'bank_ifsc_code',
            //                 name: 'IFSC Code',
            //             },
            //             {
            //                 id: 'mobile_number',
            //                 name: 'Mobile',
            //             },
            //             {
            //                 id: 'officical_mail',
            //                 name: 'Email ID',
            //             },
            //             {
            //                 id: 'PAYROLL_MONTH',
            //                 name: 'Payroll Month',
            //             },
            //             {
            //                 id: 'BASIC',
            //                 name: 'Basic',
            //             },
            //             {
            //                 id: 'HRA',
            //                 name: 'HRA',
            //             },
            //             {
            //                 id: 'SPL_ALW',
            //                 name: 'Special Allowance',
            //             },
            //             {
            //                 id: 'TOTAL_FIXED_GROSS',
            //                 name: 'Total Fixed Gross',
            //             },
            //             {
            //                 id: 'esic_applicable',
            //                 name: 'ESIC Applicablity',
            //             },
            //             {
            //                 id: 'MONTH_DAYS',
            //                 name: 'Month Days',
            //             },
            //             {
            //                 id: 'Worked_Days',
            //                 name: 'Worked Days',
            //             },
            //             {
            //                 id: 'Arrears_Days',
            //                 name: 'Arrears Days',
            //             },
            //             {
            //                 id: 'LOP',
            //                 name: 'LOP',
            //             },
            //             {
            //                 id: 'Earned_BASIC',
            //                 name: 'Basic',
            //             },
            //             {
            //                 id: 'BASIC_ARREAR',
            //                 name: 'BASIC Arrears',
            //             },
            //             {
            //                 id: 'Earned_HRA',
            //                 name: 'HRA',
            //             },
            //             {
            //                 id: 'HRA_ARREAR',
            //                 name: 'HRA Arrears',
            //             },
            //             {
            //                 id: 'Earned_SPL_ALW',
            //                 name: 'Special Allowance',
            //             },
            //             {
            //                 id: 'SPL_ALW_ARREAR',
            //                 name: 'SPL ALW Arrears',
            //             },
            //             {
            //                 id: 'Overtime',
            //                 name: 'Overtime',
            //             },
            //             {
            //                 id: 'TOTAL_EARNED_GROSS',
            //                 name: 'Total Earned Gross',
            //             },
            //             {
            //                 id: 'PF_WAGES',
            //                 name: 'PF Wages',
            //             },
            //             {
            //                 id: 'PF_WAGES_ARREAR_EPFR',
            //                 name: 'PF Wages Arrear',
            //             },
            //             {
            //                 id: 'EPFR',
            //                 name: 'EPFR',
            //             },
            //             {
            //                 id: 'EPFR_ARREAR',
            //                 name: 'EPFR Arrears',
            //             },
            //             {
            //                 id: 'EDLI_CHARGES',
            //                 name: 'EDLI Charges',
            //             },
            //             {
            //                 id: 'EDLI_CHARGES_ARREARS',
            //                 name: 'EDLI Charges Arrears',
            //             },
            //             {
            //                 id: 'PF_ADMIN_CHARGES',
            //                 name: 'PF Admin Charges',
            //             },
            //             {
            //                 id: 'PF_ADMIN_CHARGES_ARREARS',
            //                 name: 'PF Admin Charges Arrears',
            //             },
            //             {
            //                 id: 'EMPLOYER_ESI',
            //                 name: 'Employer ESIC',
            //             },
            //             {
            //                 id: 'Employer_LWF',
            //                 name: 'Employer LWF',
            //             },
            //             {
            //                 id: 'CTC',
            //                 name: 'CTC',
            //             },
            //             {
            //                 id: 'EPF_EE',
            //                 name: 'EPF EE',
            //             },
            //             {
            //                 id: 'EPF_EE_ARREAR',
            //                 name: 'EPF EE Arrear',
            //             },
            //             {
            //                 id: 'EMPLOYEE_ESIC',
            //                 name: 'Emplyee ESIC',
            //             },
            //             {
            //                 id: 'PROF_TAX',
            //                 name: 'Professional Tax',
            //             },
            //             {
            //                 id: 'SAL_ADV',
            //                 name: 'Salary Advance',
            //             },
            //             {
            //                 id: 'CANTEEN_DEDN',
            //                 name: 'Canteen Deduction',
            //             },
            //             {
            //                 id: 'OTHER_DEDUC',
            //                 name: 'Other Deductions',
            //             },
            //             {
            //                 id: 'LWF',
            //                 name: 'LWF',
            //             },
            //             {
            //                 id: 'TOTAL_DEDUCTIONS',
            //                 name: 'Total Deductions',
            //             },
            //             {
            //                 id: 'NET_TAKE_HOME',
            //                 name: 'Net Take Home',
            //             },

            //         ],

            //         pagination: {
            //             limit: 10
            //         },
            //         sort: true,
            //         search: true,
            //         server: {
            //             url: '{{ route('payroll-filter-info') }}',
            //             then: data => data.map(Payroll => [
            //                 Payroll.user_code, Payroll.name,
            //                 Payroll.DESIGNATION, Payroll.doj,
            //                 Payroll.dob, Payroll.work_location,
            //                 Payroll.Aadhar_Number, Payroll.PAN_Number,
            //                 Payroll.uan_number, Payroll.epf_number,
            //                 Payroll.esic_number, Payroll.bank_id,
            //                 Payroll.bank_account_number, Payroll.bank_ifsc_code,
            //                 Payroll.mobile_number, Payroll.officical_mail,
            //                 Payroll.PAYROLL_MONTH, Payroll.BASIC,
            //                 Payroll.HRA, Payroll.TOTAL_FIXED_GROSS,
            //                 Payroll.esic_applicable, Payroll.MONTH_DAYS,
            //                 Payroll.Worked_Days, Payroll.Arrears_Days,
            //                 Payroll.LOP, Payroll.Earned_BASIC,
            //                 Payroll.BASIC_ARREAR, Payroll.Earned_HRA,
            //                 Payroll.HRA_ARREAR, Payroll.Earned_SPL_ALW,
            //                 Payroll.SPL_ALW_ARREAR, Payroll.TOTAL_EARNED_GROSS,
            //                 Payroll.PF_WAGES, Payroll.PF_WAGES_ARREAR_EPFR,
            //                 Payroll.EPFR, Payroll.EPFR_ARREAR,
            //                 Payroll.EDLI_CHARGES, Payroll.EDLI_CHARGES_ARREARS,
            //                 Payroll.PF_ADMIN_CHARGES, Payroll.PF_ADMIN_CHARGES_ARREARS,
            //                 Payroll.EMPLOYER_ESI, Payroll.Employer_LWF,
            //                 Payroll.CTC, Payroll.EPF_EE,
            //                 Payroll.EPF_EE_ARREAR, Payroll.EMPLOYEE_ESIC,
            //                 Payroll.PROF_TAX, Payroll.SAL_ADV,
            //                 Payroll.CANTEEN_DEDN, Payroll.OTHER_DEDUC,
            //                 Payroll.LWF, Payroll.TOTAL_DEDUCTIONS,
            //                 Payroll.NET_TAKE_HOME
            //             ])

            //         }


            //     }).render(document.getElementById("employee-table"));
            // }




            $("#loadData").click(function() {
                //loadData();
                var selectedPayRollMonth = $('#dropdown_payroll_month').find(":selected").val();
                var work_location = $('#dropdown_work_location').find(":selected").val();
                var designation = $('#dropdown_designation').find(":selected").val();

                $.ajax({
                    url: "{{ route('payroll-filter-info') }}",
                    type: 'GET',
                    contentType: "text/plain",
                    dataType: 'json',
                    data: {
                        payroll_month: selectedPayRollMonth,
                        work_location: work_location,
                        designation: designation,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#payrollReportTable").DataTable().clear();
                        var length = Object.keys(data).length;
                        //console.log(Object.values(data));
                        console.log("sfsfs", length);
                        for (var i = 0; i < length; i++) {
                            // console.log(data[i].user_code);
                            $('#payrollReportTable').dataTable().fnAddData([
                                data[i].user_code,
                                data[i].name,
                                data[i].DESIGNATION,
                                data[i].doj,
                                data[i].dob,
                                data[i].work_location,
                                data[i].Aadhar_Number,
                                data[i].PAN_Number,
                                data[i].uan_number,
                                data[i].epf_number,
                                data[i].esic_number,
                                data[i].bank_id,
                                data[i].bank_account_number,
                                data[i].bank_ifsc_code,
                                data[i].mobile_number,
                                data[i].officical_mail,
                                data[i].PAYROLL_MONTH,
                                data[i].BASIC,
                                data[i].HRA,
                                data[i].SPL_ALW,
                                data[i].TOTAL_FIXED_GROSS,
                                data[i].esic_applicable,
                                data[i].MONTH_DAYS,
                                data[i].Worked_Days,
                                data[i].Arrears_Days,
                                data[i].LOP,
                                data[i].Earned_BASIC,
                                data[i].BASIC_ARREAR,
                                data[i].Earned_HRA,
                                data[i].HRA_ARREAR,
                                data[i].Earned_SPL_ALW,
                                data[i].SPL_ALW_ARREAR,
                                data[i].Overtime,
                                data[i].TOTAL_EARNED_GROSS,
                                data[i].PF_WAGES,
                                data[i].PF_WAGES_ARREAR_EPFR,
                                data[i].EPFR,
                                data[i].EPFR_ARREAR,
                                data[i].EDLI_CHARGES,
                                data[i].EDLI_CHARGES_ARREARS,
                                data[i].PF_ADMIN_CHARGES,
                                data[i].PF_ADMIN_CHARGES_ARREARS,
                                data[i].EMPLOYER_ESI,
                                data[i].Employer_LWF,
                                data[i].CTC,
                                data[i].EPF_EE,
                                data[i].EPF_EE_ARREAR,
                                data[i].EMPLOYEE_ESIC,
                                data[i].PROF_TAX,
                                data[i].SAL_ADV,
                                data[i].CANTEEN_DEDN,
                                data[i].OTHER_DEDUC,
                                data[i].LWF,
                                data[i].TOTAL_DEDUCTIONS,
                                data[i].NET_TAKE_HOME

                            ]);
                        }
                    },
                    error: function(e) {
                        console.log("There was an error with your request...");
                        console.log("error: " + JSON.stringify(e));
                    }
                });
            });







        });
    </script>
@endsection
