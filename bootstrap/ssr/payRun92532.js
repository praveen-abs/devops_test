/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { useSSRContext, mergeProps, ref, onMounted, resolveComponent, withCtx, createVNode, toDisplayString, unref, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
import { useRouter, useRoute, createRouter, createWebHistory } from "vue-router";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderList, ssrRenderComponent, ssrRenderAttr, ssrInterpolate } from "vue/server-renderer";
import { _ as _export_sfc } from "./_plugin-vue_export-helper92532.js";
import axios from "axios";
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
const _sfc_main$d = {};
function _sfc_ssrRender$8(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "card border-2 border-gray-100" }, _attrs))}><div class="card-body flex justify-items-start"><div><i class="pi pi-arrow-left py-auto" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i></div><div class="flex mx-6"><div class="rounded-full p-2 bg-green-700 text-white font-semibold fs-6">APR</div><p style="${ssrRenderStyle({ "font-size": "1rem" })}" class="font-semibold">....</p></div><div><i class="pi pi-arrow-right" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i></div></div></div>`);
}
const _sfc_setup$d = _sfc_main$d.setup;
_sfc_main$d.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/currentFinancialYearStatus/currentFinancialYearStatus.vue");
  return _sfc_setup$d ? _sfc_setup$d(props, ctx) : void 0;
};
const CurrentFinancialYearStatus = /* @__PURE__ */ _export_sfc(_sfc_main$d, [["ssrRender", _sfc_ssrRender$8]]);
const _imports_0 = "/build/calendar92532.svg";
const payrunMainStore = defineStore("payrunMainStore", () => {
  const currentActiveScreen = ref(0);
  const leaveSource = ref();
  const getLeaveDetails = async () => {
    let url = "/fetch-leaverequests-based-on-currentrole";
    await axios.get(url).then((res) => {
      leaveSource.value = res.data.data;
    });
  };
  return {
    currentActiveScreen,
    leaveSource,
    getLeaveDetails
  };
});
const _sfc_main$c = {
  __name: "runPayroll",
  __ssrInlineRender: true,
  setup(__props) {
    const canShowRunPayroll = ref(true);
    const usePayrun = payrunMainStore();
    onMounted(() => {
      usePayrun.getLeaveDetails();
    });
    const runPayroll = ref([
      { id: 1, shorName: "leave", icons: "calendar.svg", name: "Leave, Attendance & Daily Wages" },
      { shorName: "attendance", icons: "person.svg", name: "New Joinee & Exits" },
      { shorName: "Salary-Revisions", icons: "breifcase.svg", name: "Bonus, Salary Revisions & Overtime" },
      { shorName: "Reimbursement", icons: "pi pi-calendar-times", name: "Reimbursement, Adhoc Payment, Deduction" },
      { shorName: "Salaries-Hold", icons: "pi pi-calendar-times", name: "Salaries on Hold & Arrears" },
      { shorName: "Override", icons: "pi pi-calendar-times", name: "Override (PT, ESI, TDS, LWF)" }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_router_link = resolveComponent("router-link");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full card" }, _attrs))}><div class="card-body"><section id="topBar" class="flex justify-between"><section class="flex"><strong class="">Run Payroll</strong><div class="mx-4">Finalized</div><div class=""><p class="">last Updated</p></div></section><section class="flex"><button><i class="pi pi-chevron-down" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i></button></section></section><div id="Body" class="my-4">`);
      if (canShowRunPayroll.value) {
        _push(`<div class="grid gap-4 md:grid-cols-2 sm:grid-cols-1 xxl:grid-cols-4 xl:grid-cols-2 lg:grid-cols-2 transition duration-150 ease-in-out" style="${ssrRenderStyle({ "display": "grid" })}"><!--[-->`);
        ssrRenderList(runPayroll.value, (item, index) => {
          _push(ssrRenderComponent(_component_router_link, {
            class: "p-3 my-2 rounded-lg shadow-md dynamic-card-without-border flex transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 duration-300",
            key: index,
            to: `/payrun/${item.shorName}`
          }, {
            default: withCtx((_, _push2, _parent2, _scopeId) => {
              if (_push2) {
                _push2(`<img${ssrRenderAttr("src", _imports_0)} alt="" class="rounded-full h-8"${_scopeId}><p class="fs-6 font-semibold text-center whitespace-nowrap"${_scopeId}>${ssrInterpolate(item.name)}</p>`);
              } else {
                return [
                  createVNode("img", {
                    src: _imports_0,
                    alt: "",
                    class: "rounded-full h-8"
                  }),
                  createVNode("p", { class: "fs-6 font-semibold text-center whitespace-nowrap" }, toDisplayString(item.name), 1)
                ];
              }
            }),
            _: 2
          }, _parent));
        });
        _push(`<!--]--></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div id="footer" class="text-end float-right"><div class="text-end flex"><button class="btn btn-outline-primary">Preview Run Payroll</button><button class="btn btn-outline-primary mx-4">Review All Employees</button><button class="btn btn-primary">Finalize Payroll</button></div></div></div></div>`);
    };
  }
};
const _sfc_setup$c = _sfc_main$c.setup;
_sfc_main$c.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/runPayroll.vue");
  return _sfc_setup$c ? _sfc_setup$c(props, ctx) : void 0;
};
const _sfc_main$b = {};
function _sfc_ssrRender$7(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-white rounded-lg" }, _attrs))}><div class="w-full mx-auto bg-gray-200 p-2 grid grid-cols-3 gap-4 rounded-lg"><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Total Employees</p><p class="font-semibold fs-6">74334</p></div><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Calendar Days</p><p class="font-semibold fs-6">74334</p></div><div><p class="text-gray-700 font-medium text-sm whitespace-nowrap">Payroll Processed</p><p class="font-semibold fs-6">74334</p></div></div><div class="px-3"><div class="my-2"><div class="grid grid-cols-12"><div class="col-span-6"><p class="text-gray-400 font-semibold text-[12px]">Total Payroll Cost</p><p class="font-semibold text-xs">Jun <span class="font-semibold text-xs text-red-400">^234</span></p></div><div class="col-span-2"> = </div><div class="col-span-4"><p class="font-semibold fs-6 text-right">74334</p></div></div></div></div></div>`);
}
const _sfc_setup$b = _sfc_main$b.setup;
_sfc_main$b.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/calculatedPayrollPerMonth/calculatedPayrollPerMonth.vue");
  return _sfc_setup$b ? _sfc_setup$b(props, ctx) : void 0;
};
const calculatedPayRollPerMonth = /* @__PURE__ */ _export_sfc(_sfc_main$b, [["ssrRender", _sfc_ssrRender$7]]);
const _sfc_main$a = {};
function _sfc_ssrRender$6(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "card" }, _attrs))}><div class="card-body"><div class="flex justify-between"><div><p>Payroll Outcome</p></div><div class="flex justify-end gap-4 text-blue-500 text-sm"><p class="whitespace-nowrap">View Pay Register</p><p class="whitespace-nowrap">Manage PaySlip</p><p>v</p></div></div></div></div>`);
}
const _sfc_setup$a = _sfc_main$a.setup;
_sfc_main$a.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/payrollOutcome/payrollOutcome.vue");
  return _sfc_setup$a ? _sfc_setup$a(props, ctx) : void 0;
};
const PayrollOutCome = /* @__PURE__ */ _export_sfc(_sfc_main$a, [["ssrRender", _sfc_ssrRender$6]]);
const _sfc_main$9 = {};
function _sfc_ssrRender$5(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "card" }, _attrs))}><div class="card-body"> Activity </div></div>`);
}
const _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/activity/activity.vue");
  return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
