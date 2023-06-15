import { defineStore } from "pinia";
import { ref, reactive, onMounted } from "vue";
import axios from "axios";


export const UseSalaryAdvanceApprovals =defineStore('SalaryAdvanceApprovals',()=>{

    // variables
    const arraySalaryAdvance =ref();
    const currentlySelectedStatus =ref();

    // functions

    async function getEmpDetails(){
        await axios.get('http://localhost:3000/salary_advance').then((res)=>{
            arraySalaryAdvance.value = res.data;
            console.log();
        }).finally(()=>{

        })

    }

    async function submitSalaryAdvanceApproveAndRejectALL(Status,val){
        currentlySelectedStatus.value = Status;
        console.log(Status);
        let data = val;
        await axios.post('http://localhost:3000/submitApproveAndReject',{
            record_id: data ,
            status:
                currentlySelectedStatus == "Approve"
                    ? "Approved"
                    : currentlySelectedStatus == "Reject"
                        ? "Rejected"
                        : currentlySelectedStatus,
            reviewer_comments: "",
        }).then(()=>{


        });

    }


    return{
         arraySalaryAdvance,currentlySelectedStatus

        ,getEmpDetails,
        submitApproveAndRejectALL

    }

});

