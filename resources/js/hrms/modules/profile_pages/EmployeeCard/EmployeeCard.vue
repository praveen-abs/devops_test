<template>
    <Toast />
    <div class="mb-0 card top-line">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-end">
                    <button class="p-0 m-0 bg-transparent border-0 outline-none btn" @click="dialogIdCard = true">
                        <i class="fa fa-id-card text-success" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="text-center col-12">
                    <div class="mx-auto rounded-circle img-xl userActive-status profile-img " style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; border: 1px solid navy;">
                        <!-- <img class="rounded-circle img-xl userActive-status profile-img" src="./photo1675430684.jpeg" alt=""
                            srcset="" style="border:6px solid #c2c2c2c2"> -->
                        <img v-if="profile" class="rounded-circle img-xl userActive-status profile-img"
                            :src="`data:image/png;base64,${profile}`" srcset=""  />

                        <label class="cursor-pointer edit-icon" style="position: absolute; top: 76px ;right: 10px;"
                            data-bs-toggle="modal" data-bs-target="#edit_profileImg" id="" for="upload">
                            <i class="fa fa-camera"></i></label>
                        <input type="file" name="" id="upload" hidden @change="updateProfilePhoto($event)" />
                    </div>

                    <div class="mt-4">
                        <div class="progress-wrapper border-bottom-liteAsh">
                            <span class="mx-auto opacity-0 border-1"></span>
                            <div class="mb-1 text-center px-auto">
                                <h6 class="text-center fw-bold">
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
                            <p class="mb-2 text-muted f-10 text-start fw-bold">
                                Your profile is completed
                            </p>
                        </div>
                        <!-- <ProgressBar class="bg-red-600" :value="10"></ProgressBar> -->

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
                                    <a href="#" class="edit-icon" @click="dailogDepartment = true"><i
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
                                    <a href="#" class="edit-icon" @click="dailogReporting
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
                            <button class="btn btn-danger">
                                <i class="fa fa-sign-out me-1"></i> Action
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Dialog header="Status" v-model:visible="canShowCompletionScreen"
      :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
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
                <button type="button" class="submit_btn warning success"
                    @click="editDepartment">
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
                <button type="button" class="submit_btn warning success"
                    @click="editReportingManager">
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
        <div class="card p-3 d-flex justify-items-center align-items-center"
            style="width: 18rem;margin-left: 140px; flex-direction: column !important;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">

            <img src="" alt="" class=""
                style="height: 40px;width:140px; ">

            <div class="card-body d-flex justify-items-center align-items-center " style="flex-direction: column ">

                <img v-if="profile" class="rounded-circle   profile-img"
                    :src="`data:image/png;base64,${profile}`" srcset="" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; width: 120px; height: 120px;" />

                <h5 class="card-title mt-3 mb-2 f-12"> {{ _instance_profilePagesStore.employeeDetails.name }}</h5>

                <h5 v-if="_instance_profilePagesStore.employeeDetails
                    .get_employee_office_details.department_id
                    " class="f-12  card-text mb-2 text-gray-400" >
                    {{
                        _instance_profilePagesStore.employeeDetails
                            .get_employee_office_details.department_name
                    }}
                </h5>
                <h1 v-else class="f-12 fw-bold">-</h1>

                <h5 v-if="_instance_profilePagesStore.employeeDetails.user_code" class="f-12 fw-bold mb-2" style="color:grey">
                    {{ _instance_profilePagesStore.employeeDetails.user_code }}
                </h5>
                <p v-else class="f-12   mb-2 text-secondary-emphasis">-</p>
            </div>
        </div>
    </Dialog>

    <!-- <Dropdown :options="departmentOption" optionLabel="name" v-model="dep"
            placeholder="Select Department" class="w-full form-selects" optionValue="id" /> -->
</template>

<script setup>
import { _ } from "lodash";
import axios from "axios";
import { onMounted, reactive, ref } from "vue";
import { Service } from "../../Service/Service";
import { profilePagesStore } from "../stores/ProfilePagesStore";

const service = Service();

const profile = ref();

const dialogIdCard = ref(false)

const employee_card = reactive({
    department: "",
    reporting_manager: "",
});

let _instance_profilePagesStore = profilePagesStore();

const getProfilePhoto = () => {
    axios
        .post("/profile-pages/getProfilePicture", {
            user_code: service.current_user_code,
        })
        .then((res) => {
            // console.log(res.data);
            profile.value = res.data.data;
        })
        .finally(() => {
            console.log("profile Pic Fetched");
        });
};

const updateProfilePhoto = (e) => {
    // Check if file is selected
    if (e.target.files && e.target.files[0]) {
        // Get uploaded file
        profile.value = e.target.files[0];
        // Get file size
        // Print to console
        console.log(profile.value);
    }

    let form = new FormData();
    form.append("user_code", service.current_user_code);
    form.append("file_object", profile.value);

    let url = "/profile-pages/updateProfilePicture";
    axios
        .post(url, form)
        .then((res) => {
            // console.log(res.data);
        })
        .finally(() => {
            console.log("Photo Sent");
            getProfilePhoto();
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
            console.log("Error while updating Department : "+ err);
        })
        .finally(() => {

            canShowCompletionScreen.value = true;
            dailogDepartment.value = false;
            //console.log('Experiment completed');
        });
};

const editReportingManager = (rm) => {
    console.log("editReportingManager : "+rm);

    axios.post("/profile-pages/updateReportingManager", {
        user_code : _instance_profilePagesStore.employeeDetails.user_code,
        manager_user_code : employee_card.reporting_manager,
    }).
    then((res) => {
        //console.log("Reporting Manager Options : "+ JSON.stringify(reportManagerOption.value));

       let selected_reportedManager = _.find(reportManagerOption.value, ["user_code" , employee_card.reporting_manager]);

       _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name = selected_reportedManager.name;
       _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code = selected_reportedManager.user_code;

        status_text_CompletionDialog.value = "Reporting Manager updated successfully !";

        console.log(res.data);



    }).catch((err) => {
        status_text_CompletionDialog.value = "Error while updating Reporting Manager. Kindly contact the Admin.";
            console.log("Error while updating Reporting Manager : "+ err);
    }).finally(() =>{
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
    getProfilePhoto();
    setvalue();
});
</script>

<style>
.p-progressbar.p-component.p-progressbar-determinate {
    height: 13px;
}
*{
    /* font-family: sans-serif; */
}
</style>
