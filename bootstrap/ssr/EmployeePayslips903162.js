import { ref, onMounted, resolveComponent, unref, withCtx, createTextVNode, toDisplayString, createVNode, openBlock, createBlock, Fragment, renderList, createCommentVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrInterpolate, ssrRenderList, ssrRenderAttr, ssrRenderClass, ssrRenderStyle } from "vue/server-renderer";
import dayjs from "dayjs";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { defineStore } from "pinia";
import { U as UseEmployeeDocumentManagerService } from "./EmployeeDocumentsManagerService90316.js";
import "./LoadingSpinner90316.js";
const useEmployeePayslipStore = defineStore("employeePayslipStore", () => {
  const documentService = UseEmployeeDocumentManagerService();
  const array_employeePayslips_list = ref();
  const paySlipHTMLView = ref();
  const canShowPayslipView = ref(false);
  const urlParams = new URLSearchParams(window.location.search);
  const loading = ref(false);
  function getURLParams_UID() {
    if (urlParams.has("uid"))
      return urlParams.get("uid");
    else
      return "";
  }
  async function getEmployeeAllPayslipList() {
    loading.value = true;
    axios.post("/payroll/paycheck/getEmployeeAllPayslipList", {
      uid: getURLParams_UID()
    }).then((response) => {
      array_employeePayslips_list.value = response.data.data;
    }).finally(() => {
      loading.value = false;
    });
  }
  async function getEmployeePayslipDetailsAsHTML(user_code, payroll_month) {
    loading.value = true;
    let month = parseInt(dayjs(payroll_month).month()) + 1;
    let year = dayjs(payroll_month).year();
    await axios.post("/empViewPayslipdetails", {
      uid: getURLParams_UID(),
      user_code,
      month,
      year
    }).then((response) => {
      paySlipHTMLView.value = response.data;
      canShowPayslipView.value = true;
    }).finally(() => {
      loading.value = false;
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
  async function getEmployeePayslipDetailsAsPDF(user_code, payroll_month) {
    loading.value = true;
    documentService.loading = true;
    console.log("Downloading payslip PDF.....");
    let month = parseInt(dayjs(payroll_month).month()) + 1;
    let year = dayjs(payroll_month).year();
    await axios.post(
      "/empGeneratePayslipPdfMail",
      {
        uid: getURLParams_UID(),
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
      documentService.loading = false;
      loading.value = false;
    });
  }
  return {
    array_employeePayslips_list,
    paySlipHTMLView,
    canShowPayslipView,
    loading,
    getEmployeeAllPayslipList,
    getEmployeePayslipDetailsAsHTML,
    getEmployeePayslipDetailsAsPDF
  };
});
const EmployeePayslips_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "EmployeePayslips",
  __ssrInlineRender: true,
  setup(__props) {
    const employeePayslipStore = useEmployeePayslipStore();
    ref(true);
    ref();
    onMounted(async () => {
      console.log("EmployeePayslips,vue loaded");
      await employeePayslipStore.getEmployeeAllPayslipList();
    });
    const filters = ref({
      PAYROLL_MONTH: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      }
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_LoadingSpinner = resolveComponent("LoadingSpinner");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Sidebar = resolveComponent("Sidebar");
      _push(`<!--[-->`);
      if (unref(employeePayslipStore).loading) {
        _push(ssrRenderComponent(_component_LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><h2 class="font-semibold text-lg my-2">Salary Details</h2>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(employeePayslipStore).array_employeePayslips_list,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        sortField: "PAYROLL_MONTH",
        sortOrder: -1,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name"]
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "PAYROLL_MONTH",
              header: "Month",
              sortable: true
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(dayjs)(slotProps.data.PAYROLL_MONTH).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.PAYROLL_MONTH).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "TOTAL_EARNED_GROSS",
              header: "Gross Pay"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Reimbursements",
              header: "Reimbursements"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(0)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(0))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "TOTAL_DEDUCTIONS",
              header: "Deductions"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "NET_TAKE_HOME",
              header: "Take Home"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { header: "Action" }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="bg-black text-white rounded-md p-2 mx-2"${_scopeId2}>Download</button><button class="border-[2px] border-[#000] py-2 px-3 rounded-md"${_scopeId2}>View</button>`);
                } else {
                  return [
                    createVNode("button", {
                      class: "bg-black text-white rounded-md p-2 mx-2",
                      onClick: ($event) => unref(employeePayslipStore).getEmployeePayslipDetailsAsPDF("", slotProps.data.PAYROLL_MONTH)
                    }, "Download", 8, ["onClick"]),
                    createVNode("button", {
                      class: "border-[2px] border-[#000] py-2 px-3 rounded-md",
                      onClick: ($event) => unref(employeePayslipStore).getEmployeePayslipDetailsAsHTML("", slotProps.data.PAYROLL_MONTH)
                    }, "View", 8, ["onClick"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "PAYROLL_MONTH",
                header: "Month",
                sortable: true
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.PAYROLL_MONTH).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "TOTAL_EARNED_GROSS",
                header: "Gross Pay"
              }),
              createVNode(_component_Column, {
                field: "Reimbursements",
                header: "Reimbursements"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(0))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "TOTAL_DEDUCTIONS",
                header: "Deductions"
              }),
              createVNode(_component_Column, {
                field: "NET_TAKE_HOME",
                header: "Take Home"
              }),
              createVNode(_component_Column, { header: "Action" }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    class: "bg-black text-white rounded-md p-2 mx-2",
                    onClick: ($event) => unref(employeePayslipStore).getEmployeePayslipDetailsAsPDF("", slotProps.data.PAYROLL_MONTH)
                  }, "Download", 8, ["onClick"]),
                  createVNode("button", {
                    class: "border-[2px] border-[#000] py-2 px-3 rounded-md",
                    onClick: ($event) => unref(employeePayslipStore).getEmployeePayslipDetailsAsHTML("", slotProps.data.PAYROLL_MONTH)
                  }, "View", 8, ["onClick"])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Sidebar, {
        position: "right",
        visible: unref(employeePayslipStore).canShowPayslipView,
        "onUpdate:visible": ($event) => unref(employeePayslipStore).canShowPayslipView = $event,
        modal: "",
        header: "Payslip",
        style: { width: "58vw" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex justify-center w-[100%] my-3 rounded-lg"${_scopeId}><div class="w-[95%] h-[90%] shadow-lg p-4"${_scopeId}><div class="w-[100%] flex justify-between"${_scopeId}><div class="flex flex-col"${_scopeId}><h1 class="text-[25px]"${_scopeId}>PAYSLIP <span class="text-gray-500 text-[25px]"${_scopeId}>MAR 2023</span></h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.client_details, (item) => {
              _push2(`<h2 class="text-[16px] mt-[10px] text-[#000]"${_scopeId}>${ssrInterpolate(item.client_fullname)}</h2>`);
            });
            _push2(`<!--]--><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.client_details, (item) => {
              _push2(`<p class="w-[300px] mt-[10px]"${_scopeId}>${ssrInterpolate(item.address)}</p>`);
            });
            _push2(`<!--]--></div><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.client_details, (item) => {
              _push2(`<div${_scopeId}><img${ssrRenderAttr("src", `${item.client_logo}`)} alt="testing" class="w-[200px]"${_scopeId}></div>`);
            });
            _push2(`<!--]--></div><div class="mt-[30px]"${_scopeId}><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<h1 class="font-semibold text-[16px] my-[16px]"${_scopeId}> Employee Name : ${ssrInterpolate(item.name)}</h1>`);
            });
            _push2(`<!--]--><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<div class="mx-2 row border-b-[1px] border-[gray] py-2"${_scopeId}><div class="col-3"${_scopeId}><p class=""${_scopeId}>Employee Code</p><p class="text-[#000] text-[12px]"${_scopeId}>${ssrInterpolate(item.user_code ? item.user_code : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Date Joining</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.doj ? unref(dayjs)(item.doj).format("DD-MMM-YYYY") : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Department</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.department_name ? item.department_name : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Designation</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.designation ? item.designation : "-")}</p></div></div>`);
            });
            _push2(`<!--]--><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<div class="mx-2 row border-b-[1px] border-[gray] py-2"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>Payment Mode</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_account_number ? "Bank" : "cheque")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Bank Name</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_name ? item.bank_name : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Bank Account</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_account_number ? item.bank_account_number : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>Bank ISFC</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.bank_ifsc_code ? item.bank_ifsc_code : "-")}</p></div></div>`);
            });
            _push2(`<!--]--><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
              _push2(`<div class="py-2 mx-2 row"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>PAN</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.pan_number ? item.pan_number : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>ESIC</p><p class="text-[#000]"${_scopeId}>Date Joined</p></div><div class="col-3"${_scopeId}><p${_scopeId}>UAN</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.uan_number ? item.uan_number : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>EPF Number</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.epf_number ? item.epf_number : "-")}</p></div></div>`);
            });
            _push2(`<!--]--><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div></div><div class=""${_scopeId}><h1 class="font-semibold text-[16px] my-[16px]"${_scopeId}>LEAVE DETAILS</h1><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div><div class="py-2 mx-2 row"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>Leave Type</p><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.leave_type ? item.leave_type : "-")}</p>`);
            });
            _push2(`<!--]--></div><div class="col-3"${_scopeId}><p${_scopeId}>Opening Balance</p><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.opening_balance ? item.opening_balance : "-")}</p>`);
            });
            _push2(`<!--]--></div><div class="col-3"${_scopeId}><p${_scopeId}>Availed</p><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.avalied ? item.avalied : "-")}</p>`);
            });
            _push2(`<!--]--></div><div class="col-3"${_scopeId}><p${_scopeId}>Closing Balance</p><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
              _push2(`<p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.closing_balance ? item.closing_balance : "-")}</p>`);
            });
            _push2(`<!--]--></div></div></div><div class=""${_scopeId}><h1 class="font-semibold text-[16px] my-[16px]"${_scopeId}>SALARY DETAILS</h1><div class="border-[1.5px] border-[#000] my-[12px]"${_scopeId}></div><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.salary_details, (item) => {
              _push2(`<div class="py-2 mx-2 row"${_scopeId}><div class="col-3"${_scopeId}><p${_scopeId}>ACTUAL PAYABLE DAYS</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.month_days ? item.month_days : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>TOTAL WORKING DAYS</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.worked_Days ? item.worked_Days : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>LOSS OF PAY DAYS</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.lop ? item.lop : "-")}</p></div><div class="col-3"${_scopeId}><p${_scopeId}>ARREAR DAYS PAYABLE</p><p class="text-[#000]"${_scopeId}>${ssrInterpolate(item.arrears_Days ? item.arrears_Days : "-")}</p></div></div>`);
            });
            _push2(`<!--]--></div><div class="row mt-2 py-2 border-y-[1px] border-[gray] mx-2"${_scopeId}><div class="col-7 border-r-[1.4px] border-[gray]"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><h1 class="font-semibold"${_scopeId}>Earnings</h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
              _push2(`<h1 class="${ssrRenderClass([[key == "Total Earnings" ? `text-black font-semibold` : "text-black"], "my-3 flex items-center"])}"${_scopeId}>${ssrInterpolate(key)} `);
              if (key == "Total Earnings") {
                _push2(`<span class="text-black font-semibold"${_scopeId}>(A)</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</h1>`);
            });
            _push2(`<!--]--></div><div class="col-2"${_scopeId}>`);
            if (unref(employeePayslipStore).paySlipHTMLView.data.compensatory_data[0]) {
              _push2(`<h1 class="font-semibold text-right"${_scopeId}>Fixed</h1>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.compensatory_data[0], (value, key, index) => {
              _push2(`<h1 class="mt-[12px] text-black text-right"${_scopeId}>${ssrInterpolate(value)}</h1>`);
            });
            _push2(`<!--]--></div><div class="col-2"${_scopeId}>`);
            if (unref(employeePayslipStore).paySlipHTMLView.data.arrears[0] != "") {
              _push2(`<h1 class="font-semibold text-right"${_scopeId}>Arrears</h1>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.arrears[0], (value, key, index) => {
              _push2(`<h1 class="mt-[12px]"${_scopeId}>${ssrInterpolate(value)}</h1>`);
            });
            _push2(`<!--]--></div><div class="col-2"${_scopeId}><h1 class="font-semibold text-right"${_scopeId}>Earned</h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
              _push2(`<h1 class="${ssrRenderClass([[key == "Total Earnings" ? "text-black text-[14px] font-semibold" : ""], "my-3 text-right"])}"${_scopeId}>${ssrInterpolate(value)}</h1>`);
            });
            _push2(`<!--]--></div></div></div><div class="col"${_scopeId}><table border="2" class="w-[100%]"${_scopeId}><tr class="w-[100%]"${_scopeId}><td${_scopeId}><h1 class="font-semibold"${_scopeId}>CONTRIBUTIONS</h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
              _push2(`<p class="${ssrRenderClass([[key == "Total Contribution" ? "text-[14px] text-[#000] font-semibold" : " text-black"], "my-2 text-[#000] flex"])}"${_scopeId}>${ssrInterpolate(key)} `);
              if (key == "Total Contribution") {
                _push2(`<span class="text-black font-semibold text-[14px]"${_scopeId}> (B)</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</p>`);
            });
            _push2(`<!--]--></td><td${_scopeId}><h1 class="font-semibold"${_scopeId}> </h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
              _push2(`<p class="${ssrRenderClass([[key == "Total Contribution" ? "text-[13px] text-[#000] font-semibold" : " text-black"], "my-2 text-[#000] text-right"])}"${_scopeId}>${ssrInterpolate(value)}</p>`);
            });
            _push2(`<!--]--></td></tr><tr class="w-[100%]"${_scopeId}><td${_scopeId}><h1 class="font-semibold"${_scopeId}>Tax Duductions</h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
              _push2(`<p class="${ssrRenderClass([[key == "Total Deduction" ? "text-[14px] text-[#000] font-semibold" : " text-black"], "my-2 text-[#000] flex items-center"])}"${_scopeId}>${ssrInterpolate(key)} `);
              if (key == "Total Deduction") {
                _push2(`<span class="text-[14px] text-[#000] font-semibold"${_scopeId}> (C)</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</p>`);
            });
            _push2(`<!--]--></td><td${_scopeId}><h1 class="font-semibold"${_scopeId}> </h1><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
              _push2(`<p class="${ssrRenderClass([[key == "Total Deduction" ? "text-[14px] text-[#000] font-semibold" : " text-black"], "my-2 text-[#000] text-right"])}"${_scopeId}>${ssrInterpolate(value)}</p>`);
            });
            _push2(`<!--]--></td></tr></table></div></div><!--[-->`);
            ssrRenderList(unref(employeePayslipStore).paySlipHTMLView.data.over_all[0], (value, key, index) => {
              _push2(`<div class="my-2 row w-[100%]"${_scopeId}><div class="my-2 col-6"${_scopeId}><p class="${ssrRenderClass([[key == "Net Salary Payable" || key == "Net Salary in words" ? "text-black text-[14px] font-semibold" : ""], "text-[#000]"])}"${_scopeId}>${ssrInterpolate(key)} `);
              if (key == "Net Salary Payable") {
                _push2(`<span class="text-black font-semibold"${_scopeId}>(A-B-C)</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</p></div><div class="my-2 col-6"${_scopeId}><p class="text-[16px] text-[#000]"${_scopeId}>`);
              if (key == "Net Salary Payable") {
                _push2(`<span style="${ssrRenderStyle({ "font-family": "sans-serif !important" })}" class="${ssrRenderClass([[key == "Net Salary Payable" ? "text-black text-[14px] font-semibold" : ""], "text-[16px] font-semibold text-right"])}"${_scopeId}>₹ </span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`${ssrInterpolate(value)}</p></div></div>`);
            });
            _push2(`<!--]--><div${_scopeId}><p class="mt-2 font-semibold flex text-[#000]"${_scopeId}>*** Note:All <span class="text-[16px] text-[#000]"${_scopeId}>amounts displayed in this payslips are in</span> INR</p><p class="mt-[50px] font-semibold text-[#000]"${_scopeId}>**This is computer generated statement,does not require signature.</p></div><div class=""${_scopeId}><div class="flex items-center float-right"${_scopeId}><p class="mx-2"${_scopeId}>Powered by </p><img${ssrRenderAttr("src", `${unref(employeePayslipStore).paySlipHTMLView.data.date_month.abs_logo}`)} alt="" class="w-[140px] h-[50px]"${_scopeId}></div></div></div></div>`);
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
                      (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.client_details, (item) => {
                        return openBlock(), createBlock("h2", {
                          class: "text-[16px] mt-[10px] text-[#000]",
                          key: item
                        }, toDisplayString(item.client_fullname), 1);
                      }), 128)),
                      (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.client_details, (item) => {
                        return openBlock(), createBlock("p", {
                          class: "w-[300px] mt-[10px]",
                          key: item
                        }, toDisplayString(item.address), 1);
                      }), 128))
                    ]),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.client_details, (item) => {
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
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
                      return openBlock(), createBlock("h1", {
                        class: "font-semibold text-[16px] my-[16px]",
                        key: item
                      }, " Employee Name : " + toDisplayString(item.name), 1);
                    }), 128)),
                    createVNode("div", { class: "border-[1.5px] border-[#000] my-[12px]" }),
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
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
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
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
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.personal_details, (item) => {
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
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.leave_type ? item.leave_type : "-"), 1);
                        }), 128))
                      ]),
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Opening Balance"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.opening_balance ? item.opening_balance : "-"), 1);
                        }), 128))
                      ]),
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Availed"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
                          return openBlock(), createBlock("p", {
                            class: "text-[#000]",
                            key: item
                          }, toDisplayString(item.avalied ? item.avalied : "-"), 1);
                        }), 128))
                      ]),
                      createVNode("div", { class: "col-3" }, [
                        createVNode("p", null, "Closing Balance"),
                        (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.leave_data, (item) => {
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
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.salary_details, (item) => {
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
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-6" }, [
                          createVNode("h1", { class: "font-semibold" }, "Earnings"),
                          (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
                            return openBlock(), createBlock("h1", {
                              class: ["my-3 flex items-center", [key == "Total Earnings" ? `text-black font-semibold` : "text-black"]],
                              key: index
                            }, [
                              createTextVNode(toDisplayString(key) + " ", 1),
                              key == "Total Earnings" ? (openBlock(), createBlock("span", {
                                key: 0,
                                class: "text-black font-semibold"
                              }, "(A)")) : createCommentVNode("", true)
                            ], 2);
                          }), 128))
                        ]),
                        createVNode("div", { class: "col-2" }, [
                          unref(employeePayslipStore).paySlipHTMLView.data.compensatory_data[0] ? (openBlock(), createBlock("h1", {
                            key: 0,
                            class: "font-semibold text-right"
                          }, "Fixed")) : createCommentVNode("", true),
                          (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.compensatory_data[0], (value, key, index) => {
                            return openBlock(), createBlock("h1", {
                              key: index,
                              class: "mt-[12px] text-black text-right"
                            }, toDisplayString(value), 1);
                          }), 128))
                        ]),
                        createVNode("div", { class: "col-2" }, [
                          unref(employeePayslipStore).paySlipHTMLView.data.arrears[0] != "" ? (openBlock(), createBlock("h1", {
                            key: 0,
                            class: "font-semibold text-right"
                          }, "Arrears")) : createCommentVNode("", true),
                          (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.arrears[0], (value, key, index) => {
                            return openBlock(), createBlock("h1", {
                              key: index,
                              class: "mt-[12px]"
                            }, toDisplayString(value), 1);
                          }), 128))
                        ]),
                        createVNode("div", { class: "col-2" }, [
                          createVNode("h1", { class: "font-semibold text-right" }, "Earned"),
                          (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.earnings[0], (value, key, index) => {
                            return openBlock(), createBlock("h1", {
                              key: index,
                              class: ["my-3 text-right", [key == "Total Earnings" ? "text-black text-[14px] font-semibold" : ""]]
                            }, toDisplayString(value), 3);
                          }), 128))
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
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: ["my-2 text-[#000] flex", [key == "Total Contribution" ? "text-[14px] text-[#000] font-semibold" : " text-black"]],
                                key: index
                              }, [
                                createTextVNode(toDisplayString(key) + " ", 1),
                                key == "Total Contribution" ? (openBlock(), createBlock("span", {
                                  key: 0,
                                  class: "text-black font-semibold text-[14px]"
                                }, " (B)")) : createCommentVNode("", true)
                              ], 2);
                            }), 128))
                          ]),
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, " "),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.contribution[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: ["my-2 text-[#000] text-right", [key == "Total Contribution" ? "text-[13px] text-[#000] font-semibold" : " text-black"]],
                                key: index
                              }, toDisplayString(value), 3);
                            }), 128))
                          ])
                        ]),
                        createVNode("tr", { class: "w-[100%]" }, [
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, "Tax Duductions"),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: ["my-2 text-[#000] flex items-center", [key == "Total Deduction" ? "text-[14px] text-[#000] font-semibold" : " text-black"]],
                                key: index
                              }, [
                                createTextVNode(toDisplayString(key) + " ", 1),
                                key == "Total Deduction" ? (openBlock(), createBlock("span", {
                                  key: 0,
                                  class: "text-[14px] text-[#000] font-semibold"
                                }, " (C)")) : createCommentVNode("", true)
                              ], 2);
                            }), 128))
                          ]),
                          createVNode("td", null, [
                            createVNode("h1", { class: "font-semibold" }, " "),
                            (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.Tax_Deduction[0], (value, key, index) => {
                              return openBlock(), createBlock("p", {
                                class: ["my-2 text-[#000] text-right", [key == "Total Deduction" ? "text-[14px] text-[#000] font-semibold" : " text-black"]],
                                key: index
                              }, toDisplayString(value), 3);
                            }), 128))
                          ])
                        ])
                      ])
                    ])
                  ]),
                  (openBlock(true), createBlock(Fragment, null, renderList(unref(employeePayslipStore).paySlipHTMLView.data.over_all[0], (value, key, index) => {
                    return openBlock(), createBlock("div", {
                      class: "my-2 row w-[100%]",
                      key: index
                    }, [
                      createVNode("div", { class: "my-2 col-6" }, [
                        createVNode("p", {
                          class: ["text-[#000]", [key == "Net Salary Payable" || key == "Net Salary in words" ? "text-black text-[14px] font-semibold" : ""]]
                        }, [
                          createTextVNode(toDisplayString(key) + " ", 1),
                          key == "Net Salary Payable" ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "text-black font-semibold"
                          }, "(A-B-C)")) : createCommentVNode("", true)
                        ], 2)
                      ]),
                      createVNode("div", { class: "my-2 col-6" }, [
                        createVNode("p", { class: "text-[16px] text-[#000]" }, [
                          key == "Net Salary Payable" ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: ["text-[16px] font-semibold text-right", [key == "Net Salary Payable" ? "text-black text-[14px] font-semibold" : ""]],
                            style: { "font-family": "sans-serif !important" }
                          }, "₹ ", 2)) : createCommentVNode("", true),
                          createTextVNode(toDisplayString(value), 1)
                        ])
                      ])
                    ]);
                  }), 128)),
                  createVNode("div", null, [
                    createVNode("p", { class: "mt-2 font-semibold flex text-[#000]" }, [
                      createTextVNode("*** Note:All "),
                      createVNode("span", { class: "text-[16px] text-[#000]" }, "amounts displayed in this payslips are in"),
                      createTextVNode(" INR")
                    ]),
                    createVNode("p", { class: "mt-[50px] font-semibold text-[#000]" }, "**This is computer generated statement,does not require signature.")
                  ]),
                  createVNode("div", { class: "" }, [
                    createVNode("div", { class: "flex items-center float-right" }, [
                      createVNode("p", { class: "mx-2" }, "Powered by "),
                      createVNode("img", {
                        src: `${unref(employeePayslipStore).paySlipHTMLView.data.date_month.abs_logo}`,
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/finance_details/EmployeePayslips.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
