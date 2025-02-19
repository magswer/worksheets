<template>
	<div id="app">
		<student-dashboard-component v-if="isStudent" />
		<div v-else>
			<professor-worksheets-component />
		</div>
	</div>
</template>

<script>

import StudentDashboardComponent from '../js/components/StudentDashboardComponent.vue';
import ProfessorWorksheetsComponent from './components/ProfessorWorksheetsComponent.vue';


export default {
	name: 'App',
	components: {
		StudentDashboardComponent,
		ProfessorWorksheetsComponent
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