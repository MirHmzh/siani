<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<b-col>
			<b-row class="image-wrapper">
				<img :src="img_konten" alt="">
			</b-row>
			<b-row>
				<br><br>
				{{ konten }}
			</b-row>
		</b-col>
	</b-row>
</template>
<style scoped>
	.image-wrapper{
		text-align: center;
	}
	.image-wrapper img{
		width: 15em;
		margin: auto;
	}
</style>
<script>
	import axios from 'axios'
	import { vueTopprogress } from 'vue-top-progress'

	export default{
		name : 'detail_Berita',
		components: {
	    vueTopprogress,
	  },
		data(){
			return{
				img_konten : '',
				konten : ''
			}
		},
	  mounted(){
	  	this.$refs.topProgress.start({
	  		color : 'red'
	  	});
	  	axios.get(this.$baseUrl+'api/get_berita/'+this.$route.params.id).
	  	then((data) => {
	  		this.img_konten = this.$baseUrl+'images/'+data.data.image;
	  		this.konten = data.data.konten;
	  	});
	  },
	  updated(){
	  	setTimeout(() => {
	  		this.$refs.topProgress.done();
	  	}, 500)
	  }
	}
</script>
