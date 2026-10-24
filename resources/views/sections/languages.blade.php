@php
  // Languages supported in the app (same order as the app's language list).
  $languages = [
    ['code' => 'en', 'flag' => 'gb', 'native' => 'English', 'hello' => 'Hello', 'name' => 'English'],
    ['code' => 'es', 'flag' => 'es', 'native' => 'Español', 'hello' => 'Hola', 'name' => 'Spanish'],
    ['code' => 'pt', 'flag' => 'pt', 'native' => 'Português', 'hello' => 'Olá', 'name' => 'Portuguese'],
    ['code' => 'fr', 'flag' => 'fr', 'native' => 'Français', 'hello' => 'Bonjour', 'name' => 'French'],
    ['code' => 'de', 'flag' => 'de', 'native' => 'Deutsch', 'hello' => 'Hallo', 'name' => 'German'],
    ['code' => 'ja', 'flag' => 'jp', 'native' => '日本語', 'hello' => 'こんにちは', 'name' => 'Japanese'],
    ['code' => 'ko', 'flag' => 'kr', 'native' => '한국어', 'hello' => '안녕하세요', 'name' => 'Korean'],
    ['code' => 'zh', 'flag' => 'cn', 'native' => '中文', 'hello' => '你好', 'name' => 'Chinese'],
    ['code' => 'hi', 'flag' => 'in', 'native' => 'हिन्दी', 'hello' => 'नमस्ते', 'name' => 'Hindi'],
    ['code' => 'id', 'flag' => 'id', 'native' => 'Bahasa Indonesia', 'hello' => 'Halo', 'name' => 'Indonesian'],
    ['code' => 'vi', 'flag' => 'vn', 'native' => 'Tiếng Việt', 'hello' => 'Xin chào', 'name' => 'Vietnamese'],
    ['code' => 'ar', 'flag' => 'sa', 'native' => 'العربية', 'hello' => 'مرحبا', 'name' => 'Arabic'],
    ['code' => 'th', 'flag' => 'th', 'native' => 'ไทย', 'hello' => 'สวัสดี', 'name' => 'Thai'],
    ['code' => 'tr', 'flag' => 'tr', 'native' => 'Türkçe', 'hello' => 'Merhaba', 'name' => 'Turkish'],
    ['code' => 'it', 'flag' => 'it', 'native' => 'Italiano', 'hello' => 'Ciao', 'name' => 'Italian'],
    ['code' => 'ru', 'flag' => 'ru', 'native' => 'Русский', 'hello' => 'Привет', 'name' => 'Russian'],
    ['code' => 'nl', 'flag' => 'nl', 'native' => 'Nederlands', 'hello' => 'Hallo', 'name' => 'Dutch'],
    ['code' => 'ms', 'flag' => 'my', 'native' => 'Bahasa Melayu', 'hello' => 'Helo', 'name' => 'Malay'],
    ['code' => 'fil', 'flag' => 'ph', 'native' => 'Filipino', 'hello' => 'Kumusta', 'name' => 'Filipino'],
  ];
  // Two marquee rows moving in opposite directions; the second runs in reverse order.
  $rows = [
    ['dir' => 'left', 'items' => $languages],
    ['dir' => 'right', 'items' => array_reverse($languages)],
  ];
@endphp

<section id="languages" class="section languages">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Languages</span>
      <h2>Speak <span class="text-grad">20+ languages</span><br />with one AI tutor</h2>
      <p>
        From English and Spanish to Japanese, Hindi and Arabic — pick a
        language and start speaking today. Switch anytime and keep all your
        progress.
      </p>
    </div>
  </div>

  <div class="langs reveal reveal-fade">
    @foreach ($rows as $r => $row)
      <div class="langs__row langs__row--{{ $row['dir'] }}">
        {{-- The list is rendered twice so the loop is seamless; the copy is hidden from screen readers. --}}
        @foreach ([false, true] as $isCopy)
          <ul class="langs__list" @if ($isCopy) aria-hidden="true" @elseif ($r === 0) aria-label="Supported languages" @else aria-hidden="true" @endif>
            @foreach ($row['items'] as $l)
              <li class="lang" style="--i: {{ $loop->index }}">
                <span class="lang__flag">
                  <img src="{{ asset('images/flags/'.$l['flag'].'.svg') }}" alt="" width="52" height="52" loading="lazy" decoding="async" />
                </span>
                <span class="lang__body">
                  <span class="lang__hello" lang="{{ $l['code'] }}">{{ $l['hello'] }}</span>
                  <span class="lang__name">{{ $l['name'] }}@if ($l['native'] !== $l['name']) <i>·</i> <span lang="{{ $l['code'] }}">{{ $l['native'] }}</span>@endif</span>
                </span>
              </li>
            @endforeach
          </ul>
        @endforeach
      </div>
    @endforeach
  </div>
</section>
