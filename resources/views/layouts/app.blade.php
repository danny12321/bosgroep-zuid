<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
    @yield('head')
</head>
<body>
    <div class="app">
        @include('inc.navbar')
            
        <div class="content-container">
            @yield('content')
        </div>

        @include('inc.footer')
    </div>
</body>
</html>
