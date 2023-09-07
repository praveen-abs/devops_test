/* empty css                   *//* empty css                 *//* empty css               */import { createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
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
import Badge from "primevue/badge";
import BadgeDirective from "primevue/badgedirective";
import Carousel from "primevue/carousel";
import Galleria from "primevue/galleria";
import { _ as _sfc_main } from "./dashboard466812.js";
import "vue/server-renderer";
import "./Service46681.js";
import "axios";
import "./dashboard_service46681.js";
import "autoprefixer";
import "dayjs";
import "./events46681.js";
import "./LeaveApply46681.js";
import "@vuelidate/core";
import "@vuelidate/validators";
import "primevue/usetoast";
import "moment";
import "./LoadingSpinner46681.js";
import "./_plugin-vue_export-helper46681.js";
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
app.directive("badge", BadgeDirective);
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
app.component("Badge", Badge);
app.component("MultiSelect", MultiSelect);
app.component("Carousel", Carousel);
app.component("Galleria", Galleria);
app.mount("#Dashboard");
