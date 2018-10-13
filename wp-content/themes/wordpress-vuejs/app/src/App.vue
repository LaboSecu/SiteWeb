<template>
  <div id="app">
    <Header />
    <router-view/>
    <PageTransitions name="fade" />
  </div>
</template>

<script>
import Header from '@/components/layout/Header.vue'
import PageTransitions from '@/components/layout/PageTransitions.vue'
require('uikit')
export default {
  name: 'App',
  components: {
    Header,
    PageTransitions
  },
  data () {
    return {
      transitionContainer: undefined,
      loading: true
    }
  },
  mounted () {
    this.transitionContainer = document.getElementById('transition')
  }
}
</script>

<style lang="less">
@import "../node_modules/uikit/dist/css/uikit.min.css";
body {
  padding-top: 70px;
}
</style>
