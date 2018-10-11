<template>
  <div class="home">
    <div v-if="page">
      <h1>{{ page.title.rendered }}</h1>
      <div v-html="page.content.rendered"></div>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
export default {
  name: 'Home',
  data () {
    return {
      page: null
    }
  },
  created () {
    this.getPage().then(() => {
      transitions.in()
    })
  },
  beforeRouteLeave: transitions.out,
  methods: {
    getPage: async function () {
      this.page = await this.$store.getters.getPage('home')
    }
  }
}
</script>

<style scoped lang="less">
</style>
