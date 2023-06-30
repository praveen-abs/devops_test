<template>
    <div class="card">
        <div class="card-body">
            <div class="list_employee_attendance flex">
                <div class="col-auto me-2 w-3">
                    <div
                        class="color_disco-600  user_pic d-flex  justify-content-center align-items-center  rounded-circle">
                        <span class="text-white fw-bold">MU</span>
                    </div>
                </div>
                <div class="user_content text-start ">
                    <p class="fw-bold text-primary text-capitalize">MURALI</p>
                    <p class=" text-muted f-11 text-capitalize">Asst. Manager - Sales &amp; Commercial</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    attendance: {
        type: Object,
        required: true,
    },
});


</script>

