<template>
	<b-row>
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
export default{
	name : 'Agenda',
	components: {
	  FullCalendar // make the <FullCalendar> tag available
	},
	data() {
	  return {
	    calendarPlugins: [ dayGridPlugin ]
	  }
	}
}
</script>
