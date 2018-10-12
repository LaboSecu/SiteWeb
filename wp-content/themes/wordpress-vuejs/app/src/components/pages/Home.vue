<template>
  <div class="home">
    <div v-if="page">
      <div class="cover">

      </div>
      <div class="sessions" v-if="sessions">
        <div v-for="session in sessions" :key="session.id">
          <p class="date">{{ moment(session.meta.date[0]).format('D MMM YYYY') }}</p>
          <p class="time">{{ session.meta.start[0] }} - {{ session.meta.end[0] }}</p>
          <p class="topic">{{ session.meta.topic[0] }}</p>
          <p class="room">{{ session.meta.room[0] }}</p>
        </div>
      </div>
      <div class="news" v-if="news">

      </div>
      <div class="blogs" v-if="blogs">

      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
import transitions from '@/transitions'
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
      this.news = await this.$store.getters.getPosts({
        embed: true,
        customfields: true,
        body: {
          per_page: 3,
          orderby: 'date',
          order: 'desc'
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
