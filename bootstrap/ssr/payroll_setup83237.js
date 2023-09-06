/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, reactive, onMounted, resolveComponent, mergeProps, unref, withCtx, createVNode, useSSRContext, createTextVNode, resolveDirective, toDisplayString, openBlock, createBlock, createCommentVNode, withDirectives, vModelRadio, vModelCheckbox, vModelText, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
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
import InputNumber from "primevue/inputnumber";
import "primevue/fileupload";
import Calendar from "primevue/calendar";
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import Steps from "primevue/steps";
import InputSwitch from "primevue/inputswitch";
import { useRouter, useRoute, createRouter, createWebHistory } from "vue-router";
import { p as payroll_setting } from "./payroll_setting832372.js";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderComponent, ssrIncludeBooleanAttr, ssrLooseEqual, ssrInterpolate, ssrGetDirectiveProps, ssrRenderList, ssrRenderAttr, ssrRenderClass } from "vue/server-renderer";
import axios$1 from "axios";
import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";
import dayjs from "dayjs";
import { FilterMatchMode } from "primevue/api";
import { s as salaryAdvanceSettingMainStore } from "./salaryAdvanceSettingMainStore83237.js";
import { _ as _export_sfc } from "./_plugin-vue_export-helper83237.js";
const usePayrollHelper = defineStore("usePayrollHelper", () => {
  const payFrequencyDropdown = ref([
    { id: "1", name: "Monthly" },
    { id: "2", name: "Weekly" },
    { id: "3", name: "Daily" }
  ]);
  const getLastDayOfMonth = (month, year) => {
    console.log(year, month + 1);
    const nextMonth = new Date(year, month + 1, 1);
    const lastDay = new Date(nextMonth.getTime() - 24 * 60 * 60 * 1e3);
    console.log(lastDay.getDate());
    return lastDay.getDate();
  };
  const componentTypes = ref([
    { id: 1, name: "Fixed", value: 1 },
    { id: 2, name: "Variable", value: 2 }
  ]);
  const componentCategories = ref([
    { id: "1", name: "earnings" },
    { id: "2", name: "deduction" },
    { id: "3", name: "adhoc" },
    { id: "4", name: "reimbursement" }
  ]);
  const calculationTypes = ref([
    { id: 1, name: "Flat Amount", value: 1 },
    { id: 2, name: "Percentage of CTC", value: 2 }
  ]);
  const findCompType = (value) => {
    let type = componentTypes.value.find((ele) => {
      return ele.value == value;
    });
    return type.name;
  };
  const findCalType = (value) => {
    let type = calculationTypes.value.find((ele) => {
      return ele.value == value;
    });
    return type.name;
  };
  const findIsSelected = (value) => {
    if (value == 1) {
      return "Yes";
    } else {
      return "No";
    }
  };
  const filterSource = (data, key) => {
    let filteredSource = data.filter((ele) => {
      return ele.category_id == key;
    });
    return filteredSource;
  };
  const dropdownFilter = ref();
  const selectedFilterOptions = reactive({
    department_id: "",
    designation: "",
    work_location: "",
    state: "",
    client_name: ""
  });
  const eligbleEmployeeSource = ref();
  const getDropdownFilterDetails = async () => {
    let url = "/getAllDropdownFilter";
    await axios.get(url).then((res) => {
      dropdownFilter.value = res.data;
    }).finally(() => {
    });
  };
  const getSelectoption = (key, filter) => {
    console.log(filter);
    if (key == "department") {
      console.log(filter);
      selectedFilterOptions.department_id = filter;
      console.log(selectedFilterOptions);
    } else if (key == "designation") {
      selectedFilterOptions.designation = filter;
      console.log(selectedFilterOptions);
    } else if (key == "state") {
      selectedFilterOptions.state = filter;
      console.log(selectedFilterOptions);
    } else if (key == "work_location") {
      selectedFilterOptions.work_location = filter;
      console.log(selectedFilterOptions);
    } else if (key == "client_name") {
      selectedFilterOptions.client_name = filter;
      console.log(selectedFilterOptions);
    } else {
      console.log("nope");
    }
    let url = "/showAssignEmp";
    axios.post(url, selectedFilterOptions).then((res) => {
      eligbleEmployeeSource.value = res.data;
      console.log(res.data);
    });
  };
  return {
    payFrequencyDropdown,
    getLastDayOfMonth,
    componentTypes,
    calculationTypes,
    componentCategories,
    findCompType,
    findCalType,
    findIsSelected,
    filterSource,
    dropdownFilter,
    getDropdownFilterDetails,
    getSelectoption
  };
});
const usePayrollMainStore = defineStore("usePayrollMainStore", () => {
  const helper = usePayrollHelper();
  const confirm = useConfirm();
  const toast = useToast();
  const canShowLoading = ref(false);
  const activeTab = ref(1);
  const generalPayrollSettings = ref({});
  const getCurrentGeneralPayrollSettings = () => {
  };
  const saveGeneralPayrollSettings = (data) => {
    console.log(data);
    axios$1.post("/save-genral-payroll-settings", data);
  };
  const addNewEpf = ref({});
  const saveNewEpf = (data) => {
    console.log(data);
    axios$1.post("/Paygroup/CreatePayrollEpf", data);
  };
  const addNewEsi = ref({});
  const saveNewEsi = (data) => {
    console.log(data);
    axios$1.post("/Paygroup/CreatePayrollEsi", data);
  };
  const dailogNewSalaryComponents = ref(false);
  const salaryComponentsUpdated = ref(false);
  const adhocComponentsUpdated = ref(false);
  const salaryComponents = reactive({
    typeOfComp: null,
    id: null,
    name: null,
    nameInPayslip: null,
    typeOfCalc: null,
    amount: null,
    percentage: null,
    status: null,
    isPartOfEmpSalStructure: 0,
    isTaxable: 0,
    isCalcShowProBasis: 0,
    isShowInPayslip: 0,
    isConsiderForEPF: 0,
    isConsiderForESI: 0,
    category_id: 1
  });
  const adhocComponents = ref({
    category_id: 3,
    category_type: "allowance"
  });
  const deductionComponents = ref({
    category_id: 2,
    category_type: "deduction"
  });
  const reimbursementComponents = ref({
    category_id: 4,
    category_type: "reimbursement"
  });
  const salaryComponentsSource = ref();
  const getSalaryComponents = async () => {
    canShowLoading.value = true;
    let salaryComponentUrl = `/Paygroup/fetchPayRollComponents`;
    await axios$1.get(salaryComponentUrl).then((res) => {
      salaryComponentsSource.value = res.data;
      console.log(helper.filterSource(res.data, 3));
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const saveNewSalaryComponent = (key) => {
    dailogNewSalaryComponents.value = false;
    canShowLoading.value = true;
    let adhocUrl = "/Paygroup/AddAdhocAllowDetectComp";
    let reimbursmenturl = "/Paygroup/AddReimbursementComponents";
    var form_data = new FormData();
    if (key == 1) {
      if (salaryComponentsUpdated.value) {
        axios$1.post("/Paygroup/UpdatePayRollEarningsComponents", salaryComponents).finally(() => {
          restChars();
          canShowLoading.value = false;
          getSalaryComponents();
        });
      } else {
        axios$1.post("/Paygroup/CreatePayRollComponents", salaryComponents).finally(() => {
          restChars();
          canShowLoading.value = false;
          getSalaryComponents();
        });
      }
    } else if (key == 3) {
      for (var key in adhocComponents.value) {
        form_data.append(key, adhocComponents.value[key]);
      }
      if (adhocComponentsUpdated.value) {
        axios$1.post("/Paygroup/UpdateAdhocAllowDetectComp", form_data).finally(() => {
          restChars();
          canShowLoading.value = false;
          getSalaryComponents();
        });
      } else {
        axios$1.post(adhocUrl, form_data).finally(() => {
          restChars();
          canShowLoading.value = false;
          getSalaryComponents();
        });
      }
    } else if (key == 2) {
      for (var key in deductionComponents.value) {
        form_data.append(key, deductionComponents.value[key]);
      }
      if (adhocComponentsUpdated.value) {
        axios$1.post("/Paygroup/UpdateAdhocAllowDetectComp", form_data).finally(() => {
          restChars();
          canShowLoading.value = false;
          getSalaryComponents();
        });
      } else {
        axios$1.post(adhocUrl, form_data).finally(() => {
          restChars();
          canShowLoading.value = false;
          getSalaryComponents();
        });
      }
    } else if (key == 4) {
      for (var key in reimbursementComponents.value) {
        form_data.append(key, reimbursementComponents.value[key]);
      }
      axios$1.post(reimbursmenturl, form_data).finally(() => {
        restChars();
        canShowLoading.value = false;
        getSalaryComponents();
      });
    } else {
      console.log("No More options");
    }
    console.log(form_data);
  };
  const editNewSalaryComponent = (boolean, data) => {
    console.log(data);
    dailogNewSalaryComponents.value = true;
    salaryComponentsUpdated.value = boolean;
    salaryComponents.name = data.comp_name, salaryComponents.id = data.id, salaryComponents.typeOfComp = data.comp_type_id, salaryComponents.nameInPayslip = data.comp_name_payslip, salaryComponents.typeOfCalc = parseInt(data.calculation_method_id), salaryComponents.amount = data.flat_amount, salaryComponents.status = data.status, salaryComponents.isPartOfEmpSalStructure = data.is_part_of_empsal_structure, salaryComponents.isTaxable = data.is_taxable, salaryComponents.isCalcShowProBasis = data.calculate_on_prorate_basis, salaryComponents.isShowInPayslip = data.can_show_inpayslip, salaryComponents.isConsiderForEPF = data.epf, salaryComponents.isConsiderForESI = data.esi;
  };
  const editAdhocSalaryComponents = (currentRowData, key, boolean) => {
    console.log(currentRowData);
    if (key == 2) {
      adhocComponentsUpdated.value = true;
      let type = { category_type: "deduction" };
      deductionComponents.value = { ...type, ...currentRowData };
    } else if (key == 3) {
      adhocComponentsUpdated.value = true;
      let type = { category_type: "allowance" };
      adhocComponents.value = { ...type, ...currentRowData };
    } else if (key == 4) {
      adhocComponentsUpdated.value = true;
      reimbursementComponents.value = { ...currentRowData };
    } else {
      console.log("No More options");
    }
  };
  const deleteSalaryComponent = (recordID) => {
    confirm.require({
      message: "Do you want to delete this record?",
      header: "Delete Confirmation",
      icon: "pi pi-info-circle",
      acceptClass: "p-button-danger",
      accept: () => {
        canShowLoading.value = true;
        axios$1.post("/Paygroup/DeletePayRollComponents", {
          comp_id: recordID
        }).finally(() => {
          toast.add({
            severity: "error",
            summary: "Deleted",
            detail: "Salary Component Deleted",
            life: 3e3
          });
          canShowLoading.value = false;
          getSalaryComponents();
        });
      },
      reject: () => {
      }
    });
  };
  const accountingCodeSource = ref();
  const accountingCode = ref({});
  const getAccountingSoftware = () => {
    let accountingSoftwareUrl = `/Paygroup/fetchPayrollAppIntegrations`;
    axios$1.get(accountingSoftwareUrl).then((res) => {
      accountingCodeSource.value = res.data.data;
      console.log(res.data.data);
    });
  };
  const saveAccountingCode = (data) => {
    console.log(data);
    axios$1.post("/Paygroup/addPayrollAppIntegrations", data);
  };
  const enableAccountingSoftware = (data, checked) => {
    console.log(data, checked);
  };
  const dailogNewSalaryStructure = ref(false);
  const salaryStructure = reactive({
    structureName: null,
    description: null,
    pf: 0,
    esi: 0,
    tds: 0,
    fbp: 0,
    selectedComponents: null,
    assignedEmployees: null
  });
  const salaryStructureSource = ref();
  ref();
  const getsalaryStructure = async () => {
    let salaryyStructureUrl = `/Paygroup/fetchPayGroupEmpComponents`;
    await axios$1.get(salaryyStructureUrl).then((res) => {
      salaryStructureSource.value = Object.values(res.data);
    });
  };
  const addsalaryComponents = (selectedData) => {
    console.log(selectedData);
    salaryStructureSource.value = selectedData;
  };
  const saveNewsalaryStructure = () => {
    console.log(salaryStructure);
    axios$1.post("/Paygroup/addPaygroupCompStructure", salaryStructure);
  };
  const restChars = () => {
    salaryComponents.typeOfComp = null, salaryComponents.name = null, salaryComponents.nameInPayslip = null, salaryComponents.typeOfCalc = null, salaryComponents.amount = null, salaryComponents.status = null, salaryComponents.isPartOfEmpSalStructure = null, salaryComponents.isTaxable = null, salaryComponents.isCalcShowProBasis = null, salaryComponents.isShowInPayslip = null, salaryComponents.isConsiderForEPF = null, salaryComponents.isConsiderForESI = null;
  };
  return {
    canShowLoading,
    activeTab,
    generalPayrollSettings,
    getCurrentGeneralPayrollSettings,
    saveGeneralPayrollSettings,
    addNewEpf,
    saveNewEpf,
    addNewEsi,
    saveNewEsi,
    dailogNewSalaryComponents,
    salaryComponents,
    salaryComponentsSource,
    getSalaryComponents,
    saveNewSalaryComponent,
    editNewSalaryComponent,
    deleteSalaryComponent,
    adhocComponents,
    deductionComponents,
    reimbursementComponents,
    editAdhocSalaryComponents,
    getAccountingSoftware,
    saveAccountingCode,
    accountingCode,
    accountingCodeSource,
    enableAccountingSoftware,
    dailogNewSalaryStructure,
    salaryStructure,
    salaryStructureSource,
    getsalaryStructure,
    saveNewsalaryStructure,
    addsalaryComponents
  };
});
const general_payroll_setting_vue_vue_type_style_index_0_lang = "";
const _sfc_main$k = {
  __name: "general_payroll_setting",
  __ssrInlineRender: true,
  setup(__props) {
    const uesPayroll = usePayrollMainStore();
    usePayrollHelper();
    ref(true);
    ref();
    const active = ref(1);
    const active2 = ref(1);
    ref(false);
    ref(false);
    ref([]);
    const products = ref([
      {
        product: "Bamboo Watch",
        lastYearSale: 51,
        thisYearSale: 40,
        lastYearProfit: 54406,
        thisYearProfit: 43342
      },
      {
        product: "Black Watch",
        lastYearSale: 83,
        thisYearSale: 9,
        lastYearProfit: 423132,
        thisYearProfit: 312122
      },
      {
        product: "Blue Band",
        lastYearSale: 38,
        thisYearSale: 5,
        lastYearProfit: 12321,
        thisYearProfit: 8500
      }
    ]);
    onMounted(() => {
      uesPayroll.generalPayrollSettings.payperiod_start_month ? dayjs(uesPayroll.generalPayrollSettings.payperiod_start_month).format("MMM") : uesPayroll.generalPayrollSettings.payperiod_start_month;
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Checkbox = resolveComponent("Checkbox");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><div class="flex justify-between pt-4 mx-6"><p class="">Payroll and attendance end date settings</p><div><i class="pi pi-pencil" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i></div></div><div class="grid grid-cols-12 gap-6 mx-6"><div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1"><div class="my-1"><h5 class="my-2 text-sm font-semibold">Pay Frequency</h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-11",
        placeholder: "Monthly",
        modelValue: unref(uesPayroll).generalPayrollSettings.pay_frequency,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.pay_frequency = $event
      }, null, _parent));
      _push(`</div></div></div><div class="my-4"><h5 class="my-2 text-sm font-semibold"> When would you like to start using the ABShrms payroll? </h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-11",
        placeholder: "November 2023",
        modelValue: unref(uesPayroll).generalPayrollSettings.payperiod_start_month,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.payperiod_start_month = $event
      }, null, _parent));
      _push(`</div></div></div><div class="my-4"><h5 class="my-2 text-sm font-semibold"> On which date did the pay peroid end in november ? </h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-11",
        placeholder: "Text Placeholder",
        modelValue: unref(uesPayroll).generalPayrollSettings.payperiod_end_date,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.payperiod_end_date = $event
      }, null, _parent));
      _push(`</div></div></div><div class="my-4"><h5 class="my-2 text-sm font-semibold"> The payment date for the peroid of nov 1st to nov 30th is </h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-11",
        placeholder: "December 01",
        modelValue: unref(uesPayroll).generalPayrollSettings.payment_date,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.payment_date = $event
      }, null, _parent));
      _push(`</div></div></div></div><div class="col-span-8 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">`);
      if (active.value == 2) {
        _push(`<div class="p-2 bg-orange-100 rounded mt-2"> This change is of most importance and has a widespread impact on the salaries of all employees. We strongly advise you to reach out to the support team for further clarification. </div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<h6 class="my-2 font-extralight"> The finalized payroll peroid is <strong>JAN 1 - JAN 31</strong></h6><div class="mb-6 mt-4 w-full">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: products.value,
        style: { "background-color": "none" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Feb"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Mar"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearProfit",
              header: "Apr"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: ""
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Feb"
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Mar"
              }),
              createVNode(_component_Column, {
                field: "thisYearProfit",
                header: "Apr"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="mx-4"><p>Please Note that for month of February, the number of pay days will be adjusted to 28 days unstead of the standard 30 0r 31 days ,As a result salary for employees will be calculated using the formula SALARY * 28/28</p></div></div></div><div class="grid grid-cols-12 gap-6 mx-6"><div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1"><div class="my-4"><h6 class="my-2 text-sm font-semibold"> Select the attendance cut-off peroid in a month </h6><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        class: "w-full h-11",
        placeholder: "select",
        modelValue: unref(uesPayroll).generalPayrollSettings.att_cutoff_period_id,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.att_cutoff_period_id = $event
      }, null, _parent));
      _push(`</div></div></div><div class="p-4 my-2 bg-gray-100 rounded-lg border-1 shadow-sm"><div class="my-4"><h6 class="my-2 fs-14 font-semibold text-black-alpha-70"> Select the attendance cut-off peroid in a month </h6><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        class: "w-full h-11",
        placeholder: "select",
        modelValue: unref(uesPayroll).generalPayrollSettings.att_cutoff_period_id,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.att_cutoff_period_id = $event
      }, null, _parent));
      _push(`</div></div></div><div class="my-4"><div class="flex gap-3 w-100 d-flex justify-content-between align-items-center"><div class="w-70"><h5 class="my-2 fs-13 font-semibold" style="${ssrRenderStyle({ "line-height": "16px" })}"> Do you want to consider new joinee post attendance cut off date ? </h5></div><div class="w-30 d-flex justify-content-center align-items-center"><div class="mx-2 d-flex justify-content-between align-items-center"><input style="${ssrRenderStyle({ "height": "18px", "width": "18px" })}" class="form-check-input" type="radio" name="" id="" value=""${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.post_attendance_cutoff_date, "")) ? " checked" : ""}><label class="ml-2 font-bold form-check-label leave_type fs-13" for="">Yes</label></div><div class="d-flex justify-content-between align-items-center"><input style="${ssrRenderStyle({ "height": "18px", "width": "18px" })}" class="form-check-input" type="radio" name="" id="" value=""${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.post_attendance_cutoff_date, "")) ? " checked" : ""}><label class="ml-2 font-bold form-check-label leave_type fs-13" for="">No</label></div></div></div></div></div><div class="my-4"><div class="flex justify-center items-center"><div class=""><input type="checkbox" name="" class="form-check-input mr-3" id="" style="${ssrRenderStyle({ "width": "16px", "height": "20px" })}">`);
      _push(ssrRenderComponent(_component_Checkbox, {
        class: "mx-2",
        binary: true
      }, null, _parent));
      _push(`</div><div class="text-sm"> The employee&#39;s attendance cut-off date differs from their pay peroid end date <span class="text-blue-400 underline">what is Attendance cut-off date?</span></div></div></div></div><div class="col-span-8 p-4 my-4 border-gray-400 rounded-lg shadow-md border-1">`);
      if (active2.value == 2) {
        _push(`<div class="bg-orange-100 p-2 rounded"><i class="fa fa-exclamation-triangle ml-2 mb-3" style="${ssrRenderStyle({ "width": "25px" })}" aria-hidden="true"></i> The edit option has been disabled. Please contact the ABShrms Support Team for assistance. </div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<h1 class="mt-4 font-extralight"> The finalized payroll peroid is <strong>26th - 25th</strong></h1><div class="mb-6 mt-4 w-full">`);
      _push(ssrRenderComponent(_component_DataTable, { value: products.value }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Feb "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Mar"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearProfit",
              header: "Apr"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: ""
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Feb "
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Mar"
              }),
              createVNode(_component_Column, {
                field: "thisYearProfit",
                header: "Apr"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div><div class="mx-6"><p>Pay Peroid Calculation</p></div><div class="grid grid-cols-12 gap-6 mx-6 my-4"><div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1"><div class="my-4"><h5 class="my-2 text-sm font-semibold">Pay days in month</h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-11",
        placeholder: "Actual days in a month ",
        modelValue: unref(uesPayroll).generalPayrollSettings.paydays_in_month,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.paydays_in_month = $event
      }, null, _parent));
      _push(`</div></div></div><div class="my-4"><h5 class="my-2 text-sm font-semibold">Pay days in month</h5><div class="flex gap-8 my-3 justify-between"><div class="my-2"><p>Include Week Off&#39;s</p></div><div class="flex"><div class="mx-4"><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="" id="" value="1"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.include_weekoffs, "1")) ? " checked" : ""}><label class="ml-2 font-bold form-check-label leave_type mx-2" for="">Yes</label></div><div><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="" id="" value="0"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.include_weekoffs, "0")) ? " checked" : ""}><label class="ml-2 font-bold form-check-label leave_type" for="">No</label></div></div></div><div class="flex gap-8 justify-between"><div class=""><p>Include Holiday&#39;s</p></div><div class="flex"><div class="mx-4"><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="" id="" value=""${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.include_holidays, "")) ? " checked" : ""}><label class="ml-2 font-bold form-check-label leave_type" for="">Yes</label></div><div><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="" id="" value=""${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.include_holidays, "")) ? " checked" : ""}><label class="ml-2 font-bold form-check-label leave_type" for="">No</label></div></div></div></div></div><div class="col-span-8 p-4 my-4 leading-8"><div class="my-6"><p style="${ssrRenderStyle({ "line-height": "25px" })}"><strong class="mr-2">NOTE :</strong> Please note that calculating the number of days for a given pay period can significantly impact salary deductions for loss of pay due to leave or other reasons. For instance, consider the example of an employee whose monthly salary is INR 30,000 and who takes one day of leave without pay. </p><p style="${ssrRenderStyle({ "line-height": "25px" })}">If we calculate loss of pay based on a 30-day month, the deduction would be INR 30,000/30 = INR 1000. </p><p style="${ssrRenderStyle({ "line-height": "25px" })}"> However, if we exclude weekends from the calculation, assuming 8 Saturdays and Sundays in the month, the effective number of working days would be 30-8 = 22 days. In this case, the deduction for one day of loss of pay would be INR 30,000/22 = INR 1364. </p></div></div></div><div class="mx-6"><p>Currency and Compensation</p></div><div class="grid grid-cols-12 gap-6 mx-6"><div class="col-span-4 p-4 my-4 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1"><div class="my-4"><h5 class="my-2 text-sm font-semibold">Currency</h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-11",
        placeholder: "Indian Rupee (₹)",
        modelValue: unref(uesPayroll).generalPayrollSettings.currency_type,
        "onUpdate:modelValue": ($event) => unref(uesPayroll).generalPayrollSettings.currency_type = $event
      }, null, _parent));
      _push(`</div></div></div><div class="d-flex flex-column justify-evenly"><h5 class="text-sm font-semibold w-7">Description</h5><div class="flex gap-6 my-3"><div class="flex"><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="" id="" value="1"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.remuneration_type, "1")) ? " checked" : ""}><label class="ml-2 text-sm font-semibold from-check-label leave_type" for="">Monthly</label></div><div class=""><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="" id="" value="0"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(uesPayroll).generalPayrollSettings.remuneration_type, "0")) ? " checked" : ""}><label class="ml-2 text-sm font-semibold form-check-label leave_type" for="">Daliy</label></div></div></div></div><div class="col-span-8 p-4 my-4"><div class="my-2"><strong>EXPLANATION :</strong><p class="my-2 text-gray-600"><strong class="mr-2 text-black-70">Monthly :</strong>Monthly remuneration refers to the compensation paid to an employee in exchange for their services, which is calculated and defined on a monthly basis. This compensation serves as a form of payment for the employee&#39;s work performed throughout the month. </p><p class="my-3 text-gray-600"><strong class="mr-2 text-black-70">Daily :</strong>Daily remuneration refers to the compensation paid to an employee for their services, which is calculated on a per-day basis. It is the amount that an employee is entitled to receive for each day of work performed as per the agreed terms of their employment contract. </p></div></div></div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$k = _sfc_main$k.setup;
