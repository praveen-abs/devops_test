/*
Normal Onboarding

HTML fields
Validation
AJAX



*/

import { required, email, maxLength } from "@vuelidate/validators";
import axios from "axios";

// API's

export async function getBankList() {
    const response = await axios.get(`/db/getBankDetails`);
    return response.data;
}

export async function getCountryList() {
    const response = await axios.get(`/db/getCountryDetails`);
    return response.data;
}
export async function getStateList() {
    const response = await axios.get(`/db/getStatesDetails`);
    return response.data;
}
export async function ManagerDetails(){
    const response=await axios.get(`/fetch-managers-name`);
    return response.data
}

export async function DepartmentDetails(){
    const response=await axios.get(`/fetch-departments`);
    return response.data
}

export async function getMaritalStatus(){
    const response=await axios.get(`/fetch-marital-details`);
    return response.data
}


export async function getBloodGroups(){
    const response=await axios.get(`/fetch-blood-groups`);
    return response.data
}

// Validation

export default function validation(rules) {
    return (rules = {
        //   Person Detials Validation start

        employee_code: {},
        dob: {},
        gender: {},
        passport_number: {},
        passport_date: {},
        blood_group_id: {},
        physically_challenged: {},
        gender: {},
        dl_no: {},
        nationality: {},

        doj: {
            required,
        },

        aadhar_number: {
            required,
            ValidateAadhar(value) {
                const regex = /^\d{4}\s\d{4}\s\d{4}$/;
                return regex.test(value);
            },
        },
        bank_id: {
            required,
        },
        employee_name: {
            required,
        },
        gender: {
            required,
        },
        pan_number: {
            required,
            ValidatePan(value) {
                const regex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}/;
                return regex.test(value);
            },
        },

        AccountNumber: {
            required,
            ValidateAccountNo(value) {
                const regex = /^[0-9]{9,18}$/;
                return regex.test(value);
            },
        },

        dob: {
            required,
        },
        mobile_number: {
            required,
            maxLength: 10,
        },
        BankIFSCCode: {
            required,
            ValidateIfscNo(value) {
                const regex = /^[A-Z]{4}0[A-Z0-9]{6}$/;
                return regex.test(value);
            },
        },
        marital_status: { required   },

        PersonDetialsEmail: {
            required,
            email,
        },
        nationality: {
            required,
        },
        physically_challenged: {
            required,
        },
        //  Person Details End

        // Address Validation Start
        CurrentAddress1: {
            required,
        },
        CurrentAddress2: {
            required,
        },
        CurrentCountry: {
            required,
        },
        CurrentState: {
            required,
        },
        CurrentCity: {
            required,
        },
        CurrentPincode: {
            required,
            maxLength: 6,
        },
        PermanentAddress1: {
            required,
        },
        PermanentAddress2: {
            required,
        },
        Permanentcountry: {
            required,
        },
        Permanentstate: {
            required,
        },
        PermanentCity: {
            required,
        },
        PermanentPincode: {
            required,
            maxLength: 6,
        },

        // Addres End

        // Office Details Start
        Process: {
            required,
        },
        Designation: {
            required,
        },
        Departmant: {},
        CostCenter: {},
        probationPeriod: {},
        ReportingManagerName: {},
        holidayLocation: {},
        OfficialEmail: {},
        OfficialMobileNO: {},
        probationPeriod: {},
        EmployeeNoticePeriodDays: {},
        WorkLocation: {
            required,
        },
        ReportingManagerCode: {
            required,
        },
        DateOfConfirmation: {
            required,
        },

        // Office Detials End

        // Family Details Start

        fatherName: { required },
        fatherDateofBirth: { required },
        motherName: { required },
        motherDateofBirth: { required },
        SpouseName: { required },
        dateOfWedding: {  },
        spouseGender: { required },
        SpouseDOB: { required },

        // Personal Documents
    });
}
