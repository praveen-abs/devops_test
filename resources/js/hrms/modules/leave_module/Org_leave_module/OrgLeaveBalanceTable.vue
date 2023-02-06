<template>
	<div>
        <DataTable :value="leaves" responsiveLayout="scroll" :paginator="true"  >
            <Column field="user_id" header="Employee ID"></Column>
            <Column field="employee_name" header="Employee Name"></Column>
            <Column  header="Sick Leave / Causal Leave">
          
                <template #body="data">
                    <div id="leave">
                        {{ data.data.array_leave_details["Sick Leave / Casual Leave"] }}
                    </div>
                </template>
            </Column>
            <Column  header="Earned Leave">
            
                <template #body="data">
                    <div id="leave">
                        {{ data.data.array_leave_details["Earned Leave"] }}
                    </div>
                </template>
            </Column>
            <Column  header="Maternity Leave">
           
                <template #body="data">
                    <div id="leave">
                        {{ data.data.array_leave_details["Maternity Leave"] }}
                    </div>
                </template>
            </Column>
    
            <Column  header="On Duty">
           
                <template #body="data">
                    <div id="leave">
                        {{ data.data.array_leave_details["On Duty"] }}
                    </div>
                </template>
            </Column>
            <Column  header="Paternity Leave">
     
                <template #body="data">
                    <div id="leave">
                        {{ data.data.array_leave_details["Paternity Leave"] }}
                    </div>
                </template>
            </Column>
            
            <Column field="earned_leave_balance" header="Permission">
          
              <template #body="data">
                  <div id="leave">
                      {{ data.data.array_leave_details["Permission"] }}
                  </div>
              </template></Column>
        </DataTable>
	</div>
</template>
<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios'

        const leaves = ref();
        const url=ref()

        onMounted(() => {

          let url_org_leave = window.location.origin + '/fetch-org-leaves';

          console.log(url_org_leave);
                 
 

                axios.get(url_org_leave)
                  .then((response) => {
                 leaves.value =response.data   
                 console.log(leaves);
                    

             
            });


        })

</script>

<style  lang="scss">
.main-content{
  width: 101%;
}
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
