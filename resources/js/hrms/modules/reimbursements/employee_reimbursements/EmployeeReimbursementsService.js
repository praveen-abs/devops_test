import { defineStore } from "pinia";
import { ref, onMounted, reactive } from 'vue';
import { useToast } from "primevue/usetoast";
import axios from "axios";


// toast.add({severity:'success', summary: 'Success Message', detail:'Message Content', life: 3000});




export const employee_reimbursment_service = defineStore('employee_reimbursment_service', () => {

    const reimbursement_datas = ref([
        // { "id": "1000", "claim_type": "Bamboo Watch", "claim_amount": 65, "eligible_amount": 24,"reimbursment_remarks":"red","status":"Approved" },
        // { "id": "1001", "claim_type": "Black Watch", "claim_amount": 72, "eligible_amount": 61,"status":"Pending" },
   ]);
    const reimbursementsScreen = ref(true)
    const reimbursements_dailog = ref(false);

    const localconverganceScreen = ref(false)
    const localconvergance_dailog = ref(false)


    const employee_reimbursement = ref({
        claim_type: '',
        claim_amount: Number,
        eligible_amount: Number,
        date_of_dispatch:'',
        proof_of_delivery:'',
        reimbursment_remarks:''
    });





    const employee_local_conveyance = ref({
        travelled_date: '',
        mode_of_transport: '',
        travel_from: '',
        travel_to: '',
        total_distance_travelled: '',
        Amt_km:'',
        local_convenyance_total_amount:"",
        local_conveyance_remarks:''
    })


    const Switch_to_reimbursment = () => {
        reimbursementsScreen.value = true
        localconverganceScreen.value = false

    }
    const Switch_to_localC = () => {
        reimbursementsScreen.value = false
        localconverganceScreen.value = true


    }


     const submitted = ref(false);
    const  reimbursment_claim_types = ref([
        { label: 'Mobile Bills', value: 'Mobile Bills' },
        { label: 'Accommodation', value: 'Accommodation' },
        { label: 'Travel Expenses', value: 'Travel Expenses' },
        { label: 'Miscellaneous', value: 'Miscellaneous' },
        { label: 'Medical Expenses', value: 'Medical Expenses' },
        { label: 'Others', value: 'Others' }
    ]);

    const  local_Conveyance_Mode_of_transport = ref([
        { label: 'public Transport', value: 'public Transport' },
        { label: 'Car', value: 'Car' },
        { label: 'Bike', value: 'Bike' },

    ]);


    const open_reimbursment = () => {

        submitted.value = false;
        reimbursements_dailog.value = true;
    };

    const employee_reimbursement_attachment=ref()

    const file=ref()

    const employee_reimbursement_attachment_upload = (e) => {
        // Check if file is selected
        if (e.target.files && e.target.files[0]) {
            // Get uploaded file
            employee_reimbursement_attachment.file = e.target.files[0],
                // Get file size
                employee_reimbursement_attachment.fileSize = Math.round((file.size / 1024 / 1024) * 100) / 100,
                // Get file extension
                employee_reimbursement_attachment.fileExtention = employee_reimbursement_attachment.file.name.split(".").pop(),
                // Get file name
                employee_reimbursement_attachment.fileName = employee_reimbursement_attachment.file.name.split(".").shift(),
                // Check if file is an image
                employee_reimbursement_attachment.isImage = ["jpg", "jpeg", "png", "gif"].includes(employee_reimbursement_attachment.fileExtention);

            // Print to console
            console.log(employee_reimbursement_attachment.file);
        }
    }



    const open_local_convergance = () => {

        submitted.value = false;
        localconvergance_dailog.value = true;

        submitted.value = false;

    };
    const hideDialog = () => {
        reimbursements_dailog.value = false;
        localconvergance_dailog.value = false;
        submitted.value = false;
    };

    const saveProduct = () => {
        submitted.value = true;
        reimbursement_datas.value.push(employee_reimbursement.value);
        console.log(employee_reimbursement.value);
    };


    // Fetching


    const data_reimbursements = ref()
    const loading_spinner=ref(true)
    const reimbursment_file=ref()



    const fetch_data_from_reimbursment=()=>{

    let url_all_reimbursements = window.location.origin + '/fetch_all_reimbursements';


        console.log("AJAX URL : " + url_all_reimbursements);

        axios.get(url_all_reimbursements)
            .then((response) => {
                data_reimbursements.value = response.data;
                console.log(response.data);
                loading_spinner.value=false

            });

    }

    const reimbursement_data = reactive(employee_reimbursement.value)
    const reimbursement_attachment = reactive(employee_reimbursement_attachment)


    const post_reimbursment_data=()=>{


        submitted.value = true;
        reimbursement_datas.value.push(employee_reimbursement.value);
        reimbursements_dailog.value=false
        console.log(employee_reimbursement.value);
        console.log(("post reiburmentt"));
         console.log(employee_reimbursement_attachment.value);
         const data=JSON.stringify({
            reimbursement_data,reimbursement_attachment
         })
         console.log(data);

        let  url_all_reimbursements=window.location.origin + '/saveReimbursementsData'
        axios.post(url_all_reimbursements,{
            reimbursement_data,
            reimbursement_attachment


        })
        .then((response) => {



        }).catch(response=>{
            console.log(response);
        });
    }

    const data_local_convergance=ref([])


    const fetch_data_for_local_convergance=()=>{

        let url_all_reimbursements = window.location.origin + '/fetch_all_reimbursements';


        console.log("AJAX URL : " + url_all_reimbursements);

        axios.get(url_all_reimbursements)
            .then((response) => {
                data_local_convergance.value = response.data;
                console.log(response.data);
                loading_spinner.value=false

            });


        }

        const post_data_for_local_convergance=()=>{

            console.log(employee_local_conveyance.value);
            data_local_convergance.value.push(employee_local_conveyance.value);



            // let url_all_local_convergance = window.location.origin + '/fetch_all_reimbursements';


                // console.log("AJAX URL : " + url_all_reimbursements);

                // axios.post(url_all_local_convergance)
                //     .then((response) => {


                //     });

            }






    return {
         hideDialog,  localconvergance_dailog, saveProduct, employee_reimbursement, employee_local_conveyance,
         open_reimbursment, open_local_convergance,reimbursements_dailog,
        reimbursementsScreen, localconverganceScreen, Switch_to_localC, Switch_to_reimbursment,
        fetch_data_from_reimbursment,data_reimbursements,loading_spinner,


        // employee_reimbursement

        employee_reimbursement_attachment_upload,employee_reimbursement_attachment,file,reimbursement_data,reimbursement_attachment,post_reimbursment_data,
        reimbursement_datas,reimbursment_claim_types,

        // employee_local_convergance

        post_data_for_local_convergance,fetch_data_for_local_convergance,data_local_convergance,local_Conveyance_Mode_of_transport
    }
})
