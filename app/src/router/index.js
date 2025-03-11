import { createRouter, createWebHistory } from 'vue-router';
import MainContent from '../components/MainContent.vue';
import Locations from '../components/Locations.vue';
import Gdp from '../components/Gdp.vue';
import CensusView from '../components/census/CensusView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: MainContent,
  },
  {
    path: '/Gdp',
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
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;