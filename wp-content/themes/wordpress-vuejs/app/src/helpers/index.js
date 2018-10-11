export const createBody = function (body) {
  const keys = Object.keys(body)
  const queryString = keys.reduce((previous, current) => {
    return previous += `&${current}=${body[current]}` // eslint-disable-line
  }, '')
  return queryString.substr(1)
}

export const hash = function (c) {
  const s = JSON.stringify(c)
  let hash = 0
  if (s.length === 0) return hash
  for (let i = 0; i < s.length; i++) {
    const chr = s.charCodeAt(i)
    hash = ((hash << 5) - hash) + chr
    hash |= 0
  }
  return hash
}

export const getFeaturedImageFromPost = function (post, size = 'full') {
  if (post &&
    post._embedded &&
    post._embedded['wp:featuredmedia'] &&
    post._embedded['wp:featuredmedia'][0] &&
    post._embedded['wp:featuredmedia'][0].media_details &&
    post._embedded['wp:featuredmedia'][0].media_details.sizes &&
    post._embedded['wp:featuredmedia'][0].media_details.sizes[size]
  ) {
    return post._embedded['wp:featuredmedia'][0].media_details.sizes[size].source_url
  } else {
    return ''
  }
}

export const promiseTl = function (timeline) {
  return new Promise(function (resolve) {
    timeline.eventCallback('onComplete', function () { resolve(true) })
  })
}

export default {
  createBody,
  hash,
  getFeaturedImageFromPost,
  promiseTl
}
