/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, unref, withCtx, createVNode, createTextVNode, toDisplayString, useSSRContext, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
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
import moment from "moment";
import Checkbox from "primevue/checkbox";
import Tag from "primevue/tag";
import { ssrRenderComponent, ssrInterpolate, ssrRenderStyle, ssrRenderAttr } from "vue/server-renderer";
import { FilterMatchMode } from "primevue/api";
import axios from "axios";
import map from "lodash/map.js";
import { S as Service } from "./Service83237.js";
import { L as LoadingSpinner } from "./LoadingSpinner83237.js";
import "./_plugin-vue_export-helper83237.js";
const UseEmpDetailApprovalsStore = defineStore("EmpDetailApprovalsStore", () => {
  const array_EmpDetails_list = ref();
  const canShowLoadingScreen = ref();
  async function getEmpDetails_list() {
    canShowLoadingScreen.value = true;
    await axios.get("/fetch-proof-doc").then((res) => {
      console.log(res.data);
      array_EmpDetails_list.value = res.data;
      console.log(array_EmpDetails_list.value);
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  return {
    array_EmpDetails_list,
    canShowLoadingScreen,
    getEmpDetails_list
  };
});
const _sfc_main = {
  __name: "EmpDetails_approvals",
  __ssrInlineRender: true,
  setup(__props) {
    const current_user_id = Service();
    const EmpDetailStore = UseEmpDetailApprovalsStore();
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    const canShowConfirmationAll = ref(false);
    const canShowConfirmation = ref(false);
    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    const canShowLoadingScreen = ref(false);
    const dialog_visible = ref(false);
    const documentPath = ref();
    onMounted(async () => {
      await EmpDetailStore.getEmpDetails_list();
    });
    ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: "Pending", matchMode: FilterMatchMode.EQUALS }
    });
    const showDocDialog = (record_id) => {
      dialog_visible.value = true;
      axios.post("view/getEmpProfileProofPrivateDoc", {
        emp_doc_record_id: record_id
      }).then((res) => {
        console.log(res.data.data);
        documentPath.value = res.data.data;
        console.log("data sent", documentPath.value);
      }).finally(() => {
      });
    };
    function showConfirmDialog(selectedRowData, status) {
      canShowConfirmation.value = true;
      currentlySelectedStatus = status;
      currentlySelectedRowData = selectedRowData;
      console.log("Selected Bulk Row Data : " + JSON.stringify(selectedRowData));
    }
    function resetVars() {
      currentlySelectedStatus = "";
      currentlySelectedRowData = null;
    }
    function hideConfirmDialog(canClearData) {
      canShowConfirmation.value = false;
      if (canClearData)
        resetVars();
    }
    function hideBulkConfirmDialog(canClearData) {
      canShowConfirmationAll.value = false;
      if (canClearData)
        resetVars();
    }
    const getBulkApprovalList = (selectedRowData, status) => {
      canShowConfirmationAll.value = true;
      currentlySelectedStatus = status;
      currentlySelectedRowData = selectedRowData;
    };
    const processBulkDocumentsApproveReject = () => {
      EmpDetailStore.canShowLoadingScreen = true;
      hideBulkConfirmDialog();
      let processed_doc_ids = map(currentlySelectedRowData, "record_id");
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData.documents));
      console.log("currentlySelectedStatus : " + currentlySelectedStatus);
      console.log("Processed doc record ids : " + processed_doc_ids);
      axios.post(
        "/approvals/EmployeeProof-bulkdocs-approve-reject",
        {
          approver_user_id: current_user_id.current_user_id,
          record_id: processed_doc_ids,
          status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
          reviewer_comments: ""
        }
      ).then((res) => {
        console.log("testing data", res.data);
      }).finally(() => {
        EmpDetailStore.canShowLoadingScreen = false;
        EmpDetailStore.getEmpDetails_list();
        resetVars();
      });
    };
    function empDetailsDocumentApproveReject() {
      EmpDetailStore.canShowLoadingScreen = true;
      hideConfirmDialog();
      axios.post(
        "/approvals/EmployeeProof-docs-approve-reject",
        {
          approver_user_id: current_user_id.current_user_id,
          record_id: currentlySelectedRowData.record_id,
          status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
          reviewer_comments: ""
        }
      ).then((res) => {
        console.log("testing data", res.data);
      }).finally(() => {
        EmpDetailStore.canShowLoadingScreen = false;
        resetVars();
        EmpDetailStore.getEmpDetails_list();
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[-->`);
      if (unref(EmpDetailStore).canShowLoadingScreen) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full p-2"><h1 class="font-semibold text-lg mb-2">Employee Details </h1>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: canShowConfirmationAll.value,
        "onUpdate:visible": ($event) => canShowConfirmationAll.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "580px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => processBulkDocumentsApproveReject(),
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => hideBulkConfirmDialog(true),
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => processBulkDocumentsApproveReject(),
                class: "p-button-text",
                autofocus: ""
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => hideBulkConfirmDialog(true),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}> Documents Approvals <span${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))} all the documents of this employee?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createTextVNode(" Documents Approvals "),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + " all the documents of this employee?", 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: canShowConfirmation.value,
        "onUpdate:visible": ($event) => canShowConfirmation.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => empDetailsDocumentApproveReject(),
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
                onClick: ($event) => empDetailsDocumentApproveReject(),
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
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(EmpDetailStore).array_EmpDetails_list,
        paginator: true,
        rows: 10,
        class: "",
        dataKey: "user_code",
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
              value: slotProps.data.documents,
              responsiveLayout: "scroll",
              selection: selectedAllEmployee.value,
              "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
              selectAll: _ctx.selectAll,
              onSelectAllChange: _ctx.onSelectAllChange
            }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "doc_name",
                    header: "Document Name"
                  }, {
                    default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.doc_name)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.doc_name), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "doc_status",
                    header: "Status"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "",
                    header: "View"
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Button, {
                          type: "button",
                          icon: "pi pi-eye",
                          class: "p-button-success Button",
                          label: "View",
                          onClick: ($event) => showDocDialog(slotProps2.data.record_id),
                          style: { "height": "2em" }
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Button, {
                            type: "button",
                            icon: "pi pi-eye",
                            class: "p-button-success Button",
                            label: "View",
                            onClick: ($event) => showDocDialog(slotProps2.data.record_id),
                            style: { "height": "2em" }
                          }, null, 8, ["onClick"])
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "",
                    header: "Action"
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<span${_scopeId3}>`);
                        _push4(ssrRenderComponent(_component_Button, {
                          type: "button",
                          icon: "pi pi-check-circle",
                          class: "p-button-success Button",
                          label: "Approve",
                          onClick: ($event) => showConfirmDialog(slotProps2.data, "Approve"),
                          style: { "height": "2.5em" }
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Button, {
                          type: "button",
                          icon: "pi pi-times-circle",
                          class: "p-button-danger Button",
                          label: "Reject",
                          style: { "margin-left": "8px", "height": "2.5em" },
                          onClick: ($event) => showConfirmDialog(slotProps2.data, "Reject")
                        }, null, _parent4, _scopeId3));
                        _push4(`</span>`);
                      } else {
                        return [
                          createVNode("span", null, [
                            createVNode(_component_Button, {
                              type: "button",
                              icon: "pi pi-check-circle",
                              class: "p-button-success Button",
                              label: "Approve",
                              onClick: ($event) => showConfirmDialog(slotProps2.data, "Approve"),
                              style: { "height": "2.5em" }
                            }, null, 8, ["onClick"]),
                            createVNode(_component_Button, {
                              type: "button",
                              icon: "pi pi-times-circle",
                              class: "p-button-danger Button",
                              label: "Reject",
                              style: { "margin-left": "8px", "height": "2.5em" },
                              onClick: ($event) => showConfirmDialog(slotProps2.data, "Reject")
                            }, null, 8, ["onClick"])
                          ])
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "doc_name",
                      header: "Document Name"
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.doc_name), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "doc_status",
                      header: "Status"
                    }),
                    createVNode(_component_Column, {
                      field: "",
                      header: "View"
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode(_component_Button, {
                          type: "button",
                          icon: "pi pi-eye",
                          class: "p-button-success Button",
                          label: "View",
                          onClick: ($event) => showDocDialog(slotProps2.data.record_id),
                          style: { "height": "2em" }
                        }, null, 8, ["onClick"])
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "",
                      header: "Action"
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("span", null, [
                          createVNode(_component_Button, {
                            type: "button",
                            icon: "pi pi-check-circle",
                            class: "p-button-success Button",
                            label: "Approve",
                            onClick: ($event) => showConfirmDialog(slotProps2.data, "Approve"),
                            style: { "height": "2.5em" }
                          }, null, 8, ["onClick"]),
                          createVNode(_component_Button, {
                            type: "button",
                            icon: "pi pi-times-circle",
                            class: "p-button-danger Button",
                            label: "Reject",
                            style: { "margin-left": "8px", "height": "2.5em" },
                            onClick: ($event) => showConfirmDialog(slotProps2.data, "Reject")
                          }, null, 8, ["onClick"])
                        ])
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
                  value: slotProps.data.documents,
                  responsiveLayout: "scroll",
                  selection: selectedAllEmployee.value,
                  "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                  selectAll: _ctx.selectAll,
                  onSelectAllChange: _ctx.onSelectAllChange
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      field: "doc_name",
                      header: "Document Name"
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.doc_name), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "doc_status",
                      header: "Status"
                    }),
                    createVNode(_component_Column, {
                      field: "",
                      header: "View"
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode(_component_Button, {
                          type: "button",
                          icon: "pi pi-eye",
                          class: "p-button-success Button",
                          label: "View",
                          onClick: ($event) => showDocDialog(slotProps2.data.record_id),
                          style: { "height": "2em" }
                        }, null, 8, ["onClick"])
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "",
                      header: "Action"
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("span", null, [
                          createVNode(_component_Button, {
                            type: "button",
                            icon: "pi pi-check-circle",
                            class: "p-button-success Button",
                            label: "Approve",
                            onClick: ($event) => showConfirmDialog(slotProps2.data, "Approve"),
                            style: { "height": "2.5em" }
                          }, null, 8, ["onClick"]),
                          createVNode(_component_Button, {
                            type: "button",
                            icon: "pi pi-times-circle",
                            class: "p-button-danger Button",
                            label: "Reject",
                            style: { "margin-left": "8px", "height": "2.5em" },
                            onClick: ($event) => showConfirmDialog(slotProps2.data, "Reject")
                          }, null, 8, ["onClick"])
                        ])
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
              selectionMode: "multiple",
              style: { "width": "1rem" },
              exportable: false
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "user_code",
              header: "Employee Id",
              sortable: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "name",
              header: "Employee Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "doc_status",
              header: "Approval Status",
              sortable: false
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(data.doc_status)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(data.doc_status), 1)
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
                  _push3(`<span${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_Button, {
                    type: "button",
                    icon: "pi pi-check-circle",
                    class: "p-button-success Button",
                    label: "Approve All",
                    onClick: ($event) => getBulkApprovalList(slotProps.data.documents, "Approve"),
                    style: { "height": "2.5em" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Button, {
                    type: "button",
                    icon: "pi pi-times-circle",
                    class: "p-button-danger Button",
                    label: "Reject All",
                    style: { "margin-left": "8px", "height": "2.5em" },
                    onClick: ($event) => getBulkApprovalList(slotProps.data.documents, "Reject")
                  }, null, _parent3, _scopeId2));
                  _push3(`</span>`);
                } else {
                  return [
                    createVNode("span", null, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-check-circle",
                        class: "p-button-success Button",
                        label: "Approve All",
                        onClick: ($event) => getBulkApprovalList(slotProps.data.documents, "Approve"),
                        style: { "height": "2.5em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-times-circle",
                        class: "p-button-danger Button",
                        label: "Reject All",
                        style: { "margin-left": "8px", "height": "2.5em" },
                        onClick: ($event) => getBulkApprovalList(slotProps.data.documents, "Reject")
                      }, null, 8, ["onClick"])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { expander: true }),
              createVNode(_component_Column, {
                selectionMode: "multiple",
                style: { "width": "1rem" },
                exportable: false
              }),
              createVNode(_component_Column, {
                field: "user_code",
                header: "Employee Id",
                sortable: ""
              }),
              createVNode(_component_Column, {
                field: "name",
                header: "Employee Name"
              }),
              createVNode(_component_Column, {
                field: "doc_status",
                header: "Approval Status",
                sortable: false
              }, {
                body: withCtx(({ data }) => [
                  createTextVNode(toDisplayString(data.doc_status), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("span", null, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approve All",
                      onClick: ($event) => getBulkApprovalList(slotProps.data.documents, "Approve"),
                      style: { "height": "2.5em" }
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Reject All",
                      style: { "margin-left": "8px", "height": "2.5em" },
                      onClick: ($event) => getBulkApprovalList(slotProps.data.documents, "Reject")
                    }, null, 8, ["onClick"])
                  ])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      if (canShowLoadingScreen.value == false) {
        _push(ssrRenderComponent(_component_Dialog, {
          visible: dialog_visible.value,
          "onUpdate:visible": ($event) => dialog_visible.value = $event,
          class: "z-0",
          modal: "",
          header: "Documents",
          style: { width: "40vw" }
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<img${ssrRenderAttr("src", `data:image/png;base64,${documentPath.value}`)}${ssrRenderAttr("alt", _ctx.doc_url)} class="block pb-3 m-auto"${_scopeId}>`);
            } else {
              return [
                createVNode("img", {
                  src: `data:image/png;base64,${documentPath.value}`,
                  alt: _ctx.doc_url,
                  class: "block pb-3 m-auto"
                }, null, 8, ["src", "alt"])
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/employeeDetails_approvals/EmpDetails_approvals.vue");
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
app.component("moment", moment);
app.component("Checkbox", Checkbox);
app.component("Tag", Tag);
app.mount("#EmpDetails_approvals");
