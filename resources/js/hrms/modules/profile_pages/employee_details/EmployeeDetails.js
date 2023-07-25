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
import Toast from 'primevue/toast';
import Dialog from 'primevue/dialog';
import ConfirmPopup from 'primevue/confirmpopup';
import Dropdown  from "primevue/dropdown";
import Calendar from 'primevue/calendar';
import InputText from 'primevue/inputtext';
import ConfirmDialog from 'primevue/confirmdialog';
import ConfirmationService from 'primevue/confirmationservice';
import ProgressSpinner from 'primevue/progressspinner';
import Checkbox from 'primevue/checkbox';


import  {useConfirm}  from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";


// Primevue Services
import DialogService from 'primevue/dialogservice';
import ToastService from 'primevue/toastservice';


import EmployeeDetails from './EmployeeDetails.vue'

import { createApp } from "vue";
import { createPinia } from "pinia";

const app = createApp(EmployeeDetails);
const pinia=createPinia()
app.component('TabView', TabView);
app.component('TabPanel', TabPanel);
app.component('FileUpload', FileUpload);
app.component('Button', Button)
app.component('Toast',Toast )
app.component('Dialog', Dialog);
app.component('ConfirmDialog',ConfirmDialog);
app.component('ConfirmPopup',ConfirmPopup);
app.component('Dropdown', Dropdown)
app.component('Calendar',Calendar);
app.component('InputText',InputText);
app.component('ConfirmDialog',ConfirmDialog);
app.component('ProgressSpinner', ProgressSpinner);
app.component('Checkbox', Checkbox);


app.component('useConfirm',useConfirm);
app.component('useToast',useToast);


app.use(PrimeVue, { ripple: true });
app.use(DialogService)
app.use(ToastService)
app.use(ConfirmationService);
app.use(pinia)


app.mount("#EmployeeDetails");
