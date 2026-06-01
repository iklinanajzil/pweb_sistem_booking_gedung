{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">Anda masuk sebagai: <span class="badge bg-blue-500 text-white px-2 py-1 rounded text-xs uppercase">{{ Auth::user()->role }}</span></p>

                    <hr class="my-4">

                    @if(Auth::user()->role == 'admin')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                                <h4 class="font-semibold">Manajemen Organisasi</h4>
                                <p class="text-sm text-gray-600 mb-2">Lihat dan kelola semua data organisasi/UKM di Fasilkom.</p>
                                <a href="{{ route('organisasi.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 transition ease-in-out duration-150">
                                    Buka Daftar Organisasi
                                </a>
                            </div>

                            <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                                <h4 class="font-semibold">Booking Gedung</h4>
                                <p class="text-sm text-gray-600 mb-2">Lihat permintaan peminjaman ruangan yang masuk.</p>
                                <button class="text-gray-400 cursor-not-allowed text-xs" disabled>(Fitur Segera Datang)</button>
                            </div>
                        </div>
                    @else
                        <div class="p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded">
                            <h4 class="font-semibold">Profil Organisasi Anda</h4>
                            <p class="text-sm text-gray-600">Pastikan data organisasi Anda sudah lengkap untuk melakukan booking gedung.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition-colors duration-200">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen transition-colors duration-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-700 mb-8 transition-colors duration-200">
                <div class="p-8 flex flex-col md:flex-row justify-between items-center bg-gray-50 dark:bg-gray-800/50 border-b-4 border-[#1e3a8a] dark:border-blue-500">
                    <div>
                        <h3 class="text-2xl font-black italic uppercase tracking-tighter text-[#1e3a8a] dark:text-blue-400">
                            Selamat Datang, {{ Auth::user()->username ?? Auth::user()->name }}!
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-1 font-medium">Sistem Informasi Peminjaman Gedung dan Ruangan (SIPEGE DUNG)</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="bg-[#1e3a8a] dark:bg-blue-600 text-white px-4 py-2 rounded-full font-black text-xs uppercase tracking-widest shadow-lg">
                            Mode: {{ Auth::user()->role }}
                        </span>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role == 'admin')

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-b-4 border-blue-400 transition-colors duration-200">
                        <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase italic flex items-center justify-between">
                            <span>Informasi Cuaca</span>
                            <span id="weather-city" class="text-[10px] font-normal lowercase tracking-wider text-gray-400">Loading...</span>
                        </h3>
                        <div id="weather-loading" class="text-sm text-blue-500 font-medium animate-pulse mt-2">
                            Mengambil data...
                        </div>
                        <div id="weather-content" class="hidden mt-2">
                            <div class="flex items-center justify-between">
                                <span id="weather-temp" class="text-2xl font-black text-gray-900 dark:text-white">0°C</span>
                                <span id="weather-desc" class="text-[10px] bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-300 px-2 py-0.5 rounded uppercase font-bold tracking-wider">Cerah</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-b-4 border-blue-600 transition-colors duration-200">
                        <div class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase italic">Total Organisasi</div>
                        <div class="text-3xl font-black text-blue-900 dark:text-blue-400 mt-2">12</div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-b-4 border-yellow-500 transition-colors duration-200">
                        <div class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase italic">Booking Pending</div>
                        <div class="text-3xl font-black text-yellow-600 dark:text-yellow-400 mt-2">5</div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-b-4 border-green-500 transition-colors duration-200">
                        <div class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase italic">Gedung Tersedia</div>
                        <div class="text-3xl font-black text-green-600 dark:text-green-400 mt-2">8</div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 mb-8 overflow-hidden transition-colors duration-200">
                    <div class="p-6 bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h4 class="text-base font-black text-blue-900 dark:text-blue-400 uppercase italic flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Statistik Aktivitas Sesi Pengguna
                            </h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Memantau intensitas kunjungan Anda di halaman dashboard utama secara real-time.</p>
                        </div>

                        <form action="{{ route('dashboard.reset_visit') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengulang hitungan sesi dari awal?');">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-red-300 dark:border-red-600 rounded-lg text-xs font-bold uppercase tracking-widest text-red-700 dark:text-red-400 bg-white dark:bg-gray-800 hover:bg-red-50 dark:hover:bg-red-900/30 transition shadow-sm">
                                Reset Hitungan
                            </button>
                        </form>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                        <div class="bg-blue-50/50 dark:bg-blue-900/20 p-4 rounded-xl border border-blue-100 dark:border-blue-900/50">
                            <span class="block text-xs font-bold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Jumlah Kunjungan</span>
                            <span class="block text-4xl font-black text-blue-900 dark:text-white mt-1">
                                {{ session('visit_count', 1) }} <span class="text-xs font-normal text-gray-500 lowercase">kali</span>
                            </span>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/40 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                            <span class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kunjungan Pertama</span>
                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mt-2">
                                {{ session('first_visit', $firstVisit) }}
                            </span>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/40 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                            <span class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kunjungan Terakhir (Saat Ini)</span>
                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mt-2">
                                {{ session('last_visit', $lastVisit) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden group border border-gray-100 dark:border-gray-700 transition-colors duration-200">
                        <div class="p-1 bg-[#1e3a8a] dark:bg-blue-600 group-hover:bg-yellow-500 transition-colors duration-300"></div>
                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-blue-50 dark:bg-gray-700 rounded-lg text-blue-600 dark:text-blue-400 mr-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <h4 class="text-xl font-black text-blue-900 dark:text-blue-400 uppercase italic">Manajemen Organisasi</h4>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm leading-relaxed">
                                Kelola data seluruh UKM dan Himpunan Mahasiswa di lingkungan Fasilkom Jember. Tambahkan, edit, atau pantau status keaktifan mereka.
                            </p>
                            <a href="{{ route('organisasi.index') }}" class="inline-flex items-center justify-center w-full px-6 py-3 bg-[#1e3a8a] dark:bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-800 dark:hover:bg-blue-700 transition shadow-lg uppercase text-xs tracking-widest">
                                Kelola Organisasi
                            </a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden group border border-gray-100 dark:border-gray-700 opacity-75 transition-colors duration-200">
                        <div class="p-1 bg-gray-400 dark:bg-gray-600 group-hover:bg-yellow-500 transition-colors duration-300"></div>
                        <div class="p-8">
                            <div class="flex items-center mb-4 text-gray-400 dark:text-gray-500">
                                <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg mr-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <h4 class="text-xl font-black uppercase italic">Permintaan Booking</h4>
                            </div>
                            <p class="text-gray-500 dark:text-gray-400 mb-6 text-sm leading-relaxed">
                                Fitur untuk memvalidasi surat peminjaman dan jadwal penggunaan ruangan oleh organisasi.
                            </p>
                            <button class="w-full py-3 bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-400 font-bold rounded-lg cursor-not-allowed uppercase text-xs tracking-widest italic" disabled>
                                Segera Hadir
                            </button>
                        </div>
                    </div>
                </div>

            @else
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-xl border-l-8 border-yellow-500 transition-colors duration-200">
                    <div class="flex items-start">
                        <div class="p-4 bg-yellow-50 dark:bg-gray-700 rounded-xl mr-6 text-yellow-600 dark:text-yellow-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-blue-900 dark:text-blue-400 uppercase italic mb-2">Informasi Penting</h4>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                                Sebagai akun organisasi, Anda dapat mengajukan peminjaman gedung dan ruangan kampus. Pastikan profil organisasi Anda sudah dilengkapi dengan foto profil dan kontak yang valid sebelum mengajukan booking.
                            </p>
                            <div class="flex space-x-4">
                                <button class="px-6 py-2 bg-[#1e3a8a] dark:bg-blue-600 text-white font-bold rounded shadow hover:bg-blue-800 dark:hover:bg-blue-700 transition text-xs uppercase tracking-widest">
                                    Mulai Booking
                                </button>
                                <button class="px-6 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-bold rounded hover:bg-gray-50 dark:hover:bg-gray-600 transition text-xs uppercase tracking-widest">
                                    Lihat Jadwal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- SCRIPT CUACA --}}
            <script>
                document.addEventListener('DOMContentLoaded', async () => {
                    const loadingEl = document.getElementById('weather-loading');
                    const contentEl = document.getElementById('weather-content');
                    const cityEl = document.getElementById('weather-city');
                    const tempEl = document.getElementById('weather-temp');
                    const descEl = document.getElementById('weather-desc');

                    try {
                        const response = await fetch('https://wttr.in/Surabaya?format=j1');
                        if (!response.ok) throw new Error('Gagal mengambil data cuaca');

                        const data = await response.json();
                        const currentCondition = data.current_condition[0];
                        const tempC = currentCondition.temp_C;
                        const weatherDesc = currentCondition.weatherDesc[0].value;

                        cityEl.innerText = "Surabaya, ID";
                        tempEl.innerText = `${tempC}°C`;
                        descEl.innerText = weatherDesc;

                        loadingEl.classList.add('hidden');
                        contentEl.classList.remove('hidden');
                    } catch (error) {
                        loadingEl.innerText = 'Gagal memuat cuaca.';
                        console.error(error);
                    }
                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const isDarkMode = document.documentElement.classList.contains('dark');
                    const textColor = isDarkMode ? '#9ca3af' : '#4b5563';
                    const gridColor = isDarkMode ? '#374151' : '#e5e7eb';
                    const ctxBar = document.getElementById('barChart').getContext('2d');
                    new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                            datasets: [{
                                label: 'Jumlah Peminjaman',
                                data: [12, 19, 3, 5, 2, 8],
                                backgroundColor: '#3b82f6',
                                borderRadius: 6,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { labels: { color: textColor } }
                            },
                            scales: {
                                x: {
                                    grid: { color: gridColor },
                                    ticks: { color: textColor }
                                },
                                y: {
                                    grid: { color: gridColor },
                                    ticks: { color: textColor },
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    const ctxPie = document.getElementById('pieChart').getContext('2d');
                    new Chart(ctxPie, {
                        type: 'pie',
                        data: {
                            labels: ['UKM', 'Himpunan (HMP)', 'Komunitas'],
                            datasets: [{
                                data: [5, 4, 3],
                                backgroundColor: ['#1e3a8a', '#eab308', '#10b981'],
                                borderWidth: isDarkMode ? 2 : 1,
                                borderColor: isDarkMode ? '#1f2937' : '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: { color: textColor, padding: 20 }
                                }
                            }
                        }
                    });
                });
            </script>

        </div>
    </div>
</x-app-layout>
