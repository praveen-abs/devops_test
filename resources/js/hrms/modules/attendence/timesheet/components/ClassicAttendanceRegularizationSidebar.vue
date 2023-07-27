<template>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Date</label></div>
                <div class="col-6">
                    <span class="text-ash-medium fs-15" id="current_date">{{ source.date }}</span>
                    <input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date"
                        id="attendance_date">
                </div>
            </div>
        </div>
        <div class="col-12" v-if="type == 'LC' || type == 'MIP'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing
                        as</label>
                </div>
                <div class="col-6">
                    9.30AM
                </div>
            </div>
        </div>
        <div class=" col-12" v-if="type == 'EG' || type == 'MOP'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing
                        as</label>
                </div>
                <div class="col-6">
                    6.30PM
                </div>
            </div>
        </div>
        <div class="col-12" v-if="type == 'LC'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                <div class="col-6" v-if="source.lc_status == 'None'">
                    <select name="reason" class="form-select btn-line-orange" id="reason_lc"
                        v-model="useTimesheet.lcDetails.reason">
                        <option selected hidden disabled>
                            Choose Reason
                        </option>
                        <option value="Permission">Permission</option>
                        <option value="Technical Error">Technical Error</option>
                        <option value="Technical Error">Official</option>
                        <option value="Technical Error">Personal</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-6" v-else>
                    <p class="max-w-min p-1" :class="findStatus(source.lc_status)"> {{ source.lc_status }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 " v-if="type == 'LC'">
            <div class="row" v-if="useTimesheet.lcDetails.reason == 'Others'">
                <div class="col-12">
                    <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                        placeholder="Reason here...." v-model="useTimesheet.lcDetails.custom_reason"></textarea>
                </div>
            </div>
        </div>

        <div v-if="type == 'LC'" class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">
            <button v-if="source.lc_status == 'None'" type="button" class="btn btn-orange"
                @click="useTimesheet.applyLcRegularization()">Apply</button>
        </div>
        <div class="col-12" v-if="type == 'MIP'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                <div class="col-6" v-if="source.mip_status == 'None'">
                    <select name="reason" class="form-select btn-line-orange" id="reason_lc"
                        v-model="useTimesheet.mipDetails.reason">
                        <option selected hidden disabled>
                            Choose Reason
                        </option>
                        <option value="Permission">Permission</option>
                        <option value="Technical Error">Technical Error</option>
                        <option value="Technical Error">Official</option>
                        <option value="Technical Error">Personal</option>
                        <option value="Others">Others</option>
                    </select>

                </div>
                <div class="col-6" v-else>
                    <p class="max-w-min p-1" :class="findStatus(source.mip_status)"> {{ source.mip_status }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 " v-if="type == 'MIP'" >
            <div class="row" v-if="useTimesheet.mipDetails.reason == 'Others'">
                <div class="col-12">
                    <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                        v-model="useTimesheet.mipDetails.custom_reason" placeholder="Reason here...."></textarea>
                </div>
            </div>
        </div>

        <div v-if="source.mip_status == 'None'" class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">
            <button type="button" class="btn btn-orange" @click="useTimesheet.applyMipRegularization()">Apply</button>
        </div>
        <div class="col-12" v-if="type == 'EG'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                <div class="col-6" v-if="source.eg_status == 'None'">
                    <select name="reason" class="form-select btn-line-orange" id="reason_lc"
                        v-model="useTimesheet.egDetails.reason">
                        <option selected hidden disabled>
                            Choose Reason
                        </option>
                        <option value="Permission">Permission</option>
                        <option value="Technical Error">Technical Error</option>
                        <option value="Technical Error">Official</option>
                        <option value="Technical Error">Personal</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-6" v-else>
                    <p class="max-w-min p-1" :class="findStatus(source.eg_status)"> {{ source.eg_status }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 " v-if="type == 'EG'">
            <div class="row" v-if="useTimesheet.egDetails.reason == 'Others'">
                <div class="col-12">
                    <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                        placeholder="Reason here...." v-model="useTimesheet.egDetails.custom_reason"></textarea>
                </div>
            </div>
        </div>
        <div v-if="type == 'EG'" class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">
            <button v-if="source.eg_status == 'None'" type="button" class="btn btn-orange"
                @click="useTimesheet.applyEgRegularization()">Apply</button>
        </div>
        <div class="col-12" v-if="type == 'MOP'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                <div class="col-6" v-if="source.mop_status == 'None'">
                    <select name="reason" class="form-select btn-line-orange" id="reason_lc"
                        v-model="useTimesheet.mopDetails.reason">
                        <option selected hidden disabled>
                            Choose Reason
                        </option>
                        <option value="Permission">Permission</option>
                        <option value="Technical Error">Technical Error</option>
                        <option value="Technical Error">Official</option>
                        <option value="Technical Error">Personal</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-6" v-else>
                    <p class="max-w-min p-1" :class="findStatus(source.mop_status)"> {{ source.mop_status }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 " v-if="useTimesheet.mopDetails.reason == 'None'">
            <div class="row">
                <div class="col-12">
                    <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                        placeholder="Reason here...." v-model="useTimesheet.mopDetails.reason"></textarea>
                </div>
            </div>
        </div>
        <div v-if="type == 'MOP'" class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">
            <button v-if="source.mop_status == 'None'" type="button" class="btn btn-orange"
                @click="useTimesheet.applyMopRegularization()">Apply</button>
        </div>
    </div>
</template>

<script setup>
import { useAttendanceTimesheetMainStore } from '../stores/attendanceTimesheetMainStore';



const useTimesheet = useAttendanceTimesheetMainStore()

const props = defineProps({
    source: {
        type: Object,
        required: true
    },
    type: {
        type: String,
        required: true
    }
})


const findStatus = (data) => {

    if (data.includes('Approved')) {
        return ' bg-green-50 text-green-600  fs-6 rounded-lg'
    } else
        if (data.includes('Rejected')) {
            return ' bg-red-50 text-red-600  fs-6 rounded-lg'
        } else
            if (data.includes('Pending')) {
                return 'border-yellow-500 bg-yellow-50 text-yellow-600  fs-6 rounded-lg'
            } else
                if (data.includes('Revoked')) {
                    return ' bg-gray-50 text-gray-600  fs-6 rounded-lg'

                }
}
</script>
