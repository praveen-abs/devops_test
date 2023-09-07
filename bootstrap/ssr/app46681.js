/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { mergeProps, unref, useSSRContext, createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import AutoComplete from "primevue/autocomplete";
import AccordionTab from "primevue/accordiontab";
import Avatar from "primevue/avatar";
import AvatarGroup from "primevue/avatargroup";
import Badge from "primevue/badge";
import BadgeDirective from "primevue/badgedirective";
import BlockUI from "primevue/blockui";
import Button from "primevue/button";
import Breadcrumb from "primevue/breadcrumb";
import Calendar from "primevue/calendar";
import Card from "primevue/card";
import CascadeSelect from "primevue/cascadeselect";
import Carousel from "primevue/carousel";
import Checkbox from "primevue/checkbox";
import Chip from "primevue/chip";
import Chips from "primevue/chips";
import ColorPicker from "primevue/colorpicker";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup";
import ConfirmDialog from "primevue/confirmdialog";
import ConfirmPopup from "primevue/confirmpopup";
import ConfirmationService from "primevue/confirmationservice";
import ContextMenu from "primevue/contextmenu";
import DataTable from "primevue/datatable";
import DataView from "primevue/dataview";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import DeferredContent from "primevue/deferredcontent";
import Dialog from "primevue/dialog";
import DialogService from "primevue/dialogservice";
import Divider from "primevue/divider";
import Dock from "primevue/dock";
import Dropdown from "primevue/dropdown";
import DynamicDialog from "primevue/dynamicdialog";
import Fieldset from "primevue/fieldset";
import FileUpload from "primevue/fileupload";
import FocusTrap from "primevue/focustrap";
import Galleria from "primevue/galleria";
import Image from "primevue/image";
import InlineMessage from "primevue/inlinemessage";
import Inplace from "primevue/inplace";
import InputSwitch from "primevue/inputswitch";
import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";
import InputNumber from "primevue/inputnumber";
import Knob from "primevue/knob";
import Listbox from "primevue/listbox";
import MegaMenu from "primevue/megamenu";
import Menu from "primevue/menu";
import Menubar from "primevue/menubar";
import Message from "primevue/message";
import MultiSelect from "primevue/multiselect";
import OrderList from "primevue/orderlist";
import OrganizationChart from "primevue/organizationchart";
import OverlayPanel from "primevue/overlaypanel";
import Paginator from "primevue/paginator";
import Panel from "primevue/panel";
import PanelMenu from "primevue/panelmenu";
import Password from "primevue/password";
import PickList from "primevue/picklist";
import ProgressBar from "primevue/progressbar";
import ProgressSpinner from "primevue/progressspinner";
import Rating from "primevue/rating";
import RadioButton from "primevue/radiobutton";
import Ripple from "primevue/ripple";
import Row from "primevue/row";
import SelectButton from "primevue/selectbutton";
import ScrollPanel from "primevue/scrollpanel";
import ScrollTop from "primevue/scrolltop";
import Skeleton from "primevue/skeleton";
import Slider from "primevue/slider";
import Sidebar from "primevue/sidebar";
import SpeedDial from "primevue/speeddial";
import SplitButton from "primevue/splitbutton";
import Splitter from "primevue/splitter";
import SplitterPanel from "primevue/splitterpanel";
import Steps from "primevue/steps";
import StyleClass from "primevue/styleclass";
import TabMenu from "primevue/tabmenu";
import TieredMenu from "primevue/tieredmenu";
import Textarea from "primevue/textarea";
import Toast from "primevue/toast";
import ToastService from "primevue/toastservice";
import Toolbar from "primevue/toolbar";
import TabView from "primevue/tabview";
import TabPanel from "primevue/tabpanel";
import Tag from "primevue/tag";
import Terminal from "primevue/terminal";
import Timeline from "primevue/timeline";
import ToggleButton from "primevue/togglebutton";
import Tooltip from "primevue/tooltip";
import Tree from "primevue/tree";
import TreeSelect from "primevue/treeselect";
import TreeTable from "primevue/treetable";
import TriStateCheckbox from "primevue/tristatecheckbox";
import VirtualScroller from "primevue/virtualscroller";
import { r as router } from "./router46681.js";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderComponent } from "vue/server-renderer";
import dayjs from "dayjs";
import { _ as _export_sfc } from "./_plugin-vue_export-helper46681.js";
import { _ as _sfc_main$7, a as _sfc_main$8 } from "./events46681.js";
import "./dashboard_service46681.js";
import "vue-router";
import "axios";
import "primevue/usetoast";
import "./Service46681.js";
import "xlsx";
import "./NormalOnboardingMainStore46681.js";
import "@vuelidate/core";
import "@vuelidate/validators";
import "autoprefixer";
const _sfc_main$6 = {
  __name: "org_employee_details",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><p class="font-[14px] font-[&#39;Poppins&#39;] text-gray-500"> Current month - <span class="mb-2 text-xl font-semibold">${ssrInterpolate(unref(dayjs)(new Date()).format("MMMM"))}</span></p><div class="grid grid-cols-4 gap-3 my-2"><div class="bg-[#F6F6F6] rounded-lg p-2"><div class="px-auto flex justify-center"><span class="text-3xl font-semibold text-center"> 100 </span></div><p class="text-lg font-semibold text-center text-gray-500">Total Employees</p></div></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/org_employee_details/org_employee_details.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/tasks/task.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/employee_status/employee_status.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({
    class: "p-2 overflow-hidden bg-white rounded-lg",
    style: { "height": "200px" }
  }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Leave Balance</span><div class="h-full overflow-x-scroll bg-white rounded-lg"><div class="px-auto"><div class="p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"><div class="flex px-2 justify-between items-center"><div><span class="text-[14px] font-semibold">Document update</span></div><div class="flex items-center gap-6"><span class="text-xl font-semibold text-black">1</span><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div></div></div></div></div></div>`);
}
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/leave_requests/leave_request.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const LeaveRequest = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["ssrRender", _sfc_ssrRender]]);
const _sfc_main$2 = {};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/overall_employees/overall_employee.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "hr_dashboard",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "h-screen p-3 overflow-auto" }, _attrs))}><div class="grid grid-cols-12 gap-4"><div class="col-span-8"><div class="col-span-12 w-[100%] !rounded-[20px] bg-white p-2">`);
      _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
      _push(`</div><div class="col-span-12 !rounded-[20px]"><div class="grid grid-cols-12 gap-4 my-2"><div class="!rounded-[20px] overflow-hidden bg-red-100 col-span-5">`);
      _push(ssrRenderComponent(LeaveRequest, null, null, _parent));
      _push(`</div><div class="!rounded-[20px] overflow-hidden bg-white col-span-7"><p class="text-center">Employee count in graph</p></div></div></div><div class="col-span-12">`);
      _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
      _push(`</div></div><div class="col-span-4 w-[100%] !rounded-[20px]"><div>`);
      _push(ssrRenderComponent(LeaveRequest, null, null, _parent));
      _push(`</div><div class="py-3">`);
      _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
      _push(`</div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/hr_dashboard.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "second",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(ssrRenderComponent(_sfc_main$1, _attrs, null, _parent));
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/testings/second.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
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
app.component("AccordionTab", AccordionTab);
app.component("AutoComplete", AutoComplete);
app.component("Avatar", Avatar);
app.component("AvatarGroup", AvatarGroup);
app.component("Badge", Badge);
app.component("BlockUI", BlockUI);
app.component("Breadcrumb", Breadcrumb);
app.component("Button", Button);
app.component("Calendar", Calendar);
app.component("Card", Card);
app.component("Carousel", Carousel);
app.component("CascadeSelect", CascadeSelect);
app.component("Checkbox", Checkbox);
app.component("Chip", Chip);
app.component("Chips", Chips);
app.component("ColorPicker", ColorPicker);
app.component("Column", Column);
app.component("ColumnGroup", ColumnGroup);
app.component("ConfirmDialog", ConfirmDialog);
app.component("ConfirmPopup", ConfirmPopup);
app.component("ContextMenu", ContextMenu);
app.component("DataTable", DataTable);
app.component("DataView", DataView);
app.component("DataViewLayoutOptions", DataViewLayoutOptions);
app.component("DeferredContent", DeferredContent);
app.component("Dialog", Dialog);
app.component("Divider", Divider);
app.component("Dock", Dock);
app.component("Dropdown", Dropdown);
app.component("DynamicDialog", DynamicDialog);
app.component("Fieldset", Fieldset);
app.component("FileUpload", FileUpload);
app.component("Galleria", Galleria);
app.component("Image", Image);
app.component("InlineMessage", InlineMessage);
app.component("Inplace", Inplace);
app.component("InputMask", InputMask);
app.component("InputNumber", InputNumber);
app.component("InputSwitch", InputSwitch);
app.component("InputText", InputText);
app.component("Knob", Knob);
app.component("Listbox", Listbox);
app.component("MegaMenu", MegaMenu);
app.component("Menu", Menu);
app.component("Menubar", Menubar);
app.component("Message", Message);
app.component("MultiSelect", MultiSelect);
app.component("OrderList", OrderList);
app.component("OrganizationChart", OrganizationChart);
app.component("OverlayPanel", OverlayPanel);
app.component("Paginator", Paginator);
app.component("Panel", Panel);
app.component("PanelMenu", PanelMenu);
app.component("Password", Password);
app.component("PickList", PickList);
app.component("ProgressBar", ProgressBar);
app.component("ProgressSpinner", ProgressSpinner);
app.component("RadioButton", RadioButton);
app.component("Rating", Rating);
app.component("Row", Row);
app.component("SelectButton", SelectButton);
app.component("ScrollPanel", ScrollPanel);
app.component("ScrollTop", ScrollTop);
app.component("Slider", Slider);
app.component("Sidebar", Sidebar);
app.component("Skeleton", Skeleton);
app.component("SpeedDial", SpeedDial);
app.component("SplitButton", SplitButton);
app.component("Splitter", Splitter);
app.component("SplitterPanel", SplitterPanel);
app.component("Steps", Steps);
app.component("TabMenu", TabMenu);
app.component("TabView", TabView);
app.component("TabPanel", TabPanel);
app.component("Tag", Tag);
app.component("Textarea", Textarea);
app.component("Terminal", Terminal);
app.component("TieredMenu", TieredMenu);
app.component("Timeline", Timeline);
app.component("Toast", Toast);
app.component("Toolbar", Toolbar);
app.component("ToggleButton", ToggleButton);
app.component("Tree", Tree);
app.component("TreeSelect", TreeSelect);
app.component("TreeTable", TreeTable);
app.component("TriStateCheckbox", TriStateCheckbox);
app.component("VirtualScroller", VirtualScroller);
app.mount("#app");
