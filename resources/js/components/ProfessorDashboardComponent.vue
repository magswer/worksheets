<template>
	<div>
        <div v-if="hasProfessorWorksheets">
            <h3>You have {{totalWorksheets}} worksheets created.</h3>
		</div>
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
        }, 
		totalWorksheets() {
			if (!this.isProfessor) return 0;
				return this.worksheets.filter(ws => ws.created_by === this.user.id).length;
		},
	},
};
</script>
