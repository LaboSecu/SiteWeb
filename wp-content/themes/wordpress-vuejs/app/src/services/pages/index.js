import helpers from '@/helpers'
import { customfields } from '@/services'

const apiBaseUrl = `${window.location.protocol}//${window.location.hostname}/wp-json/wp/v2/pages`

const getConfig = {
  embed: false,
  customfields: false
}
const getAllConfig = {
  embed: false,
  customfields: false,
  body: {}
}

export default {
  async getAll (config = {}) {
    config = Object.assign({}, getAllConfig, config)
    if (config.embed) config.body._embed = true
    const body = helpers.createBody(config.body)
    let response = await fetch(`${apiBaseUrl}?${body}`)
    let data = await response.json()
    return response.ok ? data : []
  },

  async get (id, config = {}) {
    if (parseInt(id)) {
      return this.getById(id, config)
    } else {
      return this.getBySlug(id, config)
    }
  },

  async getById (id, config = {}) {
    config = Object.assign({}, getConfig, config)
    return this.privateGet(`${apiBaseUrl}/${id}${config.embed ? '?_embed' : ''}`, config)
  },

  async getBySlug (slug, config = {}) {
    config = Object.assign({}, getConfig, config)
    return this.privateGet(`${apiBaseUrl}?slug=${slug}${config.embed ? '&_embed' : ''}`, config)
  },

  async privateGet (url, config) {
    let response = await fetch(url)
    let data = await response.json()
    data = Array.isArray(data) ? data[0] : data
    if (response.ok && data) {
      if (config.customfields) {
        let meta = await customfields.get(data.id)
        data.meta = meta
        return data
      } else {
        return data
      }
    } else {
      return null
    }
  }
}
