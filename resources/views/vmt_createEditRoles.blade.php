@extends('layouts.master')
@section('css')

    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Create/Edit Roles @endslot
    @endcomponent


    <div class="row">
        <div class="col-xl-8">
            <div class="card">

                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Please Fill Form</h4>
                </div><!-- end card header -->

                <div class="card-body  pb-2">
                    <div>
                        <form method="POST" action="/vmt-roles" id="role-form">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-3 col-form-label"> Role Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="" id="example-text-input" placeholder="roles" name="name" required>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="text-end col-xl-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="mb-1  row"><hr/></div>
                    
                    <div>
                        <form method="POST" action="/vmt-permissions" id="permission-form">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Permissions</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Select Role</label>
                                <div class="col-md-9">
                                   <select class="form-select" name="roles" required>
                                        <option>Select</option>
                                        @foreach($roles as $pRole)
                                            <option value="{{$pRole->id}}">{{$pRole->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 mt-1 row" style="align-items: baseline;">
                                <label for="example-text-input" class="col-md-3 col-form-label">Page Level</label>

                                <div class="col-lg-9 col-md-9">
                                    <div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" id="formCheck1"  name="page_level[]"  value="Performance_Appraisal">
                                            <label class="form-check-label" for="formCheck1">
                                                Performance Appraisal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"  name="page_level[]"  value="Self_Appraisal">
                                            <label class="form-check-label" for="formCheck2">
                                                Self Appraisal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="formCheck3" name="page_level[]"   value="Team">
                                            <label class="form-check-label" for="formCheck3">
                                                Team
                                            </label>
                                        </div>
                                         <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="formCheck4" name="page_level[]"  value="ORG">
                                            <label class="form-check-label" for="formCheck4">
                                                ORG
                                            </label>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>
                           

                            <div class="mb-3 mt-1 row" style="align-items: baseline;">
                                <label for="example-text-input" class="col-md-3 col-form-label">Section Level</label>
                                <div class="col-lg-9 col-md-9">
                                    <div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" id="formCheck11" name="section_level[]" value="L1_Review">
                                            <label class="form-check-label" for="formCheck11">
                                                Can see L1 manager review
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="formCheck12" name="section_level[]" value="L2_Review">
                                            <label class="form-check-label" for="formCheck12">
                                                Can see L2 manager review
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="formCheck13" name="section_level[]" value="Final_Review">
                                            <label class="form-check-label" for="formCheck13">
                                                Can see Final review
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div><!--end col-->
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
@endsection
@section('script')
    <!-- apexcharts -->

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        
        $('#permission-form').on('submit', function(e){
            e.preventDefault();
            var roleUri = $('#permission-form').attr('action');
            console.log(roleUri);

            $.ajax({
                type: "POST",
                url: roleUri,
                data: $('#permission-form').serialize(), // serializes the form's elements.
                success: function(data)
                {
                  alert(data); // show response from the php script.
                }
            })
        });

        $('#role-form').on('submit', function(e){
            e.preventDefault();
            var roleUri = $('#role-form').attr('action');
            console.log(roleUri);

            $.ajax({
                type: "POST",
                url: roleUri,
                data: $('#role-form').serialize(), // serializes the form's elements.
                success: function(data)
                {
                  alert(data); // show response from the php script.
                }
            })
            //console.log($('#role-form').serialize());
        });
/*
        document.getElementById('permission-form').on('submit', function(e){
            e.preventDefault();
            console.log(document.getElementById('permission-form').serialize());
        });*/
    </script>
@endsection
