<template>
  <Toast />
  <!-- Loading Spinner -->
  <Transition name="modal">
    <ABS_loading_spinner v-if="employee_service.loading_spinner" />
  </Transition>
  <div class="reimbursement-wrapper mt-30">
    <div class="mb-2 card left-line">
      <div class="pt-1 pb-1 card-body">
        <div class="row">
          <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
            <ul class="nav nav-pills nav-tabs-dashed" role="tablist">
              <li class="nav-item text-muted" role="presentation">
                <a
                  class="pb-2 nav-link active"
                  data-bs-toggle="tab"
                  href="#reimbursement"
                  aria-selected="true"
                  role="tab"
                  @click="employee_service.onclickSwitchToReimbursmentTab"
                >
                  Reimbursement
                </a>
              </li>

              <li class="nav-item text-muted ms-5" role="presentation">
                <a
                  class="pb-2 nav-link"
                  data-bs-toggle="tab"
                  href="#localConveyance"
                  aria-selected="true"
                  role="tab"
                  @click="employee_service.onclickSwitchToLocalCoverganceTab"
                >
                  Local Conveyance
                </a>
              </li>
            </ul>
          </div>
          <div
            class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 d-flex justify-content-end"
          >
          <Calendar v-model="selected_date" view="month" dateFormat="mm/yy" class=""
                style=" border: 1px solid orange; border-radius: 7px;" />

            <button label="Submit" class="btn btn-primary" severity="danger"
                :disabled="!selected_date == '' ? false : true" @click="generate_ajax"> <i class="fa fa-cog me-2"></i>
                Generate</button>
                <button class="btn btn-primary" :disabled="data_reimbursements == '' ? true : false" severity="success"
            @click="download_ajax"><i class="fas fa-file-download me-2"></i>Download</button>
            <button
              v-if="employee_service.reimbursementsScreen"
              @click="employee_service.onclickOpenReimbursmentDailog"
              class="btn btn-orange"
            >
              <i class="fa fa-plus-circle me-1"></i>Add Claim
            </button>

            <button
              v-if="employee_service.localconverganceScreen"
              @click="employee_service.onclickOpenLocalConverganceDailog"
              class="btn btn-orange"
            >
              <i class="fa fa-plus-circle me-1"></i>Add Claim
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane show fade active"
            id="reimbursement"
            role="tabpanel"
            aria-labelledby="pills-profile-tab"
          >
            <div id="table">
              <div>
                <div class="card">
                  <DataTable
                    ref="dt"
                    :value="employee_service.reimbursement_datas"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                    responsiveLayout="scroll"
                  >
                    <Column :exportable="false" style="min-width: 8rem">
                      <template #body="slotProps">
                        <Button
                          icon="pi pi-trash"
                          outlined
                          rounded
                          severity="danger"
                          @click="confirmDeleteProduct(slotProps.data)"
                        />
                      </template>
                    </Column>
                    <Column header="Claim Type" style="min-width: 8rem">
                      <template #body="slotProps">
                        {{ slotProps.data.claim_type }}
                      </template>
                    </Column>

                    <Column field="" header="Claim Amount" style="min-width: 12rem">
                      <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.claim_amount }}
                      </template>
                    </Column>

                    <Column field="" header="Eligible Amount" style="min-width: 12rem">
                      <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                      </template>
                    </Column>

                    <Column field="" header="Remarks" style="min-width: 12rem">
                      <template #body="slotProps">
                        {{ slotProps.data.reimbursment_remarks }}
                      </template>
                    </Column>
                    <Column field="" header="Status" style="min-width: 12rem">
                      <template #body="slotProps">
                        {{ slotProps.data.eligible_amount }}
                      </template>
                    </Column>
                    <Column field="" header="Date Of Dispatch" style="min-width: 12rem">
                      <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                      </template>
                    </Column>
                    <Column field="" header="Proof Of Delivery" style="min-width: 12rem">
                      <template #body="slotProps">
                        {{ "&#x20B9;" + slotProps.data.eligible_amount }}
                      </template>
                    </Column>
                  </DataTable>
                </div>

                <Dialog
                  v-model:visible="employee_service.reimbursements_dailog"
                  :style="{width: '450px'}"
                  header="Reimbursement Detials"
                  :modal="true"
                  class="p-fluid"
                >
                  <div class="field">
                    <label for="name">Claim Type</label>
                    <Dropdown
                      v-model="employee_service.employee_reimbursement.claim_type"
                      :options="employee_service.reimbursment_claim_types"
                      optionLabel="label"
                      optionValue="value"
                      placeholder="Select Claim Type"
                    ></Dropdown>
                  </div>

                  <div class="grid formgrid">
                    <div class="field col">
                      <label for="Claim Amount">Claim Amount</label>
                      <InputNumber
                        v-model="employee_service.employee_reimbursement.claim_amount"
                        mode="currency"
                        currency="INR"
                        locale="en-IN"
                      />
                    </div>

                    <div class="field col">
                      <label for="Eligible Amount">Eligible Amount</label>
                      <InputNumber
                        v-model="employee_service.employee_reimbursement.eligible_amount"
                        mode="currency"
                        currency="INR"
                        locale="en-IN"
                        integeronly
                      />
                    </div>
                  </div>
                  <div class="field">
                    <label class="mb-3">Remarks</label>
                    <div class="formgrid">
                      <Textarea
                        v-model="
                          employee_service.employee_reimbursement.reimbursment_remarks
                        "
                        autoResize
                        rows="2"
                        cols="30"
                      />
                    </div>
                  </div>
                  <div class="field">
                    <label class="mb-3">file Upload</label>
                    <div class="formgrid">
                      <input
                        @change="
                          employee_service.employee_reimbursement_attachment_upload(
                            $event
                          )
                        "
                        ref="employee_service.employee_reimbursement_attachment"
                        type="file"
                        id="upload"
                        hidden
                      />
                      <label id="file_upload" for="upload">Choose file</label>
                    </div>
                  </div>

                  <template #footer>
                    <Button
                      label="Cancel"
                      icon="pi pi-times"
                      style="height: 30px; color: black"
                      class="p-button-text"
                      @click="employee_service.hideDialog"
                    />
                    <Button
                      label="Save"
                      :disabled="
                        !employee_service.employee_reimbursement.claim_type == '' &&
                        !employee_service.employee_reimbursement.claim_amount == ''
                          ? false
                          : true
                      "
                      icon="pi pi-check"
                      style="height: 30px; background: rgb(255 135 38); color: white"
                      @click="employee_service.post_reimbursment_data"
                    />
                  </template>
                </Dialog>
              </div>
            </div>
          </div>
        </div>

        <!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->

        <!-- Local conveyance -->
        <div
          class="tab-pane fade"
          id="localConveyance"
          role="tabpanel"
          aria-labelledby="pills-profile-tab"
        >
          <div>
            <div class="card">
              <!-- <Dialog
                header="Header"
                v-model:visible="employee_service.loading_spinner"
                :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
                :style="{ width: '25vw'  }"
                :modal="true"
                :closable="false"
                :closeOnEscape="false"
              >
                <template #header>
                  <ProgressSpinner
                    style="width: 50px; height: 50px"
                    strokeWidth="8"
                    fill="var(--surface-ground)"
                    animationDuration="2s"
                    aria-label="Custom ProgressSpinner"
                  />
                </template>
                <template #footer>
                  <h5 style="text-align: center">Please wait...</h5>
                </template>
              </Dialog> -->
