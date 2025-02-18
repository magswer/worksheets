<template>
    <div id="app">
      <student-dashboard-component v-if="this.isStudent" />
      <div v-else>
         <professor-dashboard-component/>
         <ProfessorWorkseetsComponent/>
      </div>
    </div>
  </template>
  
  <script>

import ProfessorDashboardComponent from '../js/components/ProfessorDashboardComponent.vue';
import StudentDashboardComponent from '../js/components/StudentDashboardComponent.vue';
import ProfessorWorkseetsComponent from './components/ProfessorWorkseetsComponent.vue';

  
  export default {
    name: 'App',
    components: {
      StudentDashboardComponent,
      ProfessorDashboardComponent,
      ProfessorWorkseetsComponent
    },
    data() {
      return {
        user: window.user || {},
      };
    },
    computed: {
      isProfessor() {
        return this.user.role === 'professor';
      },
      isStudent() {
        return this.user.role === 'student';
      },
    }
  };
  </script>
  