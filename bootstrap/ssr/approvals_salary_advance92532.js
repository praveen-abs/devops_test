/* empty css            *//* empty css                 *//* empty css               */import { useSSRContext, ref, inject, reactive, onMounted, computed, resolveComponent, unref, withCtx, createVNode, toDisplayString, withDirectives, vModelText, createTextVNode, openBlock, createBlock, createCommentVNode, createApp } from "vue";
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
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import InputNumber from "primevue/inputnumber";
import SelectButton from "primevue/selectbutton";
import RadioButton from "primevue/radiobutton";
import Checkbox from "primevue/checkbox";
import OverlayPanel from "primevue/overlaypanel";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderStyle, ssrRenderComponent, ssrRenderAttr, ssrRenderClass } from "vue/server-renderer";
import { FilterMatchMode } from "primevue/api";
import axios from "axios";
import useValidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";
import "dayjs";
import { L as LoadingSpinner } from "./LoadingSpinner92532.js";
import "./_plugin-vue_export-helper92532.js";
const _sfc_main$5 = {
  __name: "EmployeePayable",
  __ssrInlineRender: true,
  props: {
    source: {
      type: Array,
      required: true
    }
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(_attrs)}></div>`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Shared/EmployeePayable.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const UseSalaryAdvanceApprovals = defineStore("SalaryAdvanceApprovals", () => {
  const arraySalaryAdvance = ref();
  const currentlySelectedStatus = ref();
  const canShowLoadingScreen = ref(false);
  inject("$swal");
  const Request_comments = ref();
  const salaryAdvance = reactive({});
  async function getEmpDetails() {
    canShowLoadingScreen.value = true;
    let url = "/SalAdvApproverFlow";
    await axios.get(url).then((res) => {
      arraySalaryAdvance.value = res.data;
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  async function SAbulkApproveAndReject(Status, val) {
    canShowLoadingScreen.value = true;
    currentlySelectedStatus.value = Status;
    let data = val;
    await axios.post("http://localhost:3000/submitApproveAndReject", {
      record_id: data,
      status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
      reviewer_comments: ""
    }).then(() => {
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  async function SAapproveAndReject(val, Status, reviewer_comments) {
    currentlySelectedStatus.value = Status;
    let status = Status;
    canShowLoadingScreen.value = true;
    let data = val.id;
    await axios.post("/rejectOrApprovedSaladv", {
      record_id: data,
      status: status == 1 ? 1 : status == -1 ? -1 : status,
      reviewer_comments
    }).then((res) => {
      res.data.status == "success" ? Swal.fire("Success", res.data.message, "success") : Swal.fire("Failure", res.data.message, "error");
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  const arrayIFL_List = ref();
  async function getInterestFreeLoanDetails() {
    canShowLoadingScreen.value = true;
    arrayIFL_List.value = "";
    axios.post("/fetch-employee-for-loan-approval", {
      loan_type: "InterestFreeLoan"
    }).then((res) => {
      arrayIFL_List.value = res.data;
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  async function IFLapproveAndReject(val, Status, reviewer_comments) {
    let status = Status;
    canShowLoadingScreen.value = true;
    let data = val.id;
    await axios.post("/reject-or-approve-loan", {
      loan_type: "InterestFreeLoan",
      record_id: data,
      status: status == 1 ? 1 : status == -1 ? -1 : status,
      reviewer_comments
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  async function IFLbulkApproveAndReject(Status, val) {
    canShowLoadingScreen.value = true;
    currentlySelectedStatus.value = Status;
    let data = val;
    await axios.post("http://localhost:3000/submitApproveAndReject", {
      record_id: data,
      status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
      reviewer_comments: ""
    }).then(() => {
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  const arrayIWL = ref();
  async function getInterestWithLoanDetails() {
    canShowLoadingScreen.value = true;
    let url = `/fetch-employee-for-loan-approval`;
    await axios.post(url, {
      loan_type: "InterestWithLoan"
    }).then((res) => {
      arrayIWL.value = res.data;
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  async function IWL_ApproveAndReject(val, Status, reviewer_comments) {
    canShowLoadingScreen.value = true;
    let status = Status;
    let data = val.id;
    await axios.post("/reject-or-approve-loan", {
      loan_type: "InterestWithLoan",
      record_id: data,
      status: status == 1 ? 1 : status == -1 ? -1 : status,
      reviewer_comments
    }).finally(() => {
      canShowLoadingScreen.value = false;
    });
  }
  return {
    salaryAdvance,
    arraySalaryAdvance,
    currentlySelectedStatus,
    Request_comments,
    canShowLoadingScreen,
    getEmpDetails,
    SAbulkApproveAndReject,
    SAapproveAndReject,
    arrayIFL_List,
    getInterestFreeLoanDetails,
    IFLapproveAndReject,
    IFLbulkApproveAndReject,
    arrayIWL,
    getInterestWithLoanDetails,
    IWL_ApproveAndReject
  };
});
const salary_advance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
  __name: "salary_advance",
  __ssrInlineRender: true,
  setup(__props) {
    const SalaryAdvanceApprovals = UseSalaryAdvanceApprovals();
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    const currentlySelectedStatus = ref();
    const op = ref();
    const toggle = (event) => {
      op.value.toggle(event);
    };
    const currentlySelectedRowData = ref();
    const showAppoverDialog = ref(false);
    const canShowConfirmationAll = ref(false);
    const reviewer_comments = reactive({
      reviewer_comments: ""
    });
    const useEmpData = ref([""]);
    const CurrentName = ref();
    const CurrentUser_code = ref();
    const val = ref();
    const sample = ref([
      { id: 1, name: "simma" }
    ]);
    onMounted(() => {
      SalaryAdvanceApprovals.getEmpDetails();
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
    function showConfirmDialog(selectedRowData, status) {
      showAppoverDialog.value = true;
      currentlySelectedStatus.value = status;
      currentlySelectedRowData.value = selectedRowData;
      val.value = selectedRowData;
    }
    async function approveAndReject(status) {
      showAppoverDialog.value = false;
      await SalaryAdvanceApprovals.SAapproveAndReject(currentlySelectedRowData.value, status, reviewer_comments.reviewer_comments);
      currentlySelectedStatus.value = status;
    }
    function hideBulkConfirmDialog() {
      canShowConfirmationAll.value = false;
    }
    async function processBulkApproveReject(status) {
      hideBulkConfirmDialog();
      currentlySelectedStatus.value = status;
      await SalaryAdvanceApprovals.SAbulkApproveAndReject(currentlySelectedStatus.value, SalaryAdvanceApprovals.arraySalaryAdvance);
    }
    function view_more(selectedRowData, user_code, currentName) {
      useEmpData.value = selectedRowData;
      CurrentName.value = currentName;
      CurrentUser_code.value = user_code;
    }
    const rules = computed(() => {
      return {
        reviewer_comments: { required }
      };
    });
    const v$ = useValidate(rules, reviewer_comments);
    const submitForm = (val2) => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        approveAndReject(val2);
        SalaryAdvanceApprovals.getEmpDetails();
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<!--[--><div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4">`);
      if (useEmpData.value == "") {
        _push(`<p class="text-xl font-medium">The company allows employees to request a salary advance of up to <strong class="text-lg"> 100%</strong> of their monthly salary.</p>`);
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value != "") {
        _push(`<p class="fs-4 fw-semibold text-blue-900 font-sans">Employee ID : <span class="fs-4 fw-semibold font-sans mr-5">${ssrInterpolate(CurrentUser_code.value)}</span> <span class="ml-5 pl-14 fs-4 fw-semibold text-blue-900 font-sans" style="${ssrRenderStyle({ "border-left": "2px solid black" })}">Employee Name : ${ssrInterpolate(CurrentName.value)}</span></p>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="float-right">`);
      if (useEmpData.value != "") {
        _push(`<button class="btn btn-border-orange" id="">View Report</button>`);
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value == "") {
        _push(`<button class="mx-4 btn btn-orange">Approval All</button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
      if (useEmpData.value == "") {
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(SalaryAdvanceApprovals).arraySalaryAdvance,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "id",
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
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "request_id",
                header: "Request ID",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "user_code",
                header: "Employee ID"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "name",
                header: "Employee Name",
                sortable: false
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="fw-semibold text-primary"${_scopeId2}>${ssrInterpolate(slotProps.data.name)}</button>`);
                  } else {
                    return [
                      createVNode("button", {
                        class: "fw-semibold text-primary",
                        onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                      }, toDisplayString(slotProps.data.name), 9, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "advance_amount",
                header: "Advance Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "dedction_date",
                header: "Date"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "status_flow",
                header: "Status",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="" type="button"${_scopeId2}><i class="pi pi-ellipsis-v"${_scopeId2}></i></button>`);
                    _push3(ssrRenderComponent(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0"
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="d-flex flex-column p-0 m-0"${_scopeId3}><button class="fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2"${_scopeId3}>view</button><button class="fw-semibold text-black hover:bg-gray-200 p-2"${_scopeId3}>passed Transaction</button></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                              createVNode("button", {
                                class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                                onClick: ($event) => showConfirmDialog(slotProps.data)
                              }, "view", 8, ["onClick"]),
                              createVNode("button", {
                                class: "fw-semibold text-black hover:bg-gray-200 p-2",
                                onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                              }, "passed Transaction", 8, ["onClick"])
                            ])
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode("button", {
                        class: "",
                        type: "button",
                        onClick: toggle
                      }, [
                        createVNode("i", { class: "pi pi-ellipsis-v" })
                      ]),
                      createVNode(_component_OverlayPanel, {
                        ref_key: "op",
                        ref: op,
                        style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                        class: "p-0 m-0"
                      }, {
                        default: withCtx(() => [
                          createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                              onClick: ($event) => showConfirmDialog(slotProps.data)
                            }, "view", 8, ["onClick"]),
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 p-2",
                              onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                            }, "passed Transaction", 8, ["onClick"])
                          ])
                        ]),
                        _: 2
                      }, 1536)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "request_id",
                  header: "Request ID",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "user_code",
                  header: "Employee ID"
                }),
                createVNode(_component_Column, {
                  field: "name",
                  header: "Employee Name",
                  sortable: false
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "fw-semibold text-primary",
                      onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                    }, toDisplayString(slotProps.data.name), 9, ["onClick"])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "advance_amount",
                  header: "Advance Amount"
                }),
                createVNode(_component_Column, {
                  field: "dedction_date",
                  header: "Date"
                }),
                createVNode(_component_Column, {
                  field: "status_flow",
                  header: "Status",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Action"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "",
                      type: "button",
                      onClick: toggle
                    }, [
                      createVNode("i", { class: "pi pi-ellipsis-v" })
                    ]),
                    createVNode(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0"
                    }, {
                      default: withCtx(() => [
                        createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                            onClick: ($event) => showConfirmDialog(slotProps.data)
                          }, "view", 8, ["onClick"]),
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 p-2",
                            onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                          }, "passed Transaction", 8, ["onClick"])
                        ])
                      ]),
                      _: 2
                    }, 1536)
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_sfc_main$5, { source: sample.value }, null, _parent));
      if (useEmpData.value != "") {
        _push(ssrRenderComponent(_component_DataTable, {
          value: useEmpData.value,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "id",
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
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "request_id",
                header: "Request ID",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "borrowed_amount",
                header: "Advance Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "requested_date",
                header: "Paid On"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "dedction_date",
                header: "Expected Return"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "sal_adv_status",
                header: "Status"
              }, null, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "request_id",
                  header: "Request ID",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "borrowed_amount",
                  header: "Advance Amount"
                }),
                createVNode(_component_Column, {
                  field: "requested_date",
                  header: "Paid On"
                }),
                createVNode(_component_Column, {
                  field: "dedction_date",
                  header: "Expected Return"
                }),
                createVNode(_component_Column, {
                  field: "sal_adv_status",
                  header: "Status"
                })
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: canShowConfirmationAll.value,
        "onUpdate:visible": ($event) => canShowConfirmationAll.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "400px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => processBulkApproveReject("Approve"),
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => hideBulkConfirmDialog(),
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => processBulkApproveReject("Approve"),
                class: "p-button-text",
                autofocus: ""
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => hideBulkConfirmDialog(),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                })
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        modal: "",
        visible: showAppoverDialog.value,
        "onUpdate:visible": ($event) => showAppoverDialog.value = $event,
        style: { width: "50vw", borderTop: "5px solid #002f56", height: "100vh" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h1 class="mx-3 fs-4 text-xxl" style="${ssrRenderStyle({ "border-left": "3px solid var(--orange)", "padding-left": "10px" })}"${_scopeId}>New Salary Advance Request</h1>`);
          } else {
            return [
              createVNode("h1", {
                class: "mx-3 fs-4 text-xxl",
                style: { "border-left": "3px solid var(--orange)", "padding-left": "10px" }
              }, "New Salary Advance Request")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex pb-2 bg-gray-100 rounded-lg gap-3"${_scopeId}><div class="w-4 p-4 mx-4"${_scopeId}><span class="font-semibold"${_scopeId}>Required Amount</span><input id="rentFrom_month" class="my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${ssrRenderAttr("value", val.value.advance_amount)} disabled${_scopeId}><p class="text-sm font-semibold text-gray-500"${_scopeId}>Max Eligible Amount : ${ssrInterpolate(val.value.eligible_amount)}</p></div><div class="w-5 p-4 mx-4"${_scopeId}><span class="font-semibold"${_scopeId}>Required Amount</span><div class="w-full"${_scopeId}><p class="my-2 text-gray-600 fs-5 text-md text-clip"${_scopeId}>The advance amount will be deducted from the next month&#39;s salary <strong class="text-black fs-5"${_scopeId}>(ie,${ssrInterpolate(val.value.dedction_date)})</strong></p></div></div></div><div class="gap-6 p-4 my-2 bg-gray-100 rounded-lg"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span><div class="border w-full h-28 rounded bg-slate-50 p-2"${_scopeId}>${ssrInterpolate(val.value.reason)}</div></div><div class="gap-6 p-4 my-2 bg-gray-100 rounded-lg"${_scopeId}><span class="font-semibold"${_scopeId}>Your Comments</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              class: ["my-3 capitalize form-control textbox", [unref(v$).reviewer_comments.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              modelValue: reviewer_comments.reviewer_comments,
              "onUpdate:modelValue": ($event) => reviewer_comments.reviewer_comments = $event,
              autoResize: "",
              type: "text",
              rows: "3",
              style: { "border": "none", "outline-": "none" }
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).reviewer_comments.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).reviewer_comments.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="float-right"${_scopeId}><button class="btn bg-red-500 text-white px-5"${_scopeId}>Reject</button><button class="mx-4 btn bg-green-500 text-white px-5"${_scopeId}>Approve</button></div>`);
          } else {
            return [
              createVNode("div", { class: "flex pb-2 bg-gray-100 rounded-lg gap-3" }, [
                createVNode("div", { class: "w-4 p-4 mx-4" }, [
                  createVNode("span", { class: "font-semibold" }, "Required Amount"),
                  withDirectives(createVNode("input", {
                    id: "rentFrom_month",
                    class: "my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5",
                    "onUpdate:modelValue": ($event) => val.value.advance_amount = $event,
                    disabled: ""
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, val.value.advance_amount]
                  ]),
                  createVNode("p", { class: "text-sm font-semibold text-gray-500" }, "Max Eligible Amount : " + toDisplayString(val.value.eligible_amount), 1)
                ]),
                createVNode("div", { class: "w-5 p-4 mx-4" }, [
                  createVNode("span", { class: "font-semibold" }, "Required Amount"),
                  createVNode("div", { class: "w-full" }, [
                    createVNode("p", { class: "my-2 text-gray-600 fs-5 text-md text-clip" }, [
                      createTextVNode("The advance amount will be deducted from the next month's salary "),
                      createVNode("strong", { class: "text-black fs-5" }, "(ie," + toDisplayString(val.value.dedction_date) + ")", 1)
                    ])
                  ])
                ])
              ]),
              createVNode("div", { class: "gap-6 p-4 my-2 bg-gray-100 rounded-lg" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode("div", { class: "border w-full h-28 rounded bg-slate-50 p-2" }, toDisplayString(val.value.reason), 1)
              ]),
              createVNode("div", { class: "gap-6 p-4 my-2 bg-gray-100 rounded-lg" }, [
                createVNode("span", { class: "font-semibold" }, "Your Comments"),
                createVNode(_component_Textarea, {
                  class: ["my-3 capitalize form-control textbox", [unref(v$).reviewer_comments.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                  modelValue: reviewer_comments.reviewer_comments,
                  "onUpdate:modelValue": ($event) => reviewer_comments.reviewer_comments = $event,
                  autoResize: "",
                  type: "text",
                  rows: "3",
                  style: { "border": "none", "outline-": "none" }
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                createVNode("br"),
                unref(v$).reviewer_comments.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).reviewer_comments.$errors[0].$message), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("button", {
                  class: "btn bg-red-500 text-white px-5",
                  onClick: ($event) => submitForm(-1)
                }, "Reject", 8, ["onClick"]),
                createVNode("button", {
                  class: "mx-4 btn bg-green-500 text-white px-5",
                  onClick: ($event) => submitForm(1)
                }, "Approve", 8, ["onClick"])
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
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/salary_advance_loan/salary_advance/salary_advance.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "interest_free_loan",
  __ssrInlineRender: true,
  setup(__props) {
    const UseInterestFreeLoan = UseSalaryAdvanceApprovals();
    onMounted(async () => {
      await UseInterestFreeLoan.getInterestFreeLoanDetails();
    });
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    const reviewer_comments = reactive({
      reviewer_comments: ""
    });
    const canshowInterestFLR = ref(false);
    const currentlySelectedRowData = ref();
    const currentlySelectedStatus = ref();
    const canShowConfirmationAll = ref(false);
    const useEmpData = ref([""]);
    const CurrentName = ref();
    const CurrentUser_code = ref();
    const val = ref();
    ref();
    const op = ref();
    const toggle = (event) => {
      op.value.toggle(event);
    };
    function showConfirmDialog(selectedRowData) {
      canshowInterestFLR.value = true;
      currentlySelectedRowData.value = selectedRowData;
      val.value = selectedRowData;
    }
    function hideBulkConfirmDialog() {
      canShowConfirmationAll.value = false;
      canshowInterestFLR.value = false;
    }
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
    async function approveAndReject(status) {
      hideBulkConfirmDialog();
      await UseInterestFreeLoan.IFLapproveAndReject(currentlySelectedRowData.value, status, reviewer_comments.reviewer_comments);
      currentlySelectedStatus.value = status;
    }
    async function processBulkApproveReject(status) {
      currentlySelectedStatus.value = status;
      await UseInterestFreeLoan.IFLbulkApproveAndReject(currentlySelectedStatus.value, UseInterestFreeLoan.arrayIFL_List);
    }
    function view_more(selectedRowData, user_code, currentName) {
      useEmpData.value = selectedRowData;
      CurrentName.value = currentName;
      CurrentUser_code.value = user_code;
    }
    const rules = computed(() => {
      return {
        reviewer_comments: { required }
      };
    });
    const v$ = useValidate(rules, reviewer_comments);
    const submitForm = (val2) => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        approveAndReject(val2);
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_InputText = resolveComponent("InputText");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4">`);
      if (useEmpData.value == "") {
        _push(`<p class="text-xl font-medium">Five Team members are eligible for the Interest Free Loan as per the <span class="text-lg text-primary text-decoration-underline"> Company&#39;s Loan Policy</span></p>`);
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value != "") {
        _push(`<p class="fs-4 fw-semibold text-blue-900 font-sans">Employee ID : <span class="fs-4 fw-semibold font-sans mr-5">${ssrInterpolate(CurrentUser_code.value)}</span> <span class="ml-5 pl-14 fs-4 fw-semibold text-blue-900 font-sans" style="${ssrRenderStyle({ "border-left": "2px solid black" })}">Employee Name : ${ssrInterpolate(CurrentName.value)}</span></p>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="float-right">`);
      if (useEmpData.value != "") {
        _push(`<button class="btn btn-border-orange">View Report</button>`);
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value == "") {
        _push(`<button class="mx-2 btn btn-orange"> Approval All </button>`);
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: canShowConfirmationAll.value,
        "onUpdate:visible": ($event) => canShowConfirmationAll.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "400px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => processBulkApproveReject("Approve"),
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => hideBulkConfirmDialog(),
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => processBulkApproveReject("Approve"),
                class: "p-button-text",
                autofocus: ""
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => hideBulkConfirmDialog(),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                })
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: canshowInterestFLR.value,
        "onUpdate:visible": ($event) => canshowInterestFLR.value = $event,
        header: "Header",
        style: { width: "58vw" },
        modal: "",
        position: _ctx.position
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var( --orange)", "padding-left": "5px" })}" class="fs-4"${_scopeId}>New Interest Free Loan Request</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  style: { "border-left": "3px solid var( --orange)", "padding-left": "5px" },
                  class: "fs-4"
                }, "New Interest Free Loan Request")
              ])
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="float-right"${_scopeId}><button class="btn bg-red-500 text-white px-5"${_scopeId}>Reject</button><button class="mx-4 btn bg-green-500 text-white px-5"${_scopeId}>Approve</button></div>`);
          } else {
            return [
              createVNode("div", { class: "float-right" }, [
                createVNode("button", {
                  class: "btn bg-red-500 text-white px-5",
                  onClick: ($event) => submitForm(-1)
                }, "Reject", 8, ["onClick"]),
                createVNode("button", {
                  class: "mx-4 btn bg-green-500 text-white px-5",
                  onClick: ($event) => submitForm(1)
                }, "Approve", 8, ["onClick"])
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="card bg-gray-100 bottom-0 mb-10" style="${ssrRenderStyle({ "border": "none" })}"${_scopeId}><div class="card-body"${_scopeId}><div class="row mx-2"${_scopeId}><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Required Amount</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              placeholder: "₹ Enter The Required Amount",
              disabled: "",
              modelValue: val.value.loan_amount,
              "onUpdate:modelValue": ($event) => val.value.loan_amount = $event
            }, null, _parent2, _scopeId));
            _push2(`<p class="fs-6 my-2" style="${ssrRenderStyle({ "color": "var(--clr-gray)" })}"${_scopeId}>Max Eligible Amount : ${ssrInterpolate(val.value.eligible_amount)}</p></div><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Monthly EMI</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              placeholder: "₹ ",
              disabled: "",
              modelValue: val.value.monthly_emi,
              "onUpdate:modelValue": ($event) => val.value.monthly_emi = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Term</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              class: "w-full md:w-10rem",
              type: "text",
              placeholder: "₹ ",
              disabled: "",
              modelValue: val.value.tenure,
              "onUpdate:modelValue": ($event) => val.value.tenure = $event
            }, null, _parent2, _scopeId));
            _push2(`<label for="" class="fs-5 ml-2" style="${ssrRenderStyle({ "color": "var(--navy)" })}"${_scopeId}>Months</label></div></div></div></div><div class="card bg-gray-100 bottom-0 my-4" style="${ssrRenderStyle({ "border": "none" })}"${_scopeId}><div class="card-body mx-4"${_scopeId}><div class="row"${_scopeId}><h1 class="fs-4 my-2"${_scopeId}>EMI Dedution</h1><h1 class="fs-5 text-gray-600 mb-3"${_scopeId}>The EMI Dedution Will begin from the Upcoming Payroll</h1><div class="col-4"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI Start Month</h1>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              showIcon: "",
              dateFormat: "dd/mm/yy",
              disabled: "",
              modelValue: val.value.deduction_starting_month,
              "onUpdate:modelValue": ($event) => val.value.deduction_starting_month = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-4 mx-2"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI End Month</h1>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              showIcon: "",
              dateFormat: "dd/mm/yy",
              disabled: "",
              modelValue: val.value.deduction_ending_month,
              "onUpdate:modelValue": ($event) => val.value.deduction_ending_month = $event
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-3"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>Total Months</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              style: { "width": "150px !important" },
              disabled: "",
              modelValue: val.value.tenure,
              "onUpdate:modelValue": ($event) => val.value.tenure = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              class: "my-3 capitalize form-control textbox",
              disabled: "",
              modelValue: val.value.reason,
              "onUpdate:modelValue": ($event) => val.value.reason = $event,
              autoResize: "",
              type: "text",
              rows: "3"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="gap-6 p-4 my-6 bg-gray-100 rounded-lg"${_scopeId}><span class="font-semibold"${_scopeId}>your Comments</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              class: ["my-3 capitalize form-control textbox", [unref(v$).reviewer_comments.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              modelValue: reviewer_comments.reviewer_comments,
              "onUpdate:modelValue": ($event) => reviewer_comments.reviewer_comments = $event,
              autoResize: "",
              type: "text",
              rows: "3",
              style: { "border": "none", "outline-": "none" }
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).reviewer_comments.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).reviewer_comments.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", {
                class: "card bg-gray-100 bottom-0 mb-10",
                style: { "border": "none" }
              }, [
                createVNode("div", { class: "card-body" }, [
                  createVNode("div", { class: "row mx-2" }, [
                    createVNode("div", { class: "col mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2" }, "Required Amount"),
                      createVNode(_component_InputText, {
                        type: "text",
                        placeholder: "₹ Enter The Required Amount",
                        disabled: "",
                        modelValue: val.value.loan_amount,
                        "onUpdate:modelValue": ($event) => val.value.loan_amount = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"]),
                      createVNode("p", {
                        class: "fs-6 my-2",
                        style: { "color": "var(--clr-gray)" }
                      }, "Max Eligible Amount : " + toDisplayString(val.value.eligible_amount), 1)
                    ]),
                    createVNode("div", { class: "col mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2" }, "Monthly EMI"),
                      createVNode(_component_InputText, {
                        type: "text",
                        placeholder: "₹ ",
                        disabled: "",
                        modelValue: val.value.monthly_emi,
                        "onUpdate:modelValue": ($event) => val.value.monthly_emi = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2" }, "Term"),
                      createVNode(_component_InputText, {
                        class: "w-full md:w-10rem",
                        type: "text",
                        placeholder: "₹ ",
                        disabled: "",
                        modelValue: val.value.tenure,
                        "onUpdate:modelValue": ($event) => val.value.tenure = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"]),
                      createVNode("label", {
                        for: "",
                        class: "fs-5 ml-2",
                        style: { "color": "var(--navy)" }
                      }, "Months")
                    ])
                  ])
                ])
              ]),
              createVNode("div", {
                class: "card bg-gray-100 bottom-0 my-4",
                style: { "border": "none" }
              }, [
                createVNode("div", { class: "card-body mx-4" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("h1", { class: "fs-4 my-2" }, "EMI Dedution"),
                    createVNode("h1", { class: "fs-5 text-gray-600 mb-3" }, "The EMI Dedution Will begin from the Upcoming Payroll"),
                    createVNode("div", { class: "col-4" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI Start Month"),
                      createVNode(_component_Calendar, {
                        showIcon: "",
                        dateFormat: "dd/mm/yy",
                        disabled: "",
                        modelValue: val.value.deduction_starting_month,
                        "onUpdate:modelValue": ($event) => val.value.deduction_starting_month = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-4 mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI End Month"),
                      createVNode(_component_Calendar, {
                        showIcon: "",
                        dateFormat: "dd/mm/yy",
                        disabled: "",
                        modelValue: val.value.deduction_ending_month,
                        "onUpdate:modelValue": ($event) => val.value.deduction_ending_month = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-3" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "Total Months"),
                      createVNode(_component_InputText, {
                        type: "text",
                        style: { "width": "150px !important" },
                        disabled: "",
                        modelValue: val.value.tenure,
                        "onUpdate:modelValue": ($event) => val.value.tenure = $event
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ])
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  class: "my-3 capitalize form-control textbox",
                  disabled: "",
                  modelValue: val.value.reason,
                  "onUpdate:modelValue": ($event) => val.value.reason = $event,
                  autoResize: "",
                  type: "text",
                  rows: "3"
                }, null, 8, ["modelValue", "onUpdate:modelValue"])
              ]),
              createVNode("div", { class: "gap-6 p-4 my-6 bg-gray-100 rounded-lg" }, [
                createVNode("span", { class: "font-semibold" }, "your Comments"),
                createVNode(_component_Textarea, {
                  class: ["my-3 capitalize form-control textbox", [unref(v$).reviewer_comments.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                  modelValue: reviewer_comments.reviewer_comments,
                  "onUpdate:modelValue": ($event) => reviewer_comments.reviewer_comments = $event,
                  autoResize: "",
                  type: "text",
                  rows: "3",
                  style: { "border": "none", "outline-": "none" }
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                createVNode("br"),
                unref(v$).reviewer_comments.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).reviewer_comments.$errors[0].$message), 1)) : createCommentVNode("", true)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
      if (useEmpData.value == "") {
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(UseInterestFreeLoan).arrayIFL_List,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "id",
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
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "request_id",
                header: "Request ID",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "user_code",
                header: "Employee ID"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "name",
                header: "Employee Name",
                sortable: false
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="fw-semibold text-primary"${_scopeId2}>${ssrInterpolate(slotProps.data.name)}</button>`);
                  } else {
                    return [
                      createVNode("button", {
                        class: "fw-semibold text-primary",
                        onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                      }, toDisplayString(slotProps.data.name), 9, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "loan_amount",
                header: "Loan Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "emi_per_month",
                header: "Monthly EMI"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.monthly_emi == null) {
                      _push3(`<h1${_scopeId2}>-</h1>`);
                    } else {
                      _push3(`<h1${_scopeId2}>${ssrInterpolate(slotProps.data.monthly_emi)}</h1>`);
                    }
                    _push3(`</div>`);
                  } else {
                    return [
                      createVNode("div", null, [
                        slotProps.data.monthly_emi == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.monthly_emi), 1))
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "tenure",
                header: "Tenure"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(_ctx.slotProps.data.status)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(_ctx.slotProps.data.status), 1)
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
                    _push3(`<button class="" type="button"${_scopeId2}><i class="pi pi-ellipsis-v"${_scopeId2}></i></button>`);
                    _push3(ssrRenderComponent(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0"
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="d-flex flex-column p-0 m-0"${_scopeId3}><button class="fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2"${_scopeId3}>view</button><button class="fw-semibold text-black hover:bg-gray-200 p-2"${_scopeId3}>passed Transaction</button></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                              createVNode("button", {
                                class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                                onClick: ($event) => showConfirmDialog(slotProps.data)
                              }, "view", 8, ["onClick"]),
                              createVNode("button", {
                                class: "fw-semibold text-black hover:bg-gray-200 p-2",
                                onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                              }, "passed Transaction", 8, ["onClick"])
                            ])
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode("button", {
                        class: "",
                        type: "button",
                        onClick: toggle
                      }, [
                        createVNode("i", { class: "pi pi-ellipsis-v" })
                      ]),
                      createVNode(_component_OverlayPanel, {
                        ref_key: "op",
                        ref: op,
                        style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                        class: "p-0 m-0"
                      }, {
                        default: withCtx(() => [
                          createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                              onClick: ($event) => showConfirmDialog(slotProps.data)
                            }, "view", 8, ["onClick"]),
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 p-2",
                              onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                            }, "passed Transaction", 8, ["onClick"])
                          ])
                        ]),
                        _: 2
                      }, 1536)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "request_id",
                  header: "Request ID",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "user_code",
                  header: "Employee ID"
                }),
                createVNode(_component_Column, {
                  field: "name",
                  header: "Employee Name",
                  sortable: false
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "fw-semibold text-primary",
                      onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                    }, toDisplayString(slotProps.data.name), 9, ["onClick"])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "loan_amount",
                  header: "Loan Amount"
                }),
                createVNode(_component_Column, {
                  field: "emi_per_month",
                  header: "Monthly EMI"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("div", null, [
                      slotProps.data.monthly_emi == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.monthly_emi), 1))
                    ])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "tenure",
                  header: "Tenure"
                }),
                createVNode(_component_Column, {
                  field: "status",
                  header: "Status",
                  style: { "min-width": "12rem" }
                }, {
                  default: withCtx(() => [
                    createTextVNode(toDisplayString(_ctx.slotProps.data.status), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Action"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "",
                      type: "button",
                      onClick: toggle
                    }, [
                      createVNode("i", { class: "pi pi-ellipsis-v" })
                    ]),
                    createVNode(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0"
                    }, {
                      default: withCtx(() => [
                        createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                            onClick: ($event) => showConfirmDialog(slotProps.data)
                          }, "view", 8, ["onClick"]),
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 p-2",
                            onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                          }, "passed Transaction", 8, ["onClick"])
                        ])
                      ]),
                      _: 2
                    }, 1536)
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value != "") {
        _push(ssrRenderComponent(_component_DataTable, {
          value: useEmpData.value,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "id",
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
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "request_id",
                header: "Request ID",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "borrowed_amount",
                header: "Loan Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "loan_amount",
                header: "Advance Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "emi_per_month",
                header: "Monthly EMI"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.emi_per_month == null) {
                      _push3(`<h1${_scopeId2}>-</h1>`);
                    } else {
                      _push3(`<h1${_scopeId2}>${ssrInterpolate(slotProps.data.emi_per_month)}</h1>`);
                    }
                    _push3(`</div>`);
                  } else {
                    return [
                      createVNode("div", null, [
                        slotProps.data.emi_per_month == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.emi_per_month), 1))
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "tenure_months",
                header: "Tenure"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "deduction_starting_month",
                header: "EMI Start Date"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "deduction_ending_month",
                header: "EMI Start Date"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "status",
                header: "Status"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data.loan_crd_sts == 0) {
                      _push3(`<h6 class="text-orange-500"${_scopeId2}> Pending </h6>`);
                    } else {
                      _push3(`<!---->`);
                    }
                    if (slotProps.data.loan_crd_sts == 1) {
                      _push3(`<h6 class="text-green-500"${_scopeId2}> Approved </h6>`);
                    } else {
                      _push3(`<!---->`);
                    }
                    if (slotProps.data.loan_crd_sts == "Rejected") {
                      _push3(`<h6 class="text-red-500"${_scopeId2}></h6>`);
                    } else {
                      _push3(`<!---->`);
                    }
                  } else {
                    return [
                      slotProps.data.loan_crd_sts == 0 ? (openBlock(), createBlock("h6", {
                        key: 0,
                        class: "text-orange-500"
                      }, " Pending ")) : createCommentVNode("", true),
                      slotProps.data.loan_crd_sts == 1 ? (openBlock(), createBlock("h6", {
                        key: 1,
                        class: "text-green-500"
                      }, " Approved ")) : createCommentVNode("", true),
                      slotProps.data.loan_crd_sts == "Rejected" ? (openBlock(), createBlock("h6", {
                        key: 2,
                        class: "text-red-500"
                      })) : createCommentVNode("", true)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "request_id",
                  header: "Request ID",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "borrowed_amount",
                  header: "Loan Amount"
                }),
                createVNode(_component_Column, {
                  field: "loan_amount",
                  header: "Advance Amount"
                }),
                createVNode(_component_Column, {
                  field: "emi_per_month",
                  header: "Monthly EMI"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("div", null, [
                      slotProps.data.emi_per_month == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.emi_per_month), 1))
                    ])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "tenure_months",
                  header: "Tenure"
                }),
                createVNode(_component_Column, {
                  field: "deduction_starting_month",
                  header: "EMI Start Date"
                }),
                createVNode(_component_Column, {
                  field: "deduction_ending_month",
                  header: "EMI Start Date"
                }),
                createVNode(_component_Column, {
                  field: "status",
                  header: "Status"
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data.loan_crd_sts == 0 ? (openBlock(), createBlock("h6", {
                      key: 0,
                      class: "text-orange-500"
                    }, " Pending ")) : createCommentVNode("", true),
                    slotProps.data.loan_crd_sts == 1 ? (openBlock(), createBlock("h6", {
                      key: 1,
                      class: "text-green-500"
                    }, " Approved ")) : createCommentVNode("", true),
                    slotProps.data.loan_crd_sts == "Rejected" ? (openBlock(), createBlock("h6", {
                      key: 2,
                      class: "text-red-500"
                    })) : createCommentVNode("", true)
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/salary_advance_loan/interest_free_loan/interest_free_loan.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "travel_advance",
  __ssrInlineRender: true,
  setup(__props) {
    onMounted(() => {
    });
    ref();
    ref(["Off", "On"]);
    ref("center");
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[--><div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4"><p class="text-xl font-medium">Four Team Members are eligible for Travel Advance as per the <span class="text-lg text-primary text-decoration-underline">Company&#39;s Loan Policy</span></p></div><div class="float-right"><button class="btn btn-border-orange">View Report</button><button class="mx-4 btn btn-orange"> Approval All </button></div></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><h1 class="text-blue-700 mb-2 fs-5 fw-semibold">Pending Approval</h1><div class="table-responsive mb-5">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        value: _ctx.sample,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Request ID",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Employee ID",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "ref",
              header: "Employee Name",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "max_limit",
              header: "Advance Amount",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Bill Sub Deadline",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Request ID",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Employee ID",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "ref",
                header: "Employee Name",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "max_limit",
                header: "Advance Amount",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Bill Sub Deadline",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><h1 class="text-blue-700 mb-2 fs-5 fw-semibold mt-1">Bills Submitted</h1><div class="table-responsive mt-2">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        value: _ctx.sample,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Request ID",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Employee ID",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "ref",
              header: "Employee Name",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "max_limit",
              header: "Advance Amount",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Bill Sub Deadline",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Request ID",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Employee ID",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "ref",
                header: "Employee Name",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "max_limit",
                header: "Advance Amount",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Bill Sub Deadline",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: _ctx.dialog_TravelAdvance,
        "onUpdate:visible": ($event) => _ctx.dialog_TravelAdvance = $event,
        modal: "",
        style: { width: "50vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var( --orange)", "padding-left": "10px" })}" class="fs-4"${_scopeId}>New Travel Advance Request</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  style: { "border-left": "3px solid var( --orange)", "padding-left": "10px" },
                  class: "fs-4"
                }, "New Travel Advance Request")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex pb-2 bg-gray-100 rounded-lg gap-7"${_scopeId}><div class="w-5 p-4 mx-4"${_scopeId}><span class="font-semibold"${_scopeId}>Required Amount</span><input id="rentFrom_month" class="my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${_scopeId}><p class="text-sm font-semibold text-gray-500"${_scopeId}>Max Eligible Amount : 20,000</p></div></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Repayment</span><p class="my-2 fs-5 text-gray-600 text-md"${_scopeId}>The deadline to submit the bills is on salary <strong class="fs-5 text-black"${_scopeId}>12/07/2023</strong></p></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              class: "my-3 capitalize form-control textbox",
              autoResize: "",
              type: "text",
              rows: "3"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="float-right"${_scopeId}><button class="btn btn-border-orange"${_scopeId}>Cancel</button><button class="mx-4 btn btn-orange"${_scopeId}>Submit</button></div>`);
          } else {
            return [
              createVNode("div", { class: "flex pb-2 bg-gray-100 rounded-lg gap-7" }, [
                createVNode("div", { class: "w-5 p-4 mx-4" }, [
                  createVNode("span", { class: "font-semibold" }, "Required Amount"),
                  createVNode("input", {
                    id: "rentFrom_month",
                    class: "my-2 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  }),
                  createVNode("p", { class: "text-sm font-semibold text-gray-500" }, "Max Eligible Amount : 20,000")
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Repayment"),
                createVNode("p", { class: "my-2 fs-5 text-gray-600 text-md" }, [
                  createTextVNode("The deadline to submit the bills is on salary "),
                  createVNode("strong", { class: "fs-5 text-black" }, "12/07/2023")
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  class: "my-3 capitalize form-control textbox",
                  autoResize: "",
                  type: "text",
                  rows: "3"
                })
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("button", { class: "btn btn-border-orange" }, "Cancel"),
                createVNode("button", { class: "mx-4 btn btn-orange" }, "Submit")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: _ctx.canShowLoading,
        "onUpdate:visible": ($event) => _ctx.canShowLoading = $event,
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
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/salary_advance_loan/travel_advance/travel_advance.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "loan_with_interest",
  __ssrInlineRender: true,
  setup(__props) {
    const useData = UseSalaryAdvanceApprovals();
    const useEmpData = ref([""]);
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    const canShowInterestWithLoan = ref(false);
    const currentlySelectedRowData = ref();
    const currentlySelectedStatus = ref();
    const canShowConfirmationAll = ref(false);
    const CurrentName = ref();
    const CurrentUser_code = ref();
    const reviewer_comments = reactive({
      reviewer_comments: ""
    });
    const val = ref();
    const op = ref();
    const toggle = (event) => {
      op.value.toggle(event);
    };
    onMounted(() => {
      useData.getInterestWithLoanDetails();
    });
    function showConfirmDialog(selectedRowData) {
      canShowInterestWithLoan.value = true;
      currentlySelectedRowData.value = selectedRowData;
      val.value = selectedRowData;
    }
    function hideBulkConfirmDialog() {
      canShowConfirmationAll.value = false;
      canShowInterestWithLoan.value = false;
    }
    async function approveAndReject(status) {
      hideBulkConfirmDialog();
      await useData.IWL_ApproveAndReject(currentlySelectedRowData.value, status, reviewer_comments.reviewer_comments);
      currentlySelectedStatus.value = status;
    }
    function view_more(selectedRowData, user_code, currentName) {
      useEmpData.value = selectedRowData;
      CurrentName.value = currentName;
      CurrentUser_code.value = user_code;
    }
    const rules = computed(() => {
      return {
        reviewer_comments: { required }
      };
    });
    const v$ = useValidate(rules, reviewer_comments);
    const submitForm = (val2) => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        approveAndReject(val2);
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_InputText = resolveComponent("InputText");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="mr-4 card"><div class="px-5 row d-flex justify-content-start align-items-center card-body"><div class="flex justify-between gap-6 my-2"><div class="fs-4"><p class="text-xl font-medium">Five Team Members are eligible for the Loan with Interest as per the <span class="text-lg text-primary text-decoration-underline"> Company&#39;s Loan Policy</span></p></div><div class="float-right">`);
      if (useEmpData.value != "") {
        _push(`<button class="btn btn-border-orange">View Report</button>`);
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value == "") {
        _push(`<button class="mx-2 btn btn-orange"> Approval All </button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: canShowInterestWithLoan.value,
        "onUpdate:visible": ($event) => canShowInterestWithLoan.value = $event,
        modal: "",
        header: "Header",
        style: { width: "60vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h1 style="${ssrRenderStyle({ "border-left": "3px solid var( --orange)", "padding-left": "10px" })}" class="fs-4"${_scopeId}>New interest With Loan Request</h1></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h1", {
                  style: { "border-left": "3px solid var( --orange)", "padding-left": "10px" },
                  class: "fs-4"
                }, "New interest With Loan Request")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row p-2"${_scopeId}><div class="col-7"${_scopeId}><div class="card border-0"${_scopeId}><div class="card-body bg-gray-100"${_scopeId}><div class="row"${_scopeId}><div class="col-6" style="${ssrRenderStyle({ "margin-right": "30px" })}"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Required Amount</h1>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              modelValue: val.value.loan_amount,
              "onUpdate:modelValue": ($event) => val.value.loan_amount = $event,
              placeholder: "₹ Enter The Required Amount",
              inputId: "withoutgrouping",
              useGrouping: false
            }, null, _parent2, _scopeId));
            _push2(`<p class="fs-6 my-2" style="${ssrRenderStyle({ "color": "var(--clr-gray)" })}"${_scopeId}>Max Eligible Amount : ${ssrInterpolate(val.value.eligible_amount)}</p></div><div class="col mx-2"${_scopeId}><h1 class="fs-5 my-2"${_scopeId}>Term</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              style: { "width": "100px !important" },
              disabled: "",
              modelValue: val.value.tenure,
              "onUpdate:modelValue": ($event) => val.value.tenure = $event
            }, null, _parent2, _scopeId));
            _push2(`<label for="" class="fs-5 ml-1" style="${ssrRenderStyle({ "color": "var(--navy)" })}"${_scopeId}>Month</label></div></div><div class="row"${_scopeId}><div class="col-12 pr-5"${_scopeId}></div></div></div></div></div><div class="col"${_scopeId}><div class="row"${_scopeId}><div class="col-12 pl-8 pr-8"${_scopeId}><div class="div p-2 d-flex justify-items-center align-items-center flex-column rounded bg-blue-100 shadow-md"${_scopeId}><input class="fw-bolder fs-4 text-blue-900 p-2 ml-2 d-flex justify-items-center text-center bg-blue-100" placeholder="%" style="${ssrRenderStyle({ "width": "100px" })}"${ssrRenderAttr("value", val.value.interest_rate)} disabled prefix="%"${_scopeId}><h1 class="fw-semibold mt-1 fs-5"${_scopeId}>Interest Rate</h1></div></div><div class="col pl-8 pr-8"${_scopeId}><div class="div d-flex justify-items-center align-items-center flex-column p-2 rounded shadow-md" style="${ssrRenderStyle({ "background": "#FDCFCF" })}"${_scopeId}><div class="div d-flex justify-content-center align-items-center"${_scopeId}><h1 class="fw-bolder fs-4"${_scopeId}>₹ </h1><input class="fw-bolder fs-4 pl-2 text-center" style="${ssrRenderStyle({ "width": "100px", "background": "#FDCFCF" })}"${ssrRenderAttr("value", val.value.monthly_emi)} disabled${_scopeId}></div><h1 class="fw-semibold mt-2 fs-5"${_scopeId}>Monthly payment</h1></div></div><div class="col pl-8 pr-8"${_scopeId}><div class="div d-flex justify-items-center align-items-center flex-column p-2 rounded bg-green-100 shadow-md"${_scopeId}><div class="div d-flex justify-content-center align-items-center"${_scopeId}><h1 class="fw-bolder fs-4"${_scopeId}>₹ </h1><input${ssrRenderAttr("value", val.value.total_amount)} class="fw-bolder fs-4 pl-2 bg-green-100 text-center" style="${ssrRenderStyle({ "width": "100px" })}" disabled${_scopeId}></div><h1 class="fw-semibold mt-2 fs-5 mx-3"${_scopeId}>Total loan amount</h1></div></div></div></div></div><div class="card bg-gray-100 bottom-0 my-4" style="${ssrRenderStyle({ "border": "none" })}"${_scopeId}><div class="card-body mx-4"${_scopeId}><div class="row"${_scopeId}><h1 class="fs-4 my-2"${_scopeId}>EMI Dedution</h1><h1 class="fs-5 text-gray-600 mb-3"${_scopeId}>The EMI Dedution Will begin from the Upcoming Payroll</h1><div class="col-4"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI Start Month</h1>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: val.value.deduction_starting_month,
              "onUpdate:modelValue": ($event) => val.value.deduction_starting_month = $event,
              showIcon: "",
              class: "w-full md:w-10rem"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-4 mx-2"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>EMI End Month</h1>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: val.value.deduction_ending_month,
              "onUpdate:modelValue": ($event) => val.value.deduction_ending_month = $event,
              showIcon: ""
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col-3"${_scopeId}><h1 class="fs-5 my-2 ml-2"${_scopeId}>Total Months</h1>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: val.value.tenure,
              "onUpdate:modelValue": ($event) => val.value.tenure = $event,
              disabled: "",
              style: { "width": "150px !important" }
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div></div><div class="p-4 my-6 bg-gray-100 rounded-lg gap-6"${_scopeId}><span class="font-semibold"${_scopeId}>Reason</span>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              modelValue: reviewer_comments.reviewer_comments,
              "onUpdate:modelValue": ($event) => reviewer_comments.reviewer_comments = $event,
              class: ["my-3 capitalize form-control textbox", [unref(v$).reviewer_comments.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
              autoResize: "",
              type: "text",
              rows: "3"
            }, null, _parent2, _scopeId));
            _push2(`<br${_scopeId}>`);
            if (unref(v$).reviewer_comments.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).reviewer_comments.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="float-right"${_scopeId}><button class="btn bg-red-500 px-5 text-white"${_scopeId}>Rejected</button><button class="mx-4 btn btn-orange px-5 bg-green-500 text-white"${_scopeId}>Approved</button></div>`);
          } else {
            return [
              createVNode("div", { class: "row p-2" }, [
                createVNode("div", { class: "col-7" }, [
                  createVNode("div", { class: "card border-0" }, [
                    createVNode("div", { class: "card-body bg-gray-100" }, [
                      createVNode("div", { class: "row" }, [
                        createVNode("div", {
                          class: "col-6",
                          style: { "margin-right": "30px" }
                        }, [
                          createVNode("h1", { class: "fs-5 my-2" }, "Required Amount"),
                          createVNode(_component_InputNumber, {
                            modelValue: val.value.loan_amount,
                            "onUpdate:modelValue": ($event) => val.value.loan_amount = $event,
                            placeholder: "₹ Enter The Required Amount",
                            inputId: "withoutgrouping",
                            useGrouping: false
                          }, null, 8, ["modelValue", "onUpdate:modelValue"]),
                          createVNode("p", {
                            class: "fs-6 my-2",
                            style: { "color": "var(--clr-gray)" }
                          }, "Max Eligible Amount : " + toDisplayString(val.value.eligible_amount), 1)
                        ]),
                        createVNode("div", { class: "col mx-2" }, [
                          createVNode("h1", { class: "fs-5 my-2" }, "Term"),
                          createVNode(_component_InputText, {
                            type: "text",
                            style: { "width": "100px !important" },
                            disabled: "",
                            modelValue: val.value.tenure,
                            "onUpdate:modelValue": ($event) => val.value.tenure = $event
                          }, null, 8, ["modelValue", "onUpdate:modelValue"]),
                          createVNode("label", {
                            for: "",
                            class: "fs-5 ml-1",
                            style: { "color": "var(--navy)" }
                          }, "Month")
                        ])
                      ]),
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-12 pr-5" })
                      ])
                    ])
                  ])
                ]),
                createVNode("div", { class: "col" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-12 pl-8 pr-8" }, [
                      createVNode("div", { class: "div p-2 d-flex justify-items-center align-items-center flex-column rounded bg-blue-100 shadow-md" }, [
                        withDirectives(createVNode("input", {
                          class: "fw-bolder fs-4 text-blue-900 p-2 ml-2 d-flex justify-items-center text-center bg-blue-100",
                          placeholder: "%",
                          style: { "width": "100px" },
                          "onUpdate:modelValue": ($event) => val.value.interest_rate = $event,
                          disabled: "",
                          prefix: "%"
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelText, val.value.interest_rate]
                        ]),
                        createVNode("h1", { class: "fw-semibold mt-1 fs-5" }, "Interest Rate")
                      ])
                    ]),
                    createVNode("div", { class: "col pl-8 pr-8" }, [
                      createVNode("div", {
                        class: "div d-flex justify-items-center align-items-center flex-column p-2 rounded shadow-md",
                        style: { "background": "#FDCFCF" }
                      }, [
                        createVNode("div", { class: "div d-flex justify-content-center align-items-center" }, [
                          createVNode("h1", { class: "fw-bolder fs-4" }, "₹ "),
                          withDirectives(createVNode("input", {
                            class: "fw-bolder fs-4 pl-2 text-center",
                            style: { "width": "100px", "background": "#FDCFCF" },
                            "onUpdate:modelValue": ($event) => val.value.monthly_emi = $event,
                            disabled: ""
                          }, null, 8, ["onUpdate:modelValue"]), [
                            [vModelText, val.value.monthly_emi]
                          ])
                        ]),
                        createVNode("h1", { class: "fw-semibold mt-2 fs-5" }, "Monthly payment")
                      ])
                    ]),
                    createVNode("div", { class: "col pl-8 pr-8" }, [
                      createVNode("div", { class: "div d-flex justify-items-center align-items-center flex-column p-2 rounded bg-green-100 shadow-md" }, [
                        createVNode("div", { class: "div d-flex justify-content-center align-items-center" }, [
                          createVNode("h1", { class: "fw-bolder fs-4" }, "₹ "),
                          withDirectives(createVNode("input", {
                            "onUpdate:modelValue": ($event) => val.value.total_amount = $event,
                            class: "fw-bolder fs-4 pl-2 bg-green-100 text-center",
                            style: { "width": "100px" },
                            disabled: ""
                          }, null, 8, ["onUpdate:modelValue"]), [
                            [vModelText, val.value.total_amount]
                          ])
                        ]),
                        createVNode("h1", { class: "fw-semibold mt-2 fs-5 mx-3" }, "Total loan amount")
                      ])
                    ])
                  ])
                ])
              ]),
              createVNode("div", {
                class: "card bg-gray-100 bottom-0 my-4",
                style: { "border": "none" }
              }, [
                createVNode("div", { class: "card-body mx-4" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("h1", { class: "fs-4 my-2" }, "EMI Dedution"),
                    createVNode("h1", { class: "fs-5 text-gray-600 mb-3" }, "The EMI Dedution Will begin from the Upcoming Payroll"),
                    createVNode("div", { class: "col-4" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI Start Month"),
                      createVNode(_component_Calendar, {
                        modelValue: val.value.deduction_starting_month,
                        "onUpdate:modelValue": ($event) => val.value.deduction_starting_month = $event,
                        showIcon: "",
                        class: "w-full md:w-10rem"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-4 mx-2" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "EMI End Month"),
                      createVNode(_component_Calendar, {
                        modelValue: val.value.deduction_ending_month,
                        "onUpdate:modelValue": ($event) => val.value.deduction_ending_month = $event,
                        showIcon: ""
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ]),
                    createVNode("div", { class: "col-3" }, [
                      createVNode("h1", { class: "fs-5 my-2 ml-2" }, "Total Months"),
                      createVNode(_component_InputText, {
                        type: "text",
                        modelValue: val.value.tenure,
                        "onUpdate:modelValue": ($event) => val.value.tenure = $event,
                        disabled: "",
                        style: { "width": "150px !important" }
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ])
                ])
              ]),
              createVNode("div", { class: "p-4 my-6 bg-gray-100 rounded-lg gap-6" }, [
                createVNode("span", { class: "font-semibold" }, "Reason"),
                createVNode(_component_Textarea, {
                  modelValue: reviewer_comments.reviewer_comments,
                  "onUpdate:modelValue": ($event) => reviewer_comments.reviewer_comments = $event,
                  class: ["my-3 capitalize form-control textbox", [unref(v$).reviewer_comments.$error ? " border-2 outline-none border-red-500 rounded-lg" : ""]],
                  autoResize: "",
                  type: "text",
                  rows: "3"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                createVNode("br"),
                unref(v$).reviewer_comments.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).reviewer_comments.$errors[0].$message), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "float-right" }, [
                createVNode("button", {
                  class: "btn bg-red-500 px-5 text-white",
                  onClick: ($event) => submitForm(-1)
                }, "Rejected", 8, ["onClick"]),
                createVNode("button", {
                  class: "mx-4 btn btn-orange px-5 bg-green-500 text-white",
                  onClick: ($event) => submitForm(1)
                }, "Approved", 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5 lg:grid-cols-5"><div class="p-3 text-center bg-red-100 border-l-4 rounded-lg tw-card border-l-red-400"><p class="mb-2 font-bold text-ash-medium f-13">Total Advance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-bold text-ash-medium f-13"> Total Repaid Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-blue-100 border-l-4 rounded-lg tw-card border-l-blue-400"><p class="mb-2 font-bold text-ash-medium f-13">Balance Amount</p><h6 class="mb-0 text-base font-semibold text-gray-500">Not Submited</h6></div><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-bold text-ash-medium f-13">Pending Request</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div><div class="p-2 text-center bg-yellow-100 border-l-4 rounded-lg tw-card border-l-yellow-400"><p class="mb-2 font-bold text-ash-medium f-13">Completed Rquests</p><h6 class="mb-0 text-base font-semibold text-gray-500">-</h6></div></div></div><div class="table-responsive">`);
      if (useEmpData.value == "") {
        _push(ssrRenderComponent(_component_DataTable, {
          value: unref(useData).arrayIWL,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "id",
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
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "request_id",
                header: "Request ID",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "user_code",
                header: "Employee ID"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "name",
                header: "Employee Name",
                sortable: false
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="fw-semibold text-primary"${_scopeId2}>${ssrInterpolate(slotProps.data.name)}</button>`);
                  } else {
                    return [
                      createVNode("button", {
                        class: "fw-semibold text-primary",
                        onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                      }, toDisplayString(slotProps.data.name), 9, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "loan_amount",
                header: "Loan Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "emi_per_month",
                header: "Monthly EMI"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.monthly_emi == null) {
                      _push3(`<h1${_scopeId2}>-</h1>`);
                    } else {
                      _push3(`<h1${_scopeId2}>${ssrInterpolate(slotProps.data.monthly_emi)}</h1>`);
                    }
                    _push3(`</div>`);
                  } else {
                    return [
                      createVNode("div", null, [
                        slotProps.data.monthly_emi == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.monthly_emi), 1))
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "tenure",
                header: "Tenure"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(_ctx.slotProps.data.status)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(_ctx.slotProps.data.status), 1)
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
                    _push3(`<button class="" type="button"${_scopeId2}><i class="pi pi-ellipsis-v"${_scopeId2}></i></button>`);
                    _push3(ssrRenderComponent(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0"
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="d-flex flex-column p-0 m-0"${_scopeId3}><button class="fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2"${_scopeId3}>view</button><button class="fw-semibold text-black hover:bg-gray-200 p-2"${_scopeId3}>passed Transaction</button></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                              createVNode("button", {
                                class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                                onClick: ($event) => showConfirmDialog(slotProps.data)
                              }, "view", 8, ["onClick"]),
                              createVNode("button", {
                                class: "fw-semibold text-black hover:bg-gray-200 p-2",
                                onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                              }, "passed Transaction", 8, ["onClick"])
                            ])
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode("button", {
                        class: "",
                        type: "button",
                        onClick: toggle
                      }, [
                        createVNode("i", { class: "pi pi-ellipsis-v" })
                      ]),
                      createVNode(_component_OverlayPanel, {
                        ref_key: "op",
                        ref: op,
                        style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                        class: "p-0 m-0"
                      }, {
                        default: withCtx(() => [
                          createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                              onClick: ($event) => showConfirmDialog(slotProps.data)
                            }, "view", 8, ["onClick"]),
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 p-2",
                              onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                            }, "passed Transaction", 8, ["onClick"])
                          ])
                        ]),
                        _: 2
                      }, 1536)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "request_id",
                  header: "Request ID",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "user_code",
                  header: "Employee ID"
                }),
                createVNode(_component_Column, {
                  field: "name",
                  header: "Employee Name",
                  sortable: false
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "fw-semibold text-primary",
                      onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                    }, toDisplayString(slotProps.data.name), 9, ["onClick"])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "loan_amount",
                  header: "Loan Amount"
                }),
                createVNode(_component_Column, {
                  field: "emi_per_month",
                  header: "Monthly EMI"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("div", null, [
                      slotProps.data.monthly_emi == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.monthly_emi), 1))
                    ])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "tenure",
                  header: "Tenure"
                }),
                createVNode(_component_Column, {
                  field: "status",
                  header: "Status",
                  style: { "min-width": "12rem" }
                }, {
                  default: withCtx(() => [
                    createTextVNode(toDisplayString(_ctx.slotProps.data.status), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Action"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "",
                      type: "button",
                      onClick: toggle
                    }, [
                      createVNode("i", { class: "pi pi-ellipsis-v" })
                    ]),
                    createVNode(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0"
                    }, {
                      default: withCtx(() => [
                        createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                            onClick: ($event) => showConfirmDialog(slotProps.data)
                          }, "view", 8, ["onClick"]),
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 p-2",
                            onClick: ($event) => view_more(slotProps.data.emp_prevdetails, slotProps.data.user_code, slotProps.data.name)
                          }, "passed Transaction", 8, ["onClick"])
                        ])
                      ]),
                      _: 2
                    }, 1536)
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      if (useEmpData.value != "") {
        _push(ssrRenderComponent(_component_DataTable, {
          value: useEmpData.value,
          paginator: true,
          rows: 10,
          class: "",
          dataKey: "id",
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
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "request_id",
                header: "Request ID",
                sortable: ""
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "borrowed_amount",
                header: "Loan Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "eligible_amount",
                header: "Advance Amount"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "emi_per_month",
                header: "Monthly EMI"
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.emi_per_month == null) {
                      _push3(`<h1${_scopeId2}>-</h1>`);
                    } else {
                      _push3(`<h1${_scopeId2}>${ssrInterpolate(slotProps.data.emi_per_month)}</h1>`);
                    }
                    _push3(`</div>`);
                  } else {
                    return [
                      createVNode("div", null, [
                        slotProps.data.emi_per_month == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.emi_per_month), 1))
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "tenure_months",
                header: "Tenure"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "deduction_starting_month",
                header: "EMI Start Date"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "deduction_ending_month",
                header: "EMI Start Date"
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "loan_status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`${ssrInterpolate(_ctx.slotProps.data.loan_status)}`);
                  } else {
                    return [
                      createTextVNode(toDisplayString(_ctx.slotProps.data.loan_status), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  field: "request_id",
                  header: "Request ID",
                  sortable: ""
                }),
                createVNode(_component_Column, {
                  field: "borrowed_amount",
                  header: "Loan Amount"
                }),
                createVNode(_component_Column, {
                  field: "eligible_amount",
                  header: "Advance Amount"
                }),
                createVNode(_component_Column, {
                  field: "emi_per_month",
                  header: "Monthly EMI"
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("div", null, [
                      slotProps.data.emi_per_month == null ? (openBlock(), createBlock("h1", { key: 0 }, "-")) : (openBlock(), createBlock("h1", { key: 1 }, toDisplayString(slotProps.data.emi_per_month), 1))
                    ])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "tenure_months",
                  header: "Tenure"
                }),
                createVNode(_component_Column, {
                  field: "deduction_starting_month",
                  header: "EMI Start Date"
                }),
                createVNode(_component_Column, {
                  field: "deduction_ending_month",
                  header: "EMI Start Date"
                }),
                createVNode(_component_Column, {
                  field: "loan_status",
                  header: "Status",
                  style: { "min-width": "12rem" }
                }, {
                  default: withCtx(() => [
                    createTextVNode(toDisplayString(_ctx.slotProps.data.loan_status), 1)
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
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
      _push(`</div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/salary_advance_loan/loan_with_interest/loan_with_interest.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "approvals_salary_advance",
  __ssrInlineRender: true,
  setup(__props) {
    const SalaryAdvanceApprovals = UseSalaryAdvanceApprovals();
    const activetab = ref(1);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(SalaryAdvanceApprovals).canShowLoadingScreen) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><h1 class="fs-5 fw-semibold mb-3">Salary Advance &amp; Loan - Team Management</h1><div class="p-4 pt-1 pb-0 mb-3 bg-white rounded-lg tw-card left-line"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="mx-2 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[activetab.value === 1 ? "active" : ""], "nav-link"])}"> Salary Advance </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 2 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Interest Free Loan </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 3 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Travel Advance </a></li><li class="mx-3 nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[activetab.value === 4 ? "active" : ""], "mx-4 text-center nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Loan With Interest </a></li></ul></div><div class="tab-content" id="">`);
      if (activetab.value === 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 3) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (activetab.value === 4) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/approvals/salary_advance_loan/approvals_salary_advance.vue");
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
app.component("RadioButton", RadioButton);
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
app.component("Textarea", Textarea);
app.component("Chips", Chips);
app.component("MultiSelect", MultiSelect);
app.component("InputNumber", InputNumber);
app.component("SelectButton", SelectButton);
app.component("Checkbox", Checkbox);
app.component("OverlayPanel", OverlayPanel);
app.mount("#approvals_salary_advance");
