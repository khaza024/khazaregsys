<x-layouts.base title="Selamat Pendaftaran Telah Berhasil">
    <p class="mb-4 text-left">
        Terima kasih telah mendaftarkan putra / putri Anda. Berikut kami sampaikan informasi terkait pembayaran administrasi dan informasi lainnya:
    </p>

    <div class="bg-gray-100 p-4 rounded-lg mb-6 text-left">
        <h2 class="text-xl font-semibold mb-2">Informasi Pembayaran Administrasi</h2>
        <p class="mb-2">Silakan transfer biaya administrasi sebesar Rp.xxx.xxx ke rekening berikut:</p>
        <ul class="list-disc list-inside mb-4">
            <li>Bank: Mandiri</li>
            <li>Nomor Rekening: 0057xxxxxxxx</li>
            <li>Atas Nama: Yayasan Kharisma Az-Zahra</li>
        </ul>
        <p class="mb-4">Catatan: Harap mencantumkan nama calon peserta didik sebagai catatan transfer.</p>
    </div>

    <div class="bg-gray-100 p-4 rounded-lg mb-6 text-left">
        <h2 class="text-xl font-semibold mb-2">Kontak Panitia</h2>
        <p class="mb-2">
            Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi kontak panitia kami:
        </p>
        <ul class="list-disc list-inside mb-4">
            <li>Nama Panitia: Pak Totok</li>
            <li>Nomor Telepon: 0821-2201-xxxx</li>
            <li>Email: sugiono3totok@gmail.com</li>
        </ul>
    </div>

    <div class="bg-gray-100 p-4 rounded-lg mb-6 text-left">
        <h2 class="text-xl font-semibold mb-2">Informasi Selanjutnya</h2>
        <p class="mb-2">
            Informasi selanjutnya akan kami kirimkan melalui whatsapp ataupun paling lambat satu pekan dari sekarang.
            Harap cek whatsapp ataupun email Anda secara berkala.
        </p>
    </div>

    <a href="{{ route('beranda') }}"
        class="inline-flex items-center px-4 py-2 mt-4 bg-yellow-400 text-white rounded-lg shadow hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M12.707 14.707a1 1 0 01-1.414 0L7 10.414 3.707 13.707a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4-4a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 010 1.414z"
                clip-rule="evenodd" />
        </svg>
        Keluar
    </a>
</x-layouts.base>
