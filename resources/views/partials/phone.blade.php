{{-- Langla speaking-practice screen, rebuilt as live HTML so it can animate.
     app.js (initShowcasePhone) plays the conversation step by step
     (.sc__step -> .is-in) and restarts it whenever the hero scrolls into view. --}}
@php
  $bars = [0.35, 0.6, 0.85, 0.5, 1, 0.65, 0.4];
@endphp
<div class="phone phone--showcase" role="img"
  aria-label="Langla speaking practice: the AI tutor greets you, you reply, and it scores your pronunciation 92%">
  <div class="sc" aria-hidden="true">
    <span class="sc__island"></span>

    <div class="sc__status">
      <span>9:41</span>
      <span class="sc__status-icons"><i></i><i></i><i></i></span>
    </div>

    <div class="sc__robot">
      <span class="sc__robot-glow"></span>
      <img src="{{ asset('images/showcase-robot.webp') }}" alt="" width="320" height="314" fetchpriority="high" />
    </div>

    <div class="sc__msg sc__msg--ai sc__step">
      <span class="sc__voice">
        @foreach ([0.45, 0.8, 1, 0.7, 0.4] as $h)
          <i style="--h: {{ $h }}; --i: {{ $loop->index }}"></i>
        @endforeach
      </span>
      <p><span class="sc__type">Hi! Let’s practice some real conversation.</span></p>
    </div>

    <div class="sc__msg sc__msg--me sc__step">
      <p>Hi! Nice to meet you.</p>
      <img class="sc__user" src="{{ asset('images/showcase-user.webp') }}" alt="" width="96" height="96" />
    </div>

    <div class="sc__msg sc__msg--ai2 sc__step">
      <img class="sc__bot" src="{{ asset('images/robot-avatar.webp') }}" alt="" width="160" height="160" />
      <p><strong>Great! 👍</strong>Your pronunciation is clear and natural.</p>
      <span class="sc__voice sc__voice--sm">
        @foreach ([0.5, 0.9, 0.6, 1, 0.45] as $h)
          <i style="--h: {{ $h }}; --i: {{ $loop->index }}"></i>
        @endforeach
      </span>
    </div>

    <div class="sc__score sc__step">
      <span class="sc__check">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>
      </span>
      <div class="sc__score-text">
        <strong>Good Pronunciation!</strong>
        <small>You sound more natural. Keep going!</small>
      </div>
      <span class="sc__ring">
        <svg viewBox="0 0 44 44">
          <circle cx="22" cy="22" r="18.5" class="sc__ring-track" />
          <circle cx="22" cy="22" r="18.5" class="sc__ring-fill" pathLength="100" />
        </svg>
        <b class="sc__pct" data-to="92">0%</b>
      </span>
    </div>

    <div class="sc__mic sc__step">
      <span class="sc__wave">
        @foreach ($bars as $h)
          <i style="--h: {{ $h }}; --i: {{ $loop->index }}"></i>
        @endforeach
      </span>
      <span class="sc__mic-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5.5 11a6.5 6.5 0 0 0 13 0M12 17.5V21M8.5 21h7"/></svg>
      </span>
      <span class="sc__wave">
        @foreach (array_reverse($bars) as $h)
          <i style="--h: {{ $h }}; --i: {{ $loop->index }}"></i>
        @endforeach
      </span>
    </div>

    <span class="sc__tap sc__step">Tap to speak</span>
  </div>
</div>
