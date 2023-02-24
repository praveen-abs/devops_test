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

// File Upload Post Request

// export  function FileUpload(file) {
//     const response =  axios
//         .post("http://localhost:3000/posts", file)
//         .then((res) => {
//             alert("sent");
//             console.log(res);
//         })
//         .catch((err) => {
//             alert("not sent");
//         });
//     return response;
// }



export function EmployeeDetials() {
    return {
        EmployeeCode: "",
        DateOfJoining: "",
        AadhaarNumber: "",
        PassportNumber: "",
        BankName: "",
        EmployeeNameasper: "",
        PersonDetialsGender: "",
        PanNumber: "",
        PassportExpDate: "",
        AccountNumber: "",
        PersonDetialsDateofBirth: "",
        PersonDetialsMobileNumber: "",
        DLNumber: "",
        PersonDetialsBloodGroup: "",
        BankIFSCCode: "",
        PersonDetialsMaritalStatus: "",
        PersonDetialsEmail: "",
        ChooseNationality: "",
        PhysicallyChallenged: "",

        // person Detials End

        // Address detials

        // Current Address Detials Start

        CurrentAddress1: "",
        CurrentAddress2: "",
        currentcountry: "",
        currentstate: "",
        currentCity: "",
        currentPincode: "",

        // Current Address Details End

        // Permanant Address Start

        PermanentAddress1: "",
        PermanentAddress2: "",
        Permanentcountry: "",
        Permanentstate: "",
        PermanentCity: "",
        PermanentPincode: "",

        // Permanant Address end

        // Office Detials Start

        Departmant: "",
        Process: "",
        Designation: "",
        CostCenter: "",
        probationPeriod: "",
        WorkLocation: "",
        ReportingManagerCode: "",
        ReportingManagerName: "",
        holidayLocation: "",
        OfficialEmail: "",
        OfficialMobileNO: "",
        EmployeeNoticePeriodDays: "",
        DateOfConfirmation: "",

        // Office Details End

        // family Details Start

        fatherName: "",
        fatherDateofBirth: "",
        fatherGender: "",
        fatherAge: "",
        motherName: "",
        motherDateofBirth: "",
        motherGender: "",
        motherAge: "",
        SpouseName: "",
        dateOfWedding: "",
        spouseGender: "",
        SpouseDOB: "",
        noOfChildren: "",

        // family Details End

        // Personal Documents Start

        AadharCardFront: "",
        AadharCardBack: "",
        PanCardDoc: "",
        PassportDoc: "",
        VoterIdDoc: "",
        DrivingLicenseDoc: "",
        EductionCertifacte: "",
        ReleivingLetterDoc: "",
    };
}

// Validation

export default function validation(rules) {
    return (rules = {
        //   Person Detials Validation start

        EmployeeCode: {},
        PersonDetialsDateofBirth: {},
        PersonDetialsGender: {},
        DLNumber: {},
        ChooseNationality: {},
        PassportNumber: {},
        PassportExpDate: {},
        PersonDetialsBloodGroup: {},
        PhysicallyChallenged: {},
        PersonDetialsGender: {},
        DLNumber: {},
        PhysicallyChallenged: {},
        ChooseNationality: {},
        PersonDetialsBloodGroup: {},

        DateOfJoining: {
            required,
        },

        AadhaarNumber: {
            required,
            ValidateAadhar(value) {
                const regex = /^\d{4}\s\d{4}\s\d{4}$/;
                return regex.test(value);
            },
        },
        BankName: {
            required,
        },
        EmployeeNameasper: {
            required,
        },
        PersonDetialsGender: {
            required,
        },
        PanNumber: {
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

        PersonDetialsDateofBirth: {
            required,
        },
        PersonDetialsMobileNumber: {
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
        PersonDetialsMaritalStatus: {
            required,
        },
        PersonDetialsEmail: {
            required,
            email,
        },
        ChooseNationality: {
            required,
        },
        PhysicallyChallenged: {
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
        currentcountry: {
            required,
        },
        currentstate: {
            required,
        },
        currentCity: {
            required,
        },
        currentPincode: {
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
        dateOfWedding: { required },
        SpouseDOB: { required },

        name: {
            required,
        },
        email: {
            required,
            email,
        },
        password: {
            required,
        },
        accept: {
            required,
        },
    });
}
