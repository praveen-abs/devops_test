<template>
    <Toast />
    <div class="mb-0 card top-line ">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-end">
                    <button class="p-0 m-0 bg-transparent border-0 outline-none btn" data-bs-target="#show_idCard"
                        data-bs-toggle="modal">
                        <i class="fa fa-id-card text-success" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="text-center col-12">


                    <div class="mx-auto rounded-circle img-xl userActive-status profile-img">
                        <!-- <img class="rounded-circle img-xl userActive-status profile-img" src="./photo1675430684.jpeg" alt=""
                            srcset="" style="border:6px solid #c2c2c2c2"> -->
                        <img v-if="profile" class="rounded-circle img-xl userActive-status profile-img"
                            :src="`data:image/png;base64,${profile}`" srcset="" style="border:6px solid #c2c2c2c2" />

                        <label class="cursor-pointer edit-icon " style="position: relative; top: -30px;"
                            data-bs-toggle="modal" data-bs-target="#edit_profileImg" id="" for="upload">
                            <i class="fa fa-camera"></i></label>
                        <input type="file" name="" id="upload" hidden @change="updateProfilePhoto($event)">

                    </div>

                    <div class="mt-4">
                        <div class="progress-wrapper border-bottom-liteAsh ">
                            <span class="mx-auto opacity-0 border-1"></span>
                            <div class="mb-1 text-center px-auto">
                                <h6 class="text-center ">
                                    {{ _instance_profilePagesStore.employeeDetails.name }}
                                </h6>
                            </div>
                            <div class="mx-auto mb-1 d-flex justify-content-between">
                                <span class="text-muted f-12">Profile Completeness</span>
                                <span class="text-muted text-end f-12 fw-bold" id="prograssBar_percentage">

                                </span>
                            </div>
                            <!-- <div class="mb-2 progress progress-bar-content">
                                    <div class="progress-bar " role="progressbar" id="profile_progressBar"
                                        aria-valuenow="{{ 100 }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>


                                </div> -->
                            <ProgressBar :value="_instance_profilePagesStore.employeeDetails.profile_completeness">
                            </ProgressBar>
                            <!-- <ProgressBar  :value="60"></ProgressBar> -->
                            <p class="mb-2 text-muted f-10 text-start fw-bold">Your profile is completed</p>
                        </div>
                        <!-- <ProgressBar class="bg-red-600" :value="10"></ProgressBar> -->

                        <div class="mb-4 text-center profile-mid-right-content ">
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Employee Status</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.active == 1" class=" f-15 fw-bold">
                                    Active
                                </p>
                                <p v-else class="text-danger f-15 fw-bold">
                                    Not Active
                                </p>

                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Employee Code</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.user_code" class=" f-15 fw-bold">
                                    {{ _instance_profilePagesStore.employeeDetails.user_code }}
                                </p>
                                <p v-else class=" f-15 fw-bold">
                                    -
                                </p>

                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Designation</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details.designation"
                                    class="f-15 fw-bold">
                                    {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation
                                    }}
                                </p>
                                <p v-else class="f-15 fw-bold">
                                    -
                                </p>

                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Location</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details.work_location"
                                    class=" f-15 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.work_location
                                    }}
                                </p>
                                <p v-else class=" f-15 fw-bold">
                                    -
                                </p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Department <a href="#" class="edit-icon"
                                        @click="dailogDepartment = true"><i class="ri-pencil-fill"></i></a> </p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details.department_id"
                                    class=" f-15 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name
                                    }}
                                </p>
                                <p v-else class=" f-15 fw-bold">
                                    -
                                </p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Reporting To
                                     <a href="#" class="edit-icon"
                                        @click="editReportingManager(_instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name)"><i  class="ri-pencil-fill"></i>
                                        </a></p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code"
                                    class=" f-15 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name
                                    }} -
                                    {{
                                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code
                                    }}
                                </p>
                                <p v-else class=" f-15 fw-bold">
                                    -
                                </p>
                            </div>
                        </div>
                        <div class="text-center profile-bottom-right-content ">
                            <!-- {{-- <button class="btn btn-danger"><i class="fa fa-sign-out me-2"></i> Logout </button> --}} -->
                            <button class="btn btn-danger"><i class="fa fa-sign-out me-1"></i> Action </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <Dialog v-model:visible="dailogDepartment" modal header="Edit Department"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <!-- {{ employee_card.department  }} -->
        <Dropdown :options="departmentOption" optionLabel="name" v-model="employee_card.department"
            placeholder="Select Department" class="w-full form-selects" optionValue="id" />
        <template #footer>

            <div>
                <button type="button" class="submit_btn warning success" id="submit_button_family_details"
                    @click="editDepartment">Save</button>
            </div>

        </template>
    </Dialog>
    <Dialog v-model:visible="dailogReporting" modal header="Edit Reporting Manager"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <Dropdown optionLabel="name" :options="reportManagerOption" v-model="employee_card.reporting_manager"
            optionValue="id" placeholder="Select Reporting Manager" class="w-full form-selects" />
        <template #footer>
            <div>
                <button type="button" class="submit_btn warning success" id="submit_button_family_details"
                    @click="EditFamilyDetails">Save</button>
            </div>

        </template>
    </Dialog>



    <!-- <Dropdown :options="departmentOption" optionLabel="name" v-model="dep"
            placeholder="Select Department" class="w-full form-selects" optionValue="id" /> -->
