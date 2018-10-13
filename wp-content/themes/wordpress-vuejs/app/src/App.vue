<template>
  <div id="app">
    <Header />
    <router-view/>
    <PageTransitions name="rows" :options="{ color: '#242424', number: 3 }"/>
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
  }
}
</script>

<style lang="less">
@import "../node_modules/uikit/dist/css/uikit.min.css";
body {
  padding-top: 70px;
}
</style>
