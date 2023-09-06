/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, mergeProps, withCtx, createVNode, useSSRContext, createApp } from "vue";
import { createPinia } from "pinia";
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
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import InputNumber from "primevue/inputnumber";
import InputMask from "primevue/inputmask";
import { ssrRenderComponent, ssrRenderAttrs } from "vue/server-renderer";
import axios from "axios";
import "primevue/usetoast";
import { _ as _sfc_main$2 } from "./client_onboarding92532.js";
import "@vuelidate/core";
import "@vuelidate/validators";
const client_list_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "client_list",
  __ssrInlineRender: true,
  setup(__props) {
    const client_onboarding_data = ref([]);
    onMounted(() => {
      axios.get("/clients-fetchAll").then((res) => {
        console.log(res.data);
        client_onboarding_data.value = res.data;
      });
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(ssrRenderComponent(_component_DataTable, mergeProps({
        ref: "dt",
        value: client_onboarding_data.value,
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, _attrs), {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Client Code",
              field: "client_code",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "client_name",
              header: "Client Name",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "authorised_person_contact_number",
              header: "Contact ",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "authorised_person_contact_email",
              header: "Email",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "contract_start_date",
              header: "Contract End Date",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "contract_end_date",
              header: "Contract End Date",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "subscription_type",
              header: "Subscription Type'",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Client Code",
                field: "client_code",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "client_name",
                header: "Client Name",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "authorised_person_contact_number",
                header: "Contact ",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "authorised_person_contact_email",
                header: "Email",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "contract_start_date",
                header: "Contract End Date",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "contract_end_date",
                header: "Contract End Date",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "subscription_type",
                header: "Subscription Type'",
                style: { "min-width": "12rem" }
              })
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/client_onboarding/client_list/client_list.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "client_onboarding_master",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "client-onboard-wrapper" }, _attrs))}><div class="mb-2 card left-line"><div class="pt-1 pb-0 card-body"><ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item me-5" role="presentation"><a class="nav-link active" id="" data-bs-toggle="pill" href="" data-bs-target="#client-list" role="tab" aria-controls="pills-home" aria-selected="true"> Client List </a></li><li class="nav-item" role="presentation"><a class="nav-link" id="" data-bs-toggle="pill" href="" data-bs-target="#client-onboarding" role="tab" aria-controls="pills-home" aria-selected="true"> Client Onboarding </a></li></ul></div></div><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="client-list" role="tabpanel" aria-labelledby=""><div class="card"><div class="card-body"><div class="table-responsive">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div></div></div></div><div class="tab-pane fade" id="client-onboarding" role="tabpanel" aria-labelledby="">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/client_onboarding/client_onboarding_master.vue");
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
app.component("InputNumber", InputNumber);
app.component("InputMask", InputMask);
app.mount("#clientOnboarding");
