/* empty css            *//* empty css                   *//* empty css                 */import { onMounted, ref, reactive, resolveComponent, mergeProps, unref, withCtx, createTextVNode, toDisplayString, openBlock, createBlock, createVNode, createCommentVNode, useSSRContext, createApp } from "vue";
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
import Checkbox from "primevue/checkbox";
import { ssrRenderAttrs, ssrRenderComponent, ssrInterpolate, ssrIncludeBooleanAttr, ssrRenderAttr, ssrRenderStyle } from "vue/server-renderer";
import axios from "axios";
import { useToast } from "primevue/usetoast";
import { U as UseEmployeeDocumentManagerService } from "./EmployeeDocumentsManagerService52374.js";
import "./Service52374.js";
import "./ProfilePagesStore52374.js";
const _sfc_main = {
  __name: "EmployeeDocumentsManager",
  __ssrInlineRender: true,
  setup(__props) {
    onMounted(() => {
      EmployeeDocumentManagerService.fetch_EmployeeDocument();
      console.log(" ", view_document.value);
    });
    const EmployeeDocumentManagerService = UseEmployeeDocumentManagerService();
    useToast();
    const visible = ref(false);
    const view_document = ref({});
    const documentPath = ref();
    ref();
    const uploadDocs = ref();
    const upload_ref = reactive({
      name: ""
    });
    const fileName = ref();
    const formdata = new FormData();
    ref();
    const showDocument = (document) => {
      visible.value = true;
      EmployeeDocumentManagerService.loading = true;
      axios.post("/view-profile-private-file", {
        user_code: EmployeeDocumentManagerService.getEmployeeDetails.current_user_code,
        document_name: document.document_name
      }).then((res) => {
        documentPath.value = res.data.data;
        console.log("data sent", documentPath.value);
      }).finally(() => {
        EmployeeDocumentManagerService.loading = false;
      });
    };
    const getFileName = (filename) => {
      fileName.value = filename;
    };
    const uploadDocument = (e) => {
      console.log(fileName);
      if (e.target.files && e.target.files[0]) {
        uploadDocs.value = e.target.files[0];
        formdata.append(`${fileName.value}`, uploadDocs.value);
        upload_ref.name = uploadDocs.value;
        console.log(formdata);
        Object.keys(formdata)[0];
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card p-3" }, _attrs))}><h2 class="font-semibold text-2xl my-4 mx-3">Employee Documents</h2><div class="w-full">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        value: unref(EmployeeDocumentManagerService).getEmployeeDoc,
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
                  _push3(`${ssrInterpolate(unref(EmployeeDocumentManagerService).getEmployeeDoc.document_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(EmployeeDocumentManagerService).getEmployeeDoc.document_name), 1)
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
                  if (slotProps.data.status === "Pending") {
                    _push3(`<div${_scopeId2}><p class="text-red-600 font-semibold fs-5"${_scopeId2}>Pending</p></div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.status === "Approved") {
                    _push3(`<div${_scopeId2}><p class="text-red-600 font-semibold fs-5"${_scopeId2}>Approved</p></div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.status === "Rejected") {
                    _push3(`<div${_scopeId2}><p class="text-red-600 font-semibold fs-5"${_scopeId2}>Rejected</p></div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.status === null) {
                    _push3(`<div${_scopeId2}><p class="text-green-600 font-semibold"${_scopeId2}>-</p></div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.status === "Pending" ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Pending")
                    ])) : createCommentVNode("", true),
                    slotProps.data.status === "Approved" ? (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Approved")
                    ])) : createCommentVNode("", true),
                    slotProps.data.status === "Rejected" ? (openBlock(), createBlock("div", { key: 2 }, [
                      createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Rejected")
                    ])) : createCommentVNode("", true),
                    slotProps.data.status === null ? (openBlock(), createBlock("div", { key: 3 }, [
                      createVNode("p", { class: "text-green-600 font-semibold" }, "-")
                    ])) : createCommentVNode("", true)
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
                    if (slotProps.data.status == "Rejected") {
                      _push3(`<div${_scopeId2}><input type="file" name="" id="file" hidden${_scopeId2}><button class="btn btn-success"${_scopeId2}><label for="file" class="cursor-pointer"${_scopeId2}><i class="pi pi-upload"${_scopeId2}></i> Upload file</label></button>`);
                      if (slotProps.data.document_name == fileName.value) {
                        _push3(`<p class=""${_scopeId2}>${ssrInterpolate(upload_ref.name.name)}</p>`);
                      } else {
                        _push3(`<!---->`);
                      }
                      _push3(`</div>`);
                    } else {
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
                    }
                    _push3(`</div>`);
                  } else {
                    _push3(`<div${_scopeId2}><input type="file" name="" id="file" hidden${_scopeId2}><button class="btn btn-success"${_scopeId2}><label for="file" class="cursor-pointer"${_scopeId2}><i class="pi pi-upload"${_scopeId2}></i> Upload file</label></button>`);
                    if (slotProps.data.document_name == fileName.value) {
                      _push3(`<p class=""${_scopeId2}>${ssrInterpolate(upload_ref.name.name)}</p>`);
                    } else {
                      _push3(`<!---->`);
                    }
                    _push3(`</div>`);
                  }
                } else {
                  return [
                    slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                      slotProps.data.status == "Rejected" ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("input", {
                          type: "file",
                          name: "",
                          id: "file",
                          hidden: "",
                          onChange: ($event) => uploadDocument($event)
                        }, null, 40, ["onChange"]),
                        createVNode("button", {
                          class: "btn btn-success",
                          onClick: ($event) => getFileName(slotProps.data.document_name)
                        }, [
                          createVNode("label", {
                            for: "file",
                            class: "cursor-pointer"
                          }, [
                            createVNode("i", { class: "pi pi-upload" }),
                            createTextVNode(" Upload file")
                          ])
                        ], 8, ["onClick"]),
                        slotProps.data.document_name == fileName.value ? (openBlock(), createBlock("p", {
                          key: 0,
                          class: ""
                        }, toDisplayString(upload_ref.name.name), 1)) : createCommentVNode("", true)
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode(_component_Button, {
                          type: "button",
                          icon: "pi pi-eye",
                          class: "p-button-success Button",
                          label: "View",
                          onClick: ($event) => showDocument(slotProps.data),
                          style: { "height": "2em" }
                        }, null, 8, ["onClick"])
                      ]))
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("input", {
                        type: "file",
                        name: "",
                        id: "file",
                        hidden: "",
                        onChange: ($event) => uploadDocument($event)
                      }, null, 40, ["onChange"]),
                      createVNode("button", {
                        class: "btn btn-success",
                        onClick: ($event) => getFileName(slotProps.data.document_name)
                      }, [
                        createVNode("label", {
                          for: "file",
                          class: "cursor-pointer"
                        }, [
                          createVNode("i", { class: "pi pi-upload" }),
                          createTextVNode(" Upload file")
                        ])
                      ], 8, ["onClick"]),
                      slotProps.data.document_name == fileName.value ? (openBlock(), createBlock("p", {
                        key: 0,
                        class: ""
                      }, toDisplayString(upload_ref.name.name), 1)) : createCommentVNode("", true)
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
                  createTextVNode(toDisplayString(unref(EmployeeDocumentManagerService).getEmployeeDoc.document_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.status === "Pending" ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Pending")
                  ])) : createCommentVNode("", true),
                  slotProps.data.status === "Approved" ? (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Approved")
                  ])) : createCommentVNode("", true),
                  slotProps.data.status === "Rejected" ? (openBlock(), createBlock("div", { key: 2 }, [
                    createVNode("p", { class: "text-red-600 font-semibold fs-5" }, "Rejected")
                  ])) : createCommentVNode("", true),
                  slotProps.data.status === null ? (openBlock(), createBlock("div", { key: 3 }, [
                    createVNode("p", { class: "text-green-600 font-semibold" }, "-")
                  ])) : createCommentVNode("", true)
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
                    slotProps.data.status == "Rejected" ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("input", {
                        type: "file",
                        name: "",
                        id: "file",
                        hidden: "",
                        onChange: ($event) => uploadDocument($event)
                      }, null, 40, ["onChange"]),
                      createVNode("button", {
                        class: "btn btn-success",
                        onClick: ($event) => getFileName(slotProps.data.document_name)
                      }, [
                        createVNode("label", {
                          for: "file",
                          class: "cursor-pointer"
                        }, [
                          createVNode("i", { class: "pi pi-upload" }),
                          createTextVNode(" Upload file")
                        ])
                      ], 8, ["onClick"]),
                      slotProps.data.document_name == fileName.value ? (openBlock(), createBlock("p", {
                        key: 0,
                        class: ""
                      }, toDisplayString(upload_ref.name.name), 1)) : createCommentVNode("", true)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-eye",
                        class: "p-button-success Button",
                        label: "View",
                        onClick: ($event) => showDocument(slotProps.data),
                        style: { "height": "2em" }
                      }, null, 8, ["onClick"])
                    ]))
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("input", {
                      type: "file",
                      name: "",
                      id: "file",
                      hidden: "",
                      onChange: ($event) => uploadDocument($event)
                    }, null, 40, ["onChange"]),
                    createVNode("button", {
                      class: "btn btn-success",
                      onClick: ($event) => getFileName(slotProps.data.document_name)
                    }, [
                      createVNode("label", {
                        for: "file",
                        class: "cursor-pointer"
                      }, [
                        createVNode("i", { class: "pi pi-upload" }),
                        createTextVNode(" Upload file")
                      ])
                    ], 8, ["onClick"]),
                    slotProps.data.document_name == fileName.value ? (openBlock(), createBlock("p", {
                      key: 0,
                      class: ""
                    }, toDisplayString(upload_ref.name.name), 1)) : createCommentVNode("", true)
                  ]))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<button severity="warn" type="submit" data="row-6" next="row-6" name="submit_form" id="msform" class="text-center btn btn-orange processOnboardForm float-end text-light mr-5 mt-5" value="Submit"${ssrIncludeBooleanAttr(_ctx.fileUploadValidation) ? " disabled" : ""}> Submit </button>`);
      if (unref(EmployeeDocumentManagerService).loading == false) {
        _push(ssrRenderComponent(_component_Dialog, {
          visible: visible.value,
          "onUpdate:visible": ($event) => visible.value = $event,
          modal: "",
          header: "Documents",
          style: { width: "40vw" }
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div class="w-full h-full d-flex justify-content-center"${_scopeId}><img${ssrRenderAttr("src", `data:image/png;base64,${documentPath.value}`)} class="" alt="File not found" style="${ssrRenderStyle({ "object-fit": "cover", "max-width": "400px", ", min-height": "350px", "height": "300px" })}"${_scopeId}></div>`);
            } else {
              return [
                createVNode("div", { class: "w-full h-full d-flex justify-content-center" }, [
                  createVNode("img", {
                    src: `data:image/png;base64,${documentPath.value}`,
                    class: "",
                    alt: "File not found",
                    style: { "object-fit": "cover", "max-width": "400px", ", min-height": "350px", "height": "300px" }
                  }, null, 8, ["src"])
                ])
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(EmployeeDocumentManagerService).loading,
        "onUpdate:visible": ($event) => unref(EmployeeDocumentManagerService).loading = $event,
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
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.vue");
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
app.component("Checkbox", Checkbox);
app.mount("#EmployeeDocumentManager");
