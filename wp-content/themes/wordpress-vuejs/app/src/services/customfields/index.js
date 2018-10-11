const apiBaseUrl = `${window.location.protocol}//${window.location.hostname}/wp-json/wp/v2/customfields/`

export default {
  async get (id, key = '') {
    let response = await fetch(`${apiBaseUrl}${id}/${key}`)
    let data = await response.json()
    return response.ok ? data : []
  }
}
