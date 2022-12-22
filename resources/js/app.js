import './bootstrap';


import { createApp } from 'vue'
import HRMSApp from '@/hrms/HRMSApp.vue'
import Counter from '@/hrms/components/Counter.vue'
import LocalCompTest from '@/hrms/components/LocalCompTest.vue'

const app = createApp({});

//registering the component globally
app.component('Counter', Counter);
// app.component('Localcomp', LocalCompTest);

app.mount('#app');


console.log("Hello from App.js... !!!");


