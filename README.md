# Langla — Landing Page (Laravel)

Marketing landing page for the Langla language-learning app, built with **Laravel 12** (Blade + Vite). The purple theme matches the mobile app.

It showcases three features:

1. **Learn with AI Video** — real-life clips with interactive subtitles.
2. **Learn with Quizzes** — adaptive quizzes with instant scoring.
3. **Learn with an AI Tutor** — voice/text conversations with an AI tutor.

## Where things live

```
resources/
├── views/
│   ├── welcome.blade.php        # page shell (head, @vite, section includes)
│   ├── sections/                # navbar, hero, trustbar, features, learning-path,
│   │                            # why, faq, download, footer
│   └── partials/                # logo, phone (app mockup)
├── css/
│   ├── app.css                  # entry — imports everything in parts/
│   └── parts/theme.css          # design tokens (purple palette, radii, shadows)
└── js/app.js                    # nav menu, learning-path tabs, FAQ, scroll reveal
routes/web.php                   # GET / -> welcome view
```

## Run locally

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build
php artisan serve
```

Then open http://127.0.0.1:8000. For live CSS/JS reloading while editing, run `npm run dev` alongside `php artisan serve`.

## Theme

Brand color is `--primary: #6c5ce7` with a `#8b7cf6 → #6c5ce7` gradient, defined in `resources/css/parts/theme.css`.
