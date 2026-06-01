<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Daftar Organisasi Fasilkom') }}
            </h2>
            <a href="{{ route('organisasi.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-black py-2 px-4 rounded-lg text-xs uppercase tracking-widest transition">
                + Tambah Organisasi
            </a>
        </div>
    </x-slot>

    <div class="flex justify-center w-full px-4 mt-6 mb-6">
        <div class="w-full max-w-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-4 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 transition-colors duration-200">
            <h3 class="text-base font-bold mb-3 text-center tracking-wide text-gray-800 dark:text-gray-100">
                Cari Organisasi / Mahasiswa
            </h3>
            <div class="flex justify-center mb-1">
                <input type="text" id="search-input" placeholder="Ketik nama organisasi..."
                    class="w-full max-w-[280px] px-3 py-1.5 text-sm bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-400 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm outline-none">
            </div>
            <ul id="search-results" class="divide-y divide-gray-200 dark:divide-gray-700 bg-gray-50/50 dark:bg-gray-900/30 rounded-lg mt-2 max-h-48 overflow-y-auto">
                </ul>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden max-w-6xl mx-auto p-4 transition-colors duration-200">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3 text-center">No</th>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3">Nama Organisasi</th>
                    <th class="px-6 py-3">Ketua</th>
                    <th class="px-6 py-3">Jenis</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody id="organisasi-table">
                @forelse($organisasis as $index => $item)
                    <tr class="table-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-150">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white text-center">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-6 py-4">
                            @if($item->foto_profil)
                                <img src="{{ asset('storage/' . $item->foto_profil) }}" alt="Logo {{ $item->nama_organisasi }}" class="w-10 h-10 rounded-full object-cover border border-gray-200 dark:border-gray-600">
                            @else
                                @php
                                    $words = explode(' ', $item->nama_organisasi);
                                    $initials = '';
                                    if (isset($words[0])) {
                                        $initials .= substr($words[0], 0, 1);
                                    }
                                    if (isset($words[1])) {
                                        $initials .= substr($words[1], 0, 1);
                                    }
                                    $initials = strtoupper($initials);
                                @endphp <div class="w-10 h-10 rounded-full bg-blue-600 dark:bg-blue-500 flex items-center justify-center text-sm font-bold text-white tracking-wider shadow-sm">
                                    {{ $initials }}
                                </div>
                            @endif
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white data-nama">
                            {{ $item->nama_organisasi }}
                        </td>

                        <td class="px-6 py-4 data-ketua">
                            {{ $item->nama_ketua }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="text-xs bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300 px-2.5 py-0.5 rounded font-medium">
                                {{ $item->jenis_organisasi }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($item->is_aktif)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-green-500 rounded-full"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-red-500 rounded-full"></span>
                                    Non-Aktif
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('organisasi.show', $item->id) }}" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition">
                                    Detail
                                </a>

                                <a href="{{ route('organisasi.edit', $item->id) }}" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                <form action="{{ route('organisasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus organisasi {{ $item->nama_organisasi }}?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium rounded text-white bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr id="no-data-row">
                        <td colspan="7" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                            Tidak ada data organisasi.
                        </td>
                    </tr>
                @endforelse

                <tr id="empty-search-row" class="hidden">
                    <td colspan="7" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                        Data organisasi atau mahasiswa yang kamu cari tidak ditemukan.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
   <script>
        document.getElementById('search-input').addEventListener('input', function() {
            const keyword = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('.table-row');
            const emptyRow = document.getElementById('empty-search-row');
            let foundAny = false;

            rows.forEach(row => {
                const namaOrganisasi = row.querySelector('.data-nama').textContent.toLowerCase();
                const namaKetua = row.querySelector('.data-ketua').textContent.toLowerCase();
                if (namaOrganisasi.includes(keyword) || namaKetua.includes(keyword)) {
                    row.classList.remove('hidden');
                    foundAny = true;
                } else {
                    row.classList.add('hidden');
                }
            });

            if (!foundAny && keyword.length > 0) {
                emptyRow.classList.remove('hidden');
            } else {
                emptyRow.classList.add('hidden');
            }
        });
</script>

</x-app-layout>
