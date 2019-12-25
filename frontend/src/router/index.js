import Vue from 'vue'
import Router from 'vue-router'
import Alumni from '@/components/Alumni'
import Agenda from '@/components/Agenda'
import Pengurus from '@/components/Pengurus'
import Berita from '@/components/Berita'
import Galeri from '@/components/Galeri'

Vue.use(Router)

export default new Router({
  mode : 'history',
  routes: [
    {
      path: '/',
      name: 'Alumni',
      component: Alumni
    },
    {
      path: '/agenda',
      name: 'Agenda',
      component: Agenda
    },
    {
      path: '/pengurus',
      name: 'Pengurus',
      component: Pengurus
    },
    {
      path: '/berita',
      name: 'Berita',
      component: Berita
    },
    {
      path: '/galeri',
      name: 'Galeri',
      component: Galeri
    }
  ]
})
