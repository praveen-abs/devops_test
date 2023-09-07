import { mergeProps, useSSRContext } from "vue";
import { ssrRenderAttrs } from "vue/server-renderer";
import "axios";
import { _ as _export_sfc } from "./_plugin-vue_export-helper46681.js";
const payroll_setting_vue_vue_type_style_index_0_scoped_9d56706b_lang = "";
const _sfc_main = {
  __name: "payroll_setting",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mx-4 payroll-settings" }, _attrs))} data-v-9d56706b><div class="mb-4 payroll-settings-header" data-v-9d56706b><h4 class="mb-3 text-2xl font-semibold" data-v-9d56706b>Payroll Settings</h4><p class="mb-4 text-sm font-bold text-gray-600" data-v-9d56706b>We kindly asked for your patience as we gather all the necessary information to process the payroll.We understand that is may cause a sightly delay,and we appreciate you understanding during this time.Rest assured that we have worked to simplify the process to male it as easy as possible for you.Thank you for your cooperation </p></div><div class="payroll-settings-cards" data-v-9d56706b><a href="/payroll/work_location" class="bg-blue-900 payroll-settings-content border-indigo-100 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Work Location</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[Office Location and State Confirmation]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-green-200 text-sm border-1 border-solid border-green-300 py-1.5 px-4" data-v-9d56706b><i class="mr-2 fa fa-check-circle" data-v-9d56706b></i> Completed</button><i class="ml-8 mr-6 text-xl font-bold text-white fa fa-angle-double-right" data-v-9d56706b></i></div></a><a href="/payroll/setup" class="bg-blue-900 payroll-settings-content border-orange-200 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Payroll Setup</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[General Setting,Salary Structure &amp; Compenents]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5" data-v-9d56706b><i class="mr-2 fa fa-exclamation-circle" data-v-9d56706b></i> Pending </button><i class="ml-8 mr-6 text-xl font-bold fa fa-angle-double-right text-white-200" data-v-9d56706b></i></div></a><a class="bg-blue-900 payroll-settings-content border-blue-200 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Misc Settings</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[Payment Setting and Components Rounding]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5" data-v-9d56706b><i class="mr-2 fa fa-exclamation-circle" data-v-9d56706b></i> Pending </button><i class="ml-8 mr-6 text-xl font-bold text-white fa fa-angle-double-right" data-v-9d56706b></i></div></a><a class="bg-blue-900 payroll-settings-content border-yellow-200 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Payslip</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[Payslip Option and Fields,Password protections]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5" data-v-9d56706b><i class="mr-2 fa fa-exclamation-circle" data-v-9d56706b></i> Pending </button><i class="ml-8 mr-6 text-xl font-bold text-white fa fa-angle-double-right" data-v-9d56706b></i></div></a><a class="bg-blue-900 payroll-settings-content border-red-200 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center w-1/3" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Full and Final Settlement</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[Opening &amp; closing Notes,Notice Period Buy Out]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5" data-v-9d56706b><i class="mr-2 fa fa-exclamation-circle" data-v-9d56706b></i> Pending </button><i class="ml-8 mr-6 text-xl font-bold text-white fa fa-angle-double-right" data-v-9d56706b></i></div></a><a class="bg-blue-900 payroll-settings-content border-green-600 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Contribution Rate</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[Manage PF Contribution Rate]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5" data-v-9d56706b><i class="mr-2 fa fa-exclamation-circle" data-v-9d56706b></i> Pending </button><i class="ml-8 mr-6 text-xl font-bold text-white fa fa-angle-double-right" data-v-9d56706b></i></div></a><a class="bg-blue-900 payroll-settings-content border-blue-200 cursor-pointer shadow-md text-white flex items-center justify-between rounded-lg p-2.5" data-v-9d56706b><div class="flex items-center" data-v-9d56706b><span class="ml-5 text-lg text-white" data-v-9d56706b>Leave Encashment</span></div><div class="flex col-4" data-v-9d56706b><span class="text-sm font-semibold text-gray-100" data-v-9d56706b>[Leave Encashment Policies Calculation]</span></div><div class="flex items-center col-4" data-v-9d56706b><button class="rounded-full text-yellow-100 text-sm border-1 border-solid border-yellow-300 py-1.5 px-5" data-v-9d56706b><i class="mr-2 fa fa-exclamation-circle" data-v-9d56706b></i> Pending </button><i class="ml-8 mr-6 text-xl font-bold text-white fa fa-angle-double-right" data-v-9d56706b></i></div></a></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/payroll/payroll_setting/payroll_setting.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const payroll_setting = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-9d56706b"]]);
export {
  payroll_setting as p
};
