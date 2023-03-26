
<template>
    <div>
        <Toast />

        <div class="card">
            <Steps :model="items" aria-label="Form Steps" />
        </div>

        <router-view v-slot="{Component}" :formData="formObject" @prevPage="prevPage($event)" @nextPage="nextPage($event)" @complete="complete">
            <keep-alive>
                <component :is="Component" />
            </keep-alive>
        </router-view>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useToast } from "primevue/usetoast";

const router = useRouter();
const toast = useToast();
const items = ref([
    {
        label: 'payroll_setting',
        to: "/"
    },
    {
        label: 'Seat',
        to: "/seat",
    },
    {
        label: 'Payment',
        to: "/payment",
    },
    {
        label: 'Confirmation',
        to: "/confirmation",
    }
]);
const formObject = ref({});

const nextPage = (event) => {
    for (let field in event.formData) {
        formObject.value[field] = event.formData[field];
    }

    router.push(items.value[event.pageIndex + 1].to);
};
const prevPage = (event) => {
    router.push(items.value[event.pageIndex - 1].to);
};
const complete = () => {
    toast.add({severity:'success', summary:'Order submitted', detail: 'Dear, ' + formObject.value.firstname + ' ' + formObject.value.lastname + ' your order completed.'});
};
</script>

<style scoped>
::v-deep(b) {
    display: block;
}

::v-deep(.p-card-body) {
    padding: 2rem;
}
</style>
