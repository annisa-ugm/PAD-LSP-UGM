@extends('home.home-admin.layouts.layout')

@section('title', 'Home - Lembaga Sertifikasi Profesi UGM')

@section('content')
<div class="min-h-screen bg-gray-100">
  <div class="container mx-auto p-4">
    <h2 class="text-4xl font-bold mb-4 text-center">Daftar Asesi</h2>
    <table class="w-full bg-white rounded-md shadow-md mb-4">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2">No</th>
          <th class="p-2">Nama Calon Asesi</th>
          <th class="p-2">Tanggal Daftar</th>
          <th class="p-2">Event</th>
          <th class="p-2">Skema</th>
          <th class="p-2">Pengajuan</th>
        </tr>
      </thead>
      <tbody>
        <!-- Data Dummy -->
        @foreach(range(1, 20) as $i)
        @php
          $names = ['Annisa', 'Budi', 'Citra', 'Dedi', 'Elisa', 'Fikri', 'Gina', 'Hadi', 'Irma', 'Joko'];
          $randomName = $names[array_rand($names)];
        @endphp
        <tr>
          <td class="p-2 text-center">{{ $i }}</td>
          <td class="p-2">{{ $randomName }}</td>
          <td class="p-2 text-center">{{ now()->subDays($i)->format('d/m/Y H:i') }}</td>
          <td class="p-2 text-center">EVENT-{{ 100 + $i }}</td>
          <td class="p-2">{{ $i % 3 == 0 ? 'Data Analyst' : ($i % 2 == 0 ? 'Network Engineer' : 'Junior Developer') }}</td>
          <td class="p-2">
            <a href="/dp" class="bg-blue-500 text-white p-1 rounded text-center">Detail Pengajuan</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination Manual -->
    <div class="flex justify-center my-4">
      <nav aria-label="Pagination">
        <ul class="inline-flex items-center space-x-2">
          @for($page = 1; $page <= 5; $page++)
          <li>
            <a href="?page={{ $page }}" class="bg-gray-200 px-3 py-1 rounded {{ request('page') == $page ? 'bg-blue-500 text-white' : '' }}">
              {{ $page }}
            </a>
          </li>
          @endfor
        </ul>
      </nav>
    </div>

    <div id="detail-pengajuan" class="bg-white p-4 rounded shadow-md mb-4 hidden">
      <h2 class="text-xl font-bold mb-4">Detail Pengajuan Asesi</h2>
      <p><strong>Nama Asesi:</strong> Annisa</p>
      <p><strong>Prodi:</strong> TRPL</p>
      <p><strong>Event:</strong> EVENT-111</p>
      <p><strong>Skema:</strong> Junior Developer</p>
      <button class="bg-green-500 text-white mt-4 p-2 rounded">Setujui</button>
    </div>

    <h2 class="text-xl font-bold mb-4">Assign Asesi ke Asesor</h2>
    <table class="w-full bg-white rounded-md shadow-md mb-4">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2">No</th>
          <th class="p-2">Nama Calon Asesi</th>
          <th class="p-2">Asal Prodi</th>
          <th class="p-2">Ceklist</th>
        </tr>
      </thead>
      <tbody>
        @foreach(range(1, 10) as $j)
        @php
          $randomName = $names[array_rand($names)];
        @endphp
        <tr>
          <td class="p-2 text-center">{{ $j }}</td>
          <td class="p-2">{{ $randomName }}</td>
          <td class="p-2">TRPL</td>
          <td class="p-2 text-center">
            <input type="checkbox" class="form-checkbox">
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Dropdown Asesor di bawah tabel -->
    <div class="mb-4">
      <label for="asesor" class="block mb-2 font-semibold">Pilih Asesor:</label>
      <select id="asesor" class="w-full p-2 border rounded-md">
        <option>Asesor 1</option>
        <option>Asesor 2</option>
        <option>Asesor 3</option>
      </select>
    </div>

    <button class="bg-green-500 text-white mt-4 p-2 rounded">Save</button>
  </div>
</div>

<script>
  function showDetail() {
    const detailSection = document.getElementById('detail-pengajuan');
    detailSection.classList.toggle('hidden');
  }
</script>
@endsection
