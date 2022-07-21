@section('css')
<link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
<!-- <link rel="stylesheet" href="{{ URL::asset('/assets/css/app.min.css') }}"> -->
@endsection
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            

            <div class="page-title-right">
                <ol class="breadcrumb m-0  fw-bold ">
                    <li class="breadcrumb-item"><a href="{{url('vmt_noData')}}" class="text-muted">Resignation
                                        Entry</a></li>
                    <li class="breadcrumb-item"><a href="{{url('vmt_noData')}}" class="text-muted">Resignation
                                        Status</a></li>
                    

                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->