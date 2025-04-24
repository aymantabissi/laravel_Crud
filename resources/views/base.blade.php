<!-- resources/views/base.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    @include('nav')  <!-- This includes the navigation bar from nav.blade.php -->
    <div class="container">
        @yield('main')  <!-- This is where the content of each page will be injected -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    

</body>
</html>
