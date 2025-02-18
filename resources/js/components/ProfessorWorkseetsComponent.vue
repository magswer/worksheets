<template>
	<div>
        <div v-if="this.hasProfessorWorksheets">
            <h3>Your worksheets list:</h3>
        </div>
        <p v-else> You have no worksheets created yet. </p>
	</div>
</template>

<script>
export default {
	name: 'ProfessorDashboard',
	data() {
		return {
			user: window.user || {},
			worksheets: [],
		};
	},
	computed: {
		isProfessor() {
			return this.user.role === 'professor';
		},
		isStudent() {
			return this.user.role === 'student';
		},
        hasProfessorWorksheets(){
            return this.isProfessor && this.worksheets.created_by === this.user.id > 0; 
        }
	},
};
</script>