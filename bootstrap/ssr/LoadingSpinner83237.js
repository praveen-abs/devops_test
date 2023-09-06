import { useSSRContext, mergeProps } from "vue";
import { ssrRenderAttrs } from "vue/server-renderer";
import { _ as _export_sfc } from "./_plugin-vue_export-helper83237.js";
const LoadingSpinner_vue_vue_type_style_index_0_scoped_924ea090_lang = "";
const _sfc_main = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "loading-spinner-container" }, _attrs))} data-v-924ea090><div class="loading-spinner-loader" data-v-924ea090><div class="loader--dot" data-v-924ea090></div><div class="loader--dot" data-v-924ea090></div><div class="loader--dot" data-v-924ea090></div><div class="loader--dot" data-v-924ea090></div><div class="loader--dot" data-v-924ea090></div><div class="loader--dot" data-v-924ea090></div><div class="loader--text" data-v-924ea090></div></div></div>`);
}
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/components/LoadingSpinner.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const LoadingSpinner = /* @__PURE__ */ _export_sfc(_sfc_main, [["ssrRender", _sfc_ssrRender], ["__scopeId", "data-v-924ea090"]]);
export {
  LoadingSpinner as L
};
