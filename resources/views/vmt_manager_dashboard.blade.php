@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')

<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />

<!-- prem content -->

<!--Bootstrap CSS-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/bootstrap.min.css') }}">

<!--Custom style.css-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/quicksand.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/dashboard.css') }}">
<!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/hr_dashboard.css') }}"> -->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/holiday.css') }}">
<!--Bootstrap Calendar-->
<!-- <link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/bootstrap_calendar.css') }}"> -->

<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
<!--Animate CSS-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/chartist.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/css/app.min.css') }}">
<!--Map-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/jquery-jvectormap-2.0.2.css') }}">

<!-- calendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<!-- prem content end -->

@endsection

@section('loading')
<section id="loading">
    <div class='face'>
        <div class='loader-container'>
            <img id="loader-image" src="{{ URL::asset('assets/images/abs logo.png') }}"/>
            <span class='loading'></span>
        </div>
    </div>
</section>
@endsection

@section('content')

<div class="hr-dashboar-wrpper">
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4">
            @include('ui-dashboard-welcome-card')
        </div>
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4  d-flex">
            @include('ui-dashboard-action-card')
        </div>
        <div class="col-sm-6 col-md-6  col-xl-4 col-lg-4 d-flex">
            @include('ui-dashboard-holiday-card')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-md-9">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">New Employees</h5>
                                <h6 class="number-increment fw-bold">10</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow profile-box card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Total Employees</h5>
                                <h6 class="number-increment fw-bold">30</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                <div class="card shadow profile-box orange-top-border">
                        <!-- <div class="p-1 bg-danger" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Online</h5>
                                <h6 class="number-increment fw-bold">10</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Offline</h5>
                                <h6 class="number-increment fw-bold">20</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Employees on Leave</h5>
                                <h6 class="number-increment fw-bold">3</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card shadow  profile-box card-top-border">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Future Joiners</h5>
                                <h6 class="number-increment fw-bold">40</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3 col-lg-3">
                    <div class="card profile-box shadow  card-top-border ">
                        <!-- <div class="p-1 bg-primary" > -->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold title">Hybrid</h5>
                                <h6 class="number-increment fw-bold">10</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 ipad-query">
                    <div class="card profile-box flex-fill card-top-border">
                        <!-- <div class="p-1 bg-primary" ></div> -->
                        <div class="card-body ">
                            <div class="profile-wrapper d-flex p-0">
                                <div class="popover-body p-0 w-100">
                                    <div class="min-h-250">
                                        <div>
                                            <ul class="nav sub-topnav">
                                                {{-- <li class="title active topbarNav fw-bold" id="post_view"><a>View Post</a> --}}
                                                </li><li class="title  topbarNav fw-bold" id="post"><a>Post</a>
                                                </li>
                                                <li class="title topbarNav  fw-bold" id="announcement">
                                                    <a>Announcement</a>
                                                </li>
                                                <li class="title topbarNav fw-bold" id="poll"><a>Poll</a></li>
                                                <li class="title topbarNav fw-bold" id="praise"><a>Praise</a></li>
                                            </ul>
                                             <!-- code post view  -->
                                            {{-- <div class="topbarContent emp-post_view" >
                                                <div>
                                                    <div class="px-20 p-16 row no-gutters scrollBar">
                                                        @foreach($dashboardpost as $index => $user )
                                                            <img  style="width: 100px;" src="{{ URL::asset('images/'.$user->post_image)  }}">
                                                            <input name="post_menuss" id="post_menuss" class="border-0 outline-none  w-100 h-100" readonly value="{{$user->message}}">
                                                        @endforeach
                                                    </div>   
                                                </div>
                                            </div> --}}

                                            <!-- emd view -->
                                            <div class="topbarContent emp-post">
                                                <div>
                                                    <div class="px-22 p-16 row no-gutters scrollBar">
