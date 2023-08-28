<template>
    <div class="d-flex justify-content-end">
        <label for="" class="my-2 text-lg font-semibold">Select Month</label>
        <Calendar view="month" dateFormat="mm/yy" class="mx-4 " v-model="managePayslipStore.selectedPayRollDate"
            style=" border: 1px solid orange; border-radius: 7px; height: 38px;" />
        <Button class="h-10 mb-2 btn btn-orange" label="Generate"
            @click="managePayslipStore.getAllEmployeesPayslipDetails(managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear())" />
        <!-- {{ managePayslipStore.array_employees_list.user_code.data.data }} -->
    </div>
    <div class="my-4">

        <DataTable :value="managePayslipStore.array_employees_list" :paginator="true" :rows="10" dataKey="id"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll"
            v-model:filters="filters" filterDisplay="menu" :loading="loading2" :globalFilterFields="['name', 'status']">
            <Column headerStyle="width: 3rem"></Column>
            <Column field="user_code" header="Employee Code" headerStyle="width: 3rem">
            </Column>
            <Column field="name" header="Employee Name"></Column>
            <Column field="email" header="Personal Mail"></Column>
            <Column field="is_payslip_released" header="Payslip Status">
                <template #body="slotProps">
                    <div class="d-flex flex-column">

                        <button class="z-0 btn" style="border:1px solid navy ;" v-if="slotProps.data.is_payslip_released == 1"  @click="showWithdraw_confimationDialog(slotProps.data.user_code)" >withdraw</button>

                    <button class="z-0 rounded btn-primary" v-else style="padding: 4px 0 !important; margin-top: 10px;"  @click="showReleasePayslipConfirmationDialog(slotProps.data.user_code)">Release payslip</button>

                     <!-- {{slotProps.data.is_payslip_released}} -->
                     <h1 v-if="slotProps.data.is_payslip_released == 1"  class="mt-2 text-success">
                        Released
                     </h1>
                     <h1 v-if="slotProps.data.is_payslip_released == 0 || slotProps.data.is_payslip_released == null"  class="mt-2 text-danger">
                       Not Released
                     </h1>
                     <!-- {{is_payslip_released}} -->
            </div>

                </template>

            </Column>
            <Column field="is_payslip_mail_sent" header="Mail Status">
              <template #body="slotProps">
                <div v-if="slotProps.data.is_payslip_mail_sent == 1" >
                   <h1> Payslip sent</h1>
                </div>
                <div v-else>
                    <button class="z-0 rounded btn-primary" @click="showConfirmationDialog(slotProps.data.user_code)">Send Payslip</button>
                </div>
                </template>
            </Column>

            <Column header="Download">
                <template #body="slotProps">
                    <Button class="z-0 btn-primary" style="" label="Download" @click="showdownloadPayslipConfirmationDialog(slotProps.data.user_code,slotProps.data.payroll_date,slotProps.data.name)" />
                </template>
            </Column>
            <Column header="View Payslip">
                <template #body="slotProps">
                    <Button class="z-0 btn-primary" style="" label="View" @click="showPaySlipHTMLView(slotProps.data.user_code)" />
                </template>
            </Column>

            <!-- <Column header="Action">
                <Button class="btn-success" label="Send Mail" @click="managePayslipStore.sendMail_employeePayslip(slotProps.data.user_code, selectedPayRollDate.selectDate.getMonth() + 1, selectedPayRollDate.selectDate.getFullYear() )" />
                <template #body="slotProps">
                    <button class="rounded btn-success" @click="showConfirmationDialog(slotProps.data.user_code)">Send Mail</button>
                </template>

            </Column> -->
        </DataTable>

        <button class="p-2 bg-black text-[12px] text-white mt-10" @click="viewpayslip = true">view</button>

    </div>


    <Dialog header="Confirmation" v-model:visible="show_dialogconfirmation"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
        <div class="confirmation-content">

            <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
            <span>Are you sure you want to send Mail ?</span>
        </div>

            <div class="d-flex mt-11 " style="position: relative; right: -180px; width: 140px;">

                <Button class="py-2 mr-3 btn-primary" label="Yes" icon="pi pi-check"
                    @click="sendMail(selectedUserCode)"
                    autofocus />

                <Button label="No" icon="pi pi-times" @click="show_dialogconfirmation = false" class="py-2 p-button-text" autofocus />

            </div>

    </Dialog>

    <!-- show withdraw button -->

    <Dialog header="Confirmation" v-model:visible="show_withdraw_dialogConfirmation"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
        <div class="confirmation-content">

            <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
            <span>Are you sure you want to send Mail ?</span>
        </div>

            <div class="d-flex mt-11 " style="position: relative; right: -180px; width: 140px;">

                <Button class="py-2 mr-3 btn-primary" label="Yes" icon="pi pi-check"
                    @click="UpdateWithDrawStatus(selectedUserCode)"
                    autofocus />

                <Button label="No" icon="pi pi-times" @click="show_withdraw_dialogConfirmation = false" class="py-2 p-button-text" autofocus />

            </div>

    </Dialog>

    <Dialog header="Confirmation" v-model:visible="show_releasePayslip_dialogconfirmation"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
        <div class="confirmation-content">

                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to release payslip? {{ managePayslipStore.name }} </span>
            </div>

        <div class="d-flex mt-11 " style="position: relative; right: -180px; width: 140px;">

                <Button class="py-2 mr-3 btn-primary" label="Yes" icon="pi pi-check"
                    @click="updatePayslipReleaseStatus(selectedUserCode)"
                    autofocus />

                <Button label="No" icon="pi pi-times" @click="show_releasePayslip_dialogconfirmation = false" class="py-2 p-button-text" autofocus />

        </div>

    </Dialog>
    <Dialog header="Confirmation" v-model:visible="show_downloadPayslip_dialogconfirmation"
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }" :style="{ width: '350px' }" :modal="true">
        <div class="confirmation-content">

                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to download payslip? {{ managePayslipStore.name }} </span>
            </div>

        <div class="d-flex mt-11 " style="position: relative; right: -180px; width: 140px;">

                <Button class="py-2 mr-3 btn-primary" label="Yes" icon="pi pi-check"
                    @click="downloadPayslip(selectedUserCode,selectedUsername)"
                    autofocus />

                <Button label="No" icon="pi pi-times" @click="show_downloadPayslip_dialogconfirmation = false" class="py-2 p-button-text" autofocus />

        </div>

    </Dialog>



    <div class="flex inline-flex card justify-content-center">
        <Dialog v-model:visible="canShowPayslipHTMLView" modal header="Payslip" :breakpoints="{ '960px': '75vw', '640px': '90vw' }">
            <div v-html="managePayslipStore.paySlipHTMLView" ></div>
        </Dialog>
    </div>
    <Dialog header="Header" v-model:visible="managePayslipStore.loading" :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '25vw' }" :modal="true" :closable="false" :closeOnEscape="false">
        <template #header>
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration="2s" aria-label="Custom ProgressSpinner" />
        </template>
        <template #footer>
            <h5 style="text-align: center">Please wait...</h5>
        </template>
    </Dialog>


    <Dialog v-model:visible="viewpayslip" modal header="Payslip" :style="{ width: '58vw' }">
        {{ managePayslipStore.paySlipHTMLView.data.salary_details }}
        <div class="w-[100%] h-[100]%">
            <div class="w-[100%] flex justify-between">
                <div class="flex flex-col">
                    <h1 class=" text-[25px] ">PAYSLIP <span class=" text-gray-500 text-[25px]">MAR 2023</span></h1>
                    <h2 class=" text-[16px] mt-[10px] text-[#000]" v-for="item in managePayslipStore.paySlipHTMLView.data.client_details" :key="item">{{item.client_fullname }}</h2>
                    <p class=" w-[300px] mt-[10px]"  v-for="item in managePayslipStore.paySlipHTMLView.data.client_details" :key="item">{{ item.address}}</p>
                </div>
                <div v-for="item in managePayslipStore.paySlipHTMLView.data.client_details" :key="item">
                    <img :src="`${item.client_logo}`" alt="testing">
                </div>
            </div>
            <div class="mt-[30px]">
                <h1 class="font-semibold  text-[16px] my-[16px]" v-for="item in managePayslipStore.paySlipHTMLView.data.personal_details" :key="item" > Employee Name : {{item.name }}</h1>
                <div class="border-[1.5px] border-[#000] my-[12px]"></div>
                <div class="mx-2 row border-b-[1px] border-[gray] py-2" v-for="item in managePayslipStore.paySlipHTMLView.data.personal_details" :key="item" >
                    <div class="col-3">
                        <p class="">Employee Code</p>
                        <p class=" text-[#000] text-[12px]" >{{ item.user_code }}</p>
                    </div>
                    <div class="col-3">
                        <p>Date Joining</p>
                        <p class=" text-[#000]">{{  item.doj }}</p>
                    </div>
                    <div class="col-3">
                        <p>Designation</p>
                        <p class=" text-[#000]">{{ item.designation }}</p>
                    </div>
                    <div class="col-3">
                        <p>Department</p>
                        <p class=" text-[#000]">{{ item.department_name }}</p>
                    </div>
                </div>
                <div class="mx-2 row border-b-[1px] border-[gray] py-2"  v-for="item in managePayslipStore.paySlipHTMLView.data.personal_details" :key="item">
                    <div class="col-3">
                        <p>Payment Mode</p>
                        <p class=" text-[#000]">{{  }}</p>
                    </div>
                    <div class="col-3">
                        <p>Bank Name</p>
                        <p class=" text-[#000]">{{item.bank_name}}</p>
                    </div>
                    <div class="col-3">
                        <p>Bank Account</p>
                        <p class=" text-[#000]">{{ item.bank_account_number }}</p>
                    </div>
                    <div class="col-3">
                        <p>Bank ISFC</p>
                        <p class=" text-[#000]">{{ item.bank_ifsc_code }}</p>
                    </div>
                </div>
                <div class="py-2 mx-2 row" v-for="item in managePayslipStore.paySlipHTMLView.data.personal_details" :key="item">
                    <div class="col-3">
                        <p>PAN</p>
                        <p class=" text-[#000]"> {{item.pan_number}}</p>
                    </div>
                    <div class="col-3">
                        <p>ESIC</p>
                        <p class=" text-[#000]">Date Joined</p>
                    </div>
                    <div class="col-3">
                        <p>UAN</p>
                        <p class=" text-[#000]">{{item.uan_number}}</p>
                    </div>
                    <div class="col-3">
                        <p>EPF Number</p>
                        <p class=" text-[#000]">{{ item.epf_number }}</p>
                    </div>
                </div>
                     <div class="border-[1.5px] border-[#000] my-[12px]"></div>
            </div>

            <div class="">
                <h1 class="font-semibold  text-[16px] my-[16px]">LEAVE DETAILS</h1>
                <div class="border-[1.5px] border-[#000] my-[12px]"></div>

                <div class="py-2 mx-2 row"  >
                    <div class="col-3">
                        <p>Leave Type</p>
                        <p class=" text-[#000]" v-for="item in managePayslipStore.paySlipHTMLView.data.leave_data"  :key="item" >{{ item.leave_type }}</p>
                    </div>
                    <div class="col-3" >
                        <p>Opening Balance</p>
                        <p class=" text-[#000]"  v-for="item in managePayslipStore.paySlipHTMLView.data.leave_data"  :key="item" >{{ item.opening_balance }}</p>
                    </div>
                    <div class="col-3">
                        <p>Availed</p>
                        <p class=" text-[#000]" v-for="item in managePayslipStore.paySlipHTMLView.data.leave_data"  :key="item" >{{ item.avalied }}</p>
                    </div>
                    <div class="col-3">
                        <p>Closing Balance</p>
                        <p class=" text-[#000]" v-for="item in managePayslipStore.paySlipHTMLView.data.leave_data"  :key="item" >{{ item.closing_balance }}</p>
                    </div>
                </div>


            </div>

            <div class="">
                <h1 class="font-semibold  text-[16px] my-[16px]">SALARY DETAILS</h1>
                <div class="border-[1.5px] border-[#000] my-[12px]"></div>
                <div class="py-2 mx-2 row"  v-for="item in managePayslipStore.paySlipHTMLView.data.salary_details" :key="item" >
                    <div class="col-3">
                        <p>ACTUAL PAYABLE DAYS</p>
                        <p class=" text-[#000]">{{item.month_days }}</p>
                      
                    </div>
                    <div class="col-3">
                        <p>TOTAL WORKING DAYS</p>
                        <p class=" text-[#000]">{{ item.worked_Days }}</p>
                    </div>
                    <div class="col-3">
                        <p>LOSS OF PAY DAYS</p>
                        <p class=" text-[#000]">{{ item.lop }}</p>
                    </div>
                    <div class="col-3">
                        <p>ARREAR DAYS PAYABLE</p>
                        <p class=" text-[#000]">{{ item.arrears_Days}}</p>
                    </div>
                </div>
            </div>

            <div class="row mt-2 py-2 border-y-[1px] border-[gray] mx-2">
                <div class="col-7 border-r-[1.4px] border-[gray]">
                    <table class=" w-[100%]" >
                        <tr class="w-[100%]">
                            <td><h1 class="font-semibold ">Earnings</h1>
                            </td>
                            <td> <h1 class="font-semibold ">Fixed</h1></td>
                            <td> <h1 class="font-semibold">Earned</h1> </td>
                            <td></td>
                        </tr>
                        <tr class="w-[100%]">
                            <td><h1 class="my-2 ">basic</h1>
                            </td>
                            <td><h1 class="my-2 ">129</h1>
                            </td>
                            <td><h1 class="my-2 ">123</h1>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="w-[100%]">
                            <td><h1 class="my-2 ">HRS</h1>
                            </td>
                            <td><h1 class="my-2 ">129</h1>
                            </td>
                            <td><h1 class="my-2 ">123</h1>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="w-[100%]">
                            <td><h1 class="my-2 ">special Allowance</h1>
                            </td>
                            <td><h1 class="my-2 ">129</h1>
                            </td>
                            <td><h1 class="my-2 ">123</h1>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="w-[100%]">
                            <td><h1 class=" my-2 text-[#000]">Total Earnings(A) </h1>
                            </td>
                            <td><h1 class="my-2 ">129</h1>
                            </td>
                            <td><h1 class="my-2 ">123</h1>
                            </td>
                            <td></td>
                        </tr>
                    </table>

                </div>
                <div class="col">
                    <table border="2" class=" w-[100%]">
                        <tr class="w-[100%]">
                            <td >
                                <h1 class="font-semibold ">CONTRIBUTIONS</h1>
                                <p class=" my-2 text-[#000]">EPF Employee</p>
                                <p class=" my-2 text-[#000]">Total Contributions (B)</p>
                                <p class=" my-2 text-[#000]">TAXES <span>&</span> DEDUCTIONS</p>
                                <p class=" my-2 text-[#000]">Professional Tax</p>
                                <p class=" my-2 text-[#000]">Total Deduction(c)</p>
                            </td>
                            <td>
                                <h1 class="font-semibold "></h1>
                                <p class=" my-2 text-[#000]">1232</p>
                                <p class=" my-2 text-[#000]">1232</p>
                                <p class=" my-2 text-[#000]">1232</p>
                                <p class=" my-2 text-[#000]">1232</p>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="mt-4 row w-[100%] ">
                <div class="my-2 col-5"><p class="">Net Salary Payable(A-B-C) </p></div>
                <div class="my-2 col-7">
                    <p> <span class=" font-sans text-[18px]">₹ </span> 39888</p>
                </div>
                <div class="my-2 col-5"><p class="">Net Salary in words </p></div>
                <div class="my-2 col-7">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga,</p>
                </div>
            </div>
            <div>
                <p class="mt-2 ">*** Note:All amounts displayed in this payslips are in INR</p>
                <p class="mt-[50px]">**This is computer generated statement,does not require signature.</p>
            </div>
            <div class="">
                <div class="flex items-center float-right">
                    <p>Generated</p>
                    <img src="" alt="" class="border w-[140px] h-[50px]" >
                </div>
            </div>


        </div>
    </Dialog>
