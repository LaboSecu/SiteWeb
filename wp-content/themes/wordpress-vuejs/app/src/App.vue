<template>
  <div id="app">
    <router-view/>
    <PageTransitions name="fade" />
  </div>
</template>

<script>
import PageTransitions from '@/components/layout/PageTransitions.vue'
export default {
  name: 'App',
  components: {
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
</style>
