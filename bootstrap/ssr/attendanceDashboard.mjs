/* empty css                        *//* empty css                               *//* empty css                             *//* empty css                           */import { createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import Sidebar from "primevue/sidebar";
import Chart from "primevue/chart";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup";
import Row from "primevue/row";
import Dialog from "primevue/dialog";
import DialogService from "primevue/dialogservice";
import { _ as _sfc_main } from "./assets/attendanceDashboard-ef8ee2a2.mjs";
import "vue/server-renderer";
import "dayjs";
import "axios";
import "./assets/_plugin-vue_export-helper-cc2b3d55.mjs";
import "./assets/LoadingSpinner-13fb7de2.mjs";
const app = createApp(_sfc_main);
const pinia = createPinia();
app.use(PrimeVue, { ripple: true });
app.use(DialogService);
app.use(pinia);
app.component("Sidebar", Sidebar);
app.component("DataTable", DataTable);
app.component("Column", Column);
app.component("ColumnGroup", ColumnGroup);
app.component("Row", Row);
app.component("Chart", Chart);
app.component("Dialog", Dialog);
app.mount("#AttendanceDashboard");
