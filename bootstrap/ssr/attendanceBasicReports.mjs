/* empty css                        *//* empty css                               *//* empty css                             *//* empty css                           */import { reactive, ref, onMounted, resolveComponent, withCtx, openBlock, createBlock, Fragment, renderList, createVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderComponent, ssrRenderAttr, ssrRenderList } from "vue/server-renderer";
import { _ as _imports_0 } from "./assets/printer-6c56e850.mjs";
import { _ as _imports_1 } from "./assets/download-e687b9d5.mjs";
import { _ as _imports_0$1 } from "./assets/no-data-1e189804.mjs";
import axios from "axios";
import "dayjs";
import { S as Service } from "./assets/Service-c5131e0f.mjs";
import { L as LoadingSpinner } from "./assets/LoadingSpinner-13fb7de2.mjs";
import "pinia";
import "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
const attendanceBasicReports_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "attendanceBasicReports",
  __ssrInlineRender: true,
  setup(__props) {
    const variable = reactive({
      start_date: "",
      end_date: "",
      department: ""
    });
    const service = Service();
    const canShowPeriodDialog = ref(false);
    const AttendanceReportDynamicHeaders = ref([]);
    const AttendanceReportSource = ref([]);
    const canShowLoading = ref(false);
    const getEmployeeAttendanceReports = async () => {
      let url = "/fetch-attendance-data";
      canShowLoading.value = true;
      await axios.post(url, {
        start_date: variable.start_date,
        end_date: variable.end_date,
        department: department.value
      }).then((res) => {
        console.log(res.data.rows);
        AttendanceReportSource.value = res.data.rows;
        res.data.headers.forEach((element) => {
          let format = {
            title: element
          };
          AttendanceReportDynamicHeaders.value.push(format);
          console.log(element);
        });
        console.log(AttendanceReportDynamicHeaders.value);
      }).finally(() => {
        canShowLoading.value = false;
      });
    };
    const department = ref();
    const departmentOption = ref();
    onMounted(() => {
      service.DepartmentDetails().then((res) => {
        departmentOption.value = res.data;
      });
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Calendar = resolveComponent("Calendar");
      _push(`<!--[-->`);
      if (canShowLoading.value) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><div><p class="font-semibold text-lg">Attendance Basic Reports</p></div><div class="grid grid-cols-12"><div class="col-span-6"><ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-2 nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-sm font-semibold">Detailed Report</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-sm font-semibold">Muster Roll</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investmentComputation" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-sm font-semibold"> Consolidate</p></a></li></ul></div><div class="col-span-6 grid grid-cols-12 place-content-end"><div class="flex gap-3 col-span-2 justify-end items-center"><div><p class="text-sm font-semibold">Period:</p></div><div><button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold fs-6 px-2 border border-gray-400 rounded shadow"> select </button></div></div><div class="flex gap-3 col-span-5 justify-end items-center"><div><p class="text-sm font-semibold">Legal Entity : </p></div><div>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: _ctx.selectedCity,
        "onUpdate:modelValue": ($event) => _ctx.selectedCity = $event,
        options: _ctx.cities,
        optionLabel: "name"
      }, null, _parent));
      _push(`</div></div><div class="flex gap-3 col-span-5 justify-end items-center"><div><p class="text-sm font-semibold">Department:</p></div><div>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: department.value,
        "onUpdate:modelValue": ($event) => department.value = $event,
        onChange: getEmployeeAttendanceReports,
        options: departmentOption.value,
        optionLabel: "name",
        optionValue: "id"
      }, null, _parent));
      _push(`</div></div></div></div><div class="bg-white p-2 my-2 rounded-lg grid grid-cols-12"><div class="grid grid-cols-12 gap-6 col-span-6"></div><div class="col-span-6 flex justify-end gap-4"><button><img${ssrRenderAttr("src", _imports_0)} alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button><button><img${ssrRenderAttr("src", _imports_1)} alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button></div></div>`);
      if (AttendanceReportSource.value.length > 0) {
        _push(`<div class="my-4 w-full overflow-hidden">`);
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
        _push(`</div>`);
      } else {
        _push(`<div class="w-2/5 h-1/4 mx-auto"><img${ssrRenderAttr("src", _imports_0$1)} alt="" class="h-full w-full"></div>`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        visible: canShowPeriodDialog.value,
        "onUpdate:visible": ($event) => canShowPeriodDialog.value = $event,
        modal: "",
        header: "Header",
        style: { width: "40vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="font-semibold text-lg"${_scopeId}>Select period</p>`);
          } else {
            return [
              createVNode("p", { class: "font-semibold text-lg" }, "Select period")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="w-full"${_scopeId}><div class="grid grid-cols-12 gap-6 col-span-6 place-items-center"${_scopeId}><div class="col-span-4"${_scopeId}><p class="font-semibold text-sm my-1"${_scopeId}>Start date</p>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              inputId: "icon",
              dateFormat: "dd-mm-yy",
              showIcon: true,
              class: "h-8",
              modelValue: variable.start_date,
              "onUpdate:modelValue": ($event) => variable.start_date = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-span-4"${_scopeId}><p class="font-semibold text-sm my-1"${_scopeId}>End date</p>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              inputId: "icon",
              dateFormat: "dd-mm-yy",
              showIcon: true,
              class: "h-8",
              modelValue: variable.end_date,
              "onUpdate:modelValue": ($event) => variable.end_date = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-span-4 mt-4"${_scopeId}><button class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold fs-6 px-2 py-1.5 border border-gray-400 rounded shadow"${_scopeId}> Generate </button></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "w-full" }, [
                createVNode("div", { class: "grid grid-cols-12 gap-6 col-span-6 place-items-center" }, [
                  createVNode("div", { class: "col-span-4" }, [
                    createVNode("p", { class: "font-semibold text-sm my-1" }, "Start date"),
                    createVNode(_component_Calendar, {
                      inputId: "icon",
                      dateFormat: "dd-mm-yy",
                      showIcon: true,
                      class: "h-8",
                      modelValue: variable.start_date,
                      "onUpdate:modelValue": ($event) => variable.start_date = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "col-span-4" }, [
                    createVNode("p", { class: "font-semibold text-sm my-1" }, "End date"),
                    createVNode(_component_Calendar, {
                      inputId: "icon",
                      dateFormat: "dd-mm-yy",
                      showIcon: true,
                      class: "h-8",
                      modelValue: variable.end_date,
                      "onUpdate:modelValue": ($event) => variable.end_date = $event
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "col-span-4 mt-4" }, [
                    createVNode("button", {
                      onClick: ($event) => (canShowPeriodDialog.value = false, getEmployeeAttendanceReports()),
                      class: "bg-yellow-500 hover:bg-yellow-700 text-white font-semibold fs-6 px-2 py-1.5 border border-gray-400 rounded shadow"
                    }, " Generate ", 8, ["onClick"])
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reports/attendance/attendanceBasicReports/attendanceBasicReports.vue");
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
app.mount("#AttendanceBasicReports");
