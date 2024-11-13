@extends('home.home-admin.layouts.layout')

@section('title', 'Event Management - Lembaga Sertifikasi Profesi UGM')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="mb-8">
            <!-- Tombol Tambah Event -->
            <a href="{{ route('admin.events.create') }}" class="bg-green-500 text-white p-2 rounded hover:bg-green-600 mb-5">
                Tambah Event
            </a>

            <!-- Form Event -->
            <div id="eventModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-md p-6 w-full max-w-lg mx-4">
                    <h2 class="text-xl font-bold mb-4">Tambah Event</h2>
                    <form>
                        <div class="mb-4">
                            <label for="event-name" class="block text-gray-700">Nama Event:</label>
                            <input type="text" id="event-name" class="w-full p-2 border rounded-md" placeholder="EVENT-098-1238">
                        </div>
                        <div class="mb-4">
                            <label for="start-date" class="block text-gray-700">Tanggal Mulai Event:</label>
                            <input type="date" id="start-date" class="w-full p-2 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="end-date" class="block text-gray-700">Tanggal Berakhir Event:</label>
                            <input type="date" id="end-date" class="w-full p-2 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="event-type" class="block text-gray-700">Tipe Event:</label>
                            <input type="text" id="event-type" class="w-full p-2 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="event-scheme" class="block text-gray-700">Nama Skema:</label>
                            <div id="schemes-list">
                                <input type="text" class="w-full p-2 border rounded-md mb-2" placeholder="SKM-XXXX">
                            </div>
                            <button type="button" class="bg-blue-500 text-white p-2 rounded">Tambah Skema</button>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="closeModalBtn" class="bg-red-500 text-white p-2 rounded mr-2">Batal</button>
                            <button type="submit" class="bg-green-500 text-white p-2 rounded">Simpan Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Daftar Event -->
        <h2 class="text-xl font-bold mb-4">Daftar Event</h2>
        <div class="overflow-x-auto mb-8">
            <table class="w-full bg-white rounded-md shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Tgl Event</th>
                        <th class="p-2">TUK</th>
                        <th class="p-2">Tipe Event</th>
                        <th class="p-2">Skema</th>
                        <th class="p-2">Asesor</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 text-center">12/12/2024</td>
                        <td class="p-2">TILC</td>
                        <td class="p-2">Offline</td>
                        <td class="p-2">SKM-II</td>
                        <td class="p-2">
                            <a href="/admin5" class="bg-yellow-500 hover:bg-yellow-600 text-white p-1 rounded">Button Asesor</a>
                        </td>
                        <td class="p-2">
                            <a href="/admin4" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded">Button Asesi</a>
                        </td>
                    </tr>
                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>

        <!-- Event Aktif -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Event Aktif</h2>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Tanggal</th>
                            <th class="border px-4 py-2">Jenis Event</th>
                            <th class="border px-4 py-2">Nama Skema</th>
                            <th class="border px-4 py-2">Nama Asesi</th>
                            <th class="border px-4 py-2">Keterangan</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">2024-05-15</td>
                            <td class="border px-4 py-2">Data Scientist</td>
                            <td class="border px-4 py-2">Data Scientist Certification</td>
                            <td class="border px-4 py-2">Dr. Assessor B</td>
                            <td class="border px-4 py-2">Jadwal Anda dengan Asesor pada 13 November 2024 dengan komunikasi melalui email. Nama Asesor : Wandi Prakoso. Email : wandi123@gmail.com</td>
                            <td class="border px-4 py-2">
                                <button onclick="toggleActions('aksi2')" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">Pilih</button>
                            </td>
                        </tr>
                        <!-- Baris untuk tombol pilih aksi -->
                        <tr id="aksi2" class="hidden">
                            <td colspan="6" class="border px-4 py-2">
                                <a href="/dp" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition my-2">FR.APL-01</a>
                                <a href="/home-admin" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition my-2">Kirim Pesan</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Event Tutup -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Event Tutup</h2>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">Tanggal</th>
                            <th class="border px-4 py-2">Jenis Event</th>
                            <th class="border px-4 py-2">Nama Skema</th>
                            <th class="border px-4 py-2">Nama Asesi</th>
                            <th class="border px-4 py-2">Keterangan</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">2024-05-15</td>
                            <td class="border px-4 py-2">Data Scientist</td>
                            <td class="border px-4 py-2">Data Scientist Certification</td>
                            <td class="border px-4 py-2">Dr. Assessor B</td>
                            <td class="border px-4 py-2">Jadwal Anda dengan Asesor pada 13 November 2024 dengan komunikasi melalui email. Nama Asesor : Wandi Prakoso. Email : wandi123@gmail.com</td>
                            <td class="border px-4 py-2">
                                <button onclick="toggleActions('aksi3')" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">Pilih</button>
                            </td>
                        </tr>
                        <!-- Baris untuk tombol pilih aksi -->
                        <tr id="aksi3" class="hidden">
                            <td colspan="6" class="border px-4 py-2">
                                <a href="/persetujuan" class="bg-red-400 text-white px-2 py-1 rounded transition my-2">FR.APL-01</a>
                                <a href="/home-admin" class="bg-red-400 text-white px-2 py-1 rounded transition my-2">Kirim Pesan</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleActions(id) {
        document.getElementById(id).classList.toggle("hidden");
    }
</script>
@endsection