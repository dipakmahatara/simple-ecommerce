<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'SoftBenz Infosys Test') }}</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    @vite('resources/css/app.css')
    @stack('css')
</head>

<body class="bg-gray-50 dark:bg-slate-900">
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End Sidebar -->

    <!-- ==========START MAIN CONTENT ========== -->
    @yield('content')
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://preline.co/assets/vendor/preline/preline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    @stack('js')

</body>

</html>