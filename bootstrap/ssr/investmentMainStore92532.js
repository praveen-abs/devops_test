import axios from "axios";
import { defineStore } from "pinia";
import { ref, reactive } from "vue";
import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";
<<<<<<<< HEAD:bootstrap/ssr/investmentMainStore46681.js
import { S as Service } from "./Service46681.js";
========
import { S as Service } from "./Service92532.js";
>>>>>>>> 3d11572c6ee7fb534efc658b88a39b370fca8e71:bootstrap/ssr/investmentMainStore92532.js
import { data } from "autoprefixer";
import dayjs from "dayjs";
const investmentFormulaStore = defineStore("investmentFormulaStore", () => {
  const tax_amt = ref();
  const taxCalculation = (total_income, regime, age) => {
    console.log("total income :" + total_income);
    console.log("employee age:" + age);
    if (regime == "old") {
      if (age < 60) {
        if (total_income <= 25e4) {
          console.log("taxable income is zero");
          let taxable_amount = 0;
          console.log("taxable_amount :" + Math.floor(taxable_amount));
          return taxable_amount;
        } else if (total_income > 25e4 && total_income <= 5e5) {
          let deduction = total_income - 25e4;
          let taxable_amount = deduction * 5 / 100;
          console.log("Tax On Income" + taxable_amount);
          let total_amount = Math.round(taxable_amount + 12500);
          let heath_and_education = total_amount * 4 / 100;
          console.log("child Eduction :" + heath_and_education);
          console.log("taxable_amount :" + total_amount + heath_and_education);
          let final_value = total_amount + heath_and_education;
          return final_value;
        } else if (total_income > 5e5 && total_income <= 1e6) {
          let deduction = total_income - 5e5;
          let taxable_amount = deduction * 20 / 100;
          console.log("Tax On Income" + taxable_amount);
          let total_amount = Math.round(taxable_amount + 12500);
          let heath_and_education = taxable_amount * 4 / 100;
          console.log("child Eduction :" + heath_and_education);
          console.log("taxable_amount :" + Math.round(total_amount + heath_and_education));
          let final_value = total_amount + heath_and_education;
          return final_value;
        } else if (total_income > 1e6) {
          let subcharge = "";
          let heath_and_education = 0;
          let deduction = total_income - 1e6;
          let taxable_amount = deduction * 30 / 100;
          console.log("---------------------------------------------");
          console.log("Tax On Income" + taxable_amount);
          let total_amount = Math.round(taxable_amount + 112500);
          subcharge = subChargeCalculation(total_income);
          if (subcharge) {
            heath_and_education = (taxable_amount + subcharge) * 4 / 100;
            console.log("child Eduction :" + Math.round(heath_and_education));
            console.log("surchage" + Math.round(subcharge));
            let final_value = parseInt(total_amount) + parseInt(subcharge) + parseInt(heath_and_education);
            console.log("taxable_amount :" + Math.round(final_value));
            return Math.round(final_value);
          } else {
            heath_and_education = total_amount * 4 / 100;
            console.log("child Eduction :" + Math.round(heath_and_education));
            let final_value = total_amount + heath_and_education;
            return Math.round(final_value);
          }
        } else {
          console.log("Salary Is Less Than 250000");
          return total_income;
        }
      } else if (age >= 60 && age <= 80) {
        if (total_income > 3e5 && total_income <= 5e5) {
          let deduction = total_income - 3e5;
          let taxable_amount = deduction * 5 / 100;
          console.log("Tax On Income" + taxable_amount);
          let heath_and_education = taxable_amount * 4 / 100;
          console.log("child Eduction :" + heath_and_education);
          let final_value = Math.round(taxable_amount + heath_and_education);
          console.log("taxable_amount :" + final_value);
          return final_value;
        } else if (total_income > 5e5 && total_income < 1e6) {
          let deduction = total_income - 5e5;
          let taxable_amount = deduction * 20 / 100;
          console.log("Tax On Income" + taxable_amount);
          let heath_and_education = taxable_amount * 4 / 100;
          console.log("child Eduction :" + heath_and_education);
          let final_value = Math.round(taxable_amount + 1e4 + heath_and_education);
          console.log("taxable_amount :" + final_value);
          return final_value;
        } else if (total_income > 1e6) {
          console.log("working");
          let deduction = total_income - 1e6;
          let taxable_amount = deduction * 30 / 100;
          console.log("Tax On Income" + taxable_amount);
          let total_amount = Math.floor(taxable_amount + 11e4);
          let subcharge = subChargeCalculation(total_income);
          let heath_and_education = (taxable_amount + subcharge) * 4 / 100;
          console.log("child Eduction :" + heath_and_education);
          let final_value = total_amount + subcharge + heath_and_education;
          console.log("taxable_amount :" + final_value);
          return final_value;
        } else {
          console.log("Salary Is Less Than 300000");
          return total_income;
        }
      } else if (age > 80) {
        if (total_income > 5e5 && total_income <= 1e6) {
          let deduction = total_income - 5e5;
          let taxable_amount = deduction * 20 / 100;
          console.log("taxable_amount :" + Math.round(taxable_amount));
        } else if (total_income > 1e6) {
          let deduction = total_income - 1e6;
          let taxable_amount = deduction * 30 / 100;
          console.log("Tax On Income" + taxable_amount);
          let total_amount = Math.floor(taxable_amount + 112500);
          let subcharge = subChargeCalculation(total_income);
          let heath_and_education = (taxable_amount + subcharge) * 4 / 100;
          console.log("child Eduction :" + heath_and_education);
          let final_value = total_amount + subcharge + heath_and_education;
          console.log("taxable_amount :" + final_value);
          return final_value;
        } else {
          console.log("Salary Is Less Than 500000");
          return total_income;
        }
      }
    } else if (regime == "new") {
      if (total_income > 3e5 && total_income <= 6e5) {
        let taxable_amount = total_income * 5 / 100;
        console.log("taxable_amount :" + Math.floor(taxable_amount));
        console.log("new regime total income greater than 300001");
        return Math.floor(taxable_amount);
      } else if (total_income > 6e5 && total_income <= 9e5) {
        let taxable_amount = total_income * 10 / 100;
        console.log("taxable_amount :" + Math.floor(15e3 + taxable_amount));
        console.log("new regime total income greater than 600001");
        tax_amt.value = Math.floor(taxable_amount);
        return Math.floor(15e3 + taxable_amount);
      } else if (total_income > 9e5 && total_income <= 12e5) {
        let taxable_amount = total_income * 15 / 100;
        console.log("taxable_amount :" + Math.floor(45e3 + taxable_amount));
        console.log("new regime total income greater than 900001 ");
        return Math.floor(45e3 + taxable_amount);
      } else if (total_income > 12e5 && total_income < 15e5) {
        let taxable_amount = total_income * 20 / 100;
        console.log("taxable_amount :" + Math.floor(9e4 + taxable_amount));
        console.log("new regime total income greater than 1200001");
        tax_amt.value = Math.floor(taxable_amount);
        return Math.floor(9e4 + taxable_amount);
      } else if (total_income > 15e5) {
        let taxable_amount = total_income * 30 / 100;
        let total_amount = Math.floor(taxable_amount + 15e4);
        let subcharge = subChargeCalculation(total_income);
        let heath_and_education = (total_amount + subcharge) * 4 / 100;
        let final_value = total_amount + subcharge + heath_and_education;
        console.log("taxable_amount :" + final_value);
        return final_value;
      } else {
        let taxable_amount = 0;
        console.log("less than 300000 ");
        return taxable_amount;
      }
    } else {
      console.log("No More Regime");
    }
  };
  const calChildEducation = (value) => {
    const CEF = value * 4 / 100;
    console.log("Child Education:" + CEF);
    return CEF;
  };
  const subChargeCalculation = (total_income) => {
    if (total_income >= 5e6 && total_income < 1e7) {
      let subcharge = total_income * 10 / 100;
      console.log("Subcharge:" + subcharge);
      return subcharge;
    } else if (total_income >= 1e7 && total_income < 2e7) {
      let subcharge = total_income * 15 / 100;
      console.log("Subcharge:" + subcharge);
      return subcharge;
    } else if (total_income >= 2e7 && total_income < 5e7) {
      let subcharge = total_income * 25 / 100;
      console.log("Subcharge:" + subcharge);
      return subcharge;
    } else if (total_income > 5e7) {
      let subcharge = total_income * 37 / 100;
      console.log("Subcharge:" + subcharge);
      return subcharge;
    } else {
      console.log("Total Income is Less than 5000000");
    }
  };
  const maintenance_cal = (lender_type, rent_rec, munic_tax) => {
    let main = (rent_rec - munic_tax) * 30 / 100;
    return main;
  };
  const net_value_cal = (rent_rec, munic_tax, main) => {
    let net_value = rent_rec - munic_tax - main;
    return net_value;
  };
  const income_loss_cal = (interest, net) => {
    let income_loss = net - interest;
    return income_loss;
  };
  return {
    taxCalculation,
    maintenance_cal,
    net_value_cal,
    income_loss_cal,
    tax_amt,
    subChargeCalculation,
    calChildEducation
  };
});
const investmentMainStore = defineStore("investmentMainStore", () => {
  const formula = investmentFormulaStore();
  const service = Service();
  const currentUSerCode = ref();
  const toast = useToast();
  const canShowSubmissionStatus = ref(false);
  const confirm = useConfirm();
  const investment_exemption_steps = ref(1);
  const canShowLoading = ref(false);
  const taxSavingInvestments = reactive({
    max_limit: 0,
    declared_amt: 0,
    status: "Not Submited",
    Date_of_submission: ""
  });
  const investmentMainSource = ref();
  const formDataSource = reactive([]);
  const investmentSummarySource = ref();
  const getFormId = ref();
  const editingRowSource = ref();
  const updatedRowSource = ref();
  const hraSource = ref();
  const section80ccSource = ref();
  const otherExemptionSource = ref();
  const otherExeSectionData = ref();
  const housePropertySource = ref();
  const reimbursmentSource = ref();
  const otherIncomeSource = ref();
  const previousEmployeerIncomeSource = ref();
  const hop = reactive([]);
  const otherExe = reactive([]);
  const hra_fs = reactive([]);
  const AddHraButtonDisabled = ref(false);
  const employeDoj = ref();
  const isSubmitted = ref(true);
  const sumOfTotalRentPaid = ref();
  const epfPayrollDeduction = ref();
  const vpfPayrollDeduction = ref();
  const reimbursemntMaxLimit = ref();
  const getInvestmentSource = async () => {
    let url = `/investments/investments-form-details-template`;
    canShowLoading.value = true;
    await axios.post(url, {
      form_name: "investment 1"
    }).then((res) => {
      investmentMainSource.value = res.data.data.form_details;
      hraSource.value = res.data.data.form_details.HRA;
      section80ccSource.value = res.data.data.form_details["Section 80C & 80CC "];
      otherExemptionSource.value = res.data.data.form_details["Other Excemptions "];
      housePropertySource.value = res.data.data.form_details["House Properties "];
      reimbursmentSource.value = res.data.data.form_details["Reimbersument "];
      otherIncomeSource.value = res.data.data.form_details["Other Source Of  Income"];
      previousEmployeerIncomeSource.value = res.data.data.form_details["Previous Employer Income"];
      let result = res.data.data.is_submitted == 0 ? true : false;
      isSubmitted.value = result;
      epfPayrollDeduction.value = res.data.data.emp_epf;
      vpfPayrollDeduction.value = res.data.data.emp_vpf;
      reimbursemntMaxLimit.value = res.data.data.emp_vpf;
      console.log(result);
      employeDoj.value = res.data.data.doj;
      console.log("employee DOJ" + res.data.data.doj);
      res.data.data.form_details["House Properties "].forEach(
        (data2) => {
          hop.push(data2.fs_id);
        }
      );
      res.data.data.form_details.HRA.forEach((data2) => {
        hra_fs.push(data2.fs_id);
        console.log(hra_fs[0]);
      });
      let sec80DD = res.data.data.form_details["Other Excemptions "].filter(function(item) {
        return item.section == "80EE";
      });
      let sec80DDB = res.data.data.form_details["Other Excemptions "].filter(function(item) {
        return item.section == "80EEA";
      });
      let sec80U = res.data.data.form_details["Other Excemptions "].filter(function(item) {
        return item.section == "80EEB";
      });
      otherExe.push(sec80DD[0].fs_id);
      otherExe.push(sec80DDB[0].fs_id);
      otherExe.push(sec80U[0].fs_id);
    }).catch((e) => console.log(e)).finally(() => {
      canShowLoading.value = false;
      fetchPropertyType();
      fetchotherExe();
      fetchHraNewRental();
      setTimeout(() => {
        hop.splice(0, hop.length);
      }, 1e3);
      setTimeout(() => {
        otherExe.splice(0, otherExe.length);
      }, 1e3);
    });
  };
  const getDeclarationAmount = (amount) => {
    console.log(amount);
    getFormId.value = 1;
    var data2 = {
      fs_id: amount.fs_id,
      declaration_amount: amount.dec_amt,
      select_option: amount.select_option
    };
    if (amount.dec_amt) {
      formDataSource.push(data2);
    } else {
      console.log("Declaration Amount Null");
    }
    var form_data = new FormData();
    for (var key in data2) {
      form_data.append(key, data2[key]);
    }
    console.log(form_data);
    if (amount.dec_amt > amount.max_amount) {
      toast.add({
        severity: "error",
        summary: "Waring",
        detail: "Declaration amount is greater than Maximum Limit",
        life: 3e3
      });
    } else {
      console.log("working");
    }
  };
  const saveFormData = () => {
    console.log(formDataSource);
    canShowLoading.value = true;
    console.log("code:" + service.current_user_code);
    console.log("Form Id:" + getFormId.value);
    let url = `/investments/saveEmpdetails`;
    axios.post(url, {
      user_code: service.current_user_code,
      form_id: getFormId.value,
      is_submitted: 0,
      formDataSource
    }).finally(() => {
      canShowLoading.value = false;
      toast.add({
        severity: "success",
        summary: "Saved",
        detail: "Data Saved Successfull",
        life: 3e3
      });
      getInvestmentSource();
      formDataSource.splice(0, formDataSource.length);
      taxSavingInvestments.status = "Drafed";
      restChars();
      fetchInvestmentSummary();
    });
  };
  const submitFormData = () => {
    let url = `/investments/saveEmpdetails`;
    axios.post(url, {
      user_code: service.current_user_code,
      is_submitted: 1
    }).then((res) => {
      console.log(res.data);
    }).finally(() => {
      canShowSubmissionStatus.value = true;
      setTimeout(() => {
        window.location.reload();
      }, 2e3);
    });
  };
  const formatCurrency = (value) => {
    let currency = new Intl.NumberFormat("en-US", {
      style: "currency",
      currency: "INR"
    }).format(value);
    let format = `${currency.charAt(0)} ${currency.substring(1, currency.length)}`;
    return format;
  };
  const hra_data = ref();
  const current_data = ref();
  const hra = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    from_month: "",
    to_month: "",
    city: "",
    total_rent_paid: "",
    landlord_name: "",
    landlord_PAN: "",
    address: ""
  });
  const dailogAddNewRental = ref(false);
  const dailogEditNewRental = ref(false);
  const fetchHraNewRental = async () => {
    console.log(Object.values(hra_fs[0]));
    await axios.post("/investments/fetchEmpRentalDetails", {
      user_code: service.current_user_code,
      fs_id: hra_fs[0]
    }).then((res) => {
      res.data ? hra_data.value = Object.values(res.data.rent_details) : "";
      sumOfTotalRentPaid.value = res.data.dec_amt[0].sumofRentPaid;
      if (Object.values(res.data).length == 0) {
        AddHraButtonDisabled.value = false;
      } else {
        AddHraButtonDisabled.value = true;
      }
    }).catch((e) => console.log(e)).finally(() => {
      canShowLoading.value = false;
    });
  };
  const editHraNewRental = (currentRowData) => {
    console.log(currentRowData);
    dailogAddNewRental.value = true;
    hra.id = currentRowData.id;
    hra.from_month = dayjs(currentRowData.json_popups_value.from_month).format("DD-MM-YYYY");
    hra.to_month = dayjs(currentRowData.json_popups_value.to_month).format("DD-MM-YYYY");
    hra.address = currentRowData.json_popups_value.address;
    hra.city = currentRowData.json_popups_value.city;
    hra.landlord_PAN = currentRowData.json_popups_value.landlord_PAN;
    hra.landlord_name = currentRowData.json_popups_value.landlord_name;
    hra.total_rent_paid = currentRowData.json_popups_value.total_rent_paid;
  };
  const disableSaveHra = ref(false);
  const saveHraNewRental = () => {
    hra.user_code = service.current_user_code;
    hra.fs_id = hra_fs[0];
    canShowLoading.value = true;
    dailogAddNewRental.value = false;
    axios.post("/investments/saveSectionPopups", hra).then((res) => {
      toast.add({
        severity: "success",
        summary: "Drafted",
        detail: "New Rental Added",
        life: 3e3
      });
    }).catch((e) => console.log(e)).finally(() => {
      canShowLoading.value = false;
      fetchHraNewRental();
      getInvestmentSource();
      taxSavingInvestments.status = "Drafed";
      restChars();
    });
  };
  const deleteRentalDetails = (currentRowData) => {
    confirm.require({
      message: "Do you want to delete this record?",
      header: "Delete Confirmation",
      icon: "pi pi-info-circle",
      acceptClass: "p-button-danger",
      accept: () => {
        canShowLoading.value = true;
        axios.post("/investments/deleteHousePropertyDetails", {
          current_table_id: currentRowData.id
        }).finally(() => {
          canShowLoading.value = false;
          toast.add({
            severity: "error",
            summary: "Deleted",
            detail: "House Rented Allowance Deleted",
            life: 3e3
          });
          fetchHraNewRental();
          getInvestmentSource();
        });
      },
      reject: () => {
      }
    });
  };
  ref();
  reactive({
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
    SPF: ""
  });
  const other_Exe = reactive({
    loan_sanction_date: "",
    lender_type: "",
    property_value: "",
    loan_amount: "",
    interest_amount_paid: "",
    vechicle_brand: "",
    vechicle_model: "",
    interest_amount_paid: ""
  });
  const other_exe_80EE = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    loan_sanction_date: "",
    lender_type: "",
    property_value: "",
    loan_amount: "",
    interest_amount_paid: "",
    section: "80EE"
  });
  const other_exe_80EEA = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    loan_sanction_date: "",
    lender_type: "",
    property_value: "",
    loan_amount: "",
    interest_amount_paid: "",
    section: "80EEA"
  });
  const other_exe_80EEB = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    loan_sanction_date: "",
    lender_type: "",
    property_value: "",
    loan_amount: "",
    interest_amount_paid: "",
    vechicle_brand: "",
    vechicle_model: "",
    interest_amount_paid: "",
    section: "80EEB"
  });
  const dailog_80EE = ref(false);
  const dailog_80EEA = ref(false);
  const dailog_80EEB = ref(false);
  const get80EESlotData = (data2) => {
    other_exe_80EE.id = data2.id;
    dailog_80EE.value = true;
    other_exe_80EE.user_code = service.current_user_code;
    other_exe_80EE.fs_id = data2.fs_id;
    fetchotherExe();
  };
  const get80EEASlotData = (data2) => {
    other_exe_80EEA.id = data2.id;
    dailog_80EEA.value = true;
    other_exe_80EEA.user_code = service.current_user_code;
    other_exe_80EEA.fs_id = data2.fs_id;
    fetchotherExe();
  };
  const get80EEBSlotData = (data2) => {
    other_exe_80EEB.id = data2.id;
    dailog_80EEB.value = true;
    other_exe_80EEB.user_code = service.current_user_code;
    other_exe_80EEB.fs_id = data2.fs_id;
    fetchotherExe();
  };
  const Dec80EE = ref();
  const Dec80EEA = ref();
  const Dec80EEB = ref();
  const fetchotherExe = () => {
    axios.post("/investments/fetchOtherExemption", {
      user_code: service.current_user_code,
      otherExe
    }).then((res) => {
      otherExeSectionData.value = Object.values(res.data);
    });
  };
  const editOtherExe = (currentRowData) => {
    console.log(currentRowData);
    if (currentRowData.json_popups_value.section == "80EE") {
      dailog_80EE.value = true;
      other_exe_80EE.fs_id = currentRowData.json_popups_value.fs_id;
      other_exe_80EE.user_code = service.current_user_code;
      other_exe_80EE.loan_sanction_date = dayjs(currentRowData.json_popups_value.loan_sanction_date).format("YYYY-MM-DD");
      other_exe_80EE.lender_type = currentRowData.json_popups_value.lender_type;
      other_exe_80EE.loan_amount = currentRowData.json_popups_value.loan_amount;
      other_exe_80EE.property_value = currentRowData.json_popups_value.property_value;
      other_exe_80EE.interest_amount_paid = currentRowData.json_popups_value.interest_amount_paid;
    } else if (currentRowData.json_popups_value.section == "80EEA") {
      dailog_80EEA.value = true;
      other_exe_80EEA.fs_id = currentRowData.json_popups_value.fs_id;
      other_exe_80EEA.user_code = service.current_user_code;
      other_exe_80EEA.loan_sanction_date = dayjs(currentRowData.json_popups_value.loan_sanction_date).format("YYYY-MM-DD");
      other_exe_80EEA.lender_type = currentRowData.json_popups_value.lender_type;
      other_exe_80EEA.loan_amount = currentRowData.json_popups_value.loan_amount;
      other_exe_80EEA.property_value = currentRowData.json_popups_value.property_value;
      other_exe_80EEA.interest_amount_paid = currentRowData.json_popups_value.interest_amount_paid;
    } else if (currentRowData.json_popups_value.section == "80EEB") {
      other_exe_80EEB.fs_id = currentRowData.json_popups_value.fs_id;
      other_exe_80EEB.user_code = service.current_user_code;
      dailog_80EEB.value = true;
      other_exe_80EEB.loan_sanction_date = dayjs(currentRowData.json_popups_value.loan_sanction_date).format("YYYY-MM-DD");
      other_exe_80EEB.vechicle_brand = currentRowData.json_popups_value.vechicle_brand;
      other_exe_80EEB.vechicle_model = currentRowData.json_popups_value.vechicle_model;
      other_exe_80EEB.interest_amount_paid = currentRowData.json_popups_value.interest_amount_paid;
    } else {
      console.log("completed");
    }
  };
  const deleteOtherExeDetails = (currentRowData) => {
    confirm.require({
      message: "Do you want to delete this record?",
      header: "Delete Confirmation",
      icon: "pi pi-info-circle",
      acceptClass: "p-button-danger",
      accept: () => {
        canShowLoading.value = true;
        axios.post("/investments/deleteHousePropertyDetails", {
          current_table_id: currentRowData.id
        }).finally(() => {
          canShowLoading.value = false;
          toast.add({
            severity: "error",
            summary: "Deleted",
            detail: `${currentRowData["json_popups_value"].section} is Deleted`,
            life: 3e3
          });
          fetchotherExe();
          getInvestmentSource();
        });
      },
      reject: () => {
      }
    });
  };
  const save80EE = () => {
    dailog_80EE.value = false;
    canShowLoading.value = true;
    console.log(data);
    axios.post("/investments/saveSection80", other_exe_80EE).then((res) => {
      toast.add({
        severity: "success",
        summary: "Drafted",
        detail: "80EE Added",
        life: 3e3
      });
    }).catch((e) => console.log(e)).finally(() => {
      canShowLoading.value = false;
      getInvestmentSource();
      restChars();
      fetchotherExe();
    });
  };
  const save80EEA = () => {
    dailog_80EEA.value = false;
    canShowLoading.value = true;
    axios.post("/investments/saveSection80", other_exe_80EEA).then((res) => {
      canShowLoading.value = false;
      toast.add({
        severity: "success",
        summary: "Drafted",
        detail: "80EEA Added",
        life: 3e3
      });
    }).catch((e) => console.log(e)).finally(() => {
      canShowLoading.value = false;
      getInvestmentSource();
      restChars();
      fetchotherExe();
    });
  };
  const save80EEB = () => {
    dailog_80EEB.value = false;
    canShowLoading.value = true;
    axios.post("/investments/saveSection80", other_exe_80EEB).then((res) => {
      toast.add({
        severity: "success",
        summary: "Drafted",
        detail: "80EEB Added",
        life: 3e3
      });
    }).catch((e) => console.log(e)).finally(() => {
      canShowLoading.value = false;
      getInvestmentSource();
      restChars();
      fetchotherExe();
    });
  };
  const house_props_data = ref();
  const dailog_SelfOccupiedProperty = ref(false);
  const dailog_LetOutProperty = ref(false);
  const dailog_DeemedLetOutProperty = ref(false);
  const sop = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    lender_name: "",
    lender_pan: "",
    lender_type: "",
    income_loss: "",
    address: "",
    property_type: "Self Occupied Property"
  });
  const lop = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    lender_name: "",
    lender_pan: "",
    lender_type: "",
    loss_from_housing_property: "",
    address: "",
    rent_received: "",
    municipal_tax: "",
    maintenance: "",
    net_value: "",
    interest: "",
    income_loss: "",
    property_type: "Let Out Property"
  });
  const dlop = reactive({
    id: "",
    user_code: "",
    fs_id: "",
    lender_name: "",
    lender_pan: "",
    lender_type: "",
    loss_from_housing_property: "",
    address: "",
    rent_received: "",
    municipal_tax: "",
    maintenance: "",
    net_value: "",
    interest: "",
    income_loss: "",
    property_type: "Deemed Let Out Property"
  });
  const income_loss_calculation = () => {
    const lop_maintenance = formula.maintenance_cal(
      lop.lender_type,
      lop.rent_received,
      lop.municipal_tax
    );
    const dlop_maintenance = formula.maintenance_cal(
      dlop.lender_type,
      dlop.rent_received,
      dlop.municipal_tax
    );
    lop.maintenance = lop_maintenance;
    dlop.maintenance = dlop_maintenance;
    const lop_net = formula.net_value_cal(
      lop.rent_received,
      lop.municipal_tax,
      lop.maintenance
    );
    lop.net_value = lop_net;
    const dlop_net = formula.net_value_cal(
      dlop.rent_received,
      dlop.municipal_tax,
      dlop.maintenance
    );
    dlop.net_value = dlop_net;
    lop.income_loss = formula.income_loss_cal(lop.interest, lop.net_value);
    dlop.income_loss = formula.income_loss_cal(
      dlop.interest,
      dlop.net_value
    );
  };
  const fetchPropertyType = () => {
    axios.post("/investments/fetchHousePropertyDetails", {
      user_code: service.current_user_code,
      hop
    }).then((res) => {
      house_props_data.value = Object.values(res.data);
    });
  };
  const getSopSlotData = (data2) => {
    dailog_SelfOccupiedProperty.value = true;
    console.log(data2);
    sop.user_code = service.current_user_code;
    sop.fs_id = data2.fs_id;
    fetchPropertyType();
  };
  const getLopSlotData = (data2) => {
    dailog_LetOutProperty.value = true;
    lop.user_code = service.current_user_code;
    lop.fs_id = data2.fs_id;
    fetchPropertyType();
  };
  const getDlopSlotData = (data2) => {
    dailog_DeemedLetOutProperty.value = true;
    dlop.user_code = service.current_user_code;
    dlop.fs_id = data2.fs_id;
    fetchPropertyType();
  };
  const editHouseProps = (currentRowData) => {
    if (currentRowData.json_popups_value.property_type == "Self Occupied Property") {
      sop.user_code = service.current_user_code;
      sop.fs_id = currentRowData.fs_id;
      sop.id = currentRowData.id;
      dailog_SelfOccupiedProperty.value = true;
      sop.lender_name = currentRowData.json_popups_value.lender_name;
      sop.lender_pan = currentRowData.json_popups_value.lender_pan;
      sop.lender_type = currentRowData.json_popups_value.lender_type;
      sop.loss_from_housing_property = currentRowData.json_popups_value.loss_from_housing_property;
      sop.property_type = currentRowData.json_popups_value.property_type;
      sop.address = currentRowData.json_popups_value.address;
    } else if (currentRowData.json_popups_value.property_type == "Let Out Property") {
      dailog_LetOutProperty.value = true;
      lop.user_code = service.current_user_code;
      lop.id = currentRowData.id;
      lop.fs_id = currentRowData.fs_id;
      lop.lender_name = currentRowData.json_popups_value.lender_name;
      lop.lender_pan = currentRowData.json_popups_value.lender_pan;
      lop.lender_type = currentRowData.json_popups_value.lender_type;
      lop.rent_received = currentRowData.json_popups_value.rent_received;
      lop.municipal_tax = currentRowData.json_popups_value.municipal_tax;
      lop.maintenance = currentRowData.json_popups_value.maintenance;
      lop.net_value = currentRowData.json_popups_value.net_value;
      lop.interest = currentRowData.json_popups_value.interest;
      lop.income_loss = currentRowData.json_popups_value.income_loss;
    } else if (currentRowData.json_popups_value.property_type == "Deemed Let Out Property") {
      dailog_DeemedLetOutProperty.value = true;
      dlop.user_code = service.current_user_code;
      dlop.fs_id = currentRowData.fs_id;
      dlop.id = currentRowData.id;
      dlop.lender_name = currentRowData.json_popups_value.lender_name;
      dlop.lender_pan = currentRowData.json_popups_value.lender_pan;
      dlop.lender_type = currentRowData.json_popups_value.lender_type;
      dlop.rent_received = currentRowData.json_popups_value.rent_received;
      dlop.municipal_tax = currentRowData.json_popups_value.municipal_tax;
      dlop.maintenance = currentRowData.json_popups_value.maintenance;
      dlop.net_value = currentRowData.json_popups_value.net_value;
      dlop.interest = currentRowData.json_popups_value.interest;
      dlop.income_loss = currentRowData.json_popups_value.income_loss;
    } else {
      console.log("No more Property Type");
    }
  };
  const deleteHouseProps = (currentRowData) => {
    confirm.require({
      message: "Do you want to delete this record?",
      header: "Delete Confirmation",
      icon: "pi pi-info-circle",
      acceptClass: "p-button-danger",
      accept: () => {
        canShowLoading.value = true;
        axios.post("/investments/deleteHousePropertyDetails", {
          current_table_id: currentRowData.id
        }).finally(() => {
          canShowLoading.value = false;
          toast.add({
            severity: "error",
            summary: "Deleted",
            detail: `${currentRowData["json_popups_value"].property_type} is Deleted`,
            life: 3e3
          });
          fetchPropertyType();
          getInvestmentSource();
        });
      },
      reject: () => {
        console.log("House property Delete Action Rejected");
      }
    });
  };
  const saveSelfOccupiedProperty = () => {
    canShowLoading.value = true;
    dailog_SelfOccupiedProperty.value = false;
    axios.post("/investments/saveSectionPopups", sop).then((res) => {
    }).finally(() => {
      fetchPropertyType();
      getInvestmentSource();
      canShowLoading.value = false;
      toast.add({
        severity: "success",
        summary: "Saved",
        detail: `new ${sop.property_type} is Drafted `,
        life: 3e3
      });
      restChars();
    });
  };
  const saveLetOutProperty = () => {
    canShowLoading.value = true;
    dailog_LetOutProperty.value = false;
    axios.post("/investments/saveSectionPopups", lop).then((res) => {
    }).finally(() => {
      fetchPropertyType();
      getInvestmentSource();
      canShowLoading.value = false;
      toast.add({
        severity: "success",
        summary: "Saved",
        detail: `new ${lop.property_type} is Drafted `,
        life: 3e3
      });
      restChars();
    });
  };
  const saveDeemedLetOutProperty = () => {
    canShowLoading.value = true;
    dailog_DeemedLetOutProperty.value = false;
    axios.post("/investments/saveSectionPopups", dlop).then((res) => {
    }).finally(() => {
      fetchPropertyType();
      getInvestmentSource();
      canShowLoading.value = false;
      toast.add({
        severity: "success",
        summary: "Saved",
        detail: `new ${dlop.property_type} is Drafted `,
        life: 3e3
      });
      restChars();
    });
  };
  const fetchInvestmentSummary = () => {
    axios.get("/investments/investment-summary").then((res) => {
      investmentSummarySource.value = res.data;
    }).finally(() => {
      canShowLoading.value = false;
      var declared_amt = 0;
      var max_limit = 0;
      investmentSummarySource.value.forEach((item) => {
        declared_amt += item.dec_amount;
        max_limit += item.amount_rejected;
      });
      console.log("declaration amount :" + declared_amt);
      taxSavingInvestments.declared_amt = declared_amt;
      taxSavingInvestments.max_limit = parseInt(max_limit) + parseInt(declared_amt);
    });
  };
  const metrocitiesOption = ref([
    { id: 1, name: "Chennai", value: "Chennai" },
    { id: 2, name: "Mumbai", value: "Mumbai" },
    { id: 3, name: "Hyderabad", value: "Hyderabad" },
    { id: 4, name: "Kolkatta", value: "Kolkatta" },
    { id: 5, name: "Other Non Metro", value: "Other Non Metro" }
  ]);
  const lenderTypeOption = ref([
    { name: "Financial Institution", code: "Financial Institution" },
    { name: "Others", code: "Others" }
  ]);
  const restChars = () => {
    hra.from_month = null;
    hra.to_month = null;
    hra.total_rent_paid = null;
    hra.address = null;
    hra.city = null;
    hra.landlord_name = null;
    hra.landlord_PAN = null;
    other_exe_80EE.loan_sanction_date = null;
    other_exe_80EE.lender_type = null;
    other_exe_80EE.property_value = null;
    other_exe_80EE.loan_amount = null;
    other_exe_80EE.interest_amount_paid = null;
    other_exe_80EE.vechicle_brand = null;
    other_exe_80EE.vechicle_model = null;
    other_exe_80EE.interest_amount_paid = null;
    other_exe_80EEA.loan_sanction_date = null;
    other_exe_80EEA.lender_type = null;
    other_exe_80EEA.property_value = null;
    other_exe_80EEA.loan_amount = null;
    other_exe_80EEA.interest_amount_paid = null;
    other_exe_80EEA.vechicle_brand = null;
    other_exe_80EEA.vechicle_model = null;
    other_exe_80EEA.interest_amount_paid = null;
    other_exe_80EEB.loan_sanction_date = null;
    other_exe_80EEB.lender_type = null;
    other_exe_80EEB.property_value = null;
    other_exe_80EEB.loan_amount = null;
    other_exe_80EEB.interest_amount_paid = null;
    other_exe_80EEB.vechicle_brand = null;
    other_exe_80EEB.vechicle_model = null;
    other_exe_80EEB.interest_amount_paid = null;
    sop.lender_name = null;
    sop.lender_pan = null;
    sop.lender_type = null;
    sop.address = null;
    lop.lender_name = null;
    lop.lender_pan = null;
    lop.lender_type = null;
    lop.loss_from_housing_property = null;
    lop.address = null;
    lop.rent_received = null;
    lop.municipal_tax = null;
    lop.maintenance = null;
    lop.net_value = null;
    lop.interest = null;
    lop.income_loss = null;
    dlop.lender_name = null;
    dlop.lender_pan = null;
    dlop.lender_type = null;
    dlop.loss_from_housing_property = null;
    dlop.address = null;
    dlop.rent_received = null;
    dlop.municipal_tax = null;
    dlop.maintenance = null;
    dlop.net_value = null;
    dlop.interest = null;
    dlop.income_loss = null;
  };
  const tax_deduction = ref();
  const total_gross = ref();
  const total_taxable = ref();
  const regime = ref();
  const age = ref();
  const lastUpdated = ref();
  const fetchTaxableIncomeInfo = async () => {
    await axios.get("/investments/TaxDeclaration").then((res) => {
      tax_deduction.value = res.data;
      if (res.data[7].regime == "old") {
        total_gross.value = res.data[6].old_regime;
      } else {
        total_gross.value = res.data[6].new_regime;
      }
      total_taxable.value = res.data[7].old_regime;
      age.value = res.data[7].age;
      regime.value = res.data[7].regime;
      lastUpdated.value = res.data[7].last_updated;
    }).finally(() => {
      canShowLoading.value = false;
      disableRegime(lastUpdated.value);
    });
  };
  const disableRegime = (value) => {
    let currentDate = new Date();
    let updatedDate = "";
    if (value) {
      updatedDate = new Date(value);
    } else {
      updatedDate = new Date();
    }
    if (updatedDate >= currentDate) {
      return true;
    } else {
      return false;
    }
  };
  return {
    fetchotherExe,
    Dec80EE,
    Dec80EEA,
    Dec80EEB,
    investment_exemption_steps,
    currentUSerCode,
    canShowLoading,
    getInvestmentSource,
    saveFormData,
    getFormId,
    formatCurrency,
    editingRowSource,
    updatedRowSource,
    canShowSubmissionStatus,
    submitFormData,
    investmentMainSource,
    formDataSource,
    hraSource,
    section80ccSource,
    otherExemptionSource,
    housePropertySource,
    reimbursmentSource,
    previousEmployeerIncomeSource,
    otherIncomeSource,
    isSubmitted,
    epfPayrollDeduction,
    vpfPayrollDeduction,
    reimbursemntMaxLimit,
    taxSavingInvestments,
    fetchInvestmentSummary,
    investmentSummarySource,
    hra_data,
    disableSaveHra,
    hra,
    current_data,
    dailogAddNewRental,
    dailogEditNewRental,
    editHraNewRental,
    fetchHraNewRental,
    saveHraNewRental,
    deleteRentalDetails,
    AddHraButtonDisabled,
    getDeclarationAmount,
    otherExe,
    other_Exe,
    dailog_80EE,
    dailog_80EEA,
    dailog_80EEB,
    other_exe_80EE,
    other_exe_80EEA,
    other_exe_80EEB,
    save80EE,
    save80EEA,
    save80EEB,
    get80EESlotData,
    get80EEASlotData,
    get80EEBSlotData,
    otherExeSectionData,
    editOtherExe,
    deleteOtherExeDetails,
    house_props_data,
    dailog_SelfOccupiedProperty,
    dailog_DeemedLetOutProperty,
    dailog_LetOutProperty,
    income_loss_calculation,
    fetchPropertyType,
    saveSelfOccupiedProperty,
    saveLetOutProperty,
    saveDeemedLetOutProperty,
    hop,
    lop,
    sop,
    dlop,
    getDlopSlotData,
    getLopSlotData,
    getSopSlotData,
    editHouseProps,
    deleteHouseProps,
    metrocitiesOption,
    lenderTypeOption,
    employeDoj,
    sumOfTotalRentPaid,
    fetchTaxableIncomeInfo,
    tax_deduction,
    total_gross,
    regime,
    age,
    lastUpdated,
    disableRegime
  };
});
export {
  investmentFormulaStore as a,
  investmentMainStore as i
};
