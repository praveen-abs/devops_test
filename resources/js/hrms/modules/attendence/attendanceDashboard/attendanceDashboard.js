import "primevue/resources/themes/lara-light-blue/theme.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
import '../../../assests/tailwind.css';


import { createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import Sidebar from 'primevue/sidebar';
import Chart from 'primevue/chart';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';                   // optional


import DialogService from 'primevue/dialogservice';


import AttendanceModule from './AttendanceModule.vue'

const app = createApp(AttendanceModule);
const pinia=createPinia()

app.use(PrimeVue, { ripple: true });
app.use(DialogService);
app.use(pinia);



app.component('Sidebar',Sidebar)
app.component('DataTable',DataTable)
app.component('Column',Column)
app.component('ColumnGroup',ColumnGroup)
app.component('Row',Row)
app.component('Chart',Chart)

app.mount("#AttendanceModule");

