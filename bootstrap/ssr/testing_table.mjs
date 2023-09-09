/* empty css                            *//* empty css                        *//* empty css                               *//* empty css                             *//* empty css                           */import { ref, resolveComponent, withCtx, createVNode, useSSRContext, createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import "primevue/blockui";
import Button from "primevue/button";
import RadioButton from "primevue/radiobutton";
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
import { ssrRenderAttrs, ssrRenderComponent } from "vue/server-renderer";
import { FilterMatchMode } from "primevue/api";
import axios from "axios";
import "lodash/map.js";
const _sfc_main = {
  __name: "testing_table",
  __ssrInlineRender: true,
  setup(__props) {
    ref([
      { fsp_id: 1, section: "Section 10(13A)", particular: "House Rent Allowance", particulars_options: [{ key: "1", value: "40% To 80%" }, { key: "2", value: "More than 80%" }], ref: "data", max: "1000", emp_dec_amount: "0", emp_selected_particular_option: "" },
      { fsp_id: 2, section: "Section 10(13A)", particular: "House Rent Allowance", particulars_options: [], ref: "data", max: "1000", dec_amount: "10000", emp_selected_particular_option: "" },
      { fsp_id: 3, section: "Section 10(13A)", particular: "House Rent Allowance", particulars_options: [], ref: "data", max: "1000", dec_amount: "0", emp_selected_particular_option: "" }
    ]);
    ref({
      EPF: "",
      VPF: "",
      PPF: ""
    });
    const arraylist = ref();
    function getpmsJson() {
      let url = `http://localhost:3000/Pms_Json_structure`;
      axios.get(url).then((res) => {
        arraylist.value = res.data;
      }).finally();
    }
    getpmsJson();
    ref();
    const expandedRows = ref([]);
    const selectedAllEmployee = ref();
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
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(_attrs)}><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: arraylist.value,
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
              value: slotProps.data.Emp_data,
              responsiveLayout: "scroll",
              selection: selectedAllEmployee.value,
              "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
              selectAll: _ctx.selectAll,
              onSelectAllChange: _ctx.onSelectAllChange
            }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "pms_form_id",
                    header: "Pms form id"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "form_name",
                    header: "Form name"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "author_id",
                    header: "Author id"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "vmt_pms_kpiform_assigned_id",
                    header: "vmt pms form assigned id"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "assignee_id",
                    header: "Assignee Id"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "assignment_period",
                    header: "Assignment Period"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "pms_form_id",
                      header: "Pms form id"
                    }),
                    createVNode(_component_Column, {
                      field: "form_name",
                      header: "Form name"
                    }),
                    createVNode(_component_Column, {
                      field: "author_id",
                      header: "Author id"
                    }),
                    createVNode(_component_Column, {
                      field: "vmt_pms_kpiform_assigned_id",
                      header: "vmt pms form assigned id"
                    }),
                    createVNode(_component_Column, {
                      field: "assignee_id",
                      header: "Assignee Id"
                    }),
                    createVNode(_component_Column, {
                      field: "assignment_period",
                      header: "Assignment Period"
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
                  value: slotProps.data.Emp_data,
                  responsiveLayout: "scroll",
                  selection: selectedAllEmployee.value,
                  "onUpdate:selection": ($event) => selectedAllEmployee.value = $event,
                  selectAll: _ctx.selectAll,
                  onSelectAllChange: _ctx.onSelectAllChange
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      field: "pms_form_id",
                      header: "Pms form id"
                    }),
                    createVNode(_component_Column, {
                      field: "form_name",
                      header: "Form name"
                    }),
                    createVNode(_component_Column, {
                      field: "author_id",
                      header: "Author id"
                    }),
                    createVNode(_component_Column, {
                      field: "vmt_pms_kpiform_assigned_id",
                      header: "vmt pms form assigned id"
                    }),
                    createVNode(_component_Column, {
                      field: "assignee_id",
                      header: "Assignee Id"
                    }),
                    createVNode(_component_Column, {
                      field: "assignment_period",
                      header: "Assignment Period"
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
              selectionMode: "multiple",
              style: { "width": "1rem" },
              exportable: false
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "name",
              header: "Employee Name"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { expander: true }),
              createVNode(_component_Column, {
                selectionMode: "multiple",
                style: { "width": "1rem" },
                exportable: false
              }),
              createVNode(_component_Column, {
                field: "name",
                header: "Employee Name"
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/testing_tableMaster/testing_table.vue");
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
app.mount("#testing_table");
