<template>
    <div class="card "  >
        <div class="w-full">
        <DataTable ref="dt" :value="usedata.employeeDetails.employee_documents "   dataKey="id" :paginator="true"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]" :rows="5"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">

            <Column header="File Name" field="document_name" style="min-width: 8rem">
                {{ EmployeeDocumentManagerService.getEmployeeDoc.document_name }}
            </Column>

            <Column field="status" header="status" style="min-width: 12rem">
                <template #body="slotProps">

                    <div v-if="slotProps.data.status == 'Approved'">
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20">Approved</span>
                    </div>
                    <div v-else-if="slotProps.data.status === 'Pending'">
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20">Pending</span>
                    </div>
                    <div v-else-if="slotProps.data.status === 'Rejected'">
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20">Pending</span>
                    </div>
                    <div v-else>

                    </div>

                    <!-- <div v-if="slotProps.data.status === 'Pending'" class=" w-100 flex justify-center">
                        <p class="px-2 py-1 w-[80px] rounded-md bg-yellow-400 text-white font-semibold text-[12px] ">Pending</p>
                    </div>
                    <div v-if="slotProps.data.status === 'Approved'" class="flex justify-center">
                        <p class="px-2 py-1 w-[80px] rounded-md text-white bg-green-500 font-semibold text-[12px] ">Approved</p>
                    </div>
                    <div v-if="slotProps.data.status === 'Rejected'" class="flex justify-center">
                        <p class=" px-2 py-1 w-[80px] rounded-md bg-red-600 text-white p-2 font-semibold text-[12px] ">Rejected</p>
                    </div>
                    <div v-if="slotProps.data.status === null">
                        <p class="text-green-600 font-semibold">-</p>
                    </div> -->

                </template>
            </Column>

            <Column field="" header="View " style="min-width: 12rem">
                <template #body="slotProps">
                    <div v-if="slotProps.data.doc_id">
                    <div v-if="slotProps.data.status =='Rejected'">
                     <input type="file" name="" id="file" hidden @change="uploadDocument($event)">
                        <button class="btn btn-success" @click="getFileName(slotProps.data.document_name)"><label for="file"
                                class="cursor-pointer"><i class="pi pi-upload"></i> Upload
                                file</label></button>

                    </div>
                    <div v-else>
                           <Button type="button" icon="pi pi-eye" class="p-button-success Button" label="View"
                            @click="showDocument(slotProps.data)" style="height: 1.5em" />
                    </div>

                    </div>

                    <div v-else>
                        <input type="file" name="" id="file" hidden @change="uploadDocument($event)">
                        <button class="btn btn-success" @click="getFileName(slotProps.data.document_name)"><label for="file"
                                class="cursor-pointer"><i class="pi pi-upload"></i> Upload
                                file</label></button>
                    </div>
                </template>
            </Column>
        </DataTable>
        <button severity="warn" type="submit" data="row-6" next="row-6" name="submit_form" id="msform"
        class="text-center btn btn-orange processOnboardForm float-end text-light mr-5 my-5" value="Submit" :disabled="fileUploadValidation"
        @click="submitEmployeeDocsUpload">
        Submit
    </button>
        <!-- <div class="row">
            <div class="text-right col-12">
                <Toast />
                <button severity="warn" type="submit" data="row-6" next="row-6" placeholder="" name="submit_form"
                    id="msform" class="text-center btn btn-orange processOnboardForm warn" value="Submit"
                    :disabled="fileUploadValidation" @click="submitEmployeeDocsUpload">
                    Submit
                </button>
            </div>
        </div> -->
        <Sidebar  position="right" v-model:visible="visible" modal header="Documents" :style="{ width: '40vw' }" v-if="EmployeeDocumentManagerService.loading == false">
            <div class="w-full h-full d-flex justify-content-center ">
                <img :src="`data:image/png;base64,${documentPath}`" class="" alt="File not found"
                    style="object-fit: cover; max-width: 400px; , min-height: 350px; height:300px" />
            </div>

        </Sidebar>
