import { ref, reactive, onMounted, resolveComponent, unref, withCtx, createVNode, createTextVNode, toDisplayString, openBlock, createBlock, useSSRContext, mergeProps } from "vue";
import { ssrRenderList, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseContain, ssrRenderClass, ssrRenderAttr, ssrRenderComponent, ssrRenderAttrs, ssrRenderStyle } from "vue/server-renderer";
import { S as Service } from "./Service90316.js";
import { u as useMainDashboardStore } from "./dashboard_service90316.js";
import axios from "axios";
import dayjs from "dayjs";
import { _ as _sfc_main$7, a as _sfc_main$8 } from "./events90316.js";
import { u as useLeaveService } from "./LeaveApply90316.js";
import { L as LoadingSpinner } from "./LoadingSpinner90316.js";
const _imports_0 = "/build/femaleDashboardImage90316.svg";
const welcome_card_vue_vue_type_style_index_0_lang = "";
const _sfc_main$6 = {
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
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/welcome_card/welcome_card.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {
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
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/leave_details/leave_details.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const leave_balance_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
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
        _push(`<div class="p-2 mx-2 my-2 transition duration-700 ease-in-out bg-[#E4ECFF] rounded-lg cursor-pointer hover:-translate-y-1 hover:scale-100"><div class="flex px-2"><div class=""><span class="text-3xl font-semibold text-black">${ssrInterpolate(leaveBalance.leave_balance)}</span><span class="">/</span><span class="">${ssrInterpolate(leaveBalance.avalied_leaves)}</span></div><div class="px-3"><p class="font-semibold text-primary text-[14px] align-bottom py-2">${ssrInterpolate(leaveBalance.leave_type)}</p></div></div></div>`);
      });
      _push(`<!--]--></div></div></div>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/leave_balance/leave_balance.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const calender_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "calender",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({
        class: "bg-[#FFEFE2] rounded-lg overflow-hidden p-3",
        style: { "height": "200px" }
      }, _attrs))}><div class="flex justify-between"><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Calendar</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px] text-gray-900 cursor-pointer"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path></svg></div><div class="py-8"><p class="text-[#d1814c] font-semibold text-[44px] mb-2 font-[&#39;Petrona&#39;]" style="${ssrRenderStyle({})}">${ssrInterpolate(unref(dayjs)(new Date()).format("D, MMMM YYYY"))}</p><p class="mb-2 font-semibold text-gray-900 text-[20px]">${ssrInterpolate(unref(dayjs)(new Date()).format("dddd"))}</p></div></div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/calender/calender.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const holiday_widget_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
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
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/holiday_widget/holiday_widget.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const employee_dashboard_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "employee_dashboard",
  __ssrInlineRender: true,
  setup(__props) {
    useMainDashboardStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "h-screen p-3 overflow-auto" }, _attrs))}><div class="grid grid-cols-12 gap-4"><div class="col-span-5 w-[100%] !rounded-[20px] overflow-hidden">`);
      _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
      _push(`</div><div class="col-span-4 w-[100%] !rounded-[20px]">`);
      _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
      _push(`</div><div class="col-span-3 w-[100%] !rounded-[20px]">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div></div><div class="grid grid-cols-12 gap-4 pb-7"><div class="col-span-8 !rounded-[20px]"><div class="grid grid-cols-2 gap-4 my-2"><div class="!rounded-[20px] overflow-hidden">`);
      _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
      _push(`</div><div class="!rounded-[20px] overflow-hidden">`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div></div><div class="grid grid-cols-1"><div>`);
      _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
      _push(`</div></div></div><div class="col-span-4 my-2">`);
      _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
      _push(`</div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/dashboard/employee_dashboard/employee_dashboard.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "dashboard",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useMainDashboardStore();
    const canShowLoadingScreen = ref();
    onMounted(async () => {
      canShowLoadingScreen.value = true;
      await useDashboard.getMainDashboardData();
      Service();
      canShowLoadingScreen.value = false;
    });
    return (_ctx, _push, _parent, _attrs) => {
      if (unref(useDashboard).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, _attrs, null, _parent));
      } else {
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      }
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
