<template>
    <div>

        <div class="card">
                <DataTable :value="data_reimbursements" responsiveLayout="scroll" :paginator="true" :rows="5" class="p-datatable-sm">
                <Column field="name" header="Name">
                    <template #body="slotProps">
                        <div class="employee_name">
                            {{ slotProps.data.name }}
                        </div>
                    </template>
                </Column>
                <Column field="reimbursement_date" header="Date"></Column>
                <Column field="user_data" header="User Data"></Column>

                <!-- <Column field="reviewer_comments" header="Approver Comm ents"></Column>
                <Column field="reviewer_reviewed_date" header="Reviewed Date"></Column> -->
                <Column field="status" header="Status">
                    <template #body="slotProps">
                        <div :class="css_statusColumn(slotProps.data)">
                            {{ slotProps.data.status }}
                        </div>
                    </template>
                </Column>
                <Column field="" header="Action">
                    <template #body="slotProps">
                        <Button type="button" icon="pi pi-cog" @click="onClickButton(slotProps.data)">Approve</Button>
                        <Button type="button" icon="pi pi-cog" @click="onClickButton(slotProps.data)">Reject</Button>
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>
<script setup>

    import { ref, onMounted } from 'vue';
    import axios from 'axios'

    let data_reimbursements = ref();

    onMounted(() => {
        let url_pending = window.location.origin + '/fetch_pending_reimbursements';
        let url_approved_rejected = window.location.origin + '/fetch_approved_rejected_reimbursements';

        console.log("AJAX URL : " + url_pending);

        axios.get(url_pending)
            .then((response) => {
                console.log("Axios : " + response.data);
                data_reimbursements.value = response.data;

            });

    })

    const css_statusColumn = (data) => {
            return [
                {
                    'pending': data.status === 'Pending',
                    'approved':  data.status === 'Approved',
                    'rejected':  data.status === 'Rejected',
                 }
            ];
        };

    function onClickButton(selectedRowData) {
        //console.log("Button clicked : "+JSON.stringify(event));
        //console.log("Button clicked : "+event[0].employee_name);
        console.log("Button clicked : "+JSON.stringify(selectedRowData));
    }


</script>
<style scoped lang="scss">

.employee_name{
    font-weight: bold;
}

.pending {
    font-weight: 700;
    color: #FFA726;
}


.approved {
    font-weight: 700;
    color: #26ff2d;
}

.rejected {
    font-weight: 700;
    color: #ff2634;
}

</style>
