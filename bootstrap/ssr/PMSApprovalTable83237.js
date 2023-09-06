/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, withCtx, createVNode, unref, isRef, toDisplayString, createTextVNode, openBlock, createBlock, createCommentVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderClass } from "vue/server-renderer";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
const PMSApprovalTable_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "PMSApprovalTable",
  __ssrInlineRender: true,
  setup(__props) {
    let pms_data = ref();
    let canShowConfirmation = ref(false);
    let canShowLoadingScreen = ref(false);
    useConfirm();
    const toast = useToast();
    const loading = ref(true);
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    const statuses = ref(["Pending", "Approved", "Rejected"]);
    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    onMounted(() => {
      ajax_GetPMSFormsApprovalsData();
    });
    function ajax_GetPMSFormsApprovalsData() {
      let url = window.location.origin + "/fetch_approvals_pmsforms";
      console.log("AJAX URL : " + url);
      axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        pms_data.value = response.data;
        loading.value = false;
      });
    }
    function showConfirmDialog(selectedRowData, status) {
      canShowConfirmation.value = true;
      currentlySelectedStatus = status;
      currentlySelectedRowData = selectedRowData;
      console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
    }
    function hideConfirmDialog(canClearData) {
      canShowConfirmation.value = false;
      if (canClearData)
        resetVars();
    }
    function resetVars() {
      currentlySelectedStatus = "";
      currentlySelectedRowData = null;
    }
    function processApproveReject() {
      hideConfirmDialog(false);
      canShowLoadingScreen.value = true;
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
      axios.post(window.location.origin + "/approvals-pms", {
        kpiform_review_id: currentlySelectedRowData.pms_kpiform_review_id,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus
      }).then((response) => {
        console.log("Response : " + response);
        canShowLoadingScreen.value = false;
        toast.add({ severity: "success", summary: "Info", detail: "Success", life: 3e3 });
        ajax_GetPMSFormsApprovalsData();
        resetVars();
      }).catch((error) => {
        canShowLoadingScreen.value = false;
        resetVars();
        console.log(error.toJSON());
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: loading.value,
        "onUpdate:visible": ($event) => loading.value = $event,
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
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(canShowLoadingScreen),
        "onUpdate:visible": ($event) => isRef(canShowLoadingScreen) ? canShowLoadingScreen.value = $event : canShowLoadingScreen = $event,
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
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: unref(canShowConfirmation),
        "onUpdate:visible": ($event) => isRef(canShowConfirmation) ? canShowConfirmation.value = $event : canShowConfirmation = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => processApproveReject(),
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => hideConfirmDialog(true),
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => processApproveReject(),
                class: "p-button-text",
                autofocus: ""
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => hideConfirmDialog(true),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))}?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + "?", 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(pms_data),
        paginator: true,
        rows: 10,
        dataKey: "id",
        rowsPerPageOptions: [5, 10, 25],
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"],
        style: { "white-space": "nowrap" }
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No PMS forms found. `);
          } else {
            return [
              createTextVNode(" No PMS forms found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading PMS forms data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading PMS forms data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "assignee_name",
              header: "Assignee Name"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.assignee_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.assignee_name), 1)
                  ];
                }
              }),
              filter: withCtx(({ filterModel, filterCallback }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputText, {
                    modelValue: filterModel.value,
                    "onUpdate:modelValue": ($event) => filterModel.value = $event,
                    onInput: ($event) => filterCallback(),
                    placeholder: "Search",
                    class: "p-column-filter",
                    showClear: true
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputText, {
                      modelValue: filterModel.value,
                      "onUpdate:modelValue": ($event) => filterModel.value = $event,
                      onInput: ($event) => filterCallback(),
                      placeholder: "Search",
                      class: "p-column-filter",
                      showClear: true
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "onInput"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "assignment_period",
              header: "Assignment Period"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_name",
              header: "Reviewer Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status",
              icon: "pi pi-check"
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span class="${ssrRenderClass("customer-badge status-" + data.status)}"${_scopeId2}>${ssrInterpolate(data.status)}</span>`);
                } else {
                  return [
                    createVNode("span", {
                      class: "customer-badge status-" + data.status
                    }, toDisplayString(data.status), 3)
                  ];
                }
              }),
              filter: withCtx(({ filterModel, filterCallback }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Dropdown, {
                    modelValue: filterModel.value,
                    "onUpdate:modelValue": ($event) => filterModel.value = $event,
                    onChange: ($event) => filterCallback(),
                    options: statuses.value,
                    placeholder: "Select",
                    class: "p-column-filter",
                    showClear: true
                  }, {
                    value: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        if (slotProps.value) {
                          _push4(`<span class="${ssrRenderClass("customer-badge status-" + slotProps.value)}"${_scopeId3}>${ssrInterpolate(slotProps.value)}</span>`);
                        } else {
                          _push4(`<span${_scopeId3}>${ssrInterpolate(slotProps.placeholder)}</span>`);
                        }
                      } else {
                        return [
                          slotProps.value ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "customer-badge status-" + slotProps.value
                          }, toDisplayString(slotProps.value), 3)) : (openBlock(), createBlock("span", { key: 1 }, toDisplayString(slotProps.placeholder), 1))
                        ];
                      }
                    }),
                    option: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<span class="${ssrRenderClass("customer-badge status-" + slotProps.option)}"${_scopeId3}>${ssrInterpolate(slotProps.option)}</span>`);
                      } else {
                        return [
                          createVNode("span", {
                            class: "customer-badge status-" + slotProps.option
                          }, toDisplayString(slotProps.option), 3)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Dropdown, {
                      modelValue: filterModel.value,
                      "onUpdate:modelValue": ($event) => filterModel.value = $event,
                      onChange: ($event) => filterCallback(),
                      options: statuses.value,
                      placeholder: "Select",
                      class: "p-column-filter",
                      showClear: true
                    }, {
                      value: withCtx((slotProps) => [
                        slotProps.value ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "customer-badge status-" + slotProps.value
                        }, toDisplayString(slotProps.value), 3)) : (openBlock(), createBlock("span", { key: 1 }, toDisplayString(slotProps.placeholder), 1))
                      ]),
                      option: withCtx((slotProps) => [
                        createVNode("span", {
                          class: "customer-badge status-" + slotProps.option
                        }, toDisplayString(slotProps.option), 3)
                      ]),
                      _: 2
                    }, 1032, ["modelValue", "onUpdate:modelValue", "onChange", "options"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "width": "300px" },
              field: "",
              header: "Action"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.status == "Pending") {
                    _push3(`<span${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approve",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Reject",
                      style: { "margin-left": "8px", "height": "2em" },
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Reject")
                    }, null, _parent3, _scopeId2));
                    _push3(`</span>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.status == "Pending" ? (openBlock(), createBlock("span", { key: 0 }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-check-circle",
                        class: "p-button-success Button",
                        label: "Approve",
                        onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-times-circle",
                        class: "p-button-danger Button",
                        label: "Reject",
                        style: { "margin-left": "8px", "height": "2em" },
                        onClick: ($event) => showConfirmDialog(slotProps.data, "Reject")
                      }, null, 8, ["onClick"])
                    ])) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                class: "font-bold",
                field: "assignee_name",
                header: "Assignee Name"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.assignee_name), 1)
                ]),
                filter: withCtx(({ filterModel, filterCallback }) => [
                  createVNode(_component_InputText, {
                    modelValue: filterModel.value,
                    "onUpdate:modelValue": ($event) => filterModel.value = $event,
                    onInput: ($event) => filterCallback(),
                    placeholder: "Search",
                    class: "p-column-filter",
                    showClear: true
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "onInput"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "assignment_period",
                header: "Assignment Period"
              }),
              createVNode(_component_Column, {
                field: "reviewer_name",
                header: "Reviewer Name"
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status",
                icon: "pi pi-check"
              }, {
                body: withCtx(({ data }) => [
                  createVNode("span", {
                    class: "customer-badge status-" + data.status
                  }, toDisplayString(data.status), 3)
                ]),
                filter: withCtx(({ filterModel, filterCallback }) => [
                  createVNode(_component_Dropdown, {
                    modelValue: filterModel.value,
                    "onUpdate:modelValue": ($event) => filterModel.value = $event,
                    onChange: ($event) => filterCallback(),
                    options: statuses.value,
                    placeholder: "Select",
                    class: "p-column-filter",
                    showClear: true
                  }, {
                    value: withCtx((slotProps) => [
                      slotProps.value ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "customer-badge status-" + slotProps.value
                      }, toDisplayString(slotProps.value), 3)) : (openBlock(), createBlock("span", { key: 1 }, toDisplayString(slotProps.placeholder), 1))
                    ]),
                    option: withCtx((slotProps) => [
                      createVNode("span", {
                        class: "customer-badge status-" + slotProps.option
                      }, toDisplayString(slotProps.option), 3)
                    ]),
                    _: 2
                  }, 1032, ["modelValue", "onUpdate:modelValue", "onChange", "options"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "width": "300px" },
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.status == "Pending" ? (openBlock(), createBlock("span", { key: 0 }, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approve",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Reject",
                      style: { "margin-left": "8px", "height": "2em" },
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Reject")
                    }, null, 8, ["onClick"])
                  ])) : createCommentVNode("", true)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/pms/PMSApprovalTable.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
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
app.mount("#vjs_pmsApproval_Table");
