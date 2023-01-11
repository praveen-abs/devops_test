<template>
    <h1>second compoent</h1>
</template>

<script>
import app from './app.vue'
export default{
    name:"second",
    component:{
    app
},
data(){
    return{
        count:0
    }
}
}
</script>