import { useRouter, useRoute, createRouter, createWebHistory } from "vue-router";
import { ref, onUpdated, resolveComponent, resolveDirective, unref, withCtx, openBlock, createBlock, Fragment, renderList, createVNode, mergeProps, withDirectives, createCommentVNode, createTextVNode, toDisplayString, useSSRContext, onMounted } from "vue";
import { ssrInterpolate, ssrRenderComponent, ssrRenderList, ssrRenderClass, ssrRenderAttrs, ssrGetDirectiveProps, ssrRenderStyle } from "vue/server-renderer";
import axios from "axios";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import { S as Service } from "./Service46681.js";
import * as XLSX from "xlsx";
import { u as useNormalOnboardingMainStore } from "./NormalOnboardingMainStore46681.js";
import "dayjs";
import { _ as _export_sfc } from "./_plugin-vue_export-helper46681.js";
const useOnboardingMainStore = defineStore("useOnboardingMainStore", () => {
  Service();
  useNormalOnboardingMainStore();
  const router2 = useRouter();
  const canShowloading = ref(false);
  const toast = useToast();
  const EmployeeQuickOnboardingSource = ref();
  const EmployeeQuickOnboardingDynamicHeader = ref();
  const selectedFile = ref();
  const totalRecordsCount = ref([]);
  const errorRecordsCount = ref([]);
  const initialUpdate = ref(false);
  const isValueUpdated2 = ref(false);
  const onboardedType = ref();
  const type = ref();
  const getExcelForUpload = (e) => {
    selectedFile.value = e.target.files[0];
  };
  const convertExcelIntoArray = (onboardingType) => {
    onboardedType.value = onboardingType;
    console.log(onboardingType);
    if (selectedFile.value) {
      canShowloading.value = true;
      var file = selectedFile.value;
      if (!file)
        return;
      setTimeout(() => {
        if (onboardingType == "quick") {
          type.value = "quick";
          router2.push({ path: `/import/${"quickOnboarding"}` });
        } else if (onboardingType == "bulk") {
          type.value = "bulk";
          router2.push({ path: `/import/${"bulkOnboarding"}` });
        } else {
          type.value = "";
        }
        canShowloading.value = false;
      }, 500);
      var reader = new FileReader();
      reader.onload = function(e) {
        const data = reader.result;
        var workbook = XLSX.read(data, { type: "binary", cellDates: true, dateNF: "dd-mm-yyyy" });
        var firstSheet = workbook.Sheets[workbook.SheetNames[0]];
        let excelHeaders = [];
        const headers = {};
        const range = XLSX.utils.decode_range(firstSheet["!ref"]);
        let C;
        const R = range.s.r;
        for (C = range.s.c; C <= range.e.c; ++C) {
          const cell = firstSheet[XLSX.utils.encode_cell({ c: C, r: R })];
          let hdr = "UNKNOWN " + C;
          if (cell && cell.t)
            hdr = XLSX.utils.format_cell(cell);
          headers[C] = hdr;
          let form = {
            title: headers[C],
            value: headers[C]
          };
          !headers[C].includes("UNKNOWN") ? excelHeaders.push(form) : "";
        }
        EmployeeQuickOnboardingDynamicHeader.value = excelHeaders;
        console.log(excelHeaders);
        const jsonData = workbook.SheetNames.reduce((initial, name) => {
          const sheet = workbook.Sheets[name];
          initial[name] = XLSX.utils.sheet_to_json(sheet, { raw: false, dateNF: "dd-mm-yyyy" });
          return initial;
        }, {});
        const importedExcelKey = Object.keys(jsonData)[0];
        jsonData[importedExcelKey] ? EmployeeQuickOnboardingSource.value = jsonData[importedExcelKey] : EmployeeQuickOnboardingSource.value = [];
        EmployeeQuickOnboardingSource.value ? getCurrentlyImportedTableDuplicateEntries(EmployeeQuickOnboardingSource.value) : "";
        totalRecordsCount.value.push(EmployeeQuickOnboardingSource.value);
        for (let index = 0; index < jsonData[importedExcelKey].length; index++) {
          console.log("jsonData['Sheet1'].length :", jsonData[importedExcelKey].length);
          getValidationMessages(
            EmployeeQuickOnboardingSource.value[index]
          );
        }
      };
      reader.readAsArrayBuffer(file);
    } else {
      toast.add({
        severity: "error",
        summary: "file missing!",
        detail: "selected",
        life: 2e3
      });
    }
  };
  const uploadOnboardingFile = (data) => {
    let url = "";
    if (type.value == "quick") {
      url = "/onboarding/storeQuickOnboardEmployees";
    } else if (type.value == "bulk") {
      url = "/onboarding/storeBulkOnboardEmployees";
    }
    if (errorRecordsCount.value == 0) {
      canShowloading.value = true;
      axios.post(url, data).then((res) => {
        canShowloading.value = false;
        if (res.data.status == "failure") {
          toast.add({
            severity: "error",
            summary: "failure",
            detail: `${res.data.message}`,
            life: 3e3
          });
        } else if (res.data.status == "success") {
          res.data.data.forEach((element) => {
            toast.add({
              severity: "success",
              summary: `${element["Employee_Name"]}`,
              detail: `${element.message}`,
              life: 3e3
            });
          });
          setTimeout(() => {
            window.location.replace(window.location.origin + "/manageEmployees");
          }, 4e3);
        }
      }).finally(() => {
      });
    } else {
      toast.add({
        severity: "error",
        summary: "Failure!",
        detail: "Clear error fields",
        life: 3e3
      });
    }
  };
  function findDuplicates(arr) {
    return arr.filter((currentValue, currentIndex) => arr.indexOf(currentValue) !== currentIndex);
  }
  let currentlyImportedTableEmployeeCodeValues = ref([]);
  let currentlyImportedTableEmailValues = ref([]);
  let currentlyImportedTableMobileNumberValues = ref([]);
  let currentlyImportedTablePanValues = ref([]);
  let currentlyImportedTableAadharValues = ref([]);
  let currentlyImportedTableAccNoValues = ref([]);
  const getCurrentlyImportedTableDuplicateEntries = (data) => {
    data.forEach((element) => {
      currentlyImportedTableEmployeeCodeValues.value.push(element["Employee Code"]);
      currentlyImportedTableEmailValues.value.push(element["Email"]);
      currentlyImportedTableMobileNumberValues.value.push(element["Mobile Number"]);
      currentlyImportedTablePanValues.value.push(element["Pan No"]);
      currentlyImportedTableAadharValues.value.push(element["Aadhar"]);
      currentlyImportedTableAccNoValues.value.push(element["Account No"]);
    });
  };
  const findCurrentTableDups = (duplicateArray, e) => {
    if (findDuplicates(duplicateArray).includes(e)) {
      return true;
    } else {
      return false;
    }
  };
  const existingClientCode = ref();
  const existingUserCode = ref();
  const existingEmails = ref();
  const existingMobileNumbers = ref();
  const existingPanCards = ref();
  const existingAadharCards = ref();
  const existingBankAccountNumbers = ref();
  const existingBankNames = ref();
  const existingDepartments = ref();
  const existingOfficialEmails = ref();
  const existingBloodgroups = ref();
  const existingMartialStatus = ref();
  const legalEntityDropdown = ref();
  const existingLegalEntity = ref([]);
  const getExistingOnboardingDocuments = () => {
    axios.get("/onboarding/getEmployeeMandatoryDetails").then((res) => {
      Object.values(res.data).forEach((element) => {
        existingClientCode.value = element.client_code;
        existingUserCode.value = element.user_code;
        existingMobileNumbers.value = element.mobile_number;
        existingEmails.value = element.email;
        existingPanCards.value = element.pan_number;
        existingAadharCards.value = element.aadhar_number;
        existingBankAccountNumbers.value = element.bankaccount_number;
        existingBankNames.value = element.bank_name;
        existingDepartments.value = element.department_name;
        existingOfficialEmails.value = element.official_mail;
        existingBloodgroups.value = element.employees_blood_group;
        existingMartialStatus.value = element.employees_marital_status;
        legalEntityDropdown.value = element.client_details;
        legalEntityDropdown.value ? legalEntityDropdown.value.forEach((ele) => {
          existingLegalEntity.value.push(ele.client_fullname);
        }) : null;
      });
    });
  };
  const isLetter = (e) => {
    if (/^[ A-Za-z_ ]+$/.test(e)) {
      return false;
    } else {
      return true;
    }
  };
  const isSpecialChars = (e) => {
    if (/^[A-Za-z0-9]+$/.test(e) && !existingUserCode.value.includes(e)) {
      return false;
    } else {
      return true;
    }
  };
  function isClientCodeExists(obj, value) {
    const splitedClientCodeParts = value.split(/(?=\d)/);
    return Object.values(obj).includes(splitedClientCodeParts[0]) ? true : false;
  }
  const isUserExists = (e) => {
    if (e) {
      if (existingUserCode.value.includes(e)) {
        return false;
      } else {
        return true;
      }
    } else {
      return true;
    }
  };
  const isNumber = (e) => {
    if (/^[0-9]+$/.test(e)) {
      return false;
    } else {
      return true;
    }
  };
  const isEmail = (e) => {
    if (e) {
      if (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(e.trim()) && !existingEmails.value.includes(e.trim())) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  };
  const isValidAadhar = (e) => {
    const result = splitNumberWithSpaces(e);
    if (e) {
      if (/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(result) && !existingAadharCards.value.includes(result)) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  };
  function splitNumberWithSpaces(number) {
    const numberString = String(number);
    const groups = [];
    for (let i = 0; i < numberString.length; i += 4) {
      groups.push(numberString.substr(i, 4));
    }
    return groups.join(" ");
  }
  const isAadharExists = (e) => {
    if (!existingAadharCards.value.includes(e)) {
      return false;
    } else {
      return true;
    }
  };
  const isValidPancard = (e) => {
    let panFormat = "";
    e ? panFormat = e.toUpperCase() : "";
    if (e) {
      if (/^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/.test(panFormat.trim()) && existingPanCards.value.includes(panFormat.trim())) {
        return false;
      } else {
        return true;
      }
    } else {
      return true;
    }
  };
  const isValidBankAccountNo = (e) => {
    if (e) {
      if (!existingBankAccountNumbers.value.includes(e.trim())) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  };
  const isValidBankIfsc = (e) => {
    let ifscFormat = "";
    e ? ifscFormat = e.toUpperCase() : "";
    if (e) {
      if (/^[A-Za-z]{4}0[A-Za-z0-9]{6}$/.test(ifscFormat.trim())) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  };
  const isValidDate = (e) => {
    if (e) {
      if (/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/.test(e)) {
        return false;
      } else {
        return true;
      }
    } else {
      return true;
    }
  };
  const isValidMobileNumber = (e) => {
    if (e) {
      if (/^[0-9]{10,10}$/.test(e.trim()) && !existingMobileNumbers.value.includes(e.trim())) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  };
  const isExistsOrNot = (array, e) => {
    if (e) {
      if (array.includes(e)) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  };
  const isEnteredNos = (e) => {
    let char = String.fromCharCode(e.keyCode);
    if (/^[0-9]+$/.test(char))
      return true;
    else
      e.preventDefault();
  };
  const isEnterLetter = (e) => {
    let char = String.fromCharCode(e.keyCode);
    if (/^[A-Za-z_ ]+$/.test(char))
      return true;
    else
      e.preventDefault();
  };
  const isEnterSpecialChars = (e) => {
    let char = String.fromCharCode(e.keyCode);
    if (/^[A-Za-z0-9]+$/.test(char))
      return true;
    else
      e.preventDefault();
  };
  const isBankExists = (e) => {
    if (e) {
      let value = "";
      e ? e.toUpperCase() : "";
      let bankName = value.trim();
      return existingBankNames.value.includes(bankName) ? true : false;
    } else {
      return true;
    }
  };
  const isDepartmentExists = (e) => {
    if (e) {
      return existingDepartments.value.includes(e) ? true : false;
    } else {
      return true;
    }
  };
  const isOfficialMailExists = (e) => {
    return existingOfficialEmails.value.includes(e) ? true : false;
  };
  const getValidationMessages = (data) => {
    console.log(onboardedType.value);
    let errorMessages = [];
    if (onboardedType.value == "quick") {
      if (findDuplicates(currentlyImportedTableEmployeeCodeValues.value).includes(data["Employee Code"]) || !isUserExists(data["Employee Code"])) {
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTableEmailValues.value).includes(data["Email"]) || isEmail(data["Email"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isValidDate(data["DOJ"])) {
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTableMobileNumberValues.value).includes(data["Mobile Number"]) || isValidMobileNumber(data["Mobile Number"])) {
        errorRecordsCount.value.push("invalid");
      }
    } else if (onboardedType.value == "bulk") {
      if (findDuplicates(currentlyImportedTableEmployeeCodeValues.value).includes(data["Employee Code"]) || !isUserExists(data["Employee Code"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isExistsOrNot(existingLegalEntity.value, data["Legal Entity"])) {
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTableEmailValues.value).includes(data["Email"]) || isEmail(data["Email"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isValidDate(data["DOJ"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isValidDate(data["DOB"])) {
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTablePanValues.value).includes(data["Pan No"]) || !isValidPancard(data["Pan No"])) {
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTableAadharValues.value).includes(data["Aadhar"]) || isValidAadhar(data["Aadhar"])) {
        console.log(isValidAadhar(data["Aadhar"]));
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTableMobileNumberValues.value).includes(data["Mobile Number"]) || isValidMobileNumber(data["Mobile Number"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isBankExists(data["Bank Name"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isExistsOrNot(existingMartialStatus.value, data["Marital Status"])) {
        errorRecordsCount.value.push("invalid");
      } else if (isValidBankIfsc(data["Bank ifsc"])) {
        errorRecordsCount.value.push("invalid");
      } else if (findDuplicates(currentlyImportedTableAccNoValues.value).includes(data["Account No"]) || isValidBankAccountNo(data["Account No"])) {
        errorRecordsCount.value.push("invalid");
      } else if (!isDepartmentExists(data["Department"])) {
        errorRecordsCount.value.push("invalid");
      }
    } else {
      console.log("No more error record found!");
    }
    return errorMessages;
  };
  return {
    getCurrentlyImportedTableDuplicateEntries,
    currentlyImportedTableEmployeeCodeValues,
    findCurrentTableDups,
    uploadOnboardingFile,
    type,
    currentlyImportedTableAadharValues,
    currentlyImportedTablePanValues,
    currentlyImportedTableAccNoValues,
    currentlyImportedTableEmailValues,
    currentlyImportedTableMobileNumberValues,
    getExistingOnboardingDocuments,
    existingUserCode,
    existingEmails,
    existingMobileNumbers,
    existingAadharCards,
    existingPanCards,
    existingBankAccountNumbers,
    initialUpdate,
    isValueUpdated: isValueUpdated2,
    existingMartialStatus,
    existingBloodgroups,
    existingClientCode,
    existingLegalEntity,
    legalEntityDropdown,
    isLetter,
    isEmail,
    isNumber,
    isEnterLetter,
    isEnterSpecialChars,
    isEnterSpecialChars,
    isValidAadhar,
    isValidBankAccountNo,
    isValidBankIfsc,
    isSpecialChars,
    isValidDate,
    isValidMobileNumber,
    isValidPancard,
    isEnteredNos,
    totalRecordsCount,
    errorRecordsCount,
    selectedFile,
    isUserExists,
    isBankExists,
    isDepartmentExists,
    isOfficialMailExists,
    isAadharExists,
    isExistsOrNot,
    isClientCodeExists,
    splitNumberWithSpaces,
    convertExcelIntoArray,
    EmployeeQuickOnboardingDynamicHeader,
    EmployeeQuickOnboardingSource,
    getValidationMessages,
    getExcelForUpload,
    canShowloading
  };
});
const _sfc_main$2 = {
  __name: "ImportQuickOnboarding",
  __ssrInlineRender: true,
  setup(__props) {
    useRouter();
    useRoute();
    const useStore = useOnboardingMainStore();
    const useNormalOnboardingStore = useNormalOnboardingMainStore();
    const checkingNonEditableFields = (e) => {
      let nonEditableField = ["Basic", "HRA", "Statutory Bonus", "Child Education Allowance", "Food Coupon", "LTA"];
      return nonEditableField.includes(e) ? true : false;
    };
    onUpdated(() => {
      if (useStore.isValueUpdated) {
        useStore.currentlyImportedTableEmployeeCodeValues.splice(0, useStore.currentlyImportedTableEmployeeCodeValues.length);
        useStore.currentlyImportedTableAadharValues.splice(0, useStore.currentlyImportedTableAadharValues.length);
        useStore.currentlyImportedTableAccNoValues.splice(0, useStore.currentlyImportedTableAccNoValues.length);
        useStore.currentlyImportedTablePanValues.splice(0, useStore.currentlyImportedTablePanValues.length);
        useStore.currentlyImportedTableEmailValues.splice(0, useStore.currentlyImportedTableEmailValues.length);
        useStore.currentlyImportedTableMobileNumberValues.splice(0, useStore.currentlyImportedTableMobileNumberValues.length);
        setTimeout(() => {
          useStore.getCurrentlyImportedTableDuplicateEntries(useStore.EmployeeQuickOnboardingSource);
        }, 100);
      }
    });
    const vaueSetting = ref(true);
    const onCellEditComplete = (event) => {
      useStore.initialUpdate = true;
      setTimeout(() => {
        vaueSetting.value = false;
        console.log("functionkilled");
      }, 30);
      useStore.errorRecordsCount.splice(0, useStore.errorRecordsCount.length);
      let { data, newValue, field } = event;
      newValue ? useStore.isValueUpdated = true : isValueUpdated = false;
      if (newValue.trim().length > 0)
        data[field] = newValue;
      else
        event.preventDefault();
      for (let index = 0; index < useStore.EmployeeQuickOnboardingSource.length; index++) {
        useStore.getValidationMessages(useStore.EmployeeQuickOnboardingSource[index]);
      }
    };
    const sampleTemplate = ref([
      {
        "Employee Code": "ABS01",
        "Employee Name": "Vishu",
        "Date Of Birth (dd-mm-yyyy)": "23-09-2001",
        "Date of Joined (dd-mm-yyyy)": "23-09-2023",
        "Mobile Number": "9898989898",
        "Aadhaar Number": "2222 3333 4444",
        "Personal Email": "abs@gmail.com",
        "Pan Number": "AJUPA0900H",
        "Gender": "Male",
        "Marital Status": "Married",
        "Reporting Manager": "Pradessh",
        "Designation": "Developer",
        "Department": "IT",
        "Location": "Chennai",
        "Father Name": "Simma",
        "Physically Handicapped": "No"
      }
    ]);
    const sampleTemplateHeaders = [
      { title: "Employee Code" },
      { title: "Employee Name" },
      { title: "Date Of Birth (dd-mm-yyyy)" },
      { title: "Date of Joined (dd-mm-yyyy)" },
      { title: "Mobile Number" },
      { title: "Aadhaar Number" },
      { title: "Personal Email" },
      { title: "Pan Number" },
      { title: "Gender" },
      { title: "Marital Status" },
      { title: "Reporting Manager" },
      { title: "Designation" },
      { title: "Department" },
      { title: "Location" },
      { title: "Father Name" },
      { title: "Physically Handicapped" }
    ];
    const Gender = ref([
      { name: "Male", value: "Male" },
      { name: "Female", value: "Female" },
      { name: "Others", value: "Others" }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputMask = resolveComponent("InputMask");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div class="grid w-10/12 grid-cols-3 mx-auto my-2 place-content-center"><div class="p-2 mx-6 font-semibold text-black bg-white rounded-lg fs-6">Total Records : <span class="font-bold">${ssrInterpolate(unref(useStore).totalRecordsCount.length ? unref(useStore).totalRecordsCount[0].length : 0)}</span></div><div class="p-2 mx-6 font-semibold text-black bg-green-100 rounded-lg fs-6">Processed Records : <span class="font-bold">${ssrInterpolate(unref(useStore).totalRecordsCount.length ? unref(useStore).totalRecordsCount[0].length - unref(useStore).errorRecordsCount.length : 0)}</span></div><div class="p-2 mx-6 font-semibold text-black bg-red-100 rounded-lg fs-6">Error Records : <span class="font-bold">${ssrInterpolate(unref(useStore).errorRecordsCount.length)}</span></div></div><div class="py-5"><p class="font-semibold fs-6">Sample format:</p><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        class: "my-4",
        value: sampleTemplate.value,
        tableStyle: "min-width: 50rem",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<!--[-->`);
            ssrRenderList(sampleTemplateHeaders, (col) => {
              _push2(ssrRenderComponent(_component_Column, {
                key: col.title,
                field: col.title,
                style: { "min-width": "12rem" },
                header: col.title
              }, null, _parent2, _scopeId));
            });
            _push2(`<!--]-->`);
          } else {
            return [
              (openBlock(), createBlock(Fragment, null, renderList(sampleTemplateHeaders, (col) => {
                return createVNode(_component_Column, {
                  key: col.title,
                  field: col.title,
                  style: { "min-width": "12rem" },
                  header: col.title
                }, null, 8, ["field", "header"]);
              }), 64))
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><div class="table-responsive"><p class="font-semibold fs-6">Original data:</p>`);
      if (unref(useStore).EmployeeQuickOnboardingSource) {
        _push(ssrRenderComponent(_component_DataTable, {
          class: "py-4",
          value: unref(useStore).EmployeeQuickOnboardingSource,
          tableStyle: "min-width: 50rem",
          responsiveLayout: "scroll",
          editMode: "cell",
          onCellEditComplete,
          stateStorage: "session",
          stateKey: "dt-state-demo-session",
          rows: unref(useStore).EmployeeQuickOnboardingSource.length
        }, {
          footer: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<button class="flex justify-center mx-auto btn btn-orange"${_scopeId}>Upload</button>`);
            } else {
              return [
                createVNode("button", {
                  class: "flex justify-center mx-auto btn btn-orange",
                  onClick: ($event) => unref(useStore).uploadOnboardingFile(unref(useStore).EmployeeQuickOnboardingSource)
                }, "Upload", 8, ["onClick"])
              ];
            }
          }),
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<!--[-->`);
              ssrRenderList(unref(useStore).EmployeeQuickOnboardingDynamicHeader, (col) => {
                _push2(ssrRenderComponent(_component_Column, {
                  key: col.title,
                  field: col.title,
                  style: { "min-width": "12rem" },
                  header: col.title
                }, {
                  body: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (field.includes("Employee Code")) {
                        _push3(`<div class="${ssrRenderClass([unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableEmployeeCodeValues, data["Employee Code"]) || !unref(useStore).isUserExists(data["Employee Code"]) ? "bg-red-100 p-2 rounded-lg" : ""])}"${_scopeId2}><p class="font-semibold fs-6"${_scopeId2}>`);
                        if (!unref(useStore).isUserExists(data["Employee Code"])) {
                          _push3(`<i${ssrRenderAttrs(mergeProps({
                            class: "mx-2 cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "User code is already exists", void 0, { right: true })))}${_scopeId2}></i>`);
                        } else {
                          _push3(`<!---->`);
                        }
                        _push3(` ${ssrInterpolate(data["Employee Code"] ? data["Employee Code"] : "-")}</p></div>`);
                      } else if (field.includes("Legal Entity")) {
                        _push3(`<div class="${ssrRenderClass([unref(useStore).isExistsOrNot(unref(useStore).existingLegalEntity, data["Legal Entity"]) ? "bg-red-100 p-2 rounded-lg" : ""])}"${_scopeId2}><p class="font-semibold fs-6"${_scopeId2}>${ssrInterpolate(data["Legal Entity"] ? data["Legal Entity"] : "-")}</p></div>`);
                      } else if (field.includes("Aadhar")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableAadharValues, data["Aadhar"]) || unref(useStore).isValidAadhar(data["Aadhar"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>`);
                        if (unref(useStore).isAadharExists(data["Aadhar"])) {
                          _push3(`<i${ssrRenderAttrs(mergeProps({
                            class: "mx-2 cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Aadhar number is already exists", void 0, { right: true })))}${_scopeId2}></i>`);
                        } else {
                          _push3(`<!---->`);
                        }
                        _push3(` ${ssrInterpolate(unref(useStore).splitNumberWithSpaces(data["Aadhar"]))}</p>`);
                      } else if (field.includes("Employee Name")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isLetter(data["Employee Name"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Employee Name"] ? data["Employee Name"] : "-")}</p>`);
                      } else if (field.includes("Email")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableEmailValues, data["Email"]) || unref(useStore).isEmail(data["Email"]) ? "bg-red-100 p-2 rounded-lg" : ""], "flex items-center font-semibold fs-6"])}"${_scopeId2}>`);
                        if (unref(useStore).existingEmails.includes(data["Email"])) {
                          _push3(`<i${ssrRenderAttrs(mergeProps({
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Email is already exists", void 0, { right: true })))}${_scopeId2}></i>`);
                        } else {
                          _push3(`<!---->`);
                        }
                        _push3(`<span class="px-2 font-semibold fs-6 py-auto"${_scopeId2}>${ssrInterpolate(data["Email"] ? data["Email"] : "-")}</span></p>`);
                      } else if (field.includes("Mobile Number")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableMobileNumberValues, data[field]) || unref(useStore).existingMobileNumbers.includes(data[field]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>`);
                        if (unref(useStore).existingMobileNumbers.includes(data[field])) {
                          _push3(`<i${ssrRenderAttrs(mergeProps({
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Mobile number is already exists", void 0, { right: true })))}${_scopeId2}></i>`);
                        } else {
                          _push3(`<!---->`);
                        }
                        _push3(` ${ssrInterpolate(data["Mobile Number"] ? data["Mobile Number"] : "-")}</p>`);
                      } else if (field.includes("Account No")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableAccNoValues, data["Account No"]) || unref(useStore).isValidBankAccountNo(data["Account No"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>`);
                        if (unref(useStore).existingMobileNumbers.includes(data[field])) {
                          _push3(`<i${ssrRenderAttrs(mergeProps({
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Account number is already exists", void 0, { right: true })))}${_scopeId2}></i>`);
                        } else {
                          _push3(`<!---->`);
                        }
                        _push3(` ${ssrInterpolate(data["Account No"] ? data["Account No"] : "-")}</p>`);
                      } else if (field.includes("Bank Name")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isBankExists(data["Bank Name"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Bank Name"] ? data["Bank Name"] : "-")}</p>`);
                      } else if (field.includes("Pan No")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTablePanValues, data["Pan No"]) || !unref(useStore).isValidPancard(data["Pan No"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>`);
                        if (!unref(useStore).isValidPancard(data["Pan No"])) {
                          _push3(`<i${ssrRenderAttrs(mergeProps({
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Pan number is already exists", void 0, { right: true })))}${_scopeId2}></i>`);
                        } else {
                          _push3(`<!---->`);
                        }
                        _push3(` ${ssrInterpolate(data["Pan No"] ? data["Pan No"].toUpperCase() : "-")}</p>`);
                      } else if (field.includes("Father DOB")) {
                        _push3(`<p class="font-semibold fs-6"${_scopeId2}>${ssrInterpolate(data[field] ? data[field] : "-")}</p>`);
                      } else if (field.includes("Mother DOB")) {
                        _push3(`<p class="font-semibold fs-6"${_scopeId2}>${ssrInterpolate(data[field] ? data[field] : "-")}</p>`);
                      } else if (field.includes("Spouse DOB")) {
                        _push3(`<p class="font-semibold fs-6"${_scopeId2}>${ssrInterpolate(data[field] ? data[field] : "-")}</p>`);
                      } else if (field.includes("DOB")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isValidDate(data["DOB"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["DOB"] ? data[field] : "-")}</p>`);
                      } else if (field.includes("DOJ")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isValidDate(data["DOJ"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["DOJ"] ? data[field] : "-")}</p>`);
                      } else if (field.includes("Bank ifsc")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isValidBankIfsc(data["Bank ifsc"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Bank ifsc"] ? data["Bank ifsc"].toUpperCase() : "-")}</p>`);
                      } else if (field.includes("Official Mail")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isOfficialMailExists(data["Official Mail"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Official Mail"] ? data["Official Mail"] : "-")}</p>`);
                      } else if (field.includes("Marital Status")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isExistsOrNot(unref(useStore).existingMartialStatus, data["Marital Status"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Marital Status"] ? data["Marital Status"] : "-")}</p>`);
                      } else if (field.includes("Blood Group")) {
                        _push3(`<p class="${ssrRenderClass([[unref(useStore).isExistsOrNot(unref(useStore).existingBloodgroups, data["Blood Group"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Blood Group"] ? data["Blood Group"] : "-")}</p>`);
                      } else if (field.includes("Department")) {
                        _push3(`<p class="${ssrRenderClass([[!unref(useStore).isDepartmentExists(data["Department"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"])}"${_scopeId2}>${ssrInterpolate(data["Department"] ? data["Department"] : "-")}</p>`);
                      } else {
                        _push3(`<p class="font-semibold fs-6"${_scopeId2}>${ssrInterpolate(data[field] ? data[field] : "-")}</p>`);
                      }
                    } else {
                      return [
                        field.includes("Employee Code") ? (openBlock(), createBlock("div", {
                          key: 0,
                          class: [unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableEmployeeCodeValues, data["Employee Code"]) || !unref(useStore).isUserExists(data["Employee Code"]) ? "bg-red-100 p-2 rounded-lg" : ""]
                        }, [
                          createVNode("p", { class: "font-semibold fs-6" }, [
                            !unref(useStore).isUserExists(data["Employee Code"]) ? withDirectives((openBlock(), createBlock("i", {
                              key: 0,
                              class: "mx-2 cursor-pointer fa fa-exclamation-circle text-warning",
                              "aria-hidden": "true"
                            }, null, 512)), [
                              [
                                _directive_tooltip,
                                "User code is already exists",
                                void 0,
                                { right: true }
                              ]
                            ]) : createCommentVNode("", true),
                            createTextVNode(" " + toDisplayString(data["Employee Code"] ? data["Employee Code"] : "-"), 1)
                          ])
                        ], 2)) : field.includes("Legal Entity") ? (openBlock(), createBlock("div", {
                          key: 1,
                          class: [unref(useStore).isExistsOrNot(unref(useStore).existingLegalEntity, data["Legal Entity"]) ? "bg-red-100 p-2 rounded-lg" : ""]
                        }, [
                          createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(data["Legal Entity"] ? data["Legal Entity"] : "-"), 1)
                        ], 2)) : field.includes("Aadhar") ? (openBlock(), createBlock("p", {
                          key: 2,
                          class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableAadharValues, data["Aadhar"]) || unref(useStore).isValidAadhar(data["Aadhar"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, [
                          unref(useStore).isAadharExists(data["Aadhar"]) ? withDirectives((openBlock(), createBlock("i", {
                            key: 0,
                            class: "mx-2 cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, null, 512)), [
                            [
                              _directive_tooltip,
                              "Aadhar number is already exists",
                              void 0,
                              { right: true }
                            ]
                          ]) : createCommentVNode("", true),
                          createTextVNode(" " + toDisplayString(unref(useStore).splitNumberWithSpaces(data["Aadhar"])), 1)
                        ], 2)) : field.includes("Employee Name") ? (openBlock(), createBlock("p", {
                          key: 3,
                          class: [[unref(useStore).isLetter(data["Employee Name"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Employee Name"] ? data["Employee Name"] : "-"), 3)) : field.includes("Email") ? (openBlock(), createBlock("p", {
                          key: 4,
                          class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableEmailValues, data["Email"]) || unref(useStore).isEmail(data["Email"]) ? "bg-red-100 p-2 rounded-lg" : ""], "flex items-center font-semibold fs-6"]
                        }, [
                          unref(useStore).existingEmails.includes(data["Email"]) ? withDirectives((openBlock(), createBlock("i", {
                            key: 0,
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, null, 512)), [
                            [
                              _directive_tooltip,
                              "Email is already exists",
                              void 0,
                              { right: true }
                            ]
                          ]) : createCommentVNode("", true),
                          createVNode("span", { class: "px-2 font-semibold fs-6 py-auto" }, toDisplayString(data["Email"] ? data["Email"] : "-"), 1)
                        ], 2)) : field.includes("Mobile Number") ? (openBlock(), createBlock("p", {
                          key: 5,
                          class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableMobileNumberValues, data[field]) || unref(useStore).existingMobileNumbers.includes(data[field]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, [
                          unref(useStore).existingMobileNumbers.includes(data[field]) ? withDirectives((openBlock(), createBlock("i", {
                            key: 0,
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, null, 512)), [
                            [
                              _directive_tooltip,
                              "Mobile number is already exists",
                              void 0,
                              { right: true }
                            ]
                          ]) : createCommentVNode("", true),
                          createTextVNode(" " + toDisplayString(data["Mobile Number"] ? data["Mobile Number"] : "-"), 1)
                        ], 2)) : field.includes("Account No") ? (openBlock(), createBlock("p", {
                          key: 6,
                          class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableAccNoValues, data["Account No"]) || unref(useStore).isValidBankAccountNo(data["Account No"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, [
                          unref(useStore).existingMobileNumbers.includes(data[field]) ? withDirectives((openBlock(), createBlock("i", {
                            key: 0,
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, null, 512)), [
                            [
                              _directive_tooltip,
                              "Account number is already exists",
                              void 0,
                              { right: true }
                            ]
                          ]) : createCommentVNode("", true),
                          createTextVNode(" " + toDisplayString(data["Account No"] ? data["Account No"] : "-"), 1)
                        ], 2)) : field.includes("Bank Name") ? (openBlock(), createBlock("p", {
                          key: 7,
                          class: [[unref(useStore).isBankExists(data["Bank Name"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Bank Name"] ? data["Bank Name"] : "-"), 3)) : field.includes("Pan No") ? (openBlock(), createBlock("p", {
                          key: 8,
                          class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTablePanValues, data["Pan No"]) || !unref(useStore).isValidPancard(data["Pan No"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, [
                          !unref(useStore).isValidPancard(data["Pan No"]) ? withDirectives((openBlock(), createBlock("i", {
                            key: 0,
                            class: "cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, null, 512)), [
                            [
                              _directive_tooltip,
                              "Pan number is already exists",
                              void 0,
                              { right: true }
                            ]
                          ]) : createCommentVNode("", true),
                          createTextVNode(" " + toDisplayString(data["Pan No"] ? data["Pan No"].toUpperCase() : "-"), 1)
                        ], 2)) : field.includes("Father DOB") ? (openBlock(), createBlock("p", {
                          key: 9,
                          class: "font-semibold fs-6"
                        }, toDisplayString(data[field] ? data[field] : "-"), 1)) : field.includes("Mother DOB") ? (openBlock(), createBlock("p", {
                          key: 10,
                          class: "font-semibold fs-6"
                        }, toDisplayString(data[field] ? data[field] : "-"), 1)) : field.includes("Spouse DOB") ? (openBlock(), createBlock("p", {
                          key: 11,
                          class: "font-semibold fs-6"
                        }, toDisplayString(data[field] ? data[field] : "-"), 1)) : field.includes("DOB") ? (openBlock(), createBlock("p", {
                          key: 12,
                          class: [[unref(useStore).isValidDate(data["DOB"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["DOB"] ? data[field] : "-"), 3)) : field.includes("DOJ") ? (openBlock(), createBlock("p", {
                          key: 13,
                          class: [[unref(useStore).isValidDate(data["DOJ"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["DOJ"] ? data[field] : "-"), 3)) : field.includes("Bank ifsc") ? (openBlock(), createBlock("p", {
                          key: 14,
                          class: [[unref(useStore).isValidBankIfsc(data["Bank ifsc"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Bank ifsc"] ? data["Bank ifsc"].toUpperCase() : "-"), 3)) : field.includes("Official Mail") ? (openBlock(), createBlock("p", {
                          key: 15,
                          class: [[unref(useStore).isOfficialMailExists(data["Official Mail"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Official Mail"] ? data["Official Mail"] : "-"), 3)) : field.includes("Marital Status") ? (openBlock(), createBlock("p", {
                          key: 16,
                          class: [[unref(useStore).isExistsOrNot(unref(useStore).existingMartialStatus, data["Marital Status"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Marital Status"] ? data["Marital Status"] : "-"), 3)) : field.includes("Blood Group") ? (openBlock(), createBlock("p", {
                          key: 17,
                          class: [[unref(useStore).isExistsOrNot(unref(useStore).existingBloodgroups, data["Blood Group"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Blood Group"] ? data["Blood Group"] : "-"), 3)) : field.includes("Department") ? (openBlock(), createBlock("p", {
                          key: 18,
                          class: [[!unref(useStore).isDepartmentExists(data["Department"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                        }, toDisplayString(data["Department"] ? data["Department"] : "-"), 3)) : (openBlock(), createBlock("p", {
                          key: 19,
                          class: "font-semibold fs-6"
                        }, toDisplayString(data[field] ? data[field] : "-"), 1))
                      ];
                    }
                  }),
                  editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (field == "Aadhar") {
                        _push3(ssrRenderComponent(_component_InputText, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          minLength: "12",
                          maxLength: "12",
                          onKeypress: ($event) => unref(useStore).isEnteredNos($event)
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Gender") {
                        _push3(ssrRenderComponent(_component_Dropdown, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: Gender.value,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Gender",
                          class: "w-full"
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Pan No") {
                        _push3(ssrRenderComponent(_component_InputMask, {
                          id: "serial",
                          mask: "aaaPa9999a",
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          class: "uppercase"
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Email") {
                        _push3(ssrRenderComponent(_component_InputText, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Mobile Number") {
                        _push3(ssrRenderComponent(_component_InputText, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          minLength: "10",
                          maxLength: "10",
                          onKeypress: ($event) => unref(useStore).isEnteredNos($event)
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Legal Entity") {
                        _push3(ssrRenderComponent(_component_Dropdown, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useStore).legalEntityDropdown,
                          optionLabel: "client_fullname",
                          optionValue: "client_fullname",
                          placeholder: "Select Legal Entity"
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Bank Name") {
                        _push3(ssrRenderComponent(_component_Dropdown, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).bankList,
                          optionLabel: "bank_name",
                          optionValue: "bank_name",
                          placeholder: "Select Bank Name"
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Marital Status") {
                        _push3(ssrRenderComponent(_component_Dropdown, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).maritalDetails,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Martial Status"
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Blood Group") {
                        _push3(ssrRenderComponent(_component_Dropdown, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).bloodGroups,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Bloodgroup",
                          class: "p-error"
                        }, null, _parent3, _scopeId2));
                      } else if (field == "Department") {
                        _push3(ssrRenderComponent(_component_Dropdown, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).departmentDetails,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Department",
                          class: "p-error"
                        }, null, _parent3, _scopeId2));
                      } else {
                        _push3(ssrRenderComponent(_component_InputText, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          readonly: checkingNonEditableFields(field)
                        }, null, _parent3, _scopeId2));
                      }
                    } else {
                      return [
                        field == "Aadhar" ? (openBlock(), createBlock(_component_InputText, {
                          key: 0,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          minLength: "12",
                          maxLength: "12",
                          onKeypress: ($event) => unref(useStore).isEnteredNos($event)
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])) : field == "Gender" ? (openBlock(), createBlock(_component_Dropdown, {
                          key: 1,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: Gender.value,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Gender",
                          class: "w-full"
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Pan No" ? (openBlock(), createBlock(_component_InputMask, {
                          key: 2,
                          id: "serial",
                          mask: "aaaPa9999a",
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          class: "uppercase"
                        }, null, 8, ["modelValue", "onUpdate:modelValue"])) : field == "Email" ? (openBlock(), createBlock(_component_InputText, {
                          key: 3,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event
                        }, null, 8, ["modelValue", "onUpdate:modelValue"])) : field == "Mobile Number" ? (openBlock(), createBlock(_component_InputText, {
                          key: 4,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          minLength: "10",
                          maxLength: "10",
                          onKeypress: ($event) => unref(useStore).isEnteredNos($event)
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])) : field == "Legal Entity" ? (openBlock(), createBlock(_component_Dropdown, {
                          key: 5,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useStore).legalEntityDropdown,
                          optionLabel: "client_fullname",
                          optionValue: "client_fullname",
                          placeholder: "Select Legal Entity"
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Bank Name" ? (openBlock(), createBlock(_component_Dropdown, {
                          key: 6,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).bankList,
                          optionLabel: "bank_name",
                          optionValue: "bank_name",
                          placeholder: "Select Bank Name"
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Marital Status" ? (openBlock(), createBlock(_component_Dropdown, {
                          key: 7,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).maritalDetails,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Martial Status"
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Blood Group" ? (openBlock(), createBlock(_component_Dropdown, {
                          key: 8,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).bloodGroups,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Bloodgroup",
                          class: "p-error"
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Department" ? (openBlock(), createBlock(_component_Dropdown, {
                          key: 9,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          options: unref(useNormalOnboardingStore).departmentDetails,
                          optionLabel: "name",
                          optionValue: "name",
                          placeholder: "Select Department",
                          class: "p-error"
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : (openBlock(), createBlock(_component_InputText, {
                          key: 10,
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          readonly: checkingNonEditableFields(field)
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"]))
                      ];
                    }
                  }),
                  _: 2
                }, _parent2, _scopeId));
              });
              _push2(`<!--]-->`);
            } else {
              return [
                (openBlock(true), createBlock(Fragment, null, renderList(unref(useStore).EmployeeQuickOnboardingDynamicHeader, (col) => {
                  return openBlock(), createBlock(_component_Column, {
                    key: col.title,
                    field: col.title,
                    style: { "min-width": "12rem" },
                    header: col.title
                  }, {
                    body: withCtx(({ data, field }) => [
                      field.includes("Employee Code") ? (openBlock(), createBlock("div", {
                        key: 0,
                        class: [unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableEmployeeCodeValues, data["Employee Code"]) || !unref(useStore).isUserExists(data["Employee Code"]) ? "bg-red-100 p-2 rounded-lg" : ""]
                      }, [
                        createVNode("p", { class: "font-semibold fs-6" }, [
                          !unref(useStore).isUserExists(data["Employee Code"]) ? withDirectives((openBlock(), createBlock("i", {
                            key: 0,
                            class: "mx-2 cursor-pointer fa fa-exclamation-circle text-warning",
                            "aria-hidden": "true"
                          }, null, 512)), [
                            [
                              _directive_tooltip,
                              "User code is already exists",
                              void 0,
                              { right: true }
                            ]
                          ]) : createCommentVNode("", true),
                          createTextVNode(" " + toDisplayString(data["Employee Code"] ? data["Employee Code"] : "-"), 1)
                        ])
                      ], 2)) : field.includes("Legal Entity") ? (openBlock(), createBlock("div", {
                        key: 1,
                        class: [unref(useStore).isExistsOrNot(unref(useStore).existingLegalEntity, data["Legal Entity"]) ? "bg-red-100 p-2 rounded-lg" : ""]
                      }, [
                        createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(data["Legal Entity"] ? data["Legal Entity"] : "-"), 1)
                      ], 2)) : field.includes("Aadhar") ? (openBlock(), createBlock("p", {
                        key: 2,
                        class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableAadharValues, data["Aadhar"]) || unref(useStore).isValidAadhar(data["Aadhar"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, [
                        unref(useStore).isAadharExists(data["Aadhar"]) ? withDirectives((openBlock(), createBlock("i", {
                          key: 0,
                          class: "mx-2 cursor-pointer fa fa-exclamation-circle text-warning",
                          "aria-hidden": "true"
                        }, null, 512)), [
                          [
                            _directive_tooltip,
                            "Aadhar number is already exists",
                            void 0,
                            { right: true }
                          ]
                        ]) : createCommentVNode("", true),
                        createTextVNode(" " + toDisplayString(unref(useStore).splitNumberWithSpaces(data["Aadhar"])), 1)
                      ], 2)) : field.includes("Employee Name") ? (openBlock(), createBlock("p", {
                        key: 3,
                        class: [[unref(useStore).isLetter(data["Employee Name"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Employee Name"] ? data["Employee Name"] : "-"), 3)) : field.includes("Email") ? (openBlock(), createBlock("p", {
                        key: 4,
                        class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableEmailValues, data["Email"]) || unref(useStore).isEmail(data["Email"]) ? "bg-red-100 p-2 rounded-lg" : ""], "flex items-center font-semibold fs-6"]
                      }, [
                        unref(useStore).existingEmails.includes(data["Email"]) ? withDirectives((openBlock(), createBlock("i", {
                          key: 0,
                          class: "cursor-pointer fa fa-exclamation-circle text-warning",
                          "aria-hidden": "true"
                        }, null, 512)), [
                          [
                            _directive_tooltip,
                            "Email is already exists",
                            void 0,
                            { right: true }
                          ]
                        ]) : createCommentVNode("", true),
                        createVNode("span", { class: "px-2 font-semibold fs-6 py-auto" }, toDisplayString(data["Email"] ? data["Email"] : "-"), 1)
                      ], 2)) : field.includes("Mobile Number") ? (openBlock(), createBlock("p", {
                        key: 5,
                        class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableMobileNumberValues, data[field]) || unref(useStore).existingMobileNumbers.includes(data[field]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, [
                        unref(useStore).existingMobileNumbers.includes(data[field]) ? withDirectives((openBlock(), createBlock("i", {
                          key: 0,
                          class: "cursor-pointer fa fa-exclamation-circle text-warning",
                          "aria-hidden": "true"
                        }, null, 512)), [
                          [
                            _directive_tooltip,
                            "Mobile number is already exists",
                            void 0,
                            { right: true }
                          ]
                        ]) : createCommentVNode("", true),
                        createTextVNode(" " + toDisplayString(data["Mobile Number"] ? data["Mobile Number"] : "-"), 1)
                      ], 2)) : field.includes("Account No") ? (openBlock(), createBlock("p", {
                        key: 6,
                        class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTableAccNoValues, data["Account No"]) || unref(useStore).isValidBankAccountNo(data["Account No"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, [
                        unref(useStore).existingMobileNumbers.includes(data[field]) ? withDirectives((openBlock(), createBlock("i", {
                          key: 0,
                          class: "cursor-pointer fa fa-exclamation-circle text-warning",
                          "aria-hidden": "true"
                        }, null, 512)), [
                          [
                            _directive_tooltip,
                            "Account number is already exists",
                            void 0,
                            { right: true }
                          ]
                        ]) : createCommentVNode("", true),
                        createTextVNode(" " + toDisplayString(data["Account No"] ? data["Account No"] : "-"), 1)
                      ], 2)) : field.includes("Bank Name") ? (openBlock(), createBlock("p", {
                        key: 7,
                        class: [[unref(useStore).isBankExists(data["Bank Name"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Bank Name"] ? data["Bank Name"] : "-"), 3)) : field.includes("Pan No") ? (openBlock(), createBlock("p", {
                        key: 8,
                        class: [[unref(useStore).findCurrentTableDups(unref(useStore).currentlyImportedTablePanValues, data["Pan No"]) || !unref(useStore).isValidPancard(data["Pan No"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, [
                        !unref(useStore).isValidPancard(data["Pan No"]) ? withDirectives((openBlock(), createBlock("i", {
                          key: 0,
                          class: "cursor-pointer fa fa-exclamation-circle text-warning",
                          "aria-hidden": "true"
                        }, null, 512)), [
                          [
                            _directive_tooltip,
                            "Pan number is already exists",
                            void 0,
                            { right: true }
                          ]
                        ]) : createCommentVNode("", true),
                        createTextVNode(" " + toDisplayString(data["Pan No"] ? data["Pan No"].toUpperCase() : "-"), 1)
                      ], 2)) : field.includes("Father DOB") ? (openBlock(), createBlock("p", {
                        key: 9,
                        class: "font-semibold fs-6"
                      }, toDisplayString(data[field] ? data[field] : "-"), 1)) : field.includes("Mother DOB") ? (openBlock(), createBlock("p", {
                        key: 10,
                        class: "font-semibold fs-6"
                      }, toDisplayString(data[field] ? data[field] : "-"), 1)) : field.includes("Spouse DOB") ? (openBlock(), createBlock("p", {
                        key: 11,
                        class: "font-semibold fs-6"
                      }, toDisplayString(data[field] ? data[field] : "-"), 1)) : field.includes("DOB") ? (openBlock(), createBlock("p", {
                        key: 12,
                        class: [[unref(useStore).isValidDate(data["DOB"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["DOB"] ? data[field] : "-"), 3)) : field.includes("DOJ") ? (openBlock(), createBlock("p", {
                        key: 13,
                        class: [[unref(useStore).isValidDate(data["DOJ"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["DOJ"] ? data[field] : "-"), 3)) : field.includes("Bank ifsc") ? (openBlock(), createBlock("p", {
                        key: 14,
                        class: [[unref(useStore).isValidBankIfsc(data["Bank ifsc"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Bank ifsc"] ? data["Bank ifsc"].toUpperCase() : "-"), 3)) : field.includes("Official Mail") ? (openBlock(), createBlock("p", {
                        key: 15,
                        class: [[unref(useStore).isOfficialMailExists(data["Official Mail"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Official Mail"] ? data["Official Mail"] : "-"), 3)) : field.includes("Marital Status") ? (openBlock(), createBlock("p", {
                        key: 16,
                        class: [[unref(useStore).isExistsOrNot(unref(useStore).existingMartialStatus, data["Marital Status"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Marital Status"] ? data["Marital Status"] : "-"), 3)) : field.includes("Blood Group") ? (openBlock(), createBlock("p", {
                        key: 17,
                        class: [[unref(useStore).isExistsOrNot(unref(useStore).existingBloodgroups, data["Blood Group"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Blood Group"] ? data["Blood Group"] : "-"), 3)) : field.includes("Department") ? (openBlock(), createBlock("p", {
                        key: 18,
                        class: [[!unref(useStore).isDepartmentExists(data["Department"]) ? "bg-red-100 p-2 rounded-lg" : ""], "font-semibold fs-6"]
                      }, toDisplayString(data["Department"] ? data["Department"] : "-"), 3)) : (openBlock(), createBlock("p", {
                        key: 19,
                        class: "font-semibold fs-6"
                      }, toDisplayString(data[field] ? data[field] : "-"), 1))
                    ]),
                    editor: withCtx(({ data, field }) => [
                      field == "Aadhar" ? (openBlock(), createBlock(_component_InputText, {
                        key: 0,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        minLength: "12",
                        maxLength: "12",
                        onKeypress: ($event) => unref(useStore).isEnteredNos($event)
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])) : field == "Gender" ? (openBlock(), createBlock(_component_Dropdown, {
                        key: 1,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        options: Gender.value,
                        optionLabel: "name",
                        optionValue: "name",
                        placeholder: "Select Gender",
                        class: "w-full"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Pan No" ? (openBlock(), createBlock(_component_InputMask, {
                        key: 2,
                        id: "serial",
                        mask: "aaaPa9999a",
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        class: "uppercase"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])) : field == "Email" ? (openBlock(), createBlock(_component_InputText, {
                        key: 3,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])) : field == "Mobile Number" ? (openBlock(), createBlock(_component_InputText, {
                        key: 4,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        minLength: "10",
                        maxLength: "10",
                        onKeypress: ($event) => unref(useStore).isEnteredNos($event)
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])) : field == "Legal Entity" ? (openBlock(), createBlock(_component_Dropdown, {
                        key: 5,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        options: unref(useStore).legalEntityDropdown,
                        optionLabel: "client_fullname",
                        optionValue: "client_fullname",
                        placeholder: "Select Legal Entity"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Bank Name" ? (openBlock(), createBlock(_component_Dropdown, {
                        key: 6,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        options: unref(useNormalOnboardingStore).bankList,
                        optionLabel: "bank_name",
                        optionValue: "bank_name",
                        placeholder: "Select Bank Name"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Marital Status" ? (openBlock(), createBlock(_component_Dropdown, {
                        key: 7,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        options: unref(useNormalOnboardingStore).maritalDetails,
                        optionLabel: "name",
                        optionValue: "name",
                        placeholder: "Select Martial Status"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Blood Group" ? (openBlock(), createBlock(_component_Dropdown, {
                        key: 8,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        options: unref(useNormalOnboardingStore).bloodGroups,
                        optionLabel: "name",
                        optionValue: "name",
                        placeholder: "Select Bloodgroup",
                        class: "p-error"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : field == "Department" ? (openBlock(), createBlock(_component_Dropdown, {
                        key: 9,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        options: unref(useNormalOnboardingStore).departmentDetails,
                        optionLabel: "name",
                        optionValue: "name",
                        placeholder: "Select Department",
                        class: "p-error"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])) : (openBlock(), createBlock(_component_InputText, {
                        key: 10,
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        readonly: checkingNonEditableFields(field)
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"]))
                    ]),
                    _: 2
                  }, 1032, ["field", "header"]);
                }), 128))
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/QuickOnboarding/ImportQuickOnboarding.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const QuickOnboarding_vue_vue_type_style_index_0_lang = "";
const QuickOnboarding_vue_vue_type_style_index_1_scoped_81fa2dac_lang = "";
const _sfc_main$1 = {
  __name: "QuickOnboarding",
  __ssrInlineRender: true,
  setup(__props) {
    const useStore = useOnboardingMainStore();
    const useNormalOnboardingStore = useNormalOnboardingMainStore();
    ref(null);
    onMounted(() => {
      useStore.getExistingOnboardingDocuments();
      useNormalOnboardingStore.getBasicDeps();
    });
    onUpdated(() => {
      if (useStore.initialUpdate) {
        useStore.currentlyImportedTableEmployeeCodeValues.splice(0, useStore.currentlyImportedTableEmployeeCodeValues.length);
        useStore.currentlyImportedTableAadharValues.splice(0, useStore.currentlyImportedTableAadharValues.length);
        useStore.currentlyImportedTableMobileNumberValues.splice(0, useStore.currentlyImportedTableMobileNumberValues.length);
        useStore.currentlyImportedTableAccNoValues.splice(0, useStore.currentlyImportedTableAccNoValues.length);
        useStore.currentlyImportedTablePanValues.splice(0, useStore.currentlyImportedTablePanValues.length);
        useStore.currentlyImportedTableEmailValues.splice(0, useStore.currentlyImportedTableEmailValues.length);
      }
    });
    const route = useRoute();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(route).params.module == null) {
        _push(`<div class="h-screen w-full" data-v-81fa2dac><div class="grid grid-cols-12" data-v-81fa2dac><div class="px-2 col-span-5" data-v-81fa2dac><p class="font-bold text-2xl" data-v-81fa2dac>Employee Quick Onboarding</p><ul class="list-disc p-2 my-3" data-v-81fa2dac><li class="font-semibold fs-6" data-v-81fa2dac>Download the <a href="/assets//ABSQuickOnboarding.xlsx" class="font-semibold text-blue-300 cursor-pointer fs-6" data-v-81fa2dac>Sample</a></li><li class="font-semibold fs-6" data-v-81fa2dac>Fill the information in excel template</li></ul><div class="grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3" data-v-81fa2dac><div class="col-span-3 font-semibold fs-6 cursor-pointer w-full" for="file" data-v-81fa2dac><i class="pi pi-folder px-2" style="${ssrRenderStyle({ "font-size": "1rem" })}" data-v-81fa2dac></i>Browse </div><span class="col-span-9 px-4" data-v-81fa2dac>${ssrInterpolate(unref(useStore).selectedFile ? unref(useStore).selectedFile.name : "")}</span></div><input type="file" name="" id="file" hidden accept=".xls, .xlsx" data-v-81fa2dac><button class="float-right mx-5 mt-4 btn btn-orange" data-v-81fa2dac>Upload</button></div><div class="col-span-7" data-v-81fa2dac><div class="col-form-label" data-v-81fa2dac><div class="py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6" data-v-81fa2dac><i class="mx-2 fa fa-warning text-danger" data-v-81fa2dac></i> Read these instructions before uploading the file. </div><div data-v-81fa2dac><ul class="m-4 font-semibold list-disc" style="${ssrRenderStyle({})}" data-v-81fa2dac><li class="font-semibold fs-6" data-v-81fa2dac> The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers.</li><li class="font-semibold fs-6" data-v-81fa2dac> When adding an employee, you must enter your mobile phone number.</li><li class="font-semibold fs-6" data-v-81fa2dac> To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. </li><li class="font-semibold fs-6" data-v-81fa2dac> Each employee&#39;s email is different. Therefore, an employee cannot be added to two organisations using the same email.</li><li class="font-semibold fs-6" data-v-81fa2dac> Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. </li></ul></div></div></div></div>`);
        _push(ssrRenderComponent(_component_DataTable, {
          ref: "dt",
          dataKey: "id",
          paginator: true,
          class: "mt-3",
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee",
                header: "Employee's"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Month"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Date Time"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Total Employees Onboarded"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Action"
              }, null, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "Employee",
                  header: "Employee's"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Month"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Date Time"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Total Employees Onboarded"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Action"
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div>`);
      } else {
        _push(`<div class="" data-v-81fa2dac>`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useStore).canShowloading,
        "onUpdate:visible": ($event) => unref(useStore).canShowloading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_ProgressSpinner, {
              style: { "width": "50px", "height": "50px" },
              strokeWidth: "8",
              fill: "var(--surface-ground)",
              animationDuration: "2s",
              "aria-label": "Custom ProgressSpinner"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_ProgressSpinner, {
                style: { "width": "50px", "height": "50px" },
                strokeWidth: "8",
                fill: "var(--surface-ground)",
                animationDuration: "2s",
                "aria-label": "Custom ProgressSpinner"
              })
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}" data-v-81fa2dac${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/QuickOnboarding/QuickOnboarding.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const QuickOnboarding = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["__scopeId", "data-v-81fa2dac"]]);
const BulkOnboarding_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "BulkOnboarding",
  __ssrInlineRender: true,
  setup(__props) {
    const useStore = useOnboardingMainStore();
    const useNormalOnboardingStore = useNormalOnboardingMainStore();
    ref(null);
    onMounted(() => {
      useStore.getExistingOnboardingDocuments();
      useNormalOnboardingStore.getBasicDeps();
    });
    onUpdated(() => {
      if (useStore.initialUpdate) {
        useStore.currentlyImportedTableEmployeeCodeValues.splice(0, useStore.currentlyImportedTableEmployeeCodeValues.length);
        useStore.currentlyImportedTableAadharValues.splice(0, useStore.currentlyImportedTableAadharValues.length);
        useStore.currentlyImportedTableMobileNumberValues.splice(0, useStore.currentlyImportedTableMobileNumberValues.length);
        useStore.currentlyImportedTableAccNoValues.splice(0, useStore.currentlyImportedTableAccNoValues.length);
        useStore.currentlyImportedTablePanValues.splice(0, useStore.currentlyImportedTablePanValues.length);
        useStore.currentlyImportedTableEmailValues.splice(0, useStore.currentlyImportedTableEmailValues.length);
      }
    });
    const route = useRoute();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(route).params.module == "bulkOnboarding") {
        _push(`<div class="">`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<div class="h-screen w-full"><div class="grid grid-cols-12"><div class="col-span-5 px-2"><p class="font-bold text-2xl">Employee Bulk Onboarding</p><ul class="list-disc p-2 my-3"><li class="font-semibold fs-6">Download the <a href="/assets/ABSBulkOnboarding.xls" class="font-semibold text-blue-300 cursor-pointer fs-6">Sample</a></li><li class="font-semibold fs-6">Fill the information in excel template</li></ul><div class="grid grid-cols-12 divide-x-2 divide-gray-600 border-gray-500 rounded-lg border p-2 mr-3"><div class="col-span-3 font-semibold fs-6 cursor-pointer w-full" for="file"><i class="pi pi-folder px-2" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i>Browse </div><span class="col-span-9 px-4">${ssrInterpolate(unref(useStore).selectedFile ? unref(useStore).selectedFile.name : "")}</span></div><input type="file" name="" id="file" hidden accept=".xls, .xlsx"><button class="float-right mx-5 mt-6 btn btn-orange">Upload</button></div><div class="col-span-7"><div class="col-form-label"><div class="py-2 font-semibold bg-red-100 rounded-lg f-12 alert-warning fs-6"><i class="mx-2 fa fa-warning text-danger"></i> Read these instructions before uploading the file. </div><div><ul class="m-4 font-semibold list-disc" style="${ssrRenderStyle({})}"><li class="font-semibold fs-6"> The fields Employee Number, Employee Name, Email, Date of Joining, and Location must be filled in before adding workers.</li><li class="font-semibold fs-6"> When adding an employee, you must enter your mobile phone number.</li><li class="font-semibold fs-6"> To receive all messages, including those about timesheet reminders, leave requests, and attendance requests, your email address must be current. </li><li class="font-semibold fs-6"> Each employee&#39;s email is different. Therefore, an employee cannot be added to two organisations using the same email.</li><li class="font-semibold fs-6"> Designation is required because, in cases when two or more workers share the same Name, it will aid in locating them in People Picker search results. </li></ul></div></div></div></div>`);
        _push(ssrRenderComponent(_component_DataTable, {
          ref: "dt",
          dataKey: "id",
          paginator: true,
          class: "mt-3",
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee",
                header: "Employee's"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Month"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Date Time"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Total Employees Onboarded"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Employee code",
                header: "Action"
              }, null, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "Employee",
                  header: "Employee's"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Month"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Date Time"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Total Employees Onboarded"
                }),
                createVNode(_component_Column, {
                  field: "Employee code",
                  header: "Action"
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div>`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useStore).canShowloading,
        "onUpdate:visible": ($event) => unref(useStore).canShowloading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_ProgressSpinner, {
              style: { "width": "50px", "height": "50px" },
              strokeWidth: "8",
              fill: "var(--surface-ground)",
              animationDuration: "2s",
              "aria-label": "Custom ProgressSpinner"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_ProgressSpinner, {
                style: { "width": "50px", "height": "50px" },
                strokeWidth: "8",
                fill: "var(--surface-ground)",
                animationDuration: "2s",
                "aria-label": "Custom ProgressSpinner"
              })
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/BulkOnboarding/BulkOnboarding.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const router = createRouter({
  history: createWebHistory("/build/"),
  routes: [
    {
      path: "/import/:module",
      name: "QuickOnboarding",
      component: QuickOnboarding
    }
  ]
});
export {
  QuickOnboarding as Q,
  _sfc_main as _,
  router as r
};
