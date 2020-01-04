<template>
	<b-row>
		<vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<TreeChart :json="treeData" />
	</b-row>
</template>

<style scoped>
	.node .person{
		width: 100%;
		overflow: none;
	}
</style>

<script>
	import TreeChart from "vue-tree-chart";
	import { vueTopprogress } from 'vue-top-progress'
	import axios from 'axios';

	export default {
		components: {
	    	TreeChart,
	    	vueTopprogress
		},
		data() {
			return {
				treeData: {
			    name: 'Siti Maemunah Maemunah (Ketua)',
			    image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg",
			    children: [
			      {
			        name: 'Siti Maemunah Maemunah (Wakil 1)',
			        image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg"
			      },
			      {
			        name: 'Siti Maemunah Maemunah (Wakil 1)',
			        image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg",
			        children: [
			          {
			            name: 'Siti Maemunah Maemunah (Sekretaris 1)',
			            image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg"
			          },
			          {
			            name: 'Siti Maemunah Maemunah (Sekretaris 1)',
			            image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg"
			          },
			          {
			            name: 'Siti Maemunah Maemunah (Sekretaris 1)',
			            image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg"
			          }
			        ]
			      },
			      {
			        name: 'Siti Maemunah Maemunah (Wakil 1)',
			        image_url: "https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg"
			      }
			    ]
				}
			}
		},
		mounted(){
			this.$refs.topProgress.start();
			axios.get(this.$baseUrl+'api/get_all_galeri').
			then((data) => {
				let children = [];
			});
		},
		updated(){
	    setTimeout(() => {
	      this.$refs.topProgress.done();
	    }, 500)
	  }
	}
</script>