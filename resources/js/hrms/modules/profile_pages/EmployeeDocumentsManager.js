import "primeflex/primeflex.css";
import "primevue/resources/themes/lara-light-blue/theme.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
import PrimeVue from "primevue/config";

// Primevue Components
import TabView from 'primevue/tabview';``
import TabPanel from 'primevue/tabpanel';
import FileUpload from 'primevue/fileupload';
import Button from 'primevue/button'

// Primevue Services
import DialogService from 'primevue/dialogservice';

import App from './EmployeeDocumentsManager.vue'

import { createApp } from "vue";

const app = createApp(App);
app.component('TabView', TabView);
app.component('TabPanel', TabPanel);
app.component('FileUpload', FileUpload);
app.component('Button', Button)

app.use(PrimeVue, { ripple: true });
app.use(DialogService)

app.mount("#vjs_employeeDocsManager");


