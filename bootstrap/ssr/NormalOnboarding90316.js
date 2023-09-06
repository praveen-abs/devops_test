/* empty css            *//* empty css                   *//* empty css                 */import { ref, resolveComponent, mergeProps, unref, useSSRContext, reactive, withCtx, openBlock, createBlock, createVNode, toDisplayString, createCommentVNode, createApp } from "vue";
import { createPinia } from "pinia";
import VueSweetalert2 from "vue-sweetalert2";
import PrimeVue from "primevue/config";
import AutoComplete from "primevue/autocomplete";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import BadgeDirective from "primevue/badgedirective";
import Button from "primevue/button";
import Calendar from "primevue/calendar";
import Checkbox from "primevue/checkbox";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup";
import ConfirmDialog from "primevue/confirmdialog";
import ConfirmPopup from "primevue/confirmpopup";
import ConfirmationService from "primevue/confirmationservice";
import Dialog from "primevue/dialog";
import DialogService from "primevue/dialogservice";
import Dropdown from "primevue/dropdown";
import DynamicDialog from "primevue/dynamicdialog";
import FocusTrap from "primevue/focustrap";
import InputSwitch from "primevue/inputswitch";
import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";
import InputNumber from "primevue/inputnumber";
import ProgressSpinner from "primevue/progressspinner";
import RadioButton from "primevue/radiobutton";
import Ripple from "primevue/ripple";
import StyleClass from "primevue/styleclass";
import Toast from "primevue/toast";
import ToastService from "primevue/toastservice";
import Tooltip from "primevue/tooltip";
import Textarea from "primevue/textarea";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderComponent, ssrRenderStyle, ssrRenderAttr } from "vue/server-renderer";
import { u as useNormalOnboardingMainStore } from "./NormalOnboardingMainStore90316.js";
import useValidate from "@vuelidate/core";
import axios from "axios";
import { onMounted } from "@vue/runtime-core";
import "./Service90316.js";
import "@vuelidate/validators";
import "primevue/usetoast";
const sweetalert2_min = "";
const _imports_0$1 = "/build/requirement90316.png";
const _sfc_main$6 = {
  __name: "PersonDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    const v$ = useValidate(service.rules, service.employee_onboarding);
    const userCodeExists = () => {
      let user_code = `${service.employee_onboarding.emp_client_code}${service.employee_onboarding.employee_code}`;
      console.log(user_code);
      axios.get(`/user-code-exists/${user_code}`).then((res) => {
        console.log(res.data);
        if (service.checkIsQuickOrNormal == "quick" || service.checkIsQuickOrNormal == "bulk") {
          console.log("quick onboarding");
          service.family_details_disable = true;
        } else {
          service.user_code_exists = res.data;
          console.log("working");
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        console.log("completed");
      });
    };
    const personalMailExists = () => {
      let mail = service.employee_onboarding.email;
      axios.get(`/personal-mail-exists/${mail}`).then((res) => {
        if (service.checkIsQuickOrNormal == "quick" || service.checkIsQuickOrNormal == "bulk") {
          console.log("quick onboarding");
        } else {
          service.personal_mail_exists = res.data;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        console.log("completed");
      });
    };
    const mobileNoExists = () => {
      let mobile = service.employee_onboarding.mobile_number;
      console.log("mobile no Checking");
      console.log(mobile);
      axios.get(`/mobile-no-exists/${mobile}`).then((res) => {
        console.log(res.data);
        if (service.checkIsQuickOrNormal == "quick" || service.checkIsQuickOrNormal == "bulk") {
          console.log("quick onboarding");
        } else {
          service.is_mobile_no_exists = res.data;
        }
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        console.log("completed");
      });
    };
    const AadharCardExits = () => {
      console.log("working");
      let aadhar_no = service.employee_onboarding.aadhar_number;
      var regexp = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
      if (regexp.test(service.employee_onboarding.aadhar_number)) {
        console.log("Valid Aadhar no.");
        axios.get(`/aadhar-no-exists/${aadhar_no}`).then((res) => {
          console.log(res.data);
          service.aadhar_card_exists = res.data;
        }).catch((err) => {
          console.log(err);
        }).finally(() => {
          console.log("completed");
        });
      } else {
        console.log("Invalid Aadhar no.");
      }
    };
    const panCardExists = () => {
      console.log("pan card checking");
      let pan_no = service.employee_onboarding.pan_number;
      var regep = /^([a-zA-Z]){3}([Pp]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/;
      if (regep.test(service.employee_onboarding.pan_number)) {
        console.log("Valid pan no.");
        axios.get(`/pan-no-exists/${pan_no}`).then((res) => {
          console.log(res.data);
          service.pan_card_exists = res.data;
        }).catch((err) => {
          console.log(err);
        }).finally(() => {
          console.log("completed");
        });
      } else {
        console.log("Invalid pan no.");
      }
    };
    const ValidateAccountNo = () => {
      let Ac_no = service.employee_onboarding.AccountNumber;
      axios.get(`/ac-no-exists/${Ac_no}`).then((res) => {
        console.log(res.data);
        service.is_ac_no_exists = res.data;
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        console.log("completed");
      });
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
    const isNumber = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[0-9]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const isEmail = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z0-9@.]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const Gender = ref([
      { name: "Male", value: "Male" },
      { name: "Female", value: "Female" },
      { name: "Others", value: "Others" }
    ]);
    const Nationality = ref([
      { name: "Indian", value: "indian" },
      { name: "Other Nationality", value: "others" }
    ]);
    const PhyChallenged = ref([
      { name: "No", value: "no" },
      { name: "Yes", value: "yes" }
    ]);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputMask = resolveComponent("InputMask");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 shadow card profile-box" }, _attrs))}><div class="card-body justify-content-center align-items-center"><div class="header-card-text"><h6 class="my-2"><i class="fa fa-user" aria-hidden="true"></i> Personal Details</h6></div><div class="form-card"><div class="mt-1 row"><div class="mb-2 col-md -6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Employee Code</label><div class="p-inputgroup flex-1">`);
      if (unref(service).readonly.isDisableClientCode) {
        _push(`<span class="p-inputgroup-addon font-semibold text-sm text-black">${ssrInterpolate(unref(service).clientCode)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_InputText, {
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "", unref(service).user_code_exists ? "p-invalid" : ""], "capitalize form-onboard-form form-control textbox"],
        type: "text",
        readonly: unref(service).readonly.is_emp_code_quick,
        modelValue: unref(service).employee_onboarding.employee_code,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.employee_code = $event,
        placeholder: "Employee Code",
        onFocusout: userCodeExists,
        onKeypress: ($event) => isNumber($event)
      }, null, _parent));
      _push(`</div>`);
      if (unref(service).user_code_exists) {
        _push(`<span class="p-error">Employee code Already Exists</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="employee_name" class="float-label">Employee Name as per Aadhar <span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["capitalize onboard-form form-control textbox", [
          unref(v$).employee_name.$error ? "p-invalid" : "",
          unref(service).readonly.is_emp_name_quick ? "bg-gray-200" : ""
        ]],
        type: "text",
        readonly: unref(service).readonly.is_emp_name_quick,
        modelValue: unref(service).employee_onboarding.employee_name,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.employee_name = $event,
        onKeypress: ($event) => isLetter($event),
        placeholder: "Employee Name as per Aadhar "
      }, null, _parent));
      if (unref(v$).employee_name.$error || unref(v$).employee_name.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).employee_name.required.$message.replace(
          "Value",
          "Employee Name as per in Aadhar"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Date of Birth</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        inputId: "icon",
        dropzone: "true",
        modelValue: unref(service).employee_onboarding.dob,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.dob = $event,
        showIcon: "",
        editable: "",
        dateFormat: "dd-mm-yy",
        placeholder: "Date of birth",
        style: { "width": "350px" },
        class: ["", {
          "p-invalid": unref(v$).dob.$error
        }],
        maxDate: unref(service).dateOfBirth(new Date())
      }, null, _parent));
      if (unref(v$).dob.$error || unref(v$).dob.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).dob.required.$message.replace(
          "Value",
          "Dob "
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Marital Status <span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.marital_status,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.marital_status = $event,
        options: unref(service).maritalDetails,
        optionLabel: "name",
        optionValue: "id",
        placeholder: "Select Martial Status",
        onChange: unref(service).spouseDisable,
        class: ["p-error", {
          "p-invalid": unref(v$).marital_status.$error
        }]
      }, null, _parent));
      if (unref(v$).marital_status.$error || unref(v$).marital_status.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).marital_status.required.$message.replace(
          "Value",
          "Marital Status"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Date of Joining<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        inputId: "icon",
        dropzone: "true",
        manualInput: true,
        modelValue: unref(service).employee_onboarding.doj,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.doj = $event,
        editable: "",
        dateFormat: "dd-mm-yy",
        placeholder: "Date of Joining",
        style: { "width": "350px" },
        readonly: unref(service).readonly.is_doj_quick,
        showIcon: "",
        class: [
          {
            "p-invalid": unref(v$).doj.$error
          },
          unref(service).readonly.is_doj_quick ? "bg-gray-200" : ""
        ]
      }, null, _parent));
      if (unref(v$).doj.$error || unref(v$).doj.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).doj.required.$message.replace("Value", "Date Of Joining"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Gender<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        onChange: ($event) => unref(service).spouseGenderCheck($event.value),
        modelValue: unref(service).employee_onboarding.gender,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.gender = $event,
        options: Gender.value,
        optionLabel: "name",
        optionValue: "value",
        placeholder: "Select Gender",
        class: ["p-error", {
          "p-invalid": unref(v$).gender.$error
        }]
      }, null, _parent));
      if (unref(v$).gender.$error || unref(v$).gender.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).gender.required.$message.replace("Value", "Gender"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Mobile Number<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        onFocusout: mobileNoExists,
        id: "serial",
        readonly: unref(service).readonly.mobile,
        mask: "9999999999",
        modelValue: unref(service).employee_onboarding.mobile_number,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.mobile_number = $event,
        placeholder: "Mobile Number",
        style: { "text-transform": "uppercase" },
        class: ["form-control textbox", [{
          "p-invalid": unref(v$).mobile_number.$error
        }, unref(service).readonly.mobile ? "bg-gray-200" : "", unref(service).is_mobile_no_exists ? "p-invalid" : ""]]
      }, null, _parent));
      _push(`</div>`);
      if (unref(service).is_mobile_no_exists) {
        _push(`<span class="text-danger"> Mobile Number is already exists </span>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(v$).mobile_number.$error || unref(v$).mobile_number.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).mobile_number.required.$message.replace(
          "Value",
          "Mobile Number"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Email<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "text",
        readonly: unref(service).readonly.is_email_quick,
        placeholder: "Email ID",
        onKeypress: ($event) => isEmail($event),
        class: [[{
          "p-invalid": unref(v$).email.$error
        }, unref(service).readonly.is_email_quick ? "bg-gray-200" : "", unref(service).personal_mail_exists ? "p-invalid" : ""], "form-control textbox"],
        onFocusout: personalMailExists,
        modelValue: unref(service).employee_onboarding.email,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.email = $event,
        pattern: "[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}$"
      }, null, _parent));
      if (unref(service).personal_mail_exists) {
        _push(`<span class="p-error">Email is already exists</span>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(v$).email.$error || unref(v$).email.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).email.required.$message.replace("Value", "Email"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><span class="error" id="error_email"></span></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Aadhaar Number<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        onFocusout: AadharCardExits,
        id: "ssn",
        mask: "9999 9999 9999",
        placeholder: "9999 9999 9999",
        modelValue: unref(service).employee_onboarding.aadhar_number,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.aadhar_number = $event,
        class: [{
          "p-invalid": unref(v$).aadhar_number.$error
        }, unref(service).aadhar_card_exists ? "p-invalid" : ""]
      }, null, _parent));
      if (unref(service).aadhar_card_exists) {
        _push(`<span class="text-danger"> Aadhar Number Is Already Exists </span>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(v$).aadhar_number.$error) {
        _push(`<span class="font-medium text-red-600 fs-6">${ssrInterpolate(unref(v$).aadhar_number.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 co l-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Pan Number / Pan Acknowlegement<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        onFocusout: panCardExists,
        id: "serial",
        mask: "aaaPa9999a",
        modelValue: unref(service).employee_onboarding.pan_number,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.pan_number = $event,
        placeholder: "AHFCS1234F",
        style: { "text-transform": "uppercase" },
        class: ["form-control textbox", [{
          "p-invalid": unref(v$).pan_number.$error
        }, unref(service).pan_card_exists ? "p-invalid" : ""]]
      }, null, _parent));
      if (unref(service).pan_card_exists) {
        _push(`<span class="text-danger"> Pan Number Is Already Exixts </span>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(v$).pan_number.$error) {
        _push(`<span class="font-medium text-red-600 fs-6">${ssrInterpolate(unref(v$).pan_number.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">DL Number</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: "onboard-form form-control textbox",
        type: "text",
        modelValue: unref(v$).dl_no.$model,
        "onUpdate:modelValue": ($event) => unref(v$).dl_no.$model = $event,
        placeholder: "DL Number",
        minlength: "16",
        maxlength: "16",
        onKeypress: ($event) => isSpecialChars($event)
      }, null, _parent));
      _push(`<label class="error star_error dl_no_label" for="dl_no" style="${ssrRenderStyle({ "display": "none" })}"></label><span class="error" id="error_dl_no"></span></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Choose nationality<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.nationality,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.nationality = $event,
        options: Nationality.value,
        optionLabel: "name",
        optionValue: "name",
        placeholder: "Select Nationality",
        onChange: ($event) => unref(service).NationalityCheck(),
        class: ["p-error", {
          "p-invalid": unref(v$).nationality.$error
        }]
      }, null, _parent));
      if (unref(v$).nationality.$error || unref(v$).nationality.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).nationality.required.$message.replace(
          "Value",
          "Choose Nationality"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
      if (unref(service).isNationalityVisible) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Passport Number<span class="text-danger" id="asterisk_passport_no"></span></label>`);
        _push(ssrRenderComponent(_component_InputText, {
          minlength: "8",
          maxlength: "8",
          class: "form-control textbox",
          modelValue: unref(service).employee_onboarding.passport_number,
          "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.passport_number = $event,
          placeholder: "Passport Number"
        }, null, _parent));
        _push(`<span class="error" id="error_passport_no"></span></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).isNationalityVisible) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Passport Exp Date<span class="text-danger" id="asterisk_passport_expdate"></span></label><input type="text"${ssrRenderAttr("value", unref(service).employee_onboarding.passport_date)} placeholder="Passport Expiry Date" id="doj" name="doj" class="onboard-form form-control textbox" onfocus="(this.type=&#39;date&#39;)"><span class="" id="error_passport_date"></span></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Blood Group</label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.blood_group_name,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.blood_group_name = $event,
        options: unref(service).bloodGroups,
        optionLabel: "name",
        optionValue: "id",
        placeholder: "Select Bloodgroup",
        class: "p-error"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Physically Challenged</label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.physically_challenged,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.physically_challenged = $event,
        options: PhyChallenged.value,
        optionLabel: "name",
        optionValue: "value",
        placeholder: "Physically Challenged",
        class: "p-error"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Bank Name<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.bank_name,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.bank_name = $event,
        options: unref(service).bankList,
        optionLabel: "bank_name",
        optionValue: "id",
        placeholder: "Select Bank Name",
        class: ["p-error", {
          "p-invalid": unref(v$).bank_name.$error
        }]
      }, null, _parent));
      if (unref(v$).bank_name.$error || unref(v$).bank_name.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).bank_name.required.$message.replace(
          "Value",
          "Bank Name "
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Bank Account Number<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        placeholder: "Account Number",
        minlength: "10",
        onKeypress: ($event) => isNumber($event),
        class: [{
          "p-invalid": unref(v$).AccountNumber.$error
        }, "onboard-form form-control textbox"],
        maxlength: "18",
        onFocusout: ValidateAccountNo,
        type: "text",
        modelValue: unref(service).employee_onboarding.AccountNumber,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.AccountNumber = $event
      }, null, _parent));
      if (unref(service).is_ac_no_exists) {
        _push(`<span class="text-danger"> Account Number Is Already Exixts </span>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(v$).AccountNumber.$error || unref(v$).AccountNumber.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).AccountNumber.required.$message.replace(
          "Value",
          "Account Number"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Bank IFSC Code<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        onKeypress: ($event) => isSpecialChars($event),
        type: "text",
        modelValue: unref(service).employee_onboarding.bank_ifsc,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.bank_ifsc = $event,
        class: [[{
          "p-invalid": unref(v$).bank_ifsc.$error
        }], "onboard-form form-control textbox"],
        minlength: "11",
        maxlength: "11",
        style: { "text-transform": "uppercase" },
        placeholder: "Bank IFSC Code"
      }, null, _parent));
      if (unref(v$).bank_ifsc.$error) {
        _push(`<span class="font-medium text-red-600 fs-6">${ssrInterpolate(unref(v$).bank_ifsc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/PersonDetails/PersonDetails.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const PersonDocuments_vue_vue_type_style_index_0_lang = "";
const _sfc_main$5 = {
  __name: "PersonDocuments",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    const v$ = useValidate(service.rules, service.employee_onboarding);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 my-6 mb-0 shadow card profile-box card-top-border" }, _attrs))}><div class="card-body justify-content-center align-items-center"><div class="flex header-card-text"><h6 class="my-2"><i class="fa fa-file-image-o" aria-hidden="true"></i> Personal Documents</h6></div><div class="mb-2 form-card"><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label">Aadhar Card Front<span class="text-danger">*</span></label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" id="formFile" class="onboard-form form-control file">`);
      if (unref(v$).AadharCardFront.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).AadharCardFront.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6" id="aadhar_card_backend_content"><label for="" class="float-label"> Aadhar Card Back<span class="text-danger">*</span></label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" class="onboard-form form-control file">`);
      if (unref(v$).AadharCardBack.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).AadharCardBack.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Pan Card<span class="text-danger">*</span></label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" placeholder="Pan Card" name="pan_card_file" id="pan_card_file" class="onboard-form form-control file">`);
      if (unref(v$).PanCardDoc.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).PanCardDoc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Passport</label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" placeholder="Passport" name="passport_file" id="passport_file" class="onboard-form form-control file">`);
      if (unref(v$).PassportDoc.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).PassportDoc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label">Voter ID</label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" placeholder="Voters ID" name="voters_id_file" id="voters_id_file" class="onboard-form form-control file">`);
      if (unref(v$).VoterIdDoc.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).VoterIdDoc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Driving License</label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" placeholder="Driving License" name="dl_file" id="dl_file" class="onboard-form form-control file">`);
      if (unref(v$).DrivingLicenseDoc.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).DrivingLicenseDoc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label">Educations Certificate </label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" placeholder="Educations Certificate" name="education_certificate_file" id="education_certificate_file" class="onboard-form form-control file">`);
      if (unref(v$).EductionDoc.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).EductionDoc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="col-md-6 col-sm-6 col-xs-12 col-lg-6"><label for="" class="float-label"> Relieving Letter</label><input type="file" accept="image/png, image/gif, image/jpeg,application/pdf" placeholder="Relieving Letter" name="reliving_letter_file" id="reliving_letter_file" class="onboard-form form-control file">`);
      if (unref(v$).RelievingLetterDoc.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).RelievingLetterDoc.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div><div class="row"><div class="text-right col-12"><button type="button" data="row-6" next="row-6" placeholder="" name="save_form" id="save_button" class="mr-4 text-center btn btn-orange processOnboardForm" value="button"> Save </button><button type="button" data="row-6" next="row-6" placeholder="" name="submit_form" id="msform" class="text-center btn btn-orange processOnboardForm" value="button"> Submit </button></div></div></div></div>`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/PersonDocuments/PersonDocuments.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const _sfc_main$4 = {
  __name: "Address",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    const v$ = useValidate(service.rules, service.employee_onboarding);
    reactive({
      statutory: false,
      child: false,
      fdc: false,
      lta: false,
      other: false,
      l1_code: false,
      designation: false,
      mobile: false,
      spouse: false
    });
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const isNumber = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[0-9]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Textarea = resolveComponent("Textarea");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputText = resolveComponent("InputText");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_Checkbox = resolveComponent("Checkbox");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 my-6 shadow card profile-box card-top-border" }, _attrs))}><div class="card-body justify-content-center align-items-center"><div class="form-card"><div class="flex my-2 header-card-text"><h6 class="my-2"><i class="pi pi-home mx-1 font-semibold" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i>Current Address </h6></div><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"><div class="floating"><label for="" class="float-label">Address 1<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Textarea, {
        style: { "height": "100px" },
        class: ["capitalize form-control textbox", {
          "p-invalid": unref(v$).current_address_line_1.$error
        }],
        type: "text",
        rows: "3",
        current_address_line_1: "",
        modelValue: unref(service).employee_onboarding.current_address_line_1,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.current_address_line_1 = $event,
        placeholder: "Current Address"
      }, null, _parent));
      if (unref(v$).current_address_line_1.$error || unref(v$).current_address_line_1.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).current_address_line_1.required.$message.replace(
          "Value",
          "Current Address 1"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"><div class="floating"><label for="" class="float-label">Address 2<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Textarea, {
        style: { "height": "100px" },
        class: ["capitalize form-control textbox", {
          "p-invalid": unref(v$).current_address_line_2.$error
        }],
        type: "text",
        rows: "3",
        current_address_line_2: "",
        modelValue: unref(service).employee_onboarding.current_address_line_2,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.current_address_line_2 = $event,
        placeholder: "Current Address"
      }, null, _parent));
      if (unref(v$).current_address_line_2.$error || unref(v$).current_address_line_2.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).current_address_line_2.required.$message.replace(
          "Value",
          "Current Address 2"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Country<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.current_country,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.current_country = $event,
        class: [{
          "p-invalid": unref(v$).current_country.$error
        }, "p-error"],
        options: unref(service).country,
        optionValue: "id",
        optionLabel: "country_name",
        placeholder: "Select Country Name",
        onKeypress: ($event) => isLetter($event)
      }, null, _parent));
      if (unref(v$).current_country.$error || unref(v$).current_country.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).current_country.required.$message.replace(
          "Value",
          "country"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">State<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.current_state,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.current_state = $event,
        class: [{
          "p-invalid": unref(v$).current_state.$error
        }, "p-error"],
        options: unref(service).state,
        optionValue: "id",
        optionLabel: "state_name",
        placeholder: "Select State Name",
        onKeypress: ($event) => isLetter($event)
      }, null, _parent));
      if (unref(v$).current_state.$error || unref(v$).current_state.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).current_state.required.$message.replace("Value", "State"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label"> City<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["form-control", {
          "p-invalid": unref(v$).current_city.$error
        }],
        type: "text",
        modelValue: unref(service).employee_onboarding.current_city,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.current_city = $event,
        placeholder: "current city",
        onKeypress: ($event) => isLetter($event)
      }, null, _parent));
      _push(`</div>`);
      if (unref(v$).current_city.$error || unref(v$).current_city.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).current_city.required.$message.replace("Value", "City"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Pincode<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        class: ["form-control", {
          "p-invalid": unref(v$).current_pincode.$error
        }],
        mask: "999999",
        modelValue: unref(service).employee_onboarding.current_pincode,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.current_pincode = $event,
        placeholder: "Pincode",
        onKeypress: ($event) => isNumber($event)
      }, null, _parent));
      if (unref(v$).current_pincode.$error || unref(v$).current_pincode.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).current_pincode.required.$message.replace(
          "Value",
          "Pincode"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div><div class="row"><div class="my-3 col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">`);
      _push(ssrRenderComponent(_component_Checkbox, {
        inputId: "",
        onClick: unref(service).ForCopyAdrress,
        modelValue: unref(service).CopyAddresschecked,
        "onUpdate:modelValue": ($event) => unref(service).CopyAddresschecked = $event,
        binary: true
      }, null, _parent));
      _push(`<label style="${ssrRenderStyle({ "margin-left": "10px" })}" for="current_address_copy">Copy current address to the permanent address</label></div><div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12"><h6><i class="pi pi-home mx-1 font-semibold" style="${ssrRenderStyle({ "font-size": "1rem" })}"></i>Permanent Address</h6><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"><div class="floating"><label for="" class="float-label">Address 1<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Textarea, {
        placeholder: "Permanent Address",
        class: ["capitalize form-control textbox", {
          "p-invalid": unref(v$).permanent_address_line_1.$error
        }],
        style: { "height": "100px" },
        type: "text",
        rows: "3",
        id: "permanent_address_line_1",
        modelValue: unref(service).employee_onboarding.permanent_address_line_1,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.permanent_address_line_1 = $event
      }, null, _parent));
      if (unref(v$).permanent_address_line_1.$error || unref(v$).permanent_address_line_1.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).permanent_address_line_1.required.$message.replace(
          "Value",
          "Permanent Address 1"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-6 col-lg-6 col-xxl-6"><div class="floating"><label for="" class="float-label">Address 2<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Textarea, {
        placeholder: "Permanent Address",
        class: ["capitalize form-control textbox", {
          "p-invalid": unref(v$).permanent_address_line_2.$error
        }],
        style: { "height": "100px" },
        type: "text",
        rows: "3",
        id: "permanent_address_line_2",
        modelValue: unref(service).employee_onboarding.permanent_address_line_2,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.permanent_address_line_2 = $event
      }, null, _parent));
      if (unref(v$).permanent_address_line_2.$error || unref(v$).permanent_address_line_2.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).permanent_address_line_2.required.$message.replace(
          "Value",
          "Permanent Address 2"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Country<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        optionValue: "id",
        modelValue: unref(service).employee_onboarding.permanent_country,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.permanent_country = $event,
        class: [{
          "p-invalid": unref(v$).permanent_country.$error
        }, "p-error"],
        options: unref(service).country,
        optionLabel: "country_name",
        placeholder: "Select Country Name",
        onKeypress: ($event) => isLetter($event)
      }, null, _parent));
      if (unref(v$).permanent_country.$error || unref(v$).permanent_country.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).permanent_country.required.$message.replace(
          "Value",
          "country"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">State<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        optionValue: "id",
        modelValue: unref(service).employee_onboarding.permanent_state,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.permanent_state = $event,
        class: [{
          "p-invalid": unref(v$).permanent_state.$error
        }, "p-error"],
        options: unref(service).state,
        optionLabel: "state_name",
        placeholder: "Select State Name",
        onKeypress: ($event) => isLetter($event)
      }, null, _parent));
      if (unref(v$).permanent_state.$error || unref(v$).permanent_state.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).permanent_state.required.$message.replace(
          "Value",
          "State"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label"> City<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["capitalize onboard-form form-control textbox", {
          "p-invalid": unref(v$).permanent_city.$error
        }],
        type: "text",
        modelValue: unref(service).employee_onboarding.permanent_city,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.permanent_city = $event,
        placeholder: "City",
        onKeypress: ($event) => isLetter($event)
      }, null, _parent));
      if (unref(v$).permanent_city.$error || unref(v$).permanent_city.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).permanent_city.required.$message.replace(
          "Value",
          "City"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Pincode<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        class: ["capitalize onboard-form form-control textbox", {
          "p-invalid": unref(v$).permanent_pincode.$error
        }],
        mask: "999999",
        modelValue: unref(service).employee_onboarding.permanent_pincode,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.permanent_pincode = $event,
        placeholder: "Pincode",
        onKeypress: ($event) => isNumber($event)
      }, null, _parent));
      if (unref(v$).permanent_pincode.$error || unref(v$).permanent_pincode.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).permanent_pincode.required.$message.replace(
          "Value",
          "Pincode"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/Address/Address.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _imports_0 = "/build/family90316.png";
const _sfc_main$3 = {
  __name: "FamilyDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    const v$ = useValidate(service.rules, service.employee_onboarding);
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 my-6 shadow card profile-box card-top-border" }, _attrs))}><div class="card-body justify-content-center align-items-center"><div class="flex header-card-text"><img${ssrRenderAttr("src", _imports_0)} alt="" style="${ssrRenderStyle({ "height": "20px" })}"><h6 class="mx-2 my-2">Family Details</h6></div><div class="form-card"><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Father Name<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["capitalize nboard-form form-control textbox", {
          "p-invalid": unref(v$).father_name.$error
        }],
        onKeypress: ($event) => isLetter($event),
        type: "text",
        placeholder: "Father Name",
        name: "father_name",
        id: "father_name",
        modelValue: unref(service).employee_onboarding.father_name,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.father_name = $event
      }, null, _parent));
      if (unref(v$).father_name.$error || unref(v$).father_name.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).father_name.required.$message.replace(
          "Value",
          "Father Name"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Date of Birth <span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        inputId: "icon",
        maxDate: unref(service).beforeYears(new Date(unref(service).employee_onboarding.dob)),
        showIcon: "",
        modelValue: unref(service).employee_onboarding.dob_father,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.dob_father = $event,
        editable: "",
        dateFormat: "dd-mm-yy",
        placeholder: "Date of birth",
        style: { "width": "350px" },
        class: {
          "p-invalid": unref(v$).dob_father.$error
        },
        onDateSelect: unref(service).fnCalculateAge
      }, null, _parent));
      if (unref(v$).dob_father.$error || unref(v$).dob_father.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).dob_father.required.$message.replace(
          "Value",
          "Father Date of Birth"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Gender</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "form-control"],
        type: "text",
        name: "father_gender",
        id: "father_gender",
        value: "Male",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Age </label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "Age",
        name: "father_age",
        modelValue: unref(service).employee_onboarding.father_age,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.father_age = $event,
        id: "father_age",
        class: "textbox onboard-form form-control",
        minlength: "2",
        maxlength: "3",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Mother Name <span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["capitalize onboard-form form-control textbox", {
          "p-invalid": unref(v$).mother_name.$error
        }],
        type: "text",
        placeholder: "Mother Name",
        onKeypress: ($event) => isLetter($event),
        name: "mother_name",
        modelValue: unref(service).employee_onboarding.mother_name,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.mother_name = $event
      }, null, _parent));
      if (unref(v$).mother_name.$error || unref(v$).mother_name.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).mother_name.required.$message.replace(
          "Value",
          "Mother Name"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Date of Birth <span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        inputId: "icon",
        maxDate: unref(service).beforeYears(new Date(unref(service).employee_onboarding.dob)),
        showIcon: "",
        modelValue: unref(service).employee_onboarding.dob_mother,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.dob_mother = $event,
        editable: "",
        dateFormat: "dd-mm-yy",
        placeholder: "Date of birth",
        style: { "width": "350px" },
        class: {
          "p-invalid": unref(v$).dob_mother.$error
        },
        onDateSelect: unref(service).fnCalculateAge
      }, null, _parent));
      if (unref(v$).dob_mother.$error || unref(v$).dob_mother.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).dob_mother.required.$message.replace(
          "Value",
          "Mother Date of Birth"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Gender</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "form-control"],
        type: "text",
        name: "mother_gender",
        id: "",
        value: "Female",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Age</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "Age",
        name: "mother_age",
        modelValue: unref(service).employee_onboarding.mother_age,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.mother_age = $event,
        id: "mother_age",
        class: "textbox onboard-form form-control",
        minlength: "2",
        maxlength: "3",
        readonly: ""
      }, null, _parent));
      _push(`</div></div>`);
      if (unref(service).isSpouseDisable) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Spouse Name <span class="text-danger">*</span></label>`);
        _push(ssrRenderComponent(_component_InputText, {
          onKeypress: ($event) => isLetter($event),
          class: ["capitalize onboard-form form-control textbox", {
            "p-invalid": unref(v$).spouse_name.$error
          }],
          type: "text",
          placeholder: "Spouse Name",
          name: "spouse_name",
          modelValue: unref(service).employee_onboarding.spouse_name,
          "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.spouse_name = $event
        }, null, _parent));
        if (unref(v$).spouse_name.$error) {
          _push(`<span class="font-medium text-red-400 fs-6">${ssrInterpolate(unref(v$).spouse_name.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).isSpouseDisable) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Spouse DOB <span class="text-danger">*</span></label>`);
        _push(ssrRenderComponent(_component_Calendar, {
          inputId: "icon",
          showIcon: "",
          modelValue: unref(service).employee_onboarding.dob_spouse,
          "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.dob_spouse = $event,
          editable: "",
          dateFormat: "dd-mm-yy",
          placeholder: "Date of birth",
          style: { "width": "350px" },
          class: {
            "p-invalid": unref(v$).dob_spouse.$error
          },
          onDateSelect: unref(service).fnCalculateAge
        }, null, _parent));
        if (unref(v$).dob_spouse.$error) {
          _push(`<span class="font-medium text-red-400 fs-6">${ssrInterpolate(unref(v$).dob_spouse.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).isSpouseDisable) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Gender <span class="text-danger">*</span></label>`);
        if (unref(service).readonly.spouse) {
          _push(ssrRenderComponent(_component_InputText, {
            class: ["onboard-form form-control textbox", [{
              "is-invalid": unref(v$).spouse_gender.$error
            }, unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"]],
            type: "text",
            readonly: "",
            placeholder: "Select Spouse Gender",
            name: "spouse_gender",
            modelValue: unref(service).employee_onboarding.spouse_gender,
            "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.spouse_gender = $event
          }, null, _parent));
        } else {
          _push(ssrRenderComponent(_component_Dropdown, {
            modelValue: unref(service).employee_onboarding.spouse_gender,
            "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.spouse_gender = $event,
            options: _ctx.Gender,
            optionLabel: "name",
            optionValue: "value",
            placeholder: "Select Gender",
            class: ["p-error", [{
              "is-invalid": unref(v$).spouse_gender.$error
            }, unref(service).readonly.spouse ? "bg-gray-200" : ""]],
            readonly: true
          }, null, _parent));
        }
        if (unref(v$).spouse_gender.$error) {
          _push(`<span class="font-medium text-red-400 fs-6">${ssrInterpolate(unref(v$).spouse_gender.$errors[0].$message)}</span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).isSpouseDisable) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Number of Children</label><select placeholder="Number of Children" name="no_of_children" id="no_of_children" class="textbox onboard-form form-control spouse_data select2_form_without_search"><option value="" hidden selected disabled> Select Number of Children </option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).isSpouseDisable) {
        _push(`<div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Date of Wedding</label>`);
        _push(ssrRenderComponent(_component_Calendar, {
          inputId: "icon",
          showIcon: "",
          modelValue: unref(service).employee_onboarding.wedding_date,
          "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.wedding_date = $event,
          editable: "",
          dateFormat: "dd-mm-yy",
          placeholder: "Date of Wedding",
          style: { "width": "350px" },
          onDateSelect: _ctx.fnCalculateAge
        }, null, _parent));
        _push(`</div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/FamilyDetails/FamilyDetails.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "OfficeDetails",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    const v$ = useValidate(service.rules, service.employee_onboarding);
    const readonly = reactive({
      statutory: false,
      child: false,
      fdc: false,
      lta: false,
      other: false,
      l1_code: false,
      designation: false,
      mobile: false,
      spouse: false
    });
    const isEmail = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z0-9@.]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    const isLetter = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z_ ]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputText = resolveComponent("InputText");
      const _component_InputMask = resolveComponent("InputMask");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 shadow card profile-box card-top-border" }, _attrs))}><div class="card-body justify-content-center align-items-center"><div class="flex header-card-text"><h6 class="my-2"><i class="fa fa-briefcase" aria-hidden="true"></i> Official Details</h6></div><div class="form-card"><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"><div class="floating"><label for="" class="float-label">Department</label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        modelValue: unref(service).employee_onboarding.department,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.department = $event,
        class: [{
          "p-invalid": unref(v$).department.$error
        }, "p-error"],
        options: unref(service).departmentDetails,
        optionLabel: "name",
        optionValue: "id",
        placeholder: "Department",
        name: "department",
        id: "department"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"><div class="floating"><label for="" class="float-label">Process </label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["onboard-form form-control", {
          "p-invalid": unref(v$).process.$error
        }],
        onKeypress: ($event) => isLetter($event),
        type: "text",
        modelValue: unref(service).employee_onboarding.process,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.process = $event,
        placeholder: "Process"
      }, null, _parent));
      if (unref(v$).process.$error || unref(v$).process.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).process.required.$message.replace("Value", "Process"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"><div class="floating"><label for="" class="float-label">Designation<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        onKeypress: ($event) => isLetter($event),
        class: ["onboard-form form-control", [{
          "p-invalid": unref(v$).designation.$error
        }, readonly.designation ? "bg-gray-200" : ""]],
        type: "text",
        readonly: readonly.designation,
        placeholder: "Designation",
        modelValue: unref(service).employee_onboarding.designation,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.designation = $event
      }, null, _parent));
      if (unref(v$).designation.$error || unref(v$).designation.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).designation.required.$message.replace(
          "Value",
          "Designation"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Cost Center</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "Cost Center",
        modelValue: unref(service).employee_onboarding.cost_center,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.cost_center = $event,
        name: "cost_center",
        class: "onboard-form form-control textbox"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Work Location<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        onKeypress: ($event) => isLetter($event),
        class: ["onboard-form form-control", {
          "p-invalid": unref(v$).work_location.$error
        }],
        type: "text",
        placeholder: "Work Location",
        modelValue: unref(service).employee_onboarding.work_location,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.work_location = $event
      }, null, _parent));
      if (unref(v$).work_location.$error || unref(v$).work_location.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).work_location.required.$message.replace(
          "Value",
          "Work Location"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3 col-xxl-3"><div class="floating"><label for="" class="float-label">Reporting Manager Name<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_Dropdown, {
        readonly: unref(service).readonly.l1_code,
        options: unref(service).Managerdetails,
        optionLabel: "name",
        placeholder: "Reporting Manager Name",
        modelValue: unref(service).employee_onboarding.l1_manager_code,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.l1_manager_code = $event,
        class: ["p-error", {
          "p-invalid": unref(v$).l1_manager_code.$error
        }]
      }, {
        value: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            if (slotProps.value) {
              _push2(`<div class="flex align-items-center"${_scopeId}><div${_scopeId}>${ssrInterpolate(slotProps.value.user_code)} - ${ssrInterpolate(slotProps.value.name)}</div></div>`);
            } else {
              _push2(`<span${_scopeId}>${ssrInterpolate(slotProps.placeholder)}</span>`);
            }
          } else {
            return [
              slotProps.value ? (openBlock(), createBlock("div", {
                key: 0,
                class: "flex align-items-center"
              }, [
                createVNode("div", null, toDisplayString(slotProps.value.user_code) + " - " + toDisplayString(slotProps.value.name), 1)
              ])) : (openBlock(), createBlock("span", { key: 1 }, toDisplayString(slotProps.placeholder), 1))
            ];
          }
        }),
        option: withCtx((slotProps, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="flex align-items-center"${_scopeId}><div${_scopeId}>${ssrInterpolate(slotProps.option.user_code)} - ${ssrInterpolate(slotProps.option.name)}</div><div${_scopeId}></div></div>`);
          } else {
            return [
              createVNode("div", { class: "flex align-items-center" }, [
                createVNode("div", null, toDisplayString(slotProps.option.user_code) + " - " + toDisplayString(slotProps.option.name), 1),
                createVNode("div")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      if (unref(v$).l1_manager_code.$error || unref(v$).l1_manager_code.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).l1_manager_code.required.$message.replace(
          "Value",
          "Reporting Manager Code"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Official Email </label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "email",
        placeholder: "Official E-Mail Id",
        name: "officical_mail",
        onKeypress: ($event) => isEmail($event),
        class: "textbox form-control",
        modelValue: unref(service).employee_onboarding.officical_mail,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.officical_mail = $event
      }, null, _parent));
      if (unref(v$).officical_mail.$error) {
        _push(`<span class="font-medium text-red-600 fs-6">${ssrInterpolate(unref(v$).officical_mail.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Official Mobile</label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        id: "serial",
        mask: "9999999999",
        modelValue: unref(service).employee_onboarding.official_mobile,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.official_mobile = $event,
        placeholder: "Mobile Number",
        style: { "text-transform": "uppercase" },
        class: ["form-control textbox", {
          "p-invalid": unref(v$).official_mobile.$error
        }]
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Date of confirmation<span class="text-danger">*</span></label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: ["onboard-form form-control", {
          "p-invalid": unref(v$).confirmation_period.$error
        }],
        type: "text",
        placeholder: "Date of confirmation",
        max: "9999-12-31",
        modelValue: unref(service).employee_onboarding.confirmation_period,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.confirmation_period = $event,
        onfocus: "(this.type='date')"
      }, null, _parent));
      if (unref(v$).confirmation_period.$error || unref(v$).confirmation_period.$pending.$response) {
        _push(`<span class="p-error">${ssrInterpolate(unref(v$).confirmation_period.required.$message.replace(
          "Value",
          "Date Of Confirmation"
        ))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/OfficeDetails/OfficeDetails.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "Compensatory",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    const v$ = useValidate(service.rules, service.employee_onboarding);
    ref([
      { id: "1", name: "Monthly gross" },
      { id: "2", name: "Monthly Net" }
    ]);
    ref([
      { id: "1", name: "Yearly Gross" },
      { id: "2", name: "Yearly Net" }
    ]);
    ref(false);
    ref(false);
    reactive({
      compensation_monthly: "",
      compensation_yearly: ""
    });
    const isNumber = (e) => {
      let char = String.fromCharCode(e.keyCode);
      if (/^[0-9]+$/.test(char))
        return true;
      else
        e.preventDefault();
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_InputText = resolveComponent("InputText");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "p-2 my-6 shadow card profile-box card-top-border" }, _attrs))}><div class="card-body justify-content-center align-items-center"><div class="flex header-card-text"><h6 class="m-2"><i class="fa fa-money" aria-hidden="true"></i> Compensatory</h6></div><div class="form-card"><div class="row"><div class="mb-3 row"><div class="my-2 mb-3 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-0">`);
      if (unref(service).compen_disable) {
        _push(`<div class="mt-2 form-check form-check-inline"><label class="-ml-4 font-bold form-check-label leave_type" for="compensation_monthly"> Enter Monthly Gross</label></div>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(service).compen_disable) {
        _push(`<div class="form-check form-check-inline">`);
        _push(ssrRenderComponent(_component_InputText, {
          type: "number",
          placeholder: "Enter Monthly Gross",
          name: "cic",
          onKeypress: ($event) => isNumber($event),
          modelValue: unref(service).employee_onboarding.cic,
          "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.cic = $event,
          id: "cic",
          onInput: unref(service).compensatory_calculation,
          class: ["onboard-form form-control textbox", [{
            "p-invalid": unref(v$).cic.$error
          }]],
          step: "0.01"
        }, null, _parent));
        _push(`</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="-ml-3 form-check form-check-inline"><p><strong class="font-bold">Monthly CTC</strong> (Cost to Company) : `);
      if (unref(service).employee_onboarding.total_ctc < 0) {
        _push(`<strong>0</strong>`);
      } else if (unref(service).employee_onboarding.total_ctc > 0) {
        _push(`<strong>${ssrInterpolate(Math.floor(unref(service).employee_onboarding.total_ctc))}</strong>`);
      } else {
        _push(`<strong>0</strong>`);
      }
      _push(`</p></div></div>`);
      if (unref(v$).cic.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).cic.$errors[0].$message)}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Basic Salary</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "Basic Salary",
        name: "basic",
        onKeypress: ($event) => isNumber($event),
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "textbox onboard-form form-control calculation_data gross_data"],
        modelValue: unref(service).employee_onboarding.basic,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.basic = $event,
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">HRA</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "HRA",
        name: "hra",
        modelValue: unref(service).employee_onboarding.hra,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.hra = $event,
        onKeypress: ($event) => isNumber($event),
        class: ["onboard-form form-control textbox calculation_data gross_data", [unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"]],
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Statutory Bonus</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        readonly: unref(service).readonly.statutory,
        type: "number",
        placeholder: "Statutory Bonus",
        onKeypress: ($event) => isNumber($event),
        name: "statutory_bonus",
        modelValue: unref(service).employee_onboarding.statutory_bonus,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.statutory_bonus = $event,
        onInput: unref(service).statutory_bonus,
        class: ["onboard-form form-control textbox calculation_data gross_data", [unref(service).readonly.statutory ? "bg-gray-200" : ""]],
        step: "0.01"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Child Education Allowance</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        readonly: unref(service).readonly.child,
        type: "number",
        placeholder: "Child Education Allowance",
        onKeypress: ($event) => isNumber($event),
        name: "child_education_allowance",
        modelValue: unref(service).employee_onboarding.child_education_allowance,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.child_education_allowance = $event,
        class: ["onboard-form form-control textbox calculation_data gross_data", [unref(service).readonly.child ? "bg-gray-200" : ""]],
        step: "0.01",
        onInput: unref(service).child_allowance
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Food Coupon</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        readonly: unref(service).readonly.fdc,
        type: "number",
        class: [[unref(service).readonly.fdc ? "bg-gray-200" : ""], "onboard-form form-control textbox calculation_data gross_data"],
        placeholder: "Food Coupon",
        name: "food_coupon",
        onKeypress: ($event) => isNumber($event),
        modelValue: unref(service).employee_onboarding.food_coupon,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.food_coupon = $event,
        onInput: unref(service).food_coupon,
        step: "0.01"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">LTA</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        readonly: unref(service).readonly.lta,
        type: "number",
        class: [[unref(service).readonly.lta ? "bg-gray-200" : ""], "textbox onboard-form form-control calculation_data gross_data"],
        placeholder: "LTA",
        name: "lta",
        modelValue: unref(service).employee_onboarding.lta,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.lta = $event,
        onKeypress: ($event) => isNumber($event),
        step: "0.01",
        onInput: unref(service).lta
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Special Allowance</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "onboard-form form-control textbox calculation_data gross_data"],
        type: "number",
        placeholder: "Special Allowance",
        name: "special_allowance",
        onKeypress: ($event) => isNumber($event),
        modelValue: unref(service).employee_onboarding.special_allowance,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.special_allowance = $event,
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Other Allowance</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        readonly: unref(service).readonly.other,
        type: "number",
        class: [[unref(service).readonly.other ? "bg-gray-200" : ""], "textbox onboard-form form-control calculation_data gross_data"],
        placeholder: "Other Allowance",
        name: "other_allowance",
        onKeypress: ($event) => isNumber($event),
        modelValue: unref(service).employee_onboarding.other_allowance,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.other_allowance = $event,
        step: "0.01",
        onInput: unref(service).other_allowance
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Gross Salary</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "textbox onboard-form form-control"],
        placeholder: "Gross Salary",
        name: "gross",
        modelValue: unref(service).employee_onboarding.gross,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.gross = $event,
        step: "0.01",
        readonly: "",
        onKeypress: ($event) => isNumber($event)
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">EPF employer contribution</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "textbox onboard-form form-control calculation_data cic_data"],
        placeholder: "EPF employer contribution",
        name: "epf_employer_contribution",
        modelValue: unref(service).employee_onboarding.epf_employer_contribution,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.epf_employer_contribution = $event,
        onKeypress: ($event) => isNumber($event),
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">ESIC employer contribution</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "onboard-form form-control textbox calculation_data cic_data"],
        placeholder: "ESIC employer contribution",
        name: "esic_employer_contribution",
        modelValue: unref(service).employee_onboarding.esic_employer_contribution,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.esic_employer_contribution = $event,
        onKeypress: ($event) => isNumber($event),
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Insurance</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "Insurance",
        name: "insurance",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : ""], "onboard-form form-control textbox calculation_data cic_data"],
        onKeypress: ($event) => isNumber($event),
        modelValue: unref(service).employee_onboarding.insurance,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.insurance = $event,
        onInput: unref(service).insurance,
        step: "0.01"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Graduity</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "Graduity",
        name: "graduity",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : ""], "onboard-form form-control textbox calculation_data cic_data"],
        onKeypress: ($event) => isNumber($event),
        modelValue: unref(service).employee_onboarding.graduity,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.graduity = $event,
        onInput: unref(service).graduity,
        step: "0.01"
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">EPF Employee</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "onboard-form form-control calculation_data net_data textbox"],
        placeholder: "EPF Employee",
        name: "epf_employee",
        onKeypress: ($event) => isNumber($event),
        modelValue: unref(service).employee_onboarding.epf_employee,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.epf_employee = $event,
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">ESIC Employee</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        placeholder: "ESIC Employee",
        name: "esic_employee",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "textbox onboard-form form-control calculation_data net_data"],
        modelValue: unref(service).employee_onboarding.esic_employee,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.esic_employee = $event,
        onKeypress: ($event) => isNumber($event),
        step: "0.01",
        readonly: ""
      }, null, _parent));
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-lg-3 col-xl-3"><div class="floating"><label for="" class="float-label">Net Income</label>`);
      _push(ssrRenderComponent(_component_InputText, {
        type: "number",
        class: [[unref(service).readonly.is_emp_code_quick ? "bg-gray-200" : "bg-gray-200"], "onboard-form form-control textbox"],
        placeholder: "Net Income",
        name: "net_income",
        modelValue: unref(service).employee_onboarding.net_income,
        "onUpdate:modelValue": ($event) => unref(service).employee_onboarding.net_income = $event,
        step: "0.01",
        readonly: "",
        onKeypress: ($event) => isNumber($event)
      }, null, _parent));
      _push(`</div></div></div></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/Compensatory/Compensatory.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const NormalOnboarding_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "NormalOnboarding",
  __ssrInlineRender: true,
  setup(__props) {
    const service = useNormalOnboardingMainStore();
    onMounted(() => {
      service.getBasicDeps();
      service.isQuickOrBulkOnboarding();
      service.NationalityCheck();
      setTimeout(() => {
        if (service.checkIsQuickOrNormal == "quick" || service.checkIsQuickOrNormal == "bulk") {
          console.log("calculation performs");
          service.compensatoryCalWhileQuick();
        } else {
          console.log("no calculation performs");
        }
      }, 6e3);
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      _push(`<div class="w-full"><div class=""><div class="row"><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"><div id="msform"><form class="p-fluid" enctype="multipart/form-data">`);
      _push(ssrRenderComponent(_sfc_main$6, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$4, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$3, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(ssrRenderComponent(_sfc_main$5, null, null, _parent));
      _push(`</form></div></div></div></div></div>`);
      if (!unref(service).employee_onboarding.employee_code.length > 0 && !unref(service).employee_onboarding.aadhar_number.length > 0 || !unref(service).employee_onboarding.employee_name.length > 0 && !unref(service).employee_onboarding.email.length > 0 || !unref(service).employee_onboarding.mobile_number.length > 0 && !unref(service).employee_onboarding.dob.length > 0) {
        _push(ssrRenderComponent(_component_Dialog, {
          header: "Information Required",
          visible: unref(service).RequiredDocument,
          "onUpdate:visible": ($event) => unref(service).RequiredDocument = $event,
          breakpoints: { "960px": "75vw", "640px": "90vw" },
          style: { width: "50vw" }
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              if (unref(service).employee_onboarding.employee_code == "" || unref(service).employee_onboarding.employee_code.length < 0) {
                _push2(`<div class="flex my-4"${_scopeId}><img${ssrRenderAttr("src", _imports_0$1)} style="${ssrRenderStyle({ "height": "25px", "width": "38px" })}" alt=""${_scopeId}><span class="my-auto"${_scopeId}>Employee Code is Required </span></div>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(service).employee_onboarding.employee_name == "" || unref(service).employee_onboarding.employee_name.length < 0) {
                _push2(`<div class="flex my-4"${_scopeId}><img${ssrRenderAttr("src", _imports_0$1)} style="${ssrRenderStyle({ "height": "25px", "width": "38px" })}" alt=""${_scopeId}><span class="my-auto"${_scopeId}>Employee Name As Per Aadhar is Required</span></div>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(service).employee_onboarding.mobile_number == "" || unref(service).employee_onboarding.mobile_number.length < 0) {
                _push2(`<div class="flex my-4"${_scopeId}><img${ssrRenderAttr("src", _imports_0$1)} style="${ssrRenderStyle({ "height": "25px", "width": "38px" })}" alt=""${_scopeId}><span class="my-auto"${_scopeId}>Mobile Number is Required</span></div>`);
              } else {
                _push2(`<!---->`);
              }
              if (unref(service).employee_onboarding.email == "" || unref(service).employee_onboarding.email.length < 0) {
                _push2(`<div class="flex my-4"${_scopeId}><img${ssrRenderAttr("src", _imports_0$1)} style="${ssrRenderStyle({ "height": "25px", "width": "38px" })}" alt=""${_scopeId}><span class="my-auto"${_scopeId}>Email is Required</span></div>`);
              } else {
                _push2(`<!---->`);
              }
            } else {
              return [
                unref(service).employee_onboarding.employee_code == "" || unref(service).employee_onboarding.employee_code.length < 0 ? (openBlock(), createBlock("div", {
                  key: 0,
                  class: "flex my-4"
                }, [
                  createVNode("img", {
                    src: _imports_0$1,
                    style: { "height": "25px", "width": "38px" },
                    alt: ""
                  }),
                  createVNode("span", { class: "my-auto" }, "Employee Code is Required ")
                ])) : createCommentVNode("", true),
                unref(service).employee_onboarding.employee_name == "" || unref(service).employee_onboarding.employee_name.length < 0 ? (openBlock(), createBlock("div", {
                  key: 1,
                  class: "flex my-4"
                }, [
                  createVNode("img", {
                    src: _imports_0$1,
                    style: { "height": "25px", "width": "38px" },
                    alt: ""
                  }),
                  createVNode("span", { class: "my-auto" }, "Employee Name As Per Aadhar is Required")
                ])) : createCommentVNode("", true),
                unref(service).employee_onboarding.mobile_number == "" || unref(service).employee_onboarding.mobile_number.length < 0 ? (openBlock(), createBlock("div", {
                  key: 2,
                  class: "flex my-4"
                }, [
                  createVNode("img", {
                    src: _imports_0$1,
                    style: { "height": "25px", "width": "38px" },
                    alt: ""
                  }),
                  createVNode("span", { class: "my-auto" }, "Mobile Number is Required")
                ])) : createCommentVNode("", true),
                unref(service).employee_onboarding.email == "" || unref(service).employee_onboarding.email.length < 0 ? (openBlock(), createBlock("div", {
                  key: 3,
                  class: "flex my-4"
                }, [
                  createVNode("img", {
                    src: _imports_0$1,
                    style: { "height": "25px", "width": "38px" },
                    alt: ""
                  }),
                  createVNode("span", { class: "my-auto" }, "Email is Required")
                ])) : createCommentVNode("", true)
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(ssrRenderComponent(_component_Dialog, {
        header: "Header",
        visible: unref(service).canShowLoading,
        "onUpdate:visible": ($event) => unref(service).canShowLoading = $event,
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
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/Organization/Normal_Onboarding/NormalOnboarding.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const app = createApp(_sfc_main);
const pinia = createPinia();
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.use(VueSweetalert2);
app.use(pinia);
app.directive("tooltip", Tooltip);
app.directive("badge", BadgeDirective);
app.directive("ripple", Ripple);
app.directive("styleclass", StyleClass);
app.directive("focustrap", FocusTrap);
app.component("Accordion", Accordion);
app.component("AccordionTab", AccordionTab);
app.component("AutoComplete", AutoComplete);
app.component("Button", Button);
app.component("Calendar", Calendar);
app.component("Checkbox", Checkbox);
app.component("Column", Column);
app.component("ColumnGroup", ColumnGroup);
app.component("ConfirmDialog", ConfirmDialog);
app.component("ConfirmPopup", ConfirmPopup);
app.component("Dialog", Dialog);
app.component("Dropdown", Dropdown);
app.component("DynamicDialog", DynamicDialog);
app.component("InputMask", InputMask);
app.component("InputNumber", InputNumber);
app.component("InputSwitch", InputSwitch);
app.component("InputText", InputText);
app.component("ProgressSpinner", ProgressSpinner);
app.component("RadioButton", RadioButton);
app.component("Toast", Toast);
app.component("Textarea", Textarea);
app.mount("#vjs_normal_onboarding");
