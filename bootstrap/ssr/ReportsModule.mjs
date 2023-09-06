/* empty css                        *//* empty css                               *//* empty css                             *//* empty css                           */import { ref, onMounted, resolveComponent, withCtx, createVNode, openBlock, createBlock, Fragment, renderList, useSSRContext, createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import Sidebar from "primevue/sidebar";
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
import InputMask from "primevue/inputmask";
import OverlayPanel from "primevue/overlaypanel";
import Tag from "primevue/tag";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import SelectButton from "primevue/selectbutton";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderAttr, ssrRenderList } from "vue/server-renderer";
import { _ as _imports_0 } from "./assets/printer-6c56e850.mjs";
import axios from "axios";
const _imports_1 = "/build/assets/download-ca50c50b.svg";
const ReportsModule_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ReportsModule",
  __ssrInlineRender: true,
  setup(__props) {
    ref([
      { product: "Bamboo Watch", lastYearSale: 51, thisYearSale: 40, lastYearProfit: 54406, thisYearProfit: 43342 },
      { product: "Black Watch", lastYearSale: 83, thisYearSale: 9, lastYearProfit: 423132, thisYearProfit: 312122 },
      { product: "Blue Band", lastYearSale: 38, thisYearSale: 5, lastYearProfit: 12321, thisYearProfit: 8500 },
      { product: "Blue T-Shirt", lastYearSale: 49, thisYearSale: 22, lastYearProfit: 745232, thisYearProfit: 65323 }
    ]);
    const selectedCity = ref();
    const cities = ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    const reportsType = ref([
      { name: "Absent reports", code: "1" },
      { name: "Detailed Report", code: "2" }
    ]);
    const AttendanceReportDynamicHeaders = ref([]);
    const AttendanceReportSource = ref([]);
    const canShowLoading = ref(false);
    const getEmployeeAttendanceReports = async () => {
      canShowLoading.value = true;
      await axios.get("/fetch-attendance-data").then((res) => {
        console.log(res.data.rows);
        AttendanceReportSource.value = res.data.rows;
        res.data.header.forEach((element) => {
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
    onMounted(() => {
      getEmployeeAttendanceReports();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Dropdown = resolveComponent("Dropdown");
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
      _push(`<ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-2 nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-md">PAYROLL</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-md">STATUTORY REPORTS</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investmentComputation" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-md">Attendance</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#form_12bb" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-md">LEAVES</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="" data-bs-toggle="pill" href="" data-bs-target="#tax_filling" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-md">PMS/OKR</p></a></li></ul><div class="grid grid-cols-12"><div class="col-span-4"><ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-2 nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-sm">Detailed Report</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-sm">Muster Roll</p></a></li><li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#investmentComputation" role="tab" aria-controls="pills-home" aria-selected="true"><p class="text-sm"> Consolidate</p></a></li></ul></div><div class="col-span-8 flex justify-end gap-4"><div class="flex gap-3"><div><p class="text-sm">Report type:</p></div><div>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        options: reportsType.value,
        optionLabel: "name",
        class: "w-full md:w-14rem"
      }, null, _parent));
      _push(`</div></div><div class="flex gap-3"><div><p class="text-sm">Date:</p></div><div>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        options: cities.value,
        optionLabel: "name",
        class: "w-full md:w-14rem"
      }, null, _parent));
      _push(`</div></div><div class="flex gap-3"><div><p class="text-sm">Legal Entity : </p></div><div>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        options: cities.value,
        optionLabel: "name",
        class: "w-full md:w-14rem"
      }, null, _parent));
      _push(`</div></div><div class="flex gap-3"><div><p class="text-sm">Department:</p></div><div>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        options: cities.value,
        optionLabel: "name",
        class: "w-full md:w-14rem"
      }, null, _parent));
      _push(`</div></div></div></div><div class="bg-white p-2 my-2 rounded-lg grid grid-cols-12"><div class="col-span-6"><input type="text" placeholder="Search employee..." name="" class="border p-1.5 text-sm bg-gray-50 rounded-lg" id=""><input type="date" name="" id=""${ssrRenderAttr("value", _ctx.variable.start_date)}><input type="date" name="" id=""${ssrRenderAttr("value", _ctx.variable.end_date)}><button class="btn btn-orange">Generate</button></div><div class="col-span-6 flex justify-end gap-4"><button><img${ssrRenderAttr("src", _imports_0)} alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button><button><img${ssrRenderAttr("src", _imports_1)} alt="" srcset="" class="w-9 h-9 p-2 bg-gray-50 rounded-lg"></button><button class="bg-gray-100 rounded-full p-2 text-sm flex"><p class="bg-orange-400 p-1 h-6 w-6 rounded-full text-xs">A</p><p class="text-sm my-auto">Abbrevation</p></button></div></div><div class="my-4">`);
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reports/ReportsModule.vue");
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
app.component("InputMask", InputMask);
app.component("OverlayPanel", OverlayPanel);
app.component("Tag", Tag);
app.component("Sidebar", Sidebar);
app.component("Accordion", Accordion);
app.component("AccordionTab", AccordionTab);
app.component("SelectButton", SelectButton);
app.mount("#ReportsModule");
