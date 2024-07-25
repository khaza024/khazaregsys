<x-app-layout title="Program">
    {{-- HERO --}}
    @section('hero')
        <section class="hero overlay mb-8"
            style="background-image: url('{{ asset('assets/images/poster-program.png') }}');"
            data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="flex items-center justify-center h-[50vh] md:h-[50vh]">
                    <div class="text-center text-white mt-40">
                        {{-- <h1 class="text-3xl x3s-xs:text-lg xs-md:text-xl md-lg:text-3xl lg:text-4xl font-bold">
                            SDIT KHARISMA AZ-ZAHRA
                        </h1>
                        <h4 class="text-xl x3s-xs:text-xs xs-md:text-sm md-lg:text-xl lg:text-2xl italic font-bold">
                            Membina Akhlaq Meraih Prestasi
                        </h4> --}}
                    </div>
                </div>
            </div>
        </section>
    @endsection

    {{-- Program list --}}
    <div class="grid w-full grid-cols-4 gap-10 py-1/100 px-6.5/100">
        <div class="col-span-4 md:col-span-3">
            <livewire:program-list />
        </div>
        <div id="side-bar"
            class="sticky top-0 h-screen col-span-4 px-1 py-6 pt-10 space-y-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
            @include('programs.partials.search-box')
        </div>
    </div>
</x-app-layout>
