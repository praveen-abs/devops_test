/* empty css                        *//* empty css                             *//* empty css                           */import { ref, inject, reactive, onMounted, computed, resolveComponent, unref, withCtx, createTextVNode, toDisplayString, createVNode, withDirectives, vModelText, openBlock, createBlock, createCommentVNode, useSSRContext, mergeProps, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import "primevue/blockui";
import Button from "primevue/button";
import FocusTrap from "primevue/focustrap";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";
import Tooltip from "primevue/tooltip";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ConfirmDialog from "primevue/confirmdialog";
import DialogService from "primevue/dialogservice";
import Toast from "primevue/toast";
import Dialog from "primevue/dialog";
import Dropdown from "primevue/dropdown";
import ConfirmationService from "primevue/confirmationservice";
import ToastService from "primevue/toastservice";
import ProgressSpinner from "primevue/progressspinner";
import InputText from "primevue/inputtext";
import Row from "primevue/row";
import ColumnGroup from "primevue/columngroup";
import Calendar from "primevue/calendar";
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import InputNumber from "primevue/inputnumber";
import SelectButton from "primevue/selectbutton";
import RadioButton from "primevue/radiobutton";
import Checkbox from "primevue/checkbox";
import { ssrInterpolate, ssrRenderComponent, ssrRenderAttr, ssrRenderStyle, ssrRenderClass, ssrRenderAttrs } from "vue/server-renderer";
import { _ as _imports_0 } from "./assets/svg_oops-704e507f.mjs";
import useValidate from "@vuelidate/core";
import { helpers, required } from "@vuelidate/validators";
import axios from "axios";
import "lodash";
import dayjs from "dayjs";
import { L as LoadingSpinner } from "./assets/LoadingSpinner-13fb7de2.mjs";
import "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
const useEmpSalaryAdvanceStore = defineStore("useEmpSalaryAdvanceStore", () => {
  const canShowLoading = ref(false);
  inject("$swal");
  const dailogSalaryAdvance = ref(false);
  const salaryAdvanceEmployeeData = ref();
  const percent_salary_amt = ref();
  const eligibleEmployees = ref();
  const loanDashboard = ref([]);
  const sa = reactive({
    ymi: "",
    ra: "",
    mxe: "",
    repdate: "",
    reason: "",
    isEligibleEmp: "",
    storeRepDate: ""
  });
  const arraySalaryDetails = ref();
  async function getSalaryDetails() {
    let url = "/getEmpsaladvDetails";
    await axios.get(url).then((res) => {
      arraySalaryDetails.value = res.data;
      console.log(arraySalaryDetails.value);
    }).finally(() => {
    });
  }
  const fetchSalaryAdvance = () => {
    canShowLoading.value = true;
    axios.get("/showEmployeeview").then((res) => {
      salaryAdvanceEmployeeData.value = res.data;
      sa.ymi = res.data.your_monthly_income;
      sa.mxe = Math.round(res.data.max_eligible_amount);
      sa.storeRepDate = res.data.Repayment_date;
      sa.isEligibleEmp = res.data.eligible;
      percent_salary_amt.value = res.data.percent_salary_amt;
    }).finally(() => {
      console.log("testings rounded off", sa.mxe);
      canShowLoading.value = false;
    });
  };
  const saveSalaryAdvance = () => {
    dailogSalaryAdvance.value = false;
    canShowLoading.value = true;
    axios.post("/EmpSaveSalaryAmt", sa).then((res) => {
      swalFunction(res.data);
      SAreset();
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  function swalFunction(val) {
    let res = val;
    if (res.status == "success") {
      Swal.fire({
        title: res.status = "success",
        text: res.message,
        icon: "success"
      }).then((res2) => {
        getSalaryDetails();
      });
    } else if (res.status == "failure") {
      Swal.fire({
        title: res.status = "failure",
        text: res.message,
        icon: "error",
        showCancelButton: false
      }).then((res2) => {
      });
    }
  }
  const dialog_NewInterestFreeLoanRequest = ref(false);
  const isInterestFreeLoanFeature = ref();
  const max_tenure_month = ref([]);
  const interestFreeLoan = reactive({
    minEligibile: "",
    availPerInCtc: "",
    deductMethod: "",
    cusDeductMethod: "",
    maxTenure: "",
    required_amount: "",
    M_EMI: "",
    Term: "",
    EMI_Start_Month: "",
    EMI_End_Month: "",
    Total_Months: "",
    Reason: "",
    max_tenure_months: "",
    details: "",
    loan_type: "InterestFreeLoan",
    loan_setting_id: ""
  });
  function getinterestfreeloan() {
    axios.post("/show-eligible-interest-free-loan-details", {
      loan_type: "InterestFreeLoan"
    }).then((res) => {
      console.log(res);
      interestFreeLoan.details = res.data;
      interestFreeLoan.loan_setting_id = res.data.loan_setting_id;
      interestFreeLoan.minEligibile = res.data.max_loan_amount;
      max_tenure_month.value = res.data.max_tenure_months;
    });
  }
  const fetchInterestfreeLoan = () => {
    canShowLoading.value = true;
    console.log("fetching SA");
    axios.post("/employee-loan-history", { loan_type: "InterestFreeLoan" }).then((res) => {
      isInterestFreeLoanFeature.value = res.data;
      console.log(res.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const saveInterestfreeLoan = () => {
    canShowLoading.value = true;
    console.log("Saving SA");
    axios.post("/apply-loan", interestFreeLoan).then((res) => {
      swalFunction(res.data);
    }).finally(() => {
      canShowLoading.value = false;
      fetchInterestfreeLoan();
    });
    dialog_NewInterestFreeLoanRequest.value = false;
  };
  const isTravelAdvanceFeatureEnabled = ref(1);
  const dialog_TravelAdvance = ref(false);
  const eligibleTravelAdvanceEmployeeData = ref();
  const ta = reactive({
    tdl: "",
    deductMethod: "",
    sumbitWithIn: "",
    isDeductedInsubsequentpayroll: "",
    ra: "",
    reason: ""
  });
  const fetchTraveladvance = () => {
    console.log("fetching SA");
    axios.get("http://localhost:3000/TravelAdvance").then((res) => {
      eligibleTravelAdvanceEmployeeData.value = res.data;
      console.log(res.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const saveTravelAdvance = () => {
    canShowLoading.value = true;
    axios.post("http://localhost:3000/TravelAdvance", ta).finally(() => {
      canShowLoading.value = false;
      fetchTraveladvance();
    });
    dialog_TravelAdvance.value = false;
  };
  const dialogInterestwithLoan = ref(false);
  const isLoanWithInterestFeature = ref(1);
  const InterestWithLoanData = ref();
  const InterestWithLoan = reactive({
    minEligibile: "",
    availPerInCtc: "",
    deductMethod: "",
    cusDeductMethod: "",
    maxTenure: "",
    required_amount: "",
    Term: "",
    Interest_rate: "",
    M_EMI: "0",
    EMI_Start_Month: "",
    EMI_End_Month: "",
    Total_Month: "",
    Reason: "",
    total_amount: "0",
    max_tenure_months: "",
    details: "",
    loan_type: "InterestWithLoan",
    loan_settings_id: ""
  });
  const getLoanDetails = () => {
    axios.post("/show-eligible-interest-free-loan-details", {
      loan_type: "InterestWithLoan"
    }).then((res) => {
      InterestWithLoan.details = res.data;
      InterestWithLoan.Interest_rate = res.data.loan_amt_interest;
      InterestWithLoan.minEligibile = res.data.max_loan_amount;
      InterestWithLoan.loan_settings_id = res.data.loan_settings_id;
      InterestWithLoan.max_tenure_months = res.data.max_tenure_months;
    });
  };
  const fetchInterstWithLoan = () => {
    console.log(InterestWithLoan);
    canShowLoading.value = true;
    axios.post("/employee-loan-history", { loan_type: "InterestWithLoan" }).then((res) => {
      InterestWithLoanData.value = res.data;
      console.log(res.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const saveInterestWithLoan = () => {
    canShowLoading.value = true;
    axios.post("/apply-loan", InterestWithLoan).then((res) => {
      swalFunction(res.data);
    }).finally(() => {
      canShowLoading.value = false;
      fetchInterstWithLoan();
    });
    dialogInterestwithLoan.value = false;
  };
  const calculateLoanDetails = (amount, interest_rate, months) => {
    const interest = amount * interest_rate / 100;
    console.log(interest);
    let finalAmount = amount + interest;
    console.log(finalAmount);
    let payment = finalAmount / months;
    console.log(payment);
    let loanDetails = {
      monthlyDue: payment.toFixed(0),
      totalDue: finalAmount
    };
    InterestWithLoan.M_EMI = loanDetails.monthlyDue;
    InterestWithLoan.total_amount = loanDetails.totalDue;
  };
  function SAreset() {
    sa.ra = "";
    sa.repdate = "";
    sa.reason = "";
  }
  async function getEligible_loan_and_advance(Eligible) {
    let eligible = Eligible;
    await axios.post("is-eligible-for-loan-and-advance", {
      eligible
    }).then((res) => {
      eligibleEmployees.value = res.data;
      console.log(eligibleEmployees.value);
    });
  }
  async function getEmployeeTotalvalue(Loan_type) {
    let loan_type = Loan_type;
    await axios.post("/employee-dashboard-loan-and-advance", {
      loan_type
    }).then((res) => {
      loanDashboard.value = res.data.data;
    });
  }
  return {
    canShowLoading,
    dailogSalaryAdvance,
    percent_salary_amt,
    salaryAdvanceEmployeeData,
    sa,
    fetchSalaryAdvance,
    saveSalaryAdvance,
    arraySalaryDetails,
    getSalaryDetails,
    SAreset,
    dialog_NewInterestFreeLoanRequest,
    isInterestFreeLoanFeature,
    interestFreeLoan,
    max_tenure_month,
    saveInterestfreeLoan,
    fetchInterestfreeLoan,
    getinterestfreeloan,
    isTravelAdvanceFeatureEnabled,
    eligibleTravelAdvanceEmployeeData,
    ta,
    dialog_TravelAdvance,
    saveTravelAdvance,
    fetchTraveladvance,
    isLoanWithInterestFeature,
    InterestWithLoan,
    dialogInterestwithLoan,
    saveInterestWithLoan,
    InterestWithLoanData,
    fetchInterstWithLoan,
    calculateLoanDetails,
    getLoanDetails,
    getEligible_loan_and_advance,
    eligibleEmployees,
    getEmployeeTotalvalue,
    loanDashboard
  };
});
const salary_advance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
  __name: "salary_advance",
  __ssrInlineRender: true,
  setup(__props) {
    const useEmpStore = useEmpSalaryAdvanceStore();
    onMounted(() => {
      useEmpStore.fetchSalaryAdvance();
      useEmpStore.getSalaryDetails();
    });
    const eligibleRequiredAmount = (value) => {
      if (value > useEmpStore.sa.mxe) {
        return false;
      } else {
        return true;
      }
    };
    const rules = computed(() => {
      return {
        ra: { required: helpers.withMessage("Required amount is required", required), eligibleRequiredAmount: helpers.withMessage("Must be lesser than max eligible amount", eligibleRequiredAmount) },
        reason: { required }
      };
    });
    const v$ = useValidate(rules, useEmpStore.sa);
    const submitForm = () => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        useEmpStore.saveSalaryAdvance();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    const position = ref("center");
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<!--[-->`);
      if (unref(useEmpStore).sa.isEligibleEmp == 1) {
        _push(`<div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4"><p class="text-xl font-medium">The company allows employees to request a salary advance of up to <strong class="text-lg">${ssrInterpolate(unref(useEmpStore).percent_salary_amt)}%</strong> of their monthly salary.</p></div><div class="float-right"><button class="btn btn-border-orange">View Report</button><button class="mx-4 btn btn-orange"><i class="mx-2 fa fa-plus" aria-hidden="true"></i>New Request</button></div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(useEmpStore).arraySalaryDetails,
          ref: "dt",
          dataKey: "id",
          paginator: true,
          rows: 10,
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                header: "Request ID",
                field: "request_id",
                style: { "min-width": "8rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "borrowed_amount",
                header: "Advance Amount",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "",
                header: "Paid On ",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "dedction_date",
                header: "Expected Return",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "sal_adv_status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(_ctx.slotProps.data.sal_adv_status)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(_ctx.slotProps.data.sal_adv_status), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  header: "Request ID",
                  field: "request_id",
                  style: { "min-width": "8rem" }
                }),
                createVNode(_component_Column, {
                  field: "borrowed_amount",
                  header: "Advance Amount",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Paid On ",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "dedction_date",
                  header: "Expected Return",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "sal_adv_status",
                  header: "Status",
                  style: { "min-width": "12rem" }
                }, {
                  default: withCtx(() => [
                    createTextVNode(toDisplayString(_ctx.slotProps.data.sal_adv_status), 1)
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div></div></div>`);
      } else {
        _push(`<div class="pb-10 mr-4 card"><img${ssrRenderAttr("src", _imports_0)} alt="" srcset="" class="w-5 p-6 m-auto"><p class="my-2 font-semibold text-center fs-3">You are not eligible to apply salary advance</p></div>`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useEmpStore).dailogSalaryAdvance,
        "onUpdate:visible": ($event) => unref(useEmpStore).dailogSalaryAdvance = $event,
        modal: "",
        position: position.value,
        style: { width: "50vw", borderTop: "5px solid #002f56", height: "100vh" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h1 class="mx-3 fs-4 text-xxl" style="${ssrRenderStyle({ "border-left": "3px solid var(--orange)", "padding-left": "10px" })}"${_scopeId}>New Salary Advance Request</h1>`);
          } else {
            return [
              createVNode("h1", {
                class: "mx-3 fs-4 text-xxl",
                style: { "border-left": "3px solid var(--orange)", "padding-left": "10px" }
              }, "New Salary Advance Request")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex gap-3 pb-2 bg-gray-100 rounded-lg shadow-md"${_scopeId}><div class="w-5 p-4"${_scopeId}><span class="font-semibold"${_scopeId}>Your Monthly Income</span><input id="rentFrom_month"${ssrRenderAttr("value", unref(useEmpStore).sa.ymi)} readonly class="my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-300"${_scopeId}></div><div class="w-5 p-4 mx-4"${_scopeId}><span class="font-semibold"${_scopeId}>Required Amount</span><input id="rentFrom_month"${ssrRenderAttr("value", unref(useEmpStore).sa.ra)} class="${ssrRenderClass([[unref(v$).ra.$error ? "border border-red-500" : ""], "my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"])}"${_scopeId}>`);
            if (unref(v$).ra.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).ra.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<p class="text-sm font-semibold text-gray-500"${_scopeId}>Max Eligible Amount : ${ssrInterpolate(unref(useEmpStore).sa.mxe)}</p></div></div><div class="gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md"${_scopeId}><span class="font-semibold"${_scopeId}>Repayment</span><p class="my-2 text-gray-600 fs-5 text-md"${_scopeId}>The advance amount will be deducted from the next month&#39;s salary `);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: unref(useEmpStore).sa.repdate,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).sa.repdate = $event,
              options: unref(useEmpStore).sa.storeRepDate,
              optionLabel: "date",
              optionValue: "date",
              placeholder: "Select a Date",
              class: "w-full md:w-14rem"
            }, null, _parent2, _scopeId));
            _push2(`</p></div><div class="gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              class: ["my-3 capitalize form-control textbox", [unref(v$).reason.$error ? "p-invalid" : ""]],
              autoResize: "",
              type: "text",
              rows: "3",
              modelValue: unref(useEmpStore).sa.reason,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).sa.reason = $event
            }, null, _parent2, _scopeId));
            if (unref(v$).reason.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).reason.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="float-right"${_scopeId}><button class="btn btn-border-orange"${_scopeId}>Cancel</button><button class="mx-4 btn btn-orange"${_scopeId}>Submit</button></div>`);
          } else {
            return [
              createVNode("div", { class: "flex gap-3 pb-2 bg-gray-100 rounded-lg shadow-md" }, [
                createVNode("div", { class: "w-5 p-4" }, [
                  createVNode("span", { class: "font-semibold" }, "Your Monthly Income"),
                  withDirectives(createVNode("input", {
                    id: "rentFrom_month",
                    "onUpdate:modelValue": ($event) => unref(useEmpStore).sa.ymi = $event,
                    readonly: "",
                    class: "my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-300"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(useEmpStore).sa.ymi]
                  ])
                ]),
                createVNode("div", { class: "w-5 p-4 mx-4" }, [
                  createVNode("span", { class: "font-semibold" }, "Required Amount"),
                  withDirectives(createVNode("input", {
                    id: "rentFrom_month",
                    "onUpdate:modelValue": ($event) => unref(useEmpStore).sa.ra = $event,
                    class: ["my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [unref(v$).ra.$error ? "border border-red-500" : ""]]
                  }, null, 10, ["onUpdate:modelValue"]), [
                    [vModelText, unref(useEmpStore).sa.ra]
                  ]),
                  unref(v$).ra.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).ra.$errors[0].$message), 1)) : createCommentVNode("", true),
                  createVNode("p", { class: "text-sm font-semibold text-gray-500" }, "Max Eligible Amount : " + toDisplayString(unref(useEmpStore).sa.mxe), 1)
                ])
              ]),
              createVNode("div", { class: "gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md" }, [
                createVNode("span", { class: "font-semibold" }, "Repayment"),
                createVNode("p", { class: "my-2 text-gray-600 fs-5 text-md" }, [
                  createTextVNode("The advance amount will be deducted from the next month's salary "),
                  createVNode(_component_Dropdown, {
                    modelValue: unref(useEmpStore).sa.repdate,
                    "onUpdate:modelValue": ($event) => unref(useEmpStore).sa.repdate = $event,
                    options: unref(useEmpStore).sa.storeRepDate,
                    optionLabel: "date",
                    optionValue: "date",
                    placeholder: "Select a Date",
                    class: "w-full md:w-14rem"
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                ])
              ]),
              createVNode("div", { class: "gap-6 p-4 my-3 bg-gray-100 rounded-lg shadow-md" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  class: ["my-3 capitalize form-control textbox", [unref(v$).reason.$error ? "p-invalid" : ""]],
                  autoResize: "",
                  type: "text",
                  rows: "3",
                  modelValue: unref(useEmpStore).sa.reason,
                  "onUpdate:modelValue": ($event) => unref(useEmpStore).sa.reason = $event
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                unref(v$).reason.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).reason.$errors[0].$message), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("button", { class: "btn btn-border-orange" }, "Cancel"),
                createVNode("button", {
                  class: "mx-4 btn btn-orange",
                  onClick: submitForm
                }, "Submit")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/salary_advance_loan/salary_advance/salary_advance.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const loan_with_interest_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "loan_with_interest",
  __ssrInlineRender: true,
  setup(__props) {
    const useEmpStore = useEmpSalaryAdvanceStore();
    ref([]);
    onMounted(() => {
      useEmpStore.fetchInterstWithLoan();
      useEmpStore.getLoanDetails();
    });
    ref();
    ref(["Off", "On"]);
    ref("center");
    function selectMonth() {
      console.log(useEmpStore.InterestWithLoan.Term);
      useEmpStore.InterestWithLoan.Total_Month = useEmpStore.InterestWithLoan.Term;
    }
    function calculateMonth() {
      function addMonthsToDate(dateString, months) {
        var dateParts = dayjs(dateString).format("MM/DD/YYYY").split("/");
        var month = parseInt(dateParts[0]) - 1;
        var day = parseInt(dateParts[1]);
        var year = parseInt(dateParts[2]);
        console.log("testing dateparts", dateParts);
        var date = new Date(year, month, day);
        date.setMonth(date.getMonth() + months);
        var formattedDate = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();
        return formattedDate;
      }
      addMonthsToDate();
      var originalDate = useEmpStore.InterestWithLoan.EMI_Start_Month;
      console.log(originalDate);
      var modifiedDate = addMonthsToDate(originalDate, useEmpStore.InterestWithLoan.Term);
      console.log(modifiedDate);
      console.log(useEmpStore.interestFreeLoan.Term);
      useEmpStore.InterestWithLoan.EMI_End_Month = dayjs(modifiedDate).format("YYYY-MM-DD");
    }
    const eligibleRequiredAmount = (value) => {
      if (value > useEmpStore.InterestWithLoan.minEligibile) {
        return false;
      } else {
        return true;
      }
    };
    const rules = computed(() => {
      return {
        required_amount: { required: helpers.withMessage("Required amount is required", required), eligibleRequiredAmount: helpers.withMessage("Must be lesser than max eligible amount", eligibleRequiredAmount) },
        Term: { required },
        EMI_Start_Month: { required },
        Reason: { required }
      };
    });
    const v$ = useValidate(rules, useEmpStore.InterestWithLoan);
    const submitForm = () => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        useEmpStore.saveInterestWithLoan();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_InputText = resolveComponent("InputText");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<!--[--><div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4"><p class="text-xl font-medium">You are eligible for the Loan with Interest as per the <span class="text-lg text-primary text-decoration-underline"> Company&#39;s Loan Policy </span></p></div><div class="float-right"><button class="btn btn-border-orange">View Report</button><button class="mx-4 btn btn-orange"><i class="mx-2 fa fa-plus" aria-hidden="true"></i> New Request </button></div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(useEmpStore).InterestWithLoanData,
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Request ID",
              field: "request_id",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Loan Amount",
              field: "borrowed_amount",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "emi_per_month",
              header: "Monthly EMI",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "tenure_months",
              header: "Tenure",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "deduction_starting_month",
              header: "EMI Start Date",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "deduction_ending_month",
              header: "EMI End Date",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "loan_status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(_ctx.slotProps.data.loan_status)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(_ctx.slotProps.data.loan_status), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Request ID",
                field: "request_id",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                header: "Loan Amount",
                field: "borrowed_amount",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "emi_per_month",
                header: "Monthly EMI",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "tenure_months",
                header: "Tenure",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "deduction_starting_month",
                header: "EMI Start Date",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "deduction_ending_month",
                header: "EMI End Date",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "loan_status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                default: withCtx(() => [
                  createTextVNode(toDisplayString(_ctx.slotProps.data.loan_status), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useEmpStore).dialogInterestwithLoan,
        "onUpdate:visible": ($event) => unref(useEmpStore).dialogInterestwithLoan = $event,
        modal: "",
        header: "Header",
        style: { width: "60vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var( --orange)", "padding-left": "10px" })}" class="fs-4"${_scopeId}>New interest With Loan Request</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  style: { "border-left": "3px solid var( --orange)", "padding-left": "10px" },
                  class: "fs-4"
                }, "New interest With Loan Request")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row p-2"${_scopeId}><div class="col-7"${_scopeId}><div class="card border-0"${_scopeId}><div class="card-body bg-gray-100"${_scopeId}><div class="row"${_scopeId}><div class="col-6" style="${ssrRenderStyle({ "margin-right": "30px" })}"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Required Amount</h1>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              modelValue: unref(useEmpStore).InterestWithLoan.required_amount,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.required_amount = $event,
              placeholder: "₹ Enter The Required Amount",
              inputId: "withoutgrouping",
              useGrouping: false,
              class: [unref(v$).required_amount.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).required_amount.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).required_amount.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<p class="fs-6 my-2" style="${ssrRenderStyle({ "color": "var(--clr-gray)" })}"${_scopeId}>Max Eligible Amount : ${ssrInterpolate(unref(useEmpStore).InterestWithLoan.minEligibile)}</p></div><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Term</h1>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: unref(useEmpStore).InterestWithLoan.Term,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Term = $event,
              options: unref(useEmpStore).InterestWithLoan.max_tenure_months,
              onChange: selectMonth,
              optionLabel: "month",
              optionValue: "month",
              placeholder: "select month",
              class: ["w-full md:w-10rem", [unref(v$).Term.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]]
            }, null, _parent2, _scopeId));
            _push2(`<label for="" class="fs-5 ml-1" style="${ssrRenderStyle({ "color": "var(--navy)" })}"${_scopeId}>Month</label><br${_scopeId}>`);
            if (unref(v$).Term.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).Term.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="row"${_scopeId}><div class="col-12 pr-5"${_scopeId}><button class="bg-danger text-light pt-2 pl-4 pr-4 pb-2 float-right rounded hover:bg-red-500 shadow-md"${_scopeId}>Calculate EMI</button></div></div></div></div></div><div class="col"${_scopeId}><div class="row"${_scopeId}><div class="col-12 pl-8 pr-8"${_scopeId}><div class="div p-2 d-flex justify-items-center align-items-center flex-column rounded bg-blue-100 shadow-md"${_scopeId}><input class="fw-bolder fs-4 text-blue-900 p-2 ml-2 d-flex justify-items-center text-center bg-blue-100" placeholder="%" style="${ssrRenderStyle({ "width": "100px" })}"${ssrRenderAttr("value", unref(useEmpStore).InterestWithLoan.Interest_rate)} disabled prefix="%"${_scopeId}><h1 class="fw-semibold mt-1 fs-5"${_scopeId}>Interest Rate</h1></div></div><div class="col pl-8 pr-8"${_scopeId}><div class="div allcenter p-2 rounded shadow-md" style="${ssrRenderStyle({ "background": "#FDCFCF" })}"${_scopeId}><div class="div d-flex justify-content-center align-items-center"${_scopeId}><h1 class="fw-bolder fs-4"${_scopeId}>₹ </h1><input class="fw-bolder fs-4 pl-2 text-center" style="${ssrRenderStyle({ "width": "100px", "background": "#FDCFCF" })}"${ssrRenderAttr("value", unref(useEmpStore).InterestWithLoan.M_EMI)} disabled${_scopeId}></div><h1 class="fw-semibold mt-2 fs-5"${_scopeId}>Monthly payment</h1></div></div><div class="col pl-8 pr-8"${_scopeId}><div class="div allcenter p-2 rounded bg-green-100 shadow-md"${_scopeId}><div class="div d-flex justify-content-center align-items-center"${_scopeId}><h1 class="fw-bolder fs-4"${_scopeId}>₹ </h1><input${ssrRenderAttr("value", unref(useEmpStore).InterestWithLoan.total_amount)} class="fw-bolder fs-4 pl-2 bg-green-100 text-center" style="${ssrRenderStyle({ "width": "100px" })}" disabled${_scopeId}></div><h1 class="fw-semibold mt-2 fs-5"${_scopeId}>Total loan amount</h1></div></div></div></div></div><div class="card bg-gray-100 bottom-0 my-4" style="${ssrRenderStyle({ "border": "none" })}"${_scopeId}><div class="card-body mx-4"${_scopeId}><div class="row"${_scopeId}><h1 class="fs-4 my-2"${_scopeId}>EMI Dedution</h1><h1 class="fs-5 text-gray-600 mb-3"${_scopeId}>The EMI Dedution Will begin from the Upcoming Payroll</h1><div class="col-4"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI Start Month</h1>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              onChange: calculateMonth,
              modelValue: unref(useEmpStore).InterestWithLoan.EMI_Start_Month,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.EMI_Start_Month = $event,
              options: unref(useEmpStore).InterestWithLoan.details.deduction_starting_month,
              optionLabel: "date",
              placeholder: "select date",
              class: ["w-full md:w-10rem", [unref(v$).EMI_Start_Month.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              optionValue: "date"
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).EMI_Start_Month.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).EMI_Start_Month.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="col-4 mx-2"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI End Month</h1>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: unref(useEmpStore).InterestWithLoan.EMI_End_Month,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.EMI_End_Month = $event,
              showIcon: ""
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-3"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>Total Months</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: unref(useEmpStore).InterestWithLoan.Total_Month,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Total_Month = $event,
              style: { "width": "150px !important" }
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              modelValue: unref(useEmpStore).InterestWithLoan.Reason,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Reason = $event,
              class: ["my-3 capitalize form-control textbox", [unref(v$).Reason.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              autoResize: "",
              type: "text",
              rows: "3"
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).Reason.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).Reason.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="float-right"${_scopeId}><button class="btn btn-border-dark border-dark px-5"${_scopeId}>Cancel</button><button class="mx-4 btn btn-orange px-5"${_scopeId}>Submit</button></div>`);
          } else {
            return [
              createVNode("div", { class: "row p-2" }, [
                createVNode("div", { class: "col-7" }, [
                  createVNode("div", { class: "card border-0" }, [
                    createVNode("div", { class: "card-body bg-gray-100" }, [
                      createVNode("div", { class: "row" }, [
                        createVNode("div", {
                          class: "col-6",
                          style: { "margin-right": "30px" }
                        }, [
                          createVNode("h1", { class: "fs-5 my-2" }, "Required Amount"),
                          createVNode(_component_InputNumber, {
                            modelValue: unref(useEmpStore).InterestWithLoan.required_amount,
                            "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.required_amount = $event,
                            placeholder: "₹ Enter The Required Amount",
                            inputId: "withoutgrouping",
                            useGrouping: false,
                            class: [unref(v$).required_amount.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                          createVNode("br"),
                          unref(v$).required_amount.$error ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "font-semibold text-red-400 fs-6"
                          }, toDisplayString(unref(v$).required_amount.$errors[0].$message), 1)) : createCommentVNode("", true),
                          createVNode("p", {
                            class: "fs-6 my-2",
                            style: { "color": "var(--clr-gray)" }
                          }, "Max Eligible Amount : " + toDisplayString(unref(useEmpStore).InterestWithLoan.minEligibile), 1)
                        ]),
                        createVNode("div", { class: "col mx-2" }, [
                          createVNode("h1", { class: "fs-5 my-2" }, "Term"),
                          createVNode(_component_Dropdown, {
                            modelValue: unref(useEmpStore).InterestWithLoan.Term,
                            "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Term = $event,
                            options: unref(useEmpStore).InterestWithLoan.max_tenure_months,
                            onChange: selectMonth,
                            optionLabel: "month",
                            optionValue: "month",
                            placeholder: "select month",
                            class: ["w-full md:w-10rem", [unref(v$).Term.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]]
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                          createVNode("label", {
                            for: "",
                            class: "fs-5 ml-1",
                            style: { "color": "var(--navy)" }
                          }, "Month"),
                          createVNode("br"),
                          unref(v$).Term.$error ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "font-semibold text-red-400 fs-6"
                          }, toDisplayString(unref(v$).Term.$errors[0].$message), 1)) : createCommentVNode("", true)
                        ])
                      ]),
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-12 pr-5" }, [
                          createVNode("button", {
                            onClick: ($event) => unref(useEmpStore).calculateLoanDetails(unref(useEmpStore).InterestWithLoan.required_amount, unref(useEmpStore).InterestWithLoan.Interest_rate, unref(useEmpStore).InterestWithLoan.Term),
                            class: "bg-danger text-light pt-2 pl-4 pr-4 pb-2 float-right rounded hover:bg-red-500 shadow-md"
                          }, "Calculate EMI", 8, ["onClick"])
                        ])
                      ])
                    ])
                  ])
                ]),
                createVNode("div", { class: "col" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-12 pl-8 pr-8" }, [
                      createVNode("div", { class: "div p-2 d-flex justify-items-center align-items-center flex-column rounded bg-blue-100 shadow-md" }, [
                        withDirectives(createVNode("input", {
                          class: "fw-bolder fs-4 text-blue-900 p-2 ml-2 d-flex justify-items-center text-center bg-blue-100",
                          placeholder: "%",
                          style: { "width": "100px" },
                          "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Interest_rate = $event,
                          disabled: "",
                          prefix: "%"
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelText, unref(useEmpStore).InterestWithLoan.Interest_rate]
                        ]),
                        createVNode("h1", { class: "fw-semibold mt-1 fs-5" }, "Interest Rate")
                      ])
                    ]),
                    createVNode("div", { class: "col pl-8 pr-8" }, [
                      createVNode("div", {
                        class: "div allcenter p-2 rounded shadow-md",
                        style: { "background": "#FDCFCF" }
                      }, [
                        createVNode("div", { class: "div d-flex justify-content-center align-items-center" }, [
                          createVNode("h1", { class: "fw-bolder fs-4" }, "₹ "),
                          withDirectives(createVNode("input", {
                            class: "fw-bolder fs-4 pl-2 text-center",
                            style: { "width": "100px", "background": "#FDCFCF" },
                            "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.M_EMI = $event,
                            disabled: ""
                          }, null, 8, ["onUpdate:modelValue"]), [
                            [vModelText, unref(useEmpStore).InterestWithLoan.M_EMI]
                          ])
                        ]),
                        createVNode("h1", { class: "fw-semibold mt-2 fs-5" }, "Monthly payment")
                      ])
                    ]),
                    createVNode("div", { class: "col pl-8 pr-8" }, [
                      createVNode("div", { class: "div allcenter p-2 rounded bg-green-100 shadow-md" }, [
                        createVNode("div", { class: "div d-flex justify-content-center align-items-center" }, [
                          createVNode("h1", { class: "fw-bolder fs-4" }, "₹ "),
                          withDirectives(createVNode("input", {
                            "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.total_amount = $event,
                            class: "fw-bolder fs-4 pl-2 bg-green-100 text-center",
                            style: { "width": "100px" },
                            disabled: ""
                          }, null, 8, ["onUpdate:modelValue"]), [
                            [vModelText, unref(useEmpStore).InterestWithLoan.total_amount]
                          ])
                        ]),
                        createVNode("h1", { class: "fw-semibold mt-2 fs-5" }, "Total loan amount")
                      ])
                    ])
                  ])
                ])
              ]),
              createVNode("div", {
                class: "card bg-gray-100 bottom-0 my-4",
                style: { "border": "none" }
              }, [
                createVNode("div", { class: "card-body mx-4" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("h1", { class: "fs-4 my-2" }, "EMI Dedution"),
                    createVNode("h1", { class: "fs-5 text-gray-600 mb-3" }, "The EMI Dedution Will begin from the Upcoming Payroll"),
                    createVNode("div", { class: "col-4" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI Start Month"),
                      createVNode(_component_Dropdown, {
                        onChange: calculateMonth,
                        modelValue: unref(useEmpStore).InterestWithLoan.EMI_Start_Month,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.EMI_Start_Month = $event,
                        options: unref(useEmpStore).InterestWithLoan.details.deduction_starting_month,
                        optionLabel: "date",
                        placeholder: "select date",
                        class: ["w-full md:w-10rem", [unref(v$).EMI_Start_Month.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                        optionValue: "date"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                      createVNode("br"),
                      unref(v$).EMI_Start_Month.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(v$).EMI_Start_Month.$errors[0].$message), 1)) : createCommentVNode("", true)
                    ]),
                    createVNode("div", { class: "col-4 mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI End Month"),
                      createVNode(_component_Calendar, {
                        modelValue: unref(useEmpStore).InterestWithLoan.EMI_End_Month,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.EMI_End_Month = $event,
                        showIcon: ""
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-3" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "Total Months"),
                      createVNode(_component_InputText, {
                        type: "text",
                        modelValue: unref(useEmpStore).InterestWithLoan.Total_Month,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Total_Month = $event,
                        style: { "width": "150px !important" }
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ])
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  modelValue: unref(useEmpStore).InterestWithLoan.Reason,
                  "onUpdate:modelValue": ($event) => unref(useEmpStore).InterestWithLoan.Reason = $event,
                  class: ["my-3 capitalize form-control textbox", [unref(v$).Reason.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                  autoResize: "",
                  type: "text",
                  rows: "3"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                createVNode("br"),
                unref(v$).Reason.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).Reason.$errors[0].$message), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("button", {
                  class: "btn btn-border-dark border-dark px-5",
                  onClick: ($event) => unref(useEmpStore).dialogInterestwithLoan = false
                }, "Cancel", 8, ["onClick"]),
                createVNode("button", {
                  class: "mx-4 btn btn-orange px-5",
                  onClick: submitForm
                }, "Submit")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/salary_advance_loan/loan_with_interest/loan_with_interest.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const interest_free_loan_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
  __name: "interest_free_loan",
  __ssrInlineRender: true,
  setup(__props) {
    const useEmpStore = useEmpSalaryAdvanceStore();
    onMounted(() => {
      useEmpStore.fetchInterestfreeLoan();
      useEmpStore.getinterestfreeloan();
    });
    ref();
    ref();
    const position = ref("center");
    function selectMonth() {
      useEmpStore.interestFreeLoan.M_EMI = Math.round(useEmpStore.interestFreeLoan.required_amount / useEmpStore.interestFreeLoan.Term);
      useEmpStore.interestFreeLoan.Total_Months = useEmpStore.interestFreeLoan.Term;
      if (useEmpStore.interestFreeLoan.EMI_Start_Month) {
        return calculateMonth();
      }
    }
    function calculateMonth() {
      function addMonthsToDate(dateString, months) {
        var dateParts = dayjs(dateString).format("MM/DD/YYYY").split("/");
        var month = parseInt(dateParts[0]) - 1;
        var day = parseInt(dateParts[1]);
        var year = parseInt(dateParts[2]);
        console.log(dateParts);
        var date = new Date(year, month, day);
        date.setMonth(date.getMonth() + months);
        var formattedDate = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();
        return formattedDate;
      }
      addMonthsToDate();
      console.log(useEmpStore.interestFreeLoan.EMI_Start_Month);
      var originalDate = useEmpStore.interestFreeLoan.EMI_Start_Month;
      var modifiedDate = addMonthsToDate(originalDate, useEmpStore.interestFreeLoan.Term);
      console.log(modifiedDate);
      console.log(useEmpStore.interestFreeLoan.Term);
      useEmpStore.interestFreeLoan.EMI_End_Month = dayjs(modifiedDate).format("YYYY-MM-DD");
    }
    ref();
    if (useEmpStore.interestFreeLoan.Term) {
      console.log("testing ::", useEmpStore.interestFreeLoan.Term);
    }
    ref();
    ref([
      { name: 1, val: 2 },
      { name: "2", code: "RM" },
      { name: "2.5", code: "LDN" },
      { name: "3", code: "IST" },
      { name: "3.5", code: "PRS" }
    ]);
    ref();
    const eligibleRequiredAmount = (value) => {
      if (value > useEmpStore.interestFreeLoan.minEligibile) {
        return false;
      } else {
        return true;
      }
    };
    const rules = computed(() => {
      return {
        required_amount: { required: helpers.withMessage("Required amount is required", required), eligibleRequiredAmount: helpers.withMessage("Must be lesser than max eligible amount", eligibleRequiredAmount) },
        Term: { required },
        EMI_Start_Month: { required },
        Reason: { required }
      };
    });
    const v$ = useValidate(rules, useEmpStore.interestFreeLoan);
    const submitForm = () => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        useEmpStore.saveInterestfreeLoan();
        useEmpStore.fetchInterestfreeLoan();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mr-4 card" }, _attrs))}><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4"><p class="text-xl font-medium">You are eligible for the Interest Free Loan as per the <span class="text-lg text-primary text-decoration-underline"> Company&#39;s Loan Policy</span></p></div><div class="float-right"><button class="btn btn-border-orange">View Report</button><button class="mx-4 btn btn-orange"><i class="mx-2 fa fa-plus" aria-hidden="true"></i> New Request </button>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useEmpStore).dialog_NewInterestFreeLoanRequest,
        "onUpdate:visible": ($event) => unref(useEmpStore).dialog_NewInterestFreeLoanRequest = $event,
        header: "Header",
        style: { width: "58vw" },
        modal: "",
        position: position.value
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var( --orange)", "padding-left": "5px" })}" class="fs-4"${_scopeId}>New Interest Free Loan Request</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  style: { "border-left": "3px solid var( --orange)", "padding-left": "5px" },
                  class: "fs-4"
                }, "New Interest Free Loan Request")
              ])
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="float-right"${_scopeId}><button class="btn btn-border-orange"${_scopeId}>Cancel</button><button class="mx-4 btn btn-orange"${_scopeId}>Submit</button></div>`);
          } else {
            return [
              createVNode("div", { class: "float-right" }, [
                createVNode("button", {
                  class: "btn btn-border-orange",
                  onClick: ($event) => unref(useEmpStore).dialog_NewInterestFreeLoanRequest = false
                }, "Cancel", 8, ["onClick"]),
                createVNode("button", {
                  class: "mx-4 btn btn-orange",
                  onClick: submitForm
                }, "Submit")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="card bg-gray-100 bottom-0 mb-10" style="${ssrRenderStyle({ "border": "none" })}"${_scopeId}><div class="card-body"${_scopeId}><div class="row mx-2"${_scopeId}><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Required Amount</h1>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              modelValue: unref(useEmpStore).interestFreeLoan.required_amount,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.required_amount = $event,
              modelModifiers: { number: true },
              placeholder: "₹ Enter The Required Amount",
              inputId: "withoutgrouping",
              useGrouping: false,
              class: [unref(v$).required_amount.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).required_amount.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).required_amount.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<p class="fs-6 my-2" style="${ssrRenderStyle({ "color": "var(--clr-gray)" })}"${_scopeId}>Max Eligible Amount : <span class="fw-semibold"${_scopeId}>${ssrInterpolate(unref(useEmpStore).interestFreeLoan.minEligibile)}</span></p></div><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Monthly EMI</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              readonly: "",
              modelValue: unref(useEmpStore).interestFreeLoan.M_EMI,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.M_EMI = $event,
              placeholder: "₹ "
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Term</h1>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: unref(useEmpStore).interestFreeLoan.Term,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.Term = $event,
              onChange: selectMonth,
              options: unref(useEmpStore).max_tenure_month,
              class: ["w-full md:w-10rem", [unref(v$).Term.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              optionValue: "month",
              optionLabel: "month",
              placeholder: "Select Month"
            }, null, _parent2, _scopeId));
            _push2(`<label for="" class="fs-5 ml-2"${_scopeId}>Month</label><br${_scopeId}>`);
            if (unref(v$).Term.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).Term.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div></div><div class="card bg-gray-100 bottom-0 my-4" style="${ssrRenderStyle({ "border": "none" })}"${_scopeId}><div class="card-body mx-4"${_scopeId}><div class="row"${_scopeId}><h1 class="fs-4 my-2"${_scopeId}>EMI Dedution</h1><h1 class="fs-5 text-gray-600 mb-3"${_scopeId}>The EMI Dedution Will begin from the Upcoming Payroll</h1><div class="col-4"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI Start Month</h1>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: unref(useEmpStore).interestFreeLoan.EMI_Start_Month,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.EMI_Start_Month = $event,
              onChange: calculateMonth,
              options: unref(useEmpStore).interestFreeLoan.details.deduction_starting_month,
              optionLabel: "date",
              optionValue: "date",
              placeholder: "Select Month",
              class: [unref(v$).EMI_Start_Month.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).EMI_Start_Month.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).EMI_Start_Month.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="col-4 mx-2"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI End Month</h1>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: unref(useEmpStore).interestFreeLoan.EMI_End_Month,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.EMI_End_Month = $event,
              readonly: "",
              style: { "width": "150px !important" }
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-3"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>Total Months</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              readonly: "",
              modelValue: unref(useEmpStore).interestFreeLoan.Total_Months,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.Total_Months = $event,
              style: { "width": "150px !important" }
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              class: ["my-3 capitalize form-control textbox", [unref(v$).Reason.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              autoResize: "",
              type: "text",
              rows: "3",
              modelValue: unref(useEmpStore).interestFreeLoan.Reason,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.Reason = $event
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).Reason.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).Reason.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", {
                class: "card bg-gray-100 bottom-0 mb-10",
                style: { "border": "none" }
              }, [
                createVNode("div", { class: "card-body" }, [
                  createVNode("div", { class: "row mx-2" }, [
                    createVNode("div", { class: "col mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2" }, "Required Amount"),
                      createVNode(_component_InputNumber, {
                        modelValue: unref(useEmpStore).interestFreeLoan.required_amount,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.required_amount = $event,
                        modelModifiers: { number: true },
                        placeholder: "₹ Enter The Required Amount",
                        inputId: "withoutgrouping",
                        useGrouping: false,
                        class: [unref(v$).required_amount.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                      createVNode("br"),
                      unref(v$).required_amount.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(v$).required_amount.$errors[0].$message), 1)) : createCommentVNode("", true),
                      createVNode("p", {
                        class: "fs-6 my-2",
                        style: { "color": "var(--clr-gray)" }
                      }, [
                        createTextVNode("Max Eligible Amount : "),
                        createVNode("span", { class: "fw-semibold" }, toDisplayString(unref(useEmpStore).interestFreeLoan.minEligibile), 1)
                      ])
                    ]),
                    createVNode("div", { class: "col mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2" }, "Monthly EMI"),
                      createVNode(_component_InputText, {
                        type: "text",
                        readonly: "",
                        modelValue: unref(useEmpStore).interestFreeLoan.M_EMI,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.M_EMI = $event,
                        placeholder: "₹ "
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2" }, "Term"),
                      createVNode(_component_Dropdown, {
                        modelValue: unref(useEmpStore).interestFreeLoan.Term,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.Term = $event,
                        onChange: selectMonth,
                        options: unref(useEmpStore).max_tenure_month,
                        class: ["w-full md:w-10rem", [unref(v$).Term.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                        optionValue: "month",
                        optionLabel: "month",
                        placeholder: "Select Month"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                      createVNode("label", {
                        for: "",
                        class: "fs-5 ml-2"
                      }, "Month"),
                      createVNode("br"),
                      unref(v$).Term.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(v$).Term.$errors[0].$message), 1)) : createCommentVNode("", true)
                    ])
                  ])
                ])
              ]),
              createVNode("div", {
                class: "card bg-gray-100 bottom-0 my-4",
                style: { "border": "none" }
              }, [
                createVNode("div", { class: "card-body mx-4" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("h1", { class: "fs-4 my-2" }, "EMI Dedution"),
                    createVNode("h1", { class: "fs-5 text-gray-600 mb-3" }, "The EMI Dedution Will begin from the Upcoming Payroll"),
                    createVNode("div", { class: "col-4" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI Start Month"),
                      createVNode(_component_Dropdown, {
                        modelValue: unref(useEmpStore).interestFreeLoan.EMI_Start_Month,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.EMI_Start_Month = $event,
                        onChange: calculateMonth,
                        options: unref(useEmpStore).interestFreeLoan.details.deduction_starting_month,
                        optionLabel: "date",
                        optionValue: "date",
                        placeholder: "Select Month",
                        class: [unref(v$).EMI_Start_Month.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                      createVNode("br"),
                      unref(v$).EMI_Start_Month.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(v$).EMI_Start_Month.$errors[0].$message), 1)) : createCommentVNode("", true)
                    ]),
                    createVNode("div", { class: "col-4 mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI End Month"),
                      createVNode(_component_Calendar, {
                        modelValue: unref(useEmpStore).interestFreeLoan.EMI_End_Month,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.EMI_End_Month = $event,
                        readonly: "",
                        style: { "width": "150px !important" }
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-3" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "Total Months"),
                      createVNode(_component_InputText, {
                        type: "text",
                        readonly: "",
                        modelValue: unref(useEmpStore).interestFreeLoan.Total_Months,
                        "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.Total_Months = $event,
                        style: { "width": "150px !important" }
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ])
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  class: ["my-3 capitalize form-control textbox", [unref(v$).Reason.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                  autoResize: "",
                  type: "text",
                  rows: "3",
                  modelValue: unref(useEmpStore).interestFreeLoan.Reason,
                  "onUpdate:modelValue": ($event) => unref(useEmpStore).interestFreeLoan.Reason = $event
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                createVNode("br"),
                unref(v$).Reason.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).Reason.$errors[0].$message), 1)) : createCommentVNode("", true)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        value: unref(useEmpStore).isInterestFreeLoanFeature,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Request ID",
              field: "request_id",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "borrowed_amount",
              header: "Loan Amount",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "emi_per_month",
              header: "Monthly EMI",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "tenure_months",
              header: "Tenure",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "deduction_starting_month",
              header: "EMI Start Date",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "deduction_ending_month",
              header: "EMI End Date",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "loan_status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(_ctx.slotProps.data.loan_status)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(_ctx.slotProps.data.loan_status), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Request ID",
                field: "request_id",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "borrowed_amount",
                header: "Loan Amount",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "emi_per_month",
                header: "Monthly EMI",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "tenure_months",
                header: "Tenure",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "deduction_starting_month",
                header: "EMI Start Date",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "deduction_ending_month",
                header: "EMI End Date",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "loan_status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                default: withCtx(() => [
                  createTextVNode(toDisplayString(_ctx.slotProps.data.loan_status), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/salary_advance_loan/interest_free_loan/interest_free_loan.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const travel_advance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "travel_advance",
  __ssrInlineRender: true,
  setup(__props) {
    const useEmpStore = useEmpSalaryAdvanceStore();
    onMounted(() => {
      useEmpStore.fetchTraveladvance();
    });
    ref();
    ref(["Off", "On"]);
    ref("center");
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[--><div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4"><p class="text-xl font-medium">You are eligible for Travel Advance as per the <span class="text-lg text-primary text-decoration-underline">Company&#39;s Loan Policy</span></p></div><div class="float-right"><button class="btn btn-border-orange">View Report</button><button class="mx-4 btn btn-orange"><i class="mx-2 fa fa-plus" aria-hidden="true"></i>New Request</button></div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        value: _ctx.sample,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Request ID",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Advance Amount",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "ref",
              header: "Paid On ",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "max_limit",
              header: "Expected Return",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Request ID",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Advance Amount",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "ref",
                header: "Paid On ",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "max_limit",
                header: "Expected Return",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useEmpStore).dialog_TravelAdvance,
        "onUpdate:visible": ($event) => unref(useEmpStore).dialog_TravelAdvance = $event,
        modal: "",
        style: { width: "50vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var( --orange)", "padding-left": "10px" })}" class="fs-4"${_scopeId}>New Travel Advance Request</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  style: { "border-left": "3px solid var( --orange)", "padding-left": "10px" },
                  class: "fs-4"
                }, "New Travel Advance Request")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex pb-2 bg-gray-100 rounded-lg gap-7"${_scopeId}><div class="w-5 p-4 mx-4"${_scopeId}><span class="font-semibold"${_scopeId}>Required Amount</span><input id="rentFrom_month"${ssrRenderAttr("value", unref(useEmpStore).ta.ra)} class="my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${_scopeId}><p class="text-sm font-semibold text-gray-500"${_scopeId}>Max Eligible Amount : 20,000</p></div></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Repayment</span><p class="my-2 fs-5 text-gray-600 text-md"${_scopeId}>The deadline to submit the bills is on salary <strong class="fs-5 text-black"${_scopeId}>12/07/2023</strong></p></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              modelValue: unref(useEmpStore).ta.reason,
              "onUpdate:modelValue": ($event) => unref(useEmpStore).ta.reason = $event,
              class: "my-3 capitalize form-control textbox",
              autoResize: "",
              type: "text",
              rows: "3"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="float-right"${_scopeId}><button class="btn btn-border-orange"${_scopeId}>Cancel</button><button class="mx-4 btn btn-orange"${_scopeId}>Submit</button></div>`);
          } else {
            return [
              createVNode("div", { class: "flex pb-2 bg-gray-100 rounded-lg gap-7" }, [
                createVNode("div", { class: "w-5 p-4 mx-4" }, [
                  createVNode("span", { class: "font-semibold" }, "Required Amount"),
                  withDirectives(createVNode("input", {
                    id: "rentFrom_month",
                    "onUpdate:modelValue": ($event) => unref(useEmpStore).ta.ra = $event,
                    class: "my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(useEmpStore).ta.ra]
                  ]),
                  createVNode("p", { class: "text-sm font-semibold text-gray-500" }, "Max Eligible Amount : 20,000")
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Repayment"),
                createVNode("p", { class: "my-2 fs-5 text-gray-600 text-md" }, [
                  createTextVNode("The deadline to submit the bills is on salary "),
                  createVNode("strong", { class: "fs-5 text-black" }, "12/07/2023")
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  modelValue: unref(useEmpStore).ta.reason,
                  "onUpdate:modelValue": ($event) => unref(useEmpStore).ta.reason = $event,
                  class: "my-3 capitalize form-control textbox",
                  autoResize: "",
                  type: "text",
                  rows: "3"
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("button", {
                  class: "btn btn-border-orange",
                  onClick: ($event) => unref(useEmpStore).dialog_TravelAdvance = false
                }, "Cancel", 8, ["onClick"]),
                createVNode("button", {
                  class: "mx-4 btn btn-orange",
                  onClick: unref(useEmpStore).saveTravelAdvance
                }, "Submit", 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useEmpStore).canShowLoading,
        "onUpdate:visible": ($event) => unref(useEmpStore).canShowLoading = $event,
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
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/salary_advance_loan/travel_advance/travel_advance.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "employee_salary_loan",
  __ssrInlineRender: true,
  setup(__props) {
    const useEmpStore = useEmpSalaryAdvanceStore();
    const activetab = ref(1);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(useEmpStore).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white w-[100%] h-[100%]" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div><div class="p-4 pt-1 pb-0 mb-3 bg-white rounded-lg tw-card left-line"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-2 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? "active" : ""], "nav-link"])}"> Salary Advance </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Interest Free Loan </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 3 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Travel Advance </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 4 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Loan With Interest </a></li></ul></div><div class="tab-content" id="">`);
      if (activetab.value === 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 3) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 4) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/salary_advance_loan/employee_salary_loan.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
const pinia = createPinia();
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.use(pinia);
app.directive("tooltip", Tooltip);
app.directive("badge", BadgeDirective);
app.directive("ripple", Ripple);
app.directive("styleclass", StyleClass);
app.directive("focustrap", FocusTrap);
app.component("Button", Button);
app.component("RadioButton", RadioButton);
app.component("DataTable", DataTable);
app.component("Column", Column);
app.component("ColumnGroup", ColumnGroup);
app.component("Row", Row);
app.component("Toast", Toast);
app.component("ConfirmDialog", ConfirmDialog);
app.component("Dropdown", Dropdown);
app.component("InputText", InputText);
app.component("Dialog", Dialog);
app.component("ProgressSpinner", ProgressSpinner);
app.component("Calendar", Calendar);
app.component("Textarea", Textarea);
app.component("Chips", Chips);
app.component("MultiSelect", MultiSelect);
app.component("InputNumber", InputNumber);
app.component("SelectButton", SelectButton);
app.component("Checkbox", Checkbox);
app.mount("#EmpSalaryAdvanceLoan");
