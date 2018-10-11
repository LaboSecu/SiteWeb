<template>
  <div class="post">
    <div v-if="post">
      <img v-bind:src="image(post, 'medium')" alt="">
      <h1>{{ post.title.rendered }}</h1>
      <div v-html="post.content.rendered"></div>
    </div>
  </div>
</template>

<script>
import router from '@/router'
import transitions from '@/transitions'
import { getFeaturedImageFromPost as image } from '@/helpers'
export default {
  name: 'Custom',
  data () {
    return {
      post: null
    }
  },
  created () {
    this.getPost().then(() => {
      if (!this.post) router.push({ name: 'Home' })
      transitions.in()
    })
  },
  beforeRouteLeave: transitions.out,
  methods: {
    getPost: async function () {
      this.post = await this.$store.getters.getPost(this.$route.params.slug, {
        postType: 'customs',
        embed: true
      })
    },
    image
  }
}
</script>

<style scoped lang="less">
</style>
