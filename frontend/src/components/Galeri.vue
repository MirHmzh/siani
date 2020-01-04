<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<div>
		  <b-card-group columns>
		    <b-card
		      overlay
		      text-variant="white"
		      img-top
		      v-for="galeri in galeris"
		      v-bind:key="galeri.id"
		      :img-src="galeri.path"
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
			axios.get(this.$baseUrl+'api/get_all_galeri').
			then(result => {
				// this.galeris = result.data;
				let temp_galeris = [],
					url = this.$baseUrl;
				result.data.forEach( function(element, index) {
					temp_galeris.push({
						id : element.id,
						path : url+'images/'+element.path_attachment
					});
				});
				this.galeris = temp_galeris;
			});
		},
		updated(){
	    setTimeout(() => {
	      this.$refs.topProgress.done();
	    }, 500)
	  }
	}
</script>