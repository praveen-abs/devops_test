@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="payrollReports-wrapper mt-30 card">
        <div class="card-body">
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

    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" />
 --}}


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>






    <script>
        $(document).ready(function() {
            $("#payrollReportTable").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    // { extend: 'copy', className: 'btn btn-orange me-2t' },
                    'copy','csv', 'excel', 'print'
                ],
                // bPaginate: true,
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


            });


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
