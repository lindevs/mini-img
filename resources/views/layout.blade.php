<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniImg</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
@yield('content')

<script src="{{ mix('resources/js/app.js') }}"></script>
</body>

</html>