<form method="POST" enctype="multipart/form-data" id="submit_post_data" action="javascript:void(0)" >                            
 <textarea name="post_menu" id="post_menu" class="border-0 outline-none w-100 h-100" placeholder="Write your Post here"></textarea>
                                                    
                                                    </div>
                                                    <input type="file" class="filestyle" name="image_src" id="image_src" data-input="false" data-iconName="fa fa-upload" data-buttonText="Upload File" />
                                                     <button class="btn btn-danger py-1 px-4  float-right"  type="submit">
                                                        Create Post
                                                    </button>

                                                </form>

                       
                                                 <!--     <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0">
                                <div class="modal-header bg-soft-info p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <div class="form-control">
                                     <textarea name="post_menu" id="post_menu" class="border-0 outline-none w-100 h-100"></textarea>
                                    
                                </div>
                             
                                   
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-success" 
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="post_menu_submit">Add Post</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div> -->
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-announcement " style="display:none;">
                                                <div>
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters scrollBar">
                                                          
                                                                
                                                            <input  class="form-control   w-100 h-100"  aria-label="default input example" placeholder="Title of the Announcement" type="text" id="title_data" name="title_data">
                                                            <br>
                                                            <hr size="8" width="90%" color="black">
                                                            <br>
<!-- <input class="form-control" type="text" placeholder="Default input" aria-label="default input example"> -->
                                                            <textarea  class="form-control placeholder-glow w-100 h-100"  placeholder="Details of Announcement" aria-label="default input example" type="text" name="details_data" id="details_data"></textarea>
                                                        
                                                        </div>
                                                        <button class="btn btn-danger py-1 px-4  float-right" id="annon_menu_submit" type="button">
                                                            Submit
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-poll" style="display:none;">
                                                <div>
                                                    <div>
                                                        <form action="{{route('poll_voting')}}" method="POST">
                                                            @csrf
                                                            <div class="px-20 p-16 row no-gutters scrollBar">
                                                                @if ($polling)
                                                                <h3>{{$polling->question}}</h3>
                                                                <div class="d-flex align-items-center">
                                                                    @foreach(json_decode($polling->options, true) as $key => $option)
                                                                    <div class="mr-2"><input id="polling{{$key}}" type="radio" name="polling" value="{{$option}}" @if($polling->data && $polling->data == $option) checked @endif>
                                                                    <label for="polling{{$key}}" class="m-0 mr-2">{{$option}}</label></div>
                                                                    @endforeach
                                                                    <input type="hidden" name="id" value="{{$polling->id}}">
                                                                </div>
                                                                @else
                                                                <div class="text-center"><h4>There is no polling now..!</h4></div>
                                                                @endif
                                                            </div>
                                                            <button class="btn btn-danger py-1 px-4  float-right">
                                                                Submit
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topbarContent emp-praise" style="display:none;">
                                                <div>
                                                    <div>
                                                        <div class="px-20 p-16 row no-gutters scrollBar">
                                                            <textarea name="" id="" cols="30" rows="6"
                                                                class="border-0 outline-none w-100">

                                                            </textarea>
                                                        </div>
                                                        <button class="btn btn-danger py-1 px-4  float-right">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                @include('ui-dashboard-event-card')
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="" >
                <div class="card profile-box flex-fill m-0 mb-2 "
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:3px 3px 20px 20px;">
                    <!-- <div class="p-1 bg-primary" ></div> -->
                    <div class="card-body p-0" style="padding:0px !important">
                        <!-- <div id='full_calendar_events'></div> -->
                        <!-- <div id="calendar"></div> -->
                        <div class="calendar-wrapper" id="calendar-wrapper"></div>
                    </div>
                </div>
                <!-- <div class="mb-0">
                    <div class="title py-4 px-2" style="border-bottom:dotted #a4a5a7;">
                        <h6 class="m-0 font-weight-bold text-primary">List Of Holidays-2022</h6>
                    </div>
                    <div class="card-body p-1">
                    </div>
                </div> -->
                <!-- <div class="">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12 p-0">
                            <div class="bg-muted pl-2 pr-2">
                                <div class="row p-3">
                                    <h6 class="mr-1 col-auto f-13 pr-0 wrap-text" style="width: 60%;"><i
                                            class="fa fa-calendar-alt f-15 mr-2 text-purple"></i>Republic Day</h6>
                                    <h6 class="f-13 col pl-0">
                                        <div class="text-right">
                                            <span>Sun, Jan 26</span>
                                        </div>
                                    </h6>
                                </div>
                                <hr class="m-0">
                                <div class="row p-3">
                                    <h6 class="mr-1 col-auto f-13 pr-0 wrap-text" style="width: 60%;"><i
                                            class="fa fa-calendar-alt f-11 mr-2 text-yellow"></i>Shivaratri</h6>
                                    <h6 class="f-13 col pl-0">
                                        <div class="text-right">
                                            <span>Sun, July 26</span>
                                        </div>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!--  -->
