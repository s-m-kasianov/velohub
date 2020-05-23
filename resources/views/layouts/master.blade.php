<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', main()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')

    <div id="content">
        @yield('content')
    </div>

    @include('layouts.footer')
    @include('layouts.scripts')
    @include('modals.cart')
</body>
</html>
