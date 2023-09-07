/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, unref, isRef, withCtx, createVNode, toDisplayString, createTextVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderAttr } from "vue/server-renderer";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { useToast } from "primevue/usetoast";
import dayjs from "dayjs";
import map from "lodash/map.js";
import { L as LoadingSpinner } from "./LoadingSpinner46681.js";
import "./_plugin-vue_export-helper46681.js";
const _sfc_main = {
  __name: "review_document",
  __ssrInlineRender: true,
  setup(__props) {
    const dialog_visible = ref(false);
    let data_review_documents = ref();
    let canShowConfirmation = ref(false);
    let canShowBulkConfirmation = ref(false);
    let canShowBulkConfirmationAll = ref(false);
    let canShowLoadingScreen = ref(true);
    const toast = useToast();
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    const documentPath = ref();
    const showDocDialog = (record_id) => {
      dialog_visible.value = true;
      axios.post("/view-profile-private-file", {
        emp_doc_record_id: record_id
      }).then((res) => {
        console.log(res.data.data);
        documentPath.value = res.data.data;
        console.log("data sent", documentPath.value);
      });
    };
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
    ref(["Pending", "Approved", "Rejected"]);
    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    onMounted(() => {
      data_review_documents.value = [];
      ajax_GetReviewDocumentData();
    });
    function ajax_GetReviewDocumentData() {
      canShowLoadingScreen.value = true;
      axios.get("/fetch-onboarded-doc").then((response) => {
        data_review_documents.value = response.data;
      }).finally(() => {
        canShowLoadingScreen.value = false;
      });
    }
    function showConfirmDialog(selectedRowData, status) {
      canShowConfirmation.value = true;
      currentlySelectedStatus = status;
      currentlySelectedRowData = selectedRowData;
      console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
    }
    function showBulkConfirmDialog(selectedRowData, status) {
      canShowBulkConfirmation.value = true;
      currentlySelectedStatus = status;
      currentlySelectedRowData = selectedRowData;
      console.log("Selected Bulk Row Data : " + JSON.stringify(selectedRowData));
    }
    function hideConfirmDialog(canClearData) {
      canShowConfirmation.value = false;
      if (canClearData)
        resetVars();
    }
    function hideBulkConfirmDialog(canClearData) {
      canShowBulkConfirmation.value = false;
      if (canClearData)
        resetVars();
    }
    function resetVars() {
      currentlySelectedStatus = "";
      currentlySelectedRowData = null;
    }
    ref();
    function processSingleDocumentApproveReject() {
      hideConfirmDialog(false);
      canShowLoadingScreen.value = true;
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
      console.log("currentlySelectedStatus : " + currentlySelectedStatus);
      axios.post("/approvals/onboarding-docs-approve-reject", {
        record_id: currentlySelectedRowData.record_id,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        reviewer_comments: ""
      }).then((response) => {
        console.log(response.data);
        ajax_GetReviewDocumentData();
        toast.add({ severity: "success", summary: "Status", detail: "Processed Successfully !", life: 3e3 });
        resetVars();
      }).catch((error) => {
        canShowLoadingScreen.value = false;
        resetVars();
        console.log(error.toJSON());
      });
    }
    function processBulkDocumentsApproveReject() {
      hideBulkConfirmDialog(false);
      canShowLoadingScreen = true;
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData.documents));
      console.log("currentlySelectedStatus : " + currentlySelectedStatus);
      let processed_doc_ids = map(currentlySelectedRowData.documents, "record_id");
      console.log("Processed doc record ids : " + processed_doc_ids);
      axios.post("/approvals/onboarding-bulkdocs-approve-reject", {
        record_ids: processed_doc_ids,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        reviewer_comments: ""
      }).then((response) => {
        console.log(response.data);
        ajax_GetReviewDocumentData();
        canShowLoadingScreen = false;
        resetVars();
      }).catch((error) => {
        canShowLoadingScreen = false;
        resetVars();
        console.log(error.toJSON());
      });
    }
    const getSeverity = (status) => {
      switch (status) {
        case "Rejected":
          return "danger";
        case "Approved":
          return "success";
        case "Pending":
          return "warning";
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Tag = resolveComponent("Tag");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(canShowLoadingScreen)) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><div class="flex justify-between my-2"><h6 class="mb-3 text-lg font-semibold">Documents Approvals</h6></div><div>`);
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
              onClick: ($event) => processSingleDocumentApproveReject(),
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
                onClick: ($event) => processSingleDocumentApproveReject(),
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
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: unref(canShowBulkConfirmation),
        "onUpdate:visible": ($event) => isRef(canShowBulkConfirmation) ? canShowBulkConfirmation.value = $event : canShowBulkConfirmation = $event,
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
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))} all the documents of this employee?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + " all the documents of this employee?", 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: unref(canShowBulkConfirmationAll),
        "onUpdate:visible": ($event) => isRef(canShowBulkConfirmationAll) ? canShowBulkConfirmationAll.value = $event : canShowBulkConfirmationAll = $event,
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
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))} all the documents of selected employees?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + " all the documents of selected employees?", 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(data_review_documents),
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
            _push2(` No Onboarding documents for the selected status filter `);
          } else {
            return [
              createTextVNode(" No Onboarding documents for the selected status filter ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading employees data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading employees data. Please wait. ")
            ];
          }
        }),
        expansion: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="orders-subtable"${_scopeId}>`);
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
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "doc_status",
                    header: "Status"
                  }, {
                    body: withCtx(({ data }, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Tag, {
                          value: data.doc_status,
                          severity: getSeverity(data.doc_status)
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Tag, {
                            value: data.doc_status,
                            severity: getSeverity(data.doc_status)
                          }, null, 8, ["value", "severity"])
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
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
                    }),
                    createVNode(_component_Column, {
                      field: "doc_status",
                      header: "Status"
                    }, {
                      body: withCtx(({ data }) => [
                        createVNode(_component_Tag, {
                          value: data.doc_status,
                          severity: getSeverity(data.doc_status)
                        }, null, 8, ["value", "severity"])
                      ]),
                      _: 1
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
              createVNode("div", { class: "orders-subtable" }, [
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
                    }),
                    createVNode(_component_Column, {
                      field: "doc_status",
                      header: "Status"
                    }, {
                      body: withCtx(({ data }) => [
                        createVNode(_component_Tag, {
                          value: data.doc_status,
                          severity: getSeverity(data.doc_status)
                        }, null, 8, ["value", "severity"])
                      ]),
                      _: 1
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
              class: "fontSize13px",
              field: "doj",
              header: "Date Of Joining"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.doj).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.doj).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "fontSize13px",
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
                    onClick: ($event) => showBulkConfirmDialog(slotProps.data, "Approve"),
                    style: { "height": "2.5em" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Button, {
                    type: "button",
                    icon: "pi pi-times-circle",
                    class: "p-button-danger Button",
                    label: "Reject All",
                    style: { "margin-left": "8px", "height": "2.5em" },
                    onClick: ($event) => showBulkConfirmDialog(slotProps.data, "Reject")
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
                        onClick: ($event) => showBulkConfirmDialog(slotProps.data, "Approve"),
                        style: { "height": "2.5em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-times-circle",
                        class: "p-button-danger Button",
                        label: "Reject All",
                        style: { "margin-left": "8px", "height": "2.5em" },
                        onClick: ($event) => showBulkConfirmDialog(slotProps.data, "Reject")
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
                class: "fontSize13px",
                field: "doj",
                header: "Date Of Joining"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.doj).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                class: "fontSize13px",
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
                      onClick: ($event) => showBulkConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2.5em" }
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Reject All",
                      style: { "margin-left": "8px", "height": "2.5em" },
                      onClick: ($event) => showBulkConfirmDialog(slotProps.data, "Reject")
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
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dialog_visible.value,
        "onUpdate:visible": ($event) => dialog_visible.value = $event,
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
      _push(ssrRenderComponent(_component_Dialog, {
        visible: _ctx.visible,
        "onUpdate:visible": ($event) => _ctx.visible = $event,
        modal: "",
        header: "Documents",
        style: { width: "40vw" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<img${ssrRenderAttr("src", `http://127.0.0.1:8000/${_ctx.doc_url}`)}${ssrRenderAttr("alt", _ctx.doc_url)} class="block pb-3 m-auto"${_scopeId}>`);
          } else {
            return [
              createVNode("img", {
                src: `http://127.0.0.1:8000/${_ctx.doc_url}`,
                alt: _ctx.doc_url,
                class: "block pb-3 m-auto"
              }, null, 8, ["src", "alt"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/onboarding/review_document.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
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
app.mount("#ReviewDocuments");
