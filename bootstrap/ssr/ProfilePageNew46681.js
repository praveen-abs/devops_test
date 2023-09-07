/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, reactive, onMounted, computed, resolveComponent, unref, withCtx, createVNode, toDisplayString, openBlock, createBlock, createCommentVNode, createTextVNode, useSSRContext, withDirectives, vModelText, vModelCheckbox, mergeProps, createApp } from "vue";
import { createPinia } from "pinia";
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
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import MultiSelect from "primevue/multiselect";
import InputNumber from "primevue/inputnumber";
import InputMask from "primevue/inputmask";
import ProgressBar from "primevue/progressbar";
import Sidebar from "primevue/sidebar";
import { ssrRenderComponent, ssrRenderAttr, ssrRenderClass, ssrInterpolate, ssrRenderStyle, ssrIncludeBooleanAttr, ssrLooseContain, ssrRenderAttrs, ssrRenderList } from "vue/server-renderer";
import { _ } from "lodash";
import axios from "axios";
import { S as Service } from "./Service46681.js";
import { p as profilePagesStore } from "./ProfilePagesStore46681.js";
import useValidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";
import dayjs from "dayjs";
import "moment";
import { useDateFormat } from "@vueuse/core";
import { useToast } from "primevue/usetoast";
import { useConfirm } from "primevue/useconfirm";
import { _ as _sfc_main$7 } from "./EmployeePayslips466812.js";
import { U as UseEmployeeDocumentManagerService } from "./EmployeeDocumentsManagerService46681.js";
import { L as LoadingSpinner } from "./LoadingSpinner46681.js";
import "primevue/api";
import "./_plugin-vue_export-helper46681.js";
const _imports_0 = "/build/edit46681.svg";
const EmployeeCard_vue_vue_type_style_index_0_lang = "";
const _sfc_main$6 = {
  __name: "EmployeeCard",
  __ssrInlineRender: true,
  setup(__props) {
    const service = Service();
    const canShowLoading = ref(false);
    const dialogIdCard = ref(false);
    const employee_card = reactive({
      department: "",
      reporting_manager: ""
    });
    const employee_info = reactive({
      emp_name: "",
      emp_doc_name: "",
      emp_upload_doc: ""
    });
    const doc_name = ref([
      { name: "Birth Certificate", code: 1 },
      { name: "Aadhar Card Front", code: 2 },
      { name: "Pan Card", code: 3 }
    ]);
    const dialog_emp_name_visible = ref(false);
    let _instance_profilePagesStore = profilePagesStore();
    const departmentOption = ref();
    const reportManagerOption = ref();
    const dailogDepartment = ref(false);
    const dailogReporting = ref(false);
    const canShowCompletionScreen = ref(false);
    const status_text_CompletionDialog = ref("None");
    const editDepartment = (dep) => {
      console.log(dep);
      axios.post("/profile-pages/updateDepartment", {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        department_id: employee_card.department
      }).then((res) => {
        let selected_deptName = _.find(departmentOption.value, ["id", employee_card.department]).name;
        console.log("Lodash [Selected Dept]: " + selected_deptName);
        _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name = selected_deptName;
        status_text_CompletionDialog.value = "Department updated successfully !";
        console.log(res.data);
      }).catch((err) => {
        status_text_CompletionDialog.value = "Error while updating department. Kindly contact the Admin.";
        console.log("Error while updating Department : " + err);
      }).finally(() => {
        canShowCompletionScreen.value = true;
        dailogDepartment.value = false;
      });
    };
    const editReportingManager = (rm) => {
      console.log("editReportingManager : " + rm);
      axios.post("/profile-pages/updateReportingManager", {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        manager_user_code: employee_card.reporting_manager
      }).then((res) => {
        let selected_reportedManager = _.find(reportManagerOption.value, ["user_code", employee_card.reporting_manager]);
        _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name = selected_reportedManager.name;
        _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_code = selected_reportedManager.user_code;
        status_text_CompletionDialog.value = "Reporting Manager updated successfully !";
        console.log(res.data);
      }).catch((err) => {
        status_text_CompletionDialog.value = "Error while updating Reporting Manager. Kindly contact the Admin.";
        console.log("Error while updating Reporting Manager : " + err);
      }).finally(() => {
        canShowCompletionScreen.value = true;
        dailogReporting.value = false;
      });
    };
    const setvalue = () => {
      employee_card.department = _instance_profilePagesStore.employeeDetails.get_employee_office_details.department_name;
      employee_card.reporting_manager = _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name;
      console.log(employee_card.department);
    };
    onMounted(() => {
      service.DepartmentDetails().then((res) => {
        departmentOption.value = res.data;
        console.log(
          "testing" + _instance_profilePagesStore.employeeDetails.get_employee_office_details.l1_manager_name
        );
      });
      service.ManagerDetails().then((res) => {
        reportManagerOption.value = res.data;
      });
      setvalue();
      console.log();
    });
    const UploadEmpDocsPhoto = (e) => {
      if (e.target.files && e.target.files[0]) {
        employee_info.emp_upload_doc = e.target.files[0];
        console.log(employee_info.emp_upload_doc);
      }
    };
    const rules = computed(() => {
      return {
        emp_name: { required },
        emp_doc_name: { required },
        emp_upload_doc: { required }
      };
    });
    const v$ = useValidate(rules, employee_info);
    const submitForm = () => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        saveEmpChangeInfoDetails();
      } else {
        console.log("Form failed submitted.");
      }
    };
    const saveEmpChangeInfoDetails = () => {
      canShowLoading.value = true;
      dialog_emp_name_visible.value = false;
      let id = service.current_user_id;
      const url = `/update-EmplpoyeeName-info/${id}`;
      const form = new FormData();
      form.append("user_code", _instance_profilePagesStore.employeeDetails.user_code);
      form.append("name", employee_info.emp_name);
      form.append("onboard_document_type", employee_info.emp_doc_name.name);
      form.append("emp_doc", employee_info.emp_upload_doc);
      axios.post(url, form).finally(() => {
        canShowLoading.value = false;
      });
    };
    const cmpBldGrp = computed(() => {
      if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 1)
        return "A Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 2)
        return "A Negative";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 3)
        return "B Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 4)
        return "B Negative";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 5)
        return "AB Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 6)
        return "AB Negative";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 7)
        return "O Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 8)
        return "O Negative";
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_ProgressBar = resolveComponent("ProgressBar");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      const _component_InputText = resolveComponent("InputText");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details) {
        _push(`<div class="bg-white border rounded-lg grid grid-cols-12 p-3 content-center"><div class="col-span-4 h-full grid grid-cols-12 gap-6"><div class="col-span-4"><div class="profile-pic">`);
        if (unref(_instance_profilePagesStore).profile) {
          _push(`<img class="forRounded"${ssrRenderAttr("src", `data:image/png;base64,${unref(_instance_profilePagesStore).profile}`)} srcset="" alt="" id="output" width="200">`);
        } else {
          _push(`<p class="${ssrRenderClass([[unref(_instance_profilePagesStore).employeeDetails.short_name_Color ? unref(_instance_profilePagesStore).employeeDetails.short_name_Color : "", unref(_instance_profilePagesStore).employeeDetails.short_name_Color], "font-semibold text-5xl text-center flex items-center justify-center text-white forRounded"])}">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.user_short_name)}</p>`);
        }
        _push(`<label class="-label" for="file"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z"></path></svg></label><input id="file" type="file"></div></div><div class="col-span-8"><div class="flex justify-between pr-4"><div><p class="font-semibold text-md">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails ? unref(_instance_profilePagesStore).employeeDetails.name : "-")}</p><p class="font-semibold text-xs text-gray-500">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails ? unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.designation : "-")}</p></div><img${ssrRenderAttr("src", _imports_0)} class="h-4 w-4 cursor-pointer my-auto" alt=""></div><div class="py-2"><p class="font-semibold text-xs">Profile completeness</p><div class="w-11/12 my-1">`);
        if (unref(_instance_profilePagesStore).employeeDetails.profile_completeness <= 39) {
          _push(ssrRenderComponent(_component_ProgressBar, {
            value: unref(_instance_profilePagesStore).employeeDetails.profile_completeness,
            class: [unref(_instance_profilePagesStore).employeeDetails.profile_completeness <= 39 ? "progressbar" : ""]
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        if (unref(_instance_profilePagesStore).employeeDetails.profile_completeness >= 40 && unref(_instance_profilePagesStore).employeeDetails.profile_completeness <= 59) {
          _push(ssrRenderComponent(_component_ProgressBar, {
            class: ["progressbar_val2", [unref(_instance_profilePagesStore).employeeDetails.profile_completeness >= 40 && unref(_instance_profilePagesStore).employeeDetails.profile_completeness <= 59]],
            value: unref(_instance_profilePagesStore).employeeDetails.profile_completeness
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        if (unref(_instance_profilePagesStore).employeeDetails.profile_completeness >= 60) {
          _push(ssrRenderComponent(_component_ProgressBar, {
            class: ["progressbar_val3", [unref(_instance_profilePagesStore).employeeDetails.profile_completeness >= 60]],
            value: unref(_instance_profilePagesStore).employeeDetails.profile_completeness
          }, null, _parent));
        } else {
          _push(`<!---->`);
        }
        _push(`</div><p class="mb-2 text-muted f-10 text-start fw-bold"> Your profile is completed </p></div></div></div><div class="col-span-5 grid grid-cols-3 gap-4 h-full"><div class=""><p class="font-semibold text-xs text-gray-500">Employee Status</p>`);
        if (unref(_instance_profilePagesStore).employeeDetails.active == 1) {
          _push(`<p class="font-semibold text-sm">Active </p>`);
        } else {
          _push(`<p class="font-semibold text-sm">Not active</p>`);
        }
        _push(`</div><div class=""><p class="font-semibold text-xs text-gray-500">Designation</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.designation ? unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.designation : "-")}</p></div><div class="flex justify-between items-center"><div><p class="font-semibold text-xs text-gray-500">Department</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.department_name ? unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.department_name : "-")}</p></div>`);
        if (unref(_instance_profilePagesStore).employeeDetails.Current_login_user.org_role == 1 || unref(_instance_profilePagesStore).employeeDetails.Current_login_user.org_role == 2 || unref(_instance_profilePagesStore).employeeDetails.Current_login_user.org_role == 3) {
          _push(`<img${ssrRenderAttr("src", _imports_0)} class="h-4 w-4 cursor-pointer my-auto" alt="">`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class=""><p class="font-semibold text-xs text-gray-500">Employee Code</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails ? unref(_instance_profilePagesStore).employeeDetails.user_code : "-")}</p></div><div class=""><p class="font-semibold text-xs text-gray-500">Location</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.work_location ? unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.work_location : "-")}</p></div><div class="flex justify-between items-center"><div class=""><p class="font-semibold text-xs text-gray-500">Reporting to</p>`);
        if (unref(_instance_profilePagesStore).employeeDetails) {
          _push(`<p class="font-semibold text-sm whitespace-nowrap">${ssrInterpolate(`${unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.l1_manager_name}(${unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.l1_manager_code})`)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
        if (unref(_instance_profilePagesStore).employeeDetails.Current_login_user.org_role == 1 || unref(_instance_profilePagesStore).employeeDetails.Current_login_user.org_role == 2 || unref(_instance_profilePagesStore).employeeDetails.Current_login_user.org_role == 3) {
          _push(`<img${ssrRenderAttr("src", _imports_0)} class="h-4 w-4 cursor-pointer my-auto" alt="">`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><div class="col-span-3 h-full"><div class="flex justify-end"><div></div><div class="mx-2"><button class="p-0 m-0 bg-transparent border-0 outline-none btn"><i class="pi pi-id-card text-success fs-4" aria-hidden="true"></i></button></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Status",
        visible: canShowCompletionScreen.value,
        "onUpdate:visible": ($event) => canShowCompletionScreen.value = $event,
        breakpoints: { "960px": "75vw", "640px": "90vw" },
        style: { width: "350px" },
        modal: true
      }, {
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="confirmation-content"${_scopeId}><i class="mr-3 pi pi-check-circle" style="${ssrRenderStyle({ "font-size": "2rem" })}"${_scopeId}></i><span${_scopeId}>${ssrInterpolate(status_text_CompletionDialog.value)}</span></div>`);
          } else {
            return [
              createVNode("div", { class: "confirmation-content" }, [
                createVNode("i", {
                  class: "mr-3 pi pi-check-circle",
                  style: { "font-size": "2rem" }
                }),
                createVNode("span", null, toDisplayString(status_text_CompletionDialog.value), 1)
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dailogDepartment.value,
        "onUpdate:visible": ($event) => dailogDepartment.value = $event,
        modal: "",
        header: "Edit Department",
        style: { width: "30vw", borderTop: "5px solid #002f56" }
      }, {
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><button type="button" class="submit_btn warning success"${_scopeId}> Save </button></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("button", {
                  type: "button",
                  class: "submit_btn warning success",
                  onClick: editDepartment
                }, " Save ")
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Dropdown, {
              options: departmentOption.value,
              optionLabel: "name",
              modelValue: employee_card.department,
              "onUpdate:modelValue": ($event) => employee_card.department = $event,
              placeholder: "Select Department",
              class: "w-full form-selects",
              optionValue: "id"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Dropdown, {
                options: departmentOption.value,
                optionLabel: "name",
                modelValue: employee_card.department,
                "onUpdate:modelValue": ($event) => employee_card.department = $event,
                placeholder: "Select Department",
                class: "w-full form-selects",
                optionValue: "id"
              }, null, 8, ["options", "modelValue", "onUpdate:modelValue"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dailogReporting.value,
        "onUpdate:visible": ($event) => dailogReporting.value = $event,
        modal: "",
        header: "Edit Reporting Manager",
        style: { width: "30vw", borderTop: "5px solid #002f56" }
      }, {
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><button type="button" class="submit_btn warning success"${_scopeId}> Save </button></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("button", {
                  type: "button",
                  class: "submit_btn warning success",
                  onClick: editReportingManager
                }, " Save ")
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Dropdown, {
              optionLabel: "name",
              options: reportManagerOption.value,
              modelValue: employee_card.reporting_manager,
              "onUpdate:modelValue": ($event) => employee_card.reporting_manager = $event,
              optionValue: "user_code",
              placeholder: "Select Reporting Manager",
              class: "w-full form-selects"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Dropdown, {
                optionLabel: "name",
                options: reportManagerOption.value,
                modelValue: employee_card.reporting_manager,
                "onUpdate:modelValue": ($event) => employee_card.reporting_manager = $event,
                optionValue: "user_code",
                placeholder: "Select Reporting Manager",
                class: "w-full form-selects"
              }, null, 8, ["options", "modelValue", "onUpdate:modelValue"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dialogIdCard.value,
        "onUpdate:visible": ($event) => dialogIdCard.value = $event,
        modal: "",
        header: "",
        style: [{ width: "45vw", borderTop: "5px solid #002f56" }, { "@media (min-width": "1024px){background-image:particular_ad_small.png" }]
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 class="fw-bolder fs-5" style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}"${_scopeId}> Digital Id Preview </h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  class: "fw-bolder fs-5",
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" }
                }, " Digital Id Preview ", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="bg-blue-900 w-100 py-4 px-2 rounded-lg d-flex justify-content-around overflow-x-scroll ... lg:w-100"${_scopeId}><div class="card p-3 d-flex justify-items-center align-items-center mr-2 :lg:mx-0 Digital_Id_Card_" style="${ssrRenderStyle({ "width": "260px", "height": "380px", "flex-direction": "column !important", "box-shadow": "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px" })}"${_scopeId}><div style="${ssrRenderStyle({ "height": "45px", "width": "140px" })}" class="mt-2"${_scopeId}><img${ssrRenderAttr("src", `${unref(_instance_profilePagesStore).employeeDetails.client_logo}`)} alt="" style="${ssrRenderStyle({ "object-fit": "cover" })}"${_scopeId}></div><div class="card-body d-flex justify-items-center align-items-center mt-6" style="${ssrRenderStyle({ "flex-direction": "column" })}"${_scopeId}><div class="${ssrRenderClass([[!unref(_instance_profilePagesStore).profile ? unref(_instance_profilePagesStore).employeeDetails.short_name_Color : "", unref(_instance_profilePagesStore).employeeDetails.short_name_Color], "mx-auto rounded-circle img-xl userActive-status profile-img d-flex justify-content-center align-items-center"])}"${_scopeId}>`);
            if (unref(_instance_profilePagesStore).profile) {
              _push2(`<img class="rounded-circle img-xl userActive-status profile-img border object-cover"${ssrRenderAttr("src", `data:image/png;base64,${unref(_instance_profilePagesStore).profile}`)} srcset="" style="${ssrRenderStyle({ "box-shadow": "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px", "width": "80px", "height": "80px" })}"${_scopeId}>`);
            } else {
              _push2(`<!---->`);
            }
            if (!unref(_instance_profilePagesStore).profile) {
              _push2(`<h1 class="text-white fs-4"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.user_short_name)}</h1>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><h1 class="card-title mt-12 mb-3 f-12 text-blue-900 subpixel-antialiased font-semibold" style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.name)}</h1>`);
            if (unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.department_id) {
              _push2(`<h5 class="f-12 card-text mb-3 text-gray-600 subpixel-antialiased font-semibold"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.department_name)}</h5>`);
            } else {
              _push2(`<h1 class="f-12 card-text"${_scopeId}>-</h1>`);
            }
            if (unref(_instance_profilePagesStore).employeeDetails.user_code) {
              _push2(`<h5 class="f-16 mb-2 text-gray-700 subpixel-antialiased font-semibold"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.user_code)}</h5>`);
            } else {
              _push2(`<p class="f-12 mb-2 text-secondary-emphasis"${_scopeId}>-</p>`);
            }
            _push2(`</div></div><div class="card p-2 d-flex justify-items-center align-items-center ml-2 Digital_Id_Card_ :lg:p-2" style="${ssrRenderStyle({ "width": "260px", "height": "380px", "flex-direction": "column !important", "box-shadow": "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px" })}"${_scopeId}><div class="w-100 d-flex justify-content-center align-items-center flex-column"${_scopeId}><h1 class="text-orange-500 fs-14 subpixel-antialiased font-semibold fw-600"${_scopeId}>EMPLOYEE DETAILS</h1><div class="row w-100 mt-3"${_scopeId}><div class="col-5 fs-14 subpixel-antialiased font-semibold text-left text-blue-900"${_scopeId}> Blood Group <span class="position-absolute" style="${ssrRenderStyle({ "position": "absolute", "left": "90px" })}"${_scopeId}>:</span></div><div class="col-6 fs-6 text-blue-900"${_scopeId}><h1 class="text-left pt-1"${_scopeId}>${ssrInterpolate(unref(cmpBldGrp))}</h1></div></div><div class="row w-100 mt-3"${_scopeId}><div class="col-5 fs-14 subpixel-antialiased font-semibold text-left text-blue-900"${_scopeId}> Phone <span class="position-absolute" style="${ssrRenderStyle({ "position": "absolute", "left": "90px" })}"${_scopeId}>:</span></div><div class="col-6 fs-6 text-blue-900"${_scopeId}><h1 class="text-left pt-1"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.mobile_number)}</h1></div></div><div class="row w-100 mt-3"${_scopeId}><div class="col-5 fs-14 subpixel-antialiased font-semibold text-left text-blue-900 position-relative"${_scopeId}> Email Id <span class="position-absolute" style="${ssrRenderStyle({ "position": "absolute", "left": "90px" })}"${_scopeId}>:</span></div><div class="col-6 subpixel-antialiased fs-12"${_scopeId}><h1 class="text-left"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.officical_mail)}</h1></div></div><div class="row w-100 mt-3"${_scopeId}><div class="col fs-14 subpixel-antialiased font-semibold text-left text-blue-900"${_scopeId}><h1 class="text-orange-500 fs-12"${_scopeId}>Residential Address :</h1><div class="ml-2"${_scopeId}><p class="text-blue-900 mt-2 subpixel-antialiased font-semibold fs-11 text-center"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.current_address_line_1)}</p></div></div></div><div class="row bg-gradient-to-r from-orange-500 to-orange-300 h-1 w-100 mt-2 :lg:mt-2"${_scopeId}></div><div class="row bg-gradient-to-r from-orange-500 to-orange-300 h-3 w-100 mt-1"${_scopeId}></div><div class="row"${_scopeId}><div class="col-12"${_scopeId}>`);
            if (unref(_instance_profilePagesStore).employeeDetails.client_details.client_name) {
              _push2(`<h1 class="text-center font-semibold text-orange-500 fs-14 subpixel-antialiased mt-2 :lg:mt-2"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.client_details.client_name)}</h1>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="col-12"${_scopeId}><h1 class="fs-11 text-center font-semibold text-blue-900 mt-2"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.client_details.address)}</h1></div><div class="col-12"${_scopeId}><h1 class="fs-12 text-center font-semibold text-blue-900 mt-2"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.client_details.authorised_person_contact_email)}</h1></div><div class="col-12"${_scopeId}><h1 class="fs-11 text-center font-semibold lining-nums ... text-blue-900 mt-2"${_scopeId}>${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.client_details.authorised_person_contact_number)}</h1></div><div class="col-12"${_scopeId}></div></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "bg-blue-900 w-100 py-4 px-2 rounded-lg d-flex justify-content-around overflow-x-scroll ... lg:w-100" }, [
                createVNode("div", {
                  class: "card p-3 d-flex justify-items-center align-items-center mr-2 :lg:mx-0 Digital_Id_Card_",
                  style: { "width": "260px", "height": "380px", "flex-direction": "column !important", "box-shadow": "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px" }
                }, [
                  createVNode("div", {
                    style: { "height": "45px", "width": "140px" },
                    class: "mt-2"
                  }, [
                    createVNode("img", {
                      src: `${unref(_instance_profilePagesStore).employeeDetails.client_logo}`,
                      alt: "",
                      style: { "object-fit": "cover" }
                    }, null, 8, ["src"])
                  ]),
                  createVNode("div", {
                    class: "card-body d-flex justify-items-center align-items-center mt-6",
                    style: { "flex-direction": "column" }
                  }, [
                    createVNode("div", {
                      class: ["mx-auto rounded-circle img-xl userActive-status profile-img d-flex justify-content-center align-items-center", [!unref(_instance_profilePagesStore).profile ? unref(_instance_profilePagesStore).employeeDetails.short_name_Color : "", unref(_instance_profilePagesStore).employeeDetails.short_name_Color]]
                    }, [
                      unref(_instance_profilePagesStore).profile ? (openBlock(), createBlock("img", {
                        key: 0,
                        class: "rounded-circle img-xl userActive-status profile-img border object-cover",
                        src: `data:image/png;base64,${unref(_instance_profilePagesStore).profile}`,
                        srcset: "",
                        style: { "box-shadow": "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px", "width": "80px", "height": "80px" }
                      }, null, 8, ["src"])) : createCommentVNode("", true),
                      !unref(_instance_profilePagesStore).profile ? (openBlock(), createBlock("h1", {
                        key: 1,
                        class: "text-white fs-4"
                      }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.user_short_name), 1)) : createCommentVNode("", true)
                    ], 2),
                    createVNode("h1", {
                      class: "card-title mt-12 mb-3 f-12 text-blue-900 subpixel-antialiased font-semibold",
                      style: { "text-align": "center" }
                    }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.name), 1),
                    unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.department_id ? (openBlock(), createBlock("h5", {
                      key: 0,
                      class: "f-12 card-text mb-3 text-gray-600 subpixel-antialiased font-semibold"
                    }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.department_name), 1)) : (openBlock(), createBlock("h1", {
                      key: 1,
                      class: "f-12 card-text"
                    }, "-")),
                    unref(_instance_profilePagesStore).employeeDetails.user_code ? (openBlock(), createBlock("h5", {
                      key: 2,
                      class: "f-16 mb-2 text-gray-700 subpixel-antialiased font-semibold"
                    }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.user_code), 1)) : (openBlock(), createBlock("p", {
                      key: 3,
                      class: "f-12 mb-2 text-secondary-emphasis"
                    }, "-"))
                  ])
                ]),
                createVNode("div", {
                  class: "card p-2 d-flex justify-items-center align-items-center ml-2 Digital_Id_Card_ :lg:p-2",
                  style: { "width": "260px", "height": "380px", "flex-direction": "column !important", "box-shadow": "rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px" }
                }, [
                  createVNode("div", { class: "w-100 d-flex justify-content-center align-items-center flex-column" }, [
                    createVNode("h1", { class: "text-orange-500 fs-14 subpixel-antialiased font-semibold fw-600" }, "EMPLOYEE DETAILS"),
                    createVNode("div", { class: "row w-100 mt-3" }, [
                      createVNode("div", { class: "col-5 fs-14 subpixel-antialiased font-semibold text-left text-blue-900" }, [
                        createTextVNode(" Blood Group "),
                        createVNode("span", {
                          class: "position-absolute",
                          style: { "position": "absolute", "left": "90px" }
                        }, ":")
                      ]),
                      createVNode("div", { class: "col-6 fs-6 text-blue-900" }, [
                        createVNode("h1", { class: "text-left pt-1" }, toDisplayString(unref(cmpBldGrp)), 1)
                      ])
                    ]),
                    createVNode("div", { class: "row w-100 mt-3" }, [
                      createVNode("div", { class: "col-5 fs-14 subpixel-antialiased font-semibold text-left text-blue-900" }, [
                        createTextVNode(" Phone "),
                        createVNode("span", {
                          class: "position-absolute",
                          style: { "position": "absolute", "left": "90px" }
                        }, ":")
                      ]),
                      createVNode("div", { class: "col-6 fs-6 text-blue-900" }, [
                        createVNode("h1", { class: "text-left pt-1" }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.mobile_number), 1)
                      ])
                    ]),
                    createVNode("div", { class: "row w-100 mt-3" }, [
                      createVNode("div", { class: "col-5 fs-14 subpixel-antialiased font-semibold text-left text-blue-900 position-relative" }, [
                        createTextVNode(" Email Id "),
                        createVNode("span", {
                          class: "position-absolute",
                          style: { "position": "absolute", "left": "90px" }
                        }, ":")
                      ]),
                      createVNode("div", { class: "col-6 subpixel-antialiased fs-12" }, [
                        createVNode("h1", { class: "text-left" }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.officical_mail), 1)
                      ])
                    ]),
                    createVNode("div", { class: "row w-100 mt-3" }, [
                      createVNode("div", { class: "col fs-14 subpixel-antialiased font-semibold text-left text-blue-900" }, [
                        createVNode("h1", { class: "text-orange-500 fs-12" }, "Residential Address :"),
                        createVNode("div", { class: "ml-2" }, [
                          createVNode("p", { class: "text-blue-900 mt-2 subpixel-antialiased font-semibold fs-11 text-center" }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.current_address_line_1), 1)
                        ])
                      ])
                    ]),
                    createVNode("div", { class: "row bg-gradient-to-r from-orange-500 to-orange-300 h-1 w-100 mt-2 :lg:mt-2" }),
                    createVNode("div", { class: "row bg-gradient-to-r from-orange-500 to-orange-300 h-3 w-100 mt-1" }),
                    createVNode("div", { class: "row" }, [
                      createVNode("div", { class: "col-12" }, [
                        unref(_instance_profilePagesStore).employeeDetails.client_details.client_name ? (openBlock(), createBlock("h1", {
                          key: 0,
                          class: "text-center font-semibold text-orange-500 fs-14 subpixel-antialiased mt-2 :lg:mt-2"
                        }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.client_details.client_name), 1)) : createCommentVNode("", true)
                      ]),
                      createVNode("div", { class: "col-12" }, [
                        createVNode("h1", { class: "fs-11 text-center font-semibold text-blue-900 mt-2" }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.client_details.address), 1)
                      ]),
                      createVNode("div", { class: "col-12" }, [
                        createVNode("h1", { class: "fs-12 text-center font-semibold text-blue-900 mt-2" }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.client_details.authorised_person_contact_email), 1)
                      ]),
                      createVNode("div", { class: "col-12" }, [
                        createVNode("h1", { class: "fs-11 text-center font-semibold lining-nums ... text-blue-900 mt-2" }, toDisplayString(unref(_instance_profilePagesStore).employeeDetails.client_details.authorised_person_contact_number), 1)
                      ]),
                      createVNode("div", { class: "col-12" })
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
        header: "Header",
        visible: canShowLoading.value,
        "onUpdate:visible": ($event) => canShowLoading.value = $event,
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
        visible: dialog_emp_name_visible.value,
        "onUpdate:visible": ($event) => dialog_emp_name_visible.value = $event,
        modal: "",
        header: " ",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5"${_scopeId}> Edit Employee Name</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5"
                }, " Edit Employee Name", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><div class="modal-body"${_scopeId}><div class="row"${_scopeId}><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label class="mb-2 font-semibold text-lg"${_scopeId}>Employee Name</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: employee_info.emp_name,
              "onUpdate:modelValue": ($event) => employee_info.emp_name = $event,
              style: { "text-transform": "uppercase" },
              class: ["form-controls pl-2", [
                unref(v$).emp_name.$error ? "p-invalid" : ""
              ]]
            }, null, _parent2, _scopeId));
            if (unref(v$).emp_name.$error) {
              _push2(`<span class="text-red-400 fs-6 font-semibold"${_scopeId}>${ssrInterpolate(unref(v$).emp_name.required.$message.replace("Value", "Employee Name"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="col-md-6"${_scopeId}><div class="form-group"${_scopeId}><label for="" class="mb-1 mb-1 font-semibold text-lg"${_scopeId}>Documents</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: employee_info.emp_doc_name,
              "onUpdate:modelValue": ($event) => employee_info.emp_doc_name = $event,
              options: doc_name.value,
              optionLabel: "name",
              placeholder: "Select a document ",
              class: ["form-controls pl-2 w-full h-12", [
                unref(v$).emp_doc_name.$error ? "p-invalid" : ""
              ]]
            }, null, _parent2, _scopeId));
            if (unref(v$).emp_doc_name.$error) {
              _push2(`<span class="text-red-400 fs-6 font-semibold"${_scopeId}>${ssrInterpolate(unref(v$).emp_doc_name.required.$message.replace("Value", "Documents"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="col-md-6 d-flex flex-column"${_scopeId}><div class="d-flex justify-items-center flex-column"${_scopeId}><label for="" class="float-label mb-2 font-semibold text-lg"${_scopeId}>Upload Documents</label><div class="d-flex justify-items-center align-items-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<label class="cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary" style="${ssrRenderStyle({ "width": "100px" })}" id="" for="uploadPassBook"${_scopeId}><i class="pi pi-arrow-circle-up fs-5 mr-2"${_scopeId}></i><h1 class="text-light"${_scopeId}>Upload</h1></label>`);
            if (employee_info.emp_upload_doc) {
              _push2(`<div class="p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4"${_scopeId}>${ssrInterpolate(employee_info.emp_upload_doc.name)}</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<input type="file" name="" id="uploadPassBook" hidden class="${ssrRenderClass([
              unref(v$).emp_upload_doc.$error ? "p-invalid" : ""
            ])}"${_scopeId}></div>`);
            if (unref(v$).emp_upload_doc.$error) {
              _push2(`<span class="text-red-400 fs-6 font-semibold"${_scopeId}>${ssrInterpolate(unref(v$).emp_upload_doc.required.$message.replace("Value", "document"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div><div class="col-12"${_scopeId}><div class="text-right"${_scopeId}><button id="btn_submit_bank_info" class="btn btn-orange submit-btn"${_scopeId}>Submit</button></div></div></div></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("div", { class: "modal-body" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "mb-3 form-group" }, [
                        createVNode("label", { class: "mb-2 font-semibold text-lg" }, "Employee Name"),
                        createVNode(_component_InputText, {
                          type: "text",
                          modelValue: employee_info.emp_name,
                          "onUpdate:modelValue": ($event) => employee_info.emp_name = $event,
                          style: { "text-transform": "uppercase" },
                          class: ["form-controls pl-2", [
                            unref(v$).emp_name.$error ? "p-invalid" : ""
                          ]]
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                        unref(v$).emp_name.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "text-red-400 fs-6 font-semibold"
                        }, toDisplayString(unref(v$).emp_name.required.$message.replace("Value", "Employee Name")), 1)) : createCommentVNode("", true)
                      ])
                    ]),
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "form-group" }, [
                        createVNode("label", {
                          for: "",
                          class: "mb-1 mb-1 font-semibold text-lg"
                        }, "Documents"),
                        createVNode(_component_Dropdown, {
                          modelValue: employee_info.emp_doc_name,
                          "onUpdate:modelValue": ($event) => employee_info.emp_doc_name = $event,
                          options: doc_name.value,
                          optionLabel: "name",
                          placeholder: "Select a document ",
                          class: ["form-controls pl-2 w-full h-12", [
                            unref(v$).emp_doc_name.$error ? "p-invalid" : ""
                          ]]
                        }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "class"]),
                        unref(v$).emp_doc_name.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "text-red-400 fs-6 font-semibold"
                        }, toDisplayString(unref(v$).emp_doc_name.required.$message.replace("Value", "Documents")), 1)) : createCommentVNode("", true)
                      ])
                    ]),
                    createVNode("div", { class: "col-md-6 d-flex flex-column" }, [
                      createVNode("div", { class: "d-flex justify-items-center flex-column" }, [
                        createVNode("label", {
                          for: "",
                          class: "float-label mb-2 font-semibold text-lg"
                        }, "Upload Documents"),
                        createVNode("div", { class: "d-flex justify-items-center align-items-center" }, [
                          createVNode(_component_Toast),
                          createVNode("label", {
                            class: "cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary",
                            style: { "width": "100px" },
                            id: "",
                            for: "uploadPassBook"
                          }, [
                            createVNode("i", { class: "pi pi-arrow-circle-up fs-5 mr-2" }),
                            createVNode("h1", { class: "text-light" }, "Upload")
                          ]),
                          employee_info.emp_upload_doc ? (openBlock(), createBlock("div", {
                            key: 0,
                            class: "p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4"
                          }, toDisplayString(employee_info.emp_upload_doc.name), 1)) : createCommentVNode("", true),
                          createVNode("input", {
                            type: "file",
                            name: "",
                            id: "uploadPassBook",
                            hidden: "",
                            onChange: ($event) => UploadEmpDocsPhoto($event),
                            class: [
                              unref(v$).emp_upload_doc.$error ? "p-invalid" : ""
                            ]
                          }, null, 42, ["onChange"])
                        ]),
                        unref(v$).emp_upload_doc.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "text-red-400 fs-6 font-semibold"
                        }, toDisplayString(unref(v$).emp_upload_doc.required.$message.replace("Value", "document")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "col-12" }, [
                    createVNode("div", { class: "text-right" }, [
                      createVNode("button", {
                        id: "btn_submit_bank_info",
                        class: "btn btn-orange submit-btn",
                        onClick: submitForm
                      }, "Submit")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/EmployeeCard/EmployeeCard.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const _sfc_main$5 = {
  __name: "EmployeeDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const fetch_data = Service();
    const _instance_profilePagesStore = profilePagesStore();
    const canShowLoading = ref(false);
    const toast = useToast();
    const Addresstoast = useToast();
    const is_dialog_generalInfo_visible = ref(false);
    const ContactVisible = ref(false);
    const addressVisible = ref(false);
    const dialog_general_information = reactive({
      dob: "",
      gender: "",
      doj: "",
      blood_group_id: "",
      marital_status_id: "",
      physically_challenged: ""
    });
    const options_gender = ref([
      { name: "Male", value: "male" },
      { name: "Female", value: "female" },
      { name: "Others", value: "others" }
    ]);
    const contact_details = ref();
    const dailog_contactinfo = reactive({
      email: "",
      official_email: "",
      mobile_number: "",
      official_mobile_number: ""
    });
    const addressUpdateDetails = ref();
    const diolog_Addressinfo = reactive({
      current_address: "",
      Permanent_Address: ""
    });
    const CopyAddress = ref(false);
    function copyAddress() {
      if (CopyAddress.value == 1) {
        diolog_Addressinfo.Permanent_Address = diolog_Addressinfo.current_address;
      } else {
        CopyAddress.value = false;
      }
    }
    computed(() => {
      if (_instance_profilePagesStore.employeeDetails.get_employee_details.gender == "male")
        return "Male";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.gender == "female")
        return "Female";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.gender == "others")
        return "Others";
      else
        return "-";
    });
    computed(() => {
      return _instance_profilePagesStore.employeeDetails.get_employee_details.marital_status;
    });
    computed(() => {
      if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 1)
        return "A Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 2)
        return "A Negative";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 3)
        return "B Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 4)
        return "B Negative";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 5)
        return "AB Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 6)
        return "AB Negative";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 7)
        return "O Positive";
      else if (_instance_profilePagesStore.employeeDetails.get_employee_details.blood_group_id == 8)
        return "O Negative";
    });
    computed(() => {
      if (_instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged == "no")
        return "No";
      if (_instance_profilePagesStore.employeeDetails.get_employee_details.physically_challenged == "yes")
        return "Yes";
    });
    const options_phy_challenged = ref([
      { name: "Yes", value: "yes" },
      { name: "No", value: "no" }
    ]);
    const options_blood_group = ref();
    const option_maritals_status = ref();
    useConfirm();
    onMounted(() => {
      _instance_profilePagesStore.fetchEmployeeDetails();
      fetch_data.getBloodGroups().then((result) => {
        console.log(result.data);
        options_blood_group.value = result.data;
      });
      fetch_data.getMaritalStatus().then((result) => {
        console.log(result);
        option_maritals_status.value = result.data;
      });
    });
    function saveGeneralInformationDetails() {
      console.log(dialog_general_information.dob);
      canShowLoading.value = true;
      let id = fetch_data.current_user_id;
      let url = `/profile-pages-update-generalinfo/${id}`;
      axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        dob: dayjs(dialog_general_information.dob).format("YYYY-MM-DD"),
        gender: dialog_general_information.gender,
        marital_status_id: dialog_general_information.marital_status_id,
        doj: dialog_general_information.doj,
        blood_group_id: dialog_general_information.blood_group_id,
        physically_challenged: dialog_general_information.physically_challenged
      }).then((res) => {
        if (res.data.status == "success") {
          _instance_profilePagesStore.employeeDetails.get_employee_details.dob = useDateFormat(dialog_general_information.dob, "YYYY-MM-DD");
          _instance_profilePagesStore.employeeDetails.gender = dialog_general_information.gender;
          _instance_profilePagesStore.employeeDetails.marital_status_id = dialog_general_information.marital_status_id;
          _instance_profilePagesStore.employeeDetails.get_employee_details.doj = dialog_general_information.doj;
          _instance_profilePagesStore.employeeDetails.blood_group_id = dialog_general_information.blood_group_id;
          _instance_profilePagesStore.employeeDetails.physically_challenged = dialog_general_information.physically_challenged;
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        canShowLoading.value = false;
        toast.add({ severity: "success", summary: "Updated", detail: "General information updated", life: 3e3 });
      });
      is_dialog_generalInfo_visible.value = false;
    }
    function save_contactinfoDetails() {
      let id = fetch_data.current_user_id;
      let url = `/profile-pages-update-contactinfo/${id}`;
      canShowLoading.value = true;
      axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        email: dailog_contactinfo.email,
        officical_mail: dailog_contactinfo.official_email,
        mobile_number: dailog_contactinfo.mobile_number,
        official_mobile_number: parseInt(dailog_contactinfo.official_mobile_number)
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Updated", detail: "Contact information updated", life: 3e3 });
          _instance_profilePagesStore.employeeDetails.email = dailog_contactinfo.email;
          _instance_profilePagesStore.employeeDetails.get_employee_office_details.officical_mail = dailog_contactinfo.official_email;
          _instance_profilePagesStore.employeeDetails.get_employee_details.mobile_number = dailog_contactinfo.mobile_number;
          _instance_profilePagesStore.employeeDetails.get_employee_office_details.official_mobile = dailog_contactinfo.official_mobile_number;
        } else if (res.data.status == "failure") {
          contact_details.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        canShowLoading.value = false;
      });
      ContactVisible.value = false;
    }
    const saveAddressinfoDetails = () => {
      canShowLoading.value = true;
      if (diolog_Addressinfo.current_address == " " || diolog_Addressinfo.Permanent_Address == " ") {
        Addresstoast.add({ severity: "warn", summary: "Warn Message", detail: "Message Content", life: 3e3 });
      } else {
        let id = fetch_data.current_user_id;
        let url = `/profile-pages-update-address_info/${id}`;
        axios.post(url, {
          user_code: _instance_profilePagesStore.employeeDetails.user_code,
          current_address_line_1: diolog_Addressinfo.current_address,
          permanent_address_line_1: diolog_Addressinfo.Permanent_Address
        }).then((res) => {
          data_checking.value = false;
          if (res.data.status == "success") {
            toast.add({ severity: "success", summary: "Updated", detail: "Address information updated", life: 3e3 });
            _instance_profilePagesStore.employeeDetails.current_address_line_1 = diolog_Addressinfo.current_address;
            _instance_profilePagesStore.employeeDetails.get_employee_office_details.permanent_address_line_1 = diolog_Addressinfo.Permanent_Address;
          } else if (res.data.status == "failure") {
            addressUpdateDetails.leave_request_error_messege = res.data.message;
          }
        }).catch((err) => {
          console.log(err);
        }).finally(() => {
          _instance_profilePagesStore.fetchEmployeeDetails();
          canShowLoading.value = false;
        });
        addressVisible.value = false;
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_Toast = resolveComponent("Toast");
      _push(`<!--[-->`);
      if (unref(_instance_profilePagesStore).employeeDetails.get_employee_details) {
        _push(`<div class="w-full"><div class="w-full bg-white rounded-lg p-2 border"><div class="flex justify-around"><p class="font-semibold text-sm">General Information</p><div class="flex justify-end"><img${ssrRenderAttr("src", _imports_0)} class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""></div></div><div class="grid grid-cols-12 gap-2 h-full py-2"><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Birthday</p><p class="font-semibold text-sm">${ssrInterpolate(unref(dayjs)(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.dob).format("DD-MMM-YYYY"))}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Gender</p><p class="font-semibold text-sm">${ssrInterpolate(unref(fetch_data).capitalizeFLetter(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.gender))}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Date Of Joining (DOJ)</p><p class="font-semibold text-sm">${ssrInterpolate(unref(dayjs)(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.doj).format("DD-MMM-YYYY"))}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Marital Status</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.marital_status)}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Blood Group</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.blood_group_name)}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Physically Handicapped</p><p class="font-semibold text-sm">${ssrInterpolate(unref(fetch_data).capitalizeFLetter(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.physically_challenged))}</p></div></div></div><div class="w-full bg-white rounded-lg p-2 border my-3"><div class="flex justify-around"><p class="font-semibold text-sm">Contact Information</p><div class="flex justify-end"><img${ssrRenderAttr("src", _imports_0)} class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""></div></div><div class="grid grid-cols-12 gap-4 h-full py-2"><div class="col-span-3"><p class="font-semibold text-xs text-gray-500">Personal Email</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.email ? unref(_instance_profilePagesStore).employeeDetails.email : "-")}</p></div><div class="col-span-3"><p class="font-semibold text-xs text-gray-500">Official Email</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.officical_mail ? unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.officical_mail : "-")}</p></div><div class="col-span-3"><p class="font-semibold text-xs text-gray-500">Mobile Number</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.mobile_number ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.mobile_number : "-")}</p></div><div class="col-span-3"><p class="font-semibold text-xs text-gray-500">Official Mobile Number</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.official_mobile ? unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details.official_mobile : "-")}</p></div></div></div><div class="w-full bg-white rounded-lg p-2 border"><div class="flex justify-around"><p class="font-semibold text-sm">Address</p><div class="flex justify-end"><img${ssrRenderAttr("src", _imports_0)} class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""></div></div><div class="grid grid-cols-12 gap-4 h-full py-2"><div class="col-span-6"><p class="font-semibold text-xs text-gray-500">Current Address</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.current_address_line_1 ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.current_address_line_1 : "-")}</p></div><div class="col-span-6"><p class="font-semibold text-xs text-gray-500">Permanent Address </p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.permanent_address_line_1 ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.permanent_address_line_1 : "-")}</p></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        visible: is_dialog_generalInfo_visible.value,
        "onUpdate:visible": ($event) => is_dialog_generalInfo_visible.value = $event,
        modal: "",
        header: "General Information",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}"${_scopeId}> General Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " General Information", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid grid-cols-2"${_scopeId}><div class=""${_scopeId}><div class="mb-1 form-group"${_scopeId}><label class="ml-[5px]"${_scopeId}>Birth Date<span class="text-danger"${_scopeId}>*</span></label><div class="cal-icon"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              class: "mb-3 form-selects w-[94%]",
              modelValue: dialog_general_information.dob,
              "onUpdate:modelValue": ($event) => dialog_general_information.dob = $event,
              placeholder: "DD-MM-YYYY",
              dateFormat: "dd-mm-yy"
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div><div class=""${_scopeId}><div class="mb-1 form-group"${_scopeId}><label${_scopeId}>Gender<span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: dialog_general_information.gender,
              "onUpdate:modelValue": ($event) => dialog_general_information.gender = $event,
              options: options_gender.value,
              optionLabel: "name",
              optionValue: "value",
              placeholder: "Choose Gender",
              class: "form-selects w-[94%]"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class=""${_scopeId}><div class="mb-1 form-group"${_scopeId}><label style="${ssrRenderStyle({ marginLeft: "10px", marginRight: "10px" })}"${_scopeId}>Marital status <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: dialog_general_information.marital_status_id,
              "onUpdate:modelValue": ($event) => dialog_general_information.marital_status_id = $event,
              options: option_maritals_status.value,
              optionLabel: "name",
              optionValue: "id",
              placeholder: "Select Marital Status",
              class: "form-selects w-[94%]",
              style: { marginLeft: "10px", marginRight: "10px" }
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class=""${_scopeId}><div class="mb-2 form-group"${_scopeId}><label${_scopeId}>Blood Group<span class="text-danger"${_scopeId}>*</span></label><div class="cal-icon"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: dialog_general_information.blood_group_id,
              "onUpdate:modelValue": ($event) => dialog_general_information.blood_group_id = $event,
              options: options_blood_group.value,
              optionLabel: "name",
              optionValue: "id",
              placeholder: "Select Bloodgroup",
              class: "form-selects w-[94%]"
            }, null, _parent2, _scopeId));
            _push2(`</div></div></div><div class=""${_scopeId}><div class="form-group w-full" style="${ssrRenderStyle({ marginLeft: "10px" })}"${_scopeId}><label class="my-1"${_scopeId}>Physically Handicapped</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: dialog_general_information.physically_challenged,
              "onUpdate:modelValue": ($event) => dialog_general_information.physically_challenged = $event,
              options: options_phy_challenged.value,
              optionLabel: "name",
              optionValue: "value",
              placeholder: "Select",
              class: "form-selects w-[94%]"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class=""${_scopeId}><div class="mb-3 form-group"${_scopeId}></div></div></div><div class="text-right col-12"${_scopeId}><button id="btn_submit_generalInfo" class="btn btn-border-orange submit-btn"${_scopeId}>Save</button></div>`);
          } else {
            return [
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", { class: "" }, [
                  createVNode("div", { class: "mb-1 form-group" }, [
                    createVNode("label", { class: "ml-[5px]" }, [
                      createTextVNode("Birth Date"),
                      createVNode("span", { class: "text-danger" }, "*")
                    ]),
                    createVNode("div", { class: "cal-icon" }, [
                      createVNode(_component_Calendar, {
                        class: "mb-3 form-selects w-[94%]",
                        modelValue: dialog_general_information.dob,
                        "onUpdate:modelValue": ($event) => dialog_general_information.dob = $event,
                        placeholder: "DD-MM-YYYY",
                        dateFormat: "dd-mm-yy"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("div", { class: "mb-1 form-group" }, [
                    createVNode("label", null, [
                      createTextVNode("Gender"),
                      createVNode("span", { class: "text-danger" }, "*")
                    ]),
                    createVNode(_component_Dropdown, {
                      modelValue: dialog_general_information.gender,
                      "onUpdate:modelValue": ($event) => dialog_general_information.gender = $event,
                      options: options_gender.value,
                      optionLabel: "name",
                      optionValue: "value",
                      placeholder: "Choose Gender",
                      class: "form-selects w-[94%]"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("div", { class: "mb-1 form-group" }, [
                    createVNode("label", { style: { marginLeft: "10px", marginRight: "10px" } }, [
                      createTextVNode("Marital status "),
                      createVNode("span", { class: "text-danger" }, "*")
                    ]),
                    createVNode(_component_Dropdown, {
                      modelValue: dialog_general_information.marital_status_id,
                      "onUpdate:modelValue": ($event) => dialog_general_information.marital_status_id = $event,
                      options: option_maritals_status.value,
                      optionLabel: "name",
                      optionValue: "id",
                      placeholder: "Select Marital Status",
                      class: "form-selects w-[94%]",
                      style: { marginLeft: "10px", marginRight: "10px" }
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("div", { class: "mb-2 form-group" }, [
                    createVNode("label", null, [
                      createTextVNode("Blood Group"),
                      createVNode("span", { class: "text-danger" }, "*")
                    ]),
                    createVNode("div", { class: "cal-icon" }, [
                      createVNode(_component_Dropdown, {
                        modelValue: dialog_general_information.blood_group_id,
                        "onUpdate:modelValue": ($event) => dialog_general_information.blood_group_id = $event,
                        options: options_blood_group.value,
                        optionLabel: "name",
                        optionValue: "id",
                        placeholder: "Select Bloodgroup",
                        class: "form-selects w-[94%]"
                      }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                    ])
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("div", {
                    class: "form-group w-full",
                    style: { marginLeft: "10px" }
                  }, [
                    createVNode("label", { class: "my-1" }, "Physically Handicapped"),
                    createVNode(_component_Dropdown, {
                      modelValue: dialog_general_information.physically_challenged,
                      "onUpdate:modelValue": ($event) => dialog_general_information.physically_challenged = $event,
                      options: options_phy_challenged.value,
                      optionLabel: "name",
                      optionValue: "value",
                      placeholder: "Select",
                      class: "form-selects w-[94%]"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("div", { class: "mb-3 form-group" })
                ])
              ]),
              createVNode("div", { class: "text-right col-12" }, [
                createVNode("button", {
                  id: "btn_submit_generalInfo",
                  class: "btn btn-border-orange submit-btn",
                  onClick: ($event) => saveGeneralInformationDetails()
                }, "Save", 8, ["onClick"])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        visible: ContactVisible.value,
        "onUpdate:visible": ($event) => ContactVisible.value = $event,
        modal: "",
        header: "Contact Information",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}"${_scopeId}> Contact Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " Contact Information", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="modal-body"${_scopeId}><div class="row"${_scopeId}><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Personal Email</label><input type="email" name="present_email" class="form-control"${ssrRenderAttr("value", dailog_contactinfo.email)}${_scopeId}></div></div><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}> Office Email</label><input type="email" class="form-control" name="officical_mail"${ssrRenderAttr("value", dailog_contactinfo.official_email)}${_scopeId}></div></div><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Mobile Number</label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "basic",
              class: "form-control h-10",
              modelValue: dailog_contactinfo.mobile_number,
              "onUpdate:modelValue": ($event) => dailog_contactinfo.mobile_number = $event,
              mask: "9999999999",
              placeholder: "999999999"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Official Mobile Number</label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "basic",
              class: "form-control h-10",
              modelValue: dailog_contactinfo.official_mobile_number,
              "onUpdate:modelValue": ($event) => dailog_contactinfo.official_mobile_number = $event,
              mask: "9999999999",
              placeholder: "999999999"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="col-12"${_scopeId}><div class="text-right"${_scopeId}><button class="btn btn-border-orange submit-btn"${_scopeId}>Save</button></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "modal-body" }, [
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "col-md-6" }, [
                    createVNode("div", { class: "mb-3 form-group" }, [
                      createVNode("label", null, "Personal Email"),
                      withDirectives(createVNode("input", {
                        type: "email",
                        name: "present_email",
                        class: "form-control",
                        "onUpdate:modelValue": ($event) => dailog_contactinfo.email = $event
                      }, null, 8, ["onUpdate:modelValue"]), [
                        [vModelText, dailog_contactinfo.email]
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "col-md-6" }, [
                    createVNode("div", { class: "mb-3 form-group" }, [
                      createVNode("label", null, " Office Email"),
                      withDirectives(createVNode("input", {
                        type: "email",
                        class: "form-control",
                        name: "officical_mail",
                        "onUpdate:modelValue": ($event) => dailog_contactinfo.official_email = $event
                      }, null, 8, ["onUpdate:modelValue"]), [
                        [vModelText, dailog_contactinfo.official_email]
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "col-md-6" }, [
                    createVNode("div", { class: "mb-3 form-group" }, [
                      createVNode("label", null, "Mobile Number"),
                      createVNode(_component_InputMask, {
                        id: "basic",
                        class: "form-control h-10",
                        modelValue: dailog_contactinfo.mobile_number,
                        "onUpdate:modelValue": ($event) => dailog_contactinfo.mobile_number = $event,
                        mask: "9999999999",
                        placeholder: "999999999"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ]),
                  createVNode("div", { class: "col-md-6" }, [
                    createVNode("div", { class: "mb-3 form-group" }, [
                      createVNode("label", null, "Official Mobile Number"),
                      createVNode(_component_InputMask, {
                        id: "basic",
                        class: "form-control h-10",
                        modelValue: dailog_contactinfo.official_mobile_number,
                        "onUpdate:modelValue": ($event) => dailog_contactinfo.official_mobile_number = $event,
                        mask: "9999999999",
                        placeholder: "999999999"
                      }, null, 8, ["modelValue", "onUpdate:modelValue"])
                    ])
                  ]),
                  createVNode("div", { class: "col-12" }, [
                    createVNode("div", { class: "text-right" }, [
                      createVNode("button", {
                        class: "btn btn-border-orange submit-btn",
                        onClick: save_contactinfoDetails
                      }, "Save")
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
        visible: addressVisible.value,
        "onUpdate:visible": ($event) => addressVisible.value = $event,
        modal: "",
        header: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}"${_scopeId}> Address Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " Address Information", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="modal-body"${_scopeId}><div class="col-md-12"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Current Address</label><textarea name="current_address_line_1" id="current_address_line_1" cols="30" rows="3" class="form-control"${_scopeId}>${ssrInterpolate(diolog_Addressinfo.current_address)}</textarea></div><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Permanent Address </label><textarea name="permanent_address_line_1" id="permanent_address_line_1" cols="30" rows="3" class="form-control"${_scopeId}>${ssrInterpolate(diolog_Addressinfo.Permanent_Address)}</textarea></div></div><div class="col-12"${_scopeId}><div class="d-flex justify-content-between align-items-center"${_scopeId}><div class="d-flex justify-content-center align-items-center"${_scopeId}><input type="checkbox" class="border rounded-md"${ssrIncludeBooleanAttr(Array.isArray(CopyAddress.value) ? ssrLooseContain(CopyAddress.value, 1) : CopyAddress.value) ? " checked" : ""} style="${ssrRenderStyle({ "width": "20px", "height": "20px" })}"${ssrRenderAttr("value", 1)}${_scopeId}><h1 class="mx-2"${_scopeId}>Copy current address to the permanent address</h1></div><div class=""${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<button id="btn_submit_address" class="btn btn-border-orange submit-btn warn" severity="warn"${_scopeId}>Save</button></div></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "modal-body" }, [
                createVNode("div", { class: "col-md-12" }, [
                  createVNode("div", { class: "mb-3 form-group" }, [
                    createVNode("label", null, "Current Address"),
                    withDirectives(createVNode("textarea", {
                      name: "current_address_line_1",
                      id: "current_address_line_1",
                      cols: "30",
                      rows: "3",
                      class: "form-control",
                      "onUpdate:modelValue": ($event) => diolog_Addressinfo.current_address = $event
                    }, null, 8, ["onUpdate:modelValue"]), [
                      [vModelText, diolog_Addressinfo.current_address]
                    ])
                  ]),
                  createVNode("div", { class: "mb-3 form-group" }, [
                    createVNode("label", null, "Permanent Address "),
                    withDirectives(createVNode("textarea", {
                      name: "permanent_address_line_1",
                      id: "permanent_address_line_1",
                      cols: "30",
                      rows: "3",
                      class: "form-control",
                      "onUpdate:modelValue": ($event) => diolog_Addressinfo.Permanent_Address = $event
                    }, null, 8, ["onUpdate:modelValue"]), [
                      [vModelText, diolog_Addressinfo.Permanent_Address]
                    ])
                  ])
                ]),
                createVNode("div", { class: "col-12" }, [
                  createVNode("div", { class: "d-flex justify-content-between align-items-center" }, [
                    createVNode("div", { class: "d-flex justify-content-center align-items-center" }, [
                      withDirectives(createVNode("input", {
                        type: "checkbox",
                        class: "border rounded-md",
                        "onUpdate:modelValue": ($event) => CopyAddress.value = $event,
                        style: { "width": "20px", "height": "20px" },
                        onChange: copyAddress,
                        value: 1
                      }, null, 40, ["onUpdate:modelValue"]), [
                        [vModelCheckbox, CopyAddress.value]
                      ]),
                      createVNode("h1", { class: "mx-2" }, "Copy current address to the permanent address")
                    ]),
                    createVNode("div", { class: "" }, [
                      createVNode(_component_Toast),
                      createVNode("button", {
                        id: "btn_submit_address",
                        class: "btn btn-border-orange submit-btn warn",
                        onClick: saveAddressinfoDetails,
                        severity: "warn"
                      }, "Save")
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
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/employee_details/EmployeeDetails.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const FamilyDetails_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
  __name: "FamilyDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const fetch_data = Service();
    const _instance_profilePagesStore = profilePagesStore();
    const toast = useToast();
    ref("");
    const DialogFamilyinfovisible = ref(false);
    const DialogEditInfovisible = ref(false);
    const familydetails = reactive({
      name: "",
      relationship: "",
      dob: "",
      phone_number: ""
    });
    const Editfamilydetails = reactive({
      name: "",
      relationship: "",
      dob: "",
      phone_number: ""
    });
    const current_table_id = ref();
    const saveFamilyDetails = () => {
      _instance_profilePagesStore.loading_screen = true;
      let id = fetch_data.current_user_id;
      let url = `/add-family-info/${id}`;
      axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        name: familydetails.name,
        relationship: familydetails.relationship,
        dob: dayjs(familydetails.dob).format("YYYY-MM-DD"),
        phone_number: familydetails.phone_number
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Updated", detail: "Family information updated", life: 3e3 });
          _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(familydetails.dob, "YYYY-MM-DD");
          _instance_profilePagesStore.employeeDetails.get_family_details.name = familydetails.gender;
          _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;
          _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = familydetails.phone_number;
        } else if (res.data.status == "failure")
          ;
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        _instance_profilePagesStore.loading_screen = false;
      });
      DialogFamilyinfovisible.value = false;
    };
    const diolog_EditFamilyDetails = (family) => {
      DialogEditInfovisible.value = true;
      current_table_id.value = family.id;
      Editfamilydetails.name = family.name;
      Editfamilydetails.relationship = family.relationship;
      Editfamilydetails.dob = family.dob;
      Editfamilydetails.phone_number = family.phone_number;
    };
    const diolog_DeleteFamilyDetails = (family) => {
      _instance_profilePagesStore.loading_screen = true;
      current_table_id.value = family.id;
      let id = fetch_data.current_user_id;
      let url = ` /delete-family-info/${id}`;
      axios.post(url, {
        current_table_id: current_table_id.value
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Deleted", detail: "General information updated", life: 3e3 });
          _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(familydetails.dob, "YYYY-MM-DD");
          _instance_profilePagesStore.employeeDetails.get_family_details.name = familydetails.gender;
          _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;
          _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = familydetails.phone_number;
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.loading_screen = false;
        _instance_profilePagesStore.fetchEmployeeDetails();
      });
    };
    const EditFamilyDetails = (user) => {
      _instance_profilePagesStore.loading_screen = true;
      let id = fetch_data.current_user_id;
      let url = `/update-family-info/${id}`;
      axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        current_table_id: current_table_id.value,
        name: Editfamilydetails.name,
        relationship: Editfamilydetails.relationship,
        dob: dayjs(Editfamilydetails.dob).format("YYYY-MM-DD"),
        phone_number: Editfamilydetails.phone_number
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Updated", detail: "General information updated", life: 3e3 });
          _instance_profilePagesStore.employeeDetails.get_family_details.dob = useDateFormat(Editfamilydetails.dob, "YYYY-MM-DD");
          _instance_profilePagesStore.employeeDetails.get_family_details.name = Editfamilydetails.gender;
          _instance_profilePagesStore.employeeDetails.get_family_details.relationship = familydetails.relationship;
          _instance_profilePagesStore.employeeDetails.get_family_details.phone_number = Editfamilydetails.phone_number;
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        _instance_profilePagesStore.loading_screen = false;
      });
      DialogEditInfovisible.value = false;
    };
    onMounted(() => {
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_Toast = resolveComponent("Toast");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[--><div class="mb-2 card"><div class="card-body"><h6 class="font-semibold text-lg">Family Information <button type="button" class="float-right btn btn-orange"> Add New </button>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: DialogFamilyinfovisible.value,
        "onUpdate:visible": ($event) => DialogFamilyinfovisible.value = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" },
        id: ""
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-15"${_scopeId}> Family Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-15"
                }, " Family Information", 4)
              ])
            ];
          }
        }),
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<div${_scopeId}><button type="button" class="submit_btn warning success" id="submit_button_family_details"${_scopeId}>submit</button></div>`);
          } else {
            return [
              createVNode(_component_Toast),
              createVNode("div", null, [
                createVNode("button", {
                  type: "button",
                  class: "submit_btn warning success",
                  id: "submit_button_family_details",
                  onClick: saveFamilyDetails
                }, "submit")
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid grid-cols-2"${_scopeId}><div class="mr-[10px] ml-[8px]"${_scopeId}><span${_scopeId}>Name <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: familydetails.name,
              "onUpdate:modelValue": ($event) => familydetails.name = $event,
              class: "w-[94%] h-10"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class=""${_scopeId}><span${_scopeId}>Relationship<span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: familydetails.relationship,
              "onUpdate:modelValue": ($event) => familydetails.relationship = $event,
              class: "w-[90%] h-10"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="grid grid-cols-2"${_scopeId}><div class="mr-2"${_scopeId}><span${_scopeId}>Date of birth <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              dateFormat: "dd/mm/yy",
              modelValue: familydetails.dob,
              "onUpdate:modelValue": ($event) => familydetails.dob = $event,
              class: "h-10 w-[98%]",
              minDate: _ctx.minDate,
              maxDate: _ctx.maxDate
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="ml-1"${_scopeId}><span${_scopeId}>phone<span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "basic",
              mask: "9999999999",
              placeholder: "9999999999",
              class: "h-10",
              modelValue: familydetails.phone_number,
              "onUpdate:modelValue": ($event) => familydetails.phone_number = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", { class: "mr-[10px] ml-[8px]" }, [
                  createVNode("span", null, [
                    createTextVNode("Name "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: familydetails.name,
                    "onUpdate:modelValue": ($event) => familydetails.name = $event,
                    class: "w-[94%] h-10"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("span", null, [
                    createTextVNode("Relationship"),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: familydetails.relationship,
                    "onUpdate:modelValue": ($event) => familydetails.relationship = $event,
                    class: "w-[90%] h-10"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ]),
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", { class: "mr-2" }, [
                  createVNode("span", null, [
                    createTextVNode("Date of birth "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_Calendar, {
                    dateFormat: "dd/mm/yy",
                    modelValue: familydetails.dob,
                    "onUpdate:modelValue": ($event) => familydetails.dob = $event,
                    class: "h-10 w-[98%]",
                    minDate: _ctx.minDate,
                    maxDate: _ctx.maxDate
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "minDate", "maxDate"])
                ]),
                createVNode("div", { class: "ml-1" }, [
                  createVNode("span", null, [
                    createTextVNode("phone"),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputMask, {
                    id: "basic",
                    mask: "9999999999",
                    placeholder: "9999999999",
                    class: "h-10",
                    modelValue: familydetails.phone_number,
                    "onUpdate:modelValue": ($event) => familydetails.phone_number = $event
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</h6><div class="my-6 table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        dataKey: "id",
        paginator: true,
        rows: 10,
        value: unref(_instance_profilePagesStore).employeeDetails.get_family_details,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Name",
              field: "name",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "relationship",
              header: "Relationship",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "dob",
              header: "Date of Birth ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.dob == "Invalid Date") {
                    _push3(`<div${_scopeId2}> - </div>`);
                  } else {
                    _push3(`<div${_scopeId2}>${ssrInterpolate(unref(dayjs)(slotProps.data.dob).format("DD-MMM-YYYY"))}</div>`);
                  }
                } else {
                  return [
                    slotProps.data.dob == "Invalid Date" ? (openBlock(), createBlock("div", { key: 0 }, " - ")) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(unref(dayjs)(slotProps.data.dob).format("DD-MMM-YYYY")), 1))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "phone_number",
              header: "Phone",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              exportable: false,
              header: "Action",
              style: { "min-width": "20rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-2 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button><template${_scopeId2}></template>`);
                } else {
                  return [
                    createVNode("button", {
                      class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                      onClick: ($event) => diolog_EditFamilyDetails(slotProps.data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-5 h-5"
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
                      onClick: ($event) => diolog_DeleteFamilyDetails(slotProps.data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-5 h-5 font-bold"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        })
                      ]))
                    ], 8, ["onClick"]),
                    createVNode("template")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Name",
                field: "name",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "relationship",
                header: "Relationship",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "dob",
                header: "Date of Birth ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.dob == "Invalid Date" ? (openBlock(), createBlock("div", { key: 0 }, " - ")) : (openBlock(), createBlock("div", { key: 1 }, toDisplayString(unref(dayjs)(slotProps.data.dob).format("DD-MMM-YYYY")), 1))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "phone_number",
                header: "Phone",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                exportable: false,
                header: "Action",
                style: { "min-width": "20rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                    onClick: ($event) => diolog_EditFamilyDetails(slotProps.data)
                  }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-5 h-5"
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
                    onClick: ($event) => diolog_DeleteFamilyDetails(slotProps.data)
                  }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-5 h-5 font-bold"
                    }, [
                      createVNode("path", {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                      })
                    ]))
                  ], 8, ["onClick"]),
                  createVNode("template")
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: DialogEditInfovisible.value,
        "onUpdate:visible": ($event) => DialogEditInfovisible.value = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}"${_scopeId}> Family Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " Family Information", 4)
              ])
            ];
          }
        }),
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<div${_scopeId}><button type="button" class="submit_btn warning success" id="submit_button_family_details"${_scopeId}>submit</button></div>`);
          } else {
            return [
              createVNode(_component_Toast),
              createVNode("div", null, [
                createVNode("button", {
                  type: "button",
                  class: "submit_btn warning success",
                  id: "submit_button_family_details",
                  onClick: EditFamilyDetails
                }, "submit")
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid grid-cols-2"${_scopeId}><div class=""${_scopeId}><span${_scopeId}>Name <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: Editfamilydetails.name,
              "onUpdate:modelValue": ($event) => Editfamilydetails.name = $event,
              class: "h-10 w-[90%]"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class=""${_scopeId}><span${_scopeId}>Relationship<span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: Editfamilydetails.relationship,
              "onUpdate:modelValue": ($event) => Editfamilydetails.relationship = $event,
              class: "h-10 w-[90%] ml-2"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="grid grid-cols-2"${_scopeId}><div class="mr-2"${_scopeId}><span${_scopeId}>Date of birth <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: Editfamilydetails.dob,
              "onUpdate:modelValue": ($event) => Editfamilydetails.dob = $event,
              min: "2000-01-02",
              class: "w-[100%] h-10"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="ml-2"${_scopeId}><span${_scopeId}>phone<span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              id: "basic",
              modelValue: Editfamilydetails.phone_number,
              "onUpdate:modelValue": ($event) => Editfamilydetails.phone_number = $event,
              mask: "9999999999",
              placeholder: "999999999",
              class: "h-10 m"
            }, null, _parent2, _scopeId));
            _push2(`</div></div>`);
          } else {
            return [
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", { class: "" }, [
                  createVNode("span", null, [
                    createTextVNode("Name "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: Editfamilydetails.name,
                    "onUpdate:modelValue": ($event) => Editfamilydetails.name = $event,
                    class: "h-10 w-[90%]"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("span", null, [
                    createTextVNode("Relationship"),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: Editfamilydetails.relationship,
                    "onUpdate:modelValue": ($event) => Editfamilydetails.relationship = $event,
                    class: "h-10 w-[90%] ml-2"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ]),
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", { class: "mr-2" }, [
                  createVNode("span", null, [
                    createTextVNode("Date of birth "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_Calendar, {
                    modelValue: Editfamilydetails.dob,
                    "onUpdate:modelValue": ($event) => Editfamilydetails.dob = $event,
                    min: "2000-01-02",
                    class: "w-[100%] h-10"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "ml-2" }, [
                  createVNode("span", null, [
                    createTextVNode("phone"),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputMask, {
                    id: "basic",
                    modelValue: Editfamilydetails.phone_number,
                    "onUpdate:modelValue": ($event) => Editfamilydetails.phone_number = $event,
                    mask: "9999999999",
                    placeholder: "999999999",
                    class: "h-10 m"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
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
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/family_details/FamilyDetails.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const FinanceDetails_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = {
  __name: "FinanceDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const _instance_profilePagesStore = profilePagesStore();
    const fetch_data = Service();
    const toast = useToast();
    const canShowLoading = ref(false);
    const dialog_PanNo_visible = ref(false);
    const payroll_summary = ref();
    payroll_summary.value = _instance_profilePagesStore.employeeDetails.payroll_summary;
    console.log("testing payroll summary :", payroll_summary.value);
    let form = new FormData();
    form.append("user_code", Service.current_user_code);
    form.append("file_object", profilePagesStore.value);
    let url = "/profile-pages/updateProfilePicture";
    axios.post(url, form).then((res) => {
    }).finally(() => {
      console.log("Photo Sent");
    });
    const statutory = ref([]);
    const bankNameList = ref();
    statutory.value.push(_instance_profilePagesStore.employeeDetails.get_statutory_details);
    onMounted(() => {
      fetch_data.getBankList().then((res) => {
        bankNameList.value = res.data;
      });
      _instance_profilePagesStore.fetchEmployeeDetails();
    });
    const dialog_Bankvisible = ref(false);
    const dialog_statutory_visible = ref(false);
    ref();
    ref();
    const bank_information = reactive({
      bank_id: "",
      bank_ac_no: "",
      ifsc_code: "",
      PassBook: ""
    });
    const pan_information = reactive({
      pan_no: "",
      Pancard: ""
    });
    const updateCheckBookPhoto = (e) => {
      if (e.target.files && e.target.files[0]) {
        bank_information.PassBook = e.target.files[0];
        console.log(bank_information.PassBook);
      }
    };
    const esic_applicable_option = ref([
      { name: "Yes", value: "Yes" },
      { name: "No", value: "No" }
    ]);
    const saveBankinfoDetails = () => {
      canShowLoading.value = true;
      let id = fetch_data.current_user_id;
      let url2 = `/update-bank-info/${id}`;
      let form2 = new FormData();
      form2.append("user_code", _instance_profilePagesStore.employeeDetails.user_code);
      form2.append("bank_id", bank_information.bank_id);
      form2.append("account_no", bank_information.bank_ac_no);
      form2.append("bank_ifsc", bank_information.ifsc_code);
      form2.append("PassBook", bank_information.PassBook);
      form2.append("onboard_document_type", "Cheque leaf/Bank Passbook");
      axios.post(url2, form2).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Updated", detail: "Bank information updated", life: 3e3 });
          _instance_profilePagesStore.employeeDetails.get_employee_details.bank_id = bank_information.bank_id;
          _instance_profilePagesStore.employeeDetails.get_employee_details.bank_account_number = bank_information.bank_ac_no;
          _instance_profilePagesStore.employeeDetails.get_employee_details.bank_ifsc_code = bank_information.ifsc_code;
          _instance_profilePagesStore.employeeDetails.get_employee_details.pan_no = bank_information.pan_no;
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        canShowLoading.value = false;
      });
      dialog_Bankvisible.value = false;
    };
    const statutory_information = reactive({
      pf_applicable: "",
      epf_no: "",
      uan_no: "",
      esic_applicable: "",
      esic_no: ""
    });
    const saveinfo_statutoryDetails = () => {
      canShowLoading.value = true;
      let id = fetch_data.current_user_id;
      let url2 = `/update-statutory-info/${id}`;
      axios.post(url2, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        pf_applicable: statutory_information.pf_applicable,
        epf_number: statutory_information.epf_no,
        uan_number: statutory_information.uan_no,
        esic_applicable: statutory_information.esic_applicable,
        esic_number: statutory_information.esic_no
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Updated", detail: "General information updated", life: 3e3 });
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        canShowLoading.value = false;
      });
      dialog_statutory_visible.value = false;
    };
    const UploadPandcardPhoto = (e) => {
      if (e.target.files && e.target.files[0]) {
        pan_information.Pancard = e.target.files[0];
        console.log(pan_information.Pancard);
      }
    };
    const savePancardInfoDetails = () => {
      canShowLoading.value = true;
      let id = fetch_data.current_user_id;
      const url2 = `/update-Pancard-info/${id}`;
      const form2 = new FormData();
      form2.append("pan_no", pan_information.pan_no);
      form2.append("pancard", pan_information.Pancard);
      form2.append("user_code", _instance_profilePagesStore.employeeDetails.user_code);
      form2.append("onboard_document_type", "Pan Card");
      dialog_PanNo_visible.value = false;
      if (pan_information.Pancard) {
        axios.post(url2, form2).finally(() => {
          canShowLoading.value = false;
        });
      }
    };
    const bankDetailsRules = computed(() => {
      return {
        PassBook: { required }
      };
    });
    const r$ = useValidate(bankDetailsRules, bank_information);
    const submitBankForm = () => {
      r$.value.$validate();
      if (!r$.value.$error) {
        console.log("Form successfully submitted.");
        saveBankinfoDetails();
      } else {
        console.log("Form failed submitted.");
      }
    };
    const rules = computed(() => {
      return {
        pan_no: { required },
        Pancard: { required }
      };
    });
    const v$ = useValidate(rules, pan_information);
    const submitForm = () => {
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        savePancardInfoDetails();
      } else {
        console.log("Form failed submitted.");
      }
    };
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const isSpecialChars = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z0-9]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_InputText = resolveComponent("InputText");
      const _component_Toast = resolveComponent("Toast");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<div${ssrRenderAttrs(_attrs)}><div class=""><div class=""><ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item" role="presentation"><a class="nav-link active" id="" data-bs-toggle="pill" href="" data-bs-target="#finance_summary" role="tab" aria-controls="pills-home" aria-selected="true">Summary </a></li><li class="mx-4 nav-item" role="presentation"><a class="nav-link" id="" data-bs-toggle="pill" href="" data-bs-target="#finance_pay" role="tab" aria-controls="pills-home" aria-selected="true"> Payslips </a></li></ul></div></div><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="finance_summary" role="tabpanel" aria-labelledby="">`);
      if (unref(_instance_profilePagesStore).employeeDetails.get_employee_details) {
        _push(`<div class="my-2"><div class="w-full bg-white rounded-lg p-2 border"><div class="flex justify-around"><p class="font-semibold text-sm">Payroll Summary</p><div class="flex justify-end"></div></div><div class="grid grid-cols-12 gap-2 h-full py-2"><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Last Processed</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.payroll_summary.payroll_date ? unref(dayjs)(
          unref(_instance_profilePagesStore).employeeDetails.payroll_summary.payroll_date
        ).format("DD-MMM-YYYY") : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Total Working Days</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.payroll_summary.worked_Days ? unref(_instance_profilePagesStore).employeeDetails.payroll_summary.worked_Days : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Loss Of Pay(LOP)</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.payroll_summary.lop ? unref(_instance_profilePagesStore).employeeDetails.payroll_summary.lop : "-")}</p></div></div></div><div class="w-full bg-white rounded-lg p-2 border my-3"><div class="flex justify-around"><p class="font-semibold text-sm">Bank Information</p><div class="flex justify-end"><img${ssrRenderAttr("src", _imports_0)} class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""></div></div><div class="grid grid-cols-12 gap-2 h-full py-2"><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Bank Name</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.bank_name ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.bank_name : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Bank Account No</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.bank_account_number ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.bank_account_number : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">IFSC Code</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.bank_ifsc_code ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.bank_ifsc_code : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">PAN No</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_employee_details.pan_number ? unref(_instance_profilePagesStore).employeeDetails.get_employee_details.pan_number : "-")}</p></div></div></div><div class="w-full bg-white rounded-lg p-2 border"><div class="flex justify-around"><p class="font-semibold text-sm">Statutory Information</p><div class="flex justify-end"><img${ssrRenderAttr("src", _imports_0)} class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""></div></div><div class="grid grid-cols-12 gap-2 h-full py-2"><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">PF Applicable</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.pf_applicable ? unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.pf_applicable : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">EPF Number</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.epf_number ? unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.epf_number : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">UAN Number</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.uan_number ? unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.uan_number : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">ESIC Applicable</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.esic_applicable ? unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.esic_applicable : "-")}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">ESIC Number</p><p class="font-semibold text-sm">${ssrInterpolate(unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.esic_number ? unref(_instance_profilePagesStore).employeeDetails.get_statutory_details.esic_number : "-")}</p></div></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="tab-pane fade" id="finance_pay" role="tabpanel" aria-labelledby=""><div class="mb-2 card"><div class="card-body">`);
      _push(ssrRenderComponent(_sfc_main$7, null, null, _parent));
      _push(`</div></div></div></div>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dialog_Bankvisible.value,
        "onUpdate:visible": ($event) => dialog_Bankvisible.value = $event,
        modal: "",
        header: "Header",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5"${_scopeId}> Bank Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5"
                }, " Bank Information", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><div class="modal-body"${_scopeId}><div class="row"${_scopeId}><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Bank Name</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              editable: "",
              onKeypress: ($event) => isLetter($event),
              options: bankNameList.value,
              optionLabel: "bank_name",
              optionValue: "id",
              placeholder: "Select Bank Name",
              class: "w-full form-controls",
              modelValue: bank_information.bank_id,
              "onUpdate:modelValue": ($event) => bank_information.bank_id = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>Bank Account No</label><div class="cal-icon"${_scopeId}></div>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              modelValue: bank_information.bank_ac_no,
              "onUpdate:modelValue": ($event) => bank_information.bank_ac_no = $event,
              class: "form-controls onboard-form",
              inputId: "withoutgrouping",
              useGrouping: false
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label${_scopeId}>IFSC Code</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              name: "bank_ifsc_",
              class: "form-controls pl-2",
              modelValue: bank_information.ifsc_code,
              "onUpdate:modelValue": ($event) => bank_information.ifsc_code = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="col-md-6"${_scopeId}><div class="floating d-block justify-items-start al"${_scopeId}><label for="" class="float-label mb-2"${_scopeId}>Bank Passbook or Cheque Leaf</label><div class="flex justify-content-start"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<label class="cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary" style="${ssrRenderStyle({ "width": "135px" })}" id="" for="uploadPassBook"${_scopeId}><i class="pi pi-arrow-circle-up fs-5 mr-3"${_scopeId}></i><h1 class="text-light"${_scopeId}>Upload file</h1></label><div class="d-flex flex-column justify-content-center align-items-center border"${_scopeId}><input type="file" name="" id="uploadPassBook" hidden style="${ssrRenderStyle({ "text-transform": "uppercase" })}" class="${ssrRenderClass([[
              unref(r$).PassBook.$error ? "p-invalid" : ""
            ], "form-controls pl-2"])}"${_scopeId}>`);
            if (unref(r$).PassBook.$error) {
              _push2(`<span class="text-red-400 fs-6 font-semibold text-center"${_scopeId}>${ssrInterpolate(unref(r$).PassBook.required.$message.replace("Value", "PassBook or Cheque Leaf"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
            if (bank_information.PassBook) {
              _push2(`<div class="p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4"${_scopeId}>${ssrInterpolate(bank_information.PassBook.name)}</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div></div><div class="col-12"${_scopeId}><div class="text-right"${_scopeId}><button id="btn_submit_bank_info" class="btn btn-orange submit-btn"${_scopeId}>Submit</button></div></div></div></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("div", { class: "modal-body" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "mb-3 form-group" }, [
                        createVNode("label", null, "Bank Name"),
                        createVNode(_component_Dropdown, {
                          editable: "",
                          onKeypress: ($event) => isLetter($event),
                          options: bankNameList.value,
                          optionLabel: "bank_name",
                          optionValue: "id",
                          placeholder: "Select Bank Name",
                          class: "w-full form-controls",
                          modelValue: bank_information.bank_id,
                          "onUpdate:modelValue": ($event) => bank_information.bank_id = $event
                        }, null, 8, ["onKeypress", "options", "modelValue", "onUpdate:modelValue"])
                      ])
                    ]),
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "mb-3 form-group" }, [
                        createVNode("label", null, "Bank Account No"),
                        createVNode("div", { class: "cal-icon" }),
                        createVNode(_component_InputNumber, {
                          modelValue: bank_information.bank_ac_no,
                          "onUpdate:modelValue": ($event) => bank_information.bank_ac_no = $event,
                          class: "form-controls onboard-form",
                          inputId: "withoutgrouping",
                          useGrouping: false
                        }, null, 8, ["modelValue", "onUpdate:modelValue"])
                      ])
                    ]),
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "mb-3 form-group" }, [
                        createVNode("label", null, "IFSC Code"),
                        createVNode(_component_InputText, {
                          type: "text",
                          name: "bank_ifsc_",
                          class: "form-controls pl-2",
                          modelValue: bank_information.ifsc_code,
                          "onUpdate:modelValue": ($event) => bank_information.ifsc_code = $event
                        }, null, 8, ["modelValue", "onUpdate:modelValue"])
                      ])
                    ]),
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "floating d-block justify-items-start al" }, [
                        createVNode("label", {
                          for: "",
                          class: "float-label mb-2"
                        }, "Bank Passbook or Cheque Leaf"),
                        createVNode("div", { class: "flex justify-content-start" }, [
                          createVNode(_component_Toast),
                          createVNode("label", {
                            class: "cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary",
                            style: { "width": "135px" },
                            id: "",
                            for: "uploadPassBook"
                          }, [
                            createVNode("i", { class: "pi pi-arrow-circle-up fs-5 mr-3" }),
                            createVNode("h1", { class: "text-light" }, "Upload file")
                          ]),
                          createVNode("div", { class: "d-flex flex-column justify-content-center align-items-center border" }, [
                            createVNode("input", {
                              type: "file",
                              name: "",
                              id: "uploadPassBook",
                              hidden: "",
                              onChange: ($event) => updateCheckBookPhoto($event),
                              style: { "text-transform": "uppercase" },
                              class: ["form-controls pl-2", [
                                unref(r$).PassBook.$error ? "p-invalid" : ""
                              ]]
                            }, null, 42, ["onChange"]),
                            unref(r$).PassBook.$error ? (openBlock(), createBlock("span", {
                              key: 0,
                              class: "text-red-400 fs-6 font-semibold text-center"
                            }, toDisplayString(unref(r$).PassBook.required.$message.replace("Value", "PassBook or Cheque Leaf")), 1)) : createCommentVNode("", true)
                          ]),
                          bank_information.PassBook ? (openBlock(), createBlock("div", {
                            key: 0,
                            class: "p-2 px-3 bg-green-100 rounded-lg font-semibold fs-11 mx-4"
                          }, toDisplayString(bank_information.PassBook.name), 1)) : createCommentVNode("", true)
                        ])
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "col-12" }, [
                    createVNode("div", { class: "text-right" }, [
                      createVNode("button", {
                        id: "btn_submit_bank_info",
                        class: "btn btn-orange submit-btn",
                        onClick: submitBankForm
                      }, "Submit")
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
        visible: dialog_PanNo_visible.value,
        "onUpdate:visible": ($event) => dialog_PanNo_visible.value = $event,
        modal: "",
        header: "Header",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5"${_scopeId}> Pancard Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5"
                }, " Pancard Information", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><div class="modal-body"${_scopeId}><div class="row"${_scopeId}><div class="col-md-6"${_scopeId}><div class="mb-3 form-group"${_scopeId}><label class="mb-2 font-semibold text-lg"${_scopeId}>PAN No</label>`);
            _push2(ssrRenderComponent(_component_InputMask, {
              onFocusout: _ctx.panCardExists,
              id: "serial",
              mask: "aaaaa9999a",
              modelValue: pan_information.pan_no,
              "onUpdate:modelValue": ($event) => pan_information.pan_no = $event,
              placeholder: "AHFCS1234F",
              style: { "text-transform": "uppercase" },
              class: ["form-controls pl-2", [
                unref(v$).pan_no.$error ? "p-invalid" : ""
              ]]
            }, null, _parent2, _scopeId));
            if (unref(v$).pan_no.$error) {
              _push2(`<span class="text-red-400 fs-6 font-semibold"${_scopeId}>${ssrInterpolate(unref(v$).pan_no.required.$message.replace("Value", "Pancard number"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="col-md-6 d-flex flex-column"${_scopeId}><div class="d-flex justify-items-center flex-column ml-10"${_scopeId}><label for="" class="float-label mb-2 font-semibold text-lg"${_scopeId}>Pancard</label><div class="d-flex justify-items-center align-items-center"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<label class="cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary" style="${ssrRenderStyle({ "width": "100px" })}" id="" for="uploadPassBook"${_scopeId}><i class="pi pi-arrow-circle-up fs-5 mr-2"${_scopeId}></i><h1 class="text-light"${_scopeId}>Upload</h1></label>`);
            if (pan_information.Pancard) {
              _push2(`<div class="p-2 bg-blue-100 rounded-lg font-semibold fs-11 mx-4"${_scopeId}>${ssrInterpolate(pan_information.Pancard.name)}</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`<input type="file" name="" id="uploadPassBook" hidden class="${ssrRenderClass([
              unref(v$).Pancard.$error ? "p-invalid" : ""
            ])}"${_scopeId}></div>`);
            if (unref(v$).Pancard.$error) {
              _push2(`<span class="text-red-400 fs-6 font-semibold"${_scopeId}>${ssrInterpolate(unref(v$).Pancard.required.$message.replace("Value", "Pancard attachment"))}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div></div><div class="col-12"${_scopeId}><div class="text-right"${_scopeId}><button id="btn_submit_bank_info" class="btn btn-orange submit-btn"${_scopeId}>Submit</button></div></div></div></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("div", { class: "modal-body" }, [
                  createVNode("div", { class: "row" }, [
                    createVNode("div", { class: "col-md-6" }, [
                      createVNode("div", { class: "mb-3 form-group" }, [
                        createVNode("label", { class: "mb-2 font-semibold text-lg" }, "PAN No"),
                        createVNode(_component_InputMask, {
                          onFocusout: _ctx.panCardExists,
                          id: "serial",
                          mask: "aaaaa9999a",
                          modelValue: pan_information.pan_no,
                          "onUpdate:modelValue": ($event) => pan_information.pan_no = $event,
                          placeholder: "AHFCS1234F",
                          style: { "text-transform": "uppercase" },
                          class: ["form-controls pl-2", [
                            unref(v$).pan_no.$error ? "p-invalid" : ""
                          ]]
                        }, null, 8, ["onFocusout", "modelValue", "onUpdate:modelValue", "class"]),
                        unref(v$).pan_no.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "text-red-400 fs-6 font-semibold"
                        }, toDisplayString(unref(v$).pan_no.required.$message.replace("Value", "Pancard number")), 1)) : createCommentVNode("", true)
                      ])
                    ]),
                    createVNode("div", { class: "col-md-6 d-flex flex-column" }, [
                      createVNode("div", { class: "d-flex justify-items-center flex-column ml-10" }, [
                        createVNode("label", {
                          for: "",
                          class: "float-label mb-2 font-semibold text-lg"
                        }, "Pancard"),
                        createVNode("div", { class: "d-flex justify-items-center align-items-center" }, [
                          createVNode(_component_Toast),
                          createVNode("label", {
                            class: "cursor-pointer text-primary d-flex align-items-center fs-5 btn bg-primary",
                            style: { "width": "100px" },
                            id: "",
                            for: "uploadPassBook"
                          }, [
                            createVNode("i", { class: "pi pi-arrow-circle-up fs-5 mr-2" }),
                            createVNode("h1", { class: "text-light" }, "Upload")
                          ]),
                          pan_information.Pancard ? (openBlock(), createBlock("div", {
                            key: 0,
                            class: "p-2 bg-blue-100 rounded-lg font-semibold fs-11 mx-4"
                          }, toDisplayString(pan_information.Pancard.name), 1)) : createCommentVNode("", true),
                          createVNode("input", {
                            type: "file",
                            name: "",
                            id: "uploadPassBook",
                            hidden: "",
                            onChange: ($event) => UploadPandcardPhoto($event),
                            class: [
                              unref(v$).Pancard.$error ? "p-invalid" : ""
                            ]
                          }, null, 42, ["onChange"])
                        ]),
                        unref(v$).Pancard.$error ? (openBlock(), createBlock("span", {
                          key: 0,
                          class: "text-red-400 fs-6 font-semibold"
                        }, toDisplayString(unref(v$).Pancard.required.$message.replace("Value", "Pancard attachment")), 1)) : createCommentVNode("", true)
                      ])
                    ])
                  ]),
                  createVNode("div", { class: "col-12" }, [
                    createVNode("div", { class: "text-right" }, [
                      createVNode("button", {
                        id: "btn_submit_bank_info",
                        class: "btn btn-orange submit-btn",
                        onClick: submitForm
                      }, "Submit")
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
        visible: dialog_statutory_visible.value,
        "onUpdate:visible": ($event) => dialog_statutory_visible.value = $event,
        modal: "",
        header: "Statutory Details",
        style: { width: "50vw", borderTop: "5px solid #002f56" }
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fw-bold fs-5"${_scopeId}> Statutory information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fw-bold fs-5"
                }, " Statutory information", 4)
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="modal-body"${_scopeId}><div class="row"${_scopeId}><div class="col"${_scopeId}><label for="" class=""${_scopeId}>PF Applicable<span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: statutory_information.pf_applicable,
              "onUpdate:modelValue": ($event) => statutory_information.pf_applicable = $event,
              options: esic_applicable_option.value,
              placeholder: "PF Applicable",
              optionLabel: "name",
              optionValue: "value",
              class: "w-100"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}><label class="ml-2"${_scopeId}>EPF Number</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              onKeypress: ($event) => isSpecialChars($event),
              modelValue: statutory_information.epf_no,
              "onUpdate:modelValue": ($event) => statutory_information.epf_no = $event,
              class: "w-100 mt-1",
              type: "text",
              placeholder: "EPF Number"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="row"${_scopeId}><div class="col"${_scopeId}><label class="ml-1"${_scopeId}>UAN Number</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              onKeypress: ($event) => isSpecialChars($event),
              modelValue: statutory_information.uan_no,
              "onUpdate:modelValue": ($event) => statutory_information.uan_no = $event,
              class: "w-100",
              type: "text",
              placeholder: "EPF Number"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col ml-2"${_scopeId}><label class="ml-2"${_scopeId}>ESIC Applicable<span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: statutory_information.esic_applicable,
              "onUpdate:modelValue": ($event) => statutory_information.esic_applicable = $event,
              options: esic_applicable_option.value,
              optionLabel: "name",
              placeholder: "ESIC Applicable",
              class: "w-100",
              optionValue: "value"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="row"${_scopeId}><div class="col-6"${_scopeId}><label for="" class="ml-2"${_scopeId}>ESIC Number</label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              onKeypress: ($event) => isSpecialChars($event),
              modelValue: statutory_information.esic_no,
              "onUpdate:modelValue": ($event) => statutory_information.esic_no = $event,
              class: "w-100 mt-1",
              type: "text",
              placeholder: "EPF Number"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="col"${_scopeId}></div></div><div class="col-12"${_scopeId}><div class="text-right"${_scopeId}><button id="btn_submit_statutory_info" class="btn btn-border-orange submit-btn"${_scopeId}>Save</button></div></div></div>`);
          } else {
            return [
              createVNode("div", { class: "modal-body" }, [
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("label", {
                      for: "",
                      class: ""
                    }, [
                      createTextVNode("PF Applicable"),
                      createVNode("span", { class: "text-danger" }, "*")
                    ]),
                    createVNode(_component_Dropdown, {
                      modelValue: statutory_information.pf_applicable,
                      "onUpdate:modelValue": ($event) => statutory_information.pf_applicable = $event,
                      options: esic_applicable_option.value,
                      placeholder: "PF Applicable",
                      optionLabel: "name",
                      optionValue: "value",
                      class: "w-100"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ]),
                  createVNode("div", { class: "col" }, [
                    createVNode("label", { class: "ml-2" }, "EPF Number"),
                    createVNode(_component_InputText, {
                      onKeypress: ($event) => isSpecialChars($event),
                      modelValue: statutory_information.epf_no,
                      "onUpdate:modelValue": ($event) => statutory_information.epf_no = $event,
                      class: "w-100 mt-1",
                      type: "text",
                      placeholder: "EPF Number"
                    }, null, 8, ["onKeypress", "modelValue", "onUpdate:modelValue"])
                  ])
                ]),
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "col" }, [
                    createVNode("label", { class: "ml-1" }, "UAN Number"),
                    createVNode(_component_InputText, {
                      onKeypress: ($event) => isSpecialChars($event),
                      modelValue: statutory_information.uan_no,
                      "onUpdate:modelValue": ($event) => statutory_information.uan_no = $event,
                      class: "w-100",
                      type: "text",
                      placeholder: "EPF Number"
                    }, null, 8, ["onKeypress", "modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "col ml-2" }, [
                    createVNode("label", { class: "ml-2" }, [
                      createTextVNode("ESIC Applicable"),
                      createVNode("span", { class: "text-danger" }, "*")
                    ]),
                    createVNode(_component_Dropdown, {
                      modelValue: statutory_information.esic_applicable,
                      "onUpdate:modelValue": ($event) => statutory_information.esic_applicable = $event,
                      options: esic_applicable_option.value,
                      optionLabel: "name",
                      placeholder: "ESIC Applicable",
                      class: "w-100",
                      optionValue: "value"
                    }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
                  ])
                ]),
                createVNode("div", { class: "row" }, [
                  createVNode("div", { class: "col-6" }, [
                    createVNode("label", {
                      for: "",
                      class: "ml-2"
                    }, "ESIC Number"),
                    createVNode(_component_InputText, {
                      onKeypress: ($event) => isSpecialChars($event),
                      modelValue: statutory_information.esic_no,
                      "onUpdate:modelValue": ($event) => statutory_information.esic_no = $event,
                      class: "w-100 mt-1",
                      type: "text",
                      placeholder: "EPF Number"
                    }, null, 8, ["onKeypress", "modelValue", "onUpdate:modelValue"])
                  ]),
                  createVNode("div", { class: "col" })
                ]),
                createVNode("div", { class: "col-12" }, [
                  createVNode("div", { class: "text-right" }, [
                    createVNode("button", {
                      id: "btn_submit_statutory_info",
                      class: "btn btn-border-orange submit-btn",
                      onClick: saveinfo_statutoryDetails
                    }, "Save")
                  ])
                ])
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: canShowLoading.value,
        "onUpdate:visible": ($event) => canShowLoading.value = $event,
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
            _push2(`<h5 style="${ssrRenderStyle({ "text-align": "center" })}"${_scopeId}>Please wait...</h5>`);
          } else {
            return [
              createVNode("h5", { style: { "text-align": "center" } }, "Please wait...")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/finance_details/FinanceDetails.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const ExperienceDetails_vue_vue_type_style_index_0_lang = "";
const _sfc_main$2 = {
  __name: "ExperienceDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const fetch_data = Service();
    const _instance_profilePagesStore = profilePagesStore();
    const toast = useToast();
    useToast();
    ref("");
    const dialog_ExperienceInfovisible = ref(false);
    const dialog_EditInfovisible = ref(false);
    const Exp_current_table_id = ref();
    const ExperienceInfo = reactive({
      company_name: "",
      location: "",
      job_position: "",
      period_from: "",
      period_to: ""
    });
    const saveExperienceDetails = () => {
      console.log(ExperienceInfo);
      _instance_profilePagesStore.loading_screen = true;
      let id = fetch_data.current_user_id;
      let url = `/add-experience-info/${id}`;
      axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        company_name: ExperienceInfo.company_name,
        experience_location: ExperienceInfo.location,
        job_position: ExperienceInfo.job_position,
        period_from: dayjs(ExperienceInfo.period_from).format("YYYY-MM-DD"),
        period_to: dayjs(ExperienceInfo.period_to).format("YYYY-MM-DD")
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Updated", detail: "Experiance information updated", life: 3e3 });
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        _instance_profilePagesStore.loading_screen = false;
      });
      dialog_ExperienceInfovisible.value = false;
    };
    onMounted(() => {
    });
    const editExperienceDetails = (get_experience_details) => {
      dialog_EditInfovisible.value = true;
      Exp_current_table_id.value = get_experience_details.id;
      console.log(Exp_current_table_id.value);
      ExperienceInfo.company_name = get_experience_details.company_name;
      ExperienceInfo.location = get_experience_details.location;
      ExperienceInfo.job_position = get_experience_details.job_position;
      ExperienceInfo.period_from = get_experience_details.period_from, ExperienceInfo.period_to = get_experience_details.period_to;
    };
    const sumbit_Edit_Exp_details = (get_experience_details) => {
      dialog_EditInfovisible.value = false;
      let id = fetch_data.current_user_id;
      let url = `/update-experience-info/${id}`;
      axios.post(url, {
        user_code: _instance_profilePagesStore.employeeDetails.user_code,
        exp_current_table_id: Exp_current_table_id.value,
        company_name: ExperienceInfo.company_name,
        experience_location: ExperienceInfo.location,
        job_position: ExperienceInfo.job_position,
        period_from: dayjs(ExperienceInfo.period_from).format("YYYY-MM-DD"),
        period_to: dayjs(ExperienceInfo.period_to).format("YYYY-MM-DD")
      }).then((res) => {
        if (res.data.status == "success") {
          window.location.reload();
          toast.add({ severity: "success", summary: "Updated", detail: "General information updated", life: 3e3 });
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      });
    };
    const diolog_Delete_Exp_Details = (family) => {
      Exp_current_table_id.value = family.id;
      let id = fetch_data.current_user_id;
      let url = `/delete-experience-info/${id}`;
      axios.post(url, {
        exp_current_table_id: Exp_current_table_id.value
      }).then((res) => {
        if (res.data.status == "success") {
          toast.add({ severity: "success", summary: "Deleted", detail: "General information updated", life: 3e3 });
        } else if (res.data.status == "failure") {
          leave_data.leave_request_error_messege = res.data.message;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        _instance_profilePagesStore.fetchEmployeeDetails();
        _instance_profilePagesStore.loading_screen = false;
      });
    };
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dialog = resolveComponent("Dialog");
      const _component_InputText = resolveComponent("InputText");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Toast = resolveComponent("Toast");
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      _push(`<!--[--><h6 class="font-semibold text-lg">Experience Information</h6><!--[-->`);
      ssrRenderList(unref(_instance_profilePagesStore).employeeDetails.get_experience_details, (experience) => {
        _push(`<div class="flex gap-6 items-center"><div class="mx-4 flex justify-center"><div class="relative flex h-full w-1 bg-green-300 items-center justify-center"><div class="absolute flex flex-col justify-center h-12 w-12 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin"><div>20</div></div></div></div>`);
        if (unref(_instance_profilePagesStore).employeeDetails.get_experience_details) {
          _push(`<div class="w-full bg-white rounded-lg p-2 border my-2"><div class="grid grid-cols-12 gap-2 h-full py-2"><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Company Name</p><p class="font-semibold text-sm">${ssrInterpolate(experience.company_name)}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Location</p><p class="font-semibold text-sm">${ssrInterpolate(experience.company_name)}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">JOb Position</p><p class="font-semibold text-sm">${ssrInterpolate(experience.company_name)}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Period From</p><p class="font-semibold text-sm">${ssrInterpolate(unref(dayjs)(experience.period_from).format("DD-MMM-YYYY"))}</p></div><div class="col-span-2"><p class="font-semibold text-xs text-gray-500">Period To</p><p class="font-semibold text-sm">${ssrInterpolate(unref(dayjs)(experience.period_to).format("DD-MMM-YYYY"))}</p></div><div class="col-span-2 flex justify-end"><img${ssrRenderAttr("src", _imports_0)} class="h-4 mb-1 w-4 cursor-pointer my-auto" alt=""></div></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      });
      _push(`<!--]--><div><div class="mb-2 card"><div class="card-body"><h6 class="font-semibold text-lg">Experience Information <button type="button" class="float-right btn btn-orange"> Add New </button>`);
      _push(ssrRenderComponent(_component_Dialog, {
        visible: dialog_ExperienceInfovisible.value,
        "onUpdate:visible": ($event) => dialog_ExperienceInfovisible.value = $event,
        modal: "",
        style: { width: "50vw", borderTop: "5px solid #002f56" },
        id: ""
      }, {
        header: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}" class="fs-5 fw-bold"${_scopeId}> Experience Information</h5></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode("h5", {
                  style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" },
                  class: "fs-5 fw-bold"
                }, " Experience Information", 4)
              ])
            ];
          }
        }),
        footer: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Toast, null, null, _parent2, _scopeId));
            _push2(`<button type="button" class="submit_btn success warning" severity="success" id=""${_scopeId}>submit</button></div>`);
          } else {
            return [
              createVNode("div", null, [
                createVNode(_component_Toast),
                createVNode("button", {
                  type: "button",
                  class: "submit_btn success warning",
                  severity: "success",
                  id: "",
                  onClick: saveExperienceDetails
                }, "submit")
              ])
            ];
          }
        }),
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="grid grid-cols-2"${_scopeId}><div class="" style="${ssrRenderStyle({ "margin-right": "20px" })}"${_scopeId}><span${_scopeId}>Company Name <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: ExperienceInfo.company_name,
              "onUpdate:modelValue": ($event) => ExperienceInfo.company_name = $event,
              name: "ExperienceDetails_company_name[]",
              required: "",
              class: "!w-[100%]"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="mr-2"${_scopeId}><span${_scopeId}> Location<span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              modelValue: ExperienceInfo.location,
              "onUpdate:modelValue": ($event) => ExperienceInfo.location = $event,
              name: "experienceDet_location[]",
              required: "",
              class: "w-[100%]"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class=""${_scopeId}><span${_scopeId}>Job Position <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_InputText, {
              type: "text",
              onKeypress: ($event) => isLetter($event),
              modelValue: ExperienceInfo.job_position,
              "onUpdate:modelValue": ($event) => ExperienceInfo.job_position = $event,
              name: "experienceDet_job_position[]",
              class: "!w-[95%]",
              required: ""
            }, null, _parent2, _scopeId));
            _push2(`</div><div class=""${_scopeId}><span style="${ssrRenderStyle({ paddingLeft: "6px" })}"${_scopeId}>Period From<span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              class: "!w-[98%] !mr-[15px] relative right-2",
              modelValue: ExperienceInfo.period_from,
              "onUpdate:modelValue": ($event) => ExperienceInfo.period_from = $event
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="grid grid-cols-2"${_scopeId}><div class="mr-2"${_scopeId}><span style="${ssrRenderStyle({ paddingLeft: "6px" })}"${_scopeId}>Period To <span class="text-danger"${_scopeId}>*</span></span>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              modelValue: ExperienceInfo.period_to,
              "onUpdate:modelValue": ($event) => ExperienceInfo.period_to = $event,
              name: "experienceDet_period_to[]",
              class: "!w-[96%] relative right-2"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class=""${_scopeId}></div></div>`);
          } else {
            return [
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", {
                  class: "",
                  style: { "margin-right": "20px" }
                }, [
                  createVNode("span", null, [
                    createTextVNode("Company Name "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: ExperienceInfo.company_name,
                    "onUpdate:modelValue": ($event) => ExperienceInfo.company_name = $event,
                    name: "ExperienceDetails_company_name[]",
                    required: "",
                    class: "!w-[100%]"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "mr-2" }, [
                  createVNode("span", null, [
                    createTextVNode(" Location"),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    modelValue: ExperienceInfo.location,
                    "onUpdate:modelValue": ($event) => ExperienceInfo.location = $event,
                    name: "experienceDet_location[]",
                    required: "",
                    class: "w-[100%]"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("span", null, [
                    createTextVNode("Job Position "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    type: "text",
                    onKeypress: ($event) => isLetter($event),
                    modelValue: ExperienceInfo.job_position,
                    "onUpdate:modelValue": ($event) => ExperienceInfo.job_position = $event,
                    name: "experienceDet_job_position[]",
                    class: "!w-[95%]",
                    required: ""
                  }, null, 8, ["onKeypress", "modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "" }, [
                  createVNode("span", { style: { paddingLeft: "6px" } }, [
                    createTextVNode("Period From"),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_Calendar, {
                    class: "!w-[98%] !mr-[15px] relative right-2",
                    modelValue: ExperienceInfo.period_from,
                    "onUpdate:modelValue": ($event) => ExperienceInfo.period_from = $event
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ]),
              createVNode("div", { class: "grid grid-cols-2" }, [
                createVNode("div", { class: "mr-2" }, [
                  createVNode("span", { style: { paddingLeft: "6px" } }, [
                    createTextVNode("Period To "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_Calendar, {
                    modelValue: ExperienceInfo.period_to,
                    "onUpdate:modelValue": ($event) => ExperienceInfo.period_to = $event,
                    name: "experienceDet_period_to[]",
                    class: "!w-[96%] relative right-2"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "" })
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</h6><div class="my-6 table-responsive">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        value: unref(_instance_profilePagesStore).employeeDetails.get_experience_details,
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "Company Name",
              field: "company_name",
              style: { "min-width": "12rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "location",
              header: "Location",
              style: { "min-width": "8rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "job_position",
              header: "Job Position ",
              style: { "min-width": "10rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "period_from",
              header: "Period from",
              style: { "min-width": "6rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "period_to",
              header: "Period To",
              style: { "min-width": "6rem" }
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              exportable: false,
              header: "Action",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<button class="p-2 mx-4 bg-green-200 border-green-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"${_scopeId2}></path></svg></button><button class="p-2 bg-red-200 border-red-500 rounded-xl"${_scopeId2}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 font-bold"${_scopeId2}><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"${_scopeId2}></path></svg></button><template${_scopeId2}>`);
                  _push3(ssrRenderComponent(_component_Dialog, {
                    visible: dialog_EditInfovisible.value,
                    "onUpdate:visible": ($event) => dialog_EditInfovisible.value = $event,
                    modal: "",
                    style: { width: "50vw", borderTop: "5px solid #002f56" }
                  }, {
                    header: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div${_scopeId3}><h5 style="${ssrRenderStyle({ color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" })}"${_scopeId3}> Experience Information</h5></div>`);
                      } else {
                        return [
                          createVNode("div", null, [
                            createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " Experience Information", 4)
                          ])
                        ];
                      }
                    }),
                    footer: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div${_scopeId3}>`);
                        _push4(ssrRenderComponent(_component_Toast, null, null, _parent4, _scopeId3));
                        _push4(`<button type="button" class="submit_btn success warning" severity="success" id=""${_scopeId3}>submit</button></div>`);
                      } else {
                        return [
                          createVNode("div", null, [
                            createVNode(_component_Toast),
                            createVNode("button", {
                              type: "button",
                              class: "submit_btn success warning",
                              severity: "success",
                              id: "",
                              onClick: ($event) => sumbit_Edit_Exp_details()
                            }, "submit", 8, ["onClick"])
                          ])
                        ];
                      }
                    }),
                    default: withCtx((_3, _push4, _parent4, _scopeId3) => {
                      if (_push4) {
                        _push4(`<div style="${ssrRenderStyle({ "padding": "0.5rem" })}"${_scopeId3}><div${_scopeId3}><div class="grid grid-cols-2"${_scopeId3}><div class="mr-2"${_scopeId3}><span${_scopeId3}>Company Name <span class="text-danger"${_scopeId3}>*</span></span>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          type: "text",
                          modelValue: ExperienceInfo.company_name,
                          "onUpdate:modelValue": ($event) => ExperienceInfo.company_name = $event,
                          required: "",
                          class: "!w-[98%]"
                        }, null, _parent4, _scopeId3));
                        _push4(`</div><div class="ml-2"${_scopeId3}><span${_scopeId3}> Location<span class="text-danger"${_scopeId3}>*</span></span>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          type: "text",
                          modelValue: ExperienceInfo.location,
                          "onUpdate:modelValue": ($event) => ExperienceInfo.location = $event,
                          name: "experienceDet_location[]",
                          class: "!w-[100%]",
                          required: ""
                        }, null, _parent4, _scopeId3));
                        _push4(`</div></div><div class="grid grid-cols-2"${_scopeId3}><div class="mr-2"${_scopeId3}><span${_scopeId3}>Job Position <span class="text-danger"${_scopeId3}>*</span></span>`);
                        _push4(ssrRenderComponent(_component_InputText, {
                          type: "text",
                          modelValue: ExperienceInfo.job_position,
                          "onUpdate:modelValue": ($event) => ExperienceInfo.job_position = $event,
                          required: "",
                          onKeypress: ($event) => isLetter($event),
                          class: "!w-[98%]"
                        }, null, _parent4, _scopeId3));
                        _push4(`</div><div class="ml-2"${_scopeId3}><span style="${ssrRenderStyle({ paddingLeft: "6px" })}"${_scopeId3}>Period From<span class="text-danger"${_scopeId3}>*</span></span>`);
                        _push4(ssrRenderComponent(_component_Calendar, {
                          modelValue: ExperienceInfo.period_from,
                          "onUpdate:modelValue": ($event) => ExperienceInfo.period_from = $event,
                          class: "w-[100%] relative right-2"
                        }, null, _parent4, _scopeId3));
                        _push4(`</div></div><div class="grid grid-cols-2"${_scopeId3}><div class=""${_scopeId3}><span style="${ssrRenderStyle({ paddingLeft: "6px" })}"${_scopeId3}>Period To <span class="text-danger"${_scopeId3}>*</span></span>`);
                        _push4(ssrRenderComponent(_component_Calendar, {
                          modelValue: ExperienceInfo.period_to,
                          "onUpdate:modelValue": ($event) => ExperienceInfo.period_to = $event,
                          class: "w-[95%] relative right-2"
                        }, null, _parent4, _scopeId3));
                        _push4(`</div><div class=""${_scopeId3}></div></div></div></div>`);
                      } else {
                        return [
                          createVNode("div", { style: { "padding": "0.5rem" } }, [
                            createVNode("div", null, [
                              createVNode("div", { class: "grid grid-cols-2" }, [
                                createVNode("div", { class: "mr-2" }, [
                                  createVNode("span", null, [
                                    createTextVNode("Company Name "),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_InputText, {
                                    type: "text",
                                    modelValue: ExperienceInfo.company_name,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.company_name = $event,
                                    required: "",
                                    class: "!w-[98%]"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ]),
                                createVNode("div", { class: "ml-2" }, [
                                  createVNode("span", null, [
                                    createTextVNode(" Location"),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_InputText, {
                                    type: "text",
                                    modelValue: ExperienceInfo.location,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.location = $event,
                                    name: "experienceDet_location[]",
                                    class: "!w-[100%]",
                                    required: ""
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ])
                              ]),
                              createVNode("div", { class: "grid grid-cols-2" }, [
                                createVNode("div", { class: "mr-2" }, [
                                  createVNode("span", null, [
                                    createTextVNode("Job Position "),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_InputText, {
                                    type: "text",
                                    modelValue: ExperienceInfo.job_position,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.job_position = $event,
                                    required: "",
                                    onKeypress: ($event) => isLetter($event),
                                    class: "!w-[98%]"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])
                                ]),
                                createVNode("div", { class: "ml-2" }, [
                                  createVNode("span", { style: { paddingLeft: "6px" } }, [
                                    createTextVNode("Period From"),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_Calendar, {
                                    modelValue: ExperienceInfo.period_from,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.period_from = $event,
                                    class: "w-[100%] relative right-2"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ])
                              ]),
                              createVNode("div", { class: "grid grid-cols-2" }, [
                                createVNode("div", { class: "" }, [
                                  createVNode("span", { style: { paddingLeft: "6px" } }, [
                                    createTextVNode("Period To "),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_Calendar, {
                                    modelValue: ExperienceInfo.period_to,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.period_to = $event,
                                    class: "w-[95%] relative right-2"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ]),
                                createVNode("div", { class: "" })
                              ])
                            ])
                          ])
                        ];
                      }
                    }),
                    _: 2
                  }, _parent3, _scopeId2));
                  _push3(`</template>`);
                } else {
                  return [
                    createVNode("button", {
                      class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                      onClick: ($event) => editExperienceDetails(slotProps.data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-5 h-5"
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
                      onClick: ($event) => diolog_Delete_Exp_Details(slotProps.data)
                    }, [
                      (openBlock(), createBlock("svg", {
                        xmlns: "http://www.w3.org/2000/svg",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        "stroke-width": "1.5",
                        stroke: "currentColor",
                        class: "w-5 h-5 font-bold"
                      }, [
                        createVNode("path", {
                          "stroke-linecap": "round",
                          "stroke-linejoin": "round",
                          d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        })
                      ]))
                    ], 8, ["onClick"]),
                    createVNode("template", null, [
                      createVNode(_component_Dialog, {
                        visible: dialog_EditInfovisible.value,
                        "onUpdate:visible": ($event) => dialog_EditInfovisible.value = $event,
                        modal: "",
                        style: { width: "50vw", borderTop: "5px solid #002f56" }
                      }, {
                        header: withCtx(() => [
                          createVNode("div", null, [
                            createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " Experience Information", 4)
                          ])
                        ]),
                        footer: withCtx(() => [
                          createVNode("div", null, [
                            createVNode(_component_Toast),
                            createVNode("button", {
                              type: "button",
                              class: "submit_btn success warning",
                              severity: "success",
                              id: "",
                              onClick: ($event) => sumbit_Edit_Exp_details()
                            }, "submit", 8, ["onClick"])
                          ])
                        ]),
                        default: withCtx(() => [
                          createVNode("div", { style: { "padding": "0.5rem" } }, [
                            createVNode("div", null, [
                              createVNode("div", { class: "grid grid-cols-2" }, [
                                createVNode("div", { class: "mr-2" }, [
                                  createVNode("span", null, [
                                    createTextVNode("Company Name "),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_InputText, {
                                    type: "text",
                                    modelValue: ExperienceInfo.company_name,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.company_name = $event,
                                    required: "",
                                    class: "!w-[98%]"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ]),
                                createVNode("div", { class: "ml-2" }, [
                                  createVNode("span", null, [
                                    createTextVNode(" Location"),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_InputText, {
                                    type: "text",
                                    modelValue: ExperienceInfo.location,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.location = $event,
                                    name: "experienceDet_location[]",
                                    class: "!w-[100%]",
                                    required: ""
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ])
                              ]),
                              createVNode("div", { class: "grid grid-cols-2" }, [
                                createVNode("div", { class: "mr-2" }, [
                                  createVNode("span", null, [
                                    createTextVNode("Job Position "),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_InputText, {
                                    type: "text",
                                    modelValue: ExperienceInfo.job_position,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.job_position = $event,
                                    required: "",
                                    onKeypress: ($event) => isLetter($event),
                                    class: "!w-[98%]"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])
                                ]),
                                createVNode("div", { class: "ml-2" }, [
                                  createVNode("span", { style: { paddingLeft: "6px" } }, [
                                    createTextVNode("Period From"),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_Calendar, {
                                    modelValue: ExperienceInfo.period_from,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.period_from = $event,
                                    class: "w-[100%] relative right-2"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ])
                              ]),
                              createVNode("div", { class: "grid grid-cols-2" }, [
                                createVNode("div", { class: "" }, [
                                  createVNode("span", { style: { paddingLeft: "6px" } }, [
                                    createTextVNode("Period To "),
                                    createVNode("span", { class: "text-danger" }, "*")
                                  ]),
                                  createVNode(_component_Calendar, {
                                    modelValue: ExperienceInfo.period_to,
                                    "onUpdate:modelValue": ($event) => ExperienceInfo.period_to = $event,
                                    class: "w-[95%] relative right-2"
                                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                                ]),
                                createVNode("div", { class: "" })
                              ])
                            ])
                          ])
                        ]),
                        _: 1
                      }, 8, ["visible", "onUpdate:visible"])
                    ])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "Company Name",
                field: "company_name",
                style: { "min-width": "12rem" }
              }),
              createVNode(_component_Column, {
                field: "location",
                header: "Location",
                style: { "min-width": "8rem" }
              }),
              createVNode(_component_Column, {
                field: "job_position",
                header: "Job Position ",
                style: { "min-width": "10rem" }
              }),
              createVNode(_component_Column, {
                field: "period_from",
                header: "Period from",
                style: { "min-width": "6rem" }
              }),
              createVNode(_component_Column, {
                field: "period_to",
                header: "Period To",
                style: { "min-width": "6rem" }
              }),
              createVNode(_component_Column, {
                exportable: false,
                header: "Action",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode("button", {
                    class: "p-2 mx-4 bg-green-200 border-green-500 rounded-xl",
                    onClick: ($event) => editExperienceDetails(slotProps.data)
                  }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-5 h-5"
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
                    onClick: ($event) => diolog_Delete_Exp_Details(slotProps.data)
                  }, [
                    (openBlock(), createBlock("svg", {
                      xmlns: "http://www.w3.org/2000/svg",
                      fill: "none",
                      viewBox: "0 0 24 24",
                      "stroke-width": "1.5",
                      stroke: "currentColor",
                      class: "w-5 h-5 font-bold"
                    }, [
                      createVNode("path", {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        d: "M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                      })
                    ]))
                  ], 8, ["onClick"]),
                  createVNode("template", null, [
                    createVNode(_component_Dialog, {
                      visible: dialog_EditInfovisible.value,
                      "onUpdate:visible": ($event) => dialog_EditInfovisible.value = $event,
                      modal: "",
                      style: { width: "50vw", borderTop: "5px solid #002f56" }
                    }, {
                      header: withCtx(() => [
                        createVNode("div", null, [
                          createVNode("h5", { style: { color: "var(--color-blue)", borderLeft: "3px solid var(--light-orange-color", paddingLeft: "6px" } }, " Experience Information", 4)
                        ])
                      ]),
                      footer: withCtx(() => [
                        createVNode("div", null, [
                          createVNode(_component_Toast),
                          createVNode("button", {
                            type: "button",
                            class: "submit_btn success warning",
                            severity: "success",
                            id: "",
                            onClick: ($event) => sumbit_Edit_Exp_details()
                          }, "submit", 8, ["onClick"])
                        ])
                      ]),
                      default: withCtx(() => [
                        createVNode("div", { style: { "padding": "0.5rem" } }, [
                          createVNode("div", null, [
                            createVNode("div", { class: "grid grid-cols-2" }, [
                              createVNode("div", { class: "mr-2" }, [
                                createVNode("span", null, [
                                  createTextVNode("Company Name "),
                                  createVNode("span", { class: "text-danger" }, "*")
                                ]),
                                createVNode(_component_InputText, {
                                  type: "text",
                                  modelValue: ExperienceInfo.company_name,
                                  "onUpdate:modelValue": ($event) => ExperienceInfo.company_name = $event,
                                  required: "",
                                  class: "!w-[98%]"
                                }, null, 8, ["modelValue", "onUpdate:modelValue"])
                              ]),
                              createVNode("div", { class: "ml-2" }, [
                                createVNode("span", null, [
                                  createTextVNode(" Location"),
                                  createVNode("span", { class: "text-danger" }, "*")
                                ]),
                                createVNode(_component_InputText, {
                                  type: "text",
                                  modelValue: ExperienceInfo.location,
                                  "onUpdate:modelValue": ($event) => ExperienceInfo.location = $event,
                                  name: "experienceDet_location[]",
                                  class: "!w-[100%]",
                                  required: ""
                                }, null, 8, ["modelValue", "onUpdate:modelValue"])
                              ])
                            ]),
                            createVNode("div", { class: "grid grid-cols-2" }, [
                              createVNode("div", { class: "mr-2" }, [
                                createVNode("span", null, [
                                  createTextVNode("Job Position "),
                                  createVNode("span", { class: "text-danger" }, "*")
                                ]),
                                createVNode(_component_InputText, {
                                  type: "text",
                                  modelValue: ExperienceInfo.job_position,
                                  "onUpdate:modelValue": ($event) => ExperienceInfo.job_position = $event,
                                  required: "",
                                  onKeypress: ($event) => isLetter($event),
                                  class: "!w-[98%]"
                                }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress"])
                              ]),
                              createVNode("div", { class: "ml-2" }, [
                                createVNode("span", { style: { paddingLeft: "6px" } }, [
                                  createTextVNode("Period From"),
                                  createVNode("span", { class: "text-danger" }, "*")
                                ]),
                                createVNode(_component_Calendar, {
                                  modelValue: ExperienceInfo.period_from,
                                  "onUpdate:modelValue": ($event) => ExperienceInfo.period_from = $event,
                                  class: "w-[100%] relative right-2"
                                }, null, 8, ["modelValue", "onUpdate:modelValue"])
                              ])
                            ]),
                            createVNode("div", { class: "grid grid-cols-2" }, [
                              createVNode("div", { class: "" }, [
                                createVNode("span", { style: { paddingLeft: "6px" } }, [
                                  createTextVNode("Period To "),
                                  createVNode("span", { class: "text-danger" }, "*")
                                ]),
                                createVNode(_component_Calendar, {
                                  modelValue: ExperienceInfo.period_to,
                                  "onUpdate:modelValue": ($event) => ExperienceInfo.period_to = $event,
                                  class: "w-[95%] relative right-2"
                                }, null, 8, ["modelValue", "onUpdate:modelValue"])
                              ]),
                              createVNode("div", { class: "" })
                            ])
                          ])
                        ])
                      ]),
                      _: 1
                    }, 8, ["visible", "onUpdate:visible"])
                  ])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/experience/ExperienceDetails.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "documents",
  __ssrInlineRender: true,
  setup(__props) {
    const EmployeeDoc = ref([]);
    onMounted(() => {
      EmployeeDocumentManagerService.fetch_EmployeeDocument();
      console.log(" ", view_document.value);
      console.log("employeeDetails employee_documents ", usedata.employeeDetails.employee_documents);
      EmployeeDoc.value = usedata;
    });
    let usedata = profilePagesStore();
    const EmployeeDocumentManagerService = UseEmployeeDocumentManagerService();
    useToast();
    const visible = ref(false);
    const view_document = ref({});
    const documentPath = ref();
    ref();
    const uploadDocs = ref();
    const fileName = ref();
    const formdata = new FormData();
    ref();
    const showDocument = (document) => {
      visible.value = true;
      EmployeeDocumentManagerService.loading = true;
      axios.post("/view-profile-private-file", {
        user_code: usedata.user_code,
        document_name: document.document_name
      }).then((res) => {
        documentPath.value = res.data.data;
        console.log("data sent", documentPath.value);
      }).finally(() => {
        EmployeeDocumentManagerService.loading = false;
      });
    };
    ref(["Pending", "Approved", "Rejected"]);
    const getFileName = (filename) => {
      fileName.value = filename;
    };
    const uploadDocument = (e) => {
      console.log(fileName);
      if (e.target.files && e.target.files[0]) {
        uploadDocs.value = e.target.files[0];
        formdata.append(`${fileName.value}`, uploadDocs.value);
        formdata.append("user_code", usedata.employeeDetails.user_code);
        console.log(formdata);
        Object.keys(formdata)[0];
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "card" }, _attrs))}><div class="w-full">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        value: unref(usedata).employeeDetails.employee_documents,
        dataKey: "id",
        paginator: true,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        rows: 5,
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_2, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              header: "File Name",
              field: "document_name",
              style: { "min-width": "8rem" }
            }, {
              default: withCtx((_3, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(EmployeeDocumentManagerService).getEmployeeDoc.document_name)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(EmployeeDocumentManagerService).getEmployeeDoc.document_name), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "status",
              header: "status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.status == "Approved") {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20"${_scopeId2}>Approved</span></div>`);
                  } else if (slotProps.data.status === "Pending") {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  } else if (slotProps.data.status === "Rejected") {
                    _push3(`<div${_scopeId2}><span class="inline-flex items-center px-3 py-1 text-sm font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20"${_scopeId2}>Pending</span></div>`);
                  } else {
                    _push3(`<div${_scopeId2}></div>`);
                  }
                } else {
                  return [
                    slotProps.data.status == "Approved" ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Approved")
                    ])) : slotProps.data.status === "Pending" ? (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ])) : slotProps.data.status === "Rejected" ? (openBlock(), createBlock("div", { key: 2 }, [
                      createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                    ])) : (openBlock(), createBlock("div", { key: 3 }))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "View ",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  if (slotProps.data.doc_id) {
                    _push3(`<div${_scopeId2}>`);
                    if (slotProps.data.status == "Rejected") {
                      _push3(`<div${_scopeId2}><input type="file" name="" id="file" hidden${_scopeId2}><button class="btn btn-success"${_scopeId2}><label for="file" class="cursor-pointer"${_scopeId2}><i class="pi pi-upload"${_scopeId2}></i> Upload file</label></button></div>`);
                    } else {
                      _push3(`<div${_scopeId2}>`);
                      _push3(ssrRenderComponent(_component_Button, {
                        type: "button",
                        icon: "pi pi-eye",
                        class: "p-button-success Button",
                        label: "View",
                        onClick: ($event) => showDocument(slotProps.data),
                        style: { "height": "1.5em" }
                      }, null, _parent3, _scopeId2));
                      _push3(`</div>`);
                    }
                    _push3(`</div>`);
                  } else {
                    _push3(`<div${_scopeId2}><input type="file" name="" id="file" hidden${_scopeId2}><button class="btn btn-success"${_scopeId2}><label for="file" class="cursor-pointer"${_scopeId2}><i class="pi pi-upload"${_scopeId2}></i> Upload file</label></button></div>`);
                  }
                } else {
                  return [
                    slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                      slotProps.data.status == "Rejected" ? (openBlock(), createBlock("div", { key: 0 }, [
                        createVNode("input", {
                          type: "file",
                          name: "",
                          id: "file",
                          hidden: "",
                          onChange: ($event) => uploadDocument($event)
                        }, null, 40, ["onChange"]),
                        createVNode("button", {
                          class: "btn btn-success",
                          onClick: ($event) => getFileName(slotProps.data.document_name)
                        }, [
                          createVNode("label", {
                            for: "file",
                            class: "cursor-pointer"
                          }, [
                            createVNode("i", { class: "pi pi-upload" }),
                            createTextVNode(" Upload file")
                          ])
                        ], 8, ["onClick"])
                      ])) : (openBlock(), createBlock("div", { key: 1 }, [
                        createVNode(_component_Button, {
                          type: "button",
                          icon: "pi pi-eye",
                          class: "p-button-success Button",
                          label: "View",
                          onClick: ($event) => showDocument(slotProps.data),
                          style: { "height": "1.5em" }
                        }, null, 8, ["onClick"])
                      ]))
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode("input", {
                        type: "file",
                        name: "",
                        id: "file",
                        hidden: "",
                        onChange: ($event) => uploadDocument($event)
                      }, null, 40, ["onChange"]),
                      createVNode("button", {
                        class: "btn btn-success",
                        onClick: ($event) => getFileName(slotProps.data.document_name)
                      }, [
                        createVNode("label", {
                          for: "file",
                          class: "cursor-pointer"
                        }, [
                          createVNode("i", { class: "pi pi-upload" }),
                          createTextVNode(" Upload file")
                        ])
                      ], 8, ["onClick"])
                    ]))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                header: "File Name",
                field: "document_name",
                style: { "min-width": "8rem" }
              }, {
                default: withCtx(() => [
                  createTextVNode(toDisplayString(unref(EmployeeDocumentManagerService).getEmployeeDoc.document_name), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "status",
                header: "status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.status == "Approved" ? (openBlock(), createBlock("div", { key: 0 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-green-800 rounded-md bg-green-50 ring-1 ring-inset ring-green-100/20" }, "Approved")
                  ])) : slotProps.data.status === "Pending" ? (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-yellow-800 rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ])) : slotProps.data.status === "Rejected" ? (openBlock(), createBlock("div", { key: 2 }, [
                    createVNode("span", { class: "inline-flex items-center px-3 py-1 text-sm font-semibold text-red-800 rounded-md bg-red-50 ring-1 ring-inset ring-yellow-100/20" }, "Pending")
                  ])) : (openBlock(), createBlock("div", { key: 3 }))
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "View ",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  slotProps.data.doc_id ? (openBlock(), createBlock("div", { key: 0 }, [
                    slotProps.data.status == "Rejected" ? (openBlock(), createBlock("div", { key: 0 }, [
                      createVNode("input", {
                        type: "file",
                        name: "",
                        id: "file",
                        hidden: "",
                        onChange: ($event) => uploadDocument($event)
                      }, null, 40, ["onChange"]),
                      createVNode("button", {
                        class: "btn btn-success",
                        onClick: ($event) => getFileName(slotProps.data.document_name)
                      }, [
                        createVNode("label", {
                          for: "file",
                          class: "cursor-pointer"
                        }, [
                          createVNode("i", { class: "pi pi-upload" }),
                          createTextVNode(" Upload file")
                        ])
                      ], 8, ["onClick"])
                    ])) : (openBlock(), createBlock("div", { key: 1 }, [
                      createVNode(_component_Button, {
                        type: "button",
                        icon: "pi pi-eye",
                        class: "p-button-success Button",
                        label: "View",
                        onClick: ($event) => showDocument(slotProps.data),
                        style: { "height": "1.5em" }
                      }, null, 8, ["onClick"])
                    ]))
                  ])) : (openBlock(), createBlock("div", { key: 1 }, [
                    createVNode("input", {
                      type: "file",
                      name: "",
                      id: "file",
                      hidden: "",
                      onChange: ($event) => uploadDocument($event)
                    }, null, 40, ["onChange"]),
                    createVNode("button", {
                      class: "btn btn-success",
                      onClick: ($event) => getFileName(slotProps.data.document_name)
                    }, [
                      createVNode("label", {
                        for: "file",
                        class: "cursor-pointer"
                      }, [
                        createVNode("i", { class: "pi pi-upload" }),
                        createTextVNode(" Upload file")
                      ])
                    ], 8, ["onClick"])
                  ]))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<button severity="warn" type="submit" data="row-6" next="row-6" name="submit_form" id="msform" class="text-center btn btn-orange processOnboardForm float-end text-light mr-5 my-5" value="Submit"${ssrIncludeBooleanAttr(_ctx.fileUploadValidation) ? " disabled" : ""}> Submit </button>`);
      if (unref(EmployeeDocumentManagerService).loading == false) {
        _push(ssrRenderComponent(_component_Dialog, {
          visible: visible.value,
          "onUpdate:visible": ($event) => visible.value = $event,
          modal: "",
          header: "Documents",
          style: { width: "40vw" }
        }, {
          default: withCtx((_2, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(`<div class="w-full h-full d-flex justify-content-center"${_scopeId}><img${ssrRenderAttr("src", `data:image/png;base64,${documentPath.value}`)} class="" alt="File not found" style="${ssrRenderStyle({ "object-fit": "cover", "max-width": "400px", ", min-height": "350px", "height": "300px" })}"${_scopeId}></div>`);
            } else {
              return [
                createVNode("div", { class: "w-full h-full d-flex justify-content-center" }, [
                  createVNode("img", {
                    src: `data:image/png;base64,${documentPath.value}`,
                    class: "",
                    alt: "File not found",
                    style: { "object-fit": "cover", "max-width": "400px", ", min-height": "350px", "height": "300px" }
                  }, null, 8, ["src"])
                ])
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/documents/documents.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "ProfilePageNew",
  __ssrInlineRender: true,
  setup(__props) {
    Service();
    let _instance_profilePagesStore = profilePagesStore();
    onMounted(async () => {
      console.log("Loading screen start : " + _instance_profilePagesStore.loading_screen);
      _instance_profilePagesStore.fetchEmployeeDetails().then(
        function(value) {
          console.log("Loading screen end : " + _instance_profilePagesStore.loading_screen);
          console.log("Req done");
        }
      );
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(_instance_profilePagesStore).loading_screen) {
        _push(ssrRenderComponent(LoadingSpinner, null, null, _parent));
      } else {
        _push(`<div>`);
        if (unref(_instance_profilePagesStore).employeeDetails.get_employee_office_details) {
          _push(`<div class="w-full h-screen bg-gray-50 p-3">`);
          _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
          _push(`<div class="w-full my-2"><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 col-xl-12"><div class="mb-2"><div class="pt-1 pb-0"><ul class="nav nav-pills nav-tabs-dashed" id="pills-tab" role="tablist"><li class="nav-item" role="presentation"><a class="nav-link active" id="" data-bs-toggle="pill" href="" data-bs-target="#employee_details" role="tab" aria-controls="pills-home" aria-selected="true"> Employee Details</a></li><li class="mx-4 nav-item" role="presentation"><a class="nav-link" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#family_det" role="tab" aria-controls="pills-home" aria-selected="true"> Family</a></li><li class="nav-item" role="presentation"><a class="nav-link" id="pills-home-tab" data-bs-toggle="pill" href="" data-bs-target="#experience_det" role="tab" aria-controls="pills-home" aria-selected="true"> Experience</a></li><li class="mx-4 nav-item" role="presentation"><a class="nav-link" id="" data-bs-toggle="pill" href="" data-bs-target="#finance_det" role="tab" aria-controls="pills-home" aria-selected="true"> Paycheck</a></li><li class="nav-item" role="presentation"><a class="nav-link" id="" data-bs-toggle="pill" href="" data-bs-target="#document_det" role="tab" aria-controls="pills-home" aria-selected="true"> Document</a></li></ul></div></div><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade active show" id="employee_details" role="tabpanel" aria-labelledby=""><div>`);
          _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
          _push(`</div></div><div class="tab-pane fade" id="family_det" role="tabpanel" aria-labelledby="">`);
          _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
          _push(`</div><div class="tab-pane fade" id="experience_det" role="tabpanel" aria-labelledby="">`);
          _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
          _push(`</div><div class="tab-pane fade" id="finance_det" role="tabpanel" aria-labelledby=""><div>`);
          _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
          _push(`</div></div><div class="tab-pane fade" id="document_det" role="tabpanel" aria-labelledby="">`);
          _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
          _push(`</div></div></div></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div>`);
      }
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/profile_pages/ProfilePageNew.vue");
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
app.component("ProgressBar", ProgressBar);
app.component("InputMask", InputMask);
app.component("Sidebar", Sidebar);
app.mount("#profilePage");
