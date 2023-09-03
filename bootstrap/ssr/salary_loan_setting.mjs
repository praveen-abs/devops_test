/* empty css                        *//* empty css                             *//* empty css                           */import { ref, computed, onMounted, resolveComponent, mergeProps, unref, withCtx, createSlots, createVNode, createTextVNode, useSSRContext, openBlock, createBlock, toDisplayString, createCommentVNode, Fragment, renderList, createApp } from "vue";
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
import OrganizationChart from "primevue/organizationchart";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderClass, ssrRenderComponent, ssrRenderList, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseContain } from "vue/server-renderer";
import { FilterMatchMode } from "primevue/api";
import { s as salaryAdvanceSettingMainStore } from "./assets/salaryAdvanceSettingMainStore-dc1fc830.mjs";
import useValidate from "@vuelidate/core";
import { helpers, required } from "@vuelidate/validators";
import axios from "axios";
import "primevue/usetoast";
import { L as LoadingSpinner } from "./assets/LoadingSpinner-13fb7de2.mjs";
import "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
const loanSettingsStore = defineStore("loanSettings", () => {
  const CreateLoanWithNewFrom = ref(1);
  const loan_ID = ref();
  function viewHistory(data) {
  }
  async function SendEnableAndDisable(Status, loanType) {
    let status = Status;
    let LoanType = loanType;
    let Loan_ID = loan_ID.value;
    console.log(Status);
    await axios.post("/enable-or-disable-loan-settings", {
      Status: status,
      loanType: LoanType,
      loan_ID: Loan_ID
    }).then(() => {
    });
  }
  async function sendSavechanges(setting_id, empid) {
    let settings = setting_id;
    let empDetails = empid;
    await axios.post("/salAdvSettingEdit", {
      settings_id: settings,
      empID: empDetails
    }).then(() => {
    });
  }
  return {
    CreateLoanWithNewFrom,
    viewHistory,
    SendEnableAndDisable,
    loan_ID,
    sendSavechanges
  };
});
const salary_advance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$6 = {
  __name: "salary_advance",
  __ssrInlineRender: true,
  setup(__props) {
    const salaryStore = salaryAdvanceSettingMainStore();
    loanSettingsStore();
    const filters = ref({
      "global": { value: null, matchMode: FilterMatchMode.CONTAINS }
    });
    ref([]);
    const setEligibleEmployee = ref([]);
    ref();
    const opt = ref();
    const opt1 = ref();
    const opt2 = ref();
    const opt3 = ref();
    const opt4 = ref();
    const opt5 = ref();
    ref();
    ref(false);
    const custPercent = (value) => {
      if (salaryStore.sa.perOfSalAdvance == "custom") {
        if (value) {
          return true;
        }
      } else {
        return true;
      }
    };
    const custDeduct = (value) => {
      if (salaryStore.sa.deductMethod == "afterPayroll") {
        if (value) {
          return true;
        }
      } else {
        return true;
      }
    };
    const rules = computed(() => {
      return {
        perOfSalAdvance: { required: helpers.withMessage("Percentage of salary advance is required", required) },
        SA: { required: helpers.withMessage("salary Advance Name is required", required) },
        cusPerOfSalAdvance: { custPercent: helpers.withMessage("Custom percentage of salary advance is required", custPercent) },
        deductMethod: { required: helpers.withMessage("Method of deduction is required", required) },
        cusDeductMethod: { custDeduct: helpers.withMessage("Deduction peroid is required", custDeduct) },
        approvalflow: { required: helpers.withMessage("Approval Flow is required", required) }
      };
    });
    const v$ = useValidate(rules, salaryStore.sa);
    function selectClientId(data) {
      salaryStore.sendClient_code(data);
    }
    onMounted(() => {
      opt.value = "Department";
      opt1.value = "Designation";
      opt2.value = "Location";
      opt3.value = "State";
      opt4.value = "Branch";
      opt5.value = "Legal Entity";
      salaryStore.getClientsName("sal_adv");
      salaryStore.getCurrentStatus("sal_adv");
      salaryStore.getDropdownFilterDetails();
      salaryStore.salaryAdvanceHistory();
    });
    let view_details = ref();
    function sendEmpDetails(val, id) {
      console.log(val);
      if (view_details) {
        salaryStore.SalaryEmpDetails.push(val);
      }
      setEligibleEmployee.value.push(id);
      console.log();
    }
    function Remove(val) {
      setEligibleEmployee.value = setEligibleEmployee.value.filter((item) => item !== val.id);
      salaryStore.SalaryEmpDetails = salaryStore.SalaryEmpDetails.filter((item) => item !== val);
      console.log(setEligibleEmployee.value);
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Checkbox = resolveComponent("Checkbox");
      const _component_RadioButton = resolveComponent("RadioButton");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_P = resolveComponent("P");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "px-1" }, _attrs))}><div class="row d-flex justify-content-start align-items-center">`);
      if (unref(salaryStore).create_new_from == "1") {
        _push(`<div class="d-flex"><div class="text-center col-3 d-flex align-items-center justify-content-start" style="${ssrRenderStyle({})}"><h1 class="text-xl xl:text-2xl">Salary Advance Feature</h1></div><div class="col"><button class="${ssrRenderClass([[unref(salaryStore).isSalaryAdvanceFeatureEnabled === 1 ? "bg-white text-black border-[1px] border-black" : "text-white"], "orange_btn"])}">Disabled</button><button class="${ssrRenderClass([[unref(salaryStore).isSalaryAdvanceFeatureEnabled === 1 ? "bg-green-700 text-white" : ""], "Enable_btn"])}">Enable</button></div><div class="col">`);
        if (unref(salaryStore).create_new_from == "1") {
          _push(`<button class="float-right px-4 py-2 text-white bg-blue-800 rounded-md"><i class="mx-1 pi pi-plus"></i> Create New From </button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(salaryStore).create_new_from == "1") {
        _push(`<div class="col"><div>`);
        if (unref(salaryStore).isSalaryAdvanceFeatureEnabled == "0" || unref(salaryStore).isSalaryAdvanceFeatureEnabled == null) {
          _push(`<p class="fs-5"> Please click the &quot;Enable&quot; button to activate the salary advance feature for use within your organization.</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(salaryStore).isSalaryAdvanceFeatureEnabled == "1" && unref(salaryStore).create_new_from == "1") {
        _push(`<p class="fs-5"> Please click the &quot;Disable&quot; button to deactivate the salary advance feature.</p>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(salaryStore).create_new_from == "1" && unref(salaryStore).isSalaryAdvanceFeatureEnabled == "1") {
        _push(`<div class=""><div class="row d-flex justify-items-center align-items-center"><div class="col-3"><h1 class="fs-4">Select organization</h1></div><div class="col">`);
        _push(ssrRenderComponent(_component_MultiSelect, {
          modelValue: unref(salaryStore).client_name_status,
          "onUpdate:modelValue": ($event) => unref(salaryStore).client_name_status = $event,
          options: unref(salaryStore).ClientsName,
          optionLabel: "client_name",
          trueValue: 1,
          falseValue: 0,
          optionValue: "id",
          placeholder: "Select Branches",
          maxSelectedLabels: 3,
          class: "",
          onChange: ($event) => selectClientId("sal_adv")
        }, null, _parent));
        _push(`</div></div><div class="mt-2 ml-1 mr-3 row"><!--[-->`);
        ssrRenderList(unref(salaryStore).salaryAdvanceSettingsDetails, (item, index) => {
          _push(`<div class="${ssrRenderClass([[], "p-3 mb-2 rounded-md shadow-sm col-12 border-1 h-28 d-flex flex-column align-items-center justify-content-between even-card blink"])}"><div class="w-full row"><div class="col"><h1 class="text-[15px]">${ssrInterpolate(item.settings.settings_name)}</h1></div><div class="col"></div><div class="col-4"><button class="float-right text-blue-400 underline fs-5">View Details</button></div></div><div class="w-full row"><div class="col">`);
          if (item.settings.deduction_period_of_months === 1) {
            _push(`<h1 class="text-[15px]">Deduct the amount in the Upcomming Payroll</h1>`);
          } else {
            _push(`<h1 class="text-[15px]">The deduction can be made over a period of ${ssrInterpolate(item.settings.deduction_period_of_months)} months. </h1>`);
          }
          _push(`</div><div class="col"><h1 class="text-[15px] text-right">Percentage of Salary Advance: ${ssrInterpolate(item.settings.percent_salary_adv)}%</h1></div><div class="col"><h1 class="text-[15px] float-right">Employee Count : ${ssrInterpolate(item.settings.emp_count)}</h1></div></div></div>`);
        });
        _push(`<!--]--></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(salaryStore).create_new_from == "2") {
        _push(`<div class="grid grid-cols-1"><div class=""><div class="my-4 flex justify-between items-center w-[600px]"><h1 class="text-xl xl:text-2xl">Name of the Salary Advance</h1><div class="">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          placeholder: "Give Salary Advance a Name",
          modelValue: unref(salaryStore).sa.SA,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.SA = $event,
          class: ["d-flex justify-items-center md:w-20rem", [
            unref(v$).SA.$error ? "p-invalid " : ""
          ]]
        }, null, _parent));
        if (unref(v$).SA.$error) {
          _push(`<span class="font-semibold text-red-400 fs-6 position-absolute top-12">${ssrInterpolate(unref(v$).SA.required.$message.replace("Value", "Client Name"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><div class="my-4 d-flex justify-content-between align-items-center w-[600px]"><h1 class="fs-4">Payment Cycle</h1><div class="" style="${ssrRenderStyle({ "height": "40px", "position": "relative" })}"><button class="${ssrRenderClass([[unref(salaryStore).sa.payroll_cycle == "0" ? " text-white bg-orange-500 border-none" : ""], "px-4 py-2 rounded-l-md border-[1px] text-gray-500 fw-semibold border-gray-500"])}"> Single</button><button class="${ssrRenderClass([[unref(salaryStore).sa.payroll_cycle == "1" ? " text-white bg-orange-500 border-none" : ""], "px-4 py-2 rounded-r-md text-gray-500 border-[1px] fw-semibold border-gray-500"])}"> Multiple</button></div></div><h1 class="mt-10 fs-4">Eligible Employees</h1><p class="my-2 fs-5">Kindly choose the employees who are eligible for the salary advance.</p></div><div class=""><div class="rounded-lg shadow-sm card"><div class="card-body" style="${ssrRenderStyle({ "border-top": "4px solid var(--navy)", "border-radius": "4px 4px 0 0" })}"><div class="row"><div class="col-9"><h1 style="${ssrRenderStyle({ "border-left": "4px solid var(--orange)", "padding-left": "15px", "font-size": "18px" })}"> Employees</h1></div><div class="mx-2 col-3 my-[14px]"><span class="p-input-icon-left"><i class="pi pi-search"></i>`);
        _push(ssrRenderComponent(_component_InputText, {
          placeholder: "Search",
          modelValue: filters.value["global"].value,
          "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
          class: "border-color",
          style: { "height": "3em" }
        }, null, _parent));
        _push(`</span></div><div class="col-12"><div class="col-12"><div class="px-2 row"><div class="col"><div style="${ssrRenderStyle({ "padding": "10px" })}" class="border rounded d-flex justify-content-start align-items-center border-color"><input type="checkbox" class="mr-3" style="${ssrRenderStyle({ "width": "20px", "height": "20px" })}"><h1>Clear Filters</h1></div></div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt.value,
          "onUpdate:modelValue": ($event) => opt.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.department,
          optionLabel: "name",
          optionValue: "id",
          onChange: ($event) => unref(salaryStore).getSelectoption("department", opt.value),
          placeholder: "Department",
          class: "w-full text-red-500 md: border-color"
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt1.value,
          "onUpdate:modelValue": ($event) => opt1.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.designation,
          optionLabel: "designation",
          optionValue: "designation",
          placeholder: "Designation",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("designation", opt1.value)
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt2.value,
          "onUpdate:modelValue": ($event) => opt2.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.location,
          optionLabel: "work_location",
          optionValue: "work_location",
          placeholder: "Location",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("work_location", opt2.value)
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt3.value,
          "onUpdate:modelValue": ($event) => opt3.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.state,
          optionLabel: "state_name",
          optionValue: "id",
          placeholder: "State",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("state", opt3.value)
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt5.value,
          "onUpdate:modelValue": ($event) => opt5.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.legalEntity,
          optionLabel: "client_name",
          optionValue: "id",
          placeholder: "Legal Entity",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("client_name", opt5.value)
        }, null, _parent));
        _push(`</div></div></div></div></div>`);
        _push(ssrRenderComponent(_component_DataTable, {
          class: "mt-[8px]",
          ref: "dt",
          dataKey: "user_code",
          paginator: true,
          rows: 10,
          value: unref(salaryStore).eligbleEmployeeSource,
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          filters: filters.value,
          selection: unref(salaryStore).sa.eligibleEmployee,
          "onUpdate:selection": ($event) => unref(salaryStore).sa.eligibleEmployee = $event,
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                selectionMode: "multiple",
                headerStyle: "width: 1.5rem"
              }, createSlots({ _: 2 }, [
                unref(view_details) ? {
                  name: "body",
                  fn: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(ssrRenderComponent(_component_Checkbox, {
                        selection: setEligibleEmployee.value,
                        "onUpdate:selection": ($event) => setEligibleEmployee.value = $event,
                        inputId: slotProps.data.id,
                        onChange: ($event) => sendEmpDetails(slotProps.data, slotProps.data.id),
                        binary: true
                      }, null, _parent3, _scopeId2));
                    } else {
                      return [
                        createVNode(_component_Checkbox, {
                          selection: setEligibleEmployee.value,
                          "onUpdate:selection": ($event) => setEligibleEmployee.value = $event,
                          inputId: slotProps.data.id,
                          onChange: ($event) => sendEmpDetails(slotProps.data, slotProps.data.id),
                          binary: true
                        }, null, 8, ["selection", "onUpdate:selection", "inputId", "onChange"])
                      ];
                    }
                  }),
                  key: "0"
                } : void 0
              ]), _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "user_code",
                header: "Employee Name",
                style: { "min-width": "8rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "name",
                header: "Employee Name",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "department_name",
                header: "Department ",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "designation",
                header: "Designation ",
                style: { "min-width": "20rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "work_location",
                header: "Location ",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "client_name",
                header: "Legal Entity",
                style: { "min-width": "20rem" }
              }, null, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  selectionMode: "multiple",
                  headerStyle: "width: 1.5rem"
                }, createSlots({ _: 2 }, [
                  unref(view_details) ? {
                    name: "body",
                    fn: withCtx((slotProps) => [
                      createVNode(_component_Checkbox, {
                        selection: setEligibleEmployee.value,
                        "onUpdate:selection": ($event) => setEligibleEmployee.value = $event,
                        inputId: slotProps.data.id,
                        onChange: ($event) => sendEmpDetails(slotProps.data, slotProps.data.id),
                        binary: true
                      }, null, 8, ["selection", "onUpdate:selection", "inputId", "onChange"])
                    ]),
                    key: "0"
                  } : void 0
                ]), 1024),
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
        }, _parent));
        if (unref(view_details)) {
          _push(ssrRenderComponent(_component_DataTable, {
            ref: "dt",
            dataKey: "user_code",
            paginator: true,
            rows: 10,
            value: unref(salaryStore).SalaryEmpDetails,
            paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
            rowsPerPageOptions: [5, 10, 25],
            currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
            responsiveLayout: "scroll"
          }, {
            default: withCtx((_, _push2, _parent2, _scopeId) => {
              if (_push2) {
                _push2(ssrRenderComponent(_component_Column, {
                  field: "user_code",
                  header: "Employee Name",
                  style: { "min-width": "8rem" }
                }, null, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "name",
                  header: "Employee Name",
                  style: { "min-width": "12rem" }
                }, null, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "department_name",
                  header: "Department ",
                  style: { "min-width": "12rem" }
                }, null, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "designation",
                  header: "Designation ",
                  style: { "min-width": "20rem" }
                }, null, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "work_location",
                  header: "Location ",
                  style: { "min-width": "12rem" }
                }, null, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "client_name",
                  header: "Legal Entity",
                  style: { "min-width": "20rem" }
                }, null, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, { header: "Action" }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`<div${_scopeId2}><button class="px-2 text-blue-600 border border-blue-600 rounded-md"${_scopeId2}>remove </button></div>`);
                    } else {
                      return [
                        createVNode("div", null, [
                          createVNode("button", {
                            class: "px-2 text-blue-600 border border-blue-600 rounded-md",
                            onClick: ($event) => Remove(slotProps.data)
                          }, "remove ", 8, ["onClick"])
                        ])
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
              } else {
                return [
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
                  }),
                  createVNode(_component_Column, { header: "Action" }, {
                    body: withCtx((slotProps) => [
                      createVNode("div", null, [
                        createVNode("button", {
                          class: "px-2 text-blue-600 border border-blue-600 rounded-md",
                          onClick: ($event) => Remove(slotProps.data)
                        }, "remove ", 8, ["onClick"])
                      ])
                    ]),
                    _: 1
                  })
                ];
              }
            }),
            _: 1
          }, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div><div class="mt-4"><h1 class="my-3 fs-4">Percentage of Salary Advance</h1><p class="my-2 fs-5">Please select the percentage of the salary advance that employees can avail.</p><div class="shadow-sm card border-L rounded-top"><div class="card-body"><div class="grid gap-4 p-2 md:grid-cols-3 sm:grid-cols-1 xxl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 align-items-center"><div><div class="flex flex-wrap gap-3"><div class="flex justify-content-center align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).sa.perOfSalAdvance,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.perOfSalAdvance = $event,
          inputId: "ingredient1",
          name: "percofsaladvance",
          value: 100,
          class: [
            unref(v$).perOfSalAdvance.$error ? "p-invalid" : ""
          ]
        }, null, _parent));
        _push(`<label for="ingredient1" class="ml-2 fs-5">100% Of Net salary</label></div></div></div><div><div class="flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).sa.perOfSalAdvance,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.perOfSalAdvance = $event,
          inputId: "ingredient2",
          name: "percofsaladvance",
          value: 50,
          class: [
            unref(v$).perOfSalAdvance.$error ? "p-invalid" : ""
          ]
        }, null, _parent));
        _push(`<label for="ingredient2" class="ml-2 fs-5">50% Of Net salary</label></div></div><div class="flex"><div class="flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).sa.perOfSalAdvance,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.perOfSalAdvance = $event,
          inputId: "ingredient3",
          name: "percofsaladvance",
          value: "custom",
          class: [
            unref(v$).perOfSalAdvance.$error ? "p-invalid" : ""
          ]
        }, null, _parent));
        _push(`<label for="ingredient3" class="ml-2 fs-5">Custom</label></div>`);
        if (unref(salaryStore).sa.perOfSalAdvance == "custom") {
          _push(`<div class="flex"><div class="flex align-items-center">`);
          _push(ssrRenderComponent(_component_InputNumber, {
            modelValue: unref(salaryStore).sa.cusPerOfSalAdvance,
            "onUpdate:modelValue": ($event) => unref(salaryStore).sa.cusPerOfSalAdvance = $event,
            name: "percofsaladvance",
            class: ["w-1 mx-2", [
              unref(v$).cusPerOfSalAdvance.$error ? "p-invalid" : ""
            ]],
            style: { "width": "80px" }
          }, null, _parent));
          _push(`</div><label for="ingredient4" class="my-auto ml-2 fs-5">% Of Net salary</label></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
        if (unref(v$).perOfSalAdvance.$error) {
          _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).perOfSalAdvance.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(v$).cusPerOfSalAdvance.$error) {
          _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).cusPerOfSalAdvance.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><h1 class="my-3 mt-3 fs-4" style="${ssrRenderStyle({ "margin-top": "30px !important" })}">Deduction Method</h1><p class="my-2 fs-5">Please choose the method of deduction.</p><div class="card border-L"><div class="card-body"><div class="row"><div class="col-7 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).sa.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.deductMethod = $event,
          inputId: "ingredient1",
          name: "deductiomAmt",
          value: 1,
          class: [
            unref(v$).deductMethod.$error ? "p-invalid" : ""
          ]
        }, null, _parent));
        _push(`<label for="" class="mx-3 fs-5" style="${ssrRenderStyle({ "line-height": "25px" })}">Deduct the amount in the upcoming payroll.</label></div></div><div class="my-3 row"><div class="col-7 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).sa.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.deductMethod = $event,
          inputId: "ingredient1",
          name: "deductiomAmt",
          value: "afterPayroll",
          class: [
            unref(v$).deductMethod.$error ? "p-invalid" : ""
          ]
        }, null, _parent));
        _push(`<label for="" class="mx-3 fs-5">The deduction can be made over a period of `);
        _push(ssrRenderComponent(_component_InputNumber, {
          type: "text",
          class: ["mx-3", [
            unref(v$).cusDeductMethod.$error ? "p-invalid" : ""
          ]],
          modelValue: unref(salaryStore).sa.cusDeductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).sa.cusDeductMethod = $event,
          style: { "max-width": "100px" }
        }, null, _parent));
        _push(` months. </label></div></div><div class="row"><div class="col"><p class="text-gray-600 fs-5">(Note: Within the declared period of time, employees can choose the month in which the amount will be deducted.)</p></div></div>`);
        if (unref(v$).deductMethod.$error) {
          _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).deductMethod.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(v$).cusDeductMethod.$error) {
          _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).cusDeductMethod.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><h1 class="my-3 fs-4" style="${ssrRenderStyle({ "margin-top": "30px !important" })}">Approval Setting</h1><p class="my-2 fs-5">Please choose the approval flow for salary advance.</p><div class="card border-L"><div class="py-3 row"><div class="mx-1 my-3 col-3 d-flex align-items-center" style="${ssrRenderStyle({ "width": "220px" })}">`);
        _push(ssrRenderComponent(_component_P, { class: "mx-3 fs-5" }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`Employee Request `);
            } else {
              return [
                createTextVNode("Employee Request ")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`<i class="text-green-400 pi pi-angle-double-right fs-4"></i></div><div class="col"><div class="row"><div class="col d-flex"><div class="w-10 p-1 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: unref(salaryStore).selectedOption1,
          "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption1 = $event,
          editable: "",
          options: unref(salaryStore).filteredApprovalFlow,
          optionLabel: "name",
          placeholder: "Select",
          class: "w-full pl-2 md:w-14rem",
          onChange: ($event) => unref(salaryStore).toSelectoption(1, unref(salaryStore).selectedOption1)
        }, null, _parent));
        if (unref(salaryStore).selectedOption1) {
          _push(`<button class="mx-2"><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 0 && unref(salaryStore).option == 1) {
          _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option1 == 1) {
          _push(`<button class="ml-4 text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-angle-double-right fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 1) {
          _push(`<div class="col d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center col-8" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption2,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption2 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full md:w-14rem pl-0.5",
            onChange: ($event) => unref(salaryStore).toSelectoption(2, unref(salaryStore).selectedOption2)
          }, null, _parent));
          if (unref(salaryStore).option1 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
          if (unref(salaryStore).option2 == 0 && unref(salaryStore).option1 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          if (unref(salaryStore).option2 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="ml-4 pi pi-angle-double-right fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option2 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption3,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption3 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full pl-2 md:w-14rem",
            onChange: ($event) => unref(salaryStore).toSelectoption(3, unref(salaryStore).selectedOption3)
          }, null, _parent));
          if (unref(salaryStore).option2 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div>`);
        if (unref(v$).approvalflow.$error) {
          _push(`<span class="mx-2 font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).approvalflow.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="grid grid-cols-1 mt-[10px]"><div class="col">`);
      if (unref(salaryStore).create_new_from == "2") {
        _push(`<div class="d-flex justify-content-center">`);
        if (!unref(view_details)) {
          _push(`<button class="btn btn-border-primary">Cancel</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(view_details)) {
          _push(`<button class="mr-5 btn btn-border-primary">Back</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable === 0 && unref(view_details)) {
          _push(`<button class="btn btn-primary">Enable</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable == 1 && unref(view_details)) {
          _push(`<button class="btn btn-primary">Disable</button>`);
        } else {
          _push(`<!---->`);
        }
        if (!unref(view_details)) {
          _push(`<button class="mx-4 btn btn-primary">Save </button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(view_details)) {
          _push(`<button class="mx-4 btn btn-primary">Save changes</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/salary_advance/salary_advance.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {
  __name: "createNewInterestWithloan",
  __ssrInlineRender: true,
  setup(__props) {
    const salaryStore = salaryAdvanceSettingMainStore();
    loanSettingsStore();
    const opt = ref();
    ref([
      { id: 1, dep: "res" }
    ]);
    const CreateLoanWithNew = ref(2);
    onMounted(() => {
      opt.value = "Department";
      salaryStore.getClientsName("loan_with_int");
      salaryStore.getCurrentStatus("loan_with_int");
    });
    const rules = computed(() => {
      return {
        name: { required },
        selectClientID: { required },
        minEligibile: { required },
        loan_amt_interest: { required },
        maxTenure: { required },
        selectedOption1: { required }
      };
    });
    const v$ = useValidate(rules, salaryStore.lwif);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_RadioButton = resolveComponent("RadioButton");
      const _component_P = resolveComponent("P");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      if (CreateLoanWithNew.value == 2) {
        _push(`<div class="row"><div><div class="col-12"><div class="my-4 d-flex justify-content-between align-items-center w-[600px]"><h1 class="text-xl xl:text-2xl">Name of the Loan With Interest</h1><div class="position-relative">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          placeholder: "Give Salary Advance a Name",
          modelValue: unref(salaryStore).lwif.name,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.name = $event,
          class: ["w-[200px] d-flex justify-items-center md:w-18rem", [
            unref(v$).name.$error ? "p-invalid " : ""
          ]]
        }, null, _parent));
        if (unref(v$).name.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-12">${ssrInterpolate(unref(v$).name.required.$message.replace("Value", "Client Name"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><div class="flex justify-between items-center mt-2 w-[600px]"><h1 class="text-xl xl:text-2xl">Select organization</h1><div class="d-flex flex-col position-relative">`);
        if (!unref(salaryStore).EnableAndDisable) {
          _push(ssrRenderComponent(_component_MultiSelect, {
            modelValue: unref(salaryStore).lwif.selectClientID,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.selectClientID = $event,
            options: unref(salaryStore).ClientsName,
            optionLabel: "client_name",
            optionValue: "id",
            placeholder: "Select Branches",
            maxSelectedLabels: 3,
            class: ["w-[200px] md:w-18rem", [
              unref(v$).selectClientID.$error ? "p-invalid" : ""
            ]]
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        if (unref(v$).selectClientID.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).selectClientID.required.$message.replace("Value", "Client Name"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable) {
          _push(ssrRenderComponent(_component_InputText, {
            type: "text",
            placeholder: "Give Salary Advance a Name",
            disabled: "",
            modelValue: unref(salaryStore).lwif.selectClientID,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.selectClientID = $event,
            class: "w-full d-flex justify-items-center md:w-18rem"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><h1 class="mt-4 fs-4">Eligible Amount</h1><p class="my-2 fs-5">The employees not eligible for Interest Free Loan can also claim the Loan with Interest </p><div class="col-12"><div class="rounded-lg shadow-sm card border-L"><div class="card-body"><div class="row"><div class="col-12"><h1 class="fs-5">The employee must have served for a minimum of `);
        _push(ssrRenderComponent(_component_InputNumber, {
          inputId: "withoutgrouping",
          modelValue: unref(salaryStore).lwif.minEligibile,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.minEligibile = $event,
          useGrouping: false,
          style: { "max-width": "100px" },
          class: ["mx-2", [
            unref(v$).minEligibile.$error ? "p-invalid" : ""
          ]]
        }, null, _parent));
        if (unref(v$).minEligibile.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).minEligibile.required.$message.replace("Value", ""))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(` months </h1></div><div class="col-12"><h1 class="fs-5 d-flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).lwif.precent_Or_Amt,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.precent_Or_Amt = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: "percnt",
          class: "mx-3"
        }, null, _parent));
        _push(` years to avail the loan amount of `);
        if (unref(salaryStore).lwif.precent_Or_Amt == "percnt") {
          _push(ssrRenderComponent(_component_InputNumber, {
            inputId: "withoutgrouping",
            useGrouping: false,
            style: { "max-width": "100px" },
            class: "mx-2",
            modelValue: unref(salaryStore).lwif.availPerInCtc,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.availPerInCtc = $event
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_component_InputNumber, {
            inputId: "withoutgrouping",
            disabled: "",
            modelValue: unref(salaryStore).lwif.availPerInCtc,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.availPerInCtc = $event,
            style: { "max-width": "100px" },
            class: "mx-2",
            useGrouping: false
          }, null, _parent));
        }
        _push(` % of their CTC. </h1></div><div class="col-12 d-flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).lwif.precent_Or_Amt,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.precent_Or_Amt = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: "fixed",
          class: "mx-3"
        }, null, _parent));
        _push(`<h1 class="fs-5">Enter the maximum eligible amount of loan can be availed by the employees `);
        if (unref(salaryStore).lwif.precent_Or_Amt == "fixed") {
          _push(ssrRenderComponent(_component_InputNumber, {
            inputId: "withoutgrouping",
            modelValue: unref(salaryStore).lwif.max_loan_limit,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.max_loan_limit = $event,
            style: { "max-width": "100px" },
            class: "mx-2",
            useGrouping: false
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_component_InputNumber, {
            inputId: "withoutgrouping",
            disabled: "",
            modelValue: unref(salaryStore).lwif.max_loan_limit,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.max_loan_limit = $event,
            style: { "width": "100px" },
            useGrouping: false
          }, null, _parent));
        }
        _push(`</h1></div><div class="col-10"><p class="fs-6 clr-gray">(Note: This will be calculated based on the employee&#39;s date of joining.)</p></div></div></div></div></div><div class="col-12"><h1 class="fs-4 mt-[20px]">Interest</h1><p class="my-2 fs-5">Percentage of Interest </p><div class="card border-L"><div class="card-body"><div class="row"><div class="col-12"><h1 class="fs-5">Enter the percentage of interest for the loan `);
        _push(ssrRenderComponent(_component_InputNumber, {
          inputId: "withoutgrouping",
          modelValue: unref(salaryStore).lwif.loan_amt_interest,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.loan_amt_interest = $event,
          style: { "width": "100px" },
          class: ["mx-2", [
            unref(v$).loan_amt_interest.$error ? "p-invalid" : ""
          ]],
          minFractionDigits: 1,
          maxFractionDigits: 5
        }, null, _parent));
        if (unref(v$).loan_amt_interest.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).loan_amt_interest.required.$message.replace("Value", ""))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(` of the loan amount. </h1></div><div class="col-12"><p class="fs-6 clr-gray">(Note: Please ensure that the percentage entered for the loan interest rate is not higher than the current SBI lending rate.)</p></div></div></div></div></div><div class="col mt-[20px]"><h1 class="mt-2 fs-4">Deduction Method</h1><p class="my-2 fs-5">The EMI, or Equated Monthly Installment, is the sum of the principal amount borrowed and the interest charged on the loan.</p><div class="row px-2"><div class="shadow-sm card border-L rounded-top"><div class="card-body"><div class="row"><div class="col-6 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).lwif.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.deductMethod = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: 1
        }, null, _parent));
        _push(`<label for="" class="mx-2 fs-5 clr-dark" style="${ssrRenderStyle({ "line-height": "25px" })}">Begin deducting the EMI in the upcoming payroll.</label></div></div><div class="my-1 row"><div class="col-7 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).lwif.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.deductMethod = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: "emi"
        }, null, _parent));
        _push(`<label for="" class="mx-2 fs-5 clr-dark">Employee can select the month when they would like their EMI payments to begin </label></div></div>`);
        if (unref(salaryStore).lwif.deductMethod == "emi") {
          _push(`<div class="ml-1 row"><div class="ml-4 col"><h2 class="fs-5 clr-dark">The EMI deductions should begin within `);
          _push(ssrRenderComponent(_component_InputNumber, {
            inputId: "withoutgrouping",
            modelValue: unref(salaryStore).lwif.cusDeductMethod,
            "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.cusDeductMethod = $event,
            style: { "width": "100px" },
            class: "mx-2",
            useGrouping: false
          }, null, _parent));
          _push(` months from the date the loan is taken. </h2></div></div>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).lwif.deductMethod == "emi") {
          _push(`<div class="ml-1 row"><div class="ml-4 col"><p class="fs-6 clr-gray" style="${ssrRenderStyle({ "line-height": "14px" })}"> (Note: During the specified period, employees have the option to select the month in which they would like the EMI deductions to begin.)</p></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<div class="row"><div class="col"><p class="fs-5 clr-dark">Please specify the maximum duration or tenure for the employee to repay the loan amount `);
        _push(ssrRenderComponent(_component_InputNumber, {
          inputId: "withoutgrouping",
          modelValue: unref(salaryStore).lwif.maxTenure,
          "onUpdate:modelValue": ($event) => unref(salaryStore).lwif.maxTenure = $event,
          style: { "width": "100px" },
          class: ["mx-2", [
            unref(v$).maxTenure.$error ? "p-invalid" : ""
          ]],
          useGrouping: false
        }, null, _parent));
        if (unref(v$).maxTenure.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).maxTenure.required.$message.replace("Value", ""))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(` months </p></div></div></div></div></div></div><div class="col"></div><h1 class="my-3 fs-4" style="${ssrRenderStyle({ "margin-top": "30px !important" })}">Approval Setting</h1><p class="my-2 fs-5">Please choose the approval flow for Loan With Interest Feature.</p><div class="card border-L"><div class="py-3 row d-flex"><div class="my-3 col col-2 d-flex align-items-center" style="${ssrRenderStyle({ "width": "200px" })}">`);
        _push(ssrRenderComponent(_component_P, { class: "mx-2 text-[16px] w-[200px]" }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`Employee Request `);
            } else {
              return [
                createTextVNode("Employee Request ")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`<i class="text-green-400 pi pi-angle-double-right fs-4"></i></div><div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-1 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: unref(salaryStore).selectedOption1,
          "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption1 = $event,
          editable: "",
          options: unref(salaryStore).filteredApprovalFlow,
          optionLabel: "name",
          placeholder: "Select",
          class: ["w-full pl-2 md:w-14rem", [
            unref(v$).selectedOption1.$error ? "p-invalid" : ""
          ]],
          onChange: ($event) => unref(salaryStore).toSelectoption(1, unref(salaryStore).selectedOption1)
        }, null, _parent));
        if (unref(v$).selectedOption1.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14 mt-3">${ssrInterpolate(unref(v$).selectedOption1.required.$message.replace("Value", "Employee Request"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).selectedOption1) {
          _push(`<button class="mx-2"><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 0 && unref(salaryStore).option == 1) {
          _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option1 == 1) {
          _push(`<button class="ml-4 text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-angle-double-right fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center col-8" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption2,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption2 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full md:w-14rem pl-0.5",
            onChange: ($event) => unref(salaryStore).toSelectoption(2, unref(salaryStore).selectedOption2)
          }, null, _parent));
          if (unref(salaryStore).option1 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
          if (unref(salaryStore).option2 == 0 && unref(salaryStore).option1 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          if (unref(salaryStore).option2 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="ml-4 pi pi-angle-double-right fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option2 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption3,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption3 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full pl-2 md:w-14rem",
            onChange: ($event) => unref(salaryStore).toSelectoption(3, unref(salaryStore).selectedOption3)
          }, null, _parent));
          if (unref(salaryStore).option2 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div></div><div class="row mt-[12px]"><div class="col"><div class="flex justify-center align-middle">`);
        if (!unref(salaryStore).EnableAndDisable) {
          _push(`<button class="btn btn-border-primary">Cancel</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable) {
          _push(`<button class="btn btn-border-primary mx-2">back</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable === 0) {
          _push(`<button class="btn btn btn-primary">Enable</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable == 1) {
          _push(`<button class="btn btn btn-primary">Disable</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable === "") {
          _push(`<button class="mx-4 btn btn-primary">Save</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (CreateLoanWithNew.value == 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div>`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/loan_with_interest/createNewInterestWithloan.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const loan_with_interest_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
  __name: "loan_with_interest",
  __ssrInlineRender: true,
  setup(__props) {
    const salaryStore = salaryAdvanceSettingMainStore();
    loanSettingsStore();
    salaryStore.getClientsName("loan_with_int");
    salaryStore.getCurrentStatus("loan_with_int");
    salaryStore.getInterestFreeAndInterestWithLoanHistory("InterestWithLoan");
    const opt = ref();
    ref([
      { id: 1, dep: "res" }
    ]);
    const CreateLoanWithNewFrom = ref(1);
    onMounted(() => {
      opt.value = "Department";
      salaryStore.getClientsName("loan_with_int");
      salaryStore.getCurrentStatus("loan_with_int");
    });
    const rules = computed(() => {
      return {
        selectClientID: { required },
        minEligibile: { required },
        loan_amt_interest: { required },
        maxTenure: { required },
        selectedOption1: { required }
      };
    });
    useValidate(rules, salaryStore.lwif);
    function selectClientId(data) {
      salaryStore.sendClient_code(data);
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_MultiSelect = resolveComponent("MultiSelect");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "px-2" }, _attrs))}><div class="row d-flex justify-content-start align-items-center">`);
      if (CreateLoanWithNewFrom.value == 1) {
        _push(`<div class="d-flex"><div class="col-3 d-flex align-items-center justify-content-start" style="${ssrRenderStyle({ "position": "relative", "left": "-8px" })}"><h1 class="text-xl xl:text-2xl">Loan With interest Feature</h1></div><div class="col"><button class="${ssrRenderClass([[unref(salaryStore).isLoanWithInterestFeature === 1 ? "bg-white text-black border-[1px] border-black" : "text-white"], "orange_btn"])}">Disabled</button><button class="${ssrRenderClass([[unref(salaryStore).isLoanWithInterestFeature === 1 ? "bg-green-700 text-white border-[1px] border-black" : ""], "Enable_btn"])}">Enable</button></div><div class="col">`);
        if (CreateLoanWithNewFrom.value == 1) {
          _push(`<button class="rounded-md text-white bg-blue-800 px-4 py-2 float-right"><i class="pi pi-plus mx-1"></i> Create New From </button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (CreateLoanWithNewFrom.value == 1) {
        _push(`<div class="col">`);
        if (unref(salaryStore).isLoanWithInterestFeature == 0 || unref(salaryStore).isLoanWithInterestFeature == null) {
          _push(`<p class="fs-5"> Please click the &quot;Enable&quot; button to activate the Loan With interest Feature for use within your organization.</p>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).isLoanWithInterestFeature == "1") {
          _push(`<p class="fs-5">Please click the &quot;Disable&quot; button to deactivate the Loan With interest Feature.</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<div class="row d-flex justify-items-center align-items-center"><div class="col-3"><h1 class="fs-4">Select organization</h1></div><div class="col">`);
        _push(ssrRenderComponent(_component_MultiSelect, {
          modelValue: unref(salaryStore).client_name_status,
          "onUpdate:modelValue": ($event) => unref(salaryStore).client_name_status = $event,
          options: unref(salaryStore).ClientsName,
          optionLabel: "client_name",
          trueValue: 1,
          falseValue: 0,
          optionValue: "id",
          placeholder: "Select Branches",
          maxSelectedLabels: 3,
          class: "md:w-30rem",
          onChange: ($event) => selectClientId("loan_with_int")
        }, null, _parent));
        _push(`</div></div><div class="row ml-1 mr-3 mt-2"><!--[-->`);
        ssrRenderList(unref(salaryStore).interestwithLoanHistory, (item, index) => {
          _push(`<div class="col-12 border-1 rounded-md h-[100px] d-flex flex-column align-items-center justify-content-between p-3 even-card shadow-sm mb-2 blink"><div class="row w-full"><div class="col-4"><h1 class="text-[15px]">Settings Name : ${ssrInterpolate(item.name)}</h1></div><div class="col-4"><h1 class="text-[15px] text-center">Client Name: ${ssrInterpolate(item.client_name)}</h1></div><div class="col-4"><button class="underline text-blue-400 fs-5 float-right">View Details</button></div></div><div class="row w-full"><div class="col-4"><h1 class="text-[15px]">${ssrInterpolate(item.dedction_period)} months.</h1></div><div class="col-4"><h1 class="text-[15px] text-center">Loan Amount Interest : ${ssrInterpolate(item.setting_prev_details.loan_amt_interest)} %</h1></div><div class="col-4">`);
          if (item.setting_prev_details.loan_applicable_type == "percnt") {
            _push(`<h1 class="text-[15px] text-right">${ssrInterpolate(item.loan_type)} : ${ssrInterpolate(item.perct)}%</h1>`);
          } else {
            _push(`<!---->`);
          }
          if (item.setting_prev_details.loan_applicable_type == "fixed") {
            _push(`<h1 class="text-[15px] text-right">maximum Loan Amount: ${ssrInterpolate(item.setting_prev_details.max_loan_amount)}</h1>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div></div><div class="w-100 d-flex justify-content-between align-items-center"></div><div class="w-100 d-flex justify-content-between align-items-center"><div></div><div></div></div></div>`);
        });
        _push(`<!--]--></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (CreateLoanWithNewFrom.value == 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/loan_with_interest/loan_with_interest.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "create_new_interest_free_loan",
  __ssrInlineRender: true,
  setup(__props) {
    const salaryStore = salaryAdvanceSettingMainStore();
    loanSettingsStore();
    const interest_free_loans = ref(2);
    const rules = computed(() => {
      return {
        name: { required },
        selectClientID: { required },
        minEligibile: { required },
        maxTenure: { required },
        selectedOption1: { required }
      };
    });
    const v$ = useValidate(rules, salaryStore.ifl);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_RadioButton = resolveComponent("RadioButton");
      const _component_P = resolveComponent("P");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<!--[-->`);
      if (interest_free_loans.value == 2) {
        _push(`<div><div class="my-4 flex justify-between w-[600px]"><h1 class="text-xl xl:text-2xl">Name of the Interest Free Loan</h1><div class="">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          placeholder: "Name of Interest free loan",
          modelValue: unref(salaryStore).ifl.name,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.name = $event,
          class: ["d-flex justify-items-center w-[200px] md:w-18rem", [
            unref(v$).name.$error ? "p-invalid" : ""
          ]]
        }, null, _parent));
        if (unref(v$).name.$error) {
          _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).name.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><div class="flex justify-between items-center mt-5 w-[600px]"><h1 class="text-xl xl:text-2xl">Select organization</h1><div class=""><div class="d-flex flex-col position-relative">`);
        if (!unref(salaryStore).EnableAndDisable) {
          _push(ssrRenderComponent(_component_MultiSelect, {
            modelValue: unref(salaryStore).ifl.selectClientID,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.selectClientID = $event,
            options: unref(salaryStore).ClientsName,
            optionLabel: "client_name",
            optionValue: "id",
            placeholder: "Select Branches",
            maxSelectedLabels: 3,
            class: ["w-[200px] md:w-24rem", [
              unref(v$).selectClientID.$error ? "p-invalid" : ""
            ]]
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        if (unref(v$).selectClientID.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).selectClientID.required.$message.replace("Value", "Client Name"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable) {
          _push(ssrRenderComponent(_component_InputText, {
            type: "text",
            placeholder: "Name of Interest free loan",
            disabled: "",
            modelValue: unref(salaryStore).ifl.selectClientID,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.selectClientID = $event,
            class: "w-full d-flex justify-items-center md:w-18rem"
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div><div class="col"><h1 class="mt-10 fs-4">Eligible Employees and Amount</h1><p class="mt-3 fs-5">The employee&#39;s eligibility for the loan amount can be determined based on the number of years they have served in the organization.</p></div><div class="col-12"><div class="rounded-lg shadow-sm card border-L"><div class="card-body"><div class="row"><div class="col-12"><h1 class="fs-5">The employee must have served for a minimum of `);
        _push(ssrRenderComponent(_component_InputNumber, {
          modelValue: unref(salaryStore).ifl.minEligibile,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.minEligibile = $event,
          inputId: "withoutgrouping",
          useGrouping: false,
          class: [
            unref(v$).minEligibile.$error ? "p-invalid" : ""
          ]
        }, null, _parent));
        if (unref(v$).minEligibile.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).minEligibile.required.$message.replace("Value", ""))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(` months </h1></div><div class="col-12"><h1 class="fs-5 d-flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ifl.precent_Or_Amt,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.precent_Or_Amt = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: "percnt",
          class: "mx-3"
        }, null, _parent));
        _push(` years to avail the loan amount of `);
        if (unref(salaryStore).ifl.precent_Or_Amt == "percnt") {
          _push(ssrRenderComponent(_component_InputNumber, {
            style: { "max-width": "100px" },
            modelValue: unref(salaryStore).ifl.availPerInCtc,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.availPerInCtc = $event,
            modelModifiers: { number: true },
            inputId: "withoutgrouping",
            useGrouping: false,
            class: "mx-2"
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_component_InputNumber, {
            disabled: "",
            style: { "max-width": "100px" },
            modelValue: unref(salaryStore).ifl.availPerInCtc,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.availPerInCtc = $event,
            modelModifiers: { number: true },
            inputId: "withoutgrouping",
            useGrouping: false,
            class: "mx-2"
          }, null, _parent));
        }
        _push(` % of their CTC. </h1></div><div class="col-12 d-flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ifl.precent_Or_Amt,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.precent_Or_Amt = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: "fixed",
          class: "mx-3"
        }, null, _parent));
        _push(`<h1 class="fs-5">Enter the maximum eligible amount of loan can be availed by the employees `);
        if (unref(salaryStore).ifl.precent_Or_Amt == "fixed") {
          _push(ssrRenderComponent(_component_InputNumber, {
            modelValue: unref(salaryStore).ifl.max_loan_limit,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.max_loan_limit = $event,
            inputId: "withoutgrouping",
            useGrouping: false,
            class: "mx-2"
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_component_InputNumber, {
            disabled: "",
            modelValue: unref(salaryStore).ifl.max_loan_limit,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.max_loan_limit = $event,
            inputId: "withoutgrouping",
            useGrouping: false,
            class: "mx-2"
          }, null, _parent));
        }
        _push(`</h1></div><div class="col-10"><p class="fs-6 clr-gray">(Note: This will be calculated based on the employee&#39;s date of joining.)</p></div></div></div></div></div><div class="col"><h1 class="mt-2 fs-4">Deduction Method</h1><p class="my-2 fs-5">In the case of an interest-free loan, the EMI would only consist of repayment of the principal amount borrowed, and no interest would be charged.</p><div class="row"><div class="shadow-sm card border-L rounded-top"><div class="card-body"><div class="row"><div class="col-7 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ifl.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.deductMethod = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: 1
        }, null, _parent));
        _push(`<label for="" class="mx-3 fs-5 clr-dark" style="${ssrRenderStyle({ "line-height": "25px" })}">Begin deducting the EMI in the upcoming payroll.</label></div></div><div class="my-1 row"><div class="col-7 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ifl.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.deductMethod = $event,
          inputId: "ingredient1",
          name: "dectmeth",
          value: "emi"
        }, null, _parent));
        _push(`<label for="" class="mx-3 fs-5 clr-dark">Employee can select the month when they would like their EMI payments to begin </label></div></div>`);
        if (unref(salaryStore).ifl.deductMethod == "emi") {
          _push(`<div class="ml-1 row"><div class="ml-4 col"><h2 class="fs-5 clr-dark">The EMI deductions should begin within `);
          _push(ssrRenderComponent(_component_InputText, {
            type: "text",
            modelValue: unref(salaryStore).ifl.cusDeductMethod,
            "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.cusDeductMethod = $event,
            style: { "max-width": "100px" },
            class: "mx-2"
          }, null, _parent));
          _push(`months from the date the loan is taken. </h2></div></div>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).ifl.deductMethod == "emi") {
          _push(`<div class="ml-1 row"><div class="ml-4 col"><p class="fs-6 clr-gray" style="${ssrRenderStyle({ "line-height": "14px" })}"> (Note: During the specified period, employees have the option to select the month in which they would like the EMI deductions to begin.)</p></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<div class="row"><div class="col"><p class="fs-5 clr-dark">Please specify the maximum duration or tenure for the employee to repay the loan amount `);
        _push(ssrRenderComponent(_component_InputNumber, {
          modelValue: unref(salaryStore).ifl.maxTenure,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ifl.maxTenure = $event,
          inputId: "withoutgrouping",
          useGrouping: false,
          class: ["mx-2", [
            unref(v$).maxTenure.$error ? "p-invalid" : ""
          ]]
        }, null, _parent));
        if (unref(v$).maxTenure.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14">${ssrInterpolate(unref(v$).maxTenure.required.$message.replace("Value", "maximum duration"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(` months </p></div></div></div></div></div></div><div class="col"><h1 class="my-3 fs-4" style="${ssrRenderStyle({ "margin-top": "30px !important" })}">Approval Setting</h1><p class="my-2 fs-5">Please choose the approval flow for Interest Free Loan Feature.</p><div class="card border-L"><div class="py-3 row d-flex"><div class="my-3 col col-2 d-flex align-items-center" style="${ssrRenderStyle({ "width": "200px" })}">`);
        _push(ssrRenderComponent(_component_P, { class: "text-[18px] w-[200px]" }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`Employee Request `);
            } else {
              return [
                createTextVNode("Employee Request ")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`<i class="text-green-400 pi pi-angle-double-right fs-4"></i></div><div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-1 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: unref(salaryStore).selectedOption1,
          "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption1 = $event,
          editable: "",
          options: unref(salaryStore).filteredApprovalFlow,
          optionLabel: "name",
          placeholder: "Select",
          class: ["w-full pl-2 md:w-14rem", [
            unref(v$).selectedOption1.$error ? "p-invalid" : ""
          ]],
          onChange: ($event) => unref(salaryStore).toSelectoption(1, unref(salaryStore).selectedOption1)
        }, null, _parent));
        if (unref(v$).selectedOption1.$error) {
          _push(`<span class="text-red-400 fs-6 font-semibold position-absolute top-14 mt-3">${ssrInterpolate(unref(v$).selectedOption1.required.$message.replace("Value", "Employee Request"))}</span>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).selectedOption1) {
          _push(`<button class="mx-2"><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 0 && unref(salaryStore).option == 1) {
          _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option1 == 1) {
          _push(`<button class="ml-4 text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-angle-double-right fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center col-8" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption2,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption2 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full md:w-14rem pl-0.5",
            onChange: ($event) => unref(salaryStore).toSelectoption(2, unref(salaryStore).selectedOption2)
          }, null, _parent));
          if (unref(salaryStore).option1 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
          if (unref(salaryStore).option2 == 0 && unref(salaryStore).option1 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          if (unref(salaryStore).option2 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="ml-4 pi pi-angle-double-right fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option2 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption3,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption3 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full pl-2 md:w-14rem",
            onChange: ($event) => unref(salaryStore).toSelectoption(3, unref(salaryStore).selectedOption3)
          }, null, _parent));
          if (unref(salaryStore).option2 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div><div class="row mt-[12px]"><div class="col"><div class="flex justify-center align-middle">`);
        if (!unref(salaryStore).EnableAndDisable) {
          _push(`<button class="btn btn-border-primary">Cancel</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable) {
          _push(`<button class="btn btn-border-primary mx-2">back</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable === 0) {
          _push(`<button class="btn btn btn-primary mx-2">Enable</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable == 1) {
          _push(`<button class="btn btn btn-primary">Disable</button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).EnableAndDisable === "") {
          _push(`<button class="mx-4 btn btn-primary">Save</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (interest_free_loans.value == 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/interest_free_loan/create_new_interest_free_loan.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const interest_free_loan_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
  __name: "interest_free_loan",
  __ssrInlineRender: true,
  setup(__props) {
    const salaryStore = salaryAdvanceSettingMainStore();
    ref(false);
    const CreateLoanFreeNewFrom = ref(1);
    ref();
    loanSettingsStore();
    onMounted(() => {
      salaryStore.getClientsName("int_free_loan");
      salaryStore.getCurrentStatus("int_free_loan");
      salaryStore.getInterestFreeAndInterestWithLoanHistory("InterestFreeLoan");
    });
    ref();
    ref(["Off", "On"]);
    ref();
    ref("");
    const opt = ref();
    ref([
      { id: 1, dep: "res" }
    ]);
    onMounted(() => {
      opt.value = "Department";
    });
    const rules = computed(() => {
      return {
        name: { required },
        selectClientID: { required },
        minEligibile: { required },
        maxTenure: { required },
        selectedOption1: { required }
      };
    });
    useValidate(rules, salaryStore.ifl);
    function selectClientId(data) {
      salaryStore.sendClient_code(data);
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_MultiSelect = resolveComponent("MultiSelect");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "px-2" }, _attrs))}><div class="row d-flex justify-content-start align-items-center">`);
      if (CreateLoanFreeNewFrom.value == 1) {
        _push(`<div class="d-flex"><div class="col-3 d-flex align-items-center justify-content-start" style="${ssrRenderStyle({ "position": "relative", "left": "-8px" })}"><h1 class="text-xl xl:text-2xl">Loan Free interest Feature</h1></div><div class="col"><button class="${ssrRenderClass([[unref(salaryStore).isInterestFreeLoanFeature === 1 ? "bg-white text-black border-[1px] border-black" : "text-white"], "orange_btn"])}">Disabled</button><button class="${ssrRenderClass([[unref(salaryStore).isInterestFreeLoanFeature === 1 ? "bg-green-700 text-white" : ""], "Enable_btn"])}">Enable</button></div><div class="col">`);
        if (CreateLoanFreeNewFrom.value == 1) {
          _push(`<button class="rounded-md text-white bg-blue-800 px-4 py-2 float-right"><i class="pi pi-plus mx-1"></i> Create New From </button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (CreateLoanFreeNewFrom.value == 1) {
        _push(`<div class="col">`);
        if (unref(salaryStore).isInterestFreeLoanFeature == 0 || unref(salaryStore).isInterestFreeLoanFeature == null) {
          _push(`<p class="fs-5"> Please click the &quot;Enable&quot; button to activate the Loan With interest Feature for use within your organization.</p>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).isInterestFreeLoanFeature == "1") {
          _push(`<p class="fs-5">Please click the &quot;Disable&quot; button to deactivate the Loan With interest Feature.</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (CreateLoanFreeNewFrom.value == 1 && unref(salaryStore).isInterestFreeLoanFeature == "1") {
        _push(`<div class=""><div class="row d-flex justify-items-center align-items-center"><div class="col-3"><h1 class="fs-4">Select organization</h1></div><div class="col">`);
        _push(ssrRenderComponent(_component_MultiSelect, {
          modelValue: unref(salaryStore).client_name_status,
          "onUpdate:modelValue": ($event) => unref(salaryStore).client_name_status = $event,
          options: unref(salaryStore).ClientsName,
          optionLabel: "client_name",
          trueValue: 1,
          falseValue: 0,
          optionValue: "id",
          placeholder: "Select Branches",
          maxSelectedLabels: 3,
          class: "md:w-18rem",
          onChange: ($event) => selectClientId("int_free_loan")
        }, null, _parent));
        _push(`</div></div><div class="row ml-1 mr-3 mt-2"><!--[-->`);
        ssrRenderList(unref(salaryStore).interestFreeLoanHistory, (item, index) => {
          _push(`<div class="col-12 border-1 rounded-md h-[100px] d-flex flex-column align-items-center justify-content-between p-3 even-card shadow-sm mb-2 blink"><div class="row w-full"><div class="col-4"><h1 class="text-[15px]">Settings Name : ${ssrInterpolate(item.name)}</h1></div><div class="col-4"><h1 class="text-[15px] text-center">Client Name: ${ssrInterpolate(item.client_name)}</h1></div><div class="col-4"><button class="underline text-blue-400 text-[15px] float-right">View Details</button></div></div><div class="row w-full"><div class="col-4"><div class="d-flex justify-content-start"><h1 class="text-[15px] text-left mb-2">${ssrInterpolate(item.dedction_period)} months. </h1></div></div><div class="col-4">`);
          if (item.setting_prev_details.active == 1) {
            _push(`<h1 class="text-[15px] text-green-500 text-center">Active</h1>`);
          } else {
            _push(`<!---->`);
          }
          if (item.setting_prev_details.active == 0) {
            _push(`<h1 class="text-[15px] text-red-500 text-center">Disable</h1>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div><div class="col-4">`);
          if (item.setting_prev_details.loan_applicable_type == "percnt") {
            _push(`<h1 class="text-[15px] float-right">${ssrInterpolate(item.loan_type)} : ${ssrInterpolate(item.perct)}%</h1>`);
          } else {
            _push(`<!---->`);
          }
          if (item.setting_prev_details.loan_applicable_type == "fixed") {
            _push(`<h1 class="text-[15px] float-right">maximum Loan Amount: ${ssrInterpolate(item.setting_prev_details.max_loan_amount)}</h1>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div></div></div>`);
        });
        _push(`<!--]--></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (CreateLoanFreeNewFrom.value == 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/interest_free_loan/interest_free_loan.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const travel_advance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "travel_advance",
  __ssrInlineRender: true,
  setup(__props) {
    const salaryStore = salaryAdvanceSettingMainStore();
    const filters = ref({
      "global": { value: null, matchMode: FilterMatchMode.CONTAINS }
    });
    const value = ref();
    ref(["Off", "On"]);
    const dialog_ViewExample_Visible = ref(false);
    ref(1);
    const activetab1 = ref(1);
    ref("");
    const opt = ref();
    ref([{ id: 1, dep: "res" }]);
    onMounted(() => {
      opt.value = "Department";
      opt1.value = "Designation";
      opt2.value = "Location";
      opt3.value = "State";
      opt4.value = "Branch";
      opt5.value = "Legal Entity";
    });
    const sample = ref(
      [
        { id: 1, selected: "Yes", ta: "50,000", "bs": "56,000", epa: "6,000" },
        { id: 2, selected: "Yes", ta: "50,000", "bs": "48,000", epa: "-2000" },
        { id: 3, selected: "No", ta: "50,000", "bs": "56,000", epa: "56,000" }
      ]
    );
    const opt1 = ref();
    const opt2 = ref();
    const opt3 = ref();
    const opt4 = ref();
    const opt5 = ref();
    ref();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_RadioButton = resolveComponent("RadioButton");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_P = resolveComponent("P");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "px-5" }, _attrs))}><div class="row d-flex justify-content-start align-items-center"><div class="mt-4 d-flex"><div class="col-3 fs-4" style="${ssrRenderStyle({ "position": "relative", "left": "-8px" })}"><h1 class="fw-bolder">Travel Advance Feature</h1></div><div class="col"><button class="${ssrRenderClass([[
        unref(salaryStore).isTravelAdvanceFeatureEnabled === 2 ? "bg-white text-black border-1 border-black" : "text-white"
      ], "orange_btn"])}"> Disabled </button><button class="${ssrRenderClass([[
        unref(salaryStore).isTravelAdvanceFeatureEnabled === 2 ? "bg-green-700 text-white" : ""
      ], "Enable_btn"])}"> Enable </button></div></div>`);
      if (unref(salaryStore).isTravelAdvanceFeatureEnabled == "1") {
        _push(`<div class="col"><div><p class="fs-5"> Please click the &quot;Enable&quot; button to activate the Travel Advance Feature for use within your organization. </p></div></div>`);
      } else {
        _push(`<div class="row"><div class="col-10"><p class="fs-5"> Please click the &quot;Disable&quot; button to deactivate the Travel Advance Feature. </p><h1 class="mt-10 fs-4 fw-bolder">Eligible Employees</h1><p class="my-2 fs-5"> Kindly choose the employees who are eligible for the Travel Advance Feature. </p></div><div class="col-12"><div class="rounded-lg shadow-sm card"><div class="card-body" style="${ssrRenderStyle({ "border-top": "4px solid var(--navy)", "border-radius": "4px 4px 0 0" })}"><div class="row"><div class="col-9"><h1 style="${ssrRenderStyle({ "border-left": "4px solid var(--orange)", "padding-left": "15px", "font-size": "18px" })}"> Employees</h1></div><div class="col-3"><span class="p-input-icon-left"><i class="pi pi-search"></i>`);
        _push(ssrRenderComponent(_component_InputText, {
          placeholder: "Search",
          modelValue: filters.value["global"].value,
          "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
          class: "border-color",
          style: { "height": "3em" }
        }, null, _parent));
        _push(`</span></div><div class="col-12"><div class="col-12"><div class="px-2 row"><div class="col"><div style="${ssrRenderStyle({ "padding": "10px" })}" class="border rounded d-flex justify-content-start align-items-center border-color"><input type="checkbox" class="mr-3" style="${ssrRenderStyle({ "width": "20px", "height": "20px" })}"><h1>Clear Filters</h1></div></div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt.value,
          "onUpdate:modelValue": ($event) => opt.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.department,
          optionLabel: "name",
          optionValue: "id",
          onChange: ($event) => unref(salaryStore).getSelectoption("department", opt.value),
          placeholder: "Department",
          class: "w-full text-red-500 md: border-color"
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt1.value,
          "onUpdate:modelValue": ($event) => opt1.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.designation,
          optionLabel: "designation",
          optionValue: "designation",
          placeholder: "Designation",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("designation", opt1.value)
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt2.value,
          "onUpdate:modelValue": ($event) => opt2.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.location,
          optionLabel: "work_location",
          optionValue: "work_location",
          placeholder: "Location",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("work_location", opt2.value)
        }, null, _parent));
        _push(`</div><div class="col">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: opt3.value,
          "onUpdate:modelValue": ($event) => opt3.value = $event,
          editable: "",
          options: unref(salaryStore).dropdownFilter.state,
          optionLabel: "state_name",
          optionValue: "id",
          placeholder: "State",
          class: "w-full text-red-500 md: border-color",
          onChange: ($event) => unref(salaryStore).getSelectoption("state", opt3.value)
        }, null, _parent));
        _push(`</div><div class="col"></div></div></div></div></div>`);
        _push(ssrRenderComponent(_component_DataTable, {
          ref: "dt",
          dataKey: "user_code",
          paginator: true,
          rows: 10,
          value: unref(salaryStore).eligbleEmployeeSource,
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          filters: filters.value,
          selection: unref(salaryStore).sa.eligibleEmployee,
          "onUpdate:selection": ($event) => unref(salaryStore).sa.eligibleEmployee = $event,
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                selectionMode: "multiple",
                headerStyle: "width: 1.5rem"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "user_code",
                header: "Employee Name",
                style: { "min-width": "8rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "name",
                header: "Employee Name",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "department_name",
                header: "Department ",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "designation",
                header: "Designation ",
                style: { "min-width": "20rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "work_location",
                header: "Location ",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "client_name",
                header: "Legal Entity",
                style: { "min-width": "20rem" }
              }, null, _parent2, _scopeId));
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
        }, _parent));
        _push(`</div></div></div><div class="col"><h1 class="my-3 fs-4 fw-bolder">Travel Advance Limit</h1><p class="my-2 fs-5"> What is the maximum Limit for the travel allowance that can be availed. </p><div class="shadow-sm card border-L rounded-top"><div class="card-body"><div class="row justify-content-start align-items-center"><div class="col-6 fs-5"> Is there a maximium limit on the travel allowance that can be availed? </div><div class="col-1"><div class="flex flex-wrap gap-3"><div class="flex justify-content-center align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ta.tdl,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.tdl = $event,
          inputId: "ingredient1",
          name: "limit",
          value: "1"
        }, null, _parent));
        _push(`<label for="ingredient1" class="ml-2 fs-5">Yes</label></div></div></div><div class="col-1"><div class="flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ta.tdl,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.tdl = $event,
          inputId: "ingredient2",
          name: "limit",
          value: "0"
        }, null, _parent));
        _push(`<label for="ingredient2" class="ml-2 fs-5">No</label></div></div>`);
        if (activetab1.value == "2") {
          _push(`<div class="col-12"><label for="" class="fs-5">Enter the maximum amount can be availed per month `);
          _push(ssrRenderComponent(_component_InputText, {
            type: "text",
            class: "mx-3",
            modelValue: value.value,
            "onUpdate:modelValue": ($event) => value.value = $event,
            style: { "max-width": "100px" }
          }, null, _parent));
          _push(`</label></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div><h1 class="my-3 fs-3 fw-bolder" style="${ssrRenderStyle({ "margin-top": "30px !important" })}"> Deduction </h1><p class="my-2 fs-5">Please choose the method of deduction.</p><div class="card border-L"><div class="card-body"><div class="row"><div class="col"><h1 class="fs-5"> Is this advance can be decducted from claim </h1></div><div class="col-1"><div class="flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ta.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.deductMethod = $event,
          inputId: "ingredient2",
          name: "pizza",
          value: "1"
        }, null, _parent));
        _push(`<label for="ingredient2" class="ml-2 fs-5">yes</label></div></div><div class="col-1"><div class="flex align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ta.deductMethod,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.deductMethod = $event,
          inputId: "ingredient2",
          name: "pizza",
          value: "0"
        }, null, _parent));
        _push(`<label for="ingredient2" class="ml-2 fs-5">No</label></div></div><div class="col d-flex align-items-center fs-5 txt_underline"><h1 class="text-primary"> View Example </h1></div><template><div class="flex card justify-content-center">`);
        _push(ssrRenderComponent(_component_Button, {
          label: "Show",
          icon: "pi pi-external-link"
        }, null, _parent));
        _push(ssrRenderComponent(_component_Dialog, {
          visible: dialog_ViewExample_Visible.value,
          "onUpdate:visible": ($event) => dialog_ViewExample_Visible.value = $event,
          modal: "",
          header: "Header",
          style: { width: "60vw" }
        }, {
          header: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var(--orange)", "padding-left": "8px" })}" class="fs-4"${_scopeId}>Travel Advance Deduction Example</h1></div>`);
            } else {
              return [
                createVNode("div", null, [
                  createVNode("h1", {
                    style: { "border-left": "3px solid var(--orange)", "padding-left": "8px" },
                    class: "fs-4"
                  }, "Travel Advance Deduction Example")
                ])
              ];
            }
          }),
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div class="card"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_DataTable, {
                value: sample.value,
                rowGroupMode: "rowspan",
                groupRowsBy: "selected",
                sortField: "selected",
                showGridlines: ""
              }, {
                body: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}><tbody${_scopeId2}><tr${_scopeId2}><td${_scopeId2}></td></tr></tbody></div>`);
                  } else {
                    return [
                      createVNode("div", null, [
                        createVNode("tbody", null, [
                          createVNode("tr", null, [
                            createVNode("td")
                          ])
                        ])
                      ])
                    ];
                  }
                }),
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "selected",
                      header: "if Selected",
                      class: "bg-light"
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "ta",
                      header: "Travel Advance "
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "bs",
                      header: "Bills Submited"
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "epa",
                      header: "Payable Amount to the Employee"
                    }, {
                      body: withCtx((slotprops, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          if (slotprops.data.epa == "56,000") {
                            _push4(`<div${_scopeId3}>${ssrInterpolate(slotprops.data.epa)} <br${_scopeId3}><span${_scopeId3}>(Note: The Total amount be will Deducted in FNF)</span></div>`);
                          } else {
                            _push4(`<!---->`);
                          }
                          if (slotprops.data.epa == "6,000") {
                            _push4(`<div${_scopeId3}>${ssrInterpolate(slotprops.data.epa)} <br${_scopeId3}><span${_scopeId3}>(Note: Total amount be will refunded in subsequent payroll)</span></div>`);
                          } else {
                            _push4(`<!---->`);
                          }
                          if (slotprops.data.epa == "-2000") {
                            _push4(`<div${_scopeId3}>${ssrInterpolate(slotprops.data.epa)} <br${_scopeId3}><span${_scopeId3}>(Note: The Total amount be will Deducted in subsequent Payroll)</span></div>`);
                          } else {
                            _push4(`<!---->`);
                          }
                        } else {
                          return [
                            slotprops.data.epa == "56,000" ? (openBlock(), createBlock("div", { key: 0 }, [
                              createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                              createVNode("br"),
                              createVNode("span", null, "(Note: The Total amount be will Deducted in FNF)")
                            ])) : createCommentVNode("", true),
                            slotprops.data.epa == "6,000" ? (openBlock(), createBlock("div", { key: 1 }, [
                              createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                              createVNode("br"),
                              createVNode("span", null, "(Note: Total amount be will refunded in subsequent payroll)")
                            ])) : createCommentVNode("", true),
                            slotprops.data.epa == "-2000" ? (openBlock(), createBlock("div", { key: 2 }, [
                              createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                              createVNode("br"),
                              createVNode("span", null, "(Note: The Total amount be will Deducted in subsequent Payroll)")
                            ])) : createCommentVNode("", true)
                          ];
                        }
                      }),
                      _: 1
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode(_component_Column, {
                        field: "selected",
                        header: "if Selected",
                        class: "bg-light"
                      }),
                      createVNode(_component_Column, {
                        field: "ta",
                        header: "Travel Advance "
                      }),
                      createVNode(_component_Column, {
                        field: "bs",
                        header: "Bills Submited"
                      }),
                      createVNode(_component_Column, {
                        field: "epa",
                        header: "Payable Amount to the Employee"
                      }, {
                        body: withCtx((slotprops) => [
                          slotprops.data.epa == "56,000" ? (openBlock(), createBlock("div", { key: 0 }, [
                            createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                            createVNode("br"),
                            createVNode("span", null, "(Note: The Total amount be will Deducted in FNF)")
                          ])) : createCommentVNode("", true),
                          slotprops.data.epa == "6,000" ? (openBlock(), createBlock("div", { key: 1 }, [
                            createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                            createVNode("br"),
                            createVNode("span", null, "(Note: Total amount be will refunded in subsequent payroll)")
                          ])) : createCommentVNode("", true),
                          slotprops.data.epa == "-2000" ? (openBlock(), createBlock("div", { key: 2 }, [
                            createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                            createVNode("br"),
                            createVNode("span", null, "(Note: The Total amount be will Deducted in subsequent Payroll)")
                          ])) : createCommentVNode("", true)
                        ]),
                        _: 1
                      })
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              return [
                createVNode("div", { class: "card" }, [
                  createVNode(_component_DataTable, {
                    value: sample.value,
                    rowGroupMode: "rowspan",
                    groupRowsBy: "selected",
                    sortField: "selected",
                    showGridlines: ""
                  }, {
                    body: withCtx(() => [
                      createVNode("div", null, [
                        createVNode("tbody", null, [
                          createVNode("tr", null, [
                            createVNode("td")
                          ])
                        ])
                      ])
                    ]),
                    default: withCtx(() => [
                      createVNode(_component_Column, {
                        field: "selected",
                        header: "if Selected",
                        class: "bg-light"
                      }),
                      createVNode(_component_Column, {
                        field: "ta",
                        header: "Travel Advance "
                      }),
                      createVNode(_component_Column, {
                        field: "bs",
                        header: "Bills Submited"
                      }),
                      createVNode(_component_Column, {
                        field: "epa",
                        header: "Payable Amount to the Employee"
                      }, {
                        body: withCtx((slotprops) => [
                          slotprops.data.epa == "56,000" ? (openBlock(), createBlock("div", { key: 0 }, [
                            createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                            createVNode("br"),
                            createVNode("span", null, "(Note: The Total amount be will Deducted in FNF)")
                          ])) : createCommentVNode("", true),
                          slotprops.data.epa == "6,000" ? (openBlock(), createBlock("div", { key: 1 }, [
                            createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                            createVNode("br"),
                            createVNode("span", null, "(Note: Total amount be will refunded in subsequent payroll)")
                          ])) : createCommentVNode("", true),
                          slotprops.data.epa == "-2000" ? (openBlock(), createBlock("div", { key: 2 }, [
                            createTextVNode(toDisplayString(slotprops.data.epa) + " ", 1),
                            createVNode("br"),
                            createVNode("span", null, "(Note: The Total amount be will Deducted in subsequent Payroll)")
                          ])) : createCommentVNode("", true)
                        ]),
                        _: 1
                      })
                    ]),
                    _: 1
                  }, 8, ["value"])
                ])
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div></template></div></div></div><h1 class="mt-4 mb-4 fs-4 fw-bolder">Claim Settings</h1><div class="card border-L"><div class="card-body"><div class="row"><div class="col-6 d-flex justify-content-start align-items-center"><h1 class="fs-5"> is it for employess to submit bills or receipt to clam travel allowances? </h1></div><div class="col-1 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ta.claimBill,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.claimBill = $event,
          inputId: "ingredient2",
          name: "pizza",
          value: "1"
        }, null, _parent));
        _push(`<label for="ingredient2" class="ml-2 fs-5">yes</label></div><div class="col-1 d-flex justify-content-start align-items-center">`);
        _push(ssrRenderComponent(_component_RadioButton, {
          modelValue: unref(salaryStore).ta.claimBill,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.claimBill = $event,
          inputId: "ingredient2",
          name: "pizza",
          value: "1"
        }, null, _parent));
        _push(`<label for="ingredient2" class="ml-2 fs-5">No</label></div></div><div class="row"><div class="col-10 d-flex justify-content-start align-items-center"><p class="fs-5"> The employees Sumbit the bills within `);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          class: "mx-3",
          modelValue: unref(salaryStore).ta.sumbitWithIn,
          "onUpdate:modelValue": ($event) => unref(salaryStore).ta.sumbitWithIn = $event,
          style: { "max-width": "100px" }
        }, null, _parent));
        _push(` months for the date of travel advance. </p></div><div class="col-12 d-flex justify-content-start align-items-center"><input type="checkbox" class="mr-4" style="${ssrRenderStyle({ "width": "20px", "height": "20px" })}" name="" id=""${ssrIncludeBooleanAttr(Array.isArray(unref(salaryStore).ta.isDeductedInsubsequentpayroll) ? ssrLooseContain(unref(salaryStore).ta.isDeductedInsubsequentpayroll, null) : unref(salaryStore).ta.isDeductedInsubsequentpayroll) ? " checked" : ""}><p class="fs-5"> If bills are by the employee within the above timeframe, the amount can be deducted from the employee&#39;s subsequent payroll. </p></div></div></div></div><h1 class="my-3 fs-4 fw-bolder" style="${ssrRenderStyle({ "margin-top": "30px !important" })}"> Approval Setting </h1><p class="my-2 fs-5"> Please choose the approval flow for Travel Advance. </p><div class="card border-L"><div class="py-3 row d-flex"><div class="my-3 col col-2 d-flex align-items-center" style="${ssrRenderStyle({ "width": "200px" })}">`);
        _push(ssrRenderComponent(_component_P, { class: "mx-3 fs-5" }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`Employee Request `);
            } else {
              return [
                createTextVNode("Employee Request ")
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`<i class="text-green-400 pi pi-angle-double-right fs-4"></i></div><div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-1 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
        _push(ssrRenderComponent(_component_Dropdown, {
          modelValue: unref(salaryStore).selectedOption1,
          "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption1 = $event,
          editable: "",
          options: unref(salaryStore).filteredApprovalFlow,
          optionLabel: "name",
          placeholder: "Select",
          class: "w-full pl-2 md:w-14rem",
          onChange: ($event) => unref(salaryStore).toSelectoption(1, unref(salaryStore).selectedOption1)
        }, null, _parent));
        if (unref(salaryStore).selectedOption1) {
          _push(`<button class="mx-2"><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 0 && unref(salaryStore).option == 1) {
          _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option1 == 1) {
          _push(`<button class="ml-4 text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-angle-double-right fs-4"></i></button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(salaryStore).option1 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center col-8" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption2,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption2 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full md:w-14rem pl-0.5",
            onChange: ($event) => unref(salaryStore).toSelectoption(2, unref(salaryStore).selectedOption2)
          }, null, _parent));
          if (unref(salaryStore).option1 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
          if (unref(salaryStore).option2 == 0 && unref(salaryStore).option1 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="pi pi-plus-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          if (unref(salaryStore).option2 == 1) {
            _push(`<button class="text-green-400" style="${ssrRenderStyle({ "width": "40px" })}"><i class="ml-4 pi pi-angle-double-right fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
        } else {
          _push(`<!---->`);
        }
        if (unref(salaryStore).option2 == 1) {
          _push(`<div class="col col-3 d-flex" style="${ssrRenderStyle({ "width": "280px" })}"><div class="w-10 p-2 ml-2 rounded bg-slate-200 d-flex align-items-center" style="${ssrRenderStyle({ "width": "225px !important" })}">`);
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(salaryStore).selectedOption3,
            "onUpdate:modelValue": ($event) => unref(salaryStore).selectedOption3 = $event,
            editable: "",
            options: unref(salaryStore).filteredApprovalFlow,
            optionLabel: "name",
            placeholder: "Select",
            class: "w-full pl-2 md:w-14rem",
            onChange: ($event) => unref(salaryStore).toSelectoption(3, unref(salaryStore).selectedOption3)
          }, null, _parent));
          if (unref(salaryStore).option2 == 1) {
            _push(`<button><i class="ml-2 text-red-400 pi pi-times-circle fs-4"></i></button>`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div></div></div>`);
      }
      _push(`</div><div class="row"><div class="col">`);
      if (unref(salaryStore).isTravelAdvanceFeatureEnabled == "2") {
        _push(`<div class="float-right"><button class="btn btn-border-primary">Cancel</button><button class="mx-4 btn btn-primary"> Save Changes </button></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/travel_advance/travel_advance.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const salary_loan_setting_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "salary_loan_setting",
  __ssrInlineRender: true,
  setup(__props) {
    const activetab = ref(1);
    const useSalaryStore = salaryAdvanceSettingMainStore();
    onMounted(() => {
      useSalaryStore.getDropdownFilterDetails();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<!--[-->`);
      if (unref(useSalaryStore).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white w-[100%] h-[100%]" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div style="${ssrRenderStyle({ "position": "relative" })}"><div class="row"><div class="col-6"><h1 class="mb-4 fs-4 d-flex align-items-center" style="${ssrRenderStyle({ "color": "#003056" })}"> Salary Advance &amp; Loan Settings</h1></div></div><div class="p-4 pt-1 pb-0 mb-3 mr-4 bg-white rounded-lg tw-card left-line w-[98%]"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-2 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? "active" : ""], "nav-link"])}"> Salary Advance </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Interest Free Loan </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 3 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Travel Advance </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 4 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Loan With Interest </a></li></ul></div><div class="tab-content" id=""><div><div class="card-body">`);
      if (activetab.value === 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
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
        _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(useSalaryStore).canShowPopup,
        "onUpdate:visible": ($event) => unref(useSalaryStore).canShowPopup = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "40vw" },
        modal: true,
        closable: true,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` . `);
          } else {
            return [
              createTextVNode(" . ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="text-center"${_scopeId}><i class="m-auto my-2 text-center text-green-400 pi pi-check-circle" style="${ssrRenderStyle({ "font-size": "5rem" })}"${_scopeId}></i></p><p class="font-semibold text-center fs-4"${_scopeId}>Submission Successfull</p><!--[-->`);
            ssrRenderList(unref(useSalaryStore).AssignedClients, (option) => {
              _push2(`<ul${_scopeId}><li class="my-2.5 text-medium"${_scopeId}>${ssrInterpolate(option)}</li></ul>`);
            });
            _push2(`<!--]-->`);
          } else {
            return [
              createVNode("p", { class: "text-center" }, [
                createVNode("i", {
                  class: "m-auto my-2 text-center text-green-400 pi pi-check-circle",
                  style: { "font-size": "5rem" }
                })
              ]),
              createVNode("p", { class: "font-semibold text-center fs-4" }, "Submission Successfull"),
              (openBlock(true), createBlock(Fragment, null, renderList(unref(useSalaryStore).AssignedClients, (option) => {
                return openBlock(), createBlock("ul", { key: option }, [
                  createVNode("li", { class: "my-2.5 text-medium" }, toDisplayString(option), 1)
                ]);
              }), 128))
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/salary_loan_setting.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
const pinia = createPinia();
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.use(ToastService);
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
app.component("OrganizationChart", OrganizationChart);
app.mount("#SalaryAdvanceLoan");
