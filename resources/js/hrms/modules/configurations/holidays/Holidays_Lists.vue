<template>
    <div class="conainer-fluid main-body p-5">
        <div class="head-contant d_spc_bt">
            <h3>Holiday Summary</h3>

            <div class="holiday-settings-btns mb-4">
                <ul class="d-flex">
                    <li><button class="cancel_btn">Cancel</button></li>
                    <li><button class="view_Lists">View Lists</button></li>
                    <li><button class="add_new_holiday_btn"  @click="visible = true"> Add New Holiday</button></li>
                </ul>
            </div>
        </div>

        <!-- row-cols-1 row-cols-md-3 g-4 -->
        <div class="container-fluid">
            <div class="row">

            <div class="col-lg ">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw'  }" class="popup_card">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-lg  ">
                <div class="card-title m-0 d_spc_bt">
                    <h3>May day</h3>
                    <span>May1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/May_day.jpg" class="card-img-top" alt="...">

                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                    <div class="formgrid">
                                    <input  type="file" id="upload"
                                        hidden />
                                    <label id="file_upload" for="upload"> Edit</label>
                                    </div>
                                </div>


                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button>Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-lg ">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-lg ">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>

            <div class="col-lg">
                <div class="card-title m-0 d_spc_bt">
                    <h3>New year</h3>
                    <span>Jan1 (sunday)</span>
                </div>
                <div class="card  clr-trans card-w">
                    <img src="../../../../../images/holiday/photo_2023-03-22_11-14-58.jpg" class="card-img-top" alt="...">
                    <div class="overlay"></div>
                    <div class="hover_btn_div d-ard">
                        <Button label="Edit" @click="visible = true">
                            Edit
                            <Dialog v-model:visible="visible" modal header="Holiday " :style="{ width: '25vw' }">
                                <div class="img_container">
                                    <img src=".//../../../../../images/holiday/Holi.jpg" alt="" class="card-img">
                                </div>
                                <div class="card-title">
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Festival Title</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Description</label>
                                        <InputText id="username" v-model="value" aria-describedby="username-help" />
                                    </div>
                                    <div class="flex flex-column gap-2 mt-5">
                                        <label for="username">Date</label>
                                        <Calendar inputId="icon" dateFormat="dd-mm-yy" :showIcon="true"
                                            :minDate="new Date()" />
                                    </div>

                                </div>
                                <template #footer>
                                    <Button label="Close" @click="visible = false" text />
                                    <Button label="Submit" icon="pi pi-check" @click="visible = false" autofocus />
                                </template>
                            </Dialog>
                        </button>
                        <button @click="remove">Remove</button>
                    </div>
                </div>
            </div>

        </div>
        </div>

        <!--  -->
    </div>
</template>






<script setup>

import { ref, onMounted } from "vue";
import dateFormat, { masks } from "dateformat";
import axios from "axios";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";



onMounted(() => {
    ajax_GetEmployeeDetails();
});


function ajax_GetEmployeeDetails() {
    let url = window.location.origin + "/attendance_settings/fetch-emp-details";

    console.log("AJAX URL : " + url);


    axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        att_emp_details.value = response.data;
        loading.value = false;
    });

    // axios.get("url").then(res =>)
}


//
const visible = ref(false);


const value = ref(null);
const date = ref();


const toast = useToast();

const onAdvancedUpload = () => {
    toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};


</script>



<style lang="scss">
.bg-orange {
    background: var(--clr-orange);
}

:root {
    --clr-blue: #002f56;
    --clr-orange: rgb(255, 83, 10);
    --clr-drk-gray: #6c757d;
    --clr-gray: #646464;
    --clr-lit-gray: #e2e2e2;
    --clr-med-gray: #c9c9c9;
    --clr-white: #fff;
}

.clr-trans {
    background: transparent !important;
}

.d-flex {
    display: flex;


}

