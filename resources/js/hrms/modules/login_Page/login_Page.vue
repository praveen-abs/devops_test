<template>
    <!-- source:https://codepen.io/owaiswiz/pen/jOPvEPB -->
    <div class="min-h-screen bg-gray-100 text-gray-900 flex  justify-between w-[100%] ">
        <div class="sm:rounded-lg flex justify-between flex-1 !w-[100%] ">
            <div class="flex-1 text-center hidden lg:flex w-[100%] ">
                <div class=" w-[100%] bg-contain bg-center bg-no-repeat relative">
                    <img src="../../assests/images/login-page-img.png" alt="" class="w-[100%] h-[100vh]">
                    <div class=" absolute bottom-[50%] left-[20%] font-medium font-sans d-flex justify-center ">
                        <h1 class="text-[64px] text-white font-['Quicksand'] ">Great</h1>
                        <div class="px-3 mt-2  h-[80px]  ">
                            <h1 class="text-[24px]  text-white font-['Poppins'] ">Company begins with a
                                Decision</h1>
                            <h1 class="text-[24px] text-left text-white my-3">
                                Decision
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 xl:w-5/12  sm:p-12  w-[100%] float-right">
                <div class=" w-100 d-flex justify-content-center  flex-col align-items-center ">
                    <div class="mt-12 flex flex-col items-center">
                        <img src="../../assests/images/evangelist.png" class="w-[200px] mx-auto" />
                    </div>
                    <div
                        class="flex-1 w-[400px] h-[480px] mt-[40px] d-flex justify-content-center align-item-center flex-col">
                        <h1 class="text-[18px] font-medium float-left font-['Poppins']">Login to run your business together</h1>
                        <div class="w-full mt-[24px]">
                            <div class="">
                                <span class="p-float-label">
                                    <InputText id="username" v-model="name" class="w-full !rounded-[20px]" />
                                    <label for="username" class="pl-[12px] text-blue-800 font-['Poppins']">Username</label>
                                </span>
                            </div>
                            <div class="w-full mt-[24px]">
                                <span class="p-float-label">
                                    <Password v-model="value" toggleMask />
                                    <label for="username" class="pl-[12px] text-blue-800 font-['Poppins']">password</label>
                                </span>
                                <div class="w-full">
                                    <p class="text-[16px] text-color[#535353] text-right font-['Poppins']  font-medium ">Forgot Password ?</p>
                                </div>
                             
                            </div>

                            <button class=" mt-[12px] h-[40px] rounded-[20px] w-full text-[16px] font-['Poppins']" style="background-color: #001820;color:#CCCCCC;">
                                Login
                            </button>

                            <div class="row mt-2">
                                <div class="col h-0  border-b-[1px] border-[#CCCCCC] mt-1"></div>
                                <div class="col-1 text-[14px] font-['Poppins'] text-[#CCCCCC]">Or</div>
                                <div class="col h-0  border-b-[1px] border-[#CCCCCC] mt-1"></div>
                            </div>

                            <div class="mt-[30px] border">

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script setup>
import { ref } from 'vue';

const name = ref();
const email = ref();
const password = ref();
const accept = ref();
const value = ref(null);


</script>

<style>
.p-password-input {
    width: 100%;
    border-radius: 20px;
}

.p-password {
    width: 100%;

}

.p-password-input ::placeholder {
    padding-left: 12px !important;
}
</style>

<!-- .p-input-icon-right .pi-eye{
    padding-right: 12px;
 } -->