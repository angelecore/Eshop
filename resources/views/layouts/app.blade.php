<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CryptoInfo</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
</head>
<body>
    <div id="app">
        @include('partials.navigation')
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://kit.fontawesome.com/f229fdef99.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
