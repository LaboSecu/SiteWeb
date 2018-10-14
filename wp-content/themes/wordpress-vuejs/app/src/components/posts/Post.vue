<template>
  <div class="post">
    <div v-if="post">
      <div class="cover">
        <div class="cover-background" :style="{ backgroundImage: `url(${image(post, 'full')})` }"></div>
        <div class="cover-overlay"></div>
        <div class="cover-content uk-container">
          <h1 ref="title" class="hidden">{{ post.title.rendered }}</h1>
        </div>
      </div>
      <div class="uk-container">
        <div class="post-content">
          <div v-html="post.content.rendered"></div>
          <a @click="$router.go(-1)" class="btn">Retour</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
import { getFeaturedImageFromPost as image } from '@/helpers'
export default {
  name: 'Post',
  data () {
    return {
      post: null
    }
  },
  created () {
    this.getPost().then(() => {
      if (!this.post) this.$router.push({ name: 'Home' })
      transitions.in()
      setTimeout(() => {
        this.$refs.title.classList.remove('hidden')
      })
    })
  },
  beforeRouteLeave: transitions.out,
  methods: {
    getPost: async function () {
      this.post = await this.$store.getters.getPost(this.$route.params.slug, {
        embed: true,
        customfields: true
      })
    },
    image
  }
}
</script>

<style scoped lang="less">
.cover {
  position: relative;

  .cover-background {
    z-index: -1;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center center;
  }
  .cover-overlay {
    z-index: -1;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.3);
  }

  .cover-content {
    display: flex;
    flex-direction: row;
    align-items: center;
    height: calc(50vh - 70px);

    h1 {
      max-width: 700px;
      font-family: 'Roboto Condensed', sans-serif;
      font-size: 70px;
      font-weight: 700;
      color: #fff;
      filter: blur(0px);
      transition: filter 0.5s ease-in-out;

      &.hidden {
        filter: blur(5px);
      }
    }
  }
}

.post-content {
  max-width: 700px;
  // margin: 0 auto;
  padding: 75px 0 60px;
  font-weight: 300;

  a:not(.btn) {
    text-decoration: underline;
  }
}
</style>
