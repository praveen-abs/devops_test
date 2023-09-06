/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, unref, withCtx, createVNode, openBlock, createBlock, createCommentVNode, toDisplayString, createTextVNode, Fragment, renderList, useSSRContext, createApp } from "vue";
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
import Calendar from "primevue/calendar";
import Sidebar from "primevue/sidebar";
import OverlayPanel from "primevue/overlaypanel";
import { defineStore, createPinia } from "pinia";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderList, ssrRenderAttr, ssrRenderClass } from "vue/server-renderer";
import dayjs from "dayjs";
import axios from "axios";
import { L as LoadingSpinner } from "./LoadingSpinner92532.js";
import "./_plugin-vue_export-helper92532.js";
const useManagePayslipStore = defineStore("managePayslipStore", () => {
  const array_employees_list = ref();
  const selectedPayRollDate = ref();
  const paySlipHTMLView = ref();
  const loading = ref(false);
  async function getAllEmployeesPayslipDetails(month, year) {
    loading.value = true;
    array_employees_list.value = "";
    await axios.post("payroll/getAllEmployeesPayslipDetails", {
      month,
      year,
      type: "pdf"
    }).then((response) => {
      array_employees_list.value = response.data.data;
    }).finally(() => {
      loading.value = false;
    });
  }
  async function getEmployeePayslipDetailsAsHTML(user_code, month, year) {
    loading.value = true;
    let url = `/viewPayslipdetails`;
    await axios.post(url, {
      user_code,
      month,
      year,
      type: "pdf"
    }).then((response) => {
      paySlipHTMLView.value = response.data;
    }).finally(() => {
      loading.value = false;
    });
  }
  async function getEmployeePayslipDetailsAsPDF(user_code, month, year) {
    loading.value = true;
    await axios.post("/payroll/paycheck/getEmployeePayslipDetailsAsPDF", {
      user_code,
      month,
      year
    }).then((response) => {
    }).finally(() => {
      loading.value = false;
    });
  }
  async function sendMail_employeePayslip(user_code, month, year) {
    console.log("sendMail_employeePayslip() : Sending mail to user : " + user_code);
    loading.value = true;
    axios.post("/generatePayslip", {
      user_code,
      month,
      year,
      type: "mail"
    }).then((response) => {
      console.log(" Response [sendMail_employeePayslip] : " + response.data);
    }).catch((data) => {
      console.log(data);
    }).finally(() => {
      loading.value = false;
    });
  }
  async function updatePayslipReleaseStatus(user_code, month, year, status) {
    console.log("updatePayslipReleaseStatus() : Updating releasepayslip status to user : " + user_code);
    let selectedDate = new Date(selectedPayRollDate.value);
    axios.post("/payroll/paycheck/updatePayslipReleaseStatus", {
      user_code,
      month,
      year,
      status
    }).then((response) => {
      console.log(" Response [updatePayslipReleaseStatus] : " + response.data.data);
    }).catch((response) => {
      console.log(response.data.data);
    }).finally(() => {
      getAllEmployeesPayslipDetails(selectedDate.getMonth() + 1, selectedDate.getFullYear());
    });
  }
  async function UpdateWithDrawStatus(user_code, month, year, status) {
    console.log("UpdateWithDrawStatus() : Updating withdraw :", user_code);
    let selectedDate = new Date(selectedPayRollDate.value);
    axios.post("/payroll/paycheck/updatePayslipReleaseStatus", {
      user_code,
      month,
      year,
      status
    }).then((response) => {
      console.log(" Response [updatePayslipReleaseStatus] : " + response.data.data);
    }).catch((response) => {
      console.log(response.data.data);
    }).finally(() => {
      getAllEmployeesPayslipDetails(selectedDate.getMonth() + 1, selectedDate.getFullYear());
    });
  }
  function downloadFileObject(base64String, employeeName, payslipyear, payslipMonth) {
    const linkSource = base64String;
    const downloadLink = document.createElement("a");
    const fileName = `${employeeName}-${payslipyear}-${payslipMonth}.pdf`;
    downloadLink.href = linkSource;
    downloadLink.download = fileName;
    downloadLink.click();
  }
  async function downloadPayslip(user_code, month, year, status) {
    console.log("Downloading payslip PDF.....");
    loading.value = true;
    await axios.post(
      "/generatePayslip",
      {
        user_code,
        month,
        year,
        type: "pdf"
      }
    ).then((response) => {
      console.log(" Response [downloadPayslipReleaseStatus] : " + JSON.stringify(response.data.data));
      if (response.data) {
        let base64String = response.data.payslip;
        let employeeName = response.data.emp_name;
        let payslipMonth = response.data.month;
        let payslipyear = response.data.year;
        console.log(base64String);
        if (base64String) {
          if (base64String.startsWith("JVB")) {
            base64String = "data:application/pdf;base64," + base64String;
            downloadFileObject(base64String, employeeName, payslipMonth, payslipyear);
          } else if (base64String.startsWith("data:application/pdf;base64")) {
            downloadFileObject(base64String);
          }
        }
      } else {
        console.log("Response Url Not Found");
      }
    }).finally(() => {
      loading.value = false;
    });
  }
  return {
    array_employees_list,
    paySlipHTMLView,
    selectedPayRollDate,
    loading,
    getAllEmployeesPayslipDetails,
    getEmployeePayslipDetailsAsHTML,
    sendMail_employeePayslip,
    updatePayslipReleaseStatus,
    downloadPayslip,
    UpdateWithDrawStatus,
    getEmployeePayslipDetailsAsPDF
  };
});
const ManagePayslips_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ManagePayslips",
  __ssrInlineRender: true,
  setup(__props) {
    const managePayslipStore = useManagePayslipStore();
    ref(false);
    const show_dialogconfirmation = ref(false);
    const show_releasePayslip_dialogconfirmation = ref(false);
    const show_downloadPayslip_dialogconfirmation = ref(false);
    const show_withdraw_dialogConfirmation = ref(false);
    ref();
    const op = ref();
    const toggle = (event) => {
      op.value.toggle(event);
    };
    const selectedUserCode = ref();
    const selectedUsername = ref();
    const viewpayslip = ref(false);
    ref();
    onMounted(() => {
      managePayslipStore.selectedPayRollDate = new Date();
      managePayslipStore.selectedPayRollDate = new Date();
      managePayslipStore.getAllEmployeesPayslipDetails(managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
    });
    async function showPaySlipHTMLView(selected_user_code) {
      console.log("Showing payslip html for (user_code, month): " + selected_user_code + " , " + parseInt(managePayslipStore.selectedPayRollDate.getMonth() + 1));
      await managePayslipStore.getEmployeePayslipDetailsAsHTML(selected_user_code, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
      viewpayslip.value = true;
      toggle();
    }
    function showConfirmationDialog(selected_user_code) {
      selectedUserCode.value = selected_user_code;
      show_dialogconfirmation.value = true;
    }
    function showReleasePayslipConfirmationDialog(selected_user_code) {
      selectedUserCode.value = selected_user_code;
      show_releasePayslip_dialogconfirmation.value = true;
      toggle();
    }
    function saveusercode(selected_user_code) {
      console.log("selected_user_code", selected_user_code);
      selectedUserCode.value = selected_user_code;
    }
    function showdownloadPayslipConfirmationDialog(selected_user_code) {
      show_downloadPayslip_dialogconfirmation.value = true;
    }
    async function sendMail(selectedUserCode2) {
      await managePayslipStore.sendMail_employeePayslip(selectedUserCode2, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
      show_dialogconfirmation.value = false;
    }
    async function updatePayslipReleaseStatus(selectedUserCode2) {
      await managePayslipStore.updatePayslipReleaseStatus(selectedUserCode2, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear(), 1);
      show_releasePayslip_dialogconfirmation.value = false;
    }
    async function showWithdraw_confimationDialog(selected_user_code) {
      selectedUserCode.value = selected_user_code;
      show_withdraw_dialogConfirmation.value = true;
    }
    async function UpdateWithDrawStatus(selectedUserCode2) {
      await managePayslipStore.UpdateWithDrawStatus(selectedUserCode2, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear(), 0);
      show_withdraw_dialogConfirmation.value = false;
    }
    async function downloadPayslip(selectedUserCode2) {
      show_downloadPayslip_dialogconfirmation.value = false;
      await managePayslipStore.downloadPayslip(selectedUserCode2, managePayslipStore.selectedPayRollDate.getMonth() + 1, managePayslipStore.selectedPayRollDate.getFullYear());
      toggle();
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_Sidebar = resolveComponent("Sidebar");
      _push(`<!--[-->`);
      if (unref(managePayslipStore).loading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="flex justify-between"><div><h6 class="mb-2 font-semibold text-lg">Manage Employee Payslips</h6></div><div class="d-flex justify-content-end"><label for="" class="my-2 text-lg font-semibold">Select Month</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        view: "month",
        dateFormat: "mm/yy",
        class: "mx-4",
        modelValue: unref(managePayslipStore).selectedPayRollDate,
        "onUpdate:modelValue": ($event) => unref(managePayslipStore).selectedPayRollDate = $event,
        style: { "border-radius": "7px", "height": "38px" },
        onDateSelect: ($event) => unref(managePayslipStore).getAllEmployeesPayslipDetails(unref(managePayslipStore).selectedPayRollDate.getMonth() + 1, unref(managePayslipStore).selectedPayRollDate.getFullYear())
      }, null, _parent));
      _push(`</div></div><div class="my-4">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(managePayslipStore).array_employees_list,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll",
        filters: _ctx.filters,
        "onUpdate:filters": ($event) => _ctx.filters = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"]
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, { headerStyle: "width: 3rem" }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "user_code",
              header: "Employee Code",
              headerStyle: "width: 3rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "name",
              header: "Employee Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "email",
              header: "Personal Mail"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_payslip_released",
              header: "Payslip Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="d-flex flex-column"${_scopeId2}>`);
                  if (slotProps.data.is_payslip_released == 1) {
                    _push3(`<button class="btn z-0 border-[1px solid ] border-black"${_scopeId2}>withdraw</button>`);
                  } else {
                    _push3(`<button class="bg-[#000] text-[white] rounded z-0" style="${ssrRenderStyle({ "padding": "4px 0 !important", "margin-top": "10px" })}"${_scopeId2}>Release payslip</button>`);
                  }
                  if (slotProps.data.is_payslip_released == 1) {
                    _push3(`<h1 class="text-success mt-2"${_scopeId2}> Released </h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.is_payslip_released == 0 || slotProps.data.is_payslip_released == null) {
                    _push3(`<h1 class="text-danger mt-2"${_scopeId2}> Not Released </h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", { class: "d-flex flex-column" }, [
                      slotProps.data.is_payslip_released == 1 ? (openBlock(), createBlock("button", {
                        key: 0,
                        class: "btn z-0 border-[1px solid ] border-black",
                        onClick: ($event) => showWithdraw_confimationDialog(slotProps.data.user_code)
                      }, "withdraw", 8, ["onClick"])) : (openBlock(), createBlock("button", {
                        key: 1,
                        class: "bg-[#000] text-[white] rounded z-0",
                        style: { "padding": "4px 0 !important", "margin-top": "10px" },
                        onClick: ($event) => showReleasePayslipConfirmationDialog(slotProps.data.user_code)
                      }, "Release payslip", 8, ["onClick"])),
                      slotProps.data.is_payslip_released == 1 ? (openBlock(), createBlock("h1", {
                        key: 2,
                        class: "text-success mt-2"
                      }, " Released ")) : createCommentVNode("", true),
                      slotProps.data.is_payslip_released == 0 || slotProps.data.is_payslip_released == null ? (openBlock(), createBlock("h1", {
                        key: 3,
                        class: "text-danger mt-2"
                      }, " Not Released ")) : createCommentVNode("", true)
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_payslip_mail_sent",
              header: "Mail Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.is_payslip_mail_sent == 1) {
                    _push3(`<div${_scopeId2}><h1${_scopeId2}> Payslip sent</h1></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><button class="bg-[#f9be00] text-white rounded p-2 z-0"${_scopeId2}>Send Payslip</button></div>`);
                  }
                } else {
                  return [
                    slotProps.data.is_payslip_mail_sent == 1 ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("h1", null, " Payslip sent")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("button", {
                        class: "bg-[#f9be00] text-white rounded p-2 z-0",
                        onClick: ($event) => showConfirmationDialog(slotProps.data.user_code)
                      }, "Send Payslip", 8, ["onClick"])
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { header: "Action" }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="" type="button"${_scopeId2}><i class="pi pi-ellipsis-v"${_scopeId2}></i></button>`);
                  _push3(ssrRenderComponent(_component_OverlayPanel, {
                    ref_key: "op",
                    ref: op,
                    style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                    class: "p-0 m-0 !z-0"
                  }, {
                    default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div class="d-flex flex-column p-0 m-0"${_scopeId3}><button class="fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2"${_scopeId3}>Download</button><button class="fw-semibold text-black hover:bg-gray-200 p-2"${_scopeId3}>View</button></div>`);
                      } else {
                        return [
                          createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                              onClick: ($event) => showdownloadPayslipConfirmationDialog(slotProps.data.user_code)
                            }, "Download", 8, ["onClick"]),
                            createVNode("button", {
                              class: "fw-semibold text-black hover:bg-gray-200 p-2",
                              onClick: ($event) => showPaySlipHTMLView(slotProps.data.user_code)
                            }, "View", 8, ["onClick"])
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
                      createVNode("i", {
                        class: "pi pi-ellipsis-v",
                        onClick: ($event) => saveusercode(slotProps.data.user_code)
                      }, null, 8, ["onClick"])
                    ]),
                    createVNode(_component_OverlayPanel, {
                      ref_key: "op",
                      ref: op,
                      style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                      class: "p-0 m-0 !z-0"
                    }, {
                      default: withCtx(() => [
                        createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                            onClick: ($event) => showdownloadPayslipConfirmationDialog(slotProps.data.user_code)
                          }, "Download", 8, ["onClick"]),
                          createVNode("button", {
                            class: "fw-semibold text-black hover:bg-gray-200 p-2",
                            onClick: ($event) => showPaySlipHTMLView(slotProps.data.user_code)
                          }, "View", 8, ["onClick"])
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
              createVNode(_component_Column, { headerStyle: "width: 3rem" }),
              createVNode(_component_Column, {
                field: "user_code",
                header: "Employee Code",
                headerStyle: "width: 3rem"
              }),
              createVNode(_component_Column, {
                field: "name",
                header: "Employee Name"
              }),
              createVNode(_component_Column, {
                field: "email",
                header: "Personal Mail"
              }),
              createVNode(_component_Column, {
                field: "is_payslip_released",
                header: "Payslip Status"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "d-flex flex-column" }, [
                    slotProps.data.is_payslip_released == 1 ? (openBlock(), createBlock("button", {
                      key: 0,
                      class: "btn z-0 border-[1px solid ] border-black",
                      onClick: ($event) => showWithdraw_confimationDialog(slotProps.data.user_code)
                    }, "withdraw", 8, ["onClick"])) : (openBlock(), createBlock("button", {
                      key: 1,
                      class: "bg-[#000] text-[white] rounded z-0",
                      style: { "padding": "4px 0 !important", "margin-top": "10px" },
                      onClick: ($event) => showReleasePayslipConfirmationDialog(slotProps.data.user_code)
                    }, "Release payslip", 8, ["onClick"])),
                    slotProps.data.is_payslip_released == 1 ? (openBlock(), createBlock("h1", {
                      key: 2,
                      class: "text-success mt-2"
                    }, " Released ")) : createCommentVNode("", true),
                    slotProps.data.is_payslip_released == 0 || slotProps.data.is_payslip_released == null ? (openBlock(), createBlock("h1", {
                      key: 3,
                      class: "text-danger mt-2"
                    }, " Not Released ")) : createCommentVNode("", true)
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "is_payslip_mail_sent",
                header: "Mail Status"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.is_payslip_mail_sent == 1 ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("h1", null, " Payslip sent")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("button", {
                      class: "bg-[#f9be00] text-white rounded p-2 z-0",
                      onClick: ($event) => showConfirmationDialog(slotProps.data.user_code)
                    }, "Send Payslip", 8, ["onClick"])
                  ]))
                ]),
                _: 1
              }),
              createVNode(_component_Column, { header: "Action" }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    class: "",
                    type: "button",
                    onClick: toggle
                  }, [
                    createVNode("i", {
                      class: "pi pi-ellipsis-v",
                      onClick: ($event) => saveusercode(slotProps.data.user_code)
                    }, null, 8, ["onClick"])
                  ]),
                  createVNode(_component_OverlayPanel, {
                    ref_key: "op",
                    ref: op,
                    style: { "width": "160px", "margin-top": "12px !important", "margin-right": "20px !important" },
                    class: "p-0 m-0 !z-0"
                  }, {
                    default: withCtx(() => [
                      createVNode("div", { class: "d-flex flex-column p-0 m-0" }, [
                        createVNode("button", {
                          class: "fw-semibold text-black hover:bg-gray-200 border-bottom-1 p-2",
                          onClick: ($event) => showdownloadPayslipConfirmationDialog(slotProps.data.user_code)
                        }, "Download", 8, ["onClick"]),
                        createVNode("button", {
                          class: "fw-semibold text-black hover:bg-gray-200 p-2",
                          onClick: ($event) => showPaySlipHTMLView(slotProps.data.user_code)
                        }, "View", 8, ["onClick"])
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
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: show_dialogconfirmation.value,
        "onUpdate:visible": ($event) => show_dialogconfirmation.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to send Mail ?</span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "btn-primary mr-3 py-2",
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => sendMail(selectedUserCode.value),
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => show_dialogconfirmation.value = false,
              class: "p-button-text py-2",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to send Mail ?")
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "btn-primary mr-3 py-2",
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => sendMail(selectedUserCode.value),
                  autofocus: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "No",
                  icon: "pi pi-times",
                  onClick: ($event) => show_dialogconfirmation.value = false,
                  class: "p-button-text py-2",
                  autofocus: ""
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: show_withdraw_dialogConfirmation.value,
        "onUpdate:visible": ($event) => show_withdraw_dialogConfirmation.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to send Mail ?</span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "btn-primary mr-3 py-2",
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => UpdateWithDrawStatus(selectedUserCode.value),
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => show_withdraw_dialogConfirmation.value = false,
              class: "p-button-text py-2",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to send Mail ?")
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "btn-primary mr-3 py-2",
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => UpdateWithDrawStatus(selectedUserCode.value),
                  autofocus: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "No",
                  icon: "pi pi-times",
                  onClick: ($event) => show_withdraw_dialogConfirmation.value = false,
                  class: "p-button-text py-2",
                  autofocus: ""
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: show_releasePayslip_dialogconfirmation.value,
        "onUpdate:visible": ($event) => show_releasePayslip_dialogconfirmation.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to release payslip? ${ssrInterpolate(unref(managePayslipStore).name)}</span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "btn-primary py-2 mr-3",
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => updatePayslipReleaseStatus(selectedUserCode.value),
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => show_releasePayslip_dialogconfirmation.value = false,
              class: "p-button-text py-2",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to release payslip? " + toDisplayString(unref(managePayslipStore).name), 1)
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "btn-primary py-2 mr-3",
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => updatePayslipReleaseStatus(selectedUserCode.value),
                  autofocus: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "No",
                  icon: "pi pi-times",
                  onClick: ($event) => show_releasePayslip_dialogconfirmation.value = false,
                  class: "p-button-text py-2",
                  autofocus: ""
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Confirmation",
        visible: show_downloadPayslip_dialogconfirmation.value,
        "onUpdate:visible": ($event) => show_downloadPayslip_dialogconfirmation.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to download payslip? ${ssrInterpolate(unref(managePayslipStore).name)}</span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "py-2 mr-3 btn-primary",
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => downloadPayslip(selectedUserCode.value, selectedUsername.value),
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => show_downloadPayslip_dialogconfirmation.value = false,
              class: "p-button-text py-2",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to download payslip? " + toDisplayString(unref(managePayslipStore).name), 1)
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "py-2 mr-3 btn-primary",
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => downloadPayslip(selectedUserCode.value, selectedUsername.value),
                  autofocus: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "No",
                  icon: "pi pi-times",
                  onClick: ($event) => show_downloadPayslip_dialogconfirmation.value = false,
                  class: "p-button-text py-2",
                  autofocus: ""
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Sidebar, {
        position: "right",
        visible: viewpayslip.value,
        "onUpdate:visible": ($event) => viewpayslip.value = $event,
        modal: "",
        header: "Payslip",
        style: { width: "58vw" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex justify-center w-[100%] my-3 rounded-lg"${_scopeId}><div class="w-[95%] h-[90%] shadow-lg p-4"${_scopeId}><div class="w-[100%] flex justify-between"${_scopeId}><div class="flex flex-col"${_scopeId}><h1 class="text-[25px]"${_scopeId}>PAYSLIP <span class="text-gray-500 text-[25px]"${_scopeId}>MAR 2023</span></h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.client_details, (item) => {
              _push2(`<h2 class="text-[16px] mt-[10px] text-[#000]"${_scopeId}>${ssrInterpolate(item.client_fullname)}</h2>`);
            });
            _push2(`<!--]--><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.client_details, (item) => {
              _push2(`<p class="w-[300px] mt-[10px]"${_scopeId}>${ssrInterpolate(item.address)}</p>`);
            });
            _push2(`<!--]--></div><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.client_details, (item) => {
              _push2(`<div${_scopeId}><img${ssrRenderAttr("src", `${item.client_logo}`)} alt="testing" class="w-[200px]"${_scopeId}></div>`);
            });
            _push2(`<!--]--></div><div class="mt-[30px]"${_scopeId}><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<h1 class="font-semibold text-[16px] my-[16px]"${_scopeId}> Employee Name : ${ssrInterpolate(item.name)}</h1>`);
            });
            _push2(`<!--]--><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<div class="mx-2 row border-b-[1px] border-[gray] py-2"${_scopeId}><div class="col-3"${_scopeId}><p class=""${_scopeId}>Employee Code</p><p class="text-[#000] text-[12px]"${_scopeId}>${ssrInterpolate(item.user_code ? item.user_code : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Date Joining</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.doj ? unref(dayjs)(item.doj).format("DD-MMM-YYYY") : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Department</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.department_name ? item.department_name : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Designation</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.designation ? item.designation : "-")}</p></div></div>`);
            });
            _push2(`<!--]--><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<div class="mx-2 row border-b-[1px] border-[gray] py-2"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>Payment Mode</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_account_number ? "Bank" : "cheque")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Bank Name</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_name ? item.bank_name : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Bank Account</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_account_number ? item.bank_account_number : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Bank ISFC</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_ifsc_code ? item.bank_ifsc_code : "-")}</p></div></div>`);
            });
            _push2(`<!--]--><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<div class="py-2 mx-2 row"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>PAN</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.pan_number ? item.pan_number : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>ESIC</p><p class="text-[#000]"${_scopeId}>Date Joined</p></div><div class="col-3"${_scopeId}><p${_scopeId}>UAN</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.uan_number ? item.uan_number : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>EPF Number</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.epf_number ? item.epf_number : "-")}</p></div></div>`);
            });
            _push2(`<!--]--><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div></div><div class=""${_scopeId}><h1 class="font-semibold text-[16px] my-[16px]"${_scopeId}>LEAVE DETAILS</h1><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div><div class="py-2 mx-2 row"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>Leave Type</p><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.leave_type ? item.leave_type : "-")}</p>`);
            });
            _push2(`<!--]--></div><div class="col-3"${_scopeId}><p${_scopeId}>Opening Balance</p><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.opening_balance ? item.opening_balance : "-")}</p>`);
            });
            _push2(`<!--]--></div><div class="col-3"${_scopeId}><p${_scopeId}>Availed</p><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.avalied ? item.avalied : "-")}</p>`);
            });
            _push2(`<!--]--></div><div class="col-3"${_scopeId}><p${_scopeId}>Closing Balance</p><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.closing_balance ? item.closing_balance : "-")}</p>`);
            });
            _push2(`<!--]--></div></div></div><div class=""${_scopeId}><h1 class="font-semibold text-[16px] my-[16px]"${_scopeId}>SALARY DETAILS</h1><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.salary_details, (item) => {
              _push2(`<div class="py-2 mx-2 row"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>ACTUAL PAYABLE DAYS</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.month_days ? item.month_days : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>TOTAL WORKING DAYS</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.worked_Days ? item.worked_Days : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>LOSS OF PAY DAYS</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.lop ? item.lop : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>ARREAR DAYS PAYABLE</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.arrears_Days ? item.arrears_Days : "-")}</p></div></div>`);
            });
            _push2(`<!--]--></div><div class="row mt-2 py-2 border-y-[1px] border-[gray] mx-2"${_scopeId}><div class="col-7 border-r-[1.4px] border-[gray]"${_scopeId}><table class="w-[100%]"${_scopeId}><tr class="w-[100%]"${_scopeId}><td${_scopeId}><h1 class="font-semibold"${_scopeId}>Earnings</h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
              _push2(`<h1 class="${ssrRenderClass([[key == "Total Earnings" ? "text-black text-[16px]" : "text-black"], "my-3"])}"${_scopeId}>${ssrInterpolate(key)}</h1>`);
            });
            _push2(`<!--]--></td><td class="flex flex-col items-start pt-[2px]"${_scopeId}><h1 class="font-semibold"${_scopeId}>Fixed</h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.compensatory_data[0], (value, key, index) => {
              _push2(`<h1 class="mt-[12px] text-black"${_scopeId}>${ssrInterpolate(value)}</h1>`);
            });
            _push2(`<!--]--></td>`);
            if (unref(managePayslipStore).paySlipHTMLView.data.arrears[0] != "") {
              _push2(`<td class="flex flex-col items-start pt-[2px]"${_scopeId}><h1 class="font-semibold"${_scopeId}>Arrears</h1><!--[-->`);
              ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.arrears[0], (value, key, index) => {
                _push2(`<h1 class="mt-[12px]"${_scopeId}>${ssrInterpolate(value)}</h1>`);
              });
              _push2(`<!--]--></td>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(managePayslipStore).paySlipHTMLView.data.earnings[0]) {
              _push2(`<td${_scopeId}><h1 class="font-semibold"${_scopeId}>Earned</h1><!--[-->`);
              ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
                _push2(`<h1 class="${ssrRenderClass([[key == "Total Earnings" ? "text-black text-[16px]" : ""], "my-3"])}"${_scopeId}>${ssrInterpolate(value)}</h1>`);
              });
              _push2(`<!--]--></td>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</tr></table></div><div class="col"${_scopeId}><table border="2" class="w-[100%]"${_scopeId}><tr class="w-[100%]"${_scopeId}><td${_scopeId}><h1 class="font-semibold"${_scopeId}>CONTRIBUTIONS</h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
              _push2(`<p class="my-2 text-[#000]"${_scopeId}>${ssrInterpolate(key)}</p>`);
            });
            _push2(`<!--]--></td><td${_scopeId}><h1 class="font-semibold"${_scopeId}> </h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
              _push2(`<p class="my-2 text-[#000]"${_scopeId}>${ssrInterpolate(value)}</p>`);
            });
            _push2(`<!--]--></td></tr><tr class="w-[100%]"${_scopeId}><td${_scopeId}><h1 class="font-semibold"${_scopeId}>Tax Duductions</h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
              _push2(`<p class="${ssrRenderClass([[key == "Total Deduction" ? "text-[18px] " : " text-black"], "my-2 text-[#000]"])}"${_scopeId}>${ssrInterpolate(key)}</p>`);
            });
            _push2(`<!--]--></td><td${_scopeId}><h1 class="font-semibold"${_scopeId}> </h1><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
              _push2(`<p class="${ssrRenderClass([[key == "Total Deduction" ? "text-[18px] " : " text-black"], "my-2 text-[#000]"])}"${_scopeId}>${ssrInterpolate(value)}</p>`);
            });
            _push2(`<!--]--></td></tr></table></div></div><!--[-->`);
            ssrRenderList(unref(managePayslipStore).paySlipHTMLView.data.over_all[0], (value, key, index) => {
              _push2(`<div class="my-2 row w-[100%]"${_scopeId}><div class="my-2 col-5"${_scopeId}><p class=""${_scopeId}>${ssrInterpolate(key)}</p></div><div class="my-2 col-7"${_scopeId}><p class="text-[16px]"${_scopeId}>`);
              if (key == "Net Salary Payable") {
                _push2(`<span class="text-[16px]" style="${ssrRenderStyle({ "font-family": "sans-serif !important" })}"${_scopeId}>₹ </span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(` ${ssrInterpolate(value)}</p></div></div>`);
            });
            _push2(`<!--]--><div${_scopeId}><p class="mt-2"${_scopeId}>*** Note:All amounts displayed in this payslips are in INR</p><p class="mt-[50px]"${_scopeId}>**This is computer generated statement,does not require signature.</p></div><div class=""${_scopeId}><div class="flex items-center float-right"${_scopeId}><p class="mx-2"${_scopeId}>Powered by </p><img${ssrRenderAttr("src", `${unref(managePayslipStore).paySlipHTMLView.data.date_month.abs_logo}`)} alt="" class="w-[140px] h-[50px]"${_scopeId}></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "flex justify-center w-[100%] my-3 rounded-lg" }, [
                createVNode("div", { class: "w-[95%] h-[90%] shadow-lg p-4" }, [
                  createVNode("div", { class: "w-[100%] flex justify-between" }, [
                    createVNode("div", { class: "flex flex-col" }, [
                      createVNode("h1", { class: "text-[25px]" }, [
                        createTextVNode("PAYSLIP "),
                        createVNode("span", { class: "text-gray-500 text-[25px]" }, "MAR 2023")
                      ]),
                      (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.client_details, (item) => {
                        return openBlock(), createBlock("h2", {
                          class: "text-[16px] mt-[10px] text-[#000]",
                          key: item
                        }, toDisplayString(item.client_fullname), 1);
                      }), 128)),
                      (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.client_details, (item) => {
                        return openBlock(), createBlock("p", {
                          class: "w-[300px] mt-[10px]",
                          key: item
                        }, toDisplayString(item.address), 1);
                      }), 128))
                    ]),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.client_details, (item) => {
                      return openBlock(), createBlock("div", { key: item }, [
                        createVNode("img", {
                          src: `${item.client_logo}`,
                          alt: "testing",
                          class: "w-[200px]"
                        }, null, 8, ["src"])
                      ]);
                    }), 128))
                  ]),
                  createVNode("div", { class: "mt-[30px]" }, [
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
                      return openBlock(), createBlock("h1", {
                        class: "font-semibold text-[16px] my-[16px]",
                        key: item
                      }, " Employee Name : " + toDisplayString(item.name), 1);
                    }), 128)),
                    createVNode("div", { class: "border-[1.5px] border-[#000] my-[12px]" }),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
                      return openBlock(), createBlock("div", {
                        class: "mx-2 row border-b-[1px] border-[gray] py-2",
                        key: item
                      }, [
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", { class: "" }, "Employee Code"),
                          createVNode("p", { class: "text-[#000] text-[12px]" }, toDisplayString(item.user_code ? item.user_code : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Date Joining"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.doj ? unref(dayjs)(item.doj).format("DD-MMM-YYYY") : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Department"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.department_name ? item.department_name : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Designation"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.designation ? item.designation : "-"), 1)
                        ])
                      ]);
                    }), 128)),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
                      return openBlock(), createBlock("div", {
                        class: "mx-2 row border-b-[1px] border-[gray] py-2",
                        key: item
                      }, [
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Payment Mode"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.bank_account_number ? "Bank" : "cheque"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Bank Name"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.bank_name ? item.bank_name : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Bank Account"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.bank_account_number ? item.bank_account_number : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "Bank ISFC"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.bank_ifsc_code ? item.bank_ifsc_code : "-"), 1)
                        ])
                      ]);
                    }), 128)),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
                      return openBlock(), createBlock("div", {
                        class: "py-2 mx-2 row",
                        key: item
                      }, [
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "PAN"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.pan_number ? item.pan_number : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "ESIC"),
                          createVNode("p", { class: "text-[#000]" }, "Date Joined")
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "UAN"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.uan_number ? item.uan_number : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "EPF Number"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.epf_number ? item.epf_number : "-"), 1)
                        ])
                      ]);
                    }), 128)),
                    createVNode("div", { class: "border-[1.5px] border-[#000] my-[12px]" })
                  ]),
                  createVNode("div", { class: "" }, [
                    createVNode("h1", { class: "font-semibold text-[16px] my-[16px]" }, "LEAVE DETAILS"),
                    createVNode("div", { class: "border-[1.5px] border-[#000] my-[12px]" }),
                    createVNode("div", { class: "py-2 mx-2 row" }, [
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Leave Type"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.leave_type ? item.leave_type : "-"), 1);
                        }), 128))
                      ]),
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Opening Balance"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.opening_balance ? item.opening_balance : "-"), 1);
                        }), 128))
                      ]),
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Availed"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.avalied ? item.avalied : "-"), 1);
                        }), 128))
                      ]),
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Closing Balance"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.closing_balance ? item.closing_balance : "-"), 1);
                        }), 128))
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "" }, [
                    createVNode("h1", { class: "font-semibold text-[16px] my-[16px]" }, "SALARY DETAILS"),
                    createVNode("div", { class: "border-[1.5px] border-[#000] my-[12px]" }),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.salary_details, (item) => {
                      return openBlock(), createBlock("div", {
                        class: "py-2 mx-2 row",
                        key: item
                      }, [
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "ACTUAL PAYABLE DAYS"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.month_days ? item.month_days : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "TOTAL WORKING DAYS"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.worked_Days ? item.worked_Days : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "LOSS OF PAY DAYS"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.lop ? item.lop : "-"), 1)
                        ]),
                        createVNode("div", { class: "col-3" }, [
                          createVNode("p", null, "ARREAR DAYS PAYABLE"),
                          createVNode("p", { class: "text-[#000]" }, toDisplayString(item.arrears_Days ? item.arrears_Days : "-"), 1)
                        ])
                      ]);
                    }), 128))
                  ]),
                  createVNode("div", { class: "row mt-2 py-2 border-y-[1px] border-[gray] mx-2" }, [
                    createVNode("div", { class: "col-7 border-r-[1.4px] border-[gray]" }, [
                      createVNode("table", { class: "w-[100%]" }, [
                        createVNode("tr", { class: "w-[100%]" }, [
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, "Earnings"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
                              return openBlock(), createBlock("h1", {
                                class: ["my-3", [key == "Total Earnings" ? "text-black text-[16px]" : "text-black"]],
                                key: index
                              }, toDisplayString(key), 3);
                            }), 128))
                          ]),
                          createVNode("td", { class: "flex flex-col items-start pt-[2px]" }, [
                            createVNode("h1", { class: "font-semibold" }, "Fixed"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.compensatory_data[0], (value, key, index) => {
                              return openBlock(), createBlock("h1", {
                                key: index,
                                class: "mt-[12px] text-black"
                              }, toDisplayString(value), 1);
                            }), 128))
                          ]),
                          unref(managePayslipStore).paySlipHTMLView.data.arrears[0] != "" ? (openBlock(), createBlock("td", {
                            key: 0,
                            class: "flex flex-col items-start pt-[2px]"
                          }, [
                            createVNode("h1", { class: "font-semibold" }, "Arrears"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.arrears[0], (value, key, index) => {
                              return openBlock(), createBlock("h1", {
                                key: index,
                                class: "mt-[12px]"
                              }, toDisplayString(value), 1);
                            }), 128))
                          ])) : createCommentVNode("", true),
                          unref(managePayslipStore).paySlipHTMLView.data.earnings[0] ? (openBlock(), createBlock("td", { key: 1 }, [
                            createVNode("h1", { class: "font-semibold" }, "Earned"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
                              return openBlock(), createBlock("h1", {
                                key: index,
                                class: ["my-3", [key == "Total Earnings" ? "text-black text-[16px]" : ""]]
                              }, toDisplayString(value), 3);
                            }), 128))
                          ])) : createCommentVNode("", true)
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "col" }, [
                      createVNode("table", {
                        border: "2",
                        class: "w-[100%]"
                      }, [
                        createVNode("tr", { class: "w-[100%]" }, [
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, "CONTRIBUTIONS"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: "my-2 text-[#000]",
                                key: index
                              }, toDisplayString(key), 1);
                            }), 128))
                          ]),
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, " "),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: "my-2 text-[#000]",
                                key: index
                              }, toDisplayString(value), 1);
                            }), 128))
                          ])
                        ]),
                        createVNode("tr", { class: "w-[100%]" }, [
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, "Tax Duductions"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: ["my-2 text-[#000]", [key == "Total Deduction" ? "text-[18px] " : " text-black"]],
                                key: index
                              }, toDisplayString(key), 3);
                            }), 128))
                          ]),
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, " "),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: ["my-2 text-[#000]", [key == "Total Deduction" ? "text-[18px] " : " text-black"]],
                                key: index
                              }, toDisplayString(value), 3);
                            }), 128))
                          ])
                        ])
                      ])
                    ])
                  ]),
                  (openBlock(true), createBlock(Fragment, null, renderList(unref(managePayslipStore).paySlipHTMLView.data.over_all[0], (value, key, index) => {
                    return openBlock(), createBlock("div", {
                      class: "my-2 row w-[100%]",
                      key: index
                    }, [
                      createVNode("div", { class: "my-2 col-5" }, [
                        createVNode("p", { class: "" }, toDisplayString(key), 1)
                      ]),
                      createVNode("div", { class: "my-2 col-7" }, [
                        createVNode("p", { class: "text-[16px]" }, [
                          key == "Net Salary Payable" ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "text-[16px]",
                            style: { "font-family": "sans-serif !important" }
                          }, "₹ ")) : createCommentVNode("", true),
                          createTextVNode(" " + toDisplayString(value), 1)
                        ])
                      ])
                    ]);
                  }), 128)),
                  createVNode("div", null, [
                    createVNode("p", { class: "mt-2" }, "*** Note:All amounts displayed in this payslips are in INR"),
                    createVNode("p", { class: "mt-[50px]" }, "**This is computer generated statement,does not require signature.")
                  ]),
                  createVNode("div", { class: "" }, [
                    createVNode("div", { class: "flex items-center float-right" }, [
                      createVNode("p", { class: "mx-2" }, "Powered by "),
                      createVNode("img", {
                        src: `${unref(managePayslipStore).paySlipHTMLView.data.date_month.abs_logo}`,
                        alt: "",
                        class: "w-[140px] h-[50px]"
                      }, null, 8, ["src"])
                    ])
                  ])
                ])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/manage_payslips/ManagePayslips.vue");
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
app.component("Sidebar", Sidebar);
app.component("Calendar", Calendar);
app.component("OverlayPanel", OverlayPanel);
app.mount("#vjs_manage_payslips");
