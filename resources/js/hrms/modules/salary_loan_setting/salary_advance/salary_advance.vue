<template>
    <div>
        <div class="">
            <h1 class="fs-4 ">Salary Advance Feature</h1>
            <div class="div ">
                <button @click="Enabled_Hidden_div()">Disabled</button>
                <button>Enabled</button>
            </div>
        </div>
        <div class="div" v-bind="Enabled" >
           <h1> Please click the "Enable" button to activate the salary advance feature for use within your organization.</h1>
        </div>
        <div><button style="color: var(--orange);" >style</button> </div>
    </div>
</template>

<script setup>

// import { ref } from "vue";


// const Enabled  = ref(false);

// const Disabled = ref(false);

// function Enabled_Hidden_div(){
// if(Enabled.value === false){



// }
// }


</script>


<style>
:root{
    --orange:#FF4D00;
    --navy:#002F56;
    --grey: #646464;
    --darkgrey:#494949;

}
button{
    padding: 8px 12px ;
    margin: 0 10px;
    border: 1px solid ;
}
.justify-center{
    display: flex;
    justify-content: start;
    align-content: center;
}


</style>
