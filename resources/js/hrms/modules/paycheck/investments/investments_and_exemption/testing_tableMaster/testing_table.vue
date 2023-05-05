
<template>
    <div>



    <div class="card">
        <DataTable resizableColumns columnResizeMode="expand"  ref="dt" dataKey="id" :paginator="true" :rows="10" :value="Datatable"
                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                :rowsPerPageOptions="[5, 10, 25]"
                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} Records" responsiveLayout="scroll">
            <Column field="section" header="section" >
            <input type="text" name="" id=""></Column>
            <Column field="particular" header="Particular"></Column>
            <Column field="ref" header="ref"></Column>
            <Column field="max" name="max"></Column>
            <Column field="Declaration Amount" header="Declaration Amount" >

                <template #body="slotProps">
                    <InputText type="text" v-model="slotProps.data.test" @focusout="te(slotProps.data)" />

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
    { id: 1, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 2, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' },
    { id: 3, section: "Section 10(13A)", particular: "House Rent Allowance", ref: 'data', max: '1000' }
])

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

function fetchDataTabledata(){
        axios.get('http://localhost:3000/DataTable').then((res)=>{
            DataTabledata.value = res.data.data
            console.log(res.data);
        })

    }

function save_sec_80C_80ccc(){

axios.post('http://localhost:3000/DataTable',text).finally(()=>{

    fetchDataTabledata()
})

}




</script>
