@php
  $stats = [
    [
      'target' => 5, 'dec' => 0, 'suffix' => ' Million+', 'label' => 'Active learners',
      'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    ],
    [
      'target' => 25, 'dec' => 0, 'suffix' => '+', 'label' => 'Languages',
      'icon' => '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2c3 3 3 17 0 20M12 2c-3 3-3 17 0 20"/>',
    ],
    [
      'target' => 4.5, 'dec' => 1, 'suffix' => '', 'label' => 'Average rating', 'star' => true,
      'icon' => '<path d="M12 2l2.9 6 6.6.6-5 4.3 1.5 6.5L12 16.9 5.9 19.4 7.4 12.9l-5-4.3L9 8z"/>',
    ],
    [
      'target' => 50, 'dec' => 0, 'suffix' => ' Million+', 'label' => 'Lessons played',
      'icon' => '<circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/>',
    ],
  ];
@endphp

<section class="trust">
  <div class="container trust__inner reveal reveal-scale">
    @foreach ($stats as $s)
      <div class="trust__item reveal reveal-pop" style="--d: {{ 0.12 + $loop->index * 0.1 }}s">
        <span class="trust__icon {{ !empty($s['star']) ? 'trust__icon--star' : '' }}">
          <svg viewBox="0 0 24 24"
            fill="{{ !empty($s['star']) ? 'currentColor' : 'none' }}"
            stroke="{{ !empty($s['star']) ? 'none' : 'currentColor' }}"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">{!! $s['icon'] !!}</svg>
        </span>
        <span class="trust__value" data-count data-target="{{ $s['target'] }}" data-dec="{{ $s['dec'] }}" data-suffix="{{ $s['suffix'] }}">
          <span class="trust__num">0{{ $s['dec'] ? '.0' : '' }}{{ $s['suffix'] }}</span>@if (!empty($s['star']))<span class="trust__star" aria-hidden="true">★</span>@endif
        </span>
        <span class="trust__label">{{ $s['label'] }}</span>
      </div>
    @endforeach
  </div>
</section>
