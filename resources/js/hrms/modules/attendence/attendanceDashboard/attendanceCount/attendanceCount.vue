<template>
    <div class="grid grid-cols-7 gap-4 ">
        <div class=" bg-white rounded-lg p-2 border" v-for="dummy in 7">
            <div class="px-auto flex justify-center">
                <span class=" text-2xl font-semibold text-center">
                   0
                </span>
            </div>
            <p class=" text-sm underline font-semibold text-center text-gray-500">Total Employees</p>
        </div>
    </div>
</template>
