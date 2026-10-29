<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/favicon.ico" sizes="any" />
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/favicon-64.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#6C5CE7" />
    <link rel="canonical" href="https://langla-ai-tutor.web.app/" />
    <meta
      name="description"
      content="Langla: AI Language Tutor — learn any language with AI video lessons, smart quizzes, and a personal AI tutor."
    />
    <meta property="og:site_name" content="Langla" />
    <meta property="og:url" content="https://langla-ai-tutor.web.app/" />
    <meta property="og:title" content="Langla: AI Language Tutor" />
    <meta property="og:description" content="Learn any language with AI video lessons, smart quizzes, and a personal AI tutor." />
    <meta property="og:image" content="https://langla-ai-tutor.web.app/images/langla-logo.png" />
    <meta property="og:type" content="website" />
    @verbatim
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Langla",
        "alternateName": "Langla: AI Language Tutor",
        "url": "https://langla-ai-tutor.web.app/"
      }
    </script>
    @endverbatim
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <title>Langla: AI Language Tutor</title>
    {{-- If JS is unavailable, show all scroll-reveal content instead of hiding it. --}}
    <noscript><style>.reveal{opacity:1 !important;animation:none !important}</style></noscript>
    @vite(['resources/js/app.js'])
  </head>
  <body>
    @include('sections.navbar')
    <main>
      @include('sections.hero')
      @include('sections.trustbar')
      @include('sections.features')
      @include('sections.why')
      @include('sections.languages')
      @include('sections.faq')
      @include('sections.download')
    </main>
    @include('sections.footer')
  </body>
</html>
