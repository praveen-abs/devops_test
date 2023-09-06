import { ref, reactive, onMounted, resolveComponent, unref, withCtx, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, useSSRContext, mergeProps, resolveDirective } from "vue";
import { ssrRenderList, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseContain, ssrRenderClass, ssrRenderAttr, ssrRenderComponent, ssrRenderAttrs, ssrRenderStyle, ssrGetDirectiveProps } from "vue/server-renderer";
import { S as Service } from "./Service92532.js";
import { u as useMainDashboardStore } from "./dashboard_service92532.js";
import axios from "axios";
import dayjs from "dayjs";
import { u as useLeaveService } from "./LeaveApply92532.js";
import { L as LoadingSpinner } from "./LoadingSpinner92532.js";
const _imports_0 = "/build/femaleDashboardImage92532.svg";
const welcome_card_vue_vue_type_style_index_0_lang = "";
const _sfc_main$f = {
  __name: "welcome_card",
  __ssrInlineRender: true,
  setup(__props) {
    const service = Service();
    const usedashboard = useMainDashboardStore();
    const current_session = ref();
    ref();
    const EmpDetials = ref([]);
    const check_in_dailog = ref(false);
    const check_out_dailog = ref(false);
    const welcome_card = reactive({
      date: new Date(),
      check: "",
      check_in: "",
      check_out: "",
      attendance_mode: "web",
      work_mode: "",
      checked: false
    });
    const getSession = () => {
      var today = new Date();
      var curHr = today.getHours();
      if (curHr < 12) {
        current_session.value = "Good Morning";
      } else if (curHr < 18) {
        current_session.value = "Good Afternoon";
      } else {
        current_session.value = "Good Evening";
      }
    };
    const checkInMessege = ref();
    const getEmployeeDetials = async () => {
      let url = "/fetchEmpLastAttendanceStatus";
      await axios.get(url).then((res) => {
        console.log(res.data);
        EmpDetials.value.push(res.data);
        if (res.data.checkout_time) {
          welcome_card.check = false;
        } else if (res.data.checkin_time) {
          welcome_card.check = true;
        } else {
          welcome_card.check = null;
        }
      }).finally(() => {
        usedashboard.canShowTopbar = true;
      });
    };
    onMounted(() => {
      getSession();
      getEmployeeDetials();
    });
    const findAttendanceMode = (attendance_mode) => {
      console.log(attendance_mode);
      if (attendance_mode == "biometric")
        return "fas fa-fingerprint fs-12";
      else if (attendance_mode == "web")
        return "fa fa-laptop fs-12";
      else if (attendance_mode == "mobile")
        return "fa fa-mobile-phone fs-12";
      else {
        return "";
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_lord_icon = resolveComponent("lord-icon");
      _push(`<!--[--><div class="!h-[180px] w-[100%] overflow-hidden rounded-xl shadow-lg bg-[#DFE8FF] p-3 grid grid-cols-12 gap-4 justify-between leading-normal"><!--[-->`);
      ssrRenderList(EmpDetials.value, (item) => {
        _push(`<div class="col-span-7 mb-8"><p class="font-[14px] font-[&#39;Poppins&#39;] text-gray-500 flex items-center">${ssrInterpolate(current_session.value)}</p><div class="text-gray-900 text-[18px] mb-2 font-[&#39;Poppins&#39;]">${ssrInterpolate(unref(service).current_user_name)}</div><div class="flex gap-4 items-center"><div class="flex my-1 overflow-visible items-center !z-10"><i class="fa fa-sun-o text-warning my-auto text-[20px]" aria-hidden="true"></i><p class="text-[12px] my-auto font-semibold px-2">General Shift</p></div><div class="btn-status"><input type="checkbox" name="checkbox" id="checkbox" class="hidden"${ssrIncludeBooleanAttr(Array.isArray(welcome_card.check) ? ssrLooseContain(welcome_card.check, null) : welcome_card.check) ? " checked" : ""}><label for="checkbox" class="${ssrRenderClass([[welcome_card.check ? " bg-green-100" : "bg-red-100"], "relative inline-block w-12 h-5 rounded-lg transition duration-300 cursor-pointer"])}"><span class="${ssrRenderClass([[welcome_card.check ? "translate-x-6 bg-green-400" : "bg-red-400"], "absolute inset-0 inline-block w-5 h-5 rounded-full shadow transform transition-transform cursor-pointer"])}"></span></label></div></div><div><p class="text-[12px] text-[#8B8B8B] font-[&#39;Poppins&#39;] flex items-center"> Time duration:<span>${ssrInterpolate(item.effective_hours ? item.effective_hours : 0)}</span></p>`);
        if (item.checkin_time) {
          _push(`<p class="w-[300px] my-2 max-[1300px]:text-[9px] font-[&#39;Poppins&#39;] text-[12px]">${ssrInterpolate(`Check-In : ${item.checkin_time} (${unref(dayjs)(item.checkin_date).format("MMM D, YYYY")}) `)} <i class="${ssrRenderClass([findAttendanceMode(item.attendance_mode_checkin), "mx-2 text-sm font-semibold text-green-800"])}"></i></p>`);
        } else {
          _push(`<p class="w-[300px] my-2 max-[1300px]:text-[9px] font-[&#39;Poppins&#39;] text-[12px]">${ssrInterpolate(`Check-In:
                    --:--:--`)}</p>`);
        }
        if (item.checkout_time) {
          _push(`<p class="w-[300px] max-[1300px]:text-[9px] font-[&#39;Poppins&#39;] text-[12px]">${ssrInterpolate(`Check-Out : ${item.checkout_time} (${unref(dayjs)(item.checkout_date).format("MMM D, YYYY")}) `)} <i class="${ssrRenderClass([findAttendanceMode(item.attendance_mode_checkout), "mx-2 text-sm font-semibold text-green-800"])}"></i></p>`);
        } else {
          _push(`<p class="w-[300px] my-2 max-[1300px]:text-[9px] font-[&#39;Poppins&#39;] text-[12px]">${ssrInterpolate(`Check-Out:
                    --:--:--`)}</p>`);
        }
        _push(`</div></div>`);
      });
      _push(`<!--]--><div class="col-span-5 h-full !z-5"><div class="grid justify-center items-centers my-auto h-full border-[1px]"><img${ssrRenderAttr("src", _imports_0)} alt="" srcset="" class="w-full h-full"></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: check_in_dailog.value,
        "onUpdate:visible": ($event) => check_in_dailog.value = $event,
        modal: "",
        style: { width: "30vw" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="bg-white modal-content"${_scopeId}><div class="p-1 text-center modal-body"${_scopeId}><div class="check-in-animate"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_lord_icon, {
              src: "https://cdn.lordicon.com/dcfqtwxe.json",
              trigger: "loop",
              delay: "2000",
              class: "gliters",
              colors: "primary:#1aff1a,secondary:#1aff1a"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_lord_icon, {
              src: "https://cdn.lordicon.com/twopqjaj.json",
              trigger: "loop",
              delay: "2000",
              class: "entry-man",
              colors: "primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="mt-2"${_scopeId}><div class="text-gray-900 text-[18px] mb-2 font-[&#39;Poppins&#39;]"${_scopeId}><span${_scopeId}>Welcome</span> ${ssrInterpolate(unref(service).current_user_name)}</div>`);
            if (checkInMessege.value) {
              _push2(`<p class="mb-4 text-muted"${_scopeId}>${ssrInterpolate(checkInMessege.value)}</p>`);
            } else {
              _push2(`<p class="mb-4 text-muted"${_scopeId}>Have a good day !</p>`);
            }
            _push2(`<div class="gap-2 hstack justify-content-center"${_scopeId}><a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"${_scopeId}><button type="button" class="btn btn-primary"${_scopeId}> Close </button></a></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "bg-white modal-content" }, [
                createVNode("div", { class: "p-1 text-center modal-body" }, [
                  createVNode("div", { class: "check-in-animate" }, [
                    createVNode(_component_lord_icon, {
                      src: "https://cdn.lordicon.com/dcfqtwxe.json",
                      trigger: "loop",
                      delay: "2000",
                      class: "gliters",
                      colors: "primary:#1aff1a,secondary:#1aff1a"
                    }),
                    createVNode(_component_lord_icon, {
                      src: "https://cdn.lordicon.com/twopqjaj.json",
                      trigger: "loop",
                      delay: "2000",
                      class: "entry-man",
                      colors: "primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#30e849"
                    })
                  ]),
                  createVNode("div", { class: "mt-2" }, [
                    createVNode("div", { class: "text-gray-900 text-[18px] mb-2 font-['Poppins']" }, [
                      createVNode("span", null, "Welcome"),
                      createTextVNode(" " + toDisplayString(unref(service).current_user_name), 1)
                    ]),
                    checkInMessege.value ? (openBlock(), createBlock("p", {
                      key: 0,
                      class: "mb-4 text-muted"
                    }, toDisplayString(checkInMessege.value), 1)) : (openBlock(), createBlock("p", {
                      key: 1,
                      class: "mb-4 text-muted"
                    }, "Have a good day !")),
                    createVNode("div", { class: "gap-2 hstack justify-content-center" }, [
                      createVNode("a", {
                        href: "javascript:void(0);",
                        class: "btn btn-link link-success fw-medium",
                        "data-bs-dismiss": "modal"
                      }, [
                        createVNode("button", {
                          onClick: ($event) => check_in_dailog.value = false,
                          type: "button",
                          class: "btn btn-primary"
                        }, " Close ", 8, ["onClick"])
                      ])
                    ])
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: check_out_dailog.value,
        "onUpdate:visible": ($event) => check_out_dailog.value = $event,
        modal: "",
        style: { width: "25vw" }
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="bg-white modal-content"${_scopeId}><div class="p-1 text-center modal-body"${_scopeId}><div class="check-in-animate"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_lord_icon, {
              src: "https://cdn.lordicon.com/dcfqtwxe.json",
              trigger: "loop",
              delay: "2000",
              colors: "primary:#ff3300,secondary:#ff3300",
              class: "gliters"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_lord_icon, {
              src: "https://cdn.lordicon.com/twopqjaj.json",
              trigger: "loop",
              delay: "2000",
              class: "entry-man",
              colors: "primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="mt-4"${_scopeId}><h4 class="mb-3"${_scopeId}>Bye ${ssrInterpolate(unref(service).current_user_name)}</h4><p class="mb-4 text-muted"${_scopeId}>See you tommorrow</p><div class="gap-2 hstack justify-content-center"${_scopeId}><a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"${_scopeId}><button type="button" class="btn btn-primary"${_scopeId}> Close </button></a></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "bg-white modal-content" }, [
                createVNode("div", { class: "p-1 text-center modal-body" }, [
                  createVNode("div", { class: "check-in-animate" }, [
                    createVNode(_component_lord_icon, {
                      src: "https://cdn.lordicon.com/dcfqtwxe.json",
                      trigger: "loop",
                      delay: "2000",
                      colors: "primary:#ff3300,secondary:#ff3300",
                      class: "gliters"
                    }),
                    createVNode(_component_lord_icon, {
                      src: "https://cdn.lordicon.com/twopqjaj.json",
                      trigger: "loop",
                      delay: "2000",
                      class: "entry-man",
                      colors: "primary:#121331,secondary:#ebe6ef,tertiary:#f9c9c0,quaternary:#ffffff,quinary:#3a3347,senary:#b26836,septenary:#e62e00"
                    })
                  ]),
                  createVNode("div", { class: "mt-4" }, [
                    createVNode("h4", { class: "mb-3" }, "Bye " + toDisplayString(unref(service).current_user_name), 1),
                    createVNode("p", { class: "mb-4 text-muted" }, "See you tommorrow"),
                    createVNode("div", { class: "gap-2 hstack justify-content-center" }, [
                      createVNode("a", {
                        href: "javascript:void(0);",
                        class: "btn btn-link link-success fw-medium",
                        "data-bs-dismiss": "modal"
                      }, [
                        createVNode("button", {
                          type: "button",
                          class: "btn btn-primary",
                          onClick: ($event) => check_out_dailog.value = false
                        }, " Close ", 8, ["onClick"])
                      ])
                    ])
                  ])
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
const _sfc_setup$f = _sfc_main$f.setup;
_sfc_main$f.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/welcome_card/welcome_card.vue");
  return _sfc_setup$f ? _sfc_setup$f(props, ctx) : void 0;
};
const _sfc_main$e = {
  __name: "leave_details",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    onMounted(() => {
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "!h-[180px] rounded-[20px] shadow-sm bg-white" }, _attrs))}><div class="px-6 py-4"><p class="font-[14px] font-[&#39;Poppins&#39;] text-gray-500"> Current month - <span class="mb-2 text-xl font-semibold">${ssrInterpolate(unref(dayjs)(new Date()).format("MMMM"))}</span></p><div class="grid grid-cols-3 gap-4 mt-4"><div class="bg-[#F6F6F6] rounded-lg p-3"><div class="px-auto"><span class="mb-2 text-3xl font-bold text-center">${ssrInterpolate(unref(useDashboard).attenanceReportPerMonth.present)}</span><span class="px-1 text-base font-semibold text-gray-700">days</span></div><p class="py-2 text-lg font-semibold text-center text-gray-500">Present</p></div><div class="p-3 bg-gray-100 rounded-lg"><span class="mb-2 text-3xl font-bold">${ssrInterpolate(unref(useDashboard).attenanceReportPerMonth.not_applied)}</span><span class="px-1 text-base font-semibold text-gray-700">days</span><p class="py-2 text-lg font-semibold text-center text-gray-500">Leave</p></div><div class="p-3 bg-gray-100 rounded-lg"><span class="mb-2 text-3xl font-bold">${ssrInterpolate(unref(useDashboard).attenanceReportPerMonth.absent)}</span><span class="px-1 text-base font-semibold text-gray-700">days</span><p class="py-2 text-lg font-semibold text-center text-gray-500">Absent</p></div></div></div></div>`);
    };
  }
};
const _sfc_setup$e = _sfc_main$e.setup;
_sfc_main$e.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/leave_details/leave_details.vue");
  return _sfc_setup$e ? _sfc_setup$e(props, ctx) : void 0;
};
const notification_vue_vue_type_style_index_0_lang = "";
const _sfc_main$d = {
  __name: "notification",
  __ssrInlineRender: true,
  setup(__props) {
    useMainDashboardStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-white min-h-min rounded-lg overflow-hidden" }, _attrs))}><div class="flex items-center justify-between p-3 mb-3 bg-gray-100 card-title" id=""><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Activity Log</span></div><div class="h-full overflow-x-scroll"><div class="hover:bg-slate-100 divide-y-2 divide-gray-400"><p class="font-medium text-sm text-center">No activity log to display</p></div></div></div>`);
    };
  }
};
const _sfc_setup$d = _sfc_main$d.setup;
_sfc_main$d.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/notifications/notification.vue");
  return _sfc_setup$d ? _sfc_setup$d(props, ctx) : void 0;
};
const leave_balance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$c = {
  __name: "leave_balance",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    useLeaveService();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "p-2 overflow-hidden bg-white rounded-lg",
        style: { "height": "200px" }
      }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Leave Balance</span><div class="h-full overflow-x-scroll bg-white rounded-lg"><div class="px-auto"><!--[-->`);
      ssrRenderList(unref(useDashboard).leaveBalancePerMonthSource, (leaveBalance) => {
        _push(`<a href="attendance-leave" class="p-2 block mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"><div class="flex px-2"><div class=""><span class="text-3xl font-semibold text-black">${ssrInterpolate(leaveBalance.leave_balance)}</span><span class="">/</span><span class="">${ssrInterpolate(leaveBalance.avalied_leaves)}</span></div><div class="px-3"><p class="font-semibold text-primary text-[14px] align-bottom py-2">${ssrInterpolate(leaveBalance.leave_type)}</p></div></div></a>`);
      });
      _push(`<!--]--></div></div></div>`);
    };
  }
};
const _sfc_setup$c = _sfc_main$c.setup;
_sfc_main$c.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/leave_balance/leave_balance.vue");
  return _sfc_setup$c ? _sfc_setup$c(props, ctx) : void 0;
};
const calender_vue_vue_type_style_index_0_lang = "";
const _sfc_main$b = {
  __name: "calender",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "bg-[#FFEFE2] rounded-lg overflow-hidden p-3",
        style: { "height": "200px" }
      }, _attrs))}><div class="flex justify-between"><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Calendar</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px] text-gray-900 cursor-pointer"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path></svg></div><div class="py-8"><p class="text-[#d1814c] font-semibold text-[36px] mb-2 font-[&#39;Petrona&#39;]" style="${ssrRenderStyle({})}">${ssrInterpolate(unref(dayjs)(new Date()).format("D, MMMM YYYY"))}</p><p class="mb-2 font-semibold text-gray-900 text-[16px]">${ssrInterpolate(unref(dayjs)(new Date()).format("dddd"))}</p></div></div>`);
    };
  }
};
const _sfc_setup$b = _sfc_main$b.setup;
_sfc_main$b.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/calender/calender.vue");
  return _sfc_setup$b ? _sfc_setup$b(props, ctx) : void 0;
};
const holiday_widget_vue_vue_type_style_index_0_lang = "";
const _sfc_main$a = {
  __name: "holiday_widget",
  __ssrInlineRender: true,
  setup(__props) {
    const currentIndex = ref();
    const holidays = ref();
    const currentImage = ref();
    const getHolidays = () => {
      axios.get("/holiday/master-page").then((res) => {
        console.log(res.data);
        holidays.value = res.data;
        let conditionPass = true;
        res.data.forEach((element, i) => {
          if (conditionPass) {
            if (new Date(element.holiday_date) >= new Date()) {
              currentIndex.value = i;
              conditionPass = false;
            }
          }
        });
        currentImage.value = holidays.value[0].image;
      });
    };
    onMounted(() => {
      getHolidays();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Galleria = resolveComponent("Galleria");
      _push(ssrRenderComponent(_component_Galleria, mergeProps({
        value: holidays.value,
        responsiveOptions: _ctx.responsiveOptions,
        numVisible: 5,
        circular: true,
        containerStyle: "",
        class: "!h-[180px] !rounded-[20px] overflow-hidden",
        showItemNavigators: true,
        showThumbnails: false
      }, _attrs), {
        item: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<img${ssrRenderAttr("src", `data:image/png;base64,${slotProps.item.image}`)} class="mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]" style="${ssrRenderStyle({ "width": "100%", "margin-bottom": "10px", "position": "relative", "right": "0", "bottom": "10px", "display": "block" })}"${ssrRenderAttr("alt", slotProps.item.holiday_name)}${_scopeId}>`);
          } else {
            return [
              createVNode("img", {
                src: `data:image/png;base64,${slotProps.item.image}`,
                class: "mt-3 mb-2 !rounded-[20px] shadow-sm !h-[180px]",
                style: { "width": "100%", "margin-bottom": "10px", "position": "relative", "right": "0", "bottom": "10px", "display": "block" },
                alt: slotProps.item.holiday_name
              }, null, 8, ["src", "alt"])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup$a = _sfc_main$a.setup;
_sfc_main$a.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/holiday_widget/holiday_widget.vue");
  return _sfc_setup$a ? _sfc_setup$a(props, ctx) : void 0;
};
const events_vue_vue_type_style_index_0_lang = "";
const _sfc_main$9 = {
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
      _push(`<!--[--><div class="bg-white rounded-lg p-2"><span class="text-primary font-semibold fs-6">Events</span><div class="min-h-min overflow-x-scroll"><div class="grid grid-cols-4 gap-4"><!--[-->`);
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
const _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/events/events.vue");
  return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
const employee_dashboard_vue_vue_type_style_index_0_lang = "";
const _sfc_main$8 = {
  __name: "employee_dashboard",
  __ssrInlineRender: true,
  setup(__props) {
    useMainDashboardStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "h-screen p-3 overflow-auto" }, _attrs))}><div class="grid grid-cols-12 gap-4"><div class="col-span-5 w-[100%] !rounded-[20px] overflow-hidden">`);
      _push(ssrRenderComponent(_sfc_main$f, null, null, _parent));
      _push(`</div><div class="col-span-4 w-[100%] !rounded-[20px]">`);
      _push(ssrRenderComponent(_sfc_main$e, null, null, _parent));
      _push(`</div><div class="col-span-3 w-[100%] !rounded-[20px]">`);
      _push(ssrRenderComponent(_sfc_main$a, null, null, _parent));
      _push(`</div></div><div class="grid grid-cols-12 gap-4 pb-7"><div class="col-span-8 !rounded-[20px]"><div class="grid grid-cols-2 gap-4 my-2"><div class="!rounded-[20px] overflow-hidden">`);
      _push(ssrRenderComponent(_sfc_main$c, null, null, _parent));
      _push(`</div><div class="!rounded-[20px] overflow-hidden">`);
      _push(ssrRenderComponent(_sfc_main$b, null, null, _parent));
      _push(`</div></div><div class="grid grid-cols-1"><div>`);
      _push(ssrRenderComponent(_sfc_main$9, null, null, _parent));
      _push(`</div></div></div><div class="col-span-4 my-2">`);
      _push(ssrRenderComponent(_sfc_main$d, null, null, _parent));
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/employee_dashboard.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const _sfc_main$7 = {
  __name: "org_employee_details",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    return (_ctx, _push, _parent, _attrs) => {
      if (unref(useDashboard).orgEmployeeDetailCount) {
        _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><p class="font-[14px] font-[&#39;Poppins&#39;] text-gray-500"> Current month - <span class="mb-2 text-xl font-semibold">${ssrInterpolate(unref(dayjs)(new Date()).format("MMMM"))}</span></p><div class="grid grid-cols-4 gap-3 my-2"><div class="bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"><div class="px-auto flex justify-center"><span class="text-3xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).orgEmployeeDetailCount.total_employee_count ? unref(useDashboard).orgEmployeeDetailCount.total_employee_count : 0)}</span></div><p class="text-lg font-semibold text-center text-gray-500">Total Employees</p></div><div class="bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"><div class="px-auto flex justify-center"><span class="text-3xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).orgEmployeeDetailCount.new_employee_count ? unref(useDashboard).orgEmployeeDetailCount.new_employee_count : 0)}</span></div><p class="text-lg font-semibold text-center text-gray-500">New Employees</p></div><div class="bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"><div class="px-auto flex justify-center"><span class="text-3xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).orgEmployeeDetailCount.exit_employee_count ? unref(useDashboard).orgEmployeeDetailCount.exit_employee_count : 0)}</span></div><p class="text-lg font-semibold text-center text-gray-500">Exit Employees</p></div><div class="bg-[#F6F6F6] rounded-lg p-2 transition duration-700 ease-in-out hover:-translate-y-1 hover:scale-100"><div class="px-auto flex justify-center"><span class="text-3xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).orgEmployeeDetailCount.yet_to_active_employee_count ? unref(useDashboard).orgEmployeeDetailCount.yet_to_active_employee_count : 0)}</span></div><p class="text-lg font-semibold text-center text-gray-500">Yet to Active Employees </p></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/org_employee_details/org_employee_details.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const _sfc_main$6 = {
  __name: "Analytics",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "p-2 overflow-hidden bg-white rounded-lg",
        style: { "height": "200px" }
      }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Analytics</span><div class="h-full overflow-x-scroll bg-white rounded-lg">`);
      if (unref(useDashboard).hrPendingRequestCount) {
        _push(`<!--[-->`);
        ssrRenderList(unref(useDashboard).hrPendingRequestCount, (request) => {
          _push(`<div class="px-auto"><div class="p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"><div class="flex px-2 justify-between items-center"><div><span class="text-[14px] font-semibold">${ssrInterpolate(request.title)}</span></div><div class="flex items-center gap-6"><span class="text-xl font-semibold text-black">${ssrInterpolate(request.value)}</span><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div></div></div></div>`);
        });
        _push(`<!--]-->`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/Analytics/Analytics.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/tasks/task.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/employee_status/employee_status.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "leave_request",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    const findRedirectPath = (value) => {
      if (value == "Leave Requests") {
        return "attendance-leave-approvals";
      } else if (value == "Document Approvals") {
        return "approvals-documents";
      } else if (value == "Attendance Regularization") {
        return "attendance-regularization-approvals";
      } else
        ;
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "p-2 overflow-hidden bg-white rounded-lg",
        style: { "height": "200px" }
      }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Pending Requests</span><div class="h-full overflow-x-scroll bg-white rounded-lg">`);
      if (unref(useDashboard).hrPendingRequestCount) {
        _push(`<!--[-->`);
        ssrRenderList(unref(useDashboard).hrPendingRequestCount, (request) => {
          _push(`<a class="px-auto"${ssrRenderAttr("href", findRedirectPath(request.title))}><div class="p-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"><div class="flex px-2 justify-between items-center"><div><span class="text-[14px] font-semibold">${ssrInterpolate(request.title)}</span></div><div class="flex items-center gap-6"><span class="text-xl font-semibold text-black">${ssrInterpolate(request.value)}</span><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></div></div></div></a>`);
        });
        _push(`<!--]-->`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/leave_requests/leave_request.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "overall_employee",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    onMounted(() => {
      chartOptions.value = setChartOptions();
      setTimeout(() => {
        console.log(useDashboard.overallEmployeeCountForGraph);
        chartData.value.datasets[0].data = useDashboard.overallEmployeeCountForGraph;
      }, 3e3);
    });
    const chartData = ref({
      labels: ["Male", "Female", "Others", "App Check-Ins", "Active Apps", "Inactive Apps"],
      datasets: [
        {
          backgroundColor: [
            "rgba(8, 115, 205, 1)",
            "rgba(205, 159, 71, 1)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(80, 64, 34, 1)",
            "rgba(113, 74, 161, 1)",
            "rgba(181, 86, 151, 1)"
          ],
          borderWidth: 10,
          borderColor: "white",
          data: [0, 0, 0, 0, 0, 0]
        }
      ]
    });
    const chartOptions = ref();
    ref();
    const setChartOptions = () => {
      const documentStyle = getComputedStyle(document.documentElement);
      const textColor = documentStyle.getPropertyValue("--text-color");
      const textColorSecondary = documentStyle.getPropertyValue(
        "--text-color-secondary"
      );
      documentStyle.getPropertyValue("--surface-border");
      return {
        maintainAspectRatio: false,
        aspectRatio: 100,
        plugins: {
          title: {
            display: false,
            text: "Custom Chart Title"
          },
          legend: {
            display: false,
            labels: {
              fontColor: textColor
            }
          }
        },
        scales: {
          x: {
            ticks: {
              textAlign: "center",
              color: textColorSecondary,
              font: {
                weight: 600
              }
            },
            grid: {
              display: false,
              drawBorder: false
            }
          },
          y: {
            display: false,
            ticks: {
              color: textColorSecondary
            },
            grid: {
              color: false,
              drawBorder: false
            }
          }
        }
      };
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Chart = resolveComponent("Chart");
      if (unref(useDashboard).overallEmployeeCountForGraph) {
        _push(ssrRenderComponent(_component_Chart, mergeProps({
          type: "bar",
          data: chartData.value,
          options: chartOptions.value,
          class: "h-full"
        }, _attrs), null, _parent));
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/overall_employees/overall_employee.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const hr_dashboard_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "hr_dashboard",
  __ssrInlineRender: true,
  setup(__props) {
    useMainDashboardStore();
    ref(0);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "h-screen p-3 overflow-auto" }, _attrs))}><div class="grid grid-cols-12 gap-4"><div class="col-span-8"><div class="col-span-12 w-[100%] !rounded-[20px] bg-white p-2">`);
      _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
      _push(`</div><div class="col-span-12 !rounded-[20px]"><div class="grid grid-cols-12 gap-4 my-2"><div class="!rounded-[20px] overflow-hidden col-span-5">`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div><div class="!rounded-[20px] overflow-hidden bg-white col-span-7">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div></div></div><div class="col-span-12">`);
      _push(ssrRenderComponent(_sfc_main$9, null, null, _parent));
      _push(`</div></div><div class="col-span-4 w-[100%] !rounded-[20px]"><div>`);
      _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
      _push(`</div><div class="py-3">`);
      _push(ssrRenderComponent(_sfc_main$d, null, null, _parent));
      _push(`</div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/hr_dashboard/hr_dashboard.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const dashboard_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "dashboard",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    const canShowLoadingScreen = ref();
    const service = Service();
    onMounted(async () => {
      canShowLoadingScreen.value = true;
      await useDashboard.getMainDashboardData();
      useDashboard.getHrDashboardMainSource();
      Service();
      canShowLoadingScreen.value = false;
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(service).current_user_role == 1 || unref(service).current_user_role == 2 || unref(service).current_user_role == 3) {
        _push(`<div class="col"><button class="${ssrRenderClass([[unref(useDashboard).currentDashboard === 1 ? "bg-white text-slate-600 border border-black" : "text-slate-600"], "orange_btn font-semibold text-sm"])}">Self-dashboard</button><button class="${ssrRenderClass([[unref(useDashboard).currentDashboard === 1 ? "bg-[#d4d4d4] text-slate-600" : "text-slate-600"], "Enable_btn font-semibold text-sm"])}">Org-dashboard</button></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(useDashboard).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, null, null, _parent));
      } else if (unref(useDashboard).currentDashboard == 1) {
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      } else {
        _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/dashboard.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
