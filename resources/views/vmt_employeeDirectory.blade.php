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


<div class="card">
    <div class="card-body">
        <h6 class="text-muted fw-bold">Yet to Active Employees</h6>



        <div id="yet-to-active-directory-table"></div>


    </div>
</div>

<div class="card">
    <div class="card-body">

        <h6 class="text-muted fw-bold">Active Employees</h6>
        <div id="active-directory-table"></div>
    </div>
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
    var gridtable_yetToActiveTable ="";
    var gridtable_activeTable ="";

    var bloodgroup_array = <?php echo json_encode(getAllBloodGroupNames()) ?>;

    function activateEmployee(obj)
    {
        var user_id = obj.dataset.user_id;
        var status = 1;
        console.log("Activating emp : "+user_id);

        $.ajax({
            url: "{{route('updateUserAccountStatus')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "status": status,
                "id": user_id,
            },
            success: function(data) {
                //window.location.reload();
                console.log(data);

                gridtable_yetToActiveTable.updateConfig({

                }).forceRender();


                gridtable_activeTable.updateConfig({

                }).forceRender();
            }
        });
    }


    $(document).ready(function() {

        if (document.getElementById("yet-to-active-directory-table"))
        {
            gridtable_yetToActiveTable = new gridjs.Grid({
            columns: [{
                    id: 'user_id',
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
                        // var htmlContent = '<dv id="span_'+emp_code+'">'+html_image_tag+'</dv> &nbsp;&nbsp;'+html_empname;
                        var htmlContent =  '<div class="d-flex align-items-center page-header-user-dropdown" style="width:max-content;">' +'<div id="span_'+emp_code+'" class="rounded-circle user-profile  me-1">'+html_image_tag+'</div>'+html_empname +'</div>';

                        $('#img_'+emp_code).on('error', function(){

                            console.log("Image missing for "+this.dataset.emp_name);

                            $('#span_'+this.dataset.emp_code).html('<i id="shortname_'+emp_code+'" class="align-middle fw-bold "></i>');

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
                        if(! isNaN(date))
                            return gridjs.html(date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear());
                        else
                            return gridjs.html("");

                    }
                },
                {
                    id: 'blood_group_id',
                    name: 'Blood Group',
                    formatter: function formatter(cell) {
                        //console.log("Blood group : "+cell);

                        //console.log(bloodgroup_array[0].name);

                        for(var i=0; i < bloodgroup_array.length; i++)
                        {
                            if(bloodgroup_array[i].id == cell)
                                return gridjs.html(bloodgroup_array[i].name);
                        }
                    }
                },
                {
                    id: 'profile_completeness',
                    name: 'Profile',
                    formatter: function formatter(cell) {

                        return gridjs.html(cell+"%");

                    }
                },
                {
                    id: 'is_onboarded',
                    name: 'Onboard Status',
                    formatter: function formatter(cell) {
                        if(cell == "1")
                            return gridjs.html("Done");
                        else
                            return gridjs.html("Not Done");


                    }
                },
                {
                    id: 'is_docs_approved',
                    name: ' Approvel Status',
                    formatter: function formatter(cell) {
                        if(cell == "1")
                            return gridjs.html("Done");
                        else
                            return gridjs.html("Not Done");


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
                    formatter: function formatter(emp) {
                        var htmlcontent = "";

                        if(emp.is_onboarded == "1" && emp.is_docs_approved == "1")
                            htmlcontent = '<input type="button" value="Activate" onclick="activateEmployee(this)" id="button_activate_"'+emp.user_id+'" data-user_id="'+emp.user_id+'" class="status btn btn-orange py-1 onboard-employee-btn "></input>';
                        else
                            htmlcontent = '<input type="button" value="Activate" class="status btn btn-orange py-1 onboard-employee-btn disabled"></input>';

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
                        emp.user_id,
                        emp,
                        emp.emp_code,
                        emp.emp_designation,
                        emp.l1_manager_code,
                        emp.doj,
                        emp.blood_group_id,
                        emp.profile_completeness,
                        emp.is_onboarded,
                        emp.is_docs_approved,
                        emp.user_id,
                        emp,
                    ]
                )
            },

            }).render(document.getElementById("yet-to-active-directory-table")); // card Table

        }




        if (document.getElementById("active-directory-table"))
        {
            gridtable_activeTable = new gridjs.Grid({
            columns: [{
                    id: 'user_id',
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
                        var htmlContent =  '<div class="d-flex align-items-center page-header-user-dropdown" style="width:max-content;">' +'<div id="span_'+emp_code+'" class="rounded-circle user-profile  me-1">'+html_image_tag+'</div>'+html_empname +'</div>';

                        $('#img_'+emp_code).on('error', function(){

                            console.log("Image missing for "+this.dataset.emp_name);

                            $('#span_'+this.dataset.emp_code).html('<i id="shortname_'+emp_code+'" class="align-middle fw-bold"></i>');

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
                        if(! isNaN(date))
                            return gridjs.html(date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear());
                        else
                            return gridjs.html("");
                    }
                },
                {
                    id: 'blood_group_id',
                    name: 'Blood Group',
                    formatter: function formatter(cell) {
                        //console.log("Blood group : "+cell);

                        //console.log(bloodgroup_array[0].name);

                        for(var i=0; i < bloodgroup_array.length; i++)
                        {
                            if(bloodgroup_array[i].id == cell)
                                return gridjs.html(bloodgroup_array[i].name);
                        }
                    }
                },
                {
                    id: 'profile_completeness',
                    name: 'Profile',
                    formatter: function formatter(cell) {
                        return gridjs.html(cell+"%");

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
            style: {
    table: {
      'overflow-x':'scroll'
    },
    th: {

      'width':'100% !important'
    },
    td: {

    }
  },
            sort: true,
            search: true,
            server: {
                url: '{{route('vmt-activeemployees-fetchall')}}',
                then: data => data.map(
                    emp => [
                        emp.user_id,
                        emp,
                        emp.emp_code,
                        emp.emp_designation,
                        emp.l1_manager_code,
                        emp.doj,
                        emp.blood_group_id,
                        emp.profile_completeness,
                        emp.user_id,
                    ]
                )
            },


            }).render(document.getElementById("active-directory-table")); // card Table

        }






    });
</script>
@endsection
