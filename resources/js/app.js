import '../css/app.css'

/* =====================================================================
   Langla landing page — vanilla JS
   Replaces the React hooks (navbar scroll/menu, learning-path tabs,
   FAQ accordion, scroll-reveal) with plain DOM code.
   ===================================================================== */

const REDUCED_MOTION = window.matchMedia('(prefers-reduced-motion: reduce)').matches
// Pointer effects (tilt, parallax, spotlight) only on mouse/trackpad devices.
const FINE_POINTER = window.matchMedia('(hover: hover) and (pointer: fine)').matches

/* ---------- 0. Smooth in-page scrolling + scroll progress ---------- */
// Native smooth scrolling (no JS scroll loop running every frame).
function initSmoothScroll() {
  // In-page links glide to their section (offset by the section's scroll-margin).
  document.addEventListener('click', (e) => {
    const link = e.target.closest('a[href^="#"]')
    if (!link) return
    const hash = link.getAttribute('href')
    if (hash === '#') return
    const target = hash === '#top' ? null : document.querySelector(hash)
    if (hash !== '#top' && !target) return
    e.preventDefault()
    if (target) {
      target.scrollIntoView({ behavior: REDUCED_MOTION ? 'auto' : 'smooth' })
    } else {
      window.scrollTo({ top: 0, behavior: REDUCED_MOTION ? 'auto' : 'smooth' })
    }
  })

  const bar = document.createElement('div')
  bar.className = 'scroll-progress'
  bar.setAttribute('aria-hidden', 'true')
  document.body.prepend(bar)
  let ticking = false
  const update = () => {
    const max = document.documentElement.scrollHeight - window.innerHeight
    bar.style.setProperty('--progress', max > 0 ? (window.scrollY / max).toFixed(4) : 0)
    ticking = false
  }
  window.addEventListener(
    'scroll',
    () => {
      if (!ticking) {
        ticking = true
        requestAnimationFrame(update)
      }
    },
    { passive: true }
  )
  update()
}

/* ---------- 1. Navbar: scroll shadow + mobile menu + active link ---------- */
function initNavbar() {
  const nav = document.querySelector('.nav')
  const burger = document.querySelector('.nav__burger')
  const mobile = document.querySelector('.nav__mobile')
  if (!nav) return

  const onScroll = () => nav.classList.toggle('nav--scrolled', window.scrollY > 12)
  onScroll()
  window.addEventListener('scroll', onScroll, { passive: true })

  // Highlight the link for the section in the middle of the viewport.
  const links = [...nav.querySelectorAll('.nav__links a[href^="#"]')]
  const sections = links.map((a) => document.querySelector(a.getAttribute('href'))).filter(Boolean)
  if (sections.length && 'IntersectionObserver' in window) {
    let current = null
    const setActive = (id) => {
      current = id
      links.forEach((a) => a.classList.toggle('is-active', a.getAttribute('href') === '#' + id))
    }
    const spy = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) setActive(e.target.id)
          else if (current === e.target.id) setActive(null)
        })
      },
      { rootMargin: '-45% 0px -50% 0px' }
    )
    sections.forEach((s) => spy.observe(s))
  }

  if (burger && mobile) {
    let closeTimer
    const setOpen = (open) => {
      clearTimeout(closeTimer)
      if (open) {
        mobile.hidden = false
        requestAnimationFrame(() => requestAnimationFrame(() => mobile.classList.add('is-open')))
      } else {
        mobile.classList.remove('is-open')
        // Let the fade-out finish before removing the panel.
        closeTimer = setTimeout(() => (mobile.hidden = true), REDUCED_MOTION ? 0 : 320)
      }
      burger.setAttribute('aria-expanded', String(open))
      // SVG elements have no `.hidden` property, so toggle the attribute.
      burger.querySelector('[data-icon="menu"]').toggleAttribute('hidden', open)
      burger.querySelector('[data-icon="close"]').toggleAttribute('hidden', !open)
    }
    mobile.hidden = true
    burger.setAttribute('aria-expanded', 'false')
    burger.addEventListener('click', () =>
      setOpen(!mobile.classList.contains('is-open'))
    )
    mobile.querySelectorAll('a').forEach((a) =>
      a.addEventListener('click', () => setOpen(false))
    )
  }
}

