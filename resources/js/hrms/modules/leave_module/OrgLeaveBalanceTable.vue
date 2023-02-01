<template>
	<div>
        <DataTable :value="products" responsiveLayout="scroll">
            <Column field="user_id" header="Employee ID"></Column>
            <Column field="employee_avatar" header="Employee Avatar"></Column>
            <Column field="employee_name" header="Employee Name"></Column>
            <Column field="sick_leave_balance" header="Sick Leave Balance"></Column>
            <Column field="earned_leave_balance" header="Earned Leave Balance"></Column>
        </DataTable>
	</div>
</template>
<script>

import { ref, onMounted } from 'vue';
import axios from 'axios'

export default {
    setup() {
        const products = ref();

        onMounted(() => {
            products.value = getProductDetails().data;

            // axios.get('https://jsonplaceholder.typicode.com/posts/1')
            //      .then((response) => {
            //         console.log("Axios : "+response.data.title);
            // });

        })

        function getProductDetails(){
             return {
                "data": [
                    { 'user_id': '141','employee_avatar': 'SA1','employee_name' : 'Karthick Sir','sick_leave_balance':'2','earned_leave_balance':'6'},
                    { 'user_id': '142','employee_avatar': 'SA2','employee_name' : 'Praveen Max','sick_leave_balance':'1','earned_leave_balance':'6'},
                    { 'user_id': '143','employee_avatar': 'SA3','employee_name' : 'Void Max','sick_leave_balance':'4','earned_leave_balance':'6'},
                    { 'user_id': '144','employee_avatar': 'SA4','employee_name' : 'Shelly','sick_leave_balance':'1','earned_leave_balance':'6'},
                    { 'user_id': '145','employee_avatar': 'SA5','employee_name' : 'Goerge the Great','sick_leave_balance':'3','earned_leave_balance':'6'},
                    { 'user_id': '146','employee_avatar': 'SA6','employee_name' : 'Vasan','sick_leave_balance':'3','earned_leave_balance':'6'},
                    { 'user_id': '147','employee_avatar': 'SA7','employee_name' : 'Karthick','sick_leave_balance':'2','earned_leave_balance':'6'}


                ]
            };
        }
       
   
   
   
   

        return { products }
    }
}

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
