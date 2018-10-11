<template>
  <div class="post-list">
    <h1>News</h1>
    <div v-for="post in posts" :key="post.id">
      <img v-bind:src="image(post, 'medium')" alt="">
      <h2><router-link :to="{ name: 'Post', params: { slug: post.slug } }">{{ post.title.rendered }}</router-link></h2>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
import { getFeaturedImageFromPost as image } from '@/helpers'
export default {
  name: 'PostList',
  data () {
    return {
      posts: []
    }
  },
  created () {
    this.getPosts().then(() => {
      transitions.in()
    })
  },
  beforeRouteLeave: transitions.out,
  methods: {
    getPosts: async function () {
      this.posts = await this.$store.getters.getPosts({
        embed: true
      })
    },
    image
  }
}
</script>

<style scoped lang="less">
</style>
