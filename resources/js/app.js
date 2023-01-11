import './bootstrap';

import { createApp } from 'vue';
 

import app from './components/app.vue'
import second from './components/second.vue'
import leave from './components/leave.vue'

import 'primevue/resources/primevue.min.css'               
import 'primeicons/primeicons.css'        

createApp(app).mount("#app")
createApp(second).mount("#second")
createApp(leave).mount('#leave')

