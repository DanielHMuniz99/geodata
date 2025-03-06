import { createApp } from 'vue';
import App from './App.vue';

import './style.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import router from './router';

const app = createApp(App);
app.use(router);
app.provide('config', {
  apiUrl: 'http://127.0.0.1:8000/api'
});
app.mount('#app');
