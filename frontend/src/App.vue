<template>
  <div id="app" class="container">
    <h1>SIANIDA</h1>
    <b-button-group>
      <b-button to="/">Alumni</b-button>
      <b-button to="/agenda">Agenda</b-button>
      <b-button to="/pengurus">Pengurus</b-button>
      <b-button to="/berita">Berita</b-button>
      <b-button to="/galeri">Galeri</b-button>
    </b-button-group>
    <div class="wrapper">
      <router-view/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /*text-align: center;*/
  color: #2c3e50;
  /*margin-top: 60px;*/
}
.btn-group{
  width: 100%;
}
.wrapper{
  margin: 1em;
}
</style>
