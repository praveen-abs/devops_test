import { createApp } from "vue";
import { createPinia } from "pinia";
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
import DialogService from 'primevue/dialogservice';
import Toast from 'primevue/toast';
import Dialog from 'primevue/dialog';
import Dropdown from 'primevue/dropdown';
import ConfirmationService from 'primevue/confirmationservice';
import ToastService from 'primevue/toastservice';
import ProgressSpinner from 'primevue/progressspinner';
import InputText from 'primevue/inputtext'
import Row from 'primevue/row'
import ColumnGroup from 'primevue/columngroup'
import Calendar from 'primevue/calendar'
import Textarea from 'primevue/textarea';
import OverlayPanel from 'primevue/overlaypanel';


import employeePayslip from './EmployeePayslips.vue'

const app = createApp(employeePayslip);
const pinia=createPinia()

app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.use(pinia)


app.directive('tooltip', Tooltip);
app.directive('badge', BadgeDirective);
app.directive('ripple', Ripple);
app.directive('styleclass', StyleClass);
app.directive('focustrap', FocusTrap);

app.component('Button', Button);
app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('ColumnGroup', ColumnGroup)
app.component('Row', Row)
app.component('Toast', Toast);
app.component('ConfirmDialog',ConfirmDialog);
app.component('Dropdown',Dropdown);
app.component('InputText', InputText);
app.component('Dialog', Dialog);
app.component('ProgressSpinner', ProgressSpinner)
app.component('Calendar', Calendar)
app.component('Textarea', Textarea)
app.component('OverlayPanel' ,OverlayPanel)

app.mount("#vjs_manage_payslips");



