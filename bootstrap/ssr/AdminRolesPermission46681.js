/* empty css                *//* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, unref, withCtx, createVNode, toDisplayString, createTextVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrInterpolate } from "vue/server-renderer";
import axios from "axios";
const AdminRolePermissionStore = defineStore("AdminRolePermission", () => {
  const arrayRoleDetails = ref();
  const rolesPermission = ref(1);
  async function getRoleDetails() {
    axios.get("/getRoleDetails").then((res) => {
      arrayRoleDetails.value = res.data;
      console.log(arrayRoleDetails.value);
    });
  }
  return {
    arrayRoleDetails,
    rolesPermission,
    getRoleDetails
  };
});
const _sfc_main = {
  __name: "AdminRolesPermission",
  __ssrInlineRender: true,
  setup(__props) {
    const useData = AdminRolePermissionStore();
    ref();
    const expandedRows = ref([]);
    ref([]);
    const selectedAllEmployee = ref();
    onMounted(() => {
      useData.getRoleDetails();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      if (unref(useData).rolesPermission == 1) {
        _push(`<div${ssrRenderAttrs(_attrs)}><div class="w-full mt-30"><div class=""><h1 class="fs-2 fw-semibold my-3">User Roles</h1><p class="fw-semibold mb-3">User Roles can be assigned to the employees from here. New roles can be created and privileges for all these roles can be managed from this section.</p></div><div class="card bg-blue-200 h-20 border-none p-4"><div class="d-flex justify-content-between align-items-center"><h1 class="fw-semibold">Assigned</h1><div class="d-flex justify-content-between align-items-center"><div class="w-80"><input type="text" name="" id="" placeholder="search" class="rounded h-10 w-80 pl-2 shadow-md"></div><button class="bg-white text-blue-800 px-3 py-2 rounded shadow-md mx-2"><i class="pi pi-plus"></i> Assign New Role </button></div></div></div>`);
        _push(ssrRenderComponent(_component_Dialog, {
          header: "Confirmation",
          visible: _ctx.canShowConfirmationDialog,
          "onUpdate:visible": ($event) => _ctx.canShowConfirmationDialog = $event,
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
                onClick: ($event) => _ctx.hideConfirmDialog(true),
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
                  onClick: ($event) => _ctx.hideConfirmDialog(true),
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
          value: unref(useData).arrayRoleDetails,
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
                      selectionMode: "multiple",
                      style: { "width": "1rem" },
                      exportable: false
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "user_code",
                      header: "Employee ID"
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<h1 class=""${_scopeId3}>${ssrInterpolate(slotProps.data.user_code)}</h1>`);
                        } else {
                          return [
                            createVNode("h1", { class: "" }, toDisplayString(slotProps.data.user_code), 1)
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "name",
                      header: "Employee Name"
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "department_name",
                      header: "Department"
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Column, {
                      field: "",
                      header: "Action"
                    }, {
                      body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<button class="shadow-sm px-3 py-2 rounded text-white bg-blue-700"${_scopeId3}>Remove</button>`);
                        } else {
                          return [
                            createVNode("button", {
                              class: "shadow-sm px-3 py-2 rounded text-white bg-blue-700",
                              onClick: ($event) => _ctx.canShowConfirmation(slotProps2.data)
                            }, "Remove", 8, ["onClick"])
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode(_component_Column, {
                        selectionMode: "multiple",
                        style: { "width": "1rem" },
                        exportable: false
                      }),
                      createVNode(_component_Column, {
                        field: "user_code",
                        header: "Employee ID"
                      }, {
                        default: withCtx(() => [
                          createVNode("h1", { class: "" }, toDisplayString(slotProps.data.user_code), 1)
                        ]),
                        _: 2
                      }, 1024),
                      createVNode(_component_Column, {
                        field: "name",
                        header: "Employee Name"
                      }),
                      createVNode(_component_Column, {
                        field: "department_name",
                        header: "Department"
                      }),
                      createVNode(_component_Column, {
                        field: "",
                        header: "Action"
                      }, {
                        body: withCtx((slotProps2) => [
                          createVNode("button", {
                            class: "shadow-sm px-3 py-2 rounded text-white bg-blue-700",
                            onClick: ($event) => _ctx.canShowConfirmation(slotProps2.data)
                          }, "Remove", 8, ["onClick"])
                        ]),
                        _: 2
                      }, 1024)
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
                        selectionMode: "multiple",
                        style: { "width": "1rem" },
                        exportable: false
                      }),
                      createVNode(_component_Column, {
                        field: "user_code",
                        header: "Employee ID"
                      }, {
                        default: withCtx(() => [
                          createVNode("h1", { class: "" }, toDisplayString(slotProps.data.user_code), 1)
                        ]),
                        _: 2
                      }, 1024),
                      createVNode(_component_Column, {
                        field: "name",
                        header: "Employee Name"
                      }),
                      createVNode(_component_Column, {
                        field: "department_name",
                        header: "Department"
                      }),
                      createVNode(_component_Column, {
                        field: "",
                        header: "Action"
                      }, {
                        body: withCtx((slotProps2) => [
                          createVNode("button", {
                            class: "shadow-sm px-3 py-2 rounded text-white bg-blue-700",
                            onClick: ($event) => _ctx.canShowConfirmation(slotProps2.data)
                          }, "Remove", 8, ["onClick"])
                        ]),
                        _: 2
                      }, 1024)
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
                field: "name",
                header: "Roles",
                sortable: ""
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<h1 class="text-blue-800"${_scopeId2}>${ssrInterpolate(slotProps.data.name)}</h1>`);
                  } else {
                    return [
                      createVNode("h1", { class: "text-blue-800" }, toDisplayString(slotProps.data.name), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "description",
                header: "Role Description"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<h1 class="text-gray-600"${_scopeId2}>${ssrInterpolate(slotProps.data.description)}</h1>`);
                  } else {
                    return [
                      createVNode("h1", { class: "text-gray-600" }, toDisplayString(slotProps.data.description), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "assigned_privileged",
                header: "Assigned Privileges",
                sortable: false
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<h1 class="text-blue-800"${_scopeId2}>${ssrInterpolate(slotProps.data.assigned_privileged)}</h1>`);
                  } else {
                    return [
                      createVNode("h1", { class: "text-blue-800" }, toDisplayString(slotProps.data.assigned_privileged), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "assigned_emp",
                header: "Assigned Employees",
                sortable: false
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<h1 class="text-blue-800"${_scopeId2}>${ssrInterpolate(slotProps.data.assigned_emp)}</h1>`);
                  } else {
                    return [
                      createVNode("h1", { class: "text-blue-800" }, toDisplayString(slotProps.data.assigned_emp), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="text-blue-600 fw-semibold hover:underline"${_scopeId2}>Manage Users</button>`);
                  } else {
                    return [
                      createVNode("button", {
                        class: "text-blue-600 fw-semibold hover:underline",
                        onClick: ($event) => _ctx.removeUserRole(slotProps.data)
                      }, "Manage Users", 8, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, { expander: true }),
                createVNode(_component_Column, {
                  field: "name",
                  header: "Roles",
                  sortable: ""
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("h1", { class: "text-blue-800" }, toDisplayString(slotProps.data.name), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "description",
                  header: "Role Description"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("h1", { class: "text-gray-600" }, toDisplayString(slotProps.data.description), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "assigned_privileged",
                  header: "Assigned Privileges",
                  sortable: false
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("h1", { class: "text-blue-800" }, toDisplayString(slotProps.data.assigned_privileged), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "assigned_emp",
                  header: "Assigned Employees",
                  sortable: false
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("h1", { class: "text-blue-800" }, toDisplayString(slotProps.data.assigned_emp), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Action"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "text-blue-600 fw-semibold hover:underline",
                      onClick: ($event) => _ctx.removeUserRole(slotProps.data)
                    }, "Manage Users", 8, ["onClick"])
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
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/roles_permission/AdminRoleAndPermission/AdminRolesPermission.vue");
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
app.mount("#AdminRolesPermission");
