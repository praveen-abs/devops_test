import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const payrunMainStore = defineStore("payrunMainStore", () => {

    // Variable declaration
    const currentActiveScreen = ref(0)


    /*
    1 ) Leave, Attendance & Wages Calculation
    2 ) New Joinee & Exits
    3 ) Bonus, Salary Revisions & Overtime
    4 ) Reimbursement, Adhoc Payment, Deduction
    5 ) Salaries on Hold & Arrears
    6 ) Override (PT, ESI, TDS, LWF)
    */

    // Leave, Attendance & Wages Calculation

    const leaveSource = ref()

   const  getLeaveDetails = async()=>{
    let url = '/fetch-leaverequests-based-on-currentrole'
        await axios.get(url).then(res=>{
            leaveSource.value = res.data.data
        })
    }



    return {
        currentActiveScreen,

         // Leave, Attendance & Wages Calculation

        //  Leave
        leaveSource,getLeaveDetails,
    }

})
