/* empty css                *//* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { reactive, ref, onMounted, resolveComponent, mergeProps, withCtx, createVNode, withDirectives, vModelText, openBlock, createBlock, createCommentVNode, useSSRContext, createApp } from "vue";
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
import OverlayPanel from "primevue/overlaypanel";
import Tag from "primevue/tag";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderAttr, ssrRenderComponent, ssrRenderClass, ssrIncludeBooleanAttr } from "vue/server-renderer";
import { _ as _imports_0 } from "./no-data46681.js";
import axios from "axios";
const exit_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "exit",
  __ssrInlineRender: true,
  setup(__props) {
    const exit = reactive({
      dori: "",
      resignation: "",
      npd: "",
      elwd: "",
      ped: "",
      exlRes: "",
      wr: "",
      status: "pending"
    });
    const exit_data = ref();
    const fetch = () => {
      axios.get("http://localhost:3000/exit").then((res) => {
        console.log(res.data);
        exit_data.value = res.data;
      });
    };
    const save = () => {
      console.log(exit);
      axios.post("http://localhost:3000/exit", exit).then((res) => {
        console.log(res.data);
      }).finally(() => {
        fetch();
      });
      applyResignationDailog.value = false;
    };
    onMounted(() => {
      fetch();
    });
    const reason = ref([
      { name: "Better Prospect", code: "Better Prospect" },
      { name: "Marriage & Relocating", code: "Marriage & Relocating" },
      { name: "Illness", code: "Illness" },
      { name: "Difficult Work Environment", code: "Difficult Work Environment" },
      { name: "Career Prospect", code: "Career Prospec" },
      { name: "Others", code: "Others" }
    ]);
    const applyResignationDailog = ref(false);
    const WithdrawResignationDailog = ref(false);
    const expected_lastDate = ref(false);
    const getSeverity = (status) => {
      console.log(status.status);
      switch (status.status) {
        case "Approved":
          return "success";
        case "pending":
          return "warning";
        case "Rejected":
          return "danger";
        default:
          return null;
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Tag = resolveComponent("Tag");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "exit-wrapper mt-30" }, _attrs))}><div class="mb-2 card left-line"><div class="pt-1 pb-0 card-body"><div class="row"><div class="col-9"><ul class="nav nav-pills nav-tabs-dashed" role="tablist"><li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link active" data-bs-toggle="tab" href="#personal-resignation" aria-selected="true" role="tab"> Personal </a></li><li class="mx-4 nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#team-resignation" aria-selected="true" role="tab"> Team </a></li><li class="nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#org-resignation" aria-selected="true" role="tab"> Org </a></li></ul></div><div class="col-3 text-end"><button class="btn btn-primary" id="apply_resignation">Apply Resignation</button></div></div></div></div><div class="mb-2 card"><div class="py-1 card-body"><div class="row"><div class="col-6 d-flex align-items-center"><h6 class="font-semifold">Resignation</h6></div><div class="col-6 text-end"></div></div></div></div><div class="mb-0 card"><div class="card-body"><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="personal-resignation" role="tabpanel" aria-labelledby="pills-home-tab">`);
      if (!exit_data.value) {
        _push(`<div class="no-data-img" id="noData" style="${ssrRenderStyle({})}"><div class="mx-auto text-center col-4"><img${ssrRenderAttr("src", _imports_0)} class="h-100 w-100" alt="no-data"></div></div>`);
      } else {
        _push(`<div class="table-responsive">`);
        _push(ssrRenderComponent(_component_DataTable, {
          ref: "dt",
          dataKey: "id",
          paginator: true,
          rows: 10,
          value: exit_data.value,
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                header: "Date Of Resignation Initiated",
                field: "dori",
                style: { "min-width": "8rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "resignation",
                header: "Resignation Type",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "npd",
                header: "Notice Period Date ",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "elwd",
                header: "Expected Last working Date",
                style: { "min-width": "12rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "",
                header: "Withdraw ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div class="btn btn-border-orange"${_scopeId2}> Withdraw </div>`);
                  } else {
                    return [
                      createVNode("div", {
                        onClick: ($event) => WithdrawResignationDailog.value = true,
                        class: "btn btn-border-orange"
                      }, " Withdraw ", 8, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(ssrRenderComponent(_component_Tag, {
                      value: slotProps.data.status,
                      style: { "font-weight": "600" },
                      severity: getSeverity(slotProps.data)
                    }, null, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode(_component_Tag, {
                        value: slotProps.data.status,
                        style: { "font-weight": "600" },
                        severity: getSeverity(slotProps.data)
                      }, null, 8, ["value", "severity"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              return [
                createVNode(_component_Column, {
                  header: "Date Of Resignation Initiated",
                  field: "dori",
                  style: { "min-width": "8rem" }
                }),
                createVNode(_component_Column, {
                  field: "resignation",
                  header: "Resignation Type",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "npd",
                  header: "Notice Period Date ",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "elwd",
                  header: "Expected Last working Date",
                  style: { "min-width": "12rem" }
                }),
                createVNode(_component_Column, {
                  field: "",
                  header: "Withdraw ",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx(() => [
                    createVNode("div", {
                      onClick: ($event) => WithdrawResignationDailog.value = true,
                      class: "btn btn-border-orange"
                    }, " Withdraw ", 8, ["onClick"])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  header: "Status",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    createVNode(_component_Tag, {
                      value: slotProps.data.status,
                      style: { "font-weight": "600" },
                      severity: getSeverity(slotProps.data)
                    }, null, 8, ["value", "severity"])
                  ]),
                  _: 1
                })
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div>`);
      }
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: applyResignationDailog.value,
        "onUpdate:visible": ($event) => applyResignationDailog.value = $event,
        modal: "",
        header: "Resignation",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="resignation-content" id="resignation_form"${_scopeId}><form class="" id="resignationForm"${_scopeId}><div class="row"${_scopeId}><div class="col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"${_scopeId}><div class="mb-3"${_scopeId}><label for="" class=""${_scopeId}>Date Of Resignation Initiated</label><input type="text" class="form-control" id="" aria-describedby=""${ssrRenderAttr("value", exit.dori)}${_scopeId}></div></div><div class="col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"${_scopeId}><div class="mb-3"${_scopeId}><label for="" class=""${_scopeId}>Resignation Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              style: { "height": "2.9em" },
              class: "w-full text-sm text-gray-900 border rounded-lg",
              options: reason.value,
              optionLabel: "name",
              modelValue: exit.resignation,
              "onUpdate:modelValue": ($event) => exit.resignation = $event,
              optionValue: "code",
              placeholder: "Select a Property"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"${_scopeId}><div class="mb-3"${_scopeId}><label for="" class=""${_scopeId}>Notice Period Date</label><input type="Date" class="form-control" id="" aria-describedby=""${ssrRenderAttr("value", exit.npd)}${_scopeId}></div></div><div class="col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"${_scopeId}><div class="mb-3"${_scopeId}><div class="d-flex justify-content-between"${_scopeId}><div class=""${_scopeId}><label for="" class="me-2"${_scopeId}>Expected Last working Date</label><button class="px-0 bg-transparent border-0 outline-none fa fa-info-circle btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Your Expected Last working Date"${_scopeId}></button></div><button type="button" class="bg-transparent border-0 outline-none btn fa text-info fa-pencil" id="expectedDate_reasonButton"${_scopeId}></button></div><input type="Date" class="${ssrRenderClass([[!expected_lastDate.value ? "bg-gray-300" : ""], "form-control"])}" id="expected_lastDate"${ssrRenderAttr("value", exit.elwd)} aria-describedby=""${ssrIncludeBooleanAttr(!expected_lastDate.value) ? " readonly" : ""}${_scopeId}></div></div><div class="col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"${_scopeId}><div class="mb-3"${_scopeId}><label for="" class=""${_scopeId}>Payroll End Date</label><input type="Date" class="form-control" id=""${ssrRenderAttr("value", exit.ped)}${_scopeId}></div></div>`);
            if (expected_lastDate.value) {
              _push2(`<div class="col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"${_scopeId}><div class="mb-3" id="reason_dialogueBox"${_scopeId}><label for="" class=""${_scopeId}>Reason For Change In Last Working Date</label>`);
              _push2(ssrRenderComponent(_component_Textarea, {
                modelValue: exit.wr,
                "onUpdate:modelValue": ($event) => exit.wr = $event,
                name: "",
                id: "",
                class: "my-3",
                cols: "30",
                rows: "3",
                autoResize: "",
                placeholder: "Add Your Reason Here...."
              }, null, _parent2, _scopeId));
              _push2(`</div></div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"${_scopeId}><button type="button" class="btn btn-border-orange me-2"${_scopeId}>Save</button><button type="button" class="btn btn-primary"${_scopeId}>Submit</button></div></form></div>`);
          } else {
            return [
              createVNode("div", {
                class: "resignation-content",
                id: "resignation_form"
              }, [
                createVNode("form", {
                  class: "",
                  id: "resignationForm"
                }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6" }, [
                      createVNode("div", { class: "mb-3" }, [
                        createVNode("label", {
                          for: "",
                          class: ""
                        }, "Date Of Resignation Initiated"),
                        withDirectives(createVNode("input", {
                          type: "text",
                          class: "form-control",
                          id: "",
                          "aria-describedby": "",
                          "onUpdate:modelValue": ($event) => exit.dori = $event
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelText, exit.dori]
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6" }, [
                      createVNode("div", { class: "mb-3" }, [
                        createVNode("label", {
                          for: "",
                          class: ""
                        }, "Resignation Type"),
                        createVNode(_component_Dropdown, {
                          style: { "height": "2.9em" },
                          class: "w-full text-sm text-gray-900 border rounded-lg",
                          options: reason.value,
                          optionLabel: "name",
                          modelValue: exit.resignation,
                          "onUpdate:modelValue": ($event) => exit.resignation = $event,
                          optionValue: "code",
                          placeholder: "Select a Property"
                        }, null, 8, ["options", "modelValue", "onUpdate:modelValue"])
                      ])
                    ]),
                    createVNode("div", { class: "col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6" }, [
                      createVNode("div", { class: "mb-3" }, [
                        createVNode("label", {
                          for: "",
                          class: ""
                        }, "Notice Period Date"),
                        withDirectives(createVNode("input", {
                          type: "Date",
                          class: "form-control",
                          id: "",
                          "aria-describedby": "",
                          "onUpdate:modelValue": ($event) => exit.npd = $event
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelText, exit.npd]
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6" }, [
                      createVNode("div", { class: "mb-3" }, [
                        createVNode("div", { class: "d-flex justify-content-between" }, [
                          createVNode("div", { class: "" }, [
                            createVNode("label", {
                              for: "",
                              class: "me-2"
                            }, "Expected Last working Date"),
                            createVNode("button", {
                              class: "px-0 bg-transparent border-0 outline-none fa fa-info-circle btn",
                              "data-bs-toggle": "tooltip",
                              "data-bs-placement": "top",
                              title: "Edit Your Expected Last working Date"
                            })
                          ]),
                          createVNode("button", {
                            onClick: ($event) => expected_lastDate.value = true,
                            type: "button",
                            class: "bg-transparent border-0 outline-none btn fa text-info fa-pencil",
                            id: "expectedDate_reasonButton"
                          }, null, 8, ["onClick"])
                        ]),
                        withDirectives(createVNode("input", {
                          type: "Date",
                          class: [[!expected_lastDate.value ? "bg-gray-300" : ""], "form-control"],
                          id: "expected_lastDate",
                          "onUpdate:modelValue": ($event) => exit.elwd = $event,
                          "aria-describedby": "",
                          readonly: !expected_lastDate.value
                        }, null, 10, ["onUpdate:modelValue", "readonly"]), [
                          [vModelText, exit.elwd]
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6" }, [
                      createVNode("div", { class: "mb-3" }, [
                        createVNode("label", {
                          for: "",
                          class: ""
                        }, "Payroll End Date"),
                        withDirectives(createVNode("input", {
                          type: "Date",
                          class: "form-control",
                          id: "",
                          "onUpdate:modelValue": ($event) => exit.ped = $event
                        }, null, 8, ["onUpdate:modelValue"]), [
                          [vModelText, exit.ped]
                        ])
                      ])
                    ]),
                    expected_lastDate.value ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "col-sm-12 col-lg-6 col-xxl-6 col-xl-6 col-md-6"
                    }, [
                      createVNode("div", {
                        class: "mb-3",
                        id: "reason_dialogueBox"
                      }, [
                        createVNode("label", {
                          for: "",
                          class: ""
                        }, "Reason For Change In Last Working Date"),
                        createVNode(_component_Textarea, {
                          modelValue: exit.wr,
                          "onUpdate:modelValue": ($event) => exit.wr = $event,
                          name: "",
                          id: "",
                          class: "my-3",
                          cols: "30",
                          rows: "3",
                          autoResize: "",
                          placeholder: "Add Your Reason Here...."
                        }, null, 8, ["modelValue", "onUpdate:modelValue"])
                      ])
                    ])) : createCommentVNode("", true)
                  ]),
                  createVNode("div", { class: "col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end" }, [
                    createVNode("button", {
                      type: "button",
                      class: "btn btn-border-orange me-2",
                      onClick: save
                    }, "Save"),
                    createVNode("button", {
                      type: "button",
                      class: "btn btn-primary"
                    }, "Submit")
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: WithdrawResignationDailog.value,
        "onUpdate:visible": ($event) => WithdrawResignationDailog.value = $event,
        modal: "",
        header: "Withdraw",
        style: { width: "40vw", borderTop: "5px solid #002f56" }
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"${_scopeId}><button type="button" class="btn btn-border-orange me-2"${_scopeId}>Save</button><button type="submit" class="btn btn-primary"${_scopeId}>Submit</button></div>`);
          } else {
            return [
              createVNode("div", { class: "col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end" }, [
                createVNode("button", {
                  type: "button",
                  class: "btn btn-border-orange me-2",
                  onClick: save
                }, "Save"),
                createVNode("button", {
                  type: "submit",
                  class: "btn btn-primary"
                }, "Submit")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="font-bold text-gray-600"${_scopeId}>Please fill the reason for Resignation Withdrawal and click Submit to proceed further </p>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              modelValue: exit.wr,
              "onUpdate:modelValue": ($event) => exit.wr = $event,
              name: "",
              id: "",
              class: "my-3",
              cols: "30",
              rows: "3",
              autoResize: "",
              placeholder: "Add Your Reason Here...."
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode("p", { class: "font-bold text-gray-600" }, "Please fill the reason for Resignation Withdrawal and click Submit to proceed further "),
              createVNode(_component_Textarea, {
                modelValue: exit.wr,
                "onUpdate:modelValue": ($event) => exit.wr = $event,
                name: "",
                id: "",
                class: "my-3",
                cols: "30",
                rows: "3",
                autoResize: "",
                placeholder: "Add Your Reason Here...."
              }, null, 8, ["modelValue", "onUpdate:modelValue"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="tab-pane fade" id="team-resignation" role="tabpanel" aria-labelledby="pills-home-tab"><div class="resignation-table"><div class="row"><div class="mb-2 col-12"><h6 class="mb-2">Pending Task</h6><table class="table"><thead><tr><th>Employee Name</th><th>Employee Code</th><th>Details</th><th>Status</th><th>Replace</th><th>Action</th></tr></thead><tbody><tr><td>Praveen</td><td>Abs1008</td><td><a role="button" class="cursor-pointer dropdown-item text-info" data-bs-toggle="modal" data-bs-target="#resignationDetailsView"><i class="fa fa-eye me-1" aria-hidden="true"></i> View</a></td><td><span class="badge rounded-pill bg-warning">Pending</span></td><td><button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#switch_task">Change</button></td><td><button class="btn btn-secondary-red me-2">Reject</button><button class="btn btn-success">Approve</button></td><td><div class="dropdown custom-dropDown dropdown-action"><button class="bg-transparent border-0 outline-none btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="${ssrRenderStyle({})}"><a class="dropdown-item" href="#"><i class="fa fa-eye text-info me-2" aria-hidden="true"></i> View</a><a class="dropdown-item" href="#"><i class="fa fa-trash text-danger me-2" aria-hidden="true"></i> Delete Resignation</a></div></div></td></tr></tbody></table></div><div class="col-12"><h6 class="mb-2">Completed Task</h6><table class="table"><thead><tr><th>Employee Name</th><th>Employee Code</th><th>Details</th><th>Status</th><th>Action</th></tr></thead><tbody><tr><td>Praveen</td><td>Abs1008</td><td><a role="button" class="cursor-pointer dropdown-item text-info" data-bs-toggle="modal" data-bs-target="#resignationDetailsView"><i class="fa fa-eye me-1" aria-hidden="true"></i> View</a></td><td><span class="badge rounded-pill bg-success">Approved</span></td><td><button class="btn btn-secondary-red me-2">Reject</button><button class="btn btn-success">Approve</button></td></tr><tr><td>Praveen</td><td>Abs1008</td><td><a role="button" class="cursor-pointer dropdown-item text-info" data-bs-toggle="modal" data-bs-target="#resignationDetailsView"><i class="fa fa-eye me-1" aria-hidden="true"></i> View</a></td><td><span class="badge rounded-pill bg-danger">Rejected</span></td><td><button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#switch_task">Change</button></td><td><button class="btn btn-secondary-red me-2">Reject</button><button class="btn btn-success">Approve</button></td></tr></tbody></table></div></div></div></div><div class="tab-pane fade" id="org-resignation" role="tabpanel" aria-labelledby="pills-home-tab"><div class="resignation-table"><div class="row"><div class="mb-2 col-12"><h6 class="mb-2">Pending Task</h6><table class="table"><thead><tr><th>Employee Name</th><th>Employee Code</th><th>Designation</th><th>Details</th><th>Status</th><th>Reporting To</th></tr></thead><tbody><tr><td>Praveen</td><td>Abs1008</td><td>Lead </td><td><a role="button" class="cursor-pointer dropdown-item text-info" data-bs-toggle="modal" data-bs-target="#resignationDetailsView"><i class="fa fa-eye me-1" aria-hidden="true"></i> View</a></td><td><span class="badge rounded-pill bg-warning">Pending</span></td><td>Karthi</td></tr></tbody></table></div><div class="mb-2 col-12"><h6 class="mb-2">Completed Task</h6><table class="table"><thead><tr><th>Employee Name</th><th>Employee Code</th><th>Designation</th><th>Details</th><th>Status</th><th>Reporting To</th></tr></thead><tbody><tr><td>Praveen</td><td>Abs1008</td><td>Lead </td><td><a role="button" class="cursor-pointer dropdown-item text-info" data-bs-toggle="modal" data-bs-target="#resignationDetailsView"><i class="fa fa-eye me-1" aria-hidden="true"></i> View</a></td><td><span class="badge rounded-pill bg-warning">Pending</span></td><td>Karthi</td></tr></tbody></table></div></div></div></div></div></div></div><div id="switch_task" class="modal custom-modal fade" role="dialog"><div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document"><div class="modal-content"><div class="py-2 border-0 modal-header new-role-header d-flex align-items-center"><h6 class="modal-title"> Switch Task Here</h6><button type="button" class="bg-transparent border-0 outline-none close h3" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="modal-body"><div class="row"><div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12"><div class="mb-3"><label for="" class="">Choose The Department Here</label><select name="" id="" class="form-select form-control"><option value="">IT</option></select></div></div><div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12"><div class="mb-3"><label for="" class="">Ask Task To</label><select name="" id="" class="form-select form-control"><option value="">IT</option></select></div></div><div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"><button class="btn btn-orange me-2" data-bs-toggle="modal" data-bs-target="#switch_task">Confirm</button></div></div></div></div></div></div><div id="resignationDetailsView" class="modal custom-modal fade" role="dialog"><div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document"><div class="modal-content"><div class="py-2 border-0 modal-header new-role-header d-flex align-items-center"><h6 class="modal-title"> Employee Information</h6><button type="button" class="bg-transparent border-0 outline-none close h3" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="modal-body"><div class="row"><div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12"><ul class="personal-info"><li class="pb-1 border-bottom-liteAsh"><div class="title">Name</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Employee Code</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Employee Email Id</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Date Of Joining(DOJ)</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Designation</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Reporting Manager</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Notice Period</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Date Of Designation</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Last Working Date(Exp)</div><div class="text"> - </div></li><li class="pb-1 border-bottom-liteAsh"><div class="title">Reason For Resignation</div><div class="text"> - </div></li></ul></div><div class="col-sm-12 col-lg-12 col-xxl-12 col-xl-12 col-md-12 text-end"><button class="btn btn-orange" data-bs-dismiss="modal">Close</button></div></div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/exit/exit.vue");
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
app.component("OverlayPanel", OverlayPanel);
app.component("Tag", Tag);
app.mount("#Exit");
