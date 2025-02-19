<template>
	<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
		<div v-if="hasProfessorWorksheets">
			<h2 class="text-2xl font-semibold mb-4">
				You have {{ professorWorksheetsTotal }} worksheets created
			</h2>
			<ul class="space-y-3">
				<li 
					v-for="worksheet in worksheets" 
					:key="worksheet.id"
					class="flex items-center justify-between p-3 bg-gray-100 rounded-lg shadow-sm"
				>
					<span class="text-lg font-medium">{{ worksheet.title }}</span>
					<div class="space-x-2">
						<button 
							@click="editWorksheet(worksheet)" 
							class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
							Edit
						</button>
						<button 
							@click="deleteWorksheet(worksheet.id)" 
							class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
							Delete
						</button>
					</div>
				</li>
			</ul>
			<button 
				@click="createNewWorksheet"
				class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
				Create New Worksheet
			</button>
		</div>
		<p v-else class="text-gray-600 text-lg">You have no worksheets created yet.</p>
	</div>
</template>


<script>
import axios from 'axios';

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
		hasProfessorWorksheets() {
			return this.isProfessor && this.worksheets.length > 0;
		},
		professorWorksheetsTotal() {
			return this.worksheets.length;
		},
	},
	methods: {
		async fetchWorksheets() {
			try {
				const response = await axios.get('/professor/worksheets');
				this.worksheets = response.data;
			} catch (error) {
				console.error('Error fetching worksheets:', error);
			}
		},
		createNewWorksheet() {
			this.$router.push({ name: 'professor.worksheets.create' });
		},
		async editWorksheet(worksheet) {
			this.$router.push({ name: 'professor.worksheets.edit', params: { worksheetId: worksheet.id } });
		},
		async deleteWorksheet(worksheetId) {
			try {
				await axios.delete(`/professor/worksheets/${worksheetId}`);
				this.worksheets = this.worksheets.filter(ws => ws.id !== worksheetId);
			} catch (error) {
				console.error('Error deleting worksheet:', error);
			}
		},
	},
	mounted() {
		if (this.isProfessor) {
			this.fetchWorksheets();
		}
	},
};
</script>