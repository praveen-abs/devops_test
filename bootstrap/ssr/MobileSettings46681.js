/* empty css            *//* empty css                   *//* empty css                 */import { ref, reactive, onMounted, onUpdated, resolveComponent, mergeProps, unref, withCtx, createVNode, withDirectives, vModelText, useSSRContext, createApp } from "vue";
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
import Checkbox from "primevue/checkbox";
import { defineStore, createPinia } from "pinia";
import { ssrRenderComponent, ssrRenderAttr, ssrRenderClass, ssrRenderStyle, ssrRenderList, ssrInterpolate } from "vue/server-renderer";
import axios from "axios";
import "./Service46681.js";
import { FilterMatchMode } from "primevue/api";
const useMobileSettingsStore = defineStore("MobileSettingsStore", () => {
  const employeeAssignDialog = ref(false);
  const arrayMobileSetDetails = ref();
  const client_details = ref();
  const currentlySelectedClient = ref();
  const canshowloading = ref(false);
  async function getMobileSettings() {
    canshowloading.value = true;
    await axios.post("/fetchMobileModuleData", {
      client_id: client_details.value.id
    }).then((res) => {
      console.log(res.data);
      arrayMobileSetDetails.value = res.data.data;
      console.log("mobile settings", arrayMobileSetDetails.value);
    }).finally(() => {
      canshowloading.value = false;
    });
  }
  const getSessionClient = async () => {
    await axios.get("session-sessionselectedclient").then((res) => {
      console.log(res.data);
      currentlySelectedClient.value = res.data;
      if (res.data.id) {
        client_details.value = res.data;
      }
    });
  };
  const saveEnableDisableSetting = async (item, status) => {
    canshowloading.value = true;
    await axios.post("/saveAppConfigStatus", {
      module_id: item.id,
      status
    }).then((res) => {
      console.log("Status received : " + res.data.status);
      if (res.data.status == "success") {
        item.status = status;
      }
    }).finally(() => {
      canshowloading.value = false;
    });
  };
  const SaveEmployeeAppConfigStatus = () => {
    axios.post("/SaveEmployeeAppConfigStatus", {
      app_sub_modules_link_id,
      selected_employees_user_code
    }).then(() => {
    }).finally(() => {
    });
  };
  return {
    employeeAssignDialog,
    arrayMobileSetDetails,
    getSessionClient,
    saveEnableDisableSetting,
    canshowloading,
    client_details,
    SaveEmployeeAppConfigStatus,
    getMobileSettings
  };
});
const AssignEmployee_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "AssignEmployee",
  __ssrInlineRender: true,
  props: {
    type: {
      type: Number,
      required: true
    }
  },
  setup(__props) {
    const useStore = useMobileSettingsStore();
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
      department_name: { value: null, matchMode: FilterMatchMode.STARTS_WITH }
    });
    ref(false);
    const selectedEmployee = ref([]);
    const dropdownValues = ref();
    const legalEntity = ref();
    const department = ref();
    const filteredSource = ref();
    ref();
    ref(1);
    const getDropdownValues = async () => {
      await axios.get("/getAllDropdownFilterSetting").then((res) => {
        dropdownValues.value = res.data;
      });
    };
    const getFilteredSource = (legalEntity2, department2, type) => {
      console.log(legalEntity2, department2);
      console.log("sub_module_id", type);
      let sub_module_id = type;
      axios.post("/getEmployeesFilterData", {
        department_id: department2,
        client_name: legalEntity2,
        sub_module_id
      }).then((res) => {
        console.log(res.data);
        filteredSource.value = res.data;
        console.log("testing   res.data.client_id", res.data.client_id);
      }).finally(() => {
        console.log("selectedUserId", selectedUserId);
      });
    };
    const selectedUserId = reactive([]);
    function EnableDisable(user, EnableOrDisable, data, client_id) {
      console.log("isEnabled:" + EnableOrDisable, user);
    }
    function EnableAllAndDisableAll() {
      filteredSource.value.forEach((element) => selectedUserId.push(element.user_code));
    }
    const saveCurrentlySelectedEmployeeConfig = (data, type) => {
      let val = data;
      val.forEach((element) => {
        if (element.status == 1) {
          let format = {
            id: element.id,
            isEnabled: element.status,
            client_id: useStore.client_details.id
          };
          selectedUserId.push(format);
        } else {
          console.log(console.log(element.id, "else ::"));
        }
      });
      useStore.canshowloading = true;
      axios.post("/SaveEmployeeAppConfigStatus", {
        "client_id": useStore.client_details.id,
        "app_sub_modules_link_id": type,
        "selected_employees_user_code": selectedUserId
      }).then((res) => {
      }).finally(() => {
        selectedUserId.splice(0, selectedUserId.length);
        filteredSource.value ? filteredSource.value.splice(0, filteredSource.value.length) : [];
        useStore.employeeAssignDialog = false;
        useStore.getMobileSettings();
        useStore.canshowloading = false;
      });
    };
    function canshowdialogbtn() {
      selectedUserId.values = [];
      filteredSource.value = [];
      legalEntity.value = "";
      department.value = "";
      useStore.employeeAssignDialog = false;
    }
    onMounted(() => {
      getDropdownValues();
    });
    onUpdated(() => {
      selectedEmployee.value = null;
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(ssrRenderComponent(_component_Dialog, mergeProps({
        visible: unref(useStore).employeeAssignDialog,
        "onUpdate:visible": ($event) => unref(useStore).employeeAssignDialog = $event,
        modal: "",
        header: "Holiday ",
        style: [{ width: "70vw" }, { "border-top": "5px solid #002f56" }],
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        class: "popup_card",
        "aria-controls": unref(useStore).employeeAssignDialog ? "" : null,
        "aria-expanded": unref(useStore).employeeAssignDialog ? true : canshowdialogbtn()
      }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="w-full p-2"${_scopeId}><div class="flex justify-between"${_scopeId}><div${_scopeId}><p class="text-lg font-semibold"${_scopeId}>Employee Assign</p></div><div${_scopeId}></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "w-full p-2" }, [
                createVNode("div", { class: "flex justify-between" }, [
                  createVNode("div", null, [
                    createVNode("p", { class: "text-lg font-semibold" }, "Employee Assign")
                  ]),
                  createVNode("div")
                ])
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex w-[100%]"${_scopeId}><div class=""${_scopeId}><button class="text-[12px] w-[100px] rounded-l-[8px] h-[26px] bg-[rgba(0,0,0,0.95)] hover:bg-[#000] text-[#fff]"${_scopeId}>Enable All</button><button class="text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]"${_scopeId}>Disable All</button></div></div><div class="grid grid-cols-12 gap-2 mt-3"${_scopeId}><div class="flex items-center col-span-4"${_scopeId}><input type="text"${ssrRenderAttr("value", filters.value["global"].value)} placeholder="Search employee.." class="border rounded-lg bg-gray-100 p-1.5 w-11/12"${_scopeId}></div><div class="flex items-center col-span-5"${_scopeId}><p${_scopeId}>Legal entity</p>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: legalEntity.value,
              "onUpdate:modelValue": ($event) => legalEntity.value = $event,
              class: "w-full min-[280px]:",
              placeholder: "Legal entity",
              onChange: ($event) => getFilteredSource($event.value, "", __props.type),
              options: dropdownValues.value ? dropdownValues.value.legalEntity : [],
              optionLabel: "client_name",
              optionValue: "id"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="flex items-center col-span-3"${_scopeId}><p${_scopeId}>Department</p>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: department.value,
              "onUpdate:modelValue": ($event) => department.value = $event,
              class: "w-full",
              placeholder: "Department",
              onChange: ($event) => getFilteredSource("", $event.value, __props.type),
              options: dropdownValues.value ? dropdownValues.value.department : [],
              optionLabel: "name",
              optionValue: "id"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="my-3 table-responsive"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              selection: selectedEmployee.value,
              "onUpdate:selection": ($event) => selectedEmployee.value = $event,
              value: filteredSource.value,
              ref: "dt",
              dataKey: "id",
              paginator: true,
              rows: 10,
              paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
              rowsPerPageOptions: [5, 10, 25],
              filters: filters.value,
              currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
              globalFilterFields: ["name", "department_name"],
              responsiveLayout: "scroll"
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "name",
                    filterField: "name",
                    header: "Name",
                    style: { "min-width": "12rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    header: "Department",
                    filterField: "department_name",
                    field: "department_name",
                    style: { "min-width": "8rem" }
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "status",
                    header: "Action",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div class="mx-auto"${_scopeId3}><button class="${ssrRenderClass([[slotProps.data.status == 1 ? " bg-[#000] text-white  " : " bg-white !text-[#000] border-[2px] border-black"], "text-[12px] w-[100px] rounded-l-[8px] h-[26px]"])}"${_scopeId3}>Enable</button><button class="${ssrRenderClass([[slotProps.data.status == 0 ? "bg-[#000] text-white " : "bg-white text-black border-[2px] border-black"], "text-[12px] w-[100px] rounded-r-[8px] h-[26px]"])}"${_scopeId3}>Disable</button></div>`);
                      } else {
                        return [
                          createVNode("div", { class: "mx-auto" }, [
                            createVNode("button", {
                              class: ["text-[12px] w-[100px] rounded-l-[8px] h-[26px]", [slotProps.data.status == 1 ? " bg-[#000] text-white  " : " bg-white !text-[#000] border-[2px] border-black"]],
                              onClick: ($event) => EnableDisable(slotProps.data.id, 1, slotProps.data.status = 1, slotProps.data.client_id)
                            }, "Enable", 10, ["onClick"]),
                            createVNode("button", {
                              class: ["text-[12px] w-[100px] rounded-r-[8px] h-[26px]", [slotProps.data.status == 0 ? "bg-[#000] text-white " : "bg-white text-black border-[2px] border-black"]],
                              onClick: ($event) => EnableDisable(slotProps.data.id, 0, slotProps.data.status = 0, slotProps.data.client_id)
                            }, "Disable", 10, ["onClick"])
                          ])
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "name",
                      filterField: "name",
                      header: "Name",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      header: "Department",
                      filterField: "department_name",
                      field: "department_name",
                      style: { "min-width": "8rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "status",
                      header: "Action",
                      style: { "min-width": "12rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createVNode("div", { class: "mx-auto" }, [
                          createVNode("button", {
                            class: ["text-[12px] w-[100px] rounded-l-[8px] h-[26px]", [slotProps.data.status == 1 ? " bg-[#000] text-white  " : " bg-white !text-[#000] border-[2px] border-black"]],
                            onClick: ($event) => EnableDisable(slotProps.data.id, 1, slotProps.data.status = 1, slotProps.data.client_id)
                          }, "Enable", 10, ["onClick"]),
                          createVNode("button", {
                            class: ["text-[12px] w-[100px] rounded-r-[8px] h-[26px]", [slotProps.data.status == 0 ? "bg-[#000] text-white " : "bg-white text-black border-[2px] border-black"]],
                            onClick: ($event) => EnableDisable(slotProps.data.id, 0, slotProps.data.status = 0, slotProps.data.client_id)
                          }, "Disable", 10, ["onClick"])
                        ])
                      ]),
                      _: 1
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`<div class="flex justify-center w-1/2 p-2 mx-auto"${_scopeId}><button class="mx-2 p-2 bg-black !text-[#fff] border-[2px] border-black rounded-lg"${_scopeId}>Cancel</button><button class="mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg"${_scopeId}>Confirm</button></div></div>`);
          } else {
            return [
              createVNode("div", { class: "flex w-[100%]" }, [
                createVNode("div", { class: "" }, [
                  createVNode("button", {
                    class: "text-[12px] w-[100px] rounded-l-[8px] h-[26px] bg-[rgba(0,0,0,0.95)] hover:bg-[#000] text-[#fff]",
                    onClick: ($event) => EnableAllAndDisableAll(selectedEmployee.value)
                  }, "Enable All", 8, ["onClick"]),
                  createVNode("button", {
                    class: "text-[12px] w-[100px] rounded-r-[8px] h-[26px] border-[2px] border-[#000] text-[#000]",
                    onClick: ($event) => EnableAllAndDisableAll(selectedEmployee.value.values = "")
                  }, "Disable All", 8, ["onClick"])
                ])
              ]),
              createVNode("div", { class: "grid grid-cols-12 gap-2 mt-3" }, [
                createVNode("div", { class: "flex items-center col-span-4" }, [
                  withDirectives(createVNode("input", {
                    type: "text",
                    "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                    placeholder: "Search employee..",
                    class: "border rounded-lg bg-gray-100 p-1.5 w-11/12"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, filters.value["global"].value]
                  ])
                ]),
                createVNode("div", { class: "flex items-center col-span-5" }, [
                  createVNode("p", null, "Legal entity"),
                  createVNode(_component_Dropdown, {
                    modelValue: legalEntity.value,
                    "onUpdate:modelValue": ($event) => legalEntity.value = $event,
                    class: "w-full min-[280px]:",
                    placeholder: "Legal entity",
                    onChange: ($event) => getFilteredSource($event.value, "", __props.type),
                    options: dropdownValues.value ? dropdownValues.value.legalEntity : [],
                    optionLabel: "client_name",
                    optionValue: "id"
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "onChange", "options"])
                ]),
                createVNode("div", { class: "flex items-center col-span-3" }, [
                  createVNode("p", null, "Department"),
                  createVNode(_component_Dropdown, {
                    modelValue: department.value,
                    "onUpdate:modelValue": ($event) => department.value = $event,
                    class: "w-full",
                    placeholder: "Department",
                    onChange: ($event) => getFilteredSource("", $event.value, __props.type),
                    options: dropdownValues.value ? dropdownValues.value.department : [],
                    optionLabel: "name",
                    optionValue: "id"
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "onChange", "options"])
                ])
              ]),
              createVNode("div", { class: "my-3 table-responsive" }, [
                createVNode(_component_DataTable, {
                  selection: selectedEmployee.value,
                  "onUpdate:selection": ($event) => selectedEmployee.value = $event,
                  value: filteredSource.value,
                  ref: "dt",
                  dataKey: "id",
                  paginator: true,
                  rows: 10,
                  paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
                  rowsPerPageOptions: [5, 10, 25],
                  filters: filters.value,
                  currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
                  globalFilterFields: ["name", "department_name"],
                  responsiveLayout: "scroll"
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      field: "name",
                      filterField: "name",
                      header: "Name",
                      style: { "min-width": "12rem" }
                    }),
                    createVNode(_component_Column, {
                      header: "Department",
                      filterField: "department_name",
                      field: "department_name",
                      style: { "min-width": "8rem" }
                    }),
                    createVNode(_component_Column, {
                      field: "status",
                      header: "Action",
                      style: { "min-width": "12rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createVNode("div", { class: "mx-auto" }, [
                          createVNode("button", {
                            class: ["text-[12px] w-[100px] rounded-l-[8px] h-[26px]", [slotProps.data.status == 1 ? " bg-[#000] text-white  " : " bg-white !text-[#000] border-[2px] border-black"]],
                            onClick: ($event) => EnableDisable(slotProps.data.id, 1, slotProps.data.status = 1, slotProps.data.client_id)
                          }, "Enable", 10, ["onClick"]),
                          createVNode("button", {
                            class: ["text-[12px] w-[100px] rounded-r-[8px] h-[26px]", [slotProps.data.status == 0 ? "bg-[#000] text-white " : "bg-white text-black border-[2px] border-black"]],
                            onClick: ($event) => EnableDisable(slotProps.data.id, 0, slotProps.data.status = 0, slotProps.data.client_id)
                          }, "Disable", 10, ["onClick"])
                        ])
                      ]),
                      _: 1
                    })
                  ]),
                  _: 1
                }, 8, ["selection", "onUpdate:selection", "value", "filters"]),
                createVNode("div", { class: "flex justify-center w-1/2 p-2 mx-auto" }, [
                  createVNode("button", {
                    onClick: ($event) => canshowdialogbtn(),
                    class: "mx-2 p-2 bg-black !text-[#fff] border-[2px] border-black rounded-lg"
                  }, "Cancel", 8, ["onClick"]),
                  createVNode("button", {
                    class: "mx-2 bg-white !text-[#000] border-[2px] p-2 border-black rounded-lg",
                    onClick: ($event) => saveCurrentlySelectedEmployeeConfig(filteredSource.value, __props.type)
                  }, "Confirm", 8, ["onClick"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/mobile_settings/components/AssignEmployee.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const MobileSettings_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "MobileSettings",
  __ssrInlineRender: true,
  setup(__props) {
    const MobileSettingsStore = useMobileSettingsStore();
    onMounted(async () => {
      await MobileSettingsStore.getSessionClient();
      await MobileSettingsStore.getMobileSettings();
    });
    ref(1);
    const selectedType = ref();
    ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(MobileSettingsStore).canshowloading,
        "onUpdate:visible": ($event) => unref(MobileSettingsStore).canshowloading = $event,
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
      _push(`<div class="w-full"><h1 class="text-[18px] text-[#000] my-2">Mobile App Settings</h1><div class=""><!--[-->`);
      ssrRenderList(unref(MobileSettingsStore).arrayMobileSetDetails, (item, index) => {
        _push(`<div class="grid grid-cols-3 p-2 rounded-lg border my-2.5 h-[44px]"><div class="my-auto"><h1 class="text-[#000] text-[14px]">${ssrInterpolate(item.sub_module_name)}</h1></div><div class="mx-auto"><button class="${ssrRenderClass([[item.status == 1 ? " bg-[#000] text-white  " : " bg-white !text-[#000] border-[2px] border-black"], "text-[12px] w-[100px] rounded-l-[8px] h-[26px]"])}">Enable</button><button class="${ssrRenderClass([[item.status == 0 ? "bg-[#000] text-white " : "bg-white text-black border-[2px] border-black"], "text-[12px] w-[100px] rounded-r-[8px] h-[26px]"])}">Disable</button></div><div class="my-auto">`);
        if (item.status === 1) {
          _push(`<div class="flex float-right cursor-pointer w-[170px] items-center"><i class="pi pi-users"></i><span class="text-[#000] mx-2">${ssrInterpolate(item.employee_count)}</span><span class="underline">Assign Employee</span></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      });
      _push(`<!--]--></div></div>`);
      _push(ssrRenderComponent(_sfc_main$1, { type: selectedType.value }, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/mobile_settings/MobileSettings.vue");
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
app.component("Checkbox", Checkbox);
app.component("Button", Button);
app.component("DataTable", DataTable);
app.component("Column", Column);
app.component("ConfirmDialog", ConfirmDialog);
app.component("Toast", Toast);
app.component("Dialog", Dialog);
app.component("Dropdown", Dropdown);
app.component("ProgressSpinner", ProgressSpinner);
app.component("InputText", InputText);
app.component("Calendar", Calendar);
app.mount("#MobileSettings");