/* ---------- 2. Learning Path tabs ---------- */
const LEVELS = {
  Beginner: [
    { icon: '👋', title: 'Greetings', sub: 'Say hello & introduce yourself', state: 'done' },
    { icon: '🧑', title: 'Who is She?', sub: 'Describe people around you', state: 'active' },
    { icon: '🤝', title: 'Get to Know You', sub: 'Ask & answer simple questions', state: 'locked' },
    { icon: '🍽️', title: 'Ordering Food', sub: 'Cafés, menus & numbers', state: 'locked' },
  ],
  Intermediate: [
    { icon: '🗺️', title: 'Travel Plans', sub: 'Directions & transport', state: 'done' },
    { icon: '💼', title: 'At Work', sub: 'Meetings & small talk', state: 'active' },
    { icon: '📞', title: 'On the Phone', sub: 'Make & take calls', state: 'locked' },
    { icon: '🛒', title: 'Shopping', sub: 'Prices, sizes & returns', state: 'locked' },
  ],
  Advanced: [
    { icon: '🎤', title: 'Debates', sub: 'Express strong opinions', state: 'active' },
    { icon: '📰', title: 'The News', sub: 'Understand the headlines', state: 'locked' },
    { icon: '🎭', title: 'Idioms', sub: 'Sound like a native', state: 'locked' },
    { icon: '📝', title: 'Formal Writing', sub: 'Emails & essays', state: 'locked' },
  ],
}

const CHECK_SVG =
  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><path d="M20 6L9 17l-5-5"/></svg>'

function renderSteps(level) {
  const grid = document.querySelector('.learnpath__grid')
  if (!grid) return
  const steps = LEVELS[level] || []
  grid.innerHTML = steps
    .map((s) => {
      const node =
        s.state === 'done'
          ? CHECK_SVG
          : `<span>${s.icon}</span>`
      const lock = s.state === 'locked' ? '<span class="lp-step__lock">🔒</span>' : ''
      const cta = s.state === 'active' ? '<span class="lp-step__cta">Start</span>' : ''
      return `
        <div class="lp-step lp-step--${s.state}">
          <div class="lp-step__node">${node}${lock}</div>
          <div class="lp-step__body">
            <strong>${s.title}</strong>
            <span>${s.sub}</span>
          </div>
          ${cta}
        </div>`
    })
    .join('')
}

function initLearningPath() {
  const tabs = document.querySelectorAll('.learnpath__tab')
  if (!tabs.length) return
  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      tabs.forEach((t) => t.classList.remove('is-active'))
      tab.classList.add('is-active')
      renderSteps(tab.dataset.level)
    })
  })
  renderSteps('Beginner')
}

/* ---------- 3b. Vocabulary "Save Word" demo ---------- */
function initVocab() {
  const mock = document.querySelector('.mock--vocab')
  if (!mock) return
  const wordEl = mock.querySelector('.vocab__word')
  const defEl = mock.querySelector('.vocab__def')
  const saveBtn = mock.querySelector('.vocab__save')
  const chips = mock.querySelector('.vocab__chips')
  const countEl = mock.querySelector('.vocab__count')
  if (!saveBtn || !chips || !countEl) return

  const PLUS =
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><path d="M5 12h14M12 5v14"/></svg>'
  const CHECK =
    '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><path d="M20 6L9 17l-5-5"/></svg>'

  // Words the card cycles through automatically.
  const words = [
    { w: 'Serendipity', d: 'Pleasant surprise; happy accident' },
    { w: 'Eloquent', d: 'Fluent and persuasive in speaking' },
    { w: 'Luminous', d: 'Full of light; bright and radiant' },
    { w: 'Tenacious', d: 'Persistent and determined' },
    { w: 'Candid', d: 'Honest and straightforward' },
    { w: 'Vivid', d: 'Bright, clear and full of life' },
    { w: 'Nuance', d: 'A subtle difference in meaning' },
  ]
  let idx = 0

  // Show the current word; `animate` re-triggers the swap animation.
  const showWord = (animate) => {
    wordEl.textContent = words[idx].w
    defEl.textContent = words[idx].d
    saveBtn.classList.remove('is-saved')
    saveBtn.innerHTML = PLUS + ' Save Word'
    if (animate) {
      ;[wordEl, defEl].forEach((el) => {
        el.classList.remove('vocab-swap')
        void el.offsetWidth
        el.classList.add('vocab-swap')
      })
    }
  }

  // Saving adds the current word to the vocabulary list (no duplicates).
  saveBtn.addEventListener('click', () => {
    const current = words[idx].w
    const already = [...chips.children].some((c) => c.textContent === current)
    if (!already) {
      const chip = document.createElement('span')
      chip.textContent = current
      chip.className = 'vocab__chip--new'
      chips.appendChild(chip)
      countEl.textContent = chips.children.length
    }
    saveBtn.classList.add('is-saved')
    saveBtn.innerHTML = CHECK + ' Saved!'
  })

  showWord(false)
  // The word changes every 2s on its own, whether or not it was saved —
  // but only while the card is on screen.
  let timer = 0
  const start = () => {
    clearInterval(timer)
    timer = setInterval(() => {
      idx = (idx + 1) % words.length
      showWord(true)
    }, 2000)
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver((entries) =>
      entries.forEach((e) => (e.isIntersecting ? start() : clearInterval(timer)))
    ).observe(mock)
  } else {
    start()
  }
}

