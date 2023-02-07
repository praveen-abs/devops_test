<template>
	<div>
        <DataTable :value="products" responsiveLayout="scroll"  :rows="5" class="p-datatable-sm"
        v-model:filters="filters2" filterDisplay="menu">
            <Column field="name" header="Sick Leave"></Column>
            <Column field="agejyje" header="Earned Leave"></Column>
         <Column>
            <template #header>
                <div>
                    Employee Name
                </div>
            </template>
                <template #body="data">
                    <div id="leave">
                        {{ data.data.leave }}
                    </div>
                </template>
            </Column>


            <Column field="earnleave" header="Casual Leave">
            <template #body="data">
                <div id="leave">
                    {{ data.data.earnleave }}
                </div>
            </template></Column>
            <Column field="earned_leave_balance" header="remaining">
             <template #body="data">
                <div id="leave">
                    {{ data.data.earnleave-data.data.leave }}
                </div>
            </template></Column>

        </DataTable>
        <Paginator
        :template="{
            '640px': 'PrevPageLink CurrentPageReport NextPageLink',
            '960px': 'FirstPageLink PrevPageLink CurrentPageReporNextPageLink LastPageLink',
            '1300px': 'FirstPageLink PrevPageLink PageLinkNextPageLink LastPageLink',
            default: 'FirstPageLink PrevPageLink PageLinks NextPageLinLastPageLink '
        }"
        :rows="10"
        :totalRecords="totalRecords">
    </Paginator>
	</div>

</template>
<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios'

        const products = ref();
        const url=ref()
        const size=ref(values().data.length)
        const totalRecords = ref(size);

        onMounted(() => {

        //   let url_org_leave = window.location.origin + '/fetch-org-leaves';

        //   console.log(url_org_leave);



        //         axios.get(url_org_leave)
        //           .then((response) => {
        //             console.log(response.data);

        //             products.value =values.data


        //     });
        products.value=values().data
        console.log(size)

        })
 function values(){
    return{
       "data" :[
         {"name":"sjdvhsvd","agejyje":"sgvdhgsvdghvd","leave":"1","earnleave":"10"},
         {"name":"sjdvsvd","agejyje":"sgvdhgsvdghvd","leave":"3","earnleave":"10"},
         {"name":"sjdvhsvd","agejyje":"sgvdhgsvdghvd","leave":"5","earnleave":"10"},
         {"name":"sjdvhsvd","agejyje":"sgvdhgsvdghvd","leave":"4","earnleave":"10"},
         {"name":"sjdvhsvd","agejyje":"sgvdhgsvdghvd","leave":"5","earnleave":"10"},
         {"name":"sjdvhsvd","agejyje":"sgvdhgsvdghvd","leave":"8","earnleave":"10"},




        ]
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
