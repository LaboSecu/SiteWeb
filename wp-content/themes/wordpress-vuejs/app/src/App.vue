<template>
  <div id="app">
    <header>
      <ul>
        <li><router-link :to="{ name: 'Home' }">Home</router-link></li>
        <li v-for="item in header" :key="item.id">
          <router-link :to="{ path: item.url }">{{ item.title }}</router-link>
        </li>
      </ul>
    </header>
    <router-view/>
    <PageTransitions name="fade" />
  </div>
</template>

<script>
import PageTransitions from '@/components/layout/PageTransitions.vue'
import { menus } from '@/services'
export default {
  name: 'App',
  components: {
    PageTransitions
  },
  data () {
    return {
      transitionContainer: undefined,
      loading: true,
      header: []
    }
  },
  mounted () {
    this.transitionContainer = document.getElementById('transition')
    this.getHeader()
  },
  methods: {
    getHeader: async function () {
      this.header = await menus.get('header')
    }
  }
}
</script>

<style lang="less">
</style>