/* ---------- 3c. AI Video player with synced subtitles ---------- */
function initVideo() {
  const mock = document.querySelector('[data-video]')
  if (!mock) return
  const video = mock.querySelector('.vid__el')
  const subEl = mock.querySelector('.vid__subtitle')
  const timeEl = mock.querySelector('.vid__time')
  const wordEl = mock.querySelector('.vid__word')
  const metaEl = mock.querySelector('.vid__meta')
  const meanEl = mock.querySelector('.vid__mean')
  const saveBtn = mock.querySelector('.vid__save')
  const dataEl = document.getElementById('langla-video-data')
  if (!video || !dataEl) return

  let data
  try {
    data = JSON.parse(dataEl.textContent)
  } catch (e) {
    return
  }
  const subs = data.subtitles
  const words = data.words
  const saved = new Set()

  const esc = (s) =>
    s.replace(/[&<>]/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[c]))
  const fmt = (t) => {
    const s = Math.floor(t % 60)
    return Math.floor(t / 60) + ':' + String(s).padStart(2, '0')
  }

  let cur = -1
  const render = (ms) => {
    let i = subs.findIndex((s) => ms >= s.startMs && ms < s.endMs)
    if (i === -1) i = ms <= 0 ? 0 : subs.length - 1
    if (i === cur) return
    cur = i
    const s = subs[i]
    let html = esc(s.en)
    if (s.target) {
      html = html.replace(new RegExp('\\b(' + s.target + ')\\b', 'i'), '<mark>$1</mark>')
    }
    subEl.innerHTML = html
    const w = words[s.target]
    if (w && wordEl) {
      wordEl.textContent = s.target
      metaEl.textContent = w.phonetic + ' · ' + w.pos
      meanEl.textContent = w.def
    }
    const isSaved = saved.has(s.target)
    saveBtn.classList.toggle('is-saved', isSaved)
    saveBtn.textContent = isSaved ? '✓ Saved' : '+ Save'
  }

  video.addEventListener('timeupdate', () => {
    render(video.currentTime * 1000)
    if (timeEl) timeEl.textContent = fmt(video.currentTime)
  })

  saveBtn.addEventListener('click', () => {
    const s = subs[cur]
    if (!s || !s.target) return
    saved.add(s.target)
    saveBtn.classList.add('is-saved')
    saveBtn.textContent = '✓ Saved'
  })

  // Unmute button (video starts muted so it can autoplay).
  const muteBtn = mock.querySelector('.vid__mute')
  if (muteBtn) {
    const ICON_OFF =
      '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><line x1="23" y1="9" x2="17" y2="15"/><line x1="17" y1="9" x2="23" y2="15"/></svg>'
    const ICON_ON =
      '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>'
    const syncMute = () => {
      muteBtn.innerHTML = video.muted ? ICON_OFF : ICON_ON
      muteBtn.classList.toggle('is-on', !video.muted)
      muteBtn.setAttribute('aria-label', video.muted ? 'Unmute' : 'Mute')
    }
    muteBtn.addEventListener('click', () => {
      video.muted = !video.muted
      if (!video.muted) video.play().catch(() => {})
      syncMute()
    })
    syncMute()
  }

  // Only play while the video is on screen (saves bandwidth and CPU).
  video.muted = true
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) video.play().catch(() => {})
          else video.pause()
        })
      },
      { threshold: 0.35 }
    )
    io.observe(video)
  } else {
    video.play().catch(() => {})
  }
}

