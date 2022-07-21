@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link href="{{ ('assets/css/super-simple.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/Treant.css') }}" rel="stylesheet">
    <style type="text/css">
        .self-box{
            padding: 10px;
            /*border: 1px Solid #000;*/
            /*display: inline-block;*/
            display: block;
        }

        #self-node{
            justify-content: flex-start;
            align-items: center;
            display: block;
        }
    /*.parent-vertical {
        border-left: 2px solid black;
        height: 20px;
        position: absolute;
        left: 50%;
        top: 45px;
    }*/

        #parent-node{
            justify-content: flex-start;
            align-items: center;
            display: block;
        }

    #child-node{
        display: block;
        justify-content: flex-start;
    }
   

#child-node .self-box:before{
     border-left: 2px solid black;
        height: 20px;
        position: absolute;
        left: 50%;
        top: 45px;
} 


/* prema code */
.tree * {
    margin: 0; padding: 0;
}

.tree ul {
    padding-top: 20px; position: relative;

    -transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;

    -transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
    content: '';
    position: absolute; top: 0; right: 50%;
    border-top: 2px solid #696969;
    width: 50%; height: 20px;
}
.tree li::after{
    right: auto; left: 50%;
    border-left: 2px solid #696969;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
    border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
    border-right: 2px solid #696969;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 2px solid #696969;
    width: 0; height: 20px;
}

.tree li a{
    height: 100px;
    width: 200px;
    padding: 5px 10px;
    text-decoration: none;
    background-color: white;
    color: #8b8b8b;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;  
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);

    -transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.collapse-icon{
    content: '-';
    padding: 2px 7px 2px 7px;
    font-weight: bold;
    font-size: 20px;
    border-radius: 50%;
    background: blue;
    color: white;
}

.f-emp_name {
    font-size: 14px;
}
   </style>

@endsection
@section('content')
@component('components.organization_breadcrumb')
@slot('li_1')  @endslot
@endcomponent

    <div class="row project-wrapper">
        <div class="col-12">
            <div class="row mb-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="nav sub-topnav">
                            <li routerlinkactive="active">
                                <a routerlink="directory" href="{{url('vmt-employess/directory')}}">Employee Directory</a>
                            </li>
                            <li routerlinkactive="active" class="active">
                                <a routerlink="tree" href="{{url('vmt-employee-hierarchy')}}">Organization Tree</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="logins" href="#/org/employees/logins">Logins</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="profile-changes" href="#/org/employees/profile-changes">Profile Changes</a><!---->
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="privateprofiles" href="#/org/employees/privateprofiles">Private Profiles</a>
                            </li>
                            <li routerlinkactive="active">
                                <a href="/#/org/employees/probation/in-probation">Probation</a>
                            </li>
                            <li routerlinkactive="active">
                                <a routerlink="settings" href="#/org/employees/settings">Settings</a>
                            </li>
                        </ul>
                    </div> 
                </div>
                <div class="page-title">
                    <h1>Employee Organization</h1>
                </div>
                <div infinitescroll="" class="row no-gutters">
                    <form method="POST" action="{{url('vmt-employee-hierarchy/store')}}" id="role-form">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Select Parent</label>
                            <div class="col-md-9">
                                <select class="form-select" name="parent" required id="select-parent" selected="">
                                    <option value="-1" >Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-lg-12"  >
                                <div id="parent-node" ></div>
                                <div class = "parent-vertical"></div>
                                <div id="self-node" ></div>
                                <div id="child-node" ></div>
                            </div>
                            <div class="chart" id="OrganiseChart-simple"></div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid d-flex" style="margin-top:20px;justify-content:center;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tree">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="container-fluid">
                                                <div class="row" style="height:100%; overflow:auto;">
                                                    <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" class="rounded-circle header-profile-user"></p>
                                                    <div class="p-0 col">
                                                        <div class="d-flex align-items-center">
                                                            <b class="f-emp_name">emp_name</b>
                                                        </div>
                                                        <p class="m-0 d-flex"><span>Account coordinator</span></p>
                                                        <p class="m-0 d-flex"><span>Brigate Twin Towers</span></p>
                                                        <p class="m-0 d-flex"><span>99900000000</span></p>
                                                        <p class="m-0 d-flex"><span>3D</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="collapse-icon"><i class="fa fa-minus"></i></span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="container-fluid">
                                                        <div class="row" style="height:100%; overflow:auto;">
                                                            <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" class="rounded-circle header-profile-user"></p>
                                                            <div class="p-0 col">
                                                                <div class="d-flex align-items-center">
                                                                    <b class="f-emp_name">emp_name</b>
                                                                </div>
                                                                <p class="m-0 d-flex"><span>Account coordinator</span></p>
                                                                <p class="m-0 d-flex"><span>Brigate Twin Towers</span></p>
                                                                <p class="m-0 d-flex"><span>99900000000</span></p>
                                                                <p class="m-0 d-flex"><span>3D</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="container-fluid">
                                                        <div class="row" style="height:100%; overflow:auto;">
                                                            <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" class="rounded-circle header-profile-user"></p>
                                                            <div class="p-0 col">
                                                                <div class="d-flex align-items-center">
                                                                    <b class="f-emp_name">emp_name</b>
                                                                </div>
                                                                <p class="m-0 d-flex"><span>Account coordinator</span></p>
                                                                <p class="m-0 d-flex"><span>Brigate Twin Towers</span></p>
                                                                <p class="m-0 d-flex"><span>99900000000</span></p>
                                                                <p class="m-0 d-flex"><span>3D</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="collapse-icon"><i class="fa fa-minus"></i></span>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <div class="container-fluid">
                                                                <div class="row" style="height:100%; overflow:auto;">
                                                                    <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" class="rounded-circle header-profile-user"></p>
                                                                    <div class="p-0 col">
                                                                        <div class="d-flex align-items-center">
                                                                            <b class="f-emp_name">emp_name</b>
                                                                        </div>
                                                                        <p class="m-0 d-flex"><span>Account coordinator</span></p>
                                                                        <p class="m-0 d-flex"><span>Brigate Twin Towers</span></p>
                                                                        <p class="m-0 d-flex"><span>99900000000</span></p>
                                                                        <p class="m-0 d-flex"><span>3D</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="container-fluid">
                                                                <div class="row" style="height:100%; overflow:auto;">
                                                                    <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" class="rounded-circle header-profile-user"></p>
                                                                    <div class="p-0 col">
                                                                        <div class="d-flex align-items-center">
                                                                            <b class="f-emp_name">emp_name</b>
                                                                        </div>
                                                                        <p class="m-0 d-flex"><span>Account coordinator</span></p>
                                                                        <p class="m-0 d-flex"><span>Brigate Twin Towers</span></p>
                                                                        <p class="m-0 d-flex"><span>99900000000</span></p>
                                                                        <p class="m-0 d-flex"><span>3D</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="container-fluid">
                                                        <div class="row" style="height:100%; overflow:auto;">
                                                            <p class="pl-3 col-auto"><img src="{{ URL::asset('assets/images/vmt_user_icon.jpeg') }}" class="rounded-circle header-profile-user"></p>
                                                            <div class="p-0 col">
                                                                <div class="d-flex align-items-center">
                                                                    <b class="f-emp_name">emp_name</b>
                                                                </div>
                                                                <p class="m-0 d-flex"><span>Account coordinator</span></p>
                                                                <p class="m-0 d-flex"><span>Brigate Twin Towers</span></p>
                                                                <p class="m-0 d-flex"><span>99900000000</span></p>
                                                                <p class="m-0 d-flex"><span>3D</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </div><!-- end col -->
        </div>
    </div><!-- end row -->

    <!-- Display Toast Notification Bordered With Icon Toast -->
    <div style="z-index: 11">
        <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <i class="ri-checkbox-circle-fill align-middle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0" id="alert-msg">Yey! Everything worked!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal To Confirm Delete -->
