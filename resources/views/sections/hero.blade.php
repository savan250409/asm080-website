@php
  $iconStroke = 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
@endphp

<section class="hero">
  <div class="hero__bg" aria-hidden="true">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
  </div>

  <div class="container hero__inner">
    <div class="hero__copy">
      <span class="eyebrow reveal reveal-up" style="--d: 0.05s">
        <svg viewBox="0 0 24 24" {!! $iconStroke !!} width="15" height="15"><path d="M12 3l1.8 4.9L19 9.7l-4.9 1.8L12 16.4l-1.8-4.9L5 9.7l5.2-1.8z"/></svg>
        AI-powered language coach
      </span>

      <h1 class="reveal reveal-up" style="--d: 0.15s">Speak a new language with your <span class="hero__grad">AI tutor</span></h1>

      <p class="hero__lead reveal reveal-up" style="--d: 0.3s">
        Learn faster with AI video lessons, smart quizzes and a friendly AI tutor
        that talks back — anytime, at your own pace. No scheduling, no pressure,
        just real progress.
      </p>

      <div class="hero__cta reveal reveal-up" style="--d: 0.45s">
        <a class="store-badge store-badge--dark" href="{{ config('app.play_store_url') }}" target="_blank" rel="noopener" aria-label="Get it on Google Play">
          <span class="store-badge__icon" aria-hidden="true">
            <svg viewBox="0 0 48 48" width="26" height="26" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 3 L28 24 L7 45 Z" fill="#00C3FF"/>
              <path d="M7 3 L34 19.7 L28 24 Z" fill="#00E676"/>
              <path d="M34 19.7 L41 24 L34 28.3 L28 24 Z" fill="#FFCE00"/>
              <path d="M7 45 L28 24 L34 28.3 Z" fill="#FF3A44"/>
            </svg>
          </span>
          <span class="store-badge__text">
            <small>GET IT ON</small>
            <strong>Google Play</strong>
          </span>
        </a>
        <a href="#features" class="btn btn--ghost">Explore features</a>
      </div>

      <div class="hero__rating reveal reveal-fade" style="--d: 0.6s">
        <span class="hero__stars">
          @for ($i = 0; $i < 5; $i++)
            <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 2l2.9 6 6.6.6-5 4.3 1.5 6.5L12 16.9 5.9 19.4 7.4 12.9l-5-4.3L9 8z"/></svg>
          @endfor
        </span>
        <span><strong>4.9/5</strong> from 50K+ learners</span>
      </div>
    </div>

    <div class="hero__visual reveal reveal-right" style="--d: 0.25s">
      @include('partials.phone')
      <div class="float-card float-card--top">
        <span class="float-card__icon">🎬</span>
        <div>
          <strong>Lesson complete</strong>
          <small>+20 XP earned</small>
        </div>
      </div>
      <div class="float-card float-card--bottom">
        <span class="float-card__icon float-card__icon--green">✓</span>
        <div>
          <strong>Great pronunciation!</strong>
          <small>98% accuracy</small>
        </div>
      </div>
    </div>
  </div>
</section>
