import { data } from "autoprefixer";
import axios from "axios";
import dayjs from "dayjs";
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
    const payrollSource = ref()
    const employeePayables = ref()
    const employeeIncomeTax = ref()
    const employeeEpf = ref()
    const employeeEsic = ref()
    const employeeInsurance = ref()


    const getLeaveDetails = async () => {
        let url = '/fetch-leaverequests-based-on-currentrole'
        await axios.get(url).then(res => {
            leaveSource.value = res.data.data
        })
    }


    // Payrun Outcome


    const payrollOutcomeSource = ref()

    const getPayrunOutcomeDetails = async () => {
        let url = 'api/payroll/getPayrollOutcomes'
        await axios.post(window.location.origin + '/' + url, {
            client_code: 'BA',
            payroll_month: '2023-09-01',
        }).then(res => {
            payrollSource.value = res.data.data
            payrollOutcomeSource.value = res.data.data.payroll_outcome
            employeePayables.value = formatConverter( res.data.data.payroll_outcome.employee_payables)
            employeeIncomeTax.value = formatConverter( res.data.data.payroll_outcome.income_tax)
            employeeEpf.value = formatConverter( res.data.data.payroll_outcome.EPF)
            employeeEsic.value = formatConverter( res.data.data.payroll_outcome.ESIC)
            employeeInsurance.value = formatConverter( res.data.data.payroll_outcome.insurance)
        })
    }


    const formatConverter = (data) => {
        let obj = Object.entries(data).map(item => {
            return {
                title: item[0],
                value: item[1]
            }
        })

        return obj
    }


    return {
        currentActiveScreen,

        // Leave, Attendance & Wages Calculation

        //  Leave
        leaveSource, getLeaveDetails,

        // Payrun Outcome
        payrollSource, getPayrunOutcomeDetails, payrollOutcomeSource,
        employeePayables,employeeIncomeTax,employeeEpf,employeeEsic,employeeInsurance

    }

})
