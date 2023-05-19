<template>
    <div class="Leave_dashboard mt-30">
        <div class="pt-1 pb-0 mb-3 tw-card left-line">
            <div class="flex justify-between">

                <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
                    <li class="nav-item text-muted" role="presentation">
                        <a class="pb-2 nav-link active" data-bs-toggle="tab" href="#leave_balance" aria-selected="true"
                            role="tab">
                            Leave Balance</a>
                    </li>
                    <li class="nav-item text-muted " role="presentation">
                        <a class="pb-2 mx-4 nav-link" data-bs-toggle="tab" href="#team_leaveBalance" aria-selected="false"
                            tabindex="-1" role="tab">
                            Team Leave Balance</a>
                    </li>

                    <li class="nav-item text-muted " role="presentation">
                        <a class="pb-2 nav-link" data-bs-toggle="tab" href="#org_leave" aria-selected="false" tabindex="-1"
                            role="tab">
                            Org Leave Balance</a>
                    </li>
                </ul>

                <div class="flex items-center">
                    <div class="mr-3 ">
                        <div class="input-group me-2">
                            <label class="input-group-text " for="inputGroupSelect01"><i
                                    class="fa fa-calendar text-primary " aria-hidden="true"></i></label>
                            <select class="form-select btn-line-primary" id="inputGroupSelect01">
                                <!-- {{ -- @foreach($available_time_frames as $key => $value)
                                    < option value = {{
                                        $key }}> {{ $value }} </option>
                                @endforeach --}}
                                <option>{{ $time_frame }}</option> -->
                            </select>
                        </div>

                    </div>
                    <div class="">
                        <a href="/attendance-leave-policydocument" id="" class=" btn btn-orange" role="button"
                            aria-expanded="false">
                            Leave
                            Policy Explanation
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">
                <EmployeeLeaveDetails />
            </div>
            <div class="tab-pane fade show " id="team_leaveBalance" role="tabpanel" aria-labelledby="pills-profile-tab">
                <TeamLeaveDetails /> 
            </div>
            <div class="tab-pane show " id="org_leave" role="tabpanel" aria-labelledby="pills-profile-tab">
                <OrgLeaveDetails />
            </div>

        </div>
    </div>
</template>

<script setup>
import EmployeeLeaveDetails from './leave_details/EmployeeLeaveDetails.vue';
import OrgLeaveDetails from './leave_details/OrgLeaveDetails.vue';
import TeamLeaveDetails from './leave_details/TeamLeaveDetails.vue';
import {useLeaveModuleStore} from './LeaveModuleService'
import { onMounted } from 'vue';


const  useLeaveStore = useLeaveModuleStore()


</script>

<style lang="scss">
.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1rem 1rem;
    border: 1px solid #dee2e6;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-width: 0 0 1px 0;
    font-weight: 600;
    color: #fff;
    background: #003056;
    transition: box-shadow 0.2s;
    font-size: 13px;

    .p-column-title {
        font-size: 13px;
    }

    .p-column-filter {
        width: 100%;
    }

    #pv_id_2 {
        height: 30px;
    }

    .p-fluid .p-dropdown .p-dropdown-label {
        margin-top: -10px;
    }

    .p-dropdown .p-dropdown-label.p-placeholder {
        margin-top: -12px;
    }

    .p-column-filter-menu-button {
        color: white;
        margin-left: 10px;
    }

    .p-column-filter-menu-button:hover {
        color: white;
        border-color: transparent;
        background: #023e70;
    }
}

.p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
    margin-bottom: 0.5rem;
    visibility: hidden;
    position: absolute;
}

.p-button .p-component .p-button-sm {
    background-color: #003056;
}

.p-datatable .p-datatable-tbody>tr {
    font-size: 13px;

    .employee_name {
        font-weight: bold;
        font-size: 13.5px;
    }
}

.employee_name {
    font-weight: bold;
    font-size: 13px;
}

.p-column-title {
    font-size: 13.5px;
}

.fontSize13px {
    font-size: 13px;
}

.pending {
    font-weight: 700;
    color: #ffa726;
}

.approved {
    font-weight: 700;
    color: #26ff2d;
}

.p-button.p-component.p-button-success.Button {
    padding: 8px;
}

.rejected {
    font-weight: 700;
    color: #ff2634;
}

.p-button.p-component.p-button-danger.Button {
    padding: 8px;
}

@media screen and (max-width: 960px) {
    button {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

.p-datatable .p-datatable-tbody>tr>td:nth-child(1) {
    width: 200px;
}

.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
    color: red;
}

.p-button.p-component.p-confirm-dialog-accept {
    background-color: #003056;
}

.p-button.p-component.p-confirm-dialog-reject.p-button-text {
    color: #003056;
}

.p-column-filter-overlay-menu .p-column-filter-buttonbar {
    padding: 1.25rem;
    position: absolute;
    visibility: hidden;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter-menu-button {
    color: white;
    border-color: transparent;
}

.p-column-filter-menu-button.p-column-filter-menu-button-open {
    background: none;
}

.p-column-filter-menu-button.p-column-filter-menu-button-active {
    background: none;
}

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
    width: 44%;
}

/* For Sort */

.p-datatable .p-sortable-column:not(.p-highlight):hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
    color: white;
}

.p-datatable .p-sortable-column.p-highlight {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column.p-highlight:hover {
    background: #003056;
    color: white;
}

.p-datatable .p-sortable-column:focus {
    box-shadow: none;
    outline: none;
    color: white;
}

.p-datatable .p-sortable-column .p-sortable-column-icon {
    color: white;
}

.pi-sort-amount-down::before {
    content: "\e9a0";
    color: white;
}

.pi-sort-amount-up-alt::before {
    content: "\e9a2";
    color: white;
}

.p-button-success span {
    color: #fff !important;
}

.p-datatable .p-datatable-thead>tr>th>.p-column-header-content>.p-column-title:nth-child(1) {
    margin-left: 30px;
}
</style>
