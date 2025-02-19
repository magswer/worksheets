import { createRouter, createWebHistory } from 'vue-router';

import ProfessorDashboard from './components/ProfessorDashboardComponent.vue';
import CreateWorksheet from './components/CreateWorkSheetComponent.vue';
import EditWorksheet from './components/EditWorksheetComponent.vue';
import App from './App.vue';

const routes = [
  { path: '/dashboard', name: 'dashboard', component: App },
  { path: '/professor/worksheets', name: 'professor.worksheets.index', component: ProfessorDashboard },
  { path: '/professor/worksheets/create', name: 'professor.worksheets.create', component: CreateWorksheet },
  { path: '/professor/worksheets/:worksheetId/edit', name: 'professor.worksheets.edit', component: EditWorksheet, props: true },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
