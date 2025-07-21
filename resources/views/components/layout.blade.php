<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trippa Advisor - recensioni sui ristoranti">
    <meta name="keywords" content="ristoranti, recensioni, trippa advisor">
    <meta name="author" content="noi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="xxx.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Biblioteca</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-900">

    <x-navbar></x-navbar>

    {{ $slot }}

    {{-- FontAwesome Icons --}}
    <script src="https://kit.fontawesome.com/141c05eb74.js" crossorigin="anonymous"></script>

</body>

</html>
