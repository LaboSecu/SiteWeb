const apiBaseUrl = `${window.location.protocol}//${window.location.hostname}/wp-json/wp/v2/menu/`

export default {
  async get (menu = 'menu') {
    let response = await fetch(`${apiBaseUrl}${menu}`)
    let data = await response.json()
    return response.ok ? data : []
  }
}
