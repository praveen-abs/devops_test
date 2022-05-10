@extends('layouts.master')
@section('css')

    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') 360 Degree Review @endslot
    @endcomponent


    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Please Fill Form</h4>
                    
                </div><!-- end card header -->

                <div class="card-body  pb-2">
                    <div>
                        <form method="POST" action="/vmt-roles">
                            @csrf
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Enter Role</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="" id="example-text-input" placeholder="roles" name="name" required>
                                </div>
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
@endsection
