<template>
  <div class="home">
    <div v-if="page">
      <div class="cover">
        <div class="cover-background" :style="{ backgroundImage: `url(${image(page, 'full')})` }"></div>
        <div class="cover-content uk-container">
          <h1 ref="coverTitle" class="hidden">Laboratoire sécurité</h1>
          <div class="sessions uk-animation-fade" v-if="sessions">
            <h2>Prochaines séances</h2>
            <ul>
              <li v-for="session in sessions" :key="session.id" v-if="session.meta">
                <p class="topic">{{ session.meta.topic[0] }}</p>
                <p class="date">{{ moment(session.meta.date[0]).format('D MMM YYYY') }}</p>
                <p class="time">{{ moment(session.meta.start[0], 'HH:mm:ss').format('H[h]mm') }} / {{ moment(session.meta.end[0], 'HH:mm:ss').format('H[h]mm') }}</p>
                <p class="room">Salle {{ session.meta.room[0] }}</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="news" v-if="news && news.length > 0">
        <div class="news-container uk-container">
          <div class="news-slider" uk-slider uk-scrollspy="target: .post-tease; cls: uk-animation-fade; delay: 100">
            <div class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-3@m uk-grid">
              <PostTease v-for="n in news" :key="n.id" v-if="n.meta" :post="n" />
            </div>
          </div>
          <div class="news-footer">
            <router-link :to="{ name: 'PostList' }" class="btn">Plus d'articles</router-link>
          </div>
        </div>
      </div>
      <div class="blogs" v-if="blogs && blogs.length > 0">
        <div class="blogs-container uk-container">
          <div class="blogs-slider" uk-slider uk-scrollspy="target: .post-tease; cls: uk-animation-fade; delay: 100">
            <div class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-3@m uk-grid">
              <BlogTease v-for="blog in blogs" :key="blog.id" v-if="blog.meta" :post="blog" />
            </div>
          </div>
          <div class="blogs-footer">
            <router-link :to="{ name: 'BlogList' }" class="btn">Voir le blog</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import transitions from '@/transitions'
import moment from 'moment'
import { getFeaturedImageFromPost as image } from '@/helpers'
import BlogTease from '@/components/blogs/BlogTease'
import PostTease from '@/components/posts/PostTease'
moment.locale('fr')
export default {
  name: 'Home',
  components: {
    BlogTease,
    PostTease
  },
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
        setTimeout(() => {
          this.$refs.coverTitle.classList.remove('hidden')
        }, 300)
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
.cover {
  position: relative;
  width: 100%;
  height: calc(100vh - 70px);

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

  .cover-content {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;

    h1 {
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

    .sessions {
      align-self: flex-end;
      padding: 25px 50px;
      background-color: rgba(0, 0, 0, 0.3);

      h2 {
        margin-bottom: 10px;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 30px;
        color: #f2f2f2;
      }

      ul {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: 0;
        padding: 0;

        li {
          display: inline-block;

          &:not(:last-child) {
            margin-right: 50px;
          }

          p {
            margin: 0;
          }

          .topic {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 20px;
            color: #f2f2f2;
          }

          .date, .time, .room {
            font-weight: 300;
            font-size: 14px;
            color: #ddd;
          }
        }
      }

      @media screen and (max-width: 768px) {
        align-self: stretch;

        ul {
          flex-direction: column;
        }
      }
    }
  }
}

.news, .blogs {
  padding: 75px 0 60px;

  .news-container, .blogs-container {

    .news-slider, .blogs-slider {
      margin-bottom: 35px;
    }

    .news-footer, .blogs-footer {
      text-align: center;
    }
  }
}
.blogs {
  background-color: #f2f2f2;
}
</style>
