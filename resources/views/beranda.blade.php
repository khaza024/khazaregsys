<x-app-layout title="Beranda">
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
    
    {{-- PROGRAM PENUNJANG --}}
    <div class="w-full text-center py-1/100 px-3.5/100 mb-8">
        <div class="text-black pt-2/100 pb-1/100 px-3/100 my-1/100 mx-3/100">
            <h2 class="text-3xl x3s-md:text-xl font-black mb-3">
                Program Penunjang
            </h2>
            <p class="text-lg x3s-md:text-sm font-medium">
                Sebuah kegiatan penunjang di sekolah
            </p>
        </div>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-1/100 pb-1/100 px-3/100 my-2/100 mx-3/100">
            @foreach ($programs as $program)
                <x-programs.card-program :program="$program" />
            @endforeach
        </div>
    </div>

    {{-- KEGIATAN --}}
    <div class="activity w-full text-center py-1/100 px-3.5/100 mb-8">
        <div class="text-black pt-2/100 pb-1/100 px-3/100 my-1/100 mx-3/100">
            <h2 class="text-3xl x3s-md:text-xl font-black mb-3">
                Kegiatan
            </h2>
            <p class="text-lg x3s-md:text-sm font-medium">
                Berisikan dokumentasi yang berkaitan dengan kegiatan siswa
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 pt-1/100 pb-1/100 px-3/100 my-2/100 mx-3/100">
            @foreach ($activities as $activity)
                <x-activities.card-activity :activity="$activity" />
            @endforeach
        </div>
    </div>
    
    {{-- BLOG ATAU INFORMASI --}}
    <div class="w-full text-center py-1/100 px-3.5/100 mb-8">
        <div class="text-black pt-2/100 pb-1/100 px-3/100 my-1/100 mx-3/100">
            <h2 class="text-3xl x3s-md:text-xl font-black mb-3">
                Informasi
            </h2>
            <p class="text-lg x3s-md:text-sm font-medium">
                Berisikan informasi atau pengumuman terkait kegiatan atau hal yang berkaitan dengan siswa dan sekolah
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-1/100 pb-1/100 px-3/100 my-2/100 mx-3/100">
            @foreach ($blogs as $blog)
                <x-blogs.card-blog :blog="$blog" />
            @endforeach
        </div>
    </div>
</x-app-layout>
