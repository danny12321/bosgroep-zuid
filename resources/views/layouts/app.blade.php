<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        @yield('content')

        @include('inc.footer')
    </div>
</body>
</html>
