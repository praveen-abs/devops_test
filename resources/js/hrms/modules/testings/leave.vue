<template>
    <div>
        <button @click="count++">count is:{{count}}</button>
        <button @click="cont++">count is:{{cont}}</button>
        <button @click="cnt++">count is:{{cnt}}</button>
        <button @click="ct++">count is:{{ct}}</button>
        <button @click="t++">count is:{{t}}</button>
        <button @click="c++">count is:{{c}}</button>
    </div>
</template>

<script> 
import AutoComplete from 'primevue/autocomplete'
export default{
    data(){
        return{
            count:0,
            cont:0,
            cnt:0,
            ct:0,
            t:0,
            c:0
        }
     
    },
    component:{
        AutoComplete
    }
}
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