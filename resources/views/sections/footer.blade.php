@php
  $legal = [
    ['label' => 'Terms & Conditions', 'href' => 'https://asm080-ai-3d-language.web.app/terms-and-conditions.html'],
    ['label' => 'Privacy Policy', 'href' => 'https://asm080-ai-3d-language.web.app/privacy_policy.html'],
  ];
  $social = [
    ['label' => 'X', 'path' => '<path d="M17.8 3h3.1l-6.8 7.8L22 21h-6.2l-4.9-6.4L5.3 21H2.2l7.3-8.3L2 3h6.4l4.4 5.8L17.8 3zm-1.1 16.2h1.7L7.4 4.7H5.6l11.1 14.5z" fill="currentColor"/>'],
    ['label' => 'LinkedIn', 'path' => '<path d="M4.98 3.5A2.48 2.48 0 1 0 5 8.46 2.48 2.48 0 0 0 4.98 3.5zM3 9.75h4V21H3V9.75zm6.5 0h3.8v1.6h.05c.53-1 1.84-2.05 3.78-2.05 4.04 0 4.79 2.66 4.79 6.12V21h-4v-4.95c0-1.18-.02-2.7-1.65-2.7-1.65 0-1.9 1.29-1.9 2.62V21h-4V9.75z" fill="currentColor"/>'],
    ['label' => 'YouTube', 'path' => '<path d="M22 12s0-3.2-.4-4.7a2.5 2.5 0 0 0-1.8-1.8C18.3 5 12 5 12 5s-6.3 0-7.8.5a2.5 2.5 0 0 0-1.8 1.8C2 8.8 2 12 2 12s0 3.2.4 4.7a2.5 2.5 0 0 0 1.8 1.8C5.7 19 12 19 12 19s6.3 0 7.8-.5a2.5 2.5 0 0 0 1.8-1.8c.4-1.5.4-4.7.4-4.7zM10 15.2V8.8l5.3 3.2-5.3 3.2z" fill="currentColor"/>'],
    ['label' => 'Instagram', 'path' => '<rect x="3" y="3" width="18" height="18" rx="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1.3" fill="currentColor"/>'],
  ];
@endphp

<footer class="footer">
  {{-- Robot greeter on the footer's top edge: says hello in the app's languages (app.js initGreeter). --}}
  <div class="greeter" data-greeter>
    <span class="greeter__bot">
      <video src="{{ asset('videos/tutor-speaking.mp4') }}" muted loop playsinline preload="none" aria-hidden="true"></video>
    </span>
    <span class="greeter__bubble" aria-live="off">
      <span class="greeter__text" data-words="Hello!|¡Hola!|Bonjour!|Olá!|Hallo!|こんにちは!|안녕하세요!|你好!|नमस्ते!|Ciao!|Merhaba!|Привет!|Xin chào!|مرحبا!">Hello!</span>
    </span>
  </div>

  <div class="container footer__inner">
    <nav class="footer__legal" aria-label="Legal">
      @foreach ($legal as $l)
        @if (! $loop->first)<span class="footer__dot" aria-hidden="true"></span>@endif
        <a href="{{ $l['href'] }}" target="_blank" rel="noopener">{{ $l['label'] }}</a>
      @endforeach
    </nav>

    <div class="footer__bottom">
      <div class="footer__brand">
        <span class="footer__logo">
          <img src="{{ asset('images/langla-logo-96.webp') }}" alt="" width="40" height="40" loading="lazy" decoding="async" />
        </span>
        <span>© 2026 Langla. All rights reserved.</span>
      </div>

      <div class="footer__social">
        @foreach ($social as $s)
          <a href="#" onclick="return false" aria-label="{{ $s['label'] }}">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">{!! $s['path'] !!}</svg>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</footer>
