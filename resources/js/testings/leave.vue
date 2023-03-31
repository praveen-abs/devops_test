<template>
    <DataTable :value="holiday">
    <Column  field="id" header="From"></Column>
</DataTable>
</template>



<script setup> 

import { ref, onMounted } from "vue";
import {fetchUser} from '../testings/Services/service'

const  holiday=ref();

onMounted(()=>{
    
    fetchUser().then((result) =>{
        // console.log(JSON.stringify(result));
        holiday.value=result
        console.log(holiday.value);
        console.log(JSON.stringify(holiday._rawValue[0]));
    }).catch(err =>{
        console.log(err)
    })
   

});
fetchUser();




</script>

<style scoped>
    button{
        height: 50px;
        width: 200px;
        background-color: green;
        color: white;
        border-radius: 8px;
    }
</style>>