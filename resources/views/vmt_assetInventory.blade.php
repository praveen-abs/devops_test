@extends('layouts.master')
@section('title') @lang('translation.projects') @endsection
@section('css')
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/employee-directory.css') }}">
<!--Font Awesome-->
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">

<style>
table {
    /* border-collapse: separate; */
    /* border-radius: 10px !important; */
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px !important;

}

table th {
    color: #5265a7;
    background-color: #ccd6f7;
    padding: 15px 10px !important;
    font-size: 13px;
}

tbody {
    background-color: #fff;
}

tbody tr:hover {
    background-color: #f3f3f9;

}

td {
    border: solid 1px #000;
    border-style: none solid solid none;
    padding: 10px;
    font-weight: 600;
    color: #878aa5;

}

td .btn i {
    font-size: 16px;
}


tr:first-child th:first-child {
    border-top-left-radius: 6px !important;
}

tr:first-child th:first-child {
    border-bottom-left-radius: 6px !important;
}


tr:last-child td:first-child {
    border-bottom-left-radius: 6px !important;
}

tr:first-child th:last-child {
    border-top-right-radius: 6px !important;
}

tr:first-child th:last-child {
    border-bottom-right-radius: 6px !important;
}


tr:last-child td:last-child {
    border-bottom-right-radius: 6px !important;
}


/* for radio button */


.switch-field {
    display: flex;

}

/* .directory-right button {
    background-color: #b0bff1!important;

} */

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
    background-color: #fff;
    color: #acb0b0;
    font-size: 14px;
    line-height: 1;
    /* font-weight:600; */
    text-align: center;
    padding: 5px 15px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    /* box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1); */
    transition: all 0.1s ease-in-out;
    margin-bottom: 0px !important;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked+label {

    box-shadow: none;
    color: #5265a7;
    background-color: #ccd6f7 !important;

}

.switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
}

.search-content .directory-search-bar {
    background: #fff !important;
    padding: 4px 0px !important;

}

.form-control:focus {
    /* border: 2px solid #1c8b8d !important; */
    border: 1px solid #c1cef9 !important;
}
</style>


@endsection



@section('content')



<div class=" project-wrapper">
    <h4 class="text-muted fw-bold">Asset Inventory</h4>

    <div class="directory-content  mb-3 mt-2">
        <div class="row">
            <div class="col-8">
                <div class="float-left directory-left d-flex">
                    <div class="switch-field align-items-center">
                        <input type="radio" id="radio-one" name="switch-one" value="Active" checked />
                        <label for="radio-one">Active</label>
                        <input type="radio" id="radio-two" name="switch-one" value="Inactive" />
                        <label for="radio-two">Inactive</label>
                    </div>

                    {{-- <div class="search-content header-item w-50 mx-5">

                        <i class=" ri-search-line "></i>
                        <input type="text" class="form-control search-bar directory-search-bar  w-75 "
                            placeholder="Search">
                    </div> --}}
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex directory-right float-right justify-content-end align-items-center">
                    {{-- <div class="btn border-0 outline-none mx-2 ">
                        <i class="ri-menu-add-line fw-bold"></i>
                    </div> --}}
                    <a href="{{route('vmt-assetinventory-add')}}"
                        class="btn border-0 outline-none py-1 onboard-employee-btn h-25 fw-bold bg-danger text-white">
                        <i class="ri-add-line fw-bold mx-1"></i>
                        Add New Asset
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="card-body">
            <div id="table-assets"></div>
        </div><!-- end card-body -->

        <!-- end table -->
    </div>

</div><!-- end row -->

<div id="modal_edit_asset" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content profile-box">
            <div class="modal-header py-3 new-role-header d-flex align-items-center">
                <h4 class="modal-title mb-1 text-primary" style="border-bottom:5px solid #d0d4e2;">Edit Asset
                </h4>
                <button type="button" class="close  border-0 h3" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Allocated Paid Leaves</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Paid Leave Balance</label>
                                <div class="cal-icon">
                                    <input class="form-control" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Allocated Restricted Holidays</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Allocated Restricted Balance</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {

    if (document.getElementById("table-assets")) new gridjs.Grid({
        columns: [
        {
            id: 'asset_name',
            name: 'Name',
            formatter: function formatter(cell) {
            return gridjs.html('<b>' + cell + '</b>');
            }
        },
        {
            id: 'asset_type',
            name: 'Asset Type',
        },
        {
            id: 'serial_number',
            name: 'Serial Number',
        },
        {
            id: 'warranty',
            name: 'Warranty',
        },
        {
            id: 'vendor',
            name: 'Vendor',
        },                 
        {
            id: 'assignee',
            name: 'Assignee',
        },                 
        {
            id: 'assigned_date',
            name: 'Assigned Date',
        },   
        {
            id: 'invoice',
            name: 'Invoice',
            formatter: function formatter(cell) {
                var URL = "{{ url('/assets/')}}"+"/"+cell;
                return gridjs.html('<a href='+URL+' target="_blank"><span class="text-link" style=" color: blue;"><i class="icon icon-lg  ri-download-2-line text-primary fw-bold"></i></span></a>');
            }            
        },                  
        {
            id:'id',
            name: 'Actions',
            formatter: function formatter(cell) {
                var url_edit = "{{ url('/assets/')}}"+"/"+cell;
                var url_delete = "{{ url('/assets/')}}"+"/"+cell;

                var html_edit = '<a href='+url_edit+' target="_blank"><span class="text-link" style=" color: blue;"><i class="icon icon-lg  ri-pencil-line text-primary fw-bold"></i></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                var html_delete = '<a href='+url_delete+' target="_blank"><span class="text-link" style=" color: blue;"><i class="icon icon-lg  ri-delete-bin-line text-primary fw-bold"></i></span></a>';

                return gridjs.html(html_edit + html_delete);
            }            
        }                        
        
        ],
        pagination: {
            limit: 5
        },
        sort: true,
        search: true,
        server: {
             url: '{{route('vmt-assetinventory-fetchall')}}',
            then: data => data.map(
                asset => [
                    asset.asset_name,
                    asset.asset_type,
                    asset.serial_number, 
                    asset.warranty, 
                    asset.vendor, 
                    asset.assignee, 
                    asset.assigned_date, 
                    asset.invoice,
                    asset.id

                  ]
                )
        } 
        //  ["01", "Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        //  ["02", "Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        //  ["03", "Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"], 
        //  ["04", "Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"], 
        //  ["05", "Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"], 
        //  ["06", "Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"], 
        //  ["07", "Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"], 
        //  ["08", "Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"], 
        //  ["09", "Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"], 
        //  ["10", "Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"]
        
}).render(document.getElementById("table-assets")); // card Table


    $('.edit-icon').click(function() {
        var modalid = $(this).attr('data-bs-target');
        $(modalid).modal('show');

        if (modalid == '#modal_edit_asset') {

            console.log(modalid);

        }

    });
});
</script>
@endsection