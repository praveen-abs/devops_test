@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/crm.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">

<style>
    .project-wrapper {
        position: relative;
        top: -20px;
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
        <div class="modal-dialog modal-dialog-scrollable  modal-lg">
            <div class="modal-content top-line">
                <div class="modal-header border-0 py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Add New Cient</h6>
                    <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="mb-2 floating-label">
                                <label for="" class="  float-label">Client ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control textbox " id="" placeholder="Client ID">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="mb-2 floating-label">
                                <label for="" class="  float-label">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control textbox" id="" placeholder=" Name">

                            </div>
                        </div>
                    </div>
                    <hr class="text-muted my-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="mb-2 floating-label">
                                <label for="" class="  float-label">Contact<span class="text-danger">*</span></label>
                                <input type="text" class="form-control textbox" id="lead-name" placeholder="Contact">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="mb-2 floating-label">
                                <label for="" class="  float-label">Email</label>
                                <input type="text" class="form-control textbox" id="position" placeholder="Email">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="mb-2 floating-label">
                                <label for="" class="  float-label">Company Name</label>
                                <input type="text" class="form-control textbox" id="lead-email" placeholder="Company Name">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">

                            <div class="mb-2 floating-label">

                                <label for="" class="  float-label">Customer type</label>
                                <input type="text" class="form-control textbox" id="" placeholder="Customer type">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="mb-2 floating-label">
                                <label for="" class=" float-label">Status</label>
                                <input type="text" class="form-control textbox" id="lead-email" placeholder="Status">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0 py-2">
                    <button type="button" class="btn btn-border-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>


    </div>



    <!-- <div class="table-responsive">
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

        <div class="no-data-img flex-column d-flex justify-content-center align-items-center" style="">
            <img src="{{ URL::asset('assets/images/no-data/nodata.png') }}" alt="" class="" style="height:100px;width:200px">
            <span class="f-15 fw-bold mt-2 text-muted">No Data</span>
        </div>

    </div> -->


    <div class="client-table-wrapper">
        <div class="" id="client-table"></div>
    </div>


    <!-- modal for import  -->
    <div class="modal fade" id="importClient" tabindex="-1" aria-labelledby="newLead" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-md">
            <div class="modal-content top-line ">
                <div class="modal-header border-0">
                    <h6 class="modal-title mb-0 " id="">Import Client</h6>
                    <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal" aria-label="Close">&times;</button>
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
                            <input type="file" name="upload_file" id="upload_file" accept=".xls,.xlsx" class="form-control w-50 me-2" required>

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
    @endsection
    @section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
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

            if (document.getElementById("client-table")) {
                const grid = new gridjs.Grid({
                    columns: [{
                            id: 'number',
                            name: 'Client Id',

                        },
                        {
                            id: 'name ',
                            name: ' Name',

                        },
                        {
                            id: 'job_title',
                            name: 'Contact',
                        },
                        {
                            id: 'reporting_to',
                            name: ' Email',
                        },
                        {
                            id: 'reporting_to',
                            name: ' Company Name',
                        },
                        {
                            id: 'reporting_to',
                            name: 'Customer Type',
                        },
                        {
                            id: '',
                            name: 'Status ',
                        }, {
                            id: '',
                            name: 'Action ',
                        },

                    ],
                    data: [
                        // {
                        //     name: 'John',
                        //     email: 'john@example.com',
                        //     phoneNumber: '(353) 01 222 3333'
                        // },
                        // {
                        //     name: 'Mark',
                        //     email: 'mark@gmail.com',
                        //     phoneNumber: '(01) 22 888 4444'
                        // },
                    ],

                    pagination: {
                        limit: 10
                    },
                    sort: true,
                    search: true,






                }).render(document.getElementById("client-table")); // card Table
            }
        });
    </script>
    @endsection