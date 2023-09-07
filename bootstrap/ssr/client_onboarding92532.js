import { inject, ref, reactive, computed, resolveComponent, unref, withCtx, createVNode, useSSRContext } from "vue";
import { ssrRenderAttr, ssrRenderClass, ssrInterpolate, ssrRenderComponent, ssrRenderStyle } from "vue/server-renderer";
import "axios";
import useValidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";
const client_onboarding_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "client_onboarding",
  __ssrInlineRender: true,
  setup(__props) {
    inject("$swal");
    const canShowLoading = ref(false);
    const client_onboarding = reactive({
      client_code: "",
      client_name: "",
      contract_start_date: "",
      contract_end_date: "",
      cin_number: "",
      company_tan: "",
      company_pan: "",
      product: "",
      gst_no: "",
      epf_reg_number: "",
      esic_reg_number: "",
      prof_tax_reg_number: "",
      lwf_reg_number: "",
      abs_client_code: "",
      client_full_name: "",
      client_logo: "",
      authorised_person_name: "",
      authorised_person_designation: "",
      authorised_person_contact_number: "",
      authorised_person_contact_mail: "",
      billing_address: "",
      shipping_address: "",
      subscription_type: "",
      doc_uploads: ""
    });
    const rules = computed(() => {
      return {
        client_code: { required },
        client_name: { required },
        contract_start_date: { required },
        contract_end_date: { required },
        cin_number: { required },
        company_tan: { required },
        company_pan: { required },
        gst_no: { required },
        epf_reg_number: { required },
        esic_reg_number: { required },
        prof_tax_reg_number: { required },
        lwf_reg_number: { required },
        abs_client_code: { required },
        client_full_name: { required },
        client_logo: { required },
        authorised_person_name: { required },
        authorised_person_designation: { required },
        authorised_person_contact_number: { required },
        authorised_person_contact_mail: { required },
        billing_address: { required },
        shipping_address: { required },
        subscription_type: { required },
        doc_uploads: { required },
        product: { required }
      };
    });
    const v$ = useValidate(rules, client_onboarding);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Calendar = resolveComponent("Calendar");
      const _component_InputMask = resolveComponent("InputMask");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_ProgressSpinner = resolveComponent("ProgressSpinner");
      _push(`<!--[--><div class="my-4 shadow card profile-box card-top-border"><div class="mb-2 card-body justify-content-center align-items-center"><div class="p-2 my-4 form-card"><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Client Code</label><input type="text" placeholder="Client Code" name="client_code" required${ssrRenderAttr("value", client_onboarding.client_code)} class="${ssrRenderClass([[
        unref(v$).client_code.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).client_code.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).client_code.required.$message.replace("Value", "Client Code"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Legal Name of the Company</label><input type="text" placeholder="Legal Name of the Company" name="client_name" id="client_name"${ssrRenderAttr("value", client_onboarding.client_name)} required class="${ssrRenderClass([[
        unref(v$).client_name.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).client_name.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).client_name.required.$message.replace("Value", "Legal Name of the Company"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Contract Start Date</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        showIcon: "",
        required: "",
        class: ["h-10 w-[250px] relative right-2", [
          unref(v$).contract_start_date.$error ? "border border-red-500" : ""
        ]],
        modelValue: client_onboarding.contract_start_date,
        "onUpdate:modelValue": ($event) => client_onboarding.contract_start_date = $event
      }, null, _parent));
      if (unref(v$).contract_start_date.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).contract_start_date.required.$message.replace("Value", "Contract Start Date"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Contract End Date</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        showIcon: "",
        required: "",
        class: ["h-10 w-[250px] relative right-2", [
          unref(v$).contract_end_date.$error ? "border border-red-500" : ""
        ]],
        modelValue: client_onboarding.contract_end_date,
        "onUpdate:modelValue": ($event) => client_onboarding.contract_end_date = $event
      }, null, _parent));
      if (unref(v$).contract_end_date.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).contract_end_date.required.$message.replace("Value", "Contract End Date"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Company Identification Number</label><input type="text" placeholder="Company Identification Number" name="cin_no" pattern="alp-num" required${ssrRenderAttr("value", client_onboarding.cin_number)} class="${ssrRenderClass([[
        unref(v$).cin_number.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).cin_number.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).cin_number.required.$message.replace("Value", "Company Identification Number"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error cin_no_label" for="cin_no" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Company TAN</label><input type="text" placeholder="Company TAN" name="com_tan" pattern="alp-num"${ssrRenderAttr("value", client_onboarding.company_tan)} required class="${ssrRenderClass([[
        unref(v$).company_tan.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).company_tan.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).company_tan.required.$message.replace("Value", "Company TAN"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error com_tan_label" for="com_tan" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Company PAN</label><input type="text" placeholder="Company PAN" name="com_pan" id="com_pan" pattern="alp-num" required${ssrRenderAttr("value", client_onboarding.company_pan)} class="${ssrRenderClass([[
        unref(v$).company_pan.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).company_pan.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).company_pan.required.$message.replace("Value", "Company PAN"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error com_pan_label" for="com_pan" style="${ssrRenderStyle({ "display": "none" })}"></label><span id="pan_err" style="${ssrRenderStyle({ "display": "none", "color": "darkred" })}" class="text-danger"> Please Enter Valid Pan Number</span></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">GST No</label><input type="text" placeholder="GST No" name="gst_no" pattern="gst" required${ssrRenderAttr("value", client_onboarding.gst_no)} class="${ssrRenderClass([[
        unref(v$).gst_no.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).gst_no.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).gst_no.required.$message.replace("Value", "GST No"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error gst_no_label" for="gst_no" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">EPF Registration Number</label><input type="text" placeholder="EPF Registration Number" name="epf" pattern="alp-num"${ssrRenderAttr("value", client_onboarding.epf_reg_number)} required class="${ssrRenderClass([[
        unref(v$).epf_reg_number.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).epf_reg_number.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).epf_reg_number.required.$message.replace("Value", "EPF Registration Number"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error epf_label" for="epf" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">ESIC Registration Number</label><input type="text" placeholder="ESIC Registration Number" name="esic" pattern="alp-num" required${ssrRenderAttr("value", client_onboarding.esic_reg_number)} class="${ssrRenderClass([[
        unref(v$).esic_reg_number.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).esic_reg_number.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).esic_reg_number.required.$message.replace("Value", "ESIC Registration Number"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error esic_label" for="esic" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Professional Tax Registration Number</label><input type="text" placeholder="Professional Tax Registration Number" name="professional_tax" pattern="alp-num" required${ssrRenderAttr("value", client_onboarding.prof_tax_reg_number)} class="${ssrRenderClass([[
        unref(v$).prof_tax_reg_number.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).prof_tax_reg_number.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).prof_tax_reg_number.required.$message.replace("Value", "Professional Tax Registration Number"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error professional_tax_label" for="professional_tax" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">LWF Registration Number</label><input type="text" placeholder="LWF Registration Number" name="lwf"${ssrRenderAttr("value", client_onboarding.lwf_reg_number)} pattern="alp-num" required class="${ssrRenderClass([[
        unref(v$).lwf_reg_number.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).lwf_reg_number.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).lwf_reg_number.required.$message.replace("Value", "LWF Registration Number"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error lwf_label" for="lwf" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">ABS Client Code</label><input type="text" placeholder="ABS Client Code" name="lwf"${ssrRenderAttr("value", client_onboarding.abs_client_code)} pattern="alp-num" required class="${ssrRenderClass([[
        unref(v$).abs_client_code.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).abs_client_code.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).abs_client_code.required.$message.replace("Value", "ABS Client Code"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error lwf_label" for="lwf" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Client Full Name</label><input type="text" placeholder="Client Full Name" name="lwf"${ssrRenderAttr("value", client_onboarding.client_full_name)} pattern="alp-num" required class="${ssrRenderClass([[
        unref(v$).client_full_name.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).client_full_name.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).client_full_name.required.$message.replace("Value", "Client Full Name"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error lwf_label" for="lwf" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"><label for="" class="float-label">Client Logo </label><div class="mb-3"><input type="file" id="formFile" accept=".doc,.docx,.pdf,image/*" class="${ssrRenderClass([[
        unref(v$).client_logo.$error ? "border border-red-500" : ""
      ], "form-control"])}">`);
      if (unref(v$).client_logo.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).client_logo.required.$message.replace("Value", "Document"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div></div></div></div></div><div class="shadow card profile-box card-top-border"><div class="card-body justify-content-center align-items-center"><div class="p-2 mb-2 form-card"><div class="text-primary header-card-text"><h6>Authorized Details</h6></div><div class="mt-1 row"><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Authorized Person Name</label><input type="text" placeholder="Authorized Person Name" name="auth_person_name" pattern="alpha" required${ssrRenderAttr("value", client_onboarding.authorised_person_name)} class="${ssrRenderClass([[
        unref(v$).authorised_person_name.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).authorised_person_name.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).authorised_person_name.required.$message.replace("Value", "Authorized Person Name"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error auth_person_name_label" for="auth_person_name" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Authorized Person Designation</label><input type="text" placeholder="Authorized Person Designation" name="auth_person_desig" pattern="alpha" required${ssrRenderAttr("value", client_onboarding.authorised_person_designation)} class="${ssrRenderClass([[
        unref(v$).authorised_person_designation.$error ? "border border-red-500" : ""
      ], "onboard-form form-control"])}">`);
      if (unref(v$).authorised_person_designation.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).authorised_person_designation.required.$message.replace("Value", "Authorized Person Designation"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<label class="error auth_person_desig_label" for="auth_person_desig" style="${ssrRenderStyle({ "display": "none" })}"></label></div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Authorized Person Contact Number</label>`);
      _push(ssrRenderComponent(_component_InputMask, {
        class: ["h-10", [
          unref(v$).authorised_person_contact_number.$error ? "border border-red-500" : ""
        ]],
        id: "basic",
        mask: "9999999999",
        placeholder: "999999999",
        modelValue: client_onboarding.authorised_person_contact_number,
        "onUpdate:modelValue": ($event) => client_onboarding.authorised_person_contact_number = $event
      }, null, _parent));
      if (unref(v$).authorised_person_contact_number.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).authorised_person_contact_number.required.$message.replace("Value", "Authorized Person Contact Number"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Authorized Person Contact Email</label><input type="email" placeholder="Authorized Person Contact Email" name="auth_person_email" required${ssrRenderAttr("value", client_onboarding.authorised_person_contact_mail)} class="${ssrRenderClass([[
        unref(v$).authorised_person_contact_mail.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).authorised_person_contact_mail.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).authorised_person_contact_mail.required.$message.replace("Value", "Authorized Person Contact Email"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Billing Address</label><input type="text" placeholder="Billing Address" name="billing_add" required${ssrRenderAttr("value", client_onboarding.billing_address)} class="${ssrRenderClass([[
        unref(v$).billing_address.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).billing_address.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).billing_address.required.$message.replace("Value", "Billing Address"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Shipping Address</label><input type="text" placeholder="Shipping Address" name="shipping_add" required${ssrRenderAttr("value", client_onboarding.shipping_address)} class="${ssrRenderClass([[
        unref(v$).shipping_address.$error ? "border border-red-500" : ""
      ], "onboard-form form-control textbox"])}">`);
      if (unref(v$).shipping_address.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).shipping_address.required.$message.replace("Value", "Shipping Address"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-12 col-xs-12 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Select Product</label><select placeholder="Product" name="product" id="product" required class="${ssrRenderClass([[
        unref(v$).product.$error ? "border border-red-500" : ""
      ], "form-select onboard-form form-control"])}"><option value="" class="text-muted" hidden selected disabled> Select Product</option><option value="Recruitment">Recruitment</option><option value="Payroll">Payroll</option><option value="Statutory Complainces">Statutory Complainces</option><option value="Staffing">Staffing</option><option value="PMS">PMS</option><option value="Accounting">Accounting</option><option value="ROC Complainces">ROC Complainces</option><option value="Trade Mark">Trade Mark</option><option value="Patent Right">Patent Right</option></select>`);
      if (unref(v$).product.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).product.required.$message.replace("Value", "Select Product"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"><div class="floating"><label for="" class="float-label">Subscription Type</label><select placeholder="Subscription Type" name="subscription_type" id="subscription_type" aria-label="" required class="${ssrRenderClass([[
        unref(v$).subscription_type.$error ? "border border-red-500" : ""
      ], "form-select form-control"])}"><option value="" disabled selected hidden>Select Subscription Type </option><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option><option value="BiAnnually">BiAnnually</option><option value="Annually">Annually</option></select>`);
      if (unref(v$).subscription_type.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).subscription_type.required.$message.replace("Value", "Subscription Type"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="mb-2 col-md-6 col-sm-6 col-xs-6 col-xl-3 col-lg-3 dashBoard"><label for="" class="float-label">Document </label><div class="mb-3"><input type="file" id="formFile" accept=".doc,.docx,.pdf,image/*" class="${ssrRenderClass([[
        unref(v$).doc_uploads.$error ? "border border-red-500" : ""
      ], "form-control"])}">`);
      if (unref(v$).doc_uploads.$error) {
        _push(`<span class="font-semibold text-red-400 fs-6">${ssrInterpolate(unref(v$).doc_uploads.required.$message.replace("Value", "Document"))}</span>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div><div class="text-right col-12"><button type="button" class="text-center btn btn-orange" value="Submit">Submit</button></div></div></div></div></div>`);
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/configurations/client_onboarding/client_onboarding/client_onboarding.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
