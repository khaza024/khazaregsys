<x-app-layout title="Kontak">
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
            <h2 class="text-3xl x3s-md:text-xl font-black mb-10">
                Kontak Sekolah
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="col-span-1">
                    <div class="prose prose-lg">
                        {!! $kontak->body !!}
                    </div>
                </div>
                <div class="col-span-1">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.080103642571!2d107.00284099999999!3d-6.383662499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6995b20e08eab1%3A0xd79300c6120163de!2sSDIT%20Kharisma%20Az-zahra!5e0!3m2!1sid!2sid!4v1718455310417!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
