<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>MiniImg</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite('resources/assets/css/app.css')
</head>
<body>
@yield('content')

@vite('resources/assets/js/app.js')
</body>

</html>
