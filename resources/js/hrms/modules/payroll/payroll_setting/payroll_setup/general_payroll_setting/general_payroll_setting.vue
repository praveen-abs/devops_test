<template>


        <div class="flex grid-cols-2 gap-6 mx-8 ">
            <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                    <div class="my-4">
                        <h5 class="my-2 text-lg font-semibold">Template Name</h5>
                        <div class="flex gap-8 justify-evenly">
                          <div class="w-6">
                            <InputText class="w-full" type="text"  /></div>
                          <div class="" >
                            is default
                            <Checkbox class="mx-2"  :binary="true" />
                          </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h5 class="my-2 text-lg font-semibold">Description</h5>
                        <div class="flex gap-5 justify-evenly">
                          <div><Textarea autoResize rows="1" cols="53" /></div>

                        </div>
                    </div>
                    <div class="flex grid-cols-2 gap-8 my-4 border-gray-200 place-content-center">

                     <div class="w-6">
                        <h5 class="my-2 text-lg font-semibold">Logo</h5>
                        <div>file</div>
                     </div>
                     <div class="">
                        <h5 class="my-2 text-lg font-semibold">Authorised Sign</h5>
                        <div>file</div>
                     </div>

                    </div>
                </div>


            <div class="p-4 my-4 border-gray-400 rounded-lg shadow-md w-7 border-1">
                <h1 class="my-2 text-xl font-bold">Select the input tags to insert in offer template</h1>
                <p class="my-2">the values for these should be given during offer letter generation </p>

                <div class="h-2 my-4 w-96">
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Job Title</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Doj</div>
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Manager name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Offer Expire Date</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Location</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">CTC</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                </div>
            </div>

        </div>
        <div class="flex grid-cols-2 gap-6 mx-8 my-4 ">
            <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                    <div class="my-4">
                        <h5 class="my-2 text-lg font-semibold">Template Name</h5>
                        <div class="flex gap-8 justify-evenly">
                          <div class="w-6">
                            <InputText class="w-full" type="text"  /></div>
                          <div class="" >
                            is default
                            <Checkbox class="mx-2"  :binary="true" />
                          </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h5 class="my-2 text-lg font-semibold">Description</h5>
                        <div class="flex gap-5 justify-evenly">
                          <div><Textarea autoResize rows="1" cols="53" /></div>

                        </div>
                    </div>
                    <div class="flex grid-cols-2 gap-8 my-4 border-gray-200 place-content-center">

                     <div class="w-6">
                        <h5 class="my-2 text-lg font-semibold">Logo</h5>
                        <div>file</div>
                     </div>
                     <div class="">
                        <h5 class="my-2 text-lg font-semibold">Authorised Sign</h5>
                        <div>file</div>
                     </div>

                    </div>
                </div>


            <div class="p-4 my-4 border-gray-400 rounded-lg shadow-md w-7 border-1">
                <h1 class="my-2 text-xl font-bold">Select the input tags to insert in offer template</h1>
                <p class="my-2">the values for these should be given during offer letter generation </p>

                <div class="h-2 my-4 w-96">
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Job Title</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Doj</div>
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Manager name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Offer Expire Date</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Location</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">CTC</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                </div>
            </div>

        </div>
        <div class="flex grid-cols-2 gap-6 mx-8 my-4 ">
            <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                    <div class="my-4">
                        <h5 class="my-2 text-lg font-semibold">Template Name</h5>
                        <div class="flex gap-8 justify-evenly">
                          <div class="w-6">
                            <InputText class="w-full" type="text"  /></div>
                          <div class="" >
                            is default
                            <Checkbox class="mx-2"  :binary="true" />
                          </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h5 class="my-2 text-lg font-semibold">Description</h5>
                        <div class="flex gap-5 justify-evenly">
                          <div><Textarea autoResize rows="1" cols="53" /></div>

                        </div>
                    </div>
                    <div class="flex grid-cols-2 gap-8 my-4 border-gray-200 place-content-center">

                     <div class="w-6">
                        <h5 class="my-2 text-lg font-semibold">Logo</h5>
                        <div>file</div>
                     </div>
                     <div class="">
                        <h5 class="my-2 text-lg font-semibold">Authorised Sign</h5>
                        <div>file</div>
                     </div>

                    </div>
                </div>


            <div class="p-4 my-4 border-gray-400 rounded-lg shadow-md w-7 border-1">
                <h1 class="my-2 text-xl font-bold">Select the input tags to insert in offer template</h1>
                <p class="my-2">the values for these should be given during offer letter generation </p>

                <div class="h-2 my-4 w-96">
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Job Title</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Doj</div>
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Manager name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Offer Expire Date</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Location</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">CTC</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                </div>
            </div>

        </div>
        <div class="flex grid-cols-2 gap-6 mx-8 my-4 ">
            <div class="p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1">
                    <div class="my-4">
                        <h5 class="my-2 text-lg font-semibold">Template Name</h5>
                        <div class="flex gap-8 justify-evenly">
                          <div class="w-6">
                            <InputText class="w-full" type="text"  /></div>
                          <div class="" >
                            is default
                            <Checkbox class="mx-2"  :binary="true" />
                          </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h5 class="my-2 text-lg font-semibold">Description</h5>
                        <div class="flex gap-5 justify-evenly">
                          <div><Textarea autoResize rows="1" cols="53" /></div>

                        </div>
                    </div>
                    <div class="flex grid-cols-2 gap-8 my-4 border-gray-200 place-content-center">

                     <div class="w-6">
                        <h5 class="my-2 text-lg font-semibold">Logo</h5>
                        <div>file</div>
                     </div>
                     <div class="">
                        <h5 class="my-2 text-lg font-semibold">Authorised Sign</h5>
                        <div>file</div>
                     </div>

                    </div>
                </div>


            <div class="p-4 my-4 border-gray-400 rounded-lg shadow-md w-7 border-1">
                <h1 class="my-2 text-xl font-bold">Select the input tags to insert in offer template</h1>
                <p class="my-2">the values for these should be given during offer letter generation </p>

                <div class="h-2 my-4 w-96">
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Job Title</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Doj</div>
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Manager name</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Offer Expire Date</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                    <div class="flex gap-4 mx-2 my-2">
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26">Location</div>
                        <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">CTC</div>
                        <!-- <div class="p-2 mx-2 my-2 text-orange-500 border-orange-300 rounded-lg border-1 w-26 ">Employee name</div> -->
                    </div>
                </div>
            </div>

        </div>

</template>
