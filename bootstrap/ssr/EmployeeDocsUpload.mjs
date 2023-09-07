/* empty css                        *//* empty css                               *//* empty css                             *//* empty css                           */import { inject, ref, onMounted, resolveComponent, withCtx, createTextVNode, toDisplayString, openBlock, createBlock, createVNode, useSSRContext, createApp } from "vue";
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
import ProgressBar from "primevue/progressbar";
import InputText from "primevue/inputtext";
import Row from "primevue/row";
import ColumnGroup from "primevue/columngroup";
import Calendar from "primevue/calendar";
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import { ssrRenderComponent, ssrIncludeBooleanAttr, ssrInterpolate } from "vue/server-renderer";
import axios from "axios";
import { useToast } from "primevue/usetoast";
const _sfc_main = {
  __name: "EmployeeDocsUpload",
  __ssrInlineRender: true,
  setup(__props) {
    inject("$swal");
    useToast();
    const getEmployeeDoc = ref([]);
    const fetch_EmployeeDocument = () => {
      axios.post("/employee-documents-details", {
        user_code: "PSC0057"
      }).then((res) => {
        getEmployeeDoc.value = res.data.data;
        console.log("employee document : ", getEmployeeDoc.value);
      }).finally((res) => {
        console.log("completed");
      });
    };
    onMounted(() => {
      fetch_EmployeeDocument();
    });
    ref({
      AadharCardFront: null,
      AadharCardBack: null,
      PanCardDoc: null,
      DrivingLicenseDoc: null,
      EductionDoc: null,
      VoterIdDoc: null,
      RelievingLetterDoc: null,
      PassportDoc: null,
      save_draft_messege: null
    });
    const AadharDocFrontInvalid = ref(false);
    const AadharDocBackInvalid = ref(false);
    const PancardInvalid = ref(false);
    const EducationCertificateInvalid = ref(false);
    const view_document = ref({});
    const visible = ref(false);
    const documentPath = ref();
    const showDocument = (document) => {
      view_document.value = { ...document };
      console.log(view_document.value);
      console.log(view_document.value.doc_url);
      visible.value = true;
      loading.value = true;
      axios.post("/view-profile-private-file", {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        document_name: view_document.value.document_name
      }).then((res) => {
        console.log(res.data.data);
        documentPath.value = res.data.data;
        console.log("data sent", documentPath.value);
      }).finally(() => {
        loading.value = false;
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      _push(`<!--[--><h2>Upload Documents</h2><br><div class="p-2 shadow card profile-box card-top-border"><div class="card-body justify-content-center align-items-center"><div class="header-card-text"><h6 class="mb-0">Personal Documents</h6></div><div class="mb-2 form-card"><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label">Aadhar Card Front<span class="text-danger">*</span></label>`);
      if (!AadharDocFrontInvalid.value) {
        _push(`<input type="file" accept="image/png, image/gif, image/jpeg" class="onboard-form form-control file">`);
      } else {
        _push(`<!---->`);
      }
      if (AadharDocFrontInvalid.value) {
        _push(`<span class="p-error">Aadhar Card Front is required</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6" id="aadhar_card_backend_content"><label for="" class="float-label"> Aadhar Card Back<span class="text-danger">*</span></label>`);
      if (!AadharDocBackInvalid.value) {
        _push(`<input type="file" accept="image/png, image/gif, image/jpeg" class="onboard-form form-control file">`);
      } else {
        _push(`<!---->`);
      }
      if (AadharDocBackInvalid.value) {
        _push(`<span class="p-error">Aadhar Card Back is Required</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Pan Card<span class="text-danger">*</span></label>`);
      if (!PancardInvalid.value) {
        _push(`<input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Pan Card" name="pan_card_file" id="pan_card_file" class="onboard-form form-control file">`);
      } else {
        _push(`<!---->`);
      }
      if (PancardInvalid.value) {
        _push(`<span class="p-error">Pan Card is Required</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Passport</label><input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Passport" name="passport_file" id="passport_file" class="onboard-form form-control file"></div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label">Voter ID</label><input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Voters ID" name="voters_id_file" id="voters_id_file" class="onboard-form form-control file"></div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Driving License</label><input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Driving License" name="dl_file" id="dl_file" class="onboard-form form-control file"></div><div class="col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label">Educations Certificate<span class="text-danger">*</span></label>`);
      if (EducationCertificateInvalid.value) {
        _push(`<input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Educations Certificate" name="education_certificate_file" id="education_certificate_file" class="onboard-form form-control file is-invalid">`);
      } else {
        _push(`<!---->`);
      }
      if (!EducationCertificateInvalid.value) {
        _push(`<input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Educations Certificate" name="education_certificate_file" id="education_certificate_file" class="onboard-form form-control file">`);
      } else {
        _push(`<!---->`);
      }
      if (EducationCertificateInvalid.value) {
        _push(`<span class="p-error">Eduction Certifacte is Required</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Relieving Letter</label><input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Relieving Letter" name="reliving_letter_file" id="reliving_letter_file" class="onboard-form form-control file"></div></div></div><div class="row"><template><div class="card flex justify-content-center"></div></template><div class="text-right col-12">`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(`<button severity="warn" type="submit" data="row-6" next="row-6" placeholder="" name="submit_form" id="msform" class="text-center btn btn-orange processOnboardForm warn" value="Submit"${ssrIncludeBooleanAttr(_ctx.fileUploadValidation) ? " disabled" : ""}> Submit </button></div></div></div></div><div><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        value: getEmployeeDoc.value,
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "File Name",
              field: "document_name",
              style: { "min-width": "8rem" }
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(getEmployeeDoc.value.document_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(getEmployeeDoc.value.document_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.doc_id) {
                    _push3(`<div${_scopeId2}><p class="text-green-600 font-semibold"${_scopeId2}>Completed</p></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><p class="text-red-600 font-semibold fs-5"${_scopeId2}>Pending</p></div>`);
                  }
                } else {
                  return [
                    slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { class: "text-green-600 font-semibold" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "View ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.doc_id) {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_Button, {
                      type: "button",
                      icon: "pi pi-eye",
                      class: "p-button-success Button",
                      label: "View",
                      onClick: ($event) => showDocument(slotProps.data),
                      style: { "height": "2em" }
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  } else {
                    _push3(`<div${_scopeId2}><input type="file" name="" id="file" hidden${_scopeId2}><button class="btn btn-success"${_scopeId2}><label for="file"${_scopeId2}><i class="pi pi-upload"${_scopeId2}></i> Upload file</label></button></div>`);
                  }
                } else {
                  return [
                    slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-eye",
                        class: "p-button-success Button",
                        label: "View",
                        onClick: ($event) => showDocument(slotProps.data),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"])
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("input", {
                        type: "file",
                        name: "",
                        id: "file",
                        hidden: ""
                      }),
                      createVNode("button", {
                        class: "btn btn-success",
                        onClick: ($event) => _ctx.UploadDocument(slotProps.data)
                      }, [
                        createVNode("label", { for: "file" }, [
                          createVNode("i", { class: "pi pi-upload" }),
                          createTextVNode(" Upload file")
                        ])
                      ], 8, ["onClick"])
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "File Name",
                field: "document_name",
                style: { "min-width": "8rem" }
              }, {
                default: withCtx(() => [
                  createTextVNode(toDisplayString(getEmployeeDoc.value.document_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", { class: "text-green-600 font-semibold" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Pending")
                  ]))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "View ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode(_component_Button, {
                      type: "button",
                      icon: "pi pi-eye",
                      class: "p-button-success Button",
                      label: "View",
                      onClick: ($event) => showDocument(slotProps.data),
                      style: { "height": "2em" }
                    }, null, 8, ["onClick"])
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("input", {
                      type: "file",
                      name: "",
                      id: "file",
                      hidden: ""
                    }),
                    createVNode("button", {
                      class: "btn btn-success",
                      onClick: ($event) => _ctx.UploadDocument(slotProps.data)
                    }, [
                      createVNode("label", { for: "file" }, [
                        createVNode("i", { class: "pi pi-upload" }),
                        createTextVNode(" Upload file")
                      ])
                    ], 8, ["onClick"])
                  ]))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/employee_docs_upload/EmployeeDocsUpload.vue");
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
app.mount("#EmployeeDocsUpload");
