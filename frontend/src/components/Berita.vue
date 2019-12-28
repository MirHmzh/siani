<template>
  <b-row>
    <vue-topprogress ref="topProgress" height=5 colorShadow="rgba(0,0,0,0)"></vue-topprogress>
    <b-col cols=6 v-for="berita in beritas" v-bind:key="berita.id">
      <b-link :to="{path : `berita/${ berita.id }`}">
        <div>
          <b-card no-body class="overflow-hidden" style="max-width: 540px;">
            <b-row no-gutters>
              <b-col md="6">
                <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-0"></b-card-img>
              </b-col>
              <b-col md="6">
                <b-card-body title="Alumni UMSIDA 2019 Tertangkap Basah">
                  <b-card-text>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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
      }
    },
    components: {
      vueTopprogress
    },
    mounted(){
      this.$refs.topProgress.start();
      axios.get('https://jsonplaceholder.typicode.com/users').
      then(result => {
        this.beritas = result.data;
      });
    },
    updated(){
      setTimeout(() => {
        this.$refs.topProgress.done();
      }, 500)
    }
  }
</script>