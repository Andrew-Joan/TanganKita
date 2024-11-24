<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

        a {
            text-decoration: none;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <main class="py-3">
        @yield('content')
    </main>

    <footer class="py-3 text-center bg-white">
        <p>&copy; 2024 Tangankita. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
