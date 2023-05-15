<template>
    <div>
        <!-- <ConfirmDialog></ConfirmDialog> -->
        <Toast />
        <Dialog header="Header" v-model:visible="canShowLoadingScreen" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '25vw'}" :modal="true" :closable="false" :closeOnEscape="false">
            <template #header>
                <ProgressSpinner style="width:50px;height:50px" strokeWidth="8" fill="var(--surface-ground)" animationDuration="2s" aria-label="Custom ProgressSpinner"/>
            </template>
            <template #footer>
                <h5 style="text-align: center;">Please wait...</h5>
            </template>
        </Dialog>

        <Dialog header="Confirmation" v-model:visible="canShowConfirmation" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '350px'}" :modal="true" >
            <div class="confirmation-content">
                <i class="mr-3 pi pi-exclamation-triangle" style="font-size: 2rem" />
                <span>Are you sure you want to {{currentlySelectedStatus}}?</span>
            </div>
            <template>

            </template>
        </Dialog>


        <div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Form Name</label>
                <input class="form-control " type="text" id="formFile" v-model="form_name">

                <label for="formFile" class="form-label">Investment Form Management</label>
                <input class="form-control " type="file" id="formFile" @change="getExcelFile($event)">
              </div>
              <Button label="Upload" @click="uploadInvestmentForm()" class="p-button-text  py-2 btn-primary" autofocus />
        </div>
            <div class="mt-1">
          {{ fileupload }}
            </div>

    </div>
</template>
<script setup>

    import { ref, onMounted } from 'vue';
    import axios from 'axios'
    import { useInvFormsMgmt } from './InvFormsMgmtService';

    const invFormsMgmt = useInvFormsMgmt();

    const form_name = ref();
    const excel_file = ref();
    const fileupload = ref();

    onMounted(() => {


    });


    async function uploadInvestmentForm(){

        const formData  = new FormData()

        formData.append("form_name",form_name.value)
        formData.append("excel_file",excel_file.value)
       // console.log("Uploading Investment forms....");
       console.log(formData);

       let url = "/investments/ImportInvestmentForm_Excel";
    axios
        .post(url, formData)
        .then((res) => {
            fileupload.value = res.data;
        })
        .finally(() => {
            console.log("xlsx upload successfully");

        });

          // await invFormsMgmt.uploadInvestmentForm(formData);
    }

    const getExcelFile = (e) => {
    // Check if file is selected
    if (e.target.files && e.target.files[0]) {
        // Get uploaded file
        excel_file.value = e.target.files[0];
        // Get file size
        // Print to console
       // console.log(excel_file.value);
    }
}




</script>
<style  lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap');


.p-datatable .p-datatable-thead >tr>th{
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
        color: #fff;
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
      .p-dropdown .p-dropdown-label.p-placeholder{
        margin-top: -12px;
      }

    .p-column-filter-menu-button{
        color: white;
        margin-left: 10px;

    }
    .p-column-filter-menu-button:hover {
        color:white;
        border-color: transparent;
        background: #023e70;
      }

  }
  .p-column-filter-overlay-menu .p-column-filter-constraint .p-column-filter-matchmode-dropdown {
    margin-bottom: 0.5rem;
    visibility: hidden;
    position: absolute;
  }

  .p-button .p-component .p-button-sm{
    background-color: #003056;
  }

.p-datatable .p-datatable-tbody > tr{
    font-size: 13px;
    .employee_name{
        font-weight: bold;
        font-size: 13.5px;
    }


  }
  .p-datatable .p-datatable-tbody > tr > td {
    text-align: left;
    border: 1px solid #dee2e6;
      border-top-width: 1px;
      border-right-width: 1px;
      border-bottom-width: 1px;
      border-left-width: 1px;
    border-width: 0 0 1px 0;
    padding: 1rem 0.6rem;

  }
  .p-datatable .p-datatable-tbody > tr > td:nth-child(1) {
    width: 20%;
  }
//   .main-content{
//     width: 105%;
//   }

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
  .p-datatable .p-datatable-thead > tr > th .p-column-filter {
    width: 53%;
  }
  .p-datatable .p-datatable-thead > tr > th .p-column-filter-menu-button {
    color: white;
    border-color: transparent;

  }
  .p-column-filter-menu-button.p-column-filter-menu-button-open{
    background: none;
  }

 .p-column-filter-menu-button.p-column-filter-menu-button-active{
    background: none;

  }


 /* For Sort */

 .p-datatable .p-sortable-column:not(.p-highlight):hover {
    background: #003056;
    color:white;
  }
  .p-datatable .p-sortable-column:not(.p-highlight):hover .p-sortable-column-icon {
      color:white
  }
   .p-datatable .p-sortable-column.p-highlight {
    background: #003056;
    color:white;
  }

  .p-datatable .p-sortable-column.p-highlight:hover {
    background: #003056;
    color:white;
  }
  .p-datatable .p-sortable-column:focus {
    box-shadow: none;
    outline: none;
    color: white;
  }
  .p-datatable .p-sortable-column .p-sortable-column-icon{
    color:white
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