/* ---------- 3. FAQ accordion ---------- */
// Answers stay in the layout and animate their height via CSS
// (grid-template-rows); `inert` keeps closed answers out of tab order.
function initFaq() {
  const items = document.querySelectorAll('.faq__item')
  if (!items.length) return
  const sync = (item) => {
    const open = item.classList.contains('is-open')
    item.querySelector('.faq__q').setAttribute('aria-expanded', String(open))
    item.querySelector('.faq__a').inert = !open
  }
  items.forEach((item) => {
    item.querySelector('.faq__a').hidden = false
    sync(item)
    item.querySelector('.faq__q').addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open')
      items.forEach((i) => {
        i.classList.toggle('is-open', i === item && !isOpen)
        sync(i)
      })
    })
  })
}

/* ---------- 3e. Pointer effects: hero parallax, card tilt, spotlight ---------- */
function initPointerFx() {
  if (!FINE_POINTER || REDUCED_MOTION) return

  // Hero: phone tilts and floating cards drift with the pointer.
  const hero = document.querySelector('.hero')
  const visual = hero && hero.querySelector('.hero__visual')
  if (visual) {
    let frame = 0
    hero.addEventListener('pointermove', (e) => {
      cancelAnimationFrame(frame)
      frame = requestAnimationFrame(() => {
        const r = hero.getBoundingClientRect()
        const px = ((e.clientX - r.left) / r.width - 0.5) * 2
        const py = ((e.clientY - r.top) / r.height - 0.5) * 2
        visual.style.setProperty('--px', px.toFixed(3))
        visual.style.setProperty('--py', py.toFixed(3))
      })
    })
    hero.addEventListener('pointerleave', () => {
      visual.style.setProperty('--px', 0)
      visual.style.setProperty('--py', 0)
    })
  }

  // Feature showcase cards: gentle 3D tilt toward the pointer.
  const MAX_TILT = 6
  document.querySelectorAll('.mock').forEach((card) => {
    let frame = 0
    card.addEventListener('pointermove', (e) => {
      cancelAnimationFrame(frame)
      frame = requestAnimationFrame(() => {
        const r = card.getBoundingClientRect()
        const x = (e.clientX - r.left) / r.width - 0.5
        const y = (e.clientY - r.top) / r.height - 0.5
        card.classList.add('is-tilting')
        card.style.setProperty('--rx', (x * MAX_TILT).toFixed(2) + 'deg')
        card.style.setProperty('--ry', (-y * MAX_TILT).toFixed(2) + 'deg')
      })
    })
    card.addEventListener('pointerleave', () => {
      cancelAnimationFrame(frame)
      card.classList.remove('is-tilting')
      card.style.setProperty('--rx', '0deg')
      card.style.setProperty('--ry', '0deg')
    })
  })

  // Why cards: soft glow follows the pointer.
  document.querySelectorAll('.why__card').forEach((card) => {
    card.addEventListener('pointermove', (e) => {
      const r = card.getBoundingClientRect()
      card.style.setProperty('--mx', e.clientX - r.left + 'px')
      card.style.setProperty('--my', e.clientY - r.top + 'px')
    })
  })
}

/* ---------- 3d. Count-up stat numbers ---------- */
function initCounters() {
  const els = document.querySelectorAll('.trust__value[data-count]')
  if (!els.length) return
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches
  const fmt = (v, dec) =>
    v.toLocaleString(undefined, {
      minimumFractionDigits: dec,
      maximumFractionDigits: dec,
    })

  const run = (el) => {
    const num = el.querySelector('.trust__num')
    const target = parseFloat(el.dataset.target)
    const dec = parseInt(el.dataset.dec || '0', 10)
    const suffix = el.dataset.suffix || ''
    if (!num) return
    if (reduce) {
      num.textContent = fmt(target, dec) + suffix
      return
    }
    const dur = 1600
    const t0 = performance.now()
    const ease = (t) => 1 - Math.pow(1 - t, 3) // easeOutCubic
    const runId = (el._countRun = (el._countRun || 0) + 1)
    const step = (now) => {
      if (runId !== el._countRun) return // a newer run (or reset) took over
      const p = Math.min((now - t0) / dur, 1)
      num.textContent = fmt(target * ease(p), dec) + suffix
      if (p < 1) requestAnimationFrame(step)
      else num.textContent = fmt(target, dec) + suffix
    }
    requestAnimationFrame(step)
  }

  // Count up every time the bar scrolls into view; reset once it's gone.
  const reset = (el) => {
    const num = el.querySelector('.trust__num')
    el._countRun = (el._countRun || 0) + 1
    if (num) num.textContent = fmt(0, parseInt(el.dataset.dec || '0', 10)) + (el.dataset.suffix || '')
  }

  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) run(e.target)
          else if (!reduce) reset(e.target)
        })
      },
      { threshold: 0.4 }
    )
    els.forEach((el) => io.observe(el))
  } else {
    els.forEach(run)
  }
}

