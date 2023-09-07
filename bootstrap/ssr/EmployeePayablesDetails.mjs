/* empty css                        *//* empty css                               *//* empty css                             *//* empty css                           */import { useSSRContext, resolveComponent, mergeProps, withCtx, createVNode, ref, onMounted, unref, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderComponent, ssrRenderClass } from "vue/server-renderer";
import { _ as _export_sfc } from "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
import axios from "axios";
const summary_vue_vue_type_style_index_0_lang = "";
const summary_vue_vue_type_style_index_1_scoped_d1af3d40_lang = "";
const _sfc_main$6 = {};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs) {
  const _component_DataTable = resolveComponent("DataTable");
  const _component_Column = resolveComponent("Column");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "h-full w-full" }, _attrs))} data-v-d1af3d40><div class="card-body d-flex justify-content-between align-items-center py-2 mt-2 w-full" data-v-d1af3d40><div class="flex justify-start w-full" data-v-d1af3d40><div class="" data-v-d1af3d40><div class="shadow-sm bg-white rounded-md mr-2 h-[150px] w-[320px] 2xl:w-[383px]" data-v-d1af3d40><div class="h-[50px] px-2 d-flex align-items-center" style="${ssrRenderStyle({ "background-color": "#fff" })}" data-v-d1af3d40><p class="fs-5" data-v-d1af3d40>Bank Transfer</p></div><div class="flex justify-content-between align-items-start p-3 h-[135px] rounded-b-md" style="${ssrRenderStyle({ "background-color": "#E6E6E6" })}" data-v-d1af3d40><div data-v-d1af3d40><p class="text-[12px] md:text-[13px] xl:text-[16px]" data-v-d1af3d40>Default Batch for Bank Transfer</p><p class="text-[12px] md:text-[13px] xl:text-[16px] text-gray-700 mt-2" data-v-d1af3d40>188 Employees</p></div><div data-v-d1af3d40><button class="bg-gray-200 p-2 rounded-md shadow-md mt-2 w-[90px] text-[12px] xl:text-[13px]" data-v-d1af3d40>Not Paid</button></div></div></div><div class="bg-white shadow-sm p-3 mt-16 h-26 w-[320px] 2xl:w-[383px]" data-v-d1af3d40><p class="text-[14px] xl:text-[16px] mb-2 font-semibold" data-v-d1af3d40>Salary to be Paid</p><div class="d-flex justify-content-between align-items-center w-full" data-v-d1af3d40><p class="text-[13px] xl:text-[14px] text-left font-medium" data-v-d1af3d40>Total Employees</p><p class="text-right font-semibold" data-v-d1af3d40>188</p></div><div class="border-b-2 w-full my-[16px]" data-v-d1af3d40></div><div class="grid grid-cols-2 mt-2" data-v-d1af3d40><p class="text-[14px] font-medium" style="${ssrRenderStyle({ "color": "#535353" })}" data-v-d1af3d40>Bank Transfer</p><p class="text-[16px] text-right font-semibold" data-v-d1af3d40>INR 6,40,800</p><p class="text-gray col-span-3 text-center" data-v-d1af3d40>+</p><p class="text-[14px] font-medium" style="${ssrRenderStyle({ "color": "#535353" })}" data-v-d1af3d40>Cash Payment</p><p class="text-[16px] text-right font-semibold" data-v-d1af3d40>INR 0</p><p class="text-gray col-span-3 text-center" data-v-d1af3d40>+</p><p class="text-[14px] font-medium" style="${ssrRenderStyle({ "color": "#535353" })}" data-v-d1af3d40>cheque Payments</p><p class="text-[16px] text-right font-semibold" data-v-d1af3d40>INR 0</p><p class="text-gray col-span-3 text-center" data-v-d1af3d40>=</p><p class="text-[14px] font-medium" style="${ssrRenderStyle({ "color": "#535353" })}" data-v-d1af3d40>Salaries to be Paid</p><p class="text-[16px] text-right font-semibold" data-v-d1af3d40>INR 1,15,40,800</p></div></div></div><div class="border ml-2 xl:w-[100%] xxl:w-full" style="${ssrRenderStyle({ "background-color": "#E6E6E6" })}" data-v-d1af3d40>`);
  _push(ssrRenderComponent(_component_DataTable, {
    ref: "dt",
    dataKey: "user_code",
    paginator: true,
    rows: 10,
    paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
    rowsPerPageOptions: [5, 10, 25],
    filters: _ctx.filters,
    currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
    responsiveLayout: "scroll",
    class: "!min-w-full !max-w-full"
  }, {
    default: withCtx((_, _push2, _parent2, _scopeId) => {
      if (_push2) {
        _push2(ssrRenderComponent(_component_Column, {
          selectionMode: "multiple",
          headerStyle: "width: 1.5rem"
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "user_code",
          header: "Bank Name",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "user_code",
          header: "Total Amount",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "name",
          header: "Employees",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Download",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
      } else {
        return [
          createVNode(_component_Column, {
            selectionMode: "multiple",
            headerStyle: "width: 1.5rem"
          }),
          createVNode(_component_Column, {
            field: "user_code",
            header: "Bank Name",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "user_code",
            header: "Total Amount",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "name",
            header: "Employees",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Download",
            style: { "min-width": "8rem" }
          })
        ];
      }
    }),
    _: 1
  }, _parent));
  _push(`</div></div></div></div>`);
}
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/BankTransferSummary/summary.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const summaryvue = /* @__PURE__ */ _export_sfc(_sfc_main$6, [["ssrRender", _sfc_ssrRender$3], ["__scopeId", "data-v-d1af3d40"]]);
const _sfc_main$5 = {};
function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs) {
  const _component_DataTable = resolveComponent("DataTable");
  const _component_Column = resolveComponent("Column");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-[12px]" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_DataTable, {
    ref: "dt",
    dataKey: "user_code",
    paginator: true,
    rows: 10,
    paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
    rowsPerPageOptions: [5, 10, 25],
    filters: _ctx.filters,
    currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
    responsiveLayout: "scroll",
    class: "!min-w-full !max-w-full"
  }, {
    default: withCtx((_, _push2, _parent2, _scopeId) => {
      if (_push2) {
        _push2(ssrRenderComponent(_component_Column, {
          selectionMode: "multiple",
          headerStyle: "width: 1.5rem"
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "name",
          header: "Employees",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "loan_req_id",
          header: "Loan Req ID",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "nature_of_payment",
          header: "Nature of Payments",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "amt_borrow",
          header: "Amount",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "loan_req_date",
          header: "Initiate Date",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "bank",
          header: "Bank Details",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Download",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Action",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
      } else {
        return [
          createVNode(_component_Column, {
            selectionMode: "multiple",
            headerStyle: "width: 1.5rem"
          }),
          createVNode(_component_Column, {
            field: "name",
            header: "Employees",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "loan_req_id",
            header: "Loan Req ID",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "nature_of_payment",
            header: "Nature of Payments",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "amt_borrow",
            header: "Amount",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "loan_req_date",
            header: "Initiate Date",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "bank",
            header: "Bank Details",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Download",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Action",
            style: { "min-width": "8rem" }
          })
        ];
      }
    }),
    _: 1
  }, _parent));
  _push(`</div>`);
}
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/BankTransferSummary/Payment_Initiated.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const payment_initiated = /* @__PURE__ */ _export_sfc(_sfc_main$5, [["ssrRender", _sfc_ssrRender$2]]);
const _sfc_main$4 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
  const _component_DataTable = resolveComponent("DataTable");
  const _component_Column = resolveComponent("Column");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-[12px]" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_DataTable, {
    ref: "dt",
    dataKey: "user_code",
    paginator: true,
    rows: 10,
    paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
    rowsPerPageOptions: [5, 10, 25],
    filters: _ctx.filters,
    currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
    responsiveLayout: "scroll",
    class: "!min-w-full !max-w-full"
  }, {
    default: withCtx((_, _push2, _parent2, _scopeId) => {
      if (_push2) {
        _push2(ssrRenderComponent(_component_Column, {
          selectionMode: "multiple",
          headerStyle: "width: 1.5rem"
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "name",
          header: "Employees",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "loan_req_id",
          header: "Loan Req ID",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "nature_of_payment",
          header: "Nature of Payments",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "amt_borrow",
          header: "Amount",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "loan_req_date",
          header: "Initiate Date",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "bank",
          header: "Bank Details",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Download",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Action",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
      } else {
        return [
          createVNode(_component_Column, {
            selectionMode: "multiple",
            headerStyle: "width: 1.5rem"
          }),
          createVNode(_component_Column, {
            field: "name",
            header: "Employees",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "loan_req_id",
            header: "Loan Req ID",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "nature_of_payment",
            header: "Nature of Payments",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "amt_borrow",
            header: "Amount",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "loan_req_date",
            header: "Initiate Date",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "bank",
            header: "Bank Details",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Download",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Action",
            style: { "min-width": "8rem" }
          })
        ];
      }
    }),
    _: 1
  }, _parent));
  _push(`</div>`);
}
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/BankTransferSummary/payment_paid.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const payment_paid = /* @__PURE__ */ _export_sfc(_sfc_main$4, [["ssrRender", _sfc_ssrRender$1]]);
const _sfc_main$3 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  const _component_DataTable = resolveComponent("DataTable");
  const _component_Column = resolveComponent("Column");
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-[12px]" }, _attrs))}>`);
  _push(ssrRenderComponent(_component_DataTable, {
    ref: "dt",
    dataKey: "user_code",
    paginator: true,
    rows: 10,
    paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
    rowsPerPageOptions: [5, 10, 25],
    filters: _ctx.filters,
    currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
    responsiveLayout: "scroll",
    class: "!min-w-full !max-w-full"
  }, {
    default: withCtx((_, _push2, _parent2, _scopeId) => {
      if (_push2) {
        _push2(ssrRenderComponent(_component_Column, {
          selectionMode: "multiple",
          headerStyle: "width: 1.5rem"
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "name",
          header: "Employees",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "loan_req_id",
          header: "Loan Req ID",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "nature_of_payment",
          header: "Nature of Payments",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "amt_borrow",
          header: "Amount",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "loan_req_date",
          header: "Initiate Date",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "bank",
          header: "Bank Details",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Download",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
        _push2(ssrRenderComponent(_component_Column, {
          field: "department_name",
          header: "Action",
          style: { "min-width": "8rem" }
        }, null, _parent2, _scopeId));
      } else {
        return [
          createVNode(_component_Column, {
            selectionMode: "multiple",
            headerStyle: "width: 1.5rem"
          }),
          createVNode(_component_Column, {
            field: "name",
            header: "Employees",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "loan_req_id",
            header: "Loan Req ID",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "nature_of_payment",
            header: "Nature of Payments",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "amt_borrow",
            header: "Amount",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "loan_req_date",
            header: "Initiate Date",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "bank",
            header: "Bank Details",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Download",
            style: { "min-width": "8rem" }
          }),
          createVNode(_component_Column, {
            field: "department_name",
            header: "Action",
            style: { "min-width": "8rem" }
          })
        ];
      }
    }),
    _: 1
  }, _parent));
  _push(`</div>`);
}
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/BankTransferSummary/payment_Rejected.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const payment_Rejected = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["ssrRender", _sfc_ssrRender]]);
const EmployeePayables = defineStore("employeePayables", () => {
  const arrayPending = ref();
  async function getPendingStatus() {
    await axios.get("/get-pending-requested-for-loan-and-advance").then((res) => {
      arrayPending.value = res.data;
      console.log(arrayPending.value);
    }).finally(() => {
    });
  }
  return {
    arrayPending,
    getPendingStatus
  };
});
const _sfc_main$2 = {
  __name: "paymentPending",
  __ssrInlineRender: true,
  setup(__props) {
    const useStorePayables = EmployeePayables();
    onMounted(() => {
      useStorePayables.getPendingStatus();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-[12px]" }, _attrs))}>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(useStorePayables).arrayPending,
        ref: "dt",
        dataKey: "user_code",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        filters: _ctx.filters,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll",
        class: "!min-w-full !max-w-full"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              selectionMode: "multiple",
              headerStyle: "width: 1.5rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "name",
              header: "Employees",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "loan_req_id",
              header: "Loan Req ID",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "nature_of_payment",
              header: "Nature of Payments",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "amt_borrow",
              header: "Amount",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "loan_req_date",
              header: "Initiate Date",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "bank",
              header: "Bank Details",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "department_name",
              header: "Download",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "department_name",
              header: "Action",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                selectionMode: "multiple",
                headerStyle: "width: 1.5rem"
              }),
              createVNode(_component_Column, {
                field: "name",
                header: "Employees",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "loan_req_id",
                header: "Loan Req ID",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "nature_of_payment",
                header: "Nature of Payments",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "amt_borrow",
                header: "Amount",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "loan_req_date",
                header: "Initiate Date",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "bank",
                header: "Bank Details",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "department_name",
                header: "Download",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "department_name",
                header: "Action",
                style: { "min-width": "8rem" }
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/BankTransferSummary/paymentPending.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const EmployeeSummary_vue_vue_type_style_index_0_scoped_6e068add_lang = "";
const _sfc_main$1 = {
  __name: "EmployeeSummary",
  __ssrInlineRender: true,
  setup(__props) {
    const selectedCities = ref();
    const activetab = ref(1);
    const cities = ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    const toggleClass = ref("downloaded");
    const btn_download = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_InputText = resolveComponent("InputText");
      _push(`<div${ssrRenderAttrs(_attrs)} data-v-6e068add><div class="w-full flex justify-between align-middle mt-[14px]" data-v-6e068add><div class="d-flex align-items-center flex-wrap" data-v-6e068add><h1 class="text-black text-[14px] tracking-wide" style="${ssrRenderStyle({ "font-weight": "500 !important" })}" data-v-6e068add>Total :<span data-v-6e068add>188</span></h1>`);
      _push(ssrRenderComponent(_component_MultiSelect, {
        modelValue: selectedCities.value,
        "onUpdate:modelValue": ($event) => selectedCities.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "Business Unit",
        maxSelectedLabels: 3,
        class: "w-full md:w-14rem h-10 mx-[10px]"
      }, null, _parent));
      _push(ssrRenderComponent(_component_MultiSelect, {
        modelValue: selectedCities.value,
        "onUpdate:modelValue": ($event) => selectedCities.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "Department",
        maxSelectedLabels: 3,
        class: "w-full md:w-14rem h-10 mx-[10px]"
      }, null, _parent));
      _push(ssrRenderComponent(_component_MultiSelect, {
        modelValue: selectedCities.value,
        "onUpdate:modelValue": ($event) => selectedCities.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "Location",
        maxSelectedLabels: 3,
        class: "w-full md:w-14rem h-10 mx-[10px]"
      }, null, _parent));
      _push(`</div></div><div style="${ssrRenderStyle({ "position": "relative" })}" class="" data-v-6e068add><div class="d-flex justify-content-between align-items-center w-full" data-v-6e068add><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed border-none border-0" id="pills-tab" role="tablist" data-v-6e068add><li class="nav-item" role="presentation" data-v-6e068add><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? " text-black" : " text-gray-500"], "px-2 position-relative border-0"])}" data-v-6e068add> Pending </a>`);
      if (activetab.value === 1) {
        _push(`<div class="border-3 h-1 rounded-l-3xl border-orange-400" data-v-6e068add></div>`);
      } else {
        _push(`<div class="border-3 h-1 rounded-l-3xl border-gray-400" data-v-6e068add></div>`);
      }
      _push(`</li><li class="nav-item position-relative border-0" role="presentation" data-v-6e068add><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? " text-black" : " text-gray-500"], "text-center px-2 border-0"])}" role="tab" aria-controls="" aria-selected="true" data-v-6e068add> Payment Initiated </a>`);
      if (activetab.value === 2) {
        _push(`<div class="border-3 h-1 border-orange-400 position-absolute left-0 w-12" data-v-6e068add></div>`);
      } else {
        _push(`<div class="border-3 h-1 border-gray-400" data-v-6e068add></div>`);
      }
      _push(`</li><li class="nav-item position-relative border-0" role="presentation" data-v-6e068add><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 3 ? " text-black" : " text-gray-500"], "text-center px-2 border-0"])}" role="tab" aria-controls="" aria-selected="true" data-v-6e068add> Paid </a>`);
      if (activetab.value === 3) {
        _push(`<div class="border-3 h-1 border-orange-400 position-absolute left-0 w-12" data-v-6e068add></div>`);
      } else {
        _push(`<div class="border-3 h-1 border-gray-400" data-v-6e068add></div>`);
      }
      _push(`</li><li class="nav-item position-relative border-0" role="presentation" data-v-6e068add><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 4 ? " text-black" : " text-gray-500"], "text-center px-2 border-0"])}" role="tab" aria-controls="" aria-selected="true" data-v-6e068add> Rejected </a>`);
      if (activetab.value === 4) {
        _push(`<div class="border-3 h-1 rounded-r-3xl border-orange-400 position-absolute left-0 w-12" data-v-6e068add></div>`);
      } else {
        _push(`<div class="border-3 h-1 rounded-r-3xl border-gray-400" data-v-6e068add></div>`);
      }
      _push(`</li></ul><div class="w-4 d-flex justify-content-center align-items-center" data-v-6e068add><div class="mx-2" data-v-6e068add><span class="p-input-icon-left" data-v-6e068add><i class="pi pi-search" data-v-6e068add></i>`);
      _push(ssrRenderComponent(_component_InputText, {
        placeholder: "Search",
        class: "",
        style: { "height": "3em" }
      }, null, _parent));
      _push(`</span></div><button class="rounded-md px-4 py-1 border fs-6 h-10" data-v-6e068add><div id="btn-download" style="${ssrRenderStyle({ "position": "absolute", "right": "0" })}" class="${ssrRenderClass([btn_download.value == true ? toggleClass.value : "toggleClass", "toggleClass"])}" data-v-6e068add><svg width="22px" height="16px" viewBox="0 0 22 16" data-v-6e068add><path d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15" id="check" data-v-6e068add></path><polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out" data-v-6e068add></polyline><path d="M8,1 L8,11" class="svg-out" data-v-6e068add></path></svg></div><p class="position-relative left-2" data-v-6e068add>Download</p></button></div></div><div class="tab-content" id="" data-v-6e068add><div data-v-6e068add><div class="card-body" data-v-6e068add>`);
      if (activetab.value === 1) {
        _push(`<div data-v-6e068add>`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 2) {
        _push(`<div data-v-6e068add>`);
        _push(ssrRenderComponent(payment_initiated, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 3) {
        _push(`<div data-v-6e068add>`);
        _push(ssrRenderComponent(payment_paid, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 4) {
        _push(`<div data-v-6e068add>`);
        _push(ssrRenderComponent(payment_Rejected, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/BankTransferSummary/EmployeeSummary.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const EmployeeSummary = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["__scopeId", "data-v-6e068add"]]);
const EmployeePayablesDetails_vue_vue_type_style_index_0_scoped_b561616f_lang = "";
const _sfc_main = {
  __name: "EmployeePayablesDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const activetab = ref(1);
    const view_Details = ref(1);
    const employee_viewDetails = ref(1);
    ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    const toggleClass = ref("downloaded");
    const btn_download = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 mt-4" }, _attrs))} data-v-b561616f><h1 class="fs-2 font-semibold" data-v-b561616f>Employee Payables - Jun 2023</h1>`);
      if (activetab.value === 1) {
        _push(`<div class="flex justify-content-between align-items-center" data-v-b561616f><p class="fs-5 my-2" style="${ssrRenderStyle({ "font-size": "14px" })}" data-v-b561616f>Payment Batches</p><div class="d-flex justify-content-end align-items-center" style="${ssrRenderStyle({ "width": "200px" })}" data-v-b561616f>`);
        if (view_Details.value == 2) {
          _push(`<button class="mx-4" data-v-b561616f><i class="pi pi-times fs-5" data-v-b561616f></i></button>`);
        } else {
          _push(`<!---->`);
        }
        if (view_Details.value == 1) {
          _push(`<button class="underline text-blue-700 text-[16px]" style="${ssrRenderStyle({ "color": "#0873CD", "font-weight": "550" })}" data-v-b561616f>View Details</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 2) {
        _push(`<div class="flex justify-content-between align-items-center" data-v-b561616f><p class="fs-5 my-2" style="${ssrRenderStyle({ "font-size": "14px" })}" data-v-b561616f>Payment Batches</p><div class="d-flex justify-content-end align-items-center" style="${ssrRenderStyle({ "width": "200px" })}" data-v-b561616f>`);
        if (employee_viewDetails.value == 2) {
          _push(`<button class="mx-4" data-v-b561616f><i class="pi pi-times fs-5" data-v-b561616f></i></button>`);
        } else {
          _push(`<!---->`);
        }
        if (employee_viewDetails.value == 1) {
          _push(`<button class="underline text-blue-700 text-[16px]" style="${ssrRenderStyle({ "color": "#0873CD", "font-weight": "550" })}" data-v-b561616f>View Details</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (view_Details.value == 2) {
        _push(`<div class="card" data-v-b561616f><div class="flex justify-between align-middle border-b-2 pb-1 p-3" data-v-b561616f><div class="" data-v-b561616f><p class="text-[16px]" data-v-b561616f>Default batch for Bank Transfer</p><p class="text-[14px] text-gray-400 mt-1" data-v-b561616f>Default batch for salary</p></div><div class="d-flex justify-content-center align-items-center position-relative" data-v-b561616f><button class="rounded-md px-4 py-1 border border-blue-600 text-blue-600 fs-6 h-10" data-v-b561616f><p class="position-relative right-3" data-v-b561616f>Download</p><div id="btn-download" style="${ssrRenderStyle({ "position": "absolute", "right": "0" })}" class="${ssrRenderClass([btn_download.value == true ? toggleClass.value : "toggleClass", "toggleClass"])}" data-v-b561616f><svg width="22px" height="16px" viewBox="0 0 22 16" data-v-b561616f><path d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15" id="check" data-v-b561616f></path><polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out" data-v-b561616f></polyline><path d="M8,1 L8,11" class="svg-out" data-v-b561616f></path></svg></div></button><button class="bg-blue-600 text-white px-4 py-1 rounded-md h-10 mx-2" data-v-b561616f>Mask As Paid</button><button class="mx-1" data-v-b561616f><i class="pi pi-ellipsis-v text-blue-600" data-v-b561616f></i></button></div></div><div class="flex justify-between" data-v-b561616f><div class="grid grid-cols-6 w-full p-4 b" data-v-b561616f><div data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Employees</p><span class="" data-v-b561616f>188</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Total Amount</p><span class="" data-v-b561616f>INR 1,15,35,494</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Account Number</p><span class="" data-v-b561616f>188</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Bank Name</p><span class="" data-v-b561616f>188</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>IFSC Code</p><span class="" data-v-b561616f>HDFCC0001234</span></div><div class="d-flex flex-column align-items-center justify-content-center" style="${ssrRenderStyle({ "position": "relative" })}" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Transfer Statement</p><div class="flex" data-v-b561616f><button class="mx-1 text-blue-600 font-semibold text-[13px] lg:text-[14px] d-flex justify-content-center align-items-center" data-v-b561616f><span class="text-[13px] lg:text-[14px]" data-v-b561616f>TEXT</span><i class="pi pi-angle-down px-2" data-v-b561616f></i></button><button class="mx-1 text-blue-600 font-semibold text-[13px] lg:text-[14px] d-flex justify-content-center align-items-center" data-v-b561616f><span class="text-[13px] lg:text-[14px]" data-v-b561616f>EXCEL</span><i class="pi pi-angle-down px-2" data-v-b561616f></i></button><button class="mx-1 text-blue-600 font-semibold text-[13px] lg:text-[14px] d-flex justify-content-center align-items-center" data-v-b561616f><span class="text-[13px] lg:text-[14px]" data-v-b561616f>PDF</span><i class="pi pi-angle-down px-2" data-v-b561616f></i></button></div></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (employee_viewDetails.value == 2) {
        _push(`<div class="card" data-v-b561616f><div class="flex justify-between align-middle border-b-2 pb-1 p-3" data-v-b561616f><div class="" data-v-b561616f><p class="text-[16px]" data-v-b561616f>Default batch for Bank Transfer</p><p class="text-[14px] text-gray-400 mt-1" data-v-b561616f>Default batch for salary</p></div><div class="d-flex justify-content-center align-items-center position-relative" data-v-b561616f><button class="rounded-md px-4 py-1 border border-blue-600 text-blue-600 fs-6 h-10" data-v-b561616f><p class="position-relative right-3" data-v-b561616f>Download</p><div id="btn-download" style="${ssrRenderStyle({ "position": "absolute", "right": "0" })}" class="${ssrRenderClass([btn_download.value == true ? toggleClass.value : "toggleClass", "toggleClass"])}" data-v-b561616f><svg width="22px" height="16px" viewBox="0 0 22 16" data-v-b561616f><path d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15" id="check" data-v-b561616f></path><polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out" data-v-b561616f></polyline><path d="M8,1 L8,11" class="svg-out" data-v-b561616f></path></svg></div></button><button class="bg-blue-600 text-white px-4 py-1 rounded-md h-10 mx-2" data-v-b561616f>Mask As Paid</button><button class="mx-1" data-v-b561616f><i class="pi pi-ellipsis-v text-blue-600" data-v-b561616f></i></button></div></div><div class="flex justify-between" data-v-b561616f><div class="grid grid-cols-6 w-full p-4 b" data-v-b561616f><div data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Employees</p><span class="" data-v-b561616f>188</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Total Amount</p><span class="" data-v-b561616f>INR 1,15,35,494</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Account Number</p><span class="" data-v-b561616f>188</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Bank Name</p><span class="" data-v-b561616f>188</span></div><div class="" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>IFSC Code</p><span class="" data-v-b561616f>HDFCC0001234</span></div><div class="d-flex flex-column align-items-center justify-content-center" style="${ssrRenderStyle({ "position": "relative" })}" data-v-b561616f><p class="text-gray-700 text-[13px] lg:text-[14px] mb-2" data-v-b561616f>Transfer Statement</p><div class="flex" data-v-b561616f><button class="mx-1 text-blue-600 font-semibold text-[13px] lg:text-[14px] d-flex justify-content-center align-items-center" data-v-b561616f><span class="text-[13px] lg:text-[14px]" data-v-b561616f>TEXT</span><i class="pi pi-angle-down px-2" data-v-b561616f></i></button><button class="mx-1 text-blue-600 font-semibold text-[13px] lg:text-[14px] d-flex justify-content-center align-items-center" data-v-b561616f><span class="text-[13px] lg:text-[14px]" data-v-b561616f>EXCEL</span><i class="pi pi-angle-down px-2" data-v-b561616f></i></button><button class="mx-1 text-blue-600 font-semibold text-[13px] lg:text-[14px] d-flex justify-content-center align-items-center" data-v-b561616f><span class="text-[13px] lg:text-[14px]" data-v-b561616f>PDF</span><i class="pi pi-angle-down px-2" data-v-b561616f></i></button></div></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (view_Details.value == 2 || employee_viewDetails.value == 2) {
        _push(`<h1 class="fs-4 text-gray-900 mt-4 ml-2" style="${ssrRenderStyle({ "font-weight": "600" })}" data-v-b561616f>Bank Transfer</h1>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div style="${ssrRenderStyle({ "position": "relative" })}" data-v-b561616f><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed border-none border-0" id="pills-tab" role="tablist" data-v-b561616f><li class="nav-item" role="presentation" data-v-b561616f><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? "active" : ""], "px-2 position-relative border-0"])}" data-v-b561616f> SUMMARY </a>`);
      if (activetab.value === 1) {
        _push(`<div class="border-3 h-1 rounded-l-3xl border-orange-400" data-v-b561616f></div>`);
      } else {
        _push(`<div class="border-3 h-1 rounded-l-3xl border-gray-400" data-v-b561616f></div>`);
      }
      _push(`</li><li class="nav-item position-relative border-0" role="presentation" data-v-b561616f><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? "active " : ""], "text-center px-2 border-0"])}" role="tab" aria-controls="" aria-selected="true" data-v-b561616f> EMPLOYEES </a>`);
      if (activetab.value === 2) {
        _push(`<div class="border-3 h-1 rounded-r-3xl border-orange-400 position-absolute left-0 w-12" data-v-b561616f></div>`);
      } else {
        _push(`<div class="border-3 h-1 rounded-r-3xl border-gray-400" data-v-b561616f></div>`);
      }
      _push(`</li></ul><div class="tab-content" id="" data-v-b561616f><div data-v-b561616f><div class="card-body" data-v-b561616f>`);
      if (activetab.value === 1) {
        _push(`<div data-v-b561616f>`);
        _push(ssrRenderComponent(summaryvue, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 2) {
        _push(`<div data-v-b561616f>`);
        _push(ssrRenderComponent(EmployeeSummary, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
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
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}" data-v-b561616f${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/salary_loan_setting/EmployeePayables/EmployeePayablesDetails.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const EmployeePayablesDetails = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-b561616f"]]);
const app = createApp(EmployeePayablesDetails);
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
app.mount("#EmployeePayablesDetails");
