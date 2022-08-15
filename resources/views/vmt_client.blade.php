@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="client-wrapper bg-white container-fluid p-2 mt-30">
        <div class="table-responsive">
            <table class="table table-hover">
                <caption class="caption-top">Client List</caption>
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
                            <button class="btn outline-none border-0 text-muted py-0 card-clickable" aria-expanded="false">
                                <i class="fa fa-ellipsis-v card-clickable" aria-hidden="true"></i>
                            </button>

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
                        <td><button class="btn outline-none border-0 text-muted py-0 card-clickable" aria-expanded="false">
                            <i class="fa fa-ellipsis-v card-clickable" aria-hidden="true"></i>
                        </button></td>
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
                        <td><button class="btn outline-none border-0 text-muted py-0 card-clickable" aria-expanded="false">
                            <i class="fa fa-ellipsis-v card-clickable" aria-hidden="true"></i>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
@section('script')
@endsection
