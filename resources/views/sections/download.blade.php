@php
  $stats = [
    ['v' => '50M+', 'l' => 'Lessons played', 'icon' => '<circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/>'],
    ['v' => '4.5', 'l' => 'Average rating', 'icon' => '<path d="M12 2l2.9 6 6.6.6-5 4.3 1.5 6.5L12 16.9 5.9 19.4 7.4 12.9l-5-4.3L9 8z"/>'],
    ['v' => '25+', 'l' => 'Languages', 'icon' => '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3 3 17 0 20M12 2c-3 3-3 17 0 20"/>'],
    ['v' => '5M+', 'l' => 'Downloads', 'icon' => '<path d="M12 3v12M7 10l5 5 5-5M5 21h14"/>'],
  ];
  // Flags that orbit the tutor on the right.
  $orbit = ['gb', 'es', 'fr', 'jp', 'in', 'de', 'kr', 'sa'];
@endphp

<section id="download" class="section download">
  <div class="container">
    <div class="download__card reveal">
      <div class="download__bg" aria-hidden="true">
        <span class="download__orb download__orb--1"></span>
        <span class="download__orb download__orb--2"></span>
        <span class="download__grid"></span>
      </div>

      <div class="download__content">
        <span class="eyebrow eyebrow--light">Start today</span>
        <h2>Your AI language tutor is ready when you are</h2>
        <p>
          Join 50,000+ learners speaking a new language with confidence.
          Download Langla and start your first lesson in under a minute.
        </p>

        <div class="download__badges">
          <a class="store-badge" href="{{ config('app.play_store_url') }}" target="_blank" rel="noopener" aria-label="Get it on Google Play">
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
          <span class="download__rating" aria-label="Rated 4.5 out of 5">
            <span class="download__stars" aria-hidden="true">★★★★★</span>
            <span><b>4.5</b> rating</span>
          </span>
        </div>

        <div class="download__stats">
          @foreach ($stats as $s)
            <div class="download__stat reveal reveal-pop" style="--d: {{ 0.1 + $loop->index * 0.1 }}s">
              <span class="download__stat-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $s['icon'] !!}</svg>
              </span>
              <span class="download__stat-text">
                <strong>{{ $s['v'] }}</strong>
                <span>{{ $s['l'] }}</span>
              </span>
            </div>
          @endforeach
        </div>
      </div>

      {{-- The tutor (speaking clip) with language flags orbiting around it. --}}
      <div class="download__visual reveal reveal-scale" style="--d: 0.15s" aria-hidden="true">
        <span class="download__ring download__ring--outer"></span>
        <span class="download__ring download__ring--inner"></span>
        <div class="download__orbit">
          @foreach ($orbit as $f)
            <span class="download__flag" style="--a: {{ $loop->index * (360 / count($orbit)) }}deg">
              <img src="{{ asset('images/flags/'.$f.'.svg') }}" alt="" width="40" height="40" loading="lazy" decoding="async" />
            </span>
          @endforeach
        </div>
        <div class="download__bot">
          <video src="{{ asset('videos/tutor-speaking.mp4') }}" muted loop playsinline preload="none" data-inview-video></video>
        </div>
        <span class="download__chip download__chip--top">🎧 Live AI tutor</span>
        <span class="download__chip download__chip--bottom">⚡ First lesson in 1 min</span>
      </div>
    </div>
  </div>
</section>