.d_spc_bt {
    display: flex;
    align-content: center;
    justify-content: space-between;
}

li {
    list-style: none;
}

/* .holiday-settings-btns ul {

} */
.holiday-settings-btns ul>li {}

.holiday-settings-btns button {
    padding: 6px 30px;
    border-radius: 4px !important;
    font-weight: 500;
    font-size: 15px;
    font-family: sans-serif;
}

.cancel_btn {
    border: 1px solid var(--clr-orange);
    color: var(--clr-orange);
    background: var(--clr-white);
    margin: 0 10px;
}

.view_Lists {
    background: var(--clr-blue) !important;
    color: var(--clr-white);
    border: 1px solid var(--clr-blue);
    border-radius: 4px !important;
    margin: 0 10px;
}

.add_new_holiday_btn {
    background: var(--clr-orange);
    border: 1px solid var(--clr-orange);
    color: var(--clr-white);
    margin: 0 0 0 10px;
}

.card-title h3 {
    font-weight: 600;
    margin: 0;
}

.card-title span {
    margin: 0;
    color: var(--clr-drk-gray);
    font-size: 14px;
    line-height: 36px;
    font-family: sans-serif;
}

.card-title {
    width: 95%;
}

.cd-img {
    position: relative;
}

.col_w {
    width: 10rem;
    height: 23rem;
    padding: 0;
    margin: 0;
}

.hover_btn_div {
    position: absolute;
    top: 45%;
    left: 23%;
    width: 50%;
    // border: 1px solid white;
}

.hover_btn_div button {
    border: 1px solid var(--clr-white) !important;
    background: transparent;
    color: var(--clr-white);
    padding: 4px 12px;
    font-size: 18px;
    border-radius: 2px;
    visibility: hidden;
}

.d-ard {
    display: flex;
    justify-content: space-around;
    align-content: center;
}

.card-img-top {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

.card-w:hover  .hover_btn_div>button {
    visibility: visible;
    cursor: pointer;
    transition: 0.6s ease-in-out !important;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
}

.card-w:hover .overlay{
    background: rgba(0, 0, 0, 0.349);
    transition: 0.3s ease-in-out;
}

.p-datepicker .p-datepicker-header {
    padding: 0.5rem;
    color: #061328;
    background: #002f56;
    font-weight: 600;
    margin: 0;
    border-bottom: 1px solid #dee2e6;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}

.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-year,
.p-datepicker .p-datepicker-header .p-datepicker-title .p-datepicker-month {
    color: #fff;
    transition: background-color 0.2s, color 0.2s, box-shadow 0.2s;
    font-weight: 600;
    padding: 0.5rem;
}

.p-datepicker:not(.p-datepicker-inline) .p-datepicker-header {
    background: #002f56;
    color: black;
}

.p-calendar-w-btn .p-datepicker-trigger {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    background: #002f56;
}

.card-img , .img_container{
    position: relative;
}

// #file_upload {
// }
.formgrid{
position: absolute;
bottom: 20px;
right:20px;

// border: 1px solid ;

color: #061328;
}
.formgrid label{
    font-size:20px !important;
    text-decoration: underline;
    color: var(--clr-blue);
    letter-spacing: 2px;
    line-height:20px;
}
@media screen {

}
</style>

<!-- <style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap");

.p-datatable .p-datatable-thead>tr>th {
    text-align: center;
    padding: 1.3rem 1rem;
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

.p-datatable .p-datatable-tbody>tr>td:nth-child(1) {
    width: 200px;
}

.p-datatable .p-datatable-tbody>tr>td:nth-child(3) {
    width: 150px;
}

.p-datatable .p-datatable-tbody>tr>td:nth-child(6) {
    width: 200px;
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

.p-datatable .p-datatable-thead>tr>th .p-column-filter {
    width: 44%;
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
</style> -->

{



<!-- <script setup>
import { useToast } from "primevue/usetoast";

</script> -->
}
