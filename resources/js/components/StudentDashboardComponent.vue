<template>
	<div v-if="hasCompletedWorksheets">
	  <p>You have completed {{ completedWorksheetsCount }} worksheets.</p>
	</div>
	<div v-else>
		<p>You have no worksheets completed</p>
	</div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
	name: 'StudentDashboard',
	data() {
	  return {
		user: window.user || {},
		completedWorksheets: []
	  };
	},
	computed: {
	  isProfessor() {
		return this.user.role === 'professor';
	  },
	  isStudent() {
		return this.user.role === 'student';
	  },
	  hasCompletedWorksheets() {
		return this.completedWorksheets.length > 0;
		},
	  completedWorksheetsCount() {
		return this.completedWorksheets.length;
	  }
	},
	mounted() {
	  if (this.isStudent) {
		this.fetchCompletedWorksheets();
	  }
	},
	methods: {
	  async fetchCompletedWorksheets() {
		try {
		  const response = await axios.get('/student/completed-worksheets');
		  this.completedWorksheets = response.data;
		} catch (error) {
		  console.error('Error fetching completed worksheets:', error);
		}
	  }
	}
  };
  </script>
  