<x-app-layout title="Tentang">
    {{-- HERO --}}
    @section('hero')
        <section class="hero overlay mb-8"
            style="background-image: url('{{ asset('assets/images/camping/camping1.jpg') }}');"
            data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="flex items-center justify-center h-[50vh] md:h-[50vh]">
                    <div class="text-center text-white mt-40">
                        <h1 class="text-3xl x3s-xs:text-lg xs-md:text-xl md-lg:text-3xl lg:text-4xl font-bold">
                            SDIT KHARISMA AZ-ZAHRA
                        </h1>
                        <h4 class="text-xl x3s-xs:text-xs xs-md:text-sm md-lg:text-xl lg:text-2xl italic font-bold">
                            Membina Akhlaq Meraih Prestasi
                        </h4>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    {{-- Tentang Sekolah --}}
    <div class="w-full text-center py-1/100 px-6.5/100">
        <div class="text-black pt-2/100 pb-1/100 px-3/100 my-1/100 mx-3/100">
            <h2 class="text-3xl x3s-md:text-xl font-black mb-5">
                {{ $about->title }}
            </h2>
            <div class="prose prose-lg">
                {!! $about->body !!}
            </div>
        </div>
    </div>
</x-app-layout>