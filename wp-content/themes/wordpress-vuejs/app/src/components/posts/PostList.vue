<template>
  <div class="posts-list">
    <div class="uk-container">
      <h1 ref="title" class="hidden">Articles</h1>
      <div class="posts-container uk-child-width-1-1@s uk-child-width-1-2@m" uk-grid uk-scrollspy="target: .post-tease; cls: uk-animation-fade; delay: 100">
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
      setTimeout(() => {
        this.$refs.title.classList.remove('hidden')
      }, 300)
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
.posts-list {
  padding: 75px 0 60px;

  h1 {
    margin-bottom: 50px;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 70px;
    font-weight: 700;
    color: #2b2b2b;
    filter: blur(0px);
    transition: filter 0.5s ease-in-out;

    &.hidden {
      filter: blur(5px);
    }
  }
}
</style>
