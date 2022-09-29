@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">

@endsection


@section('content')
@component('components.organization_breadcrumb')
@slot('li_1') @endslot
@endcomponent

<h5 class="text-muted fw-bold">Yet to Active Employees</h5>

<div class="table-responsive">

    <div id="yet-to-active-directory-table"></div>

</div>

<h5 class="text-muted fw-bold">Active Employees</h5>

<div class="table-responsive">

    <div id="active-directory-table"></div>

</div>


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- data table -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    var grid ="";

    function activateEmployee(obj)
    {
        var emp_id = obj.dataset.emp_id;
        var status = 1;
        console.log("Activating emp : "+emp_id);

        $.ajax({
            url: "{{route('updateUserAccountStatus')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "status": status,
                "id": emp_id,
            },
            success: function(data) {
                //window.location.reload();
                console.log(data);

                grid.updateConfig({

                }).forceRender();;

            }
        });
    }


    $(document).ready(function() {

        if (document.getElementById("yet-to-active-directory-table"))
        {
            grid = new gridjs.Grid({
            columns: [{
                    id: 'emp_id',
                    name: 'ID',
                    hidden:true,
                },
                {
                    id: 'emp',
                    name: 'Employee Name',
                    formatter: function formatter(empObj) {

                        var emp_code = empObj.emp_code;
                        var emp_name = empObj.emp_name;

                        var imagePath = '{{ URL::asset("images/") }}' +'/'+ empObj.avatar;

                        //Check if spaces present in profile image text
                        if((/\s/).test(imagePath))
                        {
                           // console.log("White spaces present in : "+imagePath);

                        }
                        else
                        {
                           // console.log(span_id);

                          //  console.log("##### White spaces not present in : "+imagePath);


                        }

                        //console.log(emp_name);
                        var html_image_tag = '<img data-emp_code="'+emp_code+'" data-emp_name="'+emp_name+'" id="img_'+emp_code+'" class="h-10 w-10"  alt=" " src="'+imagePath+'" />';
                        var html_empname = emp_name;
                        var htmlContent = '<span id="span_'+emp_code+'">'+html_image_tag+'</span> &nbsp;&nbsp;'+html_empname;

                        $('#img_'+emp_code).on('error', function(){

                            console.log("Image missing for "+this.dataset.emp_name);

                            $('#span_'+this.dataset.emp_code).html('<i id="shortname_'+emp_code+'" class="align-middle "></i>');

                            generateProfileShortName_VendorScript("shortname_"+emp_code,emp_name);

                        });

                        return gridjs.html(htmlContent );
                    }
                },
                {
                    id: 'emp_code',
                    name: 'Employee Code',
                },
                {
                    id: 'emp_designation',
                    name: 'Designation',
                },
                {
                    id: 'l1_manager_code',
                    name: 'Reporting Manager',
                },
                {
                    id: 'doj',
                    name: 'DOJ',
                    formatter: function formatter(cell) {
                        var date = new Date(cell);
                        return gridjs.html(date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear());

                    }
                },
                {
                    id: 'blood_group',
                    name: 'Blood Group',
                },
                {
                    id: 'profile',
                    name: 'Profile',
                    formatter: function formatter(user_id) {
                        return gridjs.html("70%");

                    }
                },
                {
                    id: 'emp_code',
                    name: 'Edit',
                    formatter: function formatter(user_id) {

                        var routeURL = "{{route('pages_impersonate_profile','')}}"+"/"+user_id;

                        var htmlcontent= '<a href="'+routeURL+'" class="btn border-0 outline-none bg-transparent p-0  mx-1"><i class="ri-pencil-line text-orange fw-bold"></i></a>';

                        return gridjs.html(htmlcontent);
                    }
                },
                {
                    id: 'emp_code',
                    name: 'Action',
                    formatter: function formatter(cell) {

                        var htmlcontent= '<input type="button" value="Activate" onclick="activateEmployee(this)" id="button_activate_"'+cell+'" data-emp_id="'+cell+'" class="status btn btn-orange py-1 onboard-employee-btn "></input>';

                        return gridjs.html(htmlcontent);
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            server: {
                url: '{{route('vmt-yet-to-activeemployees-fetchall')}}',
                then: data => data.map(
                    emp => [
                        emp.emp_id,
                        emp,
                        emp.emp_code,
                        emp.emp_designation,
                        emp.l1_manager_code,
                        emp.doj,
                        emp.blood_group,
                        emp,
                        emp.emp_id,
                        emp.emp_id,
                    ]
                )
            },

            }).render(document.getElementById("yet-to-active-directory-table")); // card Table

        }




        if (document.getElementById("active-directory-table"))
        {
            grid = new gridjs.Grid({
            columns: [{
                    id: 'emp_id',
                    name: 'ID',
                    hidden:true,
                },
                {
                    id: 'emp',
                    name: 'Employee Name',
                    formatter: function formatter(empObj) {

                        var emp_code = empObj.emp_code;
                        var emp_name = empObj.emp_name;

                        var imagePath = '{{ URL::asset("images/") }}' +'/'+ empObj.avatar;

                        //Check if spaces present in profile image text
                        if((/\s/).test(imagePath))
                        {
                           // console.log("White spaces present in : "+imagePath);

                        }
                        else
                        {
                           // console.log(span_id);

                          //  console.log("##### White spaces not present in : "+imagePath);


                        }

                        //console.log(emp_name);
                        var html_image_tag = '<img data-emp_code="'+emp_code+'" data-emp_name="'+emp_name+'" id="img_'+emp_code+'" class="h-10 w-10"  alt=" " src="'+imagePath+'" />';
                        var html_empname = emp_name;
                        var htmlContent = '<span id="span_'+emp_code+'">'+html_image_tag+'</span> &nbsp;&nbsp;'+html_empname;

                        $('#img_'+emp_code).on('error', function(){

                            console.log("Image missing for "+this.dataset.emp_name);

                            $('#span_'+this.dataset.emp_code).html('<i id="shortname_'+emp_code+'" class="align-middle "></i>');

                            generateProfileShortName_VendorScript("shortname_"+emp_code,emp_name);

                        });

                        return gridjs.html(htmlContent );
                    }
                },
                {
                    id: 'emp_code',
                    name: 'Employee Code',
                },
                {
                    id: 'emp_designation',
                    name: 'Designation',
                },
                {
                    id: 'l1_manager_code',
                    name: 'Reporting Manager',
                },
                {
                    id: 'doj',
                    name: 'DOJ',
                    formatter: function formatter(cell) {
                        var date = new Date(cell);
                        return gridjs.html(date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear());

                    }
                },
                {
                    id: 'blood_group',
                    name: 'Blood Group',
                },
                {
                    id: 'profile',
                    name: 'Profile',
                    formatter: function formatter(user_id) {
                        return gridjs.html("70%");

                    }
                },
                {
                    id: 'emp_code',
                    name: 'Edit',
                    formatter: function formatter(user_id) {

                        var routeURL = "{{route('pages_impersonate_profile','')}}"+"/"+user_id;

                        var htmlcontent= '<a href="'+routeURL+'" class="btn border-0 outline-none bg-transparent p-0  mx-1"><i class="ri-pencil-line text-orange fw-bold"></i></a>';

                        return gridjs.html(htmlcontent);
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            server: {
                url: '{{route('vmt-activeemployees-fetchall')}}',
                then: data => data.map(
                    emp => [
                        emp.emp_id,
                        emp,
                        emp.emp_code,
                        emp.emp_designation,
                        emp.l1_manager_code,
                        emp.doj,
                        emp.blood_group,
                        emp,
                        emp.emp_id,
                    ]
                )
            },

            }).render(document.getElementById("active-directory-table")); // card Table

        }






    });
</script>
@endsection
