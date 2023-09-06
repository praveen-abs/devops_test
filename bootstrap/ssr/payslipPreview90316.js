/* empty css            *//* empty css                   *//* empty css                 *//* empty css               *//* empty css                */import { useSSRContext, ref, createApp } from "vue";
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
import SelectButton from "primevue/selectbutton";
import RadioButton from "primevue/radiobutton";
import Checkbox from "primevue/checkbox";
import OrganizationChart from "primevue/organizationchart";
import { ssrInterpolate, ssrRenderAttrs, ssrRenderAttr, ssrRenderStyle, ssrRenderClass, ssrRenderComponent } from "vue/server-renderer";
const _sfc_main$3 = {};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/manage_payslips/dynamicPayslip.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const dynamicPayslipv2_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
  __name: "dynamicPayslipv2",
  __ssrInlineRender: true,
  props: {
    source: {
      type: Object,
      required: true
    }
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->${ssrInterpolate(__props.source)} <div class=""><div class="p-[20px]"><div class="flex items-center justify-between row"><div class="col-8"><h1 class="text-[20px] text-[#000]">ARDENS BUSINESS SOLUTIONS PRIVATE LIMITED</h1><p class="mt-[10px]">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, voluptates. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, voluptates.</p></div><div class="flex col-4"><p class="text-right">Company Logo </p></div></div><div class="border-[#f9be00] border-[1px] w-[100%] my-2"></div><div><p class="my-2 font-semibold">Payslip for the month of April 2023</p><h1 class="text-[#f9be00] my-2 font-semibold">EMPLOYEE PAY SUMMARY</h1></div><div class="row"><div class="col-4"><p class="text-[#4d4d4d] my-2">Employee Name :</p><p class="text-[#4d4d4d] my-2">Designation :</p><p class="text-[#4d4d4d] my-2">Date Joining :</p><p class="text-[#4d4d4d] my-2">Pay Period :</p><p class="text-[#4d4d4d] my-2">Pay Date :</p><p class="text-[#4d4d4d] my-2">Bank Account No:</p></div><div class="col-3"><p class="text-[#4d4d4d] my-2 text-left">-</p><p class="text-[#4d4d4d] my-2">-</p><p class="text-[#4d4d4d] my-2">-</p><p class="text-[#4d4d4d] my-2">-</p><p class="text-[#4d4d4d] my-2">-</p><p class="text-[#4d4d4d] my-2">-</p></div><div class="col-5"><p class="text-center text-[16px]">Employee Net Pay</p><p class="text-center text-[34px] font-semibold flex items-center"><span class="text-[34px] font-sans mx-2">₹</span> 82,54,82,500.00</p><p class="text-center text-[16px]">Paid Days : 30 | LOP Day : 0 | ARREAR DAYS</p></div></div><div class="border-[#f9be00] border-[1px] w-[100%] my-2"></div><div class="row"><div class="col-6"><h1 class="text-[#f9be00] font-semibold">EARNINGS</h1><h1 class="text-[#000] my-2">Basic</h1><h1 class="text-[#000] my-2">House Education Allowance</h1><h1 class="text-[#000] my-2">Children Education Allowance</h1><h1 class="text-[#000] my-2">Fixed Allowance</h1><h1 class="text-[#000] my-2 font-semibold">Gross Earnings</h1></div><div class="col-2"><h1 class="text-[#f9be00] font-semibold">Amount</h1><h1 class="text-[#000] my-2">-</h1></div><div class="col-2"><h1 class="text-[#f9be00] font-semibold">ARREARS</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1></div><div class="col-2"><h1 class="text-[#f9be00] font-semibold">YEAR TO DATE</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1><h1 class="text-[#000] my-2">-</h1></div></div><div class="border-[#f9be00] border-[1px] w-[100%] my-2"></div><div class="row"><div class="col-6"><h1 class="text-[#f9be00] font-semibold">DEDUCTIONS</h1><h1 class="text-[#000] my-2">EPF contribution</h1><h1 class="text-[#000] my-2">Income Tax</h1><h1 class="text-[#000] my-2 font-semibold">Total Deductions</h1></div><div class="col-2"><h1 class="text-[#f9be00] font-semibold">AMOUNT</h1><h1 class="my-2">-</h1><h1 class="my-2">-</h1><h1 class="my-2">-</h1></div><div class="col"><h1 class="text-[#f9be00] font-semibold">ARREARS</h1><h1 class="my-2">-</h1><h1 class="my-2">-</h1><h1 class="my-2">-</h1></div><div class="col"><h1 class="text-[#f9be00] font-semibold">YEAR TO DATE</h1><h1 class="my-2">-</h1><h1 class="my-2">-</h1><h1 class="my-2">-</h1></div></div><div class="row bg-[#fff6db] p-2"><div class="col-6"><h1 class="text-[#f9be00] font-semibold text-[16px]">NET PAY (<span class="text-[12px]">Gross Earnings - Total Deduction</span> )</h1></div><div class="col-6"><h1 class="text-[#000]"><span class="mx-2 font-sans">₹</span>---</h1></div></div><div class="row"><div class="col"><h1 class="my-4">Total Net Payable <span class="font-semibold">₹ 1,05,578.00</span> ( <span class="text-[12px]">indian rupee One Lakh Five Thousand Five Hundred Seventy-Eight Only</span> )</h1></div></div><h1 class="font-semibold text-[#f9be00]">LEAVE DETAILS</h1><div class="row"><div class="col-3"><p class="text-gray">Leave Type</p><p>-</p></div><div class="col-3"><p>Opening Balance</p><p>-</p></div><div class="col-3"><p>Avalied</p><p>-</p></div><div class="col-3"><p>Closing Balance</p><p>-</p></div></div><div class="border-[#f9be00] border-[1px] w-[100%] my-2"></div><div class="row my-[40px]"><div class="col"><p class="text-center">- This is a system generated payslip, hence the signature is not required.-</p></div></div><div class="flex justify-end"><div class="flex w-[200px]"><p class="text-[gray]">Powered By</p><p class="">ABS Logo</p></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/manage_payslips/dynamicPayslipv2.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _imports_0 = "/build/payslipv190316.png";
const apponiment_letter_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "apponiment_letter",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="flex flex-row"><div class="w-[332px] bg-[#E6E6E6] template"><h1 class="text-[#000] m-[10px] font-[14.02px]">Standard Template</h1><div class="m-[16px] relative"><img${ssrRenderAttr("src", _imports_0)} alt=""><div class="w-[100%] bg-[#00000033] p-[12px] justify-around hide absolute bottom-0"><button class="bg-[#000] text-[#fff] p-2 rounded-md">set as Default</button><button class="bg-[#fff] text-[#000] rounded-md p-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></button><button class="bg-white p-2 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-[20px] h-[20px]"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path></svg></button></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/payslip_preview/apponiment_letter.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "payslipPreview",
  __ssrInlineRender: true,
  setup(__props) {
    const activetab = ref(1);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(_attrs)}><h1 class="text-[28px] font-[&#39;poppins&#39;]">Document Template</h1><p>Here you can change Document Template,<span class="underline">Company&#39;s Leave Policy</span></p><div><div style="${ssrRenderStyle({ "position": "relative" })}"><ul class="mb-3 divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? "active font-semibold" : "font-medium !text-[#8B8B8B]"], "px-4 position-relative border-0 font-['poppins'] text-[14px] text-[#001820]"])}"> Appointment Letter </a>`);
      if (activetab.value === 1) {
        _push(`<div class="border-3 h-1 rounded-l-3xl border-[#F9BE00]"></div>`);
      } else {
        _push(`<div class="h-1 border-gray-300 border-3 rounded-l-3xl"></div>`);
      }
      _push(`</li><li class="border-0 nav-item position-relative" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? "active font-semibold" : "font-medium !text-[#8B8B8B]"], "text-center px-4 border-0 font-['poppins'] text-[14px] text-[#001820]"])}" role="tab" aria-controls="" aria-selected="true"> Payslip </a>`);
      if (activetab.value === 2) {
        _push(`<div class="border-3 h-1 border-[#F9BE00] position-absolute left-0 w-12"></div>`);
      } else {
        _push(`<div class="h-1 border-gray-300 border-3"></div>`);
      }
      _push(`</li><div class="border-gray-300 border-b-[7px] w-100 mt-[-7px]"></div></ul><div class="tab-content" id=""><div><div class="card-body">`);
      if (activetab.value === 1) {
        _push(`<div class="flex justify-center"><div class="w-[100%] p-4">`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 2) {
        _push(`<div class="flex justify-center"><div class="w-[70%] my-[50px]">`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 3) {
        _push(`<div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/payslip_preview/payslipPreview.vue");
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
app.mount("#payslipPreview");
