/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, onMounted, resolveComponent, withCtx, createVNode, unref, createTextVNode, toDisplayString, openBlock, createBlock, createCommentVNode, isRef, useSSRContext, createApp } from "vue";
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
import { ssrRenderComponent, ssrRenderStyle, ssrIncludeBooleanAttr, ssrInterpolate, ssrRenderClass } from "vue/server-renderer";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import { L as LoadingSpinner } from "./LoadingSpinner90316.js";
import "./_plugin-vue_export-helper90316.js";
const ReimbursementsApproval_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ReimbursementsApproval",
  __ssrInlineRender: true,
  setup(__props) {
    let data_reimbursements = ref();
    let canShowConfirmation = ref(false);
    let canShowLoadingScreen = ref(false);
    const data_checking = ref(false);
    useConfirm();
    const toast = useToast();
    ref(true);
    const expandedRows = ref([]);
    ref(false);
    ref(false);
    const selectedAllEmployee = ref();
    ref();
    ref(true);
    ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      name: {
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
    ref(true);
    onMounted(() => {
      data_reimbursements.value = [];
      selected_date.value = new Date();
      console.log(selected_date.value);
    });
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
    const selected_date = ref();
    const selected_status = ref();
    ref(false);
    const show = ref(false);
    const get_data = ref();
    const generate_ajax = () => {
      let filter_date = new Date(selected_date.value);
      let year = filter_date.getFullYear();
      let month = filter_date.getMonth() + 1;
      console.log(selected_date.value.toString());
      console.log(get_data);
      data_checking.value = true;
      axios.post(window.location.origin + "/fetch_all_reimbursements_as_groups", {
        selected_year: year,
        selected_month: month,
        selected_status: selected_status.value,
        selected_reimbursement_type: ""
      }).then((res) => {
        console.log("data sent");
        console.log("data from " + res.employee_name);
        data_reimbursements.value = res.data;
        get_data.value = res.data;
        data_checking.value = false;
      }).catch((err) => {
        console.log(err);
      });
    };
    const greet = () => {
      data_checking.value = false;
    };
    setTimeout(greet, 3e3);
    function processApproveReject() {
      hideConfirmDialog(false);
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
      console.log("currentlySelectedStatus : " + currentlySelectedStatus);
      axios.post(window.location.origin + "/reimbursements_bulk_approval", {
        reimbursement_id: currentlySelectedRowData,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        reviewer_comments: ""
      }).then((response) => {
        console.log(response);
        generate_ajax();
        toast.add({ severity: "success", summary: "", detail: " Successfully Approved !", life: 3e3 });
        resetVars();
      }).catch((error) => {
        canShowLoadingScreen.value = false;
        resetVars();
        console.log(error.toJSON());
      });
    }
    ref();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: show.value,
        "onUpdate:visible": ($event) => show.value = $event,
        modal: "",
        header: "Header",
        style: { width: "25vw" }
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => show.value = false,
              text: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => show.value = false,
              autofocus: ""
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => show.value = false,
                text: ""
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => show.value = false,
                autofocus: ""
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5${_scopeId}>Do you want to approve all?</h5>`);
          } else {
            return [
              createVNode("h5", null, "Do you want to approve all?")
            ];
          }
        }),
        _: 1
      }, _parent));
      if (data_checking.value) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><h6 class="font-semibold text-lg">Reimbursement Approvals</h6><div class="flex justify-end"><div class="grid grid-cols-4 w-1/2 gap-2">`);
      _push(ssrRenderComponent(_component_Calendar, {
        modelValue: selected_date.value,
        "onUpdate:modelValue": ($event) => selected_date.value = $event,
        view: "month",
        dateFormat: "mm/yy",
        class: "",
        style: { "border-radius": "7px", "height": "30px" }
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selected_status.value,
        "onUpdate:modelValue": ($event) => selected_status.value = $event,
        options: statuses.value,
        placeholder: "Status",
        class: "w-full",
        style: { "border-radius": "7px", "height": "30px" }
      }, null, _parent));
      _push(`<button label="Submit" class="btn btn-primary z-0 whitespace-nowrap" severity="danger" style="${ssrRenderStyle({ "height": "30px" })}"${ssrIncludeBooleanAttr(!selected_status.value == "" ? false : true) ? " disabled" : ""}><i class="fa fa-cog me-2"></i> Generate</button><button class="btn btn-primary whitespace-nowrap mx-3 z-0"${ssrIncludeBooleanAttr(unref(data_reimbursements) == "" ? true : false) ? " disabled" : ""} severity="success" style="${ssrRenderStyle({ "height": "30px" })}"><i class="fas fa-file-download me-2"></i>Download</button></div></div><div><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(data_reimbursements),
        paginator: true,
        rows: 10,
        class: "mt-6",
        dataKey: "user_id",
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
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}"
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Reimbursement data for the selected status filter `);
          } else {
            return [
              createTextVNode(" No Reimbursement data for the selected status filter ")
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
        expansion: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="orders-subtable"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              value: slotProps.data.reimbursement_data,
              responsiveLayout: "scroll",
              selection: selectedAllEmployee.value,
              "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
              selectAll: _ctx.selectAll,
              onSelectAllChange: _ctx.onSelectAllChange
            }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "",
                    header: "Date",
                    sortable: ""
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<p style="${ssrRenderStyle({ "white-space": "nowrap" })}"${_scopeId3}>${ssrInterpolate(unref(moment)(slotProps2.data.date).format("DD-MMM-YYYY"))}</p>`);
                      } else {
                        return [
                          createVNode("p", { style: { "white-space": "nowrap" } }, toDisplayString(unref(moment)(slotProps2.data.date).format("DD-MMM-YYYY")), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "reimbursement_type",
                    header: "Reimbursement Type"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "from",
                    header: "From"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "to",
                    header: "To"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "user_comments",
                    header: "Comments"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "vehicle_type",
                    header: "Mode of transport"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    class: "fontSize13px",
                    field: "distance_travelled",
                    header: "Distance Covered"
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps2.data.distance_travelled + " KM(s)")}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps2.data.distance_travelled + " KM(s)"), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    class: "fontSize13px",
                    field: "total_expenses",
                    header: "Total Expenses"
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate("₹ " + slotProps2.data.total_expenses)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString("₹ " + slotProps2.data.total_expenses), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "status",
                    header: "Status",
                    sortable: ""
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<span class="${ssrRenderClass("order-badge order-" + slotProps2.data.status)}"${_scopeId3}>${ssrInterpolate(slotProps2.data.status)}</span>`);
                      } else {
                        return [
                          createVNode("span", {
                            class: "order-badge order-" + slotProps2.data.status
                          }, toDisplayString(slotProps2.data.status), 3)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "",
                      header: "Date",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("p", { style: { "white-space": "nowrap" } }, toDisplayString(unref(moment)(slotProps2.data.date).format("DD-MMM-YYYY")), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "reimbursement_type",
                      header: "Reimbursement Type"
                    }),
                    createVNode(_component_Column, {
                      field: "from",
                      header: "From"
                    }),
                    createVNode(_component_Column, {
                      field: "to",
                      header: "To"
                    }),
                    createVNode(_component_Column, {
                      field: "user_comments",
                      header: "Comments"
                    }),
                    createVNode(_component_Column, {
                      field: "vehicle_type",
                      header: "Mode of transport"
                    }),
                    createVNode(_component_Column, {
                      class: "fontSize13px",
                      field: "distance_travelled",
                      header: "Distance Covered"
                    }, {
                      body: withCtx((slotProps2) => [
                        createTextVNode(toDisplayString(slotProps2.data.distance_travelled + " KM(s)"), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      class: "fontSize13px",
                      field: "total_expenses",
                      header: "Total Expenses"
                    }, {
                      body: withCtx((slotProps2) => [
                        createTextVNode(toDisplayString("₹ " + slotProps2.data.total_expenses), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "status",
                      header: "Status",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("span", {
                          class: "order-badge order-" + slotProps2.data.status
                        }, toDisplayString(slotProps2.data.status), 3)
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
                  value: slotProps.data.reimbursement_data,
                  responsiveLayout: "scroll",
                  selection: selectedAllEmployee.value,
                  "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                  selectAll: _ctx.selectAll,
                  onSelectAllChange: _ctx.onSelectAllChange
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      field: "",
                      header: "Date",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("p", { style: { "white-space": "nowrap" } }, toDisplayString(unref(moment)(slotProps2.data.date).format("DD-MMM-YYYY")), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "reimbursement_type",
                      header: "Reimbursement Type"
                    }),
                    createVNode(_component_Column, {
                      field: "from",
                      header: "From"
                    }),
                    createVNode(_component_Column, {
                      field: "to",
                      header: "To"
                    }),
                    createVNode(_component_Column, {
                      field: "user_comments",
                      header: "Comments"
                    }),
                    createVNode(_component_Column, {
                      field: "vehicle_type",
                      header: "Mode of transport"
                    }),
                    createVNode(_component_Column, {
                      class: "fontSize13px",
                      field: "distance_travelled",
                      header: "Distance Covered"
                    }, {
                      body: withCtx((slotProps2) => [
                        createTextVNode(toDisplayString(slotProps2.data.distance_travelled + " KM(s)"), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      class: "fontSize13px",
                      field: "total_expenses",
                      header: "Total Expenses"
                    }, {
                      body: withCtx((slotProps2) => [
                        createTextVNode(toDisplayString("₹ " + slotProps2.data.total_expenses), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "status",
                      header: "Status",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("span", {
                          class: "order-badge order-" + slotProps2.data.status
                        }, toDisplayString(slotProps2.data.status), 3)
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
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.employee_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
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
              class: "fontSize13px",
              field: "total_distance_travelled",
              header: "Overall Distance Travelled",
              sortable: false
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.total_distance_travelled + " KM(s)")}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.total_distance_travelled + " KM(s)"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              class: "fontSize13px",
              field: "total_expenses",
              header: "Overall Reimbursements",
              sortable: false
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate("₹ " + slotProps.data.total_expenses)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString("₹ " + slotProps.data.total_expenses), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Action",
              style: { width: "15vw" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.has_pending_reimbursements == "true") {
                    _push3(`<span${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approve",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2.5em" }
                    }, null, _parent3, _scopeId2));
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Reject",
                      style: { "margin-left": "8px", "height": "2.5em" },
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Reject")
                    }, null, _parent3, _scopeId2));
                    _push3(`</span>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.has_pending_reimbursements == "true" ? (openBlock(), createBlock("span", { key: 0 }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-check-circle",
                        class: "p-button-success Button",
                        label: "Approve",
                        onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                        style: { "height": "2.5em" }
                      }, null, 8, ["onClick"]),
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-times-circle",
                        class: "p-button-danger Button",
                        label: "Reject",
                        style: { "margin-left": "8px", "height": "2.5em" },
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
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
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
                class: "fontSize13px",
                field: "total_distance_travelled",
                header: "Overall Distance Travelled",
                sortable: false
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.total_distance_travelled + " KM(s)"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                class: "fontSize13px",
                field: "total_expenses",
                header: "Overall Reimbursements",
                sortable: false
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString("₹ " + slotProps.data.total_expenses), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Action",
                style: { width: "15vw" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.has_pending_reimbursements == "true" ? (openBlock(), createBlock("span", { key: 0 }, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-check-circle",
                      class: "p-button-success Button",
                      label: "Approve",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2.5em" }
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-times-circle",
                      class: "p-button-danger Button",
                      label: "Reject",
                      style: { "margin-left": "8px", "height": "2.5em" },
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
      _push(`</div></div></div>`);
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
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/reimbursements/ReimbursementsApproval.vue");
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
app.mount("#vjs_reimbursementsApprovalTable");
