import './bootstrap';

import { createApp } from 'vue'

//Prime Vue
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/saga-blue/theme.css'       //theme
import 'primevue/resources/primevue.min.css'                 //core css
import 'primeicons/primeicons.css'                           //icons
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';     //optional for column grouping
import Row from 'primevue/row';                     //optional for row

import HRMSApp from '@/hrms/HRMSApp.vue'
import Counter from '@/hrms/components/Counter.vue'
import ButtonCounter from '@/hrms/modules/leave_module/ButtonCounter.vue'
import OrgLeaveBalanceTable from '@/hrms/modules/leave_module/OrgLeaveBalanceTable.vue'

const app = createApp({});
app.use(PrimeVue);


//registering the component globally
// app.component('DataTable', DataTable);
// app.component('Column', Column);
// app.component('ColumnGroup', ColumnGroup);
// app.component('Row', Row);

// app.component('OrgLeaveBalanceTable', OrgLeaveBalanceTable);
app.component('Counter', Counter);
app.component('ButtonCounter', ButtonCounter);

// app.component('Localcomp', LocalCompTest);

app.mount('#vue_OrgLeaveBalance');


console.log("Hello from App.js... !!!");