<!-- {{ employee_service.data_local_convergance }} -->
              <DataTable
                ref="dt"
                :value="employee_service.data_local_convergance"
                dataKey="id"
                :paginator="true"
                :rows="8"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records"
                responsiveLayout="scroll"
              >
                <!-- <Column :exportable="false" style="min-width: 8rem">
                  <template #body="slotProps">
                    <Button
                      icon="pi pi-trash"
                      outlined
                      rounded
                      severity="danger"
                      @click="confirmDeleteProduct(slotProps.data)"
                    />
                  </template>
                </Column> -->

                <Column
                  field="date"
                  header="Date"
                  style="min-width: 12rem"
                  dataType="date"
                >
                  <template #body="slotProps">
                    {{ moment(slotProps.data.date).format('DD-MMM-YYYY') }}
                  </template>
                </Column>
                <Column header="Mode Of Transport" style="min-width: 12rem">
                  <template #body="slotProps">
                    {{ slotProps.data.vehicle_type }}
                  </template>
                </Column>

                <Column field="from" header="From " style="min-width: 8rem">
                  <template #body="slotProps">
                    {{ slotProps.data.from }}
                  </template>
                </Column>
                <Column field="to" header="To" style="min-width: 8rem">
                  <template #body="slotProps">
                    {{ slotProps.data.to }}
                  </template>
                </Column>
                <Column
                  field="distance_travelled"
                  header="Total Distance"
                  style="min-width: 12rem"
                >
                  <template #body="slotProps">
                    {{ slotProps.data.distance_travelled }}
                  </template>
                </Column>
                <Column field="Amt_km" header="Amt/Km" style="min-width: 12rem">
                  <template #body="slotProps">
                    {{ slotProps.data.amt_per_km }}
                  </template>
                </Column>

                <Column
                  field="total_expenses"
                  header="Amount"
                  style="min-width: 12rem"
                >
                  <template #body="slotProps">
                    {{ slotProps.data.total_expenses }}
                  </template>
                </Column>
                <Column
                  field="user_comments"
                  header="Remarks"
                  style="min-width: 12rem"
                >
                  <template #body="slotProps">
                    {{ slotProps.data.user_comments }}
                  </template>
                </Column>
                <template #footer>
                  <div
                    class="text-center"
                    v-if="!employee_service.data_local_convergance.length == 0"
                  >
                    <Button
                      label="Submit"
                      icon="pi pi-check"
                      class="px-6"
                      style="background: #003056"
                    />
                  </div>
                </template>
              </DataTable>
            </div>

            <Dialog
              v-model:visible="employee_service.localconvergance_dailog"
              :style="{width: '450px'}"
              header="Local Conveyance"
              :modal="true"
              class="p-fluid"
            >

              <div class="field">
                <label for="name">Date <span class="text-danger">*</span></label>
                <Calendar
                  inputId="dateformat"
                  v-model="employee_service.employee_local_conveyance.travelled_date"
                  dateFormat="dd/mm/yy"
                />

                <!-- {{ employee_local_conveyance.travelled_date }} -->
              </div>

              <div class="field col">
                <label for="Claim Amount">Mode of transport <span class="text-danger">*</span> </label>
                <Dropdown
                  v-model="employee_service.employee_local_conveyance.mode_of_transport"
                  :options="employee_service.local_Conveyance_Mode_of_transport"
                  optionLabel="label"
                  optionValue="value"
                  placeholder="Select Mode Of Transport"
                  class="w-full"
                  @change="employee_service.amountperKm(employee_service.employee_local_conveyance.mode_of_transport)"
                />
              </div>

              <div class="grid formgrid">
                <div class="field col">
                  <label for="Eligible Amount">From <span class="text-danger">*</span> </label>
                  <InputText
                    v-model="employee_service.employee_local_conveyance.travel_from"
                  />
                </div>
                <div class="field col">
                  <label for="Claim Amount">To <span class="text-danger">*</span> </label>
                  <InputText
                    v-model="employee_service.employee_local_conveyance.travel_to"
                  />
                </div>
              </div>
              <div class="grid formgrid">
                <div class="field col">
                  <label for="Eligible Amount">Total Distance <span class="text-danger">*</span> </label>
                  <InputText
                    v-model="
                      employee_service.employee_local_conveyance.total_distance_travelled
                    "
                    @input="employee_service.amount_calculation"
                  />
                </div>
                <div class="field col" v-if="employee_service.employee_local_conveyance.mode_of_transport == 'Public Transport'">
                  <label for="Eligible Amount">Actual Amount <span class="text-danger">*</span> </label>
                  <InputText  :readonly="employee_service.employee_local_conveyance.mode_of_transport ==
                  'Public Transport'
                    ? false
                    : true"
                    v-model="
                      employee_service.employee_local_conveyance.local_convenyance_total_amount
                    "
                  />
                </div>
                <div class="field col" v-else>
                  <label for="Eligible Amount">Amt/Km <span class="text-danger">*</span></label>
                  <InputText  :readonly="employee_service.employee_local_conveyance.mode_of_transport ==
                  'Public Transport'
                    ? false
                    : true"
                    v-model="
                      employee_service.employee_local_conveyance.Amt_km
                    "
                  />
                </div>
              </div>

              <div
                class="field col"
                :hidden="
                  employee_service.employee_local_conveyance.mode_of_transport ==
                  'Public Transport'
                    ? true
                    : false
                "
              >
                <label for="Eligible Amount">Amount <span class="text-danger">*</span> </label>
                <InputText   @input="employee_service.amountperKm"
                  v-model="
                    employee_service.employee_local_conveyance
                      .local_convenyance_total_amount
                  "
                />
              </div>
              <div class="field col">
                <label for="Eligible Amount">Remarks</label>
                <Textarea
                  v-model="
                    employee_service.employee_local_conveyance.local_conveyance_remarks
                  "
                  autoResize
                  rows="2"
                  cols="30"
                />
              </div>

              <template #footer>
                <Button
                  label="Cancel"
                  icon="pi pi-times"
                  style="height: 30px; color: black"
                  class="p-button-text"
                  @click="employee_service.hideDialog"
                />
                <Button :disabled="!employee_service.employee_local_conveyance.travelled_date == '' &&  !employee_service.employee_local_conveyance.mode_of_transport == ''  ? false : true "
                  label="Save"
                  icon="pi pi-check"
                  style="height: 30px; background: rgb(255 135 38); color: white"
                  @click="employee_service.post_data_for_local_convergance"
                />
              </template>
            </Dialog>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
