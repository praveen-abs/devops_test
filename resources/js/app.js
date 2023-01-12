import './bootstrap';

import { createApp } from 'vue';

import app from './components/app.vue';
import primevue from 'primevue/config';
import Dialog from 'primevue/dialog';

app.use(primevue)
app.component('Dailog', Dialog);

import 'primevue/resources/primevue.min.css'               
import 'primeicons/primeicons.css'        

createApp(app).mount("#app")
createApp(second).mount("#second")
createApp(leave).mount('#leave')

