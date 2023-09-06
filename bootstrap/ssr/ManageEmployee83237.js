/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, onMounted, resolveComponent, mergeProps, unref, withCtx, createTextVNode, createVNode, openBlock, createBlock, toDisplayString, createCommentVNode, useSSRContext, isRef, createApp } from "vue";
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
import ProgressBar from "primevue/progressbar";
import InputText from "primevue/inputtext";
import Row from "primevue/row";
import ColumnGroup from "primevue/columngroup";
import Calendar from "primevue/calendar";
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderClass, ssrInterpolate, ssrRenderStyle, ssrRenderAttr } from "vue/server-renderer";
import dayjs from "dayjs";
import { FilterMatchMode } from "primevue/api";
import { p as profilePagesStore } from "./ProfilePagesStore83237.js";
import axios from "axios";
import { S as Service } from "./Service83237.js";
import { L as LoadingSpinner } from "./LoadingSpinner83237.js";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import "./_plugin-vue_export-helper83237.js";
const useManageEmployeesStore = defineStore("manageEmployees", () => {
  const array_active_employees = ref();
  const yet_to_active_employees_data = ref();
  const exit_employees_data = ref();
  const canShowLoadingScreen = ref(true);
  async function getActiveEmployees() {
    let url = window.location.origin + "/vmt-activeemployees-fetchall";
    console.log("AJAX URL : " + url);
    await axios.get(url).then((response) => {
      array_active_employees.value = response.data;
    });
  }
  async function ajax_yet_to_active_employees_data() {
    let url = window.location.origin + "/vmt-yet-to-activeemployees-fetchall";
    console.log("AJAX URL : " + url);
    await axios.get(url).then((response) => {
      console.log("Axios : " + response.data);
      yet_to_active_employees_data.value = response.data;
    });
  }
  async function ajax_exit_employees_data() {
    let url = window.location.origin + "/vmt-exitemployees-fetchall";
    console.log("AJAX URL : " + url);
    await axios.get(url).then((response) => {
      console.log("Axios : " + response.data);
      exit_employees_data.value = response.data;
    });
  }
  return {
    array_active_employees,
    yet_to_active_employees_data,
    exit_employees_data,
    getActiveEmployees,
    ajax_yet_to_active_employees_data,
    ajax_exit_employees_data,
    canShowLoadingScreen
  };
});
const active_employees_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "active_employees",
  __ssrInlineRender: true,
  setup(__props) {
    const service = Service();
    const manageEmployeesStore = useManageEmployeesStore();
    const profilePageStore = profilePagesStore();
    const enc_user_id = ref();
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      emp_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      emp_code: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    onMounted(async () => {
      await manageEmployeesStore.getActiveEmployees();
      manageEmployeesStore.canShowLoadingScreen = false;
    });
    async function openProfilePage(uid) {
      console.log(uid);
      enc_user_id.value = uid.data;
      profilePageStore.user_code = uid.enc_user_id;
      window.location.href = "/pages-profile-new?uid=" + uid.enc_user_id;
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_ProgressBar = resolveComponent("ProgressBar");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(manageEmployeesStore).array_active_employees,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        rowsPerPageOptions: [5, 10, 25],
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        loading: _ctx.canShowLoadingScreen,
        globalFilterFields: ["emp_name", "emp_code", "status"]
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No customers found.`);
          } else {
            return [
              createTextVNode(" No customers found.")
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
              field: "emp_name",
              header: "Employee Name",
              style: { "min-width": "5rem !important", "text-align": "center:  !important" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="flex items-center justify-center"${_scopeId2}>`);
                  if (JSON.parse(slotProps.data.emp_avatar).type == "shortname") {
                    _push3(`<p class="${ssrRenderClass([unref(service).getBackgroundColor(slotProps.index), "p-2 font-semibold text-white rounded-full w-11 fs-6"])}"${_scopeId2}>${ssrInterpolate(JSON.parse(slotProps.data.emp_avatar).data)}</p>`);
                  } else {
                    _push3(`<img class="rounded-circle userActive-status profile-img" style="${ssrRenderStyle({ "height": "30px !important", "width": "30px !important" })}"${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`)} srcset="" alt=""${_scopeId2}>`);
                  }
                  _push3(`<p class="pl-2 font-semibold text-left fs-6"${_scopeId2}>${ssrInterpolate(slotProps.data.emp_name)}</p></div>`);
                } else {
                  return [
                    createVNode("div", { class: "flex items-center justify-center" }, [
                      JSON.parse(slotProps.data.emp_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                        key: 0,
                        class: ["p-2 font-semibold text-white rounded-full w-11 fs-6", unref(service).getBackgroundColor(slotProps.index)]
                      }, toDisplayString(JSON.parse(slotProps.data.emp_avatar).data), 3)) : (openBlock(), createBlock("img", {
                        key: 1,
                        class: "rounded-circle userActive-status profile-img",
                        style: { "height": "30px !important", "width": "30px !important" },
                        src: `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`,
                        srcset: "",
                        alt: ""
                      }, null, 8, ["src"])),
                      createVNode("p", { class: "pl-2 font-semibold text-left fs-6" }, toDisplayString(slotProps.data.emp_name), 1)
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
              field: "emp_code",
              header: "Employee Code",
              class: "",
              style: { "min-width": "2rem !important" }
            }, {
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
              field: "emp_designation",
              header: "Designation",
              style: { "min-width": "15rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reporting_manager_name",
              header: "Reporting Manager"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "doj",
              header: "DOJ",
              style: { "min-width": "10rem" }
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
              field: "profile_completeness",
              header: "Profile Completeness"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.profile_completeness <= 39) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      value: slotProps.data.profile_completeness,
                      class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                      value: slotProps.data.profile_completeness
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.profile_completeness >= 60) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                      value: slotProps.data.profile_completeness
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.profile_completeness <= 39 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 0,
                      value: slotProps.data.profile_completeness,
                      class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                    }, null, 8, ["value", "class"])) : createCommentVNode("", true),
                    slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 1,
                      class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                      value: slotProps.data.profile_completeness
                    }, null, 8, ["class", "value"])) : createCommentVNode("", true),
                    slotProps.data.profile_completeness >= 60 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 2,
                      class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                      value: slotProps.data.profile_completeness
                    }, null, 8, ["class", "value"])) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "enc_user_id",
              header: "View Profile"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"${_scopeId2}><i class="h-6 py-1 mx-2 pi pi-eye"${_scopeId2}></i>View</button>`);
                } else {
                  return [
                    createVNode("button", {
                      onClick: ($event) => openProfilePage(slotProps.data),
                      class: "px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"
                    }, [
                      createVNode("i", { class: "h-6 py-1 mx-2 pi pi-eye" }),
                      createTextVNode("View")
                    ], 8, ["onClick"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                class: "font-bold",
                field: "emp_name",
                header: "Employee Name",
                style: { "min-width": "5rem !important", "text-align": "center:  !important" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "flex items-center justify-center" }, [
                    JSON.parse(slotProps.data.emp_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                      key: 0,
                      class: ["p-2 font-semibold text-white rounded-full w-11 fs-6", unref(service).getBackgroundColor(slotProps.index)]
                    }, toDisplayString(JSON.parse(slotProps.data.emp_avatar).data), 3)) : (openBlock(), createBlock("img", {
                      key: 1,
                      class: "rounded-circle userActive-status profile-img",
                      style: { "height": "30px !important", "width": "30px !important" },
                      src: `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`,
                      srcset: "",
                      alt: ""
                    }, null, 8, ["src"])),
                    createVNode("p", { class: "pl-2 font-semibold text-left fs-6" }, toDisplayString(slotProps.data.emp_name), 1)
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
                field: "emp_code",
                header: "Employee Code",
                class: "",
                style: { "min-width": "2rem !important" }
              }, {
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
                field: "emp_designation",
                header: "Designation",
                style: { "min-width": "15rem" }
              }),
              createVNode(_component_Column, {
                field: "reporting_manager_name",
                header: "Reporting Manager"
              }),
              createVNode(_component_Column, {
                field: "doj",
                header: "DOJ",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.doj).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "profile_completeness",
                header: "Profile Completeness"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.profile_completeness <= 39 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 0,
                    value: slotProps.data.profile_completeness,
                    class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                  }, null, 8, ["value", "class"])) : createCommentVNode("", true),
                  slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 1,
                    class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                    value: slotProps.data.profile_completeness
                  }, null, 8, ["class", "value"])) : createCommentVNode("", true),
                  slotProps.data.profile_completeness >= 60 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 2,
                    class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                    value: slotProps.data.profile_completeness
                  }, null, 8, ["class", "value"])) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "enc_user_id",
                header: "View Profile"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    onClick: ($event) => openProfilePage(slotProps.data),
                    class: "px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"
                  }, [
                    createVNode("i", { class: "h-6 py-1 mx-2 pi pi-eye" }),
                    createTextVNode("View")
                  ], 8, ["onClick"])
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
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/manage_employee/active_employees/active_employees.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "yet_to_active_employees",
  __ssrInlineRender: true,
  setup(__props) {
    const service = Service();
    const manageEmployeesStore = useManageEmployeesStore();
    onMounted(() => {
      manageEmployeesStore.ajax_yet_to_active_employees_data();
    });
    ref();
    let canShowConfirmation = ref(false);
    ref(false);
    useConfirm();
    const toast = useToast();
    function openProfilePage(uid) {
      window.location.href = "/pages-profile-new?uid=" + uid;
    }
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      emp_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      emp_code: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    ref(["Pending", "Approved", "Rejected"]);
    let currentlySelectedStatus2 = null;
    let currentlySelectedRowData2 = null;
    function showConfirmDialog(selectedRowData, status) {
      selectedRowData.emp_code;
      selectedRowData.emp_status;
      console.log(useManageEmployeesStore.emp_status);
      console.log(selectedRowData.emp_status);
      manageEmployeesStore.canShowLoadingScreen = true;
      currentlySelectedStatus2 = status;
      currentlySelectedRowData2 = selectedRowData;
      console.log("Selected Row Data : " + JSON.stringify(selectedRowData));
    }
    function hideConfirmDialog2(canClearData) {
      manageEmployeesStore.canShowLoadingScreen = false;
      if (canClearData)
        resetVars2();
    }
    function resetVars2() {
      currentlySelectedStatus2 = "";
      currentlySelectedRowData2 = null;
    }
    function processApproveReject() {
      hideConfirmDialog2(false);
      manageEmployeesStore.canShowLoadingScreen = true;
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData2));
      axios.post(window.location.origin + "/onboarding/updateEmployeeActive", {
        user_code: currentlySelectedRowData2.emp_code,
        active_status: 1
      }).then((response) => {
        console.log("Response : " + response);
        toast.add({ severity: "success", summary: "Activated", detail: `${currentlySelectedRowData2.emp_name} Activated Successfully`, life: 3e3 });
        resetVars2();
      }).catch((error) => {
        manageEmployeesStore.canShowLoadingScreen = false;
        resetVars2();
      }).finally(() => {
        manageEmployeesStore.ajax_yet_to_active_employees_data();
        manageEmployeesStore.getActiveEmployees();
        manageEmployeesStore.canShowLoadingScreen = false;
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_ProgressBar = resolveComponent("ProgressBar");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
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
              onClick: ($event) => hideConfirmDialog2(true),
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
                onClick: ($event) => hideConfirmDialog2(true),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(unref(currentlySelectedStatus2))}?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(unref(currentlySelectedStatus2)) + "?", 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(manageEmployeesStore).yet_to_active_employees_data,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        rowsPerPageOptions: [5, 10, 25],
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["emp_name", "emp_code", "status"]
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No customers found. `);
          } else {
            return [
              createTextVNode(" No customers found. ")
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
              field: "emp_name",
              header: "Employee Name",
              style: { "min-width": "5rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="flex items-center justify-center"${_scopeId2}>`);
                  if (JSON.parse(slotProps.data.emp_avatar).type == "shortname") {
                    _push3(`<p class="${ssrRenderClass([unref(service).getBackgroundColor(slotProps.index), "p-2 font-semibold text-white rounded-full w-11 fs-6"])}"${_scopeId2}>${ssrInterpolate(JSON.parse(slotProps.data.emp_avatar).data)}</p>`);
                  } else {
                    _push3(`<img class="w-10 rounded-circle img-md userActive-status profile-img" style="${ssrRenderStyle({ "height": "30px !important", "width": "30px !important" })}"${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`)} srcset="" alt=""${_scopeId2}>`);
                  }
                  _push3(`<p class="pl-2 font-semibold text-left fs-6"${_scopeId2}>${ssrInterpolate(slotProps.data.emp_name)}</p></div>`);
                } else {
                  return [
                    createVNode("div", { class: "flex items-center justify-center" }, [
                      JSON.parse(slotProps.data.emp_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                        key: 0,
                        class: ["p-2 font-semibold text-white rounded-full w-11 fs-6", unref(service).getBackgroundColor(slotProps.index)]
                      }, toDisplayString(JSON.parse(slotProps.data.emp_avatar).data), 3)) : (openBlock(), createBlock("img", {
                        key: 1,
                        class: "w-10 rounded-circle img-md userActive-status profile-img",
                        style: { "height": "30px !important", "width": "30px !important" },
                        src: `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`,
                        srcset: "",
                        alt: ""
                      }, null, 8, ["src"])),
                      createVNode("p", { class: "pl-2 font-semibold text-left fs-6" }, toDisplayString(slotProps.data.emp_name), 1)
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
              field: "emp_code",
              header: "Employee Code",
              style: { "min-width": "2rem !important" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.emp_code)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
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
              field: "emp_designation",
              header: "Designation",
              style: { "min-width": "15rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reporting_manager_name",
              header: "Reporting Manager"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "doj",
              header: "DOJ",
              style: { "min-width": "10rem" }
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
              field: "profile_completeness",
              header: "Profile Completeness"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.profile_completeness <= 39) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      value: slotProps.data.profile_completeness,
                      class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                      value: slotProps.data.profile_completeness
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.profile_completeness >= 60) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                      value: slotProps.data.profile_completeness
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.profile_completeness <= 39 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 0,
                      value: slotProps.data.profile_completeness,
                      class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                    }, null, 8, ["value", "class"])) : createCommentVNode("", true),
                    slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 1,
                      class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                      value: slotProps.data.profile_completeness
                    }, null, 8, ["class", "value"])) : createCommentVNode("", true),
                    slotProps.data.profile_completeness >= 60 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 2,
                      class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                      value: slotProps.data.profile_completeness
                    }, null, 8, ["class", "value"])) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_onboarded",
              header: "Onboarding Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.is_onboarded ? "Completed" : "Pending")}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.is_onboarded ? "Completed" : "Pending"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "doc_status",
              header: "Docs Approval Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.is_onboarded ? slotProps.data.doc_status ? "Approved" : "Pending" : "Pending")}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.is_onboarded ? slotProps.data.doc_status ? "Approved" : "Pending" : "Pending"), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "enc_user_id",
              header: "View Profile"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"${_scopeId2}><i class="h-6 py-1 mx-2 pi pi-eye"${_scopeId2}></i>View</button>`);
                } else {
                  return [
                    createVNode("button", {
                      onClick: ($event) => openProfilePage(slotProps.data.enc_user_id),
                      class: "px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"
                    }, [
                      createVNode("i", { class: "h-6 py-1 mx-2 pi pi-eye" }),
                      createTextVNode("View")
                    ], 8, ["onClick"])
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
                  if (slotProps.data.is_onboarded && slotProps.data.doc_status) {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      icon: "pi pi-check-circle",
                      severity: "success",
                      label: "Activate",
                      class: "p-button-success Button",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Active"),
                      style: { "height": "2em" }
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  } else {
                    _push3(`<div${_scopeId2}></div>`);
                  }
                } else {
                  return [
                    slotProps.data.is_onboarded && slotProps.data.doc_status ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode(_component_Button, {
                        icon: "pi pi-check-circle",
                        severity: "success",
                        label: "Activate",
                        class: "p-button-success Button",
                        onClick: ($event) => showConfirmDialog(slotProps.data, "Active"),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"])
                    ])) : (openBlock(), createBlock("div", { key: 1 }))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                class: "font-bold",
                field: "emp_name",
                header: "Employee Name",
                style: { "min-width": "5rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "flex items-center justify-center" }, [
                    JSON.parse(slotProps.data.emp_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                      key: 0,
                      class: ["p-2 font-semibold text-white rounded-full w-11 fs-6", unref(service).getBackgroundColor(slotProps.index)]
                    }, toDisplayString(JSON.parse(slotProps.data.emp_avatar).data), 3)) : (openBlock(), createBlock("img", {
                      key: 1,
                      class: "w-10 rounded-circle img-md userActive-status profile-img",
                      style: { "height": "30px !important", "width": "30px !important" },
                      src: `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`,
                      srcset: "",
                      alt: ""
                    }, null, 8, ["src"])),
                    createVNode("p", { class: "pl-2 font-semibold text-left fs-6" }, toDisplayString(slotProps.data.emp_name), 1)
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
                field: "emp_code",
                header: "Employee Code",
                style: { "min-width": "2rem !important" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
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
                field: "emp_designation",
                header: "Designation",
                style: { "min-width": "15rem" }
              }),
              createVNode(_component_Column, {
                field: "reporting_manager_name",
                header: "Reporting Manager"
              }),
              createVNode(_component_Column, {
                field: "doj",
                header: "DOJ",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.doj).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "profile_completeness",
                header: "Profile Completeness"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.profile_completeness <= 39 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 0,
                    value: slotProps.data.profile_completeness,
                    class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                  }, null, 8, ["value", "class"])) : createCommentVNode("", true),
                  slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 1,
                    class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                    value: slotProps.data.profile_completeness
                  }, null, 8, ["class", "value"])) : createCommentVNode("", true),
                  slotProps.data.profile_completeness >= 60 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 2,
                    class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                    value: slotProps.data.profile_completeness
                  }, null, 8, ["class", "value"])) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "is_onboarded",
                header: "Onboarding Status"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.is_onboarded ? "Completed" : "Pending"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "doc_status",
                header: "Docs Approval Status"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.is_onboarded ? slotProps.data.doc_status ? "Approved" : "Pending" : "Pending"), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "enc_user_id",
                header: "View Profile"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    onClick: ($event) => openProfilePage(slotProps.data.enc_user_id),
                    class: "px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"
                  }, [
                    createVNode("i", { class: "h-6 py-1 mx-2 pi pi-eye" }),
                    createTextVNode("View")
                  ], 8, ["onClick"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "width": "300px" },
                field: "",
                header: "Action"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.is_onboarded && slotProps.data.doc_status ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode(_component_Button, {
                      icon: "pi pi-check-circle",
                      severity: "success",
                      label: "Activate",
                      class: "p-button-success Button",
                      onClick: ($event) => showConfirmDialog(slotProps.data, "Active"),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"])
                  ])) : (openBlock(), createBlock("div", { key: 1 }))
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/manage_employee/yet_to_active_employees/yet_to_active_employees.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "exit_employees",
  __ssrInlineRender: true,
  setup(__props) {
    const service = Service();
    const manageEmployeesStore = useManageEmployeesStore();
    onMounted(() => {
      manageEmployeesStore.ajax_exit_employees_data();
    });
    ref();
    let canShowConfirmation = ref(false);
    let canShowLoadingScreen = ref(false);
    useConfirm();
    const toast = useToast();
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      status: { value: null, matchMode: FilterMatchMode.EQUALS },
      status: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    function openProfilePage(uid) {
      window.location.href = "/pages-profile-new?uid=" + uid;
    }
    function processApproveReject() {
      hideConfirmDialog(false);
      canShowLoadingScreen.value = true;
      console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
      axios.post(window.location.origin + "/attendance-regularization-approvals", {
        id: currentlySelectedRowData.id,
        status: currentlySelectedStatus == "Approve" ? "Approved" : currentlySelectedStatus == "Reject" ? "Rejected" : currentlySelectedStatus,
        status_text: ""
      }).then((response) => {
        console.log("Response : " + response);
        canShowLoadingScreen.value = false;
        toast.add({ severity: "success", summary: "Info", detail: "Success", life: 3e3 });
        ajax_GetAttRegularizationData();
        resetVars();
      }).catch((error) => {
        canShowLoadingScreen.value = false;
        resetVars();
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_ProgressBar = resolveComponent("ProgressBar");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
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
              onClick: ($event) => _ctx.hideConfirmDialog(true),
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
                onClick: ($event) => _ctx.hideConfirmDialog(true),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(_ctx.currentlySelectedStatus)}?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(_ctx.currentlySelectedStatus) + "?", 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(manageEmployeesStore).exit_employees_data,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        rowsPerPageOptions: [5, 10, 25],
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        globalFilterFields: ["emp_name", "emp_code", "status"]
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No customers found.`);
          } else {
            return [
              createTextVNode(" No customers found.")
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
              field: "emp_name",
              header: "Employee Name",
              style: { "min-width": "5rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="flex items-center justify-center"${_scopeId2}>`);
                  if (JSON.parse(slotProps.data.emp_avatar).type == "shortname") {
                    _push3(`<p class="${ssrRenderClass([unref(service).getBackgroundColor(slotProps.index), "p-2 font-semibold text-white rounded-full w-11 fs-6"])}"${_scopeId2}>${ssrInterpolate(JSON.parse(slotProps.data.emp_avatar).data)}</p>`);
                  } else {
                    _push3(`<img class="w-10 rounded-circle img-md userActive-status profile-img" style="${ssrRenderStyle({ "height": "30px !important", "width": "30px !important" })}"${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`)} srcset="" alt=""${_scopeId2}>`);
                  }
                  _push3(`<p class="pl-2 font-semibold text-left fs-6"${_scopeId2}>${ssrInterpolate(slotProps.data.emp_name)}</p></div>`);
                } else {
                  return [
                    createVNode("div", { class: "flex items-center justify-center" }, [
                      JSON.parse(slotProps.data.emp_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                        key: 0,
                        class: ["p-2 font-semibold text-white rounded-full w-11 fs-6", unref(service).getBackgroundColor(slotProps.index)]
                      }, toDisplayString(JSON.parse(slotProps.data.emp_avatar).data), 3)) : (openBlock(), createBlock("img", {
                        key: 1,
                        class: "w-10 rounded-circle img-md userActive-status profile-img",
                        style: { "height": "30px !important", "width": "30px !important" },
                        src: `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`,
                        srcset: "",
                        alt: ""
                      }, null, 8, ["src"])),
                      createVNode("p", { class: "pl-2 font-semibold text-left fs-6" }, toDisplayString(slotProps.data.emp_name), 1)
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
              field: "emp_code",
              header: "Employee Code",
              style: { "min-width": "2rem" }
            }, {
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
              field: "emp_designation",
              header: "Designation",
              style: { "min-width": "15rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reporting_manager_name",
              header: "Reporting Manager"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "doj",
              header: "DOJ",
              style: { "min-width": "10rem" }
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
              field: "profile_completeness",
              header: "Profile Completeness"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.profile_completeness <= 39) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      value: slotProps.data.profile_completeness,
                      class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                      value: slotProps.data.profile_completeness
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.profile_completeness >= 60) {
                    _push3(ssrRenderComponent(_component_ProgressBar, {
                      class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                      value: slotProps.data.profile_completeness
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.profile_completeness <= 39 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 0,
                      value: slotProps.data.profile_completeness,
                      class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                    }, null, 8, ["value", "class"])) : createCommentVNode("", true),
                    slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 1,
                      class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                      value: slotProps.data.profile_completeness
                    }, null, 8, ["class", "value"])) : createCommentVNode("", true),
                    slotProps.data.profile_completeness >= 60 ? (openBlock(), createBlock(_component_ProgressBar, {
                      key: 2,
                      class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                      value: slotProps.data.profile_completeness
                    }, null, 8, ["class", "value"])) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "enc_user_id",
              header: "View Profile"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"${_scopeId2}><i class="h-6 py-1 mx-2 pi pi-eye"${_scopeId2}></i>View</button>`);
                } else {
                  return [
                    createVNode("button", {
                      onClick: ($event) => openProfilePage(slotProps.data.enc_user_id),
                      class: "px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"
                    }, [
                      createVNode("i", { class: "h-6 py-1 mx-2 pi pi-eye" }),
                      createTextVNode("View")
                    ], 8, ["onClick"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                class: "font-bold",
                field: "emp_name",
                header: "Employee Name",
                style: { "min-width": "5rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", { class: "flex items-center justify-center" }, [
                    JSON.parse(slotProps.data.emp_avatar).type == "shortname" ? (openBlock(), createBlock("p", {
                      key: 0,
                      class: ["p-2 font-semibold text-white rounded-full w-11 fs-6", unref(service).getBackgroundColor(slotProps.index)]
                    }, toDisplayString(JSON.parse(slotProps.data.emp_avatar).data), 3)) : (openBlock(), createBlock("img", {
                      key: 1,
                      class: "w-10 rounded-circle img-md userActive-status profile-img",
                      style: { "height": "30px !important", "width": "30px !important" },
                      src: `data:image/png;base64,${JSON.parse(slotProps.data.emp_avatar).data}`,
                      srcset: "",
                      alt: ""
                    }, null, 8, ["src"])),
                    createVNode("p", { class: "pl-2 font-semibold text-left fs-6" }, toDisplayString(slotProps.data.emp_name), 1)
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
                field: "emp_code",
                header: "Employee Code",
                style: { "min-width": "2rem" }
              }, {
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
                field: "emp_designation",
                header: "Designation",
                style: { "min-width": "15rem" }
              }),
              createVNode(_component_Column, {
                field: "reporting_manager_name",
                header: "Reporting Manager"
              }),
              createVNode(_component_Column, {
                field: "doj",
                header: "DOJ",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(dayjs)(slotProps.data.doj).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "profile_completeness",
                header: "Profile Completeness"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.profile_completeness <= 39 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 0,
                    value: slotProps.data.profile_completeness,
                    class: [slotProps.data.profile_completeness <= 39 ? "progressbar" : ""]
                  }, null, 8, ["value", "class"])) : createCommentVNode("", true),
                  slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 1,
                    class: ["progressbar_val2", [slotProps.data.profile_completeness >= 40 && slotProps.data.profile_completeness <= 59]],
                    value: slotProps.data.profile_completeness
                  }, null, 8, ["class", "value"])) : createCommentVNode("", true),
                  slotProps.data.profile_completeness >= 60 ? (openBlock(), createBlock(_component_ProgressBar, {
                    key: 2,
                    class: ["progressbar_val3", [slotProps.data.profile_completeness >= 60]],
                    value: slotProps.data.profile_completeness
                  }, null, 8, ["class", "value"])) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "enc_user_id",
                header: "View Profile"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    onClick: ($event) => openProfilePage(slotProps.data.enc_user_id),
                    class: "px-2 py-1 text-center text-white bg-orange-700 rounded-md whitespace-nowrap"
                  }, [
                    createVNode("i", { class: "h-6 py-1 mx-2 pi pi-eye" }),
                    createTextVNode("View")
                  ], 8, ["onClick"])
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
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/manage_employee/exit_employees/exit_employees.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const ManageEmployee_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ManageEmployee",
  __ssrInlineRender: true,
  setup(__props) {
    const useManageEmployees = useManageEmployeesStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(useManageEmployees).canShowLoadingScreen) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white w-[100%] h-[100%]" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class=""><div class="mb-2 card left-line"><div class="pt-1 pb-0 card-body"><ul class="nav nav-pills nav-tabs-dashed" role="tablist"><li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link active" data-bs-toggle="tab" href="#active_employees" aria-selected="true" role="tab"> Active Employees </a></li><li class="mx-4 nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#not_active_employees" aria-selected="true" role="tab"> Yet To Active Employees </a></li><li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#exit_employees" aria-selected="true" role="tab"> Exit Employee </a></li></ul></div></div><div class="card"><div class="card-body"><div class="tab-content" id="pills-tabContent"><div class="tab-pane show fade active" id="active_employees" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div><div class="tab-pane fade" id="not_active_employees" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div><div class="tab-pane fade" id="exit_employees" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/manage_employee/ManageEmployee.vue");
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
app.component("Textarea", Textarea);
app.component("Chips", Chips);
app.component("MultiSelect", MultiSelect);
app.component("ProgressBar", ProgressBar);
app.mount("#vjs_manage_employee");