</template>


<script setup>
import axios from 'axios';
import { onMounted, reactive, ref } from 'vue';
import { Service } from '../../Service/Service'
import { profilePagesStore } from '../stores/ProfilePagesStore'

const service = Service()

const profile = ref()


const employee_card = reactive({
    department: '',
    reporting_manager: ''
})

let _instance_profilePagesStore = profilePagesStore();

const getProfilePhoto = () => {

    axios.post('/profile-pages/getProfilePicture', { 'user_code': service.current_user_code }).then(res => {
        // console.log(res.data);
        profile.value = res.data.data

    }).finally(() => {
        console.log("profile Pic Fetched");
    })

}

const updateProfilePhoto = (e) => {
    // Check if file is selected
    if (e.target.files && e.target.files[0]) {
        // Get uploaded file
        (profile.value = e.target.files[0])
        // Get file size
        // Print to console
        console.log(profile.value);
    };

    let form = new FormData()
    form.append('user_code', service.current_user_code)
    form.append('file_object', profile.value)

    let url = '/profile-pages/updateProfilePicture'
    axios.post(url, form).then(res => {
        // console.log(res.data);
    }).finally(() => {
        console.log("Photo Sent");
        getProfilePhoto()
    })
}

const departmentOption = ref()

const reportManagerOption = ref()

const dailogDepartment = ref(false)

const dailogReporting = ref(false)

const editDepartment = (dep) => {
    console.log(dep);
    employee_card.department =
        axios.post('/profile-pages/updateDepartment', {
            'emp_id': service.current_user_code,
            'department_id': employee_card.department
        }).then(res => {
            console.log(res.data);
        })
}
const editReportingManager = (rm) => {
    console.log(rm);
    dailogReporting.value = true
    employee_card.reporting_manager = rm
    console.log( employee_card.reporting_manager +"hiihihhi");
}


const setvalue = () => {
    employee_card.department =  _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name
    employee_card.reporting_manager = _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name
    console.log(employee_card.department);
}

onMounted(() => {
    service.DepartmentDetails().then((res) => {
        departmentOption.value = res.data
        console.log( "testing" +_instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name);
    })
    service.ManagerDetails().then(res => {
        reportManagerOption.value = res.data

    })
    getProfilePhoto()
    setvalue()
})

</script>

<style>
.p-progressbar.p-component.p-progressbar-determinate {
    height: 13px;
}
</style>
