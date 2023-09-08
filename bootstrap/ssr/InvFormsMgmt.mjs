/* empty css                            *//* empty css                        *//* empty css                               *//* empty css                             */import { ref, onMounted, resolveComponent, withCtx, createVNode, toDisplayString, openBlock, createBlock, createCommentVNode, Fragment, renderList, useSSRContext, createApp } from "vue";
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
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderAttr, ssrRenderList } from "vue/server-renderer";
import { defineStore, createPinia } from "pinia";
import axios from "axios";
defineStore("employeeInvestmentMainStore", () => {
  return {};
});
const useInvFormsMgmt = defineStore("InvFormsMgmt", () => {
  const fileuploaded = ref();
  async function uploadInvestmentForm(formData) {
    await axios.post("/investments/ImportInvestmentForm_Excel", {}).then((response) => {
      fileuploaded.value = response.data.data;
    });
  }
  return {
    uploadInvestmentForm
  };
});
const InvFormsMgmt_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "InvFormsMgmt",
  __ssrInlineRender: true,
  setup(__props) {
    useInvFormsMgmt();
    const form_name = ref();
    const excel_file = ref();
    const fileupload = ref();
    const employeeDetails = ref();
    onMounted(() => {
      getDetails();
    });
    const getDetails = () => {
      axios.get("/testEmployeeDocumentsJoin").then((res) => {
        console.log(res.data);
        employeeDetails.value = res.data;
      });
    };
    async function uploadInvestmentForm() {
      const formData = new FormData();
      formData.append("form_name", form_name.value);
      formData.append("excel_file", excel_file.value);
      console.log(formData);
      let url = "/investments/ImportInvestmentForm_Excel";
      axios.post(url, formData).then((res) => {
        fileupload.value = res.data;
      }).finally(() => {
        console.log("xlsx upload successfully");
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Button = resolveComponent("Button");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[--><div>`);
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
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to ${ssrInterpolate(_ctx.currentlySelectedStatus)}?</span></div><template${_scopeId}></template>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to " + toDisplayString(_ctx.currentlySelectedStatus) + "?", 1)
              ]),
              createVNode("template")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div><div class="mb-3"><label for="formFile" class="form-label">Form Name</label><input class="form-control" type="text" id="formFile"${ssrRenderAttr("value", form_name.value)}><label for="formFile" class="form-label">Investment Form Management</label><input class="form-control" type="file" id="formFile"></div>`);
      _push(ssrRenderComponent(_component_Button, {
        label: "Upload",
        onClick: ($event) => uploadInvestmentForm(),
        class: "py-2 p-button-text btn-primary",
        autofocus: ""
      }, null, _parent));
      _push(`</div><div class="mt-1">${ssrInterpolate(fileupload.value)}</div></div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 10,
        value: employeeDetails.value,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Employee Code",
              field: "user_code",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Employee Name",
              field: "name",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Section",
              field: "section",
              style: { "min-width": "16rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Particular",
              field: "particular",
              style: { "min-width": "16rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Max Amount",
              field: "max_amount",
              style: { "min-width": "16rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Dec Amount",
              field: "dec_amount",
              style: { "min-width": "16rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Pops Value",
              field: "json_popups_value",
              style: { "min-width": "16rem" }
            }, null, _parent2, _scopeId));
            _push2(`<!--[-->`);
            ssrRenderList(employeeDetails.value, (col) => {
              _push2(ssrRenderComponent(_component_Column, {
                key: col.id,
                header: col.particular
              }, {
                body: withCtx(({ data }, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (data.particular == "Employee contributions to NPS") {
                      _push3(`<div${_scopeId2}>${ssrInterpolate(data.dec_amount)}</div>`);
                    } else {
                      _push3(`<!---->`);
                    }
                    if (data.particular == "Principal Repayment of Housing Loan") {
                      _push3(`<div${_scopeId2}>${ssrInterpolate(data.dec_amount)}</div>`);
                    } else {
                      _push3(`<!---->`);
                    }
                  } else {
                    return [
                      data.particular == "Employee contributions to NPS" ? (openBlock(), createBlock("div", { key: 0 }, toDisplayString(data.dec_amount), 1)) : createCommentVNode("", true),
                      data.particular == "Principal Repayment of Housing Loan" ? (openBlock(), createBlock("div", { key: 1 }, toDisplayString(data.dec_amount), 1)) : createCommentVNode("", true)
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
            });
            _push2(`<!--]-->`);
          } else {
            return [
              createVNode(_component_Column, {
                header: "Employee Code",
                field: "user_code",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                header: "Employee Name",
                field: "name",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                header: "Section",
                field: "section",
                style: { "min-width": "16rem" }
              }),
              createVNode(_component_Column, {
                header: "Particular",
                field: "particular",
                style: { "min-width": "16rem" }
              }),
              createVNode(_component_Column, {
                header: "Max Amount",
                field: "max_amount",
                style: { "min-width": "16rem" }
              }),
              createVNode(_component_Column, {
                header: "Dec Amount",
                field: "dec_amount",
                style: { "min-width": "16rem" }
              }),
              createVNode(_component_Column, {
                header: "Pops Value",
                field: "json_popups_value",
                style: { "min-width": "16rem" }
              }),
              (openBlock(true), createBlock(Fragment, null, renderList(employeeDetails.value, (col) => {
                return openBlock(), createBlock(_component_Column, {
                  key: col.id,
                  header: col.particular
                }, {
                  body: withCtx(({ data }) => [
                    data.particular == "Employee contributions to NPS" ? (openBlock(), createBlock("div", { key: 0 }, toDisplayString(data.dec_amount), 1)) : createCommentVNode("", true),
                    data.particular == "Principal Repayment of Housing Loan" ? (openBlock(), createBlock("div", { key: 1 }, toDisplayString(data.dec_amount), 1)) : createCommentVNode("", true)
                  ]),
                  _: 2
                }, 1032, ["header"]);
              }), 128))
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/inv_forms_mgmt/InvFormsMgmt.vue");
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
app.mount("#vjs_invforms_mgmt");
