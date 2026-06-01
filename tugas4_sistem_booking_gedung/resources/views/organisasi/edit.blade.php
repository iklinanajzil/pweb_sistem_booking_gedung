{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Organisasi: {{ $organisasi->nama_organisasi }}</h2>
    <a href="{{ route('organisasi.index') }}">Batal</a><br><br>

    <form action="{{ route('organisasi.update', $organisasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table cellpadding="5">
            <tr>
                <td>ID Organisasi</td>
                <td><input type="text" name="id_organisasi" value="{{ old('id_organisasi', $organisasi->id_organisasi) }}" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="{{ old('username', $organisasi->username) }}" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah"></td>
            </tr>
            <tr>
                <td>Jenis Organisasi</td>
                <td>
                    <select name="jenis_organisasi" required>
                        <option value="UKM" {{ $organisasi->jenis_organisasi == 'UKM' ? 'selected' : '' }}>UKM</option>
                        <option value="Himpunan" {{ $organisasi->jenis_organisasi == 'Himpunan' ? 'selected' : '' }}>Himpunan</option>
                        <option value="BEM" {{ $organisasi->jenis_organisasi == 'BEM' ? 'selected' : '' }}>BEM</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Organisasi</td>
                <td><input type="text" name="nama_organisasi" value="{{ $organisasi->nama_organisasi }}" required></td>
            </tr>
            <tr>
                <td>Nama Ketua</td>
                <td><input type="text" name="nama_ketua" value="{{ $organisasi->nama_ketua }}" required></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" value="{{ $organisasi->no_hp }}" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ $organisasi->email }}" required></td>
            </tr>
            <tr>
                <td>Jumlah Pengurus</td>
                <td><input type="number" name="jumlah_pengurus" value="{{ $organisasi->jumlah_pengurus }}" required></td>
            </tr>
            <tr>
                <td>Status Aktif</td>
                <td>
                    <input type="radio" name="is_aktif" value="1" {{ $organisasi->is_aktif == 1 ? 'checked' : '' }}> Aktif
                    <input type="radio" name="is_aktif" value="0" {{ $organisasi->is_aktif == 0 ? 'checked' : '' }}> Tidak Aktif
                </td>
            </tr>
            <tr>
                <td>Foto Profil Saat Ini</td>
                <td>
                    @if($organisasi->foto_profil)
                        <img src="{{ asset('storage/'.$organisasi->foto_profil) }}" width="100"><br>
                    @endif
                    <input type="file" name="foto_profil">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Update Data</button></td>
            </tr>
        </table>
    </form>
</div>
@endsection --}}

