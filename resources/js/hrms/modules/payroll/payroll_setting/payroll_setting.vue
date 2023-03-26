<template>
  <div class="w-full">
   <div class="w-10 mx-6">
    <section class="my-2" id="header">
        <div class="">
            <h4 class="my-2 text-xl font-bold">Payroll Settings</h4>
            <p>We kindly asked for your patience as we gather all the necessary information to process the payroll.We understand that is may cause a sightly delay,and we appreciate you understanding during this time.Rest assured that we have worked to simplify the process to male it as easy as possible for you.Thank you for your cooperation.</p>
        </div>
    </section>
    <section class="my-4 " id="content">
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md">
            <div class="flex w-3">
                <div class="mx-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                  </svg>
                  </div>
            <div class="ml-8">
                <p class="text-white">Work location</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100">[office location and state confirmation]</p>
            </div>
            <div>
                <button class="text-white">completed</button>
            </div>
            <div >
                <p class="mr-6">>></p>
            </div>
        </div>
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md ">
            <div class="flex w-3 hover:text-red-600">
                <div class="mx-2 text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="amber" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                </div>
            <div class="ml-8">
                <p class="text-white hover:text-red-700">Payroll Setup</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100 hover:text-red-700 ">[General Setting,Salary Structure & Compenents]</p>
            </div>
            <div >
                <button class="text-white hover:text-red-700">completed</button>
            </div>
            <div>
                <p class="mr-6">>></p>
            </div>
        </div>
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md">
            <div class="flex w-3">
                <div class="mx-2 text-white">misc</div>
            <div class="ml-8">
                <p class="text-white">Misc Settings</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100">[Payment Setting and Components Rounding]</p>
            </div>
            <div>
                <button class="text-white">completed</button>
            </div>
            <div>
                <p class="mr-6">>></p>
            </div>
        </div>
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md">
            <div class="flex w-3">
                <div class="mx-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                      </svg>
                </div>
            <div class="ml-8">
                <p class="text-white">Payslip</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100">[Payslip Option and Fields,Password protections]</p>
            </div>
            <div>
                <button class="text-white">completed</button>
            </div>
            <div>
                <p class="mr-6">>></p>
            </div>
        </div>
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md">
            <div class="flex w-3">
                <div class="mx-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>

                </div>
            <div class="ml-8">
                <p class="text-white">Full and Final Settlement</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100">[Opening & closing Notes,Notice Period Buy Out]</p>
            </div>
            <div>
                <button class="text-white">completed</button>
            </div>
            <div>
                <p class="mr-6">>></p>
            </div>
        </div>
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md">
            <div class="flex w-3">
                <div class="mx-2 text-white">contr</div>
            <div class="ml-8">
                <p class="text-white">Contribution Rate</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100">[Manage PF Contribution Rate]</p>
            </div>
            <div>
                <button class="text-white">completed</button>
            </div>
            <div>
                <p class="mr-6">>></p>
            </div>
        </div>
        <div class="flex justify-between w-12 p-3 my-4 bg-blue-900 rounded-md">
            <div class="flex w-3">
                <div class="mx-2 text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" fill="blue" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                  </svg>
                  </div>
            <div class="ml-8">
                <p class="text-white">Leave Encashment</p>
            </div>
            </div>
            <div class="w-3">
                <p class="text-sm font-light text-gray-100">[Leave Encashment Policies Calculation]</p>
            </div>
            <div>
                <button class="text-white">completed</button>
            </div>
            <div>
                <p class="mr-6">>></p>
            </div>
        </div>
    </section>
    <section id="footer"></section>
   </div>
  </div>
</template>
