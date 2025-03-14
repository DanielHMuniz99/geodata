import { createRouter, createWebHistory } from 'vue-router';
import MainContent from '../components/MainContent.vue';
import Configuration from '../components/configuration/Configuration.vue';
import Locations from '../components/locations/Locations.vue';
import Gdp from '../components/gdp/Gdp.vue';
import CensusView from '../components/census/CensusView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: MainContent,
  },
  {
    path: '/gdp',
    name: 'Gdp',
    component: Gdp,
  },
  {
    path: '/locations',
    name: 'Locations',
    component: Locations,
  },
  {
    path: '/census',
    name: 'Census',
    component: CensusView,
  },
  {
    path: '/configuration',
    name: 'Configuration',
    component: Configuration,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;