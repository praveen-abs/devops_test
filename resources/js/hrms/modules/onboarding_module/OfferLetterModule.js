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

import OfferLetterModule from './OfferLetterModule.vue';

const app = createApp(OfferLetterModule);

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

app.mount("#vjs_offerletter_module");