{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Organisasi: {{ $organisasi->nama_organisasi }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('organisasi.index') }}" class="text-blue-500 hover:underline">← Batal</a>
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

                    <!-- Ganti $organisasi->id menjadi $organisasi->id_organisasi -->
                    <form action="{{ route('organisasi.update', $organisasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <table class="w-full text-left" cellpadding="10">
                            <tr>
                                <td class="w-1/4">ID Organisasi</td>
                                <!-- Readonly karena ID biasanya tidak diubah -->
                                <td><input type="text" name="id_organisasi" value="{{ old('id_organisasi', $organisasi->id_organisasi) }}" class="bg-gray-100 border rounded px-2 py-1 w-full" readonly></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" value="{{ old('username', $organisasi->user->username ?? '') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah" class="border rounded px-2 py-1 w-full"></td>
                            </tr>
                            <tr>
                                <td>Jenis Organisasi</td>
                                <td>
                                    <select name="jenis_organisasi" class="border rounded px-2 py-1 w-full" required>
                                        <option value="UKM" {{ $organisasi->jenis_organisasi == 'UKM' ? 'selected' : '' }}>UKM</option>
                                        <option value="Himpunan" {{ $organisasi->jenis_organisasi == 'Himpunan' ? 'selected' : '' }}>Himpunan</option>
                                        <option value="BEM" {{ $organisasi->jenis_organisasi == 'BEM' ? 'selected' : '' }}>BEM</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Organisasi</td>
                                <td><input type="text" name="nama_organisasi" value="{{ old('nama_organisasi', $organisasi->nama_organisasi) }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Nama Ketua</td>
                                <td><input type="text" name="nama_ketua" value="{{ old('nama_ketua', $organisasi->nama_ketua) }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td><input type="text" name="no_hp" value="{{ old('no_hp', $organisasi->no_hp) }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" value="{{ old('email', $organisasi->user->email ?? '') }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Pengurus</td>
                                <td><input type="number" name="jumlah_pengurus" value="{{ old('jumlah_pengurus', $organisasi->jumlah_pengurus) }}" class="border rounded px-2 py-1 w-full" required></td>
                            </tr>
                            <tr>
                                <td>Status Aktif</td>
                                <td>
                                    <label><input type="radio" name="is_aktif" value="1" {{ $organisasi->is_aktif == 1 ? 'checked' : '' }}> Aktif</label>
                                    <label class="ml-4"><input type="radio" name="is_aktif" value="0" {{ $organisasi->is_aktif == 0 ? 'checked' : '' }}> Tidak Aktif</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Foto Profil Saat Ini</td>
                                <td>
                                    @if($organisasis->foto_profil ?? $organisasi->foto_profil)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/'.($organisasis->foto_profil ?? $organisasi->foto_profil)) }}" class="w-32 h-32 object-cover rounded shadow">
                                        </div>
                                    @endif
                                    <input type="file" name="foto_profil" class="w-full">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                                        Update Data
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Organisasi: ') }} {{ $organisasi->nama_organisasi }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">

                <!-- Header Card ala SIPEGE DUNG -->
                <div class="bg-[#1e3a8a] px-6 py-4 border-b-4 border-yellow-500 flex justify-between items-center">
                    <h3 class="text-white font-bold flex items-center italic">
                        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Update Informasi Organisasi
                    </h3>
                    <a href="{{ route('organisasi.index') }}" class="text-xs font-bold text-yellow-400 hover:text-white transition uppercase tracking-widest">
                        ← Kembali
                    </a>
                </div>

                <div class="p-8">
                    <!-- Penanganan Error -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 shadow-sm">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                <span class="font-bold">Terjadi kesalahan input:</span>
                            </div>
                            <ul class="list-disc ml-8 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('organisasi.update', $organisasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- ID Organisasi (Readonly) -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-blue-900 uppercase">ID Organisasi</label>
                                <input type="text" value="{{ $organisasi->id_organisasi }}" class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm italic text-gray-500" readonly>
                            </div>

                            <!-- Akun & Login -->
                            <div class="space-y-4">
                                <h4 class="font-bold text-[#1e3a8a] border-b border-gray-100 pb-2 italic">Informasi Akun</h4>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Username</label>
                                    <input type="text" name="username" value="{{ old('username', $organisasi->user->username ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $organisasi->user->email ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Password Baru <span class="text-[10px] text-red-400 font-normal ml-1">(Kosongkan jika tetap)</span></label>
                                    <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm">
                                </div>
                            </div>

                            <!-- Detail Organisasi -->
                            <div class="space-y-4">
                                <h4 class="font-bold text-[#1e3a8a] border-b border-gray-100 pb-2 italic">Profil Organisasi</h4>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Nama Organisasi</label>
                                    <input type="text" name="nama_organisasi" value="{{ old('nama_organisasi', $organisasi->nama_organisasi) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Jenis Organisasi</label>
                                    <select name="jenis_organisasi" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                        <option value="UKM" {{ $organisasi->jenis_organisasi == 'UKM' ? 'selected' : '' }}>UKM</option>
                                        <option value="Himpunan" {{ $organisasi->jenis_organisasi == 'Himpunan' ? 'selected' : '' }}>Himpunan</option>
                                        <option value="BEM" {{ $organisasi->jenis_organisasi == 'BEM' ? 'selected' : '' }}>BEM</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Nama Ketua</label>
                                    <input type="text" name="nama_ketua" value="{{ old('nama_ketua', $organisasi->nama_ketua) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                </div>
                            </div>

                            <!-- Tambahan & Status -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">No HP (WhatsApp)</label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $organisasi->no_hp) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase">Jumlah Pengurus</label>
                                    <input type="number" name="jumlah_pengurus" value="{{ old('jumlah_pengurus', $organisasi->jumlah_pengurus) }}" class="mt-1 block w-full rounded-md border-gray-300 focus:border-yellow-500 focus:ring-yellow-200 shadow-sm" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Status Aktif</label>
                                    <div class="flex items-center space-x-6 bg-gray-50 p-2 rounded-md border border-gray-200">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="is_aktif" value="1" {{ $organisasi->is_aktif == 1 ? 'checked' : '' }} class="text-blue-600 focus:ring-blue-500">
                                            <span class="ml-2 text-sm font-bold text-green-600 uppercase">Aktif</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="is_aktif" value="0" {{ $organisasi->is_aktif == 0 ? 'checked' : '' }} class="text-red-600 focus:ring-red-500">
                                            <span class="ml-2 text-sm font-bold text-red-600 uppercase">Tidak Aktif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto Profil -->
                            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex flex-col items-center">
                                <label class="block text-xs font-bold text-blue-900 uppercase mb-4 tracking-widest">Foto Profil Organisasi</label>
                                @if($organisasi->foto_profil)
                                    <div class="relative group mb-4">
                                        <img src="{{ asset('storage/'.$organisasi->foto_profil) }}" class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg group-hover:opacity-75 transition">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-[10px] font-bold text-blue-900 bg-white/50 rounded-full">FOTO SAAT INI</div>
                                    </div>
                                @endif
                                <input type="file" name="foto_profil" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition">
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-[#1e3a8a] border border-transparent rounded-lg font-black text-xs text-white uppercase tracking-[0.2em] hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition shadow-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                Perbarui Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
