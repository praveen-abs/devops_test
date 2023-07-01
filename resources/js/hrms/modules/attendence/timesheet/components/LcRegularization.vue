<template>
    <Dialog header="Header"  v-model:visible="useTimesheet.dialog_Lc"  :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '35vw', borderTop: '5px solid #002f56' }" :modal="true" :closable="true" :closeOnEscape="true">
        <template #header>
            <div>
                <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                    class="font-semibold  fs-5 modal-title ">
                    Attendance regularization</h5>
            </div>
        </template>
        <div class="row">
            <div class="mb-2 col-12">
                <div class="row">
                    <div class="col-6"><label class="text-ash-medium fs-15">Date</label></div>
                    <div class="col-6">
                        <span class="text-ash-medium fs-15" id="current_date">{{useTimesheet.lcDetails.date}}</span>

                        <input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date"
                            id="attendance_date">
                    </div>
                </div>
            </div>
            <div class="mb-2 col-12" id="div_actual_user_time">
                <div class="row">
                    <div class="col-6">
                        <label class="text-ash-medium fs-15">
                            Actual Timing <span id="timing_label_suffix">(Late Arrival)</span>
                        </label>
                    </div>
                    <div class="col-6">
                        <span class="text-ash-medium fs-15" id="actual_user_time">{{useTimesheet.lcDetails.checkin_time}}</span>
                    </div>
                </div>
            </div>
            <div class="mb-2 col-12">
                <div class="row">
                    <div class="col-6"><label class="text-ash-medium fs-15">Regularize Timing
                            as</label>
                    </div>
                    <div class="col-6">
                        9.30AM
                        <!-- {{useTimesheet.lcDetials.checkin_time}} -->
                        <!-- <input class="text-ash-medium form-control fs-15" name="regularize_time" id="regularize_time"> -->
                    </div>
                </div>
            </div>
            <div id="div_reason_editable">
                <div class="mb-2 col-12">
                    <div class="row">
                        <div class="col-6"><label class="text-ash-medium fs-15">Reason</label></div>
                        <div class="col-6">
                            <select name="reason" class="form-select btn-line-orange" id="reason_lc"
                                onchange="showReasonBox(this)">
                                <option selected hidden disabled>
                                    Choose Reason for LC
                                </option>
                                <option value="Permission">Permission</option>
                                <option value="Technical Error">Technical Error</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12">
                            <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                                placeholder="Reason here...." style="display:none"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div_reason_noneditable">
                <div class="mb-2 col-12">
                    <div class="row">
                        <div class="col-6"><label class="text-ash-medium fs-15">Reason</label>
                        </div>
                        <div class="col-6">
                            <input class="text-ash-medium form-control fs-15" name="txt_reason_noneditable"
                                id="txt_reason_noneditable" value="EMPTY" readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-2 col-12" id="div_custom_reason">
                    <div class="row">
                        <div class="col-6"><label class="text-ash-medium fs-15">Custom Reason</label>
                        </div>
                        <div class="col-6">
                            <input class="text-ash-medium form-control fs-15" name="txt_customreason_noneditable"
                                id="txt_customreason_noneditable" value="EMPTY" readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-2 col-12">
                    <div class="row">
                        <div class="col-6"><label class="text-ash-medium fs-15">Status</label>
                        </div>
                        <div class="col-6">
                            <input class="text-ash-medium form-control fs-15" name="txt_apply_status" id="txt_apply_status"
                                value="EMPTY" readonly>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">

            <button type="button" class="btn btn-orange">Apply</button>
        </div>

    </Dialog>
</template>

<script setup>
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()
</script>