</template>

<script setup>
import { ref, onMounted, reactive, computed } from "vue";
import { useManagePayslipStore } from './ManagePayslipService';

const managePayslipStore = useManagePayslipStore();

const canShowPayslipHTMLView = ref(false);
const show_dialogconfirmation = ref(false);
const show_releasePayslip_dialogconfirmation = ref(false);
const show_downloadPayslip_dialogconfirmation = ref(false);

const show_withdraw_dialogConfirmation = ref(false);

const selectedPayRollDate = ref();

const selectedUserCode = ref();
const selectedUsername = ref();
const selectedMonth = ref();

const viewpayslip = ref(false);

onMounted( () => {
   managePayslipStore.selectedPayRollDate = new Date()
   managePayslipStore.getAllEmployeesPayslipDetails(managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear())

});



async function showPaySlipHTMLView(selected_user_code) {
    console.log("Showing payslip html for (user_code, month): " + selected_user_code + " , " + parseInt(managePayslipStore.selectedPayRollDate.getMonth() + 1));

    await managePayslipStore.getEmployeePayslipDetailsAsHTML(selected_user_code, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());

    // canShowPayslipHTMLView.value = true;
    viewpayslip.value = true;

    console.log(viewpayslip.value);


}

function showConfirmationDialog(selected_user_code) {
    selectedUserCode.value = selected_user_code;

    show_dialogconfirmation.value = true;

}

