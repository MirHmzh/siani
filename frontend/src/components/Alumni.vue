<template>
  <b-row>
    <vue-topprogress ref="topProgress" colorShadow="rgba(0,0,0,0)"></vue-topprogress>
    <b-card-group deck>
      <b-col cols=3 v-for="alumni in alumnis" v-bind:key="alumni.id">
         <b-link :to="{path : `alumni/${alumni.id}`}">
           <b-card title="Siti Maemunah" img-src="https://m.media-amazon.com/images/M/MV5BMjUzZTJmZDItODRjYS00ZGRhLTg2NWQtOGE0YjJhNWVlMjNjXkEyXkFqcGdeQXVyMTg4NDI0NDM@._V1_.jpg" img-alt="Image" img-top sub-title="2017 - 2021">
            </b-card>
         </b-link>
      </b-col>
    </b-card-group>
  </b-row>
</template>

<script>
import axios from 'axios'
import { vueTopprogress } from 'vue-top-progress'

export default {
  name: 'Alumni',
  components: {
    vueTopprogress
  },
  data(){
    return{
      alumnis : [],
      transitionName: 'slide-left'
    }
  },
  mounted(){
    this.$refs.topProgress.start();
    axios.get('https://jsonplaceholder.typicode.com/users').
    then(result => {
      this.alumnis = result.data;
    });
  },
  updated(){
    setTimeout(() => {
      this.$refs.topProgress.done();
    }, 500)
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
a {
  text-decoration: none;
}
.card-deck .card{
  margin: 0em 0em 1em 0em;
}
</style>
