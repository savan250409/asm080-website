@php
  $reasons = [
    [
      'path' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18"/>',
      'title' => '40+ languages, one app',
      'text' => 'From Spanish to Japanese — switch languages anytime and keep all your progress in one place.',
    ],
    [
      'path' => '<path d="M12 2c1 3-1 4-1 6a3 3 0 0 0 6 0c0-1-.5-2-.5-2 2 1.5 3.5 4 3.5 7a7 7 0 1 1-14 0c0-3.5 2-6 4-8 .5 1.5 1.5 2 2 3 .5-2 .5-4 0-6z"/>',
      'title' => 'Just 10 minutes a day',
      'text' => 'Bite-sized lessons and daily streaks make it easy to build a habit that actually sticks.',
    ],
    [
      'path' => '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>',
      'title' => 'See your progress',
      'text' => 'Streaks, XP and performance charts show exactly how far you have come — and what to practice next.',
    ],
    [
      'path' => '<path d="M12 20s-7-4.5-9.5-9A5 5 0 0 1 12 5a5 5 0 0 1 9.5 6c-2.5 4.5-9.5 9-9.5 9z"/>',
      'title' => 'Made for real humans',
      'text' => 'Friendly, patient and judgment-free. Practice speaking out loud without the fear of getting it wrong.',
    ],
  ];
@endphp

<section id="why" class="section why">
  <div class="bg-blobs" aria-hidden="true"><span></span><span></span><span></span></div>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Why Langla</span>
      <h2>Learning a language,<br /><span class="text-grad">finally made simple</span></h2>
      <p>
        Everything you need to go from beginner to confident speaker — built
        around how people actually learn.
      </p>
    </div>

    <div class="why__grid">
      @foreach ($reasons as $r)
        <article class="why__card card reveal reveal-up" style="--d: {{ $loop->index * 0.12 }}s">
          <span class="why__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">{!! $r['path'] !!}</svg>
          </span>
          <h3>{{ $r['title'] }}</h3>
          <p>{{ $r['text'] }}</p>
        </article>
      @endforeach
    </div>
  </div>
</section>
