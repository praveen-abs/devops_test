@extends('layouts.master')
@section('css')

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
    </style>

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Employee Hierarchy @endslot
    @endcomponent


    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body  pb-2">
                    <div>
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
                                    <div id="parent-node" >

                                </div>
                                <div class = "parent-vertical"></div>
                                <div id="self-node" >
                                </div>
                                <div id="child-node" >
                                </div>
                                </div>

                                <div class="chart" id="OrganiseChart-simple"></div>
    
                                
                            </div>
                        </form>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
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
    
        <script>
            function enableOrgChart(parent_node ){
                console.log('org', parent_node);
                var simple_chart_config = [
    {
        "container": "#OrganiseChart-simple"
    },
    parent_node];



               /* {
                    chart: {
                        container: "#OrganiseChart-simple"
                    },
                    //parent_node,
                    nodeStructure: parent_node*/
                    /* {
                        parent_node,
                        children: [
                            {
                                text: { name: "First child" }
                            },
                            {
                                text: { name: "Second child" }
                            }
                        ]
                    }*/
               /* };    */ 
                console.log(simple_chart_config);
                new Treant( simple_chart_config );   
            }
        </script>
@endsection
