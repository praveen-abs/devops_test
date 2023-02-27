<template>
     
    <div class="" >
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
            <div class="modal-content top-line">
                <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                    <h6 class="modal-title mb-1 text-primary">
                        Leave Request</h6>
                    <button type="button" class="close outline-none bg-transparent border-0 h3" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- MODEL : Request leave -->
                    <div id="modal_request_leave" class="card top-line mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 col-sm-12 col-lg-8 col-xxl-8 col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-md-start mb-md-0 mb-3">
                                            <h6 class=" mb-1">Leave Type</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6  mb-md-0 mb-3">
                                            <div class="form-group">
                                                <label for="">Choose Leave Type <span class="text-danger">*</span>
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-6  mb-md-0 mb-3">
                                            <div class="form-group">

                                                <select name="" id="leave_type_id"
                                                    class="form-select outline-none">
                                                    <option value="" selected>Select Leave Type
                                                    </option>

                                                 
                                                       ?>
                                                        <option value="{{ $singleLeaveType->id }}"
                                                            data-leaveType="{{ $singleLeaveType->leave_type }}"
                                                            data-remainingLeaves="{{ $remainingLeaves }}">
                                                            <!-- {{ $singleLeaveType->leave_type }} -->
                                                            <!-- {{-- Dont show remaining leave if is_finite == 0 --}} -->
                                                        
                                                        </option>
                                                 

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4 text-md-start mb-md-0 mb-3">
                                            <label class="fw-bold">Start Date</label>
                                            <input type="datetime-local" id="start_date"
                                                class="form-control outline-none border-0 shadow-lite leave_date">
                                        </div>
                                        <div class="col-4 text-md-center mb-md-0 " id="div_totaldays">
                                            <span class="fw-bold  text-muted mb-2">Total Days</span>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex">
                                                    <input type="radio" class="me-1" name="leave"
                                                        id="for_half_day_leave" value="0.5">
                                                    <label class="shadow-lite px-2 py-1"
                                                        id="half_leave_days">Half-Day</label>
                                                </div>
                                                <select name="half_day_type" class=" mx-2 form-select form-control"
                                                    id="half_day_type" style="width:65px">
                                                    <option value="FN" selected>FN</option>
                                                    <option value="AN">AN</option>
                                                </select>
                                                <div class="d-flex">
                                                    <input type="radio" class="me-1" style=" " name="leave"
                                                        id="for_full_day_leave">
                                                    <span class="shadow-lite px-2 py-1" id="total_leave_days">-</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-md-center mb-md-0 " id="div_totalhours">
                                            <p class="fw-bold  text-muted mb-2">Total Hours</p>
                                            <span class="shadow-lite px-2 py-1" id="total_permission_hours">-</span>
                                        </div>
                                        <div class="col-4 text-md-end ">
                                            <label class="fw-bold">End Date</label>
                                            <input type="datetime-local" id="end_date"
                                                class="form-control outline-none border-0 shadow-lite leave_date">
                                        </div>
                                    </div>
                                    <textarea id="leave_reason" placeholder="Reason here..." class="w-100 outline-none border-0 shadow-lite form-control"
                                        rows="4" style=""></textarea>
                                    <div class="py-2" style="border-bottom: 1px solid #cecece;"></div>
                                    <h6 class="modal-sub-title py-2">Notify to</h6>
                                    <div class="row mb-3">
                                        <div>

                                            <select class="" name="notifications_users_id[]"
                                                id="notifications_users_id">
                                                <!-- @if (!empty($allEmployeesList))
                                                    @foreach ($allEmployeesList as $employeeData)
                                                        <option value="{{ $employeeData->id }}">
                                                            {{ $employeeData->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Select Employees</option>
                                                @endif -->
                                            </select>


                                        </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 col-lg-4 col-xxl-4 col-md-12  mt-md-3 mt-sm-3">

                                    <div class="calendar-wrapper card mb-4 border-0">
                                        <div class="card-body p-0">
                                            <div class="_wrapper">
                                                <div class="h-100  _container-calendar">
                                                    <div
                                                        class="_button-container-calendar d-flex align-items-center justify-content-between">
                                                        <button id="_previous" onclick="previous()" class="previous"><i
                                                                class="fa fa-chevron-left"></i></button>
                                                        <h6 id="_monthAndYear" class="_monthAndYear text-white"></h6>
                                                        <button id="_next" onclick="next()" class="next"><i
                                                                class="fa fa-chevron-right"></i></button>
                                                    </div>
                                                    <table class="_table-calendar" id="_calendar" data-lang="en">


                                                        <thead id="_thead-month"></thead>
                                                        <tbody id="_calendar-body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="leave_det_calendar">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="casual_leave">Casual Leave</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="sick_leave">Sick Leave</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="floater_leave">Floater Leave</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="maternity_leave">Maternity Leave</p>
                                            </div>
                                        </div> 

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>                        </div>
                                    <div class="text-center text-md-end">
                                        <button type="button" class="btn btn-border-primary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" id="btn_request_leave" class="btn btn-primary">Request
                                            Leave</button>
                                    </div>
            

</template>
