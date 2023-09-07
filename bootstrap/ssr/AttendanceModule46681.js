/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { inject, ref, computed, onMounted, resolveComponent, mergeProps, unref, useSSRContext, onUpdated, resolveDirective, withCtx, createVNode, openBlock, createBlock, createCommentVNode, toDisplayString, withDirectives, vModelText, vModelSelect, createTextVNode, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import Sidebar from "primevue/sidebar";
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
import InputMask from "primevue/inputmask";
import OverlayPanel from "primevue/overlaypanel";
import Tag from "primevue/tag";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import SelectButton from "primevue/selectbutton";
import { ssrRenderAttrs, ssrRenderComponent, ssrInterpolate, ssrRenderList, ssrRenderClass, ssrRenderStyle, ssrGetDirectiveProps, ssrRenderAttr } from "vue/server-renderer";
import { _ as _imports_0$1 } from "./svg_oops46681.js";
import axios from "axios";
import { S as Service } from "./Service46681.js";
import "@vuepic/vue-datepicker";
import dayjs from "dayjs";
import moment from "moment";
import { _ as _export_sfc } from "./_plugin-vue_export-helper46681.js";
import { u as useLeaveService, _ as _sfc_main$b } from "./LeaveApply46681.js";
import { L as LoadingSpinner } from "./LoadingSpinner46681.js";
import "@vuelidate/core";
import "@vuelidate/validators";
import "primevue/usetoast";
inject("$swal");
const useAttendanceTimesheetMainStore = defineStore("Timesheet", () => {
  const useCalendar = useCalendarStore();
  const service = Service();
  const canShowLoading = ref(true);
  const isManager = ref(false);
  const isTeamOrg = ref("single");
  const switchTimesheet = ref("Classic");
  const mopDetails = ref({});
  const mipDetails = ref({});
  const lcDetails = ref({});
  const egDetails = ref({});
  const AttendanceLateOrMipRegularization = ref();
  const AttendanceEarylOrMopRegularization = ref();
  const absentRegularizationDetails = ref({});
  const selfieDetails = ref({});
  const dialog_Mop = ref(false);
  const dialog_Mip = ref(false);
  const dialog_Lc = ref(false);
  const dialog_Eg = ref(false);
  const dialog_Selfie = ref(false);
  const classicTimesheetSidebar = ref(false);
  const currentEmployeeAttendance = ref();
  const currentEmployeeAttendanceLength = ref(0);
  const currentlySelectedTeamMemberUserId = ref();
  const currentlySelectedTeamMemberAttendance = ref();
  const currentlySelectedOrgMemberUserId = ref();
  const currentlySelectedOrgMemberAttendance = ref();
  const getEmployeeAttendance = async (currentlySelectedUser, currentlySelectedMonth, currentlySelectedYear) => {
    canShowLoading.value = true;
    let url = "/fetch-attendance-user-timesheet";
    return await axios.post(url, {
      month: currentlySelectedMonth + 1,
      year: currentlySelectedYear,
      user_id: currentlySelectedUser
    });
  };
  const getSelectedEmployeeAttendance = async () => {
    try {
      canShowLoading.value = true;
      await getEmployeeAttendance(service.current_user_id, useCalendar.getMonth, useCalendar.getYear).then((res) => {
        console.log("Selected employee attendance : " + res.data);
        currentEmployeeAttendance.value = Object.values(res.data);
        currentEmployeeAttendanceLength.value = Object.values(res.data).length;
      }).finally(() => {
        canShowLoading.value = false;
      });
    } catch (error) {
      console.error("Error:", error);
    }
  };
  const getSelectedEmployeeTeamDetails = (user_id, isteam) => {
    isTeamOrg.value = isteam;
    canShowLoading.value = true;
    currentlySelectedTeamMemberUserId.value = user_id;
    getEmployeeAttendance(user_id, useCalendar.getMonth, useCalendar.getYear).then((res) => {
      currentlySelectedTeamMemberAttendance.value = Object.values(res.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const getSelectedEmployeeOrgDetails = (user_id, isteam) => {
    isTeamOrg.value = isteam;
    canShowLoading.value = true;
    currentlySelectedOrgMemberUserId.value = user_id;
    getEmployeeAttendance(user_id, useCalendar.getMonth, useCalendar.getYear).then((res) => {
      currentlySelectedOrgMemberAttendance.value = Object.values(res.data);
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const getTeamList = async (user_code) => {
    return axios.post("/fetch-team-members", {
      user_code
    });
  };
  const getOrgList = async () => {
    return axios.get("/fetch-org-members");
  };
  const findAttendanceMode = (attendance_mode) => {
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
  const AttendanceRegularizationApplyFormat = (selectedDayRegularizationRecord, selectedAttendanceRegularizationType) => {
    let AttendanceRegularizeFormat = {
      user_code: service.current_user_code,
      regularization_type: selectedAttendanceRegularizationType,
      attendance_date: selectedDayRegularizationRecord.date,
      user_time: selectedDayRegularizationRecord.checkin_time,
      regularize_time: selectedAttendanceRegularizationType == "LC" || selectedAttendanceRegularizationType == "MIP" ? convertTime(AttendanceLateOrMipRegularization.value) : selectedAttendanceRegularizationType == "EG" || selectedAttendanceRegularizationType == "MOP" ? convertTime(AttendanceEarylOrMopRegularization.value) : "",
      reason: selectedDayRegularizationRecord.reason,
      custom_reason: selectedDayRegularizationRecord.custom_reason ? selectedDayRegularizationRecord.custom_reason : ""
    };
    console.log(AttendanceRegularizeFormat);
    AttendanceLateOrMipRegularization.value = null;
    AttendanceEarylOrMopRegularization.value = null;
    return AttendanceRegularizeFormat;
  };
  const onClickShowLcRegularization = (attendance) => {
    dialog_Lc.value = true;
    lcDetails.value = { ...attendance };
  };
  const applyLcRegularization = () => {
    canShowLoading.value = true;
    axios.post("/attendance-req-regularization", AttendanceRegularizationApplyFormat(lcDetails.value, "LC")).then((res) => {
      getSelectedEmployeeAttendance();
      let message = res.data.message;
      console.log(message);
      if (res.data.status == "success") {
        Swal.fire(
          "Good job!",
          "Attendance Regularized Successful",
          "success"
        );
      } else {
        Swal.fire(
          "Fill!",
          `${message}`,
          "error"
        );
      }
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const onClickShowEgRegularization = (attendance) => {
    dialog_Eg.value = true;
    egDetails.value = { ...attendance };
  };
  const applyEgRegularization = () => {
    classicTimesheetSidebar.value = false;
    canShowLoading.value = true;
    axios.post("/attendance-req-regularization", AttendanceRegularizationApplyFormat(egDetails.value, "EG")).then((res) => {
      getSelectedEmployeeAttendance();
      let message = res.data.message;
      console.log(message);
      if (res.data.status == "success") {
        Swal.fire(
          "Success!",
          "Attendance Regularized Successful",
          "success"
        );
      } else {
        Swal.fire(
          "Error",
          `${message}`,
          "error"
        );
      }
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const onClickShowMipRegularization = (attendance) => {
    dialog_Mip.value = true;
    mipDetails.value = { ...attendance };
  };
  const applyMipRegularization = () => {
    classicTimesheetSidebar.value = false;
    canShowLoading.value = true;
    axios.post("/attendance-req-regularization", AttendanceRegularizationApplyFormat(mipDetails.value, "MIP")).then((res) => {
      getSelectedEmployeeAttendance();
      let message = res.data.message;
      console.log(message);
      if (res.data.status == "success") {
        Swal.fire(
          "Good job!",
          "Attendance Regularized Successful",
          "success"
        );
      } else {
        Swal.fire(
          "Fill!",
          `${message}`,
          "error"
        );
      }
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const onClickShowMopRegularization = (attendance) => {
    dialog_Mop.value = true;
    mopDetails.value = { ...attendance };
  };
  const applyMopRegularization = () => {
    classicTimesheetSidebar.value = false;
    canShowLoading.value = true;
    axios.post("/attendance-req-regularization", AttendanceRegularizationApplyFormat(mopDetails.value, "MOP")).then((res) => {
      getSelectedEmployeeAttendance();
      let message = res.data.message;
      console.log(message);
      if (res.data.status == "success") {
        Swal.fire(
          "Good job!",
          "Attendance Regularized Successful",
          "success"
        );
      } else {
        Swal.fire(
          "Fill!",
          `${message}`,
          "error"
        );
      }
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const applyAbsentRegularization = () => {
    classicTimesheetSidebar.value = false;
    canShowLoading.value = true;
    axios.post("/attendance-req-absent-regularization", {
      user_code: service.current_user_code,
      attendance_date: absentRegularizationDetails.value.date,
      regularization_type: "Absent Regularization",
      checkin_time: convertTime(absentRegularizationDetails.value.start_time),
      checkout_time: convertTime(absentRegularizationDetails.value.end_time),
      reason: absentRegularizationDetails.value.reason,
      custom_reason: absentRegularizationDetails.value.custom_reason ? absentRegularizationDetails.value.custom_reason : ""
    }).then((res) => {
      getSelectedEmployeeAttendance();
      let message = res.data.message;
      if (res.data.status == "success") {
        Swal.fire(
          "Good job!",
          "Attendance Regularized Successful",
          "success"
        );
      } else {
        Swal.fire(
          "Fill!",
          `${message}`,
          "error"
        );
      }
    }).finally(() => {
      canShowLoading.value = false;
    });
  };
  const onClickSViewSelfie = (attendance) => {
    dialog_Selfie.value = true;
    selfieDetails.value = attendance;
  };
  const convertTime = (inputTime) => {
    const [time, period] = inputTime.split(" ");
    const [hours, minutes] = time.split(":");
    let convertedHours = parseInt(hours);
    if (period === "PM" && convertedHours !== 12) {
      convertedHours += 12;
    } else if (period === "AM" && convertedHours === 12) {
      convertedHours = 0;
    }
    let convertFormat = `${convertedHours.toString().padStart(2, "0")}:${minutes}:00`;
    return convertFormat;
  };
  return {
    getEmployeeAttendance,
    currentEmployeeAttendance,
    currentEmployeeAttendanceLength,
    getSelectedEmployeeOrgDetails,
    getTeamList,
    getOrgList,
    getSelectedEmployeeTeamDetails,
    getSelectedEmployeeAttendance,
    classicTimesheetSidebar,
    currentlySelectedTeamMemberUserId,
    currentlySelectedTeamMemberAttendance,
    currentlySelectedOrgMemberUserId,
    currentlySelectedOrgMemberAttendance,
    canShowLoading,
    isManager,
    isTeamOrg,
    findAttendanceMode,
    AttendanceLateOrMipRegularization,
    AttendanceEarylOrMopRegularization,
    onClickShowLcRegularization,
    applyMopRegularization,
    mopDetails,
    dialog_Mop,
    onClickShowEgRegularization,
    applyMipRegularization,
    mipDetails,
    dialog_Mip,
    onClickShowMipRegularization,
    applyLcRegularization,
    lcDetails,
    dialog_Lc,
    onClickShowMopRegularization,
    applyEgRegularization,
    egDetails,
    dialog_Eg,
    dialog_Selfie,
    onClickSViewSelfie,
    selfieDetails,
    switchTimesheet,
    absentRegularizationDetails,
    applyAbsentRegularization
  };
});
const useCalendarStore = defineStore("calendar", () => {
  const useTimesheet = useAttendanceTimesheetMainStore();
  Service();
  const year = ref(new Date().getFullYear());
  const month = ref(new Date().getMonth());
  const day = ref(new Date().getDate());
  const getYear = computed(() => year.value);
  const getMonth = computed(() => month.value);
  const getDay = computed(() => day.value);
  function incrementYear(val) {
    year.value = year.value + val;
  }
  function decrementYear(val) {
    year.value = year.value - val;
  }
  function incrementMonth(val) {
    useTimesheet.canShowLoading = true;
    if (month.value == 11) {
      incrementYear(1);
      month.value = 0;
      return;
    }
    month.value = month.value + val;
    console.log(useTimesheet.isTeamOrg);
    useTimesheet.getSelectedEmployeeTeamDetails(useTimesheet.currentlySelectedTeamMemberUserId);
    useTimesheet.getSelectedEmployeeOrgDetails(useTimesheet.currentlySelectedOrgMemberUserId);
    useTimesheet.getSelectedEmployeeAttendance();
  }
  function decrementMonth(val) {
    useTimesheet.canShowLoading = true;
    if (month.value == 0) {
      decrementYear(1);
      month.value = 11;
      return;
    }
    month.value = month.value - val;
    useTimesheet.getSelectedEmployeeTeamDetails(useTimesheet.currentlySelectedTeamMemberUserId);
    useTimesheet.getSelectedEmployeeOrgDetails(useTimesheet.currentlySelectedOrgMemberUserId);
    useTimesheet.getSelectedEmployeeAttendance();
  }
  function setMonth(val) {
    month.value = val;
  }
  function setYear(val) {
    year.value = val;
  }
  function resetDate() {
    year.value = new Date().getFullYear();
    month.value = new Date().getMonth();
    day.value = new Date().getDate();
  }
  return {
    year,
    month,
    day,
    getYear,
    getMonth,
    getDay,
    incrementYear,
    incrementMonth,
    decrementMonth,
    setMonth,
    setYear,
    resetDate
  };
});
const main = "";
const Top_vue_vue_type_style_index_0_lang = "";
const _sfc_main$a = {
  __name: "Top",
  __ssrInlineRender: true,
  setup(__props) {
    const calendarStore = useCalendarStore();
    const useTimesheet = useAttendanceTimesheetMainStore();
    calendarStore.$subscribe((mutation, state) => {
      prepareMonths();
      initializeDatePicker();
    });
    const date = ref();
    const monthStr = ref("");
    const shortMonthStr = ref("");
    const options = ref(["Classic", "Detailed"]);
    const prepareMonths = () => {
      monthStr.value = new Intl.DateTimeFormat("en-US", { month: "long" }).format(
        new Date(
          calendarStore.getYear,
          calendarStore.getMonth,
          calendarStore.getDay
        )
      );
      shortMonthStr.value = monthStr.value.substring(0, 3);
    };
    const initializeDatePicker = () => {
      date.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        calendarStore.getDay
      );
    };
    onMounted(() => {
      prepareMonths();
      initializeDatePicker();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_SelectButton = resolveComponent("SelectButton");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "col-span-7 flex" }, _attrs))}><div class="my-auto">`);
      _push(ssrRenderComponent(_component_SelectButton, {
        modelValue: unref(useTimesheet).switchTimesheet,
        "onUpdate:modelValue": ($event) => unref(useTimesheet).switchTimesheet = $event,
        options: options.value,
        "aria-labelledby": "basic",
        style: { "width": "170px" }
      }, null, _parent));
      _push(`</div><div class="w-full flex justify-center items-center py-4"><button><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 hover:text-gray-800 cursor-pointer transition-all"><path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"></path></svg></button><div class="px-9"><div class="w-full inline-flex space-x-1 text-lg md:text-2xl lg:text-2xl text-left md:font-semibold font-semibold"><span class="font-semibold text-lg md:hidden">${ssrInterpolate(shortMonthStr.value)}</span><span class="font-semibold text-lg hidden md:block">${ssrInterpolate(monthStr.value)}</span><span class="font-semibold text-lg">${ssrInterpolate(unref(calendarStore).getYear)}</span></div></div><button><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 hover:text-gray-800 cursor-pointer transition-all"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"></path></svg></button></div>`);
      {
        _push(`<!---->`);
      }
      _push(`</div>`);
    };
  }
};
const _sfc_setup$a = _sfc_main$a.setup;
_sfc_main$a.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/Top.vue");
  return _sfc_setup$a ? _sfc_setup$a(props, ctx) : void 0;
};
const DetailedTimesheet_vue_vue_type_style_index_0_scoped_7db747e6_lang = "";
const _sfc_main$9 = {
  __name: "DetailedTimesheet",
  __ssrInlineRender: true,
  props: {
    singleAttendanceDay: {
      type: Object,
      required: true
    }
  },
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    Service();
    const calendarStore = useCalendarStore();
    calendarStore.$subscribe((mutation, state) => {
      getDaysInMonth();
      getFirstDayOfMonth();
    });
    const daysOfTheWeek = {
      1: "Sunday",
      2: "Monday",
      3: "Tuesday",
      4: "Wednesday",
      5: "Thursday",
      6: "Friday",
      7: "Saturday"
    };
    const daysInCurrentMonth = ref(0);
    const firstDayOfCurrentMonth = ref(0);
    const lastEmptyCells = ref(0);
    const getDaysInMonth = () => {
      daysInCurrentMonth.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth + 1,
        0
      ).getDate();
    };
    const getFirstDayOfMonth = () => {
      firstDayOfCurrentMonth.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        1
      ).getDay();
    };
    const lastCalendarCells = () => {
      let totalGrid = firstDayOfCurrentMonth.value <= 5 ? 35 : 42;
      lastEmptyCells.value = totalGrid - daysInCurrentMonth.value - firstDayOfCurrentMonth.value;
    };
    const isToday = (day) => {
      let today = new Date();
      if (calendarStore.getYear == today.getFullYear() && calendarStore.getMonth == today.getMonth() && day == today.getDate())
        return true;
      return false;
    };
    const isWeekEndDays = (day) => {
      var dayValue = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        day
      ).getDay();
      if (dayValue == 0) {
        return true;
      } else {
        return false;
      }
    };
    const isFutureDate = (today) => {
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate());
      var dayValue = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        today
      );
      if (tomorrow > dayValue) {
        return true;
      } else {
        return false;
      }
    };
    const getSession = (time) => {
      let timeFormat = time == null ? "--:--:--" : moment(
        time,
        ["HH:mm"]
      ).format("h:mm a");
      return timeFormat;
    };
    const isEventToday = (day, startdate) => {
      if (calendarStore.getYear == startdate.substring(0, 4) && calendarStore.getMonth + 1 == startdate.substring(5, 7) && day == startdate.substring(8, 10))
        return true;
      return false;
    };
    const currentMonthsingleAttendanceDay = (day, singleAttendanceDay) => {
      if (!singleAttendanceDay.length)
        return [];
      let todaysEvent = [];
      singleAttendanceDay.forEach((event) => {
        if (isEventToday(day, event.date)) {
          todaysEvent.push(event);
        }
      });
      return todaysEvent;
    };
    onMounted(() => {
      getDaysInMonth();
      getFirstDayOfMonth();
      lastCalendarCells();
    });
    onUpdated(() => {
      getFirstDayOfMonth();
      lastCalendarCells();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _directive_tooltip = resolveDirective("tooltip");
      if (__props.singleAttendanceDay) {
        _push(`<div${ssrRenderAttrs(mergeProps({
          ref: "calendarContainer",
          class: "min-h-full min-w-fit text-gray-800 card"
        }, _attrs))} data-v-7db747e6><div class="min-w-max border grid grid-cols-7 gap-1 card-body" data-v-7db747e6>`);
        _push(ssrRenderComponent(_sfc_main$a, null, null, _parent));
        _push(`<!--[-->`);
        ssrRenderList(daysOfTheWeek, (day) => {
          _push(`<div class="text-center text-sm md:text-base lg:text-lg font-semibold text-orange-500 my-4" data-v-7db747e6>${ssrInterpolate(day.substring(0, 3))}</div>`);
        });
        _push(`<!--]-->`);
        if (firstDayOfCurrentMonth.value > 0) {
          _push(`<!--[-->`);
          ssrRenderList(firstDayOfCurrentMonth.value, (day) => {
            _push(`<div class="w-full border opacity-50" data-v-7db747e6></div>`);
          });
          _push(`<!--]-->`);
        } else {
          _push(`<!---->`);
        }
        _push(`<!--[-->`);
        ssrRenderList(daysInCurrentMonth.value, (day) => {
          _push(`<div class="${ssrRenderClass([{
            "bg-slate-50 text-gray-600 font-medium": isToday(day),
            "hover:bg-gray-100 hover:text-gray-700": !isToday(day),
            "bg-gray-200": isWeekEndDays(day)
          }, "h-16 py-3 shadow-sm md:h-36 w-full border align-top rounded-lg"])}" data-v-7db747e6>`);
          if (currentMonthsingleAttendanceDay(day, __props.singleAttendanceDay).length) {
            _push(`<!--[-->`);
            ssrRenderList(currentMonthsingleAttendanceDay(day, __props.singleAttendanceDay), (singleAttendanceDay) => {
              _push(`<div class="hidden md:block" data-v-7db747e6>`);
              if (isFutureDate(day)) {
                _push(`<div style="${ssrRenderStyle({ "max-width": "140px" })}" data-v-7db747e6><div class="w-full h-full text-xs md:text-sm lg:text-base text-left px-2 transition-colors font-semibold" data-v-7db747e6><div class="flex justify-center" data-v-7db747e6><p data-v-7db747e6>${ssrInterpolate(unref(dayjs)(singleAttendanceDay.date).format("D"))}</p>`);
                if (!singleAttendanceDay.isAbsent) {
                  _push(`<div data-v-7db747e6>`);
                  if (singleAttendanceDay.workshift_code) {
                    _push(`<p class="text-right px-2 text-white font-semibold text-xs bg-indigo-900 rounded-md" data-v-7db747e6>${ssrInterpolate(singleAttendanceDay.workshift_code)}</p>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div>`);
                } else {
                  _push(`<!---->`);
                }
                _push(`</div>`);
                if (isWeekEndDays(day)) {
                  _push(`<div data-v-7db747e6>`);
                  if (singleAttendanceDay.isAbsent) {
                    _push(`<p class="font-bold text-sm text-orange-400" data-v-7db747e6>Week Off </p>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div>`);
                } else {
                  _push(`<!---->`);
                }
                if (singleAttendanceDay.isAbsent) {
                  _push(`<div data-v-7db747e6>`);
                  if (singleAttendanceDay.absent_status.includes("Approved")) {
                    _push(`<div class="bg-green-100 p-3 rounded-lg" data-v-7db747e6><p class="font-semibold fs-6 text-green-900 text-center" data-v-7db747e6>${ssrInterpolate(singleAttendanceDay.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Approved" : singleAttendanceDay.leave_type)}</p><p class="text-center" data-v-7db747e6>Approved <i${ssrRenderAttrs(mergeProps({
                      class: "fa fa-check-circle text-success mx-2",
                      title: "Not Applied"
                    }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Approved")))} data-v-7db747e6></i></p></div>`);
                  } else if (singleAttendanceDay.absent_status.includes("Rejected")) {
                    _push(`<div class="bg-red-100 p-3 rounded-lg" data-v-7db747e6><p class="font-semibold fs-6 text-red-900 text-center" data-v-7db747e6>${ssrInterpolate(singleAttendanceDay.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Approved" : singleAttendanceDay.leave_type)}</p><p class="text-center" data-v-7db747e6>Rejected <i class="fa fa-times-circle mx-2 text-danger" data-v-7db747e6></i></p></div>`);
                  } else if (singleAttendanceDay.absent_status.includes("Pending")) {
                    _push(`<div class="bg-yellow-100 p-3 rounded-lg" data-v-7db747e6><p class="font-semibold fs-6 text-yellow-600 text-center" data-v-7db747e6>${ssrInterpolate(singleAttendanceDay.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Approved" : singleAttendanceDay.leave_type)}</p><p class="text-center" data-v-7db747e6>Pending<i${ssrRenderAttrs(mergeProps({ class: "fa fa-question-circle fs-15 text-secondary mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Pending")))} data-v-7db747e6></i></p></div>`);
                  } else if (singleAttendanceDay.absent_status.includes("Revoked")) {
                    _push(`<div class="bg-slate-100 p-3 rounded-lg" data-v-7db747e6><p class="font-semibold fs-6 text-slate-600 text-center" data-v-7db747e6>${ssrInterpolate(singleAttendanceDay.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Approved" : singleAttendanceDay.leave_type)}</p><p class="text-center" data-v-7db747e6>Revoked</p></div>`);
                  } else if (!isWeekEndDays(day)) {
                    _push(`<div class="bg-red-100 p-3 rounded-lg" data-v-7db747e6><p class="font-semibold fs-6 text-red-900 text-center" data-v-7db747e6>Absent <i${ssrRenderAttrs(mergeProps({ class: "fa fa-exclamation-circle text-warning fs-15 mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Not Applied")))} data-v-7db747e6></i></p></div>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div>`);
                } else {
                  _push(`<div class="w-full py-1 flex space-x-1 items-center whitespace-nowrap overflow-hidden hover: cursor-pointer rounded-sm" data-v-7db747e6><div class="w-full" data-v-7db747e6><div class="text-xs tracking-tight text-clip overflow-hidden p-1 overflow-y-auto" data-v-7db747e6><div class="flex" data-v-7db747e6><div class="flex" data-v-7db747e6><i class="fa fa-arrow-down text-green-800 font-semibold text-sm" style="${ssrRenderStyle({ "transform": "rotate(-45deg)" })}" data-v-7db747e6></i><p class="text-green-800 font-semibold text-sm mx-1" style="${ssrRenderStyle({ "width": "40px" })}" data-v-7db747e6>${ssrInterpolate(getSession(singleAttendanceDay.checkin_time))}</p></div><div class="px-1" data-v-7db747e6><i class="${ssrRenderClass([unref(useTimesheet).findAttendanceMode(singleAttendanceDay.attendance_mode_checkin), "text-green-800 font-semibold text-sm"])}" data-v-7db747e6></i>`);
                  if (singleAttendanceDay.attendance_mode_checkin == "mobile") {
                    _push(`<button class="mx-2" data-v-7db747e6><i class="fa fa-picture-o" aria-hidden="true" data-v-7db747e6></i></button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div><div class="" data-v-7db747e6>`);
                  if (singleAttendanceDay.isMIP) {
                    _push(`<button class="regualarization_button bg-orange-600 text-white" data-v-7db747e6>MIP</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  if (singleAttendanceDay.isLC) {
                    _push(`<button class="regualarization_button bg-blue-900 text-white font-semibold" data-v-7db747e6>LC</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  if (singleAttendanceDay.isLC) {
                    _push(`<button data-v-7db747e6>`);
                    if (singleAttendanceDay.lc_status.includes("Approved")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({
                        class: "fa fa-check-circle text-success mx-2",
                        title: "Not Applied"
                      }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Approved")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.lc_status.includes("Pending")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-question-circle fs-15 text-secondary mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Pending")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.lc_status.includes("Rejected")) {
                      _push(`<i class="fa fa-times-circle mx-2 text-danger" data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.lc_status.includes("None")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-exclamation-circle text-warning fs-15 mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Not Applied")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    _push(`</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  if (singleAttendanceDay.isMIP) {
                    _push(`<button data-v-7db747e6>`);
                    if (singleAttendanceDay.mip_status.includes("Approved")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-check-circle text-success mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Approved")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.mip_status.includes("Pending")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-question-circle fs-15 text-secondary mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Pending")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.mip_status.includes("Rejected")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-times-circle mx-2 text-danger" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Rejected")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.mip_status.includes("None")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-exclamation-circle text-warning fs-15 mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Not Applied")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    _push(`</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div></div></div><div class="text-xs tracking-tight text-clip overflow-hidden p-1" data-v-7db747e6><div class="flex" data-v-7db747e6><div class="flex" data-v-7db747e6><i class="fa fa-arrow-down font-semibold text-sm text-red-800" style="${ssrRenderStyle({ "transform": "rotate(230deg)" })}" data-v-7db747e6></i><p class="text-red-800 font-semibold text-sm mx-1" style="${ssrRenderStyle({ "width": "40px" })}" data-v-7db747e6>${ssrInterpolate(getSession(singleAttendanceDay.checkout_time))}</p></div><div class="px-1" data-v-7db747e6><i class="${ssrRenderClass([unref(useTimesheet).findAttendanceMode(singleAttendanceDay.attendance_mode_checkout), "text-red-800 font-semibold text-sm"])}" data-v-7db747e6></i>`);
                  if (singleAttendanceDay.attendance_mode_checkout == "mobile") {
                    _push(`<button class="mx-2" data-v-7db747e6><i class="fa fa-picture-o" aria-hidden="true" data-v-7db747e6></i></button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div><div class="" data-v-7db747e6>`);
                  if (singleAttendanceDay.isMOP) {
                    _push(`<button class="regualarization_button bg-orange-600 text-white" data-v-7db747e6>MOP</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  if (singleAttendanceDay.isEG) {
                    _push(`<button class="regualarization_button bg-orange-400 text-white" data-v-7db747e6>EG</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  if (singleAttendanceDay.isEG) {
                    _push(`<button data-v-7db747e6>`);
                    if (singleAttendanceDay.eg_status.includes("Approved")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({
                        class: "fa fa-check-circle text-success mx-2",
                        title: "Not Applied"
                      }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Approved")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.eg_status.includes("Pending")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-question-circle fs-15 text-secondary mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Pending")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.eg_status.includes("Rejected")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-times-circle mx-2 text-danger" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Rejected")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.eg_status.includes("None")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-exclamation-circle text-warning fs-15 mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Not Applied")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    _push(`</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  if (singleAttendanceDay.isMOP) {
                    _push(`<button data-v-7db747e6>`);
                    if (singleAttendanceDay.mop_status.includes("Approved")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({
                        class: "fa fa-check-circle text-success mx-2",
                        title: "Not Applied"
                      }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Approved")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.mop_status.includes("Pending")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-question-circle fs-15 text-secondary mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Pending")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.mop_status.includes("Rejected")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-times-circle text-danger mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Rejected")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    if (singleAttendanceDay.mop_status.includes("None")) {
                      _push(`<i${ssrRenderAttrs(mergeProps({ class: "fa fa-exclamation-circle text-warning fs-15 mx-2" }, ssrGetDirectiveProps(_ctx, _directive_tooltip, "Not Applied")))} data-v-7db747e6></i>`);
                    } else {
                      _push(`<!---->`);
                    }
                    _push(`</button>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</div></div></div></div></div>`);
                }
                _push(`</div></div>`);
              } else {
                _push(`<!---->`);
              }
              _push(`</div>`);
            });
            _push(`<!--]-->`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
        });
        _push(`<!--]-->`);
        if (lastEmptyCells.value > 0) {
          _push(`<!--[-->`);
          ssrRenderList(lastEmptyCells.value, (day) => {
            _push(`<div class="h-16 md:h-36 w-full border rounded-lg opacity-50" data-v-7db747e6></div>`);
          });
          _push(`<!--]-->`);
        } else {
          _push(`<!---->`);
        }
        _push(`<div class="rounded-lg md:hidden col-span-7 flex justify-between items-center p-2" data-v-7db747e6><div data-v-7db747e6><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5cursor-pointer transition-all" data-v-7db747e6><path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" data-v-7db747e6></path></svg></div><div data-v-7db747e6><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 cursor-pointer transition-all" data-v-7db747e6><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" data-v-7db747e6></path></svg></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
    };
  }
};
const _sfc_setup$9 = _sfc_main$9.setup;
_sfc_main$9.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/DetailedTimesheet.vue");
  return _sfc_setup$9 ? _sfc_setup$9(props, ctx) : void 0;
};
const DetailedTimesheet = /* @__PURE__ */ _export_sfc(_sfc_main$9, [["__scopeId", "data-v-7db747e6"]]);
const _sfc_main$8 = {
  __name: "ClassicAttendanceRegularizationSidebar",
  __ssrInlineRender: true,
  props: {
    source: {
      type: Object,
      required: true
    },
    type: {
      type: String,
      required: true
    }
  },
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    const findStatus = (data) => {
      if (data.includes("Approved")) {
        return " bg-green-50 text-green-600  fs-6 rounded-lg";
      } else if (data.includes("Rejected")) {
        return " bg-red-50 text-red-600  fs-6 rounded-lg";
      } else if (data.includes("Pending")) {
        return "border-yellow-500 bg-yellow-50 text-yellow-600  fs-6 rounded-lg";
      } else if (data.includes("Revoked")) {
        return " bg-gray-50 text-gray-600  fs-6 rounded-lg";
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "row" }, _attrs))}><div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Date</label></div><div class="col-6"><span class="text-ash-medium fs-15" id="current_date">${ssrInterpolate(__props.source.date)}</span><input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date" id="attendance_date"></div></div></div>`);
      if (__props.type == "LC") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing as</label></div><div class="col-6">`);
        if (__props.source.lc_status.includes("Approved")) {
          _push(`<p>${ssrInterpolate(__props.source.checkin_time)}</p>`);
        } else {
          _push(`<input placeholder="format-09:30:00" type="time" class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""${ssrRenderAttr("value", unref(useTimesheet).AttendanceLateOrMipRegularization)}>`);
        }
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MIP") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing as</label></div><div class="col-6">`);
        if (__props.source.mip_status.includes("Approved")) {
          _push(`<p>${ssrInterpolate(__props.source.checkin_time)}</p>`);
        } else {
          _push(`<input placeholder="format-09:30:00" type="time" class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""${ssrRenderAttr("value", unref(useTimesheet).AttendanceLateOrMipRegularization)}>`);
        }
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "EG") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing as</label></div><div class="col-6">`);
        if (__props.source.eg_status.includes("Approved")) {
          _push(`<p>${ssrInterpolate(__props.source.checkout_time)}</p>`);
        } else {
          _push(`<input placeholder="format-06:30:00" type="time" class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""${ssrRenderAttr("value", unref(useTimesheet).AttendanceEarylOrMopRegularization)}>`);
        }
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MOP") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing as</label></div><div class="col-6">`);
        if (__props.source.mop_status.includes("Approved")) {
          _push(`<p>${ssrInterpolate(__props.source.checkout_time)}</p>`);
        } else {
          _push(`<input placeholder="format-06:30:00" type="time" class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""${ssrRenderAttr("value", unref(useTimesheet).AttendanceEarylOrMopRegularization)}>`);
        }
        _push(`</div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "LC") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>`);
        if (__props.source.lc_status == "None") {
          _push(`<div class="col-6"><select name="reason" class="form-select btn-line-orange" id="reason_lc"><option selected hidden disabled> Choose Reason </option><option value="Permission">Permission</option><option value="Technical Error">Technical Error</option><option value="Official">Official</option><option value="Personal">Personal</option><option value="Others">Others</option></select></div>`);
        } else {
          _push(`<div class="col-6"><p class="max-w-min p-1">${ssrInterpolate(__props.source.lc_reason)}</p></div>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "LC") {
        _push(`<div class="row">`);
        if (unref(useTimesheet).lcDetails.reason == "Others") {
          _push(`<div class="col-12"><textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control" placeholder="Reason here....">${ssrInterpolate(unref(useTimesheet).lcDetails.custom_reason)}</textarea></div>`);
        } else if (__props.source.lc_reason == "Others") {
          _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Custom reason</label></div><div class="col-6"><p class="pl-3">${ssrInterpolate(__props.source.lc_reason_custom)}</p></div></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "LC") {
        _push(`<div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Status</label></div><div class="col-6">`);
        if (__props.source.lc_status.includes("None")) {
          _push(`<p class="${ssrRenderClass([findStatus(__props.source.lc_status), "max-w-min ml-3 p-1"])}">-</p>`);
        } else {
          _push(`<p class="${ssrRenderClass([findStatus(__props.source.lc_status), "max-w-min ml-3 p-1"])}">${ssrInterpolate(__props.source.lc_status)}</p>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "LC") {
        _push(`<div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">`);
        if (__props.source.lc_status == "None") {
          _push(`<button type="button" class="btn btn-orange">Apply</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MIP") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>`);
        if (__props.source.mip_status == "None") {
          _push(`<div class="col-6"><select name="reason" class="form-select btn-line-orange" id="reason_lc"><option selected hidden disabled> Choose Reason </option><option value="Permission">Permission</option><option value="Technical Error">Technical Error</option><option value="Official">Official</option><option value="Personal">Personal</option><option value="Others">Others</option></select></div>`);
        } else {
          _push(`<div class="col-6"><p class="max-w-min p-1">${ssrInterpolate(__props.source.mip_reason)}</p></div>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MIP") {
        _push(`<div class="col-12">`);
        if (unref(useTimesheet).mipDetails.reason == "Others") {
          _push(`<div class="row"><div class="col-12"><textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control" placeholder="Reason here....">${ssrInterpolate(unref(useTimesheet).mipDetails.custom_reason)}</textarea></div></div>`);
        } else if (__props.source.mip_reason == "Others") {
          _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Custom reason</label></div><div class="col-6"><p class="ml-3">${ssrInterpolate(__props.source.mip_reason_custom)}</p></div></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MIP") {
        _push(`<div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Status</label></div><div class="col-6">`);
        if (__props.source.mip_status.includes("None")) {
          _push(`<p class="${ssrRenderClass([findStatus(__props.source.mip_status), "p-1 ml-3 min-w-max"])}"> - </p>`);
        } else {
          _push(`<p class="${ssrRenderClass([findStatus(__props.source.mip_status), "p-1 ml-3 min-w-max"])}">${ssrInterpolate(__props.source.mip_status)}</p>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.source.mip_status == "None") {
        _push(`<div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize"><button type="button" class="btn btn-orange">Apply</button></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "EG") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>`);
        if (__props.source.eg_status == "None") {
          _push(`<div class="col-6"><select name="reason" class="form-select btn-line-orange" id="reason_lc"><option selected hidden disabled> Choose Reason </option><option value="Permission">Permission</option><option value="Technical Error">Technical Error</option><option value="Official">Official</option><option value="Personal">Personal</option><option value="Others">Others</option></select></div>`);
        } else {
          _push(`<div class="col-6"><p class="ml-3">${ssrInterpolate(__props.source.eg_reason)}</p></div>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "EG") {
        _push(`<div class="col-12">`);
        if (unref(useTimesheet).egDetails.reason == "Others") {
          _push(`<div class="row"><div class="col-12"><textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control" placeholder="Reason here....">${ssrInterpolate(unref(useTimesheet).egDetails.custom_reason)}</textarea></div></div>`);
        } else if (__props.source.eg_reason == "Others") {
          _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Custom reason</label></div><div class="col-6"><p class="ml-3">${ssrInterpolate(__props.source.eg_reason_custom)}</p></div></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "EG") {
        _push(`<div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Status</label></div><div class="col-6">`);
        if (__props.source.eg_status.includes("None")) {
          _push(`<p class="${ssrRenderClass([findStatus(__props.source.eg_status), "max-w-min p-1 ml-3"])}"> - </p>`);
        } else {
          _push(`<p class="${ssrRenderClass([findStatus(__props.source.eg_status), "max-w-min p-1 ml-3"])}">${ssrInterpolate(__props.source.eg_status)}</p>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "EG") {
        _push(`<div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">`);
        if (__props.source.eg_status == "None") {
          _push(`<button type="button" class="btn btn-orange">Apply</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MOP") {
        _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>`);
        if (__props.source.mop_status == "None") {
          _push(`<div class="col-6"><select name="reason" class="form-select btn-line-orange" id="reason_lc"><option selected hidden disabled> Choose Reason </option><option value="Permission">Permission</option><option value="Technical Error">Technical Error</option><option value="Official">Official</option><option value="Personal">Personal</option><option value="Others">Others</option></select></div>`);
        } else {
          _push(`<div class="col-6"><p class="ml-3">${ssrInterpolate(__props.source.mop_reason)}</p></div>`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MOP") {
        _push(`<div class="col-12">`);
        if (unref(useTimesheet).mopDetails.reason == "Others") {
          _push(`<div class="row"><div class="col-12"><textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control" placeholder="Reason here....">${ssrInterpolate(unref(useTimesheet).mopDetails.custom_reason)}</textarea></div></div>`);
        } else if (__props.source.mop_reason == "Others") {
          _push(`<div class="col-12"><div class="row"><div class="col-6"><label class="font-medium fs-6 text-gray-700 p-1">Custom reason</label></div><div class="col-6"><p class="ml-3">${ssrInterpolate(__props.source.mop_reason_custom)}</p></div></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MOP") {
        _push(`<div class="row">`);
        if (!__props.source.mop_status == "None") {
          _push(`<div class="col-6"><label class="font-medium fs-6 text-gray-700">Status</label></div>`);
        } else {
          _push(`<!---->`);
        }
        if (!__props.source.mop_status == "None") {
          _push(`<div class="col-6">`);
          if (__props.source.mop_status.includes("None")) {
            _push(`<p class="${ssrRenderClass([findStatus(__props.source.mop_status), "max-w-min p-1 ml-3"])}"> - </p>`);
          } else {
            _push(`<p class="${ssrRenderClass([findStatus(__props.source.mop_status), "max-w-min p-1 ml-3"])}">${ssrInterpolate(__props.source.mop_status)}</p>`);
          }
          _push(`</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.type == "MOP") {
        _push(`<div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize">`);
        if (__props.source.mop_status == "None") {
          _push(`<button type="button" class="btn btn-orange">Apply</button>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div>`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/ClassicAttendanceRegularizationSidebar.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const ClassicTimesheet_vue_vue_type_style_index_0_lang = "";
const _sfc_main$7 = {
  __name: "ClassicTimesheet",
  __ssrInlineRender: true,
  props: {
    singleAttendanceDay: {
      type: Object,
      required: true
    },
    sidebar: {
      type: Boolean,
      required: true
    }
  },
  setup(__props) {
    useLeaveService();
    const currentlySelectedCellRecord = ref({});
    const attendanceRegularizationDialog = ref(false);
    const useTimesheet = useAttendanceTimesheetMainStore();
    Service();
    const visibleRight = ref(false);
    const viewSelfieImage = (isSelected, selectedCells) => {
      useTimesheet.dialog_Selfie = true;
      if (isSelected == "checkin") {
        useTimesheet.selfieDetails = selectedCells;
      } else if (isSelected == "checkout") {
        useTimesheet.selfieDetails = selectedCells;
      } else {
        useTimesheet.selfieDetails = "";
      }
    };
    const findAttendanceStatus = (data) => {
      if (data.isAbsent) {
        if (data.absent_status.includes("Approved")) {
          return "border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5";
        } else if (data.absent_status.includes("Rejected")) {
          return "border-l-4 border-red-500 bg-red-50 text-red-600 font-medium fs-5";
        } else if (data.absent_status.includes("Pending")) {
          return "border-l-4 border-yellow-500 bg-yellow-50 text-yellow-600 font-medium fs-5";
        } else if (data.absent_status.includes("Revoked")) {
          return "border-l-4 border-gray-500 bg-gray-50 text-gray-600 font-medium fs-5";
        } else {
          return "border-l-4 border-red-500 bg-red-50 text-red-600 font-medium fs-5 ";
        }
      } else {
        if (data.lc_status) {
          return "border-l-4 border-yellow-500 bg-yellow-50 text-yellow-900 font-medium fs-5 rounded-lg";
        } else if (data.mip_status) {
          return "border-l-4 border-blue-500 bg-blue-50 text-blue-600 font-medium fs-5 rounded-lg";
        } else if (data.eg_status) {
          return "border-l-4 border-yellow-500 bg-yellow-50 text-yellow-900 font-medium fs-5 rounded-lg";
        } else if (data.mop_status) {
          return "border-l-4 border-blue-500 bg-blue-50 text-blue-600 font-medium fs-5 rounded-lg";
        } else {
          return "border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5 rounded-lg";
        }
      }
    };
    const icons = (isSelected, data) => {
      if (isSelected) {
        if (data == "Approved") {
          return "pi pi-check-circle text-green-600 font-semibold";
        } else if (data == "Pending") {
          return "pi pi-question-circle text-gray-600 font-semibold";
        } else if (data == "Rejected") {
          return "pi pi-times-circle text-red-600 font-semibold";
        } else {
          return "pi pi-exclamation-circle text-yellow-600 font-semibold";
        }
      } else {
        console.log("no data");
      }
    };
    const find = (data) => {
      if (data.isAbsent) {
        if (data.absent_status.includes("Approved")) {
          return data.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Approved" : `${data.leave_type} Approved`;
        } else if (data.absent_status.includes("Rejected")) {
          return data.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Rejected" : `${data.leave_type} Rejected`;
        } else if (data.absent_status.includes("Pending")) {
          return data.leave_type == "Sick Leave / Casual Leave" ? "Sl/CL Pending" : `${data.leave_type} Pending`;
        } else if (data.absent_status.includes("Revoked")) {
          return `${data.leave_type} Revoked`;
        } else {
          return "Absent";
        }
      } else {
        if (data.lc_status) {
          return "Late coming";
        } else if (data.mip_status) {
          return "Missed in punch";
        } else if (data.eg_status) {
          return "Early going";
        } else if (data.mop_status) {
          return "Missed out punch";
        } else {
          return "Present";
        }
      }
    };
    const findCheckInStatus = (type, data) => {
      if (type == "checkin") {
        if (data.isLC) {
          return "Late coming";
        } else if (data.isMIP) {
          return "Missed in punch";
        } else {
          return "-";
        }
      }
      if (type == "checkout") {
        if (data.isEG) {
          return "Early going";
        } else if (data.isMOP) {
          return "Missed out punch";
        } else {
          return "-";
        }
      }
      if (type == "checkInStatus") {
        if (data.lc_status == "None" || data.lc_status == "None") {
          return "Not Applied";
        } else if (data.lc_status) {
          return data.lc_status;
        } else if (data.mip_status) {
          return data.mip_status;
        } else {
          return "-";
        }
      }
      if (type == "checkOutStatus") {
        if (data.eg_status == "None" || data.mop_status == "None") {
          return "Not Applied";
        } else if (data.eg_status) {
          return data.eg_status;
        } else if (data.mop_status) {
          return data.mop_status;
        } else {
          return "-";
        }
      }
    };
    const findAbsentStatus = (data) => {
      if (data.includes("Approved")) {
        return "bg-green-50";
      } else if (data.includes("Pending")) {
        return "bg-yellow-50";
      } else if (data.includes("Rejected")) {
        return "bg-red-50";
      } else if (data.includes("Revoked")) {
        return "bg-slate-50";
      }
    };
    function capitalizeFLetter(name) {
      let result = name.charAt(0).toUpperCase() + name.slice(1);
      return result;
    }
    const calendarStore = useCalendarStore();
    calendarStore.$subscribe((mutation, state) => {
      getDaysInMonth();
      getFirstDayOfMonth();
    });
    const daysOfTheWeek = {
      1: "Sunday",
      2: "Monday",
      3: "Tuesday",
      4: "Wednesday",
      5: "Thursday",
      6: "Friday",
      7: "Saturday"
    };
    const daysInCurrentMonth = ref(0);
    const firstDayOfCurrentMonth = ref(0);
    const lastEmptyCells = ref(0);
    const getDaysInMonth = () => {
      daysInCurrentMonth.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth + 1,
        0
      ).getDate();
    };
    const getFirstDayOfMonth = () => {
      firstDayOfCurrentMonth.value = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        1
      ).getDay();
    };
    const lastCalendarCells = () => {
      let totalGrid = firstDayOfCurrentMonth.value <= 5 ? 35 : 42;
      lastEmptyCells.value = totalGrid - daysInCurrentMonth.value - firstDayOfCurrentMonth.value;
    };
    const isToday = (day) => {
      let today = new Date();
      if (calendarStore.getYear == today.getFullYear() && calendarStore.getMonth == today.getMonth() && day == today.getDate())
        return true;
      return false;
    };
    const isWeekEndDays = (day) => {
      var dayValue = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        day
      ).getDay();
      if (dayValue == 0) {
        return true;
      } else {
        return false;
      }
    };
    const isFutureDate = (today) => {
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate());
      var dayValue = new Date(
        calendarStore.getYear,
        calendarStore.getMonth,
        today
      );
      if (tomorrow > dayValue) {
        return true;
      } else {
        return false;
      }
    };
    const getSession = (time) => {
      let timeFormat = time == null ? "--:--:--" : moment(
        time,
        ["HH:mm"]
      ).format("h:mm a");
      return timeFormat;
    };
    const isNumber = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[0-9:]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const isEventToday = (day, startdate) => {
      if (calendarStore.getYear == startdate.substring(0, 4) && calendarStore.getMonth + 1 == startdate.substring(5, 7) && day == startdate.substring(8, 10))
        return true;
      return false;
    };
    const currentMonthsingleAttendanceDay = (day, singleAttendanceDay) => {
      if (!singleAttendanceDay.length)
        return [];
      let todaysEvent = [];
      singleAttendanceDay.forEach((event) => {
        if (isEventToday(day, event.date)) {
          todaysEvent.push(event);
        }
      });
      return todaysEvent;
    };
    onMounted(() => {
      getDaysInMonth();
      getFirstDayOfMonth();
      lastCalendarCells();
    });
    onUpdated(() => {
      getFirstDayOfMonth();
      lastCalendarCells();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Sidebar = resolveComponent("Sidebar");
      const _component_Accordion = resolveComponent("Accordion");
      const _component_AccordionTab = resolveComponent("AccordionTab");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Sidebar, {
        visible: visibleRight.value,
        "onUpdate:visible": ($event) => visibleRight.value = $event,
        position: "right",
        class: "w-full md:w-2rem lg:w-30rem"
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<p class="absolute left-0 mx-4 font-semibold fs-5"${_scopeId}>Attendance Reports</p>`);
          } else {
            return [
              createVNode("p", { class: "absolute left-0 mx-4 font-semibold fs-5" }, "Attendance Reports")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            if (currentlySelectedCellRecord.value.isAbsent) {
              _push2(`<div${_scopeId}>`);
              if (currentlySelectedCellRecord.value.absent_reg_status == "None") {
                _push2(`<div${_scopeId}><div class="rounded-lg bg-red-50 p-3 my-3"${_scopeId}><p class="text-center font-semibold fs-6"${_scopeId}>Absent</p><div class="flex justify-center gap-x-20 my-3"${_scopeId}><a class="text-left text-blue-500 underline font-semibold fs-6 cursor-pointer" href="/attendance-leave"${_scopeId}>Apply leave</a><a class="text-right text-blue-500 underline font-semibold fs-6 cursor-pointer"${_scopeId}>Regularize</a></div></div>`);
                if (attendanceRegularizationDialog.value) {
                  _push2(`<div class="my-2 bg-orange-50 rounded-lg p-3 py-4 transition-all duration-700"${_scopeId}><div class="grid grid-cols-2"${_scopeId}><div class=""${_scopeId}><label class="font-semibold fs-6 text-gray-700"${_scopeId}>Date</label></div><div class=""${_scopeId}><span class="text-ash-medium fs-15" id="current_date"${_scopeId}>${ssrInterpolate(currentlySelectedCellRecord.value.date)}</span><input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date" id="attendance_date"${_scopeId}></div></div><div class="grid grid-cols-2 my-4"${_scopeId}><div class=""${_scopeId}><label class="font-semibold fs-6 text-gray-700"${_scopeId}>Check In Time</label></div><div class=""${_scopeId}><input placeholder="format-09:30:00" type="time" class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""${ssrRenderAttr("value", unref(useTimesheet).absentRegularizationDetails.start_time)}${_scopeId}></div></div><div class="grid grid-cols-2"${_scopeId}><div class=""${_scopeId}><label class="font-semibold fs-6 text-gray-700"${_scopeId}>Check Out Time</label></div><div class=""${_scopeId}><input placeholder="format-09:30:00" type="time" class="border-1 p-1.5 rounded-lg border-gray-400 w-full" name="" id=""${ssrRenderAttr("value", unref(useTimesheet).absentRegularizationDetails.end_time)}${_scopeId}></div></div><div class="grid grid-cols-2 my-4"${_scopeId}><div class=""${_scopeId}><label class="font-semibold fs-6 text-gray-700"${_scopeId}>Reason</label></div><div${_scopeId}><select name="reason" class="form-select btn-line-orange w-full" id="reason_lc"${_scopeId}><option selected hidden disabled${_scopeId}> Choose Reason </option><option value="Permission"${_scopeId}>Permission</option><option value="Technical Error"${_scopeId}>Technical Error</option><option value="Technical Error"${_scopeId}>Official</option><option value="Technical Error"${_scopeId}>Personal</option><option value="Others"${_scopeId}>Others</option></select></div></div>`);
                  if (unref(useTimesheet).absentRegularizationDetails.reason == "Others") {
                    _push2(`<div class="col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-12"${_scopeId}><textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control" placeholder="Reason here...."${_scopeId}>${ssrInterpolate(unref(useTimesheet).absentRegularizationDetails.custom_reason)}</textarea></div></div></div>`);
                  } else {
                    _push2(`<!---->`);
                  }
                  _push2(`<div class="py-2 border-0 modal-footer" id="div_btn_applyRegularize"${_scopeId}><button type="button" class="btn btn-orange"${_scopeId}>Apply</button></div></div>`);
                } else {
                  _push2(`<!---->`);
                }
                _push2(`</div>`);
              } else {
                _push2(`<div class="${ssrRenderClass([findAbsentStatus(currentlySelectedCellRecord.value.absent_reg_status), "p-3 rounded-lg my-3"])}"${_scopeId}> Absent Regularization applied successful <i class="${ssrRenderClass([icons(true, currentlySelectedCellRecord.value.absent_reg_status), "py-auto"])}" style="${ssrRenderStyle({ "font-size": "1.2rem" })}"${_scopeId}></i></div>`);
              }
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
            if (!currentlySelectedCellRecord.value.isAbsent) {
              _push2(`<div class="rounded-lg bg-orange-50 p-3"${_scopeId}><p class="font-sans font-bold fs-6"${_scopeId}>Check-in</p><div class="my-2"${_scopeId}><div class="flex my-1 justify-center"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>In Time</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(currentlySelectedCellRecord.value.checkin_time)}</p></div><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Check In Mode</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(capitalizeFLetter(currentlySelectedCellRecord.value.attendance_mode_checkin))} `);
              if (currentlySelectedCellRecord.value.attendance_mode_checkin == "mobile") {
                _push2(`<i class="fa fa-picture-o fs-6 cursor-pointer animate-pulse" aria-hidden="true"${_scopeId}></i>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</p></div><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Check In Status</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(capitalizeFLetter(findCheckInStatus("checkin", currentlySelectedCellRecord.value)))}</p></div><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Approval Status</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(findCheckInStatus("checkInStatus", currentlySelectedCellRecord.value))}</p></div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (!currentlySelectedCellRecord.value.isAbsent) {
              _push2(`<div class="rounded-lg bg-blue-50 p-3 my-3"${_scopeId}><p class="font-sans font-bold fs-6"${_scopeId}>Check-out</p><div class="my-2"${_scopeId}><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Out Time</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(currentlySelectedCellRecord.value.checkout_time)}</p></div><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Check Out Mode</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(capitalizeFLetter(currentlySelectedCellRecord.value.attendance_mode_checkout))} `);
              if (currentlySelectedCellRecord.value.attendance_mode_checkout == "mobile") {
                _push2(`<i class="fa fa-picture-o fs-6 cursor-pointer animate-pulse" aria-hidden="true"${_scopeId}></i>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</p></div><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Check Out Status</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(findCheckInStatus("checkout", currentlySelectedCellRecord.value))}</p></div><div class="flex my-1"${_scopeId}><p class="font-medium fs-6 text-gray-700"${_scopeId}>Approval Status</p><p class="font-semibold fs-6"${_scopeId}>:</p><p class="font-semibold fs-6"${_scopeId}>${ssrInterpolate(findCheckInStatus("checkOutStatus", currentlySelectedCellRecord.value))}</p></div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (currentlySelectedCellRecord.value.isLC || currentlySelectedCellRecord.value.isMIP || currentlySelectedCellRecord.value.isEG || currentlySelectedCellRecord.value.isMOP) {
              _push2(`<p class="font-bold mx-2 my-3"${_scopeId}> Attendance regularization</p>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(ssrRenderComponent(_component_Accordion, null, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (currentlySelectedCellRecord.value.isLC) {
                    _push3(ssrRenderComponent(_component_AccordionTab, null, {
                      header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="grid grid-cols-2 w-full"${_scopeId3}><span class="w-10/12 px-2 font-semibold fs-6 my-auto"${_scopeId3}>Late Coming</span><p class="text-right px-4"${_scopeId3}><i class="${ssrRenderClass([icons(currentlySelectedCellRecord.value.isLC, currentlySelectedCellRecord.value.lc_status), "py-auto"])}" style="${ssrRenderStyle({ "font-size": "1.2rem" })}"${_scopeId3}></i></p></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                              createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Late Coming"),
                              createVNode("p", { class: "text-right px-4" }, [
                                createVNode("i", {
                                  class: [icons(currentlySelectedCellRecord.value.isLC, currentlySelectedCellRecord.value.lc_status), "py-auto"],
                                  style: { "font-size": "1.2rem" }
                                }, null, 2)
                              ])
                            ])
                          ];
                        }
                      }),
                      default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(ssrRenderComponent(_sfc_main$8, {
                            source: unref(useTimesheet).lcDetails,
                            type: "LC"
                          }, null, _parent4, _scopeId3));
                        } else {
                          return [
                            createVNode(_sfc_main$8, {
                              source: unref(useTimesheet).lcDetails,
                              type: "LC"
                            }, null, 8, ["source"])
                          ];
                        }
                      }),
                      _: 1
                    }, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (currentlySelectedCellRecord.value.isMIP) {
                    _push3(ssrRenderComponent(_component_AccordionTab, null, {
                      header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="grid grid-cols-2 w-full"${_scopeId3}><span class="w-10/12 px-2 font-semibold fs-6 my-auto"${_scopeId3}>Missed in punch</span><p class="text-right px-4"${_scopeId3}><i class="${ssrRenderClass([icons(currentlySelectedCellRecord.value.isMIP, currentlySelectedCellRecord.value.mip_status), "py-auto"])}" style="${ssrRenderStyle({ "font-size": "1.2rem" })}"${_scopeId3}></i></p></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                              createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Missed in punch"),
                              createVNode("p", { class: "text-right px-4" }, [
                                createVNode("i", {
                                  class: [icons(currentlySelectedCellRecord.value.isMIP, currentlySelectedCellRecord.value.mip_status), "py-auto"],
                                  style: { "font-size": "1.2rem" }
                                }, null, 2)
                              ])
                            ])
                          ];
                        }
                      }),
                      default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(ssrRenderComponent(_sfc_main$8, {
                            source: unref(useTimesheet).mipDetails,
                            type: "MIP"
                          }, null, _parent4, _scopeId3));
                        } else {
                          return [
                            createVNode(_sfc_main$8, {
                              source: unref(useTimesheet).mipDetails,
                              type: "MIP"
                            }, null, 8, ["source"])
                          ];
                        }
                      }),
                      _: 1
                    }, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (currentlySelectedCellRecord.value.isEG) {
                    _push3(ssrRenderComponent(_component_AccordionTab, null, {
                      header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="grid grid-cols-2 w-full"${_scopeId3}><span class="w-10/12 px-2 font-semibold fs-6 my-auto"${_scopeId3}>Early going</span><p class="text-right px-4"${_scopeId3}><i class="${ssrRenderClass([icons(currentlySelectedCellRecord.value.isEG, currentlySelectedCellRecord.value.eg_status), "py-auto"])}" style="${ssrRenderStyle({ "font-size": "1.2rem" })}"${_scopeId3}></i></p></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                              createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Early going"),
                              createVNode("p", { class: "text-right px-4" }, [
                                createVNode("i", {
                                  class: [icons(currentlySelectedCellRecord.value.isEG, currentlySelectedCellRecord.value.eg_status), "py-auto"],
                                  style: { "font-size": "1.2rem" }
                                }, null, 2)
                              ])
                            ])
                          ];
                        }
                      }),
                      default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(ssrRenderComponent(_sfc_main$8, {
                            source: unref(useTimesheet).egDetails,
                            type: "EG"
                          }, null, _parent4, _scopeId3));
                        } else {
                          return [
                            createVNode(_sfc_main$8, {
                              source: unref(useTimesheet).egDetails,
                              type: "EG"
                            }, null, 8, ["source"])
                          ];
                        }
                      }),
                      _: 1
                    }, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                  if (currentlySelectedCellRecord.value.isMOP) {
                    _push3(ssrRenderComponent(_component_AccordionTab, null, {
                      header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<div class="grid grid-cols-2 w-full"${_scopeId3}><span class="w-10/12 px-2 font-semibold fs-6 my-auto"${_scopeId3}>Missed out punch</span><p class="text-right px-4"${_scopeId3}><i class="${ssrRenderClass([icons(currentlySelectedCellRecord.value.isMOP, currentlySelectedCellRecord.value.mop_status), "py-auto"])}" style="${ssrRenderStyle({ "font-size": "1.2rem" })}"${_scopeId3}></i></p></div>`);
                        } else {
                          return [
                            createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                              createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Missed out punch"),
                              createVNode("p", { class: "text-right px-4" }, [
                                createVNode("i", {
                                  class: [icons(currentlySelectedCellRecord.value.isMOP, currentlySelectedCellRecord.value.mop_status), "py-auto"],
                                  style: { "font-size": "1.2rem" }
                                }, null, 2)
                              ])
                            ])
                          ];
                        }
                      }),
                      default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(ssrRenderComponent(_sfc_main$8, {
                            source: unref(useTimesheet).mopDetails,
                            type: "MOP"
                          }, null, _parent4, _scopeId3));
                        } else {
                          return [
                            createVNode(_sfc_main$8, {
                              source: unref(useTimesheet).mopDetails,
                              type: "MOP"
                            }, null, 8, ["source"])
                          ];
                        }
                      }),
                      _: 1
                    }, _parent3, _scopeId2));
                  } else {
                    _push3(`<!---->`);
                  }
                } else {
                  return [
                    currentlySelectedCellRecord.value.isLC ? (openBlock(), createBlock(_component_AccordionTab, { key: 0 }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                          createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Late Coming"),
                          createVNode("p", { class: "text-right px-4" }, [
                            createVNode("i", {
                              class: [icons(currentlySelectedCellRecord.value.isLC, currentlySelectedCellRecord.value.lc_status), "py-auto"],
                              style: { "font-size": "1.2rem" }
                            }, null, 2)
                          ])
                        ])
                      ]),
                      default: withCtx(() => [
                        createVNode(_sfc_main$8, {
                          source: unref(useTimesheet).lcDetails,
                          type: "LC"
                        }, null, 8, ["source"])
                      ]),
                      _: 1
                    })) : createCommentVNode("", true),
                    currentlySelectedCellRecord.value.isMIP ? (openBlock(), createBlock(_component_AccordionTab, { key: 1 }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                          createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Missed in punch"),
                          createVNode("p", { class: "text-right px-4" }, [
                            createVNode("i", {
                              class: [icons(currentlySelectedCellRecord.value.isMIP, currentlySelectedCellRecord.value.mip_status), "py-auto"],
                              style: { "font-size": "1.2rem" }
                            }, null, 2)
                          ])
                        ])
                      ]),
                      default: withCtx(() => [
                        createVNode(_sfc_main$8, {
                          source: unref(useTimesheet).mipDetails,
                          type: "MIP"
                        }, null, 8, ["source"])
                      ]),
                      _: 1
                    })) : createCommentVNode("", true),
                    currentlySelectedCellRecord.value.isEG ? (openBlock(), createBlock(_component_AccordionTab, { key: 2 }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                          createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Early going"),
                          createVNode("p", { class: "text-right px-4" }, [
                            createVNode("i", {
                              class: [icons(currentlySelectedCellRecord.value.isEG, currentlySelectedCellRecord.value.eg_status), "py-auto"],
                              style: { "font-size": "1.2rem" }
                            }, null, 2)
                          ])
                        ])
                      ]),
                      default: withCtx(() => [
                        createVNode(_sfc_main$8, {
                          source: unref(useTimesheet).egDetails,
                          type: "EG"
                        }, null, 8, ["source"])
                      ]),
                      _: 1
                    })) : createCommentVNode("", true),
                    currentlySelectedCellRecord.value.isMOP ? (openBlock(), createBlock(_component_AccordionTab, { key: 3 }, {
                      header: withCtx(() => [
                        createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                          createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Missed out punch"),
                          createVNode("p", { class: "text-right px-4" }, [
                            createVNode("i", {
                              class: [icons(currentlySelectedCellRecord.value.isMOP, currentlySelectedCellRecord.value.mop_status), "py-auto"],
                              style: { "font-size": "1.2rem" }
                            }, null, 2)
                          ])
                        ])
                      ]),
                      default: withCtx(() => [
                        createVNode(_sfc_main$8, {
                          source: unref(useTimesheet).mopDetails,
                          type: "MOP"
                        }, null, 8, ["source"])
                      ]),
                      _: 1
                    })) : createCommentVNode("", true)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              currentlySelectedCellRecord.value.isAbsent ? (openBlock(), createBlock("div", { key: 0 }, [
                currentlySelectedCellRecord.value.absent_reg_status == "None" ? (openBlock(), createBlock("div", { key: 0 }, [
                  createVNode("div", { class: "rounded-lg bg-red-50 p-3 my-3" }, [
                    createVNode("p", { class: "text-center font-semibold fs-6" }, "Absent"),
                    createVNode("div", { class: "flex justify-center gap-x-20 my-3" }, [
                      createVNode("a", {
                        class: "text-left text-blue-500 underline font-semibold fs-6 cursor-pointer",
                        href: "/attendance-leave"
                      }, "Apply leave"),
                      createVNode("a", {
                        class: "text-right text-blue-500 underline font-semibold fs-6 cursor-pointer",
                        onClick: ($event) => attendanceRegularizationDialog.value = true
                      }, "Regularize", 8, ["onClick"])
                    ])
                  ]),
                  attendanceRegularizationDialog.value ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "my-2 bg-orange-50 rounded-lg p-3 py-4 transition-all duration-700"
                  }, [
                    createVNode("div", { class: "grid grid-cols-2" }, [
                      createVNode("div", { class: "" }, [
                        createVNode("label", { class: "font-semibold fs-6 text-gray-700" }, "Date")
                      ]),
                      createVNode("div", { class: "" }, [
                        createVNode("span", {
                          class: "text-ash-medium fs-15",
                          id: "current_date"
                        }, toDisplayString(currentlySelectedCellRecord.value.date), 1),
                        createVNode("input", {
                          type: "hidden",
                          class: "text-ash-medium form-control fs-15",
                          name: "attendance_date",
                          id: "attendance_date"
                        })
                      ])
                    ]),
                    createVNode("div", { class: "grid grid-cols-2 my-4" }, [
                      createVNode("div", { class: "" }, [
                        createVNode("label", { class: "font-semibold fs-6 text-gray-700" }, "Check In Time")
                      ]),
                      createVNode("div", { class: "" }, [
                        withDirectives(createVNode("input", {
                          placeholder: "format-09:30:00",
                          type: "time",
                          onKeypress: ($event) => isNumber($event),
                          class: "border-1 p-1.5 rounded-lg border-gray-400 w-full",
                          name: "",
                          id: "",
                          "onUpdate:modelValue": ($event) => unref(useTimesheet).absentRegularizationDetails.start_time = $event
                        }, null, 40, ["onKeypress", "onUpdate:modelValue"]), [
                          [vModelText, unref(useTimesheet).absentRegularizationDetails.start_time]
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "grid grid-cols-2" }, [
                      createVNode("div", { class: "" }, [
                        createVNode("label", { class: "font-semibold fs-6 text-gray-700" }, "Check Out Time")
                      ]),
                      createVNode("div", { class: "" }, [
                        withDirectives(createVNode("input", {
                          placeholder: "format-09:30:00",
                          type: "time",
                          onKeypress: ($event) => isNumber($event),
                          class: "border-1 p-1.5 rounded-lg border-gray-400 w-full",
                          name: "",
                          id: "",
                          "onUpdate:modelValue": ($event) => unref(useTimesheet).absentRegularizationDetails.end_time = $event
                        }, null, 40, ["onKeypress", "onUpdate:modelValue"]), [
                          [vModelText, unref(useTimesheet).absentRegularizationDetails.end_time]
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "grid grid-cols-2 my-4" }, [
                      createVNode("div", { class: "" }, [
                        createVNode("label", { class: "font-semibold fs-6 text-gray-700" }, "Reason")
                      ]),
                      createVNode("div", null, [
                        withDirectives(createVNode("select", {
                          name: "reason",
                          class: "form-select btn-line-orange w-full",
                          id: "reason_lc",
                          "onUpdate:modelValue": ($event) => unref(useTimesheet).absentRegularizationDetails.reason = $event
                        }, [
                          createVNode("option", {
                            selected: "",
                            hidden: "",
                            disabled: ""
                          }, " Choose Reason "),
                          createVNode("option", { value: "Permission" }, "Permission"),
                          createVNode("option", { value: "Technical Error" }, "Technical Error"),
                          createVNode("option", { value: "Technical Error" }, "Official"),
                          createVNode("option", { value: "Technical Error" }, "Personal"),
                          createVNode("option", { value: "Others" }, "Others")
                        ], 8, ["onUpdate:modelValue"]), [
                          [vModelSelect, unref(useTimesheet).absentRegularizationDetails.reason]
                        ])
                      ])
                    ]),
                    unref(useTimesheet).absentRegularizationDetails.reason == "Others" ? (openBlock(), createBlock("div", {
                      key: 0,
                      class: "col-12"
                    }, [
                      createVNode("div", { class: "row" }, [
                        createVNode("div", { class: "col-12" }, [
                          withDirectives(createVNode("textarea", {
                            name: "custom_reason",
                            id: "reasonBox",
                            cols: "30",
                            rows: "3",
                            class: "form-control",
                            placeholder: "Reason here....",
                            "onUpdate:modelValue": ($event) => unref(useTimesheet).absentRegularizationDetails.custom_reason = $event
                          }, null, 8, ["onUpdate:modelValue"]), [
                            [vModelText, unref(useTimesheet).absentRegularizationDetails.custom_reason]
                          ])
                        ])
                      ])
                    ])) : createCommentVNode("", true),
                    createVNode("div", {
                      class: "py-2 border-0 modal-footer",
                      id: "div_btn_applyRegularize"
                    }, [
                      createVNode("button", {
                        type: "button",
                        class: "btn btn-orange",
                        onClick: unref(useTimesheet).applyAbsentRegularization
                      }, "Apply", 8, ["onClick"])
                    ])
                  ])) : createCommentVNode("", true)
                ])) : (openBlock(), createBlock("div", {
                  key: 1,
                  class: ["p-3 rounded-lg my-3", findAbsentStatus(currentlySelectedCellRecord.value.absent_reg_status)]
                }, [
                  createTextVNode(" Absent Regularization applied successful "),
                  createVNode("i", {
                    class: [icons(true, currentlySelectedCellRecord.value.absent_reg_status), "py-auto"],
                    style: { "font-size": "1.2rem" }
                  }, null, 2)
                ], 2))
              ])) : createCommentVNode("", true),
              !currentlySelectedCellRecord.value.isAbsent ? (openBlock(), createBlock("div", {
                key: 1,
                class: "rounded-lg bg-orange-50 p-3"
              }, [
                createVNode("p", { class: "font-sans font-bold fs-6" }, "Check-in"),
                createVNode("div", { class: "my-2" }, [
                  createVNode("div", { class: "flex my-1 justify-center" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "In Time"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(currentlySelectedCellRecord.value.checkin_time), 1)
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Check In Mode"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, [
                      createTextVNode(toDisplayString(capitalizeFLetter(currentlySelectedCellRecord.value.attendance_mode_checkin)) + " ", 1),
                      currentlySelectedCellRecord.value.attendance_mode_checkin == "mobile" ? (openBlock(), createBlock("i", {
                        key: 0,
                        class: "fa fa-picture-o fs-6 cursor-pointer animate-pulse",
                        onClick: ($event) => viewSelfieImage("checkin", currentlySelectedCellRecord.value.selfie_checkin),
                        "aria-hidden": "true"
                      }, null, 8, ["onClick"])) : createCommentVNode("", true)
                    ])
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Check In Status"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(capitalizeFLetter(findCheckInStatus("checkin", currentlySelectedCellRecord.value))), 1)
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Approval Status"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(findCheckInStatus("checkInStatus", currentlySelectedCellRecord.value)), 1)
                  ])
                ])
              ])) : createCommentVNode("", true),
              !currentlySelectedCellRecord.value.isAbsent ? (openBlock(), createBlock("div", {
                key: 2,
                class: "rounded-lg bg-blue-50 p-3 my-3"
              }, [
                createVNode("p", { class: "font-sans font-bold fs-6" }, "Check-out"),
                createVNode("div", { class: "my-2" }, [
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Out Time"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(currentlySelectedCellRecord.value.checkout_time), 1)
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Check Out Mode"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, [
                      createTextVNode(toDisplayString(capitalizeFLetter(currentlySelectedCellRecord.value.attendance_mode_checkout)) + " ", 1),
                      currentlySelectedCellRecord.value.attendance_mode_checkout == "mobile" ? (openBlock(), createBlock("i", {
                        key: 0,
                        class: "fa fa-picture-o fs-6 cursor-pointer animate-pulse",
                        "aria-hidden": "true",
                        onClick: ($event) => viewSelfieImage("checkout", currentlySelectedCellRecord.value.selfie_checkout)
                      }, null, 8, ["onClick"])) : createCommentVNode("", true)
                    ])
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Check Out Status"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(findCheckInStatus("checkout", currentlySelectedCellRecord.value)), 1)
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("p", { class: "font-medium fs-6 text-gray-700" }, "Approval Status"),
                    createVNode("p", { class: "font-semibold fs-6" }, ":"),
                    createVNode("p", { class: "font-semibold fs-6" }, toDisplayString(findCheckInStatus("checkOutStatus", currentlySelectedCellRecord.value)), 1)
                  ])
                ])
              ])) : createCommentVNode("", true),
              currentlySelectedCellRecord.value.isLC || currentlySelectedCellRecord.value.isMIP || currentlySelectedCellRecord.value.isEG || currentlySelectedCellRecord.value.isMOP ? (openBlock(), createBlock("p", {
                key: 3,
                class: "font-bold mx-2 my-3"
              }, " Attendance regularization")) : createCommentVNode("", true),
              createVNode(_component_Accordion, null, {
                default: withCtx(() => [
                  currentlySelectedCellRecord.value.isLC ? (openBlock(), createBlock(_component_AccordionTab, { key: 0 }, {
                    header: withCtx(() => [
                      createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                        createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Late Coming"),
                        createVNode("p", { class: "text-right px-4" }, [
                          createVNode("i", {
                            class: [icons(currentlySelectedCellRecord.value.isLC, currentlySelectedCellRecord.value.lc_status), "py-auto"],
                            style: { "font-size": "1.2rem" }
                          }, null, 2)
                        ])
                      ])
                    ]),
                    default: withCtx(() => [
                      createVNode(_sfc_main$8, {
                        source: unref(useTimesheet).lcDetails,
                        type: "LC"
                      }, null, 8, ["source"])
                    ]),
                    _: 1
                  })) : createCommentVNode("", true),
                  currentlySelectedCellRecord.value.isMIP ? (openBlock(), createBlock(_component_AccordionTab, { key: 1 }, {
                    header: withCtx(() => [
                      createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                        createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Missed in punch"),
                        createVNode("p", { class: "text-right px-4" }, [
                          createVNode("i", {
                            class: [icons(currentlySelectedCellRecord.value.isMIP, currentlySelectedCellRecord.value.mip_status), "py-auto"],
                            style: { "font-size": "1.2rem" }
                          }, null, 2)
                        ])
                      ])
                    ]),
                    default: withCtx(() => [
                      createVNode(_sfc_main$8, {
                        source: unref(useTimesheet).mipDetails,
                        type: "MIP"
                      }, null, 8, ["source"])
                    ]),
                    _: 1
                  })) : createCommentVNode("", true),
                  currentlySelectedCellRecord.value.isEG ? (openBlock(), createBlock(_component_AccordionTab, { key: 2 }, {
                    header: withCtx(() => [
                      createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                        createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Early going"),
                        createVNode("p", { class: "text-right px-4" }, [
                          createVNode("i", {
                            class: [icons(currentlySelectedCellRecord.value.isEG, currentlySelectedCellRecord.value.eg_status), "py-auto"],
                            style: { "font-size": "1.2rem" }
                          }, null, 2)
                        ])
                      ])
                    ]),
                    default: withCtx(() => [
                      createVNode(_sfc_main$8, {
                        source: unref(useTimesheet).egDetails,
                        type: "EG"
                      }, null, 8, ["source"])
                    ]),
                    _: 1
                  })) : createCommentVNode("", true),
                  currentlySelectedCellRecord.value.isMOP ? (openBlock(), createBlock(_component_AccordionTab, { key: 3 }, {
                    header: withCtx(() => [
                      createVNode("div", { class: "grid grid-cols-2 w-full" }, [
                        createVNode("span", { class: "w-10/12 px-2 font-semibold fs-6 my-auto" }, "Missed out punch"),
                        createVNode("p", { class: "text-right px-4" }, [
                          createVNode("i", {
                            class: [icons(currentlySelectedCellRecord.value.isMOP, currentlySelectedCellRecord.value.mop_status), "py-auto"],
                            style: { "font-size": "1.2rem" }
                          }, null, 2)
                        ])
                      ])
                    ]),
                    default: withCtx(() => [
                      createVNode(_sfc_main$8, {
                        source: unref(useTimesheet).mopDetails,
                        type: "MOP"
                      }, null, 8, ["source"])
                    ]),
                    _: 1
                  })) : createCommentVNode("", true)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      if (__props.singleAttendanceDay) {
        _push(`<div class="min-h-full min-w-fit text-gray-800 card"><div class="min-w-max border grid grid-cols-7 card-body">`);
        _push(ssrRenderComponent(_sfc_main$a, null, null, _parent));
        _push(`<!--[-->`);
        ssrRenderList(daysOfTheWeek, (day) => {
          _push(`<div class="text-center text-sm md:text-base lg:text-lg font-semibold border py-2">${ssrInterpolate(day.substring(0, 3))}</div>`);
        });
        _push(`<!--]-->`);
        if (firstDayOfCurrentMonth.value > 0) {
          _push(`<!--[-->`);
          ssrRenderList(firstDayOfCurrentMonth.value, (day) => {
            _push(`<div class="w-full border opacity-50"></div>`);
          });
          _push(`<!--]-->`);
        } else {
          _push(`<!---->`);
        }
        _push(`<!--[-->`);
        ssrRenderList(daysInCurrentMonth.value, (day) => {
          _push(`<div class="${ssrRenderClass([{
            "bg-slate-50 text-gray-600 font-medium": isToday(day),
            "hover:bg-gray-100 hover:text-gray-700": !isToday(day),
            "bg-gray-200": isWeekEndDays(day)
          }, "h-16 py-3 shadow-sm md:h-36 w-full border align-top"])}">`);
          if (currentMonthsingleAttendanceDay(day, __props.singleAttendanceDay).length) {
            _push(`<!--[-->`);
            ssrRenderList(currentMonthsingleAttendanceDay(day, __props.singleAttendanceDay), (singleAttendanceDay) => {
              _push(`<div class="hidden md:block"><div><div class="w-full h-full text-xs md:text-sm lg:text-base text-left transition-colors font-semibold relative"><div class="flex justify-center"><p class="mx-3 font-semibold text-sm">${ssrInterpolate(unref(dayjs)(singleAttendanceDay.date).format("D"))}</p></div>`);
              if (isWeekEndDays(day)) {
                _push(`<div class="flex justify-center items-center">`);
                if (singleAttendanceDay.isAbsent) {
                  _push(`<p class="px-auto font-semibold fs-6 text-black text-center py-5">Week Off </p>`);
                } else {
                  _push(`<!---->`);
                }
                _push(`</div>`);
              } else {
                _push(`<div class="${ssrRenderClass([[find(singleAttendanceDay).length > 20 ? "whitespace-normal" : "whitespace-nowrap"], "py-1 flex space-x-1 items-center overflow-hidden hover: cursor-pointer rounded-sm hp"])}">`);
                if (isFutureDate(day)) {
                  _push(`<div style="${ssrRenderStyle({ "max-width": "140px" })}" class="${ssrRenderClass([findAttendanceStatus(singleAttendanceDay), "w-full my-3 p-2.5 rounded-sm mr-3 flex font-semibold"])}"><p class="font-sans fs-6 mx-2">${ssrInterpolate(find(singleAttendanceDay))}`);
                  if (singleAttendanceDay.isMOP) {
                    _push(`<i class="${ssrRenderClass([icons(singleAttendanceDay.isMOP, singleAttendanceDay.mop_status), "px-1"])}" style="${ssrRenderStyle({ "font-size": "0.9rem" })}"></i>`);
                  } else if (singleAttendanceDay.isLC) {
                    _push(`<i class="${ssrRenderClass([icons(singleAttendanceDay.isLC, singleAttendanceDay.lc_status), "px-1"])}" style="${ssrRenderStyle({ "font-size": "0.9rem" })}"></i>`);
                  } else if (singleAttendanceDay.isEG) {
                    _push(`<i class="${ssrRenderClass([icons(singleAttendanceDay.isEG, singleAttendanceDay.eg_status), "px-1"])}" style="${ssrRenderStyle({ "font-size": "0.9rem" })}"></i>`);
                  } else if (singleAttendanceDay.isMIP) {
                    _push(`<i class="${ssrRenderClass([icons(singleAttendanceDay.isMIP, singleAttendanceDay.mip_status), "px-1"])}" style="${ssrRenderStyle({ "font-size": "0.9rem" })}"></i>`);
                  } else {
                    _push(`<!---->`);
                  }
                  _push(`</p></div>`);
                } else {
                  _push(`<!---->`);
                }
                _push(`</div>`);
              }
              if (!singleAttendanceDay.isAbsent) {
                _push(`<div class="hop transition p-2 ease-in-out delay-150 bg-white border rounded-lg absolute z-50"><div class="w-full my-3 p-2.5 rounded-sm mr-3 flex border-l-4 border-green-500 bg-green-50 text-green-600 font-medium fs-5"><i class="fa fa-arrow-down text-green-800 font-medium text-sm" style="${ssrRenderStyle({ "transform": "rotate(-45deg)" })}"></i><p class="text-green-800 font-sans font-semibold text-sm mx-1">${ssrInterpolate(getSession(singleAttendanceDay.checkin_time))}</p></div><div class="w-full my-3 p-2.5 rounded-sm mr-3 flex border-l-4 border-red-500 bg-red-50 text-red-600 font-medium fs-5"><i class="fa fa-arrow-down font-medium text-sm text-red-800" style="${ssrRenderStyle({ "transform": "rotate(230deg)" })}"></i><p class="text-red-800 font-sans font-semibold text-sm mx-1">${ssrInterpolate(getSession(singleAttendanceDay.checkout_time))}</p></div></div>`);
              } else {
                _push(`<!---->`);
              }
              _push(`</div></div></div>`);
            });
            _push(`<!--]-->`);
          } else {
            _push(`<!---->`);
          }
          _push(`</div>`);
        });
        _push(`<!--]-->`);
        if (lastEmptyCells.value > 0) {
          _push(`<!--[-->`);
          ssrRenderList(lastEmptyCells.value, (day) => {
            _push(`<div class="h-16 md:h-36 w-full border rounded-lg opacity-50"></div>`);
          });
          _push(`<!--]-->`);
        } else {
          _push(`<!---->`);
        }
        _push(`<div class="rounded-lg md:hidden col-span-7 flex justify-between items-center p-2"><div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 cursor-pointer transition-all"><path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"></path></svg></div><div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 cursor-pointer transition-all"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"></path></svg></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/ClassicTimesheet.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const _sfc_main$6 = {
  __name: "EmployeeList",
  __ssrInlineRender: true,
  props: {
    source: {
      type: Object,
      required: true
    },
    isTeam: {
      type: Boolean,
      required: true
    }
  },
  setup(__props) {
    const service = Service();
    useAttendanceTimesheetMainStore();
    const query = ref("");
    function globalSearch(keyword, list) {
      const searchResults = list.filter(
        (item) => item.name.toLowerCase().includes(keyword.toLowerCase())
      );
      return searchResults;
    }
    ref();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card overflow-y-scroll h-[100%]" }, _attrs))}><div class="card-body"><input type="text" name="" id=""${ssrRenderAttr("value", query.value)} class="border border-gray-300 p-1 w-full rounded-lg first-letter my-2" placeholder="Search Employees.."><!--[-->`);
      ssrRenderList(globalSearch(query.value, __props.source), (employee, index) => {
        _push(`<button class="list_employee_attendance p-3 px-1 flex hover:bg-gray-300 rounded-lg w-full focus:bg-gray-300"><div class="col-auto me-2">`);
        if (JSON.parse(employee.employee_avatar).type == "shortname") {
          _push(`<p class="${ssrRenderClass([unref(service).getBackgroundColor(index), "p-2 w-11 fs-6 font-semibold rounded-full text-white"])}">${ssrInterpolate(JSON.parse(employee.employee_avatar).data)}</p>`);
        } else {
          _push(`<img class="rounded-circle userActive-status profile-img" style="${ssrRenderStyle({ "height": "30px !important", "width": "30px !important" })}"${ssrRenderAttr("src", `data:image/png;base64,${JSON.parse(employee.employee_avatar).data}`)} srcset="" alt="">`);
        }
        _push(`</div><div class="user_content text-start"><p class="font-semibold text-sm text-capitalize">${ssrInterpolate(employee.name)}</p><p class="text-muted f-11 text-capitalize">${ssrInterpolate(employee.designation)}</p></div></button>`);
      });
      _push(`<!--]--></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/EmployeeList.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {
  __name: "MopRegularization",
  __ssrInlineRender: true,
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      _push(ssrRenderComponent(_component_Dialog, mergeProps({
        header: "Header",
        visible: unref(useTimesheet).dialog_Mop,
        "onUpdate:visible": ($event) => unref(useTimesheet).dialog_Mop = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "35vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5 modal-title"${_scopeId}> Attendance regularization</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5 modal-title"
                }, " Attendance regularization", 4)
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Date</label></div><div class="col-6"${_scopeId}><span class="text-ash-medium fs-15" id="current_date"${_scopeId}>${ssrInterpolate(unref(useTimesheet).mopDetails.date)}</span><input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date" id="attendance_date"${_scopeId}></div></div></div><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Regularize Timing as</label></div><div class="col-6"${_scopeId}> 6.30 PM </div></div></div>`);
            {
              _push2(`<!---->`);
            }
            if (unref(useTimesheet).mopDetails.reason) {
              _push2(`<div id="div_reason_noneditable"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Reason</label></div><div class="col-6"${_scopeId}>${ssrInterpolate(unref(useTimesheet).mopDetails.reason)}</div></div></div>`);
              if (unref(useTimesheet).mopDetails.mop_status) {
                _push2(`<div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Status</label></div><div class="col-6"${_scopeId}>`);
                if (unref(useTimesheet).mopDetails.mop_status.includes("Approved")) {
                  _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId}>Approved</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if (unref(useTimesheet).mopDetails.mop_status.includes("Pending")) {
                  _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Pending</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if (unref(useTimesheet).mopDetails.mop_status.includes("Rejected")) {
                  _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Rejected</span>`);
                } else {
                  _push2(`<!---->`);
                }
                _push2(`</div></div></div>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "row" }, [
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Date")
                    ]),
                    createVNode("div", { class: "col-6" }, [
                      createVNode("span", {
                        class: "text-ash-medium fs-15",
                        id: "current_date"
                      }, toDisplayString(unref(useTimesheet).mopDetails.date), 1),
                      createVNode("input", {
                        type: "hidden",
                        class: "text-ash-medium form-control fs-15",
                        name: "attendance_date",
                        id: "attendance_date"
                      })
                    ])
                  ])
                ]),
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Regularize Timing as")
                    ]),
                    createVNode("div", { class: "col-6" }, " 6.30 PM ")
                  ])
                ]),
                createCommentVNode("", true),
                unref(useTimesheet).mopDetails.reason ? (openBlock(), createBlock("div", {
                  key: 1,
                  id: "div_reason_noneditable"
                }, [
                  createVNode("div", { class: "mb-2 col-12" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Reason")
                      ]),
                      createVNode("div", { class: "col-6" }, toDisplayString(unref(useTimesheet).mopDetails.reason), 1)
                    ])
                  ]),
                  unref(useTimesheet).mopDetails.mop_status ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "mb-2 col-12"
                  }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Status")
                      ]),
                      createVNode("div", { class: "col-6" }, [
                        unref(useTimesheet).mopDetails.mop_status.includes("Approved") ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"
                        }, "Approved")) : createCommentVNode("", true),
                        unref(useTimesheet).mopDetails.mop_status.includes("Pending") ? (openBlock(), createBlock("span", {
                          key: 1,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Pending")) : createCommentVNode("", true),
                        unref(useTimesheet).mopDetails.mop_status.includes("Rejected") ? (openBlock(), createBlock("span", {
                          key: 2,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Rejected")) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true)
                ])) : createCommentVNode("", true)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/MopRegularization.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {
  __name: "MipRegularization",
  __ssrInlineRender: true,
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      _push(ssrRenderComponent(_component_Dialog, mergeProps({
        header: "Header",
        visible: unref(useTimesheet).dialog_Mip,
        "onUpdate:visible": ($event) => unref(useTimesheet).dialog_Mip = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "35vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5 modal-title"${_scopeId}> Attendance regularization</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5 modal-title"
                }, " Attendance regularization", 4)
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Date</label></div><div class="col-6"${_scopeId}><span class="text-ash-medium fs-15" id="current_date"${_scopeId}>${ssrInterpolate(unref(useTimesheet).mipDetails.date)}</span><input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date" id="attendance_date"${_scopeId}></div></div></div><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Regularize Timing as</label></div><div class="col-6"${_scopeId}> 9.30 Am </div></div></div>`);
            {
              _push2(`<!---->`);
            }
            if (unref(useTimesheet).mipDetails.mop_status) {
              _push2(`<div id="div_reason_noneditable"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Reason</label> ${ssrInterpolate(unref(useTimesheet).mipDetails.mip_status)}</div><div class="col-6"${_scopeId}></div></div></div>`);
              if (unref(useTimesheet).mipDetails.mop_status) {
                _push2(`<div class="mb-2 col-12" id="div_custom_reason"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Custom Reason</label></div><div class="col-6"${_scopeId}>${ssrInterpolate(unref(useTimesheet).mopDetails.mip_status)}</div></div></div>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(useTimesheet).mipDetails.mip_status) {
                _push2(`<div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Status</label></div><div class="col-6"${_scopeId}>`);
                if (unref(useTimesheet).mipDetails.mip_status.includes("Approved")) {
                  _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId}>Approved</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if (unref(useTimesheet).mipDetails.mip_status.includes("Pending")) {
                  _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Pending</span>`);
                } else {
                  _push2(`<!---->`);
                }
                if (unref(useTimesheet).mipDetails.mip_status.includes("Rejected")) {
                  _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Rejected</span>`);
                } else {
                  _push2(`<!---->`);
                }
                _push2(`</div></div></div>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "row" }, [
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Date")
                    ]),
                    createVNode("div", { class: "col-6" }, [
                      createVNode("span", {
                        class: "text-ash-medium fs-15",
                        id: "current_date"
                      }, toDisplayString(unref(useTimesheet).mipDetails.date), 1),
                      createVNode("input", {
                        type: "hidden",
                        class: "text-ash-medium form-control fs-15",
                        name: "attendance_date",
                        id: "attendance_date"
                      })
                    ])
                  ])
                ]),
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Regularize Timing as")
                    ]),
                    createVNode("div", { class: "col-6" }, " 9.30 Am ")
                  ])
                ]),
                createCommentVNode("", true),
                unref(useTimesheet).mipDetails.mop_status ? (openBlock(), createBlock("div", {
                  key: 1,
                  id: "div_reason_noneditable"
                }, [
                  createVNode("div", { class: "mb-2 col-12" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Reason"),
                        createTextVNode(" " + toDisplayString(unref(useTimesheet).mipDetails.mip_status), 1)
                      ]),
                      createVNode("div", { class: "col-6" })
                    ])
                  ]),
                  unref(useTimesheet).mipDetails.mop_status ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "mb-2 col-12",
                    id: "div_custom_reason"
                  }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Custom Reason")
                      ]),
                      createVNode("div", { class: "col-6" }, toDisplayString(unref(useTimesheet).mopDetails.mip_status), 1)
                    ])
                  ])) : createCommentVNode("", true),
                  unref(useTimesheet).mipDetails.mip_status ? (openBlock(), createBlock("div", {
                    key: 1,
                    class: "mb-2 col-12"
                  }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Status")
                      ]),
                      createVNode("div", { class: "col-6" }, [
                        unref(useTimesheet).mipDetails.mip_status.includes("Approved") ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"
                        }, "Approved")) : createCommentVNode("", true),
                        unref(useTimesheet).mipDetails.mip_status.includes("Pending") ? (openBlock(), createBlock("span", {
                          key: 1,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Pending")) : createCommentVNode("", true),
                        unref(useTimesheet).mipDetails.mip_status.includes("Rejected") ? (openBlock(), createBlock("span", {
                          key: 2,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Rejected")) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true)
                ])) : createCommentVNode("", true)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/MipRegularization.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "LcRegularization",
  __ssrInlineRender: true,
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      _push(ssrRenderComponent(_component_Dialog, mergeProps({
        header: "Header",
        visible: unref(useTimesheet).dialog_Lc,
        "onUpdate:visible": ($event) => unref(useTimesheet).dialog_Lc = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "35vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="font-semibold fs-5 modal-title"${_scopeId}> Attendance regularization</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "font-semibold fs-5 modal-title"
                }, " Attendance regularization", 4)
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Date</label></div><div class="col-6"${_scopeId}><span class="text-ash-medium fs-15" id="current_date"${_scopeId}>${ssrInterpolate(unref(useTimesheet).lcDetails.date)}</span><input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date" id="attendance_date"${_scopeId}></div></div></div><div class="mb-2 col-12" id="div_actual_user_time"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}> Actual Timing <span id="timing_label_suffix"${_scopeId}>(Late Arrival)</span></label></div><div class="col-6"${_scopeId}><span class="text-ash-medium fs-15" id="actual_user_time"${_scopeId}>${ssrInterpolate(unref(useTimesheet).lcDetails.checkin_time)}</span></div></div></div><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Regularize Timing as</label></div><div class="col-6"${_scopeId}> 9.30AM </div></div></div><div id="div_reason_noneditable"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Reason</label></div><div class="col-6"${_scopeId}>${ssrInterpolate(unref(useTimesheet).lcDetails.lc_reason)}</div></div></div>`);
            if (unref(useTimesheet).lcDetails.lc_reason_custom) {
              _push2(`<div class="mb-2 col-12" id="div_custom_reason"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Custom Reason</label></div><div class="col-6"${_scopeId}>${ssrInterpolate(unref(useTimesheet).lcDetails.lc_reason_custom)}</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (!unref(useTimesheet).lcDetails.lc_status.includes("None")) {
              _push2(`<div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Status</label></div><div class="col-6"${_scopeId}>`);
              if (unref(useTimesheet).lcDetails.lc_status.includes("Approved")) {
                _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId}>Approved</span>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(useTimesheet).lcDetails.lc_status.includes("Pending")) {
                _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Pending</span>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(useTimesheet).lcDetails.lc_status.includes("Rejected")) {
                _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Rejected</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", { class: "row" }, [
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Date")
                    ]),
                    createVNode("div", { class: "col-6" }, [
                      createVNode("span", {
                        class: "text-ash-medium fs-15",
                        id: "current_date"
                      }, toDisplayString(unref(useTimesheet).lcDetails.date), 1),
                      createVNode("input", {
                        type: "hidden",
                        class: "text-ash-medium form-control fs-15",
                        name: "attendance_date",
                        id: "attendance_date"
                      })
                    ])
                  ])
                ]),
                createVNode("div", {
                  class: "mb-2 col-12",
                  id: "div_actual_user_time"
                }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, [
                        createTextVNode(" Actual Timing "),
                        createVNode("span", { id: "timing_label_suffix" }, "(Late Arrival)")
                      ])
                    ]),
                    createVNode("div", { class: "col-6" }, [
                      createVNode("span", {
                        class: "text-ash-medium fs-15",
                        id: "actual_user_time"
                      }, toDisplayString(unref(useTimesheet).lcDetails.checkin_time), 1)
                    ])
                  ])
                ]),
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Regularize Timing as")
                    ]),
                    createVNode("div", { class: "col-6" }, " 9.30AM ")
                  ])
                ]),
                createVNode("div", { id: "div_reason_noneditable" }, [
                  createVNode("div", { class: "mb-2 col-12" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Reason")
                      ]),
                      createVNode("div", { class: "col-6" }, toDisplayString(unref(useTimesheet).lcDetails.lc_reason), 1)
                    ])
                  ]),
                  unref(useTimesheet).lcDetails.lc_reason_custom ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "mb-2 col-12",
                    id: "div_custom_reason"
                  }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Custom Reason")
                      ]),
                      createVNode("div", { class: "col-6" }, toDisplayString(unref(useTimesheet).lcDetails.lc_reason_custom), 1)
                    ])
                  ])) : createCommentVNode("", true),
                  !unref(useTimesheet).lcDetails.lc_status.includes("None") ? (openBlock(), createBlock("div", {
                    key: 1,
                    class: "mb-2 col-12"
                  }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Status")
                      ]),
                      createVNode("div", { class: "col-6" }, [
                        unref(useTimesheet).lcDetails.lc_status.includes("Approved") ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"
                        }, "Approved")) : createCommentVNode("", true),
                        unref(useTimesheet).lcDetails.lc_status.includes("Pending") ? (openBlock(), createBlock("span", {
                          key: 1,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Pending")) : createCommentVNode("", true),
                        unref(useTimesheet).lcDetails.lc_status.includes("Rejected") ? (openBlock(), createBlock("span", {
                          key: 2,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Rejected")) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true)
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/LcRegularization.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "EgRegularization",
  __ssrInlineRender: true,
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      _push(ssrRenderComponent(_component_Dialog, mergeProps({
        visible: unref(useTimesheet).dialog_Eg,
        "onUpdate:visible": ($event) => unref(useTimesheet).dialog_Eg = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "35vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5 modal-title"${_scopeId}> Attendance regularization</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5 modal-title"
                }, " Attendance regularization", 4)
              ])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Date</label></div><div class="col-6"${_scopeId}><span class="text-ash-medium fs-15" id="current_date"${_scopeId}>${ssrInterpolate(unref(useTimesheet).egDetails.date)}</span><input type="hidden" class="text-ash-medium form-control fs-15" name="attendance_date" id="attendance_date"${_scopeId}></div></div></div><div class="mb-2 col-12" id="div_actual_user_time"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}> Actual Timing <span id="timing_label_suffix"${_scopeId}>(Late Arrival)</span></label></div><div class="col-6"${_scopeId}>${ssrInterpolate(unref(useTimesheet).egDetails.checkout_time)}</div></div></div><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Regularize Timing as</label></div><div class="col-6"${_scopeId}> 6.30 PM </div></div></div>`);
            {
              _push2(`<!---->`);
            }
            _push2(`<div id="div_reason_noneditable"${_scopeId}><div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Reason</label></div><div class="col-6"${_scopeId}>${ssrInterpolate(unref(useTimesheet).egDetails.eg_reason)}</div></div></div>`);
            if (!unref(useTimesheet).egDetails.eg_status.includes("None")) {
              _push2(`<div class="mb-2 col-12"${_scopeId}><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label class="text-ash-medium fs-15"${_scopeId}>Status</label></div><div class="col-6"${_scopeId}>`);
              if (unref(useTimesheet).egDetails.eg_status.includes("Approved")) {
                _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId}>Approved</span>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(useTimesheet).egDetails.eg_status.includes("Pending")) {
                _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Pending</span>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(useTimesheet).egDetails.eg_status.includes("Rejected")) {
                _push2(`<span class="inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId}>Rejected</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", { class: "row" }, [
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Date")
                    ]),
                    createVNode("div", { class: "col-6" }, [
                      createVNode("span", {
                        class: "text-ash-medium fs-15",
                        id: "current_date"
                      }, toDisplayString(unref(useTimesheet).egDetails.date), 1),
                      createVNode("input", {
                        type: "hidden",
                        class: "text-ash-medium form-control fs-15",
                        name: "attendance_date",
                        id: "attendance_date"
                      })
                    ])
                  ])
                ]),
                createVNode("div", {
                  class: "mb-2 col-12",
                  id: "div_actual_user_time"
                }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, [
                        createTextVNode(" Actual Timing "),
                        createVNode("span", { id: "timing_label_suffix" }, "(Late Arrival)")
                      ])
                    ]),
                    createVNode("div", { class: "col-6" }, toDisplayString(unref(useTimesheet).egDetails.checkout_time), 1)
                  ])
                ]),
                createVNode("div", { class: "mb-2 col-12" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-6" }, [
                      createVNode("label", { class: "text-ash-medium fs-15" }, "Regularize Timing as")
                    ]),
                    createVNode("div", { class: "col-6" }, " 6.30 PM ")
                  ])
                ]),
                createCommentVNode("", true),
                createVNode("div", { id: "div_reason_noneditable" }, [
                  createVNode("div", { class: "mb-2 col-12" }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Reason")
                      ]),
                      createVNode("div", { class: "col-6" }, toDisplayString(unref(useTimesheet).egDetails.eg_reason), 1)
                    ])
                  ]),
                  !unref(useTimesheet).egDetails.eg_status.includes("None") ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "mb-2 col-12"
                  }, [
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-6" }, [
                        createVNode("label", { class: "text-ash-medium fs-15" }, "Status")
                      ]),
                      createVNode("div", { class: "col-6" }, [
                        unref(useTimesheet).egDetails.eg_status.includes("Approved") ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"
                        }, "Approved")) : createCommentVNode("", true),
                        unref(useTimesheet).egDetails.eg_status.includes("Pending") ? (openBlock(), createBlock("span", {
                          key: 1,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Pending")) : createCommentVNode("", true),
                        unref(useTimesheet).egDetails.eg_status.includes("Rejected") ? (openBlock(), createBlock("span", {
                          key: 2,
                          class: "inline-flex items-center px-5 py-2 fs-6 font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"
                        }, "Rejected")) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true)
                ])
              ])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/EgRegularization.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _imports_0 = "/build/noData46681.svg";
const _sfc_main$1 = {
  __name: "ViewSelfieImage",
  __ssrInlineRender: true,
  props: {
    checkin: {
      type: Object,
      required: true
    },
    checkout: {
      type: Object,
      required: true
    }
  },
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    const baseUrl = ref();
    onMounted(() => {
      baseUrl.value = window.location.origin;
      console.log(window.location.origin);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      _push(ssrRenderComponent(_component_Dialog, mergeProps({
        header: "Header",
        visible: unref(useTimesheet).dialog_Selfie,
        "onUpdate:visible": ($event) => unref(useTimesheet).dialog_Selfie = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "40vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: true
      }, _attrs), {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}></div>`);
          } else {
            return [
              createVNode("div")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            if (unref(useTimesheet).selfieDetails) {
              _push2(`<img${ssrRenderAttr("src", `${baseUrl.value}/${unref(useTimesheet).selfieDetails}`)}${ssrRenderAttr("alt", `${baseUrl.value}/${unref(useTimesheet).selfieDetails}`)}${_scopeId}>`);
            } else {
              _push2(`<img${ssrRenderAttr("src", _imports_0)} alt=""${_scopeId}>`);
            }
          } else {
            return [
              unref(useTimesheet).selfieDetails ? (openBlock(), createBlock("img", {
                key: 0,
                src: `${baseUrl.value}/${unref(useTimesheet).selfieDetails}`,
                alt: `${baseUrl.value}/${unref(useTimesheet).selfieDetails}`
              }, null, 8, ["src", "alt"])) : (openBlock(), createBlock("img", {
                key: 1,
                src: _imports_0,
                alt: ""
              }))
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/timesheet/components/ViewSelfieImage.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const AttendanceModule_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "AttendanceModule",
  __ssrInlineRender: true,
  setup(__props) {
    const useTimesheet = useAttendanceTimesheetMainStore();
    useCalendarStore();
    const teamList = ref();
    const orgList = ref();
    const service = Service();
    const teamListLength = ref(0);
    const orgListLength = ref(0);
    onMounted(async () => {
      Service();
      await useTimesheet.getTeamList(service.current_user_code).then((res) => {
        teamList.value = Object.values(res.data);
        teamListLength.value = res.data.length;
      });
      await useTimesheet.getSelectedEmployeeAttendance();
      useTimesheet.getOrgList().then((res) => {
        orgList.value = Object.values(res.data);
        orgListLength.value = res.data.length;
      });
    });
    ref([
      {
        date: "2023-06-02 12:00",
        absent_status: null,
        attendance_mode_checkin: "web",
        attendance_mode_checkout: "mobile",
        checkin_time: "22:09:40"
      }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      if (unref(useTimesheet).canShowLoading) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="w-full"><div class="mb-2 card"><div class="py-1 card-body"><div class="row"><div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-xxl-12"><div class="calender-mid_content"><div class="row"><div class="col-sm-3 col-md-3 col-xl-3 col-lg-3 col-xxl-3"><p class="text-muted fw-normal f-18"><i class="fa fa-calendar me-2" id="calendarIcon" aria-hidden="true"></i><span class="dates">${ssrInterpolate(unref(dayjs)(new Date()).format("MMMM DD,YYYY"))}</span></p></div><div class="col-sm-5 col-md-5 col-xl-5 col-lg-5 col-xxl-5"><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed justify-center" id="pills-tab" role="tablist"><li class="mx-4 nav-item ember-view" role="presentation"><a class="nav-link active ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#timesheet" role="tab" aria-controls="pills-home" aria-selected="true"> Timesheet</a></li>`);
      if (unref(service).current_user_role == 2 || unref(service).current_user_role == 4) {
        _push(`<li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#team" role="tab" aria-controls="pills-home" aria-selected="true"> Team Timesheet</a></li>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).current_user_role == 2) {
        _push(`<li class="nav-item ember-view" role="presentation"><a class="mx-2 nav-link ember-view" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#org" role="tab" aria-controls="pills-home" aria-selected="true"> Org Timesheet</a></li>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</ul></div></div></div></div></div></div></div>`);
      {
        _push(`<!---->`);
      }
      _push(`<div class="mb-0"><div class="card-body"><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="timesheet" role="tabpanel" aria-labelledby="pills-home-tab"><div class="overflow-x-auto h-[80vh] overflow-y-scroll">`);
      if (unref(useTimesheet).switchTimesheet == "Detailed") {
        _push(ssrRenderComponent(DetailedTimesheet, {
          "single-attendance-day": unref(useTimesheet).currentEmployeeAttendance
        }, null, _parent));
      } else {
        _push(ssrRenderComponent(_sfc_main$7, {
          "single-attendance-day": unref(useTimesheet).currentEmployeeAttendance,
          sidebar: unref(useTimesheet).classicTimesheetSidebar
        }, null, _parent));
      }
      _push(`</div></div><div class="tab-pane fade" id="team" role="tabpanel">`);
      if (teamListLength.value > 0) {
        _push(`<div class="flex h-[80vh] overflow-hidden"><div class="min-w-max">`);
        _push(ssrRenderComponent(_sfc_main$6, {
          source: teamList.value,
          "is-team": true
        }, null, _parent));
        _push(`</div><div class="overflow-x-auto ml-2 w-100 rounded-lg">`);
        if (unref(useTimesheet).switchTimesheet == "Detailed") {
          _push(ssrRenderComponent(DetailedTimesheet, {
            "single-attendance-day": unref(useTimesheet).currentlySelectedTeamMemberAttendance
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_sfc_main$7, {
            "single-attendance-day": unref(useTimesheet).currentlySelectedTeamMemberAttendance,
            sidebar: unref(useTimesheet).classicTimesheetSidebar
          }, null, _parent));
        }
        _push(`</div></div>`);
      } else {
        _push(`<div class="mr-4 card pb-10"><img${ssrRenderAttr("src", _imports_0$1)} alt="" srcset="" class="w-5 p-6 m-auto"></div>`);
      }
      _push(`</div><div class="tab-pane fade" id="org" role="tabpanel">`);
      if (orgListLength.value > 0) {
        _push(`<div class="flex h-[80vh] overflow-hidden"><div class="min-w-max h-[100%]">`);
        _push(ssrRenderComponent(_sfc_main$6, {
          source: orgList.value,
          "is-team": false
        }, null, _parent));
        _push(`</div><div class="overflow-x-auto ml-2 h-[100%] w-100 rounded-lg">`);
        if (unref(useTimesheet).switchTimesheet == "Detailed") {
          _push(ssrRenderComponent(DetailedTimesheet, {
            "single-attendance-day": unref(useTimesheet).currentlySelectedOrgMemberAttendance
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_sfc_main$7, {
            "single-attendance-day": unref(useTimesheet).currentlySelectedOrgMemberAttendance,
            sidebar: unref(useTimesheet).classicTimesheetSidebar
          }, null, _parent));
        }
        _push(`</div></div>`);
      } else {
        _push(`<div class="mr-4 card pb-10"><img${ssrRenderAttr("src", _imports_0$1)} alt="" srcset="" class="w-5 p-6 m-auto"></div>`);
      }
      _push(`</div></div></div></div></div>`);
      _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`<div style="${ssrRenderStyle({ "display": "none" })}">`);
      _push(ssrRenderComponent(_sfc_main$b, null, null, _parent));
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/attendence/AttendanceModule.vue");
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
app.component("InputMask", InputMask);
app.component("OverlayPanel", OverlayPanel);
app.component("Tag", Tag);
app.component("Sidebar", Sidebar);
app.component("Accordion", Accordion);
app.component("AccordionTab", AccordionTab);
app.component("SelectButton", SelectButton);
app.mount("#AttendanceModule");
