import { inject, reactive, ref, useSSRContext, onMounted, computed, resolveComponent, unref, withCtx, createVNode, toDisplayString, createTextVNode, openBlock, createBlock, createCommentVNode, withDirectives, vModelRadio } from "vue";
import { ssrRenderComponent, ssrRenderStyle, ssrInterpolate, ssrIncludeBooleanAttr, ssrLooseEqual, ssrRenderClass } from "vue/server-renderer";
import axios from "axios";
import useValidate from "@vuelidate/core";
import { required, helpers } from "@vuelidate/validators";
import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";
import moment from "moment";
import { S as Service } from "./Service83237.js";
inject("$swal");
const useLeaveService = defineStore("useLeaveService", () => {
  const toast = useToast();
  const service = Service();
  const leave_data = reactive({
    current_login_user: "",
    selected_leave: "",
    full_day_leave_date: "",
    half_day_leave_date: "",
    half_day_leave_session: "",
    radiobtn_full_day: "",
    radiobtn_half_day: "",
    radiobtn_custom: "",
    custom_start_date: "",
    custom_end_date: "",
    custom_total_days: "",
    permission_date: "",
    permission_start_time: "",
    permission_total_time: "",
    permission_end_time: "",
    compensatory_leaves: "",
    compensatory_leaves_dates: "",
    selected_compensatory_leaves: "",
    compensatory_start_date: "",
    compensatory_total_days: "",
    compensatory_end_date: "",
    notifyTo: "",
    leave_reason: "",
    leave_request_error_message: ""
  });
  const leaveApplyDailog = ref(false);
  const TotalNoOfDays = ref(true);
  const full_day_format = ref(true);
  const half_day_format = ref(false);
  const custom_format = ref(false);
  const Permission_format = ref(false);
  const compensatory_format = ref(false);
  const invalidDates = ref();
  const leave_types = ref();
  let today = new Date();
  const RequiredField = ref(false);
  const data_checking = ref(false);
  const Email_Service = ref(false);
  const Email_Error = ref(false);
  let invalidDate = new Date();
  invalidDate.setDate(today.getDate() - 1);
  invalidDates.value = [today, invalidDate];
  const selected_compensatory_leaves = ref();
  const full_day = () => {
    leave_data.radiobtn_full_day == "full_day" ? full_day_format.value = true : full_day_format.value = false;
    full_day_format.value = true;
    custom_format.value = false;
    Permission_format.value = false;
    half_day_format.value = false;
    compensatory_format.value = false;
  };
  const half_day = () => {
    leave_data.radiobtn_half_day == "half_day" ? half_day_format.value = true : half_day_format.value = false;
    half_day_format.value = true;
    custom_format.value = false;
    Permission_format.value = false;
    full_day_format.value = false;
    compensatory_format.value = false;
  };
  const custom_day = () => {
    leave_data.radiobtn_custom == "custom" ? custom_format.value = true : custom_format.value = false;
    custom_format.value = true;
    Permission_format.value = false;
    half_day_format.value = false;
    full_day_format.value = false;
    compensatory_format.value = false;
  };
  const dayCalculation = () => {
    if (custom_format.value == true) {
      if (leave_data.custom_start_date.length < 0 || leave_data.custom_start_date == "") {
        toast.add({
          severity: "info",
          summary: "Info Message",
          detail: "Select Start date",
          life: 3e3
        });
      }
    }
    if (Permission_format.value == true) {
      if (leave_data.permission_start_time < 0 || leave_data.permission_start_time == "") {
        toast.add({
          severity: "info",
          summary: "Info Message",
          detail: "Select Start Time",
          life: 3e3
        });
      }
    }
    new Date().toJSON().slice(0, 10);
    var Custom_date1 = new Date(leave_data.custom_start_date);
    console.log(leave_data.custom_start_date);
    var custom_date2 = new Date(leave_data.custom_end_date);
    console.log(leave_data.custom_end_date);
    var Difference_In_Time = custom_date2.getTime() - Custom_date1.getTime();
    console.log("Differenece" + Difference_In_Time);
    var Difference_In_Days = (Difference_In_Time / (1e3 * 60 * 60 * 24)).toFixed(0);
    let total_custom_days = Difference_In_Days;
    console.log(total_custom_days);
    leave_data.custom_total_days = parseInt(total_custom_days) + 1;
    console.log(leave_data.custom_total_days);
    var Compensatory_date1 = new Date(leave_data.compensatory_start_date);
    console.log(leave_data.compensatory_start_date);
    var Compensatory_date2 = new Date(leave_data.compensatory_end_date);
    console.log(leave_data.compensatory_end_date);
    var Difference_In_Time = Compensatory_date2.getTime() - Compensatory_date1.getTime();
    console.log("Differenece" + Difference_In_Time);
    var Difference_In_Days = (Difference_In_Time / (1e3 * 60 * 60 * 24)).toFixed(0);
    let total_Compensatory_days = Difference_In_Days;
    console.log(total_Compensatory_days);
    leave_data.compensatory_total_days = parseInt(total_Compensatory_days) + 1;
    console.log(leave_data.compensatory_total_days);
  };
  const time_difference = () => {
    let selected_date = moment(leave_data.full_day_leave_date).format("YYYY-MM-DD");
    let start_time = leave_data.permission_start_time.toString();
    start_time = selected_date + " " + start_time.substring(16, 24);
    let end_time = leave_data.permission_end_time.toString();
    end_time = selected_date + " " + end_time.substring(16, 24);
    console.log();
    let t1 = new Date(leave_data.permission_start_time).getTime();
    let t2 = new Date(leave_data.permission_end_time).getTime();
    console.log("start" + t1, "end" + t2);
    var total_hours = ((t2 - t1) / 1e3 / 60 / 60).toFixed(0);
    leave_data.permission_total_time = total_hours;
    console.log(total_hours);
  };
  const Permission = () => {
    if (leave_data.selected_leave.includes("Permission")) {
      Permission_format.value = true;
      TotalNoOfDays.value = false;
      half_day_format.value = false;
      custom_format.value = false;
      compensatory_format.value = false;
      full_day_format.value = false;
    } else if (leave_data.selected_leave.includes("Compensatory")) {
      compensatory_format.value = true;
      Permission_format.value = false;
      full_day_format.value = false;
      half_day_format.value = false;
      custom_format.value = false;
      TotalNoOfDays.value = false;
      get_compensatroy_leaves();
      leave_data.compensatory_leaves_dates = moment(leave_data.compensatory_leaves.emp_attendance_date).format(`dddd DD-MMM-YYYY`);
      console.log("kn" + leave_data.compensatory_leaves.emp_attendance_date);
    } else if (leave_data.selected_leave == "Select") {
      compensatory_format.value = false;
      Permission_format.value = false;
      full_day_format.value = true;
      half_day_format.value = false;
      custom_format.value = false;
      TotalNoOfDays.value = true;
    } else {
      Permission_format.value = false;
      compensatory_format.value = false;
      TotalNoOfDays.value = true;
      full_day_format.value = true;
    }
  };
  const get_user = () => {
    axios.get("/currentUser").then((res) => {
      leave_data.current_login_user = res.data;
      data_checking.value = false;
    }).catch((err) => {
      console.log(err);
    });
  };
  const get_leave_types = () => {
    axios.get("/fetch-leave-policy-details").then((res) => {
      console.log(res.data);
      leave_types.value = res.data;
    });
  };
  const get_compensatroy_leaves = () => {
    leave_data.current_login_user;
    axios.get(`/fetch-employee-unused-compensatory-days`).then((res) => {
      leave_data.compensatory_leaves = res.data;
    }).catch((res) => {
      console.log(res);
    });
  };
  const leave_Request_data = reactive({
    leave_type_id: 1,
    leave_Request_date: moment().format("YYYY-MM-DD  HH:mm:ss"),
    leave_type_name: "",
    leave_session: "",
    start_date: "",
    end_date: "",
    no_of_days: "",
    hours_diff: "",
    notify_to: "",
    leave_reason: "",
    compensatory_leave_id: []
  });
  const ReloadPage = () => {
    location.reload();
  };
  const Submit = async () => {
    leave_Request_data.leave_type_name = leave_data.selected_leave;
    if (leave_data.radiobtn_full_day == "full_day") {
      console.log("Full day leave : " + leave_data.full_day_leave_date);
      leave_Request_data.no_of_days = 1;
      leave_Request_data.start_date = moment(leave_data.full_day_leave_date).format("YYYY-MM-DD");
      leave_Request_data.end_date = leave_Request_data.start_date;
      leave_Request_data.leave_session = "";
    } else if (leave_data.radiobtn_half_day == "half_day") {
      console.log("Applying half-day leave on : " + leave_data.half_day_leave_date);
      leave_Request_data.no_of_days = 0.5;
      console.log("half day leave date" + leave_data.half_day_leave_date);
      leave_Request_data.start_date = moment(leave_data.half_day_leave_date).format("YYYY-MM-DD");
      leave_Request_data.end_date = leave_Request_data.start_date;
      if (leave_data.half_day_leave_session == "forenoon") {
        leave_Request_data.leave_session = "FN";
      } else if (leave_data.half_day_leave_session == "afternoon") {
        leave_Request_data.leave_session = "AN";
      } else {
        toast.add({
          severity: "info",
          summary: "Select Session",
          detail: "Select Leave Session",
          life: 3e3
        });
        return;
      }
    } else if (leave_data.radiobtn_custom == "custom") {
      leave_Request_data.start_date = moment(leave_data.custom_start_date).format("YYYY-MM-DD");
      leave_Request_data.end_date = moment(leave_data.custom_end_date).format("YYYY-MM-DD");
      leave_Request_data.no_of_days = leave_data.custom_total_days;
      leave_Request_data.leave_session = "";
    } else if (leave_data.selected_leave.includes("Compensatory")) {
      leave_Request_data.start_date = moment(leave_data.compensatory_start_date).format("YYYY-MM-DD");
      leave_Request_data.end_date = moment(leave_data.compensatory_end_date).format("YYYY-MM-DD");
      leave_Request_data.no_of_days = leave_data.compensatory_total_days;
      let value_selected_compensatory_leaves = Object.values(leave_data.selected_compensatory_leaves).length;
      console.log("Selected Compensatory No.of days : " + leave_data.compensatory_total_days);
      console.log("Selected Compensatory Leaves : " + value_selected_compensatory_leaves);
      const find_compensatory_id = Object.values(leave_data.selected_compensatory_leaves);
      if (parseInt(leave_data.compensatory_total_days) != value_selected_compensatory_leaves) {
        toast.add({
          severity: "info",
          summary: "Error",
          detail: "Compensatory leaves doesnt match with available leave days",
          life: 3e3
        });
        return;
      } else {
        find_compensatory_id.map((data) => {
          let id = data.emp_attendance_id;
          leave_Request_data.compensatory_leave_id.push(id);
          console.log(leave_Request_data.compensatory_leave_id);
        });
      }
    } else if (leave_data.selected_leave.includes("Permission")) {
      leave_Request_data.start_date = moment(leave_data.permission_date).format("YYYY-MM-DD");
      leave_Request_data.end_date = leave_Request_data.start_date;
      leave_Request_data.hours_diff = leave_data.permission_total_time;
    } else {
      toast.add({
        severity: "info",
        summary: "Info Message",
        detail: "Select Leave",
        life: 3e3
      });
    }
    leave_Request_data.notify_to = leave_data.notifyTo;
    leave_Request_data.leave_reason = leave_data.leave_reason;
    RequiredField.value = true;
    console.log(leave_Request_data);
    data_checking.value = true;
    axios.post("/applyLeaveRequest", {
      "user_code": service.current_user_code,
      "leave_request_date": leave_Request_data.leave_Request_date,
      "leave_type_name": leave_Request_data.leave_type_name,
      "leave_session": leave_Request_data.leave_session,
      "start_date": leave_Request_data.start_date,
      "end_date": leave_Request_data.end_date,
      "no_of_days": leave_Request_data.no_of_days,
      "hours_diff": leave_Request_data.hours_diff,
      "compensatory_work_days_ids": leave_Request_data.compensatory_leave_id,
      "notify_to": leave_Request_data.notify_to,
      "leave_reason": leave_Request_data.leave_reason
    }).then((res) => {
      data_checking.value = false;
      console.log(res.data.messege);
      if (res.data.status == "success") {
        Swal.fire(
          "Success",
          res.data.message,
          "success"
        );
      }
      if (res.data.status == "failure") {
        Swal.fire(
          "Failure",
          res.data.message,
          "error"
        );
      }
      console.log("Email status" + res.data.status);
    }).catch((err) => {
      console.log(err);
    }).finally(() => {
      leaveApplyDailog.value = false;
    });
  };
  return {
    leaveApplyDailog,
    leave_data,
    invalidDate,
    today,
    invalidDates,
    toast,
    leave_Request_data,
    leave_types,
    data_checking,
    Email_Service,
    Email_Error,
    selected_compensatory_leaves,
    half_day,
    full_day,
    custom_day,
    Permission,
    Submit,
    ReloadPage,
    dayCalculation,
    time_difference,
    get_user,
    get_leave_types,
    get_compensatroy_leaves,
    full_day_format,
    half_day_format,
    custom_format,
    Permission_format,
    compensatory_format,
    TotalNoOfDays,
    RequiredField
  };
});
const ABS_loading_spinner_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/components/ABS_loading_spinner.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const LeaveApply_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "LeaveApply",
  __ssrInlineRender: true,
  setup(__props) {
    ref(false);
    ref();
    var date = new Date();
    var first_day_of_the_month = new Date(date.getFullYear(), date.getMonth(), 1);
    new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const service = useLeaveService();
    onMounted(() => {
      service.get_user();
      service.get_leave_types();
      service.leave_data.custom_start_date = new Date();
      service.leave_data.permission_start_time = new Date();
    });
    const rules = computed(
      () => {
        return {
          selected_leave: { required }
        };
      }
    );
    const full_day_rules = computed(() => {
      return {
        full_day_leave_date: { required }
      };
    });
    const half_day_rules = computed(() => {
      return {
        half_day_leave_date: { required },
        half_day_leave_session: { required }
      };
    });
    const custom_day_rules = computed(() => {
      return {
        custom_start_date: { required },
        custom_end_date: { required }
      };
    });
    const reason_rules = computed(() => {
      return {
        leave_reason: { required }
      };
    });
    const permissionRules = computed(() => {
      return {
        permission_date: { required },
        permission_start_time: { required },
        permission_total_time: { required },
        permission_end_time: { required }
      };
    });
    const compNegative = (value) => {
      if (value < 0) {
        return false;
      } else {
        return true;
      }
    };
    const compen_day_rules = computed(() => {
      return {
        selected_compensatory_leaves: { required },
        compensatory_start_date: { required },
        compensatory_total_days: { required, compNegative: helpers.withMessage("days not lesser than zero", compNegative) },
        compensatory_end_date: { required }
      };
    });
    const f$ = useValidate(full_day_rules, service.leave_data);
    const h$ = useValidate(half_day_rules, service.leave_data);
    const c$ = useValidate(custom_day_rules, service.leave_data);
    const cp$ = useValidate(compen_day_rules, service.leave_data);
    const r$ = useValidate(reason_rules, service.leave_data);
    const p$ = useValidate(permissionRules, service.leave_data);
    const v$ = useValidate(rules, service.leave_data);
    const submitForm = () => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log(service.leave_data.selected_leave);
        if (service.leave_data.selected_leave.includes("Compensatory")) {
          cp$.value.$validate();
          if (!cp$.value.$error) {
            r$.value.$validate();
            if (!r$.value.$error) {
              service.Submit();
            }
            console.log("Form successfully submitted.");
          } else {
            console.log("Form failed validation");
          }
        }
        if (service.leave_data.radiobtn_full_day == "full_day") {
          f$.value.$validate();
          if (!f$.value.$error) {
            r$.value.$validate();
            if (!r$.value.$error) {
              service.Submit();
            }
            console.log("Form successfully submitted.");
          } else {
            console.log("Form failed validation");
          }
        }
        if (service.leave_data.radiobtn_half_day == "half_day") {
          h$.value.$validate();
          if (!h$.value.$error) {
            console.log("Form successfully submitted.");
            r$.value.$validate();
            if (!r$.value.$error) {
              service.Submit();
            }
          } else {
            console.log("Form failed validation");
          }
        }
        if (service.leave_data.radiobtn_custom == "custom") {
          c$.value.$validate();
          if (!c$.value.$error) {
            console.log("Form successfully submitted.");
            r$.value.$validate();
            if (!r$.value.$error) {
              service.Submit();
            }
          } else {
            console.log("Form failed validation");
          }
        }
        if (service.leave_data.selected_leave.includes("Permission")) {
          p$.value.$validate();
          if (!p$.value.$error) {
            r$.value.$validate();
            if (!r$.value.$error) {
              service.Submit();
            }
          } else {
            console.log("Form failed validation");
          }
        }
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_InputText = resolveComponent("InputText");
      const _component_MultiSelect = resolveComponent("MultiSelect");
      const _component_Chips = resolveComponent("Chips");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(ssrRenderComponent(_component_Button, {
        label: "Apply Leave",
        class: "px-2 py-2 border-0 outline-none btn btn-orange",
        onClick: ($event) => unref(service).leaveApplyDailog = true
      }, null, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(service).data_checking,
        "onUpdate:visible": ($event) => unref(service).data_checking = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
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
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
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
        header: "Header",
        visible: unref(service).Email_Service,
        "onUpdate:visible": ($event) => unref(service).Email_Service = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 class="m-auto"${_scopeId}>Leave applied Successfully</h5>`);
          } else {
            return [
              createVNode("h5", { class: "m-auto" }, "Leave applied Successfully")
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="text-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              label: "OK",
              style: { "justify-content": "center" },
              severity: "help",
              onClick: unref(service).ReloadPage,
              raised: "",
              class: "justify-content-center"
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "text-center" }, [
                createVNode(_component_Button, {
                  label: "OK",
                  style: { "justify-content": "center" },
                  severity: "help",
                  onClick: unref(service).ReloadPage,
                  raised: "",
                  class: "justify-content-center"
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(service).Email_Error,
        "onUpdate:visible": ($event) => unref(service).Email_Error = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "25vw" },
        modal: true,
        closable: false,
        closeOnEscape: false
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h5 class="m-auto"${_scopeId}>${ssrInterpolate(unref(service).leave_data.leave_request_error_messege)}</h5>`);
          } else {
            return [
              createVNode("h5", { class: "m-auto" }, toDisplayString(unref(service).leave_data.leave_request_error_messege), 1)
            ];
          }
        }),
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="text-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Button, {
              label: "OK",
              style: { "justify-content": "center" },
              severity: "help",
              onClick: ($event) => unref(service).Email_Error = false,
              raised: "",
              class: "justify-content-center"
            }, null, _parent2, _scopeId));
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "text-center" }, [
                createVNode(_component_Button, {
                  label: "OK",
                  style: { "justify-content": "center" },
                  severity: "help",
                  onClick: ($event) => unref(service).Email_Error = false,
                  raised: "",
                  class: "justify-content-center"
                }, null, 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: unref(service).leaveApplyDailog,
        "onUpdate:visible": ($event) => unref(service).leaveApplyDailog = $event,
        style: { width: "80vw" },
        breakpoints: { "960px": "75vw", "641px": "100vw" }
      }, {
        header: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<h6 class="mb-4 modal-title fs-21"${_scopeId}> Leave Request</h6>`);
          } else {
            return [
              createVNode("h6", { class: "mb-4 modal-title fs-21" }, " Leave Request")
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="row"${_scopeId}><div class="col-md-7 col-sm-12"${_scopeId}><div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><label for=""${_scopeId}>Choose Leave Type <span class="text-danger"${_scopeId}>*</span></label></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              onChange: unref(service).Permission,
              style: { "height": "38px", "font-weight": "500" },
              class: ["w-full", [
                unref(v$).selected_leave.$error ? "p-invalid" : ""
              ]],
              modelValue: unref(service).leave_data.selected_leave,
              "onUpdate:modelValue": ($event) => unref(service).leave_data.selected_leave = $event,
              options: unref(service).leave_types,
              optionLabel: "leave_type",
              optionValue: "leave_type",
              placeholder: "Select Leave Type"
            }, null, _parent2, _scopeId));
            if (unref(v$).selected_leave.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).selected_leave.required.$message.replace("Value", "Leave Type"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div>`);
            if (unref(service).TotalNoOfDays) {
              _push2(`<div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><label for=""${_scopeId}>No of Days<span class="text-danger"${_scopeId}>*</span></label></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-6 mb-md-0"${_scopeId}><div class="form-check form-check-inline"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="leave" id="full_day" value="full_day"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(service).leave_data.radiobtn_full_day, "full_day")) ? " checked" : ""}${_scopeId}><label class="form-check-label leave_type ms-2" for="full_day"${_scopeId}>Full Day</label></div><div class="form-check form-check-inline"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="leave" id="half_day" value="half_day"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(service).leave_data.radiobtn_half_day, "half_day")) ? " checked" : ""}${_scopeId}><label class="form-check-label leave_type ms-2" for="half_day"${_scopeId}>Half Day</label></div><div class="form-check form-check-inline"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" class="form-check-input" type="radio" name="leave" id="custom" value="custom"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(service).leave_data.radiobtn_custom, "custom")) ? " checked" : ""}${_scopeId}><label class="form-check-label leave_type ms-2" for="custom"${_scopeId}>Custom</label></div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(service).full_day_format) {
              _push2(`<div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><label for=""${_scopeId}>Date<span class="text-danger"${_scopeId}>*</span></label></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "icon",
                modelValue: unref(service).leave_data.full_day_leave_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.full_day_leave_date = $event,
                dateFormat: "dd-mm-yy",
                showIcon: true,
                style: { "width": "350px" },
                class: [
                  unref(f$).full_day_leave_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(f$).full_day_leave_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(f$).full_day_leave_date.required.$message.replace("Value", "Date"))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(service).half_day_format) {
              _push2(`<div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><label for=""${_scopeId}>Date<span class="text-danger"${_scopeId}>*</span></label></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "icon",
                modelValue: unref(service).leave_data.half_day_leave_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.half_day_leave_date = $event,
                dateFormat: "dd-mm-yy",
                showIcon: true,
                style: { "width": "350px" },
                class: [
                  unref(h$).half_day_leave_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(h$).half_day_leave_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(h$).half_day_leave_date.required.$message.replace("Value", "Date"))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(service).half_day_format) {
              _push2(`<div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><label for=""${_scopeId}>Session<span class="text-danger"${_scopeId}>*</span></label></div></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-7 mb-md-0 ms-6"${_scopeId}><div class="form-group"${_scopeId}><div class="form-check form-check-inline"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" type="radio" name="session" id="forenoon" value="forenoon"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(service).leave_data.half_day_leave_session, "forenoon")) ? " checked" : ""} class="${ssrRenderClass([[
                unref(h$).half_day_leave_session.$error ? "p-invalid" : ""
              ], "form-check-input"])}"${_scopeId}><label class="form-check-label leave_type ms-3" for="forenoon"${_scopeId}>Forenoon</label></div><div class="form-check form-check-inline"${_scopeId}><input style="${ssrRenderStyle({ "height": "20px", "width": "20px" })}" type="radio" name="session" id="afternoon" value="afternoon"${ssrIncludeBooleanAttr(ssrLooseEqual(unref(service).leave_data.half_day_leave_session, "afternoon")) ? " checked" : ""} class="${ssrRenderClass([[
                unref(h$).half_day_leave_session.$error ? "p-invalid" : ""
              ], "form-check-input"])}"${_scopeId}><label class="form-check-label leave_type ms-3" for="afternoon"${_scopeId}>Afternoon</label></div>`);
              if (unref(h$).half_day_leave_session.$error) {
                _push2(`<div class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(h$).half_day_leave_session.required.$message.replace("Value", "Session "))}</div>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(service).custom_format) {
              _push2(`<div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><div class="floating"${_scopeId}><label for="" class="float-label"${_scopeId}>Start Date</label><br${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "icon",
                dateFormat: "dd-mm-yy",
                showIcon: true,
                modelValue: unref(service).leave_data.custom_start_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.custom_start_date = $event,
                minDate: unref(first_day_of_the_month),
                manualInput: true,
                class: [
                  unref(c$).custom_start_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(c$).custom_start_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(c$).custom_start_date.required.$message.replace("Value", "Start Date "))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div><div class="mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><div class="floating" style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}><label for="" class="float-label"${_scopeId}>Total Days</label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                style: { "width": "60px", "text-align": "center", "margin": "auto" },
                class: "capitalize form-onboard-form form-control textbox",
                type: "text",
                modelValue: unref(service).leave_data.custom_total_days,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.custom_total_days = $event,
                readonly: ""
              }, null, _parent2, _scopeId));
              _push2(`</div></div></div><div class="mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><div class="floating"${_scopeId}><label for="" class="float-label"${_scopeId}>End Day</label><br${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "icon",
                onDateSelect: unref(service).dayCalculation,
                dateFormat: "dd-mm-yy",
                showIcon: true,
                modelValue: unref(service).leave_data.custom_end_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.custom_end_date = $event,
                minDate: unref(first_day_of_the_month),
                class: [
                  unref(c$).custom_end_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(c$).custom_end_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(c$).custom_end_date.required.$message.replace("Value", "End Date "))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(service).Permission_format) {
              _push2(`<div class="mb-2 row"${_scopeId}><div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><label for=""${_scopeId}>Date<span class="text-danger"${_scopeId}>*</span></label></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "icon",
                modelValue: unref(service).leave_data.permission_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_date = $event,
                dateFormat: "dd-mm-yy",
                showIcon: true,
                style: { "width": "350px" },
                maxDate: new Date(),
                class: [
                  unref(p$).permission_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(p$).permission_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).permission_date.required.$message.replace("Value", "Date"))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div><div class="mb-3 col-md-4 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><div class="floating"${_scopeId}><label for="" class="float-label"${_scopeId}>Start time</label><span class="p-input-icon-right"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "time12",
                modelValue: unref(service).leave_data.permission_start_time,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_start_time = $event,
                timeOnly: true,
                hourFormat: "12",
                icon: "your-icon",
                class: [
                  unref(p$).permission_start_time.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              _push2(`<i class="pi pi-clock"${_scopeId}></i></span></div>`);
              if (unref(p$).permission_start_time.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).permission_start_time.required.$message.replace("Value", "Permission start time"))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div><div class="mb-3 col-md-3 mb-md-0 ms-5"${_scopeId}><div class="form-group"${_scopeId}><div class="floating"${_scopeId}><label for="" class="float-label"${_scopeId}>Total Hour</label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                class: "capitalize form-onboard-form form-control textbox",
                type: "text",
                style: { "width": "67px", "text-align": "center" },
                modelValue: unref(service).leave_data.permission_total_time,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_total_time = $event,
                readonly: ""
              }, null, _parent2, _scopeId));
              _push2(`</div></div></div><div class="mb-3 col-md-4 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><div class="floating"${_scopeId}><label for="" class="float-label"${_scopeId}>End time</label><span class="p-input-icon-right"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "time12",
                modelValue: unref(service).leave_data.permission_end_time,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_end_time = $event,
                timeOnly: true,
                hourFormat: "12",
                icon: "your-icon",
                onDateSelect: unref(service).time_difference,
                class: [
                  unref(p$).permission_end_time.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              _push2(`<i class="pi pi-clock"${_scopeId}></i></span></div>`);
              if (unref(p$).permission_end_time.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(p$).permission_end_time.required.$message.replace("Value", "Permission end time"))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (unref(service).compensatory_format) {
              _push2(`<div class="mb-2 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-5 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><label for=""${_scopeId}>Worked Date <span class="text-danger"${_scopeId}>*</span></label></div><div class="mb-3 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_MultiSelect, {
                modelValue: unref(service).leave_data.selected_compensatory_leaves,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.selected_compensatory_leaves = $event,
                options: unref(service).leave_data.compensatory_leaves,
                optionLabel: "emp_attendance_date",
                placeholder: "Select worked Date",
                display: "chip",
                class: ["w-full md:w-full", [
                  unref(cp$).selected_compensatory_leaves.$error ? "p-invalid" : ""
                ]],
                maxSelectedLabels: 5
              }, {
                footer: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div class="px-3 py-2"${_scopeId2}><b${_scopeId2}>${ssrInterpolate(unref(service).leave_data.selected_compensatory_leaves ? unref(service).leave_data.selected_compensatory_leaves.length : 0)}</b> Date${ssrInterpolate((unref(service).leave_data.selected_compensatory_leaves ? unref(service).leave_data.selected_compensatory_leaves.length : 0) > 1 ? "s" : "")} selected. </div>`);
                  } else {
                    return [
                      createVNode("div", { class: "px-3 py-2" }, [
                        createVNode("b", null, toDisplayString(unref(service).leave_data.selected_compensatory_leaves ? unref(service).leave_data.selected_compensatory_leaves.length : 0), 1),
                        createTextVNode(" Date" + toDisplayString((unref(service).leave_data.selected_compensatory_leaves ? unref(service).leave_data.selected_compensatory_leaves.length : 0) > 1 ? "s" : "") + " selected. ", 1)
                      ])
                    ];
                  }
                }),
                _: 1
              }, _parent2, _scopeId));
              _push2(`<p class="opacity-50 fs-10"${_scopeId}>(note:Worked dates will get expired after 60 days)</p>`);
              if (unref(cp$).selected_compensatory_leaves.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(cp$).selected_compensatory_leaves.required.$message.replace("Value", "Compensatory Working Date's "))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div><div class="mb-3 col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mb-md-0"${_scopeId}><div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"${_scopeId}><label for="" class="float-label"${_scopeId}>Start Date</label></div><div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                inputId: "icon",
                dateFormat: "dd-mm-yy",
                showIcon: true,
                modelValue: unref(service).leave_data.compensatory_start_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.compensatory_start_date = $event,
                minDate: unref(first_day_of_the_month),
                class: [
                  unref(cp$).compensatory_start_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(cp$).compensatory_start_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(cp$).compensatory_start_date.required.$message.replace("Value", "Start Date "))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div><div class="mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><div class="floating" style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}><label for="" class="float-label"${_scopeId}>Total Days</label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                style: { "width": "60px", "text-align": "center", "margin": "auto" },
                class: ["capitalize form-onboard-form form-control textbox", [
                  unref(cp$).compensatory_total_days.$error ? "p-invalid" : ""
                ]],
                type: "text",
                modelValue: unref(service).leave_data.compensatory_total_days,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.compensatory_total_days = $event,
                readonly: ""
              }, null, _parent2, _scopeId));
              if (unref(cp$).compensatory_total_days.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(cp$).compensatory_total_days.required.$message.replace("Value", "Value not lesser than zero"))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div><div class="mb-3 col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3"${_scopeId}><div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"${_scopeId}><label for="" class="float-label"${_scopeId}>End Day</label></div><div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12"${_scopeId}>`);
              _push2(ssrRenderComponent(_component_Calendar, {
                onDateSelect: unref(service).dayCalculation,
                inputId: "icon",
                dateFormat: "dd-mm-yy",
                showIcon: true,
                modelValue: unref(service).leave_data.compensatory_end_date,
                "onUpdate:modelValue": ($event) => unref(service).leave_data.compensatory_end_date = $event,
                minDate: unref(first_day_of_the_month),
                class: [
                  unref(cp$).compensatory_end_date.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(cp$).compensatory_end_date.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(cp$).compensatory_end_date.required.$message.replace("Value", "End Date "))}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div></div></div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><label for=""${_scopeId}>Notify to <span class="text-danger"${_scopeId}>*</span></label></div></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Chips, {
              class: "lg:w-1em",
              modelValue: unref(service).leave_data.notifyTo,
              "onUpdate:modelValue": ($event) => unref(service).leave_data.notifyTo = $event,
              separator: ","
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div><div class="mb-3 row"${_scopeId}><div class="mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}><label for=""${_scopeId}>Reason <span class="text-danger"${_scopeId}>*</span></label></div></div><div class="mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0"${_scopeId}><div class="form-group"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              autoResize: true,
              rows: "3",
              cols: "90",
              placeholder: "Enter the Reason",
              modelValue: unref(service).leave_data.leave_reason,
              "onUpdate:modelValue": ($event) => unref(service).leave_data.leave_reason = $event,
              class: ["form-control", [
                unref(r$).leave_reason.$error ? "p-invalid" : ""
              ]]
            }, null, _parent2, _scopeId));
            if (unref(r$).leave_reason.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(r$).leave_reason.required.$message.replace("Value", "Leave Reason"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div></div><div class="col-md-6 col-lg-5 col-sm-12"${_scopeId}><div class="col-lg-12 col-md-12"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              inline: true,
              showWeek: true,
              style: { "min-width": "100%" }
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="mt-6 text-center"${_scopeId}><button type="button" class="btn btn-border-primary"${_scopeId}>Cancel</button><button type="button" id="btn_request_leave" class="btn btn-primary ms-4"${_scopeId}> Request Leave</button></div></div></div>`);
            if (unref(service).leave_data.leave_reason == "") {
              _push2(ssrRenderComponent(_component_Dialog, {
                style: { width: "450px" },
                header: "Required",
                modal: true,
                visible: unref(service).RequiredField,
                "onUpdate:visible": ($event) => unref(service).RequiredField = $event
              }, {
                default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    if (unref(service).leave_data.leave_reason == "") {
                      _push3(`<li${_scopeId2}>Leave Reason</li>`);
                    } else {
                      _push3(`<!---->`);
                    }
                  } else {
                    return [
                      unref(service).leave_data.leave_reason == "" ? (openBlock(), createBlock("li", { key: 0 }, "Leave Reason")) : createCommentVNode("", true)
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
              createVNode("div", { class: "row" }, [
                createVNode("div", { class: "col-md-7 col-sm-12" }, [
                  createVNode("div", { class: "mb-3 row" }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("label", { for: "" }, [
                        createTextVNode("Choose Leave Type "),
                        createVNode("span", { class: "text-danger" }, "*")
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode(_component_Dropdown, {
                          onChange: unref(service).Permission,
                          style: { "height": "38px", "font-weight": "500" },
                          class: ["w-full", [
                            unref(v$).selected_leave.$error ? "p-invalid" : ""
                          ]],
                          modelValue: unref(service).leave_data.selected_leave,
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.selected_leave = $event,
                          options: unref(service).leave_types,
                          optionLabel: "leave_type",
                          optionValue: "leave_type",
                          placeholder: "Select Leave Type"
                        }, null, 8, ["onChange", "modelValue", "onUpdate:modelValue", "options", "class"]),
                        unref(v$).selected_leave.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(v$).selected_leave.required.$message.replace("Value", "Leave Type")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ]),
                  unref(service).TotalNoOfDays ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "mb-3 row"
                  }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("label", { for: "" }, [
                        createTextVNode("No of Days"),
                        createVNode("span", { class: "text-danger" }, "*")
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-6 mb-md-0" }, [
                      createVNode("div", { class: "form-check form-check-inline" }, [
                        withDirectives(createVNode("input", {
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "leave",
                          id: "full_day",
                          value: "full_day",
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.radiobtn_full_day = $event,
                          onClick: unref(service).full_day
                        }, null, 8, ["onUpdate:modelValue", "onClick"]), [
                          [vModelRadio, unref(service).leave_data.radiobtn_full_day]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "full_day"
                        }, "Full Day")
                      ]),
                      createVNode("div", { class: "form-check form-check-inline" }, [
                        withDirectives(createVNode("input", {
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "leave",
                          id: "half_day",
                          value: "half_day",
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.radiobtn_half_day = $event,
                          onClick: unref(service).half_day
                        }, null, 8, ["onUpdate:modelValue", "onClick"]), [
                          [vModelRadio, unref(service).leave_data.radiobtn_half_day]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "half_day"
                        }, "Half Day")
                      ]),
                      createVNode("div", { class: "form-check form-check-inline" }, [
                        withDirectives(createVNode("input", {
                          style: { "height": "20px", "width": "20px" },
                          class: "form-check-input",
                          type: "radio",
                          name: "leave",
                          id: "custom",
                          value: "custom",
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.radiobtn_custom = $event,
                          onClick: unref(service).custom_day
                        }, null, 8, ["onUpdate:modelValue", "onClick"]), [
                          [vModelRadio, unref(service).leave_data.radiobtn_custom]
                        ]),
                        createVNode("label", {
                          class: "form-check-label leave_type ms-2",
                          for: "custom"
                        }, "Custom")
                      ])
                    ])
                  ])) : createCommentVNode("", true),
                  unref(service).full_day_format ? (openBlock(), createBlock("div", {
                    key: 1,
                    class: "mb-3 row"
                  }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("label", { for: "" }, [
                        createTextVNode("Date"),
                        createVNode("span", { class: "text-danger" }, "*")
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0" }, [
                      createVNode(_component_Calendar, {
                        inputId: "icon",
                        modelValue: unref(service).leave_data.full_day_leave_date,
                        "onUpdate:modelValue": ($event) => unref(service).leave_data.full_day_leave_date = $event,
                        dateFormat: "dd-mm-yy",
                        showIcon: true,
                        style: { "width": "350px" },
                        class: [
                          unref(f$).full_day_leave_date.$error ? "p-invalid" : ""
                        ]
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                      unref(f$).full_day_leave_date.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(f$).full_day_leave_date.required.$message.replace("Value", "Date")), 1)) : createCommentVNode("", true)
                    ])
                  ])) : createCommentVNode("", true),
                  unref(service).half_day_format ? (openBlock(), createBlock("div", {
                    key: 2,
                    class: "mb-3 row"
                  }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("label", { for: "" }, [
                        createTextVNode("Date"),
                        createVNode("span", { class: "text-danger" }, "*")
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0" }, [
                      createVNode(_component_Calendar, {
                        inputId: "icon",
                        modelValue: unref(service).leave_data.half_day_leave_date,
                        "onUpdate:modelValue": ($event) => unref(service).leave_data.half_day_leave_date = $event,
                        dateFormat: "dd-mm-yy",
                        showIcon: true,
                        style: { "width": "350px" },
                        class: [
                          unref(h$).half_day_leave_date.$error ? "p-invalid" : ""
                        ]
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                      unref(h$).half_day_leave_date.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(h$).half_day_leave_date.required.$message.replace("Value", "Date")), 1)) : createCommentVNode("", true)
                    ])
                  ])) : createCommentVNode("", true),
                  unref(service).half_day_format ? (openBlock(), createBlock("div", {
                    key: 3,
                    class: "mb-3 row"
                  }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("label", { for: "" }, [
                          createTextVNode("Session"),
                          createVNode("span", { class: "text-danger" }, "*")
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-7 col-xxl-7 mb-md-0 ms-6" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", { class: "form-check form-check-inline" }, [
                          withDirectives(createVNode("input", {
                            style: { "height": "20px", "width": "20px" },
                            class: ["form-check-input", [
                              unref(h$).half_day_leave_session.$error ? "p-invalid" : ""
                            ]],
                            type: "radio",
                            name: "session",
                            id: "forenoon",
                            value: "forenoon",
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.half_day_leave_session = $event
                          }, null, 10, ["onUpdate:modelValue"]), [
                            [vModelRadio, unref(service).leave_data.half_day_leave_session]
                          ]),
                          createVNode("label", {
                            class: "form-check-label leave_type ms-3",
                            for: "forenoon"
                          }, "Forenoon")
                        ]),
                        createVNode("div", { class: "form-check form-check-inline" }, [
                          withDirectives(createVNode("input", {
                            style: { "height": "20px", "width": "20px" },
                            class: ["form-check-input", [
                              unref(h$).half_day_leave_session.$error ? "p-invalid" : ""
                            ]],
                            type: "radio",
                            name: "session",
                            id: "afternoon",
                            value: "afternoon",
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.half_day_leave_session = $event
                          }, null, 10, ["onUpdate:modelValue"]), [
                            [vModelRadio, unref(service).leave_data.half_day_leave_session]
                          ]),
                          createVNode("label", {
                            class: "form-check-label leave_type ms-3",
                            for: "afternoon"
                          }, "Afternoon")
                        ]),
                        unref(h$).half_day_leave_session.$error ? (openBlock(), createBlock("div", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(h$).half_day_leave_session.required.$message.replace("Value", "Session ")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true),
                  unref(service).custom_format ? (openBlock(), createBlock("div", {
                    key: 4,
                    class: "mb-3 row"
                  }, [
                    createVNode("div", { class: "mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", { class: "floating" }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "Start Date"),
                          createVNode("br"),
                          createVNode(_component_Calendar, {
                            inputId: "icon",
                            dateFormat: "dd-mm-yy",
                            showIcon: true,
                            modelValue: unref(service).leave_data.custom_start_date,
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.custom_start_date = $event,
                            minDate: unref(first_day_of_the_month),
                            manualInput: true,
                            class: [
                              unref(c$).custom_start_date.$error ? "p-invalid" : ""
                            ]
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "minDate", "class"]),
                          unref(c$).custom_start_date.$error ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "font-semibold text-red-400 fs-6"
                          }, toDisplayString(unref(c$).custom_start_date.required.$message.replace("Value", "Start Date ")), 1)) : createCommentVNode("", true)
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", {
                          class: "floating",
                          style: { "text-align": "center" }
                        }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "Total Days"),
                          createVNode(_component_InputText, {
                            style: { "width": "60px", "text-align": "center", "margin": "auto" },
                            class: "capitalize form-onboard-form form-control textbox",
                            type: "text",
                            modelValue: unref(service).leave_data.custom_total_days,
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.custom_total_days = $event,
                            readonly: ""
                          }, null, 8, ["modelValue", "onUpdate:modelValue"])
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-1 col-sm-1 col-lg-3 col-xl-4 col-xxl-3 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", { class: "floating" }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "End Day"),
                          createVNode("br"),
                          createVNode(_component_Calendar, {
                            inputId: "icon",
                            onDateSelect: unref(service).dayCalculation,
                            dateFormat: "dd-mm-yy",
                            showIcon: true,
                            modelValue: unref(service).leave_data.custom_end_date,
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.custom_end_date = $event,
                            minDate: unref(first_day_of_the_month),
                            class: [
                              unref(c$).custom_end_date.$error ? "p-invalid" : ""
                            ]
                          }, null, 8, ["onDateSelect", "modelValue", "onUpdate:modelValue", "minDate", "class"]),
                          unref(c$).custom_end_date.$error ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "font-semibold text-red-400 fs-6"
                          }, toDisplayString(unref(c$).custom_end_date.required.$message.replace("Value", "End Date ")), 1)) : createCommentVNode("", true)
                        ])
                      ])
                    ])
                  ])) : createCommentVNode("", true),
                  unref(service).Permission_format ? (openBlock(), createBlock("div", {
                    key: 5,
                    class: "mb-2 row"
                  }, [
                    createVNode("div", { class: "mb-3 row" }, [
                      createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                        createVNode("label", { for: "" }, [
                          createTextVNode("Date"),
                          createVNode("span", { class: "text-danger" }, "*")
                        ])
                      ]),
                      createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0" }, [
                        createVNode(_component_Calendar, {
                          inputId: "icon",
                          modelValue: unref(service).leave_data.permission_date,
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_date = $event,
                          dateFormat: "dd-mm-yy",
                          showIcon: true,
                          style: { "width": "350px" },
                          maxDate: new Date(),
                          class: [
                            unref(p$).permission_date.$error ? "p-invalid" : ""
                          ]
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "maxDate", "class"]),
                        unref(p$).permission_date.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(p$).permission_date.required.$message.replace("Value", "Date")), 1)) : createCommentVNode("", true)
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-4 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", { class: "floating" }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "Start time"),
                          createVNode("span", { class: "p-input-icon-right" }, [
                            createVNode(_component_Calendar, {
                              inputId: "time12",
                              modelValue: unref(service).leave_data.permission_start_time,
                              "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_start_time = $event,
                              timeOnly: true,
                              hourFormat: "12",
                              icon: "your-icon",
                              class: [
                                unref(p$).permission_start_time.$error ? "p-invalid" : ""
                              ]
                            }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                            createVNode("i", { class: "pi pi-clock" })
                          ])
                        ]),
                        unref(p$).permission_start_time.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(p$).permission_start_time.required.$message.replace("Value", "Permission start time")), 1)) : createCommentVNode("", true)
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-3 mb-md-0 ms-5" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", { class: "floating" }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "Total Hour"),
                          createVNode(_component_InputText, {
                            class: "capitalize form-onboard-form form-control textbox",
                            type: "text",
                            style: { "width": "67px", "text-align": "center" },
                            modelValue: unref(service).leave_data.permission_total_time,
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_total_time = $event,
                            readonly: ""
                          }, null, 8, ["modelValue", "onUpdate:modelValue"])
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-4 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", { class: "floating" }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "End time"),
                          createVNode("span", { class: "p-input-icon-right" }, [
                            createVNode(_component_Calendar, {
                              inputId: "time12",
                              modelValue: unref(service).leave_data.permission_end_time,
                              "onUpdate:modelValue": ($event) => unref(service).leave_data.permission_end_time = $event,
                              timeOnly: true,
                              hourFormat: "12",
                              icon: "your-icon",
                              onDateSelect: unref(service).time_difference,
                              class: [
                                unref(p$).permission_end_time.$error ? "p-invalid" : ""
                              ]
                            }, null, 8, ["modelValue", "onUpdate:modelValue", "onDateSelect", "class"]),
                            createVNode("i", { class: "pi pi-clock" })
                          ])
                        ]),
                        unref(p$).permission_end_time.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(p$).permission_end_time.required.$message.replace("Value", "Permission end time")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true),
                  unref(service).compensatory_format ? (openBlock(), createBlock("div", {
                    key: 6,
                    class: "mb-2 row"
                  }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-5 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("label", { for: "" }, [
                        createTextVNode("Worked Date "),
                        createVNode("span", { class: "text-danger" }, "*")
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-6 col-xl-6 col-xxl-6 mb-md-0" }, [
                      createVNode(_component_MultiSelect, {
                        modelValue: unref(service).leave_data.selected_compensatory_leaves,
                        "onUpdate:modelValue": ($event) => unref(service).leave_data.selected_compensatory_leaves = $event,
                        options: unref(service).leave_data.compensatory_leaves,
                        optionLabel: "emp_attendance_date",
                        placeholder: "Select worked Date",
                        display: "chip",
                        class: ["w-full md:w-full", [
                          unref(cp$).selected_compensatory_leaves.$error ? "p-invalid" : ""
                        ]],
                        maxSelectedLabels: 5
                      }, {
                        footer: withCtx(() => [
                          createVNode("div", { class: "px-3 py-2" }, [
                            createVNode("b", null, toDisplayString(unref(service).leave_data.selected_compensatory_leaves ? unref(service).leave_data.selected_compensatory_leaves.length : 0), 1),
                            createTextVNode(" Date" + toDisplayString((unref(service).leave_data.selected_compensatory_leaves ? unref(service).leave_data.selected_compensatory_leaves.length : 0) > 1 ? "s" : "") + " selected. ", 1)
                          ])
                        ]),
                        _: 1
                      }, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                      createVNode("p", { class: "opacity-50 fs-10" }, "(note:Worked dates will get expired after 60 days)"),
                      unref(cp$).selected_compensatory_leaves.$error ? (openBlock(), createBlock("span", {
                        key: 0,
                        class: "font-semibold text-red-400 fs-6"
                      }, toDisplayString(unref(cp$).selected_compensatory_leaves.required.$message.replace("Value", "Compensatory Working Date's ")), 1)) : createCommentVNode("", true)
                    ]),
                    createVNode("div", { class: "mb-3 col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mb-md-0" }, [
                      createVNode("div", { class: "col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12" }, [
                        createVNode("label", {
                          for: "",
                          class: "float-label"
                        }, "Start Date")
                      ]),
                      createVNode("div", { class: "col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12" }, [
                        createVNode(_component_Calendar, {
                          inputId: "icon",
                          dateFormat: "dd-mm-yy",
                          showIcon: true,
                          modelValue: unref(service).leave_data.compensatory_start_date,
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.compensatory_start_date = $event,
                          minDate: unref(first_day_of_the_month),
                          class: [
                            unref(cp$).compensatory_start_date.$error ? "p-invalid" : ""
                          ]
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "minDate", "class"]),
                        unref(cp$).compensatory_start_date.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(cp$).compensatory_start_date.required.$message.replace("Value", "Start Date ")), 1)) : createCommentVNode("", true)
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-1 col-sm-1 col-lg-6 col-xl-4 col-xxl-5 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("div", {
                          class: "floating",
                          style: { "text-align": "center" }
                        }, [
                          createVNode("label", {
                            for: "",
                            class: "float-label"
                          }, "Total Days"),
                          createVNode(_component_InputText, {
                            style: { "width": "60px", "text-align": "center", "margin": "auto" },
                            class: ["capitalize form-onboard-form form-control textbox", [
                              unref(cp$).compensatory_total_days.$error ? "p-invalid" : ""
                            ]],
                            type: "text",
                            modelValue: unref(service).leave_data.compensatory_total_days,
                            "onUpdate:modelValue": ($event) => unref(service).leave_data.compensatory_total_days = $event,
                            readonly: ""
                          }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                          unref(cp$).compensatory_total_days.$error ? (openBlock(), createBlock("span", {
                            key: 0,
                            class: "font-semibold text-red-400 fs-6"
                          }, toDisplayString(unref(cp$).compensatory_total_days.required.$message.replace("Value", "Value not lesser than zero")), 1)) : createCommentVNode("", true)
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-3" }, [
                      createVNode("div", { class: "col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12" }, [
                        createVNode("label", {
                          for: "",
                          class: "float-label"
                        }, "End Day")
                      ]),
                      createVNode("div", { class: "col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12" }, [
                        createVNode(_component_Calendar, {
                          onDateSelect: unref(service).dayCalculation,
                          inputId: "icon",
                          dateFormat: "dd-mm-yy",
                          showIcon: true,
                          modelValue: unref(service).leave_data.compensatory_end_date,
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.compensatory_end_date = $event,
                          minDate: unref(first_day_of_the_month),
                          class: [
                            unref(cp$).compensatory_end_date.$error ? "p-invalid" : ""
                          ]
                        }, null, 8, ["onDateSelect", "modelValue", "onUpdate:modelValue", "minDate", "class"]),
                        unref(cp$).compensatory_end_date.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(cp$).compensatory_end_date.required.$message.replace("Value", "End Date ")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ])) : createCommentVNode("", true),
                  createVNode("div", { class: "mb-3 row" }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("label", { for: "" }, [
                          createTextVNode("Notify to "),
                          createVNode("span", { class: "text-danger" }, "*")
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode(_component_Chips, {
                          class: "lg:w-1em",
                          modelValue: unref(service).leave_data.notifyTo,
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.notifyTo = $event,
                          separator: ","
                        }, null, 8, ["modelValue", "onUpdate:modelValue"])
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "mb-3 row" }, [
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-4 col-xl-5 col-xxl-5 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("label", { for: "" }, [
                          createTextVNode("Reason "),
                          createVNode("span", { class: "text-danger" }, "*")
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "mb-3 col-md-12 col-sm-12 col-lg-8 col-xl-6 col-xxl-6 mb-md-0" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode(_component_Textarea, {
                          autoResize: true,
                          rows: "3",
                          cols: "90",
                          placeholder: "Enter the Reason",
                          modelValue: unref(service).leave_data.leave_reason,
                          "onUpdate:modelValue": ($event) => unref(service).leave_data.leave_reason = $event,
                          class: ["form-control", [
                            unref(r$).leave_reason.$error ? "p-invalid" : ""
                          ]]
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                        unref(r$).leave_reason.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "font-semibold text-red-400 fs-6"
                        }, toDisplayString(unref(r$).leave_reason.required.$message.replace("Value", "Leave Reason")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ])
                ]),
                createVNode("div", { class: "col-md-6 col-lg-5 col-sm-12" }, [
                  createVNode("div", { class: "col-lg-12 col-md-12" }, [
                    createVNode(_component_Calendar, {
                      inline: true,
                      showWeek: true,
                      style: { "min-width": "100%" }
                    })
                  ]),
                  createVNode("div", { class: "mt-6 text-center" }, [
                    createVNode("button", {
                      type: "button",
                      class: "btn btn-border-primary",
                      onClick: ($event) => unref(service).leaveApplyDailog = false
                    }, "Cancel", 8, ["onClick"]),
                    createVNode("button", {
                      type: "button",
                      id: "btn_request_leave",
                      class: "btn btn-primary ms-4",
                      onClick: submitForm
                    }, " Request Leave")
                  ])
                ])
              ]),
              unref(service).leave_data.leave_reason == "" ? (openBlock(), createBlock(_component_Dialog, {
                key: 0,
                style: { width: "450px" },
                header: "Required",
                modal: true,
                visible: unref(service).RequiredField,
                "onUpdate:visible": ($event) => unref(service).RequiredField = $event
              }, {
                default: withCtx(() => [
                  unref(service).leave_data.leave_reason == "" ? (openBlock(), createBlock("li", { key: 0 }, "Leave Reason")) : createCommentVNode("", true)
                ]),
                _: 1
              }, 8, ["visible", "onUpdate:visible"])) : createCommentVNode("", true)
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/leave_module/leave_apply/LeaveApply.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _,
  useLeaveService as u
};
