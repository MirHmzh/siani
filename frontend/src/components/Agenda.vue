<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<FullCalendar defaultView="dayGridMonth" :plugins="calendarPlugins" />
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

	export default{
		name : 'Agenda',
		components: {
		  FullCalendar,
		  vueTopprogress // make the <FullCalendar> tag available
		},
		data() {
		  return {
		    calendarPlugins: [ dayGridPlugin ]
		  }
		},
		mounted(){
			this.$refs.topProgress.start();
		},
		updated(){
	    setTimeout(() => {
	      this.$refs.topProgress.done();
	    }, 500)
	  }
	}
</script>
