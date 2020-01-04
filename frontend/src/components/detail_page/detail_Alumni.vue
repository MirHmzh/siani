<template>
	<b-row>
		<vue-topprogress ref="topProgress" colorShadow="rgba(0,0,0,0)"></vue-topprogress>
		<b-card
			:img-src="img_profile"
			img-alt="Card image" img-left
			class="detail-card"
			:title="`Detail Alumni ${nama}`">
	      <span class="pull-right clickable close-icon close-detail-alumni" data-effect="fadeOut">
	      	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M18.36 19.78L12 13.41l-6.36 6.37l-1.42-1.42L10.59 12L4.22 5.64l1.42-1.42L12 10.59l6.36-6.36l1.41 1.41L13.41 12l6.36 6.36z" fill="black"/></svg>
	      </span>
	      <b-card-text>
	        <table>
	        	<tbody>
	        		<tr>
	        			<td>Nama</td>
	        			<td>:</td>
	        			<td>{{ nama }}</td>
	        		</tr>
	        		<tr>
	        			<td>Alamat</td>
	        			<td>:</td>
	        			<td>{{ alamat }}</td>
	        		</tr>
	        		<tr>
	        			<td>Jurusan</td>
	        			<td>:</td>
	        			<td>{{ jurusan }}</td>
	        		</tr>
	        		<tr>
	        			<td>Kelas</td>
	        			<td>:</td>
	        			<td>{{ kelas }}</td>
	        		</tr>
	        		<tr>
	        			<td>Periode Pendidikan</td>
	        			<td>:</td>
	        			<td>{{ periode }}</td>
	        		</tr>
	        	</tbody>
	        </table>
	      </b-card-text>
	    </b-card>
	</b-row>
</template>
<style scoped>
	.detail-card{
		width: 100%;
	}
	.close-detail-alumni{
		position: absolute;
		top: 1em;
		right: 1em;
	}
	.card-img-left{
		width: 15em;
		height: 15em;
		object-fit: cover;
	}
</style>
<script>
	import axios from 'axios'
	import { vueTopprogress } from 'vue-top-progress'

	export default{
		name : 'detail_Alumni',
		components: {
	    vueTopprogress
	  },
	  data(){
	  	return {
	  		nama : '',
	  		alamat : '',
	  		jurusan : '',
	  		kelas : '',
	  		periode : '',
	  		img_profile : '',
	  	}
	  },
		mounted(){
	  	this.$refs.topProgress.start();
	    axios.get(this.$baseUrl+'api/get_alumni/'+this.$route.params.id).
	    then(result => {
	    	this.nama = result.data.nama_alumni;
	    	this.alamat = result.data.alamat_alumni;
	    	this.jurusan = result.data.jurusan_alumni;
	    	this.kelas = result.data.kelas_alumni;
	    	this.periode = result.data.thn_masuk+' - '+result.data.thn_lulus;
	    	this.img_profile = this.$baseUrl+'images/'+result.data.foto;
	    });
		},
		updated(){
			setTimeout(() => {
				this.$refs.topProgress.done();
			}, 500)
		}
	}
</script>
