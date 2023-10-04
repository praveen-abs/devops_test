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
<!-- {{ EmployeeDocumentManagerService.getEmployeeDetails }} -->

</template>

<script setup>
import { ref, reactive, onMounted } from "vue";
import axios from "axios";
import { useToast } from "primevue/usetoast";
import { UseEmployeeDocumentManagerService } from '../EmployeeDocumentsManagerService';
import { profilePagesStore } from "../stores/ProfilePagesStore";

const EmployeeDoc = ref([]) ;

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
    width: 50% !important;
    height: 100%;
}
</style>