<!--
        <Dialog header="Header" v-model:visible="EmployeeDocumentManagerService.loading"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '25vw' }" :modal="true" :closable="false"
            :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                    animationDuration="2s" aria-label="Custom ProgressSpinner" />
            </template>
            <template #footer>
                <h5 style="text-align: center">Please wait...</h5>
            </template>
        </Dialog> -->

    </div>
    </div>

    <div>
        <ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed mb-3 " id="pills-tab" role="tablist">
            <li class=" nav-item" role="presentation">
                <a class="px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]" id="" data-bs-toggle="pill" href="" role="tab" aria-controls=""
                    aria-selected="true" @click="activetab_btn1" :class="[activetab === 1 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']">
                        EMPLOYEE DOCUMENTS
                </a>                      
                <div v-if="activetab === 1" class="h-1 rounded-l-3xl " style="border: 2px solid #F9BE00 !important;" ></div>
                <div v-else class=" border-2 h-1 rounded-l-3xl border-gray-300"></div>
            </li>

            <li class=" nav-item position-relative  border-0" role="presentation">
                <a class=" text-center px-4  border-0 font-['poppins'] text-[12px] text-[#001820]" id="" data-bs-toggle="pill" href="" @click="activetab=2"
                    :class="[activetab === 2 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']" role="tab" aria-controls="" aria-selected="true">
                    PREVIOUS DOCUMENTS
                </a>
                <div v-if="activetab === 2"
                    class=" h-1 position-absolute bottom-[1px] left-0 w-[100%]" style="border: 2px solid #F9BE00 !important;"></div>
                <div v-else class=" border-3 h-1  border-gray-300"></div>
            </li>
            <li class=" nav-item position-relative  border-0" role="presentation">
                <a class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]" id="" data-bs-toggle="pill" href="" @click="activetab_btn3"
                    :class="[activetab === 3 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']" role="tab" aria-controls="" aria-selected="true">
                    PERSONAL DOCUMENTS
                </a>
                <div v-if="activetab === 3"
                    class="h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0"  style="border: 2px solid #F9BE00 !important;"></div>
                <div v-else class=" border-3 h-1 rounded-r-3xl border-gray-300"></div>

            </li>
            <div class="border-gray-300 border-b-[4px]  w-100 mt-[-7px]"></div>
            <!-- <li class=" nav-item position-relative  border-0" role="presentation">
                <a class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]" id="" data-bs-toggle="pill" href="" @click="activetab_btn3"
                    :class="[activetab === 3 ? 'active font-semibold ' : 'font-medium !text-[#8B8B8B]']" role="tab" aria-controls="" aria-selected="true">
                    PERSONAL DOCUMENTS
                </a>
                <div v-if="activetab === 3"
                    class="h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0"  style="border: 2px solid #F9BE00 !important;"></div>
                <div v-else class=" border-3 h-1 rounded-r-3xl border-yellow-300"></div>
            </li> -->
            <!-- <div class="border-gray-300 border-b-[4px]  w-100 mt-[-7px]"></div> -->
             <!-- <li class=" nav-item position-relative  border-0" role="presentation">
                <a class=" text-center px-4  border-0 font-['poppins'] text-[14px] text-[#001820]" id="" data-bs-toggle="pill" href="" @click="activetab_btn2"
                    :class="[activetab === 4 ? 'active font-semibold' : 'font-medium !text-[#8B8B8B]']" role="tab" aria-controls="" aria-selected="true">
                    PREVIOUS DOCUMENTS
                </a>
                <div v-if="activetab === 4"
                    class=" h-1 position-absolute bottom-[1px] left-0 w-[100%]" style="border: 2px solid #F9BE00 !important;"></div>
                <div v-else class=" border-3 h-1  border-yellow-300"></div>
            </li>  -->
        </ul>
        <!-- </div> -->
        <!-- Tab Content -->
        <div class="tab-content" id="">
            <div>
                <div class="card-body">
                    <div v-if="activetab === 1">
                  
                    </div>
                    <div v-if="activetab === 2">
                        <!-- <EmployeeSummary /> -->
                        <div class=" text-sm">
                            <div class=" bg-white p-2 py-15  ">
                                <div class="flex justify-between items-center bottom-12  border-b-2 py-3">
                                    <div class=" flex items-center  ">
                                        <img src='../../../assests/images/Aadhaar-Logo 1.png' class=" ">
                                        <p class="text-[14px] font-bold ml-5">Aadhar card front </p>
                                    </div>
                                    <div class="">
                                        <i class="pi pi-ellipsis-v" ></i>
                                    </div>
                                </div>
                                <div class="flex gap-32 ml-5 py-3">
                                    <div class="grid grid-rows-2 ">
                                        <p class="mt-3">Aadhar Number</p>
                                        <p class="font-bold mt-1 ">9123  7272  1928</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p class="mt-3">Name</p>
                                        <p class="font-bold mt-1 ">Suba shri</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p class="mt-3">Date of Birth</p>
                                        <p class="font-bold mt-1">Not Available</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p class="mt-3">Gender</p>
                                        <p class="font-bold mt-1">Female</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p class="mt-3">Enrollment Number</p>
                                        <p class="font-bold mt-1">N/A</p>
                                    </div>
                                    <div class="grid grid-rows-4">
                                        <p>Address</p>
                                        <p class="font-bold">ABS,</p>
                                        <P class="font-bold">North Phase Industrial Estate, Kalaimagal Nagar,</P>
                                        <p class="font-bold">Ekkatuthangal,Chennai-600032</p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <br>
                        <!-- <div class="font-[poppins]">
                            <div class=" bg-white p-10 py-20 ">
                                <div class="flex relative bottom-12  border-b-2 py-3">
                                    <img src='../../../assests/images/Aadhaar-Logo 1.png' class="text-lg">
                                    <p class="text-[14px] font-semibold  ml-6">Aadhar card Back </p>
                                    <i class="pi pi-ellipsis-v" ></i>
                                </div>
                                <div class="flex gap-24 ml-5">
                                    <div class="grid grid-rows-2">
                                        <p>Aadhar Number</p>
                                        <p class="font-bold">9123  7272  1928</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Name</p>
                                        <p class="font-bold">Suba shri</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Date of Birth</p>
                                        <p class="font-bold">Not Available</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Gender</p>
                                        <p class="font-bold">Female</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Enrollment Number</p>
                                        <p class="font-bold">N/A</p>
                                    </div>
                                    <div class="grid grid-rows-4">
                                        <p>Address</p>
                                        <p class="font-bold">ABS,</p>
                                        <P class="font-bold">North Phase Industrial Estate, Kalaimagal Nagar,</P>
                                        <p class="font-bold">Ekkatuthangal,Chennai-600032</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <br>
                        <div class="font-[poppins]  text-sm">
                            <div class=" bg-white p-2 py-10 ">
                                <div class="flex justify-between items-center bottom-12  border-b-2 ">
                                    <div class="flex items-center ">
                                    <img src='../../../assests/images/Frame 35676.png' class=" ">
                                    <p class="text-[14px] font-semibold   ml-1">PANcard</p>
                                </div>
                                <div class="">
                                    <i class="pi pi-ellipsis-v" ></i>
                                </div>
                                </div>
                                <div class="flex  leading-7 gap-48 ml-5 py-3">
                                    <div class="grid grid-rows-2">
                                        <p>Permanent Acc No</p>
                                        <p class="font-bold">GOUPM9956M</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Name</p>
                                        <p class="font-bold">Suba shri</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Date of Birth</p>
                                        <p class="font-bold">Not Available</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Gender</p>
                                        <p class="font-bold">Female</p>
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <p>Parents Name</p>
                                        <p class="font-bold">Not Available</p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <br>
                       
                           
                        
                       

                    </div>
                  
                    <div v-if="activetab === 3">
                     
                    </div>
                    <div v-if="activetab === 4">
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- {{ EmployeeDocumentManagerService.getEmployeeDetails }} -->

