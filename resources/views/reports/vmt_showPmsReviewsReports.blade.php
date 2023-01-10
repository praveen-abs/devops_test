@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="vendor-wrapper mt-30 card">

        <div class="card-body">
            <h6 class="">PMS Reports</h6>

            <div class=" text-start mb-2">
                <span>
                    <b>Calendar Year : </b>
                    <?php
                    if ($query_configPms->calendar_type == 'financial_year') {
                        echo 'Financial Year';
                    } elseif ($query_configPms->calendar_type == 'calendar_year') {
                        echo 'Calendar Year';
                    } else {
                        echo 'Error';
                    }
                    ?>
                </span>
            </div>

            <div class=" text-start mb-2">
                <span>
                    <b>Year </b>
                    {{-- <input type="text" id="year" readonly value="{{ $query_configPms-> year}}" size="25" /> --}}
                    <select id="year" class="form-select form-select-sm" style="width:auto;"
                        aria-label=".form-select-sm example">
                        @foreach ($query_years as $key => $value)
                            <option value="{{ $value }}"> {{ $value }} </option>
                        @endforeach
                    </select>

                </span>
            </div>


            <div class=" text-start mb-2">
                <span>
                    <b>Frequency : </b>{{ ucfirst($query_configPms->frequency) }}
                </span>
            </div>

            <div class=" text-start mb-2">
                <span>
                    <b>Assignment Period</b>
                    <select placeholder="Select Calendar Type" style="width:auto;" aria-label=".form-select-sm example"
                        id="dropdownAssignment_period" class="form-select form-select-sm">
                        <option value="" selected>Select</option>
                        @if ($query_configPms->calendar_type == 'financial_year')
                            @if ($query_configPms->frequency == 'monthly')
                                <option value="apr">Apr</option>
                                <option value="may">May</option>
                                <option value="jun">Jun</option>
                                <option value="jul">Jul</option>
                                <option value="aug">Aug</option>
                                <option value="sep">Sep</option>
                                <option value="oct">Oct</option>
                                <option value="nov">Nov</option>
                                <option value="dec">Dec</option>
                                <option value="jan">Jan</option>
                                <option value="feb">Feb</option>
                                <option value="mar">Mar</option>
                            @elseif($query_configPms->frequency == 'quarterly')
                                <option name="Q1" value="q1"> Q1 (Apr-Jun)</option>
                                <option name="Q2" value="q2"> Q2 (Jul-Sept)</option>
                                <option name="Q3" value="q3"> Q3 (Oct-Dec)</option>
                                <option name="Q4" value="q4"> Q4 (Jan-March)</option>
                            @elseif($query_configPms->frequency == 'halfYearly')
                                <option name="H1" value="h1">H1 (Apr-Sept)</option>
                                <option name="H2" value="h2">H2 (Oct-Mar)</option>
                            @elseif($query_configPms->frequency == 'annually')
                                <option name="A" value="A">A (Apr-Mar)</option>
                            @endif
                        @elseif($query_configPms->calendar_type == 'calendar_year')
                            @if ($query_configPms->frequency == 'monthly')
                                <option value="jan">Jan</option>
                                <option value="feb">Feb</option>
                                <option value="mar">Mar</option>
                                <option value="apr">Apr</option>
                                <option value="may">May</option>
                                <option value="jun">Jun</option>
                                <option value="jul">Jul</option>
                                <option value="aug">Aug</option>
                                <option value="sep">Sep</option>
                                <option value="oct">Oct</option>
                                <option value="nov">Nov</option>
                                <option value="dec">Dec</option>
                            @elseif($query_configPms->frequency == 'quarterly')
                                <option name="Q1" value="q1"> Q1 (Jan-March)</option>
                                <option name="Q2" value="q2"> Q2 (Apr-Jun)</option>
                                <option name="Q3" value="q3"> Q3 (Jul-Sept)</option>
                                <option name="Q4" value="q4"> Q4 (Oct-Dec)</option>
                            @elseif($query_configPms->frequency == 'halfYearly')
                                <option name="H1" value="h1">H1 (Jan-Jun)</option>
                                <option name="H2" value="h2">H2 (Jul-Dec)</option>
                            @elseif($query_configPms->frequency == 'annually')
                                <option name="A" value="A">A (Jan-Dec)</option>
                            @endif
                        @endif
                    </select>
                </span>
            </div>


            {{-- <div class=" text-start mb-2">
                <span>
                    <b>Status</b>
                    <select placeholder="Select Calendar Type" style="width:auto;" aria-label=".form-select-sm example"
                        id="dropdownSubmittedStatus" class="form-select form-select-sm">
                        <option selected>Select</option>
                        <option value="1">Submitted</option>
                        <option value=""> Not yet Submitted</option>
                    </select>
                </span>
            </div> --}}


            <div class=" text-end mb-2">
                <button class="btn btn-orange me-2" id="btn_downloadReport">Download Report</button>
            </div>
            <div class="table-responsive">
                <table id="pmsReportTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Emp Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Calendar Type</th>
                            <th scope="col">Year</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Assignment Period</th>
                            <th scope="col">Employees Submission Status</th>
                            <th scope="col">Manager Review Status</th>
                            <th scope="col">Manager Name</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($query_pms_data as $query_pms_data)
                            <tr>
                                <td class="userCode">
                                    {{ $query_pms_data->user_code }}
                                </td>
                                <td class="empName">
                                    {{ $query_pms_data->name }}
                                </td>
                                <td class="tableCalendarType">
                                    {{ $query_pms_data->calendar_type }}
                                </td>
                                <td class="year">
                                    {{ $query_pms_data->year }}
                                </td>
                                <td class="frequency">
                                    {{ $query_pms_data->frequency }}
                                </td>
                                <td class="assignmentPeriod">
                                    {{ $query_pms_data->assignment_period }}
                                </td>
                                <td class="assigneeSubmiited">
                                    {{ $query_pms_data->is_assignee_submitted }}
                                </td>
                                <td class="reviewerSubmitted">
                                    {{ $query_pms_data->is_reviewer_submitted }}
                                </td>
                                <td class="managerName">
                                    {{ $query_pms_data->is_reviewer_submitted }}
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
            <div class="vendor-table-wrapper">
                <div id="employee-table" class="noCustomize_gridjs"></div>
            </div>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            let calenderType = '{{ $query_configPms->calendar_type }}';



            let year = $('#year').val();

            // if (calenderType == 'financial_year') {

            //     console.log("1 " + calenderType);
            //     var sub = $('#dropdownAssignment_period');

            //     sub.find('option').not(':first').hide();

            //     $('option', sub).filter(function() {
            //         console.log("Assign Period" + calenderType);
            //         if ($(this).attr('data-group') == calenderType) {
            //             $(this).show();

            //         }
            //     });


            //     $('#dropdownCalender_year').trigger('change');

            // } else if (calenderType == 'calender_year') {
            //     document.getElementById("dropdownCalender_year").innerHTML = "Calender Year";
            //     console.log("2" + calenderType);
            // }



            $('#btn_downloadReport').on('click', function(e) {

                console.log("Download payroll reports....");
                let selectedAssingementPeriod = $('#dropdownAssignment_period').find(":selected").val();
                let selectedSubmittedDropdown = $('#dropdownSubmittedStatus').find(":selected").val();
                console.log(selectedAssingementPeriod + ' ' + selectedSubmittedDropdown);
                let URL = '/reports/generatePmsReviewsReports?calender_type=' + calenderType + '&year=' +
                    year + '&assignment_period=' + selectedAssingementPeriod + '&is_assignee_submitted=' +
                    selectedSubmittedDropdown +
                    '&_token={{ csrf_token() }}';
                console.log("Generated URL : " + URL);

                window.location = URL;




            });

            var tableCalendarType = document.getElementsByClassName("tableCalendarType");
            if (tableCalendarType[0].innerText == "financial_year") {
                console.log(tableCalendarType[0].innerText);
                for (var i = 0; i < tableCalendarType.length; i++) {
                    tableCalendarType[i].innerText = "Financial Year";
                }
            }


            var assigneeSubmiited = document.getElementsByClassName("assigneeSubmiited");
            for (var i = 0; i < assigneeSubmiited.length; i++) {
                if (assigneeSubmiited[i].innerText == 1) {
                    assigneeSubmiited[i].innerText = "Submitted";
                } else {
                    assigneeSubmiited[i].innerText = "Not Yet Submitted";
                }
            }

            var frequency = document.getElementsByClassName("frequency");
            for (var i = 0; i < frequency.length; i++) {
                if (frequency[i].innerText == "quarterly") {
                    frequency[i].innerText = 'Quarterly'
                    // var assignmentPeriod = document.getElementsByClassName("assignmentPeriod");
                    // if (assignmentPeriod[i].innerText == 'q1') {
                    //     assignmentPeriod[i].innerText = "Q1 (Apr-Jun)"
                    // } else if (assignmentPeriod[i].innerText == 'q2') {
                    //     assignmentPeriod[i].innerText = "Q1 (Jul-Sep)"
                    // } else if (assignmentPeriod[i].innerText == 'q3') {
                    //     assignmentPeriod[i].innerText = "Q3 (Oct-Dec)"
                    // } else if (assignmentPeriod[i].innerText == 'q4') {
                    //     assignmentPeriod[i].innerText = "Q4 (Jan-Mar)"
                    // }


                } else if (frequency[i].innerText == "monthly") {
                    frequency[i].innerText = 'Monthly'
                }
            }

            //For Manager Name And Status

            var reviewerstatus = document.getElementsByClassName("reviewerSubmitted");
            var managerName = document.getElementsByClassName("managerName");
            for (i = 0; i < reviewerstatus.length; i++) {
                const myJSON = JSON.parse(reviewerstatus[i].innerText);
                reviewerArr = Object.entries(myJSON);
                //console.log(reviewerArr[0][1]);
                if (reviewerArr[0][1] == "1") {
                    reviewerstatus[i].innerText = "Reviewed"
                } else {
                    reviewerstatus[i].innerText = "Not Yet Reviewed";
                }

                //For Manager name
                if (reviewerArr[0][0] > 0) {
                    var data = '<?php echo json_encode($username); ?>';
                    //console.log(data);
                    var data = JSON.parse(data);
                    //console.log(data);
                    userName = Object.entries(data);
                    //console.log(userName.key());
                    for (j = 0; j < userName.length; j++) {
                        if (reviewerArr[0][0] == userName[j][1]) {
                            managerName[i].innerText = userName[j][0];
                        }
                    }

                } else {
                    managerName[i].innerText = 0;
                }
            }



            var table = document.getElementById("pmsReportTable");
            var select = document.getElementById("dropdownAssignment_period");
            select.addEventListener("change", function() {
                var selectedValue = this.value;
                console.log("1...." + selectedValue);
                for (var i = 1; i < table.rows.length; i++) {
                    var cells = table.rows[i].cells;
                    console.log("2...." + cells[5].innerText + "  " + selectedValue);
                    if (cells[5].innerText == selectedValue) {
                        console.log("working");
                        table.rows[i].style.display = "table-row";
                    } else {
                        console.log("Not working");
                        table.rows[i].style.display = "none";
                    }
                }
            });
            // table = document.getElementById("pmsReportTable");
            // tr = table.getElementsByTagName("tr");
            // for(i = 1; i < tr.length; i++){
            //     var rowcalendar  = tr[i].getElementsByTagName("td")[2].textContent.toUpperCase();
            //           if(rowcalendar=='financial_year'){
            //             rowcalendar= 'Financial Year';
            //           }
            // }

            // $('#dropdownAssignment_period').change(function(){
            //     var data = $(this).val();
            //     console.log($('#dropdownAssignment_period').find(`.${data}`),"------------")
            //     $('#pmsReportTable').find(`.${data}`).addClass('d-block')
            //     // console.log(data)
            //     // $(`.${data}`).each(function (index, element) {
            //     //     console.log(this)
            //     // });
            // })



        });
    </script>




    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    // {{-- <script>
//         var year = $('#year').val();
//         var calender = $('#dropdownAssignment_period').val();
//         var formData = 'year='+year+'&calender='+calender;
//         console.log(formData)
//         var ajax_call

//         $.get('report_data',formData,function(res){
//             ajax_call = res;
//         })


//         $(document).ready(function() {
//             setTimeout(() => {
//                 console.log(ajax_call,"-----")

//                 $('#ex').DataTable( {
//                     dom: 'lBfrtip',
//                     buttons: [
//                         'excel', 'pdf', 'print'
//                     ],
//                     "ajax": ajax_call,
//                     "columns": [
//                         {"data": "user_code" },
//                         {"data": "name" },
//                         {"data": "calendar_type" },
//                         {"data": "year" },
//                         {"data": "frequency" },
//                         {"data": "assignment_period" },
//                         {"data": "is_reviewer_submitted" },
//                     ]
//                 } );
//             }, 1000);
// } );
//     </script> --}}
@endsection
