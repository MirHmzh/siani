<template>
  <b-row>
    <vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
    <b-col cols=6 v-for="berita in beritas" v-bind:key="berita.id">
      <b-link :to="{path : `berita/${ berita.id }`}">
        <div>
          <b-card no-body class="overflow-hidden" style="max-width: 540px;">
            <b-row no-gutters>
              <b-col md="6">
                <b-card-img :src="`${ baseUrl }images/${ berita.image }`" class="rounded-0"></b-card-img>
              </b-col>
              <b-col md="6">
                <b-card-body :title="berita.judul_berita">
                  <b-card-text>
                    {{ berita.konten.substring(200,0) }}
                  </b-card-text>
                </b-card-body>
              </b-col>
            </b-row>
          </b-card>
        </div>
      </b-link>
    </b-col>
  </b-row>
</template>

<style scoped>
  .card{
    margin-bottom: 1em;
  }
  a{
    text-decoration: none;
  }
</style>

<script>
  import axios from 'axios'
  import { vueTopprogress } from 'vue-top-progress'

  export default {
    name : 'Berita',
    data(){
      return{
        beritas : [],
        baseUrl : this.$baseUrl,
      }
    },
    components: {
      vueTopprogress
    },
    mounted(){
      this.$refs.topProgress.start();
      axios.get(this.$baseUrl+'api/get_all_berita').
      then(result => {
        result.data.forEach((data, index) => {
          this.beritas.push({
            id : data.id,
            image : data.image,
            judul_berita : data.judul_berita,
            konten : data.konten
          });
        })
      });
    },
    updated(){
      setTimeout(() => {
        this.$refs.topProgress.done();
      }, 500)
    }
  }
</script>