@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Assign Roles @endslot
@endcomponent


<div class="row">
    <div class="col-xl-12">
        <div class="card  p-3 m-3">
            <div class="card-header border-0 align-items-center  d-flex">
                <h4 class="card-title mb-0 flex-grow-1">
                    <!-- Please Fill Form -->
                </h4>
            </div><!-- end card header -->

            <div class="card-body  pb-2  mx-5">
                <div>
                    <form method="POST" id='role-form' action="/vmt-assign-roles">

                        <!-- @csrf
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Select User123</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="user" required>
                                        <option>Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Select Roles</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="roles" required>
                                        <option>Select</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->

                        <!-- by george -->

                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Appraisal Workflow Component<span
                                        class="text-danger">*</span></label></div>


                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3 row">

                            <div class="col-md-6">
                                <label class="form-label">Template Associate Wise</label>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">KRA/ Competency Based On</label></div>


                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Increment Percentage Based On</label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Report Component<span
                                        class="text-danger">*</span></label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Rating Preference</label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Annual Score Calculation</label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3 row">

                            <div class="col-md-6">
                                <label class="form-label">Show Employee Review in rating</label>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Employee Review Components</label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">Percentage Component</label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3 row">

                            <div class="col-md-6">
                                <label class="form-label">Percentage Groupwise</label>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">

                            <div class="col-md-6"><label class="form-label">FinalScore Calculation Method</label></div>
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Option-1</option>
                                    <option>Option-2</option>
                                    <option>Option-3</option>
                                </select>
                            </div>
                        </div>

                        <div class=" mb-3 row">

                            <div class="col-md-6">
                                <label class="form-label">Achievement Based Rating</label>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3 row">

                            <div class="col-md-6">
                                <label class="form-label">Show all the managers to employee</label>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3 row">

                            <div class="col-md-6">
                                <label class="form-label">Show Rated Managers</label>
                            </div>

                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input ml-3" type="radio" name="formRadios"
                                        id="formRadios2">
                                    <label class="form-check-label" for="formRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="review">
                            <div class="row mt-5 mb-4">
                                <div class="heading">
                                    <h5>Rating</h5>
                                </div>
                            </div>

                            <div class="mb-3 row">

                                <div class="col-md-6"><label class="form-label">Period Based On</label></div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>

                            <div class="mb-5 row">

                                <div class="col-md-6"><label class="form-label">Component</label></div>
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option>Option-1</option>
                                        <option>Option-2</option>
                                        <option>Option-3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="grid-data mt-4">
                            <table class="table align-middle mb-0  responsive" id="table">

                                <thead class="thead" id="tHead">
                                    <tr>
                                        <th scope="col">Component </th>
                                        <th scope="col">Review Period </th>
                                        <th scope="col">Rating Period</th>
                                        <th scope="col">Appraisal Period - From Month </th>
                                        <th scope="col">To Month</th>

                                    </tr>

                                </thead>
                                <tbody class="tbody" id="tbody">

                                    <tr>
                                        <td>Common</td>
                                        <td>
                                            <div>

                                                <select class="form-select">
                                                    <option>Option-1</option>
                                                    <option>Option-2</option>
                                                    <option>Option-3</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <select class="form-select">
                                                    <option>Option-1</option>
                                                    <option>Option-2</option>
                                                    <option>Option-3</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td>Select Month - Jan to Dec</td>
                                        <td>System should automatically</td>
                                    </tr>


                                    <tr>
                                        <td>Common</td>
                                        <td>
                                            <div>

                                                <select class="form-select">
                                                    <option>Option-1</option>
                                                    <option>Option-2</option>
                                                    <option>Option-3</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <select class="form-select">
                                                    <option>Option-1</option>
                                                    <option>Option-2</option>
                                                    <option>Option-3</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td>Select Month - Jan to Dec</td>
                                        <td>System should automatically</td>
                                    </tr>
                                    <tr>
                                        <td>Common</td>
                                        <td>
                                            <div>

                                                <select class="form-select">
                                                    <option>Option-1</option>
                                                    <option>Option-2</option>
                                                    <option>Option-3</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <select class="form-select">
                                                    <option>Option-1</option>
                                                    <option>Option-2</option>
                                                    <option>Option-3</option>
                                                </select>

                                            </div>
                                        </td>
                                        <td>Select Month - Jan to Dec</td>
                                        <td>System should automatically</td>
                                    </tr>
                                </tbody>

                            </table>



                        </div>

                        <div class="row mt-2">
                            <div class="text-end col-xl-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<div style="z-index: 11">
    <div id="borderedToast2" class="toast toast-border-success overflow-hidden mt-3" role="alert" aria-live="assertive"
        aria-atomic="true">
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
@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
$('#role-form').on('submit', function(e) {
    e.preventDefault();
    var roleUri = $('#role-form').attr('action');
    console.log(roleUri);

    $.ajax({
        type: "POST",
        url: roleUri,
        data: $('#role-form').serialize(), // serializes the form's elements.
        success: function(data) {
            $('#alert-msg').html(data);
            var toastLiveExample3 = document.getElementById("borderedToast2");
            var toast = new bootstrap.Toast(toastLiveExample3);
            toast.show();
            //alert(data); // show response from the php script.
        }
    })
    //console.log($('#role-form').serialize());
});
</script>
@endsection