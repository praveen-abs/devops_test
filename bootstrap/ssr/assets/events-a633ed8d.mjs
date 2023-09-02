import { mergeProps, useSSRContext, resolveDirective, unref } from "vue";
import { ssrRenderAttrs, ssrRenderList, ssrRenderClass, ssrInterpolate, ssrRenderAttr, ssrGetDirectiveProps } from "vue/server-renderer";
import "axios";
import { u as useMainDashboardStore } from "./dashboard_service-cf4be887.mjs";
import dayjs from "dayjs";
import { S as Service } from "./Service-c5131e0f.mjs";
const notification_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "notification",
  __ssrInlineRender: true,
  setup(__props) {
    useMainDashboardStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-white h-[700px] rounded-lg overflow-hidden" }, _attrs))}><div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/notifications/notification.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const events_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "events",
  __ssrInlineRender: true,
  setup(__props) {
    Service();
    const useDashboard = useMainDashboardStore();
    const colors = [
      "bg-emerald-600",
      "bg-yellow-600",
      "bg-rose-600",
      "bg-cyan-600",
      "bg-amber-600",
      "bg-red-600",
      "bg-pink-600",
      "bg-green-600",
      "bg-fuchsia-600"
    ];
    const avatarColors = [
      "bg-emerald-200",
      "bg-yellow-200",
      "bg-rose-200",
      "bg-cyan-200",
      "bg-amber-200",
      "bg-red-200",
      "bg-pink-200",
      "bg-green-200",
      "bg-fuchsia-200"
    ];
    const getBackgroundColor = (index) => {
      return colors[index % colors.length];
    };
    const getAvatarColor = (index) => {
      return avatarColors[index % colors.length];
    };
    const findEventType = (type) => {
      if (type == "birthday") {
        return "Happy birthday";
      } else if (type == "work_anniversery") {
        return "Work anniversary";
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _directive_tooltip = resolveDirective("tooltip");
      _push(`<!--[--><div class="bg-white rounded-lg p-2 mb-16"><span class="text-primary font-semibold fs-6">Events</span><div class="h-[500px] overflow-x-scroll"><div class="grid grid-cols-4 gap-4"><!--[-->`);
      ssrRenderList(unref(useDashboard).allEventSource, (events, index) => {
        _push(`<div class="relative w-[180px] rounded-lg my-8"><div class="${ssrRenderClass([`${getBackgroundColor(index)}`, "h-[80px] rounded-lg"])}"><p class="font-semibold text-center text-white my-2 text-[12px] font-[&#39;Poppins&#39;]">${ssrInterpolate(findEventType(events.type))}</p></div><div class="absolute top-8 w-full z-10"><div class="grid grid-cols-2 w-11/12 bg-slate-100 mx-auto rounded-lg h-full"><div class="w-[100%] relative h-[90px]">`);
        if (JSON.parse(events.avatar).type == "shortname") {
          _push(`<div class="${ssrRenderClass([getAvatarColor(index), "h-full rounded-lg"])}"><p class="font-semibold text-4xl py-4 text-center align-middle text-white">${ssrInterpolate(JSON.parse(events.avatar).data)}</p></div>`);
        } else {
          _push(`<img${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(events.avatar).data}`)} alt="" class="rounded-lg absolute w-[100%] h-[100%] top-0">`);
        }
        _push(`</div><div class="h-full"><div class="py-6">`);
        if (events.name.length <= 8) {
          _push(`<p class="font-semibold text-[12px] font-[&#39;Poppins&#39;] text-center text-black my-auto">${ssrInterpolate(events.name)}</p>`);
        } else {
          _push(`<p${ssrRenderAttrs(mergeProps({ class: "font-semibold text-[12px] font-['Poppins'] text-center text-black my-auto" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, events.name)))}>${ssrInterpolate(events.name ? events.name.substring(0, 8) + ".." : "")}</p>`);
        }
        _push(`<p class="font-semibold text-sm text-center text-gray-600 my-auto">${ssrInterpolate(unref(dayjs)(events.dob).format("DD"))}th ${ssrInterpolate(unref(dayjs)(events.dob).format("MMM"))}</p><p><i${ssrRenderAttrs(mergeProps({
          class: "text-xs absolute right-6 fa fa-commenting-o text-right cursor-pointer",
          "data-bs-target": "#wishes_popup",
          "data-bs-toggle": "modal"
        }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "wish")))}></i></p></div></div></div><div class="flex justify-center my-2"></div></div></div>`);
      });
      _push(`<!--]--></div></div></div><div id="wishes_popup" class="modal fade" role="dialog"><div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"><div class="modal-content"><div class="py-2 border-0 modal-header"><h6 class="modal-title"> Wishes Text</h6><button type="button" class="bg-transparent border-0 outline-none close h3" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="modal-body"><p for="" class="text-muted f-14 fw-bold">Commants here</p><textarea name="" id="" cols="" placeholder="Commants here...." rows="2" class="resize-none form-control"></textarea><div class="text-end"><button class="mt-2 btn btn-border-orange" id=""><i class="fa fa-paper-plane me" aria-hidden="true"></i> Send</button></div></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/events/events.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _,
  _sfc_main$1 as a
};
