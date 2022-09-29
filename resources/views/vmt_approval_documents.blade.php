@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">

@endsection


@section('content')
@component('components.organization_breadcrumb')
@slot('li_1') @endslot
@endcomponent


<div class=" approval_documents-wrapper card">
    <div class="card-body">
        <h6 class="">Documents Approvals</h6>
        <div class="table-responsive">
            <div class="container-fluid px-2 bg-white" style="position:relative;">
                <table class=" table table-borderd " id="directory-table-1">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Employee Code</th>
                            <th scope="col">Date Of Joining</th>
                            <th scope="col">Approval Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vmtEmployees_InActive as $employee)
                        <tr id="tr_{{$employee->user_id}}">

                            <td>
                                <div class="d-flex justify-content-start align-items-center table-img">
                                    <div class="mx-2 d-flex justify-content-center align-items-center profile-name-icon">
                                        @if( empty($employee->avatar) || !file_exists(public_path('images/'. $employee->avatar)) )
                                        @php
                                        $splitArray = explode(" ",$employee->emp_name);
                                        if(count($splitArray) == 1)
                                        $name = strtoupper($splitArray[0][0].$splitArray[0][1]);
                                        else
                                        $name = strtoupper($splitArray[0][0].$splitArray[1][0]);

                                        @endphp
                                        <span class="align-middle fw-bold text-white">{{$name}}</span>
                                        <!--/span-->
                                        @else
                                        <img src="{{ URL::asset('images/'.$employee->avatar) }}" alt="" class="h-100 w-100" />
                                        @endif

                                    </div>
                                    <span>

                                        {{$employee->emp_name}}

                                    </span>
                                </div>
                            </td>
                            <td> {{$employee->user_code}}</td>
                            <td>{{ Carbon\Carbon::parse($employee->doj)->format('d-m-Y') }}</td>
                            <td> Yet to approve</td>
                            <td>
                                <!-- <div class="d-flex justify-content-center align-items-center"> -->
                                <a href="{{route('vmt-emp-documents-review',$employee->user_code)}}" class="btn border-0 outline-none bg-transparent p-0  mx-1">
                                    <i class="ri-pencil-line text-orange fw-bold"></i>
                                </a>

                                <!-- </div> -->
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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

        $('.status').click(function() {
            var status = $(this).val();
            var name = $(this).attr('name');
            var id = $('#id' + name).val(); //get employee id from hidden htmlelement
            // console.log(id);

            $.ajax({
                url: "{{route('updateUserAccountStatus')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "status": status,
                    "id": id,
                },
                success: function(data) {
                    //window.location.reload();
                    $('#tr_' + id).remove();
                    console.log("Deleting TR " + '#tr_' + id);
                    //console.log(data);
                }
            });
        });

    });
</script>



@endsection