@endsection
@section('script')
<!-- Prem assets -->
<!-- OWL CAROUSEL -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>

<script src="{{ URL::asset('/assets/premassets/js/jquery-1.12.4.min.js') }}"></script>
<!--Popper JS-->
<script src="{{ URL::asset('/assets/premassets/js/popper.min.js') }}"></script>
<!--Bootstrap-->
<script src="{{ URL::asset('/assets/premassets/js/bootstrap.min.js') }}"></script>
<!--Sweet alert JS-->
<script src="{{ URL::asset('/assets/premassets/js/sweetalert.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/progressbar.min.js') }}"></script>

<!--Bootstrap Calendar JS-->
<!-- <script src="{{ URL::asset('/assets/premassets/js/calendar/bootstrap_calendar.js') }}"></script>
    <script src="{{ URL::asset('/assets/premassets/js/calendar/demo.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<!--Nice select-->
<script src="{{ URL::asset('/assets/premassets/js/jquery.nice-select.min.js') }}"></script>

<!--Custom Js Script-->
<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/hr_dashboard.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/holiday.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/calendar.min.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/calendar.js') }}"></script>

<!-- Prem assets ends -->

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@yield('welcome-script')
<!-- for date and time -->

<script
      src="https://unpkg.com/codeflask/build/codeflask.min.js"></script>
    <script type="text/javascript">
      var config = `
function selectDate(date) {
  $('#calendar-wrapper').updateCalendarOptions({
    date: date
  });
  console.log(calendar.getSelectedDate());
}

var defaultConfig = {
  weekDayLength: 1,
  date: '08/05/2021',
  onClickDate: selectDate,
  showYearDropdown: true,
  startOnMonday: false,
};

var calendar = $('#calendar-wrapper').calendar(defaultConfig);
console.log(calendar.getSelectedDate());
`;
      eval(config);
      const flask = new CodeFlask('#editor', { 
        language: 'js', 
        lineNumbers: true 
      });
      flask.updateCode(config);
      flask.onUpdate((code) => {
        try {
          eval(code);
        } catch(e) {}
      });
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script defer>
      fetch('https://raw.githubusercontent.com/wrick17/calendar-plugin/master/README.md')
        .then(response => response.text())
        .then(function(text) {
          const docs = text.split('**DOCS**')[1];
          document.getElementById('content').innerHTML = `
          <div>
            <h2>DOCS</h2>
            ${marked.parse(docs)}
          <div>
          `;
        });
    </script>
<script>
$(document).ready(function() {
    $(function() {
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
            },
        });
    });

    $('body').on('click', '.popover-close', function() {
        $("[data-toggle=popover]").popover('hide');
    });
    $('body').on('click', '.topbarNav', function() {
        $('.topbarNav').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id');
        $('.topbarContent').hide();
        $('.emp-' + id).css("display", "block");
    });


});


// for number increament 

$(function() {
    function count($this) {
        var current = parseInt($this.html(), 10);
        $this.html(++current);
        if (current !== $this.data('count')) {
            setTimeout(function() {
                count($this)
            }, 50);
        }
    }
    $(".number-increment").each(function() {
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        count($(this));
    });
});
</script>
 <script type="text/javascript">
                $(document).ready(function (e) {
                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $('#submit_post_data').submit(function(e) {
                        e.preventDefault();
                           // alert("helooo");
                        var formData = new FormData(this);
                        $.ajax({
                        type:'POST',
                         url: "{{url('vmt-dashboard-post')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                        this.reset();
                        alert('Post Created Successfully');
                        console.log(data);
                        },
                        error: function(data){
                        console.log(data);
                    }
                    });
                    });
                    });
</script>
    <script type="text/javascript">

$('#annon_menu_submit').click(function(e) {
    e.preventDefault();
                var  image   = $('#image_src').val();
                //alert(image);
        var title_data = $('#title_data').val();
        var details_data = $('#details_data').val();
        var user_ref_id = "{{Auth::user()->id}}";
    $.ajax({
        type: "POST",
        url: "{{url('vmt-dashboard-announcement')}}",
         data: {
            "_token": "{{ csrf_token() }}",
            title_data: title_data,
            user_ref_id: user_ref_id,
            details_data: details_data,
        },
        success: function(data) {
            // alert(data);
            location.reload();
        }
    })
});


    </script>
@endsection