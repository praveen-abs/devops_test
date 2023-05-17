import axios from "axios";
import { defineStore } from "pinia";
import { investmentFormulaStore } from './investmentFormulaStore'
import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";
import { reactive, ref } from "vue";
import { Service } from '../../Service/Service'
import { data } from "autoprefixer";


/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously


*/

export const investmentMainStore = defineStore("investmentMainStore", () => {

    // Formula Store
    const formula = investmentFormulaStore()

    // Employee Service

    const service = Service()

    const currentUSerCode = ref()

    // Notification Service

    const toast = useToast();

    // Confirmation Service

    const confirm = useConfirm();

    // Steps for Investment and exemption tab's  Next and Previous Button

    const investment_exemption_steps = ref(1)

    // loading Spinner

    const canShowLoading = ref(false)

    // Tax Saving Investments

    const taxSavingInvestments = reactive({
        max_limit: '',
        declared_amt: '',
        status: 'Not Submited',
        Date_of_submission: '',

    })



    /* Investment and Exemptiom

    1) HRA                  - hra
    2)Section 80C & 80CCC    - sec_80cc
    3)Other Exemptions        - other_Exe

    4)House Property          - house_props

          1)sop - self occupied property
          1)lop - let out property
          1)dlop -Demmed let out property

    5)Reimbursement           - reimbursment
    6)Previous Employer Income - pre_emp_income
    7)Other Source Of Income    - oth_sour_of_income


    */


    // Getting Investment and Exemption Whole Data Source


    const investmentMainSource = ref()
    const formDataSource = reactive([])
    const getFormId = ref()
    const editingRowSource = ref()
    const updatedRowSource = ref()
    const hraSource = ref()
    const section80ccSource = ref()
    const otherExemptionSource = ref()
    const housePropertySource = ref()
    const reimbursmentSource = ref()
    const otherIncomeSource = ref()
    const previousEmployeerIncomeSource = ref()

    const getInvestmentSource = async () => {

        let url = `/investments/investments-form-details-template`

        await axios.post(url, {
            form_name: "investment 1"
        })
            .then(res => {
                // console.log(res.data.data.form_details);
                investmentMainSource.value = res.data.data.form_details
                hraSource.value = res.data.data.form_details.HRA
                section80ccSource.value = res.data.data.form_details["Section 80C & 80CC "]
                otherExemptionSource.value = res.data.data.form_details["Other Excemptions "]
                housePropertySource.value = res.data.data.form_details["House Properties "]
                reimbursmentSource.value = res.data.data.form_details["Reimbersument "]
                otherIncomeSource.value = res.data.data.form_details["Other Source Of  Income"]
                previousEmployeerIncomeSource.value = res.data.data.form_details["Previous Employer Income"]


                // console.log(res.data.data.form_details["Previous Employer Income"]);
            }).catch(e => console.log(e))
            .finally(() => {
                var declared_amt = 0;
                var max_limit = 0;
                console.log("completed");
                otherExemptionSource.value.forEach(item => {
                    // console.log(item);
                    declared_amt += item.dec_amount
                     taxSavingInvestments.declared_amt = declared_amt

                     max_limit += item.max_amount
                     taxSavingInvestments.max_limit = max_limit


                });
            })

    }


    const getDeclarationAmount = (amount) => {
        // Selected Row Data 
        console.log(amount);
        // Getting Form ID
        // getFormId.value = amount.form_id
        getFormId.value = 1
        var data = {
            fs_id: amount.fs_id,
            declaration_amount: amount.dec_amt,
        }

        if (amount.dec_amt) {
            // Append Data
            formDataSource.push(data)
        } else {
            console.log("Declaration Amount Null");
        }

        // console.log(formDataSource);

        var form_data = new FormData()

        for (var key in data) {
            form_data.append(key, data[key]);
        }
        console.log(form_data);

        if (amount.dec_amt > amount.max_amount) {
            toast.add({
                severity: "error",
                summary: "Waring",
                detail: "Declaration amount is greater than Maximum Limit",
                life: 3000,
            });
        } else {
            console.log("working");
        }

    }

    const editDeclarationAmount = () => {
        console.log();
    }


    const saveFormData = () => {
        console.log(formDataSource);
        canShowLoading.value = true
        console.log("code:" + service.current_user_code);
        console.log("Form Id:" + getFormId.value);
        let url = `/investments/saveEmpdetails`
        axios.post(url, {
            user_code: service.current_user_code,
            form_id: getFormId.value,
            formDataSource
        }).finally(() => {
            canShowLoading.value = false
            toast.add({
                severity: "success",
                summary: "Saved",
                detail: "Data Saved Successfull",
                life: 3000,
            });
            getInvestmentSource()
            formDataSource.splice(0, formDataSource.length);
            taxSavingInvestments.status = "Drafed"
        })
    }

    // COnvert Declaration Amount Into INR Currency

    const formatCurrency = (value) => {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'INR' }).format(value);
    }



    // HRA Begins

    const hra_data = ref()

    const current_data = ref()

    const hra = reactive({
        user_code: '',
        fs_id: '48',
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

    const fetchHraNewRental = async () => {
        console.log("getting hra new rental  data.......");
        console.log(hraSource.fs_id);
        await axios.post('/investments/fetchEmpRentalDetails', {
            user_code: service.current_user_code,
            fs_id: "48"
        }).then(res => {
            console.log(Object.values(res.data));
            hra_data.value = Object.values(res.data)

        }).catch(e => console.log(e)).finally(() => {
            canShowLoading.value = false

        })
    }

    const editHraNewRental = (currentRowData) => {

        console.log("editing Hra");
        console.log(currentRowData);

        dailogAddNewRental.value = true

        hra.from_month = currentRowData.json_popups_value.from_month
        hra.to_month = currentRowData.json_popups_value.to_month
        hra.address = currentRowData.json_popups_value.address
        hra.city = currentRowData.json_popups_value.city
        hra.landlord_PAN = currentRowData.json_popups_value.landlord_PAN
        hra.landlord_name = currentRowData.json_popups_value.landlord_name
        hra.total_rent_paid = currentRowData.json_popups_value.total_rent_paid

    }

    const saveHraNewRental = () => {
        hra.user_code = service.current_user_code
        canShowLoading.value = true
        dailogAddNewRental.value = false

        console.log("saving hra new rental  data.......");
        console.log(hra);

        axios.post('/investments/saveSectionPopups', hra).then(res => {
            console.log(res.data);
            toast.add({
                severity: "success",
                summary: "Drafted",
                detail: "New Rental Added",
                life: 3000,
            });
        }).catch(e => console.log(e)).finally(() => {
            canShowLoading.value = false
            fetchHraNewRental()
            taxSavingInvestments.status = "Drafed"
        
        })

    }


    const deleteRentalDetails = (currentRowData) => {
        console.log(currentRowData);
        confirm.require({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            acceptClass: 'p-button-danger',
            accept: () => {
                canShowLoading.value = true
                axios.post('/investments/deleteEmpRentalDetails', {
                    current_table_id: currentRowData.id
                }).finally(() => {
                    canShowLoading.value = false
                    toast.add({
                        severity: "error",
                        summary: "Deleted",
                        detail: "House Rented Allowance Deleted",
                        life: 3000,
                    });
                    fetchHraNewRental()
                })
            },
            reject: () => {
            }
        });
    };


    // HRA End


    // Section 80C & 80CCC Begins


    const sec80c80cc_data = ref()

    const sec80c80cc = reactive({
        EPF: "",
        VPF: "",
        PPF: "",
        LIP: "",
        SD_RCD: "",
        MD: "",
        NSC: "",
        ULIP: "",
        YTSFDR: "",
        DAP: "",
        SAP: "",
        SSY: "",
        STBIBNAR: "",
        SPF: "",
    })




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

    const other_exe_80EE = reactive({
        user_code: '',
        fs_id: '',
        loan_sanction_date: '',
        lender_type: '',
        property_value: '',
        loan_amount: '',
        interest_amount_paid: '',
    })
    const other_exe_80EEA = reactive({
        user_code: '',
        fs_id: '',
        loan_sanction_date: '',
        lender_type: '',
        property_value: '',
        loan_amount: '',
        interest_amount_paid: '',
    })
    const other_exe_80EEB = reactive({
        user_code: '',
        fs_id: '',
        loan_sanction_date: '',
        lender_type: '',
        property_value: '',
        loan_amount: '',
        interest_amount_paid: '',
        vechicle_brand: '',
        vechicle_model: '',
        interest_amount_paid: ''
    })

    


    const dailog_80EE = ref(false)
    const dailog_80EEA = ref(false)
    const dailog_80EEB = ref(false)

    const get80EESlotData = (data) => {
        dailog_80EE.value = true
        console.log(data);
        other_exe_80EE.user_code = service.current_user_code
        other_exe_80EE.fs_id = data.fs_id

    }
    const get80EEASlotData = (data) => {
        dailog_80EEA.value = true
        console.log(data);
        other_exe_80EEA.user_code = service.current_user_code
        other_exe_80EEA.fs_id = data.fs_id
    }
    const get80EEBSlotData = (data) => {
        dailog_80EEB.value = true
        console.log(data);
        other_exe_80EEB.user_code = service.current_user_code
        other_exe_80EEB.fs_id = data.fs_id
    }

    const Dec80EE = ref()
    const Dec80EEA = ref()
    const Dec80EEB = ref()

    const fetchOtherExe = () =>{
        //   otherExemptionSource.value.map(x => { 
        //     if(x.section == '80EE'){
        //       console.log("section 80EE");
        //        axios.post('/investments/fetchEmpRentalDetails', {
        //         user_code: service.current_user_code,
        //         fs_id: x.fs_id
        //     }).then(res => {
        //         console.log(Object.values(res.data));
        //         Dec80EE.value = Object.values(res.data)
    
        //     }).catch(e => console.log(e)).finally(() => {
        //         canShowLoading.value = false
    
        //     })
        //     }else
        //     if(x.section == '80EEA'){
        //         console.log("section 80EEA");
        //         axios.post('/investments/fetchEmpRentalDetails', {
        //             user_code: service.current_user_code,
        //             fs_id: x.fs_id
        //         }).then(res => {
        //             console.log(Object.values(res.data));
        //             Dec80EEA.value = Object.values(res.data)
        
        //         }).catch(e => console.log(e)).finally(() => {
        //             canShowLoading.value = false
        
        //         })
        //     }else
        //     if(x.section == '80EEB'){
        //         console.log("section 80EEB");
        //         axios.post('/investments/fetchEmpRentalDetails', {
        //             user_code: service.current_user_code,
        //             fs_id: x.fs_id
        //         }).then(res => {
        //             console.log(Object.values(res.data));
        //             Dec80EEB.value = Object.values(res.data)
        
        //         }).catch(e => console.log(e)).finally(() => {
        //             canShowLoading.value = false
        
        //         })
        //     }else{
        //         console.log("no values");
        //  }
            

        //  })
    }

    const save80EE = () => {
        dailog_80EE.value = false
        canShowLoading.value = true
        console.log("Saving Other exemption 80EE");
        console.log(data);
        axios.post('/investments/saveSectionPopups', other_exe_80EE).then(res => {
            console.log(res.data);
            toast.add({
                severity: "success",
                summary: "Drafted",
                detail: "80EE Added",
                life: 3000,
            });
        }).catch(e => console.log(e)).finally(() => {
            canShowLoading.value = false
        })
    }

    const save80EEA = () => {
        dailog_80EEA.value = false
        canShowLoading.value = true
        console.log("Saving Other exemption 80EEA");
        console.log(other_exe_80EEA);
        axios.post('/investments/saveSectionPopups', other_exe_80EEA).then(res => {
            console.log(res.data);
            canShowLoading.value = false
            toast.add({
                severity: "success",
                summary: "Drafted",
                detail: "New Rental Added",
                life: 3000,
            });
        }).catch(e => console.log(e)).finally(() => {
            canShowLoading.value = false
        })
    }

    const save80EEB = () => {
        dailog_80EEB.value = false
        canShowLoading.value = true
        console.log("Saving Other exemption 80EEB");
        console.log(other_exe_80EEB);
        axios.post('/investments/saveSectionPopups', other_exe_80EEB).then(res => {
            console.log(res.data);
            toast.add({
                severity: "success",
                summary: "Drafted",
                detail: "New Rental Added",
                life: 3000,
            });
        }).catch(e => console.log(e)).finally(() => {
            canShowLoading.value = false
        })
    }

    // Other Exemptions  Ends



    // House Property Begins

    const house_props_data = ref()

    const dailog_SelfOccupiedProperty = ref(false)
    const dailog_LetOutProperty = ref(false)
    const dailog_DeemedLetOutProperty = ref(false)

    // Self Occupied Property

    const sop = reactive({
        user_code: '',
        fs_id: '',
        lender_name: '',
        lender_pan: '',
        lender_type: '',
        loss_from_housing_property: '',
        address: '',
        property_type: 'Self Occupied Property'
    })

    // Let Out Property

    const lop = reactive({
        user_code: '',
        fs_id: '',
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
        property_type: 'Let Out Property'
    })

    // Deemed Let Out Property

    const dlop = reactive({
        user_code: '',
        fs_id: '',
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
        property_type: 'Deemed Let Out Property'
    })



    const income_loss_calculation = () => {
        const lop_maintenance = formula.maintenance_cal(lop.lender_type, lop.rent_received, lop.municipal_tax)
        const dlop_maintenance = formula.maintenance_cal(dlop.lender_type, dlop.rent_received, dlop.municipal_tax)
        lop.maintenance = lop_maintenance
        dlop.maintenance = dlop_maintenance
        console.log("lop:" + lop_maintenance);
        console.log("dlop:" + dlop_maintenance);
        setTimeout(() => {
            const lop_net = formula.net_value_cal(lop.rent_received, lop.municipal_tax, lop.maintenance)
            console.log(lop_net);
            lop.net_value = lop_net;
            const dlop_net = formula.net_value_cal(dlop.rent_received, dlop.municipal_tax, dlop.maintenance)
            console.log(dlop_net);
            dlop.net_value = dlop_net;
        }, 1000);
        lop.income_loss = formula.income_loss_cal(lop.interest, lop.net_value)
        dlop.income_loss = formula.income_loss_cal(dlop.interest, dlop.net_value)


    }

    const fetchSelfOccupiedProperty = () => {

        // axios.get('http://localhost:3000/investment').then(res => {
        //     console.log(res.data);
        //     house_props_data.value = res.data
        // })
    }

    
    const getSopSlotData = (data) => {
        dailog_SelfOccupiedProperty.value = true
        console.log(data);
        sop.user_code = service.current_user_code
        sop.fs_id = data.fs_id

    }
    const getLopSlotData = (data) => {
        dailog_LetOutProperty.value = true
        console.log(data);
        lop.user_code = service.current_user_code
        lop.fs_id = data.fs_id
    }
    const getDlopSlotData = (data) => {
        dailog_DeemedLetOutProperty.value = true
        console.log(data);
        dlop.user_code = service.current_user_code
        dlop.fs_id = data.fs_id
    }

    const saveSelfOccupiedProperty = () => {
        dailog_SelfOccupiedProperty.value = false
        console.log(sop);
        axios.post('/investments/saveSectionPopups', sop).then(res => {
            console.log(res.data);
            fetchSelfOccupiedProperty()
        })
    }
    const saveLetOutProperty = () => {
        console.log(lop);
        dailog_LetOutProperty.value = false
        // axios.post('http://localhost:3000/investment',
        //     lop).then(res => {
        //         console.log(res.data);
        //         fetchSelfOccupiedProperty()
        //     })
    }
    const saveDeemedLetOutProperty = () => {
        console.log(dlop);
        dailog_DeemedLetOutProperty.value = false
        // axios.post('http://localhost:3000/investment', dlop).then(res => {
        //     console.log(res.data);
        //     fetchSelfOccupiedProperty()
        // })

    }




    return {fetchOtherExe,Dec80EE,Dec80EEA,Dec80EEB,

        // varaible Declarations
        investment_exemption_steps, currentUSerCode, canShowLoading, getInvestmentSource, saveFormData, getFormId, formatCurrency, editingRowSource, updatedRowSource,

        // Data Source

        investmentMainSource, formDataSource, hraSource, section80ccSource, otherExemptionSource, housePropertySource, reimbursmentSource, previousEmployeerIncomeSource, otherIncomeSource,

        // Tax Saving Investments

        taxSavingInvestments,

        // hra begins

        hra_data, hra, current_data, dailogAddNewRental, dailogEditNewRental, editHraNewRental, fetchHraNewRental, saveHraNewRental, deleteRentalDetails,

        // hra ends

        // Sectiom 80cc Begins
        getDeclarationAmount,

        // Sectiom 80cc Ends

        // Other exemptiom Begins

        other_Exe, dailog_80EE, dailog_80EEA, dailog_80EEB, other_exe_80EE, other_exe_80EEA, other_exe_80EEB, save80EE, save80EEA, save80EEB,
        get80EESlotData, get80EEASlotData, get80EEBSlotData,

        // Other exemptiom Ends

        // House Property Begins

        house_props_data, dailog_SelfOccupiedProperty, dailog_DeemedLetOutProperty, dailog_LetOutProperty, income_loss_calculation,
        fetchSelfOccupiedProperty, saveSelfOccupiedProperty, saveLetOutProperty, saveDeemedLetOutProperty, lop, sop, dlop,getDlopSlotData,getLopSlotData,getSopSlotData,


        // House Property End






    };
});



