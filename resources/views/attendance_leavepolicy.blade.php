@extends('layouts.master')
@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
@component('components.attendance_breadcrumb')
@slot('li_1')@endslot
@endcomponent

    <div class="card flex-fill project-wrapper">
        <div class="row px-3 pt-2">
            <div class="col-md-6">
                <h5 class="text-left fw-bold pt-2">Leave Settings</h5>
            </div>
            <div class="col-md-6 d-flex px-3 justify-content-end">
                <div class="pt-2 text-md-start text-center me-3">
                    <button type="button" class="btn btn-custom-outline-secondary">
                        Leave Policy Explanation
                    </button>
                </div>
                <div class="pt-2 text-md-start text-center">
                    <button type="button" class="btn btn-custom-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date me-1" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        FY 2022 - 23
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-chevron-down ms-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card profile-box flex-fill card-top-border w-100 p-3">
                <h6 class="text-left fw-bold mb-3">Leave History</h6>
                <div class="card profile-box flex-fill card-top-border w-100 p-3">
                    <div class="d-flex space-around-between">
                        <button class="filter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"></path>
                            </svg>
                        </button>
                        <button class="btn selection-btn">
                            Leave Type
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down ms-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                        </button>
                        <button class="btn selection-btn">
                            Status
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down ms-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="col-md-12">
                        <div id="leave-policy-table"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="leave-request-section">
        <div class="modal fade" id="requestmodal" tabindex="-1" aria-labelledby="requestmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="requestmodalLabel">Leave Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="border-top-blue">
                            <div class="row mb-2">
                                <div class="col-6 text-start">
                                    <p class="modal-sub-title">Leave Type</p>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn btn-sm leave-policy" href="#">Leave Policy Explanation</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 mb-lg-4 mb-3">
                                    <div class="border-left-blue text-center">
                                        <h5>Casual Leave</h5>
                                        <span><span class="number-count-span">9</span>days</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rerum velit possimus</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-lg-4 mb-3">
                                    <div class="border-left-blue text-center">
                                        <h5>Sick Leave</h5>
                                        <span><span class="number-count-span">3</span>days</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rerum velit possimus</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-lg-4 mb-3">
                                    <div class="border-left-blue text-center">
                                        <h5>Earned Leave</h5>
                                        <span><span class="number-count-span">1</span>days</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rerum velit possimus</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-lg-0 mb-3">
                                    <div class="border-left-blue text-center">
                                        <h5>Maternity Leave</h5>
                                        <span><span class="number-count-span">180</span>days</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rerum velit possimus</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-lg-0 mb-3">
                                    <div class="border-left-blue text-center">
                                        <h5>Casual Leave</h5>
                                        <span><span class="number-count-span">3</span>days</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rerum velit possimus</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-lg-0 mb-3">
                                    <div class="border-left-blue text-center">
                                        <h5>Casual Leave</h5>
                                        <span><span class="number-count-span">6</span>days</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis rerum velit possimus</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top-blue">
                            <div class="row">
                                <div class="col-xl-6">
                                    <p class="modal-sub-title">Set range</p>
                                    <div class="row mb-3">
                                        <div class="col-md-4 text-md-start mb-md-0 mb-3">
                                            <label>Start Date</label>
                                            <input type="date">
                                        </div>
                                        <div class="col-md-4 text-md-center mb-md-0 mb-3" style="display: flex;justify-content: center;align-items: center;">
                                            <span class="type-end-eight">Total days</span>
                                        </div>
                                        <div class="col-md-4 text-md-end">
                                            <label>End Date</label>
                                            <input type="date">
                                        </div>
                                    </div>
                                    <textarea class="w-100" rows="4"></textarea>
                                    <div class="py-2" style="border-bottom: 1px solid #cecece;"></div>
                                    <p class="modal-sub-title py-2">Notify to</p>
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-md-0 mb-3">
                                            <div class="profile-wrapper center">
                                                <div class="profile-body">
                                                    <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866" alt="" />
                                                    <div class="profile-details">
                                                        <p>Dillip Kumar</p>
                                                        <h5 class="description">Scottish DJ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-md-0 mb-3">
                                            <div class="profile-wrapper center">
                                                <div class="profile-body">
                                                    <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866" alt="" />
                                                    <div class="profile-details">
                                                        <p>Dillip Kumar</p>
                                                        <h5 class="description">Scottish DJ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-md-0 mb-3">
                                            <div class="profile-wrapper center">
                                                <div class="profile-body">
                                                    <img src="http://images.equipboard.com/uploads/user/image/524/big_calvin-harris.jpg?v=1466072866" alt="" />
                                                    <div class="profile-details">
                                                        <p>Dillip Kumar</p>
                                                        <h5 class="description">Scottish DJ</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text-md-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-orange">Request Leave</button>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="calendar">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

<script>
    $(document).ready(function() {
        if (document.getElementById("leave-policy-table")) {
            const grid = new gridjs.Grid({
                columns: [
                    {
                        id: 'leave_type',
                        name: 'Leave Type',
                    },
                    {
                        id: 'days_annual',
                        name: 'Annual(Days)',
                    },
                    {
                        id: 'days_monthly',
                        name: 'Month(Days)',
                    },
                    {
                        id: 'days_restricted',
                        name: 'Restricted Days',
                    },
                    {
                        id: 'reporting_to',
                        name: 'Department',
                    },
                ],
                data: [

                ],
                pagination: {
                    limit: 10
                },
                sort: true,
                search: true,
                server: {
                url: '{{route('vmt-fetch-leave-policy-details')}}',
                then: data => data.map(
                    leave_policy => [
                        leave_policy.leave_type,
                        leave_policy.days_annual,
                        leave_policy.days_monthly,
                        leave_policy.days_restricted,
                    ]
                )
            },
            }).render(document.getElementById("leave-policy-table"));
        }
    });
</script>
@endsection
