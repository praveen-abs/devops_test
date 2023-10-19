<template>
    <Toast />
    <div class="bg-white border rounded-lg grid grid-cols-12 p-3 content-center"
        v-if="_instance_profilePagesStore.employeeDetails.get_employee_office_details">
        <div class="col-span-4 h-full grid grid-cols-12 gap-6">
            <div class="col-span-4">
                <!-- <div :class="[_instance_profilePagesStore.employeeDetails.short_name_Color ? _instance_profilePagesStore.employeeDetails.short_name_Color : '', _instance_profilePagesStore.employeeDetails.short_name_Color]" class=" h-full w-full rounded-full  flex justify-center items-center" v-if="!_instance_profilePagesStore.profile" >
                <p class="font-semibold text-4xl text-center text-white">
                    {{ _instance_profilePagesStore.employeeDetails.user_short_name }}
                </p>
            </div> -->
                <div class="profile-pic">
                    <img v-if="_instance_profilePagesStore.profile" class="forRounded"
                        :src="`data:image/png;base64,${_instance_profilePagesStore.profile}`" srcset="" alt="" id="output"
                        width="200" />
                    <p v-else
                        class="font-semibold text-5xl text-center flex items-center justify-center text-white forRounded"
                        :class="[_instance_profilePagesStore.employeeDetails.short_name_Color ? _instance_profilePagesStore.employeeDetails.short_name_Color : '', _instance_profilePagesStore.employeeDetails.short_name_Color]">
                        {{ _instance_profilePagesStore.employeeDetails.user_short_name }}
                    </p>
                    <label class="-label" for="file">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        <!-- <span>Change</span> -->
                    </label>
                    <input id="file" type="file" @change="updateProfilePhoto($event)" />
                </div>

            </div>
            <div class="col-span-8">
                <div class=" flex  justify-between pr-4">
                    <div>
                        <p class="font-semibold text-md">{{ _instance_profilePagesStore.employeeDetails ?
                            _instance_profilePagesStore.employeeDetails.name : '-' }}</p>
                        <p class="font-semibold text-xs text-gray-500">{{ _instance_profilePagesStore.employeeDetails ?
                            _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation : '-' }}</p>
                    </div>
                    <img src="../../../assests/icons/edit.svg" class="h-4 w-4 cursor-pointer my-auto" alt=""
                        @click="dialog_emp_name_visible = true">

                </div>
                <div class="py-2">
                    <p class="font-semibold text-xs">Profile completeness</p>

                    <div class="w-11/12 my-1">
                        <ProgressBar v-if="_instance_profilePagesStore.employeeDetails.profile_completeness <= 39"
                            :value="_instance_profilePagesStore.employeeDetails.profile_completeness"
                            :class="[_instance_profilePagesStore.employeeDetails.profile_completeness <= 39 ? 'progressbar' : '']">
                        </ProgressBar>
                        <ProgressBar class="progressbar_val2"
                            v-if="_instance_profilePagesStore.employeeDetails.profile_completeness >= 40 && _instance_profilePagesStore.employeeDetails.profile_completeness <= 59"
                            :class="[_instance_profilePagesStore.employeeDetails.profile_completeness >= 40 && _instance_profilePagesStore.employeeDetails.profile_completeness <= 59]"
                            :value="_instance_profilePagesStore.employeeDetails.profile_completeness">
                        </ProgressBar>

                        <ProgressBar class="progressbar_val3"
                            v-if="_instance_profilePagesStore.employeeDetails.profile_completeness >= 60"
                            :class="[_instance_profilePagesStore.employeeDetails.profile_completeness >= 60]"
                            :value="_instance_profilePagesStore.employeeDetails.profile_completeness">
                        </ProgressBar>
                    </div>

                    <p class="mb-2 text-muted f-10 text-start fw-bold">
                        Your profile is completed
                    </p>
                </div>
            </div>
        </div>

        <div class="col-span-5 grid grid-cols-3 gap-4 h-full">
            <div class="">
                <p class="font-semibold text-xs text-gray-500">Employee Status</p>
                <p v-if="_instance_profilePagesStore.employeeDetails.active == 1" class="font-semibold text-sm">Active
                </p>
                <p v-else class="font-semibold text-sm">Not active</p>
            </div>
            <div class="">
                <p class="font-semibold text-xs text-gray-500">Designation</p>
                <p class="font-semibold text-sm">{{
                    _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation ?
                    _instance_profilePagesStore.employeeDetails.get_employee_office_details.designation : '-' }}</p>
            </div>
            <div class=" flex justify-between items-center">
                <div>
                    <p class="font-semibold text-xs text-gray-500">Department</p>
                    <p class="font-semibold text-sm">{{
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name ?
                        _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name : '-' }}</p>

                </div>
                <img src="../../../assests/icons/edit.svg" class="h-4 w-4 cursor-pointer my-auto" v-if="_instance_profilePagesStore.employeeDetails
                    .Current_login_user.org_role == 1 || _instance_profilePagesStore.employeeDetails
                        .Current_login_user.org_role == 2 || _instance_profilePagesStore.employeeDetails
                            .Current_login_user.org_role == 3" @click="dailogDepartment = true" alt="">

            </div>
            <div class="">
                <p class="font-semibold text-xs text-gray-500">Employee Code</p>
                <p class="font-semibold text-sm">{{ _instance_profilePagesStore.employeeDetails ?
                    _instance_profilePagesStore.employeeDetails.user_code : '-' }}</p>
            </div>
            <div class="">
                <p class="font-semibold text-xs text-gray-500">Location</p>
                <p class="font-semibold text-sm">{{
                    _instance_profilePagesStore.employeeDetails.get_employee_office_details.work_location ?
                    _instance_profilePagesStore.employeeDetails.get_employee_office_details.work_location : '-' }}</p>
            </div>
            <div class="flex justify-between items-center">
                <div class="">
                    <p class="font-semibold text-xs text-gray-500">Reporting to</p>
                    <p class="font-semibold text-sm whitespace-nowrap" v-if="_instance_profilePagesStore.employeeDetails">
                        {{
                            `${_instance_profilePagesStore.employeeDetails
                                .get_employee_office_details.l1_manager_name}(${_instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code})`
                        }}
                    </p>
                </div>

                <img src="../../../assests/icons/edit.svg" v-if="_instance_profilePagesStore.employeeDetails
                            .Current_login_user.org_role == 1 || _instance_profilePagesStore.employeeDetails
                                .Current_login_user.org_role == 2 || _instance_profilePagesStore.employeeDetails
                                    .Current_login_user.org_role == 3" @click="dailogReporting
                        = true" class="h-4 w-4 cursor-pointer my-auto" alt="">

            </div>
        </div>
        <div class="col-span-3 h-full">
            <div class="flex justify-end">
                <div>
                    <!-- <p class="rounded-full font-semibold  border whitespace-nowrap p-1 text-xs">
            Edit -->
                    <!-- <img src="../../../assests/icons/edit.svg" class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""> -->
                    <!-- <img src="../../../assests/icons/edit.svg" class="h-4 w-4 cursor-pointer my-auto" alt=""> -->

                    <!-- </p> -->
                </div>
                <div class="mx-2">
                    <button class="p-0 m-0 bg-transparent border-0 outline-none btn">

                        <i  class="pi pi-pencil rounded-md mx-4 " @click="visibleRight= true" ></i> 
                        <i class="pi pi-id-card text-success fs-4" aria-hidden="true" @click="dialogIdCard = true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <Dialog header="Status" v-model:visible="canShowCompletionScreen"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }">
        <div class="confirmation-content">
            <i class="mr-3 pi pi-check-circle" style="font-size: 2rem" />
            <span>{{ status_text_CompletionDialog }}</span>
        </div>
    </Dialog>
    <Dialog v-model:visible="dailogDepartment"  header="Edit Department" :style="{ width: '30vw' }">
        <!-- {{ employee_card.department  }} -->
        <Dropdown :options="departmentOption" optionLabel="name" v-model="employee_card.department"
            placeholder="Select Department" class="w-full form-selects" optionValue="id" />
        <template #footer>
            <div>
                <button type="button" class="btn btn-outline-orange" @click="dailogDepartment= false">
                    cancel
                </button>
                <button type="button" class="btn btn-orange" @click="editDepartment">
                    Save
                </button>
            </div>
        </template>
    </Dialog>
    <Dialog v-model:visible="dailogReporting" modal header="Edit Reporting Manager" :style="{ width: '30vw' }">
        <Dropdown optionLabel="name" :options="reportManagerOption" v-model="employee_card.reporting_manager"
            optionValue="user_code" placeholder="Select Reporting Manager" class="w-full form-selects" />
        <template #footer>
            <div>
                <button type="button" class="btn btn-outline-orange" @click="dailogReporting= false">
                    cancel
                </button>
                <button type="button" class="btn btn-orange" @click="editReportingManager">
                    Save
                </button>
            </div>
        </template>
    </Dialog>


    <Sidebar position="right" v-model:visible="dialogIdCard" modal header="" :style="{ width: '45vw !important' }"
        style=" @media (min-width:1024px){background-image:particular_ad_small.png;} ">

        <template #header>
            <div>
                <h5 class="absolute left-0 mx-4 font-semibold fs-5 "
                    :style="{ color: 'var(--color-blue)', borderLeft: '3px solid var(--light-orange-color', paddingLeft: '6px' }">
                    Digital Id Preview
                </h5>
            </div>

        </template>
        <div class="w-100  py-4 px-2 rounded-lg d-flex justify-content-around overflow-x-scroll ... lg:w-100 ">

            <div class="card p-3 d-flex  justify-items-center align-items-center mr-2 :lg:mx-0 Digital_Id_Card_"
                style="width: 260px; height: 380px; flex-direction: column !important;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">

                <div style="height: 45px;width:140px;" class=" mt-2">
                    <img :src="`${_instance_profilePagesStore.employeeDetails.client_logo}`" alt=""
                        style=" object-fit: cover; ">
                </div>
                <div class="card-body d-flex justify-items-center align-items-center mt-6"
                    style="flex-direction: column ; ">
                    <div class="mx-auto rounded-circle img-xl userActive-status profile-img  d-flex justify-content-center align-items-center "
                        :class="[!_instance_profilePagesStore.profile ? _instance_profilePagesStore.employeeDetails.short_name_Color : '', _instance_profilePagesStore.employeeDetails.short_name_Color]">

                        <img v-if="_instance_profilePagesStore.profile"
                            class="rounded-circle img-xl userActive-status profile-img border object-cover"
                            :src="`data:image/png;base64,${_instance_profilePagesStore.profile}`" srcset=""
                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; width: 80px; height: 80px;" />

                        <h1 v-if="!_instance_profilePagesStore.profile" class=" text-white font-semibold text-5xl ">{{
                            _instance_profilePagesStore.employeeDetails.user_short_name }}</h1>
                    </div>


                    <!-- <img v-if="profile" class="rounded-circle   profile-img"
                    :src="`data:image/png;base64,${profile}`" srcset=""  /> -->

                    <h1 class="card-title mt-12 mb-3 f-12 text-blue-900 subpixel-antialiased font-semibold"
                        style="text-align: center;"> {{
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

                    <h5 v-if="_instance_profilePagesStore.employeeDetails.user_code"
                        class="f-16 mb-2 text-gray-700 subpixel-antialiased font-semibold">
                        {{ _instance_profilePagesStore.employeeDetails.user_code }}
                    </h5>
                    <p v-else class="f-12   mb-2 text-secondary-emphasis">-</p>
                </div>
            </div>

            <!-- Digit-al Id back side  -->

            <div class="card p-2  d-flex justify-items-center align-items-center ml-2  Digital_Id_Card_ :lg:p-2 "
                style="width: 260px;  height: 380px; flex-direction: column !important;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                <div class=" w-100 d-flex justify-content-center align-items-center flex-column ">
                    <h1 class=" text-orange-500 fs-14 subpixel-antialiased font-semibold  fw-600">EMPLOYEE DETAILS</h1>
                    <div class="row  w-100 mt-3">
                        <div class="col-5 fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                            Blood Group <span class=" position-absolute  " style="position: absolute; left:90px ;">:</span>
                        </div>
                        <div class="col-6  fs-6 text-blue-900 ">
                            <h1 class=" text-left pt-1">{{ cmpBldGrp }}</h1>
                        </div>
                    </div>
                    <div class="row  w-100 mt-3">
                        <div class="col-5 fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                            Phone <span class=" position-absolute " style="position: absolute; left:90px ;">:</span>
                        </div>
                        <div class="col-6  fs-6 text-blue-900  ">
                            <h1 class=" text-left pt-1">{{
                                _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number }}</h1>

                        </div>
                    </div>
                    <div class="row w-100 mt-3">
                        <div
                            class="col-5 fs-14 subpixel-antialiased  font-semibold text-left text-blue-900 position-relative">
                            Email Id <span class=" position-absolute " style="position: absolute; left:90px ;">:</span>
                        </div>
                        <div class="col-6 subpixel-antialiased  fs-12">
                            <h1 class=" text-left ">

                                {{ _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail }}
                            </h1>
                        </div>
                    </div>
                    <div class="row  w-100 mt-3">
                        <div class="col fs-14 subpixel-antialiased  font-semibold text-left text-blue-900">
                            <h1 class=" text-orange-500 fs-12 ">Residential Address :</h1>
                            <div class=" ml-2 ">
                                <p class=" text-blue-900 mt-2 subpixel-antialiased font-semibold fs-11 text-center">
                                    {{
                                        _instance_profilePagesStore.employeeDetails.get_employee_details.current_address_line_1
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-gradient-to-r  from-orange-500 to-orange-300 h-1 w-100 mt-2 :lg:mt-2">
                    </div>
                    <div class="row bg-gradient-to-r from-orange-500 to-orange-300 h-3 w-100 mt-1">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 class=" text-center font-semibold text-orange-500 fs-14 subpixel-antialiased mt-2 :lg:mt-2"
                                v-if="_instance_profilePagesStore.employeeDetails.client_details.client_name"> {{
                                    _instance_profilePagesStore.employeeDetails.client_details.client_name }}</h1>
                        </div>
                        <div class="col-12 ">
                            <h1 class=" fs-11 text-center font-semibold text-blue-900 mt-2">{{
                                _instance_profilePagesStore.employeeDetails.client_details.address }}</h1>
                        </div>
                        <div class="col-12">
                            <h1 class="fs-12 text-center font-semibold  text-blue-900 mt-2">{{
                                _instance_profilePagesStore.employeeDetails.client_details.authorised_person_contact_email
                            }}</h1>
                        </div>
                        <div class="col-12">
                            <h1 class="fs-11 text-center font-semibold lining-nums ... text-blue-900 mt-2">
                                {{
                                    _instance_profilePagesStore.employeeDetails.client_details.authorised_person_contact_number
                                }}</h1>
                        </div>

                        <div class="col-12">
                            <!-- <h1 class="fs-12 text-center font-semibold  text-blue-900 mb-3 :lg:mb-0">{{
                                _instance_profilePagesStore.employeeDetails.email }}</h1> -->
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </Sidebar>



    <Dialog v-model:visible="dialog_emp_name_visible" modal header=" " :style="{ width: '50vw' }">
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
                                                    v-model="employee_info.emp_name" placeholder=""
                                                    style="text-transform: uppercase" class="form-controls pl-2" :class="[
                                                        v$.emp_name.$error ? 'p-invalid' : '',
                                                    ]" /> -->
                            <InputText type="text" v-model="employee_info.emp_name" style="text-transform: uppercase"
                                class="form-controls pl-2" :class="[
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
                            <Dropdown v-model="employee_info.emp_doc_name" :options="doc_name" optionLabel="name"
                                placeholder="Select a document " class="form-controls pl-2 w-full h-12" :class="[
                                    v$.emp_doc_name.$error ? 'p-invalid' : '',
                                ]" />
                            <span v-if="v$.emp_doc_name.$error" class="text-red-400 fs-6 font-semibold">
                                {{ v$.emp_doc_name.required.$message.replace("Value", "Documents")
                                }}
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column ">
                        <div class="d-flex justify-items-center  flex-column ">
                            <label for="" class="float-label mb-2 font-semibold text-lg">Upload
                                Documents</label>
                            <div class="d-flex  justify-items-center align-items-center">
                                <Toast />
                                <label
                                    class="cursor-pointer text-primary bg-[black] px-2 py-2 rounded-md d-flex align-items-center fs-5"
                                    style="width:100px ; " id="" for="uploadPassBook">
                                    <i class="pi pi-arrow-circle-up text-[white] mr-2 text-[18px]"></i>
                                    <h1 class="text-light">Upload</h1>
                                </label>

                                <div v-if="employee_info.emp_upload_doc"
                                    class="p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4">
                                    {{ employee_info.emp_upload_doc.name }}</div>

                                <input type="file" name="" id="uploadPassBook" hidden @change="UploadEmpDocsPhoto($event)"
                                    :class="[
                                        v$.emp_upload_doc.$error ? 'p-invalid' : '',
                                    ]" />
                            </div>
                            <span v-if="v$.emp_upload_doc.$error" class="text-red-400 fs-6 font-semibold">
                                {{ v$.emp_upload_doc.required.$message.replace("Value", "document")
                                }}
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="text-right">
                        <button type="button" class="btn btn-outline-orange" @click="dialog_emp_name_visible= false">
                            cancel
                        </button>
                        <button id="btn btn-orange mx-2" class="btn btn-orange submit-btn"
                            @click="submitForm">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </Dialog>

    <Sidebar v-model:visible="visibleRight" position="right" class="!w-[500px] !h-[650px] " :style="{ width: '40vw !important' }">
        <template #header>
            <div class="bg-[#001820] !w-[100%] h-[60px] absolute top-0 left-0 ">
                <h1 class=" m-4  text-[#ffff] font-['poppins] font-semibold ">Profile Details</h1>
            </div>
            <div class="w-[535px] text-sm">
                <div class="bg-[#FFE2E2] mt-[44px] w-[530px] h-18  ml-2 font-['poppins] font-bold">Note
                    <p class="font-['poppins]  ml-1">Changing Personal Information will be verified and approved by the Manager after you submit this form</p>
                </div>
            </div>    
        </template>
        <div class="">
            <h4 class="font-semibold text-[15px] ">Personal Information</h4>
            
            <div class="leading-8">
                <h6 class="py-2 font-semibold text-[12px]">Name<span class="text-danger">*</span></h6>
                <InputText v-model="value" class="bg-gray-200 h-10"  placeholder="Name" />
                <h6 class="py-2 font-semibold text-[12px]">Designation<span class="text-danger">*</span></h6>
                <InputText v-model="value"  class="bg-gray-200 h-10"  placeholder="Designation" />
                <h6 class="py-2 font-semibold text-[12px]">Location<span class="text-danger">*</span></h6>
                <InputText v-model="value" class="bg-gray-200 h-10"  placeholder="Location" />
            </div>
            <div class="py-2 leading-8 font-semibold text-[15px]">General Information
                <div class="flex ">
                    <div class="">
                         <div class=" w-72 font-semibold   text-[12px] leading-10 ">DOB<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200 h-9"  placeholder="DOB" />
                        </div> 
                        <!-- <div class="W-64 font-semibold text-xl leading-10 ">Gender<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200  h-12" disabled placeholder="Gender" />
                        </div> -->
                        <div class=" w-72 font-semibold  text-[12px] leading-10 ">Gender<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200 h-10"  placeholder="  Gender" />
                            
                        </div> 
                        <div class="w-72 font-semibold text-[12px] leading-10 ">Blood Group<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200  h-10"  placeholder="Blood Group" />
                        </div>
                    </div>
                    <div class="ml-10 ">
                        <div class="w-72  font-semibold leading-10  text-[12px] ">DOJ<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200  h-10"  placeholder="DOJ" />
                        </div>
                        <div class="w-72  font-semibold leading-10  text-[12px]">Martial Status<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200  h-10"  placeholder="Martial Status" />
                        </div>
                        <div class="w-72  font-semibold leading-10  text-[12px]">Physically Challenged<span class="text-danger">*</span>
                            <InputText v-model="value" class="bg-gray-200  h-10" placeholder="Physically Challenged" />
                        </div>

                    </div>




                </div>
            </div>
        </div>
        <div class="">
            <!-- <div class="bg-[#FFE2E2] mt-24 py-3 rounded-lg ml-1 font-['poppins] font-bold">Note
                <p class="font-['poppins] ml-1">Changing Personal Information will be verified and approved by the Manager after you submit this form</p>
            </div> -->
            <div class="justify-center font-['poppins'] py-4 ml-52 items-center ">
                 <button class=" border-2 py-1 px-3  rounded-lg border-black">Cancel</button>
                <button class=" border-2 py-1 px-3 ml-10 rounded-lg bg-black text-white border-black">Submit</button>
            </div>
        </div>
  
    </Sidebar>
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

const visibleRight = ref(false);

const canShowLoading = ref(false);

const dialogIdCard = ref(false);
const value = ref();

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
    form.append("user_code", service.current_user_code);
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

<style lang="scss">
@mixin object-center {
    display: flex;
    justify-content: center;
    align-items: center;
}

$circleSize: 90px;
$radius: 100px;
$shadow: 0 0 10px 0 rgba(255, 255, 255, .35);
$fontColor: rgb(250, 250, 250);

.profile-pic {
    color: transparent;
    transition: all .3s ease;
    @include object-center;
    position: relative;
    transition: all .3s ease;

    input {
        display: none;
    }

    .forRounded {
        position: absolute;
        object-fit: cover;
        width: $circleSize;
        height: $circleSize;
        box-shadow: $shadow;
        border-radius: $radius;
        z-index: 0;
    }

    .-label {
        cursor: pointer;
        height: $circleSize;
        width: $circleSize;
    }

    &:hover {
        .-label {
            @include object-center;
            background-color: rgba(0, 0, 0, .8);
            z-index: 10000;
            color: $fontColor;
            transition: background-color .2s ease-in-out;
            border-radius: $radius;
            margin-bottom: 0;
        }
    }

    span {
        display: inline-flex;
        padding: .2em;
        height: 2em;
        font-size: 12px;
    }
}

.p-progressbar.p-component.p-progressbar-determinate {
    height: 13px;
    /* background-color: aqua; */
}


.progressbar_val3 .p-progressbar-value.p-progressbar-value-animate {
    /* background-color:#fff !important; */
    background-color: rgb(48, 218, 48) !important;
    color: #fff !important;
}

.progressbar .p-progressbar-value.p-progressbar-value-animate {
    /* background-color:#fff !important; */
    background-color: red !important;
    color: #fff !important;
}

.progressbar_val2 .p-progressbar-value.p-progressbar-value-animate {
    background-color: orange !important;
    color: black !important;
}


/* .p-progressbar-label{
color: black !important;
} */


/* .progressbar_val_1 >  .p-progressbar-value.p-progressbar-value-animate , .p-progressbar-label{
     background-color: red !important ;
     color: #fff !important;
} */


@media only screen and (max-width: 1280px) {
    .Digital_Id_Card_ {
        /* height: 7000px; */
    }
}
</style>

