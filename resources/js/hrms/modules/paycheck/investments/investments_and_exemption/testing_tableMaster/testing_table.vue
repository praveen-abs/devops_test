
<template>
    <div>



    <div class="card">
        <DataTable resizableColumns columnResizeMode="expand"  ref="dt" dataKey="id" :paginator="true" :rows="10" :value="Datatable"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column field="section" header="Section" >
            <input type="text" name="" id=""></Column>
            <Column field="particular" header="Particular">
                <template #body="slotProps">
                    {{ slotProps.data.particular }}
                    <div v-if="slotProps.data.particulars_options">
                        <div v-for="option in slotProps.data.particulars_options" :key="option.key">
                            <div class="flex">
                                <RadioButton v-model="slotProps.data.emp_selected_particular_option" name="asd" :inputId="option.key" :value="option.key" />
                                <label :for="option.key" class="ml-2">{{ option.value }}</label>
                            </div>
                        </div>
                    </div>
                </template>
            </Column>
            <Column field="ref" header="ref"></Column>
            <Column field="max" name="max"></Column>
            <Column field="dec_amount" header="Declaration Amount" >

                <template #body="slotProps">
                    <InputText type="text" v-model="slotProps.data.emp_dec_amount" />

                </template>

            </Column>
        </DataTable>

        <button @click="save_sec_80C_80ccc">Submit</button>
    </div>
    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, libero repudiandae. Quibusdam sint aperiam dolore animi consequatur? Explicabo nesciunt exercitationem cum veritatis fuga, atque architecto sint vel nobis consectetur reiciendis?</h1>



    </div>
</template>

<script setup>
import {ref } from  'vue';
import axios from 'axios';


// import UseDatatable from  './tesing_pinia';



// const SectionData = UseDatatable();

const Datatable = ref([
    { fsp_id: 1, section: "Section 10(13A)", particular: "House Rent Allowance", particulars_options :  [{ key : '1', value:'40% To 80%'},{key:'2', value:'More than 80%'}]  , ref: 'data', max: '1000' , emp_dec_amount : '0' , emp_selected_particular_option :'' },
    { fsp_id: 2, section: "Section 10(13A)", particular: "House Rent Allowance", particulars_options :  []  ,  ref: 'data', max: '1000' , dec_amount : '10000', emp_selected_particular_option :'' },
    { fsp_id: 3, section: "Section 10(13A)", particular: "House Rent Allowance", particulars_options :  []  ,  ref: 'data', max: '1000' , dec_amount : '0' , emp_selected_particular_option :''}
]);

const text = ref({
        EPF:"",
        VPF:"",
        PPF:"",
})

const DataTabledata = ref();

const te = (data) =>{
    console.log(text.value);
    console.log(data.test.id);
}

// function fetchDataTabledata(){
//         axios.get('http://localhost:3000/DataTable').then((res)=>{
//             DataTabledata.value = res.data.data
//             console.log(res.data);
//         })

//     }

function save_sec_80C_80ccc(){
    console.log('Saving data.........');

    console.log(JSON.parse(JSON.stringify(Datatable.value)));
// axios.post('http://localhost:3000/DataTable',text).finally(()=>{

//     fetchDataTabledata()
// })

}




</script>
