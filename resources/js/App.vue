<template>
    <div id="app">
      <header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
      </header>
      <!-- Render two components below -->
      <student-dashboard-component v-if="userRole === 'student'" />
      <professor-dashboard-component v-else-if="userRole === 'professor'" />
      <!-- Alternatively, if both should appear, you can include them unconditionally -->
      <!-- <student-dashboard />
      <professor-dashboard /> -->
    </div>
  </template>
  
  <script>

import ProfessorDashboardComponent from '../js/components/ProfessorDashboardComponent.vue';
import StudentDashboardComponent from '../js/components/StudentDashboardComponent.vue';

  
  export default {
    name: 'App',
    components: {
      StudentDashboardComponent,
      ProfessorDashboardComponent,
    },
    data() {
      return {
        // You can pass the user role via a global JS variable or fetch it from an API.
        // For simplicity, we’re hardcoding it here.
        // In a real app, you might have something like: window.Laravel.userRole or use Inertia.js.
        userRole: 'student', // or 'professor'
      };
    },
  };
  </script>
  
  <style scoped>
  /* Add styles as needed */
  </style>