<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<FullCalendar
		defaultView="dayGridMonth"
		:plugins="calendarPlugins"
		:events="events"
		/>
	</b-row>
</template>

<style lang="scss">
	@import '../../node_modules/@fullcalendar/core/main.css';
	@import '../../node_modules/@fullcalendar/daygrid/main.css';
</style>

<script>
	require('@fullcalendar/core/main.css')
	import FullCalendar from '@fullcalendar/vue'
	import dayGridPlugin from '@fullcalendar/daygrid'
	import { vueTopprogress } from 'vue-top-progress'
	import axios from 'axios'

	export default{
		name : 'Agenda',
		components: {
		  FullCalendar,
		  vueTopprogress // make the <FullCalendar> tag available
		},
		data() {
		  return {
		    calendarPlugins: [ dayGridPlugin ],
		    events : [],
		  }
		},
		mounted(){
			this.$refs.topProgress.start();
			axios.get(this.$baseUrl+'api/get_all_agenda').
			then(res => {
				res.data.forEach((data, index) => {
					this.events.push({
						title : data.nama_agenda,
						start : data.tanggal_mulai,
						end : data.tanggal_selesai
					});
				});
			});
		},
		updated(){
	    setTimeout(() => {
	      this.$refs.topProgress.done();
	    }, 500)
	  }
	}
</script>
