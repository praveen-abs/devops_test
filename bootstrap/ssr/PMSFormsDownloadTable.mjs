/* empty css                        *//* empty css                               *//* empty css                             */import { ref, onMounted, resolveComponent, withCtx, createVNode, toDisplayString, createTextVNode, openBlock, createBlock, createCommentVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderList, ssrRenderAttr, ssrRenderClass } from "vue/server-renderer";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
const _sfc_main = {
  __name: "PMSFormsDownloadTable",
  __ssrInlineRender: true,
  setup(__props) {
    const options_calendar_type = [
      { "name": "Choose", "value": "" },
      { "name": "Financial Year", "value": "financial_year" },
      { "name": "Calendar Year", "value": "calendar_year" }
    ];
    const options_year = [
      { "name": "Choose", "value": "" },
      { "name": "April - 2021 to March - 2022", "value": "April - 2021 to March - 2022" },
      { "name": "April - 2022 to March - 2023", "value": "April - 2022 to March - 2023" }
    ];
    const options_assignment_period = [
      { "name": "Choose", "value": "" },
      { "name": "Q1", "value": "q1" },
      { "name": "Q2", "value": "q2" },
      { "name": "Q3", "value": "q3" },
      { "name": "Q4", "value": "q4" }
    ];
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      }
    });
    const data_pmsforms = ref();
    onMounted(() => {
      let url = window.location.origin + "/fetch-regularization-approvals";
      console.log("AJAX URL : " + url);
      axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        data_pmsforms.value = response.data;
      });
    });
    function onclickDownloadExcelSheet(selected_pmsform_id) {
      console.log("Processing Rowdata : " + JSON.stringify(selected_pmsform_id));
      axios.get(window.location.origin + "/report-download-pmsforms", {
        pms_form_id: selected_pmsform_id
      }).then((response) => {
        let blob = new Blob([response.data], { type: "data:application/vnd.ms-excel" });
        let fileURL = window.URL.createObjectURL(blob);
        var fileLink = document.createElement("a");
        fileLink.href = fileURL;
        fileLink.download = "pdf_name.xlsx";
        fileLink.click();
        console.log(response);
      }).catch((error) => {
        console.log(error.toJSON());
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: _ctx.canShowLoadingScreen,
        "onUpdate:visible": ($event) => _ctx.canShowLoadingScreen = $event,
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
        visible: _ctx.canShowConfirmation,
        "onUpdate:visible": ($event) => _ctx.canShowConfirmation = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => _ctx.processApproveReject(),
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
                onClick: ($event) => _ctx.processApproveReject(),
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
      _push(`<div><div>Calander Type : <select><!--[-->`);
      ssrRenderList(options_calendar_type, (option) => {
        _push(`<option${ssrRenderAttr("value", option.value)}>${ssrInterpolate(option.name)}</option>`);
      });
      _push(`<!--]--></select></div><div>Year : <select><!--[-->`);
      ssrRenderList(options_year, (option) => {
        _push(`<option${ssrRenderAttr("value", option.value)}>${ssrInterpolate(option.name)}</option>`);
      });
      _push(`<!--]--></select></div><div>Assignment Period : <select><!--[-->`);
      ssrRenderList(options_assignment_period, (option) => {
        _push(`<option${ssrRenderAttr("value", option.value)}>${ssrInterpolate(option.name)}</option>`);
      });
      _push(`<!--]--></select></div><div>`);
      _push(ssrRenderComponent(_component_Button, {
        type: "button",
        icon: "pi pi-check-circle",
        class: "p-button-success Button",
        label: "Download Excel",
        onClick: ($event) => onclickDownloadExcelSheet(1),
        style: { "height": "2em" }
      }, null, _parent));
      _push(`</div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: data_pmsforms.value,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"]
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
              field: "assignment_period",
              header: "Date",
              sortable: true
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
                      label: "Approval",
                      onClick: ($event) => _ctx.showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
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
                        label: "Approval",
                        onClick: ($event) => _ctx.showConfirmDialog(slotProps.data, "Approve"),
                        style: { "height": "2em" }
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
                field: "assignment_period",
                header: "Date",
                sortable: true
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
                      label: "Approval",
                      onClick: ($event) => _ctx.showConfirmDialog(slotProps.data, "Approve"),
                      style: { "height": "2em" }
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
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reports/pms/PMSFormsDownloadTable.vue");
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
app.mount("#vjs_PMSFormsDownloadTable");
