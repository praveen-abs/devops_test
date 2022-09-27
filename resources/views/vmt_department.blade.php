@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/crm.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">

<style>
    .department-wrapper {
        position: relative;
       

    }

    .department-wrapper .bulk-assign {
        position: absolute;
        top: 12px;
        right: 0px;
        z-index: 5;
    }
</style>


@endsection



@section('content')
<div class="main container-fluid mt-30">
    <div class="card headcont  ">
        <div class="card-body">
            <div class="d-flex  justify-content-between mb-3">
                <h6 class="text-muted">Department</h6>
                <div class="d-flex">
                    <div class="dropdown me-2 ">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Departments
                        </button>
                        <ul class="dropdown-menu " aria-labelledby="">
                            <li>
                                <div class="dropdown-item">
                                    <div class="search-content">

                                        <i class=" ri-search-line "></i>
                                        <input type="text" class="search-bar form-control py-1 rounded" placeholder="Search">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <p class="text-muted dropdown-item">Humen resources</p>
                            </li>
                            <li>
                                <p class="text-muted dropdown-item">Content creative</p>
                            </li>
                            <li>
                                <p class="text-muted dropdown-item">Design/Art</p>
                            </li>

                        </ul>
                    </div>

                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add_department">Add Department</button>
                </div>
            </div>


            <div class="card top-line mb-0">
                <div class="card-body">
                    <div class="d-flex  justify-content-between">
                        <h6 class="text-muted">HR Resource <small class="text-muted">(Department)</small> </h6>
                        <div class="d-flex">
                            <button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#edit_department"><i class="fa fa-pencil me-1"></i>Edit</button>
                            <button class="btn btn-orange"><i class="fa fa-trash me-1"></i>Delete</button>
                        </div>
                    </div>

                    <div class="fill salary-header nav-tab-header">
                        <div>
                            <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                                <li class="nav-item active ember-view me-4" role="presentation">
                                    <a class="nav-link active ember-view p-0" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#department_employee" role="tab" aria-controls="pills-home" aria-selected="true">
                                        Employees</a>
                                </li>
                                <li class="nav-item  ember-view mx-4 " role="presentation">
                                    <a class="nav-link  ember-view p-0" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#department_settings" role="tab" aria-controls="pills-home" aria-selected="true">
                                        Settings</a>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="tab-content mt-3" id="pills-tabContent">

                        <div class="tab-pane  fade show active" id="department_employee" role="tabpanel" aria-labelledby="pills-home-tab">

                            <div id="ember83" class="ember-view department-wrapper">
                                <div class="bulkhead  bulk-assign   d-flex justify-content-between">
                                    <button class="btn btn-orange">Bulk Assign Employees</button>
                                </div>
                                <!-- <div class="table-responsive">
                           
                                <table class=" table table-hover    ">
                                        <thead class="tabhead text-white">

                                            <th>Employee Number</th>
                                            <th>Employee Name</th>
                                            <th>Job Title</th>
                                            <th>Reporting to</th>

                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </div> -->
                                <div class="table-responsive">
                                    <div id="department-table"></div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3 " id="department_settings" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="text-right">
                                <button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-pencil me-1"></i>Edit</button>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" value="" id="post_ckb">
                                <label class="form-check-label text-muted" for="post_ckb">
                                    Employees can post in this department
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="announcements_ckb">
                                <label class="form-check-label text-muted" for="announcements_ckb">
                                    Employees can post announcements in this department
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="post_polls_ckb">
                                <label class="form-check-label text-muted" for="post_polls_ckb">
                                    Employees can post polls in this department
                                </label>
                            </div>

                            <div class="bottom m-2 d-flex justify-content-end">
                                <button class="btn btn-sm btn-secondary me-2">Cancel</button>
                                <button class="btn btn-sm btn-secondary ">Save</button>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="add_department" tabindex="-1" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-md">
                            <div class="modal-content top-line">
                                <div class="modal-header border-0 py-2">
                                    <h6 class="modal-title" id="">Add Department</h6>
                                    <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="mb-3 floating-label">
                                                <label for="" class="form-label  float-label">Name</label>
                                                <input type="text" class="form-control textbox " id="" name="name" placeholder="Name">

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="mb-3 floating-label">
                                                <label for="" class="form-label  float-label">Department email</label>
                                                <input type="email" class="form-control textbox" name="email" id="" placeholder="Department email">

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="mb-3 floating-label">
                                                <label for="" class="form-label  float-label">Description<span class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="4" name="description"></textarea>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-orange me-2" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-orange">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit_department" tabindex="-1" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-md">
                            <div class="modal-content top-line">
                                <div class="modal-header border-0 py-2">
                                    <h6 class="modal-title" id="">Edit Department</h6>
                                    <button type="button" class="modal-close outline-none  border-0" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="mb-3 floating-label">
                                                <label for="" class="form-label  float-label">Human resource</label>
                                                <input type="text" class="form-control textbox " id="" name="name" placeholder="Human resource">

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="mb-3 floating-label">
                                                <label for="" class="form-label  float-label">Department email</label>
                                                <input type="email" class="form-control textbox" name="email" id="" placeholder="Department email">

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="mb-3 floating-label">
                                                <label for="" class="form-label  float-label">Description</label>
                                                <textarea class="form-control" rows="4" name="description"></textarea>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-orange me-2" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-orange">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        if (document.getElementById("department-table")) {
            const grid = new gridjs.Grid({
                columns: [{
                        id: 'number',
                        name: 'Employee Number',

                    },
                    {
                        id: 'name ',
                        name: 'Employee Name',

                    },
                    {
                        id: 'job_title',
                        name: ' Job Title',
                    },
                    {
                        id: 'reporting_to',
                        name: ' Reporting to',
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




            }).render(document.getElementById("department-table"));


        }



    });
</script>
@endsection