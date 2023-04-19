import { defineStore } from "pinia";
import { ref, onMounted, reactive } from "vue";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment/moment";

export const employee_reimbursment_service = defineStore(
    "employee_reimbursment_service",
    () => {
        const toast = useToast();

        // Reimbursment Varaible Declarations

        const reimbursement_datas = ref([]);
        const reimbursementsScreen = ref(true);
        const reimbursements_dailog = ref(false);

        const employee_reimbursement = reactive({
            type_id: 1,
            claim_type: "",
            claim_amount: Number,
            eligible_amount: Number,
            date_of_dispatch: "",
            proof_of_delivery: "",
            reimbursment_remarks: "",
            employee_reimbursement_attachment: ''
        });


        const onclickOpenReimbursmentDailog = () => {
            submitted.value = false;
            reimbursements_dailog.value = true;
        };

        const onclickSwitchToReimbursmentTab = () => {
            reimbursementsScreen.value = true;
            localconverganceScreen.value = false;
        };
        // Local Conveyance Varaible Declarations

        const localconverganceScreen = ref(false);
        const localconvergance_dailog = ref(false);

        const employee_local_conveyance = reactive({
            type_id: 1,
            travelled_date: "",
            mode_of_transport: "",
            travel_from: "",
            travel_to: "",
            total_distance_travelled: "",
            Amt_km: "",
            local_convenyance_total_amount: "",
            local_conveyance_remarks: "",
        });

        const onclickOpenLocalConverganceDailog = () => {
            submitted.value = false;
            localconvergance_dailog.value = true;

            submitted.value = false;
        };
        const hideDialog = () => {
            reimbursements_dailog.value = false;
            localconvergance_dailog.value = false;
            submitted.value = false;
        };


        const onclickSwitchToLocalCoverganceTab = () => {
            reimbursementsScreen.value = false;
            localconverganceScreen.value = true;
        };

        // const formatDate = (value) => {
        //     return value.toLocaleDateString("es-PE", {
        //         day: "2-digit",
        //         month: "2-digit",
        //         year: "numeric",
        //     });
        // };

        const submitted = ref(false);
        const reimbursment_claim_types = ref([
            { label: "Mobile Bills", value: "Mobile Bills" },
            { label: "Accommodation", value: "Accommodation" },
            { label: "Travel Expenses", value: "Travel Expenses" },
            { label: "Miscellaneous", value: "Miscellaneous" },
            { label: "Medical Expenses", value: "Medical Expenses" },
            { label: "Others", value: "Others" },
        ]);

        const local_Conveyance_Mode_of_transport = ref([
            { label: "Public Transport", value: "Public Transport" },
            { label: "Car", value: "4-Wheeler" },
            { label: "Bike", value: "2-Wheeler" },
        ]);




        const employee_reimbursement_attachment_upload = (e) => {

            // Get uploaded file
            employee_reimbursement.employee_reimbursement_attachment = e.target.files[0];

            // Print to console
            console.log(employee_reimbursement.employee_reimbursement_attachment.file);
        }


        // Fetching

        const data_reimbursements = ref();
        const loading_spinner = ref(false);

        const fetch_data_from_reimbursment = () => {
            let url_all_reimbursements =
                window.location.origin + "/fetch_all_reimbursements";

            console.log("AJAX URL : " + url_all_reimbursements);

            axios.get(url_all_reimbursements).then((response) => {
                data_reimbursements.value = response.data;
                console.log(response.data);
                loading_spinner.value = false;
            });
        };

        const reimbursement_data = reactive(employee_reimbursement.value);
        const post_reimbursment_data = (e) => {
            submitted.value = true;
            reimbursement_datas.value.push(employee_reimbursement);
            reimbursements_dailog.value = false;
            console.log(employee_reimbursement);
            console.log("post reiburmentt");
            console.log(employee_reimbursement.employee_reimbursement_attachment);
            const data = JSON.stringify({
                reimbursement_data,
            });
            console.log(data);

            e.preventDefault();
            let currentObj = this;

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();
            formData.append('reimbursement_type_id', employee_reimbursement.type_id)
            formData.append('file', employee_reimbursement.employee_reimbursement_attachment);
            formData.append('claim_type', employee_reimbursement.claim_type);
            formData.append('claim_amount', employee_reimbursement.claim_amount);
            formData.append('eligible_amount', employee_reimbursement.eligible_amount);
            formData.append('remarks', employee_reimbursement.reimbursment_remarks);
            formData.append('date_of_dispatch', employee_reimbursement.date_of_dispatch);
            formData.append('proof_of_delivery', employee_reimbursement.proof_of_delivery);

            let url_all_reimbursements =
                window.location.origin + "/saveReimbursementsData";
            axios
                .post(url_all_reimbursements, formData)
                .then((response) => {
                    currentObj.success = response.data.success;
                })
                .catch((response) => {
                    currentObj.output = error;
                    console.log(response);
                });

            toast.add({
                severity: "success",
                summary: "Saved",
                detail: "Reimbursement drafted",
                life: 3000,
            });
        };


        const data_local_convergance = ref([]);
        const disableAmt = ref(true)

        const fetch_data_for_local_convergance = () => {
            let url_all_reimbursements = window.location.origin + "/fetch_employee_reimbursement_data";

            console.log("AJAX URL : " + url_all_reimbursements);

            axios.get(url_all_reimbursements).then((response) => {
                data_local_convergance.value = response.data;
                console.log(response.data);
                // loading_spinner.value = false;
            });
        };

        const post_data_for_local_convergance = (e) => {

            e.preventDefault();
            let currentObj = this;

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();

            formData.append('reimbursement_type_id', employee_local_conveyance.type_id)
            formData.append('date', moment(employee_local_conveyance.travelled_date).format('YYYY-MM-DD'))
            formData.append('user_comments', employee_local_conveyance.local_conveyance_remarks)
            formData.append('from', employee_local_conveyance.travel_from)
            formData.append('to', employee_local_conveyance.travel_to)
            formData.append('total_expenses', employee_local_conveyance.local_convenyance_total_amount)
            formData.append('vehicle_type', employee_local_conveyance.mode_of_transport)
            formData.append('distance_travelled', employee_local_conveyance.total_distance_travelled)


            let url_all_local_convergance = window.location.origin + '/saveReimbursementsData';

            console.log("AJAX URL : " + url_all_local_convergance);

            axios.post(url_all_local_convergance, formData)
                .then((response) => {
                    employee_local_conveyance.local_convenyance_total_amount = response.data.total_amount;
                    console.log(response);

                }).catch(err => {
                    currentObj.output = err;
                    console.log(err)
                })
                .finally(res => {
                    console.log(res);
                    generate_ajax();
                });
            localconvergance_dailog.value = false;

            console.log(employee_local_conveyance.value);
            data_local_convergance.value.push(employee_local_conveyance);
            toast.add({
                severity: "success",
                summary: "Saved",
                detail: "Local Coveyance Added",
                life: 3000,
            });


        };

        const amount_calculation = () => {
            console.log(employee_local_conveyance.mode_of_transport);
            if (employee_local_conveyance.mode_of_transport == "4-Wheeler") {
                console.log("Car");

                employee_local_conveyance.local_convenyance_total_amount =
                    employee_local_conveyance.total_distance_travelled * 6;
                console.log(
                    employee_local_conveyance.local_convenyance_total_amount
                );
            } else if (employee_local_conveyance.mode_of_transport == "2-Wheeler") {
                employee_local_conveyance.local_convenyance_total_amount =
                    employee_local_conveyance.total_distance_travelled * 3.5;
                console.log("Bike");
            } else {
                employee_local_conveyance.local_convenyance_total_amount = null;
            }
        };


        const amountperKm = (data) => {

            if (data == '4-Wheeler') {
                employee_local_conveyance.Amt_km = 6
                employee_local_conveyance.local_convenyance_total_amount = 6 * employee_local_conveyance.total_distance_travelled
                console.log("car");
            } else
                if (data == '2-Wheeler') {
                    employee_local_conveyance.Amt_km = 3.5
                    employee_local_conveyance.local_convenyance_total_amount = 3.5 * employee_local_conveyance.total_distance_travelled
                    console.log("Bike");
                } else {
                    console.log("public transport");
                    employee_local_conveyance.Amt_km = ''
                }

        }

        const selected_date = ref()
        const generate_ajax = () => {

            loading_spinner.value = true

            console.log(selected_date.value);

            let filter_date = new Date(selected_date.value);

            let year = filter_date.getFullYear();
            let month = filter_date.getMonth() + 1;

            console.log((selected_date.value).toString());


            //show_table.value=true

            //data_checking.value = true
            console.log(month);


            axios.get(window.location.origin + "/fetch_employee_reimbursement_data", {
                params: {
                    selected_year: year,
                    selected_month: month
                }
            }).then(res => {
                console.log("data sent");
                console.log("data from " + res.employee_name);
                data_local_convergance.value = res.data
                loading_spinner.value = false
            }).catch(err => {
                console.log(err);
            })

        }

        const download_ajax = () => {
            let filter_date = new Date(selected_date.value);


            let year = filter_date.getFullYear();
            let month = filter_date.getMonth() + 1;


            let URL = '/reports/generate-employee-reimbursements-reports?selected_year=' + year + '&selected_month=' +
                month + '&_token={{ csrf_token() }}';
            window.location = URL;
            setTimeout(greet, 1000);

        }

        return {
            hideDialog,
            localconvergance_dailog,
            employee_reimbursement,
            employee_local_conveyance,
            onclickOpenLocalConverganceDailog,
            reimbursements_dailog,
            reimbursementsScreen,
            localconverganceScreen,
            fetch_data_from_reimbursment,
            data_reimbursements,
            loading_spinner,
            amount_calculation,

            // employee_reimbursement

            employee_reimbursement_attachment_upload,
            onclickSwitchToReimbursmentTab,
            reimbursement_data,
            post_reimbursment_data,
            reimbursement_datas,
            reimbursment_claim_types,
            onclickOpenReimbursmentDailog,


            // employee_local_convergance

            post_data_for_local_convergance,
            fetch_data_for_local_convergance,
            onclickSwitchToLocalCoverganceTab,
            data_local_convergance,
            disableAmt,
            local_Conveyance_Mode_of_transport,
            amountperKm,

            // PDF Download

            generate_ajax,download_ajax,selected_date

        };
    }
);
