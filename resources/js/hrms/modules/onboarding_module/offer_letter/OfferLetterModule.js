import "primeflex/primeflex.css";
import "primevue/resources/themes/lara-light-blue/theme.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";


import { createApp } from "vue";
import PrimeVue from "primevue/config";
import BadgeDirective from "primevue/badgedirective";
import BlockUI from 'primevue/blockui';
import Button from 'primevue/button';
import ConfirmationService from 'primevue/confirmationservice';
import DialogService from 'primevue/dialogservice'
import FocusTrap from 'primevue/focustrap';
import Ripple from 'primevue/ripple';
import StyleClass from 'primevue/styleclass';
import ToastService from 'primevue/toastservice';
import Tooltip from 'primevue/tooltip';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';     //optional for column grouping
import Row from 'primevue/row';
import InputText from 'primevue/inputtext'
import Dialog from 'primevue/dialog'


import OfferLetterPending from './OfferLetterPending.vue';
import OfferLetterResent from './OfferLetterResent.vue';
import OfferLetterCompleted from './OfferLetterCompleted.vue';
import OfferLetterDelete from './OfferLetterDelete.vue';

const app = createApp(OfferLetterPending);
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);
app.directive('tooltip', Tooltip);
app.directive('badge', BadgeDirective);
app.directive('ripple', Ripple);
app.directive('styleclass', StyleClass);
app.directive('focustrap', FocusTrap);
app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('InputText', InputText)
app.component('Dialog',Dialog)
app.component('Button', Button)
app.mount("#offerletter_pending");

// resent
const  offerResent= createApp(OfferLetterResent);
offerResent.use(PrimeVue, { ripple: true });
offerResent.use(ConfirmationService);
offerResent.use(ToastService);
offerResent.use(DialogService);
offerResent.directive('tooltip', Tooltip);
offerResent.directive('badge', BadgeDirective);
offerResent.directive('ripple', Ripple);
offerResent.directive('styleclass', StyleClass);
offerResent.directive('focustrap', FocusTrap);
offerResent.component('DataTable', DataTable);
offerResent.component('Column', Column);
offerResent.component('InputText', InputText)
offerResent.component('Dialog', Dialog)
offerResent.component('Button', Button)
offerResent.mount("#offerletter_resentTable");



// completed
const  offerComplete= createApp(OfferLetterCompleted);
offerComplete.use(PrimeVue, { ripple: true });
offerComplete.use(ConfirmationService);
offerComplete.use(ToastService);
offerComplete.use(DialogService);
offerComplete.directive('tooltip', Tooltip);
offerComplete.directive('badge', BadgeDirective);
offerComplete.directive('ripple', Ripple);
offerComplete.directive('styleclass', StyleClass);
offerComplete.directive('focustrap', FocusTrap);
offerComplete.component('DataTable', DataTable);
offerComplete.component('Column', Column);
offerComplete.component('InputText', InputText)
offerComplete.component('Dialog', Dialog)
offerComplete.component('Button', Button)

offerComplete.mount("#offerletter_completedTable");

// resent
const  offerDeleted= createApp(OfferLetterDelete);
offerDeleted.use(PrimeVue, { ripple: true });
offerDeleted.use(ConfirmationService);
offerDeleted.use(ToastService);
offerDeleted.use(DialogService);
offerDeleted.directive('tooltip', Tooltip);
offerDeleted.directive('badge', BadgeDirective);
offerDeleted.directive('ripple', Ripple);
offerDeleted.directive('styleclass', StyleClass);
offerDeleted.directive('focustrap', FocusTrap);
offerDeleted.component('DataTable', DataTable);
offerDeleted.component('Column', Column);
offerDeleted.component('InputText', InputText)
offerDeleted.component('Dialog', Dialog)
offerDeleted.component('Button', Button)
offerDeleted.mount("#deleted_offerletter");
