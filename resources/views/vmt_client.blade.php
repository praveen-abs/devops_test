@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/crm.css') }}" rel="stylesheet">
@endsection

@section('content')
    @component('components.crm_breadcrumb')
        @slot('li_1')
        @endslot
    @endcomponent

    <div class="client-wrapper bg-white container-fluid p-2 mt8-mb15">
        <h6 class="">Client List</h6>
        <div class=" text-end mb-2">
            <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#newInventry">New
                Client</button>
            <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#importClient">
                Import Client
            </button>
        </div>


        <div class="modal fade" id="newInventry" tabindex="-1" aria-labelledby="newInventry" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Add Newc</h6>
                        <button type="button" class="btn modal-close outline-none  border-0" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Product ID<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control textbox " id=""
                                        placeholder="Product ID">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Product Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control textbox" id=""
                                        placeholder="Product Name">

                                </div>
                            </div>
                        </div>
                        <hr class="text-muted my-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Inward Quantity<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control textbox" id="lead-name"
                                        placeholder="Inward Quantity">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Outward Quantity</label>
                                    <input type="text" class="form-control textbox" id="position"
                                        placeholder="Outward Quantity">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label  float-label">Stock in Quantity</label>
                                    <input type="text" class="form-control textbox" id="lead-email"
                                        placeholder="Stock in Quantity">

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="mb-3 floating-label">

                                    <label for="" class="form-label  float-label">Rate</label>
                                    <input type="text" class="form-control textbox" id="" placeholder="Rate">

                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label float-label">Amount</label>
                                    <input type="text" class="form-control textbox" id="lead-email" placeholder="Amount">

                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="mb-3 floating-label">
                                    <label for="" class="form-label float-label">Reorder Level</label>
                                    <input type="text" class="form-control textbox" id="lead-email"
                                        placeholder="Reorder Level">

                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="">
                                    <label for="floatingSelect" class="form-label float-label">Recorder</label>
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="1" selected>Reorder</option>
                                        <option value="2">Out of stock</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-border-primary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
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

            {{-- <div class="no-data-img flex-column d-flex justify-content-center align-items-center"  style="">
                <img src="{{ URL::asset('assets/images/no-data/nodata.png') }}"
                    alt="" class="" style="height:100px;width:200px" >
                    <span class="f-15 fw-bold mt-2 text-muted">No Data</span>
            </div>
            <hr class="m-0"> --}}
        </div>



        <!-- modal for import  -->
        <div class="modal fade" id="importClient" tabindex="-1" aria-labelledby="newLead" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg modal-md">
                <div class="modal-content top-line border-0">
                    <div class="modal-header">
                        <h6 class="modal-title mb-0 " id="">Add New Client</h6>
                        <button type="button" class="btn modal-close outline-none  border-0" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="import-contents px-2">

                            <div class="text-end my-3">
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
                                            <th>#</th>
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

                                <div class="no-data-img flex-column d-flex justify-content-center align-items-center"
                                    style="">
                                    <img src="{{ URL::asset('assets/images/no-data/nodata.png') }}" alt=""
                                        class="" style="height:100px;width:200px">
                                    <span class="f-15 fw-bold mt-2 text-muted">No Data</span>
                                </div>

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
    @endsection
