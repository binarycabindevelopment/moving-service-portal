<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('components.layout.head')
</head>
<body class="bg-grey-lightest h-screen antialiased" v-cloak>
    <div id="app" class="h-screen">
        <div class="bg-white flex flex-col md:flex-row h-screen">
            <div class="md:w-1/2 xl:w-1/4 flex flex-col">
                @yield('content')
            </div>
            <div class="flex-1 bg-no-repeat bg-cover bg-center" style="background-image: url('{{ $graphic }}');">
                
            </div>
        </div>
    </div>
    @include('components.layout.scripts')
</body>
</html>
