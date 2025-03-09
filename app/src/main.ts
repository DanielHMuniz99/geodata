import { createApp } from 'vue';
import App from './App.vue';
import i18n from './i18n';

import './style.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import router from './router';

import '@mdi/font/css/materialdesignicons.css';
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
  components,
  directives
})

const app = createApp(App);
app.use(vuetify);
app.use(router);
app.provide('config', {
  apiUrl: 'http://127.0.0.1:8000'
});
app.use(i18n);
app.mount('#app');
