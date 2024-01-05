
import { createRouter, createWebHistory } from 'vue-router';

import EmployeesIndex from './Pages/Employees/Index.vue';

const routes = [
    {
      path: '/Employees',
      name: 'Employees',
      component: EmployeesIndex,
    }

  ]

  const router = createRouter({
    history: createWebHistory(),
    routes,
  })


export default router
