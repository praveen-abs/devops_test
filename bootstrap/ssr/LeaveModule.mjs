/* empty css                        *//* empty css                               *//* empty css                             */import { ref, unref, useSSRContext, onMounted, resolveComponent, withCtx, createTextVNode, toDisplayString, openBlock, createBlock, createVNode, createApp } from "vue";
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
import Checkbox from "primevue/checkbox";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import Textarea from "primevue/textarea";
import OverlayPanel from "primevue/overlaypanel";
import Sidebar from "primevue/sidebar";
import { ssrRenderComponent, ssrRenderStyle, ssrRenderList, ssrInterpolate, ssrRenderClass } from "vue/server-renderer";
import { S as Service } from "./assets/Service-c5131e0f.mjs";
import { FilterMatchMode } from "primevue/api";
import "moment";
import axios from "axios";
import dayjs from "dayjs";
import { _ as _sfc_main$5 } from "./assets/LeaveApply-94239469.mjs";
import { L as LoadingSpinner } from "./assets/LoadingSpinner-13fb7de2.mjs";
import "@vuelidate/core";
import "@vuelidate/validators";
import "primevue/usetoast";
import "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
const useLeaveModuleStore = defineStore("useLeaveModuleStore", () => {
  Service();
  const canShowLoading = ref(true);
  const array_employeeLeaveBalance = ref();
  const array_employeeAvailedLeaveBalance = ref();
  const array_employeeLeaveHistory = ref();
  const array_teamLeaveHistory = ref();
  const array_orgLeaveHistory = ref();
  const array_orgLeaveBalance = ref();
  const selectedStartDate = ref();
  const selectedEndDate = ref();
  const canshowloadingsrceen = ref();
  const arrayTermLeaveBalance = ref();
  const selected_LeaveInformation = ref();
  const canShowLeaveDetails = ref(false);
  const setLeaveDetails = ref({});
  const getLeaveDetails = (leaveDetails) => {
    canShowLeaveDetails.value = true;
    console.log(leaveDetails);
    setLeaveDetails.value = { ...leaveDetails };
    setLeaveDetails.emp_name = leaveDetails.name;
  };
  async function getEmployeeLeaveBalance() {
    canShowLoading.value = true;
    let url_leave_balance = `/get-employee-leave-balance`;
    await axios.get(url_leave_balance).then((res) => {
      console.log(res.data);
      array_employeeLeaveBalance.value = res.data;
      array_employeeAvailedLeaveBalance.value = res.data["Avalied Leaves"];
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getEmployeeLeaveHistory(filter_month, filter_year, filter_leave_status) {
    let user_code = 0;
    await axios.get(window.location.origin + "/currentUserCode ").then((response) => {
      user_code = response.data;
    });
    await axios.post("/attendance/getEmployeeLeaveDetails", {
      user_code,
      filter_month,
      filter_year,
      filter_leave_status
    }).then((response) => {
      array_employeeLeaveHistory.value = response.data.data;
      console.log("getEmployeeLeaveHistory() : " + response.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getTeamLeaveHistory(filter_month, filter_year, filter_leave_status) {
    let user_code = 0;
    await axios.get(window.location.origin + "/currentUserCode ").then((response) => {
      user_code = response.data;
    });
    axios.post("/attendance/getTeamEmployeesLeaveDetails", {
      manager_code: user_code,
      filter_month,
      filter_year,
      filter_leave_status
    }).then((response) => {
      array_teamLeaveHistory.value = response.data.data;
      console.log("getTeamLeaveHistory() : " + response.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getAllEmployeesLeaveHistory(filter_month, filter_year, filter_leave_status) {
    axios.post("/attendance/getAllEmployeesLeaveDetails", {
      filter_month,
      filter_year,
      filter_leave_status
    }).then((response) => {
      array_orgLeaveHistory.value = response.data.data;
      console.log("getOrgLeaveHistory() : " + response.data.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getLeaveInformation(record_id) {
    axios.post("/attendance/getLeaveInformation", {
      record_id
    }).then((response) => {
      selected_LeaveInformation.value = response.data.data;
      console.log("getLeaveInformation() : " + response.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getOrgLeaveBalance(start_date, end_date) {
    await axios.post("/fetch-org-leaves-balance", {
      start_date,
      end_date
    }).then((res) => {
      array_orgLeaveBalance.value = res.data;
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  async function getTermLeaveBalance(start_date, end_date) {
    console.log(start_date, end_date);
    axios.post("/fetch-team-leave-balance", {
      start_date,
      end_date
    }).then((res) => {
      arrayTermLeaveBalance.value = res.data;
    }).finally(() => {
      canShowLoading.value = false;
    });
  }
  return {
    canShowLoading,
    canShowLeaveDetails,
    setLeaveDetails,
    getLeaveDetails,
    array_employeeLeaveHistory,
    array_teamLeaveHistory,
    array_orgLeaveHistory,
    array_employeeLeaveBalance,
    array_employeeAvailedLeaveBalance,
    array_orgLeaveBalance,
    selectedStartDate,
    selectedEndDate,
    canshowloadingsrceen,
    arrayTermLeaveBalance,
    getEmployeeLeaveHistory,
    getTeamLeaveHistory,
    getAllEmployeesLeaveHistory,
    getLeaveInformation,
    getEmployeeLeaveBalance,
    getOrgLeaveBalance,
    getTermLeaveBalance
  };
});
const _sfc_main$4 = {
  __name: "EmployeeLeaveBalance",
  __ssrInlineRender: true,
  setup(__props) {
    const useLeaveStore = useLeaveModuleStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="mb-3 card"><div class="card-body"><div class="mb-2 row"><div class="col-sm-6 col-xl-6 col-md-6 col-lg-6"><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Leave balance</span></div><div class="col-6 justify-content-end d-flex">`);
      _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
      _push(`</div></div><div class="grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-5 xl:grid-cols-5 lg:grid-cols-5" style="${ssrRenderStyle({ "display": "grid" })}"><!--[-->`);
      ssrRenderList(unref(useLeaveStore).array_employeeLeaveBalance, (leave_balance) => {
        _push(`<div class="p-1 my-2 rounded-lg border bg-gray-100 hover:bg-slate-100 cursor-pointer"><p class="my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]">${ssrInterpolate(leave_balance.leave_type)}</p><p class="my-1 text-xl font-semibold text-center">`);
        if (leave_balance.leave_balance == "") {
          _push(`<span class="text-lg font-semibold">0</span>`);
        } else {
          _push(`<span class="text-lg font-semibold">${ssrInterpolate(leave_balance.leave_balance)}</span>`);
        }
        _push(`</p></div>`);
      });
      _push(`<!--]--></div></div></div><div class="card"><div class="card-body"><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Leave Availed</span><div class="grid gap-4 md:grid-cols-4 sm:grid-cols-1 xxl:grid-cols-5 xl:grid-cols-5 lg:grid-cols-5" style="${ssrRenderStyle({ "display": "grid" })}"><!--[-->`);
      ssrRenderList(unref(useLeaveStore).array_employeeLeaveBalance, (leave_balance) => {
        _push(`<div class="bg-gray-100 border-l-4 border-indigo-300 p-1 rounded-lg border my-2 cursor-pointer hover:bg-slate-100"><div class="text-center"><p class="my-1 lg:text-[12px] font-semibold text-center md:text-[10px] xl:text-[13px]">${ssrInterpolate(leave_balance.leave_type)}</p><p class="my-1 text-xl font-semibold text-center">`);
        if (leave_balance.avalied_leaves == "") {
          _push(`<span class="text-lg font-semibold">0</span>`);
        } else {
          _push(`<span class="text-lg font-semibold">${ssrInterpolate(leave_balance.avalied_leaves)}</span>`);
        }
        _push(`</p></div></div>`);
      });
      _push(`<!--]--></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/leave_module/leave_details/EmployeeLeaveBalance.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "EmployeeLeaveDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const leaveModuleStore = useLeaveModuleStore();
    const isLoading = ref(true);
    const overlayPanel = ref();
    const selectedLeaveDate = ref();
    const toggle = (event) => {
      overlayPanel.value.toggle(event);
    };
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
    onMounted(async () => {
      await leaveModuleStore.getEmployeeLeaveHistory(dayjs().month() + 1, dayjs().year(), ["Approved", "Pending", "Rejected"]);
      isLoading.value = false;
    });
    function Leavehistory_Addcomment_btn() {
      leaveModuleStore.canShowLeaveDetails = false;
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
      _push(`<div class="mt-3 row"><div class="col-sm-12 col-xl-12 col-md-12 col-lg-12"><div class="mb-0 card leave-history"><div class="card-body"><div class="flex justify-between"><div><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins] mb-4"> Leave history </span></div><div class="d-flex justify-content-end mb-2"><label for="" class="my-2 text-lg font-semibold">Select Month</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        view: "month",
        dateFormat: "mm/yy",
        class: "mx-4",
        modelValue: selectedLeaveDate.value,
        "onUpdate:modelValue": ($event) => selectedLeaveDate.value = $event,
        style: { "border-radius": "7px", "height": "30px" },
        onDateSelect: ($event) => (unref(leaveModuleStore).getEmployeeLeaveHistory(selectedLeaveDate.value.getMonth() + 1, selectedLeaveDate.value.getFullYear(), statuses.value), unref(leaveModuleStore).canShowLoading = true)
      }, null, _parent));
      _push(`</div></div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(leaveModuleStore).array_employeeLeaveHistory,
        paginator: true,
        rows: 5,
        dataKey: "id",
        rowsPerPageOptions: [5, 10, 25],
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["name", "status"]
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee data..... `);
          } else {
            return [
              createTextVNode(" No Employee data..... ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "leave_type",
              header: "Leave Type",
              style: { "min-width": "14rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "start_date",
              header: "Start Date",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "end_date",
              header: "End Date",
              dataType: "date",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "leave_reason",
              header: "Leave Reason",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70) {
                    _push3(`<div${_scopeId2}><p class="font-medium text-orange-400 underline cursor-pointer"${_scopeId2}> explore more... </p>`);
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
                    _push3(`<div${_scopeId2}>${ssrInterpolate(slotProps.data.leave_reason ?? "")}</div>`);
                  }
                } else {
                  return [
                    slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70 ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", {
                        onClick: toggle,
                        class: "font-medium text-orange-400 underline cursor-pointer"
                      }, " explore more... "),
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
                    ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason ?? ""), 1))
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
              field: "",
              header: "Action",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="flex justify-center"${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_Button, {
                    type: "button",
                    icon: "",
                    class: "text-white bg-black Button py-2.5 mx-auto",
                    label: "View",
                    onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                    style: { "height": "2em" }
                  }, null, _parent3, _scopeId2));
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", { class: "flex justify-center" }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "",
                        class: "text-white bg-black Button py-2.5 mx-auto",
                        label: "View",
                        onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "leave_type",
                header: "Leave Type",
                style: { "min-width": "14rem" }
              }),
              createVNode(_component_Column, {
                field: "start_date",
                header: "Start Date",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "end_date",
                header: "End Date",
                dataType: "date",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "leave_reason",
                header: "Leave Reason",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70 ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", {
                      onClick: toggle,
                      class: "font-medium text-orange-400 underline cursor-pointer"
                    }, " explore more... "),
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
                  ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason ?? ""), 1))
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
                field: "",
                header: "Action",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "flex justify-center" }, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "",
                      class: "text-white bg-black Button py-2.5 mx-auto",
                      label: "View",
                      onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                      style: { "height": "2em" }
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
      _push(`</div></div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(leaveModuleStore).canShowLeaveDetails,
        "onUpdate:visible": ($event) => unref(leaveModuleStore).canShowLeaveDetails = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "50vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="w-full"${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="text-xl font-semibold"${_scopeId}> Leave Details Request</h5></div>`);
          } else {
            return [
              createVNode("div", { class: "w-full" }, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "text-xl font-semibold"
                }, " Leave Details Request", 4)
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="w-full"${_scopeId}><div class="border w-full rounded-lg"${_scopeId}><div class="p-3 pl-5 d-flex align-items-center border"${_scopeId}><div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100" style="${ssrRenderStyle({ "width": "80px", "height": "80px" })}"${_scopeId}><h1 class="text-3xl font-semibold"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.user_short_name)}</h1></div><div class="ml-5"${_scopeId}><h1 class="text-lg font-semibold"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.name)}</h1><div${_scopeId}><p class="fs-6 text-neutral-400"${_scopeId}>Requested on ${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.leaverequest_date)}</p></div></div></div><div class="border w-full d-flex py-4 px-4"${_scopeId}><div class="mx-2 p-1 rounded-lg"${_scopeId}><h1 class="text-center py-1 px-2 text-light rounded-top fw-bold" style="${ssrRenderStyle({ "background-color": "navy" })}"${_scopeId}>${ssrInterpolate(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.end_date).format("MMM"))}</h1><h1 class="text-center py-1 px-2 fs-5 fw-bold"${_scopeId}>${ssrInterpolate(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.end_date).format("DD"))}</h1><h1 class="text-center py-1 px-2 fs-6 fw-bold"${_scopeId}>${ssrInterpolate(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.end_date).format("dddd"))}</h1></div><div class="py-3"${_scopeId}><h1 class="text-lg font-semibold text-primary-800"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.total_leave_datetime)} Day of ${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.leave_type)} <span class="font-semibold text-xs"${_scopeId}> (${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.leave_reason)}) </span></h1></div></div><div class="border w-full py-4 px-4"${_scopeId}><h1 class="text-lg font-semibold"${_scopeId}>Notified To:</h1><div class="card px-3 py-2 d-flex mt-3" style="${ssrRenderStyle({ "min-width": "250px", "max-width": "300px", "display": "flex" })}"${_scopeId}><div class="d-flex p-2 align-items-center"${_scopeId}><div class="rounded-circle bg-blue-100 d-flex justify-content-center align-items-center" style="${ssrRenderStyle({ "width": "40px", "height": "40px" })}"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.reviewer_short_name)}</div><div class="flex-column px-3"${_scopeId}><h1 class="fs-6 fw-bold"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.reviewer_name)}</h1><h1 class="py-2 text-neutral-400"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.reviewer_designation)}</h1></div></div></div></div><div class="border w-full py-4 px-4"${_scopeId}><h1 class="text-lg font-semibold"${_scopeId}>Approved by</h1><div class="card px-3 py-2 d-flex mt-3" style="${ssrRenderStyle({ "min-width": "180px", "max-width": "300px", "display": "flex" })}"${_scopeId}><div class="d-flex p-2 align-items-center"${_scopeId}><div class="rounded-circle bg-green-400 d-flex justify-content-center align-items-center" style="${ssrRenderStyle({ "width": "40px", "height": "40px" })}"${_scopeId}><i class="pi pi-check text-light"${_scopeId}></i></div><div class="flex-column px-3"${_scopeId}><h1 class="fs-6 fw-bold"${_scopeId}>${ssrInterpolate(unref(leaveModuleStore).setLeaveDetails.reviewer_name)}</h1><h1 class="py-2 text-neutral-400"${_scopeId}> on ${ssrInterpolate(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh: mm:ss A"))}</h1></div></div></div></div><div class="my-4 mx-3"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              name: "",
              id: "",
              cols: "70",
              rows: "3",
              autoResize: "",
              placeholder: "Add Comment"
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div><div class="text-end mx-4 my-4"${_scopeId}><button class="btn btn-orange px-5"${_scopeId}>Post</button></div>`);
          } else {
            return [
              createVNode("div", { class: "w-full" }, [
                createVNode("div", { class: "border w-full rounded-lg" }, [
                  createVNode("div", { class: "p-3 pl-5 d-flex align-items-center border" }, [
                    createVNode("div", {
                      class: "rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-yellow-100",
                      style: { "width": "80px", "height": "80px" }
                    }, [
                      createVNode("h1", { class: "text-3xl font-semibold" }, toDisplayString(unref(leaveModuleStore).setLeaveDetails.user_short_name), 1)
                    ]),
                    createVNode("div", { class: "ml-5" }, [
                      createVNode("h1", { class: "text-lg font-semibold" }, toDisplayString(unref(leaveModuleStore).setLeaveDetails.name), 1),
                      createVNode("div", null, [
                        createVNode("p", { class: "fs-6 text-neutral-400" }, "Requested on " + toDisplayString(unref(leaveModuleStore).setLeaveDetails.leaverequest_date), 1)
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "border w-full d-flex py-4 px-4" }, [
                    createVNode("div", { class: "mx-2 p-1 rounded-lg" }, [
                      createVNode("h1", {
                        class: "text-center py-1 px-2 text-light rounded-top fw-bold",
                        style: { "background-color": "navy" }
                      }, toDisplayString(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.end_date).format("MMM")), 1),
                      createVNode("h1", { class: "text-center py-1 px-2 fs-5 fw-bold" }, toDisplayString(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.end_date).format("DD")), 1),
                      createVNode("h1", { class: "text-center py-1 px-2 fs-6 fw-bold" }, toDisplayString(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.end_date).format("dddd")), 1)
                    ]),
                    createVNode("div", { class: "py-3" }, [
                      createVNode("h1", { class: "text-lg font-semibold text-primary-800" }, [
                        createTextVNode(toDisplayString(unref(leaveModuleStore).setLeaveDetails.total_leave_datetime) + " Day of " + toDisplayString(unref(leaveModuleStore).setLeaveDetails.leave_type) + " ", 1),
                        createVNode("span", { class: "font-semibold text-xs" }, " (" + toDisplayString(unref(leaveModuleStore).setLeaveDetails.leave_reason) + ") ", 1)
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "border w-full py-4 px-4" }, [
                    createVNode("h1", { class: "text-lg font-semibold" }, "Notified To:"),
                    createVNode("div", {
                      class: "card px-3 py-2 d-flex mt-3",
                      style: { "min-width": "250px", "max-width": "300px", "display": "flex" }
                    }, [
                      createVNode("div", { class: "d-flex p-2 align-items-center" }, [
                        createVNode("div", {
                          class: "rounded-circle bg-blue-100 d-flex justify-content-center align-items-center",
                          style: { "width": "40px", "height": "40px" }
                        }, toDisplayString(unref(leaveModuleStore).setLeaveDetails.reviewer_short_name), 1),
                        createVNode("div", { class: "flex-column px-3" }, [
                          createVNode("h1", { class: "fs-6 fw-bold" }, toDisplayString(unref(leaveModuleStore).setLeaveDetails.reviewer_name), 1),
                          createVNode("h1", { class: "py-2 text-neutral-400" }, toDisplayString(unref(leaveModuleStore).setLeaveDetails.reviewer_designation), 1)
                        ])
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "border w-full py-4 px-4" }, [
                    createVNode("h1", { class: "text-lg font-semibold" }, "Approved by"),
                    createVNode("div", {
                      class: "card px-3 py-2 d-flex mt-3",
                      style: { "min-width": "180px", "max-width": "300px", "display": "flex" }
                    }, [
                      createVNode("div", { class: "d-flex p-2 align-items-center" }, [
                        createVNode("div", {
                          class: "rounded-circle bg-green-400 d-flex justify-content-center align-items-center",
                          style: { "width": "40px", "height": "40px" }
                        }, [
                          createVNode("i", { class: "pi pi-check text-light" })
                        ]),
                        createVNode("div", { class: "flex-column px-3" }, [
                          createVNode("h1", { class: "fs-6 fw-bold" }, toDisplayString(unref(leaveModuleStore).setLeaveDetails.reviewer_name), 1),
                          createVNode("h1", { class: "py-2 text-neutral-400" }, " on " + toDisplayString(unref(dayjs)(unref(leaveModuleStore).setLeaveDetails.leaverequest_date).format("DD-MMM-YYYY hh: mm:ss A")), 1)
                        ])
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "my-4 mx-3" }, [
                    createVNode(_component_Textarea, {
                      name: "",
                      id: "",
                      cols: "70",
                      rows: "3",
                      autoResize: "",
                      placeholder: "Add Comment"
                    })
                  ])
                ])
              ]),
              createVNode("div", { class: "text-end mx-4 my-4" }, [
                createVNode("button", {
                  class: "btn btn-orange px-5",
                  onClick: Leavehistory_Addcomment_btn
                }, "Post")
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
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/leave_module/leave_details/EmployeeLeaveDetails.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "OrgLeaveDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const leaveModuleStore = useLeaveModuleStore();
    ref();
    ref();
    ref(true);
    const selectedLeaveDate = ref();
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    ref();
    const filters = ref({
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    const statuses = ref(["Pending", "Approved", "Rejected"]);
    onMounted(async () => {
      await leaveModuleStore.getOrgLeaveBalance();
      await leaveModuleStore.getAllEmployeesLeaveHistory(dayjs().month() + 1, dayjs().year(), ["Approved", "Pending", "Rejected"]);
      console.log("Org Leave details : " + leaveModuleStore.array_orgLeaveHistory);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Button = resolveComponent("Button");
      _push(`<!--[--><div class="card top-line"><div class="card-body"><div class="row"><div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-content-center"><h6 class="h-7 mt-3 text-lg font-semibold text-gray-900 modal-title">Org Leave Balance</h6><div class="my-2 d-flex justify-content-between align-items-center"><div></div><div class="d-flex"><div class=""><label for=" " class="text-lg font-semibold">Start Date</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        modelValue: unref(leaveModuleStore).selectedStartDate,
        "onUpdate:modelValue": ($event) => unref(leaveModuleStore).selectedStartDate = $event,
        dateFormat: "dd-mm-yy",
        class: "pl-3",
        style: { "border-radius": "7px", "height": "30px", "width": "100px" },
        maxDate: new Date()
      }, null, _parent));
      _push(`</div><div class=""><label for=" " class="text-lg font-semibold mx-2">End Date</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        class: "mr-3",
        modelValue: unref(leaveModuleStore).selectedEndDate,
        "onUpdate:modelValue": ($event) => unref(leaveModuleStore).selectedEndDate = $event,
        dateFormat: "dd-mm-yy",
        style: { "border-radius": "7px", "height": "30px", "width": "100px" },
        maxDate: new Date()
      }, null, _parent));
      _push(`</div><button class="btn-orange py-1 px-4 rounded" style="${ssrRenderStyle({ "height": "30px" })}">submit</button></div></div></div><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(leaveModuleStore).array_orgLeaveBalance,
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
        expansion: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              value: slotProps.data.leave_balance_details,
              responsiveLayout: "scroll",
              selection: selectedAllEmployee.value,
              "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
              selectAll: _ctx.selectAll,
              onSelectAllChange: _ctx.onSelectAllChange
            }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "leave_type",
                    header: "Leave Type"
                  }, {
                    default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.leave_type)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.leave_type), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "opening_balance",
                    header: "Opening Balance"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "avalied",
                    header: "Avalied"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "closing_balance",
                    header: "Closing Balance"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "leave_type",
                      header: "Leave Type"
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_type), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "opening_balance",
                      header: "Opening Balance"
                    }),
                    createVNode(_component_Column, {
                      field: "avalied",
                      header: "Avalied"
                    }),
                    createVNode(_component_Column, {
                      field: "closing_balance",
                      header: "Closing Balance"
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
                  value: slotProps.data.leave_balance_details,
                  responsiveLayout: "scroll",
                  selection: selectedAllEmployee.value,
                  "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                  selectAll: _ctx.selectAll,
                  onSelectAllChange: _ctx.onSelectAllChange
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      field: "leave_type",
                      header: "Leave Type"
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_type), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "opening_balance",
                      header: "Opening Balance"
                    }),
                    createVNode(_component_Column, {
                      field: "avalied",
                      header: "Avalied"
                    }),
                    createVNode(_component_Column, {
                      field: "closing_balance",
                      header: "Closing Balance"
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
              field: "user_code",
              header: "Employee Id",
              sortable: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "name",
              header: "Employee Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "location",
              header: "Location",
              sortable: false
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "department",
              header: "Department"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "total_leave_balance",
              header: "Total Leave Balance"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { expander: true }),
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
                field: "location",
                header: "Location",
                sortable: false
              }),
              createVNode(_component_Column, {
                field: "department",
                header: "Department"
              }),
              createVNode(_component_Column, {
                field: "total_leave_balance",
                header: "Total Leave Balance"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div><div class="mt-3 row"><div class="col-sm-12 col-xl-12 col-md-12 col-lg-12"><div class="mb-0 card leave-history"><div class="card-body"><div class="flex justify-between"><div><h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Org Leave history</h6></div><div class="d-flex justify-content-end"><label for="" class="my-2 text-lg font-semibold">Select Month</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        view: "month",
        dateFormat: "mm/yy",
        class: "mx-4",
        modelValue: selectedLeaveDate.value,
        "onUpdate:modelValue": ($event) => selectedLeaveDate.value = $event,
        style: { "border-radius": "7px", "height": "30px" },
        onDateSelect: ($event) => unref(leaveModuleStore).getAllEmployeesLeaveHistory(selectedLeaveDate.value.getMonth() + 1, selectedLeaveDate.value.getFullYear(), statuses.value)
      }, null, _parent));
      _push(`</div></div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(leaveModuleStore).array_orgLeaveHistory,
        responsiveLayout: "scroll",
        paginator: true,
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        rows: 5,
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["name"],
        style: { "white-space": "nowrap" }
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee data..... `);
          } else {
            return [
              createTextVNode(" No Employee data..... ")
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
              field: "leave_type",
              header: "Leave Type"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "start_date",
              header: "Start Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "end_date",
              header: "End Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "total_leave_datetime",
              header: "Total Leave Days"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "leave_reason",
              header: "Leave Reason"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70) {
                    _push3(`<div${_scopeId2}><p class="font-medium text-orange-400 underline cursor-pointer"${_scopeId2}> More... </p>`);
                    _push3(ssrRenderComponent(_component_OverlayPanel, {
                      ref: "overlayPanel",
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
                    _push3(`<div${_scopeId2}>${ssrInterpolate(slotProps.data.leave_reason ?? "")}</div>`);
                  }
                } else {
                  return [
                    slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70 ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", {
                        onClick: _ctx.toggle,
                        class: "font-medium text-orange-400 underline cursor-pointer"
                      }, " More... ", 8, ["onClick"]),
                      createVNode(_component_OverlayPanel, {
                        ref: "overlayPanel",
                        style: { "height": "80px" }
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                        ]),
                        _: 2
                      }, 1536)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason ?? ""), 1))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status"
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
              field: "",
              header: "Action",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Button, {
                    type: "button",
                    icon: "",
                    class: "text-white Button py-2.5",
                    label: "View",
                    onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                    style: { "height": "2em" }
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "",
                      class: "text-white Button py-2.5",
                      label: "View",
                      onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"])
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
                field: "leave_type",
                header: "Leave Type"
              }),
              createVNode(_component_Column, {
                field: "start_date",
                header: "Start Date"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "end_date",
                header: "End Date"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "total_leave_datetime",
                header: "Total Leave Days"
              }),
              createVNode(_component_Column, {
                field: "leave_reason",
                header: "Leave Reason"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70 ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", {
                      onClick: _ctx.toggle,
                      class: "font-medium text-orange-400 underline cursor-pointer"
                    }, " More... ", 8, ["onClick"]),
                    createVNode(_component_OverlayPanel, {
                      ref: "overlayPanel",
                      style: { "height": "80px" }
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                      ]),
                      _: 2
                    }, 1536)
                  ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason ?? ""), 1))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status"
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
                field: "",
                header: "Action",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode(_component_Button, {
                    type: "button",
                    icon: "",
                    class: "text-white Button py-2.5",
                    label: "View",
                    onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                    style: { "height": "2em" }
                  }, null, 8, ["onClick"])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/leave_module/leave_details/OrgLeaveDetails.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "TeamLeaveDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const leaveModuleStore = useLeaveModuleStore();
    ref();
    ref();
    ref();
    ref();
    ref();
    ref(true);
    ref();
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
    const ManagerselectedLeaveDate = ref();
    const filters = ref({
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    const statuses = ref(["Pending", "Approved", "Rejected"]);
    onMounted(async () => {
      await leaveModuleStore.getTermLeaveBalance();
      await leaveModuleStore.getTeamLeaveHistory(dayjs().month() + 1, dayjs().year(), ["Approved", "Pending", "Rejected"]);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Button = resolveComponent("Button");
      _push(`<!--[--><div class="card top-line"><div class="card-body"><div class="row"><div class="col-sm-12 col-xl-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center"><h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Team Leave Balance</h6><div class="my-2 d-flex justify-content-between align-items-center"><div></div><div class="d-flex"><div class=""><label for=" " class="font-semibold text-lg mx-2">Start Date</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        modelValue: unref(leaveModuleStore).selectedStartDate,
        "onUpdate:modelValue": ($event) => unref(leaveModuleStore).selectedStartDate = $event,
        dateFormat: "dd-mm-yy",
        class: "p-l3",
        style: { "border-radius": "7px", "height": "30px", "width": "100px" },
        maxDate: new Date()
      }, null, _parent));
      _push(`</div><div class=""><label for=" " class="font-semibold text-lg mx-2">End Date</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        class: "mr-3",
        modelValue: unref(leaveModuleStore).selectedEndDate,
        "onUpdate:modelValue": ($event) => unref(leaveModuleStore).selectedEndDate = $event,
        dateFormat: "dd-mm-yy",
        style: { "border-radius": "7px", "height": "30px", "width": "100px" },
        maxDate: new Date()
      }, null, _parent));
      _push(`</div><button class="btn-orange py-1 px-4 rounded">submit</button></div></div></div><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(leaveModuleStore).arrayTermLeaveBalance,
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
        expansion: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              value: slotProps.data.leave_balance_details,
              responsiveLayout: "scroll",
              selection: selectedAllEmployee.value,
              "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
              selectAll: _ctx.selectAll,
              onSelectAllChange: _ctx.onSelectAllChange
            }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "leave_type",
                    header: "Leave Type"
                  }, {
                    default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.leave_type)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.leave_type), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "opening_balance",
                    header: "Opening Balance"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "avalied",
                    header: "Avalied"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "closing_balance",
                    header: "Closing Balance"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "leave_type",
                      header: "Leave Type"
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_type), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "opening_balance",
                      header: "Opening Balance"
                    }),
                    createVNode(_component_Column, {
                      field: "avalied",
                      header: "Avalied"
                    }),
                    createVNode(_component_Column, {
                      field: "closing_balance",
                      header: "Closing Balance"
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
                  value: slotProps.data.leave_balance_details,
                  responsiveLayout: "scroll",
                  selection: selectedAllEmployee.value,
                  "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                  selectAll: _ctx.selectAll,
                  onSelectAllChange: _ctx.onSelectAllChange
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      field: "leave_type",
                      header: "Leave Type"
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_type), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      field: "opening_balance",
                      header: "Opening Balance"
                    }),
                    createVNode(_component_Column, {
                      field: "avalied",
                      header: "Avalied"
                    }),
                    createVNode(_component_Column, {
                      field: "closing_balance",
                      header: "Closing Balance"
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
            _push2(ssrRenderComponent(_component_Column, {
              style: { "width": "1rem !important" },
              expander: true
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
              field: "location",
              header: "Location",
              sortable: false
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "department",
              header: "Department"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "total_leave_balance",
              header: "Total Leave Balance"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                style: { "width": "1rem !important" },
                expander: true
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
                field: "location",
                header: "Location",
                sortable: false
              }),
              createVNode(_component_Column, {
                field: "department",
                header: "Department"
              }),
              createVNode(_component_Column, {
                field: "total_leave_balance",
                header: "Total Leave Balance"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div><div class="mt-3 row"><div class="col-sm-12 col-xl-12 col-md-12 col-lg-12"><div class="mb-0 card leave-history"><div class="card-body"><div class="flex justify-between"><div><h6 class="mb-4 text-lg font-semibold text-gray-900 modal-title">Team Leave history</h6></div><div class="d-flex justify-content-end"><label for="" class="my-2 text-lg font-semibold">Select Month</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        view: "month",
        dateFormat: "mm/yy",
        class: "mx-4",
        modelValue: ManagerselectedLeaveDate.value,
        "onUpdate:modelValue": ($event) => ManagerselectedLeaveDate.value = $event,
        style: { "border-radius": "7px", "height": "30px" },
        onDateSelect: ($event) => (unref(leaveModuleStore).getTeamLeaveHistory(ManagerselectedLeaveDate.value.getMonth() + 1, ManagerselectedLeaveDate.value.getFullYear(), statuses.value), unref(leaveModuleStore).canShowLoading = true)
      }, null, _parent));
      _push(`</div></div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(leaveModuleStore).array_teamLeaveHistory,
        responsiveLayout: "scroll",
        paginator: true,
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        rows: 5,
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["name"],
        style: { "white-space": "nowrap" }
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee data..... `);
          } else {
            return [
              createTextVNode(" No Employee data..... ")
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
              field: "leave_type",
              header: "Leave Type"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "start_date",
              header: "Start Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "end_date",
              header: "End Date"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "total_leave_datetime",
              header: "Total Leave Days"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "leave_reason",
              header: "Leave Reason"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70) {
                    _push3(`<div${_scopeId2}><p class="font-medium text-orange-400 underline cursor-pointer"${_scopeId2}> explore more... </p>`);
                    _push3(ssrRenderComponent(_component_OverlayPanel, {
                      ref: "overlayPanel",
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
                    _push3(`<div${_scopeId2}>${ssrInterpolate(slotProps.data.leave_reason ?? "")}</div>`);
                  }
                } else {
                  return [
                    slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70 ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", {
                        onClick: _ctx.toggle,
                        class: "font-medium text-orange-400 underline cursor-pointer"
                      }, " explore more... ", 8, ["onClick"]),
                      createVNode(_component_OverlayPanel, {
                        ref: "overlayPanel",
                        style: { "height": "80px" }
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                        ]),
                        _: 2
                      }, 1536)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason ?? ""), 1))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status"
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
              field: "",
              header: "Action",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Button, {
                    type: "button",
                    icon: "",
                    class: "text-white Button py-2.5",
                    label: "View",
                    onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                    style: { "height": "2em" }
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "",
                      class: "text-white Button py-2.5",
                      label: "View",
                      onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"])
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
                field: "leave_type",
                header: "Leave Type"
              }),
              createVNode(_component_Column, {
                field: "start_date",
                header: "Start Date"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.start_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "end_date",
                header: "End Date"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.end_date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "total_leave_datetime",
                header: "Total Leave Days"
              }),
              createVNode(_component_Column, {
                field: "leave_reason",
                header: "Leave Reason"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.leave_reason && slotProps.data.leave_reason.length > 70 ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", {
                      onClick: _ctx.toggle,
                      class: "font-medium text-orange-400 underline cursor-pointer"
                    }, " explore more... ", 8, ["onClick"]),
                    createVNode(_component_OverlayPanel, {
                      ref: "overlayPanel",
                      style: { "height": "80px" }
                    }, {
                      default: withCtx(() => [
                        createTextVNode(toDisplayString(slotProps.data.leave_reason), 1)
                      ]),
                      _: 2
                    }, 1536)
                  ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(slotProps.data.leave_reason ?? ""), 1))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status"
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
                field: "",
                header: "Action",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode(_component_Button, {
                    type: "button",
                    icon: "",
                    class: "text-white Button py-2.5",
                    label: "View",
                    onClick: ($event) => unref(leaveModuleStore).getLeaveDetails(slotProps.data),
                    style: { "height": "2em" }
                  }, null, 8, ["onClick"])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/leave_module/leave_details/TeamLeaveDetails.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "LeaveModule",
  __ssrInlineRender: true,
  setup(__props) {
    const useLeaveStore = useLeaveModuleStore();
    const service = Service();
    const apply = ref(false);
    onMounted(() => {
      useLeaveStore.getEmployeeLeaveBalance();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_leaveapply2 = resolveComponent("leaveapply2");
      _push(`<!--[-->`);
      if (unref(useLeaveStore).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><div class="p-2 bg-white rounded-lg shadow tw-card left-line" style="${ssrRenderStyle({ "background-color": "white" })}"><div class="flex justify-between"><ul class="bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link active" data-bs-toggle="tab" href="#leave_balance" aria-selected="true" role="tab"> Leave Balance</a></li>`);
      if (unref(service).current_user_role == 2 || unref(service).current_user_role == 4) {
        _push(`<li class="nav-item text-muted" role="presentation"><a class="pb-2 mx-4 nav-link" data-bs-toggle="tab" href="#team_leaveBalance" aria-selected="false" tabindex="-1" role="tab"> Team Leave Balance</a></li>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).current_user_role == 2) {
        _push(`<li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#org_leave" aria-selected="false" tabindex="-1" role="tab"> Org Leave Balance</a></li>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</ul><div class="flex items-center"><div class="mr-3"></div><a href="/attendance-leave-policydocument" id="" class="text-md font-medium border-1 border-black rounded-lg text-center bg-black text-white my-auto p-1.5 dark:text-white" role="button" aria-expanded="false"> Leave Policy Explanation </a></div></div></div><div class="tab-content py-2" id="pills-tabContent"><div class="tab-pane show fade active" id="leave_balance" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div><div class="tab-pane fade show" id="team_leaveBalance" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div><div class="tab-pane show" id="org_leave" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: apply.value,
        "onUpdate:visible": ($event) => apply.value = $event,
        style: { width: "80vw" },
        breakpoints: { "960px": "75vw", "641px": "100vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-4 modal-title fs-21"${_scopeId}> Leave Request</h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-4 modal-title fs-21" }, " Leave Request")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_leaveapply2, null, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_leaveapply2)
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/leave_module/LeaveModule.vue");
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
app.component("Checkbox", Checkbox);
app.component("Chips", Chips);
app.component("MultiSelect", MultiSelect);
app.component("Textarea", Textarea);
app.component("OverlayPanel", OverlayPanel);
app.component("Sidebar", Sidebar);
app.mount("#LeaveModule");