</template>

<script setup>
import { ref, reactive, onMounted } from "vue";
import axios from "axios";
import { useToast } from "primevue/usetoast";
import { UseEmployeeDocumentManagerService } from '../EmployeeDocumentsManagerService';
import { profilePagesStore } from "../stores/ProfilePagesStore";

const EmployeeDoc = ref([]) ;
const activetab = ref(1);

onMounted(() => {
    EmployeeDocumentManagerService.fetch_EmployeeDocument();
    console.log(" ", view_document.value);

    console.log("employeeDetails employee_documents " ,usedata.employeeDetails.employee_documents);
    EmployeeDoc.value  = usedata;
})

let usedata = profilePagesStore();
// Stores
const EmployeeDocumentManagerService = UseEmployeeDocumentManagerService();



// Loading
const toast = useToast();
const visible = ref(false)

// View Documents
const view_document = ref({});
const documentPath = ref();

// Upload Documents
const UploadDocument = ref();
const uploadDocs = ref();

//Get and Append Filename and Filepath
const fileName = ref()
const formdata = new FormData()

const errorstatus  =ref();


const showDocument = (document) => {
    visible.value = true
    EmployeeDocumentManagerService.loading = true;
    axios.post('/view-profile-private-file', {
        user_code: usedata.user_code,
        document_name: document.document_name
    }).then(res => {
        documentPath.value = res.data.data
        console.log("data sent", documentPath.value);
    }).finally(() => {
        EmployeeDocumentManagerService.loading = false;
    })
}

