@section('css')
    <link href="{{ URL::asset('assets/css/breadcrumb.css') }}" rel="stylesheet">

@endsection


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="page-title-right">
                <ol class="breadcrumb m-0  fw-bold ">

                    <li class="crumb-item"><a href="{{url('vmt-employess/directory')}}" class="text-muted">Directory</a></li>
                    <li class="crumb-item"><a href="{{url('vmt-employee-hierarchy')}}" class="text-muted">ORG
                            structure</a></li>
                    <li class="crumb-item"><a href="{{url('vmt_employeeOnboarding')}}" class="text-muted">Onboarding</a></li>
                    <li class="crumb-item"><a  href="{{route('emp-bulk-upload')}}" class="text-muted">Onboarding Bulk Upload</a></li>
                    <li class="crumb-item"><a href="{{route('page-not-found')}}" class="text-muted">Exit</a></li>
                    <li class="crumb-item"><a href="{{route('page-not-found')}}" class="text-muted">Documents</a></li>
                    <li class="crumb-item"><a href="{{route('vmt-assetinventory-index')}}" class="text-muted">Assets</a></li>

                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