function showReleasePayslipConfirmationDialog(selected_user_code) {
    selectedUserCode.value = selected_user_code;

    show_releasePayslip_dialogconfirmation.value = true;
}
function showdownloadPayslipConfirmationDialog(selected_user_code,selected_user_name) {
    selectedUserCode.value = selected_user_code;
    selectedUsername.value = selected_user_name
    show_downloadPayslip_dialogconfirmation.value = true;
}

async function sendMail(selectedUserCode) {

    await managePayslipStore.sendMail_employeePayslip(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
    show_dialogconfirmation.value = false;

}

async function updatePayslipReleaseStatus(selectedUserCode) {
    await managePayslipStore.updatePayslipReleaseStatus(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear(), 1);
    show_releasePayslip_dialogconfirmation.value = false;

}
async function showWithdraw_confimationDialog(selected_user_code){
    selectedUserCode.value = selected_user_code;
    show_withdraw_dialogConfirmation.value = true;
}
async function UpdateWithDrawStatus(selectedUserCode) {
    await managePayslipStore.UpdateWithDrawStatus(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear(), 0);
    show_withdraw_dialogConfirmation.value = false;

}

// async function downloadPayslip(selectedUserCode) {
//     await managePayslipStore.downloadPayslip(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
//     show_downloadPayslip_dialogconfirmation.value = false;

// }
async function downloadPayslip(selectedUserCode,selectedUsername) {
    await managePayslipStore.downloadEmployeePaySlipPdf(selectedUserCode, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear(),selectedUsername);
    show_downloadPayslip_dialogconfirmation.value = false;

}



</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-dialog-mask .p-component-overlay .p-component-overlay-enter {
    z-index: 0 !important;
}

.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1rem 0.5rem;
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

.p-datatable .p-datatable-tbody>tr>td {
    text-align: left;
    border: 1px solid #dee2e6;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-width: 0 0 1px 0;
    padding: 1rem 0.6rem;
}


.pending {
    font-weight: 700;
}

.approved {
    font-weight: 700;
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
    width: 55%;
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
</style>


{

<!--



<template>
    <div class="flex card justify-content-center">
        <Button label="Show" icon="pi pi-external-link" @click="visible = true" />
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50vw' }">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <template #footer>
                <Button label="No" icon="pi pi-times" @click="visible = false" text />
                <Button label="Yes" icon="pi pi-check" @click="visible = false" autofocus />
            </template>
        </Dialog>
    </div>
</template>

<script setup>
import { ref } from "vue";

const visible = ref(false);
</script>

-->


}
