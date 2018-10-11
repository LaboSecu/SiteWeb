import pagesService from '@/services/pages'
import postsService from '@/services/posts'
import termsService from '@/services/terms'
import menusService from '@/services/menus'
import customfieldsService from '@/services/customfields'

export const pages = pagesService
export const posts = postsService
export const terms = termsService
export const menus = menusService
export const customfields = customfieldsService

export default {
  pages: pagesService,
  posts: postsService,
  terms: termsService,
  menus: menusService,
  customfields: customfieldsService
}
