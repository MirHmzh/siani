<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<div>
		  <b-card-group columns>
		    <b-card
		      overlay
		      title="Agenda Bukber 2019"
		      text-variant="white"
		      img-src="https://fst.umsida.ac.id/wp-content/uploads/2019/09/thp-1.jpg"
		      img-alt="Image"
		      img-top
		      v-for="galeri in galeris"
		      v-bind:key="galeri.id"
		    >
		    </b-card>
		  </b-card-group>
		</div>
	</b-row>
</template>

<style scoped>

</style>

<script>
	import axios from 'axios'
	import { vueTopprogress } from 'vue-top-progress'

	export default {
		name : 'Galeri',
		components: {
      vueTopprogress
    },
		data(){
			return{
				galeris : [],
			}
		},
		mounted(){
			this.$refs.topProgress.start();
			axios.get('https://jsonplaceholder.typicode.com/users').
			then(result => {
				this.galeris = result.data;
			});
		},
		updated(){
	    setTimeout(() => {
	      this.$refs.topProgress.done();
	    }, 500)
	  }
	}
</script>