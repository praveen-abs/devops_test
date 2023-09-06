/* empty css            *//* empty css                   *//* empty css                 */import { ref, reactive, onMounted, resolveComponent, mergeProps, unref, withCtx, createVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import axios from "axios";
import { S as Service } from "./Service90316.js";
const useDocumentSettingsStore = defineStore("DocumentSettings", () => {
  const array_emp_documents_details = ref();
  const loading = ref(false);
  Service();
  const is_onboarding_doc = ref();
  const updatedSource = reactive([]);
  async function getEmployeesDocumentsDetails() {
    loading.value = true;
    await axios.get("/documents/employee_doc_settings").then((res) => {
      array_emp_documents_details.value = res.data.data;
    }).finally(() => {
      loading.value = false;
    });
  }
  async function updateDocumentState(document) {
    console.log("Updating doc status for : " + document.is_onboarding_doc);
    console.log("Updating doc status for : " + document.is_mandatory);
  }
  function submitDocumentSettings(name) {
    console.log("testing:", name);
    let url = "/documents/update_employee_doc_settings";
    axios.post(
      url,
      array_emp_documents_details.value
    ).then((res) => {
      console.log(res.data.status);
      if (res.data.status == "success") {
        Swal.fire({
          title: res.data.status = "Success",
          text: res.data.message,
          icon: "success",
          showCancelButton: false
        }).then((result) => {
        });
      } else if (res.data.status == "failure") {
        Swal.fire({
          title: res.data.status = "Failure",
          text: res.data.message,
          icon: "error",
          showCancelButton: false
        }).then((result) => {
          window.location.reload();
        });
      }
    }).finally(() => {
      updatedSource.splice(0, updatedSource.length);
    });
  }
  return {
    array_emp_documents_details,
    loading,
    is_onboarding_doc,
    getEmployeesDocumentsDetails,
    submitDocumentSettings,
    updateDocumentState
  };
});
const DocumentsSettings_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "DocumentsSettings",
  __ssrInlineRender: true,
  setup(__props) {
    const DocumentSettingsStore = useDocumentSettingsStore();
    ref();
    onMounted(async () => {
      await DocumentSettingsStore.getEmployeesDocumentsDetails();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Checkbox = resolveComponent("Checkbox");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card p-3" }, _attrs))}><h1 class="mt-2 font-semibold text-lg">Documents Settings</h1><div class="my-3">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(DocumentSettingsStore).array_emp_documents_details,
        paginator: true,
        rows: 10,
        dataKey: "id",
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll",
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"]
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, { headerStyle: "width: 3rem" }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "document_name",
              header: "Document Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_onboarding_doc",
              header: "Is Onboarding Document ?"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Checkbox, {
                    onChange: ($event) => unref(DocumentSettingsStore).updateDocumentState(slotProps.data),
                    modelValue: slotProps.data.is_onboarding_doc,
                    "onUpdate:modelValue": ($event) => slotProps.data.is_onboarding_doc = $event,
                    binary: true,
                    trueValue: 1,
                    falseValue: 0
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Checkbox, {
                      onChange: ($event) => unref(DocumentSettingsStore).updateDocumentState(slotProps.data),
                      modelValue: slotProps.data.is_onboarding_doc,
                      "onUpdate:modelValue": ($event) => slotProps.data.is_onboarding_doc = $event,
                      binary: true,
                      trueValue: 1,
                      falseValue: 0
                    }, null, 8, ["onChange", "modelValue", "onUpdate:modelValue"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "is_mandatory",
              header: "Is Mandatory Document ?"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Checkbox, {
                    onChange: ($event) => unref(DocumentSettingsStore).updateDocumentState(slotProps.data),
                    modelValue: slotProps.data.is_mandatory,
                    "onUpdate:modelValue": ($event) => slotProps.data.is_mandatory = $event,
                    binary: true,
                    trueValue: 1,
                    falseValue: 0
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Checkbox, {
                      onChange: ($event) => unref(DocumentSettingsStore).updateDocumentState(slotProps.data),
                      modelValue: slotProps.data.is_mandatory,
                      "onUpdate:modelValue": ($event) => slotProps.data.is_mandatory = $event,
                      binary: true,
                      trueValue: 1,
                      falseValue: 0
                    }, null, 8, ["onChange", "modelValue", "onUpdate:modelValue"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { headerStyle: "width: 3rem" }),
              createVNode(_component_Column, {
                field: "document_name",
                header: "Document Name"
              }),
              createVNode(_component_Column, {
                field: "is_onboarding_doc",
                header: "Is Onboarding Document ?"
              }, {
                body: withCtx((slotProps) => [
                  createVNode(_component_Checkbox, {
                    onChange: ($event) => unref(DocumentSettingsStore).updateDocumentState(slotProps.data),
                    modelValue: slotProps.data.is_onboarding_doc,
                    "onUpdate:modelValue": ($event) => slotProps.data.is_onboarding_doc = $event,
                    binary: true,
                    trueValue: 1,
                    falseValue: 0
                  }, null, 8, ["onChange", "modelValue", "onUpdate:modelValue"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "is_mandatory",
                header: "Is Mandatory Document ?"
              }, {
                body: withCtx((slotProps) => [
                  createVNode(_component_Checkbox, {
                    onChange: ($event) => unref(DocumentSettingsStore).updateDocumentState(slotProps.data),
                    modelValue: slotProps.data.is_mandatory,
                    "onUpdate:modelValue": ($event) => slotProps.data.is_mandatory = $event,
                    binary: true,
                    trueValue: 1,
                    falseValue: 0
                  }, null, 8, ["onChange", "modelValue", "onUpdate:modelValue"])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="mx-5 mt-4"><button class="btn-orange p-2 rounded float-right">Submit</button></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(DocumentSettingsStore).loading,
        "onUpdate:visible": ($event) => unref(DocumentSettingsStore).loading = $event,
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
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/emp_documents/DocumentsSettings.vue");
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
app.mount("#DocumentsSettings");