const getSeverity = (status) => {
    switch (status) {
        case 'Rejected':
            return 'danger';

        case 'Approved':
            return 'success';


        case 'Pending':
            return 'warning';

    }
};

const statuses = ref(["Pending", "Approved", "Rejected"]);


const getFileName = (filename) => {
    fileName.value = filename
}

const uploadDocument = (e) => {
    console.log(fileName);
    // Check if file is selected
    if (e.target.files && e.target.files[0]) {
        // Get uploaded file
        uploadDocs.value = e.target.files[0];
        // Get file size
        // Print to console
        formdata.append(`${fileName.value}`, uploadDocs.value);
        formdata.append('user_code',usedata.employeeDetails.user_code);

        console.log(formdata);
        // console.log("testing", fileName.value);

        let val = Object.keys(formdata)[0]

        // console.log();
    }
};

async function submitEmployeeDocsUpload() {

    if ( errorstatus.value == "Failure" ) {
        Swal.fire({
                    title: errorstatus.value = "Failure",
                    text:  'Please upload all mandatory documents',
                    icon: "error",
                    showCancelButton: false,
                }).then((result) => {
                    //   window.location.reload();
                });

    }
    else {
        EmployeeDocumentManagerService.loading = true;

        let url = "/profile-page/saveEmployeeDocument";
        axios.post(url, formdata)
            .then((res) => {

                errorstatus.value = res.data.status

                console.log( errorstatus.value );
                console.log("Photo not send");


                if (res.data.status == "Success") {
                Swal.fire({
                    title: res.data.status = "Success",
                    text: res.data.message,
                    icon: "success",
                    showCancelButton: false,
                }).then((result) => {
                    // window.location.reload();
                });
            }
                else if (res.data.status == "Failure") {
                    Swal.fire({
                        title: res.data.status = "Failure",
                        text: res.data.message,
                        icon: "error",
                        showCancelButton: false,
                    }).then((result) => {
                        // window.location.reload();
                    });
                }
            })
            .finally(() => {
                usedata.fetchEmployeeDetails();
                EmployeeDocumentManagerService.fetch_EmployeeDocument();
                EmployeeDocumentManagerService.loading = false ;
            });
    }
}



</script>


<style>
.p-sidebar-right .p-sidebar
{
    width: 50%;
    height: 100%;
}
</style>
