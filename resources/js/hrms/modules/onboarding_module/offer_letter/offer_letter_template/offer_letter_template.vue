<template>
    <div class=" w-full m-2 bg-white">
        <div class="mb-2">
            <h3 class="font-bold text-2xl">Create Offer  template</h3>
        </div>
        <div class=" grid-cols-2 gap-6 my-4 flex ">
            <div class="border-1 border-gray-400 w-7 rounded-lg p-4 shadow-md">
                    <div class="my-4">
                        <h5 class="my-2 font-semibold text-lg">Template Name</h5>
                        <div class="flex justify-evenly gap-8">
                          <div class="w-6">
                            <InputText class="w-full" type="text"  v-model="re.named" />{{re.named}}</div>
                          <div class="" >
                            is default
                            <Checkbox class="mx-2" v-model="checked" :binary="true" />
                          </div>
                        </div>
                    </div>
                    <button @click="hn">hn</button>
                    <div class="my-4 ">
                        <h5 class="my-2 font-semibold text-lg">Description</h5>
                        <div class="flex justify-evenly gap-5">
                          <div><Textarea autoResize rows="1" cols="53" /></div>

                        </div>
                    </div>
                    <div class="my-4  grid-cols-2 flex gap-8 place-content-center border-gray-200">

                     <div class="w-6">
                        <h5 class="my-2 font-semibold text-lg">Logo</h5>
                        <div>file</div>
                     </div>
                     <div class="">
                        <h5 class="my-2 font-semibold text-lg">Authorised Sign</h5>
                        <div>file</div>
                     </div>

                    </div>
                </div>


            <div class="border-1 border-gray-400 w-4 p-4 shadow-md rounded-lg">
                <h1 class="my-2 font-bold text-xl">Select the input tags to insert in offer template</h1>
                <p class="my-2">the values for these should be given during offer letter generation </p>

                <div class=" my-4 h-2 w-96 ">
                    <div class="flex mx-2 my-2 gap-4">
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg  mx-2 my-2 ">Employee name</div>
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg  mx-2 my-2">Job Title</div>
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg  mx-2 my-2">Doj</div>
                    </div>
                    <div class="flex mx-2 my-2 gap-4">
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg  mx-2 my-2">Manager name</div>
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg mx-2 my-2 ">Offer Expire Date</div>
                        <!-- <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg mx-2 my-2 ">Employee name</div> -->
                    </div>
                    <div class="flex mx-2 my-2 gap-4">
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg  mx-2 my-2">Location</div>
                        <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg mx-2 my-2 ">CTC</div>
                        <!-- <div class="border-1 border-orange-300 p-2 text-orange-500 w-26  rounded-lg mx-2 my-2 ">Employee name</div> -->
                    </div>
                </div>
            </div>

        </div>
        <div class="flex grid-cols-2 gap-6 my-6">
            <div class="border-1 border-gray-400 w-7 shadow-md rounded-lg">
                <form @submit="onSubmit">
                <Editor v-model="value" editorStyle="height: 320px" />
                </form>

            </div>
            <!-- ... -->
            <div class="border-1 border-gray-400 w-4 shadow-md rounded-lg">

                <h4 class="text-center my-4  font-bold text-xl">Select the salary structure pay-group</h4>
                <div style="height: 50px;" class="border-1 border-gray-200 w-10 px-4 mx-auto my-4 rounded-lg bg-orange-100   ">
                    <h1 class="my-3 font-semibold text-xl">PayGroup_1</h1>
                </div>
                <div style="height: 50px;" class="border-1 border-gray-200 w-10 px-4 mx-auto my-4 rounded-lg bg-pink-100  ">
                    <h1 class="my-3 font-semibold text-xl">PayGroup_2</h1>
                </div>
                <div style="height: 50px;" class="border-1 border-gray-200 w-10 px-4 mx-auto my-4 rounded-lg bg-yellow-100 ">
                    <h1 class="my-3 font-semibold text-xl">PayGroup_3</h1>

                </div>
                <div style="height: 50px;" class="border-1 border-gray-200 w-10 px-4 mx-auto my-4 rounded-lg bg-orange-300 ">
                    <h1 class="my-3 font-semibold text-xl">PayGroup_4</h1>
                </div>

            </div>
        </div>
    </div>


</template>


<script setup>
import { reactive, ref } from "vue";



const re=reactive({
    named:'',nss:''
})
const hn=()=>{
 console.log(value.value);
 console.log(re.nss);
 re.nss=re.named
}






const value = reactive("<div>Hello World!</div><div>PrimeVue <b v-model='re.nss'></b> Rocks</div><div><br></div>")
</script>




<style>
.page-content{
    background: white;
}

</style>
