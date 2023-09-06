/* empty css                *//* empty css            *//* empty css                   *//* empty css                 */import { ref, resolveComponent, unref, mergeProps, useSSRContext, onMounted, withCtx, createVNode, toDisplayString, createTextVNode, openBlock, createBlock, Fragment, renderList, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderList } from "vue/server-renderer";
import axios from "axios";
const UseRolePermissionStore = defineStore("UseRolePermissionStore", () => {
  const rolesPermission = ref(1);
  const arrayRoleDetails = ref();
  ref();
  const AdminPrivilege = ref();
  async function getAdminRolesDetails() {
    await axios.get("http://localhost:3000/useRolesAndPermission").then((res) => {
      AdminPrivilege.value = res.data;
    });
  }
  async function getRoleDetails() {
    axios.get("/getRoleDetails").then((res) => {
      arrayRoleDetails.value = res.data;
      console.log(arrayRoleDetails.value);
    });
  }
  async function removeRoleDetails(roles_name, user_id) {
    console.log(roles_name, user_id);
    let url = "/removeRoleToUsers";
    await axios.post(url, {
      roles_name,
      user_id
    }).then((res) => {
    });
  }
  return {
    rolesPermission,
    arrayRoleDetails,
    AdminPrivilege,
    getRoleDetails,
    removeRoleDetails,
    getAdminRolesDetails
  };
});
const _sfc_main$1 = {
  __name: "CreateNewRole",
  __ssrInlineRender: true,
  setup(__props) {
    const RolePermission = UseRolePermissionStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      if (unref(RolePermission).rolesPermission == 2) {
        _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-30" }, _attrs))}><div></div><h1 class="fs-3 fw-semibold mb-2">Create New Role</h1><p class="fs-6 fw-semibold mb-2">Here you can Create role and set permission to them.</p><div class="card shadow-sm"><div class="row my-3 px-2"><div class="col-12"><div class="row"><div class="col-3"><label for="" class="mx-4 fw-semibold">Name of the Role</label></div><div class="col-9">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          class: "h-10 w-6",
          modelValue: _ctx.value,
          "onUpdate:modelValue": ($event) => _ctx.value = $event,
          placeholder: "Enter Name of the Role"
        }, null, _parent));
        _push(`</div></div></div><div class="col-12"><div class="row"><div class="col-3"><label for="" class="mx-4 fw-semibold">Description of the Role</label></div><div class="col-9">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          class: "h-10 w-6",
          modelValue: _ctx.value,
          "onUpdate:modelValue": ($event) => _ctx.value = $event,
          placeholder: "Give Description of the Role"
        }, null, _parent));
        _push(`</div></div></div><div class="col-12"><div class="row"><div class="col-3"><label for="" class="mx-4 fw-semibold">Category Name</label></div><div class="col-9">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "text",
          class: "h-10 w-6",
          modelValue: _ctx.value,
          "onUpdate:modelValue": ($event) => _ctx.value = $event,
          placeholder: "Enter Name of the Sub Category"
        }, null, _parent));
        _push(`</div></div></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/roles_permission/create_new_role/CreateNewRole.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const RolesAndPermission_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "RolesAndPermission",
  __ssrInlineRender: true,
  setup(__props) {
    ref(1);
    const RolePermission = UseRolePermissionStore();
    ref(false);
    ref();
    const currentlySelectedRowData = ref();
    const expandedRows = ref([]);
    ref([]);
    const selectedAllEmployee = ref();
    const canShowConfirmationDialog = ref(false);
    onMounted(() => {
      RolePermission.getRoleDetails();
      RolePermission.getAdminRolesDetails();
    });
    function canShowConfirmation(SelectedRowData) {
      canShowConfirmationDialog.value = true;
      currentlySelectedRowData.value = SelectedRowData;
      console.log(currentlySelectedRowData.value);
    }
    function hideConfirmDialog() {
      canShowConfirmationDialog.value = false;
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[-->`);
      if (unref(RolePermission).rolesPermission == 1) {
        _push(`<div><div class="w-full mt-30"><div class=""><h1 class="fs-2 fw-semibold my-3">User Roles</h1><p class="mb-3 fs-5">New roles can be Created and privileges for all these roles can be managed from this section</p></div><div class="card bg-blue-200 h-20 border-none p-4"><div class="d-flex justify-content-between align-items-center"><div class="w-80"><h1 class="fs-4 text-blue-900 fw-semibold">Created</h1></div><div class=""><button class="bg-white text-blue-900 px-3 py-2 rounded shadow-md fw-semibold"><i class="pi pi-plus fw-semibold"></i><span class="fw-semibold"> New Category</span></button></div></div></div>`);
        _push(ssrRenderComponent(_component_Dialog, {
          header: "Confirmation",
          visible: canShowConfirmationDialog.value,
          "onUpdate:visible": ($event) => canShowConfirmationDialog.value = $event,
          breakpoints: { "960px": "75vw", "640px": "90vw" },
          style: { width: "350px" },
          modal: true
        }, {
          footer: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => _ctx.empDetailsDocumentApproveReject(),
                class: "p-button-text",
                autofocus: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => hideConfirmDialog(),
                class: "p-button-text"
              }, null, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Button, {
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => _ctx.empDetailsDocumentApproveReject(),
                  class: "p-button-text",
                  autofocus: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "No",
                  icon: "pi pi-times",
                  onClick: ($event) => hideConfirmDialog(),
                  class: "p-button-text"
                }, null, 8, ["onClick"])
              ];
            }
          }),
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(_ctx.currentlySelectedStatus)}?</span></div>`);
            } else {
              return [
                createVNode("div", { class: "confirmation-content" }, [
                  createVNode("i", {
                    class: "mr-3 pi pi-exclamation-triangle",
                    style: { "font-size": "2rem" }
                  }),
                  createVNode("span", null, "Are you sure you want to " + toDisplayString(_ctx.currentlySelectedStatus) + "?", 1)
                ])
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`<div class="card shadow-md mt-4">`);
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(RolePermission).AdminPrivilege,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "roles_id",
          onRowExpand: _ctx.onRowExpand,
          onRowCollapse: _ctx.onRowCollapse,
          expandedRows: expandedRows.value,
          "onUpdate:expandedRows": ($event) => expandedRows.value = $event,
          selection: selectedAllEmployee.value,
          "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
          selectAll: _ctx.selectAll,
          onSelectAllChange: _ctx.onSelectAllChange,
          onRowSelect: _ctx.onRowSelect,
          onRowUnselect: _ctx.onRowUnselect,
          rowsPerPageOptions: [5, 10, 25],
          paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
          responsiveLayout: "scroll",
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}"
        }, {
          empty: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(` No Employee Details documents for the selected status filter `);
            } else {
              return [
                createTextVNode(" No Employee Details documents for the selected status filter ")
              ];
            }
          }),
          expansion: withCtx((slotProps, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div${_scopeId}>`);
              _push2(ssrRenderComponent(_component_DataTable, {
                value: slotProps.data.accordian,
                responsiveLayout: "scroll",
                selection: selectedAllEmployee.value,
                "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                selectAll: _ctx.selectAll,
                onSelectAllChange: _ctx.onSelectAllChange
              }, {
                default: withCtx((_, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "Sub_Category_Name",
                      header: "Sub_Category_Name",
                      style: { "width": "10rem" }
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`${ssrInterpolate(slotProps.data.user_code)}`);
                        } else {
                          return [
                            createTextVNode(toDisplayString(slotProps.data.user_code), 1)
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, { header: "Privilege Name" }, {
                      body: withCtx(({ data }, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<!--[-->`);
                          ssrRenderList(data.Privilege, (item, index) => {
                            _push4(`<div class="border-black p-2 d-flex justify-content-start"${_scopeId3}>${ssrInterpolate(item.Privilege_name)}</div>`);
                          });
                          _push4(`<!--]-->`);
                        } else {
                          return [
                            (openBlock(true), createBlock(Fragment, null, renderList(data.Privilege, (item, index) => {
                              return openBlock(), createBlock("div", {
                                key: index,
                                class: "border-black p-2 d-flex justify-content-start"
                              }, toDisplayString(item.Privilege_name), 1);
                            }), 128))
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode(_component_Column, {
                        field: "Sub_Category_Name",
                        header: "Sub_Category_Name",
                        style: { "width": "10rem" }
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(slotProps.data.user_code), 1)
                        ]),
                        _: 2
                      }, 1024),
                      createVNode(_component_Column, { header: "Privilege Name" }, {
                        body: withCtx(({ data }) => [
                          (openBlock(true), createBlock(Fragment, null, renderList(data.Privilege, (item, index) => {
                            return openBlock(), createBlock("div", {
                              key: index,
                              class: "border-black p-2 d-flex justify-content-start"
                            }, toDisplayString(item.Privilege_name), 1);
                          }), 128))
                        ]),
                        _: 1
                      })
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              return [
                createVNode("div", null, [
                  createVNode(_component_DataTable, {
                    value: slotProps.data.accordian,
                    responsiveLayout: "scroll",
                    selection: selectedAllEmployee.value,
                    "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                    selectAll: _ctx.selectAll,
                    onSelectAllChange: _ctx.onSelectAllChange
                  }, {
                    default: withCtx(() => [
                      createVNode(_component_Column, {
                        field: "Sub_Category_Name",
                        header: "Sub_Category_Name",
                        style: { "width": "10rem" }
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(slotProps.data.user_code), 1)
                        ]),
                        _: 2
                      }, 1024),
                      createVNode(_component_Column, { header: "Privilege Name" }, {
                        body: withCtx(({ data }) => [
                          (openBlock(true), createBlock(Fragment, null, renderList(data.Privilege, (item, index) => {
                            return openBlock(), createBlock("div", {
                              key: index,
                              class: "border-black p-2 d-flex justify-content-start"
                            }, toDisplayString(item.Privilege_name), 1);
                          }), 128))
                        ]),
                        _: 1
                      })
                    ]),
                    _: 2
                  }, 1032, ["value", "selection", "onUpdate:selection", "selectAll", "onSelectAllChange"])
                ])
              ];
            }
          }),
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, { expander: true }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "role",
                header: "Roles",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "assigned_privileged",
                header: "Assigned Privileges",
                sortable: false
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "assigned_emp",
                header: "Assigned Employees",
                sortable: false
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="text-blue-800"${_scopeId2}><i class="pi pi-pencil"${_scopeId2}></i></button><button class="text-blue-800 mx-4"${_scopeId2}><i class="pi pi-trash"${_scopeId2}></i></button>`);
                  } else {
                    return [
                      createVNode("button", { class: "text-blue-800" }, [
                        createVNode("i", { class: "pi pi-pencil" })
                      ]),
                      createVNode("button", {
                        class: "text-blue-800 mx-4",
                        onClick: ($event) => canShowConfirmation(slotProps.data)
                      }, [
                        createVNode("i", { class: "pi pi-trash" })
                      ], 8, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, { expander: true }),
                createVNode(_component_Column, {
                  field: "role",
                  header: "Roles",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "assigned_privileged",
                  header: "Assigned Privileges",
                  sortable: false
                }),
                createVNode(_component_Column, {
                  field: "assigned_emp",
                  header: "Assigned Employees",
                  sortable: false
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Action"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", { class: "text-blue-800" }, [
                      createVNode("i", { class: "pi pi-pencil" })
                    ]),
                    createVNode("button", {
                      class: "text-blue-800 mx-4",
                      onClick: ($event) => canShowConfirmation(slotProps.data)
                    }, [
                      createVNode("i", { class: "pi pi-trash" })
                    ], 8, ["onClick"])
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(RolePermission).rolesPermission == 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div>`);
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/roles_permission/RolesAndPermission.vue");
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
app.mount("#SuperAdminRolesPermission");
