/* empty css            *//* empty css                   *//* empty css                 */import { ref, resolveComponent, mergeProps, useSSRContext, createApp } from "vue";
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
import Toast from "primevue/toast";
import Dialog from "primevue/dialog";
import Dropdown from "primevue/dropdown";
import ConfirmationService from "primevue/confirmationservice";
import ToastService from "primevue/toastservice";
import ProgressSpinner from "primevue/progressspinner";
import InputText from "primevue/inputtext";
import Calendar from "primevue/calendar";
import Password from "primevue/password";
import { createPinia } from "pinia";
import { ssrRenderAttrs, ssrRenderAttr, ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
<<<<<<<< HEAD:bootstrap/ssr/login_Page46681.js
const _imports_0 = "/build/login-page-img46681.png";
const _imports_1 = "/build/evangelist46681.png";
const _imports_2 = "/build/Google_logo46681.png";
const _imports_3 = "/build/Linkedin_logo46681.png";
const _imports_4 = "/build/Microsoft_logo46681.png";
const _imports_5 = "/build/Playstore_Logo46681.png";
const _imports_6 = "/build/App_Store_Logo46681.png";
========
const _imports_0 = "/build/login-page-img92532.png";
const _imports_1 = "/build/evangelist92532.png";
const _imports_2 = "/build/Google_logo92532.png";
const _imports_3 = "/build/Linkedin_logo92532.png";
const _imports_4 = "/build/Microsoft_logo92532.png";
const _imports_5 = "/build/Playstore_Logo92532.png";
const _imports_6 = "/build/App_Store_Logo92532.png";
>>>>>>>> 3d11572c6ee7fb534efc658b88a39b370fca8e71:bootstrap/ssr/login_Page92532.js
const login_Page_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "login_Page",
  __ssrInlineRender: true,
  setup(__props) {
    const name = ref();
    ref();
    ref();
    ref();
    const value = ref(null);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_Password = resolveComponent("Password");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "h-screen bg-gray-100 text-gray-900 flex justify-between w-[100%]" }, _attrs))}><div class="sm:rounded-lg flex justify-between flex-1 !w-[100%]"><div class="flex-1 text-center hidden lg:flex w-[100%]"><div class="w-[100%] bg-contain bg-center bg-no-repeat relative"><img${ssrRenderAttr("src", _imports_0)} alt="" class="w-[100%] h-[100vh]"><div class="absolute bottom-[50%] left-[15%] font-medium font-sans d-flex justify-center xl:absolute xl:bottom-[50%] xl:left-[20%]"><h1 class="text-[64px] text-white font-[&#39;Quicksand&#39;] xl:text-[72px]">Great</h1><div class="px-3 mt-2 h-[80px]"><h1 class="text-[20px] w-[300px] text-left leading-[40px] text-white font-[&#39;Poppins&#39;] xl:text-[24px]"> Company begins with a Decision</h1></div></div></div></div><div class="lg:w-1/2 xl:w-5/12 sm:p-12 w-[100%] float-right h-[100vh]"><div class="w-100 d-flex justify-content-center flex-col align-items-center"><div class="flex flex-col items-center"><img${ssrRenderAttr("src", _imports_1)} class="w-[150px] mx-auto"></div><div class="flex-1 w-[400px] h-[480px] mt-[30px] d-flex justify-content-center align-item-center flex-col"><h1 class="text-[16px] font-medium text-center font-[&#39;Poppins&#39;]">Login to run your business together </h1><div class="w-full mt-[30px]"><div class=""><span class="p-float-label">`);
      _push(ssrRenderComponent(_component_InputText, {
        id: "username",
        modelValue: name.value,
        "onUpdate:modelValue": ($event) => name.value = $event,
        class: "w-full !rounded-[20px]"
      }, null, _parent));
      _push(`<label for="username" class="pl-[18] text-blue-800 font-[&#39;Poppins&#39;] flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg><p class="px-2">Username</p></label></span></div><div class="w-full mt-[24px]"><span class="p-float-label">`);
      _push(ssrRenderComponent(_component_Password, {
        modelValue: value.value,
        "onUpdate:modelValue": ($event) => value.value = $event,
        toggleMask: ""
      }, null, _parent));
      _push(`<label for="username" class="pl-[18] text-blue-800 font-[&#39;Poppins&#39;] cursor-pointer flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg><p class="px-2">password</p></label></span><div class="w-full"><p class="w-[140px] py-2 hover:text-blue-500 text-[12px] text-color[#535353] cursor-pointer float-right font-[&#39;Poppins&#39;] font-medium"> Forgot Password ?</p></div></div><button class="mt-[4px] h-[35px] rounded-[20px] w-full text-[16px] font-[&#39;Poppins&#39;]" style="${ssrRenderStyle({ "background-color": "#001820", "color": "#CCCCCC" })}"> Login </button><div class="row mt-2"><div class="col h-0 border-b-[1px] border-[#CCCCCC] mt-1"></div><div class="col-1 text-[14px] font-[&#39;Poppins&#39;] text-[#CCCCCC]">Or</div><div class="col h-0 border-b-[1px] border-[#CCCCCC] mt-1"></div></div><div class="mt-[14px] d-flex justify-content-center"><div class="w-[150px] py-2 bg-[#E6E6E6] d-flex justify-content-between rounded-md"><img${ssrRenderAttr("src", _imports_2)} alt="" class="mx-2" style="${ssrRenderStyle({ "width": "25px", "height": "25px" })}"><img${ssrRenderAttr("src", _imports_3)} alt="" class="mx-2" style="${ssrRenderStyle({ "width": "25px", "height": "25px" })}"><img${ssrRenderAttr("src", _imports_4)} alt="" class="mx-2" style="${ssrRenderStyle({ "width": "25px", "height": "25px" })}"></div></div><div class="d-flex justify-content-center align-items-center flex-col mt-[15px]"><div class="d-flex align-items-center flex-col"><p class="text-[10.89px] font-[&#39;Poppins&#39;] font-semibold text-[#8B8B8B] text-center"> Available for</p><h1 class="text-[18px] font-[&#39;Poppins&#39;] font-semibold text-[#8B8B8B]">Download</h1></div><div class="flex justify-center relative top-3"><div class="w-[120px]"><img${ssrRenderAttr("src", _imports_5)} class="" alt=""></div><div class="w-[120px] mx-2"><img${ssrRenderAttr("src", _imports_6)} class="w-full h-full" alt=""></div></div></div><div class="d-flex justify-content-center relative top-8"><div class="flex justify-center mt-[10px] w-[150px]"><p class="text-[12px] text-[#8B8B8B] font-[&#39;Poppins&#39;]">Powered by</p><div class="w-[148px]"><img${ssrRenderAttr("src", _imports_1)} alt="" class="w-full h-full"></div></div></div></div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/login_Page/login_Page.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
const pinia = createPinia();
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(pinia);
app.directive("tooltip", Tooltip);
app.directive("badge", BadgeDirective);
app.directive("ripple", Ripple);
app.directive("styleclass", StyleClass);
app.directive("focustrap", FocusTrap);
app.component("Button", Button);
app.component("DataTable", DataTable);
app.component("Column", Column);
app.component("ConfirmDialog", ConfirmDialog);
app.component("Toast", Toast);
app.component("Dialog", Dialog);
app.component("Dropdown", Dropdown);
app.component("ProgressSpinner", ProgressSpinner);
app.component("InputText", InputText);
app.component("Calendar", Calendar);
app.component("Password", Password);
app.mount("#login_Page");
