/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, resolveDirective, unref, withCtx, createVNode, openBlock, createBlock, withDirectives, createTextVNode, createCommentVNode, useSSRContext, createApp } from "vue";
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
import { defineStore, createPinia } from "pinia";
import { ssrRenderComponent, ssrRenderAttrs, ssrGetDirectiveProps, ssrRenderStyle } from "vue/server-renderer";
import axios from "axios";
import { L as LoadingSpinner } from "./LoadingSpinner52374.js";
import "./_plugin-vue_export-helper52374.js";
const useManageWelcomeMailStatusStore = defineStore("ManageWelcomeMailStatusStore", () => {
  const loading = ref(false);
  const sendWelcomeMail_Status_diaconfirmation = ref(false);
  const array_employees_list = ref();
  async function getManageWelcomeMailStatus() {
    loading.value = true;
    await axios.get("/getAllEmployees_WelcomeMailStatus_Details").then((res) => {
      array_employees_list.value = res.data;
      console.log("testing", array_employees_list);
    }).finally(() => {
      loading.value = false;
    });
  }
  function send_WelcomeMail(user_code) {
    console.log("sendMail_employeePayslip() : Sending mail to user : " + user_code);
    loading.value = true;
    sendWelcomeMail_Status_diaconfirmation.value = false;
    axios.post("/send_WelcomeMailNotification", {
      user_code
    }).then((response) => {
      console.log(" Response [send_WelcomeMail] : " + response.data);
    }).catch((data) => {
      console.log(data);
    }).finally(() => {
      getManageWelcomeMailStatus();
      loading.value = false;
    });
  }
  return {
    array_employees_list,
    loading,
    sendWelcomeMail_Status_diaconfirmation,
    getManageWelcomeMailStatus,
    send_WelcomeMail
  };
});
const ManageWelcomeMailStatus_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "ManageWelcomeMailStatus",
  __ssrInlineRender: true,
  setup(__props) {
    const ManageWelcomeMailStatusStore = useManageWelcomeMailStatusStore();
    const selectedUserCode = ref();
    onMounted(() => {
      ManageWelcomeMailStatusStore.getManageWelcomeMailStatus();
    });
    function showConfirmationDialog(selected_user_code) {
      selectedUserCode.value = selected_user_code;
      console.log(selected_user_code);
      ManageWelcomeMailStatusStore.sendWelcomeMail_Status_diaconfirmation = true;
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[-->`);
      if (unref(ManageWelcomeMailStatusStore).loading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white w-[100%] h-[100%]" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full p-2"><h6 class="my-2 text-lg font-semibold">Manage WelcomeMail Status</h6><div class="my-4 table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(ManageWelcomeMailStatusStore).array_employees_list,
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
              field: "empcode",
              header: "Employee code",
              headerStyle: "width: 3rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "empname",
              header: "Employee Name"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "personal mail",
              header: "Personal Mail"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "welcome_mail_status",
              header: "Welcome Mail Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_Button, {
                    onClick: ($event) => showConfirmationDialog(slotProps.data.empcode),
                    label: "Send mail",
                    class: "btn btn-primary"
                  }, null, _parent3, _scopeId2));
                  _push3(`<br${_scopeId2}>`);
                  if (slotProps.data.welcome_mail_status == null) {
                    _push3(`<h4${_scopeId2}>Mail Not Sent</h4>`);
                  } else {
                    _push3(`<h4 class="text-green-500"${_scopeId2}> Sent</h4>`);
                  }
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      createVNode(_component_Button, {
                        onClick: ($event) => showConfirmationDialog(slotProps.data.empcode),
                        label: "Send mail",
                        class: "btn btn-primary"
                      }, null, 8, ["onClick"]),
                      createVNode("br"),
                      slotProps.data.welcome_mail_status == null ? (openBlock(), createBlock("h4", { key: 0 }, "Mail Not Sent")) : (openBlock(), createBlock("h4", {
                        key: 1,
                        class: "text-green-500"
                      }, " Sent"))
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "onboard_docs_approval_mail_status",
              header: "Onboard Document Approval Mail Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.value == null || slotProps.data == 0) {
                    _push3(`<h1${ssrRenderAttrs(ssrGetDirectiveProps(_ctx, _directive_tooltip, "Normally, mail is sent when docs are reviewed"))}${_scopeId2}>Mail Not Sent</h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.value == 1) {
                    _push3(`<h1${_scopeId2}>Mail Sent</h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.value == null || slotProps.data == 0 ? withDirectives((openBlock(), createBlock("h1", { key: 0 }, [
                      createTextVNode("Mail Not Sent")
                    ])), [
                      [_directive_tooltip, "Normally, mail is sent when docs are reviewed"]
                    ]) : createCommentVNode("", true),
                    slotProps.data.value == 1 ? (openBlock(), createBlock("h1", { key: 1 }, "Mail Sent")) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "acc_activation_mail_status",
              header: "Activation Mail Status"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.value == null || slotProps.data == 0) {
                    _push3(`<h1${ssrRenderAttrs(ssrGetDirectiveProps(_ctx, _directive_tooltip, "Normally, mail is sent once onboarding is done"))}${_scopeId2}>Mail Not Sent</h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.value == 1) {
                    _push3(`<h1${_scopeId2}>Mail Sent</h1>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.value == null || slotProps.data == 0 ? withDirectives((openBlock(), createBlock("h1", { key: 0 }, [
                      createTextVNode("Mail Not Sent")
                    ])), [
                      [_directive_tooltip, "Normally, mail is sent once onboarding is done"]
                    ]) : createCommentVNode("", true),
                    slotProps.data.value == 1 ? (openBlock(), createBlock("h1", { key: 1 }, "Mail Sent")) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { headerStyle: "width: 3rem" }),
              createVNode(_component_Column, {
                field: "empcode",
                header: "Employee code",
                headerStyle: "width: 3rem"
              }),
              createVNode(_component_Column, {
                field: "empname",
                header: "Employee Name"
              }),
              createVNode(_component_Column, {
                field: "personal mail",
                header: "Personal Mail"
              }),
              createVNode(_component_Column, {
                field: "welcome_mail_status",
                header: "Welcome Mail Status"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    createVNode(_component_Button, {
                      onClick: ($event) => showConfirmationDialog(slotProps.data.empcode),
                      label: "Send mail",
                      class: "btn btn-primary"
                    }, null, 8, ["onClick"]),
                    createVNode("br"),
                    slotProps.data.welcome_mail_status == null ? (openBlock(), createBlock("h4", { key: 0 }, "Mail Not Sent")) : (openBlock(), createBlock("h4", {
                      key: 1,
                      class: "text-green-500"
                    }, " Sent"))
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "onboard_docs_approval_mail_status",
                header: "Onboard Document Approval Mail Status"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.value == null || slotProps.data == 0 ? withDirectives((openBlock(), createBlock("h1", { key: 0 }, [
                    createTextVNode("Mail Not Sent")
                  ])), [
                    [_directive_tooltip, "Normally, mail is sent when docs are reviewed"]
                  ]) : createCommentVNode("", true),
                  slotProps.data.value == 1 ? (openBlock(), createBlock("h1", { key: 1 }, "Mail Sent")) : createCommentVNode("", true)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "acc_activation_mail_status",
                header: "Activation Mail Status"
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.value == null || slotProps.data == 0 ? withDirectives((openBlock(), createBlock("h1", { key: 0 }, [
                    createTextVNode("Mail Not Sent")
                  ])), [
                    [_directive_tooltip, "Normally, mail is sent once onboarding is done"]
                  ]) : createCommentVNode("", true),
                  slotProps.data.value == 1 ? (openBlock(), createBlock("h1", { key: 1 }, "Mail Sent")) : createCommentVNode("", true)
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
        visible: unref(ManageWelcomeMailStatusStore).sendWelcomeMail_Status_diaconfirmation,
        "onUpdate:visible": ($event) => unref(ManageWelcomeMailStatusStore).sendWelcomeMail_Status_diaconfirmation = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Are you sure you want to send Welcome Mail?</span></div><div class="d-flex mt-11" style="${ssrRenderStyle({ "position": "relative", "right": "-180px", "width": "140px" })}"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              class: "py-2 mr-3 btn-primary",
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => unref(ManageWelcomeMailStatusStore).send_WelcomeMail(selectedUserCode.value),
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => unref(ManageWelcomeMailStatusStore).sendWelcomeMail_Status_diaconfirmation = false,
              class: "py-2 p-button-text",
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
                createVNode("span", null, "Are you sure you want to send Welcome Mail?")
              ]),
              createVNode("div", {
                class: "d-flex mt-11",
                style: { "position": "relative", "right": "-180px", "width": "140px" }
              }, [
                createVNode(_component_Button, {
                  class: "py-2 mr-3 btn-primary",
                  label: "Yes",
                  icon: "pi pi-check",
                  onClick: ($event) => unref(ManageWelcomeMailStatusStore).send_WelcomeMail(selectedUserCode.value),
                  autofocus: ""
                }, null, 8, ["onClick"]),
                createVNode(_component_Button, {
                  label: "No",
                  icon: "pi pi-times",
                  onClick: ($event) => unref(ManageWelcomeMailStatusStore).sendWelcomeMail_Status_diaconfirmation = false,
                  class: "py-2 p-button-text",
                  autofocus: ""
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/manage_welcome_mails_status/ManageWelcomeMailStatus.vue");
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
app.component("Calendar", Calendar);
app.mount("#vjs_ManageWelcomeMailStatus");
