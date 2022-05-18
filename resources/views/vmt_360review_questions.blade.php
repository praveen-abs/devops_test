@extends('layouts.master')
@section('css')

    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">

@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') 360 REVIEW MODULE @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="card"> -->

                <!-- <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Questions</h4>
                </div> -->
                <!-- end card header -->


            <!-- </div> --><!-- end card -->
            <div class="card" id="orderList">
            <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Questions</h5>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-success add-btn" 
                            id="create-btn" >
                            <a href="vmt-360-forms"><i
                                class="ri-add-line align-bottom me-1"></i> Create
                            Question</a></button>
                        <!-- <button type="button" class="btn btn-info"><i
                                class="ri-file-download-line align-bottom me-1"></i> Import</button> -->
                        <!-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                class="ri-delete-bin-2-line"></i></button> -->
                    </div>
                </div>
            </div>
           
            <div class="card-body pt-0">
                <div>
                    <!-- <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active All py-3" data-bs-toggle="tab" id="All"
                                href="#home1" role="tab" aria-selected="true">
                                <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered"
                                href="#delivered" role="tab" aria-selected="false">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Delivered
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups"
                                href="#pickups" role="tab" aria-selected="false">
                                <i class="ri-truck-line me-1 align-bottom"></i> Pickups <span
                                    class="badge bg-danger align-middle ms-1">2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Returns" data-bs-toggle="tab" id="Returns"
                                href="#returns" role="tab" aria-selected="false">
                                <i class="ri-arrow-left-right-fill me-1 align-bottom"></i> Returns
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Cancelled" data-bs-toggle="tab" id="Cancelled"
                                href="#cancelled" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Cancelled
                            </a>
                        </li>
                    </ul> -->

                    <div class="table-responsive table-card mb-1 mt-3">
                        @if(count($questionList ) > 0)
                        <table class="table table-nowrap align-middle" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                   <!--  <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="checkAll" value="option">
                                        </div>
                                    </th> -->
                                    <th class="sort" data-sort="id">#</th>
                                    <th class="sort" data-sort="customer_name">Question</th>
                                    <th class="sort" data-sort="product_name">Option 1</th>
                                    <th class="sort" data-sort="date">Option 2</th>
                                    <th class="sort" data-sort="amount">Option 3</th>
                                    <th class="sort" data-sort="payment">Option 4</th>
                                    <th class="sort" data-sort="status">Option 5</th>
                                    <th class="sort" data-sort="status">Answer</th>

                                    <th class="sort" data-sort="status">Auhtor</th>
                                    <th class="sort" data-sort="city">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($questionList as $question)
                                <tr>
                                   <!--  <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="checkAll" value="option1">
                                        </div>
                                    </th> -->
                                    <td class="id"><a href="apps-ecommerce-order-details"
                                            class="fw-medium link-primary">{{$question->id}}</a></td>
                                    <td class="customer_name">{{$question->question}}</td>
                                    <td class="product_name">{{$question->option_1}}</td>
                                    <td class="date">{{$question->option_2}}</td>
                                    <td class="amount">{{$question->option_3}}</td>
                                    <td class="payment">{{$question->option_4}}</td>
                                    <td class="status">{{$question->option_5}}
                                    </td>
                                    <td class="status">{{$question->answer}}
                                    </td>
                                    <td class="status">{{$question->author_name}}
                                    </td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                           
                                            <li class="list-inline-item edit"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Edit">
                                                <a href="{{'vmt-360-forms/'.$question->id}}"
                                                    class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top"
                                                title="Remove">
                                                <a class="text-danger d-inline-block remove-item-btn"
                                                    data-bs-toggle="modal" href="#deleteOrder">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="noresult" >
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                    trigger="loop" colors="primary:#405189,secondary:#0ab39c"
                                    style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted">We've searched more than 150+ Orders We did
                                    not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
              

                <!-- Modal -->
                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                    trigger="loop" colors="primary:#405189,secondary:#f06548"
                                    style="width:90px;height:90px"></lord-icon>
                                <div class="mt-4 text-center">
                                    <h4>You are about to delete a order ?</h4>
                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove
                                        all of
                                        your information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button
                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                            data-bs-dismiss="modal"><i
                                                class="ri-close-line me-1 align-middle"></i>
                                            Close</button>
                                        <button class="btn btn-danger" id="delete-record">Yes,
                                            Delete It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
            </div>
        </div>
        </div><!-- end col -->
    </div><!-- end row -->

 @endsection
 @section('script')
<script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

        <!--ecommerce-customer init js -->
        <script src="{{ URL::asset('assets/js/pages/ecommerce-order.init.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
