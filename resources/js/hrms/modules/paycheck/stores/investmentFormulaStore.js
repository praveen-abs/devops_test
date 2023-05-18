import axios from "axios";
import { defineStore } from "pinia";


/*
    This Pinia code will store the ajax values of the
    profile page.
    This code is called from Parents onMounted method asynchronously

*/

export const investmentFormulaStore = defineStore("investmentFormulaStore", () => {


    // Tax Calculation

    const taxCalculation = (total_income) => {

        console.log("total income :" + total_income);

        let regime = "new"

        let age = 59


        if (regime == 'old') {


            if (total_income > 250000 && total_income < 500000) {

                if (age < 80) {

                    let taxable_amount = total_income * 5 / 100;

                    console.log("taxable_amount :" + Math.floor(taxable_amount));


                    console.log("old regime total income is greater than 250000");

                }



            } else
                if (total_income > 500000 && total_income < 1000000) {

                    let taxable_amount = total_income * 20 / 100;

                    console.log("taxable_amount :" + Math.floor(taxable_amount));

                    console.log("old regime total income greater than 500000");


                } else
                    if (total_income > 1000000) {

                        let taxable_amount = total_income * 30 / 100;

                        console.log("taxable_amount :" + Math.floor(taxable_amount));

                        console.log("old regime total income greater than 1000000");

                    }
                    else {
                        console.log("less than 250000");
                    }


        } else
            if (regime == 'new') {

                if (total_income > 300001 && total_income < 600000) {

                    let taxable_amount = total_income * 5 / 100;

                    console.log("taxable_amount :" + Math.floor(taxable_amount));

                    console.log("new regime total income greater than 300001");


                } else
                    if (total_income > 600001 && total_income < 900000) {

                        let taxable_amount = total_income * 10 / 100;

                        console.log("taxable_amount :" + Math.floor(15000 + taxable_amount));

                        console.log("new regime total income greater than 600001");


                    } else
                        if (total_income > 900001 && total_income < 1200000) {

                            let taxable_amount = total_income * 15 / 100;

                            console.log("taxable_amount :" + Math.floor(30000 + taxable_amount));

                            console.log("new regime total income greater than 900001 ");


                        } else
                            if (total_income > 1200001 && total_income < 1500000) {

                                let taxable_amount = total_income * 20 / 100;

                                console.log("taxable_amount :" + Math.floor(45000 + taxable_amount));

                                console.log("new regime total income greater than 1200001");

                            } else
                                if (total_income > 1500000) {

                                    let taxable_amount = total_income * 30 / 100;

                                    console.log("taxable_amount :" + Math.floor(90000 + taxable_amount));

                                    console.log("new regime total income greater than 1000000");

                                } else {
                                    console.log("less than 300000 ");
                                }
            }
            else {
                console.log("No More Regime");
            }

    }


    // House property

    // Let Out Property and Deemed let out Property

    const maintenance_cal = (lender_type, rent_rec, munic_tax) => {

        if (lender_type == 'Financial Institution' || lender_type == 'Others') {

            let main = (rent_rec - munic_tax) * 30 / 100

            return main

        } else {
            console.log("Lender type is not exists");
        }
    }

    const net_value_cal = (rent_rec, munic_tax, main) => {

        let net_value = rent_rec - munic_tax - main

        return net_value;
    }

    const income_loss_cal = (interest, net) => {
        let income_loss = net - interest
        return income_loss;
    }




    return {

        // varaible Declarations
        taxCalculation, maintenance_cal, net_value_cal, income_loss_cal

    };
});



