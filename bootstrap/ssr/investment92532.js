/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, onMounted, resolveComponent, mergeProps, withCtx, createTextVNode, toDisplayString, openBlock, createBlock, Fragment, renderList, createVNode, useSSRContext, reactive, unref, createApp } from "vue";
import { createPinia } from "pinia";
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
import InputMask from "primevue/inputmask";
import OverlayPanel from "primevue/overlaypanel";
import Tag from "primevue/tag";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderList, ssrInterpolate, ssrRenderStyle, ssrRenderClass } from "vue/server-renderer";
import { d as declaration } from "./declaration925322.js";
import { _ as _sfc_main$2 } from "./investments_and_exemption925322.js";
import "axios";
import { L as LoadingSpinner } from "./LoadingSpinner92532.js";
import { i as investmentMainStore } from "./investmentMainStore92532.js";
import { S as Service } from "./Service92532.js";
import "dayjs";
import { p as profilePagesStore } from "./ProfilePagesStore92532.js";
import "./_plugin-vue_export-helper92532.js";
import "@vuelidate/core";
import "@vuelidate/validators";
import "moment";
import "primevue/usetoast";
import "primevue/useconfirm";
import "autoprefixer";
const _sfc_main$1 = {
  __name: "incomeTaxComputation",
  __ssrInlineRender: true,
  setup(__props) {
    ref([]);
    const dynamicheaders = ref([]);
    const grossEarnings = ref();
    onMounted(() => {
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2" }, _attrs))}><div class="my-3"><p class="font-semibold fs-6">View complete breakup of payments, deductions and declarations. You can analyse how income tax is being calculated and what is the TDS every month.</p></div><div class="card"><div class="grid gap-4 my-1 md:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 card-body"><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Taxable Income</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Gross Income Tax</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Total Surcharge &amp; Cess</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400"><p class="my-2 font-semibold fs-6">Net Income Tax payable</p><h6 class="text-lg font-bold">INR 4,82,246 </h6></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400"><p class="my-2 font-semibold fs-6">Tax Paid Till Now</p><h6 class="text-lg font-bold">INR 0</h6></div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="my-2 font-semibold fs-6">Remaining Tax To Be Paid</p><h6 class="text-lg font-bold">INR 0</h6></div></div></div><div class="my-4 card"><div class="card-body"><div class="flex"><p class="font-semibold fs-5"> A. Gross Earnings from Employment </p><div> Income from Previous Employer </div></div><div class=""><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        rows: 1,
        dataKey: "id",
        scrollable: "",
        value: grossEarnings.value
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<!--[-->`);
            ssrRenderList(dynamicheaders.value, (col) => {
              _push2(ssrRenderComponent(_component_Column, {
                key: col.headers,
                field: col.headers,
                header: col.headers
              }, {
                body: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(field)} ${ssrInterpolate(data[field])}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(field) + " " + toDisplayString(data[field]), 1)
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
            });
            _push2(`<!--]-->`);
          } else {
            return [
              (openBlock(true), createBlock(Fragment, null, renderList(dynamicheaders.value, (col) => {
                return openBlock(), createBlock(_component_Column, {
                  key: col.headers,
                  field: col.headers,
                  header: col.headers
                }, {
                  body: withCtx(({ data, field }) => [
                    createTextVNode(toDisplayString(field) + " " + toDisplayString(data[field]), 1)
                  ]),
                  _: 2
                }, 1032, ["field", "header"]);
              }), 128))
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div><div></div><div class="my-4 card"><div class="card-body"><div><p class="font-semibold fs-5">B. Taxable Income From All Heads</p></div><div class="my-4 table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        rows: 1,
        dataKey: "id",
        scrollable: ""
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "new_regime",
              header: "Apr 23"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "May 23"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "new_regime",
                header: "Apr 23"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "May 23"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        rows: 1,
        dataKey: "id",
        scrollable: ""
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "particulars",
              header: "Excemptions",
              frozen: "",
              class: "font-bold"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "new_regime",
              header: "Sections"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Allowance"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Gross Amount"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Deductible Amount"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Total"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "particulars",
                header: "Excemptions",
                frozen: "",
                class: "font-bold"
              }),
              createVNode(_component_Column, {
                field: "new_regime",
                header: "Sections"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Allowance"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Gross Amount"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Deductible Amount"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Total"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div><div class="my-4 card"><div class="card-body"><div><p class="font-semibold fs-5">C. Tax Calculations</p></div><div class="my-4 table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        rows: 1,
        dataKey: "id",
        scrollable: ""
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "particulars",
              header: "Tax",
              frozen: "",
              class: "font-bold"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "new_regime",
              header: "Income Tax Slab"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Tax Amount"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "particulars",
                header: "Tax",
                frozen: "",
                class: "font-bold"
              }),
              createVNode(_component_Column, {
                field: "new_regime",
                header: "Income Tax Slab"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Tax Amount"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div><div class="my-4 card"><div class="card-body"><div class="flex"><p class="font-semibold fs-5"> Month- Month Tax Deduction Details </p><div> Income from Previous Employer </div></div><div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        rows: 1,
        dataKey: "id",
        scrollable: ""
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "particulars",
              header: "Month",
              frozen: "",
              class: "font-bold"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "new_regime",
              header: "Apr 23"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "May 23"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "June 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "July 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "new_regime",
              header: "Aug 23"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Sep 23"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Oct 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Nov 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Dec 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Jan 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Feb 23 "
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "Mar 23 "
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "particulars",
                header: "Month",
                frozen: "",
                class: "font-bold"
              }),
              createVNode(_component_Column, {
                field: "new_regime",
                header: "Apr 23"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "May 23"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "June 23 "
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "July 23 "
              }),
              createVNode(_component_Column, {
                field: "new_regime",
                header: "Aug 23"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Sep 23"
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Oct 23 "
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Nov 23 "
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Dec 23 "
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Jan 23 "
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Feb 23 "
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "Mar 23 "
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/income_tax_computation/incomeTaxComputation.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const investment_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "investment",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    profilePagesStore();
    Service();
    onMounted(async () => {
      await investmentStore.getInvestmentSource();
    });
    const activetab = ref(1);
    reactive({
      border: "3px solid #F9BE00 !important;"
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_ConfirmDialog = resolveComponent("ConfirmDialog");
      _push(`<!--[-->`);
      if (unref(investmentStore).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_ConfirmDialog, null, null, _parent));
      _push(`<div class=""><div><div style="${ssrRenderStyle({ "position": "relative" })}"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed mb-3" id="pills-tab" role="tablist"><li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? "active font-semibold" : "font-medium !text-[#8B8B8B]"], "px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]"])}"> IT Declaration </a>`);
      if (activetab.value === 1) {
        _push(`<div class="h-1 rounded-l-3xl" style="${ssrRenderStyle({ "border": "2px solid #F9BE00 !important" })}"></div>`);
      } else {
        _push(`<div class="border-2 h-1 rounded-l-3xl border-gray-300"></div>`);
      }
      _push(`</li><li class="nav-item position-relative border-0" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? "active font-semibold" : "font-medium !text-[#8B8B8B]"], "text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]"])}" role="tab" aria-controls="" aria-selected="true"> Investments and Exemptions </a>`);
      if (activetab.value === 2) {
        _push(`<div class="h-1 position-absolute bottom-[1px] left-0 w-[100%]" style="${ssrRenderStyle({ "border": "2px solid #F9BE00 !important" })}"></div>`);
      } else {
        _push(`<div class="border-3 h-1 border-gray-300"></div>`);
      }
      _push(`</li><li class="nav-item position-relative border-0" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 3 ? "active font-semibold " : "font-medium !text-[#8B8B8B]"], "text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]"])}" role="tab" aria-controls="" aria-selected="true"> Income tax Computations </a>`);
      if (activetab.value === 3) {
        _push(`<div class="h-1 rounded-r-3xl position-absolute bottom-[1px] w-[100%] left-0" style="${ssrRenderStyle({ "border": "2px solid #F9BE00 !important" })}"></div>`);
      } else {
        _push(`<div class="border-3 h-1 rounded-r-3xl border-gray-300"></div>`);
      }
      _push(`</li><div class="border-gray-300 border-b-[4px] w-100 mt-[-7px]"></div></ul><div class="tab-content" id=""><div><div class="card-body">`);
      if (activetab.value === 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(declaration, null, null, _parent));
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
      _push(`</div></div></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investment.vue");
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
app.mount("#Investments");
