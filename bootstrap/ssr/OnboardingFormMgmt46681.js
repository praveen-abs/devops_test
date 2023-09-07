/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, mergeProps, unref, withCtx, createVNode, useSSRContext, createApp } from "vue";
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
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import axios from "axios";
const UseOnboardingFromService = defineStore("OnboardingFromService", () => {
  const array_OnboardingFromDetails = ref([]);
  const loading = ref(false);
  async function getOnboardingFormDetails() {
    console.log("Getting Onboarding from details");
    loading.value = true;
    await axios.get("http://localhost:3000/OnboardingFormDetails").then((res) => {
      array_OnboardingFromDetails.value = res.data;
    }).finally(() => {
      loading.value = false;
    });
  }
  async function EditOnboardingFormDetails() {
    console.log("testing EditOnboarding form details ");
    window.location.href = "http://localhost:3000/OnboardingFormDetails";
  }
  async function DeleteOnboardingFormDetails(selected_Id) {
    console.log("Delete Onboarding Form Details", selected_Id);
    await axios.post("http://localhost:3000/DeleteOnboardingFormDetails", {
      selected_Id
    }).then((res) => {
      console.log(res.data);
    }).finally(() => {
    });
  }
  return {
    array_OnboardingFromDetails,
    loading,
    getOnboardingFormDetails,
    EditOnboardingFormDetails,
    DeleteOnboardingFormDetails
  };
});
const _sfc_main = {
  __name: "OnboardingFormMgmt",
  __ssrInlineRender: true,
  setup(__props) {
    const OnboardingFromService = UseOnboardingFromService();
    onMounted(() => {
      OnboardingFromService.getOnboardingFormDetails();
    });
    const show_dialogconfirmation = ref(false);
    const selected_Id = ref();
    function showConfirmationDialog(selected_table_id) {
      selected_Id.value = selected_table_id;
      console.log(" selected_id : ", selected_Id.value);
      show_dialogconfirmation.value = true;
    }
    async function send_Delete_Request(selected_Id2) {
      await OnboardingFromService.DeleteOnboardingFormDetails(selected_Id2);
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mt-30" }, _attrs))}><h1 class="fs-4 fw-bold mb-4"> Onboarding Form management</h1><div class="card">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(OnboardingFromService).array_OnboardingFromDetails,
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
            _push2(ssrRenderComponent(_component_Column, {
              field: "emp_code",
              header: "Employee Code"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "emp_name",
              header: "Employee Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "onboarding_status",
              header: "Onboarding Status"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "action",
              header: "Action"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Button, {
                    class: "btn-primary mr-2 p-2",
                    icon: "pi  pi-pencil",
                    style: {},
                    label: "Edit",
                    onClick: ($event) => unref(OnboardingFromService).EditOnboardingFormDetails(slotProps.data.id)
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Button, {
                    class: "btn-orange p-2",
                    icon: "pi pi-delete-left",
                    label: "Delete",
                    onClick: ($event) => showConfirmationDialog(slotProps.data.id)
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Button, {
                      class: "btn-primary mr-2 p-2",
                      icon: "pi  pi-pencil",
                      style: {},
                      label: "Edit",
                      onClick: ($event) => unref(OnboardingFromService).EditOnboardingFormDetails(slotProps.data.id)
                    }, null, 8, ["onClick"]),
                    createVNode(_component_Button, {
                      class: "btn-orange p-2",
                      icon: "pi pi-delete-left",
                      label: "Delete",
                      onClick: ($event) => showConfirmationDialog(slotProps.data.id)
                    }, null, 8, ["onClick"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "emp_code",
                header: "Employee Code"
              }),
              createVNode(_component_Column, {
                field: "emp_name",
                header: "Employee Name"
              }),
              createVNode(_component_Column, {
                field: "onboarding_status",
                header: "Onboarding Status"
              }),
              createVNode(_component_Column, {
                field: "action",
                header: "Action"
              }, {
                body: withCtx((slotProps) => [
                  createVNode(_component_Button, {
                    class: "btn-primary mr-2 p-2",
                    icon: "pi  pi-pencil",
                    style: {},
                    label: "Edit",
                    onClick: ($event) => unref(OnboardingFromService).EditOnboardingFormDetails(slotProps.data.id)
                  }, null, 8, ["onClick"]),
                  createVNode(_component_Button, {
                    class: "btn-orange p-2",
                    icon: "pi pi-delete-left",
                    label: "Delete",
                    onClick: ($event) => showConfirmationDialog(slotProps.data.id)
                  }, null, 8, ["onClick"])
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
            _push2(`<div class="confirmation-content text-center"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to delete Onboarding from details ?</span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "btn-primary mr-3 py-2",
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => send_Delete_Request(selected_Id.value),
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
              createVNode("div", { class: "confirmation-content text-center" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Are you sure you want to delete Onboarding from details ?")
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "btn-primary mr-3 py-2",
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => send_Delete_Request(selected_Id.value),
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
        header: "Header",
        visible: unref(OnboardingFromService).loading,
        "onUpdate:visible": ($event) => unref(OnboardingFromService).loading = $event,
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/onboarding_module/onboarding_form_mgmt/OnboardingFormMgmt.vue");
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
app.mount("#OnboardingFromMgmt");
