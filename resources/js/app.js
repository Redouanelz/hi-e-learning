import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

import  { createApp } from 'vue'

import app from './components/app.vue'
import router from './router'
import store from './store';

createApp(app).use(router).use(store).mount('#app')