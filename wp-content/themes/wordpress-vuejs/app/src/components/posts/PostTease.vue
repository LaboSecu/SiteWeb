<template>
  <div class="post-tease">
    <div class="post-tease-container">
      <div class="post-tease-image" :style="{ backgroundImage: `url(${image(post, 'full')})` }"></div>
      <div class="post-tease-overlay"></div>
      <div class="post-tease-content">
        <h2>{{ post.title.rendered }}</h2>
      </div>
      <router-link :to="{ name: 'Post', params: { slug: post.slug } }" class="post-tease-link"></router-link>
    </div>
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
.post-tease {

  .post-tease-container {
    position: relative;
    height: 0;
    width: 100%;
    padding-top: 100%;

    .post-tease-image {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-size: cover;
      background-position: center center;
    }

    .post-tease-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #000;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;

      @media screen and (max-width: 768px) {
        opacity: 0.3;
      }
    }

    .post-tease-content {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 50px;

      h2 {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 40px;
        color: #fff;
        text-align: center;
        text-rendering: optimizeLegibility;
        filter: blur(2px);
        transition: filter 0.3s ease-in-out;

        @media screen and (max-width: 768px) {
          filter: blur(0px);
        }
      }
    }

    .post-tease-link {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }

    &:hover {

      .post-tease-overlay {
        opacity: 0.3;
      }

      .post-tease-content {

        h2 {
          filter: blur(0px);
        }
      }
    }
  }
}
</style>
