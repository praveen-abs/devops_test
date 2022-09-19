@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/crm.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">

    <style>
        .project-wrapper{
    position: relative;
    top:-20px;
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
        /* border: 1px  solid rgba(0, 0, 0, 0.2); */
        /* box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1); */
        transition: all 0.1s ease-in-out;
        margin-bottom: 0px !important;
    }

    .switch-field label:hover {
        cursor: pointer;
    }

    .switch-field input:checked+label {

        box-shadow: none;
        color: #002f56;
        background-color: #B8C4FF !important;
        font-weight: 600;
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
    @component('components.crm_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent

    <div class="client-wrapper bg-white container-fluid p-2 ">
        <h6 class="mb-0">Client List</h6>
        <div class=" text-end">
            <button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#newClient">New
                Client</button>
            <button class="btn btn-orange " data-bs-toggle="modal" data-bs-target="#importClient">
                Import Client
            </button>
        </div>


        <div class="modal fade" id="newClient" tabindex="-1" aria-labelledby="newInventry" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                <div class="modal-content top-line" >
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Add New Cient</h6>
                        <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Client ID<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control textbox " id=""
                                        placeholder="Client ID">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control textbox" id=""
                                        placeholder=" Name">

                                </div>
                            </div>
                        </div>
                        <hr class="text-muted my-2">
                        <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Contact<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control textbox" id="lead-name"
                                        placeholder="Contact">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Email</label>
                                    <input type="text" class="form-control textbox" id="position"
                                        placeholder="Email">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Company Name</label>
                                    <input type="text" class="form-control textbox" id="lead-email"
                                        placeholder="Company Name">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">

                                <div class="mb-3 floating-label">

                                    <label for="" class="form-label  float-label">Customer type</label>
                                    <input type="text" class="form-control textbox" id="" placeholder="Customer type">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label float-label">Status</label>
                                    <input type="text" class="form-control textbox" id="lead-email" placeholder="Status">

                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-border-orange" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-orange">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive my-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                         
                                            <th>Client ID</th>
                                            <th>Name</th>                                           
                                            <th>Email</th>
                                            <th>Company Name</th>
                                            <th>Contact</th>
                                            <th>Customer Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           
                                            <td  class="">

</td>
<td  class="">

</td>
<td  class="">

</td>  <td  class="">

</td>
<td  class="">

</td>
<td  class="">

</td>
<td  class="">

</td>
<td  class="">

</td>


                                        </tr>

                                    </tbody>
                                </table>

                                {{-- <div class="no-data-img flex-column d-flex justify-content-center align-items-center"
                                    style="">
                                    <img src="{{ URL::asset('assets/images/no-data/nodata.png') }}" alt=""
                                        class="" style="height:100px;width:200px">
                                    <span class="f-15 fw-bold mt-2 text-muted">No Data</span>
                                </div> --}}

                            </div>
        <div class="table-responsive">
            <!-- <table class="table table-hover">
                <div id="table-clientlist" class="  "></div>

            </table> -->

            <!-- <div class="no-data-img flex-column d-flex justify-content-center align-items-center"  style="">
                <img src="{{ URL::asset('assets/images/no-data/nodata.png') }}"
                    alt="" class="" style="height:100px;width:200px" >
                    <span class="f-15 fw-bold mt-2 text-muted">No Data</span>
            </div>
            <hr class="m-0"> -->
        </div>



        <!-- modal for import  -->
        <div class="modal fade" id="importClient" tabindex="-1" aria-labelledby="newLead" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg modal-md">
                <div class="modal-content top-line ">
                    <div class="modal-header border-0">
                        <h6 class="modal-title mb-0 " id="">Import Client</h6>
                        <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="import-contents px-2">

                            <div class="text-end ">
                                <button class="btn btn-orange "><i class="fa fa-download mx-2"></i>Download
                                    Sample</button>
                            </div>
                            <!-- <hr class=""> -->

                            <div class="instructions ">
                                <ul class="my-2 list-style-numbered list-style-circle">
                                    <li class="list-item"> Your CSV data should be in the format below. The first line of
                                        your CSV file
                                        should
                                        be
                                        the column headers as in the table example. Also make sure that your file is UTF-8
                                        to avoid
                                        unnecessary
                                        encoding problems.</li>
                                    <li class="list-item">If the column you are trying to import is date make sure that is
                                        formatted in
                                        format
                                        Y-m-d (2022-08-13).</li>
                                    <li class="list-item"> Based on your leads <span class="text-danger"> unique
                                            validation</span>
                                        configured
                                        <a href="" class="text-info">options</a> , the lead won't be
                                        imported
                                        if:
                                    </li>

                                </ul>
                            </div>
                            <p class="text-end text-muted">- Lead email already exists</p>
                            <p class="text-start mb-1 text-muted">If you still want to yimport all leads, uncheck all
                                unique
                                validation field</p>

                            <!-- import lead table -->

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                         
                                            <th>Client ID</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Company Name</th>
                                            <th>Contact</th>
                                            <th>Customer Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="10" class="">

                                            </td>

                                        </tr>

                                    </tbody>
                                </table>

                                {{-- <div class="no-data-img flex-column d-flex justify-content-center align-items-center"
                                    style="">
                                    <img src="{{ URL::asset('assets/images/no-data/nodata.png') }}" alt=""
                                        class="" style="height:100px;width:200px">
                                    <span class="f-15 fw-bold mt-2 text-muted">No Data</span>
                                </div> --}}

                            </div>


                            {{-- <div class="upload-wrapper mt-2">
                                <p class="mb-2">Choose CSV File<span class="text-danger">*</span></p>
                                <div
                                    class="upload-content d-flex justify-content-center align-items-center flex-column py-2">

                                    <i class="bi bi-upload"></i>
                                    <P class="mb-0">Drag & drop any file here</P>
                                    <p class="mb-0 ">Or</p>
                                    <p class="mb-0">No file chosen <button
                                            class="btn outline-none border-0 bg-transparent p-0 browse-btn ">browse
                                            file</button>
                                        from device</p>

                                </div>
                            </div> --}}

                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div class="d-flex align-items-center ">
                                    <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx"
                                        class="form-control w-50 me-2" required>

                                    <button class="btn btn-orange "><i class="fa fa-upload mx-2"></i>Upload</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-orange" data-bs-dismiss="modal">
                                        Import
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-border-primary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    @endsection
    @section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        (function() {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        if (document.getElementById("table-clientlist")) {
            const grid = new gridjs.Grid({
                columns: [{
                        id: 'id',
                        name: 'ID',
                        hidden:true,
                        
                    },
                    {
                        id: 'client_code',
                        name: 'Client Id',
                        formatter: function formatter(cell) {
                            return gridjs.html( cell );
                        }
                    },
                    {
                        id: 'client_name',
                        name: 'Client Name',
                    },
                    {
                        id: 'client_name',
                        name: 'Contact',
                    },
                    {
                        id: 'client_name',
                        name: 'Email',
                    },
                    {
                        id: 'client_name',
                        name: 'Company name',
                    },
                    {
                        id: 'client_name',
                        name: 'Company type',
                    },
                    {
                        id: 'status',
                        name: 'Status',
                        // hidden:true,
                    },
                    // {
                    //     id: 'assigned_date',
                    //     name: 'Assigned Date',
                    // },
                    // {
                    //     id: 'invoice',
                    //     name: 'Invoice',
                    //     formatter: function formatter(cell) {
                    //         var URL = "{{ url('/assets/')}}" + "/" + cell;
                    //         return gridjs.html('<a href=' + URL +
                    //             ' target="_blank"><span class="text-link" style=" color: blue;"><i class="icon icon-lg text-info  ri-download-2-line text-primary fw-bold"></i></span></a>'
                    //         );
                    //     }
                    // },
                    // {
                    //     id: 'id',
                    //     name: 'Edit',
                    //     formatter: function formatter(cell) {

                    //         var htmlcontent =
                    //             '<a  class="trigger_asset_edit" ><span class="text-link" style=" color: blue;"><i class="icon icon-lg  ri-pencil-line text-dark fw-bold"></i></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    //         var html_edit="<button style='font-size:24px' onclick='hello()'>Edit</button>";
                    //         var html_delete = '<a href='+url_delete+' target="_blank"><span class="text-link" style=" color: blue;"><i class="icon icon-lg  ri-delete-bin-line text-primary fw-bold"></i></span></a>';

                    //         return gridjs.html(htmlcontent);
                    //     }
                    // },
                    // {
                    //     id: 'delete',
                    //     name: 'Delete',
                    //     formatter: function formatter(cell) {


                    //         var htmlcontent =
                    //             '<a  class="trigger_asset_delete" ><span class="text-link" style=" color: blue;"><i class="icon icon-lg text-danger ri-delete-bin-line text-primary fw-bold"></i></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    //         var html_edit="<button style='font-size:24px' onclick='hello()'>Edit</button>";
                    //         var html_delete = '<a href='+url_delete+' target="_blank"><span class="text-link" style=" color: blue;"><i class="icon icon-lg  ri-delete-bin-line text-primary fw-bold"></i></span></a>';

                    //         return gridjs.html(htmlcontent);
                    //     }
                    // }

                ],
                pagination: {
                    limit: 10
                },
                sort: true,
                search: true,
                pagination: true,
                server: {
                    url: '{{route('vmt-clients-fetchall')}}',
                    then: data => data.map(
                        client => [
                            client.id,
                            client.client_code,
                            client.client_name,
                            client.address,
                            client.contract_start_date,
                            client.contract_end_date,
                            client.cin_number,
                            client.company_tan,
                            client.company_pan,
                            client.gst_no,
                            client.epf_reg_number,
                            client.esic_reg_number,
                            client.prof_tax_reg_number,
                            client.lwf_reg_number,
                            client.authorised_person_name,
                            client.authorised_person_designation,
                            client.authorised_person_contact_number,
                            client.authorised_person_contact_email,
                            client.billing_address,
                            client.shipping_address,
                            client.product,
                            client.subscription_type,

                        ]
                    )
                },
                //  ["01", "Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
                //  ["02", "Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
                //  ["03", "Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
                //  ["04", "Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
                //  ["05", "Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],

            }).render(document.getElementById("table-clientlist")); // card Table
        }
    });


    </script>
    @endsection
