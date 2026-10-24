@php($light = $light ?? false)
<a href="#top" class="logo {{ $light ? 'logo--light' : '' }}" aria-label="Langla: AI Language Tutor">
  <span class="logo__mark">
    <img src="{{ asset('images/langla-logo-96.webp') }}" alt="" width="40" height="40" />
  </span>
  <span class="logo__text">Langla</span>
</a>
