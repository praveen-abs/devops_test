<template>
	<div>
        <DataTable :value="leave_data"  responsiveLayout="scroll">
            <Column field="employee_name" header="Employee Name"></Column>
             <!-- <Column v-for="col of columns" :field="col" :header="col" :key="col"></Column> -->
             <Column v-for="leave_type of leave_types" :header="leave_type" field="array_leave_details">
               <template #body="{data}">
                    {{ data.array_leave_details[leave_type] }}
               </template>
            </Column>
        </DataTable>
    </div>
</template>

<script setup>

import { ref, onMounted, useSSRContext } from 'vue';
import axios from 'axios'


    const leaves = ref();
    const leave_types=ref();
    const leave_data=ref();
    const columns = ref();
    const url=ref();

    onMounted(() => {

        let currentLoggedInUserID = null;

        axios.get(window.location.origin + '/currentUser').then((response) => {
            currentLoggedInUserID = response.data;

            axios.post(url_team_leave,{user_id : currentLoggedInUserID}).then((response) => {

                leaves.value =Object.values(response.data)
                leave_types.value=Object.values(response.data.leave_types)
                leave_data.value=Object.values(response.data.employees)

                //TODO : Need to fetch all the leaves types from the backend
                //columns.value = Object.values(response.data.array_leave_details);

                console.log("Response Data Team Leave: "+JSON.stringify(Object.values(response.data)));



            });

        });


        let url_team_leave = window.location.origin + '/fetch-team-leaves-balance/';

        console.log("Fetching Team LEAVE from url : "+url_team_leave);

        //leaves.value = values().data;
        //console.log("Ref data : "+JSON.stringify(values().data));




    });


</script>

<style  lang="scss">
.p-datatable .p-datatable-thead >tr>th{
    text-align: center;
    padding: 0.9rem 1rem;
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

  }

.employee_name{
    font-weight: bold;
    font-size: 13px;
}
.p-column-title {
    font-size: 13.5px;
  }
  .fontSize13px{
    font-size: 13px;
  }

.pending {
    font-weight: 700;
    color: #FFA726;
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
.p-confirm-dialog-icon.pi.pi-exclamation-triangle {
    color: red;
  }
  .p-button.p-component.p-confirm-dialog-accept {
    background-color: #003056;
  }
  .p-button.p-component.p-confirm-dialog-reject.p-button-text {
    color: #003056;
  }

@media screen and (max-width: 960px) {
    button {
        width: 100%;
        margin-bottom: .5rem;
    }


}
.p-datatable .p-datatable-tbody>tr>td:nth-child(1){
    width: 240px;
}

</style>
