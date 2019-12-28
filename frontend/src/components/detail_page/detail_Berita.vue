<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<h1>Detail Berita</h1>
	</b-row>
</template>
<style scoped>

</style>
<script>
	import axios from 'axios'
	import { vueTopprogress } from 'vue-top-progress'

	export default{
		name : 'detail_Berita',
		components: {
	    vueTopprogress
	  },
	  mounted(){
	  	this.$refs.topProgress.start({
	  		color : 'red'
	  	});
	  },
	  updated(){
	  	setTimeout(() => {
	  		this.$refs.topProgress.done();
	  	}, 500)
	  }
	}
</script>
