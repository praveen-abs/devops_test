<template>
    <div class="payroll-settings mx-4">

        <div class="payroll-settings-header mb-4">
            <h4 class="mb-3 text-2xl font-medium">Payroll Settings</h4>
            <p class="mb-4">We kindly asked for your patience as we gather all the necessary information to process the
                payroll.We understand that is may cause a sightly delay,and we appreciate you understanding during
                this time.Rest assured that we have worked to simplify the process to male it as easy as possible
                for you.Thank you for your cooperation
            </p>
        </div>

        <div class="payroll-settings-cards ">
            <a
                class="bg-blue-900   payroll-settings-content border-indigo-100  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/location.png" alt="">
                    <span class="text-white text-lg ml-5">Work Location</span>
                </div>
                <div class="  flex justify-start items-center">
                    <span class="text-base  font-light  text-gray-100">[Office Location and State Confirmation]</span>
                </div>
                <div class="flex items-center   ">
                    <button class="rounded-full text-green-200 text-sm border-1 border-solid border-green-300 py-1.5 px-4">
                        <i class="fa fa-check-circle mr-2"></i> Completed</button>
                    <i class="fa fa-angle-double-right text-xl mr-6 ml-8 font-bold text-white"></i>
                </div>
            </a>

            <a
                class="bg-blue-900   payroll-settings-content border-orange-200  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/payroll.png" alt="">
                    <span class="text-white text-lg ml-5">Payroll Setup</span>
                </div>
                <div class="  flex justify-start items-center">
                    <span class="text-base  font-light  text-gray-100">[General Setting,Salary Structure &
                        Compenents]</span>
                </div>
                <div class="flex items-center   ">
                    <button
                        class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5">
                        <i class="fa fa-exclamation-circle mr-2"></i> Pending
                    </button>
                    <i class="fa fa-angle-double-right text-xl mr-6 text-white-200  ml-8 font-bold "></i>
                </div>
            </a>
            <a
                class="bg-blue-900   payroll-settings-content border-blue-200  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/categorize.png" alt="">
                    <span class="text-white text-lg ml-5">Misc Settings</span>
                </div>
                <div class="  flex justify-start items-center">
                    <span class="text-base  font-light  text-gray-100">[Payment Setting and Components Rounding]</span>
                </div>
                <div class="flex items-center   ">
                    <button
                        class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5">
                        <i class="fa fa-exclamation-circle mr-2"></i> Pending
                    </button>
                    <i class="fa fa-angle-double-right text-xl mr-6 ml-8 font-bold text-white"></i>
                </div>
            </a>
            <a
                class="bg-blue-900   payroll-settings-content border-yellow-200  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/purchase-order.png" alt="">
                    <span class="text-white text-lg ml-5">Payslip</span>
                </div>
                <div class="  flex justify-start items-center">
                    <span class="text-base  font-light  text-gray-100">[Payslip Option and Fields,Password
                        protections]</span>
                </div>
                <div class="flex items-center   ">
                    <button
                        class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5">
                        <i class="fa fa-exclamation-circle mr-2"></i> Pending
                    </button>
                    <i class="fa fa-angle-double-right text-xl mr-6 ml-8 font-bold text-white"></i>
                </div>
            </a>
            <a
                class="bg-blue-900   payroll-settings-content border-red-200  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center w-1/3">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/money-bag.png" alt="">
                    <span class="text-white text-lg ml-5">Full and Final Settlement</span>
                </div>
                <div class="  flex justify-start items-center">
                    <span class="text-base  font-light  text-gray-100">[Opening & closing Notes,Notice Period Buy
                        Out]</span>
                </div>
                <div class="flex items-center   ">
                    <button
                        class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5">
                        <i class="fa fa-exclamation-circle mr-2"></i> Pending
                    </button>
                    <i class="fa fa-angle-double-right text-xl mr-6 ml-8 font-bold text-white"></i>
                </div>
            </a>
            <a
                class="bg-blue-900   payroll-settings-content border-green-600  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/donate.png" alt="">
                    <span class="text-white text-lg ml-5">Contribution Rate</span>
                </div>
                <div class="  flex justify-start items-center ">
                    <span class="text-base  font-light  text-gray-100">[Manage PF Contribution Rate]</span>
                </div>
                <div class="flex items-center   ">
                    <button
                        class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5">
                        <i class="fa fa-exclamation-circle mr-2"></i> Pending
                    </button>
                    <i class="fa fa-angle-double-right text-xl mr-6 ml-8 font-bold text-white"></i>
                </div>
            </a>
            <a
                class="bg-blue-900   payroll-settings-content border-blue-200  cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5 ">
                <div class="flex items-center">
                    <img class="h-8" src="../../../../../../public/assets/images/dashboard/iencashment.png" alt="">
                    <span class="text-white text-lg ml-5">Leave Encashment</span>
                </div>
                <div class="  flex justify-start items-center">
                    <span class="text-base  font-light  text-gray-100">[Leave Encashment Policies Calculation]</span>
                </div>
                <div class="flex items-center   ">
                    <button
                        class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5">
                        <i class="fa fa-exclamation-circle mr-2"></i> Pending
                    </button>
                    <i class="fa fa-angle-double-right text-xl mr-6 ml-8 font-bold text-white"></i>
                </div>
            </a>

        </div>





    </div>
</template>


<style scoped>
.payroll-settings-content {
    border-left: 4px solid;
    margin-bottom: 1.5em;
}

a.payroll-settings-content:hover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    transform: scale(1);
}

a.payroll-settings-content:hover,
a.payroll-settings-content:hover span,
a.payroll-settings-content:hover,
a.payroll-settings-content:hover i {
    background-color: #fff !important;
    color: #023562 !important;
    transition: 0.2s ease-out;

}

a.payroll-settings-content:hover button {
    border: 1px solid #023562 !important;
    color: #023562 !important;
}
</style>
