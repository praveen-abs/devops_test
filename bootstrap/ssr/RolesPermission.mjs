/* empty css                        *//* empty css                               *//* empty css                             */import { ref, reactive, onMounted, resolveComponent, withCtx, createVNode, useSSRContext, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
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
import InputNumber from "primevue/inputnumber";
import "primevue/fileupload";
import Calendar from "primevue/calendar";
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import OverlayPanel from "primevue/overlaypanel";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import Tree from "primevue/tree";
import Skeleton from "primevue/skeleton";
import MultiSelect from "primevue/multiselect";
import TreeTable from "primevue/treetable";
import { ssrRenderComponent } from "vue/server-renderer";
import axios from "axios";
const UseRolePermissionServie = defineStore("RolePermissionServie", () => {
  const array_RolePermission_data = ref();
  const AllPermission = ref();
  const CreatingNewJobRole = reactive({
    Role_Title: "",
    Role_description: "",
    Assign_to: ""
  });
  const getAllPermissions = () => {
    axios.get("/getAllPermissions").then((res) => {
      AllPermission.value = res.data;
      console.log(allpermission);
    });
  };
  const saveCreateNewJobRole = () => {
    axios.post("").finally(() => {
    });
  };
  return {
    getAllPermissions,
    saveCreateNewJobRole,
    AllPermission,
    CreatingNewJobRole,
    array_RolePermission_data
  };
});
const RolesPermission_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "RolesPermission",
  __ssrInlineRender: true,
  setup(__props) {
    UseRolePermissionServie();
    ref([]);
    ref();
    const lding = ref(true);
    ref();
    const addNewroleDailog = ref(false);
    ref(true);
    ref(false);
    ref(false);
    const allpermission2 = ref();
    axios.get("/getAllPermissions").then((res) => {
      allpermission2.value = res.data;
      console.log(allpermission2);
    });
    const nodes = ref([
      {
        id: 1,
        key: "0",
        label: "",
        data: "Documents Folder",
        icon: "pi pi-fw pi-inbox",
        children: [
          {
            id: 2,
            key: "1",
            label: "Work",
            data: "Work Folder",
            icon: "pi pi-fw pi-cog",
            children: [
              { key: "0-0-0", label: "Expenses.doc", icon: "pi pi-fw pi-file", data: "Expenses Document" },
              { key: "0-0-1", label: "Resume.doc", icon: "pi pi-fw pi-file", data: "Resume Document" }
            ]
          },
          {
            id: 3,
            key: "2",
            label: "Home",
            data: "Home Folder",
            icon: "pi pi-fw pi-home",
            children: [{ key: "0-1-0", label: "Invoices.txt", icon: "pi pi-fw pi-file", data: "Invoices for this month" }]
          }
        ]
      },
      {
        id: 4,
        key: "4",
        label: "Events",
        data: "Events Folder",
        icon: "pi pi-fw pi-calendar",
        children: [
          { id: 5, key: "1-0", label: "Meeting", icon: "pi pi-fw pi-calendar-plus", data: "Meeting" },
          { id: 6, key: "1-1", label: "Product Launch", icon: "pi pi-fw pi-calendar-plus", data: "Product Launch" },
          { id: 7, key: "1-2", label: "Report Review", icon: "pi pi-fw pi-calendar-plus", data: "Report Review" }
        ]
      }
    ]);
    onMounted(() => {
      setTimeout(() => {
        lding.value = false;
      }, 4e3);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_Tree = resolveComponent("Tree");
      _push(`<!--[--><div class="w-full p-3"><div><h4 class="fs-4 text-xl font-semibold">Employee Roles and Permissions</h4></div><div class="bg-white rounded-lg p-3 border my-3"><p class="text-lg font-semibold text-gray-700">Here you can manage the Employees Roles and Permissions</p><div class="flex justify-between my-6">`);
      _push(ssrRenderComponent(_component_InputText, {
        placeholder: "Search....",
        class: "h-10"
      }, null, _parent));
      _push(`<button class="h-10 mx-6 btn btn-orange">Create Role</button></div><div>`);
      _push(ssrRenderComponent(_component_DataTable, null, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "product",
              header: "Role"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "lastYearSale",
              header: "Who Has Access"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "thisYearSale",
              header: "Actions"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "product",
                header: "Role"
              }),
              createVNode(_component_Column, {
                field: "lastYearSale",
                header: "Who Has Access"
              }),
              createVNode(_component_Column, {
                field: "thisYearSale",
                header: "Actions"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: addNewroleDailog.value,
        "onUpdate:visible": ($event) => addNewroleDailog.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "65vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="font-semibold text-lg"${_scopeId}> Creating New Job Role</p>`);
          } else {
            return [
              createVNode("p", { class: "font-semibold text-lg" }, " Creating New Job Role")
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><button class="px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md"${_scopeId}>Cancel</button><button class="py-2 mx-4 btn btn-orange"${_scopeId}>Create Role</button></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("button", {
                  class: "px-4 py-2 text-lg font-semibold text-gray-900 bg-gray-400 rounded-md",
                  onClick: ($event) => addNewroleDailog.value = false
                }, "Cancel", 8, ["onClick"]),
                createVNode("button", { class: "py-2 mx-4 btn btn-orange" }, "Create Role")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="p-4"${_scopeId}><div class="grid grid-cols-12"${_scopeId}><h5 class="text-lg font-semibold col-span-2"${_scopeId}>Role Title</h5>`);
            _push2(ssrRenderComponent(_component_InputText, {
              placeholder: "Role Title",
              class: "h-10 col-span-6"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-3 grid grid-cols-12"${_scopeId}><h5 class="text-lg font-semibold col-span-2"${_scopeId}>Role Description</h5>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              placeholder: "Role Description ",
              autoResize: "",
              class: "col-span-6"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="my-3 grid grid-cols-12"${_scopeId}><h5 class="text-lg font-semibold col-span-2"${_scopeId}>Assign To</h5>`);
            _push2(ssrRenderComponent(_component_Tree, {
              value: nodes.value,
              selectionMode: "checkbox",
              class: "font-semibold col-span-6"
            }, null, _parent2, _scopeId));
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", { class: "p-4" }, [
                createVNode("div", { class: "grid grid-cols-12" }, [
                  createVNode("h5", { class: "text-lg font-semibold col-span-2" }, "Role Title"),
                  createVNode(_component_InputText, {
                    placeholder: "Role Title",
                    class: "h-10 col-span-6"
                  })
                ]),
                createVNode("div", { class: "my-3 grid grid-cols-12" }, [
                  createVNode("h5", { class: "text-lg font-semibold col-span-2" }, "Role Description"),
                  createVNode(_component_Textarea, {
                    placeholder: "Role Description ",
                    autoResize: "",
                    class: "col-span-6"
                  })
                ]),
                createVNode("div", { class: "my-3 grid grid-cols-12" }, [
                  createVNode("h5", { class: "text-lg font-semibold col-span-2" }, "Assign To"),
                  createVNode(_component_Tree, {
                    value: nodes.value,
                    selectionMode: "checkbox",
                    class: "font-semibold col-span-6"
                  }, null, 8, ["value"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/roles_permission/RolesPermission.vue");
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
app.component("OverlayPanel", OverlayPanel);
app.component("ConfirmDialog", ConfirmDialog);
app.component("Dropdown", Dropdown);
app.component("InputText", InputText);
app.component("Dialog", Dialog);
app.component("ProgressSpinner", ProgressSpinner);
app.component("Calendar", Calendar);
app.component("Textarea", Textarea);
app.component("Chips", Chips);
app.component("InputNumber", InputNumber);
app.component("Accordion", Accordion);
app.component("AccordionTab", AccordionTab);
app.component("Tree", Tree);
app.component("Skeleton", Skeleton);
app.component("MultiSelect", MultiSelect);
app.component("TreeTable", TreeTable);
app.mount("#VJS_RolesPermissions");
