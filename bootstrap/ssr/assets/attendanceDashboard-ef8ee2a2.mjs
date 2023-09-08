import { ref, unref, mergeProps, useSSRContext, onMounted, resolveComponent, withCtx, createVNode } from "vue";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderComponent, ssrRenderClass, ssrRenderList } from "vue/server-renderer";
import dayjs from "dayjs";
import axios from "axios";
import { defineStore } from "pinia";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.mjs";
import { L as LoadingSpinner } from "./LoadingSpinner-13fb7de2.mjs";
const useAttendanceDashboardMainStore = defineStore("useAttendanceDashboardMainStore", () => {
  const canShowLoading = ref(false);
  ref();
  const attendanceOverview = ref();
  const attendanceDashboardWorkShiftSource = ref();
  const canShowShiftDetails = ref(false);
  const currentlySelectedShiftDetails = ref([]);
  const getAttendanceDashboardMainSource = () => {
    canShowLoading.value = true;
    let url = "/get-attendance-dashboard";
    axios.get(url).then((res) => {
      attendanceOverview.value = res.data.attendance_overview;
      attendanceDashboardWorkShiftSource.value = res.data.work_shift;
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  return {
    canShowLoading,
    attendanceDashboardWorkShiftSource,
    getAttendanceDashboardMainSource,
    attendanceOverview,
    canShowShiftDetails,
    currentlySelectedShiftDetails
  };
});
const _sfc_main$5 = {
  __name: "attendanceCount",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useAttendanceDashboardMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      if (unref(useDashboard).attendanceOverview) {
        _push(`<div${ssrRenderAttrs(mergeProps({ class: "grid grid-cols-7 gap-4" }, _attrs))}><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).attendanceOverview.present_count)}</span></div><p class="text-sm underline font-semibold text-center text-gray-500">Present</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).attendanceOverview.absent_count)}</span></div><p class="text-sm underline font-semibold text-center text-gray-500">Absent</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center">${ssrInterpolate(unref(useDashboard).attendanceOverview.leave_emp_count)}</span></div><p class="text-sm underline font-semibold text-center text-gray-500">Leave</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Late coming</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Early going</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Missed in punch</p></div><div class="bg-white rounded-lg p-2 border"><div class="px-auto flex justify-center"><span class="text-2xl font-semibold text-center"> 0 </span></div><p class="text-sm underline font-semibold text-center text-gray-500">Missed out punch</p></div></div>`);
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/attendanceDashboard/attendanceCount/attendanceCount.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({
    class: "p-2 overflow-hidden bg-white rounded-lg border",
    style: { "height": "200px" }
  }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Exception Analytics</span><div class="h-full overflow-x-scroll bg-white rounded-lg"><p class="font-medium text-sm text-center">No data to display</p></div></div>`);
}
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/attendanceDashboard/exceptionAnalytics/exceptionAnalytics.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const ExceptionAnalytics = /* @__PURE__ */ _export_sfc(_sfc_main$4, [["ssrRender", _sfc_ssrRender$1]]);
const attendanceAnalytics_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "attendanceAnalytics",
  __ssrInlineRender: true,
  setup(__props) {
    onMounted(() => {
      chartData.value = setChartData();
      chartOptions.value = setChartOptions();
    });
    const chartData = ref();
    const chartOptions = ref();
    const currentDashboard = ref(0);
    const setChartData = () => {
      const documentStyle = getComputedStyle(document.body);
      return {
        labels: ["Bio-Metric", "Mobile", "Web"],
        datasets: [
          {
            data: [540, 325, 702],
            backgroundColor: [
              "rgba(122, 94, 162, 1)",
              "rgba(255, 177, 184, 1)",
              "rgba(107, 183, 192, 1)"
            ],
            hoverBackgroundColor: [documentStyle.getPropertyValue("--blue-400"), documentStyle.getPropertyValue("--yellow-400"), documentStyle.getPropertyValue("--green-400")]
          }
        ]
      };
    };
    const setChartOptions = () => {
      const documentStyle = getComputedStyle(document.documentElement);
      const textColor = documentStyle.getPropertyValue("--text-color");
      documentStyle.getPropertyValue(
        "--text-color-secondary"
      );
      documentStyle.getPropertyValue("--surface-border");
      return {
        maintainAspectRatio: false,
        aspectRatio: 1,
        plugins: {
          labels: {
            usePointStyle: true
          },
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
        }
      };
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Chart = resolveComponent("Chart");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-white rounded-lg p-2 border" }, _attrs))}><p class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins] text-center">Attendance Analytics</p><div class="grid grid-cols-2 gap-4 my-2.5"><div class="h-full">`);
      _push(ssrRenderComponent(_component_Chart, {
        type: "pie",
        data: chartData.value,
        options: chartOptions.value
      }, null, _parent));
      _push(`</div><div class="flex items-center"><div class="my-auto"><div><button class="${ssrRenderClass([[currentDashboard.value === 1 ? "bg-white text-slate-600 border border-black" : "text-slate-600"], "orange_btn font-semibold text-sm"])}">Check In </button><button class="${ssrRenderClass([[currentDashboard.value === 1 ? "bg-[#d4d4d4] text-slate-600" : "text-slate-600"], "Enable_btn font-semibold text-sm"])}">Check Out </button></div><div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/attendanceDashboard/attendanceAnalytics/attendanceAnalytics.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({
    class: "p-2 overflow-hidden bg-white rounded-lg border",
    style: { "height": "200px" }
  }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Upcomings</span><div class="h-full overflow-x-scroll bg-white rounded-lg"><p class="font-medium text-sm text-center">No data to display</p></div></div>`);
}
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/attendanceDashboard/Upcomings/Upcomings.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const Upcomings = /* @__PURE__ */ _export_sfc(_sfc_main$2, [["ssrRender", _sfc_ssrRender]]);
const _sfc_main$1 = {
  __name: "Shifts",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useAttendanceDashboardMainStore();
    function convertToAMPM(railwayTime) {
      const [hours, minutes] = railwayTime.split(":").map(Number);
      const period = hours >= 12 ? "PM" : "AM";
      const hours12 = hours % 12 === 0 ? 12 : hours % 12;
      const timeInAMPM = `${hours12}:${String(minutes).padStart(2, "0")} ${period}`;
      return timeInAMPM;
    }
    return (_ctx, _push, _parent, _attrs) => {
      if (unref(useDashboard).attendanceDashboardWorkShiftSource) {
        _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-white p-2 rounded-lg border" }, _attrs))}><span class="font-semibold text-[14px] text-[#000] font-[&#39;Poppins]">Shift</span><div class="grid grid-cols-6 gap-2 my-2"><!--[-->`);
        ssrRenderList(unref(useDashboard).attendanceDashboardWorkShiftSource, (shift, index) => {
          _push(`<div class="bg-gray-100 w-[180px] h-[200px] rounded-lg cursor-pointer"><div class="w-full bg-gray-200 p-2 rounded-lg"><span class="font-semibold text-[12px] text-[#000] font-[&#39;Poppins]">${ssrInterpolate(shift.work_shift_employee_data[0].shift_name)}</span></div><div class="p-2"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Shift Timing</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">${ssrInterpolate(convertToAMPM(shift.work_shift_employee_data[0].shift_start_time))} - ${ssrInterpolate(convertToAMPM(shift.work_shift_employee_data[0].shift_end_time))}</p></div><div class="my-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Total Employees</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">${ssrInterpolate(shift.work_shift_assigned_employees ? shift.work_shift_assigned_employees : "-")}</p></div><div class="flex justify-between"><div><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Present</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div><div class="mx-3"><p class="font-semibold text-sm text-[#000] font-[&#39;Poppins]">Absent</p><p class="font-medium text-[12px] text-gray-600 font-[&#39;Poppins]">-</p></div></div></div></div>`);
        });
        _push(`<!--]--></div></div>`);
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/attendanceDashboard/Shifts/Shifts.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "attendanceDashboard",
  __ssrInlineRender: true,
  setup(__props) {
    const useDashboard = useAttendanceDashboardMainStore();
    onMounted(() => {
      useDashboard.getAttendanceDashboardMainSource();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[-->`);
      if (unref(useDashboard).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><p class="mb-2 text-2xl text-black font-semibold"> Attendance dashboard </p><div class="bg-white p-2 rounded-lg border flex justify-between"><div class="mx-2"><p class="font-[14px] font-[&#39;Poppins&#39;] text-gray-500"> Daily Analytics - <span class="mb-2 text-sm font-semibold">${ssrInterpolate(unref(dayjs)(new Date()).format("MMMM DD,YYYY"))}</span></p></div><div class="flex justify-end gap-5 mx-4"></div></div><div class="my-3">`);
      _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
      _push(`</div><div class="grid grid-cols-3 gap-6"><div>`);
      _push(ssrRenderComponent(ExceptionAnalytics, null, null, _parent));
      _push(`</div><div>`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div><div>`);
      _push(ssrRenderComponent(Upcomings, null, null, _parent));
      _push(`</div></div><div class="my-3">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Shift Details",
        visible: unref(useDashboard).canShowShiftDetails,
        "onUpdate:visible": ($event) => unref(useDashboard).canShowShiftDetails = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "50vw" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_DataTable, {
              value: unref(useDashboard).currentlySelectedShiftDetails
            }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "user_code",
                    header: "User code"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "name",
                    header: "Name"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "shift_start_time",
                    header: "Shift start time"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "shift_end_time",
                    header: "Shift end time"
                  }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "grace_time",
                    header: "Grace time"
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, {
                      field: "user_code",
                      header: "User code"
                    }),
                    createVNode(_component_Column, {
                      field: "name",
                      header: "Name"
                    }),
                    createVNode(_component_Column, {
                      field: "shift_start_time",
                      header: "Shift start time"
                    }),
                    createVNode(_component_Column, {
                      field: "shift_end_time",
                      header: "Shift end time"
                    }),
                    createVNode(_component_Column, {
                      field: "grace_time",
                      header: "Grace time"
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_DataTable, {
                value: unref(useDashboard).currentlySelectedShiftDetails
              }, {
                default: withCtx(() => [
                  createVNode(_component_Column, {
                    field: "user_code",
                    header: "User code"
                  }),
                  createVNode(_component_Column, {
                    field: "name",
                    header: "Name"
                  }),
                  createVNode(_component_Column, {
                    field: "shift_start_time",
                    header: "Shift start time"
                  }),
                  createVNode(_component_Column, {
                    field: "shift_end_time",
                    header: "Shift end time"
                  }),
                  createVNode(_component_Column, {
                    field: "grace_time",
                    header: "Grace time"
                  })
                ]),
                _: 1
              }, 8, ["value"])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/attendanceDashboard/attendanceDashboard.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
