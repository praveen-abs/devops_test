/* empty css            *//* empty css                   *//* empty css                 *//* empty css               */import { ref, reactive, resolveComponent, mergeProps, unref, withCtx, createVNode, createTextVNode, toDisplayString, useSSRContext, computed, openBlock, createBlock, createCommentVNode, onMounted, createApp } from "vue";
import { defineStore, createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
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
import InputNumber from "primevue/inputnumber";
import "primevue/fileupload";
import Calendar from "primevue/calendar";
import Textarea from "primevue/textarea";
import Chips from "primevue/chips";
import OverlayPanel from "primevue/overlaypanel";
import { ssrRenderAttrs, ssrRenderComponent, ssrInterpolate, ssrIncludeBooleanAttr, ssrRenderStyle } from "vue/server-renderer";
import { useToast } from "primevue/usetoast";
import axios from "axios";
import moment from "moment/moment.js";
import { S as Service } from "./Service52374.js";
import moment$1 from "moment";
import useValidate from "@vuelidate/core";
import { helpers, required, minLength } from "@vuelidate/validators";
import { L as LoadingSpinner } from "./LoadingSpinner52374.js";
import "./_plugin-vue_export-helper52374.js";
const employee_reimbursment_service = defineStore(
  "employee_reimbursment_service",
  () => {
    const toast = useToast();
    const service = Service();
    const loading_spinner = ref(false);
    const reimbursement_datas = ref([]);
    const reimbursementsScreen = ref(true);
    const reimbursements_dailog = ref(false);
    const employee_reimbursement = reactive({
      claim_type: "",
      claim_amount: 0,
      eligible_amount: 0,
      date_of_dispatch: "",
      proof_of_delivery: "",
      reimbursment_remarks: "",
      employee_reimbursement_attachment: ""
    });
    const reimbursement_claim_types = ref([
      { label: "None", value: "None" }
    ]);
    function onClaimsDocumentUploaded(e) {
      let uploadedFile = 0;
      console.log(e);
      if (e.target.files && e.target.files[0]) {
        uploadedFile = e.target.files[0];
        const reader = new FileReader();
        reader.onloadend = () => {
          console.log(reader.result);
          employee_reimbursement.employee_reimbursement_attachment = reader.result;
        };
        reader.readAsDataURL(uploadedFile);
        console.log("Uploaded Claims Document in BASE64  : " + employee_reimbursement.employee_reimbursement_attachment);
      }
    }
    const onclickOpenReimbursmentDailog = () => {
      submitted.value = false;
      reimbursements_dailog.value = true;
    };
    const data_reimbursements = ref();
    const fetch_data_from_reimbursment = () => {
      let url_all_reimbursements = window.location.origin + "/fetch_all_reimbursements";
      console.log("AJAX URL : " + url_all_reimbursements);
      axios.get(url_all_reimbursements).then((response) => {
        data_reimbursements.value = response.data;
        console.log(response.data);
        loading_spinner.value = false;
      });
    };
    async function getReimbursementClaimTypes() {
      let url_all_reimbursements = "/reimbursements/getReimbursementClaimTypes";
      console.log("AJAX URL : " + url_all_reimbursements);
      await axios.get(url_all_reimbursements).then((response) => {
        reimbursement_claim_types.value = response.data.data;
        console.log("getReimbursementClaimTypes() : " + response.data);
      });
    }
    const onclickSwitchToReimbursmentTab = () => {
      reimbursementsScreen.value = true;
      localconverganceScreen.value = false;
    };
    const localconverganceScreen = ref(false);
    const localconvergance_dailog = ref(false);
    const employee_local_conveyance = reactive({
      reimbursement_type: "Local Conveyance",
      travelled_date: "",
      mode_of_transport: "",
      travel_from: "",
      travel_to: "",
      total_distance_travelled: "",
      Amt_km: "",
      local_convenyance_total_amount: "",
      local_conveyance_remarks: ""
    });
    const onclickOpenLocalConverganceDailog = () => {
      submitted.value = false;
      localconvergance_dailog.value = true;
      submitted.value = false;
    };
    const hideDialog = () => {
      reimbursements_dailog.value = false;
      localconvergance_dailog.value = false;
      submitted.value = false;
    };
    const onclickSwitchToLocalCoverganceTab = () => {
      reimbursementsScreen.value = false;
      localconverganceScreen.value = true;
    };
    const submitted = ref(false);
    const local_Conveyance_Mode_of_transport = ref();
    async function getModeOfTransport() {
      await axios.get("/reimbursements/getModeOfTransports").then((response) => {
        local_Conveyance_Mode_of_transport.value = response.data.data;
        console.log(response.data);
      });
    }
    const data_local_convergance = ref([]);
    const disableAmt = ref(true);
    const fetch_data_for_local_convergance = () => {
      let url_all_reimbursements = window.location.origin + "/fetch_employee_reimbursement_data";
      console.log("AJAX URL : " + url_all_reimbursements);
      axios.get(url_all_reimbursements).then((response) => {
        data_local_convergance.value = response.data;
        console.log(response.data);
      });
    };
    async function saveReimbursementClaimsData() {
      console.log("Saving Reimbursement Claims data : " + JSON.stringify(employee_reimbursement));
      axios.post("/reimbursements/saveReimbursementData_Claims", {
        "user_code": service.current_user_code,
        "date": new Date().toJSON().slice(0, 10),
        "reimbursement_type": employee_reimbursement.claim_type,
        "claim_amount": employee_reimbursement.claim_amount,
        "reimbursement_remarks": employee_reimbursement.reimbursment_remarks,
        "file_upload": employee_reimbursement.employee_reimbursement_attachment,
        "entry_mode": "web"
      }).then((response) => {
        if (response.data.status == "success") {
          reimbursements_dailog.value = false;
          toast.add({
            severity: "success",
            summary: "Saved",
            detail: "Reimbursement Claims Added",
            life: 3e3
          });
        } else if (response.data.status == "failure") {
          toast.add({
            severity: "error",
            summary: "Error",
            detail: "Failed to save Local Coveyance due to following errors : " + JSON.stringify(response.data.message),
            life: 6e3
          });
          console.log("Failure Response : " + response.data.data);
        } else {
          toast.add({
            severity: "error",
            summary: "Error",
            detail: "Unknown error occured due to following : " + JSON.stringify(response.data.message),
            life: 6e3
          });
        }
        console.log(response);
      }).catch((err) => {
        console.log("Catch Response : " + res);
      }).finally((res2) => {
        console.log("Finally Response : " + res2);
      });
    }
    const post_data_for_local_convergance = () => {
      let url_all_local_convergance = "/reimbursements/saveReimbursementsData";
      localconvergance_dailog.value = false;
      loading_spinner.value = true;
      axios.post(url_all_local_convergance, {
        "user_code": service.current_user_code,
        "reimbursement_type": "Local Conveyance",
        "date": moment(employee_local_conveyance.travelled_date).format("YYYY-MM-DD"),
        "user_comments": employee_local_conveyance.local_conveyance_remarks,
        "from": employee_local_conveyance.travel_from,
        "to": employee_local_conveyance.travel_to,
        "total_expenses": employee_local_conveyance.local_convenyance_total_amount,
        "vehicle_type": employee_local_conveyance.mode_of_transport,
        "distance_travelled": employee_local_conveyance.total_distance_travelled,
        "entry_mode": "web"
      }).then((response) => {
        if (response.data.status == "success") {
          localconvergance_dailog.value = false;
          data_local_convergance.value.push(employee_local_conveyance);
          employee_local_conveyance.local_convenyance_total_amount = response.data.total_amount;
          toast.add({
            severity: "success",
            summary: "Saved",
            detail: "Local Coveyance Added",
            life: 3e3
          });
        } else if (response.data.status == "failure") {
          toast.add({
            severity: "error",
            summary: "Error",
            detail: "Failed to save Local Coveyance due to following errors : " + JSON.stringify(response.data.message),
            life: 6e3
          });
          console.log("Failure : " + response.data.data);
        } else {
          toast.add({
            severity: "error",
            summary: "Error",
            detail: "Unknown error occured due to following : " + JSON.stringify(response.data.message),
            life: 6e3
          });
        }
        console.log(employee_local_conveyance.value);
        console.log(response);
      }).catch((err) => {
        currentObj.output = err;
        console.log(err);
      }).finally((res2) => {
        console.log(res2);
        generate_ajax();
        loading_spinner.value = false;
      });
    };
    function amount_calculation() {
      console.log("Calculating amount_calculation()");
      console.log(employee_local_conveyance.mode_of_transport);
      if (employee_local_conveyance.mode_of_transport == "4-Wheeler") {
        console.log("Car");
        employee_local_conveyance.local_convenyance_total_amount = employee_local_conveyance.total_distance_travelled * 6;
        console.log(
          employee_local_conveyance.local_convenyance_total_amount
        );
      } else if (employee_local_conveyance.mode_of_transport == "2-Wheeler") {
        employee_local_conveyance.local_convenyance_total_amount = employee_local_conveyance.total_distance_travelled * 3.5;
        console.log("Bike");
      } else {
        console.log("No mode of transport found. Assigning NULL to local_convenyance_total_amount");
        employee_local_conveyance.local_convenyance_total_amount = null;
      }
    }
    const amountperKm = (data) => {
      if (data == "4-Wheeler") {
        employee_local_conveyance.Amt_km = 6;
        employee_local_conveyance.local_convenyance_total_amount = 6 * employee_local_conveyance.total_distance_travelled;
        console.log("car");
      } else if (data == "2-Wheeler") {
        employee_local_conveyance.Amt_km = 3.5;
        employee_local_conveyance.local_convenyance_total_amount = 3.5 * employee_local_conveyance.total_distance_travelled;
        console.log("Bike");
      } else {
        console.log("public transport");
        employee_local_conveyance.Amt_km = "";
      }
    };
    const selected_date = ref();
    async function generate_ajax() {
      console.log(selected_date.value);
      let filter_date = new Date(selected_date.value);
      let year = filter_date.getFullYear();
      let month = filter_date.getMonth() + 1;
      console.log(selected_date.value.toString());
      console.log(month);
      await axios.get(window.location.origin + "/fetch_employee_reimbursement_data", {
        params: {
          selected_year: year,
          selected_month: month
        }
      }).then((res2) => {
        console.log("data sent");
        console.log("data from " + res2.employee_name);
        data_local_convergance.value = res2.data;
        loading_spinner.value = false;
      }).catch((err) => {
        console.log(err);
      }).finally(() => {
        loading_spinner.value = false;
      });
    }
    const download_ajax = () => {
      let filter_date = new Date(selected_date.value);
      let year = filter_date.getFullYear();
      let month = filter_date.getMonth() + 1;
      let URL = "/reports/generate-employee-reimbursements-reports?selected_year=" + year + "&selected_month=" + month + "&_token={{ csrf_token() }}";
      window.location = URL;
      setTimeout(greet, 1e3);
    };
    return {
      hideDialog,
      localconvergance_dailog,
      employee_reimbursement,
      employee_local_conveyance,
      onclickOpenLocalConverganceDailog,
      reimbursements_dailog,
      reimbursementsScreen,
      localconverganceScreen,
      fetch_data_from_reimbursment,
      data_reimbursements,
      loading_spinner,
      amount_calculation,
      getModeOfTransport,
      getReimbursementClaimTypes,
      saveReimbursementClaimsData,
      onclickSwitchToReimbursmentTab,
      onClaimsDocumentUploaded,
      reimbursement_datas,
      reimbursement_claim_types,
      onclickOpenReimbursmentDailog,
      post_data_for_local_convergance,
      fetch_data_for_local_convergance,
      onclickSwitchToLocalCoverganceTab,
      data_local_convergance,
      disableAmt,
      local_Conveyance_Mode_of_transport,
      amountperKm,
      generate_ajax,
      download_ajax,
      selected_date
    };
  }
);
const _sfc_main$2 = {
  __name: "Reimbursements",
  __ssrInlineRender: true,
  setup(__props) {
    const employee_service = employee_reimbursment_service();
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Button = resolveComponent("Button");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputNumber = resolveComponent("InputNumber");
      const _component_Textarea = resolveComponent("Textarea");
      _push(`<div${ssrRenderAttrs(mergeProps({ id: "table" }, _attrs))}><div><div class="card">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        value: unref(employee_service).reimbursement_datas,
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              exportable: false,
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(ssrRenderComponent(_component_Button, {
                    icon: "pi pi-trash",
                    outlined: "",
                    rounded: "",
                    severity: "danger",
                    onClick: ($event) => _ctx.confirmDeleteProduct(slotProps.data)
                  }, null, _parent3, _scopeId2));
                } else {
                  return [
                    createVNode(_component_Button, {
                      icon: "pi pi-trash",
                      outlined: "",
                      rounded: "",
                      severity: "danger",
                      onClick: ($event) => _ctx.confirmDeleteProduct(slotProps.data)
                    }, null, 8, ["onClick"])
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Claim Type",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.claim_type)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.claim_type), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Claim Amount",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate("₹" + slotProps.data.claim_amount)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString("₹" + slotProps.data.claim_amount), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Eligible Amount",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate("₹" + slotProps.data.eligible_amount)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString("₹" + slotProps.data.eligible_amount), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Remarks",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.reimbursment_remarks)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.reimbursment_remarks), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Status",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.eligible_amount)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.eligible_amount), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Date Of Dispatch",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate("₹" + slotProps.data.eligible_amount)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString("₹" + slotProps.data.eligible_amount), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "",
              header: "Proof Of Delivery",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate("₹" + slotProps.data.eligible_amount)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString("₹" + slotProps.data.eligible_amount), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                exportable: false,
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createVNode(_component_Button, {
                    icon: "pi pi-trash",
                    outlined: "",
                    rounded: "",
                    severity: "danger",
                    onClick: ($event) => _ctx.confirmDeleteProduct(slotProps.data)
                  }, null, 8, ["onClick"])
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                header: "Claim Type",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.claim_type), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Claim Amount",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString("₹" + slotProps.data.claim_amount), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Eligible Amount",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString("₹" + slotProps.data.eligible_amount), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Remarks",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.reimbursment_remarks), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Status",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.eligible_amount), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Date Of Dispatch",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString("₹" + slotProps.data.eligible_amount), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "",
                header: "Proof Of Delivery",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString("₹" + slotProps.data.eligible_amount), 1)
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
        visible: unref(employee_service).reimbursements_dailog,
        "onUpdate:visible": ($event) => unref(employee_service).reimbursements_dailog = $event,
        style: { width: "450px" },
        header: "Reimbursement Details",
        modal: true,
        class: "p-fluid"
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Cancel",
              icon: "pi pi-times",
              style: { "height": "30px", "color": "black" },
              class: "p-button-text",
              onClick: unref(employee_service).hideDialog
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "Save",
              disabled: !unref(employee_service).employee_reimbursement.claim_type == "" && !unref(employee_service).employee_reimbursement.claim_amount == "" ? false : true,
              icon: "pi pi-check",
              style: { "height": "30px", "background": "rgb(255 135 38)", "color": "white" },
              onClick: ($event) => unref(employee_service).saveReimbursementClaimsData()
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Cancel",
                icon: "pi pi-times",
                style: { "height": "30px", "color": "black" },
                class: "p-button-text",
                onClick: unref(employee_service).hideDialog
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Save",
                disabled: !unref(employee_service).employee_reimbursement.claim_type == "" && !unref(employee_service).employee_reimbursement.claim_amount == "" ? false : true,
                icon: "pi pi-check",
                style: { "height": "30px", "background": "rgb(255 135 38)", "color": "white" },
                onClick: ($event) => unref(employee_service).saveReimbursementClaimsData()
              }, null, 8, ["disabled", "onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="field"${_scopeId}><label for="name"${_scopeId}>Claim Type</label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: unref(employee_service).employee_reimbursement.claim_type,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.claim_type = $event,
              options: unref(employee_service).reimbursement_claim_types,
              optionLabel: "label",
              optionValue: "value",
              placeholder: "Select Claim Type"
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="grid formgrid"${_scopeId}><div class="field col"${_scopeId}><label for="Claim Amount"${_scopeId}>Claim Amount</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              modelValue: unref(employee_service).employee_reimbursement.claim_amount,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.claim_amount = $event,
              mode: "currency",
              currency: "INR",
              locale: "en-IN",
              integeronly: ""
            }, null, _parent2, _scopeId));
            _push2(`</div><div class="field col"${_scopeId}><label for="Eligible Amount"${_scopeId}>Eligible Amount</label>`);
            _push2(ssrRenderComponent(_component_InputNumber, {
              modelValue: unref(employee_service).employee_reimbursement.eligible_amount,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.eligible_amount = $event,
              mode: "currency",
              currency: "INR",
              locale: "en-IN",
              integeronly: ""
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="field"${_scopeId}><label class="mb-3"${_scopeId}>Remarks</label><div class="formgrid"${_scopeId}>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              modelValue: unref(employee_service).employee_reimbursement.reimbursment_remarks,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.reimbursment_remarks = $event,
              autoResize: "",
              rows: "2",
              cols: "30"
            }, null, _parent2, _scopeId));
            _push2(`</div></div><div class="field"${_scopeId}><label class="mb-3"${_scopeId}>File Upload</label><div class="formgrid"${_scopeId}><input type="file" id="upload" hidden${_scopeId}><label id="file_upload" for="upload"${_scopeId}>Choose file</label></div></div>`);
          } else {
            return [
              createVNode("div", { class: "field" }, [
                createVNode("label", { for: "name" }, "Claim Type"),
                createVNode(_component_Dropdown, {
                  modelValue: unref(employee_service).employee_reimbursement.claim_type,
                  "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.claim_type = $event,
                  options: unref(employee_service).reimbursement_claim_types,
                  optionLabel: "label",
                  optionValue: "value",
                  placeholder: "Select Claim Type"
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options"])
              ]),
              createVNode("div", { class: "grid formgrid" }, [
                createVNode("div", { class: "field col" }, [
                  createVNode("label", { for: "Claim Amount" }, "Claim Amount"),
                  createVNode(_component_InputNumber, {
                    modelValue: unref(employee_service).employee_reimbursement.claim_amount,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.claim_amount = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-IN",
                    integeronly: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ]),
                createVNode("div", { class: "field col" }, [
                  createVNode("label", { for: "Eligible Amount" }, "Eligible Amount"),
                  createVNode(_component_InputNumber, {
                    modelValue: unref(employee_service).employee_reimbursement.eligible_amount,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.eligible_amount = $event,
                    mode: "currency",
                    currency: "INR",
                    locale: "en-IN",
                    integeronly: ""
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ]),
              createVNode("div", { class: "field" }, [
                createVNode("label", { class: "mb-3" }, "Remarks"),
                createVNode("div", { class: "formgrid" }, [
                  createVNode(_component_Textarea, {
                    modelValue: unref(employee_service).employee_reimbursement.reimbursment_remarks,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_reimbursement.reimbursment_remarks = $event,
                    autoResize: "",
                    rows: "2",
                    cols: "30"
                  }, null, 8, ["modelValue", "onUpdate:modelValue"])
                ])
              ]),
              createVNode("div", { class: "field" }, [
                createVNode("label", { class: "mb-3" }, "File Upload"),
                createVNode("div", { class: "formgrid" }, [
                  createVNode("input", {
                    onChange: ($event) => unref(employee_service).onClaimsDocumentUploaded($event),
                    ref: "employee_service.employee_reimbursement_attachment",
                    type: "file",
                    id: "upload",
                    hidden: ""
                  }, null, 40, ["onChange"]),
                  createVNode("label", {
                    id: "file_upload",
                    for: "upload"
                  }, "Choose file")
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
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reimbursements/reimbursements/Reimbursements.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "LocalConveyance",
  __ssrInlineRender: true,
  setup(__props) {
    const employee_service = employee_reimbursment_service();
    const rules = computed(() => {
      return {
        travelled_date: { required: helpers.withMessage("Travelled date is required", required) },
        mode_of_transport: { required: helpers.withMessage("Mode of transport is required", required) },
        travel_from: {
          required: helpers.withMessage(" from is required", required),
          minLength: minLength(2)
        },
        travel_to: {
          required: helpers.withMessage(" to is required", required),
          minLength: minLength(2)
        },
        total_distance_travelled: { required: helpers.withMessage("Total travelled distance is required", required) },
        Amt_km: {},
        local_convenyance_total_amount: { required },
        local_conveyance_remarks: { required: helpers.withMessage("Remarks is required", required) }
      };
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
    const v$ = useValidate(rules, employee_service.employee_local_conveyance);
    const submitForm = () => {
      console.log(v$.value);
      v$.value.$validate();
      if (!v$.value.$error) {
        console.log("Form successfully submitted.");
        employee_service.post_data_for_local_convergance();
        v$.value.$reset();
      } else {
        console.log("Form failed validation");
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_DataTable = resolveComponent("DataTable");
      const _component_Column = resolveComponent("Column");
      const _component_Dialog = resolveComponent("Dialog");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_Dropdown = resolveComponent("Dropdown");
      const _component_InputText = resolveComponent("InputText");
      const _component_Textarea = resolveComponent("Textarea");
      const _component_Button = resolveComponent("Button");
      _push(`<!--[--><div class="card">`);
      _push(ssrRenderComponent(_component_DataTable, {
        ref: "dt",
        value: unref(employee_service).data_local_convergance,
        dataKey: "id",
        paginator: true,
        rows: 10,
        paginatorTemplate: "FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown",
        rowsPerPageOptions: [5, 10, 25],
        currentPageReportTemplate: "Showing {first} to {last} of {totalRecords} Records",
        responsiveLayout: "scroll"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Column, {
              field: "date",
              header: "Date",
              style: { "min-width": "8rem" },
              dataType: "date",
              sortable: ""
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(unref(moment$1)(slotProps.data.date).format("DD-MMM-YYYY"))}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(unref(moment$1)(slotProps.data.date).format("DD-MMM-YYYY")), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              header: "Mode Of Transport",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.vehicle_type)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.vehicle_type), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "from",
              header: "From ",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.from)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.from), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "to",
              header: "To",
              style: { "min-width": "8rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.to)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.to), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "distance_travelled",
              header: "Total Distance",
              style: { "min-width": "4rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.distance_travelled)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.distance_travelled), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "Amt_km",
              header: "Amt/Km",
              style: { "min-width": "4rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.cost_per_km)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.cost_per_km), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "total_expenses",
              header: "Amount",
              style: { "min-width": "6rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.total_expenses)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.total_expenses), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "user_comments",
              header: "Remarks",
              style: { "min-width": "12rem" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.user_comments)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.user_comments), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Column, {
              field: "user_comments",
              header: "Entry Mode",
              style: { "min-width": "12rem text-transform: capitalize" }
            }, {
              body: withCtx((slotProps, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`${ssrInterpolate(slotProps.data.entry_mode)}`);
                } else {
                  return [
                    createTextVNode(toDisplayString(slotProps.data.entry_mode), 1)
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Column, {
                field: "date",
                header: "Date",
                style: { "min-width": "8rem" },
                dataType: "date",
                sortable: ""
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(unref(moment$1)(slotProps.data.date).format("DD-MMM-YYYY")), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                header: "Mode Of Transport",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.vehicle_type), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "from",
                header: "From ",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.from), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "to",
                header: "To",
                style: { "min-width": "8rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.to), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "distance_travelled",
                header: "Total Distance",
                style: { "min-width": "4rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.distance_travelled), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "Amt_km",
                header: "Amt/Km",
                style: { "min-width": "4rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.cost_per_km), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "total_expenses",
                header: "Amount",
                style: { "min-width": "6rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.total_expenses), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "user_comments",
                header: "Remarks",
                style: { "min-width": "12rem" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.user_comments), 1)
                ]),
                _: 1
              }),
              createVNode(_component_Column, {
                field: "user_comments",
                header: "Entry Mode",
                style: { "min-width": "12rem text-transform: capitalize" }
              }, {
                body: withCtx((slotProps) => [
                  createTextVNode(toDisplayString(slotProps.data.entry_mode), 1)
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
        visible: unref(employee_service).localconvergance_dailog,
        "onUpdate:visible": ($event) => unref(employee_service).localconvergance_dailog = $event,
        style: { width: "450px" },
        header: "Local Conveyance",
        modal: true,
        class: "p-fluid"
      }, {
        footer: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_Button, {
              label: "Cancel",
              icon: "pi pi-times",
              style: { "height": "30px", "color": "black" },
              class: "p-button-text",
              onClick: unref(employee_service).hideDialog
            }, null, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_Button, {
              label: "Save",
              icon: "pi pi-check",
              style: { "height": "30px", "background": "rgb(255 135 38)", "color": "white" },
              onClick: ($event) => submitForm()
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_Button, {
                label: "Cancel",
                icon: "pi pi-times",
                style: { "height": "30px", "color": "black" },
                class: "p-button-text",
                onClick: unref(employee_service).hideDialog
              }, null, 8, ["onClick"]),
              createVNode(_component_Button, {
                label: "Save",
                icon: "pi pi-check",
                style: { "height": "30px", "background": "rgb(255 135 38)", "color": "white" },
                onClick: ($event) => submitForm()
              }, null, 8, ["onClick"])
            ];
          }
        }),
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="field"${_scopeId}><label for="name"${_scopeId}>Date <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Calendar, {
              inputId: "dateformat",
              modelValue: unref(employee_service).employee_local_conveyance.travelled_date,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.travelled_date = $event,
              maxDate: new Date(),
              dateFormat: "dd/mm/yy",
              class: [
                unref(v$).travelled_date.$error ? "p-invalid" : ""
              ]
            }, null, _parent2, _scopeId));
            if (unref(v$).travelled_date.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).travelled_date.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="field col"${_scopeId}><label for="Claim Amount"${_scopeId}>Mode of transport <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_Dropdown, {
              modelValue: unref(employee_service).employee_local_conveyance.mode_of_transport,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.mode_of_transport = $event,
              options: unref(employee_service).local_Conveyance_Mode_of_transport,
              optionLabel: "label",
              optionValue: "value",
              placeholder: "Select Mode Of Transport",
              class: ["w-full", [
                unref(v$).mode_of_transport.$error ? "p-invalid" : ""
              ]],
              onChange: ($event) => unref(employee_service).amountperKm(unref(employee_service).employee_local_conveyance.mode_of_transport)
            }, null, _parent2, _scopeId));
            if (unref(v$).mode_of_transport.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).mode_of_transport.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="flex formgrid"${_scopeId}><div class="field col"${_scopeId}><label for="Eligible Amount"${_scopeId}>From <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              onKeypress: ($event) => isLetter($event),
              modelValue: unref(employee_service).employee_local_conveyance.travel_from,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.travel_from = $event,
              class: [
                unref(v$).travel_from.$error ? "p-invalid" : ""
              ]
            }, null, _parent2, _scopeId));
            if (unref(v$).travel_from.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).travel_from.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="field col"${_scopeId}><label for="Claim Amount"${_scopeId}>To <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              onKeypress: ($event) => isLetter($event),
              modelValue: unref(employee_service).employee_local_conveyance.travel_to,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.travel_to = $event,
              class: [
                unref(v$).travel_to.$error ? "p-invalid" : ""
              ]
            }, null, _parent2, _scopeId));
            if (unref(v$).travel_to.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).travel_to.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div><div class="flex formgrid"${_scopeId}><div class="field col"${_scopeId}><label for="Eligible Amount"${_scopeId}>Total Distance <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              modelValue: unref(employee_service).employee_local_conveyance.total_distance_travelled,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.total_distance_travelled = $event,
              onKeypress: ($event) => isNumber($event),
              onInput: ($event) => unref(employee_service).amount_calculation(),
              class: [
                unref(v$).total_distance_travelled.$error ? "p-invalid" : ""
              ]
            }, null, _parent2, _scopeId));
            if (unref(v$).total_distance_travelled.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).total_distance_travelled.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
            if (unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport") {
              _push2(`<div class="field col"${_scopeId}><label for="Eligible Amount"${_scopeId}>Actual Amount <span class="text-danger"${_scopeId}>*</span></label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                readonly: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? false : true,
                modelValue: unref(employee_service).employee_local_conveyance.local_convenyance_total_amount,
                "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.local_convenyance_total_amount = $event
              }, null, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              _push2(`<div class="field col"${_scopeId}><label for="Eligible Amount"${_scopeId}>Amt/Km <span class="text-danger"${_scopeId}>*</span></label>`);
              _push2(ssrRenderComponent(_component_InputText, {
                readonly: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? false : true,
                modelValue: unref(employee_service).employee_local_conveyance.Amt_km,
                "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.Amt_km = $event,
                class: [
                  unref(v$).Amt_km.$error ? "p-invalid" : ""
                ]
              }, null, _parent2, _scopeId));
              if (unref(v$).Amt_km.$error) {
                _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).Amt_km.$errors[0].$message)}</span>`);
              } else {
                _push2(`<!---->`);
              }
              _push2(`</div>`);
            }
            _push2(`</div><div class="field col"${ssrIncludeBooleanAttr(
              unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? true : false
            ) ? " hidden" : ""}${_scopeId}><label for="Eligible Amount"${_scopeId}>Amount <span class="text-danger"${_scopeId}>*</span></label>`);
            _push2(ssrRenderComponent(_component_InputText, {
              onInput: unref(employee_service).amountperKm,
              modelValue: unref(employee_service).employee_local_conveyance.local_convenyance_total_amount,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.local_convenyance_total_amount = $event,
              class: [
                unref(v$).local_convenyance_total_amount.$error ? "p-invalid" : ""
              ],
              readonly: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? false : true
            }, null, _parent2, _scopeId));
            if (unref(v$).local_convenyance_total_amount.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).local_convenyance_total_amount.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div><div class="field col"${_scopeId}><label for="Eligible Amount"${_scopeId}>Remarks</label>`);
            _push2(ssrRenderComponent(_component_Textarea, {
              modelValue: unref(employee_service).employee_local_conveyance.local_conveyance_remarks,
              "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.local_conveyance_remarks = $event,
              autoResize: "",
              rows: "2",
              cols: "30",
              class: [
                unref(v$).local_conveyance_remarks.$error ? "p-invalid" : ""
              ]
            }, null, _parent2, _scopeId));
            if (unref(v$).local_conveyance_remarks.$error) {
              _push2(`<span class="font-semibold text-red-400 fs-6"${_scopeId}>${ssrInterpolate(unref(v$).local_conveyance_remarks.$errors[0].$message)}</span>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div>`);
          } else {
            return [
              createVNode("div", { class: "field" }, [
                createVNode("label", { for: "name" }, [
                  createTextVNode("Date "),
                  createVNode("span", { class: "text-danger" }, "*")
                ]),
                createVNode(_component_Calendar, {
                  inputId: "dateformat",
                  modelValue: unref(employee_service).employee_local_conveyance.travelled_date,
                  "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.travelled_date = $event,
                  maxDate: new Date(),
                  dateFormat: "dd/mm/yy",
                  class: [
                    unref(v$).travelled_date.$error ? "p-invalid" : ""
                  ]
                }, null, 8, ["modelValue", "onUpdate:modelValue", "maxDate", "class"]),
                unref(v$).travelled_date.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).travelled_date.$errors[0].$message), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "field col" }, [
                createVNode("label", { for: "Claim Amount" }, [
                  createTextVNode("Mode of transport "),
                  createVNode("span", { class: "text-danger" }, "*")
                ]),
                createVNode(_component_Dropdown, {
                  modelValue: unref(employee_service).employee_local_conveyance.mode_of_transport,
                  "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.mode_of_transport = $event,
                  options: unref(employee_service).local_Conveyance_Mode_of_transport,
                  optionLabel: "label",
                  optionValue: "value",
                  placeholder: "Select Mode Of Transport",
                  class: ["w-full", [
                    unref(v$).mode_of_transport.$error ? "p-invalid" : ""
                  ]],
                  onChange: ($event) => unref(employee_service).amountperKm(unref(employee_service).employee_local_conveyance.mode_of_transport)
                }, null, 8, ["modelValue", "onUpdate:modelValue", "options", "onChange", "class"]),
                unref(v$).mode_of_transport.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).mode_of_transport.$errors[0].$message), 1)) : createCommentVNode("", true)
              ]),
              createVNode("div", { class: "flex formgrid" }, [
                createVNode("div", { class: "field col" }, [
                  createVNode("label", { for: "Eligible Amount" }, [
                    createTextVNode("From "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    onKeypress: ($event) => isLetter($event),
                    modelValue: unref(employee_service).employee_local_conveyance.travel_from,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.travel_from = $event,
                    class: [
                      unref(v$).travel_from.$error ? "p-invalid" : ""
                    ]
                  }, null, 8, ["onKeypress", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).travel_from.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).travel_from.$errors[0].$message), 1)) : createCommentVNode("", true)
                ]),
                createVNode("div", { class: "field col" }, [
                  createVNode("label", { for: "Claim Amount" }, [
                    createTextVNode("To "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    onKeypress: ($event) => isLetter($event),
                    modelValue: unref(employee_service).employee_local_conveyance.travel_to,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.travel_to = $event,
                    class: [
                      unref(v$).travel_to.$error ? "p-invalid" : ""
                    ]
                  }, null, 8, ["onKeypress", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).travel_to.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).travel_to.$errors[0].$message), 1)) : createCommentVNode("", true)
                ])
              ]),
              createVNode("div", { class: "flex formgrid" }, [
                createVNode("div", { class: "field col" }, [
                  createVNode("label", { for: "Eligible Amount" }, [
                    createTextVNode("Total Distance "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    modelValue: unref(employee_service).employee_local_conveyance.total_distance_travelled,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.total_distance_travelled = $event,
                    onKeypress: ($event) => isNumber($event),
                    onInput: ($event) => unref(employee_service).amount_calculation(),
                    class: [
                      unref(v$).total_distance_travelled.$error ? "p-invalid" : ""
                    ]
                  }, null, 8, ["modelValue", "onUpdate:modelValue", "onKeypress", "onInput", "class"]),
                  unref(v$).total_distance_travelled.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).total_distance_travelled.$errors[0].$message), 1)) : createCommentVNode("", true)
                ]),
                unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? (openBlock(), createBlock("div", {
                  key: 0,
                  class: "field col"
                }, [
                  createVNode("label", { for: "Eligible Amount" }, [
                    createTextVNode("Actual Amount "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    readonly: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? false : true,
                    modelValue: unref(employee_service).employee_local_conveyance.local_convenyance_total_amount,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.local_convenyance_total_amount = $event
                  }, null, 8, ["readonly", "modelValue", "onUpdate:modelValue"])
                ])) : (openBlock(), createBlock("div", {
                  key: 1,
                  class: "field col"
                }, [
                  createVNode("label", { for: "Eligible Amount" }, [
                    createTextVNode("Amt/Km "),
                    createVNode("span", { class: "text-danger" }, "*")
                  ]),
                  createVNode(_component_InputText, {
                    readonly: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? false : true,
                    modelValue: unref(employee_service).employee_local_conveyance.Amt_km,
                    "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.Amt_km = $event,
                    class: [
                      unref(v$).Amt_km.$error ? "p-invalid" : ""
                    ]
                  }, null, 8, ["readonly", "modelValue", "onUpdate:modelValue", "class"]),
                  unref(v$).Amt_km.$error ? (openBlock(), createBlock("span", {
                    key: 0,
                    class: "font-semibold text-red-400 fs-6"
                  }, toDisplayString(unref(v$).Amt_km.$errors[0].$message), 1)) : createCommentVNode("", true)
                ]))
              ]),
              createVNode("div", {
                class: "field col",
                hidden: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? true : false
              }, [
                createVNode("label", { for: "Eligible Amount" }, [
                  createTextVNode("Amount "),
                  createVNode("span", { class: "text-danger" }, "*")
                ]),
                createVNode(_component_InputText, {
                  onInput: unref(employee_service).amountperKm,
                  modelValue: unref(employee_service).employee_local_conveyance.local_convenyance_total_amount,
                  "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.local_convenyance_total_amount = $event,
                  class: [
                    unref(v$).local_convenyance_total_amount.$error ? "p-invalid" : ""
                  ],
                  readonly: unref(employee_service).employee_local_conveyance.mode_of_transport == "Public Transport" ? false : true
                }, null, 8, ["onInput", "modelValue", "onUpdate:modelValue", "class", "readonly"]),
                unref(v$).local_convenyance_total_amount.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).local_convenyance_total_amount.$errors[0].$message), 1)) : createCommentVNode("", true)
              ], 8, ["hidden"]),
              createVNode("div", { class: "field col" }, [
                createVNode("label", { for: "Eligible Amount" }, "Remarks"),
                createVNode(_component_Textarea, {
                  modelValue: unref(employee_service).employee_local_conveyance.local_conveyance_remarks,
                  "onUpdate:modelValue": ($event) => unref(employee_service).employee_local_conveyance.local_conveyance_remarks = $event,
                  autoResize: "",
                  rows: "2",
                  cols: "30",
                  class: [
                    unref(v$).local_conveyance_remarks.$error ? "p-invalid" : ""
                  ]
                }, null, 8, ["modelValue", "onUpdate:modelValue", "class"]),
                unref(v$).local_conveyance_remarks.$error ? (openBlock(), createBlock("span", {
                  key: 0,
                  class: "font-semibold text-red-400 fs-6"
                }, toDisplayString(unref(v$).local_conveyance_remarks.$errors[0].$message), 1)) : createCommentVNode("", true)
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
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reimbursements/localConveyance/LocalConveyance.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "EmployeeReimbursements",
  __ssrInlineRender: true,
  setup(__props) {
    const employee_service = employee_reimbursment_service();
    onMounted(async () => {
      employee_service.selected_date = new Date();
      await employee_service.generate_ajax();
      await employee_service.getModeOfTransport();
      await employee_service.getReimbursementClaimTypes();
    });
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Toast = resolveComponent("Toast");
      const _component_Calendar = resolveComponent("Calendar");
      const _component_OverlayPanel = resolveComponent("OverlayPanel");
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_component_Toast, null, null, _parent));
      if (unref(employee_service).loading_spinner) {
        _push(ssrRenderComponent(LoadingSpinner, { class: "absolute z-50 bg-white" }, null, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="reimbursement-wrapper"><div class="mb-2 card left-line"><div class="pt-1 pb-1 card-body"><div class="grid grid-cols-12"><div class="col-span-5"><ul class="nav nav-pills nav-tabs-dashed" role="tablist"><li class="nav-item text-muted" role="presentation"><a class="nav-link active" data-bs-toggle="tab" href="#reimbursement" aria-selected="true" role="tab"> Reimbursement </a></li><li class="nav-item text-muted" role="presentation"><a class="nav-link" data-bs-toggle="tab" href="#localConveyance" aria-selected="true" role="tab"> Local Conveyance </a></li></ul></div><div class="col-span-7"><div class="row"><div class="col-5 d-flex justify-content-center"><label for="" class="my-auto font-semibold fs-6 whitespace-nowrap" style="${ssrRenderStyle({ "width": "100px" })}">Select Month</label>`);
      _push(ssrRenderComponent(_component_Calendar, {
        modelValue: unref(employee_service).selected_date,
        "onUpdate:modelValue": ($event) => unref(employee_service).selected_date = $event,
        view: "month",
        dateFormat: "mm/yy",
        class: "mx-4",
        style: { "border-radius": "7px", "height": "35px" }
      }, null, _parent));
      _push(`</div><div class="col-2 d-flex justify-content-end"><button label="Submit" class="my-auto btn btn-primary z-0 whitespace-nowrap" severity="danger" style="${ssrRenderStyle({ "height": "33px" })}"${ssrIncludeBooleanAttr(!unref(employee_service).selected_date == "" ? false : true) ? " disabled" : ""}><i class="fa fa-cog me-2"></i> Generate</button></div><div class="col-2 d-flex justify-content-end mx-3"><button class="my-auto btn btn-primary z-0 whitespace-nowrap"${ssrIncludeBooleanAttr(unref(employee_service).data_local_convergance == "" ? true : false) ? " disabled" : ""} severity="success" style="${ssrRenderStyle({ "height": "33px" })}"><i class="fas fa-file-download me-2"></i>Download</button></div><div class="col-2 d-flex justify-content-end align-content-center mx-3">`);
      if (unref(employee_service).localconverganceScreen) {
        _push(`<button class="my-auto btn btn-orange whitespace-nowrap" style="${ssrRenderStyle({ "height": "33px", "width": "130px" })}"><i class="fa fa-plus-circle me-1"></i>Add Claim </button>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(employee_service).reimbursementsScreen) {
        _push(`<button class="my-auto btn btn-orange whitespace-nowrap" style="${ssrRenderStyle({ "height": "33px", "width": "130px" })}"><i class="fa fa-plus-circle me-1"></i>Add Claim </button>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div></div>`);
      _push(ssrRenderComponent(_component_OverlayPanel, { ref: "op" }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="py-1"${_scopeId}><a class="block px-4 py-2 text-sm font-semibold text-gray-700 cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0"${_scopeId}>Excel</a><a class="block px-4 py-2 text-sm font-semibold text-gray-700 cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1"${_scopeId}>Pdf</a></div>`);
          } else {
            return [
              createVNode("div", { class: "py-1" }, [
                createVNode("a", {
                  class: "block px-4 py-2 text-sm font-semibold text-gray-700 cursor-pointer hover:bg-gray-100",
                  role: "menuitem",
                  tabindex: "-1",
                  onClick: unref(employee_service).download_ajax,
                  id: "menu-item-0"
                }, "Excel", 8, ["onClick"]),
                createVNode("a", {
                  class: "block px-4 py-2 text-sm font-semibold text-gray-700 cursor-pointer hover:bg-gray-100",
                  role: "menuitem",
                  tabindex: "-1",
                  id: "menu-item-1"
                }, "Pdf")
              ])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div></div></div><div class="tab-content" id="pills-tabContent"><div class="tab-pane show fade active" id="reimbursement" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$2, null, null, _parent));
      _push(`</div><div class="tab-pane fade" id="localConveyance" role="tabpanel" aria-labelledby="pills-profile-tab">`);
      _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
      _push(`</div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/hrms/modules/reimbursements/EmployeeReimbursements.vue");
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
app.component("OverlayPanel", OverlayPanel);
app.component("ConfirmDialog", ConfirmDialog);
app.component("Dropdown", Dropdown);
app.component("InputText", InputText);
app.component("Dialog", Dialog);
app.component("ProgressSpinner", ProgressSpinner);
app.component("Calendar", Calendar);
app.component("Textarea", Textarea);
app.component("Chips", Chips);
app.component("InputNumber", InputNumber);
app.mount("#vjs_employee_reimbursement");