/* ---------- 4. Scroll reveal ---------- */
function initReveal() {
  const els = document.querySelectorAll('.reveal')
  if (!els.length) return
  if (!('IntersectionObserver' in window)) {
    els.forEach((el) => el.classList.add('is-visible'))
    return
  }

  // The observer drives every entrance — including above-the-fold elements,
  // which intersect on its first (async, post-paint) callback, so they
  // animate in on load instead of appearing instantly.
  // Entrances replay: once an element has fully left the viewport it is
  // reset, so it animates again the next time it scrolls into view.
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const tall =
          entry.rootBounds && entry.boundingClientRect.height > entry.rootBounds.height * 0.8
        if (entry.intersectionRatio >= 0.12 || (entry.isIntersecting && tall)) {
          entry.target.classList.add('is-visible')
        } else if (!entry.isIntersecting && !REDUCED_MOTION) {
          entry.target.classList.remove('is-visible')
        }
      })
    },
    { threshold: [0, 0.12], rootMargin: '0px 0px -40px 0px' }
  )
  els.forEach((el) => io.observe(el))

  // Safety net: if the observer never fires (e.g. a hidden/background tab that
  // isn't painting), reveal anything already in view so nothing stays blank.
  setTimeout(() => {
    els.forEach((el) => {
      if (
        !el.classList.contains('is-visible') &&
        el.getBoundingClientRect().top < window.innerHeight
      ) {
        el.classList.add('is-visible')
      }
    })
  }, 1400)
}

/* ---------- 5. Hero phone: looping speaking-practice conversation ---------- */
function initShowcasePhone() {
  const sc = document.querySelector('.sc')
  if (!sc) return
  const steps = [...sc.querySelectorAll('.sc__step')]
  const pct = sc.querySelector('.sc__pct')
  const target = pct ? parseInt(pct.dataset.to, 10) : 0

  if (REDUCED_MOTION) {
    steps.forEach((s) => s.classList.add('is-in'))
    if (pct) pct.textContent = target + '%'
    return
  }

  // When each step appears (ms from start), and when the loop restarts.
  const STEP_AT = [300, 1800, 3100, 4400, 5700, 6000]
  const LOOP_AT = 12000
  let timers = []
  let pctRun = 0

  const later = (fn, ms) => timers.push(setTimeout(fn, ms))
  const stop = () => {
    timers.forEach(clearTimeout)
    timers = []
    pctRun++
  }
  const reset = () => {
    steps.forEach((s) => s.classList.remove('is-in'))
    if (pct) pct.textContent = '0%'
  }
  const countPct = () => {
    if (!pct) return
    const run = ++pctRun
    const t0 = performance.now() + 200
    const tick = (now) => {
      if (run !== pctRun) return
      const p = Math.max(0, Math.min((now - t0) / 1400, 1))
      pct.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))) + '%'
      if (p < 1) requestAnimationFrame(tick)
    }
    requestAnimationFrame(tick)
  }
  const play = () => {
    stop()
    sc.classList.remove('is-resetting')
    reset()
    steps.forEach((s, i) =>
      later(() => {
        s.classList.add('is-in')
        if (s.classList.contains('sc__score')) countPct()
      }, STEP_AT[i] ?? STEP_AT[STEP_AT.length - 1])
    )
    // Fade the conversation out (last message first), then start over.
    later(() => {
      sc.classList.add('is-resetting')
      steps
        .slice()
        .reverse()
        .forEach((s, i) => later(() => s.classList.remove('is-in'), i * 70))
      later(play, 900)
    }, LOOP_AT)
  }

  if ('IntersectionObserver' in window) {
    new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) play()
          else {
            stop()
            reset()
          }
        })
      },
      { threshold: 0.25 }
    ).observe(sc)
  } else {
    play()
  }
}

