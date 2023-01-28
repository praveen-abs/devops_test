<template>
    <div>
        <DataTable :value="att_regularization" responsiveLayout="scroll" :paginator="true" :rows="5">
            <Column field="employee_name" header="Name"></Column>
            <Column field="attendance_date" header="Date"></Column>
            <Column field="regularization_type" header="Type"></Column>
            <Column field="user_time" header="Actual Time"></Column>
            <Column field="regularize_time" header="Regularize Time"></Column>
            <Column field="reason_type" header="Reason"></Column>
            <Column field="reviewer_comments" header="Approver Comments"></Column>
            <Column field="reviewer_reviewed_date" header="Reviewed Date"></Column>
            <Column field="status" header="Status"></Column>
            <Column field="" header="Action">
                <template #body>
                    <Button type="button" icon="pi pi-cog" @click="onClickButton(100)"></Button>
                </template>
            </Column>

        </DataTable>
    </div>
</template>
<script setup>

    import { ref, onMounted } from 'vue';
    import axios from 'axios'

    let att_regularization = ref();
    let name=ref();
    name.value="Karthick";

    onMounted(() => {
        let url = window.location.origin + '/fetch-regularization-approvals';

        console.log("AJAX URL : " + url);

        axios.get(url)
            .then((response) => {
                console.log("Axios : " + response.data);
                att_regularization.value = response.data;

            });

            return { att_regularization }

    })


    function onClickButton(event) {
        //console.log("Button clicked : "+JSON.stringify(event));
        //console.log("Button clicked : "+event[0].employee_name);
        console.log("Button clicked : "+event);
    }


</script>
