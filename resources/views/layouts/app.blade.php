<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Remove default body and html margins/paddings */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        /* Ensure the main content spans full width */
        main {
            width: 100%;
            padding-left: 0;
            padding-right: 0;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <main class="py-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