/* ---------- 5b. AI Tutor card: the tutor teaches a mini lesson ---------- */
// Speaks (mouth, sound rings, words appear as it talks) -> listens and
// blinks while the learner answers -> speaks the correction -> thinks.
// Restarts every time the card scrolls into view.
function initTutorDemo() {
  const card = document.querySelector('[data-tutor]')
  if (!card) return
  const said = [...card.querySelectorAll('.bubble[data-say]')]
  // Each message animates as a row (avatar + bubble).
  const rowOf = (el) => (el && el.closest('.bubble-row')) || el
  const saidRows = said.map(rowOf)
  const reply = card.querySelector('.bubble-row--me')
  const typing = rowOf(card.querySelector('.bubble--typing'))
  const stateText = card.querySelector('.tutor__state-text')
  const parts = [saidRows[0], reply, saidRows[1], typing].filter(Boolean)
  const vBlink = card.querySelector('.tutor__vid--blink')
  const vSpeak = card.querySelector('.tutor__vid--speak')
  const vids = [vBlink, vSpeak].filter(Boolean)
  let pauseTimer

  // Cross-fade to one clip; the other pauses once it has faded out.
  const showClip = (clip) => {
    clearTimeout(pauseTimer)
    vids.forEach((v) => {
      v.classList.toggle('is-active', v === clip)
      if (v === clip) v.play().catch(() => {})
    })
    pauseTimer = setTimeout(() => vids.forEach((v) => v !== clip && v.pause()), 500)
  }
  const pauseClips = () => {
    clearTimeout(pauseTimer)
    vids.forEach((v) => v.pause())
  }

  // Wrap each word of a tutor line (inside <b> too) so it can light up.
  const wordsOf = (el) => {
    const out = []
    const walk = (node) => {
      ;[...node.childNodes].forEach((child) => {
        if (child.nodeType === Node.TEXT_NODE) {
          const frag = document.createDocumentFragment()
          child.textContent.split(/(\s+)/).forEach((part) => {
            if (!part) return
            if (/^\s+$/.test(part)) return frag.appendChild(document.createTextNode(part))
            const w = document.createElement('span')
            w.className = 'say-w'
            w.textContent = part
            out.push(w)
            frag.appendChild(w)
          })
          child.replaceWith(frag)
        } else {
          walk(child)
        }
      })
    }
    walk(el)
    return out
  }
  const lineWords = said.map(wordsOf)

  if (REDUCED_MOTION) {
    parts.forEach((p) => p.classList.add('is-in'))
    lineWords.flat().forEach((w) => w.classList.add('is-on'))
    if (vBlink) vBlink.preload = 'metadata' // show a still frame, no playback
    return
  }

  let timers = []
  const later = (fn, ms) => timers.push(setTimeout(fn, ms))
  const setState = (state) => {
    card.classList.remove('is-speaking', 'is-listening', 'is-thinking')
    if (state) card.classList.add('is-' + state)
    if (state && stateText) stateText.textContent = stateText.dataset[state] || ''
    showClip(state === 'speaking' ? vSpeak : vBlink)
  }
  const reset = () => {
    timers.forEach(clearTimeout)
    timers = []
    setState(null)
    parts.forEach((p) => p.classList.remove('is-in'))
    lineWords.flat().forEach((w) => w.classList.remove('is-on'))
  }
  // Tutor says one line: bubble in, words light up at speaking pace.
  const speak = (i, at) => {
    const WORD_MS = 230
    later(() => {
      setState('speaking')
      saidRows[i].classList.add('is-in')
    }, at)
    lineWords[i].forEach((w, k) => later(() => w.classList.add('is-on'), at + 250 + k * WORD_MS))
    return at + 250 + lineWords[i].length * WORD_MS + 300 // when the line is finished
  }
  const play = () => {
    reset()
    let t = speak(0, 500)
    later(() => setState('listening'), t)
    later(() => reply && reply.classList.add('is-in'), t + 700)
    t += 2900
    t = speak(1, t)
    later(() => {
      setState('thinking')
      typing && typing.classList.add('is-in')
    }, t)
    // Hold, fade the chat out, and teach the lesson again.
    later(() => {
      setState(null)
      parts
        .slice()
        .reverse()
        .forEach((p, k) => later(() => p.classList.remove('is-in'), k * 90))
      later(play, 900)
    }, t + 3200)
  }

  if ('IntersectionObserver' in window) {
    new IntersectionObserver(
      (entries) =>
        entries.forEach((e) => {
          if (e.isIntersecting) play()
          else {
            reset()
            pauseClips()
          }
        }),
      { threshold: 0.3 }
    ).observe(card)
  } else {
    play()
  }
}