// import { useVuelidate } from "@vuelidate/core";
// import { required, email, maxLength } from "@vuelidate/validators";
import {ref, onMounted, reactive} from "vue";
import {employee_reimbursment_service} from "./EmployeeReimbursementsService";
import ABS_loading_spinner from "../../../components/ABS_loading_spinner.vue";
import moment from 'moment'
import axios from "axios";

// const v$ = useVuelidate(validation, employee_onboarding);

// const handleSubmit = (isFormValid) => {
//     if (!isFormValid) {
// return;
// }

// }

const employee_service = employee_reimbursment_service();

const selected_date = ref()
const generate_ajax = () => {

    console.log(selected_date.value);

let filter_date = new Date(selected_date.value);

let year = filter_date.getFullYear();
let month = filter_date.getMonth() + 1;

console.log((selected_date.value).toString());


//show_table.value=true

//data_checking.value = true
  console.log(month);


  axios.get(window.location.origin + "/fetch_employee_reimbursement_data", {
       params: {
        selected_year: year,
        selected_month: month
       }
     }).then(res => {
             console.log("data sent");
             console.log("data from " + res.employee_name);
             data_reimbursements.value = res.data
             get_data.value = res.data
             //data_checking.value = false
    }).catch(err => {
              console.log(err);
     })

  }

  const download_ajax = () => {
    let filter_date = new Date(selected_date.value);


    let year = filter_date.getFullYear();
    let month = filter_date.getMonth() + 1;


    let URL = '/reports/generate-employee-reimbursements-reports?selected_year=' + year + '&selected_month=' +
    month + '&_token={{ csrf_token() }}';
    window.location = URL;
    setTimeout(greet, 1000);

}




