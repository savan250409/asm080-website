@php
  $links = [
    ['href' => '#features', 'label' => 'Features'],
    ['href' => '#why', 'label' => 'Why Langla'],
    ['href' => '#languages', 'label' => 'Languages'],
    ['href' => '#faq', 'label' => 'FAQ'],
  ];
@endphp

<header id="top" class="nav">
  <div class="nav__inner reveal reveal-down">
    @include('partials.logo')

    <nav class="nav__links" aria-label="Primary">
      @foreach ($links as $l)
        <a href="{{ $l['href'] }}">{{ $l['label'] }}</a>
      @endforeach
    </nav>

    <div class="nav__actions">
      <a href="{{ config('app.play_store_url') }}" target="_blank" rel="noopener" class="btn btn--primary nav__cta">Get Started</a>
      <button class="nav__burger" aria-label="Toggle menu" aria-expanded="false">
        <svg data-icon="menu" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
        <svg data-icon="close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" hidden><path d="M6 6l12 12M18 6L6 18"/></svg>
      </button>
    </div>
  </div>

  <div class="nav__mobile" hidden>
    @foreach ($links as $l)
      <a href="{{ $l['href'] }}">{{ $l['label'] }}</a>
    @endforeach
    <a href="{{ config('app.play_store_url') }}" target="_blank" rel="noopener" class="btn btn--primary">Get Started</a>
  </div>
</header>
