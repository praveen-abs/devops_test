/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, reactive, onMounted, resolveComponent, mergeProps, withCtx, createVNode, unref, isRef, withDirectives, openBlock, createBlock, vModelCheckbox, createTextVNode, toDisplayString, useSSRContext, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
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
import Checkbox from "primevue/checkbox";
import MultiSelect from "primevue/multiselect";
import InputNumber from "primevue/inputnumber";
import { ssrRenderAttrs, ssrRenderComponent, ssrRenderStyle, ssrIncludeBooleanAttr, ssrLooseEqual, ssrInterpolate, ssrRenderClass } from "vue/server-renderer";
import "dateformat";
import axios from "axios";
import { FilterMatchMode } from "primevue/api";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import "moment";
import "lodash";
import { _ as _export_sfc } from "./_plugin-vue_export-helper83237.js";
import { _ as _sfc_main$9 } from "./Holidays_Lists832372.js";
import "dayjs";
const useAttendanceSettingMainStore = defineStore("AttendanceSettingMainStore", () => {
  useToast();
  const canShowLoading = ref(false);
  const manageshift_exemption_steps = ref(1);
  const change = ref();
  const array_shiftDetails = ref();
  let currentlySelectedRowData = null;
  let selectedEmployees = ref();
  ref([]);
  const shiftDetails = reactive({
    shift_name: "",
    Shift_Code: "",
    txt_shift_start_time: "",
    Is_Default: "",
    flexible_gross_hours: 0,
    Shift_start_Time: "",
    Shift_End_Time: "",
    Grace_Time: 0,
    flexible_gross_break: "",
    breaktime_morning: "",
    breaktime_lunch: "",
    breaktime_evening: "",
    halfday_min_workhrs: "",
    fullday_min_workhrs: "",
    lclp_number_of_late_commings_allowed_Month: "",
    lclp_Once_Exceed_TheLate_Limit_Days_Lop_Apply: "",
    eglp_number_of_late_commings_allowed_Month: "",
    eglp__Once_Exceed_TheEarly_Limit_Days_Lop_Apply: ""
  });
  reactive({});
  let update_state = reactive([]);
  const Week_Off_Days = ref([]);
  function getWeek_Off_Days() {
    canShowLoading.value = true;
    let url = `http://localhost:3000/assingWorkShifts`;
    console.log("AJAX URL : " + url);
    axios.get(url).then((response) => {
      Week_Off_Days.value = response.data;
      console.log("testing getWeek_Off_Days data : ", Week_Off_Days.value);
      canShowLoading.value = false;
    });
  }
  function fetchShiftDetails() {
    canShowLoading.value = true;
    let url = window.location.origin + "/save-work-shift";
    console.log("AJAX URL : " + url);
  }
  function getEmployeeIDsArray() {
    const temp = [];
    _.flatMap(selectedEmployees.value, function(data) {
      temp.push(data.user_id);
    });
    return temp;
  }
  function saveWorkShiftDetails() {
    canShowLoading.value = true;
    console.log("Processing Rowdata : " + JSON.stringify(currentlySelectedRowData));
    getEmployeeIDsArray();
    let url = `/save-work-shift`;
    axios.post(url, {
      shiftDetails,
      update_state: Week_Off_Days.value
    }).then((response) => {
      console.log(response);
      fetchShiftDetails();
      canShowLoading.value = false;
    }).catch((error) => {
      canShowLoading.value = false;
    });
  }
  const isCheckedOrNot = reactive({
    sunday: false,
    monday: false,
    tuesday: false,
    wednesday: false,
    thursday: false,
    friday: false,
    saturday: false
  });
  async function updateWeekOffState(data) {
    console.log("all weeks" + data.AllWeeks);
    console.log("all weeks" + data.first_week);
    update_state = {
      week_off_list: data.AllWeeks,
      Week_1st: data.first_week,
      Week_2st: data.sec_week,
      Week_3st: data.third_week,
      Week_4st: data.fourth_week,
      Week_5st: data.fifth_week
    };
    console.log(update_state);
  }
  return {
    canShowLoading,
    array_shiftDetails,
    shiftDetails,
    selectedEmployees,
    manageshift_exemption_steps,
    change,
    Week_Off_Days,
    update_state,
    fetchShiftDetails,
    saveWorkShiftDetails,
    getWeek_Off_Days,
    updateWeekOffState,
    isCheckedOrNot
  };
});
const _sfc_main$8 = {
  __name: "Att_AssignWorkShifts",
  __ssrInlineRender: true,
  setup(__props) {
    const useAttendanceStore = useAttendanceSettingMainStore();
    let canShowConfirmation = ref(false);
    ref();
    onMounted(() => {
      console.log(useAttendanceStore.manageshift_exemption_steps);
    });
    const selectedCity = ref();
    const cities = ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    ref({});
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      emp_code: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      designation: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      department_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      location: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      }
    });
    onMounted(() => {
      useAttendanceStore.fetchShiftDetails();
      useAttendanceStore.getWeek_Off_Days();
    });
    function hideConfirmDialog(canClearData) {
      canShowConfirmation.value = false;
      if (canClearData)
        resetVars();
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Button = resolveComponent("Button");
      const _component_InputText = resolveComponent("InputText");
      const _component_Checkbox = resolveComponent("Checkbox");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}>`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: _ctx.canShowLoading,
        "onUpdate:visible": ($event) => _ctx.canShowLoading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: ""
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
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
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
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
        header: "Confirmation",
        visible: unref(canShowConfirmation),
        "onUpdate:visible": ($event) => isRef(canShowConfirmation) ? canShowConfirmation.value = $event : canShowConfirmation = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: ""
      }, {
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Yes",
              icon: "pi pi-check",
              onClick: ($event) => _ctx.saveWorkShiftDetails(),
              class: "p-button-text",
              autofocus: ""
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "No",
              icon: "pi pi-times",
              onClick: ($event) => hideConfirmDialog(true),
              class: "p-button-text"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Yes",
                icon: "pi pi-check",
                onClick: ($event) => _ctx.saveWorkShiftDetails(),
                class: "p-button-text",
                autofocus: ""
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "No",
                icon: "pi pi-times",
                onClick: ($event) => hideConfirmDialog(true),
                class: "p-button-text"
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-exclamation-triangle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>Proceed to save the shift details?</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-exclamation-triangle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, "Proceed to save the shift details?")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="flex px-4 pt-6 gap-9"><div><span class="text-lg font-semibold">Shift Name</span><span class="mx-2">`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "text",
        modelValue: unref(useAttendanceStore).shiftDetails.shift_name,
        "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.shift_name = $event,
        placeholder: "Enter the shift name"
      }, null, _parent));
      _push(`</span></div><div><span class="text-lg font-semibold">Shift Code</span><span class="mx-2">`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "text",
        modelValue: unref(useAttendanceStore).shiftDetails.Shift_Code,
        "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.Shift_Code = $event,
        placeholder: "Enter the shift code"
      }, null, _parent));
      _push(`</span></div><div class="flex my-2"><p class="text-lg font-semibold px-3">Is Default</p>`);
      _push(ssrRenderComponent(_component_Checkbox, {
        modelValue: unref(useAttendanceStore).shiftDetails.Is_Default,
        "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.Is_Default = $event,
        binary: true
      }, null, _parent));
      _push(`</div></div><div class="w-full p-4 mx-5"><div class="flex gap-4 pt-4"><div><input style="${ssrRenderStyle({ "height": "23px", "width": "23px" })}" value="Apply Flexible Gross Hours" class="mt-1 form-check-input" type="radio" name="leave"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(useAttendanceStore).change, "Apply Flexible Gross Hours")) ? " checked" : ""}></div><div><p class="font-semibold py-auto">Apply Flexible Gross Hours</p></div><div class="flex">`);
      if (unref(useAttendanceStore).change == "Apply Flexible Gross Hours") {
        _push(ssrRenderComponent(_component_InputNumber, {
          modelValue: unref(useAttendanceStore).shiftDetails.flexible_gross_hours,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.flexible_gross_hours = $event,
          inputId: "minmax",
          min: 0,
          max: 100
        }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      if (unref(useAttendanceStore).change == "Apply Flexible Gross Hours") {
        _push(`<p class="mx-4 text-lg font-semibold text-gray-600 py-auto">Min</p>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="p-3 my-5 rounded-lg bg-blue-50"><div class="flex gap-4 col-12"><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" value="Apply Standard General Shift Timing" class="form-check-input" type="radio" name="leave"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(useAttendanceStore).change, "Apply Standard General Shift Timing")) ? " checked" : ""}><p class="font-semibold">Apply Standard General Shift Timing</p></div>`);
      if (unref(useAttendanceStore).change == "Apply Standard General Shift Timing") {
        _push(`<div><div class="flex mx-6 my-4 row"><div class="flex gap-4 col-6"><div><p class="text-lg font-semibold py-auto">Shift Start Time</p></div><div>`);
        _push(ssrRenderComponent(_component_Calendar, {
          id: "calendar-timeonly",
          modelValue: unref(useAttendanceStore).shiftDetails.Shift_start_Time,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.Shift_start_Time = $event,
          timeOnly: "",
          class: "h-10"
        }, null, _parent));
        _push(`</div></div><div class="flex gap-4 col-6"><div><p class="text-lg font-semibold py-auto">Shift End Time</p></div><div>`);
        _push(ssrRenderComponent(_component_Calendar, {
          id: "calendar-timeonly",
          modelValue: unref(useAttendanceStore).shiftDetails.Shift_End_Time,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.Shift_End_Time = $event,
          timeOnly: "",
          class: "h-10"
        }, null, _parent));
        _push(`</div></div></div><div class="flex mx-6 my-4 row"><div class="flex gap-1 col-6 d-flex align-items-center"><div class=""><p class="text-lg font-semibold py-auto">Week Off</p></div><div class="ml-7 col-9">`);
        _push(ssrRenderComponent(_component_MultiSelect, {
          modelValue: unref(useAttendanceStore).shiftDetails.Week_Off,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.Week_Off = $event,
          options: _ctx.Week_Off_Days,
          optionLabel: "name",
          placeholder: "Select Week Off",
          maxSelectedLabels: 3,
          class: "h-15",
          style: { "width": "180px" }
        }, null, _parent));
        _push(`</div></div><div class="flex gap-1 col-6 d-flex align-items-center"><div><p class="text-lg font-semibold py-auto">Grace Time</p></div><div class="ml-6 col-9">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.Grace_Time,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.Grace_Time = $event,
          inputId: "minmax",
          min: 0,
          max: 59
        }, null, _parent));
        _push(`</div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="d-flex w-full justify-content-start">`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(useAttendanceStore).Week_Off_Days,
        tableStyle: "min-width: 95rem"
      }, {
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "weeks",
              header: "Days"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "week_off_list",
              header: "ALL Weeks"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}>`);
                  if (slotProps.data.AllWeeks == 0) {
                    _push3(`<input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.AllWeeks, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.first_week == 1 ? true : slotProps.data.sec_week == 1 ? true : slotProps.data.third_week == 1 ? true : slotProps.data.fourth_week == 1 ? true : slotProps.data.fifth_week == 1 ? true : false) ? " checked" : ""}${_scopeId2}>`);
                  } else if (slotProps.data.AllWeeks == 1) {
                    _push3(`<input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.AllWeeks, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.first_week == 0 ? false : slotProps.data.sec_week == 0 ? false : slotProps.data.third_week == 0 ? false : slotProps.data.fourth_week == 0 ? false : slotProps.data.fifth_week == 0 ? false : true) ? " checked" : ""}${_scopeId2}>`);
                  } else {
                    _push3(`<input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.AllWeeks, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.first_week == 1 ? true : slotProps.data.sec_week == 1 ? true : slotProps.data.third_week == 1 ? true : slotProps.data.fourth_week == 1 ? true : slotProps.data.fifth_week == 1 ? true : false) ? " checked" : ""}${_scopeId2}>`);
                  }
                  _push3(`</div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      slotProps.data.AllWeeks == 0 ? withDirectives((openBlock(), createBlock("input", {
                        key: 0,
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => (slotProps.data.AllWeeks = 1, slotProps.data.first_week = 1, slotProps.data.sec_week = 1, slotProps.data.third_week = 1, slotProps.data.fourth_week = 1, slotProps.data.fifth_week = 1),
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        "onUpdate:modelValue": ($event) => slotProps.data.AllWeeks = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.first_week == 1 ? true : slotProps.data.sec_week == 1 ? true : slotProps.data.third_week == 1 ? true : slotProps.data.fourth_week == 1 ? true : slotProps.data.fifth_week == 1 ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"])), [
                        [vModelCheckbox, slotProps.data.AllWeeks]
                      ]) : slotProps.data.AllWeeks == 1 ? withDirectives((openBlock(), createBlock("input", {
                        key: 1,
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => (slotProps.data.first_week = 0, slotProps.data.sec_week = 0, slotProps.data.third_week = 0, slotProps.data.fourth_week = 0, slotProps.data.fifth_week = 0),
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        "onUpdate:modelValue": ($event) => slotProps.data.AllWeeks = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.first_week == 0 ? false : slotProps.data.sec_week == 0 ? false : slotProps.data.third_week == 0 ? false : slotProps.data.fourth_week == 0 ? false : slotProps.data.fifth_week == 0 ? false : true
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"])), [
                        [vModelCheckbox, slotProps.data.AllWeeks]
                      ]) : withDirectives((openBlock(), createBlock("input", {
                        key: 2,
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => (slotProps.data.first_week = 1, slotProps.data.sec_week = 1, slotProps.data.third_week = 1, slotProps.data.fourth_week = 1, slotProps.data.fifth_week = 1),
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        "onUpdate:modelValue": ($event) => slotProps.data.AllWeeks = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.first_week == 1 ? true : slotProps.data.sec_week == 1 ? true : slotProps.data.third_week == 1 ? true : slotProps.data.fourth_week == 1 ? true : slotProps.data.fifth_week == 1 ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"])), [
                        [vModelCheckbox, slotProps.data.AllWeeks]
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "first_week",
              header: "first Week"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.first_week, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.AllWeeks ? true : false) ? " checked" : ""}${_scopeId2}></div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      withDirectives(createVNode("input", {
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.first_week = 0 : slotProps.data.first_week = 1,
                        "onUpdate:modelValue": ($event) => slotProps.data.first_week = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.AllWeeks ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                        [vModelCheckbox, slotProps.data.first_week]
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "sec_week",
              header: "second week"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.sec_week, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.AllWeeks ? true : false) ? " checked" : ""}${_scopeId2}></div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      withDirectives(createVNode("input", {
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.sec_week = 0 : slotProps.data.sec_week = 1,
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        "onUpdate:modelValue": ($event) => slotProps.data.sec_week = $event,
                        "false-value": 0,
                        "true-value": 1,
                        checked: slotProps.data.AllWeeks ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                        [vModelCheckbox, slotProps.data.sec_week]
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "third_week",
              header: "third week"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.third_week, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.AllWeeks ? true : false) ? " checked" : ""}${_scopeId2}></div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      withDirectives(createVNode("input", {
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.third_week = 0 : slotProps.data.third_week = 1,
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        "onUpdate:modelValue": ($event) => slotProps.data.third_week = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.AllWeeks ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                        [vModelCheckbox, slotProps.data.third_week]
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "fourth_week",
              header: "fourth week"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox" name="" id=""${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.fourth_week, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.AllWeeks ? true : false) ? " checked" : ""}${_scopeId2}></div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      withDirectives(createVNode("input", {
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.fourth_week = 0 : slotProps.data.fourth_week = 1,
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        name: "",
                        id: "",
                        "onUpdate:modelValue": ($event) => slotProps.data.fourth_week = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.AllWeeks ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                        [vModelCheckbox, slotProps.data.fourth_week]
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "fifth_week",
              header: "fifth week"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div${_scopeId2}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="checkbox"${ssrIncludeBooleanAttr(ssrLooseEqual(slotProps.data.fifth_week, 1)) ? " checked" : ""}${ssrIncludeBooleanAttr(slotProps.data.AllWeeks ? true : false) ? " checked" : ""}${_scopeId2}></div>`);
                } else {
                  return [
                    createVNode("div", null, [
                      withDirectives(createVNode("input", {
                        onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                        onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.fifth_week = 0 : slotProps.data.fifth_week = 1,
                        style: { "height": "20px", "width": "20px" },
                        class: "form-check-input",
                        type: "checkbox",
                        "onUpdate:modelValue": ($event) => slotProps.data.fifth_week = $event,
                        "true-value": 1,
                        "false-value": 0,
                        checked: slotProps.data.AllWeeks ? true : false
                      }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                        [vModelCheckbox, slotProps.data.fifth_week]
                      ])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "weeks",
                header: "Days"
              }),
              createVNode(_component_Column, {
                field: "week_off_list",
                header: "ALL Weeks"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    slotProps.data.AllWeeks == 0 ? withDirectives((openBlock(), createBlock("input", {
                      key: 0,
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => (slotProps.data.AllWeeks = 1, slotProps.data.first_week = 1, slotProps.data.sec_week = 1, slotProps.data.third_week = 1, slotProps.data.fourth_week = 1, slotProps.data.fifth_week = 1),
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      "onUpdate:modelValue": ($event) => slotProps.data.AllWeeks = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.first_week == 1 ? true : slotProps.data.sec_week == 1 ? true : slotProps.data.third_week == 1 ? true : slotProps.data.fourth_week == 1 ? true : slotProps.data.fifth_week == 1 ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"])), [
                      [vModelCheckbox, slotProps.data.AllWeeks]
                    ]) : slotProps.data.AllWeeks == 1 ? withDirectives((openBlock(), createBlock("input", {
                      key: 1,
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => (slotProps.data.first_week = 0, slotProps.data.sec_week = 0, slotProps.data.third_week = 0, slotProps.data.fourth_week = 0, slotProps.data.fifth_week = 0),
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      "onUpdate:modelValue": ($event) => slotProps.data.AllWeeks = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.first_week == 0 ? false : slotProps.data.sec_week == 0 ? false : slotProps.data.third_week == 0 ? false : slotProps.data.fourth_week == 0 ? false : slotProps.data.fifth_week == 0 ? false : true
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"])), [
                      [vModelCheckbox, slotProps.data.AllWeeks]
                    ]) : withDirectives((openBlock(), createBlock("input", {
                      key: 2,
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => (slotProps.data.first_week = 1, slotProps.data.sec_week = 1, slotProps.data.third_week = 1, slotProps.data.fourth_week = 1, slotProps.data.fifth_week = 1),
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      "onUpdate:modelValue": ($event) => slotProps.data.AllWeeks = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.first_week == 1 ? true : slotProps.data.sec_week == 1 ? true : slotProps.data.third_week == 1 ? true : slotProps.data.fourth_week == 1 ? true : slotProps.data.fifth_week == 1 ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"])), [
                      [vModelCheckbox, slotProps.data.AllWeeks]
                    ])
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "first_week",
                header: "first Week"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    withDirectives(createVNode("input", {
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.first_week = 0 : slotProps.data.first_week = 1,
                      "onUpdate:modelValue": ($event) => slotProps.data.first_week = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.AllWeeks ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                      [vModelCheckbox, slotProps.data.first_week]
                    ])
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "sec_week",
                header: "second week"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    withDirectives(createVNode("input", {
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.sec_week = 0 : slotProps.data.sec_week = 1,
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      "onUpdate:modelValue": ($event) => slotProps.data.sec_week = $event,
                      "false-value": 0,
                      "true-value": 1,
                      checked: slotProps.data.AllWeeks ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                      [vModelCheckbox, slotProps.data.sec_week]
                    ])
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "third_week",
                header: "third week"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    withDirectives(createVNode("input", {
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.third_week = 0 : slotProps.data.third_week = 1,
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      "onUpdate:modelValue": ($event) => slotProps.data.third_week = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.AllWeeks ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                      [vModelCheckbox, slotProps.data.third_week]
                    ])
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "fourth_week",
                header: "fourth week"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    withDirectives(createVNode("input", {
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.fourth_week = 0 : slotProps.data.fourth_week = 1,
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      name: "",
                      id: "",
                      "onUpdate:modelValue": ($event) => slotProps.data.fourth_week = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.AllWeeks ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                      [vModelCheckbox, slotProps.data.fourth_week]
                    ])
                  ])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "fifth_week",
                header: "fifth week"
              }, {
                body: withCtx((slotProps) => [
                  createVNode("div", null, [
                    withDirectives(createVNode("input", {
                      onChange: ($event) => unref(useAttendanceStore).updateWeekOffState(slotProps.data),
                      onClick: ($event) => slotProps.data.AllWeeks == 1 ? slotProps.data.fifth_week = 0 : slotProps.data.fifth_week = 1,
                      style: { "height": "20px", "width": "20px" },
                      class: "form-check-input",
                      type: "checkbox",
                      "onUpdate:modelValue": ($event) => slotProps.data.fifth_week = $event,
                      "true-value": 1,
                      "false-value": 0,
                      checked: slotProps.data.AllWeeks ? true : false
                    }, null, 40, ["onChange", "onClick", "onUpdate:modelValue", "checked"]), [
                      [vModelCheckbox, slotProps.data.fifth_week]
                    ])
                  ])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div><div class="flex mx-4 my-6"><span class="text-lg font-semibold">Assign To</span><span class="p-2 mx-4 my-auto mb-5 rounded-lg bg-red-50 fotn-bold"><strong class="text-orange-300">Note:</strong> Particular employees cannot be assigned to more than one shift unless he or she is assigned to a flexible shift.</span></div><div class="flex justify-between mx-4">`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        options: cities.value,
        optionLabel: "name",
        placeholder: "Department",
        class: "w-full md:w-14rem text-blue-900",
        style: { "border": "1px solid navy" }
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        style: { "border": "1px solid navy" },
        options: cities.value,
        optionLabel: "name",
        placeholder: "Designation",
        class: "w-full md:w-14rem text-blue-900"
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        style: { "border": "1px solid navy" },
        options: cities.value,
        optionLabel: "name",
        placeholder: "Location",
        class: "w-full md:w-14rem text-blue-900"
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        style: { "border": "1px solid navy" },
        options: cities.value,
        optionLabel: "name",
        placeholder: "State",
        class: "w-full md:w-14rem text-blue-900"
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        style: { "border": "1px solid navy" },
        options: cities.value,
        optionLabel: "name",
        placeholder: "Branch",
        class: "w-full md:w-14rem text-blue-900"
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: selectedCity.value,
        "onUpdate:modelValue": ($event) => selectedCity.value = $event,
        style: { "border": "1px solid navy" },
        options: cities.value,
        optionLabel: "name",
        placeholder: "Legal Entity",
        class: "w-full md:w-14rem text-blue-900"
      }, null, _parent));
      _push(`</div><div class="mx-4">`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "text",
        modelValue: _ctx.txt_shift_name,
        "onUpdate:modelValue": ($event) => _ctx.txt_shift_name = $event,
        placeholder: "Search...",
        class: "my-4"
      }, null, _parent));
      _push(ssrRenderComponent(_component_DataTable, {
        class: "w-full",
        value: unref(useAttendanceStore).array_shiftDetails,
        selection: unref(useAttendanceStore).selectedEmployees,
        "onUpdate:selection": ($event) => unref(useAttendanceStore).selectedEmployees = $event,
        paginator: true,
        rows: 2,
        dataKey: "emp_code",
        rowsPerPageOptions: [5, 10, 25],
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"]
      }, {
        empty: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee found `);
          } else {
            return [
              createTextVNode(" No Employee found ")
            ];
          }
        }),
        loading: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading employee data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading employee data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, { selectionMode: "multiple" }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "emp_code",
              header: "Employee ID",
              style: { "min-width": "2rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.emp_code)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "employee_name",
              header: "Employee Name",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.employee_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "designation",
              header: "Designation",
              style: { "min-width": "10rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.designation)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.designation), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "department_name",
              header: "Department"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.department_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "work_location",
              header: "Location"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.work_location)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "work_location",
              header: "State"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.work_location)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, { selectionMode: "multiple" }),
              createVNode(_component_Column, {
                field: "emp_code",
                header: "Employee ID",
                style: { "min-width": "2rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "employee_name",
                header: "Employee Name",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "designation",
                header: "Designation",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.designation), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "department_name",
                header: "Department"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "work_location",
                header: "Location"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "work_location",
                header: "State"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/AssignShift/Att_AssignWorkShifts.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const _sfc_main$7 = {
  __name: "BreakTimeRange",
  __ssrInlineRender: true,
  setup(__props) {
    const useAttendanceStore = useAttendanceSettingMainStore();
    ref("center");
    ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputNumber = resolveComponent("InputNumber");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full p-6 mx-5" }, _attrs))}><div class="flex gap-4 pt-4"><div><input style="${ssrRenderStyle({ "height": "23px", "width": "23px" })}" class="mt-1 form-check-input" type="radio" name="leave"></div><div><p class="font-semibold py-auto">Apply Flexible Gross Break</p></div><div class="flex">`);
      _push(ssrRenderComponent(_component_InputNumber, {
        class: "w-9 h-10",
        modelValue: unref(useAttendanceStore).shiftDetails.flexible_gross_break,
        "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.flexible_gross_break = $event,
        inputId: "minmax",
        min: 0,
        max: 59
      }, null, _parent));
      _push(`<p class="mx-4 text-lg font-semibold text-gray-600 py-auto">Min</p></div></div>`);
      if (unref(useAttendanceStore).change == "Apply Standard General Shift Timing") {
        _push(`<div class="p-4 my-5 rounded-lg bg-blue-50"><div class="flex gap-4 col-12"><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="leave"><p class="font-semibold">Split The Break Down</p></div><div class="flex mx-6 my-4 row"><div class="flex gap-4 col-4"><div><p class="my-auto text-lg font-semibold py-auto">Morning</p></div><div class="flex gap-3">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "w-9 h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.breaktime_morning,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.breaktime_morning = $event,
          inputId: "minmax",
          min: 0,
          max: 59
        }, null, _parent));
        _push(`<p class="text-lg font-semibold text-gray-600 py-auto">Mins</p></div></div><div class="flex gap-4 col-4"><div><p class="my-auto text-lg font-semibold py-auto">Lunch</p></div><div class="flex gap-3">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "w-9 h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.breaktime_lunch,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.breaktime_lunch = $event,
          inputId: "minmax",
          min: 0,
          max: 59
        }, null, _parent));
        _push(`<p class="text-lg font-semibold text-gray-600 py-auto">Mins</p></div></div><div class="flex gap-4 col-4"><div><p class="my-auto text-lg font-semibold py-auto">Evening</p></div><div class="flex gap-3">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "w-9 h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.breaktime_evening,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.breaktime_evening = $event,
          inputId: "minmax",
          min: 0,
          max: 59
        }, null, _parent));
        _push(`<p class="text-lg font-semibold text-gray-600 py-auto">Mins</p></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/BreakTimeRange/BreakTimeRange.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const _sfc_main$6 = {
  __name: "WorkingHours",
  __ssrInlineRender: true,
  setup(__props) {
    const useAttendanceStore = useAttendanceSettingMainStore();
    ref("center");
    ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputNumber = resolveComponent("InputNumber");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full p-6 my-4 shadow-sm rounded-xl bg-blue-50" }, _attrs))}><div class="flex gap-4 pt-1 row"><div class="col-4"><p class="font-semibold py-auto">Half Day Minimum Working Hours Required</p></div><div class="flex gap-4 col-4">`);
      _push(ssrRenderComponent(_component_InputNumber, {
        class: "w-9 h-10",
        modelValue: unref(useAttendanceStore).shiftDetails.halfday_min_workhrs,
        "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.halfday_min_workhrs = $event,
        inputId: "minmax",
        min: 0,
        max: 24
      }, null, _parent));
      _push(`<p class="mt-1 text-lg font-semibold text-gray-600 py-auto">Hrs</p></div></div><div class="flex gap-4 pt-4 row"><div class="col-4"><p class="font-semibold py-auto">Full Day Minimum Working Hours Required</p></div><div class="flex gap-4 col-4">`);
      _push(ssrRenderComponent(_component_InputNumber, {
        class: "w-9 h-10",
        modelValue: unref(useAttendanceStore).shiftDetails.fullday_min_workhrs,
        "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.fullday_min_workhrs = $event,
        inputId: "minmax",
        min: 0,
        max: 24
      }, null, _parent));
      _push(`<p class="mt-1 text-lg font-semibold text-gray-600 py-auto">Hrs</p></div></div><div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/WorkingHours/WorkingHours.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const LateEarlyGoing_vue_vue_type_style_index_0_lang = "";
const _sfc_main$5 = {
  __name: "LateEarlyGoing",
  __ssrInlineRender: true,
  setup(__props) {
    const useAttendanceStore = useAttendanceSettingMainStore();
    ref("center");
    ref(false);
    const lateComingLop = ref();
    const earlyGoingLop = ref();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputNumber = resolveComponent("InputNumber");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full p-6 my-4 shadow-sm rounded-xl bg-blue-50" }, _attrs))}><div class="flex gap-4 pt-1 row"><div class="col-5"><p class="font-semibold py-auto">Does Your company have a late coming LOP Policy</p></div><div class="flex gap-4 col-1"><div class="mt-1"><input style="${ssrRenderStyle({ "height": "18px", "width": "18px" })}" class="form-check-input" type="radio" name="leave" value="1"${ssrIncludeBooleanAttr(ssrLooseEqual(lateComingLop.value, "1")) ? " checked" : ""}></div><div><p class="font-semibold">Yes</p></div></div><div class="flex gap-4 col-1"><div class="mt-1"><input style="${ssrRenderStyle({ "height": "18px", "width": "18px" })}" class="form-check-input" type="radio" name="leave" value="0"${ssrIncludeBooleanAttr(ssrLooseEqual(lateComingLop.value, "0")) ? " checked" : ""}></div><div><p class="font-semibold">No</p></div></div>`);
      if (lateComingLop.value == "1") {
        _push(`<div class="row"><div class="flex col-5"><div><p class="my-2.5 text-lg font-semibold">The number of late comings allowed in month</p></div><div class="col-2">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.lclp_number_of_late_commings_allowed_Month,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.lclp_number_of_late_commings_allowed_Month = $event,
          inputId: "minmax",
          min: 0,
          max: 24
        }, null, _parent));
        _push(`</div><div><p class="my-2.5 text-lg font-semibold text-gray-600 mx-4">Times</p></div></div><div class="flex bg-orange-100 rounded-lg col-5"><div class=""><p class="my-2.5 text-gray-700 text-lg font-semibold">Once Exceed The Late LOP Limit </p></div><div class="col-2">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.lclp_Once_Exceed_TheLate_Limit_Days_Lop_Apply,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.lclp_Once_Exceed_TheLate_Limit_Days_Lop_Apply = $event,
          inputId: "minmax",
          min: 0,
          max: 24
        }, null, _parent));
        _push(`</div><div class=""><p class="my-2.5 text-lg font-semibold text-gray-600 mx-4">Days LOP Apply</p></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="flex gap-4 pt-4 row"><div class="col-5"><p class="font-semibold py-auto">Does Your company have a early going LOP Policy</p></div><div class="flex gap-4 col-1"><div class="mt-1"><input style="${ssrRenderStyle({ "height": "18px", "width": "18px" })}" class="form-check-input" type="radio" name="leave" value="1"${ssrIncludeBooleanAttr(ssrLooseEqual(earlyGoingLop.value, "1")) ? " checked" : ""}></div><div><p class="font-semibold">Yes</p></div></div><div class="flex gap-4 col-1"><div class="mt-1"><input style="${ssrRenderStyle({ "height": "18px", "width": "18px" })}" class="form-check-input" type="radio" name="leave" value="0"${ssrIncludeBooleanAttr(ssrLooseEqual(earlyGoingLop.value, "0")) ? " checked" : ""}></div><div><p class="font-semibold">No</p></div></div></div>`);
      if (earlyGoingLop.value == "1") {
        _push(`<div class="my-4 row"><div class="flex col-5"><div><p class="my-2.5 text-lg font-semibold">The number of late comings allowed in month</p></div><div class="col-2">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.eglp_number_of_late_commings_allowed_Month,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.eglp_number_of_late_commings_allowed_Month = $event,
          inputId: "minmax",
          min: 0,
          max: 24
        }, null, _parent));
        _push(`</div><div><p class="my-2.5 text-lg font-semibold text-gray-600 mx-4">Times</p></div></div><div class="flex bg-orange-100 rounded-lg col-6"><div class=""><p class="my-2.5 text-gray-700 text-lg font-semibold">Once Exceed The Early Going LOP Limit </p></div><div class="col-2">`);
        _push(ssrRenderComponent(_component_InputNumber, {
          class: "h-10",
          modelValue: unref(useAttendanceStore).shiftDetails.eglp__Once_Exceed_TheEarly_Limit_Days_Lop_Apply,
          "onUpdate:modelValue": ($event) => unref(useAttendanceStore).shiftDetails.eglp__Once_Exceed_TheEarly_Limit_Days_Lop_Apply = $event,
          inputId: "minmax",
          min: 0,
          max: 24
        }, null, _parent));
        _push(`</div><div class=""><p class="my-2.5 text-lg font-semibold text-gray-600 mx-4">Days LOP Apply</p></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="my-3 text-end"><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md me-4">Previous</button><button class="px-4 py-2 text-center text-white bg-orange-700 rounded-md me-4">Save</button><button class="px-4 py-2 text-center text-orange-600 bg-transparent border border-orange-700 rounded-md">Next</button></div></div>`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/LateEarlyGoing/LateEarlyGoing.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const AddShift_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
  __name: "AddShift",
  __ssrInlineRender: true,
  setup(__props) {
    const useAttendanceStore = useAttendanceSettingMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full pl-1" }, _attrs))}><div class="w-full tabs pl-3 row"><a class="${ssrRenderClass([[unref(useAttendanceStore).manageshift_exemption_steps === 1 ? "active" : ""], "flex px-6 col-lg-2 col-xl-2 col-md-2"])}"><div class="md:text-sm" style="${ssrRenderStyle({ width: "25px" })}">1</div>Shift Details </a><a class="${ssrRenderClass([[unref(useAttendanceStore).manageshift_exemption_steps === 2 ? "active" : ""], "flex px-6 col-lg-2 col-xl-2 col-md-2"])}"><div>2</div>Break Time Range </a><a class="${ssrRenderClass([[unref(useAttendanceStore).manageshift_exemption_steps === 3 ? "active" : ""], "flex px-6 col-lg-2 col-xl-2 col-md-2"])}"><div>3</div>Working Hours </a><a class="${ssrRenderClass([[unref(useAttendanceStore).manageshift_exemption_steps === 4 ? "active" : ""], "flex px-2 col-lg-2 col-xl-2 col-md-2"])}"><div>4</div>Late Coming &amp; Early Going </a></div><div class="bg-white rounded-md">`);
      if (unref(useAttendanceStore).manageshift_exemption_steps === 1) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$8, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(useAttendanceStore).manageshift_exemption_steps === 2) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(useAttendanceStore).manageshift_exemption_steps === 3) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(useAttendanceStore).manageshift_exemption_steps === 4) {
        _push(`<div class="tabcontent">`);
        _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/AddShift/AddShift.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const ManageShift_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "ManageShift",
  __ssrInlineRender: true,
  setup(__props) {
    const canShowAssignShift = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><div class="flex justify-between"><div></div><div class=""><button class="mx-4 my-4 btn btn-orange"><i class="fa fa-plus-circle me-2"></i>Add Shift </button></div></div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        class: "w-full",
        value: _ctx.att_emp_details,
        selection: _ctx.selectedEmployees,
        "onUpdate:selection": ($event) => _ctx.selectedEmployees = $event,
        paginator: "",
        rows: 5,
        rowsPerPageOptions: [5, 10, 20, 50],
        paginatorTemplate: "RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",
        currentPageReportTemplate: "{first} to {last} of {totalRecords}"
      }, {
        empty: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee found `);
          } else {
            return [
              createTextVNode(" No Employee found ")
            ];
          }
        }),
        loading: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading employee data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading employee data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "emp_code",
              header: "Shift Name",
              style: { "min-width": "2rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.emp_code)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "employee_name",
              header: "Shift Code",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.employee_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "designation",
              header: "Is Default",
              style: { "min-width": "10rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.designation)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.designation), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "Assigned To",
              header: "Assigned To"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.department_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "work_location",
              header: "Actions"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.work_location)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "emp_code",
                header: "Shift Name",
                style: { "min-width": "2rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "employee_name",
                header: "Shift Code",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "designation",
                header: "Is Default",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.designation), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "Assigned To",
                header: "Assigned To"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "work_location",
                header: "Actions"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: canShowAssignShift.value,
        "onUpdate:visible": ($event) => canShowAssignShift.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "90vw", borderTop: "5px solid #002f56", background: "navy" },
        class: "bg-primary-900"
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="modal-title fs-21"${_scopeId}> Add Shift</h6>`);
          } else {
            return [
              createVNode("h6", { class: "modal-title fs-21" }, " Add Shift")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}>`);
            _push2(ssrRenderComponent(_sfc_main$4, null, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode(_sfc_main$4)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/ManageShift/ManageShift.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const RotationalShift_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
  __name: "RotationalShift",
  __ssrInlineRender: true,
  setup(__props) {
    let canShowRotationalShift = ref(false);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full" }, _attrs))}><div class="flex justify-between"><div><button class="float-right mx-4 my-3 cursor-pointer btn btn-orange"><i class="fa fa-plus-circle me-2"></i>Add Shift </button></div></div><div>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: _ctx.att_emp_details,
        selection: _ctx.selectedEmployees,
        "onUpdate:selection": ($event) => _ctx.selectedEmployees = $event,
        paginator: true,
        rows: 5,
        dataKey: "emp_code",
        rowsPerPageOptions: [5, 10, 25],
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        filters: _ctx.filters,
        "onUpdate:filters": ($event) => _ctx.filters = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"]
      }, {
        empty: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee found `);
          } else {
            return [
              createTextVNode(" No Employee found ")
            ];
          }
        }),
        loading: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading employee data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading employee data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "emp_code",
              header: "Shift Name",
              style: { "min-width": "2rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.emp_code)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "employee_name",
              header: "Shift Code",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.employee_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "designation",
              header: "Is Default",
              style: { "min-width": "10rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.designation)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.designation), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "Assigned To",
              header: "Assigned To"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.department_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "work_location",
              header: "Actions"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.work_location)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "emp_code",
                header: "Shift Name",
                style: { "min-width": "2rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "employee_name",
                header: "Shift Code",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "designation",
                header: "Is Default",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.designation), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "Assigned To",
                header: "Assigned To"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "work_location",
                header: "Actions"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(canShowRotationalShift),
        "onUpdate:visible": ($event) => isRef(canShowRotationalShift) ? canShowRotationalShift.value = $event : canShowRotationalShift = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "50vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: false
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="modal-title fs-21"${_scopeId}> Add Rotational Shift</h6>`);
          } else {
            return [
              createVNode("h6", { class: "modal-title fs-21" }, " Add Rotational Shift")
            ];
          }
        }),
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn btn-border-primary"${_scopeId}>Close</button><button class="btn btn-orange"${_scopeId}>Save</button>`);
          } else {
            return [
              createVNode("button", { class: "btn btn-border-primary" }, "Close"),
              createVNode("button", { class: "btn btn-orange" }, "Save")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="my-3 row"${_scopeId}><div class="col-5"${_scopeId}><p class="text-lg font-semibold"${_scopeId}>Name</p></div><div class="col-4"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: _ctx.txt_shift_name,
              "onUpdate:modelValue": ($event) => _ctx.txt_shift_name = $event,
              placeholder: "Enter the shift name",
              class: "w-full"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="my-3 row"${_scopeId}><div class="col-5"${_scopeId}><p class="text-lg font-semibold"${_scopeId}>Choose the rotation option</p></div><div class="col-4"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              editable: "",
              optionLabel: "name",
              optionValue: "name",
              placeholder: "Choose Rotational Shift ",
              class: "w-full p-error"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="my-3 row"${_scopeId}><div class="col-5"${_scopeId}><p class="text-lg font-semibold"${_scopeId}>Select the shifts to be rotated</p><div class="flex mt-2"${_scopeId}><input type="checkbox" name="" id=""${_scopeId}><p class="mx-2 my-2 text-lg font-semibold"${_scopeId}> General Shift</p></div><div class="flex my-1"${_scopeId}><input type="checkbox" name="" id=""${_scopeId}><p class="mx-2 my-2 text-lg font-semibold"${_scopeId}> Night Shift</p></div><div class="flex"${_scopeId}><input type="checkbox" name="" id=""${_scopeId}><p class="mx-2 my-2 text-lg font-semibold"${_scopeId}> Other Shift</p></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "my-3 row" }, [
                createVNode("div", { class: "col-5" }, [
                  createVNode("p", { class: "text-lg font-semibold" }, "Name")
                ]),
                createVNode("div", { class: "col-4" }, [
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: _ctx.txt_shift_name,
                    "onUpdate:modelValue": ($event) => _ctx.txt_shift_name = $event,
                    placeholder: "Enter the shift name",
                    class: "w-full"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ]),
              createVNode("div", { class: "my-3 row" }, [
                createVNode("div", { class: "col-5" }, [
                  createVNode("p", { class: "text-lg font-semibold" }, "Choose the rotation option")
                ]),
                createVNode("div", { class: "col-4" }, [
                  createVNode(_component_Dropdown, {
                    editable: "",
                    optionLabel: "name",
                    optionValue: "name",
                    placeholder: "Choose Rotational Shift ",
                    class: "w-full p-error"
                  })
                ])
              ]),
              createVNode("div", { class: "my-3 row" }, [
                createVNode("div", { class: "col-5" }, [
                  createVNode("p", { class: "text-lg font-semibold" }, "Select the shifts to be rotated"),
                  createVNode("div", { class: "flex mt-2" }, [
                    createVNode("input", {
                      type: "checkbox",
                      name: "",
                      id: ""
                    }),
                    createVNode("p", { class: "mx-2 my-2 text-lg font-semibold" }, " General Shift")
                  ]),
                  createVNode("div", { class: "flex my-1" }, [
                    createVNode("input", {
                      type: "checkbox",
                      name: "",
                      id: ""
                    }),
                    createVNode("p", { class: "mx-2 my-2 text-lg font-semibold" }, " Night Shift")
                  ]),
                  createVNode("div", { class: "flex" }, [
                    createVNode("input", {
                      type: "checkbox",
                      name: "",
                      id: ""
                    }),
                    createVNode("p", { class: "mx-2 my-2 text-lg font-semibold" }, " Other Shift")
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/RotationalShift/RotationalShift.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const FlexibleShift_vue_vue_type_style_index_0_scoped_143728a9_lang = "";
const _sfc_main$1 = {
  __name: "FlexibleShift",
  __ssrInlineRender: true,
  setup(__props) {
    let att_emp_details = ref();
    ref(false);
    let canShowLoadingScreen = ref(false);
    let selectedEmployees = ref();
    let txt_shift_name = ref();
    useConfirm();
    useToast();
    const selectedCity = ref();
    const cities = ref([
      { name: "New York", code: "NY" },
      { name: "Rome", code: "RM" },
      { name: "London", code: "LDN" },
      { name: "Istanbul", code: "IST" },
      { name: "Paris", code: "PRS" }
    ]);
    const filters = ref({
      global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      emp_code: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      employee_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      designation: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      department_name: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      },
      location: {
        value: null,
        matchMode: FilterMatchMode.STARTS_WITH,
        matchMode: FilterMatchMode.EQUALS,
        matchMode: FilterMatchMode.CONTAINS
      }
    });
    const loading = ref(true);
    onMounted(() => {
      ajax_GetEmployeeDetails();
    });
    function ajax_GetEmployeeDetails() {
      let url = window.location.origin + "/attendance_settings/fetch-emp-details";
      console.log("AJAX URL : " + url);
      axios.get(url).then((response) => {
        console.log("Axios : " + response.data);
        att_emp_details.value = response.data;
        loading.value = false;
      });
    }
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Strong = resolveComponent("Strong");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputText = resolveComponent("InputText");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card" }, _attrs))} data-v-143728a9><div class="w-full pr-8" data-v-143728a9><div class="flex row" data-v-143728a9><div class="p-2 mx-4 my-4 rounded-lg bg-red-50 col-8" data-v-143728a9><p data-v-143728a9>`);
      _push(ssrRenderComponent(_component_Strong, { class: "text-lg font-semibold text-orange-400" }, {
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`Note:`);
          } else {
            return [
              createTextVNode("Note:")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<span class="mx-2 text-lg font-semibold text-gray-600" data-v-143728a9>Below assigned employees are able to work any shift that the company offers.</span></p></div><div class="col-3" data-v-143728a9><button class="float-right mx-4 my-4 cursor-pointer btn btn-orange" data-v-143728a9><i class="fa fa-plus-circle me-2" data-v-143728a9></i>Add Shift </button></div></div><div data-v-143728a9>`);
      _push(ssrRenderComponent(_component_DataTable, {
        value: unref(att_emp_details),
        selection: unref(selectedEmployees),
        "onUpdate:selection": ($event) => isRef(selectedEmployees) ? selectedEmployees.value = $event : selectedEmployees = $event,
        paginator: true,
        rows: 5,
        dataKey: "emp_code",
        rowsPerPageOptions: [5, 10, 25],
        paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
        filters: filters.value,
        "onUpdate:filters": ($event) => filters.value = $event,
        filterDisplay: "menu",
        loading: _ctx.loading2,
        globalFilterFields: ["name", "status"]
      }, {
        empty: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` No Employee found `);
          } else {
            return [
              createTextVNode(" No Employee found ")
            ];
          }
        }),
        loading: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Loading employee data. Please wait. `);
          } else {
            return [
              createTextVNode(" Loading employee data. Please wait. ")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "emp_code",
              header: "Shift Name",
              style: { "min-width": "2rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.emp_code)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "employee_name",
              header: "Shift Code",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.employee_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "designation",
              header: "Is Default",
              style: { "min-width": "10rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.designation)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.designation), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "Assigned To",
              header: "Assigned To"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.department_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              style: { "min-width": "10rem" },
              field: "work_location",
              header: "Actions"
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.work_location)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "emp_code",
                header: "Shift Name",
                style: { "min-width": "2rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "employee_name",
                header: "Shift Code",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "designation",
                header: "Is Default",
                style: { "min-width": "10rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.designation), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "Assigned To",
                header: "Assigned To"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                style: { "min-width": "10rem" },
                field: "work_location",
                header: "Actions"
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(canShowLoadingScreen),
        "onUpdate:visible": ($event) => isRef(canShowLoadingScreen) ? canShowLoadingScreen.value = $event : canShowLoadingScreen = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "100vw", borderTop: "5px solid #002f56" },
        modal: true,
        closable: true,
        closeOnEscape: false
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex" data-v-143728a9${_scopeId}><h6 class="mx-2 my-2 modal-title fs-21" data-v-143728a9${_scopeId}> Assigned To</h6><div class="p-2.5 mx-2 rounded-lg bg-red-50" data-v-143728a9${_scopeId}><p data-v-143728a9${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Strong, { class: "text-lg" }, {
              default: withCtx((_3, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`Note:`);
                } else {
                  return [
                    createTextVNode("Note:")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`<span class="text-lg font-semibold text-gray-600" data-v-143728a9${_scopeId}>Flexible Shift employees are able to work any shift that the company offers.</span></p></div></div>`);
          } else {
            return [
              createVNode("div", { class: "flex" }, [
                createVNode("h6", { class: "mx-2 my-2 modal-title fs-21" }, " Assigned To"),
                createVNode("div", { class: "p-2.5 mx-2 rounded-lg bg-red-50" }, [
                  createVNode("p", null, [
                    createVNode(_component_Strong, { class: "text-lg" }, {
                      default: withCtx(() => [
                        createTextVNode("Note:")
                      ]),
                      _: 1
                    }),
                    createVNode("span", { class: "text-lg font-semibold text-gray-600" }, "Flexible Shift employees are able to work any shift that the company offers.")
                  ])
                ])
              ])
            ];
          }
        }),
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button class="btn btn-border-primary" data-v-143728a9${_scopeId}>Close</button><button class="btn btn-orange" data-v-143728a9${_scopeId}>Save</button>`);
          } else {
            return [
              createVNode("button", { class: "btn btn-border-primary" }, "Close"),
              createVNode("button", { class: "btn btn-orange" }, "Save")
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex justify-between mx-4" data-v-143728a9${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: selectedCity.value,
              "onUpdate:modelValue": ($event) => selectedCity.value = $event,
              options: cities.value,
              optionLabel: "name",
              placeholder: "Select a Department",
              class: "w-full md:w-14rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: selectedCity.value,
              "onUpdate:modelValue": ($event) => selectedCity.value = $event,
              options: cities.value,
              optionLabel: "name",
              placeholder: "Select a Designation",
              class: "w-full md:w-14rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: selectedCity.value,
              "onUpdate:modelValue": ($event) => selectedCity.value = $event,
              options: cities.value,
              optionLabel: "name",
              placeholder: "Select a Location",
              class: "w-full md:w-14rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: selectedCity.value,
              "onUpdate:modelValue": ($event) => selectedCity.value = $event,
              options: cities.value,
              optionLabel: "name",
              placeholder: "Select a State",
              class: "w-full md:w-14rem"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: selectedCity.value,
              "onUpdate:modelValue": ($event) => selectedCity.value = $event,
              options: cities.value,
              optionLabel: "name",
              placeholder: "Select a Legal Entity",
              class: "w-full md:w-14rem"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="mx-4" data-v-143728a9${_scopeId}>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: unref(txt_shift_name),
              "onUpdate:modelValue": ($event) => isRef(txt_shift_name) ? txt_shift_name.value = $event : txt_shift_name = $event,
              placeholder: "Search...",
              class: "my-4"
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_DataTable, {
              value: unref(att_emp_details),
              selection: unref(selectedEmployees),
              "onUpdate:selection": ($event) => isRef(selectedEmployees) ? selectedEmployees.value = $event : selectedEmployees = $event,
              paginator: true,
              rows: 2,
              dataKey: "emp_code",
              rowsPerPageOptions: [5, 10, 25],
              paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
              currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
              filters: filters.value,
              "onUpdate:filters": ($event) => filters.value = $event,
              filterDisplay: "menu",
              loading: _ctx.loading2,
              globalFilterFields: ["name", "status"]
            }, {
              empty: withCtx((_3, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(` No Employee found `);
                } else {
                  return [
                    createTextVNode(" No Employee found ")
                  ];
                }
              }),
              loading: withCtx((_3, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(` Loading employee data. Please wait. `);
                } else {
                  return [
                    createTextVNode(" Loading employee data. Please wait. ")
                  ];
                }
              }),
              default: withCtx((_3, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Column, { selectionMode: "multiple" }, null, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "emp_code",
                    header: "Employee ID",
                    style: { "min-width": "2rem" }
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.emp_code)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "employee_name",
                    header: "Employee Name",
                    style: { "min-width": "8rem" }
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.employee_name)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    field: "designation",
                    header: "Designation",
                    style: { "min-width": "10rem" }
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.designation)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.designation), 1)
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    style: { "min-width": "10rem" },
                    field: "department_name",
                    header: "Department"
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.department_name)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    style: { "min-width": "10rem" },
                    field: "work_location",
                    header: "Location"
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.work_location)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                  _push3(ssrRenderComponent(_component_Column, {
                    style: { "min-width": "10rem" },
                    field: "work_location",
                    header: "State"
                  }, {
                    body: withCtx((slotProps, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`${ssrInterpolate(slotProps.data.work_location)}`);
                      } else {
                        return [
                          createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                        ];
                      }
                    }),
                    _: 1
                  }, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Column, { selectionMode: "multiple" }),
                    createVNode(_component_Column, {
                      field: "emp_code",
                      header: "Employee ID",
                      style: { "min-width": "2rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "employee_name",
                      header: "Employee Name",
                      style: { "min-width": "8rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "designation",
                      header: "Designation",
                      style: { "min-width": "10rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.designation), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      style: { "min-width": "10rem" },
                      field: "department_name",
                      header: "Department"
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      style: { "min-width": "10rem" },
                      field: "work_location",
                      header: "Location"
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      style: { "min-width": "10rem" },
                      field: "work_location",
                      header: "State"
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                      ]),
                      _: 1
                    })
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "flex justify-between mx-4" }, [
                createVNode(_component_Dropdown, {
                  modelValue: selectedCity.value,
                  "onUpdate:modelValue": ($event) => selectedCity.value = $event,
                  options: cities.value,
                  optionLabel: "name",
                  placeholder: "Select a Department",
                  class: "w-full md:w-14rem"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options"]),
                createVNode(_component_Dropdown, {
                  modelValue: selectedCity.value,
                  "onUpdate:modelValue": ($event) => selectedCity.value = $event,
                  options: cities.value,
                  optionLabel: "name",
                  placeholder: "Select a Designation",
                  class: "w-full md:w-14rem"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options"]),
                createVNode(_component_Dropdown, {
                  modelValue: selectedCity.value,
                  "onUpdate:modelValue": ($event) => selectedCity.value = $event,
                  options: cities.value,
                  optionLabel: "name",
                  placeholder: "Select a Location",
                  class: "w-full md:w-14rem"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options"]),
                createVNode(_component_Dropdown, {
                  modelValue: selectedCity.value,
                  "onUpdate:modelValue": ($event) => selectedCity.value = $event,
                  options: cities.value,
                  optionLabel: "name",
                  placeholder: "Select a State",
                  class: "w-full md:w-14rem"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options"]),
                createVNode(_component_Dropdown, {
                  modelValue: selectedCity.value,
                  "onUpdate:modelValue": ($event) => selectedCity.value = $event,
                  options: cities.value,
                  optionLabel: "name",
                  placeholder: "Select a Legal Entity",
                  class: "w-full md:w-14rem"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
              ]),
              createVNode("div", { class: "mx-4" }, [
                createVNode(_component_InputText, {
                  type: "text",
                  modelValue: unref(txt_shift_name),
                  "onUpdate:modelValue": ($event) => isRef(txt_shift_name) ? txt_shift_name.value = $event : txt_shift_name = $event,
                  placeholder: "Search...",
                  class: "my-4"
                }, null, 8, ["modelValue", "onUpdate:modelValue"]),
                createVNode(_component_DataTable, {
                  value: unref(att_emp_details),
                  selection: unref(selectedEmployees),
                  "onUpdate:selection": ($event) => isRef(selectedEmployees) ? selectedEmployees.value = $event : selectedEmployees = $event,
                  paginator: true,
                  rows: 2,
                  dataKey: "emp_code",
                  rowsPerPageOptions: [5, 10, 25],
                  paginatorTemplate: "CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown",
                  currentPageReportTemplate: "Showing {first} to {last} of {totalRecords}",
                  filters: filters.value,
                  "onUpdate:filters": ($event) => filters.value = $event,
                  filterDisplay: "menu",
                  loading: _ctx.loading2,
                  globalFilterFields: ["name", "status"]
                }, {
                  empty: withCtx(() => [
                    createTextVNode(" No Employee found ")
                  ]),
                  loading: withCtx(() => [
                    createTextVNode(" Loading employee data. Please wait. ")
                  ]),
                  default: withCtx(() => [
                    createVNode(_component_Column, { selectionMode: "multiple" }),
                    createVNode(_component_Column, {
                      field: "emp_code",
                      header: "Employee ID",
                      style: { "min-width": "2rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.emp_code), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "employee_name",
                      header: "Employee Name",
                      style: { "min-width": "8rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.employee_name), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      field: "designation",
                      header: "Designation",
                      style: { "min-width": "10rem" }
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.designation), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      style: { "min-width": "10rem" },
                      field: "department_name",
                      header: "Department"
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.department_name), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      style: { "min-width": "10rem" },
                      field: "work_location",
                      header: "Location"
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                      ]),
                      _: 1
                    }),
                    createVNode(_component_Column, {
                      style: { "min-width": "10rem" },
                      field: "work_location",
                      header: "State"
                    }, {
                      body: withCtx((slotProps) => [
                        createTextVNode(toDisplayString(slotProps.data.work_location), 1)
                      ]),
                      _: 1
                    })
                  ]),
                  _: 1
                }, 8, ["value", "selection", "onUpdate:selection", "filters", "onUpdate:filters", "loading"])
              ])
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/FlexibleShift/FlexibleShift.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const FlexibleShift = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["__scopeId", "data-v-143728a9"]]);
const Attendance_setting_Master_vue_vue_type_style_index_0_scoped_d97fb7d3_lang = "";
const _sfc_main = {
  __name: "Attendance_setting_Master",
  __ssrInlineRender: true,
  setup(__props) {
    const useAttendanceStore = useAttendanceSettingMainStore();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_ConfirmDialog = resolveComponent("ConfirmDialog");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_ConfirmDialog, null, null, _parent));
      _push(`<div class="mb-1" data-v-d97fb7d3><div class="mb-2 shadow card left-line" data-v-d97fb7d3><div class="pt-1 pb-0 card-body" data-v-d97fb7d3><ul class="divide-x nav nav-pills divide-solid nav-tabs-dashed" role="tablist" data-v-d97fb7d3><li class="nav-item text-muted" role="presentation" data-v-d97fb7d3><button class="pb-2 nav-link active" id="pills-offer-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-pending" type="button" role="tab" aria-controls="pills-home" aria-selected="true" data-v-d97fb7d3>Manage Shifts</button></li><li class="mx-4 nav-item text-muted" role="presentation" data-v-d97fb7d3><button class="pb-2 nav-link" id="pills-offer-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-completed" type="button" role="tab" aria-controls="pills-home" aria-selected="true" data-v-d97fb7d3>Flexible Shifts</button></li><li class="nav-item text-muted" role="presentation" data-v-d97fb7d3><button class="pb-2 nav-link" id="pills-offer-resent-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-resent" type="button" role="tab" aria-controls="pills-home" aria-selected="true" data-v-d97fb7d3>Rotational Shifts</button></li><li class="mx-4 nav-item text-muted" role="presentation" data-v-d97fb7d3><button class="pb-2 nav-link" id="pills-offer-holidays-tab" data-bs-toggle="pill" data-bs-target="#pills-offer-holidays" type="button" role="tab" aria-controls="pills-home" aria-selected="true" data-v-d97fb7d3>Holidays</button></li></ul></div></div><div class="tab-content" id="pills-tabContent" data-v-d97fb7d3><div class="tab-pane fade show active" id="pills-offer-pending" role="tabpanel" aria-labelledby="pills-offer-pending-tab" data-v-d97fb7d3><div class="card-body" data-v-d97fb7d3><div class="offer-pending-content" data-v-d97fb7d3>`);
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-completed" role="tabpanel" aria-labelledby="pills-offer-completed-tab" data-v-d97fb7d3><div class="card-body" data-v-d97fb7d3><div class="my-4 offer-pending-content" data-v-d97fb7d3>`);
      _push(ssrRenderComponent(FlexibleShift, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-resent" role="tabpanel" aria-labelledby="pills-offer-resent-tab" data-v-d97fb7d3><div class="card-body" data-v-d97fb7d3><div class="offer-pending-content" data-v-d97fb7d3>`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div></div></div><div class="tab-pane fade" id="pills-offer-holidays" role="tabpanel" aria-labelledby="pills-offer-holidays-tab" data-v-d97fb7d3><div class="card-body" data-v-d97fb7d3><div class="offer-pending-content" data-v-d97fb7d3>`);
      _push(ssrRenderComponent(_sfc_main$9, null, null, _parent));
      _push(`</div></div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(useAttendanceStore).canShowLoading,
        "onUpdate:visible": ($event) => unref(useAttendanceStore).canShowLoading = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
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
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}" data-v-d97fb7d3${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/attendance_settings/Attendance_setting_Master.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const Attendance_master = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-d97fb7d3"]]);
const app = createApp(Attendance_master);
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
app.component("Checkbox", Checkbox);
app.component("MultiSelect", MultiSelect);
app.component("InputNumber", InputNumber);
app.mount("#vjs_attendance_master");
