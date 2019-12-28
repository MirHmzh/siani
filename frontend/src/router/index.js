import Vue from 'vue'
import Router from 'vue-router'
import Alumni from '@/components/Alumni'
import Agenda from '@/components/Agenda'
import Pengurus from '@/components/Pengurus'
import Berita from '@/components/Berita'
import Galeri from '@/components/Galeri'
import detail_Alumni from '@/components/detail_page/detail_Alumni'
import detail_Berita from '@/components/detail_page/detail_Berita'

Vue.use(Router)

export default new Router({
  mode : 'history',
  routes: [
    {
      path: '/',
      meta : { transitionName : 'slide'},
      name: 'Alumni',
      component: Alumni
    },
    {
      path: '/agenda',
      name: 'Agenda',
      meta : { transitionName : 'slide'},
      component: Agenda
    },
    {
      path: '/pengurus',
      name: 'Pengurus',
      meta : { transitionName : 'slide'},
      component: Pengurus
    },
    {
      path: '/berita',
      name: 'Berita',
      meta : { transitionName : 'slide'},
      component: Berita
    },
    {
      path: '/galeri',
      name: 'Galeri',
      meta : { transitionName : 'slide'},
      component: Galeri
    },
    {
      path: '/alumni/:id',
      name: 'detail_Alumni',
      meta : { transitionName : 'zoom'},
      component: detail_Alumni
    },
    {
      path: '/berita/:id',
      name: 'detail_Berita',
      meta : { transitionName : 'zoom'},
      component: detail_Berita
    },
  ]
})
