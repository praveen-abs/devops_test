<template>
    <Toast />
    <div class="mb-0 card top-line">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-end">
                    <button class="p-0 m-0 bg-transparent border-0 outline-none btn" @click="dialogIdCard = true">
                        <i class="pi pi-id-card text-success fs-4" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="text-center col-12">
                    <div class="mx-auto rounded-circle img-xl userActive-status profile-img "
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; border: 1px solid navy;">
                        <!-- <img class="rounded-circle img-xl userActive-status profile-img" src="./photo1675430684.jpeg" alt=""
                            srcset="" style="border:6px solid #c2c2c2c2"> -->
                        <img v-if="_instance_profilePagesStore.profile"
                            class="rounded-circle img-xl userActive-status profile-img"
                            :src="`data:image/png;base64,${_instance_profilePagesStore.profile}`" srcset="" alt="" />


                        <label class="cursor-pointer edit-icon" style="position: absolute; top: 76px ;right: 10px;"
                            data-bs-toggle="modal" data-bs-target="#edit_profileImg" id="" for="upload">
                            <i class="fa fa-camera"></i></label>
                        <input type="file" name="" id="upload" hidden @change="updateProfilePhoto($event)" />
                    </div>

                    <div class="mt-4">
                        <div class="progress-wrapper border-bottom-liteAsh">
                            <span class="mx-auto opacity-0 border-1"></span>
                            <div class="mb-1  px-auto d-flex align-items-center justify-content-center pl-5">
                                <h6 class="text-center fw-bold ">
                                    {{ _instance_profilePagesStore.employeeDetails.name }}
                                </h6>
                                <span class="personal-edit position-absolute" style="right: -9px;">
                                    <a href="#" class="edit-icon "><i class="ri-pencil-fill"
                                            @click="dialog_emp_name_visible = true"></i>
                                    </a>
                                </span>
                            </div>


                            <Dialog v-model:visible="dialog_emp_name_visible" modal header=" "
                                :style="{ width: '50vw', borderTop: '5px solid #002f56' }">
                                <template #header>
                                    <div>
                                        <h5 :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }"
                                            class="fw-bold fs-5">
                                            Edit Employee Name</h5>
                                    </div>
                                </template>
                                <div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="mb-2 font-semibold text-lg">Employee Name</label>
                                                    <!-- <InputMask @focusout="panCardExists" id="serial" mask="aaaaa9999a"
                                                        v-model="employee_info.emp_name" placeholder="AHFCS1234F"
                                                        style="text-transform: uppercase" class="form-controls pl-2" :class="[
                                                            v$.emp_name.$error ? 'p-invalid' : '',
                                                        ]" /> -->
                                                    <InputText type="text" v-model="employee_info.emp_name"
                                                        style="text-transform: uppercase" class="form-controls pl-2" :class="[
                                                            v$.emp_name.$error ? 'p-invalid' : '',
                                                        ]" />
                                                    <span v-if="v$.emp_name.$error" class="text-red-400 fs-6 font-semibold">
                                                        {{ v$.emp_name.required.$message.replace("Value", "Employee Name")
                                                        }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class=" form-group">
                                                    <label for="" class="mb-1 mb-1 font-semibold text-lg">Documents</label>
                                                    <Dropdown v-model="employee_info.emp_doc_name" :options="doc_name"
                                                        optionLabel="name" placeholder="Select a document "
                                                        class="form-controls pl-2 w-full h-12" :class="[
                                                            v$.emp_doc_name.$error ? 'p-invalid' : '',
                                                        ]" />
                                                    <span v-if="v$.emp_doc_name.$error"
                                                        class="text-red-400 fs-6 font-semibold">
                                                        {{ v$.emp_doc_name.required.$message.replace("Value", "Documents")
                                                        }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 d-flex flex-column ">
                                                <!-- flex-column -->
                                                <div class="d-flex justify-items-center  flex-column ">
                                                    <label for="" class="float-label mb-2 font-semibold text-lg">Upload
                                                        Documents</label>
                                                    <div class="d-flex  justify-items-center align-items-center">
                                                        <Toast />
                                                        <label
                                                            class="cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary "
                                                            style="width:100px ; " id="" for="uploadPassBook">
                                                            <i class="pi pi-arrow-circle-up fs-5 mr-2"></i>
                                                            <h1 class="text-light">Upload</h1>
                                                        </label>

                                                        <div v-if="employee_info.emp_upload_doc"
                                                            class="p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4">
                                                            {{ employee_info.emp_upload_doc.name }}</div>

                                                        <input type="file" name="" id="uploadPassBook" hidden
                                                            @change="UploadEmpDocsPhoto($event)" :class="[
                                                                v$.emp_upload_doc.$error ? 'p-invalid' : '',
                                                            ]" />
                                                    </div>
                                                    <span v-if="v$.emp_upload_doc.$error"
                                                        class="text-red-400 fs-6 font-semibold">
                                                        {{ v$.emp_upload_doc.required.$message.replace("Value", "document")
                                                        }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="text-right">
                                                <button id="btn_submit_bank_info" class="btn btn-orange submit-btn"
                                                    @click="submitForm">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </Dialog>




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

                            <p class="mb-2 text-muted f-10 text-start fw-bold">
                                Your profile is completed
                            </p>
                        </div>


                        <div class="mb-4 text-center profile-mid-right-content">
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Employee Status</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.active == 1" class="f-12 fw-bold">
                                    Active
                                </p>
                                <p v-else class="text-danger f-12 fw-bold">Not Active</p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Employee Code</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails.user_code" class="f-12 fw-bold">
                                    {{ _instance_profilePagesStore.employeeDetails.user_code }}
                                </p>
                                <p v-else class="f-12 fw-bold">-</p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Designation</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails
                                    .get_employee_office_details.designation
                                    " class="f-12 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails
                                            .get_employee_office_details.designation
                                    }}
                                </p>
                                <p v-else class="f-12 fw-bold">-</p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">Location</p>
                                <p v-if="_instance_profilePagesStore.employeeDetails
                                            .get_employee_office_details.work_location
                                        " class="f-12 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails
                                            .get_employee_office_details.work_location
                                    }}
                                </p>
                                <p v-else class="f-12 fw-bold">-</p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh ml-3">
                                <p class="text-muted f-12 fw-bold">
                                    Department
                                    <a href="#" class="edit-icon" v-if="_instance_profilePagesStore.employeeDetails
                                    .is_ssa ==1" @click="dailogDepartment = true"><i
                                            class="ri-pencil-fill"></i></a>
                                </p>
                                <p v-if="_instance_profilePagesStore.employeeDetails
                                    .get_employee_office_details.department_id
                                    " class="f-12 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails
                                            .get_employee_office_details.department_name
                                    }}
                                </p>
                                <p v-else class="f-12 fw-bold">-</p>
                            </div>
                            <div class="py-2 border-bottom-liteAsh">
                                <p class="text-muted f-12 fw-bold">
                                    Reporting To
                                    <a href="#" v-if="_instance_profilePagesStore.employeeDetails
                                    .is_ssa ==1" class="edit-icon" @click="dailogReporting
                                                = true"><i class="ri-pencil-fill"></i>
                                    </a>
                                </p>
                                <p v-if="_instance_profilePagesStore.employeeDetails
                                    .get_employee_office_details.l1_manager_code
                                    " class="f-12 fw-bold">
                                    {{
                                        _instance_profilePagesStore.employeeDetails
                                            .get_employee_office_details.l1_manager_name
                                    }}
                                    <!-- {{ _instance_profilePagesStore.employeeDetails }} -->
                                    -
                                    {{
                                        _instance_profilePagesStore.employeeDetails
                                            .get_employee_office_details.l1_manager_code
                                    }}
                                </p>
                                <p v-else class="f-12 fw-bold">-</p>
                            </div>
                        </div>
                        <div class="text-center profile-bottom-right-content">
                            <!-- {{-- <button class="btn btn-danger"><i class="fa fa-sign-out me-2"></i> Logout </button> --}} -->
                            <!-- <button class="btn btn-danger">
                                <i class="fa fa-sign-out me-1"></i> Action
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Dialog header="Status" v-model:visible="canShowCompletionScreen" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '350px' }" :modal="true">
        <div class="confirmation-content">
            <i class="mr-3 pi pi-check-circle" style="font-size: 2rem" />
            <span>{{ status_text_CompletionDialog }}</span>
        </div>
    </Dialog>
    <Dialog v-model:visible="dailogDepartment" modal header="Edit Department"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <!-- {{ employee_card.department  }} -->
        <Dropdown :options="departmentOption" optionLabel="name" v-model="employee_card.department"
            placeholder="Select Department" class="w-full form-selects" optionValue="id" />
        <template #footer>
            <div>
                <button type="button" class="submit_btn warning success" @click="editDepartment">
                    Save
                </button>
            </div>
        </template>
    </Dialog>
    <Dialog v-model:visible="dailogReporting" modal header="Edit Reporting Manager"
        :style="{ width: '30vw', borderTop: '5px solid #002f56' }">
        <Dropdown optionLabel="name" :options="reportManagerOption" v-model="employee_card.reporting_manager"
            optionValue="user_code" placeholder="Select Reporting Manager" class="w-full form-selects" />
        <template #footer>
            <div>
                <button type="button" class="submit_btn warning success" @click="editReportingManager">
                    Save
                </button>
            </div>
        </template>
    </Dialog>


    <Dialog v-model:visible="dialogIdCard" modal header="" :style="{ width: '40vw', borderTop: '5px solid #002f56' }">

        <template #header>
            <div>
                <h5 class="fw-bolder fs-5"
                    :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                    Digital Id Preview
                </h5>
            </div>

        </template>
        <div class=" bg-blue-900 w-100 py-4 px-6 rounded-lg d-flex justify-content-between" style="">


            <div class="card p-3 d-flex  justify-items-center align-items-center"
            style="width: 20rem; height: 380px; flex-direction: column !important;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">

            <div style="height: 45px;width:140px;" class=" mt-2">
                <img :src="`${_instance_profilePagesStore.employeeDetails.client_logo}`" alt="" style=" object-fit: cover; " >
            </div>
            <div class="card-body d-flex justify-items-center align-items-center mt-6" style="flex-direction: column ; ">
                <div class="mx-auto rounded-circle img-xl userActive-status profile-img "
                    style="border: 1px solid navy;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                    <img v-if="_instance_profilePagesStore.profile"
                        class="rounded-circle img-xl userActive-status profile-img border object-cover"
                        :src="`data:image/png;base64,${_instance_profilePagesStore.profile}`" srcset=""
                        style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; width: 80px; height: 80px;" />
                </div>


                <!-- <img v-if="profile" class="rounded-circle   profile-img"
                    :src="`data:image/png;base64,${profile}`" srcset=""  /> -->

                <h1 class="card-title mt-12 mb-3 f-12 text-blue-900 subpixel-antialiased font-semibold" style="text-align: center;"> {{
                    _instance_profilePagesStore.employeeDetails.name }}</h1>

                <h5 v-if="_instance_profilePagesStore.employeeDetails
                    .get_employee_office_details.department_id
                    " class="f-12  card-text mb-3 text-gray-600 subpixel-antialiased font-semibold">
                    {{
                        _instance_profilePagesStore.employeeDetails
                            .get_employee_office_details.department_name
                    }}
                </h5>
                <h1 v-else class="f-12  card-text ">-</h1>

                <h5 v-if="_instance_profilePagesStore.employeeDetails.user_code" class="f-16 mb-2 text-gray-700 subpixel-antialiased font-semibold"
                    >
                    {{ _instance_profilePagesStore.employeeDetails.user_code }}
                </h5>
                <p v-else class="f-12   mb-2 text-secondary-emphasis">-</p>
            </div>
            </div>

            <!-- Digit-al Id back side  -->

            <div class="card p-2 d-flex justify-items-center align-items-center"
            style="width: 21rem; height: 380px; flex-direction: column !important;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
            <div class=" w-100 d-flex justify-content-center align-items-center flex-column">
                <h1 class=" text-orange-500 fs-14 subpixel-antialiased font-semibold  fw-600">EMPLOYEE DETAILS</h1>
                <div class="row  w-100 mt-2">
                    <div class="col-6 fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                        Blood Group :
                    </div>
                    <div class="col-5 subpixel-antialiased font-semibold fs-6 text-blue-900">
                     {{ cmpBldGrp }}
                    </div>
                </div>
                <div class="row  w-100">
                    <div class="col-6 fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                        Phone :
                    </div>
                    <div class="col-5 subpixel-antialiased font-semibold fs-6 text-blue-900">
                     {{ _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number }}
                    </div>
                </div>
                <div class="row w-100 ">
                    <div class="col-5 fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                       Email Id :
                    </div>
                    <div class="col-6 subpixel-antialiased font-semibold fs-12">
                        <h1 class=" text-center">{{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail }}</h1>
                    </div>
                </div>
                <div class="row  w-100 ">
                    <div class="col fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                        <h1 class=" text-orange-500 fs-12 ">Residential Address :</h1>
                        <div class=" ml-2">
                            <p class=" text-blue-900 mt-2 subpixel-antialiased font-semibold fs-11">
                                {{ _instance_profilePagesStore.employeeDetails.get_employee_details.current_address_line_1 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row bg-gradient-to-r from-violet-500 to-fuchsia-500 h-1 w-100 mt-2">
                </div>
                <div class="row bg-gradient-to-r from-violet-500 to-fuchsia-500 h-3 w-100 mt-1">
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class=" text-center font-semibold text-orange-500 fs-14 subpixel-antialiased mt-1" > {{  _instance_profilePagesStore.employeeDetails.client_details.client_name  }}</h1>
                    </div>
                    <div class="col-12"> <h1 class=" fs-11 text-center font-semibold text-blue-900">{{ _instance_profilePagesStore.employeeDetails.client_details.address }}</h1></div>
                    <div class="col-12"> <h1 class="fs-11 text-center font-semibold lining-nums ... text-blue-900">{{_instance_profilePagesStore.employeeDetails.client_details.authorised_person_contact_number  }}</h1></div>
                    <div class="col-12"> <h1 class="fs-12 text-center font-semibold  text-blue-900">{{ _instance_profilePagesStore.employeeDetails.client_details.authorised_person_contact_email  }}</h1></div>
                    <div class="col-12"> <h1 class="fs-12 text-center font-semibold  text-blue-900">{{ _instance_profilePagesStore.employeeDetails.email  }}</h1></div>
                </div>

            </div>

            </div>

        </div>

    </Dialog>



    <Dialog header="Header" v-model:visible="canShowLoading" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>

    <!-- <Dropdown :options="departmentOption" optionLabel="name" v-model="dep"
            placeholder="Select Department" class="w-full form-selects" optionValue="id" /> -->
</template>

<script setup>
import { _ } from "lodash";
import axios from "axios";
import { onMounted, reactive, ref, computed } from "vue";
import { Service } from "../../Service/Service";
import { profilePagesStore } from "../stores/ProfilePagesStore";
import useValidate from '@vuelidate/core'
import { required, email, minLength, sameAs } from '@vuelidate/validators'

const service = Service();

const canShowLoading = ref(false);

const dialogIdCard = ref(false)

const employee_card = reactive({
    department: "",
    reporting_manager: "",
});

const employee_info = reactive({
    emp_name: "",
    emp_doc_name: "",
    emp_upload_doc: ""
});


const doc_name = ref([
    { name: 'Birth Certificate', code: 1 },
    { name: 'Aadhar Card Front', code: 2 },
    { name: 'Pan Card', code: 3 },
]);


const dialog_emp_name_visible = ref(false);

let _instance_profilePagesStore = profilePagesStore();


const updateProfilePhoto = (e) => {
    // Check if file is selected
    if (e.target.files && e.target.files[0]) {
        // Get uploaded file
        _instance_profilePagesStore.profile = e.target.files[0];
        // Get file size
        // Print to console
    }

    let form = new FormData();
    form.append("user_code", _instance_profilePagesStore.user_code);
    form.append("file_object", _instance_profilePagesStore.profile);

    let url = "/profile-pages/updateProfilePicture";
    axios
        .post(url, form)
        .then((res) => {
            // console.log(res.data);
        })
        .finally(() => {
            console.log("Photo Sent");
            _instance_profilePagesStore.getProfilePhoto();
        });
};

const departmentOption = ref();

const reportManagerOption = ref();

const dailogDepartment = ref(false);

const dailogReporting = ref(false);

const canShowCompletionScreen = ref(false);
const status_text_CompletionDialog = ref("None");

const editDepartment = (dep) => {
    console.log(dep);

    axios
        .post("/profile-pages/updateDepartment", {
            user_code: _instance_profilePagesStore.employeeDetails.user_code,
            department_id: employee_card.department,
        })
        .then((res) => {
            //console.log("Department Options : " + JSON.stringify(departmentOption.value));

            //Set the department name from dropdown value itself.
            //find(departmentOption);
            //      console.log("Selected Dept id : " + employee_card.department);
            let selected_deptName = _.find(departmentOption.value, ["id", employee_card.department]).name;
            console.log("Lodash [Selected Dept]: " + selected_deptName);

            _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name = selected_deptName;

            status_text_CompletionDialog.value = "Department updated successfully !";

            console.log(res.data);
        })
        .catch((err) => {
            status_text_CompletionDialog.value = "Error while updating department. Kindly contact the Admin.";
            console.log("Error while updating Department : " + err);
        })
        .finally(() => {

            canShowCompletionScreen.value = true;
            dailogDepartment.value = false;
            //console.log('Experiment completed');
        });
};

const editReportingManager = (rm) => {
    console.log("editReportingManager : " + rm);

    axios.post("/profile-pages/updateReportingManager", {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        manager_user_code: employee_card.reporting_manager,
    }).
        then((res) => {
            //console.log("Reporting Manager Options : "+ JSON.stringify(reportManagerOption.value));

            let selected_reportedManager = _.find(reportManagerOption.value, ["user_code", employee_card.reporting_manager]);

            _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name = selected_reportedManager.name;
            _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code = selected_reportedManager.user_code;

            status_text_CompletionDialog.value = "Reporting Manager updated successfully !";

            console.log(res.data);



        }).catch((err) => {
            status_text_CompletionDialog.value = "Error while updating Reporting Manager. Kindly contact the Admin.";
            console.log("Error while updating Reporting Manager : " + err);
        }).finally(() => {
            canShowCompletionScreen.value = true;
            dailogReporting.value = false;
        });


};

const setvalue = () => {
    employee_card.department =
        _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name;
    employee_card.reporting_manager =
        _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name;
    console.log(employee_card.department);
};

onMounted(() => {

    service.DepartmentDetails().then((res) => {
        departmentOption.value = res.data;
        console.log(
            "testing" +
            _instance_profilePagesStore.employeeDetails.get_employee_office_details
                .l1_manager_name
        );
    });
    service.ManagerDetails().then((res) => {
        reportManagerOption.value = res.data;
    });
    setvalue();

    console.log();
});

const UploadEmpDocsPhoto = (e) => {
    if (e.target.files && e.target.files[0]) {
        employee_info.emp_upload_doc = e.target.files[0];
        console.log(employee_info.emp_upload_doc);
    }
}


const rules = computed(() => {
    return {
        emp_name: { required },
        emp_doc_name: { required },
        emp_upload_doc: { required }
    }
})



const v$ = useValidate(rules, employee_info)

const submitForm = () => {
    v$.value.$validate() // checks all inputs
    if (!v$.value.$error) {
        // if ANY fail validation
        console.log('Form successfully submitted.')
        saveEmpChangeInfoDetails();
    } else {
        console.log('Form failed submitted.')
    }

}


const saveEmpChangeInfoDetails = () => {
    canShowLoading.value = true;

    dialog_emp_name_visible.value = false;
    let id = service.current_user_id;
    const url = `/update-EmplpoyeeName-info/${id}`;
    const form = new FormData;
    form.append('user_code', _instance_profilePagesStore.employeeDetails.user_code)
    form.append('name', employee_info.emp_name);
    form.append('onboard_document_type', employee_info.emp_doc_name.name);
    form.append('emp_doc', employee_info.emp_upload_doc);


    axios.post(url, form).finally(() => {

        canShowLoading.value = false;
    })


}

const cmpBldGrp = computed(() => {
    if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 1) return "A Positive";

    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 2) return "A Negative";
    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 3) return "B Positive";

    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 4) return "B Negative";


    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 5) return "AB Positive";

    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 6) return "AB Negative";

    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 7) return "O Positive";

    else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 8) return "O Negative";

})





</script>

<style>
.p-progressbar.p-component.p-progressbar-determinate {
    height: 13px;
}

* {
    /* font-family: sans-serif; */
}
</style>

