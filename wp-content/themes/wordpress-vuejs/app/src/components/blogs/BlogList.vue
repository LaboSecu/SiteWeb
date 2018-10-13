<template>
  <div class="post-list">
    <div class="uk-container">
      <h1>Blog</h1>
      <div class="post-container uk-child-width-1-1@s uk-child-width-1-2@m" uk-grid>
        <BlogTease v-for="post in posts" :key="post.id" v-if="post.meta" :blog="post" />
      </div>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
import { getFeaturedImageFromPost as image } from '@/helpers'
import BlogTease from '@/components/blogs/BlogTease'
export default {
  name: 'PostList',
  components: {
    BlogTease
  },
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
        postType: 'blog',
        embed: true
      })
    },
    image
  }
}
</script>

<style scoped lang="less">
</style>
