<template>
    <Dialog header="Header" v-model:visible="useTimesheet.dialog_Mop" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '35vw', borderTop: '5px solid #002f56' }" :modal="true" :closable="true" :closeOnEscape="true">
        <template #header>
            <div>
                <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                    class="fw-bold  fs-5 modal-title ">
                    Attendance regularization</h5>
            </div>
        </template>
        <div class="row">
            <div class="mb-2 col-12">
                <div class="row">
                    <div class="col-6"><label class="text-ash-medium fs-15">Date</label></div>
                    <div class="col-6">
                        <span class="text-ash-medium fs-15" id="current_date">
                             {{ useTimesheet.mopDetails.date }}
                        </span>

                        <input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date"
                            id="attendance_date">
                    </div>
                </div>
            </div>
            <div class="mb-2 col-12">
                <div class="row">
                    <div class="col-6"><label class="text-ash-medium fs-15">Regularize Timing
                            as</label>
                    </div>
                    <div class="col-6">
                        6.30 PM
                        <!-- <input class="text-ash-medium form-control fs-15" name="regularize_time" id="regularize_time"> -->
                    </div>
                </div>
            </div>
            <div id="div_reason_editable">
                <div class="row">
                    <div class="col-6"><label class="text-ash-medium fs-15">Reason</label></div>
                    <div class="col-6">

                        <select name="reason" class="form-select btn-line-orange" id="reason_mop" v-model="useTimesheet.mopDetails.reason">
                            <option selected hidden disabled>
                                Choose Reason for MOP
                            </option>
                            <option value="Permission">Permission</option>
                            <option value="Forgot to Punch">Forgot to Punch</option>
                            <option value="Technical Error">Technical Error</option>
                            <option value="Technical Error">Official</option>
                            <option value="Technical Error">Personal</option>
                            <option value="Others">Others</option>
                        </select>

                    </div>
                </div>
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12">
                            <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control " v-model="useTimesheet.mopDetails.custom_reason"
                                placeholder="Reason here...." v-if="useTimesheet.mopDetails.reason == 'Others'" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div id="div_reason_noneditable" v-if="false">
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
                            <input class="text-ash-medium form-control fs-15" name="txt_apply_status"
                                id="txt_apply_status" value="EMPTY" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">

            <button type="button" class="btn btn-orange" @click="useTimesheet.applyMopRegularization(),useTimesheet.dialog_Mop = false">Apply</button>
        </div>


    </Dialog>
</template>

<script setup>
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore'

const useTimesheet = useAttendanceTimesheetMainStore()

</script>
