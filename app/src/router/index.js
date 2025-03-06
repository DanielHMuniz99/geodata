import { createRouter, createWebHistory } from 'vue-router';
import MainContent from '../components/MainContent.vue';
import Locations from '../components/Locations.vue';
import Census from '../components/Census.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: MainContent,
  },
  {
    path: '/locations',
    name: 'Locations',
    component: Locations,
  },
  {
    path: '/census',
    name: 'Census',
    component: Census,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;