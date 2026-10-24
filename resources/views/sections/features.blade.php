@php
  $st = 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
@endphp

<section id="features" class="section features">
  <div class="bg-blobs" aria-hidden="true"><span></span><span></span><span></span></div>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Features</span>
      <h2><span class="text-grad">Powerful features</span><br />for every learner</h2>
      <p>
        From real-time speaking to smart vocabulary and progress tracking —
        everything works together to keep you speaking, remembering and
        improving every single day.
      </p>
    </div>

    <div class="features__list">

      {{-- 1. AI Video --}}
      <article class="feature-row reveal reveal-fade" style="--mc: #3b82f6">
        <div class="feature-row__copy reveal reveal-left">
          <h3>Learn with AI Video</h3>
          <p>
            Pick up real language from real conversations. Watch short, real-life
            video clips with synced subtitles — tap any word to see its meaning,
            hear it spoken, and save it to your vocabulary in one tap.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Real-life topics</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">Interactive subtitles</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Collect new words</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-right" style="--d: 0.1s">
          <div class="mock mock--video" data-video>
            <div class="vid__player">
              <video class="vid__el" muted loop playsinline preload="metadata"
                aria-label="Ep 6: The Insurance Offer — English conversation video">
                <source src="{{ asset('videos/6.mp4') }}" type="video/mp4" />
              </video>
              <button type="button" class="vid__mute" aria-label="Unmute">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><line x1="23" y1="9" x2="17" y2="15"/><line x1="17" y1="9" x2="23" y2="15"/></svg>
              </button>
              <span class="vid__time">0:00</span>
            </div>
            <p class="vid__subtitle">Before you go, may I offer you <mark>insurance</mark>?</p>
            <div class="vid__wordcard">
              <div class="vid__wordinfo">
                <strong class="vid__word">insurance</strong>
                <small class="vid__meta">/ɪnˈʃʊərəns/ · noun</small>
                <small class="vid__mean">A deal where you pay a company so it helps if something bad happens.</small>
              </div>
              <button type="button" class="vid__save">+ Save</button>
            </div>
            @verbatim
            <script type="application/json" id="langla-video-data">
{"subtitles":[
{"startMs":0,"endMs":3500,"en":"Before you go, may I offer you insurance?","target":"insurance"},
{"startMs":3500,"endMs":7000,"en":"Insurance? What does it cover exactly?","target":"cover"},
{"startMs":7000,"endMs":10500,"en":"It can protect your whole family.","target":"protect"},
{"startMs":10500,"endMs":14500,"en":"Oh! Does it help after an accident?","target":"accident"},
{"startMs":14500,"endMs":18000,"en":"Yes, and it covers your health too.","target":"health"},
{"startMs":18000,"endMs":22000,"en":"Nice! How much is the premium?","target":"premium"},
{"startMs":22000,"endMs":25500,"en":"Ten pounds a month. Making a claim is easy.","target":"claim"},
{"startMs":25500,"endMs":30000,"en":"Perfect! Now I feel totally relaxed.","target":"relaxed"}
],
"words":{
"insurance":{"phonetic":"/ɪnˈʃʊərəns/","pos":"noun","def":"A deal where you pay a company so it helps if something bad happens."},
"cover":{"phonetic":"/ˈkʌvə/","pos":"verb","def":"To include and pay for something if it goes wrong."},
"protect":{"phonetic":"/prəˈtekt/","pos":"verb","def":"To keep someone or something safe from harm."},
"accident":{"phonetic":"/ˈæksɪdənt/","pos":"noun","def":"Something bad that happens by chance, like a crash or a fall."},
"health":{"phonetic":"/helθ/","pos":"noun","def":"The condition of your body and how well you are."},
"premium":{"phonetic":"/ˈpriːmiəm/","pos":"noun","def":"The money you pay regularly for insurance."},
"claim":{"phonetic":"/kleɪm/","pos":"noun","def":"A request for money from your insurance after something goes wrong."},
"relaxed":{"phonetic":"/rɪˈlækst/","pos":"adjective","def":"Calm and free from worry."}
}}
            </script>
            @endverbatim
          </div>
        </div>
      </article>

      {{-- 2. Quizzes --}}
      <article class="feature-row reveal reveal-fade feature-row--rev" style="--mc: #f97316">
        <div class="feature-row__copy reveal reveal-right">
          <h3>Learn with Quizzes</h3>
          <p>
            Turn practice into progress. Short, adaptive quizzes check what you
            actually remember, with instant scoring and spaced-repetition review
            of tricky words so you level up as you go.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Instant scoring</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">Adaptive review</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Level up</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-left" style="--d: 0.1s">
          <div class="mock mock--quiz">
            <div class="mock__quiz-top">
              <span class="mock__q">Question 3 of 10</span>
              <span class="mock__score">
                <svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14"><path d="M12 2l2.9 6 6.6.6-5 4.3 1.5 6.5L12 16.9 5.9 19.4 7.4 12.9l-5-4.3L9 8z"/></svg>
                240
              </span>
            </div>
            <div class="mock__progress"><span class="mock__progress-fill" style="--w: 30%"></span></div>
            <p class="mock__prompt">How do you say “Hello” in French?</p>
            <div class="mock__options">
              <button class="mock__opt mock__opt--right mock__opt--glow">Bonjour <span>✓</span></button>
              <button class="mock__opt">Gracias</button>
              <button class="mock__opt mock__opt--wrong">Arrivederci <span>✕</span></button>
              <button class="mock__opt">Danke</button>
            </div>
          </div>
        </div>
      </article>

      {{-- 3. AI Tutor --}}
      <article class="feature-row reveal reveal-fade" style="--mc: #7c3aed">
        <div class="feature-row__copy reveal reveal-left">
          <h3>Learn with an AI Tutor</h3>
          <p>
            Chat and speak with a tutor that never sleeps. Have natural
            conversations by voice or text and get gentle corrections,
            pronunciation feedback and encouragement — 24/7.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Voice &amp; text chat</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">Instant feedback</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Natural conversation</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-right" style="--d: 0.1s">
          {{-- Played by app.js (initTutorDemo): the tutor speaks, listens
               (blinking) while the learner answers, then speaks again. --}}
          <div class="mock mock--tutor" data-tutor>
            <div class="tutor__stage">
              <span class="tutor__sparks" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i></span>
              <span class="tutor__rings" aria-hidden="true"><i></i><i></i><i></i></span>
              {{-- Two looping clips: blinking (idle/listening) and speaking; app.js cross-fades them. --}}
              <div class="tutor__video" role="img" aria-label="Langla AI tutor">
                <video class="tutor__vid tutor__vid--blink is-active" src="{{ asset('videos/tutor-blinking.mp4') }}" muted loop playsinline preload="none" aria-hidden="true"></video>
                <video class="tutor__vid tutor__vid--speak" src="{{ asset('videos/tutor-speaking.mp4') }}" muted loop playsinline preload="none" aria-hidden="true"></video>
              </div>
              <div class="tutor__online">
                <span class="mock__ai-dot"></span>
                AI Tutor · online
              </div>
              <span class="tutor__state" aria-hidden="true">
                <span class="tutor__eq"><i></i><i></i><i></i><i></i></span>
                <span class="tutor__state-text" data-speaking="Speaking" data-listening="Listening" data-thinking="Thinking">Speaking</span>
              </span>
            </div>
            <div class="mock__bubbles">
              <div class="bubble-row bubble-row--ai">
                <img class="tutor__mini" src="{{ asset('images/robot-avatar.webp') }}" alt="" width="250" height="250" loading="lazy" decoding="async" />
                <div class="bubble bubble--ai" data-say>Hi! Ready to practice ordering coffee? ☕</div>
              </div>
              <div class="bubble-row bubble-row--me">
                <div class="bubble bubble--me">Yes! I would like a coffee, please.</div>
                <img class="tutor__user" src="{{ asset('images/showcase-user.webp') }}" alt="" width="96" height="96" loading="lazy" decoding="async" />
              </div>
              <div class="bubble-row bubble-row--ai">
                <img class="tutor__mini" src="{{ asset('images/robot-avatar.webp') }}" alt="" width="250" height="250" loading="lazy" decoding="async" />
                <div class="bubble bubble--ai" data-say>Perfect 👍 Try adding a size: “a <b>large</b> coffee”.</div>
              </div>
              <div class="bubble-row bubble-row--ai bubble-row--typing">
                <img class="tutor__mini" src="{{ asset('images/robot-avatar.webp') }}" alt="" width="250" height="250" loading="lazy" decoding="async" />
                <div class="bubble bubble--ai bubble--typing" aria-label="AI is responding">
                  <span class="mock__dots"><i></i><i></i><i></i></span>
                </div>
              </div>
            </div>
            <div class="mock__composer mock__composer--live">
              <span class="mock__listening">Listening…</span>
              <span class="mock__wave" aria-hidden="true">
                <i></i><i></i><i></i><i></i><i></i><i></i><i></i>
              </span>
              <button class="mock__micbtn mock__micbtn--pulse" aria-hidden="true">
                <svg viewBox="0 0 24 24" {!! $st !!} width="18" height="18"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M6 11a6 6 0 0 0 12 0M12 17v4M8 21h8"/></svg>
              </button>
            </div>
          </div>
        </div>
      </article>

      {{-- 4. Custom Learning Path --}}
      <article class="feature-row reveal reveal-fade feature-row--rev" style="--mc: #6366f1">
        <div class="feature-row__copy reveal reveal-right">
          <h3>Learn with a Custom Learning Path</h3>
          <p>
            Tell Langla why you're learning — travel, work, school or everyday
            chat — and get a day-by-day path built around your goal. Short daily
            lessons mix video, speaking practice, quizzes and AI conversation,
            and unlock step by step as you progress.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Goal-based plan</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">10-min daily lessons</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Unlock as you go</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-left" style="--d: 0.1s">
          {{-- Played by app.js (initPathDemo): pick a goal -> path is built -> Day 1 gets completed. --}}
          <div class="mock mock--path" data-path>
            <ol class="lp__steps" aria-hidden="true">
              <li class="lp__step"><b>1</b>Pick a goal</li>
              <li class="lp__step"><b>2</b>Get your path</li>
              <li class="lp__step"><b>3</b>Learn daily</li>
            </ol>

            <div class="lp__screens">
              {{-- Screen 1: choose a goal --}}
              <div class="lp__screen lp__screen--goal">
                <p class="lp__title">Why do you want to learn?</p>
                <p class="lp__sub">Choose your main goal — you can change it later.</p>
                <div class="lp__goals">
                  <span class="lp__goal lp__goal--pick"><i>✈️</i>Travel</span>
                  <span class="lp__goal"><i>💼</i>Work &amp; Career</span>
                  <span class="lp__goal"><i>🎓</i>School &amp; Study</span>
                  <span class="lp__goal"><i>💬</i>Everyday Talk</span>
                  <span class="lp__goal"><i>📈</i>Improve My English</span>
                  <span class="lp__goal"><i>✨</i>Custom Goal</span>
                </div>
                <span class="lp__continue">Continue</span>
                <span class="lp__cursor" aria-hidden="true">
                  <svg viewBox="0 0 24 24" width="26" height="26"><path d="M5 3l14 7-6 2-2 6z" fill="#18183a" stroke="#fff" stroke-width="1.6" stroke-linejoin="round"/></svg>
                </span>
              </div>

              {{-- Screen 2: the generated path --}}
              <div class="lp__screen lp__screen--path">
                <div class="lp__path-head">
                  <p class="lp__title">My Learning Path</p>
                  <span class="lp__ai">✨ Built for Travel</span>
                </div>
                <div class="lp__units">
                  <span class="lp__line"><i></i></span>
                  <div class="lp__unit lp__unit--active" style="--k: 0">
                    <span class="lp__node">1</span>
                    <span class="lp__unit-card">
                      <span class="lp__unit-icon">✈️</span>
                      <span class="lp__unit-text"><strong>Travel Essentials</strong><small>Day 1 – 3</small></span>
                      <span class="lp__go">Start</span>
                    </span>
                  </div>
                  <div class="lp__unit" style="--k: 1">
                    <span class="lp__node">2</span>
                    <span class="lp__unit-card">
                      <span class="lp__unit-icon">👋</span>
                      <span class="lp__unit-text"><strong>Greetings &amp; Intros</strong><small>Day 4 – 6</small></span>
                      <span class="lp__lock" aria-hidden="true">🔒</span>
                    </span>
                  </div>
                  <div class="lp__unit" style="--k: 2">
                    <span class="lp__node">3</span>
                    <span class="lp__unit-card">
                      <span class="lp__unit-icon">🛫</span>
                      <span class="lp__unit-text"><strong>At the Airport</strong><small>Day 7 – 9</small></span>
                      <span class="lp__lock" aria-hidden="true">🔒</span>
                    </span>
                  </div>
                  <div class="lp__unit" style="--k: 3">
                    <span class="lp__node">4</span>
                    <span class="lp__unit-card">
                      <span class="lp__unit-icon">🏨</span>
                      <span class="lp__unit-text"><strong>At the Hotel</strong><small>Day 10 – 12</small></span>
                      <span class="lp__lock" aria-hidden="true">🔒</span>
                    </span>
                  </div>
                </div>
              </div>

              {{-- Screen 3: today's lesson gets completed --}}
              <div class="lp__screen lp__screen--day">
                <div class="lp__day-card">
                  <span class="lp__day-icon">🧳</span>
                  <span class="lp__day-text">
                    <small>Day 1</small>
                    <strong>Packing &amp; Documents</strong>
                    <em>10 min · 4 activities</em>
                  </span>
                  <span class="lp__ring">
                    <svg viewBox="0 0 36 36"><circle cx="18" cy="18" r="15" class="lp__ring-track" /><circle cx="18" cy="18" r="15" class="lp__ring-fill" pathLength="100" /></svg>
                    <b class="lp__count">0/4</b>
                  </span>
                </div>
                <div class="lp__acts">
                  <div class="lp__act" style="--k: 0">
                    <span class="lp__act-icon"><svg viewBox="0 0 24 24" width="18" height="18"><path d="M8 5v14l11-7z" fill="currentColor"/></svg></span>
                    <span class="lp__act-text"><strong>Video</strong><small>5 min</small></span>
                    <span class="lp__check" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14"><path d="M5 12.5l4.5 4.5L19 7.5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                  </div>
                  <div class="lp__act" style="--k: 1">
                    <span class="lp__act-icon"><svg viewBox="0 0 24 24" width="18" height="18"><rect x="9" y="3" width="6" height="11" rx="3" fill="none" stroke="currentColor" stroke-width="2"/><path d="M6 11a6 6 0 0 0 12 0M12 17v4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
                    <span class="lp__act-text"><strong>Speaking Practice</strong><small>5 min</small></span>
                    <span class="lp__check" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14"><path d="M5 12.5l4.5 4.5L19 7.5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                  </div>
                  <div class="lp__act" style="--k: 2">
                    <span class="lp__act-icon"><svg viewBox="0 0 24 24" width="18" height="18"><path d="M9 9a3 3 0 1 1 4 2.8c-.6.3-1 .9-1 1.6V14M12 18h.01" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span>
                    <span class="lp__act-text"><strong>Quick Quiz</strong><small>3 min</small></span>
                    <span class="lp__check" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14"><path d="M5 12.5l4.5 4.5L19 7.5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                  </div>
                  <div class="lp__act" style="--k: 3">
                    <span class="lp__act-icon"><svg viewBox="0 0 24 24" width="18" height="18"><path d="M4 5h16v10H9l-5 4z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></span>
                    <span class="lp__act-text"><strong>AI Conversation</strong><small>2 min</small></span>
                    <span class="lp__check" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14"><path d="M5 12.5l4.5 4.5L19 7.5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                  </div>
                </div>
                {{-- Completion popup (shown with .is-celebrating) --}}
                <div class="lp__pop" aria-hidden="true">
                  <span class="lp__rain"><i style="--x: 6%; --t: 0.00s; --s: 1.00"></i><i style="--x: 14%; --t: 0.25s; --s: 0.80"></i><i style="--x: 22%; --t: 0.10s; --s: 1.10"></i><i style="--x: 31%; --t: 0.40s; --s: 0.90"></i><i style="--x: 40%; --t: 0.05s; --s: 1.00"></i><i style="--x: 49%; --t: 0.30s; --s: 1.20"></i><i style="--x: 58%; --t: 0.15s; --s: 0.85"></i><i style="--x: 67%; --t: 0.45s; --s: 1.00"></i><i style="--x: 75%; --t: 0.20s; --s: 1.10"></i><i style="--x: 84%; --t: 0.35s; --s: 0.90"></i><i style="--x: 92%; --t: 0.08s; --s: 1.00"></i><i style="--x: 97%; --t: 0.50s; --s: 0.80"></i><i style="--x: 10%; --t: 0.60s; --s: 0.90"></i><i style="--x: 36%; --t: 0.70s; --s: 1.00"></i><i style="--x: 63%; --t: 0.65s; --s: 1.10"></i><i style="--x: 88%; --t: 0.75s; --s: 0.85"></i></span>
                  <div class="lp__pop-card">
                    <span class="lp__badge">
                      <span class="lp__rays"></span>
                      <img src="{{ asset('images/robot-avatar.webp') }}" alt="" width="250" height="250" loading="lazy" decoding="async" />
                      <span class="lp__medal">🏆</span>
                    </span>
                    <span class="lp__sparkle lp__sparkle--1">✦</span>
                    <span class="lp__sparkle lp__sparkle--2">✦</span>
                    <span class="lp__sparkle lp__sparkle--3">✦</span>
                    <strong class="lp__pop-title">Great job! 🎉</strong>
                    <span class="lp__pop-sub">Day 1 complete — you're on your way!</span>
                    <span class="lp__pop-words"><i>✓</i> New words <b>+8 words</b></span>
                    <span class="lp__pop-meta"><span>⏱ 10 min</span><span>🔥 1-day streak</span><span>⭐ 4/4</span></span>
                    <span class="lp__pop-btn">Continue to Day 2 →</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      {{-- 5. Real-Time Speaking Practice --}}
      <article class="feature-row reveal reveal-fade" style="--mc: #ec4899">
        <div class="feature-row__copy reveal reveal-left">
          <h3>Real-Time Speaking Practice</h3>
          <p>
            Boost your speaking skills by having real-time conversations with AI.
            Practise naturally and improve your fluency every day with instant
            feedback and pronunciation guidance.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Voice recognition</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">Instant feedback</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Natural conversations</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-right" style="--d: 0.1s">
          <div class="mock mock--speak">
            <div class="speak__head">
              <strong>Real-Time Speaking</strong>
              <span>Practice conversations with Langla</span>
            </div>
            <button class="speak__mic" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="28" height="28"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M6 11a6 6 0 0 0 12 0M12 17v4M8 21h8"/></svg>
            </button>
            <div class="speak__wave" aria-hidden="true">
              <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
            </div>
            <div class="speak__hint">
              <strong>Tap to speak</strong>
              <span>Start a conversation</span>
            </div>
            <div class="speak__bubbles">
              <div class="bubble bubble--me" style="--d: 0.3s">“How's the weather today?”</div>
              <div class="bubble bubble--ai" style="--d: 0.6s">“It's quite sunny! Perfect for a walk.”</div>
            </div>
          </div>
        </div>
      </article>

      {{-- 6. Review & Save New Words --}}
      <article class="feature-row reveal reveal-fade feature-row--rev" style="--mc: #10b981">
        <div class="feature-row__copy reveal reveal-right">
          <h3>Review &amp; Save New Words</h3>
          <p>
            After every conversation, review what you talked about and save any
            words you didn't know. Build your personal vocabulary list as you chat
            and track your learning progress.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Smart definitions</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">Personal dictionary</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Spaced repetition</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-left" style="--d: 0.1s">
          <div class="mock mock--vocab">
            <div class="vocab__head">
              <strong>Review &amp; Save Words</strong>
              <span>Build your vocabulary as you learn</span>
            </div>
            <div class="vocab__card">
              <h4 class="vocab__word">Serendipity</h4>
              <p class="vocab__def">Pleasant surprise; happy accident</p>
              <div class="vocab__actions">
                <button type="button" class="vocab__save">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><path d="M5 12h14M12 5v14"/></svg>
                  Save Word
                </button>
                <button type="button" class="vocab__learned">★ Learned</button>
              </div>
            </div>
            <div class="vocab__list">
              <div class="vocab__list-head">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
                My Vocabulary (<span class="vocab__count">0</span>)
              </div>
              <div class="vocab__chips"></div>
              <p class="vocab__empty">Save words to build your vocabulary list</p>
            </div>
          </div>
        </div>
      </article>

      {{-- 7. Track Your Progress --}}
      <article class="feature-row reveal reveal-fade" style="--mc: #0ea5e9">
        <div class="feature-row__copy reveal reveal-left">
          <h3>Track Your Progress</h3>
          <p>
            Watch your fluency grow, week by week. See your improvements over
            time, set goals, and stay motivated with personalised insights,
            streaks and achievements.
          </p>
          <ul class="feature-row__chips">
            <li class="reveal reveal-pop" style="--d: 0.2s">Daily streaks</li>
            <li class="reveal reveal-pop" style="--d: 0.3s">Performance charts</li>
            <li class="reveal reveal-pop" style="--d: 0.4s">Goal setting</li>
          </ul>
        </div>
        <div class="feature-row__visual reveal reveal-right" style="--d: 0.1s">
          <div class="mock mock--progress">
            <div class="progress__head">
              <strong>Track Your Progress</strong>
              <span>Monitor your learning journey</span>
            </div>
            <div class="progress__stats">
              <div class="pstat">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--accent-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><path d="M12 2c1 3-1 4-1 6a3 3 0 0 0 6 0c0-1-.5-2-.5-2 2 1.5 3.5 4 3.5 7a7 7 0 1 1-14 0c0-3.5 2-6 4-8 .5 1.5 1.5 2 2 3 .5-2 .5-4 0-6z"/></svg>
                <strong>7</strong>
                <span>Day Streak</span>
              </div>
              <div class="pstat">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--accent-green)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                <strong>80%</strong>
                <span>Weekly Goal</span>
              </div>
              <div class="pstat">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--accent-gold)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><path d="m15.5 12.9 1.5 8.5-5-2.7-5 2.7 1.5-8.5"/><circle cx="12" cy="8" r="6"/></svg>
                <strong>12</strong>
                <span>Achievements</span>
              </div>
            </div>
            <div class="progress__chart">
              <div class="progress__chart-head">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M16 7h6v6"/><path d="m22 7-8.5 8.5-5-5L2 17"/></svg>
                Weekly Performance
              </div>
              <svg class="chart" viewBox="0 0 400 170" preserveAspectRatio="none" aria-hidden="true">
                <line x1="30" y1="20" x2="390" y2="20" /><line x1="30" y1="55" x2="390" y2="55" />
                <line x1="30" y1="90" x2="390" y2="90" /><line x1="30" y1="125" x2="390" y2="125" />
                <line x1="30" y1="150" x2="390" y2="150" />
                <polyline class="chart__line chart__line--1" pathLength="1" points="40,110 96,95 152,120 208,70 264,90 320,60 376,50" />
                <polyline class="chart__line chart__line--2" pathLength="1" points="40,130 96,100 152,85 208,95 264,70 320,80 376,55" />
                <polyline class="chart__line chart__line--3" pathLength="1" points="40,90 96,80 152,100 208,65 264,75 320,55 376,42" />
                <text x="40" y="167">Mon</text><text x="96" y="167">Tue</text><text x="152" y="167">Wed</text>
                <text x="208" y="167">Thu</text><text x="264" y="167">Fri</text><text x="320" y="167">Sat</text><text x="376" y="167">Sun</text>
              </svg>
              <div class="progress__legend">
                <span><i style="background: var(--accent-blue)"></i>Speaking</span>
                <span><i style="background: var(--accent-green)"></i>Vocabulary</span>
                <span><i style="background: var(--primary-light)"></i>Listening</span>
              </div>
            </div>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>
