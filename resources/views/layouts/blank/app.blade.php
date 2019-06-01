<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('components.layout.head')
</head>
<body class="bg-grey-lightest h-screen antialiased">
    <div id="app">
        @yield('content')
    </div>
    @include('components.layout.scripts')
</body>
</html>
