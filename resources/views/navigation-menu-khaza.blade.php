<nav x-data="{ open: false }" class="py-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-b-5 border-[rgba(255,255,255,0.05)]">
        <div class="flex justify-between h-24">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center lg:mr-0 lgs:mr-24 lg:ml-[12rem]">
                    <a href="{{ route('beranda') }}" class="flex items-center">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
                            class="h-8 sm:h-6 md:h-10 lgs:h-16 lg:h-[1.2rem] mr-2">
                        <span class="text-sm lgs:text-xl font-bold uppercase text-white">
                            SDIT KHARISMA AZ-ZAHRA
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 lg:-ml-8 sm:-my-px sm:ms-4 sm:flex">
                    <x-nav-link href="{{ route('beranda') }}" :active="request()->routeIs('beranda')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link href="{{ url('/program') }}" :active="request()->routeIs('programs.index')">
                        {{ __('Program') }}
                    </x-nav-link>
                    <x-nav-link href="" :active="request()->routeIs('')">
                        {{ __('Tentang') }}
                    </x-nav-link>
                    <x-nav-link href="" :active="request()->routeIs('')">
                        {{ __('Kontak') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden space-x-4 sm:-my-px sm:ms-4 sm:flex">
                <x-nav-link href="" :active="request()->routeIs('')">
                    {{ __('PPDB') }}
                </x-nav-link>
                <x-nav-link href="" :active="request()->routeIs('')">
                    {{ __('Masuk') }}
                </x-nav-link>
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
            <x-responsive-nav-link href="" :active="request()->routeIs('')">
                {{ __('Tentang') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="" :active="request()->routeIs('')">
                {{ __('Kontak') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="" :active="request()->routeIs('')">
                {{ __('PPDB') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="" :active="request()->routeIs('')">
                {{ __('Masuk') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