/* ---------- 5b2. Custom Learning Path card: goal -> path -> Day 1 ---------- */
// Pick a goal (pointer taps "Travel", then "Continue") -> the path is built
// -> Day 1's activities get ticked off -> celebration. Restarts on re-entry.
function initPathDemo() {
  const card = document.querySelector('[data-path]')
  if (!card) return
  const steps = [...card.querySelectorAll('.lp__step')]
  const goal = card.querySelector('.lp__screen--goal')
  const path = card.querySelector('.lp__screen--path')
  const day = card.querySelector('.lp__screen--day')
  const screens = [goal, path, day]
  const acts = [...card.querySelectorAll('.lp__act')]
  const count = card.querySelector('.lp__count')
  const ring = card.querySelector('.lp__ring-fill')
  const line = card.querySelector('.lp__line i')

  const setProgress = (n) => {
    if (count) count.textContent = n + '/' + acts.length
    if (ring) ring.style.strokeDashoffset = String(100 - (n / acts.length) * 100)
  }
  const showScreen = (i) => {
    screens.forEach((sc, k) => {
      sc.classList.toggle('is-leaving', k < i)
      sc.classList.toggle('is-active', k === i)
    })
    steps.forEach((st, k) => {
      st.classList.toggle('is-done', k < i)
      st.classList.toggle('is-on', k === i)
    })
  }

  if (REDUCED_MOTION) {
    showScreen(1)
    return
  }

  let timers = []
  const later = (fn, ms) => timers.push(setTimeout(fn, ms))
  const reset = () => {
    timers.forEach(clearTimeout)
    timers = []
    screens.forEach((sc) => sc.classList.remove('is-active', 'is-leaving'))
    steps.forEach((st) => st.classList.remove('is-on', 'is-done'))
    goal.classList.remove('cur-1', 'cur-2', 'is-picked', 'is-pressed')
    day.classList.remove('is-celebrating')
    acts.forEach((a) => a.classList.remove('is-done'))
    if (line) line.style.transform = ''
    setProgress(0)
  }
  const play = () => {
    reset()
    // 1. choose a goal
    later(() => showScreen(0), 200)
    later(() => goal.classList.add('cur-1'), 1300)
    later(() => goal.classList.add('is-picked'), 2200)
    later(() => goal.classList.replace('cur-1', 'cur-2'), 2800)
    later(() => goal.classList.add('is-pressed'), 3600)
    // 2. the path is generated
    later(() => showScreen(1), 4000)
    // 3. today's lesson, activity by activity
    later(() => showScreen(2), 7600)
    acts.forEach((a, k) =>
      later(() => {
        a.classList.add('is-done')
        setProgress(k + 1)
      }, 8400 + k * 750)
    )
    // Completion popup with confetti, held for a few seconds before looping.
    later(() => day.classList.add('is-celebrating'), 8400 + acts.length * 750 + 300)
    later(play, 16800)
  }

  if ('IntersectionObserver' in window) {
    new IntersectionObserver((entries) => entries.forEach((e) => (e.isIntersecting ? play() : reset())), {
      threshold: 0.3,
    }).observe(card)
  } else {
    play()
  }
}

/* ---------- 5c. Footer robot greeter: "hello" in many languages ---------- */
function initGreeter() {
  const el = document.querySelector('[data-greeter]')
  if (!el) return
  const video = el.querySelector('video')
  const text = el.querySelector('.greeter__text')
  const words = (text?.dataset.words || '').split('|').filter(Boolean)
  if (REDUCED_MOTION || !text || words.length < 2) {
    if (video) video.preload = 'metadata'
    return
  }
  let i = 0
  let timer = 0
  const next = () => {
    i = (i + 1) % words.length
    text.textContent = words[i]
    text.classList.remove('is-swapping')
    void text.offsetWidth // restart the swap animation
    text.classList.add('is-swapping')
  }
  const start = () => {
    clearInterval(timer)
    timer = setInterval(next, 1800)
    video?.play().catch(() => {})
  }
  const stop = () => {
    clearInterval(timer)
    video?.pause()
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver((entries) => entries.forEach((e) => (e.isIntersecting ? start() : stop())), {
      threshold: 0.2,
    }).observe(el)
  } else {
    start()
  }
}

