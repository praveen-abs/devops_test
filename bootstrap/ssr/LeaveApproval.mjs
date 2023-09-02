/* empty css                        *//* empty css                               *//* empty css                             */import { ref, reactive, onMounted, resolveComponent, unref, isRef, withCtx, createVNode, toDisplayString, openBlock, createBlock, createCommentVNode, createTextVNode, useSSRContext, createApp } from "vue";
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
import Tag from "primevue/tag";
import OverlayPanel from "primevue/overlaypanel";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderClass, ssrRenderAttr } from "vue/server-renderer";
import dateFormat from "dateformat";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import { S as Service } from "./assets/Service-c5131e0f.mjs";
import { L as LoadingSpinner } from "./assets/LoadingSpinner-13fb7de2.mjs";
import "pinia";
import "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
const _sfc_main = {
  __name: "LeaveApproval",
  __ssrInlineRender: true,
  setup(__props) {
    const service = Service();
    let att_leaves = ref();
    let canShowConfirmation = ref(false);
    let canShowErrorResponseScreen = ref(false);
    let responseErrorMessage = ref();
    let canShowLoadingScreen = ref(false);
    useConfirm();
    useToast();
    const reviewer_comments = ref();
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
    ref(false);
    const statuses = ref(["Pending", "Approved", "Rejected"]);
    const overlayPanel = ref();
    const toggle = (event) => {
      overlayPanel.value.toggle(event);
    };
    let currentlySelectedStatus = null;
    let currentlySelectedRowData = null;
    const form_data = reactive({
      review_comment: ""
    });
    onMounted(() => {
      ajax_GetLeaveData();
    });
    function ajax_GetLeaveData() {
      canShowLoadingScreen.value = true;
      let url = window.location.origin + "/fetch-leaverequests-based-on-currentrole";
      axios.get(url).then((response) => {
        att_leaves.value = response.data.data;
      }).finally(() => {
        canShowLoadingScreen.value = false;
      });
    }
    function processDate(date) {
      if (isNaN(Date.parse(date)))
        return "Invalid date";
      else
        return dateFormat(date, "dd-mm-yyyy, h:MM TT");
    }
    function showConfirmDialog(selectedRowData, status) {
      canShowErrorResponseScreen.value = false;
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
      console.log(form_data.review_comment);
      hideConfirmDialog(false);
      canShowLoadingScreen.value = true;
      axios.post(window.location.origin + "/attendance-approve-rejectleave", {
        record_id: currentlySelectedRowData.id,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        review_comment: form_data.review_comment
      }).then((response) => {
        console.log(response);
        resetVars();
        if (response.data.status == "success") {
          ajax_GetLeaveData();
        } else if (response.data.status == "failure") {
          canShowErrorResponseScreen.value = true;
          responseErrorMessage.value = response.data.message;
          return;
        }
      }).catch((error) => {
        canShowLoadingScreen.value = false;
        resetVars();
        console.log(error.toJSON());
      }).finally(() => {
        canShowLoadingScreen.value = false;
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
      const _component_Textarea = resolveComponent("Textarea");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_Tag = resolveComponent("Tag");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<!--[-->`);
      if (unref(canShowLoadingScreen)) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full bg-white p-2 rounded-lg"><div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6"><h6 class="my-2 text-lg font-semibold">Leave Approvals</h6></div>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: unref(canShowConfirmation),
        "onUpdate:visible": ($event) => isRef(canShowConfirmation) ? canShowConfirmation.value = $event : canShowConfirmation = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "450px" },
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
            _push2(`<div class="confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle text-red-600" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus))}?</span></div><div class="w-full d-flex justify-content-start align-items-center mt-4 pl-3" style="${ssrRenderStyle({ "margin-bottom": "-12px" })}"${_scopeId}>`);
            if (unref(currentlySelectedStatus) == "Reject") {
              _push2(ssrRenderComponent(_component_Textarea, {
                name: "",
                id: "",
                modelValue: reviewer_comments.value,
                "onUpdate:modelValue": ($event) => reviewer_comments.value = $event,
                class: "border p-2 rounded",
                cols: "45",
                rows: "4",
                autoResize: "",
                placeholder: "Add Comment"
              }, null, _parent2, _scopeId));
            } else {
              _push2(`<!---->`);
            }
            _push2(` ${ssrInterpolate(reviewer_comments.value)}</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle text-red-600",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus)) + "?", 1)
              ]),
              createVNode("div", {
                class: "w-full d-flex justify-content-start align-items-center mt-4 pl-3",
                style: { "margin-bottom": "-12px" }
              }, [
                unref(currentlySelectedStatus) == "Reject" ? (openBlock(), createBlock(_component_Textarea, {
                  key: 0,
                  name: "",
                  id: "",
                  modelValue: reviewer_comments.value,
                  "onUpdate:modelValue": ($event) => reviewer_comments.value = $event,
                  class: "border p-2 rounded",
                  cols: "45",
                  rows: "4",
                  autoResize: "",
                  placeholder: "Add Comment"
                }, null, 8, ["modelValue", "onUpdate:modelValue"])) : createCommentVNode("", true),
                createTextVNode(" " + toDisplayString(reviewer_comments.value), 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Error",
        visible: unref(canShowErrorResponseScreen),
        "onUpdate:visible": ($event) => isRef(canShowErrorResponseScreen) ? canShowErrorResponseScreen.value = $event : canShowErrorResponseScreen = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Ok",
              icon: "pi pi-check",
              autofocus: ""
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Ok",
                icon: "pi pi-check",
                autofocus: ""
              })
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Error while processing the request : ${ssrInterpolate(unref(responseErrorMessage))}</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Error while processing the request : " + toDisplayString(unref(responseErrorMessage)), 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="mt-3">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(att_leaves),
        paginator: true,
        rows: 10,
        dataKey: "id",
        rowsPerPageOptions: [5, 10, 25],
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        sortField: "leaverequest_date",
        sortOrder: -1,
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["name", "status"],
        style: { "white-space": "nowrap" }
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee found `);
          } else {
            return [
              createTextVNode(" No Employee found ")
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
              header: "Employee Name",
              style: { "min-width": "18em" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="flex justify-center items-center"${_scopeId2}>`);
                  if (JSON.parse(slotProps.data.employee_avatar).type == "shortname") {
                    _push3(`<p class="${ssrRenderClass([unref(service).getBackgroundColor(slotProps.index), "p-2 w-11 fs-6 font-semibold rounded-full text-white"])}"${_scopeId2}>${ssrInterpolate(JSON.parse(slotProps.data.employee_avatar).data)}</p>`);
                  } else {
                    _push3(`<img class="rounded-circle img-md w-10 userActive-status profile-img" style="${ssrRenderStyle({ "height": "30px !important" })}"${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`)} srcset="" alt=""${_scopeId2}>`);
                  }
                  _push3(`<p class="text-left pl-2 font-semibold fs-6"${_scopeId2}>${ssrInterpolate(slotProps.data.employee_name)}</p></div>`);
                } else {
                  return [
                    createVNode("div", { class: "flex justify-center items-center" }, [
                      JSON.parse(slotProps.data.employee_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                        key: 0,
                        class: ["p-2 w-11 fs-6 font-semibold rounded-full text-white", unref(service).getBackgroundColor(slotProps.index)]
                      }, toDisplayString(JSON.parse(slotProps.data.employee_avatar).data), 3)) : (openBlock(), createBlock("img", {
                        key: 1,
                        class: "rounded-circle img-md w-10 userActive-status profile-img",
                        style: { "height": "30px !important" },
                        src: `data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`,
                        srcset: "",
                        alt: ""
                      }, null, 8, ["src"])),
                      createVNode("p", { class: "text-left pl-2 font-semibold fs-6" }, toDisplayString(slotProps.data.employee_name), 1)
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
              field: "leaverequest_date",
              header: "Date",
              sortable: true
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dateFormat)(slotProps.data.leaverequest_date, "dd-mm-yyyy, h:MM TT"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dateFormat)(slotProps.data.leaverequest_date, "dd-mm-yyyy, h:MM TT")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "leave_type",
              header: "Leave Type"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.leave_type == "Casual/Sick Leave") {
                    _push3(`<h1${_scopeId2}> SL/CL </h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  _push3(`<div${_scopeId2}></div>`);
                } else {
                  return [
                    slotProps.data.leave_type == "Casual/Sick Leave" ? (openBlock(), createBlock("h1", { key: 0 }, " SL/CL ")) : createCommentVNode("", true),
                    createVNode("div")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "start_date",
              header: "Start Time"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(processDate(slotProps.data.start_date))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(processDate(slotProps.data.start_date)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "end_date",
              header: "End Time"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(processDate(slotProps.data.end_date))} `);
                } else {
                  return [
                    createTextVNode(toDisplayString(processDate(slotProps.data.end_date)) + " ", 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "leave_reason",
              header: "Leave Reason",
              style: { "min-width": "25em", "white-space": "pre-wrap" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.leave_reason.length > 80) {
                    _push3(`<div${_scopeId2}><p class="font-medium text-orange-400 underline cursor-pointer"${_scopeId2}>explore more... </p>`);
                    _push3(ssrRenderComponent(_component_OverlayPanel, {
                      ref_key: "overlayPanel",
                      ref: overlayPanel,
                      style: { "height": "80px" }
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`${ssrInterpolate(slotProps.data.leave_reason)}`);
                        } else {
                          return [
                            createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                    _push3(`</div>`);
                  } else {
                    _push3(`<div${_scopeId2}>${ssrInterpolate(slotProps.data.leave_reason)}</div>`);
                  }
                } else {
                  return [
                    slotProps.data.leave_reason.length > 80 ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", {
                        onClick: toggle,
                        class: "font-medium text-orange-400 underline cursor-pointer"
                      }, "explore more... "),
                      createVNode(_component_OverlayPanel, {
                        ref_key: "overlayPanel",
                        ref: overlayPanel,
                        style: { "height": "80px" }
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                        ]),
                        _: 2
                      }, 1536)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason), 1))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_name",
              header: "Approver Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reviewer_comments",
              header: "Approver Comments"
            }, null, _parent2, _scopeId));
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
                field: "employee_name",
                header: "Employee Name",
                style: { "min-width": "18em" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "flex justify-center items-center" }, [
                    JSON.parse(slotProps.data.employee_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                      key: 0,
                      class: ["p-2 w-11 fs-6 font-semibold rounded-full text-white", unref(service).getBackgroundColor(slotProps.index)]
                    }, toDisplayString(JSON.parse(slotProps.data.employee_avatar).data), 3)) : (openBlock(), createBlock("img", {
                      key: 1,
                      class: "rounded-circle img-md w-10 userActive-status profile-img",
                      style: { "height": "30px !important" },
                      src: `data:image/png;base64,${JSON.parse(slotProps.data.employee_avatar).data}`,
                      srcset: "",
                      alt: ""
                    }, null, 8, ["src"])),
                    createVNode("p", { class: "text-left pl-2 font-semibold fs-6" }, toDisplayString(slotProps.data.employee_name), 1)
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
                field: "leaverequest_date",
                header: "Date",
                sortable: true
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dateFormat)(slotProps.data.leaverequest_date, "dd-mm-yyyy, h:MM TT")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "leave_type",
                header: "Leave Type"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.leave_type == "Casual/Sick Leave" ? (openBlock(), createBlock("h1", { key: 0 }, " SL/CL ")) : createCommentVNode("", true),
                  createVNode("div")
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "start_date",
                header: "Start Time"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(processDate(slotProps.data.start_date)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "end_date",
                header: "End Time"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(processDate(slotProps.data.end_date)) + " ", 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "leave_reason",
                header: "Leave Reason",
                style: { "min-width": "25em", "white-space": "pre-wrap" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.leave_reason.length > 80 ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", {
                      onClick: toggle,
                      class: "font-medium text-orange-400 underline cursor-pointer"
                    }, "explore more... "),
                    createVNode(_component_OverlayPanel, {
                      ref_key: "overlayPanel",
                      ref: overlayPanel,
                      style: { "height": "80px" }
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                      ]),
                      _: 2
                    }, 1536)
                  ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason), 1))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reviewer_name",
                header: "Approver Name"
              }),
              createVNode(_component_Column, {
                field: "reviewer_comments",
                header: "Approver Comments"
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
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/leaves/LeaveApproval.vue");
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
app.component("Tag", Tag);
app.component("OverlayPanel", OverlayPanel);
app.mount("#VJS_LeaveApproval");