const Activity = /* @__PURE__ */ _export_sfc(_sfc_main$9, [["ssrRender", _sfc_ssrRender$5]]);
const _sfc_main$8 = {
  __name: "leaveApplied",
  __ssrInlineRender: true,
  setup(__props) {
    const usePayrun = payrunMainStore();
    const filterCurrentResource = (source, status) => {
      if (source) {
        let result = source.filter((ele) => ele.status == status);
        return result;
      } else {
        let result = [];
        return result;
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="investments-wrapper"><div class=""><div class="pt-1 pb-0 card-body"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed flex gap-4" id="pills-tab" role="tablist"><li class="nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Leave" role="tab" aria-controls="pills-home" aria-selected="true"> Rejected</a></li><li class="nav-item ember-view" role="presentation"><a class="nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Attendance" role="tab" aria-controls="pills-home" aria-selected="true"> Pending</a></li><li class="nav-item ember-view" role="presentation"><a class="nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#LOP" role="tab" aria-controls="pills-home" aria-selected="true"> Approved</a></li></ul></div></div><div class="tab-content my-3" id="pills-tabContent"><div class="tab-pane fade active show" id="Leave" role="tabpanel" aria-labelledby="pills-home-tab"></div><div class="tab-pane fade" id="Attendance" role="tabpanel"></div><div class="tab-pane fade" id="LOP" role="tabpanel"></div></div></div> ${ssrInterpolate(unref(usePayrun).leaveSource ? filterCurrentResource(unref(usePayrun).leaveSource, "Approved") : [])}<!--]-->`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/leaveAttendanceDailyWages/leaveApplied/leaveApplied.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const _sfc_main$7 = {
  __name: "leaveAttendanceDailyWages",
  __ssrInlineRender: true,
  setup(__props) {
    useRouter();
    const route = useRoute();
    onMounted(() => {
      console.log(route.params.module);
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full p-1" }, _attrs))}><div class=""><div class="pt-1 pb-0 card-body"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed flex gap-4" id="pills-tab" role="tablist"><li class="nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Leave" role="tab" aria-controls="pills-home" aria-selected="true"> Leave Applied</a></li><li class="nav-item ember-view" role="presentation"><a class="nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Attendance" role="tab" aria-controls="pills-home" aria-selected="true"> Attendance</a></li><li class="nav-item ember-view" role="presentation"><a class="nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#LOP" role="tab" aria-controls="pills-home" aria-selected="true"> LOP Summary</a></li><li class="nav-item ember-view" role="presentation"><a class="nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Revoke " role="tab" aria-controls="pills-home" aria-selected="true"> Revoke LOP </a></li></ul></div></div><p class="py-2 rounded-lg flex w-10/12 justify-start font-semibold fs-6">All leave (approved or pending) that falls under this payroll cycle month will be displayed here.</p><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="Leave" role="tabpanel" aria-labelledby="pills-home-tab">`);
      _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
      _push(`</div><div class="tab-pane fade" id="Attendance" role="tabpanel"></div><div class="tab-pane fade" id="LOP" role="tabpanel"></div><div class="tab-pane fade" id="Revoke" role="tabpanel"></div></div></div>`);
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/leaveAttendanceDailyWages/leaveAttendanceDailyWages.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const _sfc_main$6 = {};
function _sfc_ssrRender$4(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "investments-wrapper" }, _attrs))}><div class="mb-2 shadow card left-line p-1"><div class="pt-1 pb-0 card-body"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-4 nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#New" role="tab" aria-controls="pills-home" aria-selected="true"> 1.New Joinees</a></li><li class="nav-item ember-view" role="presentation"><a class="mx-4 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Exit" role="tab" aria-controls="pills-home" aria-selected="true"> 2.Employee in Exit Process</a></li><li class="nav-item ember-view" role="presentation"><a class="mx-4 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#Settlement" role="tab" aria-controls="pills-home" aria-selected="true"> 3.Full &amp; Final Settlement</a></li></ul></div></div><div class="p-2 rounded-lg card my-2"><p>All leave (approved or pending) that falls under this payroll cycle month will be displayed here.</p></div><div class="mb-0 card"><div class="card-body"><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="New" role="tabpanel" aria-labelledby="pills-home-tab"></div><div class="tab-pane fade" id="Exit" role="tabpanel"></div><div class="tab-pane fade" id="Settlement" role="tabpanel"></div></div></div></div></div>`);
}
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/newJoineeAndExitEmployee/newJoineeAndExitEmployee.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const newJoineeAndExitEmployeeVue = /* @__PURE__ */ _export_sfc(_sfc_main$6, [["ssrRender", _sfc_ssrRender$4]]);
const _sfc_main$5 = {};
function _sfc_ssrRender$3(_ctx, _push, _parent, _attrs) {
}
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/bonusSalaryRevisionOvertime/bonusSalaryRevisionOvertime.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const bonusSalaryRevision = /* @__PURE__ */ _export_sfc(_sfc_main$5, [["ssrRender", _sfc_ssrRender$3]]);
const _sfc_main$4 = {};
function _sfc_ssrRender$2(_ctx, _push, _parent, _attrs) {
}
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/reimbursementAdhocPaymentDeduction/reimbursementAdhocPaymentDeduction.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const reimbursementAdhoc = /* @__PURE__ */ _export_sfc(_sfc_main$4, [["ssrRender", _sfc_ssrRender$2]]);
const _sfc_main$3 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
}
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/salaryOnHoldAndArrears/salaryOnHoldAndArrears.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const salaryHold = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["ssrRender", _sfc_ssrRender$1]]);
const _sfc_main$2 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
}
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/runPayroll/overRide/overRide.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const overRide = /* @__PURE__ */ _export_sfc(_sfc_main$2, [["ssrRender", _sfc_ssrRender]]);
const _sfc_main$1 = {};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/payrollOutcome/managePayment.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const payRun_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "payRun",
  __ssrInlineRender: true,
  setup(__props) {
    useRouter();
    const route = useRoute();
    const usePayrun = payrunMainStore();
    onMounted(() => {
      usePayrun.getLeaveDetails();
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(route).params.module == "null") {
        _push(`<div class="w-full"><div class="">`);
        _push(ssrRenderComponent(CurrentFinancialYearStatus, null, null, _parent));
        _push(`</div><div class="my-4"><p class="font-sans font-semibold fs-5">JUN 2023</p></div><div class="grid grid-cols-3 gap-4"><div class="col-span-2 ...">`);
        _push(ssrRenderComponent(_sfc_main$c, null, null, _parent));
        _push(`</div><div class="...">`);
        _push(ssrRenderComponent(calculatedPayRollPerMonth, null, null, _parent));
        _push(`</div></div><div class="grid grid-cols-3 gap-4 my-3"><div class="col-span-2 ...">`);
        _push(ssrRenderComponent(PayrollOutCome, null, null, _parent));
        _push(`</div><div class="...">`);
        _push(ssrRenderComponent(Activity, null, null, _parent));
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.module == "leave") {
        _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.module == "attendance") {
        _push(ssrRenderComponent(newJoineeAndExitEmployeeVue, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.module == "Salary-Revisions") {
        _push(ssrRenderComponent(bonusSalaryRevision, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.module == "Reimbursement") {
        _push(ssrRenderComponent(reimbursementAdhoc, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.module == "Salaries-Hold") {
        _push(ssrRenderComponent(salaryHold, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(route).params.module == "Override") {
        _push(ssrRenderComponent(overRide, null, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payRun/payRun.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const router = createRouter({
  history: createWebHistory("/build/"),
  routes: [
    {
      path: "/payrun/:module",
      name: "home",
      component: _sfc_main
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
app.component("MultiSelect", MultiSelect);
app.component("InputNumber", InputNumber);
app.component("InputMask", InputMask);
app.component("OverlayPanel", OverlayPanel);
app.component("Tag", Tag);
app.mount("#PayRun");
