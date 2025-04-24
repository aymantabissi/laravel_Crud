<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Dark mode styles for specific components */
        body.bg-dark .card,
        body.bg-dark .navbar,
        body.bg-dark .dropdown-menu,
        body.bg-dark .table,
        body.bg-dark input,
        body.bg-dark select,
        body.bg-dark textarea {
            background-color: #2c2c2c !important;
            color: #ffffff !important;
        }

        body.bg-dark .table thead {
            background-color: #212529 !important;
        }

        body.bg-dark .btn-primary,
        body.bg-dark .btn-success,
        body.bg-dark .btn-warning {
            color: #fff !important;
        }

        body.bg-dark a {
            color: #9ddcff;
        }

        body.rtl {
            direction: rtl;
        }

        body.ltr {
            direction: ltr;
        }
    </style>
</head>
<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

    @include('nav') <!-- Navigation -->

    <div class="container my-4">
        @yield('main')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const body = document.body;
            const toggleBtn = document.getElementById('toggle-dark');

            // Apply dark mode if previously enabled
            if (localStorage.getItem('dark-mode') === 'true') {
                body.classList.add('bg-dark', 'text-white');
            }

            // Toggle dark mode on button click
            toggleBtn?.addEventListener('click', () => {
                body.classList.toggle('bg-dark');
                body.classList.toggle('text-white');
                localStorage.setItem('dark-mode', body.classList.contains('bg-dark'));
            });
        });
    </script>
</body>
</html>
