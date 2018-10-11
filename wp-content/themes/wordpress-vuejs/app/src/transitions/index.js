import { TimelineMax } from 'gsap'
import { promiseTl } from '@/helpers'

export default class Transitions {
  static in (to, from, next) {
    const className = document.getElementById('page-transitions').className
    let tl = new TimelineMax({ paused: true })
    switch (true) {
      case className.includes('fade'):
        tl.to('#page-transitions', 0.5, { autoAlpha: 0 })
        break
      case className.includes('columns'):
        if (className.includes('top')) tl.set('#page-transitions', { alignItems: 'flex-end' })
        if (className.includes('bottom')) tl.set('#page-transitions', { alignItems: 'flex-start' })
        tl.staggerTo('#page-transitions div', 0.3, { height: '0%' }, 0.1)
        break
      case className.includes('rows'):
        if (className.includes('left')) tl.set('#page-transitions', { alignItems: 'flex-end' })
        if (className.includes('right')) tl.set('#page-transitions', { alignItems: 'flex-start' })
        tl.staggerTo('#page-transitions div', 0.3, { width: '0%' }, 0.1)
        break
    }
    if (next) promiseTl(tl).then(() => { next() })
    tl.play()
  }

  static out (to, from, next) {
    const className = document.getElementById('page-transitions').className
    let tl = new TimelineMax({ paused: true })
    switch (true) {
      case className.includes('fade'):
        tl.to('#page-transitions', 0.5, { autoAlpha: 1 })
        break
      case className.includes('columns'):
        if (className.includes('top')) tl.set('#page-transitions', { alignItems: 'flex-start' })
        if (className.includes('bottom')) tl.set('#page-transitions', { alignItems: 'flex-end' })
        tl.staggerTo('#page-transitions div', 0.3, { height: '100%' }, 0.1)
        break
      case className.includes('rows'):
        if (className.includes('left')) tl.set('#page-transitions', { alignItems: 'flex-start' })
        if (className.includes('right')) tl.set('#page-transitions', { alignItems: 'flex-end' })
        tl.staggerTo('#page-transitions div', 0.3, { width: '100%' }, 0.1)
        break
    }
    if (next) promiseTl(tl).then(() => { next() })
    tl.play()
  }
}
