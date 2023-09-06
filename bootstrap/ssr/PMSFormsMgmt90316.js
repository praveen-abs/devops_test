/* empty css            *//* empty css                   *//* empty css                 */import { ref, onMounted, resolveComponent, unref, isRef, withCtx, createVNode, toDisplayString, createTextVNode, openBlock, createBlock, Fragment, renderList, useSSRContext, mergeProps, createApp } from "vue";
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
import { defineStore, createPinia } from "pinia";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrRenderList } from "vue/server-renderer";
import dayjs from "dayjs";
import "primevue/api";
import axios from "axios";
import "./Service90316.js";
import { useToast } from "primevue/usetoast";
const usePMSFormsMgmtStore = defineStore("pmsFormsMgmtStore", () => {
  const array_pms_forms_authors_list = ref([]);
  const array_pms_forms_usage_details = ref();
  const pms_form_template_details = ref();
  async function getAllPMSFormAuthors() {
    await axios.get("/pms-forms-mgmt/get-all-PMS-form-Authors").then(function(response) {
      array_pms_forms_authors_list.value = Object.entries(response.data.data);
    }).catch(function(error) {
      console.log("Error : " + error);
    }).finally(function() {
    });
  }
  async function getPMSFormUsageDetails(pms_form_id) {
    await axios.post("/pms-forms-mgmt/getPMSFormUsageDetails", {
      "pms_form_id": pms_form_id
    }).then(function(response) {
      array_pms_forms_usage_details.value = response.data;
    }).catch((error) => {
      console.log("Error getPMSFormUsageDetails() : " + error);
      array_pms_forms_usage_details.value = null;
    }).finally(() => {
    });
  }
  async function getPMSFormTemplateDetails(pms_form_id) {
    console.log("Getting PMS form for the form_id : " + pms_form_id);
    await axios.post("/pms-forms-mgmt/getPMSFormTemplateDetails", {
      "pms_form_id": pms_form_id
    }).then((response) => {
      console.log("getPMSFormTemplateDetails() : " + response.data);
      pms_form_template_details.value = response.data;
    }).catch((error) => {
      console.log(error);
      pms_form_template_details.value = null;
    }).finally(() => {
    });
  }
  return {
    array_pms_forms_authors_list,
    array_pms_forms_usage_details,
    pms_form_template_details,
    getAllPMSFormAuthors,
    getPMSFormUsageDetails,
    getPMSFormTemplateDetails
  };
});
const _sfc_main$1 = {
  __name: "PMSFormsTableView",
  __ssrInlineRender: true,
  setup(__props) {
    const pmsFormsMgmtStore = usePMSFormsMgmtStore();
    const expandedRows = ref([]);
    const toast = useToast();
    let canShowLoadingScreen = ref(true);
    let canShowPMSFormUsage_Dialog = ref(false);
    let canShowPMSFormTemplate_Dialog = ref(false);
    let availableTableColumns_PMSTemplateDetails = ref();
    onMounted(async () => {
      await pmsFormsMgmtStore.getAllPMSFormAuthors();
      canShowLoadingScreen.value = false;
    });
    async function getPMSFormUsageDetails(row_data) {
      console.log("Getting PMS Form Usage details for ID : " + row_data.pms_form_id);
      await pmsFormsMgmtStore.getPMSFormUsageDetails(row_data.pms_form_id);
      if (pmsFormsMgmtStore.array_pms_forms_usage_details != null && pmsFormsMgmtStore.array_pms_forms_usage_details.status == "success") {
        canShowPMSFormUsage_Dialog.value = true;
      } else {
        toast.add({
          severity: "error",
          summary: "Error",
          detail: "Unable to fetch the requested details",
          life: 3e3
        });
      }
    }
    async function showPMSFormTemplateDetails(row_data) {
      console.log("Getting PMS Form Template details for ID : " + row_data.pms_form_id);
      await pmsFormsMgmtStore.getPMSFormTemplateDetails(row_data.pms_form_id);
      if (pmsFormsMgmtStore.pms_form_template_details != null && pmsFormsMgmtStore.pms_form_template_details.status == "success") {
        availableTableColumns_PMSTemplateDetails.value = pmsFormsMgmtStore.pms_form_template_details.data.available_columns_primevue;
        canShowPMSFormTemplate_Dialog.value = true;
      } else {
        toast.add({
          severity: "error",
          summary: "Error",
          detail: "Unable to fetch the requested details",
          life: 3e3
        });
      }
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(canShowLoadingScreen),
        "onUpdate:visible": ($event) => isRef(canShowLoadingScreen) ? canShowLoadingScreen.value = $event : canShowLoadingScreen = $event,
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
        header: "PMS Form Usage details",
        visible: unref(canShowPMSFormUsage_Dialog),
        "onUpdate:visible": ($event) => isRef(canShowPMSFormUsage_Dialog) ? canShowPMSFormUsage_Dialog.value = $event : canShowPMSFormUsage_Dialog = $event,
        breakpoints: { "960px": "75vw", "800px": "90vw" },
        style: { width: "980px" },
        modal: true
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2)
            ;
          else {
            return [];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              value: unref(pmsFormsMgmtStore).array_pms_forms_usage_details.data,
              tableStyle: "min-width: 70rem"
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    header: "Calendar Type/Year",
                    style: { "width": "20%" }
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<span${_scopeId3}><b${_scopeId3}>${ssrInterpolate(slotProps.data.abbrevation)} : ${ssrInterpolate(unref(dayjs)(slotProps.data.start_date).format("YYYY"))} - ${ssrInterpolate(unref(dayjs)(slotProps.data.end_date).format("YYYY"))}</b></span>`);
                      } else {
                        return [
                          createVNode("span", null, [
                            createVNode("b", null, toDisplayString(slotProps.data.abbrevation) + " : " + toDisplayString(unref(dayjs)(slotProps.data.start_date).format("YYYY")) + " - " + toDisplayString(unref(dayjs)(slotProps.data.end_date).format("YYYY")), 1)
                          ])
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "assignment_period",
                    header: "Period",
                    style: { "width": "5%" }
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div${_scopeId3}><span${_scopeId3}><b${_scopeId3}>${ssrInterpolate(slotProps.data.assignment_period.toUpperCase())}</b></span></div>`);
                      } else {
                        return [
                          createVNode("div", null, [
                            createVNode("span", null, [
                              createVNode("b", null, toDisplayString(slotProps.data.assignment_period.toUpperCase()), 1)
                            ])
                          ])
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "assignee_name",
                    header: "Assignee Name"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "reviewer_name",
                    header: "Reviewer Name"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "assigner_name",
                    header: "Assigner Name"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      header: "Calendar Type/Year",
                      style: { "width": "20%" }
                    }, {
                      body: withCtx((slotProps) => [
                        createVNode("span", null, [
                          createVNode("b", null, toDisplayString(slotProps.data.abbrevation) + " : " + toDisplayString(unref(dayjs)(slotProps.data.start_date).format("YYYY")) + " - " + toDisplayString(unref(dayjs)(slotProps.data.end_date).format("YYYY")), 1)
                        ])
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "assignment_period",
                      header: "Period",
                      style: { "width": "5%" }
                    }, {
                      body: withCtx((slotProps) => [
                        createVNode("div", null, [
                          createVNode("span", null, [
                            createVNode("b", null, toDisplayString(slotProps.data.assignment_period.toUpperCase()), 1)
                          ])
                        ])
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "assignee_name",
                      header: "Assignee Name"
                    }),
                    createVNode(_component_Column, {
                      field: "reviewer_name",
                      header: "Reviewer Name"
                    }),
                    createVNode(_component_Column, {
                      field: "assigner_name",
                      header: "Assigner Name"
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content d-flex justify-content-start align-items-center mt-3 ml-3" }, [
                createVNode(_component_DataTable, {
                  value: unref(pmsFormsMgmtStore).array_pms_forms_usage_details.data,
                  tableStyle: "min-width: 70rem"
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      header: "Calendar Type/Year",
                      style: { "width": "20%" }
                    }, {
                      body: withCtx((slotProps) => [
                        createVNode("span", null, [
                          createVNode("b", null, toDisplayString(slotProps.data.abbrevation) + " : " + toDisplayString(unref(dayjs)(slotProps.data.start_date).format("YYYY")) + " - " + toDisplayString(unref(dayjs)(slotProps.data.end_date).format("YYYY")), 1)
                        ])
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "assignment_period",
                      header: "Period",
                      style: { "width": "5%" }
                    }, {
                      body: withCtx((slotProps) => [
                        createVNode("div", null, [
                          createVNode("span", null, [
                            createVNode("b", null, toDisplayString(slotProps.data.assignment_period.toUpperCase()), 1)
                          ])
                        ])
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "assignee_name",
                      header: "Assignee Name"
                    }),
                    createVNode(_component_Column, {
                      field: "reviewer_name",
                      header: "Reviewer Name"
                    }),
                    createVNode(_component_Column, {
                      field: "assigner_name",
                      header: "Assigner Name"
                    })
                  ]),
                  _: 1
                }, 8, ["value"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "PMS Form Template details",
        maximizable: "",
        modal: "",
        contentStyle: { height: "600px" },
        visible: unref(canShowPMSFormTemplate_Dialog),
        "onUpdate:visible": ($event) => isRef(canShowPMSFormTemplate_Dialog) ? canShowPMSFormTemplate_Dialog.value = $event : canShowPMSFormTemplate_Dialog = $event,
        breakpoints: { "1000px": "25vw", "800px": "90vw" },
        style: { width: "1200px" }
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              severity: "success",
              label: "Download as Excel",
              class: "btn btn-orange",
              style: { "height": "2em" },
              raised: ""
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode(_component_Button, {
                  severity: "success",
                  label: "Download as Excel",
                  class: "btn btn-orange",
                  style: { "height": "2em" },
                  raised: ""
                })
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content d-flex justify-content-center align-items-center mt-3 ml-3"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              value: unref(pmsFormsMgmtStore).pms_form_template_details.data,
              scrollable: "",
              scrollHeight: "400px",
              tableStyle: "min-width: 90rem"
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span${_scopeId2}><b${_scopeId2}>Form Name : </b> ${ssrInterpolate(unref(pmsFormsMgmtStore).pms_form_template_details.data[0].form_name)}</span>`);
                } else {
                  return [
                    createVNode("span", null, [
                      createVNode("b", null, "Form Name : "),
                      createTextVNode(" " + toDisplayString(unref(pmsFormsMgmtStore).pms_form_template_details.data[0].form_name), 1)
                    ])
                  ];
                }
              }),
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<!--[-->`);
                  ssrRenderList(unref(availableTableColumns_PMSTemplateDetails), (col) => {
                    _push3(ssrRenderComponent(_component_Column, {
                      key: col.field,
                      field: col.field,
                      style: { "width": "25%" },
                      header: col.header
                    }, null, _parent3, _scopeId2));
                  });
                  _push3(`<!--]-->`);
                } else {
                  return [
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(availableTableColumns_PMSTemplateDetails), (col) => {
                      return openBlock(), createBlock(_component_Column, {
                        key: col.field,
                        field: col.field,
                        style: { "width": "25%" },
                        header: col.header
                      }, null, 8, ["field", "header"]);
                    }), 128))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content d-flex justify-content-center align-items-center mt-3 ml-3" }, [
                createVNode(_component_DataTable, {
                  value: unref(pmsFormsMgmtStore).pms_form_template_details.data,
                  scrollable: "",
                  scrollHeight: "400px",
                  tableStyle: "min-width: 90rem"
                }, {
                  header: withCtx(() => [
                    createVNode("span", null, [
                      createVNode("b", null, "Form Name : "),
                      createTextVNode(" " + toDisplayString(unref(pmsFormsMgmtStore).pms_form_template_details.data[0].form_name), 1)
                    ])
                  ]),
                  default: withCtx(() => [
                    (openBlock(true), createBlock(Fragment, null, renderList(unref(availableTableColumns_PMSTemplateDetails), (col) => {
                      return openBlock(), createBlock(_component_Column, {
                        key: col.field,
                        field: col.field,
                        style: { "width": "25%" },
                        header: col.header
                      }, null, 8, ["field", "header"]);
                    }), 128))
                  ]),
                  _: 1
                }, 8, ["value"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(pmsFormsMgmtStore).array_pms_forms_authors_list,
        onRowExpand: _ctx.onRowExpand,
        onRowCollapse: _ctx.onRowCollapse,
        expandedRows: expandedRows.value,
        "onUpdate:expandedRows": ($event) => expandedRows.value = $event,
        paginator: true,
        rows: 10,
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        responsiveLayout: "scroll",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        rowsPerPageOptions: [5, 10, 25],
        loading: unref(canShowLoadingScreen)
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No PMS forms found.`);
          } else {
            return [
              createTextVNode(" No PMS forms found.")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading data. Please wait. ")
            ];
          }
        }),
        groupheader: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="vertical-align-middle ml-2 font-bold line-height-3"${_scopeId}>${ssrInterpolate(slotProps.data[0])}</span>`);
          } else {
            return [
              createVNode("span", { class: "vertical-align-middle ml-2 font-bold line-height-3" }, toDisplayString(slotProps.data[0]), 1)
            ];
          }
        }),
        expansion: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}>`);
            _push2(ssrRenderComponent(_component_DataTable, {
              value: slotProps.data[1],
              responsiveLayout: "scroll",
              scrollable: "",
              scrollHeight: "400px"
            }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    header: "Form Name",
                    sortable: ""
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<p style="${ssrRenderStyle({ "white-space": "nowrap" })}"${_scopeId3}>${ssrInterpolate(slotProps2.data.form_name)}</p>`);
                      } else {
                        return [
                          createVNode("p", { style: { "white-space": "nowrap" } }, toDisplayString(slotProps2.data.form_name), 1)
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    header: "Form Assignment Details",
                    sortable: ""
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        if (slotProps2.data.is_pmsform_used == 1) {
                          _push4(`<div${_scopeId3}>`);
                          _push4(ssrRenderComponent(_component_Button, {
                            label: "View",
                            onClick: ($event) => getPMSFormUsageDetails(slotProps2.data),
                            class: "btn btn-orange",
                            style: { "height": "2em" },
                            raised: ""
                          }, null, _parent4, _scopeId3));
                          _push4(`</div>`);
                        } else {
                          _push4(`<div${_scopeId3}>${ssrInterpolate("Not Assigned")}</div>`);
                        }
                      } else {
                        return [
                          slotProps2.data.is_pmsform_used == 1 ? (openBlock(), createBlock("div", { key: 0 }, [
                            createVNode(_component_Button, {
                              label: "View",
                              onClick: ($event) => getPMSFormUsageDetails(slotProps2.data),
                              class: "btn btn-orange",
                              style: { "height": "2em" },
                              raised: ""
                            }, null, 8, ["onClick"])
                          ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString("Not Assigned")))
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    header: "Actions",
                    sortable: ""
                  }, {
                    body: withCtx((slotProps2, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Button, {
                          severity: "success",
                          label: "View Form",
                          onClick: ($event) => showPMSFormTemplateDetails(slotProps2.data),
                          class: "btn btn-orange",
                          style: { "height": "2em" },
                          raised: ""
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Button, {
                            severity: "success",
                            label: "View Form",
                            onClick: ($event) => showPMSFormTemplateDetails(slotProps2.data),
                            class: "btn btn-orange",
                            style: { "height": "2em" },
                            raised: ""
                          }, null, 8, ["onClick"])
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      header: "Form Name",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("p", { style: { "white-space": "nowrap" } }, toDisplayString(slotProps2.data.form_name), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      header: "Form Assignment Details",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        slotProps2.data.is_pmsform_used == 1 ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode(_component_Button, {
                            label: "View",
                            onClick: ($event) => getPMSFormUsageDetails(slotProps2.data),
                            class: "btn btn-orange",
                            style: { "height": "2em" },
                            raised: ""
                          }, null, 8, ["onClick"])
                        ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString("Not Assigned")))
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      header: "Actions",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode(_component_Button, {
                          severity: "success",
                          label: "View Form",
                          onClick: ($event) => showPMSFormTemplateDetails(slotProps2.data),
                          class: "btn btn-orange",
                          style: { "height": "2em" },
                          raised: ""
                        }, null, 8, ["onClick"])
                      ]),
                      _: 2
                    }, 1024)
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
                  value: slotProps.data[1],
                  responsiveLayout: "scroll",
                  scrollable: "",
                  scrollHeight: "400px"
                }, {
                  default: withCtx(() => [
                    createVNode(_component_Column, {
                      header: "Form Name",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode("p", { style: { "white-space": "nowrap" } }, toDisplayString(slotProps2.data.form_name), 1)
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      header: "Form Assignment Details",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        slotProps2.data.is_pmsform_used == 1 ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode(_component_Button, {
                            label: "View",
                            onClick: ($event) => getPMSFormUsageDetails(slotProps2.data),
                            class: "btn btn-orange",
                            style: { "height": "2em" },
                            raised: ""
                          }, null, 8, ["onClick"])
                        ])) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString("Not Assigned")))
                      ]),
                      _: 2
                    }, 1024),
                    createVNode(_component_Column, {
                      header: "Actions",
                      sortable: ""
                    }, {
                      body: withCtx((slotProps2) => [
                        createVNode(_component_Button, {
                          severity: "success",
                          label: "View Form",
                          onClick: ($event) => showPMSFormTemplateDetails(slotProps2.data),
                          class: "btn btn-orange",
                          style: { "height": "2em" },
                          raised: ""
                        }, null, 8, ["onClick"])
                      ]),
                      _: 2
                    }, 1024)
                  ]),
                  _: 2
                }, 1032, ["value"])
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, { expander: true }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { header: "Author Name" }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data[0])}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data[0]), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { expander: true }),
              createVNode(_component_Column, { header: "Author Name" }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data[0]), 1)
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
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/pms/pms_forms_mgmt/table_view/PMSFormsTableView.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const PMSFormsMgmt_MainView_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "PMSFormsMgmt_MainView",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "manage_employee-wrapper" }, _attrs))}><div class="mb-2 card left-line"><div class="pt-1 pb-0 card-body"><ul class="nav nav-pills nav-tabs-dashed" role="tablist"><li class="mx-4 nav-item text-muted" role="presentation"><a class="pb-2 nav-link active" data-bs-toggle="tab" href="#org_level" aria-selected="true" role="tab"> Org Level </a></li><li class="mx-4 nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#team_level" aria-selected="true" role="tab"> Team Level </a></li><li class="mx-4 nav-item text-muted" role="presentation"><a class="pb-2 nav-link" data-bs-toggle="tab" href="#employee_level" aria-selected="true" role="tab"> Employee Level </a></li></ul></div></div><div class="tab-content" id="pills-tabContent"><div class="tab-pane show fade active" id="org_level" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div><div class="tab-pane fade" id="team_level" role="tabpanel" aria-labelledby="pills-profile-tab"></div><div class="tab-pane fade" id="employee_level" role="tabpanel" aria-labelledby="pills-profile-tab"></div></div></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/pms/pms_forms_mgmt/PMSFormsMgmt_MainView.vue");
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
app.mount("#VJS_PMSFormsMgmt");
