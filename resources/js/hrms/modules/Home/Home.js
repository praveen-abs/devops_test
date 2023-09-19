import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
import "../../assests/tailwind.css";



import { createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import Sidebar from 'primevue/sidebar';
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
import Textarea from 'primevue/textarea'
import Chips from 'primevue/chips'
import MultiSelect from 'primevue/multiselect';
import InputNumber from 'primevue/inputnumber'
import InputMask from 'primevue/inputmask'
import OverlayPanel from 'primevue/overlaypanel';
import Tag from 'primevue/tag'
import Accordion from 'primevue/accordion';
import AccordionTab from 'primevue/accordiontab';
import SelectButton from 'primevue/selectbutton';

import Home from './Home.vue'
import router from './router'

const app = createApp(Home);
const pinia=createPinia()

app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.use(pinia);
app.use(router);


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
app.component('Chips', Chips)
app.component('MultiSelect', MultiSelect)
app.component('InputNumber', InputNumber)
app.component('InputMask', InputMask)
app.component('OverlayPanel',OverlayPanel)
app.component('Tag',Tag)
app.component('Sidebar',Sidebar)
app.component('Accordion',Accordion)
app.component('AccordionTab',AccordionTab)
app.component('SelectButton',SelectButton)

app.mount("#Home");