<!-- Default Modals -->

<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Roles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <h5 class="fs-15">
                    Are you sure ?
                </h5>
                <p class="text-muted"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="confirmDelete()">Delete</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('script')
    <!-- ui notifications -->

    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/raphael.js')}}"></script>
    <script src="{{ URL::asset('assets/js/Treant.js') }}" ></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="orgchart/orgchart.css" rel="stylesheet">
    <script src="orgchart/orgchart.js"></script>

    <script type="text/javascript">
        



// // // // // // // // // // // // // // // // // // // // // // // // 

var config = {
    container: "#OrganiseChart-simple"
};

/*var parent_node = {
    text: { name: "Parent node" }
};*/



    </script>

    <script type="text/javascript">

        $('body').on('click', 'li a .collapse-icon', function(){
            $(this).parent().next().toggle();
            console.log($(this).children());
            if ($(this).children().hasClass('fa-minus')) {
                $(this).children().removeClass('fa-minus');
                $(this).children().addClass('fa-plus');
            } else {
                $(this).children().addClass('fa-minus');
                $(this).children().removeClass('fa-plus');
            }
        });
        
        var initiateTreantChart  = false;
        //var parent_node = { text: { name: "Parent node" } };
        // select roles to assign permission 
        $('#select-parent').on('change', function(){
            //var userList  = {!!json_encode($users) !!};
            var parentVal = $(this).val();

            $.ajax({
                url: "{{url('vmt-employee-hierarchy/')}}"+"/"+parentVal+"/view",
                type: "GET",
                success: function(data){
                    /*initiateTreantChart = true;
                    var parent_node = { text: { name: ''} }
                    if(data.parent){
                        if(data.parent.length > 0){
                            $('.parent-vertical').css('display', 'block');
                            $('#parent-node').html('');
                            $('#parent-node').html("<span class='self-box'>"+data.parent[0].name+"</span>");  
                            parent_node = { text: { name: data.parent[0].name} }  
                        }else{
                            $('#parent-node').html('');
                            $('.parent-vertical').css('display', 'none');
                        }
                        
                    }

                    if(data.child){
                        $('#child-node').html('');
                        var childList = data.child; 
                        for (var i = childList.length - 1; i >= 0; i--) {
                            $('#child-node').append("<span class='self-box'>&emsp;&emsp;"+childList[i].name+"</span>");
                        }
                    }

                    $('#self-node').html("<span class='self-box'>&emsp;"+data.self.name+"</span>");

                    console.log(data.self);*/

                    enableOrgChart(data);
                }
            })
            
        });
        
    </script>
@endsection
