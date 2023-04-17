import axios from "axios";
import { defineStore } from "pinia";
import {investmentFormulaStore} from './investmentFormulaStore'

import { reactive, ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const investmentMainStore = defineStore("investmentMainStore", () => {

    const formula = investmentFormulaStore()

    // Steps for Investment and exemption tab's  Next and Previous Button
 
    const investment_exemption_steps = ref(1)

    // Tax Saving Investments  

    const taxSavingInvestments = reactive({
        max_limit:'',
        declared_amt:'',
        status:'',
        Date_of_submission:'',

    })

    /* Investment and Exemptiom

    1) HRA                  - hra
    2)Section 80C & 80CCC    - sec_80cc
    3)Other Exemptions        - other_Exe
    4)House Property          - house_props
    5)Reimbursement           - reimbursment
    6)Previous Employer Income - pre_emp_income
    7)Other Source Of Income    - oth_sour_of_income


    */



    // HRA Begins

    const hra = reactive({
        from_month:'',
        to_month:'',
        city:'',
        total_rent_paid:'',
        landlord_name:'',
        landlord_PAN:'',
        address:'',

    })


    const  dailogAddNewRental = ref(false)

    const saveHraNewRental = () =>{

        console.log("saving hra new rental  data.......");
        console.log(hra);

    }

    // HRA End


    // Section 80C & 80CCC Begins



    // Section 80C & 80CCC Ends



    // Other Exemptions  Begins


    const other_Exe = reactive({
        loan_sanction_date:'',
        lender_type:'',
        property_value:'',
        loan_amount:'',
        interest_amount_paid:'',
        vechicle_brand:'',
        vechicle_model :'',
        interest_amount_paid:''
    })

    const save80EE = () =>{
        console.log("Saving Other exemption 80EE");
        console.log(other_Exe);
    }

    const save80EEA = () =>{
        console.log("Saving Other exemption 80EEA");
        console.log(other_Exe);
    }

    const save80EEB = () =>{
        console.log("Saving Other exemption 80EEB");
        console.log(other_Exe);
    }

    // Other Exemptions  Ends





    return {

        // varaible Declarations
        investment_exemption_steps,

        // Tax Saving Investments 

        taxSavingInvestments,

        // hra begins

        hra,dailogAddNewRental,saveHraNewRental,

        // hra ends

        // Sectiom 80cc Begins


        // Sectiom 80cc Ends

        // Other exemptiom Begins

        other_Exe,save80EE,save80EEA,save80EEB

        // Other exemptiom Ends

        


    };
});