_sfc_main$k.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/general_payroll_setting/general_payroll_setting.vue");
  return _sfc_setup$k ? _sfc_setup$k(props, ctx) : void 0;
};
const _sfc_main$j = {
  __name: "add_new_employee_provident_fund",
  __ssrInlineRender: true,
  setup(__props) {
    const checked = ref();
    const CanShowExplanationDialog = ref(false);
    const position = ref("center");
    const products = ref([
      {
        product: "Bamboo Watch",
        lastYearSale: 51,
        thisYearSale: 40,
        lastYearProfit: 54406,
        thisYearProfit: 43342
      },
      {
        product: "Black Watch",
        lastYearSale: 83,
        thisYearSale: 9,
        lastYearProfit: 423132,
        thisYearProfit: 312122
      },
      {
        product: "Blue Band",
        lastYearSale: 38,
        thisYearSale: 5,
        lastYearProfit: 12321,
        thisYearProfit: 8500
      }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputSwitch = resolveComponent("InputSwitch");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Strong = resolveComponent("Strong");
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<!--[--><div class="w-full"><div class="row"><div class="col-6 d-flex px-4"><p>EPF Details</p><button><i class="pi pi-pencil"></i></button></div><div class="col"><div class="d-flex w-full justify-end align-items-center"><label for="" class="mx-2 text-gray-500">Disable EPF</label>`);
      _push(ssrRenderComponent(_component_InputSwitch, {
        class: "mx-2",
        modelValue: checked.value,
        "onUpdate:modelValue": ($event) => checked.value = $event
      }, null, _parent));
      _push(`<h1 class="mx-2">Enable EPF</h1></div></div></div><div class="grid grid-cols-12 gap-6 mx-1"><div class="col-span-5 grid grid-cols-12 gap-4 p-4 my-1 bg-gray-100 rounded-lg shadow-md border-1"><div class="col-span-6"><div class="my-1"><h5 class="my-2 text-sm font-semibold">EPF Number</h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, { class: "w-full h-10" }, null, _parent));
      _push(`</div></div></div><div class="my-4"><h5 class="my-2 text-sm font-semibold"> Deduction Cycle </h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_InputText, { class: "w-full h-10" }, null, _parent));
      _push(`</div></div></div></div><div class="col-span-6"><input type="checkbox" class="m" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}" name="" id=""><label for="" class="text-gray-600 fs-6">Is Default</label><p class="text-gray-600 w-full mt-1 text-xs"> (Note: Once employees are onboarded they will be automatically enrolled in this PF scheme. Any modifications to the enrolement can only be made before the start of payroll processing ) </p></div></div><div class="col-span-7 p-4 my-4 rounded-lg shadow-md border-1"><div class="mx-2 my-4 d-flex align-center"><input type="checkbox" name="" id="" class="mr-4" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}"><label for="" class="fs-6 text-gray-600">Employer&#39;s Contribution is included in the CTC.</label></div><div class="mx-2 my-4"><input type="checkbox" name="" id="" class="mr-4" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}"><label for="" class="text-gray-600">Employer&#39;s EDLI Contribution is included in the CTC.</label></div><div class="mx-2 my-4"><input type="checkbox" name="" id="" class="mr-4" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}"><label for="" class="text-gray-600">Admin Charges is included in the CTC.</label></div><div class="mx-2 my-4"><input type="checkbox" name="" id="" class="mr-4" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}"><label for="" class="text-gray-600">Override PF Contribution rate at employee level</label></div></div></div><div class="mt-3"><p class="fs-5 fw-semibold">Employee/Employeer Contribution</p><p class="text-gray-600">Note: The Contribution made by both employers and employees will remain the same</p></div><div class="grid grid-cols-12 gap-6"><div class="col-span-5"><div class="p-4 my-4 bg-gray-100 rounded-lg shadow-md border-1"><div class="my-4"><h5 class="my-2 text-lg font-semibold"> Select the Rule </h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_Dropdown, { class: "w-20rem" }, null, _parent));
      _push(`</div></div></div><div class="my-4"><h5 class="my-2 text-lg font-semibold"> Select the Contribution Tye </h5><div class="flex gap-8 justify-evenly"><div class="w-full">`);
      _push(ssrRenderComponent(_component_Dropdown, { class: "w-20rem" }, null, _parent));
      _push(`</div></div></div></div><div class="p-4 bg-gray-100 rounded-lg shadow-md border-1"><div class="my-4 d-flex align-items-center"><input type="checkbox" name="" id="" class="mr-4" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}"><label for="" class="text-gray-500"> Pro-rate restricted PF Wage When LOP Applied </label></div><div class="my-4 d-flex align-items-center"><input type="checkbox" name="" id="" class="mr-4" style="${ssrRenderStyle({ "width": "18px", "height": "20px" })}"><label for="" class="text-gray-500"> Consider all applicable salary components if PF Wage is less tham 15,000 after loss of pay </label></div></div></div><div class="col-span-7 p-4 my-4 rounded-lg shadow-md border-1"><h1 class="my-2 text-xl font-bold"> Example </h1><p class="text-gray-600">Let&#39;s assume the Gross Wages = <strong>50,000</strong> and HRA=<strong>4000</strong> ,then the breakup of contribution will be:</p><div class="my-6 w-full">`);
      _push(ssrRenderComponent(_component_DataTable, { value: products.value }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: "Code"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Category"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearProfit",
              header: "Quantity"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: "Code"
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Category"
              }),
              createVNode(_component_Column, {
                field: "thisYearProfit",
                header: "Quantity"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="border-gray-300"><p class="text-gray-600"><strong>Note:</strong>This Condition Works</p><p class="text-gray-500">if</p><p class="text-gray-600"><strong>Gross(<span class="text-red-500">-</span>)HRA </strong> is Greater than <strong>15,000</strong> ,then PF deduction will be 15,000(<span class="text-red-500"> *</span>) 12%</p><p class="text-gray-500">Else</p><p class="text-gray-600"><strong>Gross( <span class="text-red-500">-</span>)HRA </strong> is Lesser than <strong>15,000</strong> ,and PF deduction will be <strong>Gross</strong>(<span class="text-red-500">-</span> )HRA(<span class="text-red-500">*</span> ) 12%</p></div></div></div><div><div class="d-flex"><i class="pi pi-user-plus fs-4 mx-2 text-primary"></i><p class="text-primary fw-semibold fs-5">Assign Employees</p></div></div><div><p class="fs-5">`);
      _push(ssrRenderComponent(_component_Strong, { class: "mx-1 fs-5" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`40`);
          } else {
            return [
              createTextVNode("40")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(` Employees Assigned <button class="text-primary fs-6 fs-8">View/Edit</button></p></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: CanShowExplanationDialog.value,
        "onUpdate:visible": ($event) => CanShowExplanationDialog.value = $event,
        header: "Header",
        style: { width: "50vw" },
        position: position.value,
        modal: true,
        draggable: false
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class=""${_scopeId}></button><button class=""${_scopeId}></button>`);
          } else {
            return [
              createVNode("button", { class: "" }),
              createVNode("button", { class: "" })
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p${_scopeId}>The attendance cut off date deadline for processing an employee&#39;s within a pay period.After this date,any absence by the employee will not affect their</p>`);
            _push2(ssrRenderComponent(_component_DataTable, { value: products.value }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "product",
                    header: "Code"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "lastYearSale",
                    header: "Name"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "thisYearSale",
                    header: "Category"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "thisYearProfit",
                    header: "Quantity"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "product",
                      header: "Code"
                    }),
                    createVNode(_component_Column, {
                      field: "lastYearSale",
                      header: "Name"
                    }),
                    createVNode(_component_Column, {
                      field: "thisYearSale",
                      header: "Category"
                    }),
                    createVNode(_component_Column, {
                      field: "thisYearProfit",
                      header: "Quantity"
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode("p", null, "The attendance cut off date deadline for processing an employee's within a pay period.After this date,any absence by the employee will not affect their"),
              createVNode(_component_DataTable, { value: products.value }, {
                default: withCtx(() => [
                  createVNode(_component_Column, {
                    field: "product",
                    header: "Code"
                  }),
                  createVNode(_component_Column, {
                    field: "lastYearSale",
                    header: "Name"
                  }),
                  createVNode(_component_Column, {
                    field: "thisYearSale",
                    header: "Category"
                  }),
                  createVNode(_component_Column, {
                    field: "thisYearProfit",
                    header: "Quantity"
                  })
                ]),
                _: 1
              }, 8, ["value"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$j = _sfc_main$j.setup;
_sfc_main$j.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/pf_esi_setting/employees_provident_fund/add_new_employee_provident_fund/add_new_employee_provident_fund.vue");
  return _sfc_setup$j ? _sfc_setup$j(props, ctx) : void 0;
};
const _sfc_main$i = {
  __name: "employees_provident_fund",
  __ssrInlineRender: true,
  setup(__props) {
    ref([
      { product: "Bamboo Watch", lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
      { product: "Black Watch", lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
      { product: "Blue Band", lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
      { product: "Blue T-Shirt", lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 },
      { product: "Brown Purse", lastYearSale: 17, thisYearSale: 79, lastYearProfit: 643242, thisYearProfit: 500332 },
      { product: "Chakra Bracelet", lastYearSale: 52, thisYearSale: 65, lastYearProfit: 421132, thisYearProfit: 150005 },
      { product: "Galaxy Earrings", lastYearSale: 82, thisYearSale: 12, lastYearProfit: 131211, thisYearProfit: 100214 },
      { product: "Game Controller", lastYearSale: 44, thisYearSale: 45, lastYearProfit: 66442, thisYearProfit: 53322 },
      { product: "Gaming Set", lastYearSale: 90, thisYearSale: 56, lastYearProfit: 765442, thisYearProfit: 296232 },
      { product: "Gold Phone Case", lastYearSale: 75, thisYearSale: 54, lastYearProfit: 21212, thisYearProfit: 12533 }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      _push(ssrRenderComponent(_sfc_main$j, _attrs, null, _parent));
    };
  }
};
const _sfc_setup$i = _sfc_main$i.setup;
_sfc_main$i.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/pf_esi_setting/employees_provident_fund/employees_provident_fund.vue");
  return _sfc_setup$i ? _sfc_setup$i(props, ctx) : void 0;
};
const _sfc_main$h = {
  __name: "employees_state_insurance",
  __ssrInlineRender: true,
  setup(__props) {
    const products = ref([
      { product: "Bamboo Watch", lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
      { product: "Black Watch", lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
      { product: "Blue Band", lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
      { product: "Blue T-Shirt", lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 },
      { product: "Brown Purse", lastYearSale: 17, thisYearSale: 79, lastYearProfit: 643242, thisYearProfit: 500332 },
      { product: "Chakra Bracelet", lastYearSale: 52, thisYearSale: 65, lastYearProfit: 421132, thisYearProfit: 150005 },
      { product: "Galaxy Earrings", lastYearSale: 82, thisYearSale: 12, lastYearProfit: 131211, thisYearProfit: 100214 },
      { product: "Game Controller", lastYearSale: 44, thisYearSale: 45, lastYearProfit: 66442, thisYearProfit: 53322 },
      { product: "Gaming Set", lastYearSale: 90, thisYearSale: 56, lastYearProfit: 765442, thisYearProfit: 296232 },
      { product: "Gold Phone Case", lastYearSale: 75, thisYearSale: 54, lastYearProfit: 21212, thisYearProfit: 12533 }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="flex justify-between mx-5 my-4"><div></div><div><button class="btn btn-orange">Add new</button></div></div><div id="table">`);
      _push(ssrRenderComponent(_component_DataTable, { value: products.value }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: "Code"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Category"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearProfit",
              header: "Quantity"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: "Code"
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Category"
              }),
              createVNode(_component_Column, {
                field: "thisYearProfit",
                header: "Quantity"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$h = _sfc_main$h.setup;
_sfc_main$h.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/pf_esi_setting/employees_state_insurance/employees_state_insurance.vue");
  return _sfc_setup$h ? _sfc_setup$h(props, ctx) : void 0;
};
const _sfc_main$g = {
  __name: "abry_scheme",
  __ssrInlineRender: true,
  setup(__props) {
    const products = ref([
      { product: "Bamboo Watch", lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
      { product: "Black Watch", lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
      { product: "Blue Band", lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
      { product: "Blue T-Shirt", lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 },
      { product: "Brown Purse", lastYearSale: 17, thisYearSale: 79, lastYearProfit: 643242, thisYearProfit: 500332 },
      { product: "Chakra Bracelet", lastYearSale: 52, thisYearSale: 65, lastYearProfit: 421132, thisYearProfit: 150005 },
      { product: "Galaxy Earrings", lastYearSale: 82, thisYearSale: 12, lastYearProfit: 131211, thisYearProfit: 100214 },
      { product: "Game Controller", lastYearSale: 44, thisYearSale: 45, lastYearProfit: 66442, thisYearProfit: 53322 },
      { product: "Gaming Set", lastYearSale: 90, thisYearSale: 56, lastYearProfit: 765442, thisYearProfit: 296232 },
      { product: "Gold Phone Case", lastYearSale: 75, thisYearSale: 54, lastYearProfit: 21212, thisYearProfit: 12533 }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="flex justify-between"><div><p>Employee Assigned to <strong>Aatmanirbhar Bharat Yojana(ABRY)</strong>Scheme</p><div class="p-2 my-3 bg-red-100 rounded-lg"><p class="text-blue">click here to know more about ABRY Scheme</p></div></div><div><button class="mx-4 btn btn-border-orange">Cancel</button><button class="btn btn-orange">Add new</button></div></div><div id="table">`);
      _push(ssrRenderComponent(_component_DataTable, { value: products.value }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: "Code"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Category"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearProfit",
              header: "Quantity"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: "Code"
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Category"
              }),
              createVNode(_component_Column, {
                field: "thisYearProfit",
                header: "Quantity"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$g = _sfc_main$g.setup;
_sfc_main$g.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/pf_esi_setting/abry_scheme/abry_scheme.vue");
  return _sfc_setup$g ? _sfc_setup$g(props, ctx) : void 0;
};
const _sfc_main$f = {
  __name: "pmrpy_scheme",
  __ssrInlineRender: true,
  setup(__props) {
    const products = ref([
      { product: "Bamboo Watch", lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
      { product: "Black Watch", lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
      { product: "Blue Band", lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
      { product: "Blue T-Shirt", lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 },
      { product: "Brown Purse", lastYearSale: 17, thisYearSale: 79, lastYearProfit: 643242, thisYearProfit: 500332 },
      { product: "Chakra Bracelet", lastYearSale: 52, thisYearSale: 65, lastYearProfit: 421132, thisYearProfit: 150005 },
      { product: "Galaxy Earrings", lastYearSale: 82, thisYearSale: 12, lastYearProfit: 131211, thisYearProfit: 100214 },
      { product: "Game Controller", lastYearSale: 44, thisYearSale: 45, lastYearProfit: 66442, thisYearProfit: 53322 },
      { product: "Gaming Set", lastYearSale: 90, thisYearSale: 56, lastYearProfit: 765442, thisYearProfit: 296232 },
      { product: "Gold Phone Case", lastYearSale: 75, thisYearSale: 54, lastYearProfit: 21212, thisYearProfit: 12533 }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="flex justify-between"><div><p>Employee Assigned to <strong>Pradhan Matri Rojgar Protsahan Yojana(PMRPY)</strong>Scheme</p><div class="p-2 my-3 bg-red-100 rounded-lg"><p class="text-blue">click here to know more about PMRPY Scheme</p></div></div><div><button class="mx-4 btn btn-border-orange">Cancel</button><button class="btn btn-orange">Add new</button></div></div><div id="table">`);
      _push(ssrRenderComponent(_component_DataTable, { value: products.value }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: "Code"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Category"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearProfit",
              header: "Quantity"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: "Code"
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Category"
              }),
              createVNode(_component_Column, {
                field: "thisYearProfit",
                header: "Quantity"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$f = _sfc_main$f.setup;
_sfc_main$f.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/pf_esi_setting/pmrpy_scheme/pmrpy_scheme.vue");
  return _sfc_setup$f ? _sfc_setup$f(props, ctx) : void 0;
};
const _sfc_main$e = {
  __name: "pf_esi_setting",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_router_view = resolveComponent("router-view");
      _push(`<!--[--><div class="mb-1 left-line"><div class="card"><div class="card-body"><ul class="my-4 nav nav-pills nav-tabs-dashed" role="tablist"><li class="nav-item text-muted" role="presentation"><button class="pb-2 nav-link active" id="pills-offer-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-pending" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Employee&#39;s Provident Fund</button></li><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-completed" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Employee&#39;s State Insurance</button></li><li class="nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-resent-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-resent" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">ABRY Scheme</button></li><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-resen-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-resen" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">PMRPY Scheme</button></li></ul><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade show active" id="pills-offer-pending" role="tabpanel" aria-labelledby="pills-offer-pending-tab"><div class="card-body"><div class="offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$i, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade active" id="pills-offer-completed" role="tabpanel" aria-labelledby="pills-offer-completed-tab"><div class="card-body"><div class="my-4 offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$h, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-resent" role="tabpanel" aria-labelledby="pills-offer-resent-tab"><div class="card-body"><div class="offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$g, null, null, _parent));
      _push(`</div></div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div><div class="tab-pane fade" id="pills-offer-resen" role="tabpanel" aria-labelledby="pills-offer-resen-tab"><div class="card-body"><div class="offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$f, null, null, _parent));
      _push(`</div></div></div></div></div></div></div>`);
      _push(ssrRenderComponent(_component_router_view, null, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$e = _sfc_main$e.setup;
_sfc_main$e.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/pf_esi_setting/pf_esi_setting.vue");
  return _sfc_setup$e ? _sfc_setup$e(props, ctx) : void 0;
};
const earings_vue_vue_type_style_index_0_lang = "";
const _sfc_main$d = {
  __name: "earings",
  __ssrInlineRender: true,
  setup(__props) {
    const usePayroll = usePayrollMainStore();
    const helper = usePayrollHelper();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_ColumnGroup = resolveComponent("ColumnGroup");
      const _component_Row = resolveComponent("Row");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputText = resolveComponent("InputText");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><section id="header" class="flex justify-between w-full my-4"><p class="mx-1 font-semibold text-lg">Salary Compenents</p><div><button class="btn btn-orange mx-5 whitespace-nowrap">Add Components</button></div></section><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(helper).filterSource(unref(usePayroll).salaryComponentsSource, 1),
        rows: unref(helper).filterSource(unref(usePayroll).salaryComponentsSource, 1).length,
        rowsPerPageOptions: [5, 10, 25]
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_ColumnGroup, { type: "header" }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Row, null, {
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "Name",
                          rowspan: 3,
                          style: { "min-width": "15rem" }
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "Type",
                          rowspan: 3,
                          style: { "min-width": "8rem" }
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "Type of calculation",
                          rowspan: 3,
                          style: { "min-width": "18rem" }
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "Consider for",
                          colspan: 2,
                          style: { "min-width": "12rem" }
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "Status",
                          rowspan: 3,
                          style: { "min-width": "12rem" }
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "Action",
                          rowspan: 3,
                          style: { "min-width": "12rem" }
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Column, {
                            header: "Name",
                            rowspan: 3,
                            style: { "min-width": "15rem" }
                          }),
                          createVNode(_component_Column, {
                            header: "Type",
                            rowspan: 3,
                            style: { "min-width": "8rem" }
                          }),
                          createVNode(_component_Column, {
                            header: "Type of calculation",
                            rowspan: 3,
                            style: { "min-width": "18rem" }
                          }),
                          createVNode(_component_Column, {
                            header: "Consider for",
                            colspan: 2,
                            style: { "min-width": "12rem" }
                          }),
                          createVNode(_component_Column, {
                            header: "Status",
                            rowspan: 3,
                            style: { "min-width": "12rem" }
                          }),
                          createVNode(_component_Column, {
                            header: "Action",
                            rowspan: 3,
                            style: { "min-width": "12rem" }
                          })
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Row, null, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Row, null, {
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "EPF",
                          rowspan: 3
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          header: "ESI",
                          rowspan: 3
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Column, {
                            header: "EPF",
                            rowspan: 3
                          }),
                          createVNode(_component_Column, {
                            header: "ESI",
                            rowspan: 3
                          })
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Row, null, {
                      default: withCtx(() => [
                        createVNode(_component_Column, {
                          header: "Name",
                          rowspan: 3,
                          style: { "min-width": "15rem" }
                        }),
                        createVNode(_component_Column, {
                          header: "Type",
                          rowspan: 3,
                          style: { "min-width": "8rem" }
                        }),
                        createVNode(_component_Column, {
                          header: "Type of calculation",
                          rowspan: 3,
                          style: { "min-width": "18rem" }
                        }),
                        createVNode(_component_Column, {
                          header: "Consider for",
                          colspan: 2,
                          style: { "min-width": "12rem" }
                        }),
                        createVNode(_component_Column, {
                          header: "Status",
                          rowspan: 3,
                          style: { "min-width": "12rem" }
                        }),
                        createVNode(_component_Column, {
                          header: "Action",
                          rowspan: 3,
                          style: { "min-width": "12rem" }
                        })
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Row),
                    createVNode(_component_Row, null, {
                      default: withCtx(() => [
                        createVNode(_component_Column, {
                          header: "EPF",
                          rowspan: 3
                        }),
                        createVNode(_component_Column, {
                          header: "ESI",
                          rowspan: 3
                        })
                      ]),
                      _: 1
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "comp_name",
              style: { "text-align": "left !important" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { field: "comp_type_id" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p${_scopeId2}>${ssrInterpolate(unref(helper).findCompType(data.comp_type_id))}</p>`);
                } else {
                  return [
                    createVNode("p", null, toDisplayString(unref(helper).findCompType(data.comp_type_id)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { field: "calculation_method" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (data.calculation_method_id == 1) {
                    _push3(`<p${_scopeId2}>${ssrInterpolate(data.flat_amount)}</p>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (data.calculation_method_id == 2) {
                    _push3(`<p${_scopeId2}>${ssrInterpolate(data.percentage)}</p>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    data.calculation_method_id == 1 ? (openBlock(), createBlock("p", { key: 0 }, toDisplayString(data.flat_amount), 1)) : createCommentVNode("", true),
                    data.calculation_method_id == 2 ? (openBlock(), createBlock("p", { key: 1 }, toDisplayString(data.percentage), 1)) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { field: "epf" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p${_scopeId2}>${ssrInterpolate(unref(helper).findIsSelected(data.epf))}</p>`);
                } else {
                  return [
                    createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.epf)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { field: "esi" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p${_scopeId2}>${ssrInterpolate(unref(helper).findIsSelected(data.esi))}</p>`);
                } else {
                  return [
                    createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.esi)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { field: "status" }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.status) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Enabled</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Disabled</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.status ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Enabled")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Disabled")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, null, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (data.is_default == 1) {
                    _push3(`<button${ssrRenderAttrs(mergeProps({ class: "p-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "fixed variable", void 0, { bottom: true })))}${_scopeId2}><i class="pi pi-lock" style="${ssrRenderStyle({ "font-size": "1.5rem" })}"${_scopeId2}></i></button>`);
                  } else {
                    _push3(`<div${_scopeId2}><button class="p-1 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-6 px-auto text-center"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-1 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-6 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button></div>`);
                  }
                } else {
                  return [
                    data.is_default == 1 ? withDirectives((openBlock(), createBlock("button", {
                      key: 0,
                      class: "p-2"
                    }, [
                      createVNode("i", {
                        class: "pi pi-lock",
                        style: { "font-size": "1.5rem" }
                      })
                    ])), [
                      [
                        _directive_tooltip,
                        "fixed variable",
                        void 0,
                        { bottom: true }
                      ]
                    ]) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("button", {
                        class: "p-1 mx-4 bg-green-200 border-green-500 rounded-xl",
                        onClick: ($event) => unref(usePayroll).editNewSalaryComponent(true, data)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-8 h-6 px-auto text-center"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                          })
                        ]))
                      ], 8, ["onClick"]),
                      createVNode("button", {
                        class: "p-1 bg-red-200 border-red-500 rounded-xl",
                        onClick: ($event) => unref(usePayroll).deleteSalaryComponent(data.id)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-8 h-6 font-bold"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                          })
                        ]))
                      ], 8, ["onClick"])
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_ColumnGroup, { type: "header" }, {
                default: withCtx(() => [
                  createVNode(_component_Row, null, {
                    default: withCtx(() => [
                      createVNode(_component_Column, {
                        header: "Name",
                        rowspan: 3,
                        style: { "min-width": "15rem" }
                      }),
                      createVNode(_component_Column, {
                        header: "Type",
                        rowspan: 3,
                        style: { "min-width": "8rem" }
                      }),
                      createVNode(_component_Column, {
                        header: "Type of calculation",
                        rowspan: 3,
                        style: { "min-width": "18rem" }
                      }),
                      createVNode(_component_Column, {
                        header: "Consider for",
                        colspan: 2,
                        style: { "min-width": "12rem" }
                      }),
                      createVNode(_component_Column, {
                        header: "Status",
                        rowspan: 3,
                        style: { "min-width": "12rem" }
                      }),
                      createVNode(_component_Column, {
                        header: "Action",
                        rowspan: 3,
                        style: { "min-width": "12rem" }
                      })
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Row),
                  createVNode(_component_Row, null, {
                    default: withCtx(() => [
                      createVNode(_component_Column, {
                        header: "EPF",
                        rowspan: 3
                      }),
                      createVNode(_component_Column, {
                        header: "ESI",
                        rowspan: 3
                      })
                    ]),
                    _: 1
                  })
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "comp_name",
                style: { "text-align": "left !important" }
              }),
              createVNode(_component_Column, { field: "comp_type_id" }, {
                body: withCtx(({ data }) => [
                  createVNode("p", null, toDisplayString(unref(helper).findCompType(data.comp_type_id)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { field: "calculation_method" }, {
                body: withCtx(({ data }) => [
                  data.calculation_method_id == 1 ? (openBlock(), createBlock("p", { key: 0 }, toDisplayString(data.flat_amount), 1)) : createCommentVNode("", true),
                  data.calculation_method_id == 2 ? (openBlock(), createBlock("p", { key: 1 }, toDisplayString(data.percentage), 1)) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { field: "epf" }, {
                body: withCtx(({ data }) => [
                  createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.epf)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { field: "esi" }, {
                body: withCtx(({ data }) => [
                  createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.esi)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { field: "status" }, {
                body: withCtx((slotProps) => [
                  slotProps.data.status ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Enabled")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Disabled")
                  ]))
                ]),
                _: 1
              }),
              createVNode(_component_Column, null, {
                body: withCtx(({ data }) => [
                  data.is_default == 1 ? withDirectives((openBlock(), createBlock("button", {
                    key: 0,
                    class: "p-2"
                  }, [
                    createVNode("i", {
                      class: "pi pi-lock",
                      style: { "font-size": "1.5rem" }
                    })
                  ])), [
                    [
                      _directive_tooltip,
                      "fixed variable",
                      void 0,
                      { bottom: true }
                    ]
                  ]) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("button", {
                      class: "p-1 mx-4 bg-green-200 border-green-500 rounded-xl",
                      onClick: ($event) => unref(usePayroll).editNewSalaryComponent(true, data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-8 h-6 px-auto text-center"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                        })
                      ]))
                    ], 8, ["onClick"]),
                    createVNode("button", {
                      class: "p-1 bg-red-200 border-red-500 rounded-xl",
                      onClick: ($event) => unref(usePayroll).deleteSalaryComponent(data.id)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-8 h-6 font-bold"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        })
                      ]))
                    ], 8, ["onClick"])
                  ]))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(usePayroll).dailogNewSalaryComponents,
        "onUpdate:visible": ($event) => unref(usePayroll).dailogNewSalaryComponents = $event,
        modal: true,
        closable: true,
        style: { width: "80vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Add New Components</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Add New Components")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 mt-4" style="${ssrRenderStyle({ "display": "grid" })}"${_scopeId}><div class="px-4"${_scopeId}><div class=""${_scopeId}><label for="metro_city" class="block mb-2 text-gray-700 font-semibold fs-6"${_scopeId}>Type of the component</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              options: unref(helper).componentTypes,
              editable: "",
              class: "w-full",
              optionLabel: "name",
              optionValue: "value",
              placeholder: "Select component",
              modelValue: unref(usePayroll).salaryComponents.typeOfComp,
              "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.typeOfComp = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-3"${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Name of the component</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              class: "w-full",
              placeholder: "Enter name of the component ",
              modelValue: unref(usePayroll).salaryComponents.name,
              "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.name = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Name of the component(In Payslip)</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              class: "w-full",
              placeholder: "Enter name of the component",
              modelValue: unref(usePayroll).salaryComponents.nameInPayslip,
              "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.nameInPayslip = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-3"${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Type of calculation</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              editable: "",
              class: "w-full",
              options: unref(helper).calculationTypes,
              optionLabel: "name",
              optionValue: "value",
              placeholder: "Select calculation type",
              modelValue: unref(usePayroll).salaryComponents.typeOfCalc,
              "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.typeOfCalc = $event
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
            if (unref(usePayroll).salaryComponents.typeOfCalc == 1) {
              _push2(`<div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Enter the amount</label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                class: "w-full",
                placeholder: "Enter the amount",
                modelValue: unref(usePayroll).salaryComponents.amount,
                "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.amount = $event
              }, null, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(usePayroll).salaryComponents.typeOfCalc == 2) {
              _push2(`<div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Enter the percentage</label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                class: "w-full",
                placeholder: "Enter the amount",
                modelValue: unref(usePayroll).salaryComponents.percentage,
                "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.percentage = $event
              }, null, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div${_scopeId}><div class="border-1 rounded-lg p-2"${_scopeId}><div class="mx-2 my-3"${_scopeId}><span${_scopeId}>Status</span><div class="form-check form-check-inline mx-8"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="status" id="full_day" value="1"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.status, "1")) ? " checked" : ""}${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Enable</label></div><div class="form-check form-check-inline"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="status" id="full_day" value="0"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.status, "0")) ? " checked" : ""}${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Disable</label></div></div><div class="flex my-5"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isPartOfEmpSalStructure, 1)) ? " checked" : ""} type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${_scopeId}><p class="mx-3"${_scopeId}>Make this earning a part of the employee&#39;s salary structure</p></div><div class="flex my-5"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isTaxable, 1)) ? " checked" : ""} type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${_scopeId}><p class="mx-3"${_scopeId}>This salary component is taxable</p></div><div class="flex my-5"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isCalcShowProBasis, 1)) ? " checked" : ""} type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${_scopeId}><p class="mx-3"${_scopeId}>Calculate on pro-rate basis</p></div><div class="flex my-5"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isShowInPayslip, 1)) ? " checked" : ""} type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${_scopeId}><p class="mx-3"${_scopeId}>Show the component in payslip</p></div><div class="my-5 mx-2"${_scopeId}><span class="w-8"${_scopeId}>Considered for EPF</span><div class="form-check form-check-inline mx-8"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isConsiderForEPF, "1")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="epf" id="full_day" value="1"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Yes</label></div><div class="form-check form-check-inline"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isConsiderForEPF, "0")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="epf" id="full_day" value="0"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>No</label></div></div><div class="my-5 mx-2"${_scopeId}><span${_scopeId}>Considered for ESI</span><div class="form-check form-check-inline mx-8"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isConsiderForESI, "1")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="1"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Yes</label></div><div class="form-check form-check-inline"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryComponents.isConsiderForESI, "0")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="0"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>No</label></div></div></div></div></div><div class="float-right"${_scopeId}><div class="flex"${_scopeId}><button class="btn btn-orange-outline"${_scopeId}>Cancel</button><button class="btn btn-orange mx-2"${_scopeId}>Save</button></div></div>`);
          } else {
            return [
              createVNode("div", {
                class: "grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 mt-4",
                style: { "display": "grid" }
              }, [
                createVNode("div", { class: "px-4" }, [
                  createVNode("div", { class: "" }, [
                    createVNode("label", {
                      for: "metro_city",
                      class: "block mb-2 text-gray-700 font-semibold fs-6"
                    }, "Type of the component"),
                    createVNode(_component_Dropdown, {
                      options: unref(helper).componentTypes,
                      editable: "",
                      class: "w-full",
                      optionLabel: "name",
                      optionValue: "value",
                      placeholder: "Select component",
                      modelValue: unref(usePayroll).salaryComponents.typeOfComp,
                      "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.typeOfComp = $event
                    }, null, 8, ["options", "modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "my-3" }, [
                    createVNode("label", {
                      for: "metro_city",
                      class: "block mb-2 font-semibold fs-6 text-gray-700"
                    }, "Name of the component"),
                    createVNode(_component_InputText, {
                      class: "w-full",
                      placeholder: "Enter name of the component ",
                      modelValue: unref(usePayroll).salaryComponents.name,
                      "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.name = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "" }, [
                    createVNode("label", {
                      for: "metro_city",
                      class: "block mb-2 font-semibold fs-6 text-gray-700"
                    }, "Name of the component(In Payslip)"),
                    createVNode(_component_InputText, {
                      class: "w-full",
                      placeholder: "Enter name of the component",
                      modelValue: unref(usePayroll).salaryComponents.nameInPayslip,
                      "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.nameInPayslip = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "my-3" }, [
                    createVNode("label", {
                      for: "metro_city",
                      class: "block mb-2 font-semibold fs-6 text-gray-700"
                    }, "Type of calculation"),
                    createVNode(_component_Dropdown, {
                      editable: "",
                      class: "w-full",
                      options: unref(helper).calculationTypes,
                      optionLabel: "name",
                      optionValue: "value",
                      placeholder: "Select calculation type",
                      modelValue: unref(usePayroll).salaryComponents.typeOfCalc,
                      "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.typeOfCalc = $event
                    }, null, 8, ["options", "modelValue", "onUpdate:modelValue"])
                  ]),
                  unref(usePayroll).salaryComponents.typeOfCalc == 1 ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: ""
                  }, [
                    createVNode("label", {
                      for: "metro_city",
                      class: "block mb-2 font-semibold fs-6 text-gray-700"
                    }, "Enter the amount"),
                    createVNode(_component_InputText, {
                      class: "w-full",
                      placeholder: "Enter the amount",
                      modelValue: unref(usePayroll).salaryComponents.amount,
                      "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.amount = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ])) : createCommentVNode("", true),
                  unref(usePayroll).salaryComponents.typeOfCalc == 2 ? (openBlock(), createBlock("div", {
                    key: 1,
                    class: ""
                  }, [
                    createVNode("label", {
                      for: "metro_city",
                      class: "block mb-2 font-semibold fs-6 text-gray-700"
                    }, "Enter the percentage"),
                    createVNode(_component_InputText, {
                      class: "w-full",
                      placeholder: "Enter the amount",
                      modelValue: unref(usePayroll).salaryComponents.percentage,
                      "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.percentage = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ])) : createCommentVNode("", true)
                ]),
                createVNode("div", null, [
                  createVNode("div", { class: "border-1 rounded-lg p-2" }, [
                    createVNode("div", { class: "mx-2 my-3" }, [
                      createVNode("span", null, "Status"),
                      createVNode("div", { class: "form-check form-check-inline mx-8" }, [
                        withDirectives(createVNode("input", {
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "status",
                          id: "full_day",
                          value: "1",
                          "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.status = $event
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelRadio, unref(usePayroll).salaryComponents.status]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "Enable")
                      ]),
                      createVNode("div", { class: "form-check form-check-inline" }, [
                        withDirectives(createVNode("input", {
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "status",
                          "true-value": 1,
                          "false-value": 0,
                          id: "full_day",
                          value: "0",
                          "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.status = $event
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelRadio, unref(usePayroll).salaryComponents.status]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "Disable")
                      ])
                    ]),
                    createVNode("div", { class: "flex my-5" }, [
                      withDirectives(createVNode("input", {
                        "true-value": 1,
                        "false-value": 0,
                        "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isPartOfEmpSalStructure = $event,
                        type: "checkbox",
                        name: "",
                        id: "",
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input"
                      }, null, 8, ["onUpdate:modelValue"]), [
                        [vModelCheckbox, unref(usePayroll).salaryComponents.isPartOfEmpSalStructure]
                      ]),
                      createVNode("p", { class: "mx-3" }, "Make this earning a part of the employee's salary structure")
                    ]),
                    createVNode("div", { class: "flex my-5" }, [
                      withDirectives(createVNode("input", {
                        "true-value": 1,
                        "false-value": 0,
                        "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isTaxable = $event,
                        type: "checkbox",
                        name: "",
                        id: "",
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input"
                      }, null, 8, ["onUpdate:modelValue"]), [
                        [vModelCheckbox, unref(usePayroll).salaryComponents.isTaxable]
                      ]),
                      createVNode("p", { class: "mx-3" }, "This salary component is taxable")
                    ]),
                    createVNode("div", { class: "flex my-5" }, [
                      withDirectives(createVNode("input", {
                        "true-value": 1,
                        "false-value": 0,
                        "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isCalcShowProBasis = $event,
                        type: "checkbox",
                        name: "",
                        id: "",
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input"
                      }, null, 8, ["onUpdate:modelValue"]), [
                        [vModelCheckbox, unref(usePayroll).salaryComponents.isCalcShowProBasis]
                      ]),
                      createVNode("p", { class: "mx-3" }, "Calculate on pro-rate basis")
                    ]),
                    createVNode("div", { class: "flex my-5" }, [
                      withDirectives(createVNode("input", {
                        "true-value": 1,
                        "false-value": 0,
                        "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isShowInPayslip = $event,
                        type: "checkbox",
                        name: "",
                        id: "",
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input"
                      }, null, 8, ["onUpdate:modelValue"]), [
                        [vModelCheckbox, unref(usePayroll).salaryComponents.isShowInPayslip]
                      ]),
                      createVNode("p", { class: "mx-3" }, "Show the component in payslip")
                    ]),
                    createVNode("div", { class: "my-5 mx-2" }, [
                      createVNode("span", { class: "w-8" }, "Considered for EPF"),
                      createVNode("div", { class: "form-check form-check-inline mx-8" }, [
                        withDirectives(createVNode("input", {
                          "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isConsiderForEPF = $event,
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "epf",
                          id: "full_day",
                          value: "1"
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelRadio, unref(usePayroll).salaryComponents.isConsiderForEPF]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "Yes")
                      ]),
                      createVNode("div", { class: "form-check form-check-inline" }, [
                        withDirectives(createVNode("input", {
                          "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isConsiderForEPF = $event,
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "epf",
                          id: "full_day",
                          value: "0"
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelRadio, unref(usePayroll).salaryComponents.isConsiderForEPF]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "No")
                      ])
                    ]),
                    createVNode("div", { class: "my-5 mx-2" }, [
                      createVNode("span", null, "Considered for ESI"),
                      createVNode("div", { class: "form-check form-check-inline mx-8" }, [
                        withDirectives(createVNode("input", {
                          "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isConsiderForESI = $event,
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "esi",
                          id: "full_day",
                          value: "1"
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelRadio, unref(usePayroll).salaryComponents.isConsiderForESI]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "Yes")
                      ]),
                      createVNode("div", { class: "form-check form-check-inline" }, [
                        withDirectives(createVNode("input", {
                          "onUpdate:modelValue": ($event) => unref(usePayroll).salaryComponents.isConsiderForESI = $event,
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "esi",
                          id: "full_day",
                          value: "0"
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelRadio, unref(usePayroll).salaryComponents.isConsiderForESI]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "No")
                      ])
                    ])
                  ])
                ])
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("div", { class: "flex" }, [
                  createVNode("button", {
                    onClick: ($event) => unref(usePayroll).dailogNewSalaryComponents = false,
                    class: "btn btn-orange-outline"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    onClick: ($event) => unref(usePayroll).saveNewSalaryComponent(1),
                    class: "btn btn-orange mx-2"
                  }, "Save", 8, ["onClick"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup$d = _sfc_main$d.setup;
_sfc_main$d.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_components/earings/earings.vue");
  return _sfc_setup$d ? _sfc_setup$d(props, ctx) : void 0;
};
const _sfc_main$c = {
  __name: "adhoc_components",
  __ssrInlineRender: true,
  setup(__props) {
    const usePayroll = usePayrollMainStore();
    const helper = usePayrollHelper();
    const dailogDeduction = ref(false);
    const dailogAdhocComponents = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<!--[--><div class="w-full my-4"><div class="flex mx-2"><div class=""><p class="font-semibold text-gray-600 fs-6">Adhoc Components refer to salary components that are not part of an employee regular monthly pay and are typically added for a specific payroll month. These compenents can take various forms.such as a joining bonus,reimbursements,leave encashment at the end year, or penalty for late arrival.</p></div><div class="px-5">`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full",
        placeholder: "Search...."
      }, null, _parent));
      _push(`</div></div><div class="grid grid-cols-2 gap-8 my-4"><div class=""><div class="flex justify-between my-4"><p class="mx-1 font-semibold fs-5.5">Adhoc Allowances</p><button class="text-blue-500 whitespace-nowrap"><i class="pi pi-plus mx-1" style="${ssrRenderStyle({ "font-size": "0.8rem" })}"></i>Add new</button></div><div id="table">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(helper).filterSource(unref(usePayroll).salaryComponentsSource, 3)
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "comp_name",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_taxable",
              header: "Tax Status"
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p${_scopeId2}>${ssrInterpolate(unref(helper).findIsSelected(data.is_taxable))}</p>`);
                } else {
                  return [
                    createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.is_taxable)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { header: "Actions" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<i class="pi pi-pencil cursor-pointer" style="${ssrRenderStyle({ "font-size": "1rem" })}"${_scopeId2}></i><i class="pi pi-trash mx-3 cursor-pointer" style="${ssrRenderStyle({ "font-size": "1rem" })}"${_scopeId2}></i>`);
                } else {
                  return [
                    createVNode("i", {
                      onClick: ($event) => (unref(usePayroll).editAdhocSalaryComponents(data, 3, true), dailogAdhocComponents.value = true),
                      class: "pi pi-pencil cursor-pointer",
                      style: { "font-size": "1rem" }
                    }, null, 8, ["onClick"]),
                    createVNode("i", {
                      class: "pi pi-trash mx-3 cursor-pointer",
                      style: { "font-size": "1rem" }
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "comp_name",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "is_taxable",
                header: "Tax Status"
              }, {
                body: withCtx(({ data }) => [
                  createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.is_taxable)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { header: "Actions" }, {
                body: withCtx(({ data }) => [
                  createVNode("i", {
                    onClick: ($event) => (unref(usePayroll).editAdhocSalaryComponents(data, 3, true), dailogAdhocComponents.value = true),
                    class: "pi pi-pencil cursor-pointer",
                    style: { "font-size": "1rem" }
                  }, null, 8, ["onClick"]),
                  createVNode("i", {
                    class: "pi pi-trash mx-3 cursor-pointer",
                    style: { "font-size": "1rem" }
                  })
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><div class=""><div><div class="flex justify-between mx-2 my-4"><p class="font-semibold fs-5.5">Deductions</p><button class="text-blue-500 whitespace-nowrap"><i class="pi pi-plus mx-1" style="${ssrRenderStyle({ "font-size": "0.8rem" })}"></i>Add new</button></div><div id="table">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(helper).filterSource(unref(usePayroll).salaryComponentsSource, 2)
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "comp_name",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "impact_on_gross",
              header: "Impact on gross"
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p${_scopeId2}>${ssrInterpolate(unref(helper).findIsSelected(data.impact_on_gross))}</p>`);
                } else {
                  return [
                    createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.impact_on_gross)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { header: "Actions" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<i class="pi pi-pencil cursor-pointer" style="${ssrRenderStyle({ "font-size": "1rem" })}"${_scopeId2}></i><i class="pi pi-trash mx-3" style="${ssrRenderStyle({ "font-size": "1rem" })}"${_scopeId2}></i>`);
                } else {
                  return [
                    createVNode("i", {
                      onClick: ($event) => (unref(usePayroll).editAdhocSalaryComponents(data, 2, true), dailogDeduction.value = true),
                      class: "pi pi-pencil cursor-pointer",
                      style: { "font-size": "1rem" }
                    }, null, 8, ["onClick"]),
                    createVNode("i", {
                      class: "pi pi-trash mx-3",
                      style: { "font-size": "1rem" }
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "comp_name",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "impact_on_gross",
                header: "Impact on gross"
              }, {
                body: withCtx(({ data }) => [
                  createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.impact_on_gross)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { header: "Actions" }, {
                body: withCtx(({ data }) => [
                  createVNode("i", {
                    onClick: ($event) => (unref(usePayroll).editAdhocSalaryComponents(data, 2, true), dailogDeduction.value = true),
                    class: "pi pi-pencil cursor-pointer",
                    style: { "font-size": "1rem" }
                  }, null, 8, ["onClick"]),
                  createVNode("i", {
                    class: "pi pi-trash mx-3",
                    style: { "font-size": "1rem" }
                  })
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dailogDeduction.value,
        "onUpdate:visible": ($event) => dailogDeduction.value = $event,
        modal: true,
        closable: true,
        style: { width: "30vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Add New Deduction</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Add New Deduction")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Name</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              modelValue: unref(usePayroll).deductionComponents.comp_name,
              "onUpdate:modelValue": ($event) => unref(usePayroll).deductionComponents.comp_name = $event,
              class: "w-full",
              placeholder: "Enter name  "
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-4"${_scopeId}><p class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Does this have an impact on the gross amount</p><div class="form-check form-check-inline my-2"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).deductionComponents.impact_on_gross, "1")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="1"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Yes</label></div><div class="form-check form-check-inline mx-7"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).deductionComponents.impact_on_gross, "0")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="0"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>No</label></div></div><div class="float-right"${_scopeId}><div class="flex"${_scopeId}><button class="btn btn-orange-outline"${_scopeId}>Cancel</button><button class="btn btn-orange mx-2"${_scopeId}>Add</button></div></div>`);
          } else {
            return [
              createVNode("div", { class: "" }, [
                createVNode("label", {
                  for: "metro_city",
                  class: "block mb-2 font-semibold fs-6 text-gray-700"
                }, "Name"),
                createVNode(_component_InputText, {
                  modelValue: unref(usePayroll).deductionComponents.comp_name,
                  "onUpdate:modelValue": ($event) => unref(usePayroll).deductionComponents.comp_name = $event,
                  class: "w-full",
                  placeholder: "Enter name  "
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ]),
              createVNode("div", { class: "my-4" }, [
                createVNode("p", { class: "block mb-2 font-semibold fs-6 text-gray-700" }, "Does this have an impact on the gross amount"),
                createVNode("div", { class: "form-check form-check-inline my-2" }, [
                  withDirectives(createVNode("input", {
                    "onUpdate:modelValue": ($event) => unref(usePayroll).deductionComponents.impact_on_gross = $event,
                    style: { "height": "20px", "width": "20px" },
                    class: "form-check-input",
                    type: "radio",
                    name: "esi",
                    id: "full_day",
                    value: "1"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelRadio, unref(usePayroll).deductionComponents.impact_on_gross]
                  ]),
                  createVNode("label", {
                    class: "form-check-label leave_type ms-2",
                    for: "full_day"
                  }, "Yes")
                ]),
                createVNode("div", { class: "form-check form-check-inline mx-7" }, [
                  withDirectives(createVNode("input", {
                    "onUpdate:modelValue": ($event) => unref(usePayroll).deductionComponents.impact_on_gross = $event,
                    style: { "height": "20px", "width": "20px" },
                    class: "form-check-input",
                    type: "radio",
                    name: "esi",
                    id: "full_day",
                    value: "0"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelRadio, unref(usePayroll).deductionComponents.impact_on_gross]
                  ]),
                  createVNode("label", {
                    class: "form-check-label leave_type ms-2",
                    for: "full_day"
                  }, "No")
                ])
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("div", { class: "flex" }, [
                  createVNode("button", {
                    onClick: ($event) => dailogDeduction.value = false,
                    class: "btn btn-orange-outline"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    class: "btn btn-orange mx-2",
                    onClick: ($event) => (unref(usePayroll).saveNewSalaryComponent(2), dailogDeduction.value = false)
                  }, "Add", 8, ["onClick"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dailogAdhocComponents.value,
        "onUpdate:visible": ($event) => dailogAdhocComponents.value = $event,
        modal: true,
        closable: true,
        style: { width: "30vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Add New Adhoc Components</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Add New Adhoc Components")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Name</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              class: "w-full",
              placeholder: "Enter name",
              modelValue: unref(usePayroll).adhocComponents.comp_name,
              "onUpdate:modelValue": ($event) => unref(usePayroll).adhocComponents.comp_name = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-4"${_scopeId}><p class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Does this have tax status</p><div class="form-check form-check-inline my-2"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).adhocComponents.is_taxable, "1")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="1"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Yes</label></div><div class="form-check form-check-inline mx-7"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).adhocComponents.is_taxable, "0")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="0"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>No</label></div></div><div class="float-right"${_scopeId}><div class="flex"${_scopeId}><button class="btn btn-orange-outline"${_scopeId}>Cancel</button><button class="btn btn-orange mx-2"${_scopeId}>Add</button></div></div>`);
          } else {
            return [
              createVNode("div", { class: "" }, [
                createVNode("label", {
                  for: "metro_city",
                  class: "block mb-2 font-semibold fs-6 text-gray-700"
                }, "Name"),
                createVNode(_component_InputText, {
                  class: "w-full",
                  placeholder: "Enter name",
                  modelValue: unref(usePayroll).adhocComponents.comp_name,
                  "onUpdate:modelValue": ($event) => unref(usePayroll).adhocComponents.comp_name = $event
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ]),
              createVNode("div", { class: "my-4" }, [
                createVNode("p", { class: "block mb-2 font-semibold fs-6 text-gray-700" }, "Does this have tax status"),
                createVNode("div", { class: "form-check form-check-inline my-2" }, [
                  withDirectives(createVNode("input", {
                    "onUpdate:modelValue": ($event) => unref(usePayroll).adhocComponents.is_taxable = $event,
                    style: { "height": "20px", "width": "20px" },
                    class: "form-check-input",
                    type: "radio",
                    name: "esi",
                    id: "full_day",
                    value: "1"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelRadio, unref(usePayroll).adhocComponents.is_taxable]
                  ]),
                  createVNode("label", {
                    class: "form-check-label leave_type ms-2",
                    for: "full_day"
                  }, "Yes")
                ]),
                createVNode("div", { class: "form-check form-check-inline mx-7" }, [
                  withDirectives(createVNode("input", {
                    "onUpdate:modelValue": ($event) => unref(usePayroll).adhocComponents.is_taxable = $event,
                    style: { "height": "20px", "width": "20px" },
                    class: "form-check-input",
                    type: "radio",
                    name: "esi",
                    id: "full_day",
                    value: "0"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelRadio, unref(usePayroll).adhocComponents.is_taxable]
                  ]),
                  createVNode("label", {
                    class: "form-check-label leave_type ms-2",
                    for: "full_day"
                  }, "No")
                ])
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("div", { class: "flex" }, [
                  createVNode("button", {
                    onClick: ($event) => dailogAdhocComponents.value = false,
                    class: "btn btn-orange-outline"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    onClick: ($event) => (unref(usePayroll).saveNewSalaryComponent(3), dailogAdhocComponents.value = false),
                    class: "btn btn-orange mx-2"
                  }, "Add", 8, ["onClick"])
                ])
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
const _sfc_setup$c = _sfc_main$c.setup;
_sfc_main$c.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_components/adhoc_components/adhoc_components.vue");
  return _sfc_setup$c ? _sfc_setup$c(props, ctx) : void 0;
};
const _sfc_main$b = {
  __name: "reimbursement",
  __ssrInlineRender: true,
  setup(__props) {
    const usePayroll = usePayrollMainStore();
    const helper = usePayrollHelper();
    const dailogReimbursementComponents = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      _push(`<!--[--><div class="w-full"><section id="header" class="flex justify-between w-full my-4"><p class="mx-1 font-semibold fs-5.5">Salary Components</p><div><button class="btn btn-orange whitespace-nowrap"><i class="pi pi-plus mx-1" style="${ssrRenderStyle({ "font-size": "0.8rem" })}"></i>Add Components</button></div></section>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(helper).filterSource(unref(usePayroll).salaryComponentsSource, 4)
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "comp_name",
              header: "Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_taxable",
              header: "Tax Status"
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p${_scopeId2}>${ssrInterpolate(unref(helper).findIsSelected(data.is_taxable))}</p>`);
                } else {
                  return [
                    createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.is_taxable)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { header: "Actions" }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<i class="pi pi-pencil cursor-pointer" style="${ssrRenderStyle({ "font-size": "1rem" })}"${_scopeId2}></i><i class="pi pi-trash mx-3 cursor-pointer" style="${ssrRenderStyle({ "font-size": "1rem" })}"${_scopeId2}></i>`);
                } else {
                  return [
                    createVNode("i", {
                      onClick: ($event) => (unref(usePayroll).editAdhocSalaryComponents(data, 4), dailogReimbursementComponents.value = true),
                      class: "pi pi-pencil cursor-pointer",
                      style: { "font-size": "1rem" }
                    }, null, 8, ["onClick"]),
                    createVNode("i", {
                      class: "pi pi-trash mx-3 cursor-pointer",
                      style: { "font-size": "1rem" }
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "comp_name",
                header: "Name"
              }),
              createVNode(_component_Column, {
                field: "is_taxable",
                header: "Tax Status"
              }, {
                body: withCtx(({ data }) => [
                  createVNode("p", null, toDisplayString(unref(helper).findIsSelected(data.is_taxable)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, { header: "Actions" }, {
                body: withCtx(({ data }) => [
                  createVNode("i", {
                    onClick: ($event) => (unref(usePayroll).editAdhocSalaryComponents(data, 4), dailogReimbursementComponents.value = true),
                    class: "pi pi-pencil cursor-pointer",
                    style: { "font-size": "1rem" }
                  }, null, 8, ["onClick"]),
                  createVNode("i", {
                    class: "pi pi-trash mx-3 cursor-pointer",
                    style: { "font-size": "1rem" }
                  })
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dailogReimbursementComponents.value,
        "onUpdate:visible": ($event) => dailogReimbursementComponents.value = $event,
        modal: true,
        closable: true,
        style: { width: "30vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Add New Reimbursement Components</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Add New Reimbursement Components")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Name</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              class: "w-full",
              placeholder: "Enter name",
              modelValue: unref(usePayroll).reimbursementComponents.comp_name,
              "onUpdate:modelValue": ($event) => unref(usePayroll).reimbursementComponents.comp_name = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-4"${_scopeId}><p class="block mb-2 font-semibold fs-6 text-gray-700"${_scopeId}>Does this have tax status</p><div class="form-check form-check-inline my-2"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).reimbursementComponents.is_taxable, "1")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="1"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Yes</label></div><div class="form-check form-check-inline mx-7"${_scopeId}><input${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).reimbursementComponents.is_taxable, "0")) ? " checked" : ""} style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="esi" id="full_day" value="0"${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>No</label></div></div><div class="float-right"${_scopeId}><div class="flex"${_scopeId}><button class="btn btn-orange-outline"${_scopeId}>Cancel</button><button class="btn btn-orange mx-2"${_scopeId}>Add</button></div></div>`);
          } else {
            return [
              createVNode("div", { class: "" }, [
                createVNode("label", {
                  for: "metro_city",
                  class: "block mb-2 font-semibold fs-6 text-gray-700"
                }, "Name"),
                createVNode(_component_InputText, {
                  class: "w-full",
                  placeholder: "Enter name",
                  modelValue: unref(usePayroll).reimbursementComponents.comp_name,
                  "onUpdate:modelValue": ($event) => unref(usePayroll).reimbursementComponents.comp_name = $event
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ]),
              createVNode("div", { class: "my-4" }, [
                createVNode("p", { class: "block mb-2 font-semibold fs-6 text-gray-700" }, "Does this have tax status"),
                createVNode("div", { class: "form-check form-check-inline my-2" }, [
                  withDirectives(createVNode("input", {
                    "onUpdate:modelValue": ($event) => unref(usePayroll).reimbursementComponents.is_taxable = $event,
                    style: { "height": "20px", "width": "20px" },
                    class: "form-check-input",
                    type: "radio",
                    name: "esi",
                    id: "full_day",
                    value: "1"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelRadio, unref(usePayroll).reimbursementComponents.is_taxable]
                  ]),
                  createVNode("label", {
                    class: "form-check-label leave_type ms-2",
                    for: "full_day"
                  }, "Yes")
                ]),
                createVNode("div", { class: "form-check form-check-inline mx-7" }, [
                  withDirectives(createVNode("input", {
                    "onUpdate:modelValue": ($event) => unref(usePayroll).reimbursementComponents.is_taxable = $event,
                    style: { "height": "20px", "width": "20px" },
                    class: "form-check-input",
                    type: "radio",
                    name: "esi",
                    id: "full_day",
                    value: "0"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelRadio, unref(usePayroll).reimbursementComponents.is_taxable]
                  ]),
                  createVNode("label", {
                    class: "form-check-label leave_type ms-2",
                    for: "full_day"
                  }, "No")
                ])
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("div", { class: "flex" }, [
                  createVNode("button", {
                    onClick: ($event) => dailogReimbursementComponents.value = false,
                    class: "btn btn-orange-outline"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    onClick: ($event) => (unref(usePayroll).saveNewSalaryComponent(4), dailogReimbursementComponents.value = false),
                    class: "btn btn-orange mx-2"
                  }, "Add", 8, ["onClick"])
                ])
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
const _sfc_setup$b = _sfc_main$b.setup;
_sfc_main$b.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_components/reimbursement/reimbursement.vue");
  return _sfc_setup$b ? _sfc_setup$b(props, ctx) : void 0;
};
const accounting_code_vue_vue_type_style_index_0_lang = "";
const _sfc_main$a = {
  __name: "accounting_code",
  __ssrInlineRender: true,
  setup(__props) {
    const usePayroll = usePayrollMainStore();
    ref(false);
    const addApps = ref(false);
    const value = ref(false);
    onMounted(() => {
      usePayroll.getAccountingSoftware();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputSwitch = resolveComponent("InputSwitch");
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<!--[--><div class="card-body"><div class="tab-content" id="pills-tabContent"><div class="tab-pane show fade active" id="applications_tab" role="tabpanel" aria-labelledby="pills-profile-tab"><div class="flex justify-between"><div class=""><p class="text-lg font-semibold">Our Accounting Softwares</p><p class="text-muted fs-6"> Here you can integrate with one of our accounting softwares below </p></div><div class="flex gap-4"><div class="search-wrapper"><input type="text" name="" id="" class="search-input form-control" placeholder="Search App..."></div><div class=""><button class="btn btn-orange"><i class="fa fa-plus-circle me-2"></i>Add New </button></div></div></div><div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4" style="${ssrRenderStyle({ "display": "grid" })}"><!--[-->`);
      ssrRenderList(unref(usePayroll).accountingCodeSource, (code) => {
        _push(`<div class="p-2 mx-1 my-4 bg-white border-gray-200 rounded-lg shadow-md border-1"><div class="flex justify-between gap-6 my-4"><div class="w-4 mx-2"><img style="${ssrRenderStyle({ height: "80px", width: "80px" })}" alt=""></div><div class="m-auto">`);
        _push(ssrRenderComponent(_component_InputSwitch, {
          "true-value": 1,
          "false-value": 0,
          modelValue: value.value,
          "onUpdate:modelValue": ($event) => value.value = $event,
          onChange: ($event) => unref(usePayroll).enableAccountingSoftware(code, value.value)
        }, null, _parent));
        _push(`</div></div><div class="mx-4 my-4"><h4 class="text-2xl font-bold text-gray-700">${ssrInterpolate(code.accounting_soft_name)}</h4></div><div class="mx-4 my-4"><p class="w-full text-gray-500">${ssrInterpolate(code.description)}</p></div></div>`);
      });
      _push(`<!--]--></div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: addApps.value,
        "onUpdate:visible": ($event) => addApps.value = $event,
        modal: "",
        style: { width: "35vw", height: "100vh" }
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button type="button" class="btn btn-orange"${_scopeId}>Submit</button>`);
          } else {
            return [
              createVNode("button", {
                type: "button",
                class: "btn btn-orange",
                onClick: ($event) => unref(usePayroll).saveAccountingCode(unref(usePayroll).accountingCode)
              }, "Submit", 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class=""${_scopeId}><div class="my-4 mt-2"${_scopeId}><h1 class="text-2xl font-bold"${_scopeId}>App Details</h1></div><div class="my-4"${_scopeId}><p${_scopeId}>Upload a logo <span class="text-muted"${_scopeId}>(Optional)</span><i class="fa fa-exclamation-circle text-muted ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title=".png,jpg.jpeg"${_scopeId}></i></p><div class="d-flex justify-content-center align-items-center"${_scopeId}><input type="file" id="upload" hidden${_scopeId}><label id="file_upload" for="upload"${_scopeId}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.3" stroke="currentColor" class="w-1 h-3"${_scopeId}><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"${_scopeId}></path><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"${_scopeId}></path></svg></label></div></div><div class="col-12"${_scopeId}><div class="mb-2"${_scopeId}><label for="exampleFormControlInput1" class="text-xl font-semibold text-black form-label"${_scopeId}>App Name</label><input type="email" class="form-control" id="" placeholder="App name"${ssrRenderAttr("value", unref(usePayroll).accountingCode.accounting_soft_name)}${_scopeId}></div></div><div class="col-12"${_scopeId}><div class=""${_scopeId}><label for="" class="text-xl font-semibold text-black form-label"${_scopeId}>Description</label><textarea class="resize-none form-control" placeholder="Description" id="" rows="3"${_scopeId}>${ssrInterpolate(unref(usePayroll).accountingCode.description)}</textarea></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "" }, [
                createVNode("div", { class: "my-4 mt-2" }, [
                  createVNode("h1", { class: "text-2xl font-bold" }, "App Details")
                ]),
                createVNode("div", { class: "my-4" }, [
                  createVNode("p", null, [
                    createTextVNode("Upload a logo "),
                    createVNode("span", { class: "text-muted" }, "(Optional)"),
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-muted ms-2",
                      "data-bs-toggle": "tooltip",
                      "data-bs-placement": "top",
                      title: ".png,jpg.jpeg"
                    })
                  ]),
                  createVNode("div", { class: "d-flex justify-content-center align-items-center" }, [
                    createVNode("input", {
                      type: "file",
                      id: "upload",
                      hidden: "",
                      onClick: _ctx.integration.app_logo_attachment
                    }, null, 8, ["onClick"]),
                    createVNode("label", {
                      id: "file_upload",
                      for: "upload"
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "0.3",
                        stroke: "currentColor",
                        class: "w-1 h-3"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"
                        }),
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"
                        })
                      ]))
                    ])
                  ])
                ]),
                createVNode("div", { class: "col-12" }, [
                  createVNode("div", { class: "mb-2" }, [
                    createVNode("label", {
                      for: "exampleFormControlInput1",
                      class: "text-xl font-semibold text-black form-label"
                    }, "App Name"),
                    withDirectives(createVNode("input", {
                      type: "email",
                      class: "form-control",
                      id: "",
                      placeholder: "App name",
                      "onUpdate:modelValue": ($event) => unref(usePayroll).accountingCode.accounting_soft_name = $event
                    }, null, 8, ["onUpdate:modelValue"]), [
                      [vModelText, unref(usePayroll).accountingCode.accounting_soft_name]
                    ])
                  ])
                ]),
                createVNode("div", { class: "col-12" }, [
                  createVNode("div", { class: "" }, [
                    createVNode("label", {
                      for: "",
                      class: "text-xl font-semibold text-black form-label"
                    }, "Description"),
                    withDirectives(createVNode("textarea", {
                      class: "resize-none form-control",
                      placeholder: "Description",
                      "onUpdate:modelValue": ($event) => unref(usePayroll).accountingCode.description = $event,
                      id: "",
                      rows: "3"
                    }, null, 8, ["onUpdate:modelValue"]), [
                      [vModelText, unref(usePayroll).accountingCode.description]
                    ])
                  ])
                ])
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
const _sfc_setup$a = _sfc_main$a.setup;
_sfc_main$a.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_components/accounting_code/accounting_code.vue");
  return _sfc_setup$a ? _sfc_setup$a(props, ctx) : void 0;
};
const _sfc_main$9 = {
  __name: "salary_components",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><div class="p-3"><ul class="my-4 nav nav-pills nav-tabs-dashed" role="tablist"><li class="nav-item text-muted" role="presentation"><button class="pb-2 nav-link active" id="pills-offer-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-pending" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> Earings</button></li><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-completed" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Adhoc Components</button></li><li class="nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-resent-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-resent" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reimbursement</button></li><li class="mx-4 nav-item tex------t-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-resen-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-resen" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Accounting Code</button></li></ul><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade show active" id="pills-offer-pending" role="tabpanel" aria-labelledby="pills-offer-pending-tab"><div class="card-body"><div class="offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$d, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-completed" role="tabpanel" aria-labelledby="pills-offer-completed-tab"><div class="card-body"><div class="my-4 offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$c, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-resent" role="tabpanel" aria-labelledby="pills-offer-resent-tab"><div class="card-body"><div class="offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$b, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-resen" role="tabpanel" aria-labelledby="pills-offer-resen-tab"><div class="card-body"><div class="offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$a, null, null, _parent));
      _push(`</div></div></div></div></div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_components/salary_components.vue");
  return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
const new_salary_structure_vue_vue_type_style_index_0_lang = "";
const _sfc_main$8 = {
  __name: "new_salary_structure",
  __ssrInlineRender: true,
  setup(__props) {
    useRouter();
    const route = useRoute();
    usePayrollHelper();
    const salaryStore = salaryAdvanceSettingMainStore();
    onMounted(() => {
      console.log(route.params.id);
    });
    const usePayroll = usePayrollMainStore();
    const addSalaryComponents = ref(false);
    const assignEmployee = ref(false);
    ref();
    const filters = ref({
      "global": { value: null, matchMode: FilterMatchMode.CONTAINS }
    });
    const opt = ref();
    const opt1 = ref();
    const opt2 = ref();
    const opt3 = ref();
    const opt4 = ref();
    const opt5 = ref();
    ref();
    onMounted(() => {
      opt.value = "Department";
      opt1.value = "Designation";
      opt2.value = "Location";
      opt3.value = "State";
      opt4.value = "Branch";
      opt5.value = "Legal Entity";
      salaryStore.getDropdownFilterDetails();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_router_link = resolveComponent("router-link");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<!--[--><div class="w-full" style="${ssrRenderStyle({ "transition": "opacity 0.5s ease" })}"><div class="mx-6 py-6"><p class="text-gray-00 font-semibold fs-4">New Salary Structure</p><p class="text-gray-500 font-semibold fs-6">Create custom salary package by selecting the relevant components and configuring their corresponding calculation </p></div><div class="flex"><div class="w-5"><p class="text-gray-700 font-semibold fs-5 mx-6">Structure Details</p><div class="p-4 my-2 mx-6 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1"><div class=""><label for="metro_city" class="block mb-2 text-gray-700 font-semibold fs-6">Structure Name</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "w-full h-10",
        modelValue: unref(usePayroll).salaryStructure.structureName,
        "onUpdate:modelValue": ($event) => unref(usePayroll).salaryStructure.structureName = $event
      }, null, _parent));
      _push(`</div><div class="my-4"><label for="metro_city" class="block mb-2 text-gray-700 font-semibold fs-6">Description</label><div class="flex gap-8 justify-evenly">`);
      _push(ssrRenderComponent(_component_Textarea, {
        autoResize: true,
        rows: "3",
        cols: "90",
        placeholder: "Enter the Reason",
        modelValue: unref(usePayroll).salaryStructure.description,
        "onUpdate:modelValue": ($event) => unref(usePayroll).salaryStructure.description = $event
      }, null, _parent));
      _push(`</div></div></div><div class="my-4"><p class="text-gray-700 font-semibold fs-5 mx-6">PF &amp; ESI Setting</p><div class="p-4 my-2 mx-6 bg-gray-100 border-gray-400 rounded-lg shadow-md border-1"><div class="flex my-5"><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryStructure.pf, 1)) ? " checked" : ""}><p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the option for provident fund (PF) contributions</p></div><div class="flex my-5"><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryStructure.esi, 1)) ? " checked" : ""}><p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is includes the coverage for employee state insurance (ESI)</p></div><div class="flex my-5"><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryStructure.tds, 1)) ? " checked" : ""}><p class="mx-3 text-gray-800 font-semibold fs-6">This salary structure is subject to TDS(Tax deducted at source)</p></div><div class="flex my-5"><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(usePayroll).salaryStructure.fbp, 1)) ? " checked" : ""}><p class="mx-3 text-gray-800 font-semibold fs-6">This salary is eligible for flexible benefit plan(FBP)</p></div></div></div></div><div class="w-full mr-4"><div class="flex justify-between"><p class="text-gray-700 font-semibold fs-6">Salary Components</p><button class="btn btn-orange w-4">Add Components</button></div><div class="my-2">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(usePayroll).salaryStructure.selectedComponents
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "comp_name",
              header: "Components",
              style: { "min-width": "15rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "calculation_method",
              header: "Amount/Calculation",
              style: { "min-width": "15rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Action",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="p-1 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-6 px-auto text-center"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-1 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-6 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button>`);
                } else {
                  return [
                    createVNode("button", { class: "p-1 mx-4 bg-green-200 border-green-500 rounded-xl" }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-8 h-6 px-auto text-center"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                        })
                      ]))
                    ]),
                    createVNode("button", { class: "p-1 bg-red-200 border-red-500 rounded-xl" }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-8 h-6 font-bold"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        })
                      ]))
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "comp_name",
                header: "Components",
                style: { "min-width": "15rem" }
              }),
              createVNode(_component_Column, {
                field: "calculation_method",
                header: "Amount/Calculation",
                style: { "min-width": "15rem" }
              }),
              createVNode(_component_Column, {
                header: "Action",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx(() => [
                  createVNode("button", { class: "p-1 mx-4 bg-green-200 border-green-500 rounded-xl" }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-8 h-6 px-auto text-center"
                    }, [
                      createVNode("path", {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                      })
                    ]))
                  ]),
                  createVNode("button", { class: "p-1 bg-red-200 border-red-500 rounded-xl" }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-8 h-6 font-bold"
                    }, [
                      createVNode("path", {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                      })
                    ]))
                  ])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><button class="text-blue-500"><i class="pi pi-plus mx-1" style="${ssrRenderStyle({ "font-size": "0.8rem" })}"></i>Assign Employee</button></div></div><div class="flex justify-between my-5"><div></div><div class="flex">`);
      _push(ssrRenderComponent(_component_router_link, { to: `/payrollSetup/structure/` }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn btn-orange-outline"${_scopeId}>Cancel</button>`);
          } else {
            return [
              createVNode("button", {
                onClick: ($event) => unref(usePayroll).dailogNewSalaryStructure = false,
                class: "btn btn-orange-outline"
              }, "Cancel", 8, ["onClick"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<button class="btn btn-orange mx-2">Create structure</button></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: addSalaryComponents.value,
        "onUpdate:visible": ($event) => addSalaryComponents.value = $event,
        modal: true,
        closable: true,
        style: { width: "80vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Add New Components</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Add New Components")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_DataTable, {
              value: unref(usePayroll).salaryComponentsSource,
              selection: unref(usePayroll).salaryStructure.selectedComponents,
              "onUpdate:selection": ($event) => unref(usePayroll).salaryStructure.selectedComponents = $event,
              dataKey: "id",
              rows: unref(usePayroll).salaryComponentsSource.length
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, { selectionMode: "multiple" }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "comp_name",
                    header: "Name",
                    style: { "min-width": "15rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "comp_name",
                    header: "Type",
                    style: { "min-width": "15rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    header: "Type of calculation",
                    style: { "min-width": "22rem" }
                  }, {
                    body: withCtx(({ data }, _push4, _parent4, _scopeId3) => {
                      if (_push4)
                        ;
                      else {
                        return [];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, { selectionMode: "multiple" }),
                    createVNode(_component_Column, {
                      field: "comp_name",
                      header: "Name",
                      style: { "min-width": "15rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "comp_name",
                      header: "Type",
                      style: { "min-width": "15rem" }
                    }),
                    createVNode(_component_Column, {
                      header: "Type of calculation",
                      style: { "min-width": "22rem" }
                    }, {
                      body: withCtx(({ data }) => []),
                      _: 1
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`<div class="float-right my-4"${_scopeId}><div class="flex"${_scopeId}><button class="btn btn-orange-outline"${_scopeId}>Cancel</button><button class="btn btn-orange mx-2"${_scopeId}>Save</button></div></div>`);
          } else {
            return [
              createVNode(_component_DataTable, {
                value: unref(usePayroll).salaryComponentsSource,
                selection: unref(usePayroll).salaryStructure.selectedComponents,
                "onUpdate:selection": ($event) => unref(usePayroll).salaryStructure.selectedComponents = $event,
                dataKey: "id",
                rows: unref(usePayroll).salaryComponentsSource.length
              }, {
                default: withCtx(() => [
                  createVNode(_component_Column, { selectionMode: "multiple" }),
                  createVNode(_component_Column, {
                    field: "comp_name",
                    header: "Name",
                    style: { "min-width": "15rem" }
                  }),
                  createVNode(_component_Column, {
                    field: "comp_name",
                    header: "Type",
                    style: { "min-width": "15rem" }
                  }),
                  createVNode(_component_Column, {
                    header: "Type of calculation",
                    style: { "min-width": "22rem" }
                  }, {
                    body: withCtx(({ data }) => []),
                    _: 1
                  })
                ]),
                _: 1
              }, 8, ["value", "selection", "onUpdate:selection", "rows"]),
              createVNode("div", { class: "float-right my-4" }, [
                createVNode("div", { class: "flex" }, [
                  createVNode("button", {
                    onClick: ($event) => unref(usePayroll).dailogNewSalaryStructure = false,
                    class: "btn btn-orange-outline"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    class: "btn btn-orange mx-2",
                    onClick: ($event) => addSalaryComponents.value = false
                  }, "Save", 8, ["onClick"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: assignEmployee.value,
        "onUpdate:visible": ($event) => assignEmployee.value = $event,
        modal: true,
        closable: true,
        style: { width: "95vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Assign Employees</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Assign Employees")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="col-12"${_scopeId}><div class="row"${_scopeId}><div class="float-right"${_scopeId}><span class="p-input-icon-left"${_scopeId}><i class="pi pi-search"${_scopeId}></i>`);
            _push2(ssrRenderComponent(_component_InputText, {
              placeholder: "Search",
              modelValue: filters.value["global"].value,
              "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
              class: "border-color",
              style: { "height": "3em" }
            }, null, _parent2, _scopeId));
            _push2(`</span></div><div class="col-12"${_scopeId}><div class="col-12"${_scopeId}><div class="px-2 row"${_scopeId}><div class="col"${_scopeId}><div style="${ssrRenderStyle({ "padding": "10px" })}" class="border rounded d-flex justify-content-start align-items-center border-color"${_scopeId}><input type="checkbox" class="mr-3" style="${ssrRenderStyle({ "width": "20px", "height": "20px" })}"${_scopeId}><h1${_scopeId}>Clear Filters</h1></div></div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: opt.value,
              "onUpdate:modelValue": ($event) => opt.value = $event,
              editable: "",
              options: unref(salaryStore).dropdownFilter.department,
              optionLabel: "name",
              optionValue: "id",
              onChange: ($event) => unref(salaryStore).getSelectoption("department", opt.value),
              placeholder: "Department",
              class: "w-full text-red-500 md: border-color"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: opt1.value,
              "onUpdate:modelValue": ($event) => opt1.value = $event,
              editable: "",
              options: unref(salaryStore).dropdownFilter.designation,
              optionLabel: "designation",
              optionValue: "designation",
              placeholder: "Designation",
              class: "w-full text-red-500 md: border-color",
              onChange: ($event) => unref(salaryStore).getSelectoption("designation", opt1.value)
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: opt2.value,
              "onUpdate:modelValue": ($event) => opt2.value = $event,
              editable: "",
              options: unref(salaryStore).dropdownFilter.location,
              optionLabel: "work_location",
              optionValue: "work_location",
              placeholder: "Location",
              class: "w-full text-red-500 md: border-color",
              onChange: ($event) => unref(salaryStore).getSelectoption("work_location", opt2.value)
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: opt3.value,
              "onUpdate:modelValue": ($event) => opt3.value = $event,
              editable: "",
              options: unref(salaryStore).dropdownFilter.state,
              optionLabel: "state_name",
              optionValue: "id",
              placeholder: "State",
              class: "w-full text-red-500 md: border-color",
              onChange: ($event) => unref(salaryStore).getSelectoption("state", opt3.value)
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: opt5.value,
              "onUpdate:modelValue": ($event) => opt5.value = $event,
              editable: "",
              options: unref(salaryStore).dropdownFilter.legalEntity,
              optionLabel: "client_name",
              optionValue: "id",
              placeholder: "Legal Entity",
              class: "w-full text-red-500 md: border-color",
              onChange: ($event) => unref(salaryStore).getSelectoption("client_name", opt5.value)
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div></div></div>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              ref: "dt",
              dataKey: "id",
              paginator: true,
              rows: 10,
              value: unref(salaryStore).eligbleEmployeeSource,
              paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
              rowsPerPageOptions: [5, 10, 25],
              filters: filters.value,
              selection: unref(usePayroll).salaryStructure.assignedEmployees,
              "onUpdate:selection": ($event) => unref(usePayroll).salaryStructure.assignedEmployees = $event,
              currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
              responsiveLayout: "scroll"
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    selectionMode: "multiple",
                    headerStyle: "width: 1.5rem"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "user_code",
                    header: "Employee Name",
                    style: { "min-width": "8rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "name",
                    header: "Employee Name",
                    style: { "min-width": "12rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "department_name",
                    header: "Department ",
                    style: { "min-width": "12rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "designation",
                    header: "Designation ",
                    style: { "min-width": "20rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "work_location",
                    header: "Location ",
                    style: { "min-width": "12rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "client_name",
                    header: "Legal Entity",
                    style: { "min-width": "20rem" }
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      selectionMode: "multiple",
                      headerStyle: "width: 1.5rem"
                    }),
                    createVNode(_component_Column, {
                      field: "user_code",
                      header: "Employee Name",
                      style: { "min-width": "8rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "name",
                      header: "Employee Name",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "department_name",
                      header: "Department ",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "designation",
                      header: "Designation ",
                      style: { "min-width": "20rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "work_location",
                      header: "Location ",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "client_name",
                      header: "Legal Entity",
                      style: { "min-width": "20rem" }
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</div><div class="float-right my-4"${_scopeId}><div class="flex"${_scopeId}><button class="btn btn-orange-outline"${_scopeId}>Cancel</button><button class="btn btn-orange mx-2"${_scopeId}>Save</button></div></div>`);
          } else {
            return [
              createVNode("div", { class: "col-12" }, [
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "float-right" }, [
                    createVNode("span", { class: "p-input-icon-left" }, [
                      createVNode("i", { class: "pi pi-search" }),
                      createVNode(_component_InputText, {
                        placeholder: "Search",
                        modelValue: filters.value["global"].value,
                        "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                        class: "border-color",
                        style: { "height": "3em" }
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ]),
                  createVNode("div", { class: "col-12" }, [
                    createVNode("div", { class: "col-12" }, [
                      createVNode("div", { class: "px-2 row" }, [
                        createVNode("div", { class: "col" }, [
                          createVNode("div", {
                            style: { "padding": "10px" },
                            class: "border rounded d-flex justify-content-start align-items-center border-color"
                          }, [
                            createVNode("input", {
                              type: "checkbox",
                              class: "mr-3",
                              style: { "width": "20px", "height": "20px" },
                              onChange: unref(salaryStore).resetFilters
                            }, null, 40, ["onChange"]),
                            createVNode("h1", null, "Clear Filters")
                          ])
                        ]),
                        createVNode("div", { class: "col" }, [
                          createVNode(_component_Dropdown, {
                            modelValue: opt.value,
                            "onUpdate:modelValue": ($event) => opt.value = $event,
                            editable: "",
                            options: unref(salaryStore).dropdownFilter.department,
                            optionLabel: "name",
                            optionValue: "id",
                            onChange: ($event) => unref(salaryStore).getSelectoption("department", opt.value),
                            placeholder: "Department",
                            class: "w-full text-red-500 md: border-color"
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                        ]),
                        createVNode("div", { class: "col" }, [
                          createVNode(_component_Dropdown, {
                            modelValue: opt1.value,
                            "onUpdate:modelValue": ($event) => opt1.value = $event,
                            editable: "",
                            options: unref(salaryStore).dropdownFilter.designation,
                            optionLabel: "designation",
                            optionValue: "designation",
                            placeholder: "Designation",
                            class: "w-full text-red-500 md: border-color",
                            onChange: ($event) => unref(salaryStore).getSelectoption("designation", opt1.value)
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                        ]),
                        createVNode("div", { class: "col" }, [
                          createVNode(_component_Dropdown, {
                            modelValue: opt2.value,
                            "onUpdate:modelValue": ($event) => opt2.value = $event,
                            editable: "",
                            options: unref(salaryStore).dropdownFilter.location,
                            optionLabel: "work_location",
                            optionValue: "work_location",
                            placeholder: "Location",
                            class: "w-full text-red-500 md: border-color",
                            onChange: ($event) => unref(salaryStore).getSelectoption("work_location", opt2.value)
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                        ]),
                        createVNode("div", { class: "col" }, [
                          createVNode(_component_Dropdown, {
                            modelValue: opt3.value,
                            "onUpdate:modelValue": ($event) => opt3.value = $event,
                            editable: "",
                            options: unref(salaryStore).dropdownFilter.state,
                            optionLabel: "state_name",
                            optionValue: "id",
                            placeholder: "State",
                            class: "w-full text-red-500 md: border-color",
                            onChange: ($event) => unref(salaryStore).getSelectoption("state", opt3.value)
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                        ]),
                        createVNode("div", { class: "col" }, [
                          createVNode(_component_Dropdown, {
                            modelValue: opt5.value,
                            "onUpdate:modelValue": ($event) => opt5.value = $event,
                            editable: "",
                            options: unref(salaryStore).dropdownFilter.legalEntity,
                            optionLabel: "client_name",
                            optionValue: "id",
                            placeholder: "Legal Entity",
                            class: "w-full text-red-500 md: border-color",
                            onChange: ($event) => unref(salaryStore).getSelectoption("client_name", opt5.value)
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange"])
                        ])
                      ])
                    ])
                  ])
                ]),
                createVNode(_component_DataTable, {
                  ref: "dt",
                  dataKey: "id",
                  paginator: true,
                  rows: 10,
                  value: unref(salaryStore).eligbleEmployeeSource,
                  paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
                  rowsPerPageOptions: [5, 10, 25],
                  filters: filters.value,
                  selection: unref(usePayroll).salaryStructure.assignedEmployees,
                  "onUpdate:selection": ($event) => unref(usePayroll).salaryStructure.assignedEmployees = $event,
                  currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
                  responsiveLayout: "scroll"
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      selectionMode: "multiple",
                      headerStyle: "width: 1.5rem"
                    }),
                    createVNode(_component_Column, {
                      field: "user_code",
                      header: "Employee Name",
                      style: { "min-width": "8rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "name",
                      header: "Employee Name",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "department_name",
                      header: "Department ",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "designation",
                      header: "Designation ",
                      style: { "min-width": "20rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "work_location",
                      header: "Location ",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "client_name",
                      header: "Legal Entity",
                      style: { "min-width": "20rem" }
                    })
                  ]),
                  _: 1
                }, 8, ["value", "filters", "selection", "onUpdate:selection"])
              ]),
              createVNode("div", { class: "float-right my-4" }, [
                createVNode("div", { class: "flex" }, [
                  createVNode("button", {
                    onClick: ($event) => assignEmployee.value = false,
                    class: "btn btn-orange-outline"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    class: "btn btn-orange mx-2",
                    onClick: ($event) => assignEmployee.value = false
                  }, "Save", 8, ["onClick"])
                ])
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
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_structure/new_salary_structure.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const salary_structure_vue_vue_type_style_index_0_lang = "";
const _sfc_main$7 = {
  __name: "salary_structure",
  __ssrInlineRender: true,
  setup(__props) {
    useRouter();
    const route = useRoute();
    const usePayroll = usePayrollMainStore();
    usePayrollHelper();
    onMounted(() => {
      console.log(route.params.name);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_router_link = resolveComponent("router-link");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full p-3" }, _attrs))}>`);
      if (unref(route).params.name == void 0 || unref(route).params.name == "") {
        _push(`<div><section id="header" class="flex justify-between mx-2"><div class="flex justify-between"><div><p class="font-semibold text-gray-800 fs-5"> Salary Structure <span class="font-semibold text-gray-600 fs-6">(Paygroup)</span></p></div></div><div class="float-right"><button class="btn btn-orange float-right px-6 py-2 w-[160px]">`);
        _push(ssrRenderComponent(_component_router_link, {
          class: "",
          to: `/payrollSetup/structure/create`
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`Add Structure`);
            } else {
              return [
                createTextVNode("Add Structure")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</button></div></section><div class="grid gap-4 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 mx-1" style="${ssrRenderStyle({ "display": "grid" })}"><div class="p-0.5 rounded-lg shadow-md tw-card dynamic-card hover:bg-slate-100"><p class="text-lg font-semibold text-center">Earings</p><p class="my-0.5 text-xl font-bold text-center"><span>10</span></p></div></div><div id="table-responsive" class="my-4">`);
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(usePayroll).salaryStructureSource
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "paygroup_name",
                header: "Salary structure name"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "no_of_employees",
                header: "No of assigned employees"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "created_at",
                header: "Created at"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "updated_at",
                header: "Last modified"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, { header: "Action" }, {
                body: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="p-1 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-6 px-auto text-center"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-1 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-6 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button>`);
                  } else {
                    return [
                      createVNode("button", { class: "p-1 mx-4 bg-green-200 border-green-500 rounded-xl" }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-8 h-6 px-auto text-center"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                          })
                        ]))
                      ]),
                      createVNode("button", { class: "p-1 bg-red-200 border-red-500 rounded-xl" }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-8 h-6 font-bold"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                          })
                        ]))
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "paygroup_name",
                  header: "Salary structure name"
                }),
                createVNode(_component_Column, {
                  field: "no_of_employees",
                  header: "No of assigned employees"
                }),
                createVNode(_component_Column, {
                  field: "created_at",
                  header: "Created at"
                }),
                createVNode(_component_Column, {
                  field: "updated_at",
                  header: "Last modified"
                }),
                createVNode(_component_Column, { header: "Action" }, {
                  body: withCtx(() => [
                    createVNode("button", { class: "p-1 mx-4 bg-green-200 border-green-500 rounded-xl" }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-8 h-6 px-auto text-center"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                        })
                      ]))
                    ]),
                    createVNode("button", { class: "p-1 bg-red-200 border-red-500 rounded-xl" }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-8 h-6 font-bold"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        })
                      ]))
                    ])
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.name == "create") {
        _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/salary_structure/salary_structure.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const ProfeesionalTax_vue_vue_type_style_index_0_lang = "";
const _sfc_main$6 = {
  __name: "ProfeesionalTax",
  __ssrInlineRender: true,
  setup(__props) {
    const visible = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputText = resolveComponent("InputText");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="row card-headers w-full d-flex justify-content-between align-items-center md:justify-center align-middle" style="${ssrRenderStyle({})}"><h1></h1><div class="col-md" style="${ssrRenderStyle({ "line-height": "30px" })}"></div><div class="col-md d-flex justify-content-end"><button class="mb-5" style="${ssrRenderStyle({ backgroundColor: " #F36826", borderRadius: "4px", color: "#fff", padding: "8px 18px", fontSize: "15.06px" })}"><i class="pi pi-plus"></i> Add New</button><template><div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: visible.value,
        "onUpdate:visible": ($event) => visible.value = $event,
        modal: "",
        header: "",
        style: { width: "50vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 class="" style="${ssrRenderStyle({ "border-left": "3px solid #F36826", "padding-left": "12px", "font-size": "16px" })}"${_scopeId}>Professional Tax</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  class: "",
                  style: { "border-left": "3px solid #F36826", "padding-left": "12px", "font-size": "16px" }
                }, "Professional Tax")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><div class="row"${_scopeId}><div class="col"${_scopeId}><label for=""${_scopeId}>Choose Location</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: _ctx.selectedCity,
              "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
              options: _ctx.cities,
              optionLabel: "name",
              placeholder: "Choose",
              class: "w-full md:w-full"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}><label for=""${_scopeId}>State </label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: _ctx.selectedCity,
              "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
              options: _ctx.cities,
              optionLabel: "name",
              placeholder: "Choose",
              class: "w-full md:w-full"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="row"${_scopeId}><div class="col"${_scopeId}><label for=""${_scopeId}>PT Number</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: _ctx.value,
              "onUpdate:modelValue": ($event) => _ctx.value = $event,
              class: "w-full",
              placeholder: "Enter..."
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}><label for=""${_scopeId}>Decuction Cycle</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: _ctx.selectedCity,
              "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
              options: _ctx.cities,
              optionLabel: "name",
              placeholder: "Half yearly",
              class: "w-full md:w-full"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><p class="clr mt-4 mb-4 text-lg fw-normal"${_scopeId}>The tax are detemined based on an employee&#39;s Half Yearly Gross Salary. </p><div class="card border pl-3 pr-3"${_scopeId}><div class="row pt-2 clrs" style="${ssrRenderStyle({})}"${_scopeId}><div class="col d-flex justify-content-center"${_scopeId}><h1 class="fw-normal"${_scopeId}>Start Range( <span${_scopeId}>₹</span> )</h1></div><div class="col d-flex justify-content-center"${_scopeId}><h1 class="fw-normal"${_scopeId}>End Range( <span${_scopeId}>₹</span> )</h1></div><div class="col d-flex justify-content-center"${_scopeId}><h1 class="fw-normal"${_scopeId}>Half yearly Tax Amount( <span${_scopeId}>₹</span> )</h1></div></div><div class="row pt-2"${_scopeId}><div class="col d-flex justify-content-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: _ctx.value,
              "onUpdate:modelValue": ($event) => _ctx.value = $event,
              class: "w-full",
              style: { "height": "2.5rem" },
              placeholder: "From"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-1 d-flex justify-content-center align-items-center"${_scopeId}><span${_scopeId}>-</span></div><div class="col d-flex justify-content-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: _ctx.value,
              "onUpdate:modelValue": ($event) => _ctx.value = $event,
              class: "w-full",
              style: { "height": "2.5rem" },
              placeholder: "To"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-1 d-flex justify-content-center align-items-center"${_scopeId}><span${_scopeId}>=</span></div><div class="col d-flex justify-content-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: _ctx.value,
              "onUpdate:modelValue": ($event) => _ctx.value = $event,
              class: "w-full",
              style: { "height": "2.5rem" },
              placeholder: "To"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-1 d-flex justify-content-center align-items-center"${_scopeId}><button class="p-2 text-danger"${_scopeId}><i class="pi pi-minus-circle"${_scopeId}></i></button><button${_scopeId}><i class="pi pi-plus p-2 text-success"${_scopeId}></i></button></div></div></div></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("label", { for: "" }, "Choose Location"),
                    createVNode(_component_Dropdown, {
                      modelValue: _ctx.selectedCity,
                      "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
                      options: _ctx.cities,
                      optionLabel: "name",
                      placeholder: "Choose",
                      class: "w-full md:w-full"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode("label", { for: "" }, "State "),
                    createVNode(_component_Dropdown, {
                      modelValue: _ctx.selectedCity,
                      "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
                      options: _ctx.cities,
                      optionLabel: "name",
                      placeholder: "Choose",
                      class: "w-full md:w-full"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ])
                ]),
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("label", { for: "" }, "PT Number"),
                    createVNode(_component_InputText, {
                      type: "text",
                      modelValue: _ctx.value,
                      "onUpdate:modelValue": ($event) => _ctx.value = $event,
                      class: "w-full",
                      placeholder: "Enter..."
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode("label", { for: "" }, "Decuction Cycle"),
                    createVNode(_component_Dropdown, {
                      modelValue: _ctx.selectedCity,
                      "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
                      options: _ctx.cities,
                      optionLabel: "name",
                      placeholder: "Half yearly",
                      class: "w-full md:w-full"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ])
                ]),
                createVNode("p", { class: "clr mt-4 mb-4 text-lg fw-normal" }, "The tax are detemined based on an employee's Half Yearly Gross Salary. "),
                createVNode("div", { class: "card border pl-3 pr-3" }, [
                  createVNode("div", {
                    class: "row pt-2 clrs",
                    style: {}
                  }, [
                    createVNode("div", { class: "col d-flex justify-content-center" }, [
                      createVNode("h1", { class: "fw-normal" }, [
                        createTextVNode("Start Range( "),
                        createVNode("span", null, "₹"),
                        createTextVNode(" )")
                      ])
                    ]),
                    createVNode("div", { class: "col d-flex justify-content-center" }, [
                      createVNode("h1", { class: "fw-normal" }, [
                        createTextVNode("End Range( "),
                        createVNode("span", null, "₹"),
                        createTextVNode(" )")
                      ])
                    ]),
                    createVNode("div", { class: "col d-flex justify-content-center" }, [
                      createVNode("h1", { class: "fw-normal" }, [
                        createTextVNode("Half yearly Tax Amount( "),
                        createVNode("span", null, "₹"),
                        createTextVNode(" )")
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "row pt-2" }, [
                    createVNode("div", { class: "col d-flex justify-content-center" }, [
                      createVNode(_component_InputText, {
                        type: "text",
                        modelValue: _ctx.value,
                        "onUpdate:modelValue": ($event) => _ctx.value = $event,
                        class: "w-full",
                        style: { "height": "2.5rem" },
                        placeholder: "From"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-1 d-flex justify-content-center align-items-center" }, [
                      createVNode("span", null, "-")
                    ]),
                    createVNode("div", { class: "col d-flex justify-content-center" }, [
                      createVNode(_component_InputText, {
                        type: "text",
                        modelValue: _ctx.value,
                        "onUpdate:modelValue": ($event) => _ctx.value = $event,
                        class: "w-full",
                        style: { "height": "2.5rem" },
                        placeholder: "To"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-1 d-flex justify-content-center align-items-center" }, [
                      createVNode("span", null, "=")
                    ]),
                    createVNode("div", { class: "col d-flex justify-content-center" }, [
                      createVNode(_component_InputText, {
                        type: "text",
                        modelValue: _ctx.value,
                        "onUpdate:modelValue": ($event) => _ctx.value = $event,
                        class: "w-full",
                        style: { "height": "2.5rem" },
                        placeholder: "To"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-1 d-flex justify-content-center align-items-center" }, [
                      createVNode("button", { class: "p-2 text-danger" }, [
                        createVNode("i", { class: "pi pi-minus-circle" })
                      ]),
                      createVNode("button", null, [
                        createVNode("i", { class: "pi pi-plus p-2 text-success" })
                      ])
                    ])
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></template></div></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/statutory_filling/professional_Tax/ProfeesionalTax.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(_attrs)}><h1>Labour</h1></div>`);
}
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/statutory_filling/Labour_welfare_Fund/Labour_welfare_Fun.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const Labour_welfare_Fun = /* @__PURE__ */ _export_sfc(_sfc_main$5, [["ssrRender", _sfc_ssrRender]]);
const _sfc_main$4 = {
  __name: "statutory_filling",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mb-1 left-line" }, _attrs))}><div class="card"><div class="card-body"><ul class="my-4 nav nav-pills nav-tabs-dashed" role="tablist"><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link active" id="pills-offer-investment-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-investment" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">professional Tax</button></li><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-proof-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-proof" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Labour Welfare Fun</button></li></ul><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade show active" id="pills-offer-investment" role="tabpanel" aria-labelledby="pills-offer-investment-tab"><div class="card-body"><div class="offer-investment-content">`);
      _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-proof" role="tabpanel" aria-labelledby="pills-offer-proof-tab"><div class="card-body"><div class="my-4 offer-pending-content">`);
      _push(ssrRenderComponent(Labour_welfare_Fun, null, null, _parent));
      _push(`</div></div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/statutory_filling/statutory_filling.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const investment_declaration_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "investment_declaration",
  __ssrInlineRender: true,
  setup(__props) {
    const blu = ref();
    const isnavy = ref(false);
    const isgray = ref(false);
    const month = ref();
    const cities = ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<!--[--><div><div class="w-full align-middle row card-headers d-flex justify-content-between align-items-center md:justify-center" style="${ssrRenderStyle({})}"><div class="col-md" style="${ssrRenderStyle({ "line-height": "30px" })}"><h1 class="mx-2 mb-5 font-semibold">HRA Calculation</h1></div><div class="col-md d-flex justify-content-end"><button class="mb-5" style="${ssrRenderStyle({ border: "1px solid #F36826", borderRadius: "4px", color: "#F36826", padding: "8px 18px", fontSize: "15.06px" })}">Release Investments Declaration</button></div></div><div class="w-full pr-4"><div class="p-3 bg-gray-100 rounded-lg card"><div class="card-body"><div class="justify-around w-full row d-flex md"><div class="col-md col-8 cd"><h1 class="${ssrRenderClass({ navy: isnavy.value, gary: isgray.value })}">Do you want to consider default rent paid amount for HRA calculation?</h1></div><div class="col-sm d-flex"><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56", fontSize: "18px" }, { "height": "20px", "width": "20px" }])}"${ssrIncludeBooleanAttr(ssrLooseEqual(blu.value, "blu_clr")) ? " checked" : ""} value="blu_clr" class="form-check-input"><label for="" class="mx-3 text-1xl form-check-label leave_type" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" value="gr_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div><div class="justify-around w-full mt-5 row d-flex md"><div class="mt-3 col-md col-8 cd"><h1 class="w-full"> How would you like the House Rent Allowance (HRA) to be taken into account for tax exemption purposes? </h1></div><div class="mt-2 col-md">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.selectedCity,
        "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: " Month on Month or Annual",
        class: "w-full h-2.2rem",
        style: { background: "#FFFFFF;" }
      }, null, _parent));
      _push(`</div></div></div><div></div></div><div class="mt-5"><h1 class="mt-5 font-semibold">Investments Estimation and Deduction on Bonuses</h1><div class="p-3 mt-5 bg-gray-100 rounded-lg card"><div class="card-body"><div class="justify-around w-full row d-flex md"><div class="col-8 col-lg cd" style="${ssrRenderStyle({ "line-height": "12px" })}"><h1 class="${ssrRenderClass({ navy: isnavy.value, gary: isgray.value })}">Do you include future payout dates for bonuses (unpaid bonuses) when projecting tax calculations?</h1></div><div class="col-sm d-flex"><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}"${ssrIncludeBooleanAttr(ssrLooseEqual(blu.value, "blu_clr")) ? " checked" : ""} value="blu_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" value="gr_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div></div></div></div></div><div class="w-full"><div class="mt-5"><h1 class="mt-5 font-semibold">Approval of Financial Changes</h1><div class="p-3 mt-5 bg-gray-100 rounded-lg card"><div class="card-body"><div class="justify-around row d-flex align-items-center md"><div class="col-12"><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"><span><span class="mx-6 font-semibold fs-5" style="${ssrRenderStyle({ color: "#002f56" })}"> Grant authorization to employees for reviewing and approving changes to the following financial information</span></span></div></div><div class="col-sm d-flex"><ul class="ml-78 ul" style="${ssrRenderStyle({ color: "#002f56" })}"><li class="cd">Salary Payment Mode: Bank transfer, Cheque, or Cash.</li><li class="cd">Bank Information: Bank name, Account number, IFSC Code, or Name on account. </li><li class="cd">PF &amp; ESI Information: PF number, UAN, Joining date, Name on account, or ESI number.</li><li class="cd">PAN Information: PAN number, Date of birth, Name on PAN card, or Father&#39;s Name.</li><li class="cd">Aadhaar Information: Aadhaar Number, Aadhaar enrolment number, or Name on Aadhaar.</li></ul></div></div></div></div><div class="mt-5"><h1 class="mt-5 font-semibold">Opting In of New Tax Regime</h1><div class="p-3 my-5 bg-gray-100 rounded-lg card"><div class="card-body"><div class="row"><div class="col-md col-8 cd"><h1>The deadline for opting in or out of the new tax regime (Section 115BAC) is based on the financial year&#39;s cutoff date is </h1></div><div class="col-md d-flex"><div class="items-center justify-around">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "May",
        class: "w-full md:w-7rem"
      }, null, _parent));
      _push(`</div><div class="items-center justify-around ml-4">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full md:w-7rem"
      }, null, _parent));
      _push(`</div></div></div><div class="row"><div class="mt-4 col-md col-10 cd"><h1>For New Joinee, opting in or out to be done within `);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full mx-4 md:w-7rem"
      }, null, _parent));
      _push(` days from the date of joining. </h1></div></div></div></div></div><div class="mt-5"><h1 class="mt-5 font-semibold">Investments Declaration</h1><div class="p-3 my-5 mt-2 bg-gray-100 rounded-lg card"><div class="card-body"><div class="row"><div class="col-md col-12 cd"><h1>Employees can update their Investments Declarations anytime during a month prior to month the `);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full mx-4 md:w-7rem"
      }, null, _parent));
      _push(` month and before the cut-off period in the financial year, as defined below. </h1></div></div><div class="my-4 row"><div class="col-md col-6 cd"><h1 style="${ssrRenderStyle({ lineHeight: "45px" })}">Cutoff date for changing declaration in financial year is </h1></div><div class="col-md d-flex"><div class="items-center justify-around">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "May",
        class: "w-full md:w-7rem"
      }, null, _parent));
      _push(`</div><div class="items-center justify-around ml-4">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full md:w-7rem"
      }, null, _parent));
      _push(`</div></div></div><div class="my-4 row"><div class="col-md col-10 cd"><h1>For New Joinee, opting in or out to be done within `);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full mx-4 md:w-7rem"
      }, null, _parent));
      _push(` days from the date of joining. </h1></div></div><div class="justify-around w-full row d-flex md"><div class="col-md col-8 cd"><h1>Is approval required for any modifications in IT declarations submitted before Feb 27? </h1></div><div class="col-md d-flex"><div class="items-center justify-around"><input type="radio" name="HRA-cal" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around ml-3"><input type="radio" name="HRA-cal" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div></div></div></div><div class="mt-5"><h1 class="mt-5 font-semibold">Notification to Employees</h1><div class="p-3 my-5 mt-2 bg-gray-100 rounded-lg card card-md-w-100"><div class="card-body"><div class="justify-around row d-flex align-items-center"><div class="w-0 mr-3 col-1 col-lg"><label for=""><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"></label></div><div class="col col-sm-10"><h1>Notify the employee when the investment Delaration is released. </h1></div></div><div class="justify-around w-full my-4 row d-flex md"><div class="ml-5 col-md col-8 cd"><h1> Should we consider sending email remainder to the declare the investments</h1></div><div class="col-md d-flex"><div class="items-center justify-around"><input type="radio" name="HRA-cal" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" id="" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around ml-3"><input type="radio" name="HRA-cal" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" id="" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div><div class="justify-around row d-flex align-items-center"><div class="mt-3 col-lg col-8"><h1 class="ml-5">If yes,how frequently the should be sent ?</h1></div><div class="col col-lg">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: month.value,
        "onUpdate:modelValue": ($event) => month.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "Oncee a Week",
        class: "w-full md:w-14rem"
      }, null, _parent));
      _push(`</div></div></div></div></div></div></div><div class="my-4 col-md d-flex justify-content-end"><button class="btn btn-orange">Save</button></div><!--]-->`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/finance_setting/investment_declaration/investment_declaration.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "proof_of_investments",
  __ssrInlineRender: true,
  setup(__props) {
    const dialog_Notifyvisible = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<!--[--><div><div class="w-full align-middle row card-headers d-flex justify-content-between align-items-center md:justify-center" style="${ssrRenderStyle({})}"><div class="col-md" style="${ssrRenderStyle({ "line-height": "30px" })}"></div><div class="col-md d-flex justify-content-end"><button class="mb-5" style="${ssrRenderStyle({ border: "1px solid #F36826", borderRadius: "4px", color: "#F36826", padding: "8px 18px", fontSize: "15.06px" })}">Release Investments Declaration</button></div></div><div class="w-full"><div class="p-3 bg-gray-100 rounded-lg card"><div class="card-body"><div class="justify-around w-full row d-flex align-items-start md"><div class="col-md col-8 cd"><h1 class="${ssrRenderClass({ navy: _ctx.isnavy, gary: _ctx.isgray })}">Do employees need to provide proof of their investments while submission?</h1></div><div class="col-sm d-flex .align-items-start"><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}"${ssrIncludeBooleanAttr(ssrLooseEqual(_ctx.blu, "blu_clr")) ? " checked" : ""} value="blu_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" value="gr_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div><div class="justify-around w-full mt-5 row d-flex align-items-start md"><div class="col-md col-8 cd"><h1 class="w-full"> In the context of approving partial investment amounts, is it compulsory for reviewers to provide comments? </h1></div><div class="col-sm d-flex"><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}"${ssrIncludeBooleanAttr(ssrLooseEqual(_ctx.blu, "blu_clr")) ? " checked" : ""} value="blu_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" value="gr_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div><div class="justify-around w-full mt-5 row d-flex align-items-start md"><div class="col-md col-8 cd"><h1 class="w-full"> Can employees switch their tax regime? </h1></div><div class="col-sm d-flex"><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}"${ssrIncludeBooleanAttr(ssrLooseEqual(_ctx.blu, "blu_clr")) ? " checked" : ""} value="blu_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">yes</label></div><div class="items-center justify-around"><input type="radio" name="INV" style="${ssrRenderStyle([{ color: "#002f56" }, { "height": "20px", "width": "20px" }])}" value="gr_clr" class="form-check-input"><label for="" class="mx-3 text-1xl" style="${ssrRenderStyle({ color: "#002f56" })}">No</label></div></div></div></div><div></div></div><div class="mt-5"><div class="p-3 mt-5 bg-gray-100 rounded-lg card"><h1 class="p-3"><strong>Schedule 1</strong></h1><div class="card-body"><div class="justify-around row d-flex align-items-start"><div class="col-md col-8 cd"><h2 style="${ssrRenderStyle({ lineHeight: "25px" })}">The deadline for employees to submit proof of their IT declaration for the current financial year is</h2></div><div class="col-md d-flex"><div class="items-center justify-around">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.month,
        "onUpdate:modelValue": ($event) => _ctx.month = $event,
        options: _ctx.cities,
        optionLabel: "name",
        placeholder: "May",
        class: "w-full md:w-6rem",
        style: { lineHeight: "7px" }
      }, null, _parent));
      _push(`</div><div class="items-center justify-around ml-3">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.month,
        "onUpdate:modelValue": ($event) => _ctx.month = $event,
        options: _ctx.cities,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full md:w-6rem",
        style: { lineHeight: "7px" }
      }, null, _parent));
      _push(`</div></div></div><div class="row d-flex"><div class="col col-md cd"><h2 style="${ssrRenderStyle({ lineHeight: "25px" })}"><strong>Note :</strong> Upon approval of an employee&#39;s resignation, their proof of investments will be automatically opened to them so they can submit the necessary proofs.</h2></div></div></div></div></div><div class="mt-5"><div class="p-3 mt-5 bg-gray-100 rounded-lg card"><div class="card-body"><div class="justify-around row d-flex align-items-center"><div class="w-0 mr-3 col-1 col-lg"><label for=""><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"></label></div><div class="justify-around p-0 m-0 col col-sm-10 d-flex align-items-center"><strong style="${ssrRenderStyle({ fontSize: "700", width: "80px" })}" class="mx-4"> Schedule 2 </strong><p style="${ssrRenderStyle({ color: "#959595" })}"> (Optional) </p></div></div><div class="row d-flex"><div class="col-8 col-md cd"><h2 style="${ssrRenderStyle({ lineHeight: "25px" })}">The second deadline for employees to submit proof of their IT declaration for the current financial year is</h2></div><div class="col-md d-flex"><div class="items-center justify-around">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.month,
        "onUpdate:modelValue": ($event) => _ctx.month = $event,
        options: _ctx.cities,
        optionLabel: "name",
        placeholder: "May",
        class: "w-full md:w-6rem",
        style: { lineHeight: "7px" }
      }, null, _parent));
      _push(`</div><div class="items-center justify-around ml-3">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.month,
        "onUpdate:modelValue": ($event) => _ctx.month = $event,
        options: _ctx.cities,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full md:w-6rem",
        style: { lineHeight: "7px" }
      }, null, _parent));
      _push(`</div></div></div></div></div></div><div class="p-3 mt-5 bg-gray-100 rounded-lg card"><div class="card-body"><div class="justify-around row d-flex align-items-center"><div class="w-0 mr-3 col-1 col-lg"><label for=""><input type="checkbox" name="" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"></label></div><div class="justify-around p-0 m-0 col col-sm-10 d-flex align-items-center"><strong style="${ssrRenderStyle({ fontSize: "700", width: "80px" })}" class="mx-4"> Schedule 3 </strong><p style="${ssrRenderStyle({ color: "#959595" })}"> (Optional) </p></div></div><div class="row d-flex"><div class="col-8 col-md cd"><h2 style="${ssrRenderStyle({ lineHeight: "25px" })}">The last deadline for employees to submit proof of their IT declaration for the current financial year is</h2></div><div class="col-md d-flex"><div class="items-center justify-around">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.month,
        "onUpdate:modelValue": ($event) => _ctx.month = $event,
        options: _ctx.cities,
        optionLabel: "name",
        placeholder: "May",
        class: "w-full md:w-6rem",
        style: { lineHeight: "7px" }
      }, null, _parent));
      _push(`</div><div class="items-center justify-around ml-3">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.month,
        "onUpdate:modelValue": ($event) => _ctx.month = $event,
        options: _ctx.cities,
        optionLabel: "name",
        placeholder: "25",
        class: "w-full md:w-6rem",
        style: { lineHeight: "7px" }
      }, null, _parent));
      _push(`</div></div></div></div></div><div class="mt-5 mb-0"><h1 class="my-4 font-semibold">Notification to Employees</h1><div class="p-3 mt-2 bg-gray-100 rounded-lg card"><div class="card-body" style="${ssrRenderStyle({ background: "#F7F7F7" })}"><div class="justify-around row d-flex align-items-center"><div class="w-0 mr-3 col-1 col-lg"><label for=""><input type="checkbox" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"></label></div><div class="justify-around col col-sm-10 d-flex align-items-center"><p>Notify the employee when the Proof of investment is released.</p></div></div><template><div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dialog_Notifyvisible.value,
        "onUpdate:visible": ($event) => dialog_Notifyvisible.value = $event,
        modal: "",
        header: "Header",
        style: { width: "55vw" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p${_scopeId}> The attendance cut-off date marks the deadline for processing an employee&#39;s salary within a pay period. After this date, any absence by the employee will not affect their salary for that pay period. However, any loss of pay days before the cut-off date will be considered. If an employee incurs any loss of pay days after the cut-off date, the payment for those days will be recovered in the next pay period as part of &quot;Recovery Arrears.&quot; </p><p${_scopeId}>Example :</p><div class="border row"${_scopeId}><div class="pt-3 pl-4 border col-2 flex-column col-md" style="${ssrRenderStyle({ "width": "100px" })}"${_scopeId}><strong${_scopeId}>Month</strong><h1 class="mt-4"${_scopeId}>August</h1></div><div class="pt-3 border col-2 flex-column col-md" style="${ssrRenderStyle({ "width": "125px" })}"${_scopeId}><strong class="pl-4"${_scopeId}>Pay period </strong><h1 class="pt-4"${_scopeId}>Aug 1 <sup${_scopeId}>st</sup> - Aug 31 <sup${_scopeId}>st</sup></h1></div><div class="pt-3 border col-3 flex-column col-md" style="${ssrRenderStyle({ "width": "170px" })}"${_scopeId}><strong class="pl-1"${_scopeId}>Attendance Cut-Off Date</strong><h1 class="pt-4 pl-4"${_scopeId}>Jul 26 <sup${_scopeId}>st</sup>Aug - 25 <sup${_scopeId}>st</sup></h1></div><div class="pt-3 border col-2 col-md" style="${ssrRenderStyle({ "width": "150px" })}"${_scopeId}><strong class="pt-3 pl-3"${_scopeId}>Loss of Pay Days </strong><h1 class="pt-4 pl-4"${_scopeId}>Aug 27 <sup${_scopeId}>st</sup>&amp; 28 <sup${_scopeId}>st</sup></h1></div><div class="pt-3 border col-2 col-md" style="${ssrRenderStyle({ "width": "100px" })}"${_scopeId}><strong${_scopeId}>Payable Days </strong><h1 class="pt-4 pl-4"${_scopeId}>31 / 31</h1></div><div class="pt-3 border col-2 col-md" style="${ssrRenderStyle({ "width": "180px" })}"${_scopeId}><strong class="pt-4"${_scopeId}>Impacted Month Will be </strong><h1 class="pt-4" style="${ssrRenderStyle({ "padding-left": "45px" })}"${_scopeId}>September</h1></div></div><h1 class="mt-4"${_scopeId}><strong${_scopeId}>Note :</strong> The attendance cut-off date is not relevant to employees who receives daily remuneration</h1>`);
          } else {
            return [
              createVNode("p", null, ` The attendance cut-off date marks the deadline for processing an employee's salary within a pay period. After this date, any absence by the employee will not affect their salary for that pay period. However, any loss of pay days before the cut-off date will be considered. If an employee incurs any loss of pay days after the cut-off date, the payment for those days will be recovered in the next pay period as part of "Recovery Arrears." `),
              createVNode("p", null, "Example :"),
              createVNode("div", { class: "border row" }, [
                createVNode("div", {
                  class: "pt-3 pl-4 border col-2 flex-column col-md",
                  style: { "width": "100px" }
                }, [
                  createVNode("strong", null, "Month"),
                  createVNode("h1", { class: "mt-4" }, "August")
                ]),
                createVNode("div", {
                  class: "pt-3 border col-2 flex-column col-md",
                  style: { "width": "125px" }
                }, [
                  createVNode("strong", { class: "pl-4" }, "Pay period "),
                  createVNode("h1", { class: "pt-4" }, [
                    createTextVNode("Aug 1 "),
                    createVNode("sup", null, "st"),
                    createTextVNode(" - Aug 31 "),
                    createVNode("sup", null, "st")
                  ])
                ]),
                createVNode("div", {
                  class: "pt-3 border col-3 flex-column col-md",
                  style: { "width": "170px" }
                }, [
                  createVNode("strong", { class: "pl-1" }, "Attendance Cut-Off Date"),
                  createVNode("h1", { class: "pt-4 pl-4" }, [
                    createTextVNode("Jul 26 "),
                    createVNode("sup", null, "st"),
                    createTextVNode("Aug - 25 "),
                    createVNode("sup", null, "st")
                  ])
                ]),
                createVNode("div", {
                  class: "pt-3 border col-2 col-md",
                  style: { "width": "150px" }
                }, [
                  createVNode("strong", { class: "pt-3 pl-3" }, "Loss of Pay Days "),
                  createVNode("h1", { class: "pt-4 pl-4" }, [
                    createTextVNode("Aug 27 "),
                    createVNode("sup", null, "st"),
                    createTextVNode("& 28 "),
                    createVNode("sup", null, "st")
                  ])
                ]),
                createVNode("div", {
                  class: "pt-3 border col-2 col-md",
                  style: { "width": "100px" }
                }, [
                  createVNode("strong", null, "Payable Days "),
                  createVNode("h1", { class: "pt-4 pl-4" }, "31 / 31")
                ]),
                createVNode("div", {
                  class: "pt-3 border col-2 col-md",
                  style: { "width": "180px" }
                }, [
                  createVNode("strong", { class: "pt-4" }, "Impacted Month Will be "),
                  createVNode("h1", {
                    class: "pt-4",
                    style: { "padding-left": "45px" }
                  }, "September")
                ])
              ]),
              createVNode("h1", { class: "mt-4" }, [
                createVNode("strong", null, "Note :"),
                createTextVNode(" The attendance cut-off date is not relevant to employees who receives daily remuneration")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></template></div></div></div></div></div><div class="my-4 col-md d-flex justify-content-end"><button class="btn btn-orange">Save</button></div><!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/finance_setting/proof_of_investments/proof_of_investments.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const finance_setting_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "finance_setting",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_router_view = resolveComponent("router-view");
      _push(`<!--[--><div class="mb-1"><div class="card"><div class="card-body"><ul class="my-4 nav nav-pills nav-tabs-dashed" role="tablist"><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link active" id="pills-offer-investment-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-investment" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Investment Declaration</button></li><li class="mx-4 nav-item text-muted" role="presentation"><button class="pb-2 nav-link" id="pills-offer-proof-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-proof" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Proof of Investments</button></li></ul><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade show active" id="pills-offer-investment" role="tabpanel" aria-labelledby="pills-offer-investment-tab"><div class="card-body"><div class="offer-investment-content">`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-proof" role="tabpanel" aria-labelledby="pills-offer-proof-tab"><div class="card-body"><div class="my-4 offer-pending-content">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div></div></div></div></div></div></div>`);
      _push(ssrRenderComponent(_component_router_view, null, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/finance_setting/finance_setting.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const payroll_setup_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "payroll_setup",
  __ssrInlineRender: true,
  setup(__props) {
    const usePayroll = usePayrollMainStore();
    onMounted(() => {
      usePayroll.getSalaryComponents();
      usePayroll.getsalaryStructure();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_ConfirmDialog = resolveComponent("ConfirmDialog");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_ConfirmDialog, null, null, _parent));
      _push(`<div class="w-full m-auto"><h1 class="font-semibold fs-4 py-2 mx-2">Payroll Setting</h1><div class="mt-3 tabs w-full grid grid-cols-6"><a class="${ssrRenderClass([[unref(usePayroll).activeTab === 1 ? "active" : ""], "flex font-semibold fs-6 whitespace-nowrap"])}">General payroll Setting </a><a class="${ssrRenderClass([[unref(usePayroll).activeTab === 2 ? "active" : ""], "flex font-semibold fs-6 whitespace-nowrap"])}"> PF &amp; ESI Setting</a><a class="${ssrRenderClass([[unref(usePayroll).activeTab === 3 ? "active" : ""], "flex font-semibold fs-6 whitespace-nowrap"])}"> Salary Components</a><a class="${ssrRenderClass([[unref(usePayroll).activeTab === 4 ? "active" : ""], "flex font-semibold fs-6 whitespace-nowrap"])}"> Salary Structure</a><a class="${ssrRenderClass([[unref(usePayroll).activeTab === 5 ? "active" : ""], "flex font-semibold fs-6 whitespace-nowrap"])}"> Finance Setting </a><a class="${ssrRenderClass([[unref(usePayroll).activeTab === 6 ? "active" : ""], "flex font-semibold fs-6 whitespace-nowrap"])}"> Statutory Filling</a></div><div class="bg-white rounded-md">`);
      if (unref(usePayroll).activeTab === 1) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$k, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(usePayroll).activeTab === 2) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$e, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(usePayroll).activeTab === 3) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$9, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(usePayroll).activeTab === 4) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(usePayroll).activeTab === 5) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(usePayroll).activeTab === 6) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(usePayroll).canShowLoading,
        "onUpdate:visible": ($event) => unref(usePayroll).canShowLoading = $event,
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setup/payroll_setup.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const router = createRouter({
  history: createWebHistory("/build/"),
  routes: [
    {
      path: "/",
      name: "home",
      component: payroll_setting
    },
    {
      path: "/payrollSetup",
      name: "payrollSetup",
      component: _sfc_main
    },
    {
      path: "/payrollSetup/structure/:name",
      name: "new_salary_structureVue",
      component: _sfc_main$8
    }
  ]
});
const app = createApp(_sfc_main);
const pinia = createPinia();
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.use(pinia);
app.use(router);
app.directive("tooltip", Tooltip);
app.directive("badge", BadgeDirective);
app.directive("ripple", Ripple);
app.directive("styleclass", StyleClass);
app.directive("focustrap", FocusTrap);
app.component("Button", Button);
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
app.component("InputNumber", InputNumber);
app.component("Steps", Steps);
app.component("InputSwitch", InputSwitch);
app.mount("#payroll_setup");
