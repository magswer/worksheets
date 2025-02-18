<template>
	<div>
		<p>You have completed X worksheets.</p>
	</div>
</template>

<script>
export default {
	name: 'StudentDashboard',

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
