import { mergeProps, unref, useSSRContext, ref, computed, resolveComponent, resolveDirective, withCtx, withDirectives, openBlock, createBlock, createVNode, toDisplayString, createTextVNode, createCommentVNode, vModelText, onMounted, vModelRadio } from "vue";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderComponent, ssrGetDirectiveProps, ssrIncludeBooleanAttr, ssrRenderStyle, ssrRenderAttr, ssrRenderClass, ssrLooseEqual } from "vue/server-renderer";
import { i as investmentMainStore } from "./investmentMainStore46681.js";
import useValidate from "@vuelidate/core";
import { helpers, required } from "@vuelidate/validators";
import moment from "moment";
import { p as profilePagesStore } from "./ProfilePagesStore46681.js";
import "axios";
import "./LoadingSpinner46681.js";
import { S as Service } from "./Service46681.js";
import "dayjs";
const _sfc_main$8 = {
  __name: "tax_saving_investments",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "mb-3 tw-card" }, _attrs))}><div class="flex items-center justify-between mb-3"><h6 class="text-2xl font-semibold">Tax Saving Investment </h6><select name="" id="" class="w-1/6 border-orange form-select disabled_focus"><option value="" selected hidden disabled>Apr 2023 - Mar 2024 </option></select></div><div class="my-6 widget-card"><div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4 lg:grid-cols-4"><div class="p-2 text-center bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400"><p class="mb-2 font-semibold fs-6">Declared Amount </p><h6 class="text-lg font-bold">${ssrInterpolate(unref(investmentStore).formatCurrency(unref(investmentStore).taxSavingInvestments.declared_amt))}</h6></div><div class="p-2 text-center bg-indigo-100 border-l-4 rounded-lg tw-card border-l-indigo-400"><p class="mb-2 font-semibold fs-6">Approved Amount</p><h6 class="text-lg font-bold">INR ${ssrInterpolate(unref(investmentStore).formatCurrency(unref(investmentStore).taxSavingInvestments.max_limit))}</h6></div><div class="p-2 text-center bg-green-100 border-l-4 rounded-lg tw-card border-l-green-400"><p class="mb-2 font-semibold fs-6">Status</p>`);
      if (unref(investmentStore).isSubmitted == 0) {
        _push(`<h6 class="text-lg font-bold">Submitted</h6>`);
      } else if (unref(investmentStore).isSubmitted == 1) {
        _push(`<h6 class="text-lg font-bold">Drafted</h6>`);
      } else {
        _push(`<h6 class="text-lg font-bold">${ssrInterpolate(unref(investmentStore).taxSavingInvestments.status)}</h6>`);
      }
      _push(`</div><div class="p-2 text-center border-l-4 rounded-lg tw-card bg-violet-100 border-l-violet-400"><p class="mb-2 font-semibold fs-6">Late Date For Submission</p><h6 class="text-lg font-bold">${ssrInterpolate(new Date().toLocaleString("default", { month: "long" }))} 27, ${ssrInterpolate(new Date().getFullYear())}</h6></div></div></div></div>`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/tax_saving_investments/tax_saving_investments.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const hra_vue_vue_type_style_index_0_lang = "";
const _sfc_main$7 = {
  __name: "hra",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    profilePagesStore();
    ref(new Date(investmentStore.employeDoj));
    const dojValidation = (value) => {
      console.log("Current Date" + value);
      console.log("Employee DOJ" + new Date(investmentStore.employeDoj));
      if (new Date(investmentStore.employeDoj) < value) {
        return true;
      } else {
        return false;
      }
    };
    const panValidation = (value) => {
      if (investmentStore.hra.total_rent_paid >= 1e5) {
        if (value) {
          return true;
        }
      } else {
        return true;
      }
    };
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const rules = computed(() => {
      return {
        from_month: { required: helpers.withMessage("From month is required", required), dojValidation: helpers.withMessage("Must be greater than date of Joining!", dojValidation) },
        to_month: { required },
        city: { required },
        total_rent_paid: { required },
        landlord_name: { required },
        landlord_PAN: { required: helpers.withMessage("Rent Paid is 1 lakh and above landlord PAN is mandatory!", panValidation) },
        address: { required }
      };
    });
    const v$ = useValidate(rules, investmentStore.hra);
    const submitForm = () => {
      console.log(panValidation);
      console.log(v$.value);
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.saveHraNewRental();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_Textarea = resolveComponent("Textarea");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div class="mb-4 tw-card bg-gray-50"><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 10,
        value: unref(investmentStore).hraSource,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        editingRows: unref(investmentStore).editingRowSource,
        "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
        editMode: "row",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Sections",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Particulars",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reference",
              header: "References ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button${ssrRenderAttrs(mergeProps({
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                } else {
                  return [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              header: "Declaration Amount",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.json_popups_value) {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(unref(investmentStore).sumOfTotalRentPaid))}</div>`);
                  } else {
                    _push3(`<div${_scopeId2}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4"${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""}${_scopeId2}><i class="fa fa-plus-circle me-2" aria-hidden="true"${_scopeId2}></i> Add Rented</button></div>`);
                  }
                } else {
                  return [
                    slotProps.data.json_popups_value ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(unref(investmentStore).sumOfTotalRentPaid)), 1)) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("button", {
                        class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4",
                        disabled: !unref(investmentStore).isSubmitted,
                        onClick: ($event) => unref(investmentStore).dailogAddNewRental = true
                      }, [
                        createVNode("i", {
                          class: "fa fa-plus-circle me-2",
                          "aria-hidden": "true"
                        }),
                        createTextVNode(" Add Rented")
                      ], 8, ["disabled", "onClick"])
                    ]))
                  ];
                }
              }),
              editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "w-5 text-lg font-semibold"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "w-5 text-lg font-semibold"
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.json_popups_value) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  withDirectives((openBlock(), createBlock("button", {
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, [
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-warning",
                      "aria-hidden": "true"
                    })
                  ])), [
                    [_directive_tooltip, slotProps.data.reference]
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.json_popups_value ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(unref(investmentStore).sumOfTotalRentPaid)), 1)) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("button", {
                      class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4",
                      disabled: !unref(investmentStore).isSubmitted,
                      onClick: ($event) => unref(investmentStore).dailogAddNewRental = true
                    }, [
                      createVNode("i", {
                        class: "fa fa-plus-circle me-2",
                        "aria-hidden": "true"
                      }),
                      createTextVNode(" Add Rented")
                    ], 8, ["disabled", "onClick"])
                  ]))
                ]),
                editor: withCtx(({ data, field }) => [
                  createVNode(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "w-5 text-lg font-semibold"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ]))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><div class="bg-gray-50 tw-card rounded-xl"><div class="flex justify-between mb-3"><span class="mx-4 my-2 mt-2 text-2xl font-semibold text-indigo-950">Rental Property</span>`);
      if (unref(investmentStore).AddHraButtonDisabled) {
        _push(`<button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="my-3 mr-4 btn btn-border-orange"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i> Add Rented</button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-3 col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12"><div class="mb-3 table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        value: unref(investmentStore).hra_data,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Landlord Name",
              field: "json_popups_value.landlord_name",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "json_popups_value.landlord_PAN",
              header: "Landlord PAN",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.json_popups_value.landlord_PAN) {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.landlord_PAN.toUpperCase())}</p>`);
                  } else {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>NA</p>`);
                  }
                } else {
                  return [
                    slotProps.data.json_popups_value.landlord_PAN ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(slotProps.data.json_popups_value.landlord_PAN.toUpperCase()), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, "NA"))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "json_popups_value.from_month",
              header: "From Month ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(moment)(slotProps.data.json_popups_value.from_month).format("DD-MM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(moment)(slotProps.data.json_popups_value.from_month).format("DD-MM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "json_popups_value.to_month",
              header: "To Month",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(moment)(slotProps.data.json_popups_value.to_month).format("DD-MM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(moment)(slotProps.data.json_popups_value.to_month).format("DD-MM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "json_popups_value.city",
              header: "City",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "json_popups_value.total_rent_paid",
              header: "Total Rent",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            if (unref(investmentStore).isSubmitted) {
              _push2(ssrRenderComponent(_component_Column, {
                field: "",
                header: "Action",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-2 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button>`);
                  } else {
                    return [
                      createVNode("button", {
                        class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                        onClick: ($event) => unref(investmentStore).editHraNewRental(slotProps.data)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-6 h-6"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                          })
                        ]))
                      ], 8, ["onClick"]),
                      createVNode("button", {
                        class: "p-2 bg-red-200 border-red-500 rounded-xl",
                        onClick: ($event) => unref(investmentStore).deleteRentalDetails(slotProps.data)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-6 h-6 font-bold"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                          })
                        ]))
                      ], 8, ["onClick"])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode(_component_Column, {
                header: "Landlord Name",
                field: "json_popups_value.landlord_name",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "json_popups_value.landlord_PAN",
                header: "Landlord PAN",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.json_popups_value.landlord_PAN ? (openBlock(), createBlock("p", {
                    key: 0,
                    style: { "font-weight": "501" }
                  }, toDisplayString(slotProps.data.json_popups_value.landlord_PAN.toUpperCase()), 1)) : (openBlock(), createBlock("p", {
                    key: 1,
                    style: { "font-weight": "501" }
                  }, "NA"))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "json_popups_value.from_month",
                header: "From Month ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(moment)(slotProps.data.json_popups_value.from_month).format("DD-MM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "json_popups_value.to_month",
                header: "To Month",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(moment)(slotProps.data.json_popups_value.to_month).format("DD-MM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "json_popups_value.city",
                header: "City",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "json_popups_value.total_rent_paid",
                header: "Total Rent",
                style: { "min-width": "12rem" }
              }),
              unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                key: 0,
                field: "",
                header: "Action",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                    onClick: ($event) => unref(investmentStore).editHraNewRental(slotProps.data)
                  }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-6 h-6"
                    }, [
                      createVNode("path", {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                      })
                    ]))
                  ], 8, ["onClick"]),
                  createVNode("button", {
                    class: "p-2 bg-red-200 border-red-500 rounded-xl",
                    onClick: ($event) => unref(investmentStore).deleteRentalDetails(slotProps.data)
                  }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-6 h-6 font-bold"
                    }, [
                      createVNode("path", {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                      })
                    ]))
                  ], 8, ["onClick"])
                ]),
                _: 1
              })) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailogAddNewRental,
        "onUpdate:visible": ($event) => unref(investmentStore).dailogAddNewRental = $event,
        modal: true,
        closable: true,
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<span class="text-lg font-semibold modal-title text-indigo-950"${_scopeId}>Add New Rental</span>`);
          } else {
            return [
              createVNode("span", { class: "text-lg font-semibold modal-title text-indigo-950" }, "Add New Rental")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"${_scopeId}><div class=""${_scopeId}><label for="rentFrom_month" class="block mb-2 font-medium text-gray-900"${_scopeId}>From Month <span class="text-red-600"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              view: "month",
              minDate: new Date("04/01/2023"),
              maxDate: new Date("03/31/2024"),
              dateFormat: "mm/yy",
              modelValue: unref(investmentStore).hra.from_month,
              "onUpdate:modelValue": ($event) => unref(investmentStore).hra.from_month = $event,
              class: ["w-full", [
                unref(v$).from_month.$error ? "p-invalid" : ""
              ]],
              showIcon: "",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).from_month.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).from_month.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="toFrom_month" class="block mb-2 font-medium text-gray-900"${_scopeId}>To Month <span class="text-red-600"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              view: "month",
              minDate: new Date("04/01/2023"),
              maxDate: new Date("03/31/2024"),
              dateFormat: "mm/yy",
              modelValue: unref(investmentStore).hra.to_month,
              "onUpdate:modelValue": ($event) => unref(investmentStore).hra.to_month = $event,
              class: ["w-full", [
                unref(v$).to_month.$error ? "p-invalid" : ""
              ]],
              showIcon: "",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).to_month.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).to_month.required.$message.replace("Value", "To month"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="metro_city" class="block mb-2 font-medium text-gray-900"${_scopeId}>City</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              editable: "",
              class: ["w-full", [
                unref(v$).city.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).hra.city,
              "onUpdate:modelValue": ($event) => unref(investmentStore).hra.city = $event,
              options: unref(investmentStore).metrocitiesOption,
              optionLabel: "name",
              optionValue: "value",
              placeholder: "Select City",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).city.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).city.required.$message.replace("Value", "City"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="rendPaid_inp" class="block mb-2 font-medium text-gray-900"${_scopeId}>Total Rent Paid</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              type: "text",
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).total_rent_paid.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).hra.total_rent_paid,
              "onUpdate:modelValue": ($event) => unref(investmentStore).hra.total_rent_paid = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).total_rent_paid.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).total_rent_paid.required.$message.replace("Value", "Total rent paid"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"${_scopeId}><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}>Landlord Name <span class="text-red-600"${_scopeId}>*</span></label><input type="text" id="lender_name"${ssrRenderAttr("value", unref(investmentStore).hra.landlord_name)} required class="${ssrRenderClass([[
              unref(v$).landlord_name.$error ? "border border-red-500" : ""
            ], "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 capitalize"])}"${_scopeId}>`);
            if (unref(v$).landlord_name.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).landlord_name.required.$message.replace("Value", "Landlord name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}>Landlord PAN </label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "serial",
              mask: "aaaaa9999a",
              class: ["w-full", [
                unref(v$).landlord_PAN.$error ? "p-invalid" : ""
              ]],
              placeholder: "AHFCS1234F",
              style: { "text-transform": "uppercase" },
              modelValue: unref(investmentStore).hra.landlord_PAN,
              "onUpdate:modelValue": ($event) => unref(investmentStore).hra.landlord_PAN = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).landlord_PAN.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).landlord_PAN.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="grid mb-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1"${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}> Address <span class="text-red-600"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              name: "",
              id: "",
              autoResize: "",
              rows: "5",
              cols: "30",
              class: ["bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [
                unref(v$).address.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).hra.address,
              "onUpdate:modelValue": ($event) => unref(investmentStore).hra.address = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).address.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).address.required.$message.replace("Value", "Address"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md" type="button"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "rentFrom_month",
                    class: "block mb-2 font-medium text-gray-900"
                  }, [
                    createTextVNode("From Month "),
                    createVNode("span", { class: "text-red-600" }, "*")
                  ]),
                  createVNode(_component_Calendar, {
                    view: "month",
                    minDate: new Date("04/01/2023"),
                    maxDate: new Date("03/31/2024"),
                    dateFormat: "mm/yy",
                    modelValue: unref(investmentStore).hra.from_month,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).hra.from_month = $event,
                    class: ["w-full", [
                      unref(v$).from_month.$error ? "p-invalid" : ""
                    ]],
                    showIcon: "",
                    required: ""
                  }, null, 8, ["minDate", "maxDate", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).from_month.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).from_month.$errors[0].$message), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "toFrom_month",
                    class: "block mb-2 font-medium text-gray-900"
                  }, [
                    createTextVNode("To Month "),
                    createVNode("span", { class: "text-red-600" }, "*")
                  ]),
                  createVNode(_component_Calendar, {
                    view: "month",
                    minDate: new Date("04/01/2023"),
                    maxDate: new Date("03/31/2024"),
                    dateFormat: "mm/yy",
                    modelValue: unref(investmentStore).hra.to_month,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).hra.to_month = $event,
                    class: ["w-full", [
                      unref(v$).to_month.$error ? "p-invalid" : ""
                    ]],
                    showIcon: "",
                    required: ""
                  }, null, 8, ["minDate", "maxDate", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).to_month.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).to_month.required.$message.replace("Value", "To month")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "metro_city",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "City"),
                  createVNode(_component_Dropdown, {
                    editable: "",
                    class: ["w-full", [
                      unref(v$).city.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).hra.city,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).hra.city = $event,
                    options: unref(investmentStore).metrocitiesOption,
                    optionLabel: "name",
                    optionValue: "value",
                    placeholder: "Select City",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(v$).city.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).city.required.$message.replace("Value", "City")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "rendPaid_inp",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Total Rent Paid"),
                  createVNode(_component_InputNumber, {
                    type: "text",
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).total_rent_paid.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).hra.total_rent_paid,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).hra.total_rent_paid = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).total_rent_paid.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).total_rent_paid.required.$message.replace("Value", "Total rent paid")), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "grid mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, [
                    createTextVNode("Landlord Name "),
                    createVNode("span", { class: "text-red-600" }, "*")
                  ]),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "lender_name",
                    onKeypress: ($event) => isLetter($event),
                    class: ["bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 capitalize", [
                      unref(v$).landlord_name.$error ? "border border-red-500" : ""
                    ]],
                    "onUpdate:modelValue": ($event) => unref(investmentStore).hra.landlord_name = $event,
                    required: ""
                  }, null, 42, ["onKeypress", "onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).hra.landlord_name]
                  ]),
                  unref(v$).landlord_name.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).landlord_name.required.$message.replace("Value", "Landlord name")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Landlord PAN "),
                  createVNode(_component_InputMask, {
                    id: "serial",
                    mask: "aaaaa9999a",
                    class: ["w-full", [
                      unref(v$).landlord_PAN.$error ? "p-invalid" : ""
                    ]],
                    placeholder: "AHFCS1234F",
                    style: { "text-transform": "uppercase" },
                    modelValue: unref(investmentStore).hra.landlord_PAN,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).hra.landlord_PAN = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).landlord_PAN.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).landlord_PAN.$errors[0].$message), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "grid mb-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1" }, [
                createVNode("label", {
                  for: "lender_name",
                  class: "block mb-2 font-medium text-gray-900"
                }, [
                  createTextVNode(" Address "),
                  createVNode("span", { class: "text-red-600" }, "*")
                ]),
                createVNode(_component_Textarea, {
                  name: "",
                  id: "",
                  autoResize: "",
                  rows: "5",
                  cols: "30",
                  class: ["bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [
                    unref(v$).address.$error ? "border border-red-500" : ""
                  ]],
                  modelValue: unref(investmentStore).hra.address,
                  "onUpdate:modelValue": ($event) => unref(investmentStore).hra.address = $event,
                  required: ""
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                unref(v$).address.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).address.required.$message.replace("Value", "Address")), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  type: "button",
                  onClick: submitForm
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/hra/hra.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const _sfc_main$6 = {
  __name: "section_80cc_80ccc",
  __ssrInlineRender: true,
  setup(__props) {
    ref();
    const investmentStore = investmentMainStore();
    const onRowEditSave = (event) => {
      let { newData, index } = event;
      investmentStore.section80ccSource[index] = newData;
      investmentStore.updatedRowSource = newData;
      investmentStore.getFormId = 1;
      var data = {
        fs_id: newData.fs_id,
        declaration_amount: newData.dec_amount
      };
      investmentStore.formDataSource.push(data);
      console.log(newData);
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        resizableColumns: "",
        columnResizeMode: "expand",
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 25,
        value: unref(investmentStore).section80ccSource,
        editMode: "row",
        editingRows: unref(investmentStore).editingRowSource,
        "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        onRowEditSave,
        tableClass: "editable-cells-table",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Sections",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Particulars",
              style: { "min-width": "18rem", "text-align": "left !important" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reference",
              header: "References ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button${ssrRenderAttrs(mergeProps({
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                } else {
                  return [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, { style: { "min-width": "2rem" } }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>Max Limit</p><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>(₹ 1,50,000)</p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, "Max Limit"),
                    createVNode("p", { style: { "font-weight": "501" } }, "(₹ 1,50,000)")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              header: "Declaration Amount",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.particular == "Employee PF (Payroll Deduction)") {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(unref(investmentStore).epfPayrollDeduction))}</div>`);
                  } else if (slotProps.data.particular == "Voluntary Provident Fund (VPF) ( Payroll Deduction)") {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(unref(investmentStore).vpfPayrollDeduction))}</div>`);
                  } else if (slotProps.data.dec_amount) {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</div>`);
                  } else {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  }
                } else {
                  return [
                    slotProps.data.particular == "Employee PF (Payroll Deduction)" ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(unref(investmentStore).epfPayrollDeduction)), 1)) : slotProps.data.particular == "Voluntary Provident Fund (VPF) ( Payroll Deduction)" ? (openBlock(), createBlock("div", {
                      key: 1,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(unref(investmentStore).vpfPayrollDeduction)), 1)) : slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                      key: 2,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 3 }, [
                      createVNode(_component_InputNumber, {
                        class: "text-lg font-semibold w-28",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                    ]))
                  ];
                }
              }),
              editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "text-lg font-semibold w-28"
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            if (unref(investmentStore).isSubmitted) {
              _push2(ssrRenderComponent(_component_Column, {
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              }, null, _parent2, _scopeId));
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "18rem", "text-align": "left !important" }
              }),
              createVNode(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  withDirectives((openBlock(), createBlock("button", {
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, [
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-warning",
                      "aria-hidden": "true"
                    })
                  ])), [
                    [_directive_tooltip, slotProps.data.reference]
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, { style: { "min-width": "2rem" } }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, "Max Limit"),
                  createVNode("p", { style: { "font-weight": "501" } }, "(₹ 1,50,000)")
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.particular == "Employee PF (Payroll Deduction)" ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(unref(investmentStore).epfPayrollDeduction)), 1)) : slotProps.data.particular == "Voluntary Provident Fund (VPF) ( Payroll Deduction)" ? (openBlock(), createBlock("div", {
                    key: 1,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(unref(investmentStore).vpfPayrollDeduction)), 1)) : slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                    key: 2,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 3 }, [
                    createVNode(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                  ]))
                ]),
                editor: withCtx(({ data, field }) => [
                  createVNode(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ]))
                ]),
                _: 1
              }),
              unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                key: 0,
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              })) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/section_80cc_80ccc/section_80cc_80ccc.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const other_exemption_vue_vue_type_style_index_0_lang = "";
const _sfc_main$5 = {
  __name: "other_exemption",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    ref([]);
    const rulesSec80E = computed(() => {
      return {
        loan_sanction_date: { required },
        lender_type: { required },
        property_value: { required },
        loan_amount: { required },
        interest_amount_paid: { required }
      };
    });
    const v$ = useValidate(rulesSec80E, investmentStore.other_exe_80EE);
    const submitForm80EE = () => {
      console.log(v$.value);
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.save80EE();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    const rulesSec80EA = computed(() => {
      return {
        loan_sanction_date: { required },
        lender_type: { required },
        property_value: { required },
        loan_amount: { required },
        interest_amount_paid: { required }
      };
    });
    const s$ = useValidate(rulesSec80EA, investmentStore.other_exe_80EEA);
    const submitForm80EEA = () => {
      console.log(s$.value);
      s$.value.$validate();
      if (!s$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.save80EEA();
        s$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    const rulesSec80EB = computed(() => {
      return {
        loan_sanction_date: { required },
        vechicle_brand: { required },
        vechicle_model: { required },
        interest_amount_paid: { required }
      };
    });
    const p$ = useValidate(rulesSec80EB, investmentStore.other_exe_80EEB);
    const submitForm80EEB = () => {
      console.log(p$.value);
      p$.value.$validate();
      if (!p$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.save80EEB();
        p$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    onMounted(() => {
    });
    const onRowEditSave = (event) => {
      let { newData, index } = event;
      investmentStore.otherExemptionSource[index] = newData;
      investmentStore.updatedRowSource = newData;
      investmentStore.getFormId = 1;
      var data = {
        fs_id: newData.fs_id,
        declaration_amount: newData.dec_amount,
        select_option: newData.select_option
      };
      investmentStore.formDataSource.push(data);
      console.log(newData);
    };
    const vechicle_model_options = ref();
    const lender_types = ref([
      { name: "Financial Institution", code: "Financial Institution" },
      { name: "Others", code: "Others" }
    ]);
    const vechicle_types = ref([
      { id: 1, vechicle_model: "Tata", value: "Tata" },
      { id: 2, vechicle_model: "Mahindra", value: "Mahindra" },
      { id: 3, vechicle_model: "Hyundai", value: "Hyundai" },
      { id: 4, vechicle_model: "Kia", value: "Kia" },
      { id: 5, vechicle_model: "MG", value: "MG" }
    ]);
    const switchVechileModel = (vechicle_brand) => {
      console.log("function called");
      console.log(vechicle_brand);
      if (vechicle_brand == "Tata") {
        console.log("tata");
        vechicle_model_options.value = [
          { id: 1, vechicle_model: "Tata Tigor", value: "Tata Tigor" },
          { id: 2, vechicle_model: "Tata Nexon", value: "Tata Nexon" },
          { id: 3, vechicle_model: "Tata AVINYA", value: "Tata AVINYA" },
          { id: 4, vechicle_model: "Tata Punch", value: "Tata Punch" },
          { id: 5, vechicle_model: "Tata CURVV SUV Coupe", value: "Tata CURVV SUV Coupe" },
          { id: 6, vechicle_model: "Tata Tiago", value: "Tata Tiago" }
        ];
      } else {
        if (vechicle_brand == "Mahindra") {
          vechicle_model_options.value = [
            { id: 1, vechicle_model: "Mahindra eVerito", value: "Mahindra eVerito" },
            { id: 2, vechicle_model: "Mahindra e2oPlus", value: "Mahindra e2oPlus" },
            { id: 3, vechicle_model: "Mahindra eSupro", value: "Mahindra eSupro" },
            { id: 4, vechicle_model: "Mahindra Treo", value: "Mahindra Treo" },
            { id: 5, vechicle_model: "Mahindra Treo Zor", value: "Mahindra Treo Zor" },
            { id: 6, vechicle_model: "Mahindra eAlfa Mini", value: "Mahindra eAlfa Mini" },
            { id: 7, vechicle_model: "Mahindra  XUV400 EV", value: "Mahindra  XUV400 EV" },
            { id: 8, vechicle_model: "Mahindra  Mahindra E Verito", value: "Mahindra  Mahindra E Verito" }
          ];
        } else if (vechicle_brand == "Hyundai") {
          vechicle_model_options.value = [
            { id: 1, vechicle_model: "Hyundai Kona Electric", value: "Hyundai Kona Electric" },
            { id: 2, vechicle_model: "Hyundai IONIQ 5", value: "Hyundai IONIQ 5" },
            { id: 3, vechicle_model: "Mahindra eSupro", value: "Mahindra eSupro" }
          ];
        } else if (vechicle_brand == "Kia") {
          vechicle_model_options.value = [
            { id: 1, vechicle_model: "Kia EV6", value: "Kia EV6" }
          ];
        } else if (vechicle_brand == "MG") {
          vechicle_model_options.value = [
            { id: 1, vechicle_model: "MG ZS EV", value: "MG ZS EV" }
          ];
        } else {
          console.log("no more Brand");
        }
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div>`);
      if (unref(investmentStore).otherExemptionSource) {
        _push(`<div class="table-responsive">`);
        _push(ssrRenderComponent(_component_DataTable, {
          ref: "dt",
          resizableColumns: "",
          columnResizeMode: "expand",
          dataKey: "fs_id",
          paginator: true,
          rows: 25,
          value: unref(investmentStore).otherExemptionSource,
          onRowEditSave,
          tableClass: "editable-cells-table",
          editMode: "row",
          editingRows: unref(investmentStore).editingRowSource,
          "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
          responsiveLayout: "scroll",
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "2rem" }
              }, null, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "15rem", "text-align": "left !important" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data.section == "80DD") {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.particular)}</p><div class="flex py-2"${_scopeId2}><input type="radio" name="80DD" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_1)) ? " checked" : ""}${ssrRenderAttr("value", slotProps.data.section_option_1)}${ssrIncludeBooleanAttr(slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_1)}</p></div><div class="flex py-2"${_scopeId2}><input type="radio" name="80DD" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_2)) ? " checked" : ""}${ssrRenderAttr("value", slotProps.data.section_option_2)}${ssrIncludeBooleanAttr(slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_2)}</p></div></div>`);
                    } else if (slotProps.data.section == "80DDB") {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.particular)}</p><div class="flex py-2"${_scopeId2}><input type="radio" name="80DDB" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_1)) ? " checked" : ""} class="form-check-input"${ssrRenderAttr("value", slotProps.data.section_option_1)}${ssrIncludeBooleanAttr(slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_1)}</p></div><div class="flex py-2"${_scopeId2}><input type="radio" name="80DDB" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_2)) ? " checked" : ""}${ssrRenderAttr("value", slotProps.data.section_option_2)}${ssrIncludeBooleanAttr(slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_2)}</p></div></div>`);
                    } else if (slotProps.data.section == "80U") {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.particular)}</p><div class="flex py-2"${_scopeId2}><input type="radio" name="80U" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_1)) ? " checked" : ""}${ssrRenderAttr("value", slotProps.data.section_option_1)}${ssrIncludeBooleanAttr(slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_1)}</p></div><div class="flex py-2"${_scopeId2}><input type="radio" name="80U" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_2)) ? " checked" : ""}${ssrRenderAttr("value", slotProps.data.section_option_2)}${ssrIncludeBooleanAttr(slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_2)}</p></div></div>`);
                    } else {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.particular)}</p></div>`);
                    }
                  } else {
                    return [
                      slotProps.data.section == "80DD" ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                        createVNode("div", { class: "flex py-2" }, [
                          withDirectives(createVNode("input", {
                            type: "radio",
                            name: "80DD",
                            id: "",
                            style: { "height": "20px", "width": "20px" },
                            class: "form-check-input",
                            "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                            value: slotProps.data.section_option_1,
                            checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                          }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                            [vModelRadio, slotProps.data.select_option]
                          ]),
                          createVNode("p", {
                            class: "mx-2",
                            style: { "font-weight": "501" }
                          }, toDisplayString(slotProps.data.section_option_1), 1)
                        ]),
                        createVNode("div", { class: "flex py-2" }, [
                          withDirectives(createVNode("input", {
                            type: "radio",
                            name: "80DD",
                            id: "",
                            style: { "height": "20px", "width": "20px" },
                            class: "form-check-input",
                            "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                            value: slotProps.data.section_option_2,
                            checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                          }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                            [vModelRadio, slotProps.data.select_option]
                          ]),
                          createVNode("p", {
                            class: "mx-2",
                            style: { "font-weight": "501" }
                          }, toDisplayString(slotProps.data.section_option_2), 1)
                        ])
                      ])) : slotProps.data.section == "80DDB" ? (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                        createVNode("div", { class: "flex py-2" }, [
                          withDirectives(createVNode("input", {
                            type: "radio",
                            name: "80DDB",
                            id: "",
                            style: { "height": "20px", "width": "20px" },
                            "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                            class: "form-check-input",
                            value: slotProps.data.section_option_1,
                            checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                          }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                            [vModelRadio, slotProps.data.select_option]
                          ]),
                          createVNode("p", {
                            class: "mx-2",
                            style: { "font-weight": "501" }
                          }, toDisplayString(slotProps.data.section_option_1), 1)
                        ]),
                        createVNode("div", { class: "flex py-2" }, [
                          withDirectives(createVNode("input", {
                            type: "radio",
                            name: "80DDB",
                            id: "",
                            style: { "height": "20px", "width": "20px" },
                            class: "form-check-input",
                            "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                            value: slotProps.data.section_option_2,
                            checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                          }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                            [vModelRadio, slotProps.data.select_option]
                          ]),
                          createVNode("p", {
                            class: "mx-2",
                            style: { "font-weight": "501" }
                          }, toDisplayString(slotProps.data.section_option_2), 1)
                        ])
                      ])) : slotProps.data.section == "80U" ? (openBlock(), createBlock("div", { key: 2 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                        createVNode("div", { class: "flex py-2" }, [
                          withDirectives(createVNode("input", {
                            type: "radio",
                            name: "80U",
                            id: "",
                            style: { "height": "20px", "width": "20px" },
                            class: "form-check-input",
                            "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                            value: slotProps.data.section_option_1,
                            checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                          }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                            [vModelRadio, slotProps.data.select_option]
                          ]),
                          createVNode("p", {
                            class: "mx-2",
                            style: { "font-weight": "501" }
                          }, toDisplayString(slotProps.data.section_option_1), 1)
                        ]),
                        createVNode("div", { class: "flex py-2" }, [
                          withDirectives(createVNode("input", {
                            type: "radio",
                            name: "80U",
                            id: "",
                            style: { "height": "20px", "width": "20px" },
                            class: "form-check-input",
                            "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                            value: slotProps.data.section_option_2,
                            checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                          }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                            [vModelRadio, slotProps.data.select_option]
                          ]),
                          createVNode("p", {
                            class: "mx-2",
                            style: { "font-weight": "501" }
                          }, toDisplayString(slotProps.data.section_option_2), 1)
                        ])
                      ])) : (openBlock(), createBlock("div", { key: 3 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1)
                      ]))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<button${ssrRenderAttrs(mergeProps({
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                  } else {
                    return [
                      withDirectives((openBlock(), createBlock("button", {
                        type: "button",
                        class: "border-0 outline-none btn btn-transprarent"
                      }, [
                        createVNode("i", {
                          class: "fa fa-exclamation-circle text-warning",
                          "aria-hidden": "true"
                        })
                      ])), [
                        [_directive_tooltip, slotProps.data.reference]
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "max_amount",
                header: "Max Limit",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data.section == "80DD") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.select_option == "Normal Disability ( 40% to 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(75e3))}</p>`);
                      } else if (slotProps.data.select_option == "Severe Disability (More than 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(125e3))}</p>`);
                      } else if (slotProps.data.selected_section_options == "Normal Disability ( 40% to 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(75e3))}</p>`);
                      } else if (slotProps.data.selected_section_options == "Severe Disability (More than 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(125e3))}</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80DDB") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.select_option == "Individuals (less than 60 years)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(4e4))}</p>`);
                      } else if (slotProps.data.select_option == "Senior citizen (aged 60 years or more)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(1e5))}</p>`);
                      } else if (slotProps.data.selected_section_options == "Individuals (less than 60 years)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(4e4))}</p>`);
                      } else if (slotProps.data.selected_section_options == "Senior citizen (aged 60 years or more)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(1e5))}</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80U") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.select_option == "Normal Disability ( 40% to 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(75e3))}</p>`);
                      } else if (slotProps.data.select_option == "Severe Disability (More than 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(125e3))}</p>`);
                      } else if (slotProps.data.selected_section_options == "Normal Disability ( 40% to 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(75e3))}</p>`);
                      } else if (slotProps.data.selected_section_options == "Severe Disability (More than 80%)") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(125e3))}</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p>`);
                      }
                      _push3(`</div>`);
                    } else {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.max_amount))}</p></div>`);
                    }
                  } else {
                    return [
                      slotProps.data.section == "80DD" ? (openBlock(), createBlock("div", { key: 0 }, [
                        slotProps.data.select_option == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.select_option == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : slotProps.data.selected_section_options == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                          key: 2,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.selected_section_options == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                          key: 3,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : (openBlock(), createBlock("p", {
                          key: 4,
                          style: { "font-weight": "501" }
                        }, "--"))
                      ])) : slotProps.data.section == "80DDB" ? (openBlock(), createBlock("div", { key: 1 }, [
                        slotProps.data.select_option == "Individuals (less than 60 years)" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(4e4)), 1)) : slotProps.data.select_option == "Senior citizen (aged 60 years or more)" ? (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(1e5)), 1)) : slotProps.data.selected_section_options == "Individuals (less than 60 years)" ? (openBlock(), createBlock("p", {
                          key: 2,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(4e4)), 1)) : slotProps.data.selected_section_options == "Senior citizen (aged 60 years or more)" ? (openBlock(), createBlock("p", {
                          key: 3,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(1e5)), 1)) : (openBlock(), createBlock("p", {
                          key: 4,
                          style: { "font-weight": "501" }
                        }, "--"))
                      ])) : slotProps.data.section == "80U" ? (openBlock(), createBlock("div", { key: 2 }, [
                        slotProps.data.select_option == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.select_option == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : slotProps.data.selected_section_options == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                          key: 2,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.selected_section_options == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                          key: 3,
                          style: { "font-weight": "501" }
                        }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : (openBlock(), createBlock("p", {
                          key: 4,
                          style: { "font-weight": "501" }
                        }, "--"))
                      ])) : (openBlock(), createBlock("div", { key: 3 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.max_amount)), 1)
                      ]))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data.section == "80EE") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.json_popups_value) {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                      } else {
                        _push3(`<div class="px-auto"${_scopeId2}><button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId2}>Add 80EE</button></div>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80EEA") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.json_popups_value) {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                      } else {
                        _push3(`<div${_scopeId2}><button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId2}>Add 80EEA</button></div>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80EEB") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.json_popups_value) {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                      } else {
                        _push3(`<div${_scopeId2}><button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId2}>Add 80EEB</button></div>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80DD") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.selected_section_options) {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                      } else if (slotProps.data.select_option) {
                        _push3(`<div${_scopeId2}>`);
                        _push3(ssrRenderComponent(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, _parent3, _scopeId2));
                        _push3(`</div>`);
                      } else {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p></div>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80DDB") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.selected_section_options) {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                      } else if (slotProps.data.select_option) {
                        _push3(`<div${_scopeId2}>`);
                        _push3(ssrRenderComponent(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, _parent3, _scopeId2));
                        _push3(`</div>`);
                      } else {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p></div>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.section == "80U") {
                      _push3(`<div${_scopeId2}>`);
                      if (slotProps.data.selected_section_options) {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                      } else if (slotProps.data.select_option) {
                        _push3(`<div${_scopeId2}>`);
                        _push3(ssrRenderComponent(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, _parent3, _scopeId2));
                        _push3(`</div>`);
                      } else {
                        _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p></div>`);
                      }
                      _push3(`</div>`);
                    } else if (slotProps.data.dec_amount) {
                      _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</div>`);
                    } else {
                      _push3(`<div${_scopeId2}>`);
                      _push3(ssrRenderComponent(_component_InputNumber, {
                        class: "mx-auto text-lg font-semibold w-28",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, _parent3, _scopeId2));
                      _push3(`</div>`);
                    }
                  } else {
                    return [
                      slotProps.data.section == "80EE" ? (openBlock(), createBlock("div", { key: 0 }, [
                        slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                        ])) : (openBlock(), createBlock("div", {
                          key: 1,
                          class: "px-auto"
                        }, [
                          createVNode("button", {
                            onClick: ($event) => unref(investmentStore).get80EESlotData(slotProps.data),
                            disabled: !unref(investmentStore).isSubmitted,
                            class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                          }, "Add 80EE", 8, ["onClick", "disabled"])
                        ]))
                      ])) : slotProps.data.section == "80EEA" ? (openBlock(), createBlock("div", { key: 1 }, [
                        slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                        ])) : (openBlock(), createBlock("div", { key: 1 }, [
                          createVNode("button", {
                            onClick: ($event) => unref(investmentStore).get80EEASlotData(slotProps.data),
                            disabled: !unref(investmentStore).isSubmitted,
                            class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                          }, "Add 80EEA", 8, ["onClick", "disabled"])
                        ]))
                      ])) : slotProps.data.section == "80EEB" ? (openBlock(), createBlock("div", { key: 2 }, [
                        slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                        ])) : (openBlock(), createBlock("div", { key: 1 }, [
                          createVNode("button", {
                            onClick: ($event) => unref(investmentStore).get80EEBSlotData(slotProps.data),
                            disabled: !unref(investmentStore).isSubmitted,
                            class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                          }, "Add 80EEB", 8, ["onClick", "disabled"])
                        ]))
                      ])) : slotProps.data.section == "80DD" ? (openBlock(), createBlock("div", { key: 3 }, [
                        slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                        ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                          createVNode(_component_InputNumber, {
                            class: "mx-auto text-lg font-semibold w-28",
                            modelValue: slotProps.data.dec_amt,
                            "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                            onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                            mode: "currency",
                            currency: "INR",
                            locale: "en-US",
                            readonly: !unref(investmentStore).isSubmitted
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                        ])) : (openBlock(), createBlock("div", { key: 2 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, "--")
                        ]))
                      ])) : slotProps.data.section == "80DDB" ? (openBlock(), createBlock("div", { key: 4 }, [
                        slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                        ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                          createVNode(_component_InputNumber, {
                            class: "mx-auto text-lg font-semibold w-28",
                            modelValue: slotProps.data.dec_amt,
                            "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                            onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                            mode: "currency",
                            currency: "INR",
                            locale: "en-US",
                            readonly: !unref(investmentStore).isSubmitted
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                        ])) : (openBlock(), createBlock("div", { key: 2 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, "--")
                        ]))
                      ])) : slotProps.data.section == "80U" ? (openBlock(), createBlock("div", { key: 5 }, [
                        slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                        ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                          createVNode(_component_InputNumber, {
                            class: "mx-auto text-lg font-semibold w-28",
                            modelValue: slotProps.data.dec_amt,
                            "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                            onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                            mode: "currency",
                            currency: "INR",
                            locale: "en-US",
                            readonly: !unref(investmentStore).isSubmitted
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                        ])) : (openBlock(), createBlock("div", { key: 2 }, [
                          createVNode("p", { style: { "font-weight": "501" } }, "--")
                        ]))
                      ])) : slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                        key: 6,
                        class: "dec_amt"
                      }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 7 }, [
                        createVNode(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                      ]))
                    ];
                  }
                }),
                editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "text-lg font-semibold w-28",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  } else {
                    return [
                      createVNode("div", null, [
                        createVNode(_component_InputNumber, {
                          modelValue: data[field],
                          "onUpdate:modelValue": ($event) => data[field] = $event,
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          class: "text-lg font-semibold w-28",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data.dec_amount) {
                      _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                    } else {
                      _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                    }
                  } else {
                    return [
                      slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                      ]))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              if (unref(investmentStore).isSubmitted) {
                _push2(ssrRenderComponent(_component_Column, {
                  rowEditor: true,
                  style: { "width": "10%", "min-width": "8rem" },
                  bodyStyle: "text-align:center",
                  header: "Action"
                }, null, _parent2, _scopeId));
              } else {
                _push2(`<!---->`);
              }
            } else {
              return [
                createVNode(_component_Column, {
                  header: "Sections",
                  field: "section",
                  style: { "min-width": "2rem" }
                }),
                createVNode(_component_Column, {
                  field: "particular",
                  header: "Particulars",
                  style: { "min-width": "15rem", "text-align": "left !important" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data.section == "80DD" ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "80DD",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          value: slotProps.data.section_option_1,
                          checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_1), 1)
                      ]),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "80DD",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          value: slotProps.data.section_option_2,
                          checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_2), 1)
                      ])
                    ])) : slotProps.data.section == "80DDB" ? (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "80DDB",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          class: "form-check-input",
                          value: slotProps.data.section_option_1,
                          checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_1), 1)
                      ]),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "80DDB",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          value: slotProps.data.section_option_2,
                          checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_2), 1)
                      ])
                    ])) : slotProps.data.section == "80U" ? (openBlock(), createBlock("div", { key: 2 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "80U",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          value: slotProps.data.section_option_1,
                          checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_1), 1)
                      ]),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "80U",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          value: slotProps.data.section_option_2,
                          checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["onUpdate:modelValue", "value", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_2), 1)
                      ])
                    ])) : (openBlock(), createBlock("div", { key: 3 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1)
                    ]))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "reference",
                  header: "References ",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "max_amount",
                  header: "Max Limit",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data.section == "80DD" ? (openBlock(), createBlock("div", { key: 0 }, [
                      slotProps.data.select_option == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.select_option == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : slotProps.data.selected_section_options == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                        key: 2,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.selected_section_options == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                        key: 3,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : (openBlock(), createBlock("p", {
                        key: 4,
                        style: { "font-weight": "501" }
                      }, "--"))
                    ])) : slotProps.data.section == "80DDB" ? (openBlock(), createBlock("div", { key: 1 }, [
                      slotProps.data.select_option == "Individuals (less than 60 years)" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(4e4)), 1)) : slotProps.data.select_option == "Senior citizen (aged 60 years or more)" ? (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(1e5)), 1)) : slotProps.data.selected_section_options == "Individuals (less than 60 years)" ? (openBlock(), createBlock("p", {
                        key: 2,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(4e4)), 1)) : slotProps.data.selected_section_options == "Senior citizen (aged 60 years or more)" ? (openBlock(), createBlock("p", {
                        key: 3,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(1e5)), 1)) : (openBlock(), createBlock("p", {
                        key: 4,
                        style: { "font-weight": "501" }
                      }, "--"))
                    ])) : slotProps.data.section == "80U" ? (openBlock(), createBlock("div", { key: 2 }, [
                      slotProps.data.select_option == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.select_option == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : slotProps.data.selected_section_options == "Normal Disability ( 40% to 80%)" ? (openBlock(), createBlock("p", {
                        key: 2,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(75e3)), 1)) : slotProps.data.selected_section_options == "Severe Disability (More than 80%)" ? (openBlock(), createBlock("p", {
                        key: 3,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(125e3)), 1)) : (openBlock(), createBlock("p", {
                        key: 4,
                        style: { "font-weight": "501" }
                      }, "--"))
                    ])) : (openBlock(), createBlock("div", { key: 3 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.max_amount)), 1)
                    ]))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "dec_amount",
                  header: "Declaration Amount",
                  style: { "min-width": "8rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data.section == "80EE" ? (openBlock(), createBlock("div", { key: 0 }, [
                      slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : (openBlock(), createBlock("div", {
                        key: 1,
                        class: "px-auto"
                      }, [
                        createVNode("button", {
                          onClick: ($event) => unref(investmentStore).get80EESlotData(slotProps.data),
                          disabled: !unref(investmentStore).isSubmitted,
                          class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                        }, "Add 80EE", 8, ["onClick", "disabled"])
                      ]))
                    ])) : slotProps.data.section == "80EEA" ? (openBlock(), createBlock("div", { key: 1 }, [
                      slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("button", {
                          onClick: ($event) => unref(investmentStore).get80EEASlotData(slotProps.data),
                          disabled: !unref(investmentStore).isSubmitted,
                          class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                        }, "Add 80EEA", 8, ["onClick", "disabled"])
                      ]))
                    ])) : slotProps.data.section == "80EEB" ? (openBlock(), createBlock("div", { key: 2 }, [
                      slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("button", {
                          onClick: ($event) => unref(investmentStore).get80EEBSlotData(slotProps.data),
                          disabled: !unref(investmentStore).isSubmitted,
                          class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md"
                        }, "Add 80EEB", 8, ["onClick", "disabled"])
                      ]))
                    ])) : slotProps.data.section == "80DD" ? (openBlock(), createBlock("div", { key: 3 }, [
                      slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                      ])) : (openBlock(), createBlock("div", { key: 2 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, "--")
                      ]))
                    ])) : slotProps.data.section == "80DDB" ? (openBlock(), createBlock("div", { key: 4 }, [
                      slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                      ])) : (openBlock(), createBlock("div", { key: 2 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, "--")
                      ]))
                    ])) : slotProps.data.section == "80U" ? (openBlock(), createBlock("div", { key: 5 }, [
                      slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-28",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                      ])) : (openBlock(), createBlock("div", { key: 2 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, "--")
                      ]))
                    ])) : slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                      key: 6,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 7 }, [
                      createVNode(_component_InputNumber, {
                        class: "mx-auto text-lg font-semibold w-28",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                    ]))
                  ]),
                  editor: withCtx(({ data, field }) => [
                    createVNode("div", null, [
                      createVNode(_component_InputNumber, {
                        modelValue: data[field],
                        "onUpdate:modelValue": ($event) => data[field] = $event,
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        class: "text-lg font-semibold w-28",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                    ])
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "Status",
                  header: "Status",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ]),
                  _: 1
                }),
                unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                  key: 0,
                  rowEditor: true,
                  style: { "width": "10%", "min-width": "8rem" },
                  bodyStyle: "text-align:center",
                  header: "Action"
                })) : createCommentVNode("", true)
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).otherExeSectionData[0] == "failure") {
        _push(`<div class="my-4 table-responsive"></div>`);
      } else {
        _push(`<div class="my-4 table-responsive">`);
        if (unref(investmentStore).otherExeSectionData.length > 0) {
          _push(ssrRenderComponent(_component_DataTable, {
            ref: "dt",
            dataKey: "id",
            paginator: true,
            rows: 10,
            value: unref(investmentStore).otherExeSectionData[0],
            paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
            rowsPerPageOptions: [5, 10, 25],
            currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
            responsiveLayout: "scroll"
          }, {
            default: withCtx((_, _push2, _parent2, _scopeId) => {
              if (_push2) {
                _push2(ssrRenderComponent(_component_Column, {
                  header: "Loan Sanction Date",
                  field: "json_popups_value.loan_sanction_date",
                  style: { "min-width": "8rem" }
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`${ssrInterpolate(slotProps.data.json_popups_value.loan_sanction_date ? unref(moment)(slotProps.data.json_popups_value.loan_sanction_date).format("DD-MM-YYYY") : "-")}`);
                    } else {
                      return [
                        createTextVNode(toDisplayString(slotProps.data.json_popups_value.loan_sanction_date ? unref(moment)(slotProps.data.json_popups_value.loan_sanction_date).format("DD-MM-YYYY") : "-"), 1)
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "json_popups_value.lender_type",
                  header: "Lender Type",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (slotProps.data.json_popups_value.section == "80EEB") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>NA</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.lender_type ? slotProps.data.json_popups_value.lender_type : "-")}</p>`);
                      }
                    } else {
                      return [
                        slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, "NA")) : (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.json_popups_value.lender_type ? slotProps.data.json_popups_value.lender_type : "-"), 1))
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "json_popups_value.property_value",
                  header: "Property Value ",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (slotProps.data.json_popups_value.section == "80EEB") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>NA</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.property_value ? slotProps.data.json_popups_value.property_value : "-")}</p>`);
                      }
                    } else {
                      return [
                        slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, "NA")) : (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.json_popups_value.property_value ? slotProps.data.json_popups_value.property_value : "-"), 1))
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "json_popups_value.vechicle_model",
                  header: "Vechile Type ",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (slotProps.data.json_popups_value.section == "80EEB") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.vechicle_model)}</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>NA</p>`);
                      }
                    } else {
                      return [
                        slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.json_popups_value.vechicle_model), 1)) : (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, "NA"))
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "json_popups_value.vechile_brand",
                  header: "Vechile Brand ",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (slotProps.data.json_popups_value.section == "80EEB") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.vechicle_brand)}</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>NA</p>`);
                      }
                    } else {
                      return [
                        slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.json_popups_value.vechicle_brand), 1)) : (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, "NA"))
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "json_popups_value.loan_amount",
                  header: "Loan Amount",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      if (slotProps.data.json_popups_value.section == "80EEB") {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>NA</p>`);
                      } else {
                        _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.loan_amount)}</p>`);
                      }
                    } else {
                      return [
                        slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                          key: 0,
                          style: { "font-weight": "501" }
                        }, "NA")) : (openBlock(), createBlock("p", {
                          key: 1,
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.json_popups_value.loan_amount), 1))
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
                _push2(ssrRenderComponent(_component_Column, {
                  field: "json_popups_value.interest_amount_paid",
                  header: "Interest Amount Paid",
                  style: { "min-width": "12rem" }
                }, null, _parent2, _scopeId));
                if (unref(investmentStore).isSubmitted) {
                  _push2(ssrRenderComponent(_component_Column, {
                    field: "",
                    header: "Action",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                      if (_push3) {
                        _push3(`<button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-2 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button>`);
                      } else {
                        return [
                          createVNode("button", {
                            class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                            onClick: ($event) => unref(investmentStore).editOtherExe(slotProps.data)
                          }, [
                            (openBlock(), createBlock("svg", {
                              xmlns: "http://www.w3.org/2000/svg",
                              fill: "none",
                              viewBox: "0 0 24 24",
                              "stroke-width": "1.5",
                              stroke: "currentColor",
                              class: "w-6 h-6"
                            }, [
                              createVNode("path", {
                                "stroke-linecap": "round",
                                "stroke-linejoin": "round",
                                d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                              })
                            ]))
                          ], 8, ["onClick"]),
                          createVNode("button", {
                            class: "p-2 bg-red-200 border-red-500 rounded-xl",
                            onClick: ($event) => unref(investmentStore).deleteOtherExeDetails(slotProps.data)
                          }, [
                            (openBlock(), createBlock("svg", {
                              xmlns: "http://www.w3.org/2000/svg",
                              fill: "none",
                              viewBox: "0 0 24 24",
                              "stroke-width": "1.5",
                              stroke: "currentColor",
                              class: "w-6 h-6 font-bold"
                            }, [
                              createVNode("path", {
                                "stroke-linecap": "round",
                                "stroke-linejoin": "round",
                                d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                              })
                            ]))
                          ], 8, ["onClick"])
                        ];
                      }
                    }),
                    _: 1
                  }, _parent2, _scopeId));
                } else {
                  _push2(`<!---->`);
                }
              } else {
                return [
                  createVNode(_component_Column, {
                    header: "Loan Sanction Date",
                    field: "json_popups_value.loan_sanction_date",
                    style: { "min-width": "8rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      createTextVNode(toDisplayString(slotProps.data.json_popups_value.loan_sanction_date ? unref(moment)(slotProps.data.json_popups_value.loan_sanction_date).format("DD-MM-YYYY") : "-"), 1)
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Column, {
                    field: "json_popups_value.lender_type",
                    header: "Lender Type",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, "NA")) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.json_popups_value.lender_type ? slotProps.data.json_popups_value.lender_type : "-"), 1))
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Column, {
                    field: "json_popups_value.property_value",
                    header: "Property Value ",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, "NA")) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.json_popups_value.property_value ? slotProps.data.json_popups_value.property_value : "-"), 1))
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Column, {
                    field: "json_popups_value.vechicle_model",
                    header: "Vechile Type ",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.json_popups_value.vechicle_model), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, "NA"))
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Column, {
                    field: "json_popups_value.vechile_brand",
                    header: "Vechile Brand ",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.json_popups_value.vechicle_brand), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, "NA"))
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Column, {
                    field: "json_popups_value.loan_amount",
                    header: "Loan Amount",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      slotProps.data.json_popups_value.section == "80EEB" ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, "NA")) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.json_popups_value.loan_amount), 1))
                    ]),
                    _: 1
                  }),
                  createVNode(_component_Column, {
                    field: "json_popups_value.interest_amount_paid",
                    header: "Interest Amount Paid",
                    style: { "min-width": "12rem" }
                  }),
                  unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                    key: 0,
                    field: "",
                    header: "Action",
                    style: { "min-width": "12rem" }
                  }, {
                    body: withCtx((slotProps) => [
                      createVNode("button", {
                        class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                        onClick: ($event) => unref(investmentStore).editOtherExe(slotProps.data)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-6 h-6"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                          })
                        ]))
                      ], 8, ["onClick"]),
                      createVNode("button", {
                        class: "p-2 bg-red-200 border-red-500 rounded-xl",
                        onClick: ($event) => unref(investmentStore).deleteOtherExeDetails(slotProps.data)
                      }, [
                        (openBlock(), createBlock("svg", {
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24",
                          "stroke-width": "1.5",
                          stroke: "currentColor",
                          class: "w-6 h-6 font-bold"
                        }, [
                          createVNode("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                          })
                        ]))
                      ], 8, ["onClick"])
                    ]),
                    _: 1
                  })) : createCommentVNode("", true)
                ];
              }
            }),
            _: 1
          }, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      }
      _push(`<div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailog_80EE,
        "onUpdate:visible": ($event) => unref(investmentStore).dailog_80EE = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 modal-title text-primary"${_scopeId}>80EE<span class="ml-3 text-xs font-semibold text-gray-400"${_scopeId}>(The maximum deduction of Rs 50,000 can be claimed under this section)</span></h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 modal-title text-primary" }, [
                createTextVNode("80EE"),
                createVNode("span", { class: "ml-3 text-xs font-semibold text-gray-400" }, "(The maximum deduction of Rs 50,000 can be claimed under this section)")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"${_scopeId}><div class=""${_scopeId}><label for="sanction_date" class="block mb-2 font-medium text-gray-900"${_scopeId}>Loan Sanction Date</label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              minDate: new Date("04/01/2016"),
              maxDate: new Date("03/31/2017"),
              placeholder: "Loan Sanction Date",
              modelValue: unref(investmentStore).other_exe_80EE.loan_sanction_date,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.loan_sanction_date = $event,
              class: ["w-full", [
                unref(v$).loan_sanction_date.$error ? "p-invalid" : ""
              ]],
              showIcon: "",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).loan_sanction_date.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).loan_sanction_date.required.$message.replace("Value", "Loan sanction date"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_type" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(v$).lender_type.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EE.lender_type,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.lender_type = $event,
              options: lender_types.value,
              optionLabel: "name",
              optionValue: "code",
              placeholder: "Select a Property",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).lender_type.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).lender_type.required.$message.replace("Value", "Lender name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="property_value" class="block mb-2 font-medium text-gray-900"${_scopeId}>Property Value</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).property_value.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EE.property_value,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.property_value = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).property_value.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).property_value.required.$message.replace("Value", "Property value"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="loan_amount" class="block mb-2 font-medium text-gray-900"${_scopeId}>Loan Amount</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).loan_amount.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EE.loan_amount,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.loan_amount = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).loan_amount.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).loan_amount.required.$message.replace("Value", "Loan Amount"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="declaration_amount" class="block mb-2 font-medium text-gray-900"${_scopeId}>Interest Amount Paid</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).interest_amount_paid.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EE.interest_amount_paid,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.interest_amount_paid = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).interest_amount_paid.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).interest_amount_paid.required.$message.replace("Value", "Loan amount paid"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "sanction_date",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Loan Sanction Date"),
                  createVNode(_component_Calendar, {
                    minDate: new Date("04/01/2016"),
                    maxDate: new Date("03/31/2017"),
                    placeholder: "Loan Sanction Date",
                    modelValue: unref(investmentStore).other_exe_80EE.loan_sanction_date,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.loan_sanction_date = $event,
                    class: ["w-full", [
                      unref(v$).loan_sanction_date.$error ? "p-invalid" : ""
                    ]],
                    showIcon: "",
                    required: ""
                  }, null, 8, ["minDate", "maxDate", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).loan_sanction_date.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).loan_sanction_date.required.$message.replace("Value", "Loan sanction date")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_type",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Type"),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(v$).lender_type.$error ? "border border-red-500" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EE.lender_type,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.lender_type = $event,
                    options: lender_types.value,
                    optionLabel: "name",
                    optionValue: "code",
                    placeholder: "Select a Property",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(v$).lender_type.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).lender_type.required.$message.replace("Value", "Lender name")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "property_value",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Property Value"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).property_value.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EE.property_value,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.property_value = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).property_value.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).property_value.required.$message.replace("Value", "Property value")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "loan_amount",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Loan Amount"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).loan_amount.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EE.loan_amount,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.loan_amount = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).loan_amount.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).loan_amount.required.$message.replace("Value", "Loan Amount")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "declaration_amount",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Interest Amount Paid"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).interest_amount_paid.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EE.interest_amount_paid,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EE.interest_amount_paid = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).interest_amount_paid.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).interest_amount_paid.required.$message.replace("Value", "Loan amount paid")), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  onClick: submitForm80EE
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailog_80EEA,
        "onUpdate:visible": ($event) => unref(investmentStore).dailog_80EEA = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 modal-title text-primary"${_scopeId}>80EEA <span class="ml-3 text-xs font-semibold text-gray-400"${_scopeId}>(The maximum deduction available under this section is Rs. 1.5 Lakhs)</span></h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 modal-title text-primary" }, [
                createTextVNode("80EEA "),
                createVNode("span", { class: "ml-3 text-xs font-semibold text-gray-400" }, "(The maximum deduction available under this section is Rs. 1.5 Lakhs)")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"${_scopeId}><div class=""${_scopeId}><label for="sanction_date" class="block mb-2 font-medium text-gray-900"${_scopeId}>Loan Sanction Date</label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              minDate: new Date("04/01/2019"),
              maxDate: new Date("03/31/2020"),
              placeholder: "Loan Sanction Date",
              modelValue: unref(investmentStore).other_exe_80EEA.loan_sanction_date,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.loan_sanction_date = $event,
              class: ["w-full", [
                unref(s$).loan_sanction_date.$error ? "p-invalid" : ""
              ]],
              showIconrequired: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).loan_sanction_date.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).loan_sanction_date.required.$message.replace("Value", "Loan sanction date"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_type" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(s$).lender_type.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EEA.lender_type,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.lender_type = $event,
              options: lender_types.value,
              optionLabel: "name",
              optionValue: "code",
              placeholder: "Select a Property",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).lender_type.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).lender_type.required.$message.replace("Value", "Lender name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="property_value" class="block mb-2 font-medium text-gray-900"${_scopeId}>Property Value</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(s$).property_value.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EEA.property_value,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.property_value = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).property_value.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).property_value.required.$message.replace("Value", "Property value"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="loan_amount" class="block mb-2 font-medium text-gray-900"${_scopeId}>Loan Amount</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(s$).loan_amount.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EEA.loan_amount,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.loan_amount = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).loan_amount.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).loan_amount.required.$message.replace("Value", "Loan Amount"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="declaration_amount" class="block mb-2 font-medium text-gray-900"${_scopeId}>Interest Amount Paid</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(s$).interest_amount_paid.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EEA.interest_amount_paid,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.interest_amount_paid = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).interest_amount_paid.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).interest_amount_paid.required.$message.replace("Value", "Loan amount paid"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "sanction_date",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Loan Sanction Date"),
                  createVNode(_component_Calendar, {
                    minDate: new Date("04/01/2019"),
                    maxDate: new Date("03/31/2020"),
                    placeholder: "Loan Sanction Date",
                    modelValue: unref(investmentStore).other_exe_80EEA.loan_sanction_date,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.loan_sanction_date = $event,
                    class: ["w-full", [
                      unref(s$).loan_sanction_date.$error ? "p-invalid" : ""
                    ]],
                    showIconrequired: ""
                  }, null, 8, ["minDate", "maxDate", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(s$).loan_sanction_date.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).loan_sanction_date.required.$message.replace("Value", "Loan sanction date")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_type",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Type"),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(s$).lender_type.$error ? "border border-red-500" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EEA.lender_type,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.lender_type = $event,
                    options: lender_types.value,
                    optionLabel: "name",
                    optionValue: "code",
                    placeholder: "Select a Property",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(s$).lender_type.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).lender_type.required.$message.replace("Value", "Lender name")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "property_value",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Property Value"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(s$).property_value.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EEA.property_value,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.property_value = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(s$).property_value.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).property_value.required.$message.replace("Value", "Property value")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "loan_amount",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Loan Amount"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(s$).loan_amount.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EEA.loan_amount,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.loan_amount = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(s$).loan_amount.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).loan_amount.required.$message.replace("Value", "Loan Amount")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "declaration_amount",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Interest Amount Paid"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(s$).interest_amount_paid.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EEA.interest_amount_paid,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEA.interest_amount_paid = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(s$).interest_amount_paid.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).interest_amount_paid.required.$message.replace("Value", "Loan amount paid")), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  onClick: submitForm80EEA
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailog_80EEB,
        "onUpdate:visible": ($event) => unref(investmentStore).dailog_80EEB = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 modal-title text-primary"${_scopeId}> 80EEB<span class="ml-3 text-xs font-semibold text-gray-400"${_scopeId}>(The maximum deduction available under this section is Rs. 1.5 Lakhs for electric vehicle purchase)</span></h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 modal-title text-primary" }, [
                createTextVNode(" 80EEB"),
                createVNode("span", { class: "ml-3 text-xs font-semibold text-gray-400" }, "(The maximum deduction available under this section is Rs. 1.5 Lakhs for electric vehicle purchase)")
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"${_scopeId}><div class=""${_scopeId}><label for="sanction_date" class="block mb-2 font-medium text-gray-900"${_scopeId}>Loan Sanction Date</label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              minDate: new Date("04/01/2019"),
              maxDate: new Date("03/31/2023"),
              placeholder: "Loan Sanction Date",
              modelValue: unref(investmentStore).other_exe_80EEB.loan_sanction_date,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.loan_sanction_date = $event,
              class: ["w-full", [
                unref(p$).loan_sanction_date.$error ? "p-invalid" : ""
              ]],
              showIcon: "",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).loan_sanction_date.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).loan_sanction_date.$errors[0].$message)} ${ssrInterpolate(unref(p$).loan_sanction_date.required.$message.replace("Value", "Loan sanction date"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="vechicle_brand" class="block mb-2 font-medium text-gray-900"${_scopeId}>Vechicle Brand</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(p$).vechicle_brand.$error ? "border border-red-500" : ""
              ]],
              onChange: ($event) => switchVechileModel(unref(investmentStore).other_exe_80EEB.vechicle_brand),
              modelValue: unref(investmentStore).other_exe_80EEB.vechicle_brand,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.vechicle_brand = $event,
              options: vechicle_types.value,
              optionLabel: "vechicle_model",
              optionValue: "value",
              placeholder: "Select a Vechicle Brand",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).vechicle_brand.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).vechicle_brand.required.$message.replace("Value", "Vechile Brand"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="vechicle_model" class="block mb-2 font-medium text-gray-900"${_scopeId}>Vechicle Model </label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(p$).vechicle_model.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EEB.vechicle_model,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.vechicle_model = $event,
              options: vechicle_model_options.value,
              optionLabel: "vechicle_model",
              optionValue: "value",
              placeholder: "Select a Vechicle Model",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).vechicle_model.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).vechicle_model.required.$message.replace("Value", "Vechile Model"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="declaration_amount" class="block mb-2 font-medium text-gray-900"${_scopeId}>Interest Amount Paid</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(p$).interest_amount_paid.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).other_exe_80EEB.interest_amount_paid,
              "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.interest_amount_paid = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).interest_amount_paid.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).interest_amount_paid.required.$message.replace("Value", "Interest amount paid"))} </span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "sanction_date",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Loan Sanction Date"),
                  createVNode(_component_Calendar, {
                    minDate: new Date("04/01/2019"),
                    maxDate: new Date("03/31/2023"),
                    placeholder: "Loan Sanction Date",
                    modelValue: unref(investmentStore).other_exe_80EEB.loan_sanction_date,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.loan_sanction_date = $event,
                    class: ["w-full", [
                      unref(p$).loan_sanction_date.$error ? "p-invalid" : ""
                    ]],
                    showIcon: "",
                    required: ""
                  }, null, 8, ["minDate", "maxDate", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(p$).loan_sanction_date.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).loan_sanction_date.$errors[0].$message) + " " + toDisplayString(unref(p$).loan_sanction_date.required.$message.replace("Value", "Loan sanction date")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "vechicle_brand",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Vechicle Brand"),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(p$).vechicle_brand.$error ? "border border-red-500" : ""
                    ]],
                    onChange: ($event) => switchVechileModel(unref(investmentStore).other_exe_80EEB.vechicle_brand),
                    modelValue: unref(investmentStore).other_exe_80EEB.vechicle_brand,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.vechicle_brand = $event,
                    options: vechicle_types.value,
                    optionLabel: "vechicle_model",
                    optionValue: "value",
                    placeholder: "Select a Vechicle Brand",
                    required: ""
                  }, null, 8, ["onChange", "modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(p$).vechicle_brand.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).vechicle_brand.required.$message.replace("Value", "Vechile Brand")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "vechicle_model",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Vechicle Model "),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(p$).vechicle_model.$error ? "border border-red-500" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EEB.vechicle_model,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.vechicle_model = $event,
                    options: vechicle_model_options.value,
                    optionLabel: "vechicle_model",
                    optionValue: "value",
                    placeholder: "Select a Vechicle Model",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(p$).vechicle_model.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).vechicle_model.required.$message.replace("Value", "Vechile Model")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "declaration_amount",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Interest Amount Paid"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(p$).interest_amount_paid.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).other_exe_80EEB.interest_amount_paid,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).other_exe_80EEB.interest_amount_paid = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(p$).interest_amount_paid.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).interest_amount_paid.required.$message.replace("Value", "Interest amount paid")) + " ", 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  onClick: submitForm80EEB
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/other_exemption/other_exemption.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {
  __name: "house_property",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    const rulesSop = computed(() => {
      return {
        lender_name: { required },
        lender_type: { required },
        lender_pan: { required },
        income_loss: { required },
        address: { required }
      };
    });
    const s$ = useValidate(rulesSop, investmentStore.sop);
    const submitSOP = () => {
      console.log(s$.value);
      s$.value.$validate();
      if (!s$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.saveSelfOccupiedProperty();
        s$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    const ruleslop = computed(() => {
      return {
        lender_name: { required },
        lender_type: { required },
        lender_pan: { required },
        income_loss: { required },
        municipal_tax: { required },
        maintenance: { required },
        interest: { required },
        income_loss: { required },
        net_value: { required },
        rent_received: { required }
      };
    });
    const v$ = useValidate(ruleslop, investmentStore.lop);
    const submitLop = () => {
      console.log(v$.value);
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.saveLetOutProperty();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    const rulesDlop = computed(() => {
      return {
        lender_name: { required },
        lender_type: { required },
        lender_pan: { required },
        income_loss: { required },
        municipal_tax: { required },
        maintenance: { required },
        interest: { required },
        income_loss: { required },
        net_value: { required },
        rent_received: { required }
      };
    });
    const p$ = useValidate(rulesDlop, investmentStore.dlop);
    const submitDlop = () => {
      console.log(p$.value);
      p$.value.$validate();
      if (!p$.value.$error) {
        console.log("Form successfully submitted.");
        investmentStore.saveDeemedLetOutProperty();
        p$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    ref();
    ref([
      { name: "Self Occupied Property", code: "Self Occupied Property" },
      { name: "Let Out Property", code: "Let Out Property" },
      { name: "Deemed Let Out Property", code: "Deemed Let Out Property" }
    ]);
    const lender_types = ref([
      { name: "Financial Institution", code: "Financial Institution" },
      { name: "Others", code: "Others" }
    ]);
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 25,
        value: unref(investmentStore).housePropertySource,
        editMode: "row",
        sortField: "particular",
        sortOrder: -1,
        editingRows: unref(investmentStore).editingRowSource,
        "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        onRowEditSave: _ctx.onRowEditSave,
        tableClass: "editable-cells-table",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Sections",
              field: "section",
              style: { "min-width": "8rem", "text-align": "left !important" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Particulars",
              style: { "min-width": "12rem" },
              sortable: true
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reference",
              header: "References ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button${ssrRenderAttrs(mergeProps({
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                } else {
                  return [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              header: "Declaration Amount",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.particular == "Self Occupied Property") {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.json_popups_value) {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss))}</p></div>`);
                    } else {
                      _push3(`<div${_scopeId2}><button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"${_scopeId2}>Add New</button></div>`);
                    }
                    _push3(`</div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.particular == "Let Out Property") {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.json_popups_value) {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss))}</p></div>`);
                    } else {
                      _push3(`<div${_scopeId2}><button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"${_scopeId2}>Add New</button></div>`);
                    }
                    _push3(`</div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                  if (slotProps.data.particular == "Deemed Let Out Property") {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.json_popups_value) {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss))}</p></div>`);
                    } else {
                      _push3(`<div${_scopeId2}><button${ssrIncludeBooleanAttr(!unref(investmentStore).isSubmitted) ? " disabled" : ""} class="px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"${_scopeId2}>Add New</button></div>`);
                    }
                    _push3(`</div>`);
                  } else if (slotProps.data.dec_amount) {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</div>`);
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    slotProps.data.particular == "Self Occupied Property" ? (openBlock(), createBlock("div", { key: 0 }, [
                      slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("button", {
                          onClick: ($event) => unref(investmentStore).getSopSlotData(slotProps.data),
                          disabled: !unref(investmentStore).isSubmitted,
                          class: "px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"
                        }, "Add New", 8, ["onClick", "disabled"])
                      ]))
                    ])) : createCommentVNode("", true),
                    slotProps.data.particular == "Let Out Property" ? (openBlock(), createBlock("div", { key: 1 }, [
                      slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("button", {
                          onClick: ($event) => unref(investmentStore).getLopSlotData(slotProps.data),
                          disabled: !unref(investmentStore).isSubmitted,
                          class: "px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"
                        }, "Add New", 8, ["onClick", "disabled"])
                      ]))
                    ])) : createCommentVNode("", true),
                    slotProps.data.particular == "Deemed Let Out Property" ? (openBlock(), createBlock("div", { key: 2 }, [
                      slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode("button", {
                          onClick: ($event) => unref(investmentStore).getDlopSlotData(slotProps.data),
                          disabled: !unref(investmentStore).isSubmitted,
                          class: "px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"
                        }, "Add New", 8, ["onClick", "disabled"])
                      ]))
                    ])) : slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                      key: 3,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : createCommentVNode("", true)
                  ];
                }
              }),
              editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "w-5 text-lg font-semibold"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "w-5 text-lg font-semibold"
                    }, null, 8, ["modelValue", "onUpdate:modelValue"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.json_popups_value) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "8rem", "text-align": "left !important" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "12rem" },
                sortable: true
              }),
              createVNode(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  withDirectives((openBlock(), createBlock("button", {
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, [
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-warning",
                      "aria-hidden": "true"
                    })
                  ])), [
                    [_directive_tooltip, slotProps.data.reference]
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.particular == "Self Occupied Property" ? (openBlock(), createBlock("div", { key: 0 }, [
                    slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("button", {
                        onClick: ($event) => unref(investmentStore).getSopSlotData(slotProps.data),
                        disabled: !unref(investmentStore).isSubmitted,
                        class: "px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"
                      }, "Add New", 8, ["onClick", "disabled"])
                    ]))
                  ])) : createCommentVNode("", true),
                  slotProps.data.particular == "Let Out Property" ? (openBlock(), createBlock("div", { key: 1 }, [
                    slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("button", {
                        onClick: ($event) => unref(investmentStore).getLopSlotData(slotProps.data),
                        disabled: !unref(investmentStore).isSubmitted,
                        class: "px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"
                      }, "Add New", 8, ["onClick", "disabled"])
                    ]))
                  ])) : createCommentVNode("", true),
                  slotProps.data.particular == "Deemed Let Out Property" ? (openBlock(), createBlock("div", { key: 2 }, [
                    slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("button", {
                        onClick: ($event) => unref(investmentStore).getDlopSlotData(slotProps.data),
                        disabled: !unref(investmentStore).isSubmitted,
                        class: "px-4 py-2 mb-3 text-center text-white bg-orange-700 rounded-md"
                      }, "Add New", 8, ["onClick", "disabled"])
                    ]))
                  ])) : slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                    key: 3,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : createCommentVNode("", true)
                ]),
                editor: withCtx(({ data, field }) => [
                  createVNode(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "w-5 text-lg font-semibold"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.json_popups_value ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ]))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
      if (unref(investmentStore).house_props_data[0] == "failure") {
        _push(`<div class="my-4 table-responsive"></div>`);
      } else {
        _push(`<div class="table-responsive">`);
        _push(ssrRenderComponent(_component_DataTable, {
          ref: "dt",
          dataKey: "id",
          rowGroupMode: "rowspan",
          groupRowsBy: "property_type",
          sortMode: "single",
          value: unref(investmentStore).house_props_data[0],
          sortOrder: 1,
          sortField: "property_type",
          paginator: true,
          rows: 10,
          scrollable: "",
          paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
          rowsPerPageOptions: [5, 10, 25],
          currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
          responsiveLayout: "scroll"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(ssrRenderComponent(_component_Column, {
                header: "Property Type",
                field: "json_popups_value.property_type",
                style: { "min-width": "15rem" },
                frozen: ""
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.json_popups_value.property_type)}</p>`);
                  } else {
                    return [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.json_popups_value.property_type), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                header: "Lender Name",
                field: "lender_name",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data["json_popups_value"].lender_name)}</p>`);
                  } else {
                    return [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data["json_popups_value"].lender_name), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "lender_pan",
                header: "Lender PAN",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data["json_popups_value"].lender_pan.toUpperCase())}</p>`);
                  } else {
                    return [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data["json_popups_value"].lender_pan.toUpperCase()), 1)
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "lender_type",
                header: "Lender Type ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data["json_popups_value"].lender_type) {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data["json_popups_value"].lender_type)}</p>`);
                    } else {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}> NA </p>`);
                    }
                  } else {
                    return [
                      slotProps.data["json_popups_value"].lender_type ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data["json_popups_value"].lender_type), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, " NA "))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "rent_received",
                header: "Rent Received",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data["json_popups_value"].rent_received) {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].rent_received))}</p>`);
                    } else {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}> NA </p>`);
                    }
                  } else {
                    return [
                      slotProps.data["json_popups_value"].rent_received ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].rent_received)), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, " NA "))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "maintenance",
                header: "Maintenace",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data["json_popups_value"].maintenance) {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].maintenance))}</p>`);
                    } else {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}> NA </p>`);
                    }
                  } else {
                    return [
                      slotProps.data["json_popups_value"].maintenance ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].maintenance)), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, " NA "))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "net_value",
                header: "Net Value",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data["json_popups_value"].net_value) {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].net_value))}</p>`);
                    } else {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}> NA </p>`);
                    }
                  } else {
                    return [
                      slotProps.data["json_popups_value"].net_value ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].net_value)), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, " NA "))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "interest",
                header: "Interest",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data["json_popups_value"].interest) {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].interest))}</p>`);
                    } else {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}> NA </p>`);
                    }
                  } else {
                    return [
                      slotProps.data["json_popups_value"].interest ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].interest)), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, " NA "))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(_component_Column, {
                field: "income_loss",
                header: "Income/Loss",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (slotProps.data["json_popups_value"].income_loss) {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss))}</p>`);
                    } else {
                      _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}> NA </p>`);
                    }
                  } else {
                    return [
                      slotProps.data["json_popups_value"].income_loss ? (openBlock(), createBlock("p", {
                        key: 0,
                        style: { "font-weight": "501" }
                      }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)) : (openBlock(), createBlock("p", {
                        key: 1,
                        style: { "font-weight": "501" }
                      }, " NA "))
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              if (unref(investmentStore).isSubmitted) {
                _push2(ssrRenderComponent(_component_Column, {
                  field: "",
                  header: "Action",
                  style: { "min-width": "12rem" },
                  alignFrozen: "right",
                  frozen: ""
                }, {
                  body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                    if (_push3) {
                      _push3(`<button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-2 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button>`);
                    } else {
                      return [
                        createVNode("button", {
                          class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                          onClick: ($event) => unref(investmentStore).editHouseProps(slotProps.data)
                        }, [
                          (openBlock(), createBlock("svg", {
                            xmlns: "http://www.w3.org/2000/svg",
                            fill: "none",
                            viewBox: "0 0 24 24",
                            "stroke-width": "1.5",
                            stroke: "currentColor",
                            class: "w-6 h-6"
                          }, [
                            createVNode("path", {
                              "stroke-linecap": "round",
                              "stroke-linejoin": "round",
                              d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                            })
                          ]))
                        ], 8, ["onClick"]),
                        createVNode("button", {
                          class: "p-2 bg-red-200 border-red-500 rounded-xl",
                          onClick: ($event) => unref(investmentStore).deleteHouseProps(slotProps.data)
                        }, [
                          (openBlock(), createBlock("svg", {
                            xmlns: "http://www.w3.org/2000/svg",
                            fill: "none",
                            viewBox: "0 0 24 24",
                            "stroke-width": "1.5",
                            stroke: "currentColor",
                            class: "w-6 h-6 font-bold"
                          }, [
                            createVNode("path", {
                              "stroke-linecap": "round",
                              "stroke-linejoin": "round",
                              d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                            })
                          ]))
                        ], 8, ["onClick"])
                      ];
                    }
                  }),
                  _: 1
                }, _parent2, _scopeId));
              } else {
                _push2(`<!---->`);
              }
            } else {
              return [
                createVNode(_component_Column, {
                  header: "Property Type",
                  field: "json_popups_value.property_type",
                  style: { "min-width": "15rem" },
                  frozen: ""
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.json_popups_value.property_type), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  header: "Lender Name",
                  field: "lender_name",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data["json_popups_value"].lender_name), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "lender_pan",
                  header: "Lender PAN",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data["json_popups_value"].lender_pan.toUpperCase()), 1)
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "lender_type",
                  header: "Lender Type ",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data["json_popups_value"].lender_type ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(slotProps.data["json_popups_value"].lender_type), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, " NA "))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "rent_received",
                  header: "Rent Received",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data["json_popups_value"].rent_received ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].rent_received)), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, " NA "))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "maintenance",
                  header: "Maintenace",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data["json_popups_value"].maintenance ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].maintenance)), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, " NA "))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "net_value",
                  header: "Net Value",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data["json_popups_value"].net_value ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].net_value)), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, " NA "))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "interest",
                  header: "Interest",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data["json_popups_value"].interest ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].interest)), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, " NA "))
                  ]),
                  _: 1
                }),
                createVNode(_component_Column, {
                  field: "income_loss",
                  header: "Income/Loss",
                  style: { "min-width": "12rem" }
                }, {
                  body: withCtx((slotProps) => [
                    slotProps.data["json_popups_value"].income_loss ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data["json_popups_value"].income_loss)), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, " NA "))
                  ]),
                  _: 1
                }),
                unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                  key: 0,
                  field: "",
                  header: "Action",
                  style: { "min-width": "12rem" },
                  alignFrozen: "right",
                  frozen: ""
                }, {
                  body: withCtx((slotProps) => [
                    createVNode("button", {
                      class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                      onClick: ($event) => unref(investmentStore).editHouseProps(slotProps.data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-6 h-6"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                        })
                      ]))
                    ], 8, ["onClick"]),
                    createVNode("button", {
                      class: "p-2 bg-red-200 border-red-500 rounded-xl",
                      onClick: ($event) => unref(investmentStore).deleteHouseProps(slotProps.data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-6 h-6 font-bold"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        })
                      ]))
                    ], 8, ["onClick"])
                  ]),
                  _: 1
                })) : createCommentVNode("", true)
              ];
            }
          }),
          _: 1
        }, _parent));
        _push(`</div>`);
      }
      _push(`<div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailog_SelfOccupiedProperty,
        "onUpdate:visible": ($event) => unref(investmentStore).dailog_SelfOccupiedProperty = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 modal-title text-primary"${_scopeId}>Self Occupied Property</h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 modal-title text-primary" }, "Self Occupied Property")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2"${_scopeId}><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Name</label><input type="text" id="lender_name"${ssrRenderAttr("value", unref(investmentStore).sop.lender_name)} required class="${ssrRenderClass([[
              unref(s$).lender_name.$error ? "border border-red-500" : ""
            ], "capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"])}"${_scopeId}>`);
            if (unref(s$).lender_name.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).lender_name.required.$message.replace("Value", "Lender name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender PAN</label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "serial",
              mask: "aaaaa9999a",
              class: ["w-full", [
                unref(s$).lender_pan.$error ? "border border-red-500" : ""
              ]],
              placeholder: "AHFCS1234F",
              style: { "text-transform": "uppercase" },
              modelValue: unref(investmentStore).sop.lender_pan,
              "onUpdate:modelValue": ($event) => unref(investmentStore).sop.lender_pan = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).lender_pan.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).lender_pan.required.$message.replace("Value", "Lender PAN"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_type" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(s$).lender_type.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).sop.lender_type,
              "onUpdate:modelValue": ($event) => unref(investmentStore).sop.lender_type = $event,
              options: lender_types.value,
              optionLabel: "name",
              optionValue: "code",
              placeholder: "Select a Property",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).lender_type.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).lender_type.required.$message.replace("Value", "Lender type"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}> Income/Loss</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(s$).income_loss.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).sop.income_loss,
              "onUpdate:modelValue": ($event) => unref(investmentStore).sop.income_loss = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(s$).income_loss.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).income_loss.required.$message.replace("Value", "Income loss"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="grid mb-6 gap-y-4 gap-x-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1"${_scopeId}><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}> Address</label><textarea name="" id="" rows="3" required class="${ssrRenderClass([[
              unref(s$).address.$error ? "border border-red-500" : ""
            ], "bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"])}"${_scopeId}>${ssrInterpolate(unref(investmentStore).sop.address)}</textarea>`);
            if (unref(s$).address.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(s$).address.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Name"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "lender_name",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).sop.lender_name = $event,
                    onKeypress: ($event) => isLetter($event),
                    class: ["capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [
                      unref(s$).lender_name.$error ? "border border-red-500" : ""
                    ]],
                    required: ""
                  }, null, 42, ["onUpdate:modelValue", "onKeypress"]), [
                    [vModelText, unref(investmentStore).sop.lender_name]
                  ]),
                  unref(s$).lender_name.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).lender_name.required.$message.replace("Value", "Lender name")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender PAN"),
                  createVNode(_component_InputMask, {
                    id: "serial",
                    mask: "aaaaa9999a",
                    class: ["w-full", [
                      unref(s$).lender_pan.$error ? "border border-red-500" : ""
                    ]],
                    placeholder: "AHFCS1234F",
                    style: { "text-transform": "uppercase" },
                    modelValue: unref(investmentStore).sop.lender_pan,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).sop.lender_pan = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(s$).lender_pan.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).lender_pan.required.$message.replace("Value", "Lender PAN")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_type",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Type"),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(s$).lender_type.$error ? "border border-red-500" : ""
                    ]],
                    modelValue: unref(investmentStore).sop.lender_type,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).sop.lender_type = $event,
                    options: lender_types.value,
                    optionLabel: "name",
                    optionValue: "code",
                    placeholder: "Select a Property",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(s$).lender_type.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).lender_type.required.$message.replace("Value", "Lender type")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, " Income/Loss"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(s$).income_loss.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).sop.income_loss,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).sop.income_loss = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(s$).income_loss.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).income_loss.required.$message.replace("Value", "Income loss")), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "grid mb-6 gap-y-4 gap-x-6 md:grid-cols-1 2xl:grid-cols-1 sm:grid-cols-1 xl:grid-cols-1 lg:grid-cols-1" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, " Address"),
                  withDirectives(createVNode("textarea", {
                    name: "",
                    id: "",
                    rows: "3",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).sop.address = $event,
                    class: ["bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [
                      unref(s$).address.$error ? "border border-red-500" : ""
                    ]],
                    required: ""
                  }, "\r\n                    ", 10, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).sop.address]
                  ]),
                  unref(s$).address.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(s$).address.$errors[0].$message), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  onClick: submitSOP
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailog_LetOutProperty,
        "onUpdate:visible": ($event) => unref(investmentStore).dailog_LetOutProperty = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 modal-title text-primary"${_scopeId}>Let Out Property</h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 modal-title text-primary" }, "Let Out Property")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"${_scopeId}><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Name</label><input type="text" id="lender_name"${ssrRenderAttr("value", unref(investmentStore).lop.lender_name)} required class="${ssrRenderClass([[
              unref(v$).lender_name.$error ? "border border-red-500" : ""
            ], "capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"])}"${_scopeId}>`);
            if (unref(v$).lender_name.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).lender_name.required.$message.replace("Value", "Lender name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_pan" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender PAN</label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "serial",
              mask: "aaaaa9999a",
              class: ["w-full", [
                unref(v$).lender_pan.$error ? "border border-red-500" : ""
              ]],
              placeholder: "AHFCS1234F",
              style: { "text-transform": "uppercase" },
              modelValue: unref(investmentStore).lop.lender_pan,
              "onUpdate:modelValue": ($event) => unref(investmentStore).lop.lender_pan = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).lender_pan.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).lender_pan.required.$message.replace("Value", "Lender PAN"))} </span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_type" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(v$).lender_type.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).lop.lender_type,
              "onUpdate:modelValue": ($event) => unref(investmentStore).lop.lender_type = $event,
              options: lender_types.value,
              optionLabel: "name",
              optionValue: "code",
              placeholder: "Select a Property",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).lender_type.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).lender_type.$errors[0].$message)} ${ssrInterpolate(unref(v$).lender_type.required.$message.replace("Value", "Lender type"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="rend_received" class="block mb-2 font-medium text-gray-900"${_scopeId}>Rent Received</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).rent_received.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).lop.rent_received,
              "onUpdate:modelValue": ($event) => unref(investmentStore).lop.rent_received = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(v$).rent_received.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).rent_received.required.$message.replace("Value", "Rent received"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="municipal_tax" class="block mb-2 font-medium text-gray-900"${_scopeId}>Municipal Tax</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).municipal_tax.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).lop.municipal_tax,
              "onUpdate:modelValue": ($event) => unref(investmentStore).lop.municipal_tax = $event,
              required: "",
              onFocusout: unref(investmentStore).income_loss_calculation
            }, null, _parent2, _scopeId));
            if (unref(v$).municipal_tax.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).municipal_tax.required.$message.replace("Value", "Municipal tax"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="maintenance" class="block mb-2 font-medium text-gray-900"${_scopeId}>Maintenance</label><input type="text" id="maintenance"${ssrRenderAttr("value", unref(investmentStore).lop.maintenance)} readonly class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${_scopeId}></div><div class=""${_scopeId}><label for="Net_Value" class="block mb-2 font-medium text-gray-900"${_scopeId}>Net Value</label><input type="text" id="Net_Value"${ssrRenderAttr("value", unref(investmentStore).lop.net_value)} readonly class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5"${_scopeId}></div><div class=""${_scopeId}><label for="Interest" class="block mb-2 font-medium text-gray-900"${_scopeId}>Interest</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(v$).interest.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).lop.interest,
              "onUpdate:modelValue": ($event) => unref(investmentStore).lop.interest = $event,
              required: "",
              onFocusout: unref(investmentStore).income_loss_calculation
            }, null, _parent2, _scopeId));
            if (unref(v$).interest.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).interest.required.$message.replace("Value", "Interest"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="Income/Loss" class="block mb-2 font-medium text-gray-900"${_scopeId}>Income/Loss</label><input type="text" id="Income/Loss"${ssrRenderAttr("value", unref(investmentStore).lop.income_loss)} readonly class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${_scopeId}></div></div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Name"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "lender_name",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.lender_name = $event,
                    onKeypress: ($event) => isLetter($event),
                    class: ["capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [
                      unref(v$).lender_name.$error ? "border border-red-500" : ""
                    ]],
                    required: ""
                  }, null, 42, ["onUpdate:modelValue", "onKeypress"]), [
                    [vModelText, unref(investmentStore).lop.lender_name]
                  ]),
                  unref(v$).lender_name.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).lender_name.required.$message.replace("Value", "Lender name")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_pan",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender PAN"),
                  createVNode(_component_InputMask, {
                    id: "serial",
                    mask: "aaaaa9999a",
                    class: ["w-full", [
                      unref(v$).lender_pan.$error ? "border border-red-500" : ""
                    ]],
                    placeholder: "AHFCS1234F",
                    style: { "text-transform": "uppercase" },
                    modelValue: unref(investmentStore).lop.lender_pan,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.lender_pan = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).lender_pan.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).lender_pan.required.$message.replace("Value", "Lender PAN")) + " ", 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_type",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Type"),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(v$).lender_type.$error ? "border border-red-500" : ""
                    ]],
                    modelValue: unref(investmentStore).lop.lender_type,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.lender_type = $event,
                    options: lender_types.value,
                    optionLabel: "name",
                    optionValue: "code",
                    placeholder: "Select a Property",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(v$).lender_type.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).lender_type.$errors[0].$message) + " " + toDisplayString(unref(v$).lender_type.required.$message.replace("Value", "Lender type")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "rend_received",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Rent Received"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).rent_received.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).lop.rent_received,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.rent_received = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).rent_received.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).rent_received.required.$message.replace("Value", "Rent received")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "municipal_tax",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Municipal Tax"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).municipal_tax.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).lop.municipal_tax,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.municipal_tax = $event,
                    required: "",
                    onFocusout: unref(investmentStore).income_loss_calculation
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class", "onFocusout"]),
                  unref(v$).municipal_tax.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).municipal_tax.required.$message.replace("Value", "Municipal tax")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "maintenance",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Maintenance"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "maintenance",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.maintenance = $event,
                    readonly: "",
                    class: "bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).lop.maintenance]
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "Net_Value",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Net Value"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "Net_Value",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.net_value = $event,
                    readonly: "",
                    class: "bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).lop.net_value]
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "Interest",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Interest"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(v$).interest.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).lop.interest,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.interest = $event,
                    required: "",
                    onFocusout: unref(investmentStore).income_loss_calculation
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class", "onFocusout"]),
                  unref(v$).interest.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).interest.required.$message.replace("Value", "Interest")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "Income/Loss",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Income/Loss"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "Income/Loss",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).lop.income_loss = $event,
                    readonly: "",
                    class: "bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).lop.income_loss]
                  ])
                ])
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  onClick: submitLop
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(investmentStore).dailog_DeemedLetOutProperty,
        "onUpdate:visible": ($event) => unref(investmentStore).dailog_DeemedLetOutProperty = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 modal-title text-primary"${_scopeId}>Deemed Let Out Property</h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 modal-title text-primary" }, "Deemed Let Out Property")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3"${_scopeId}><div class=""${_scopeId}><label for="lender_name" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Name</label><input type="text" id="lender_name"${ssrRenderAttr("value", unref(investmentStore).dlop.lender_name)} required class="${ssrRenderClass([[
              unref(p$).lender_name.$error ? "border border-red-500" : ""
            ], "capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"])}"${_scopeId}>`);
            if (unref(p$).lender_name.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).lender_name.required.$message.replace("Value", "Lender name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_pan" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender PAN</label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "serial",
              mask: "aaaaa9999a",
              class: ["w-full", [
                unref(p$).lender_pan.$error ? "border border-red-500" : ""
              ]],
              placeholder: "AHFCS1234F",
              style: { "text-transform": "uppercase" },
              modelValue: unref(investmentStore).dlop.lender_pan,
              "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.lender_pan = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).lender_pan.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).lender_pan.required.$message.replace("Value", "Lender PAN"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="lender_type" class="block mb-2 font-medium text-gray-900"${_scopeId}>Lender Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                unref(p$).lender_type.$error ? "border border-red-500" : ""
              ]],
              modelValue: unref(investmentStore).dlop.lender_type,
              "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.lender_type = $event,
              options: lender_types.value,
              optionLabel: "name",
              optionValue: "code",
              placeholder: "Select a Property",
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).lender_type.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).lender_type.required.$message.replace("Value", "Lender type"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="rend_received" class="block mb-2 font-medium text-gray-900"${_scopeId}>Rent Received</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(p$).rent_received.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).dlop.rent_received,
              "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.rent_received = $event,
              required: ""
            }, null, _parent2, _scopeId));
            if (unref(p$).rent_received.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).rent_received.required.$message.replace("Value", "Rent received"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="municipal_tax" class="block mb-2 font-medium text-gray-900"${_scopeId}>Municipal Tax</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(p$).municipal_tax.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).dlop.municipal_tax,
              "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.municipal_tax = $event,
              required: "",
              onFocusout: unref(investmentStore).income_loss_calculation
            }, null, _parent2, _scopeId));
            if (unref(p$).municipal_tax.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).municipal_tax.required.$message.replace("Value", "Municipal Tax"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="maintenance" class="block mb-2 font-medium text-gray-900"${_scopeId}>Maintenance</label><input type="text" id="maintenance"${ssrRenderAttr("value", unref(investmentStore).dlop.maintenance)} readonly class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${_scopeId}></div><div class=""${_scopeId}><label for="Net_Value" class="block mb-2 font-medium text-gray-900"${_scopeId}>Net Value</label><input type="text" id="Net_Value"${ssrRenderAttr("value", unref(investmentStore).dlop.net_value)} readonly class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5"${_scopeId}></div><div class=""${_scopeId}><label for="Interest" class="block mb-2 font-medium text-gray-900"${_scopeId}>Interest</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              id: "rendPaid_inp",
              class: ["w-full", [
                unref(p$).interest.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(investmentStore).dlop.interest,
              "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.interest = $event,
              required: "",
              onFocusout: unref(investmentStore).income_loss_calculation
            }, null, _parent2, _scopeId));
            if (unref(p$).interest.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).interest.required.$message.replace("Value", "Interest"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class=""${_scopeId}><label for="Income/Loss" class="block mb-2 font-medium text-gray-900"${_scopeId}>Income/Loss</label><input type="text" id="Income/Loss"${ssrRenderAttr("value", unref(investmentStore).dlop.income_loss)} readonly class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"${_scopeId}></div></div><div class="text-end"${_scopeId}><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid my-4 mb-6 gap-y-4 gap-x-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3" }, [
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_name",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Name"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "lender_name",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.lender_name = $event,
                    onKeypress: ($event) => isLetter($event),
                    class: ["capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5", [
                      unref(p$).lender_name.$error ? "border border-red-500" : ""
                    ]],
                    required: ""
                  }, null, 42, ["onUpdate:modelValue", "onKeypress"]), [
                    [vModelText, unref(investmentStore).dlop.lender_name]
                  ]),
                  unref(p$).lender_name.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).lender_name.required.$message.replace("Value", "Lender name")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_pan",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender PAN"),
                  createVNode(_component_InputMask, {
                    id: "serial",
                    mask: "aaaaa9999a",
                    class: ["w-full", [
                      unref(p$).lender_pan.$error ? "border border-red-500" : ""
                    ]],
                    placeholder: "AHFCS1234F",
                    style: { "text-transform": "uppercase" },
                    modelValue: unref(investmentStore).dlop.lender_pan,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.lender_pan = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(p$).lender_pan.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).lender_pan.required.$message.replace("Value", "Lender PAN")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "lender_type",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Lender Type"),
                  createVNode(_component_Dropdown, {
                    class: ["w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50", [
                      unref(p$).lender_type.$error ? "border border-red-500" : ""
                    ]],
                    modelValue: unref(investmentStore).dlop.lender_type,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.lender_type = $event,
                    options: lender_types.value,
                    optionLabel: "name",
                    optionValue: "code",
                    placeholder: "Select a Property",
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                  unref(p$).lender_type.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).lender_type.required.$message.replace("Value", "Lender type")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "rend_received",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Rent Received"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(p$).rent_received.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).dlop.rent_received,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.rent_received = $event,
                    required: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                  unref(p$).rent_received.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).rent_received.required.$message.replace("Value", "Rent received")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "municipal_tax",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Municipal Tax"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(p$).municipal_tax.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).dlop.municipal_tax,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.municipal_tax = $event,
                    required: "",
                    onFocusout: unref(investmentStore).income_loss_calculation
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class", "onFocusout"]),
                  unref(p$).municipal_tax.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).municipal_tax.required.$message.replace("Value", "Municipal Tax")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "maintenance",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Maintenance"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "maintenance",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.maintenance = $event,
                    readonly: "",
                    class: "bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).dlop.maintenance]
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "Net_Value",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Net Value"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "Net_Value",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.net_value = $event,
                    readonly: "",
                    class: "bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).dlop.net_value]
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "Interest",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Interest"),
                  createVNode(_component_InputNumber, {
                    id: "rendPaid_inp",
                    class: ["w-full", [
                      unref(p$).interest.$error ? "p-invalid" : ""
                    ]],
                    modelValue: unref(investmentStore).dlop.interest,
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.interest = $event,
                    required: "",
                    onFocusout: unref(investmentStore).income_loss_calculation
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "class", "onFocusout"]),
                  unref(p$).interest.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(p$).interest.required.$message.replace("Value", "Interest")), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("label", {
                    for: "Income/Loss",
                    class: "block mb-2 font-medium text-gray-900"
                  }, "Income/Loss"),
                  withDirectives(createVNode("input", {
                    type: "text",
                    id: "Income/Loss",
                    "onUpdate:modelValue": ($event) => unref(investmentStore).dlop.income_loss = $event,
                    readonly: "",
                    class: "bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                  }, null, 8, ["onUpdate:modelValue"]), [
                    [vModelText, unref(investmentStore).dlop.income_loss]
                  ])
                ])
              ]),
              createVNode("div", { class: "text-end" }, [
                createVNode("button", {
                  class: "px-4 py-2 text-center text-white bg-orange-700 rounded-md",
                  onClick: submitDlop
                }, "Save")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/house_property/house_property.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "reimbursement",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    ref([]);
    const onRowEditSave = (event) => {
      let { newData, index } = event;
      investmentStore.reimbursmentSource[index] = newData;
      investmentStore.updatedRowSource = newData;
      investmentStore.getFormId = 1;
      var data = {
        fs_id: newData.fs_id,
        declaration_amount: newData.dec_amount,
        select_option: newData.select_option
      };
      investmentStore.formDataSource.push(data);
      console.log(newData);
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 25,
        value: unref(investmentStore).reimbursmentSource,
        onRowEditSave,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        editMode: "row",
        editingRows: unref(investmentStore).editingRowSource,
        "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Sections",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Particulars",
              style: { "min-width": "12rem", "text-align": "left !important" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.particular == "Vehicle Reimbursement") {
                    _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.particular)}</p><div class="flex py-2"${_scopeId2}><input type="radio" name="Vehicle Reimbursement" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}"${ssrRenderAttr("value", slotProps.data.section_option_1)} class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_1)}</p></div><div class="flex py-2"${_scopeId2}><input type="radio" name="Vehicle Reimbursement" id="" style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}"${ssrRenderAttr("value", slotProps.data.section_option_2)} class="form-check-input"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.select_option, slotProps.data.section_option_2)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false) ? " checked" : ""}${_scopeId2}><p class="mx-2" style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.section_option_2)}</p></div></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(slotProps.data.particular)}</p></div>`);
                  }
                } else {
                  return [
                    slotProps.data.particular == "Vehicle Reimbursement" ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "Vehicle Reimbursement",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          value: slotProps.data.section_option_1,
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["value", "onUpdate:modelValue", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_1), 1)
                      ]),
                      createVNode("div", { class: "flex py-2" }, [
                        withDirectives(createVNode("input", {
                          type: "radio",
                          name: "Vehicle Reimbursement",
                          id: "",
                          style: { "height": "20px", "width": "20px" },
                          value: slotProps.data.section_option_2,
                          class: "form-check-input",
                          "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                          checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                        }, null, 8, ["value", "onUpdate:modelValue", "checked"]), [
                          [vModelRadio, slotProps.data.select_option]
                        ]),
                        createVNode("p", {
                          class: "mx-2",
                          style: { "font-weight": "501" }
                        }, toDisplayString(slotProps.data.section_option_2), 1)
                      ])
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1)
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reference",
              header: "References ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button${ssrRenderAttrs(mergeProps({
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                } else {
                  return [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "max_amount",
              header: "Max Limit",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              header: "Declaration Amount",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</div>`);
                  } else if (slotProps.data.particular == "Vehicle Reimbursement") {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.selected_section_options) {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</p></div>`);
                    } else if (slotProps.data.select_option) {
                      _push3(`<div${_scopeId2}>`);
                      _push3(ssrRenderComponent(_component_InputNumber, {
                        class: "mx-auto text-lg font-semibold w-7",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, _parent3, _scopeId2));
                      _push3(`</div>`);
                    } else {
                      _push3(`<div${_scopeId2}><p style="${ssrRenderStyle({ "font-weight": "501" })}"${_scopeId2}>--</p></div>`);
                    }
                    _push3(`</div>`);
                  } else {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : slotProps.data.particular == "Vehicle Reimbursement" ? (openBlock(), createBlock("div", { key: 1 }, [
                      slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                      ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode(_component_InputNumber, {
                          class: "mx-auto text-lg font-semibold w-7",
                          modelValue: slotProps.data.dec_amt,
                          "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                          onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                          mode: "currency",
                          currency: "INR",
                          locale: "en-US",
                          readonly: !unref(investmentStore).isSubmitted
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                      ])) : (openBlock(), createBlock("div", { key: 2 }, [
                        createVNode("p", { style: { "font-weight": "501" } }, "--")
                      ]))
                    ])) : (openBlock(), createBlock("div", { key: 2 }, [
                      createVNode(_component_InputNumber, {
                        class: "text-lg font-semibold w-28",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                    ]))
                  ];
                }
              }),
              editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28",
                    readonly: !unref(investmentStore).isSubmitted
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "text-lg font-semibold w-28",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            if (unref(investmentStore).isSubmitted) {
              _push2(ssrRenderComponent(_component_Column, {
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              }, null, _parent2, _scopeId));
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "12rem", "text-align": "left !important" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.particular == "Vehicle Reimbursement" ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1),
                    createVNode("div", { class: "flex py-2" }, [
                      withDirectives(createVNode("input", {
                        type: "radio",
                        name: "Vehicle Reimbursement",
                        id: "",
                        style: { "height": "20px", "width": "20px" },
                        value: slotProps.data.section_option_1,
                        class: "form-check-input",
                        "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                        checked: slotProps.data.section_option_1 == slotProps.data.selected_section_options ? true : false
                      }, null, 8, ["value", "onUpdate:modelValue", "checked"]), [
                        [vModelRadio, slotProps.data.select_option]
                      ]),
                      createVNode("p", {
                        class: "mx-2",
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.section_option_1), 1)
                    ]),
                    createVNode("div", { class: "flex py-2" }, [
                      withDirectives(createVNode("input", {
                        type: "radio",
                        name: "Vehicle Reimbursement",
                        id: "",
                        style: { "height": "20px", "width": "20px" },
                        value: slotProps.data.section_option_2,
                        class: "form-check-input",
                        "onUpdate:modelValue": ($event) => slotProps.data.select_option = $event,
                        checked: slotProps.data.section_option_2 == slotProps.data.selected_section_options ? true : false
                      }, null, 8, ["value", "onUpdate:modelValue", "checked"]), [
                        [vModelRadio, slotProps.data.select_option]
                      ]),
                      createVNode("p", {
                        class: "mx-2",
                        style: { "font-weight": "501" }
                      }, toDisplayString(slotProps.data.section_option_2), 1)
                    ])
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(slotProps.data.particular), 1)
                  ]))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  withDirectives((openBlock(), createBlock("button", {
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, [
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-warning",
                      "aria-hidden": "true"
                    })
                  ])), [
                    [_directive_tooltip, slotProps.data.reference]
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "max_amount",
                header: "Max Limit",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : slotProps.data.particular == "Vehicle Reimbursement" ? (openBlock(), createBlock("div", { key: 1 }, [
                    slotProps.data.selected_section_options ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                    ])) : slotProps.data.select_option ? (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode(_component_InputNumber, {
                        class: "mx-auto text-lg font-semibold w-7",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                    ])) : (openBlock(), createBlock("div", { key: 2 }, [
                      createVNode("p", { style: { "font-weight": "501" } }, "--")
                    ]))
                  ])) : (openBlock(), createBlock("div", { key: 2 }, [
                    createVNode(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                  ]))
                ]),
                editor: withCtx(({ data, field }) => [
                  createVNode(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28",
                    readonly: !unref(investmentStore).isSubmitted
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ]))
                ]),
                _: 1
              }),
              unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                key: 0,
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              })) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/reimbursement/reimbursement.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "previous_employer_income",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    ref([]);
    const onRowEditSave = (event) => {
      let { newData, index } = event;
      investmentStore.previousEmployeerIncomeSource[index] = newData;
      investmentStore.updatedRowSource = newData;
      investmentStore.getFormId = 1;
      var data = {
        fs_id: newData.fs_id,
        declaration_amount: newData.dec_amount
      };
      investmentStore.formDataSource.push(data);
      console.log(newData);
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        resizableColumns: "",
        columnResizeMode: "expand",
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 10,
        value: unref(investmentStore).previousEmployeerIncomeSource,
        onRowEditSave,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        editMode: "row",
        editingRows: unref(investmentStore).editingRowSource,
        "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Sections",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Particulars",
              style: { "min-width": "12rem", "text-align": "left !important" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reference",
              header: "References ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button${ssrRenderAttrs(mergeProps({
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                } else {
                  return [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              header: "Declaration Amount",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</div>`);
                  } else {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode(_component_InputNumber, {
                        class: "text-lg font-semibold w-28",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                    ]))
                  ];
                }
              }),
              editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28",
                    readonly: !unref(investmentStore).isSubmitted
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "text-lg font-semibold w-28",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            if (unref(investmentStore).isSubmitted) {
              _push2(ssrRenderComponent(_component_Column, {
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              }, null, _parent2, _scopeId));
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "12rem", "text-align": "left !important" }
              }),
              createVNode(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  withDirectives((openBlock(), createBlock("button", {
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, [
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-warning",
                      "aria-hidden": "true"
                    })
                  ])), [
                    [_directive_tooltip, slotProps.data.reference]
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                  ]))
                ]),
                editor: withCtx(({ data, field }) => [
                  createVNode(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28",
                    readonly: !unref(investmentStore).isSubmitted
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ]))
                ]),
                _: 1
              }),
              unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                key: 0,
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              })) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/previous_employer_income/previous_employer_income.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "other_source_of_income",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    const service = Service();
    const onRowEditSave = (event) => {
      let { newData, index } = event;
      investmentStore.otherIncomeSource[index] = newData;
      investmentStore.updatedRowSource = newData;
      investmentStore.getFormId = 1;
      var data = {
        fs_id: newData.fs_id,
        declaration_amount: newData.dec_amount
      };
      investmentStore.formDataSource.push(data);
      console.log(newData);
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Dialog = resolveComponent("Dialog");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div><div class="table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        resizableColumns: "",
        columnResizeMode: "expand",
        ref: "dt",
        dataKey: "fs_id",
        paginator: true,
        rows: 5,
        value: unref(investmentStore).otherIncomeSource,
        onRowEditSave,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        editMode: "row",
        editingRows: unref(investmentStore).editingRowSource,
        "onUpdate:editingRows": ($event) => unref(investmentStore).editingRowSource = $event,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Sections",
              field: "section",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "particular",
              header: "Particulars",
              style: { "min-width": "12rem", "text-align": "left !important" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "reference",
              header: "References ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button${ssrRenderAttrs(mergeProps({
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, ssrGetDirectiveProps(_ctx, _directive_tooltip, slotProps.data.reference)))}${_scopeId2}><i class="fa fa-exclamation-circle text-warning" aria-hidden="true"${_scopeId2}></i></button>`);
                } else {
                  return [
                    withDirectives((openBlock(), createBlock("button", {
                      type: "button",
                      class: "border-0 outline-none btn btn-transprarent"
                    }, [
                      createVNode("i", {
                        class: "fa fa-exclamation-circle text-warning",
                        "aria-hidden": "true"
                      })
                    ])), [
                      [_directive_tooltip, slotProps.data.reference]
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              header: "Declaration Amount",
              style: { "min-width": "15rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div class="dec_amt"${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}</div>`);
                  } else {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, _parent3, _scopeId2));
                    _push3(`</div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "dec_amt"
                    }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode(_component_InputNumber, {
                        class: "text-lg font-semibold w-28",
                        modelValue: slotProps.data.dec_amt,
                        "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                        onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                        mode: "currency",
                        currency: "INR",
                        locale: "en-US",
                        readonly: !unref(investmentStore).isSubmitted
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                    ]))
                  ];
                }
              }),
              editor: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28",
                    readonly: !unref(investmentStore).isSubmitted
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_InputNumber, {
                      modelValue: data[field],
                      "onUpdate:modelValue": ($event) => data[field] = $event,
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      class: "text-lg font-semibold w-28",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Status",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dec_amount) {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Completed</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  }
                } else {
                  return [
                    slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            if (unref(investmentStore).isSubmitted) {
              _push2(ssrRenderComponent(_component_Column, {
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              }, null, _parent2, _scopeId));
            } else {
              _push2(`<!---->`);
            }
          } else {
            return [
              createVNode(_component_Column, {
                header: "Sections",
                field: "section",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "particular",
                header: "Particulars",
                style: { "min-width": "12rem", "text-align": "left !important" }
              }),
              createVNode(_component_Column, {
                field: "reference",
                header: "References ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  withDirectives((openBlock(), createBlock("button", {
                    type: "button",
                    class: "border-0 outline-none btn btn-transprarent"
                  }, [
                    createVNode("i", {
                      class: "fa fa-exclamation-circle text-warning",
                      "aria-hidden": "true"
                    })
                  ])), [
                    [_directive_tooltip, slotProps.data.reference]
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                header: "Declaration Amount",
                style: { "min-width": "15rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "dec_amt"
                  }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode(_component_InputNumber, {
                      class: "text-lg font-semibold w-28",
                      modelValue: slotProps.data.dec_amt,
                      "onUpdate:modelValue": ($event) => slotProps.data.dec_amt = $event,
                      onFocusout: ($event) => unref(investmentStore).getDeclarationAmount(slotProps.data),
                      mode: "currency",
                      currency: "INR",
                      locale: "en-US",
                      readonly: !unref(investmentStore).isSubmitted
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "onFocusout", "readonly"])
                  ]))
                ]),
                editor: withCtx(({ data, field }) => [
                  createVNode(_component_InputNumber, {
                    modelValue: data[field],
                    "onUpdate:modelValue": ($event) => data[field] = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-US",
                    class: "text-lg font-semibold w-28",
                    readonly: !unref(investmentStore).isSubmitted
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "readonly"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "Status",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dec_amount ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Completed")
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ]))
                ]),
                _: 1
              }),
              unref(investmentStore).isSubmitted ? (openBlock(), createBlock(_component_Column, {
                key: 0,
                rowEditor: true,
                style: { "width": "10%", "min-width": "8rem" },
                bodyStyle: "text-align:center",
                header: "Action"
              })) : createCommentVNode("", true)
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="my-3 text-end"><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Submit</button></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(investmentStore).canShowSubmissionStatus,
        "onUpdate:visible": ($event) => unref(investmentStore).canShowSubmissionStatus = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "40vw" },
        modal: true,
        closable: true,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<i class="m-auto my-4 text-green-400 pi pi-check-circle" style="${ssrRenderStyle({ "font-size": "8rem" })}"${_scopeId}></i>`);
          } else {
            return [
              createVNode("i", {
                class: "m-auto my-4 text-green-400 pi pi-check-circle",
                style: { "font-size": "8rem" }
              })
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="font-semibold text-center fs-2"${_scopeId}>Submission Successfull</p><div class="p-3 my-3"${_scopeId}><div${_scopeId}><span class="text-lg font-semibold"${_scopeId}>Dear</span><span class="font-semibold text-red-400"${_scopeId}>${ssrInterpolate(unref(service).current_user_name)},</span></div><div class="my-3"${_scopeId}><p class="text-lg font-semibold"${_scopeId}>Your investment has been submitted successfully!</p></div><div class="my-3"${_scopeId}><p class="text-lg font-semibold"${_scopeId}> Please be note, the updated investment will be considered for your upcoming payroll <span class="text-lg text-red-400"${_scopeId}> i.e [ open pay period like - ${ssrInterpolate(new Date().toLocaleString("default", { month: "long" }))} ,${ssrInterpolate(new Date().getFullYear())}.] </span></p><p class="py-3 text-lg font-semibold"${_scopeId}> The submitted form can be viewed on your ESS portal ==&gt; Paycheck ==&gt; Investment </p><p class="text-lg font-semibold"${_scopeId}> This message is sent to your registered email ID. </p></div></div>`);
          } else {
            return [
              createVNode("p", { class: "font-semibold text-center fs-2" }, "Submission Successfull"),
              createVNode("div", { class: "p-3 my-3" }, [
                createVNode("div", null, [
                  createVNode("span", { class: "text-lg font-semibold" }, "Dear"),
                  createVNode("span", { class: "font-semibold text-red-400" }, toDisplayString(unref(service).current_user_name) + ",", 1)
                ]),
                createVNode("div", { class: "my-3" }, [
                  createVNode("p", { class: "text-lg font-semibold" }, "Your investment has been submitted successfully!")
                ]),
                createVNode("div", { class: "my-3" }, [
                  createVNode("p", { class: "text-lg font-semibold" }, [
                    createTextVNode(" Please be note, the updated investment will be considered for your upcoming payroll "),
                    createVNode("span", { class: "text-lg text-red-400" }, " i.e [ open pay period like - " + toDisplayString(new Date().toLocaleString("default", { month: "long" })) + " ," + toDisplayString(new Date().getFullYear()) + ".] ", 1)
                  ]),
                  createVNode("p", { class: "py-3 text-lg font-semibold" }, " The submitted form can be viewed on your ESS portal ==> Paycheck ==> Investment "),
                  createVNode("p", { class: "text-lg font-semibold" }, " This message is sent to your registered email ID. ")
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/other_source_of_income/other_source_of_income.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const investments_and_exemption_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "investments_and_exemption",
  __ssrInlineRender: true,
  setup(__props) {
    const investmentStore = investmentMainStore();
    const activetab = ref(investmentStore.investment_exemption_steps);
    onMounted(async () => {
      console.log(activetab.value);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(`<div class="w-full">`);
      _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
      _push(`<div class="p-2 pb-0 mb-3 bg-white rounded-lg shadow tw-card left-line" style="${ssrRenderStyle({ "background-color": "white" })}"><ul class="bg-white divide-x py-auto nav nav-pills divide-solid nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 1 ? "active" : ""], "mx-3 nav-link"])}"> HRA </a></li><li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 2 ? "active" : ""], "mx-3 nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Section 80C &amp; 80CCC </a></li><li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 3 ? "active" : ""], "mx-2 nav-link mx-xl-3"])}" role="tab" aria-controls="" aria-selected="true"> Other Exemptions </a></li><li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 4 ? "active" : ""], "mx-3 nav-link"])}" role="tab" aria-controls="" aria-selected="true"> House Property </a></li>`);
      if (unref(investmentStore).reimbursmentSource) {
        _push(`<li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 5 ? "active" : ""], "mx-2 nav-link mx-xl-3"])}" role="tab" aria-controls="" aria-selected="true"> Reimbursement </a></li>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).previousEmployeerIncomeSource) {
        _push(`<li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 6 ? "active" : ""], "mx-3 nav-link"])}" role="tab" aria-controls="" aria-selected="true"> Previous Employer Income </a></li>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<li class="nav-item" role="presentation"><a id="" data-bs-toggle="pill" href="" class="${ssrRenderClass([[unref(investmentStore).investment_exemption_steps === 7 ? "active" : ""], "mx-2 nav-link mx-xl-3"])}" role="tab" aria-controls="" aria-selected="true"> Other Source Of Income </a></li></ul></div><div class="tab-content" id="">`);
      if (unref(investmentStore).investment_exemption_steps === 1) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).investment_exemption_steps === 2) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).investment_exemption_steps === 3) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).investment_exemption_steps === 4) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).investment_exemption_steps === 5) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).investment_exemption_steps === 6) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(investmentStore).investment_exemption_steps === 7) {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/investments_and_exemption/investments_and_exemption.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
