import "primevue/resources/themes/lara-light-blue/theme.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";


import { createApp } from "vue";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import BlockUI from 'primevue/blockui';
import Button from 'primevue/button';
import FocusTrap from 'primevue/focustrap';
import Ripple from 'primevue/ripple';
import StyleClass from 'primevue/styleclass';
import Tooltip from 'primevue/tooltip';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ConfirmDialog from 'primevue/confirmdialog';
import Toast from 'primevue/toast';
import Dialog from 'primevue/dialog'; 
import Dropdown from 'primevue/dropdown';
import ConfirmationService from 'primevue/confirmationservice';
import ToastService from 'primevue/toastservice';
import ProgressSpinner from 'primevue/progressspinner';
import InputText from "primevue/inputtext";
import Calendar from "primevue/calendar";
import OverlayPanel from 'primevue/overlaypanel';
import Sidebar from 'primevue/sidebar';


import { createPinia } from "pinia";

import Holidays_Lists from './Holidays_Lists.vue';

const app = createApp(Holidays_Lists);
const pinia=createPinia()

app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(pinia)

app.directive('tooltip', Tooltip);
app.directive('badge', BadgeDirective);
app.directive('ripple', Ripple);
app.directive('styleclass', StyleClass);
app.directive('focustrap', FocusTrap);

app.component('Button', Button);
app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('ConfirmDialog',ConfirmDialog);
app.component('Toast',Toast);
app.component('Dialog',Dialog);
app.component('Dropdown',Dropdown);
app.component('ProgressSpinner',ProgressSpinner);
app.component('InputText', InputText)
app.component('Calendar', Calendar)
app.component('OverlayPanel' ,OverlayPanel)
app.component('Sidebar' ,Sidebar);

app.mount("#VJS_holiday_list");



