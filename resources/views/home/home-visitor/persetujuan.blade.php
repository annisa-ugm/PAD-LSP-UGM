@extends('home.home-visitor.layouts.layout')

@section('title', 'Home - Lembaga Sertifikasi Profesi UGM')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl p-6 mx-auto my-8">
        <div class="border-b px-4 py-2">
            <h2 class="text-lg font-bold">Persetujuan Peraturan Proses Assessment</h2>
        </div>
        {{-- <form action="{{ route('save.persetujuan') }}" method="POST" enctype="multipart/form-data"> --}}
            {{-- @csrf --}}

            <div id="message" class="mt-4"></div>

            <div class="p-4">
                {{-- <p class="text-sm text-gray-600">SKM0317/00010/2/2019/14-Junior Web Developer</p> --}}
                <h3 class="text-center font-bold mt-4 mb-2">SURAT PERNYATAAN ASESI DALAM MENGIKUTI PROSES ASESMEN</h3>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li>1. Bahwa selama mengikuti proses asesmen ini, saya akan mengikuti semua tahapan proses asesmen mulai dari pengisian form pendaftaran, form asesmen mandiri, form Persetujuan Asesmen & Kerahasiaan, form yang berkaitan dengan metode asesmen (soal praktek, soal tertulis, soal lisan), form keputusan asesmen, dan form umpan balik.</li>
                    <li>2. Bahwa <span class="text-red-600 font-bold">tanda tangan image digital</span> yang saya upload dan saya gunakan pada setiap form yang berkaitan dengan proses asesmen, menjadi bukti persetujuan saya.</li>
                    <li>3. Bahwa jika dalam proses asesmen, saya meninggalkan proses asesmen tanpa alasan yang patut, saya bersedia diberikan keputusan BK (Belum Kompeten) oleh asesor.</li>
                    <li>4. Demikian pernyataan saya untuk dapat dijadikan bukti bagi pihak asesor / LSP.</li>
                </ul>
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-1" for="signature">Tanda Tangan Saya</label>
                    <input type="file" id="signature" name="signature" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg p-2 focus:outline-none">
                    <p class="mt-2 text-gray-700">{{ $data }}</p>
                    <p class="text-gray-700">Tanggal: 20-10-2024</p>
                </div>
            </div>
            <div class="flex justify-end items-center border-t p-2">
                <button type="button" id="btn-selanjutnya" class="bg-green-500 text-white px-4 py-2 rounded mr-2 hover:bg-green-600">Setuju</button>
                <a href="/assesi" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Tutup</a>
            </div>
        {{-- </form> --}}
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        function saveDataPersetujuan() {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        const fileInput = $('#signature')[0].files[0];
        formData.append('signature', fileInput);

        $.ajax({
            url: '/save-data-persetujuan',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Data persetujuan tersimpan sementara:', response);
                window.location.href = "{{ route('pribadi') }}";
            },
            error: function(xhr, status, error) {
                console.error('Error menyimpan data persetujuan:', error);

                // Tampilkan pesan error dari validasi Laravel
                if (xhr.status === 422) { // 422 adalah status code untuk error validasi di Laravel
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '<ul class="text-red-500">';
                    $.each(errors, function(key, messages) {
                        $.each(messages, function(index, message) {
                            errorMessages += '<li>' + message + '</li>';
                        });
                    });
                    errorMessages += '</ul>';

                    // Masukkan pesan error ke dalam elemen #message
                    $('#message').html('<div class="alert alert-danger">' + errorMessages + '</div>');
                } else {
                    $('#message').html('<p class="text-red-500">Gagal menyimpan data. Silakan coba lagi.</p>');
                }
            }
        });

        }

        $('#btn-selanjutnya').on('click', function(event) {
            event.preventDefault();
            saveDataPersetujuan();
        });
    </script>
@endsection
