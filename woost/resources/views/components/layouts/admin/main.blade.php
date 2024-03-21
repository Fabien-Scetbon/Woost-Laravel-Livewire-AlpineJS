<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta tags, SEO, CSS links, and other head content here -->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="body__wrapper" id="original-content">

    @include('components.layouts.admin.navbar')

    @yield('mainContent')


    <style>
        .menu-visible {
            max-height: 100px;
            opacity: 1;
            transition: opacity 1s ease, max-height 0.5s ease;
        }

        .hidden-icon {
            display: none;
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
        const open = document.querySelector('#open');
        const close = document.querySelector('#close');
        const navToggler = document.querySelector('.toggleNav');
        const passwordInput = document.querySelector('#password');
        const togglePasswordButton = document.querySelector('#togglePassword');

        togglePasswordButton.addEventListener('click', () => {

            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';

            passwordInput.setAttribute('type', type);
            open.classList.toggle('hidden-icon');
            close.classList.toggle('hidden-icon');
        });

        navToggler.addEventListener('click', () => {

            const menu = document.querySelector('#navigation');

            menu.classList.toggle('menu-visible');
            menu.classList.toggle('menu-hidden');
        })
    </script>

</body>

</html>