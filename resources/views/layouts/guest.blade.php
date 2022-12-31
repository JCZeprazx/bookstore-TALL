<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex  w-full">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('landing-page') }}">
                                    <x-jet-application-mark class="block h-9 w-auto" />
                                </a>
                            </div>
                            <!-- Navigation Links -->
                            <div
                                class="hidden sm:flex space-x-8 sm:-my-px sm:ml-10  sm:justify-between sm:items-center sm:w-full ">
                                <div class="gap-10 flex w-full">
                                    <x-jet-nav-link href="{{ route('landing-page') }}"
                                        :active="request()->routeIs('landing-page')">
                                        {{ __('Home') }}
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('shop') }}"
                                    :active="request()->routeIs('shop')">
                                        {{ __('Shop') }}
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('about-guest') }}"
                                    :active="request()->routeIs('about-guest')">
                                        {{ __('About') }}
                                    </x-jet-nav-link>
                                </div>
                                <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                    {{ __('Login') }}
                                </x-jet-nav-link>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('landing-page') }}" :active="request()->routeIs('landing-page')">
                            {{ __('Home') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('shop') }}" :active="request()->routeIs('shop')">
                            {{ __('Shop') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('about-guest') }}" :active="request()->routeIs('about-guest')">
                            {{ __('About') }}
                        </x-jet-responsive-nav-link>
                    </div>
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-jet-responsive-nav-link>
                            <x-jet-responsive-nav-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-responsive-nav-link>
                        </div>
                    </div>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>

            <footer>
                @yield('footer')
            </footer>
        </div>
    </div>

</body>

</html>
