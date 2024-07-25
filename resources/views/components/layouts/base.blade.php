@props([
    'livewire' => null,
    'title'
])

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ __('filament-panels::layout.direction') ?? 'ltr' }}"
    @class([
        'fi min-h-screen',
        'dark' => filament()->hasDarkModeForced(),
    ])
>
    <head>
        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::HEAD_START, scopes: $livewire->getRenderHookScopes()) }} --}}

        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        @if ($favicon = filament()->getFavicon())
            <link rel="icon" href="{{ $favicon }}" />
        @else
            <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
        @endif

        {{-- @php
            $title = strip_tags(($livewire ?? null)?->getTitle() ?? '');
            $brandName = strip_tags(filament()->getBrandName());
        @endphp --}}

        <title>
            {{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', '') }}
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::STYLES_BEFORE, scopes: $livewire->getRenderHookScopes()) }} --}}

        <style>
            [x-cloak=''],
            [x-cloak='x-cloak'],
            [x-cloak='1'] {
                display: none !important;
            }

            @media (max-width: 1023px) {
                [x-cloak='-lg'] {
                    display: none !important;
                }
            }

            @media (min-width: 1024px) {
                [x-cloak='lg'] {
                    display: none !important;
                }
            }
        </style>

        @filamentStyles

        {{-- {{ filament()->getTheme()->getHtml() }}
        {{ filament()->getFontHtml() }} --}}

        <style>
            :root {
                --font-family: '{!! filament()->getFontFamily() !!}';
                --sidebar-width: {{ filament()->getSidebarWidth() }};
                --collapsed-sidebar-width: {{ filament()->getCollapsedSidebarWidth() }};
                --default-theme-mode: {{ filament()->getDefaultThemeMode()->value }};
            }

            .font-custom {
                font-family: Montserrat, Poppins;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')

        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::STYLES_AFTER, scopes: $livewire->getRenderHookScopes()) }} --}}

        @if (! filament()->hasDarkMode())
            <script>
                localStorage.setItem('theme', 'light')
            </script>
        @elseif (filament()->hasDarkModeForced())
            <script>
                localStorage.setItem('theme', 'dark')
            </script>
        @else
            <script>
                const theme = localStorage.getItem('theme') ?? @js(filament()->getDefaultThemeMode()->value)

                if (
                    theme === 'dark' ||
                    (theme === 'system' &&
                        window.matchMedia('(prefers-color-scheme: dark)')
                            .matches)
                ) {
                    document.documentElement.classList.add('dark')
                }
            </script>
        @endif

        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::HEAD_END, scopes: $livewire->getRenderHookScopes()) }} --}}
    </head>

    <body
        {{ $attributes
                ->merge(($livewire ?? null)?->getExtraBodyAttributes() ?? [], escape: false)
                ->class([
                    'fi-body',
                    'font-custom',
                    'fi-panel-' . filament()->getId(),
                    'min-h-screen bg-gray-50 font-normal text-gray-950 antialiased dark:bg-gray-950 dark:text-white',
                ]) }}
    >
        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::BODY_START, scopes: $livewire->getRenderHookScopes()) }} --}}

        <header class="bg-[rgba(248,113,58,1)] sticky top-0 left-0 w-full z-[5]">
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
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="w-full text-center py-1/100 px-6.5/100 mb-2">
            <div class="text-black pt-2/100 pb-1/100 px-3/100 my-1/100 mx-3/100">
                <h2 class="text-3xl x3s-md:text-xl font-black mb-2 mt-2">
                    {{ $title }}
                </h2>
                {{ $slot }}
            </div>
        </main>

        <footer class="bg-[rgba(248,113,58,1)] w-full text-center py-1/100 px-3.5/100">
            <div class="grid grid-cols-1 sm:grid-cols-2 md-lg:grid-cols-4 lg-lgs:grid-cols-3 gap-4 pt-1/100 pb-1/100 px-3/100 my-2/100 mx-3/100">
                <div class="col-span-1 md:mt-[.07rem] lgs:mt-[1rem]">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
                        class="w-12 h-12 lgs:ml-[5.5rem] lg:ml-[3.5rem] md-lg:ml-[4.7rem] xs-md:ml-[9.7rem] x2s-xs:ml-[7.9rem] x3s-x2s:ml-[6.75rem]">
                    <span class="text-sm lgs:text-md lgs:-ml-[23.5rem] lg:-ml-[3.57rem] md-lg:-ml-[6.7rem] font-bold uppercase text-white">
                        SDIT KHARISMA AZ-ZAHRA
                    </span>
                </div>
                <div
                    class="col-span-1 lgs:mt-[7.7rem] lgs:-ml-[37.5rem] text-xs lgs:text-sm lg:mt-[3.7rem] lg:ml-[1rem] md-lg:mt-[2.25rem] xs-md:my-2 text-white font-semibold">
                    <p>&copy;Copyright Khazaregsys 2024. All Right Reserved</p>
                    <p>Designed & Develop by Imah</p>
                </div>
                <div
                    class="col-span-1 lgs:col-span-2 lgs:ml-[65.57rem] lgs:-mt-[11.39rem] lg:ml-[3.2rem] lg-lgs:col-span-1 md-lg:col-span-2 md-lg:mx-[13.97rem] md-lg:mt-[1.3rem] xs-md:ml-[5.7rem] x2s-xs:ml-[4.3rem] x3s-x2s:ml-[2.9rem] text-xs text-white font-semibold">
                    <a href="https://www.instagram.com/sdit.kharisma.azzahra" class="flex items-center mb-2">
                        <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white">
                            <path
                                d="M12 0c3.3 0 3.675.012 4.965.072 1.24.057 2.082.254 2.85.54a5.678 5.678 0 0 1 2.053 1.283 5.678 5.678 0 0 1 1.283 2.053c.286.768.484 1.61.54 2.85.06 1.29.072 1.665.072 4.965s-.012 3.675-.072 4.965c-.057 1.24-.254 2.082-.54 2.85a5.678 5.678 0 0 1-1.283 2.053 5.678 5.678 0 0 1-2.053 1.283c-.768.286-1.61.484-2.85.54-1.29.06-1.665.072-4.965.072s-3.675-.012-4.965-.072c-1.24-.057-2.082-.254-2.85-.54a5.678 5.678 0 0 1-2.053-1.283 5.678 5.678 0 0 1-1.283-2.053c-.286-.768-.484-1.61-.54-2.85C.012 15.675 0 15.3 0 12s.012-3.675.072-4.965c.057-1.24.254-2.082.54-2.85a5.678 5.678 0 0 1 1.283-2.053A5.678 5.678 0 0 1 3.948.612c.768-.286 1.61-.484 2.85-.54C8.325.012 8.7 0 12 0zm0 1.75c-3.257 0-3.635.012-4.917.071-1.16.054-1.793.25-2.24.41-.6.208-1.027.457-1.48.91-.453.453-.702.88-.91 1.48-.16.447-.356 1.08-.41 2.24-.06 1.282-.071 1.66-.071 4.917s.012 3.635.071 4.917c.054 1.16.25 1.793.41 2.24.208.6.457 1.027.91 1.48.453.453.88.702 1.48.91.447.16 1.08.356 2.24.41 1.282.06 1.66.071 4.917.071s3.635-.012 4.917-.071c1.16-.054 1.793-.25 2.24-.41.6-.208 1.027-.457 1.48-.91.453-.453.702-.88.91-1.48.16-.447.356-1.08.41-2.24.06-1.282.071-1.66.071-4.917s-.012-3.635-.071-4.917c-.054-1.16-.25-1.793-.41-2.24-.208-.6-.457-1.027-.91-1.48-.453-.453-.88-.702-1.48-.91-.447-.16-1.08-.356-2.24-.41C15.635 1.762 15.257 1.75 12 1.75zm0 4.583a5.667 5.667 0 1 1 0 11.333 5.667 5.667 0 0 1 0-11.333zm0 1.75a3.917 3.917 0 1 0 0 7.833 3.917 3.917 0 0 0 0-7.833zm6.583-3.033a1.333 1.333 0 1 1 0 2.667 1.333 1.333 0 0 1 0-2.667z" />
                        </svg>
                        <span>sdit.kharisma.azzahra</span>
                    </a>
                    <a href="https://www.facebook.com/Kharisma.Azzahra" class="flex items-center mb-2">
                        <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white">
                            <path
                                d="M22.675 0h-21.35C.588 0 0 .588 0 1.325v21.351C0 23.412.588 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.66-4.788 1.325 0 2.462.099 2.795.143v3.24h-1.917c-1.504 0-1.797.716-1.797 1.764v2.312h3.592l-.468 3.622h-3.124V24h6.125c.737 0 1.325-.588 1.325-1.324V1.325C24 .588 23.412 0 22.675 0z" />
                        </svg>
                        <span>Kharisma Azzahra</span>
                    </a>
                    <a href="https://www.youtube.com/channel/SDITKharismaAzZahra" class="flex items-center">
                        <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white">
                            <path
                                d="M23.498 6.186a2.965 2.965 0 0 0-2.093-2.097C19.665 3.5 12 3.5 12 3.5s-7.665 0-9.405.589a2.965 2.965 0 0 0-2.093 2.097C0 7.927 0 12 0 12s0 4.073.502 5.814a2.965 2.965 0 0 0 2.093 2.097C4.335 20.5 12 20.5 12 20.5s7.665 0 9.405-.589a2.965 2.965 0 0 0 2.093-2.097C24 16.073 24 12 24 12s0-4.073-.502-5.814zM9.545 15.568V8.432L15.455 12l-5.91 3.568z" />
                        </svg>
                        <span>SDIT Kharisma Az-Zahra</span>
                    </a>
                </div>
            </div>
        </footer>

        @livewire(Filament\Livewire\Notifications::class)

        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SCRIPTS_BEFORE, scopes: $livewire->getRenderHookScopes()) }} --}}

        @filamentScripts(withCore: true)

        @if (filament()->hasBroadcasting() && config('filament.broadcasting.echo'))
            <script data-navigate-once>
                window.Echo = new window.EchoFactory(@js(config('filament.broadcasting.echo')))

                window.dispatchEvent(new CustomEvent('EchoLoaded'))
            </script>
        @endif

        @stack('scripts')

        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SCRIPTS_AFTER, scopes: $livewire->getRenderHookScopes()) }} --}}

        {{-- {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::BODY_END, scopes: $livewire->getRenderHookScopes()) }} --}}
    </body>
</html>
