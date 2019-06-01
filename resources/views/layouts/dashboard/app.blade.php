<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('components.layout.head')
</head>
<body class="bg-grey-lightest h-screen antialiased">
<div id="app" class="h-screen">
    <div class="lg:flex h-screen">
        <div class="w-80 bg-white shadow lg:flex flex-col absolute lg:relative pin-l pin-t pin-b lg:pin-none" v-bind:class="{ 'hidden-sidebar': !sidebar }">
            <div class="pt-4 px-4 hidden lg:block">
                <div class="mb-4 text-left">
                    <img src="{{ asset('/img/logo.png') }}" style="height: 60px;"/>
                </div>
            </div>
            <div class="w-full h-16 flex lg:hidden">
                <a href="#" v-on:click="toggleSidebar()" class="flex justify-between h-16 px-6 py-4 text-brand hover:text-brand-dark hover:bg-grey-lighter no-underline">
                    <div class="text-brand flex justify-center flex-col text-lg"><div class="self-center"><i class="fas fa-times-circle"></i></div></div>
                </a>
            </div>
            <div class="flex-1 overflow-auto">

                @component('components.sidebar.navigation-group',['title'=>'<i class="fas fa-male mr-4"></i> Leads'])
                    @component('components.sidebar.sub-link',['url'=>'#']) Local @endcomponent
                    @component('components.sidebar.sub-link',['url'=>'#']) Interstate @endcomponent
                @endcomponent

                @component('components.sidebar.navigation-group',['title'=>'<i class="fas fa-calendar-alt mr-4"></i> Price &amp; Availability'])
                    @component('components.sidebar.sub-link',['url'=>'/manage/availability']) Manage Availability @endcomponent
                    @component('components.sidebar.sub-link',['url'=>'/manage/rule']) Manage Rules @endcomponent
                @endcomponent

            </div>
        </div>
        <div class="flex-1">
            <div class="bg-white w-full shadow h-16 flex justify-end">
                <div class="block lg:hidden">
                    <a href="#" v-on:click="toggleSidebar()" class="flex justify-between h-16 px-6 py-4 text-brand hover:text-brand-dark hover:bg-grey-lighter no-underline">
                        <div class="text-brand flex justify-center flex-col text-lg"><div class="self-center"><i class="fas fa-bars"></i></div></div>
                    </a>
                </div>
                <div class="flex-1 block lg:hidden text-center self-center">
                    <img src="{{ asset('/img/logo.png') }}" style="height: 40px;"/>
                </div>
                <div class="relative">
                    <a href="javascript:;" v-on:click="toggleDropdown('user')" class="flex justify-between px-4 py-4 text-brand hover:text-brand-dark hover:bg-grey-lighter no-underline">
                        <div class="rounded-full h-8 w-8 text-center bg-brand text-white flex justify-center flex-col"><div class="self-center"><i class="fas fa-user"></i></div></div>
                    </a>
                    <transition name="slide">
                        <div class="slide-transition-element relative" v-if="dropdown=='user'">
                            <div class="bg-white shadow absolute mt-0 pin-t pin-r z-50" style="min-width:300px;">
                                <div class="bg-brand p-4 text-white">
                                    @if(!empty(\Auth::user()->name)){{ \Auth::user()->name }}<br>@endif
                                    <small>{{ \Auth::user()->email }}</small>
                                </div>
                                <div class="bg-white">
                                    <a href="{{ url('/account/user') }}" class="block px-4 py-3 no-underline text-brand-dark hover:bg-grey-lighter">My Account</a>
                                    <a href="{{ route('logout') }}"
                                       class="block px-4 py-3 no-underline text-brand-dark hover:bg-grey-lighter"
                                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>

            </div>
            <div class="p-8">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('components.layout.scripts')
</body>
</html>
