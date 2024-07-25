<nav x-data="{ open: false }" class="py-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-b-cs">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center lg:mr-24">
                    <a href="{{ route('beranda') }}" class="flex items-center">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
                            class="h-8 sm:h-6 md:h-10 lg:h-16 mr-2">
                        <span class="text-sm lg:text-xl font-bold uppercase text-white">
                            SDIT KHARISMA AZ-ZAHRA
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                    <div class="hidden space-x-4 sm:-my-px sm:ms-4 sm:flex">
                        <x-nav-link href="{{ route('beranda') }}" :active="request()->routeIs('beranda')">
                            {{ __('Beranda') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('programs.index') }}" :active="request()->routeIs('programs.index')">
                            {{ __('Program') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('tentang') }}" :active="request()->routeIs('tentang')">
                            {{ __('Tentang') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('kontak') }}" :active="request()->routeIs('kontak')">
                            {{ __('Kontak') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('ppdb') }}" :active="request()->routeIs('ppdb')">
                            {{ __('PPDB') }}
                        </x-nav-link>
                    </div>
                @else
                    <div class="hidden space-x-4 sm:-my-px sm:ms-4 sm:flex">
                        <x-nav-link href="{{ route('beranda') }}" :active="request()->routeIs('beranda')">
                            {{ __('Beranda') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('programs.index') }}" :active="request()->routeIs('programs.index')">
                            {{ __('Program') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('tentang') }}" :active="request()->routeIs('tentang')">
                            {{ __('Tentang') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('kontak') }}" :active="request()->routeIs('kontak')">
                            {{ __('Kontak') }}
                        </x-nav-link>
                    </div>
                @endauth
            </div>

            <div class="hidden space-x-4 sm:-my-px sm:ms-4 sm:flex">
                @auth
                    @can('view-admin', App\Models\User::class)
                        <x-nav-link class="hidden lgs:block lgs:mt-[2.273rem]" :navigate='false' href="{{ route('filament.admin.auth.login') }}"
                            :active="request()->routeIs('filament.admin.auth.login')">
                            {{ __('Dashboard') }} | {{ Auth::user()->name }}
                        </x-nav-link>
                    @endcan
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 mt-8">
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            {{-- Dashbord Link for Screen Suzes Below 1440px --}}
                            @can('view-admin', App\Models\User::class)
                                <x-dropdown-link class="lgs:hidden" :navigate='false'
                                    href="{{ route('filament.admin.auth.login') }}" :active="request()->routeIs('filament.admin.auth.login')">
                                    {{ __('Dashboard') }} | {{ Auth::user()->name }}
                                </x-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-200"></div>

                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Kelola Akun') }}
                            </div>

                            <x-dropdown-link wire:navigate href="{{ route('profile.show') }}">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Keluar') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-nav-link href="{{ route('ppdb') }}" :active="request()->routeIs('ppdb')">
                        {{ __('PPDB') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Masuk') }}
                    </x-nav-link>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('beranda') }}" :active="request()->routeIs('beranda')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('programs.index') }}" :active="request()->routeIs('programs.index')">
                {{ __('Program') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('tentang') }}" :active="request()->routeIs('tentang')">
                {{ __('Tentang') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('kontak') }}" :active="request()->routeIs('kontak')">
                {{ __('Kontak') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('ppdb') }}" :active="request()->routeIs('ppdb')">
                {{ __('PPDB') }}
            </x-responsive-nav-link>
            @auth
                @can('view-admin', App\Models\User::class)
                    <x-responsive-nav-link href="{{ route('filament.admin.auth.login') }}" :active="request()->routeIs('filament.admin.auth.login')">
                        {{ __('Dashboard') }} | {{ Auth::user()->name }}
                    </x-responsive-nav-link>
                @endcan
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Keluar') }}
                    </x-responsive-nav-link>
                </form>
            @else
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Masuk') }}
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>
