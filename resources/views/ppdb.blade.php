<x-app-layout title="ppdb">
    {{-- HERO --}}
    @section('hero')
        <section class="hero overlay mb-8"
            style="background-image: url('{{ asset('assets/images/poster-ppdb.png') }}');"
            data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="flex items-center justify-center h-[50vh] md:h-[50vh]">
                    <div class="text-center text-white mt-40">
                    </div>
                </div>
            </div>
        </section>
    @endsection

    <div class="w-full text-center py-1/100 px-6.5/100">
        <div class="text-black pt-2/100 pb-1/100 px-3/100 my-1/100 mx-3/100">
            <h2 class="text-3xl x3s-md:text-xl font-black mb-14">
                Informasi PPDB
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="col-span-1 bg-white rounded-lg shadow-md border-1 border-solid border-[#404040]">
                    <h4 class="text-xl x3s-md:text-lg font-black mt-8 mb-4 mx-8">
                        Berkas Pendaftaran
                    </h4>
                    <div class="prose prose-lg mx-8">
                        {!! $berkasPPDB->body !!}
                    </div>
                </div>
                <div class="col-span-1 bg-white rounded-lg shadow-md border-1 border-solid border-[#404040]">
                    <h4 class="text-xl x3s-md:text-lg font-black mt-8 mb-4 mx-8">
                        Alur Pendaftaran
                    </h4>
                    <div class="prose prose-lg mx-8">
                        {!! $alurPPDB->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>