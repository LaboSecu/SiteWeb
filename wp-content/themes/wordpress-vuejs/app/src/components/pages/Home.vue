<template>
  <div class="home">
    <div v-if="page">
      <div class="cover">

      </div>
      <div class="sessions" v-if="sessions">
        <div class="uk-container">
          <div class="sessions-container">
            <div v-for="session in sessions" :key="session.id" v-if="session.meta">
              <p class="date">{{ moment(session.meta.date[0]).format('D MMM YYYY') }}</p>
              <p class="time">{{ moment(session.meta.start[0], 'HH:mm:ss').format('H[h]mm') }} / {{ moment(session.meta.end[0], 'HH:mm:ss').format('H[h]mm') }}</p>
              <p class="topic">{{ session.meta.topic[0] }}</p>
              <p class="room">{{ session.meta.room[0] }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="blogs" v-if="blogs">
        <div class="uk-container">
          <div class="blogs-container uk-child-width-1-1@s uk-child-width-1-3@m" uk-grid>
            <div v-for="blog in blogs" :key="blog.id" v-if="blog.meta">
              <h2>{{ blog.title.rendered }}</h2>
              <img v-bind:src="image(blog, 'large')">
            </div>
          </div>
          <router-link :to="{ name: 'BlogList' }">Blog</router-link>
        </div>
      </div>
      <div class="news" v-if="news">
        <div class="uk-container">
          <div class="news-container uk-child-width-1-1@s uk-child-width-1-3@m" uk-grid>
            <div v-for="n in news" :key="n.id" v-if="n.meta">
              <h2>{{ n.title.rendered }}</h2>
              <img v-bind:src="image(n, 'large')">
            </div>
          </div>
          <router-link :to="{ name: 'PostList' }">News</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
import moment from 'moment'
import { getFeaturedImageFromPost as image } from '@/helpers'
export default {
  name: 'Home',
  data () {
    return {
      page: null,
      sessions: null,
      news: null,
      blogs: null,
      members: null
    }
  },
  created () {
    this.getPage().then(() => {
      this.getPageData().then(() => {
        transitions.in()
      })
    })
  },
  beforeRouteLeave: transitions.out,
  methods: {
    moment,
    image,
    getPage: async function () {
      this.page = await this.$store.getters.getPage('home', {
        embed: true,
        customfields: true
      })
    },
    getPageData: async function () {
      this.sessions = await this.$store.getters.getPosts({
        postType: 'session',
        embed: true,
        customfields: true,
        body: {
          per_page: 2,
          orderby: 'title',
          order: 'asc'
        }
      })
      this.blogs = await this.$store.getters.getPosts({
        postType: 'blog',
        embed: true,
        customfields: true,
        body: {
          per_page: 3,
          orderby: 'date',
          order: 'desc'
        }
      })
      this.news = await this.$store.getters.getPosts({
        embed: true,
        customfields: true,
        body: {
          per_page: 3,
          orderby: 'date',
          order: 'desc'
        }
      })
      this.members = await this.$store.getters.getPosts({
        postType: 'member',
        embed: true,
        customfields: true
      })
    }
  }
}
</script>

<style scoped lang="less">
</style>
