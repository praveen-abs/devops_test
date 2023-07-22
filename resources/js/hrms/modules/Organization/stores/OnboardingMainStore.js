import { defineStore } from "pinia";
import { computed, reactive, ref } from "vue";
import axios from "axios";
import { inject } from "vue";
import { useToast } from "primevue/usetoast";
import { Service } from "../../Service/Service";
import * as XLSX from 'xlsx';
import { useRouter, useRoute } from "vue-router";
import dayjs from "dayjs";





export const useOnboardingMainStore = defineStore("useOnboardingMainStore", () => {



    const service = Service()
    const router = useRouter();


    const canShowloading = ref(false)



    const EmployeeQuickOnboardingSource = ref()
    const EmployeeQuickOnboardingDynamicHeader = ref()
    const selectedFile = ref()

    const totalRecordsCount = ref([])
    const errorRecordsCount = ref([])


    const getExcelForUpload = (e) => {
        selectedFile.value = e.target.files[0];
    }

    const convertExcelIntoArray = (e) => {

        // canShowloading.value = true

        // var file = selectedFile.value;
        var file = e.target.files[0];
        // input canceled, return
        if (!file) return;

        // setTimeout(() => {
        //     router.push({ path: `/testing_shelly/${'quickOnboarding'}` })
        //     canShowloading.value = false
        // }, 400);

        var reader = new FileReader();
        reader.onload = function (e) {
            const data = reader.result;
            var workbook = XLSX.read(data, { type: 'binary', cellDates: true, dateNF: "dd/mm/yyyy" });
            var firstSheet = workbook.Sheets[workbook.SheetNames[0]];


            // Dynamically Find header's from imported excel sheet

            let excelHeaders = []
            const headers = {};
            const range = XLSX.utils.decode_range(firstSheet['!ref']);
            let C;
            const R = range.s.r;
            /* start in the first row */
            for (C = range.s.c; C <= range.e.c; ++C) {
                /* walk every column in the range */
                const cell = firstSheet[XLSX.utils.encode_cell({ c: C, r: R })];
                /* find the cell in the first row */
                let hdr = "UNKNOWN " + C; // <-- replace with your desired default
                if (cell && cell.t) hdr = XLSX.utils.format_cell(cell);
                headers[C] = hdr;

                let form = {
                    title: headers[C],
                    value: headers[C]
                }

                excelHeaders.push(form)

            }
            EmployeeQuickOnboardingDynamicHeader.value = excelHeaders

            // header: 1 instructs xlsx to create an 'array of arrays'
            // var result = XLSX.utils.sheet_to_json(firstSheet, { raw: false, header: 1, dateNF: "dd/mm/yyyy" });

            const jsonData = workbook.SheetNames.reduce((initial, name) => {
                const sheet = workbook.Sheets[name];
                initial[name] = XLSX.utils.sheet_to_json(sheet, { raw: false, dateNF: "dd/mm/yyyy" });
                return initial;
            }, {});

            const importedExcelKey = Object.keys(jsonData)[0]

            EmployeeQuickOnboardingSource.value = jsonData.Sheet1
            totalRecordsCount.value.push(EmployeeQuickOnboardingSource.value)

            // console.log(jsonData['Sheet1']);

            for (let index = 0; index < jsonData[importedExcelKey].length; index++) {
                console.log("jsonData['Sheet1'].length :", jsonData[importedExcelKey].length);

                const validationResult = getValidationMessages(
                    EmployeeQuickOnboardingSource.value[index]
                );
            }
        };
        reader.readAsArrayBuffer(file);
    }

    // Helper Function


    const findDuplicate = (array) => {
        let result = array.length !== new Set(array).size ? true : false;
        console.log("Selected row contains dup's : " + result);
        return result
    }



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

    const isUserExists = (e) => {
        if (existingUserCode.value.includes(e)) {
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
        if (/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(e) && !existingAadharCards.value.includes(e)) {
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
        if (/^[0-9]{9,18}$/.test(e) && !existingBankAccountNumbers.value.includes(e)) {
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

        // console.log("Usercode:" + data["Employee code"] + isUserExists(data["Employee Code"]));
        // console.log("Already" + data["Employee code"] + Object.values(data).includes(data["Employee Code"]));

        if (Object.values(data).includes(data["Employee Code"]) || !isUserExists(data["Employee code"])) {
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
                    if (isValidPancard(data['Pan No']) || isValidBankIfsc(data['Bank ifsc'])) {
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

        findDuplicate,
        // TODO:: Separate

        getExistingOnboardingDocuments, existingUserCode, existingEmails, existingMobileNumbers, existingAadharCards, existingPanCards, existingBankAccountNumbers,

        isLetter, isEmail, isNumber, isEnterLetter, isEnterSpecialChars, isEnterSpecialChars, isValidAadhar, isValidBankAccountNo, isValidBankIfsc, isSpecialChars,
        isValidDate, isValidMobileNumber, isValidPancard, isEnteredNos, totalRecordsCount, errorRecordsCount, selectedFile, isUserExists,



        convertExcelIntoArray, EmployeeQuickOnboardingDynamicHeader, EmployeeQuickOnboardingSource, getValidationMessages, getExcelForUpload,

        // View

        canShowloading,


        // Onboarding Helper functions

        // Basic Depes
        getBasicDeps, bankList, country, state, departmentDetails, ManagerDetails, maritalDetails, bloodGroups,

    }
})
