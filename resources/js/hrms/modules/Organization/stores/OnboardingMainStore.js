import { defineStore } from "pinia";
import { computed, reactive, ref } from "vue";
import axios from "axios";
import { inject } from "vue";
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import * as XLSX from 'xlsx';
import { useRouter, useRoute } from "vue-router";





export const useOnboardingMainStore = defineStore("useOnboardingMainStore", () => {



    const service = Service()
    const router = useRouter();


    const canShowloading = ref(false)



    const EmployeeQuickOnboardingSource = ref()
    const EmployeeQuickOnboardingDynamicHeader = ref()
    const selectedFile = ref()

    const totalRecordsCount = ref([])
    const errorRecordsCount = ref([])


    const getExcelForUpload  =(e) =>{
        selectedFile.value = e.target.files[0];
    }


    const convertExcelIntoArray = (e) => {

        canShowloading.value = true

        var file = selectedFile.value;
        // input canceled, return
        if (!file) return;

        setTimeout(() => {
            router.push({ path: `/testing_shelly/${'quickOnboarding'}` })
            canShowloading.value = false
        }, 400);

        var reader = new FileReader();
        reader.onload = function (e) {
            const data = reader.result;
            var workbook = XLSX.read(data, { type: 'binary' });
            var firstSheet = workbook.Sheets[workbook.SheetNames[0]];

            // header: 1 instructs xlsx to create an 'array of arrays'
            var result = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

            const jsonData = workbook.SheetNames.reduce((initial, name) => {
                const sheet = workbook.Sheets[name];
                initial[name] = XLSX.utils.sheet_to_json(sheet);
                return initial;
            }, {});

            EmployeeQuickOnboardingSource.value = jsonData.Sheet1
            totalRecordsCount.value.push(EmployeeQuickOnboardingSource.value)


            // console.log(jsonData['Sheet1']);

            for (let index = 0; index < jsonData['Sheet1'].length; index++) {
                console.log("jsonData['Sheet1'].length :", jsonData['Sheet1'].length);


                const validationResult = getValidationMessages(
                    EmployeeQuickOnboardingSource.value[index]
                );
            }

            let excelRowData = []

            jsonData.Sheet1.forEach(element => {

                let format = {
                    title: Object.keys(element),
                    value: Object.values(element)
                }
                excelRowData.push(format)

            });

            let excelHeaders = []
            let RowIndex = 0
            let initialColumnValue = 0



            for (let i = 0; i < excelRowData.length; i++) {
                const singleRowData = excelRowData[i];
                RowIndex = i

                for (let j = 0; j < singleRowData.value.length; j++) {
                    const value = singleRowData.value[j];
                    const title = singleRowData.title[j];

                    let form = {
                        title: title,
                        value: value
                    }

                    /*
                    To Avoid duplicate Header insert
                      - only allow first index object headers
                     */

                    if (RowIndex == initialColumnValue) {
                        excelHeaders.push(form)
                    }
                }
            }

            EmployeeQuickOnboardingDynamicHeader.value = excelHeaders


        };
        reader.readAsArrayBuffer(file);
    }

    // Helper Function



    const existingUserCode = ref()
    const existingEmails = ref()
    const existingMobileNumbers = ref()
    const existingPanCards = ref()
    const existingAadharCards = ref()
    const existingBankAccountNumbers = ref()

    const getExistingOnboardingDocuments = () => {

        axios.get('/onboarding/getEmployeeMandatoryDetails').then(res => {

            Object.values(res.data).forEach(element => {
                existingUserCode.value = element.user_code
                existingMobileNumbers.value = element.mobile_number
                existingEmails.value = element.email
                existingPanCards.value = element.pan_number
                existingAadharCards.value = element.aadhar_number
                existingBankAccountNumbers.value = element.bankaccount_number

            });
        })
    }

    const isLetter = (e) => {
        if (/^[A-Za-z_ ]+$/.test(e)) {
            return false
        } else {
            return true
        }
    }

    const isSpecialChars = (e) => {
        if (/^[A-Za-z0-9]+$/.test(e) && !existingUserCode.value.includes(e)) {
            return false
        } else {
            return true

        }
    }

    const isNumber = (e) => {
        if (/^[0-9]+$/.test(e)) {
            return false
        } else {
            return true

        }
    }

    const isEmail = (e) => {
        if (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e) && !existingEmails.value.includes(e)) {
            return false
        } else {
            return true

        }
    }

    const isValidAadhar = (e) => {
        if (/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(e) &&  !existingAadharCards.value.includes(e)) {
            return false
        } else {
            return true
        }
    }
    const isValidPancard = (e) => {
        if (/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(e) && !existingPanCards.value.includes(e)) {
            return false
        } else {
            return true
        }
    }
    const isValidBankAccountNo = (e) => {
        if (/^[0-9]{9,18}$/.test(e) &&  !existingBankAccountNumbers.value.includes(e)) {
            return false
        } else {
            return true
        }
    }
    const isValidBankIfsc = (e) => {
        if (/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(e)) {
            return false
        } else {
            return true
        }
    }
    const isValidDate = (e) => {
        if (/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/.test(e) || /^[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}$/.test(e)) {
            return false
        } else {
            return true
        }
    }

    const isValidMobileNumber = (e) => {
        if (/^[0-9]{10,10}$/.test(e) && !existingMobileNumbers.value.includes(e)) {
            return false
        } else {
            return true

        }
    }



    const isEnteredNos = (e) => {
        let char = String.fromCharCode(e.keyCode); // Get the character
        if (/^[0-9]+$/.test(char)) return true; // Match with regex
        else e.preventDefault(); // If not match, don't add to input text
    }

    const isEnterLetter = (e) => {
        let char = String.fromCharCode(e.keyCode); // Get the character
        if (/^[A-Za-z_ ]+$/.test(char)) return true; // Match with regex
        else e.preventDefault(); // If not match, don't add to input text
    }

    const isEnterSpecialChars = (e) => {
        let char = String.fromCharCode(e.keyCode); // Get the character
        if (/^[A-Za-z0-9]+$/.test(char)) return true; // Match with regex
        else e.preventDefault(); // If not match, don't add to input text
    }



    const getValidationMessages = (data) => {
        let errorMessages = [];
        const digitRegexp = /\w*\d{1,}\w*/;
        const emailRegexp =
            /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        const websiteRegexp =
            new RegExp('^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$');

        if (isSpecialChars(data['Employee Code']) || existingUserCode.value.includes(data['Employee Code'])) {
            errorRecordsCount.value.push('invalid')
        }
        else
            if (isValidDate(data['DOJ']) || isValidDate(data['DOB'])) {
                errorRecordsCount.value.push('invalid')
            }
            else
                if (isValidAadhar(data['Aadhar']) || isValidMobileNumber(data['Mobile Number'])) {
                    errorRecordsCount.value.push('invalid')
                }
                else
                    if (isValidPancard(data['Pan No']) && isValidBankIfsc(data['Bank ifsc'])) {
                        errorRecordsCount.value.push('invalid')
                    }


        return errorMessages;
    }







    const bankList = ref();
    const country = ref();
    const departmentDetails = ref();
    const state = ref();
    const ManagerDetails = ref();
    const maritalDetails = ref();
    const bloodGroups = ref();





    const getBasicDeps = () => {
        // For Bank Data
        service.getBankList().then((result) => bankList.value = result.data);
        //  For Countries
        service.getCountryList().then((result) => (country.value = result.data));

        service.getStateList().then((result) => (state.value = result.data));
        // for Manager Details
        service.ManagerDetails().then((result) => (ManagerDetails.value = result.data));

        //Get Department details

        service.DepartmentDetails().then((result) => (departmentDetails.value = result.data));

        service.getMaritalStatus().then((result) => {
            maritalDetails.value = result.data;
        });

        service.getBloodGroups().then((result) => (bloodGroups.value = result.data));
    }



    return {


        // TODO:: Separate

        getExistingOnboardingDocuments, existingUserCode, existingEmails, existingMobileNumbers,existingAadharCards,existingPanCards,existingBankAccountNumbers,

        isLetter, isEmail, isNumber, isEnterLetter, isEnterSpecialChars, isEnterSpecialChars, isValidAadhar, isValidBankAccountNo, isValidBankIfsc, isSpecialChars,
        isValidDate, isValidMobileNumber, isValidPancard, isEnteredNos, totalRecordsCount, errorRecordsCount,selectedFile,


        convertExcelIntoArray, EmployeeQuickOnboardingDynamicHeader, EmployeeQuickOnboardingSource, getValidationMessages,getExcelForUpload,

        // View

        canShowloading,


        // Onboarding Helper functions

        // Basic Depes
        getBasicDeps, bankList, country, state, departmentDetails, ManagerDetails, maritalDetails, bloodGroups,

    }
})
