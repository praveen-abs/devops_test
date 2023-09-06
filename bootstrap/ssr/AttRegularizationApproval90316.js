/* empty css            *//* empty css                   *//* empty css                 */import { ref, inject, onUpdated, onMounted, resolveComponent, unref, isRef, withCtx, createVNode, toDisplayString, openBlock, createBlock, createCommentVNode, createTextVNode, useSSRContext, createApp } from "vue";
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
import Tag from "primevue/tag";
import Textarea from "primevue/textarea";
import { defineStore, createPinia } from "pinia";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderClass, ssrRenderAttr } from "vue/server-renderer";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import moment from "moment";
import { S as Service } from "./Service90316.js";
import { L as LoadingSpinner } from "./LoadingSpinner90316.js";
import dayjs from "dayjs";
import "./_plugin-vue_export-helper90316.js";
const UseAttendanceStore = defineStore("UseAttendance", () => {
  const canShowLoadingScreen = ref(false);
  return {
    canShowLoadingScreen
  };
});
const attendance_regularization_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
  __name: "attendance_regularization",
  __ssrInlineRender: true,
  setup(__props) {
    const UseAttendance = UseAttendanceStore();
    let att_regularization = ref();
    let canShowConfirmation = ref(false);
    ref(false);
    useConfirm();
    const toast = useToast();
    const reject = ref("");
    const reviewer_comment = ref();
    const service = Service();
    inject("$swal");
    onUpdated(() => {
      canShowConfirmation ? reviewer_comment.value = null : "";
    });
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: "Pending", matchMode: FilterMatchMode.EQUALS }
    });
    const statuses = ref(["Pending", "Approved", "Rejected"]);
    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    onMounted(() => {
      ajax_GetAttRegularizationData();
    });
    function ajax_GetAttRegularizationData() {
      UseAttendance.canShowLoadingScreen = true;
      let url = window.location.origin + "/fetch-att-regularization-data";
      axios.get(url).then((response) => {
        att_regularization.value = Object.values(response.data);
      }).finally(() => {
        UseAttendance.canShowLoadingScreen = false;
      });
    }
    function showConfirmDialog(selectedRowData, status) {
      canShowConfirmation.value = true;
      currentlySelectedStatus = status;
      reject.value = status;
      currentlySelectedRowData = selectedRowData;
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
    function processApproveReject() {
      hideConfirmDialog(false);
      UseAttendance.canShowLoadingScreen = true;
      axios.post(window.location.origin + "/attendance-regularization-approvals", {
        record_id: currentlySelectedRowData.id,
        approver_user_code: service.current_user_code,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        status_text: reviewer_comment.value
      }).then((response) => {
        if (response.data.status == "success") {
          toast.add({
            severity: "success",
            summary: "Success",
            detail: "Your request has been recorded successfully",
            life: 3e3
          });
        } else {
          Swal.fire(
            "Failure",
            `${response.data.message}`,
            "error"
          );
        }
        resetVars();
      }).catch((error) => {
        UseAttendance.canShowLoadingScreen = false;
        resetVars();
      }).finally(() => {
        reviewer_comment.value = null;
        UseAttendance.canShowLoadingScreen = false;
        ajax_GetAttRegularizationData();
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_Tag = resolveComponent("Tag");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: unref(canShowConfirmation),
        "onUpdate:visible": ($event) => isRef(canShowConfirmation) ? canShowConfirmation.value = $event : canShowConfirmation = $event,
        breakpoints: { "960px": "80vw", "640px": "90vw" },
        style: { width: "380px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: processApproveReject,
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => isRef(canShowConfirmation) ? canShowConfirmation.value = false : canShowConfirmation = false,
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: processApproveReject,
                class: "p-button-text",
                autofocus: ""
              }),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => isRef(canShowConfirmation) ? canShowConfirmation.value = false : canShowConfirmation = false,
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-2 text-red-600 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "1.3rem" })}"${_scopeId}></i><span class="my-auto"${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))}?</span></div>`);
            if (reject.value == "Reject") {
              _push2(`<div class="flex w-full p-2 justify-left"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Textarea, {
                modelValue: reviewer_comment.value,
                "onUpdate:modelValue": ($event) => reviewer_comment.value = $event,
                rows: "3",
                cols: "30",
                class: "border rounded-md"
              }, null, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-2 text-red-600 pi pi-exclamation-triangle",
                  style: { "font-size": "1.3rem" }
                }),
                createVNode("span", { class: "my-auto" }, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + "?", 1)
              ]),
              reject.value == "Reject" ? (openBlock(), createBlock("div", {
                key: 0,
                class: "flex w-full p-2 justify-left"
              }, [
                createVNode(_component_Textarea, {
                  modelValue: reviewer_comment.value,
                  "onUpdate:modelValue": ($event) => reviewer_comment.value = $event,
                  rows: "3",
                  cols: "30",
                  class: "border rounded-md"
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ])) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(att_regularization),
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        sortField: "attendance_date",
        sortOrder: -1,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["name", "status"]
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employeee found. `);
          } else {
            return [
              createTextVNode(" No Employeee found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "employee_name",
              header: "Employee Name"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="pl-2 text-left"${_scopeId2}>${ssrInterpolate(slotProps.data.employee_name)}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "pl-2 text-left" }, toDisplayString(slotProps.data.employee_name), 1)
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
              field: "attendance_date",
              header: "Date",
              sortable: true,
              style: { "min-width": "10rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<h1 class="text-right"${_scopeId2}>${ssrInterpolate(unref(moment)(slotProps.data.attendance_date).format("DD-MM-YYYY"))}</h1>`);
                } else {
                  return [
                    createVNode("h1", { class: "text-right" }, toDisplayString(unref(moment)(slotProps.data.attendance_date).format("DD-MM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "regularization_type",
              header: "Type",
              style: { "min-width": "10rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="p-2 text-center"${_scopeId2}>${ssrInterpolate(slotProps.data.regularization_type)}</div>`);
                } else {
                  return [
                    createVNode("div", { class: "p-2 text-center" }, toDisplayString(slotProps.data.regularization_type), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "user_time",
              header: "Actual Time",
              style: { "min-width": "10rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "regularize_time",
              header: "Regularize Time",
              style: { "min-width": "10rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reason_type",
              header: "Reason",
              style: { "min-width": "18rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.reason_type == "Others") {
                    _push3(`<span${_scopeId2}>${ssrInterpolate(slotProps.data.custom_reason)}</span>`);
                  } else {
                    _push3(`<span${_scopeId2}>${ssrInterpolate(slotProps.data.reason_type)}</span>`);
                  }
                } else {
                  return [
                    slotProps.data.reason_type == "Others" ? (openBlock(), createBlock("span", { key: 0 }, toDisplayString(slotProps.data.custom_reason), 1)) : (openBlock(), createBlock("span", { key: 1 }, toDisplayString(slotProps.data.reason_type), 1))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_name",
              header: "Approve Name"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="text-bold"${_scopeId2}>${ssrInterpolate(slotProps.data.reviewer_name ? slotProps.data.reviewer_name : "---")}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_name ? slotProps.data.reviewer_name : "---"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_comments",
              header: "Approve Comments"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="text-bold"${_scopeId2}>${ssrInterpolate(slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : "---")}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : "---"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_reviewed_date",
              header: "Reviewed Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="text-bold"${_scopeId2}>${ssrInterpolate(slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : "---")}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : "---"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status",
              icon: "pi pi-check"
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Tag, {
                    value: data.status,
                    severity: getSeverity(data.status)
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Tag, {
                      value: data.status,
                      severity: getSeverity(data.status)
                    }, null, 8, ["value", "severity"])
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
              field: "",
              header: "Action"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.status == "Pending") {
                    _push3(`<span style="${ssrRenderStyle({ "width": "250px", "display": "block" })}"${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approval",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Rejected",
                      style: { "margin-left": "8px", "height": "2em" },
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Reject")
                    }, null, _parent3, _scopeId2));
                    _push3(`</span>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.status == "Pending" ? (openBlock(), createBlock("span", {
                      key: 0,
                      style: { "width": "250px", "display": "block" }
                    }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-check-circle",
                        class: "p-button-success Button",
                        label: "Approval",
                        onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-times-circle",
                        class: "p-button-danger Button",
                        label: "Rejected",
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
                field: "employee_name",
                header: "Employee Name"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "pl-2 text-left" }, toDisplayString(slotProps.data.employee_name), 1)
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
                field: "attendance_date",
                header: "Date",
                sortable: true,
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("h1", { class: "text-right" }, toDisplayString(unref(moment)(slotProps.data.attendance_date).format("DD-MM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "regularization_type",
                header: "Type",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "p-2 text-center" }, toDisplayString(slotProps.data.regularization_type), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "user_time",
                header: "Actual Time",
                style: { "min-width": "10rem" }
              }),
              createVNode(_component_Column, {
                field: "regularize_time",
                header: "Regularize Time",
                style: { "min-width": "10rem" }
              }),
              createVNode(_component_Column, {
                field: "reason_type",
                header: "Reason",
                style: { "min-width": "18rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.reason_type == "Others" ? (openBlock(), createBlock("span", { key: 0 }, toDisplayString(slotProps.data.custom_reason), 1)) : (openBlock(), createBlock("span", { key: 1 }, toDisplayString(slotProps.data.reason_type), 1))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reviewer_name",
                header: "Approve Name"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_name ? slotProps.data.reviewer_name : "---"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reviewer_comments",
                header: "Approve Comments"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : "---"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reviewer_reviewed_date",
                header: "Reviewed Date"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : "---"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status",
                icon: "pi pi-check"
              }, {
                body: withCtx(({ data }) => [
                  createVNode(_component_Tag, {
                    value: data.status,
                    severity: getSeverity(data.status)
                  }, null, 8, ["value", "severity"])
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
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.status == "Pending" ? (openBlock(), createBlock("span", {
                    key: 0,
                    style: { "width": "250px", "display": "block" }
                  }, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approval",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Rejected",
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
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/att_regularization/attendance_regularization.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "absent_Regularization",
  __ssrInlineRender: true,
  setup(__props) {
    const UseAttendance = UseAttendanceStore();
    const toast = useToast();
    const arrayAbsentRegularization = ref();
    const service = Service();
    inject("$swal");
    const canShowConfirmation = ref(false);
    ref(false);
    const reject = ref("");
    const reviewer_comment = ref();
    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: "Pending", matchMode: FilterMatchMode.EQUALS }
    });
    onUpdated(() => {
      canShowConfirmation ? reviewer_comment.value = null : "";
    });
    onMounted(() => {
      getAbsentRegularization();
    });
    async function getAbsentRegularization() {
      UseAttendance.canShowLoadingScreen = true;
      await axios.get("/fetch-absent-regularization-data").then((res) => {
        arrayAbsentRegularization.value = res.data;
      }).finally(() => {
        UseAttendance.canShowLoadingScreen = false;
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
    function showConfirmDialog(selectedRowData, status) {
      UseAttendance.canShowLoadingScreen = true;
      currentlySelectedStatus = status;
      reject.value = status;
      currentlySelectedRowData = selectedRowData;
    }
    function hideConfirmDialog() {
      UseAttendance.canShowLoadingScreen = false;
    }
    function processApproveReject() {
      hideConfirmDialog();
      UseAttendance.canShowLoadingScreen = true;
      axios.post("/approveRejectAbsentRegularization", {
        record_id: currentlySelectedRowData.id,
        approver_user_code: service.current_user_code,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        status_text: reviewer_comment.value,
        user_code: service.current_user_code
      }).then((response) => {
        if (response.data.status == "success") {
          toast.add({
            severity: "success",
            summary: "Success",
            detail: "Your request has been recorded successfully",
            life: 3e3
          });
        } else {
          Swal.fire(
            "Failure",
            `${response.data.message}`,
            "error"
          );
        }
        getAbsentRegularization();
      }).catch((error) => {
        UseAttendance.canShowLoadingScreen = false;
      }).finally(() => {
        UseAttendance.canShowLoadingScreen = false;
        reviewer_comment.value = null;
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_Tag = resolveComponent("Tag");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: arrayAbsentRegularization.value,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        sortField: "attendance_date",
        sortOrder: -1,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["name", "status"]
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employeee found. `);
          } else {
            return [
              createTextVNode(" No Employeee found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "employee_name",
              header: "Employee Name"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="flex justify-content-center align-items-center"${_scopeId2}>`);
                  if (JSON.parse(slotProps.data.employee_avatar).type == "shortname") {
                    _push3(`<p if class="w-3 p-2 text-white bg-blue-900 rounded-full h-18 text-semibold"${_scopeId2}>${ssrInterpolate(JSON.parse(slotProps.data.employee_avatar).data)}</p>`);
                  } else {
                    _push3(`<img class="w-3 rounded-circle img-md userActive-status profile-img" style="${ssrRenderStyle({ "height": "30px !important" })}"${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`)} srcset="" alt=""${_scopeId2}>`);
                  }
                  _push3(`<p class="pl-2 text-left"${_scopeId2}>${ssrInterpolate(slotProps.data.employee_name)}</p></div>`);
                } else {
                  return [
                    createVNode("div", { class: "flex justify-content-center align-items-center" }, [
                      JSON.parse(slotProps.data.employee_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                        key: 0,
                        if: "",
                        class: "w-3 p-2 text-white bg-blue-900 rounded-full h-18 text-semibold"
                      }, toDisplayString(JSON.parse(slotProps.data.employee_avatar).data), 1)) : (openBlock(), createBlock("img", {
                        key: 1,
                        class: "w-3 rounded-circle img-md userActive-status profile-img",
                        style: { "height": "30px !important" },
                        src: `data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`,
                        srcset: "",
                        alt: ""
                      }, null, 8, ["src"])),
                      createVNode("p", { class: "pl-2 text-left" }, toDisplayString(slotProps.data.employee_name), 1)
                    ])
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
              class: "font-bold",
              field: "attendance_date",
              sortable: true,
              header: "Attendance Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.attendance_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.attendance_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "regularization_type",
              header: "Regularization Type"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "checkin_time",
              header: "Checkin Time"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "checkout_time",
              header: "Checkout Time"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "reason",
              header: "Reason"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "custom_reason",
              header: "Custom Reason"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_name",
              header: "Approve Name"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="text-bold"${_scopeId2}>${ssrInterpolate(slotProps.data.reviewer_name ? slotProps.data.reviewer_name : "---")}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_name ? slotProps.data.reviewer_name : "---"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_comments",
              header: "Approve Comments"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="text-bold"${_scopeId2}>${ssrInterpolate(slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : "---")}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : "---"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_reviewed_date",
              header: "Reviewed Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="text-bold"${_scopeId2}>${ssrInterpolate(slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : "---")}</p>`);
                } else {
                  return [
                    createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : "---"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "font-bold",
              field: "status",
              header: "Status"
            }, {
              body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Tag, {
                    value: data.status,
                    severity: getSeverity(data.status)
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Tag, {
                      value: data.status,
                      severity: getSeverity(data.status)
                    }, null, 8, ["value", "severity"])
                  ];
                }
              }),
              filter: withCtx(({ filterModel, filterCallback }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Dropdown, {
                    modelValue: filterModel.value,
                    "onUpdate:modelValue": ($event) => filterModel.value = $event,
                    onChange: ($event) => filterCallback(),
                    options: _ctx.statuses,
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
                      options: _ctx.statuses,
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
              class: "font-bold",
              field: "",
              header: "Action"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.status == "Pending") {
                    _push3(`<span style="${ssrRenderStyle({ "width": "250px", "display": "block" })}"${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approval",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Rejected",
                      style: { "margin-left": "8px", "height": "2em" },
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Reject")
                    }, null, _parent3, _scopeId2));
                    _push3(`</span>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.status == "Pending" ? (openBlock(), createBlock("span", {
                      key: 0,
                      style: { "width": "250px", "display": "block" }
                    }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-check-circle",
                        class: "p-button-success Button",
                        label: "Approval",
                        onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-times-circle",
                        class: "p-button-danger Button",
                        label: "Rejected",
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
                field: "employee_name",
                header: "Employee Name"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "flex justify-content-center align-items-center" }, [
                    JSON.parse(slotProps.data.employee_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                      key: 0,
                      if: "",
                      class: "w-3 p-2 text-white bg-blue-900 rounded-full h-18 text-semibold"
                    }, toDisplayString(JSON.parse(slotProps.data.employee_avatar).data), 1)) : (openBlock(), createBlock("img", {
                      key: 1,
                      class: "w-3 rounded-circle img-md userActive-status profile-img",
                      style: { "height": "30px !important" },
                      src: `data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`,
                      srcset: "",
                      alt: ""
                    }, null, 8, ["src"])),
                    createVNode("p", { class: "pl-2 text-left" }, toDisplayString(slotProps.data.employee_name), 1)
                  ])
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
                class: "font-bold",
                field: "attendance_date",
                sortable: true,
                header: "Attendance Date"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.attendance_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                class: "font-bold",
                field: "regularization_type",
                header: "Regularization Type"
              }),
              createVNode(_component_Column, {
                class: "font-bold",
                field: "checkin_time",
                header: "Checkin Time"
              }),
              createVNode(_component_Column, {
                class: "font-bold",
                field: "checkout_time",
                header: "Checkout Time"
              }),
              createVNode(_component_Column, {
                class: "font-bold",
                field: "reason",
                header: "Reason"
              }),
              createVNode(_component_Column, {
                class: "font-bold",
                field: "custom_reason",
                header: "Custom Reason"
              }),
              createVNode(_component_Column, {
                field: "reviewer_name",
                header: "Approve Name"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_name ? slotProps.data.reviewer_name : "---"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reviewer_comments",
                header: "Approve Comments"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_comments ? slotProps.data.reviewer_comments : "---"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reviewer_reviewed_date",
                header: "Reviewed Date"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("p", { class: "text-bold" }, toDisplayString(slotProps.data.reviewer_reviewed_date ? slotProps.data.reviewer_reviewed_date : "---"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                class: "font-bold",
                field: "status",
                header: "Status"
              }, {
                body: withCtx(({ data }) => [
                  createVNode(_component_Tag, {
                    value: data.status,
                    severity: getSeverity(data.status)
                  }, null, 8, ["value", "severity"])
                ]),
                filter: withCtx(({ filterModel, filterCallback }) => [
                  createVNode(_component_Dropdown, {
                    modelValue: filterModel.value,
                    "onUpdate:modelValue": ($event) => filterModel.value = $event,
                    onChange: ($event) => filterCallback(),
                    options: _ctx.statuses,
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
                class: "font-bold",
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.status == "Pending" ? (openBlock(), createBlock("span", {
                    key: 0,
                    style: { "width": "250px", "display": "block" }
                  }, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approval",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Rejected",
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
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: canShowConfirmation.value,
        "onUpdate:visible": ($event) => canShowConfirmation.value = $event,
        breakpoints: { "960px": "80vw", "640px": "90vw" },
        style: { width: "380px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: processApproveReject,
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => canShowConfirmation.value = false,
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: processApproveReject,
                class: "p-button-text",
                autofocus: ""
              }),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => canShowConfirmation.value = false,
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-2 text-red-600 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "1.3rem" })}"${_scopeId}></i><span class="my-auto"${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))}?</span></div>`);
            if (reject.value == "Reject") {
              _push2(`<div class="flex w-full p-2 justify-left"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Textarea, {
                modelValue: reviewer_comment.value,
                "onUpdate:modelValue": ($event) => reviewer_comment.value = $event,
                rows: "3",
                cols: "30",
                class: "border rounded-md"
              }, null, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-2 text-red-600 pi pi-exclamation-triangle",
                  style: { "font-size": "1.3rem" }
                }),
                createVNode("span", { class: "my-auto" }, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + "?", 1)
              ]),
              reject.value == "Reject" ? (openBlock(), createBlock("div", {
                key: 0,
                class: "flex w-full p-2 justify-left"
              }, [
                createVNode(_component_Textarea, {
                  modelValue: reviewer_comment.value,
                  "onUpdate:modelValue": ($event) => reviewer_comment.value = $event,
                  rows: "3",
                  cols: "30",
                  class: "border rounded-md"
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ])) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/att_regularization/absent_Regularization.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "AttRegularizationApproval",
  __ssrInlineRender: true,
  setup(__props) {
    const UseAttendance = UseAttendanceStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(UseAttendance).canShowLoadingScreen) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white w-[100%] h-[100%]" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><h6 class="mb-0 text-lg font-semibold">Attendance Regularization Approvals</h6><div class="p-2 pb-0 my-2 mb-3 rounded-lg shadow tw-card left-line"><div class="flex justify-between"><ul class="bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link active" data-bs-toggle="tab" href="#leave_balance" aria-selected="true" role="tab"> Attendance Regularization</a></li><li class="nav-item text-muted" role="presentation"><a class="pb-2 mx-4 nav-link" data-bs-toggle="tab" href="#team_leaveBalance" aria-selected="false" tabindex="-1" role="tab"> Absent Regularization</a></li></ul></div></div><div class="tab-content h-[100vh]" id="pills-tabContent"><div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div><div class="tab-pane fade show" id="team_leaveBalance" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/att_regularization/AttRegularizationApproval.vue");
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
app.component("Tag", Tag);
app.component("Textarea", Textarea);
app.mount("#vjs_regularizationTable");
