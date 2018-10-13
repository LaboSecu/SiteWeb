<template>
  <div class="blog-tease">
    <h2><router-link :to="{ name: 'Blog', params: { slug: blog.slug } }">{{ blog.title.rendered }}</router-link></h2>
    <img v-bind:src="image(blog, 'large')">
  </div>
</template>

<script>
import { getFeaturedImageFromPost as image } from '@/helpers'
export default {
  name: 'BlogTease',
  props: {
    blog: {
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
