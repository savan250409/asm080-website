@php
  $items = [
    ['q' => 'What is Langla?', 'a' => 'Langla is a language-learning app that combines short AI video lessons, adaptive quizzes and a personal AI tutor you can chat and speak with — so you learn by actually using the language.'],
    ['q' => 'How much does it cost?', 'a' => 'Langla is free to download and start learning. A PRO plan unlocks unlimited AI tutor conversations, offline lessons and advanced progress insights.'],
    ['q' => 'Which languages can I learn?', 'a' => 'You can learn 40+ languages including Spanish, French, German, Italian, Japanese, Korean and more — and switch between them whenever you like.'],
    ['q' => 'Do I need a teacher or a schedule?', 'a' => 'Not at all. Your AI tutor is available 24/7, so you can practise speaking whenever it suits you — no bookings, no pressure.'],
    ['q' => 'Is it good for complete beginners?', 'a' => 'Yes. The guided Learning Path starts from the very basics and unlocks lessons step by step as you build confidence.'],
    ['q' => 'What makes it different from flashcard apps?', 'a' => 'Instead of memorising lists, you watch real conversations, take smart quizzes and talk with an AI tutor — practising the language the way you will actually use it.'],
  ];
@endphp

<section id="faq" class="section section--tint faq">
  <div class="bg-blobs" aria-hidden="true"><span></span><span></span><span></span></div>
  <div class="container faq__inner">
    <div class="section-head reveal" style="margin-bottom: 56px">
      <span class="eyebrow">FAQ</span>
      <h2>Questions,<br /><span class="text-grad">answered</span></h2>
      <p>What Langla does, what it costs, and how it helps you speak with confidence.</p>
    </div>

    <div class="faq__list">
      @foreach ($items as $i => $item)
        <div class="faq__item reveal reveal-up {{ $i === 0 ? 'is-open' : '' }}" style="--d: {{ $i * 0.07 }}s">
          <button class="faq__q" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}">
            <span>{{ $item['q'] }}</span>
            <span class="faq__toggle">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </button>
          <div class="faq__a" {{ $i === 0 ? '' : 'hidden' }}>
            <div class="faq__a-inner">
              <p>{{ $item['a'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
