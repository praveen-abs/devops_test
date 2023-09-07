import { ref, onMounted, resolveComponent, resolveDirective, mergeProps, unref, withCtx, createTextVNode, toDisplayString, createVNode, openBlock, createBlock, Fragment, renderList, createCommentVNode, useSSRContext } from "vue";
import { ssrInterpolate, ssrRenderStyle, ssrRenderAttrs, ssrGetDirectiveProps, ssrIncludeBooleanAttr, ssrRenderComponent, ssrRenderList } from "vue/server-renderer";
import axios from "axios";
import dayjs from "dayjs";
import { i as investmentMainStore, a as investmentFormulaStore } from "./investmentMainStore52374.js";
import { _ as _export_sfc } from "./_plugin-vue_export-helper52374.js";
const declaration_vue_vue_type_style_index_0_scoped_b2700813_lang = "";
const _sfc_main = {
  __name: "declaration",
  __ssrInlineRender: true,
  setup(__props) {
    ref();
    const dynmaicHeadersForMonthTax = ref();
    const taxComputationSource = ref();
    onMounted(() => {
      investmentStore.canShowLoading = true;
      investmentStore.fetchInvestmentSummary();
      investmentStore.fetchTaxableIncomeInfo();
      console.log(new Date().getFullYear() - 1);
      axios.get("/investments/monthTaxDashboard").then((res) => {
        monthWiseData.value.push(res.data.date);
        taxComputationSource.value = res.data.taxcalculation;
        let obj = Object.entries(res.data.date).map((item) => {
          return {
            title: item[0]
          };
        });
        dynmaicHeadersForMonthTax.value = obj;
      });
    });
    const investmentStore = investmentMainStore();
    const formula = investmentFormulaStore();
    const tax_deduction = ref();
    const total_gross = ref();
    const total_taxable = ref();
    const monthWiseData = ref([]);
    ref();
    const regime = ref();
    const age = ref();
    ref();
    const lastUpdated = ref();
    const isRegimeSwitched = ref(false);
    ref([
      { name: "old", value: "old" },
      { name: "new", value: "new" }
    ]);
    const switch_regime_dailog = ref(false);
    const saveRegime = () => {
      switch_regime_dailog.value = false;
      investmentStore.canShowLoading = true;
      let selectedRegime = "";
      if (regime.value == "old") {
        selectedRegime = "new";
      } else {
        selectedRegime = "old";
      }
      axios.post("/investments/saveRegime", {
        regime: selectedRegime
      }).finally(() => {
        investmentStore.canShowLoading = false;
        fetchTaxableIncomeInfo();
        isRegimeSwitched.value = true;
      });
    };
    const findRegime = (regime2) => {
      switch (regime2) {
        case "old":
          return "OLD TAX REGIME";
        case "new":
          return "NEW TAX REGIME";
        default:
          return "NEW TAX REGIME";
      }
    };
    const fetchTaxableIncomeInfo = async () => {
      await axios.get("/investments/TaxDeclaration").then((res) => {
        tax_deduction.value = res.data;
        if (res.data[7].regime == "old") {
          total_gross.value = res.data[6].old_regime;
        } else {
          total_gross.value = res.data[6].new_regime;
        }
        total_taxable.value = res.data[7].old_regime;
        age.value = res.data[7].age;
        regime.value = res.data[7].regime;
        lastUpdated.value = res.data[7].last_updated;
      }).finally(() => {
        investmentStore.canShowLoading = false;
        investmentStore.disableRegime(lastUpdated.value);
      });
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div class="p-1" data-v-b2700813><h1 class="font-[&#39;Poppins&#39;]" data-v-b2700813>Investments</h1><div class="flex w-[100%]" data-v-b2700813><div class="row w-[100%] items-center" data-v-b2700813><div class="col-8 flex items-center justify-start" data-v-b2700813><p class="font-semibold text-black text-2xl items-center flex" data-v-b2700813>Tax Deductions FY ${ssrInterpolate(new Date().getFullYear())}-${ssrInterpolate(new Date().getFullYear() + 1)}<span class="text-[red] font-[&#39;Poppins&#39;]" data-v-b2700813>! Kindly update your PAN to avoid 20$ TDS deduction (if applicable)</span></p></div><div style="${ssrRenderStyle({ "col-4 font-weight": "600" })}" class="px-1 my-2 fs- flex text-lg col" data-v-b2700813><p class="underline text-blue-400 text-right font-[&#39;Poppins&#39;]" data-v-b2700813>Income Tax Computations</p></div></div></div><div class="justify-content-center align-items-center" data-v-b2700813><div class="mx-2" data-v-b2700813><div class="my-4 rounded-lg" data-v-b2700813><div class="card-body" data-v-b2700813><p class="text-[14px] font-semibold text-gray-500 font-[&#39;Poppins&#39;]" style="${ssrRenderStyle({ "line-height": "20px" })}" data-v-b2700813> Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your investment amount till last day of every month until the cutoff date of ${ssrInterpolate(new Date().toLocaleString("default", { month: "long" }))} 27, ${ssrInterpolate(new Date().getFullYear())}. Last date for submitting your investment proofs is ${ssrInterpolate(new Date().toLocaleString("default", {
        month: "long"
      }))} 27, ${ssrInterpolate(new Date().getFullYear())}. &#39;$&#39; - Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your investment amount till last day of every month until the cutoff date of ${ssrInterpolate(new Date().toLocaleString("default", {
        month: "long"
      }))} 27, ${ssrInterpolate(new Date().getFullYear())}.Last date for submitting your investment proofs is ${ssrInterpolate(new Date().toLocaleString("default", { month: "long" }))} 27, ${ssrInterpolate(new Date().getFullYear())}. </p></div></div><div class="flex justify-between gap-6 my-4" data-v-b2700813><div class="" data-v-b2700813><div class="font-semibold text-[16px] font-[&#39;Poppins&#39;]" data-v-b2700813>Your current chosen tax regime is <strong${ssrRenderAttrs(mergeProps({
        class: "text-blue-500 underline cursor-pointer text-[16px] font-[600]",
        style: { "font-family": "Verdana, Geneva, Tahoma, sans-serif" }
      }, ssrGetDirectiveProps(_ctx, _directive_tooltip, `Last Updated Date  ${unref(dayjs)(lastUpdated.value).format("dddd, MMMM D, YYYY h:mm A")}`, void 0, { bottom: true })))} data-v-b2700813>${ssrInterpolate(findRegime(regime.value))}</strong>`);
      if (regime.value == "old") {
        _push(`<span data-v-b2700813>`);
        if (unref(formula).taxCalculation(total_gross.value, "old", age.value) < unref(formula).taxCalculation(total_gross.value, "new", age.value) ? true : false) {
          _push(`<span class="text-sm text-green-600" data-v-b2700813>Maximum benefit</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</span>`);
      } else {
        _push(`<span data-v-b2700813>`);
        if (unref(formula).taxCalculation(total_gross.value, "new", age.value) < unref(formula).taxCalculation(total_gross.value, "old", age.value) ? true : false) {
          _push(`<span class="text-sm text-green-600" data-v-b2700813>Maximum benefit</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</span>`);
      }
      _push(`</div><p class="text-gray-600 font-[&#39;Poppins&#39;] mt-[2px]" data-v-b2700813>The confirmed old tax regime will be used in future payroll calculations </p><div data-v-b2700813></div></div><div data-v-b2700813></div><div class="text-end" data-v-b2700813><button class="px-4 text-[14px] p-2 text-[#fff] rounded-md bg-[#000] font-[&#39;Poppins&#39;]"${ssrIncludeBooleanAttr(!unref(investmentStore).disableRegime(lastUpdated.value)) ? " disabled" : ""} data-v-b2700813>Switch Regime</button></div></div>`);
      if (unref(investmentStore).disableRegime(lastUpdated.value)) {
        _push(`<div class="flex items-center my-[8px] bg-[white] border-[1px] rounded-md border-gray-300 p-2 w-[80%]" data-v-b2700813><i class="mx-2 my-1 font-bold text-[red] pi pi-info-circle" style="${ssrRenderStyle({ "font-size": "1.5rem" })}" data-v-b2700813></i><p class="ml-2 text-[13px] text-[red] font-[&#39;Poppins&#39;]" data-v-b2700813> Not considered for exemption if opted for New tax regime (Section 115BAC). You can declare your investment amount till last day of every month. </p></div>`);
      } else {
        _push(`<div class="flex h-full py-2 my-4 bg-orange-100 border-l-4 rounded-lg border-l-orange-400" data-v-b2700813><i class="mx-2 my-1 font-bold text-orange-500 pi pi-info-circle" style="${ssrRenderStyle({ "font-size": "1.5rem" })}" data-v-b2700813></i><p class="ml-2 font-semibold text-black fs-5" data-v-b2700813> The tax regime cannot be changed until the financial year ${ssrInterpolate(new Date().getFullYear())} - ${ssrInterpolate(new Date().getFullYear() + 1)} ends. (April ${ssrInterpolate(new Date().getFullYear())} -March ${ssrInterpolate(new Date().getFullYear() + 1)} ) </p></div>`);
      }
      _push(`</div></div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(investmentStore).tax_deduction,
        dataKey: "id"
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, { header: "#" }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.sno)}. `);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.sno) + ". ", 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "section",
              header: "",
              style: { "width": "30rem", "text-align": "left !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> Particulars </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " Particulars ")
                  ];
                }
              }),
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.section == "Total Taxable Income") {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}>${ssrInterpolate(slotProps.data.section)}</p>`);
                  } else {
                    _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}>${ssrInterpolate(slotProps.data.section)}</p>`);
                  }
                } else {
                  return [
                    slotProps.data.section == "Total Taxable Income" ? (openBlock(), createBlock("p", {
                      key: 0,
                      style: { "font-weight": "501" }
                    }, toDisplayString(slotProps.data.section), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      style: { "font-weight": "501" }
                    }, toDisplayString(slotProps.data.section), 1))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "old_regime",
              header: "",
              style: { "text-align": "right !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> Old Tax Regime </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " Old Tax Regime ")
                  ];
                }
              }),
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.old_regime))}</p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.old_regime)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "new_regime",
              header: "",
              style: { "text-align": "right !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> New Tax Regime </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " New Tax Regime ")
                  ];
                }
              }),
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}>${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.new_regime))}</p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.new_regime)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { header: "#" }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.sno) + ". ", 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "section",
                header: "",
                style: { "width": "30rem", "text-align": "left !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " Particulars ")
                ]),
                body: withCtx((slotProps) => [
                  slotProps.data.section == "Total Taxable Income" ? (openBlock(), createBlock("p", {
                    key: 0,
                    style: { "font-weight": "501" }
                  }, toDisplayString(slotProps.data.section), 1)) : (openBlock(), createBlock("p", {
                    key: 1,
                    style: { "font-weight": "501" }
                  }, toDisplayString(slotProps.data.section), 1))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "old_regime",
                header: "",
                style: { "text-align": "right !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " Old Tax Regime ")
                ]),
                body: withCtx((slotProps) => [
                  createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.old_regime)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "new_regime",
                header: "",
                style: { "text-align": "right !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " New Tax Regime ")
                ]),
                body: withCtx((slotProps) => [
                  createVNode("p", { style: { "font-weight": "501" } }, toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.new_regime)), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="my-3" data-v-b2700813><p class="font-semibold text-black fs-2" data-v-b2700813>Declaration</p></div><div class="my-3 card" data-v-b2700813><div class="grid gap-4 my-1 md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 card-body" data-v-b2700813><div class="p-2 text-left border-l-4 rounded-lg bg-sky-100 border-l-sky-400" data-v-b2700813><p class="font-semibold fs-6" data-v-b2700813>Net Taxable Income</p><div class="grid my-1 md:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2" data-v-b2700813>`);
      if (regime.value == "old") {
        _push(`<h6 class="text-lg font-bold" data-v-b2700813>${ssrInterpolate(unref(investmentStore).formatCurrency(total_gross.value))}</h6>`);
      } else {
        _push(`<h6 class="text-lg font-bold" data-v-b2700813>${ssrInterpolate(unref(investmentStore).formatCurrency(total_gross.value))}</h6>`);
      }
      _push(`<p class="pl-3 text-orange-400 underline lg:text-base" data-v-b2700813> Income Tax Computation</p></div></div><div class="p-2 text-left bg-gray-100 border-l-4 rounded-lg tw-card border-l-gray-400" data-v-b2700813><p class="font-semibold fs-6" data-v-b2700813>Total Tax Payable</p>`);
      if (regime.value == "old") {
        _push(`<h6 class="text-lg font-bold" data-v-b2700813>${ssrInterpolate(unref(investmentStore).formatCurrency(
          unref(formula).taxCalculation(total_gross.value, "old", age.value)
        ))}</h6>`);
      } else {
        _push(`<h6 class="text-lg font-bold" data-v-b2700813>${ssrInterpolate(unref(investmentStore).formatCurrency(
          unref(formula).taxCalculation(total_gross.value, "new", age.value)
        ))}</h6>`);
      }
      _push(`</div><div class="p-2 text-left bg-orange-100 border-l-4 rounded-lg tw-card border-l-orange-400" data-v-b2700813><p class="font-semibold fs-6" data-v-b2700813>Tax Paid Till Now</p><h6 class="text-lg font-bold" data-v-b2700813>${ssrInterpolate(unref(investmentStore).formatCurrency(0))}</h6></div></div></div><div class="my-3" data-v-b2700813><div data-v-b2700813><p class="text-2xl font-semibold" data-v-b2700813>Important!</p><div class="mx-2" data-v-b2700813><ul class="font-semibold f-13" data-v-b2700813><li class="my-2 text-lg font-semibold" data-v-b2700813> &#39;$&#39; - Not considered for exemption if opted for New tax regime (Section 115BAC). </li><li class="my-2 text-lg font-semibold" data-v-b2700813> You can declare your investment amount till last day of every month until the cutoff date of ${ssrInterpolate(new Date().toLocaleString("default", { month: "long" }))} 27, ${ssrInterpolate(new Date().getFullYear())}. </li><li class="my-2 text-lg font-semibold" data-v-b2700813> Last date for submitting your investment proofs is ${ssrInterpolate(new Date().toLocaleString(
        "default",
        { month: "long" }
      ))} 27, ${ssrInterpolate(new Date().getFullYear())}. </li></ul></div></div></div><div class="my-2 card" data-v-b2700813><div class="card-body" data-v-b2700813><div data-v-b2700813><p class="font-semibold fs-4" data-v-b2700813>My Declaration</p><p class="my-2 font-semibold fs-6" data-v-b2700813> Below are the declarations done by you under various sections.</p></div><div class="my-2 table-responsive" data-v-b2700813>`);
      _push(ssrRenderComponent(_component_DataTable, {
        rows: 7,
        dataKey: "id",
        value: unref(investmentStore).investmentSummarySource
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "particulars",
              header: "S.No"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.index + 1)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.index + 1), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "section_name",
              header: "Declaration",
              style: { "width": "16rem", "text-align": "left !important" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dec_amount",
              style: { "width": "18rem", "text-align": "right !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> Amount Declared </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " Amount Declared ")
                  ];
                }
              }),
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.dec_amount))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "proof_submitted",
              style: { "width": "16rem", "text-align": "right !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> Proof Submitted </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " Proof Submitted ")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "amount_rejected",
              style: { "width": "16rem", "text-align": "right !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> Amount Rejected </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " Amount Rejected ")
                  ];
                }
              }),
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.amount_rejected))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.amount_rejected)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "amount_accepted",
              style: { "width": "16rem", "text-align": "right !important" }
            }, {
              header: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p style="${ssrRenderStyle({ "font-weight": "501" })}" data-v-b2700813${_scopeId2}> Amount Accepted </p>`);
                } else {
                  return [
                    createVNode("p", { style: { "font-weight": "501" } }, " Amount Accepted ")
                  ];
                }
              }),
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(investmentStore).formatCurrency(slotProps.data.amount_accepted))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.amount_accepted)), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "particulars",
                header: "S.No"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.index + 1), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "section_name",
                header: "Declaration",
                style: { "width": "16rem", "text-align": "left !important" }
              }),
              createVNode(_component_Column, {
                field: "dec_amount",
                style: { "width": "18rem", "text-align": "right !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " Amount Declared ")
                ]),
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.dec_amount)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "proof_submitted",
                style: { "width": "16rem", "text-align": "right !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " Proof Submitted ")
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "amount_rejected",
                style: { "width": "16rem", "text-align": "right !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " Amount Rejected ")
                ]),
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.amount_rejected)), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "amount_accepted",
                style: { "width": "16rem", "text-align": "right !important" }
              }, {
                header: withCtx(() => [
                  createVNode("p", { style: { "font-weight": "501" } }, " Amount Accepted ")
                ]),
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(investmentStore).formatCurrency(slotProps.data.amount_accepted)), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="my-6" data-v-b2700813><div data-v-b2700813><p class="my-2 font-semibold font-[&#39;Poppins&#39;]" data-v-b2700813>Month- Month Tax Deduction Details</p><p class="my-2 font-semibold text-[13px] font-[&#39;Poppins&#39;] text-gray-400" data-v-b2700813>Below deductions are based on your declared amount. Tax amount may change based on the amount approved.</p></div><div data-v-b2700813><div class="grid gap-4 md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 card-body" data-v-b2700813><div class="flex rounded-lg bg-[#F6F6F6] border-[#DDDDD] items-center py-[12px]" data-v-b2700813><p class="text-ash-medium font-[&#39;Poppins&#39;] text-[14px] text-center text-[#000]" data-v-b2700813>Tax Paid Till Now</p><p class="font-[&#39;Poppins&#39;] text-center font-[600] text-[16px]" data-v-b2700813>INR ${ssrInterpolate(taxComputationSource.value ? taxComputationSource.value["Tax Paid Till Now"] : 0)}</p></div><div class="flex rounded-lg bg-[#F6F6F6] border-[#DDDDD] items-center py-[12px]" data-v-b2700813><p class="text-ash-medium font-[&#39;Poppins&#39;] text-[14px] text-center text-[#000]" data-v-b2700813>Total Tax Payable</p><p class="font-[&#39;Poppins&#39;] text-[16px] text-center font-[600]" data-v-b2700813>INR ${ssrInterpolate(taxComputationSource.value ? taxComputationSource.value["Total Tax Payable"] : 0)}</p></div><div class="flex rounded-lg bg-[#F6F6F6] border-[#DDDDD] items-center py-[12px]" data-v-b2700813><p class="text-ash-medium font-[&#39;Poppins&#39;] text-[14px] text-center text-[#000]" data-v-b2700813>Remaining Tax Amount</p><p class="font-[&#39;Poppins&#39;] text-[16px] text-center font-[600]" data-v-b2700813>INR ${ssrInterpolate(taxComputationSource.value ? taxComputationSource.value["Remaining Tax Amount"] : 0)}</p></div></div></div><div class="table-responsive" data-v-b2700813>`);
      _push(ssrRenderComponent(_component_DataTable, {
        paginator: true,
        rows: 1,
        dataKey: "id",
        scrollable: "",
        value: monthWiseData.value
      }, {
        empty: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Data Found. `);
          } else {
            return [
              createTextVNode(" No Data Found. ")
            ];
          }
        }),
        loading: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading customers data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading customers data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "particulars",
              header: "Month",
              frozen: "",
              class: "font-bold"
            }, {
              body: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<p class="font-semibold fs-6" data-v-b2700813${_scopeId2}> Monthly Tax </p>`);
                } else {
                  return [
                    createVNode("p", { class: "font-semibold fs-6" }, " Monthly Tax ")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`<!--[-->`);
            ssrRenderList(dynmaicHeadersForMonthTax.value, (col) => {
              _push2(ssrRenderComponent(_component_Column, {
                key: col,
                header: col.title,
                field: col.title,
                class: "font-semibold"
              }, {
                body: withCtx(({ data, field }, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<p class="font-semibold fs-6" data-v-b2700813${_scopeId2}>${ssrInterpolate(data[field])}</p>`);
                  } else {
                    return [
                      createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(data[field]), 1)
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
            });
            _push2(`<!--]-->`);
          } else {
            return [
              createVNode(_component_Column, {
                field: "particulars",
                header: "Month",
                frozen: "",
                class: "font-bold"
              }, {
                body: withCtx(() => [
                  createVNode("p", { class: "font-semibold fs-6" }, " Monthly Tax ")
                ]),
                _: 1
              }),
              (openBlock(true), createBlock(Fragment, null, renderList(dynmaicHeadersForMonthTax.value, (col) => {
                return openBlock(), createBlock(_component_Column, {
                  key: col,
                  header: col.title,
                  field: col.title,
                  class: "font-semibold"
                }, {
                  body: withCtx(({ data, field }) => [
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(data[field]), 1)
                  ]),
                  _: 2
                }, 1032, ["header", "field"]);
              }), 128))
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="flex my-3" data-v-b2700813><p class="font-semibold fs-6" data-v-b2700813><strong class="text-red-600" data-v-b2700813>*</strong> Projected Income Tax does not include any revisions, bonuses or other additional projected payments other than salary. </p></div></div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: switch_regime_dailog.value,
        "onUpdate:visible": ($event) => switch_regime_dailog.value = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-1 text-lg font-semibold modal-title text-primary" data-v-b2700813${_scopeId}>Confirm Switching Regime</h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-1 text-lg font-semibold modal-title text-primary" }, "Confirm Switching Regime")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="" data-v-b2700813${_scopeId}>Your current switching regime is `);
            if (regime.value == "new") {
              _push2(`<strong class="text-lg font-semibold text-primary" data-v-b2700813${_scopeId}>${ssrInterpolate(findRegime("old"))} `);
              if (unref(formula).taxCalculation(total_gross.value, "old", age.value) < unref(formula).taxCalculation(total_gross.value, "new", age.value) ? true : false) {
                _push2(`<span class="text-sm text-green-600" data-v-b2700813${_scopeId}>Maximum benefit</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</strong>`);
            } else if (regime.value == "old") {
              _push2(`<strong class="text-lg font-semibold text-primary" data-v-b2700813${_scopeId}>${ssrInterpolate(findRegime("new"))} `);
              if (unref(formula).taxCalculation(total_gross.value, "new", age.value) < unref(formula).taxCalculation(total_gross.value, "old", age.value) ? true : false) {
                _push2(`<span class="text-sm text-green-600" data-v-b2700813${_scopeId}>Maximum benefit</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</strong>`);
            } else {
              _push2(`<strong class="text-lg font-semibold text-primary" data-v-b2700813${_scopeId}>${ssrInterpolate(findRegime("old"))} `);
              if (unref(formula).taxCalculation(total_gross.value, "old", age.value) < unref(formula).taxCalculation(total_gross.value, "new", age.value) ? true : false) {
                _push2(`<span class="text-sm text-green-600" data-v-b2700813${_scopeId}>Maximum benefit</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</strong>`);
            }
            _push2(`</p><p class="my-3 text-justify text-gray-700" data-v-b2700813${_scopeId}> Are you sure you want to switch your regime? You cannot change your regime selection once you have confirmed your selection. </p><p class="text-justify text-gray-700" data-v-b2700813${_scopeId}> In case of an incorrect selection, your only option will be to change your selection when you file your tax returns for the current financial year. </p><div class="mt-5 text-end" data-v-b2700813${_scopeId}><button id="confirm_switchRegime" class="px-4 py-2 text-lg text-center text-white bg-black rounded-md" data-v-b2700813${_scopeId}>Confirm</button></div>`);
          } else {
            return [
              createVNode("p", { class: "" }, [
                createTextVNode("Your current switching regime is "),
                regime.value == "new" ? (openBlock(), createBlock("strong", {
                  key: 0,
                  class: "text-lg font-semibold text-primary"
                }, [
                  createTextVNode(toDisplayString(findRegime("old")) + " ", 1),
                  (unref(formula).taxCalculation(total_gross.value, "old", age.value) < unref(formula).taxCalculation(total_gross.value, "new", age.value) ? true : false) ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "text-sm text-green-600"
                  }, "Maximum benefit")) : createCommentVNode("", true)
                ])) : regime.value == "old" ? (openBlock(), createBlock("strong", {
                  key: 1,
                  class: "text-lg font-semibold text-primary"
                }, [
                  createTextVNode(toDisplayString(findRegime("new")) + " ", 1),
                  (unref(formula).taxCalculation(total_gross.value, "new", age.value) < unref(formula).taxCalculation(total_gross.value, "old", age.value) ? true : false) ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "text-sm text-green-600"
                  }, "Maximum benefit")) : createCommentVNode("", true)
                ])) : (openBlock(), createBlock("strong", {
                  key: 2,
                  class: "text-lg font-semibold text-primary"
                }, [
                  createTextVNode(toDisplayString(findRegime("old")) + " ", 1),
                  (unref(formula).taxCalculation(total_gross.value, "old", age.value) < unref(formula).taxCalculation(total_gross.value, "new", age.value) ? true : false) ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "text-sm text-green-600"
                  }, "Maximum benefit")) : createCommentVNode("", true)
                ]))
              ]),
              createVNode("p", { class: "my-3 text-justify text-gray-700" }, " Are you sure you want to switch your regime? You cannot change your regime selection once you have confirmed your selection. "),
              createVNode("p", { class: "text-justify text-gray-700" }, " In case of an incorrect selection, your only option will be to change your selection when you file your tax returns for the current financial year. "),
              createVNode("div", { class: "mt-5 text-end" }, [
                createVNode("button", {
                  id: "confirm_switchRegime",
                  class: "px-4 py-2 text-lg text-center text-white bg-black rounded-md",
                  onClick: saveRegime
                }, "Confirm")
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
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/paycheck/investments/declaration/declaration.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const declaration = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-b2700813"]]);
export {
  declaration as d
};
