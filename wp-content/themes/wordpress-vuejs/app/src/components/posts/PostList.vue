<template>
  <div class="post-list">
    <div class="uk-container">
      <h1>News</h1>
      <div class="post-container uk-child-width-1-1@s uk-child-width-1-2@m" uk-grid>
        <PostTease v-for="post in posts" :key="post.id" v-if="post.meta" :post="post" />
      </div>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
import { getFeaturedImageFromPost as image } from '@/helpers'
import PostTease from '@/components/posts/PostTease'
export default {
  name: 'PostList',
  components: {
    PostTease
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
        embed: true
      })
    },
    image
  }
}
</script>

<style scoped lang="less">
</style>
