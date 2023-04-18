import axios from "axios";
import { defineStore } from "pinia";
import { investmentFormulaStore } from './investmentFormulaStore'
import { useToast } from "primevue/usetoast";
import { reactive, ref } from "vue";

/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const investmentMainStore = defineStore("investmentMainStore", () => {

    const formula = investmentFormulaStore()

    const toast = useToast();
    // Steps for Investment and exemption tab's  Next and Previous Button

    const investment_exemption_steps = ref(4)

    // loading Spinner

    const canShowLoading = ref(true)

    // Tax Saving Investments  

    const taxSavingInvestments = reactive({
        max_limit: '',
        declared_amt: '',
        status: '',
        Date_of_submission: '',

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

    const hra_data = ref()

    const current_data = ref()

    const hra = reactive({
        from_month: '',
        to_month: '',
        city: '',
        total_rent_paid: '',
        landlord_name: '',
        landlord_PAN: '',
        address: '',

    })


    const dailogAddNewRental = ref(false)
    const dailogEditNewRental = ref(false)

    const fetchHraNewRental = () => {

        console.log("getting hra new rental  data.......");


        axios.get(' http://localhost:3000/rental').then(res => {
            console.log(res.data);
            hra_data.value = res.data
            canShowLoading.value = false
        }).catch(e => console.log(e))

    }

    const editHraNewRental = (currentRowData) => {

        console.log("editing Hra");
        console.log(currentRowData);
        dailogAddNewRental.value = true

        hra.from_month = currentRowData.from_month
        hra.to_month = currentRowData.to_month
        hra.address = currentRowData.address
        hra.city = currentRowData.city
        hra.landlord_PAN = currentRowData.landlord_PAN
        hra.landlord_name = currentRowData.landlord_name
        hra.total_rent_paid = currentRowData.total_rent_paid

    }

    const saveHraNewRental = () => {

        canShowLoading.value = true
        dailogAddNewRental.value = false

        console.log("saving hra new rental  data.......");
        console.log(hra);

        axios.post(' http://localhost:3000/rental', hra).then(res => {
            console.log(res.data);
            canShowLoading.value = false
            fetchHraNewRental()
            toast.add({
                severity: "success",
                summary: "Drafted",
                detail: "New Rental Added",
                life: 3000,
            });
        }).catch(e => console.log(e))

    }

    const saveHRA = () => {


        toast.add({
            severity: "success",
            summary: "Saved",
            detail: "House Rented Allowance Added",
            life: 3000,
        });
    }

    // HRA End


    // Section 80C & 80CCC Begins



    // Section 80C & 80CCC Ends



    // Other Exemptions  Begins


    const other_Exe = reactive({
        loan_sanction_date: '',
        lender_type: '',
        property_value: '',
        loan_amount: '',
        interest_amount_paid: '',
        vechicle_brand: '',
        vechicle_model: '',
        interest_amount_paid: ''
    })

    const save80EE = () => {
        console.log("Saving Other exemption 80EE");
        console.log(other_Exe);
    }

    const save80EEA = () => {
        console.log("Saving Other exemption 80EEA");
        console.log(other_Exe);
    }

    const save80EEB = () => {
        console.log("Saving Other exemption 80EEB");
        console.log(other_Exe);
    }

    // Other Exemptions  Ends



    // House Property Begins 

    const house_props_data = ref()

    const dailog_SelfOccupiedProperty = ref(false)
    const dailog_LetOutProperty = ref(false)
    const dailog_DeemedLetOutProperty = ref(false)

    const house_props = reactive({
        lender_name: '',
        lender_pan: '',
        lender_type: '',
        loss_from_housing_property: '',
        address: '',
        rent_received: '',
        municipal_tax: '',
        maintenance: '',
        net_value: '',
        interest: '',
        income_loss: '',
    })

    const fetchSelfOccupiedProperty = () => {
        axios.get('http://localhost:3000/investment').then(res=>{
            console.log(res.data);
            house_props_data.value = res.data
        })
    }

    const saveSelfOccupiedProperty = () => {
        dailog_SelfOccupiedProperty.value = false
        console.log(house_props);
        axios.post('http://localhost:3000/investment',house_props).then(res=>{
            console.log(res.data);
        })
    }
    const saveLetOutProperty = () => {
        console.log(house_props);
        dailog_LetOutProperty.value = false
        axios.post('http://localhost:3000/investment',house_props).then(res=>{
            console.log(res.data);
        })
    }
    const saveDeemedLetOutProperty = () => {
        console.log(house_props);
        dailog_DeemedLetOutProperty.value = false
        axios.post('http://localhost:3000/investment',house_props).then(res=>{
            console.log(res.data);
        })
    }







    return {

        // varaible Declarations
        investment_exemption_steps, canShowLoading,

        // Tax Saving Investments 

        taxSavingInvestments,

        // hra begins

        hra_data, hra, current_data, dailogAddNewRental, dailogEditNewRental, editHraNewRental, fetchHraNewRental, saveHraNewRental, saveHRA,

        // hra ends

        // Sectiom 80cc Begins


        // Sectiom 80cc Ends

        // Other exemptiom Begins

        other_Exe, save80EE, save80EEA, save80EEB,

        // Other exemptiom Ends

        // House Property Begins

        house_props,house_props_data, dailog_SelfOccupiedProperty, dailog_DeemedLetOutProperty, dailog_LetOutProperty,
        fetchSelfOccupiedProperty,saveSelfOccupiedProperty,saveLetOutProperty,saveDeemedLetOutProperty,


        // House Property End






    };
});