/* ---------- 5d. Decorative clips play only while on screen ---------- */
function initInviewVideos() {
  const vids = document.querySelectorAll('video[data-inview-video]')
  if (!vids.length) return
  if (REDUCED_MOTION || !('IntersectionObserver' in window)) {
    vids.forEach((v) => (v.preload = 'metadata'))
    return
  }
  const io = new IntersectionObserver(
    (entries) =>
      entries.forEach((e) => (e.isIntersecting ? e.target.play().catch(() => {}) : e.target.pause())),
    { threshold: 0.25 }
  )
  vids.forEach((v) => io.observe(v))
}

/* ---------- 6. Headlines rise in word by word ---------- */
function initSplitHeadings() {
  if (REDUCED_MOTION) return
  const heads = document.querySelectorAll(
    '.hero__copy h1, .section-head h2, .feature-row__copy h3, .download__card h2'
  )
  heads.forEach((h) => {
    let wi = 0
    const word = (text, cls) => {
      const outer = document.createElement('span')
      outer.className = 'w'
      const inner = document.createElement('span')
      inner.className = 'w__i'
      inner.style.setProperty('--wi', wi++)
      if (cls) {
        // Gradient phrases keep their class on every word.
        const g = document.createElement('span')
        g.className = cls
        g.textContent = text
        inner.appendChild(g)
      } else {
        inner.textContent = text
      }
      outer.appendChild(inner)
      return outer
    }
    const splitInto = (frag, text, cls) => {
      text.split(/(\s+)/).forEach((part) => {
        if (!part) return
        frag.appendChild(/^\s+$/.test(part) ? document.createTextNode(part) : word(part, cls))
      })
    }

    h.setAttribute('aria-label', h.textContent.replace(/\s+/g, ' ').trim())
    const frag = document.createDocumentFragment()
    ;[...h.childNodes].forEach((node) => {
      if (node.nodeType === Node.TEXT_NODE) splitInto(frag, node.textContent)
      else if (node.nodeName === 'SPAN') splitInto(frag, node.textContent, node.className)
      else frag.appendChild(node) // <br> etc.
    })
    h.replaceChildren(frag)
    ;[...h.children].forEach((c) => c.setAttribute('aria-hidden', 'true'))
  })
}

/* ---------- 7. Scroll parallax for feature showcase stages ---------- */
function initScrollParallax() {
  if (REDUCED_MOTION) return
  const rows = [...document.querySelectorAll('.feature-row')]
  if (!rows.length) return
  let ticking = false
  const update = () => {
    const vh = window.innerHeight
    rows.forEach((row) => {
      const r = row.getBoundingClientRect()
      if (r.bottom < -200 || r.top > vh + 200) return
      // -1 when the row sits below centre, +1 when it has moved above it.
      const sp = Math.max(-1, Math.min(1, (vh / 2 - (r.top + r.height / 2)) / vh))
      row.style.setProperty('--sp', sp.toFixed(3))
    })
    ticking = false
  }
  window.addEventListener(
    'scroll',
    () => {
      if (!ticking) {
        ticking = true
        requestAnimationFrame(update)
      }
    },
    { passive: true }
  )
  update()
}

/* ---------- 8. Freeze looping CSS animations in offscreen sections ---------- */
function initOffscreenPause() {
  if (!('IntersectionObserver' in window)) return
  const io = new IntersectionObserver(
    (entries) => entries.forEach((e) => e.target.classList.toggle('is-offscreen', !e.isIntersecting)),
    { rootMargin: '100px 0px' }
  )
  document.querySelectorAll('main > section, body > footer').forEach((s) => io.observe(s))
}

document.addEventListener('DOMContentLoaded', () => {
  initOffscreenPause()
  initSplitHeadings()
  initSmoothScroll()
  initNavbar()
  initLearningPath()
  initFaq()
  initVocab()
  initVideo()
  initCounters()
  initReveal()
  initPointerFx()
  initShowcasePhone()
  initTutorDemo()
  initPathDemo()
  initGreeter()
  initInviewVideos()
  initScrollParallax()
})
