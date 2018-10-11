import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/pages/Home'
import Page from '@/components/pages/Page'
import PostList from '@/components/posts/PostList'
import Post from '@/components/posts/Post'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/posts',
      name: 'PostList',
      component: PostList
    },
    {
      path: '/posts/:slug',
      name: 'Post',
      component: Post
    },
    {
      path: '/:slug',
      name: 'Page',
      component: Page
    }
  ]
})
