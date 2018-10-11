import Vue from 'vue'
import Vuex from 'vuex'
import services from '@/services'
import helpers from '@/helpers'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    getPages: [],
    getPage: [],
    getPosts: [],
    getPost: [],
    getTerms: [],
    getTerm: []
  },
  mutations: {

  },
  actions: {

  },
  getters: {
    getPages: (state) => async (...args) => {
      const id = helpers.hash(args)
      if (state.getPages[id]) return state.getPages[id]
      const pages = await services.pages.getAll(...args)
      state.getPages[id] = pages
      return pages
    },
    getPage: (state) => async (...args) => {
      const id = helpers.hash(args)
      if (state.getPage[id]) return state.getPage[id]
      const page = await services.pages.get(...args)
      state.getPage[id] = page
      return page
    },
    getPosts: (state) => async (...args) => {
      const id = helpers.hash(args)
      if (state.getPosts[id]) return state.getPosts[id]
      const posts = await services.posts.getAll(...args)
      state.getPosts[id] = posts
      return posts
    },
    getPost: (state) => async (...args) => {
      const id = helpers.hash(args)
      if (state.getPost[id]) return state.getPost[id]
      const post = await services.posts.get(...args)
      state.getPost[id] = post
      return post
    },
    getTerms: (state) => async (...args) => {
      const id = helpers.hash(args)
      if (state.getTerms[id]) return state.getTerms[id]
      const terms = await services.terms.getAll(...args)
      state.getTerms[id] = terms
      return terms
    },
    getTerm: (state) => async (...args) => {
      const id = helpers.hash(args)
      if (state.getTerm[id]) return state.getTerm[id]
      const term = await services.terms.get(...args)
      state.getTerm[id] = term
      return term
    }
  }
})
