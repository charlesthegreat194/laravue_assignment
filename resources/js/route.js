// resources/js/router/index.js
import { createRouter, createWebHistory } from 'vue-router';

const index = () => import('./Pages/index.vue');
const contact = () => import('./Pages/contact.vue');

const routes = [
  { path: '/', name: 'Home', component: index },
  { path: '/contact', name: 'Contact', component: contact }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
