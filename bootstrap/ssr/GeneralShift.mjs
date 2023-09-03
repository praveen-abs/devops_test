/* empty css                            *//* empty css                        *//* empty css                               *//* empty css                             */import { ref, resolveComponent, withCtx, createVNode, createTextVNode, useSSRContext, createApp } from "vue";
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
import MultiSelect from "primevue/multiselect";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import { ssrRenderAttrs, ssrRenderStyle, ssrRenderComponent } from "vue/server-renderer";
import { FilterMatchMode } from "primevue/api";
const GeneralShift_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "GeneralShift",
  __ssrInlineRender: true,
  setup(__props) {
    const active = ref(0);
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
      "country.name": { value: null, matchMode: FilterMatchMode.STARTS_WITH },
      representative: { value: null, matchMode: FilterMatchMode.IN },
      status: { value: null, matchMode: FilterMatchMode.EQUALS },
      verified: { value: null, matchMode: FilterMatchMode.EQUALS }
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Accordion = resolveComponent("Accordion");
      const _component_AccordionTab = resolveComponent("AccordionTab");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_InputText = resolveComponent("InputText");
      const _component_Column = resolveComponent("Column");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="card py-3" style="${ssrRenderStyle({ "border-left": "5px solid navy" })}"><div class="d-flex justify-items-start align-content-center pl-3"><button class="mt-1" style="${ssrRenderStyle({ "width": "15px" })}"><i class="fas fa-chevron-left fs-4" style="${ssrRenderStyle({ "color": "#002f56" })}"></i></button><h1 class="fw-bold fs-4 pl-3">General Shift</h1></div></div>`);
      _push(ssrRenderComponent(_component_Accordion, {
        activeIndex: active.value,
        "onUpdate:activeIndex": ($event) => active.value = $event,
        class: "mt-4"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_AccordionTab, { class: "fs-3" }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span class="fs-5 pl-5"${_scopeId2}>Summary</span>`);
                } else {
                  return [
                    createVNode("span", { class: "fs-5 pl-5" }, "Summary")
                  ];
                }
              }),
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="card p-3"${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_DataTable, {
                    paginator: "",
                    rows: 5,
                    rowsPerPageOptions: [5, 10, 20, 50],
                    class: "w-full"
                  }, {
                    header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div class="flex justify-content-start pl-2"${_scopeId3}><span class="p-input-icon-left"${_scopeId3}><i class="pi pi-search"${_scopeId3}></i>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          modelValue: filters.value["global"].value,
                          "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                          placeholder: "Keyword Search"
                        }, null, _parent4, _scopeId3));
                        _push4(`</span></div>`);
                      } else {
                        return [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ];
                      }
                    }),
                    empty: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(` No Matching Records Found `);
                      } else {
                        return [
                          createTextVNode(" No Matching Records Found ")
                        ];
                      }
                    }),
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Timing",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Monday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Tuesday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "country.name",
                          header: "Wednesday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "company",
                          header: "Thursday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "representative.name",
                          header: "Friday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "company",
                          header: "Saturday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "company",
                          header: "Sunday",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Timing",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Monday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Tuesday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "country.name",
                            header: "Wednesday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Thursday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "representative.name",
                            header: "Friday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Saturday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Sunday",
                            sortable: true
                          })
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(`<div class="d-flex justify-content-around mt-5 w-full border-bottom pb-4"${_scopeId2}><div class="d-flex fw-bold justify-content-center align-items-center"${_scopeId2}><h1 class="fw-bold mr-4"${_scopeId2}>Half Day Minimum Working Hours Required</h1><button class="btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center"${_scopeId2}>4</button><h1${_scopeId2}>Hours</h1></div><div class="d-flex fw-bold justify-content-center align-items-center"${_scopeId2}><h1 class="fw-bold mr-4"${_scopeId2}>Full Day Minimum Working Hours Required</h1> <button class="btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center"${_scopeId2}>4</button><h1${_scopeId2}>Hours</h1></div></div><div class="row d-flex align-items-center mt-2"${_scopeId2}><div class="col-2 col-sm"${_scopeId2}><h1 class="fs-5"${_scopeId2}>Grace Time</h1></div><div class="col-2 d-flex align-items-center"${_scopeId2}><button class="btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center"${_scopeId2}>30</button><p class="bg-gray"${_scopeId2}>Minutes</p></div><div class="col-5"${_scopeId2}><p class="text-danger bg-red-100 p-1 rounded"${_scopeId2}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam, maiores </p></div></div></div>`);
                } else {
                  return [
                    createVNode("div", { class: "card p-3" }, [
                      createVNode(_component_DataTable, {
                        paginator: "",
                        rows: 5,
                        rowsPerPageOptions: [5, 10, 20, 50],
                        class: "w-full"
                      }, {
                        header: withCtx(() => [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ]),
                        empty: withCtx(() => [
                          createTextVNode(" No Matching Records Found ")
                        ]),
                        default: withCtx(() => [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Timing",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Monday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Tuesday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "country.name",
                            header: "Wednesday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Thursday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "representative.name",
                            header: "Friday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Saturday",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Sunday",
                            sortable: true
                          })
                        ]),
                        _: 1
                      }),
                      createVNode("div", { class: "d-flex justify-content-around mt-5 w-full border-bottom pb-4" }, [
                        createVNode("div", { class: "d-flex fw-bold justify-content-center align-items-center" }, [
                          createVNode("h1", { class: "fw-bold mr-4" }, "Half Day Minimum Working Hours Required"),
                          createVNode("button", { class: "btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center" }, "4"),
                          createVNode("h1", null, "Hours")
                        ]),
                        createVNode("div", { class: "d-flex fw-bold justify-content-center align-items-center" }, [
                          createVNode("h1", { class: "fw-bold mr-4" }, "Full Day Minimum Working Hours Required"),
                          createTextVNode(),
                          createVNode("button", { class: "btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center" }, "4"),
                          createVNode("h1", null, "Hours")
                        ])
                      ]),
                      createVNode("div", { class: "row d-flex align-items-center mt-2" }, [
                        createVNode("div", { class: "col-2 col-sm" }, [
                          createVNode("h1", { class: "fs-5" }, "Grace Time")
                        ]),
                        createVNode("div", { class: "col-2 d-flex align-items-center" }, [
                          createVNode("button", { class: "btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center" }, "30"),
                          createVNode("p", { class: "bg-gray" }, "Minutes")
                        ]),
                        createVNode("div", { class: "col-5" }, [
                          createVNode("p", { class: "text-danger bg-red-100 p-1 rounded" }, "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam, maiores ")
                        ])
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_AccordionTab, null, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span class="fs-5 pl-5"${_scopeId2}>Employees</span>`);
                } else {
                  return [
                    createVNode("span", { class: "fs-5 pl-5" }, "Employees")
                  ];
                }
              }),
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="card p-3"${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_DataTable, {
                    paginator: "",
                    rows: 5,
                    rowsPerPageOptions: [5, 10, 20, 50],
                    class: "w-full"
                  }, {
                    header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div class="flex justify-content-start pl-2"${_scopeId3}><span class="p-input-icon-left"${_scopeId3}><i class="pi pi-search"${_scopeId3}></i>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          modelValue: filters.value["global"].value,
                          "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                          placeholder: "Keyword Search"
                        }, null, _parent4, _scopeId3));
                        _push4(`</span></div>`);
                      } else {
                        return [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ];
                      }
                    }),
                    empty: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(` No Matching Records Found `);
                      } else {
                        return [
                          createTextVNode(" No Matching Records Found ")
                        ];
                      }
                    }),
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Employee",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Employee Number",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Job Title",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "country.name",
                          header: "Reporting To",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "company",
                          header: "Department",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "representative.name",
                          header: "Loaction",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Employee",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Employee Number",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Job Title",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "country.name",
                            header: "Reporting To",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Department",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "representative.name",
                            header: "Loaction",
                            sortable: true
                          })
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", { class: "card p-3" }, [
                      createVNode(_component_DataTable, {
                        paginator: "",
                        rows: 5,
                        rowsPerPageOptions: [5, 10, 20, 50],
                        class: "w-full"
                      }, {
                        header: withCtx(() => [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ]),
                        empty: withCtx(() => [
                          createTextVNode(" No Matching Records Found ")
                        ]),
                        default: withCtx(() => [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Employee",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Employee Number",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Job Title",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "country.name",
                            header: "Reporting To",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "company",
                            header: "Department",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "representative.name",
                            header: "Loaction",
                            sortable: true
                          })
                        ]),
                        _: 1
                      })
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_AccordionTab, null, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span class="fs-5 pl-5"${_scopeId2}>WeekOffs</span>`);
                } else {
                  return [
                    createVNode("span", { class: "fs-5 pl-5" }, "WeekOffs")
                  ];
                }
              }),
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="card p-3"${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_DataTable, {
                    paginator: true,
                    rows: 10,
                    dataKey: "id",
                    paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
                    rowsPerPageOptions: [5, 10, 25],
                    sortField: "PAYROLL_MONTH",
                    sortOrder: -1,
                    currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
                    responsiveLayout: "scroll",
                    globalFilterFields: ["name"],
                    class: "w-full"
                  }, {
                    header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div class="flex justify-content-start pl-2"${_scopeId3}><span class="p-input-icon-left"${_scopeId3}><i class="pi pi-search"${_scopeId3}></i>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          modelValue: filters.value["global"].value,
                          "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                          placeholder: "Keyword Search"
                        }, null, _parent4, _scopeId3));
                        _push4(`</span></div>`);
                      } else {
                        return [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ];
                      }
                    }),
                    empty: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(` No Matching Records Found `);
                      } else {
                        return [
                          createTextVNode(" No Matching Records Found ")
                        ];
                      }
                    }),
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Week Offs",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Day Offs",
                          sortable: true
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Week Offs",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Day Offs",
                            sortable: true
                          })
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", { class: "card p-3" }, [
                      createVNode(_component_DataTable, {
                        paginator: true,
                        rows: 10,
                        dataKey: "id",
                        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
                        rowsPerPageOptions: [5, 10, 25],
                        sortField: "PAYROLL_MONTH",
                        sortOrder: -1,
                        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
                        responsiveLayout: "scroll",
                        globalFilterFields: ["name"],
                        class: "w-full"
                      }, {
                        header: withCtx(() => [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ]),
                        empty: withCtx(() => [
                          createTextVNode(" No Matching Records Found ")
                        ]),
                        default: withCtx(() => [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Week Offs",
                            sortable: true
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Day Offs",
                            sortable: true
                          })
                        ]),
                        _: 1
                      })
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_AccordionTab, null, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span class="fs-5 pl-5"${_scopeId2}>Track Shift Versions</span>`);
                } else {
                  return [
                    createVNode("span", { class: "fs-5 pl-5" }, "Track Shift Versions")
                  ];
                }
              }),
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="card p-3"${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_DataTable, {
                    paginator: "",
                    rows: 5,
                    rowsPerPageOptions: [5, 10, 20, 50],
                    class: "w-full"
                  }, {
                    header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div class="flex justify-content-start pl-2"${_scopeId3}><span class="p-input-icon-left"${_scopeId3}><i class="pi pi-search"${_scopeId3}></i>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          modelValue: filters.value["global"].value,
                          "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                          placeholder: "Keyword Search"
                        }, null, _parent4, _scopeId3));
                        _push4(`</span></div>`);
                      } else {
                        return [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ];
                      }
                    }),
                    empty: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(` No Matching Records Found `);
                      } else {
                        return [
                          createTextVNode(" No Matching Records Found ")
                        ];
                      }
                    }),
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Current Date"
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Updated Date"
                        }, null, _parent4, _scopeId3));
                        _push4(ssrRenderComponent(_component_Column, {
                          field: "name",
                          header: "Action"
                        }, null, _parent4, _scopeId3));
                      } else {
                        return [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Current Date"
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Updated Date"
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Action"
                          })
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", { class: "card p-3" }, [
                      createVNode(_component_DataTable, {
                        paginator: "",
                        rows: 5,
                        rowsPerPageOptions: [5, 10, 20, 50],
                        class: "w-full"
                      }, {
                        header: withCtx(() => [
                          createVNode("div", { class: "flex justify-content-start pl-2" }, [
                            createVNode("span", { class: "p-input-icon-left" }, [
                              createVNode("i", { class: "pi pi-search" }),
                              createVNode(_component_InputText, {
                                modelValue: filters.value["global"].value,
                                "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                                placeholder: "Keyword Search"
                              }, null, 8, ["modelValue", "onUpdate:modelValue"])
                            ])
                          ])
                        ]),
                        empty: withCtx(() => [
                          createTextVNode(" No Matching Records Found ")
                        ]),
                        default: withCtx(() => [
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Current Date"
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Updated Date"
                          }),
                          createVNode(_component_Column, {
                            field: "name",
                            header: "Action"
                          })
                        ]),
                        _: 1
                      })
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_AccordionTab, { class: "fs-3" }, {
                header: withCtx(() => [
                  createVNode("span", { class: "fs-5 pl-5" }, "Summary")
                ]),
                default: withCtx(() => [
                  createVNode("div", { class: "card p-3" }, [
                    createVNode(_component_DataTable, {
                      paginator: "",
                      rows: 5,
                      rowsPerPageOptions: [5, 10, 20, 50],
                      class: "w-full"
                    }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "flex justify-content-start pl-2" }, [
                          createVNode("span", { class: "p-input-icon-left" }, [
                            createVNode("i", { class: "pi pi-search" }),
                            createVNode(_component_InputText, {
                              modelValue: filters.value["global"].value,
                              "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                              placeholder: "Keyword Search"
                            }, null, 8, ["modelValue", "onUpdate:modelValue"])
                          ])
                        ])
                      ]),
                      empty: withCtx(() => [
                        createTextVNode(" No Matching Records Found ")
                      ]),
                      default: withCtx(() => [
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Timing",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Monday",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Tuesday",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "country.name",
                          header: "Wednesday",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "company",
                          header: "Thursday",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "representative.name",
                          header: "Friday",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "company",
                          header: "Saturday",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "company",
                          header: "Sunday",
                          sortable: true
                        })
                      ]),
                      _: 1
                    }),
                    createVNode("div", { class: "d-flex justify-content-around mt-5 w-full border-bottom pb-4" }, [
                      createVNode("div", { class: "d-flex fw-bold justify-content-center align-items-center" }, [
                        createVNode("h1", { class: "fw-bold mr-4" }, "Half Day Minimum Working Hours Required"),
                        createVNode("button", { class: "btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center" }, "4"),
                        createVNode("h1", null, "Hours")
                      ]),
                      createVNode("div", { class: "d-flex fw-bold justify-content-center align-items-center" }, [
                        createVNode("h1", { class: "fw-bold mr-4" }, "Full Day Minimum Working Hours Required"),
                        createTextVNode(),
                        createVNode("button", { class: "btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center" }, "4"),
                        createVNode("h1", null, "Hours")
                      ])
                    ]),
                    createVNode("div", { class: "row d-flex align-items-center mt-2" }, [
                      createVNode("div", { class: "col-2 col-sm" }, [
                        createVNode("h1", { class: "fs-5" }, "Grace Time")
                      ]),
                      createVNode("div", { class: "col-2 d-flex align-items-center" }, [
                        createVNode("button", { class: "btn bg-slate-300 mx-2 px-2 h-6 d-flex align-items-center" }, "30"),
                        createVNode("p", { class: "bg-gray" }, "Minutes")
                      ]),
                      createVNode("div", { class: "col-5" }, [
                        createVNode("p", { class: "text-danger bg-red-100 p-1 rounded" }, "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum numquam, maiores ")
                      ])
                    ])
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_AccordionTab, null, {
                header: withCtx(() => [
                  createVNode("span", { class: "fs-5 pl-5" }, "Employees")
                ]),
                default: withCtx(() => [
                  createVNode("div", { class: "card p-3" }, [
                    createVNode(_component_DataTable, {
                      paginator: "",
                      rows: 5,
                      rowsPerPageOptions: [5, 10, 20, 50],
                      class: "w-full"
                    }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "flex justify-content-start pl-2" }, [
                          createVNode("span", { class: "p-input-icon-left" }, [
                            createVNode("i", { class: "pi pi-search" }),
                            createVNode(_component_InputText, {
                              modelValue: filters.value["global"].value,
                              "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                              placeholder: "Keyword Search"
                            }, null, 8, ["modelValue", "onUpdate:modelValue"])
                          ])
                        ])
                      ]),
                      empty: withCtx(() => [
                        createTextVNode(" No Matching Records Found ")
                      ]),
                      default: withCtx(() => [
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Employee",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Employee Number",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Job Title",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "country.name",
                          header: "Reporting To",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "company",
                          header: "Department",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "representative.name",
                          header: "Loaction",
                          sortable: true
                        })
                      ]),
                      _: 1
                    })
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_AccordionTab, null, {
                header: withCtx(() => [
                  createVNode("span", { class: "fs-5 pl-5" }, "WeekOffs")
                ]),
                default: withCtx(() => [
                  createVNode("div", { class: "card p-3" }, [
                    createVNode(_component_DataTable, {
                      paginator: true,
                      rows: 10,
                      dataKey: "id",
                      paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
                      rowsPerPageOptions: [5, 10, 25],
                      sortField: "PAYROLL_MONTH",
                      sortOrder: -1,
                      currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
                      responsiveLayout: "scroll",
                      globalFilterFields: ["name"],
                      class: "w-full"
                    }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "flex justify-content-start pl-2" }, [
                          createVNode("span", { class: "p-input-icon-left" }, [
                            createVNode("i", { class: "pi pi-search" }),
                            createVNode(_component_InputText, {
                              modelValue: filters.value["global"].value,
                              "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                              placeholder: "Keyword Search"
                            }, null, 8, ["modelValue", "onUpdate:modelValue"])
                          ])
                        ])
                      ]),
                      empty: withCtx(() => [
                        createTextVNode(" No Matching Records Found ")
                      ]),
                      default: withCtx(() => [
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Week Offs",
                          sortable: true
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Day Offs",
                          sortable: true
                        })
                      ]),
                      _: 1
                    })
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_AccordionTab, null, {
                header: withCtx(() => [
                  createVNode("span", { class: "fs-5 pl-5" }, "Track Shift Versions")
                ]),
                default: withCtx(() => [
                  createVNode("div", { class: "card p-3" }, [
                    createVNode(_component_DataTable, {
                      paginator: "",
                      rows: 5,
                      rowsPerPageOptions: [5, 10, 20, 50],
                      class: "w-full"
                    }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "flex justify-content-start pl-2" }, [
                          createVNode("span", { class: "p-input-icon-left" }, [
                            createVNode("i", { class: "pi pi-search" }),
                            createVNode(_component_InputText, {
                              modelValue: filters.value["global"].value,
                              "onUpdate:modelValue": ($event) => filters.value["global"].value = $event,
                              placeholder: "Keyword Search"
                            }, null, 8, ["modelValue", "onUpdate:modelValue"])
                          ])
                        ])
                      ]),
                      empty: withCtx(() => [
                        createTextVNode(" No Matching Records Found ")
                      ]),
                      default: withCtx(() => [
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Current Date"
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Updated Date"
                        }),
                        createVNode(_component_Column, {
                          field: "name",
                          header: "Action"
                        })
                      ]),
                      _: 1
                    })
                  ])
                ]),
                _: 1
              })
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/GeneralShift/GeneralShift.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
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
app.component("MultiSelect", MultiSelect);
app.component("Accordion", Accordion);
app.component("AccordionTab", AccordionTab);
app.mount("#General_Shift");
