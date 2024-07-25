<x-app-layout title="Kegiatan">
    {{-- HERO --}}
    @section('hero')
        <section class="hero overlay mb-8"
            style="background-image: url('{{ asset('assets/images/poster-program.png') }}');"
            data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="flex items-center justify-center h-[50vh] md:h-[50vh]">
                    <div class="text-center text-white mt-40">
                    </div>
                </div>
            </div>
        </section>
    @endsection

    {{-- Information list --}}
    <div class="grid w-full grid-cols-4 gap-10 py-1/100 px-6.5/100">
        <div class="col-span-4 md:col-span-3">
            <livewire:blog-list />
            <a href="{{ route('beranda') }}"
                class="inline-flex items-center px-4 py-2 mt-4 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 14.707a1 1 0 01-1.414 0L7 10.414 3.707 13.707a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4-4a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>
        <div id="side-bar"
            class="sticky top-0 h-screen col-span-4 px-3 py-6 pt-10 space-y-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
            @include('blogs.partials.search-box')

            @include('blogs.partials.categories-box')
        </div>
    </div>
</x-app-layout>
