<template>
  <div class="post-tease">
    <h2><router-link :to="{ name: 'Post', params: { slug: post.slug } }">{{ post.title.rendered }}</router-link></h2>
    <img v-bind:src="image(post, 'large')">
  </div>
</template>

<script>
import { getFeaturedImageFromPost as image } from '@/helpers'
export default {
  name: 'PostTease',
  props: {
    post: {
      type: Object,
      default: function () {
        return {}
      }
    }
  },
  methods: {
    image
  }
}
</script>

<style scoped lang="less">
</style>
