<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta tags, SEO, CSS links, and other head content here -->

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="body__wrapper" id="original-content">

    @include('components.layouts.theme.navbar')

    @yield('mainContent')

    @include('components.layouts.theme.footer')

    <style>
        .menu-visible {
            max-height: 100px;
            opacity: 1;
            transition: opacity 1s ease, max-height 0.5s ease;
        }

        @media (min-width: 1024px) {
            .top-navbar {
                display: inline-flex !important;
            }
        }

        @media (max-width: 1024px) {
            .menu-hidden {
            max-height: 0;
            opacity: 0;
            transition: opacity 1s ease, max-height 0.5s ease;
        }
        }
    </style>

    <script>
        let navToggler = document.querySelector('.nav-toggler');

        navToggler.addEventListener('click', () => {

            let menu = document.querySelector('#navigation');

            menu.classList.toggle('menu-visible');
            menu.classList.toggle('menu-hidden');
        })
    </script>

</body>

</html>