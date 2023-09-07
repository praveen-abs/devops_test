/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { reactive, ref, onMounted, resolveComponent, withCtx, createVNode, openBlock, createBlock, Fragment, renderList, useSSRContext, createApp } from "vue";
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
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrRenderList } from "vue/server-renderer";
<<<<<<<< HEAD:bootstrap/ssr/attendanceEarlygoingReports46681.js
import { _ as _imports_0 } from "./printer466812.js";
import { _ as _imports_1 } from "./download46681.js";
========
import { _ as _imports_0 } from "./printer925322.js";
import { _ as _imports_1 } from "./download92532.js";
>>>>>>>> 3d11572c6ee7fb534efc658b88a39b370fca8e71:bootstrap/ssr/attendanceEarlygoingReports92532.js
import "axios";
const attendanceEarlygoingReports_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "attendanceEarlygoingReports",
  __ssrInlineRender: true,
  setup(__props) {
    const variable = reactive({
      start_date: "",
      end_date: ""
    });
    ref([
      { product: "Bamboo Watch", lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
      { product: "Black Watch", lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
      { product: "Blue Band", lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
      { product: "Blue T-Shirt", lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 }
    ]);
    ref();
    ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    ref([
      { name: "Absent reports", code: "1" },
      { name: "Detailed Report", code: "2" }
    ]);
    const AttendanceReportDynamicHeaders = ref([]);
    const AttendanceReportSource = ref([]);
    const canShowLoading = ref(false);
    onMounted(() => {
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: canShowLoading.value,
        "onUpdate:visible": ($event) => canShowLoading.value = $event,
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
      _push(`<div><p class="font-semibold text-lg">Attendance Early Going Reports</p></div><div class="bg-white p-2 my-2 rounded-lg grid grid-cols-12"><div class="grid grid-cols-12 gap-6 col-span-6"><div class="col-span-4"><p>Start date</p>`);
      _push(ssrRenderComponent(_component_Calendar, {
        inputId: "icon",
        dateFormat: "dd-mm-yy",
        showIcon: true,
        class: "h-10",
        modelValue: variable.start_date,
        "onUpdate:modelValue": ($event) => variable.start_date = $event
      }, null, _parent));
      _push(`</div><div class="col-span-4"><p>End date</p>`);
      _push(ssrRenderComponent(_component_Calendar, {
        inputId: "icon",
        dateFormat: "dd-mm-yy",
        showIcon: true,
        class: "h-10",
        modelValue: variable.end_date,
        "onUpdate:modelValue": ($event) => variable.end_date = $event
      }, null, _parent));
      _push(`</div><div class="d-flex justify-content-center align-items-end col-span-4"><button class="btn btn-orange">Generate</button></div></div><div class="col-span-6 flex justify-end gap-4"><button><img${ssrRenderAttr("src", _imports_0)} alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button><button><img${ssrRenderAttr("src", _imports_1)} alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button></div></div><div class="my-4">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: AttendanceReportSource.value,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<!--[-->`);
            ssrRenderList(AttendanceReportDynamicHeaders.value, (col) => {
              _push2(ssrRenderComponent(_component_Column, {
                key: col.title,
                field: col.title,
                header: col.title,
                style: { "white-space": "nowrap", "text-align": "left" }
              }, null, _parent2, _scopeId));
            });
            _push2(`<!--]-->`);
          } else {
            return [
              (openBlock(true), createBlock(Fragment, null, renderList(AttendanceReportDynamicHeaders.value, (col) => {
                return openBlock(), createBlock(_component_Column, {
                  key: col.title,
                  field: col.title,
                  header: col.title,
                  style: { "white-space": "nowrap", "text-align": "left" }
                }, null, 8, ["field", "header"]);
              }), 128))
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="mb-0"><div class="card-body"><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="investment_dec" role="tabpanel" aria-labelledby="pills-home-tab"></div><div class="tab-pane fade" id="exemptions" role="tabpanel"></div><div class="tab-pane fade" id="investmentComputation" role="tabpanel"></div><div class="tab-pane fade" id="other_income" role="tabpanel" aria-labelledby="pills-home-tab"></div><div class="tab-pane fade" id="other_exemptions" role="tabpanel" aria-labelledby="pills-home-tab"></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reports/attendance/attendanceEarlygoingReports/attendanceEarlygoingReports.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
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
app.mount("#AttendanceEarlygoing");
