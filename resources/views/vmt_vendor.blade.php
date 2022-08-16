@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection



@section('content')

@component('components.crm_breadcrumb')
@slot('li_1') @endslot
@endcomponent

<div class="vendor-wrapper bg-white container-fluid p-2 mt-30">
    <h6 class="">Vendor List</h6>
    <div class=" text-end mb-2">
        <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#newInventry">Create
            Inventry</button>
        {{-- <button class="btn btn-peimary mx-2" data-bs-toggle="modal" data-bs-target="#importInventry">Import
            Inventry</button> --}}
    </div>


    <div class="modal fade" id="newInventry" tabindex="-1" aria-labelledby="newInventry" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add New Inventry</h6>
                    <button type="button" class="btn-close outline-none border-0 " data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                                {{-- <label for="floatingSelect" class="form-label float-label">Status</label> --}}
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option value="1" selected>Reorder</option>
                                    <option value="2">Out of stock</option>
                                </select>

                            </div>
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

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Inward Quantity</th>
                    <th>Outward Quantity</th>
                    <th>Quantity In Stock</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Reorder Level</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>AP-000001</td>
                    <td>Pentium Silver N5030 15.6"</td>
                    <td>100</td>
                    <td>50</td>
                    <td>50</td>
                    <td>1500</td>
                    <td>27500</td>
                    <td>25</td>
                    <td><span class="badge text-bg-info">Reorder</span></td>
                    <td class="action-td">
                        <p class="mb-0">
                            <button class="btn outline-none border-0 text-muted py-0 card-clickable" aria-expanded="false"
                                >
                                <i class="fa fa-ellipsis-v card-clickable" aria-hidden="true"></i>
                            </button>
                        </p>
                        {{-- <div id="action-div">
                            <div class="card card-clickable" *ngIf="showCard">
                                <div class="card-body d-flex flex-column align-items-start p-3" style="width: auto;">
                                    <i class="fa fa-eye py-2 text-muted" aria-hidden="true">
                                        <span class="px-3">View</span>
                                    </i>
                                    <i class="fa fa-pencil py-2 text-muted" aria-hidden="true">
                                        <span class="px-3">Edit</span>
                                    </i>
                                    <i class="fa fa-trash py-2 text-muted" aria-hidden="true">
                                        <span class="px-3">Delete</span>
                                    </i>
                                </div>
                            </div>
                        </div> --}}
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>AP-000002</td>
                    <td>Celeron Silver N5030 15.6"</td>
                    <td>100</td>
                    <td>50</td>
                    <td>50</td>
                    <td>1500</td>
                    <td>27500</td>
                    <td>25</td>
                    <td><span class="badge text-bg-success">In Stock</span></td>
                    <td>
                        <p class="mb-0">
                            <button class="btn outline-none border-0 text-muted py-0 card-clickable" aria-expanded="false"
                                >
                                <i class="fa fa-ellipsis-v card-clickable" aria-hidden="true"></i>
                            </button>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>AP-000003</td>
                    <td>Inspiron 15 3510 Intel Celeron</td>
                    <td>100</td>
                    <td>50</td>
                    <td>50</td>
                    <td>1500</td>
                    <td>27500</td>
                    <td>25</td>
                    <td><span class="badge text-bg-warning">Low Stock</span></td>
                    <td>
                        <p class="mb-0">
                            <button class="btn outline-none border-0 text-muted py-0 card-clickable" aria-expanded="false"
                                >
                                <i class="fa fa-ellipsis-v card-clickable" aria-hidden="true"></i>
                            </button>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection
@section('script')

@endsection
