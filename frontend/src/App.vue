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
      <transition
      :name="transitionName"
      :enter-active-class="transitionEnterActiveClass"
      mode="out-in"
      v-on:before-leave="beforeLeave"
      v-on:enter="enter"
      v-on:after-enter="afterEnter"
      >
        <router-view/>
      </transition>
      <hr>
    </div>
  </div>
</template>

<script>
export default {
  name: 'App',
  data(){
    return{
      prevHeight: 0,
      transitionName: 'out-in',
      transitionEnterActiveClass: '',
    }
  },
  created(){
    this.$router.beforeEach((to, from, next) => {
      let transitionName = to.meta.transitionName || from.meta.transitionName || DEFAULT_TRANSITION;

      if (transitionName === 'slide') {
        const toDepth = to.path.split('/').length;
        const fromDepth = from.path.split('/').length;
        transitionName = toDepth < fromDepth ? 'slide-right' : 'slide-left';
      }

      this.transitionMode = 'out-in';
      this.transitionEnterActiveClass = `${transitionName}-enter-active`;

      if (to.meta.transitionName === 'zoom') {
        this.transitionMode = 'in-out';
        this.transitionEnterActiveClass = 'zoom-enter-active';
        // Disable scrolling in the background.
        document.body.style.overflow = 'hidden';
      }

      if (from.meta.transitionName === 'zoom') {
        this.transitionMode = null;
        this.transitionEnterActiveClass = null;
        // Enable scrolling again.
        document.body.style.overflow = null;
      }

      this.transitionName = transitionName;

      next();
    });
  },
  methods: {
    beforeLeave(element) {
      this.prevHeight = getComputedStyle(element).height;
    },
    enter(element) {
      const { height } = getComputedStyle(element);

      element.style.height = this.prevHeight;

      setTimeout(() => {
        element.style.height = height;
      });
    },
    afterEnter(element) {
      element.style.height = 'auto';
    },
  },
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
  a{
    text-decoration: none;
  }

  .slide-left-enter-active,
  .slide-left-leave-active,
  .slide-right-enter-active,
  .slide-right-leave-active {
    transition-duration: 0.2s;
    transition-property: height, opacity, transform;
    transition-timing-function: cubic-bezier(0.55, 0, 0.1, 1);
    overflow: hidden;
  }

  .slide-left-enter,
  .slide-right-leave-active {
    opacity: 0;
    transform: translate(2em, 0);
  }

  .slide-left-leave-active,
  .slide-right-enter {
    opacity: 0;
    transform: translate(-2em, 0);
  }

  .zoom-enter-active,
  .zoom-leave-active {
    animation-duration: 0.2s;
    animation-fill-mode: both;
    animation-name: zoom;
  }

  .zoom-leave-active {
    animation-direction: reverse;
  }

  @keyframes zoom {
    from {
      opacity: 0;
      transform: scale3d(0.3, 0.3, 0.3);
    }

    100% {
      opacity: 1;
    }
  }
</style>
