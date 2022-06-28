<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h5 class="mb-sm-0 text-muted  fw-bold" >{{ $title }}</h5>

            <div class="page-title-right">
                <ol class="breadcrumb m-0  fw-bold ">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" class="text-muted">{{ $li_1 }}</a></li>
                    @if(isset($title))
                        <li class="breadcrumb-item active" class="text-muted">{{ $title }}</li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
