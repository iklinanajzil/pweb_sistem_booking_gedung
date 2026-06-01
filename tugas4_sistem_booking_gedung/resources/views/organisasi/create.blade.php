{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Organisasi Baru</h2>
    <a href="{{ route('organisasi.index') }}">Kembali ke Daftar</a><br><br>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table cellpadding="5">
            <tr>
                <td>ID Organisasi (Unique)</td>
                <td><input type="text" name="id_organisasi" value="{{ old('id_organisasi') }}" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="{{ old('username') }}" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Jenis Organisasi</td>
                <td>
                    <select name="jenis_organisasi" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="UKM" {{ old('jenis_organisasi') == 'UKM' ? 'selected' : '' }}>UKM</option>
                        <option value="Himpunan" {{ old('jenis_organisasi') == 'Himpunan' ? 'selected' : '' }}>Himpunan</option>
                        <option value="BEM" {{ old('jenis_organisasi') == 'BEM' ? 'selected' : '' }}>BEM</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Organisasi</td>
                <td><input type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}" required></td>
            </tr>
            <tr>
                <td>Nama Ketua</td>
                <td><input type="text" name="nama_ketua" value="{{ old('nama_ketua') }}" required></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" value="{{ old('no_hp') }}" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ old('email') }}" required></td>
            </tr>
            <tr>
                <td>Jumlah Pengurus</td>
                <td><input type="number" name="jumlah_pengurus" value="{{ old('jumlah_pengurus') }}" required></td>
            </tr>
            <tr>
                <td>Status Aktif</td>
                <td>
                    <input type="radio" name="is_aktif" value="1" {{ old('is_aktif') == '1' ? 'checked' : '' }}> Aktif
                    <input type="radio" name="is_aktif" value="0" {{ old('is_aktif') == '0' ? 'checked' : '' }}> Tidak Aktif
                </td>
            </tr>
            <tr>
                <td>Foto Profil (Bonus)</td>
                <td><input type="file" name="foto_profil"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan Organisasi</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection --}}


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Organisasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('organisasi.index') }}" class="text-blue-500 hover:underline">← Kembali ke Daftar</a>
                    <br><br>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="w-full text-left" cellpadding="10">
                            <tr>
                                <td class="w-1/4">ID Organisasi (Unique)</td>
                                <td><input type="text" name="id_organisasi" value="{{ old('user_id') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" value="{{ old('username') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Jenis Organisasi</td>
                                <td>
                                    <select name="jenis_organisasi" class="border rounded px-2 py-1 w-full" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="UKM" {{ old('jenis_organisasi') == 'UKM' ? 'selected' : '' }}>UKM</option>
                                        <option value="Himpunan" {{ old('jenis_organisasi') == 'Himpunan' ? 'selected' : '' }}>Himpunan</option>
                                        <option value="BEM" {{ old('jenis_organisasi') == 'BEM' ? 'selected' : '' }}>BEM</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Organisasi</td>
                                <td><input type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Nama Ketua</td>
                                <td><input type="text" name="nama_ketua" value="{{ old('nama_ketua') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td><input type="text" name="no_hp" value="{{ old('no_hp') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" value="{{ old('email') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Pengurus</td>
                                <td><input type="number" name="jumlah_pengurus" value="{{ old('jumlah_pengurus') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Status Aktif</td>
                                <td>
                                    <label><input type="radio" name="is_aktif" value="1" {{ old('is_aktif') == '1' ? 'checked' : '' }}> Aktif</label>
                                    <label class="ml-4"><input type="radio" name="is_aktif" value="0" {{ old('is_aktif') == '0' ? 'checked' : '' }}> Tidak Aktif</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Foto Profil</td>
                                <td><input type="file" name="foto_profil" class="w-full"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                                        Simpan Organisasi
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Daftar Organisasi Universitas Jember') }}
            </h2>
            <a href="{{ route('organisasi.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-2 px-4 rounded-lg shadow-md transition">
                + Tambah Organisasi
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Box Statistik ala Gambar Referensi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-8 border-yellow-500">
                    <h4 class="text-gray-500 font-bold">Total Organisasi</h4>
                    <p class="text-3xl font-black text-blue-900">{{ $organisasis->count() }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="p-0"> <!-- P-0 agar tabel penuh ke pinggir -->
                    <table class="w-full text-left">
                        <thead class="bg-[#1e3a8a] text-white">
                            <tr>
                                <th class="px-6 py-4 text-center">No</th>
                                <th class="px-6 py-4">Nama Organisasi</th>
                                <th class="px-6 py-4">Ketua</th>
                                <th class="px-6 py-4 text-center">Jenis</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($organisasis as $index => $org)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="px-6 py-4 text-center font-bold text-blue-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-gray-800">{{ $org->nama_organisasi }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $org->nama_ketua }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full uppercase">
                                        {{ $org->jenis_organisasi }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('organisasi.edit', $org->id_organisasi) }}" class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 px-3 py-1 rounded font-bold text-xs">
                                            EDIT
                                        </a>
                                        <form action="{{ route('organisasi.destroy', $org->id_organisasi) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded font-bold text-xs">
                                                HAPUS
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Data Organisasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <!-- Header Card dengan Aksen Kuning -->
                <div class="bg-[#1e3a8a] px-6 py-4 border-b-4 border-yellow-500">
                    <h3 class="text-white font-bold flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Form Input Data Organisasi
                    </h3>
                </div>

                <div class="p-8 text-gray-900">
                    <form action="{{ route('organisasi.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nama Organisasi -->
                            <div>
                                <label for="nama_organisasi" class="block text-sm font-bold text-blue-900 uppercase tracking-wide">Nama Organisasi</label>
                                <input type="text" name="nama_organisasi" id="nama_organisasi" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 transition"
                                    placeholder="Contoh: UKM Multimedia Fasilkom">
                            </div>

                            <!-- Nama Ketua -->
                            <div>
                                <label for="nama_ketua" class="block text-sm font-bold text-blue-900 uppercase tracking-wide">Nama Ketua</label>
                                <input type="text" name="nama_ketua" id="nama_ketua" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 transition"
                                    placeholder="Masukkan Nama Lengkap Ketua">
                            </div>

                            <!-- Jenis Organisasi -->
                            <div>
                                <label for="jenis_organisasi" class="block text-sm font-bold text-blue-900 uppercase tracking-wide">Jenis Organisasi</label>
                                <select name="jenis_organisasi" id="jenis_organisasi" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 transition">
                                    <option value="" disabled selected>Pilih Jenis Organisasi</option>
                                    <option value="UKM">Unit Kegiatan Mahasiswa (UKM)</option>
                                    <option value="Himpunan">Himpunan Mahasiswa Prodis (HMP)</option>
                                    <option value="BEM">Badan Eksekutif Mahasiswa (BEM)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-8 flex items-center justify-end space-x-4 border-t pt-6">
                            <a href="{{ route('organisasi.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700 transition">
                                BATAL
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-[#1e3a8a] border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Registrasi Organisasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">

                <!-- Form Header -->
                <div class="p-6 bg-[#1e3a8a] border-b border-yellow-500">
                    <h3 class="text-lg font-bold text-white uppercase tracking-wider">Formulir Data Organisasi</h3>
                    <p class="text-blue-200 text-sm italic">Lengkapi informasi di bawah ini untuk mendaftarkan organisasi ke sistem.</p>
                </div>

                <div class="p-8">
                    <form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Grid Section: Informasi Utama -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- ID Organisasi -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">ID Organisasi (Unique)</label>
                                <input type="text" name="id_organisasi" value="{{ old('id_organisasi') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('id_organisasi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Jenis Organisasi -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Jenis Organisasi</label>
                                <select name="jenis_organisasi" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="UKM" {{ old('jenis_organisasi') == 'UKM' ? 'selected' : '' }}>UKM</option>
                                    <option value="Himpunan" {{ old('jenis_organisasi') == 'Himpunan' ? 'selected' : '' }}>Himpunan</option>
                                    <option value="BEM" {{ old('jenis_organisasi') == 'BEM' ? 'selected' : '' }}>BEM</option>
                                </select>
                                @error('jenis_organisasi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Nama Organisasi -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Nama Organisasi</label>
                                <input type="text" name="nama_organisasi" value="{{ old('nama_organisasi') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('nama_organisasi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Nama Ketua -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Nama Ketua Umum</label>
                                <input type="text" name="nama_ketua" value="{{ old('nama_ketua') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('nama_ketua') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Jumlah Pengurus -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Jumlah Pengurus</label>
                                <input type="number" name="jumlah_pengurus" value="{{ old('jumlah_pengurus') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('jumlah_pengurus') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <!-- Grid Section: Kredensial & Kontak -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Username -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Username Akses</label>
                                <input type="text" name="username" value="{{ old('username') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('username') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Password</label>
                                <input type="password" name="password" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Email Resmi</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- No HP -->
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">No. WhatsApp Ketua</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                                    class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 shadow-sm transition">
                                @error('no_hp') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Status & Foto -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Status Keanggotaan</label>
                                <div class="mt-2 space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="is_aktif" value="1" class="text-blue-600 focus:ring-blue-500" {{ old('is_aktif', '1') == '1' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm font-bold text-green-600 uppercase">Aktif</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="is_aktif" value="0" class="text-blue-600 focus:ring-blue-500" {{ old('is_aktif') == '0' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm font-bold text-red-600 uppercase">Tidak Aktif</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Foto Profil / Logo</label>
                                <input type="file" name="foto_profil"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                                @error('foto_profil') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                            <a href="{{ route('organisasi.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 font-black rounded-lg hover:bg-gray-300 transition text-xs uppercase tracking-widest">
                                Batal
                            </a>
                            <button type="submit" class="px-8 py-3 bg-yellow-500 text-blue-900 font-black rounded-lg hover:bg-yellow-600 transition shadow-lg text-xs uppercase tracking-widest">
                                Simpan Data Organisasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
