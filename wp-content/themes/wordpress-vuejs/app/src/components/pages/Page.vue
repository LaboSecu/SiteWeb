<template>
  <div class="home">
    <div v-if="page">
      <h1>{{ page.title.rendered }}</h1>
      <div v-html="page.content.rendered"></div>
    </div>
  </div>
</template>

<script>
import router from '@/router'
import transitions from '@/transitions'
export default {
  name: 'Page',
  data () {
    return {
      page: null
    }
  },
  created () {
    this.getPage().then(() => {
      if (!this.page) router.push({ name: 'Home' })
      transitions.in()
    })
  },
  beforeRouteLeave: transitions.out,
  methods: {
    getPage: async function () {
      this.page = await this.$store.getters.getPage(this.$route.params.slug)
    }
  }
}
</script>

<style scoped lang="less">
</style>
