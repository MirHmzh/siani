<template>
	<b-row>
		<TreeChart :json="treeData" />
	</b-row>
</template>

<style scoped>
	.node .person{
		width: 100%;
	}
</style>

<script>
	import TreeChart from "vue-tree-chart";
	export default {
		components: {
	    	TreeChart
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
		}
	}
</script>