onMounted(() => {
  //    employee_service.fetch_data_from_reimbursment()
  employee_service.fetch_data_for_local_convergance();
  selected_date.value = new Date()
});
</script>

<style lang="scss">
// .main-content {
//   width: 85%;
// }

.p-datatable .p-datatable-thead > tr > th {
  text-align: center;
  padding: 1rem 1rem;
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

.p-column-filter-overlay-menu
  .p-column-filter-constraint
  .p-column-filter-matchmode-dropdown {
  margin-bottom: 0.5rem;
  visibility: hidden;
  position: absolute;
}

.p-button .p-component .p-button-sm {
  background-color: #003056;
}

.p-datatable .p-datatable-tbody > tr {
  font-size: 13px;

  .employee_name {
    font-weight: bold;
    font-size: 13.5px;
  }
}

.employee_name {
  font-weight: bold;
  font-size: 13px;
}

.p-column-title {
  font-size: 13.5px;
}

.fontSize13px {
  font-size: 13px;
}

.pending {
  font-weight: 700;
  color: #ffa726;
}

.approved {
  font-weight: 700;
  color: #26ff2d;
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

@media screen and (max-width: 960px) {
  button {
    width: 100%;
    margin-bottom: 0.5rem;
  }
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

.p-datatable .p-datatable-thead > tr > th .p-column-filter-menu-button {
  color: white;
  border-color: transparent;
}

.p-column-filter-menu-button.p-column-filter-menu-button-open {
  background: none;
}

.p-column-filter-menu-button.p-column-filter-menu-button-active {
  background: none;
}

.p-datatable .p-datatable-thead > tr > th .p-column-filter {
  width: 50%;
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

#file_upload {
  display: inline-block;
  background-color: #003056;
  color: white;
  padding: 0.5rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
  margin-top: 1rem;
  width: 100%;
  height: 40px;
  font-weight: 700;
  text-align: center;
}

.p-calendar .p-inputtext .p-inputwrapper .p-component {
  flex: 1 1 auto;
  width: 1%;
  background: rebeccapurple;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component::-webkit-input-placeholder {
  /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: red;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component:-ms-input-placeholder {
  /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: red;
}

.p-calendar .p-inputwrapper .p-inputtext .p-component::-ms-input-placeholder {
  /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: red;
}

:-ms-input-placeholder {
  /* Internet Explorer 10-11 */
  color: red;
}

::-ms-input-placeholder {
  /* Microsoft Edge */
  color: red;
}
</style>
