{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Organisasi</h2>
    <a href="{{ route('organisasi.index') }}">Kembali ke Daftar</a> |
    <a href="{{ route('organisasi.edit', $organisasi->id) }}">Edit Data Ini</a>
    <br><br>

    <div style="border: 1px solid #ccc; padding: 20px; border-radius: 8px; display: flex; gap: 20px;">
        <div class="foto">
            @if($organisasi->foto_profil)
                <img src="{{ asset('storage/'.$organisasi->foto_profil) }}" width="200" style="border-radius: 8px;">
            @else
                <div style="width: 200px; height: 200px; background: #eee; text-align: center; line-height: 200px;">No Photo</div>
            @endif
        </div>

        <div class="info">
            <table cellpadding="5">
                <tr><td><strong>ID Organisasi</strong></td><td>: {{ $organisasi->id_organisasi }}</td></tr>
                <tr><td><strong>Nama Organisasi</strong></td><td>: {{ $organisasi->nama_organisasi }}</td></tr>
                <tr><td><strong>Jenis</strong></td><td>: {{ $organisasi->jenis_organisasi }}</td></tr>
                <tr><td><strong>Ketua Umum</strong></td><td>: {{ $organisasi->nama_ketua }}</td></tr>
                <tr><td><strong>Username</strong></td><td>: {{ $organisasi->username }}</td></tr>
                <tr><td><strong>Email</strong></td><td>: {{ $organisasi->email }}</td></tr>
                <tr><td><strong>No HP</strong></td><td>: {{ $organisasi->no_hp }}</td></tr>
                <tr><td><strong>Jumlah Pengurus</strong></td><td>: {{ $organisasi->jumlah_pengurus }} Orang</td></tr>
                <tr><td><strong>Status</strong></td><td>: {{ $organisasi->is_aktif ? 'Aktif' : 'Non-Aktif' }}</td></tr>
            </table>
        </div>
    </div>
</div>
@endsection --}}


<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Profil Lengkap Organisasi') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('organisasi.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg shadow transition text-sm">
                    Kembali
                </a>
                <a href="{{ route('organisasi.edit', $organisasi->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-2 px-4 rounded-lg shadow transition text-sm">
                    Edit Data
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">

                <!-- Profile Header Banner -->
                <div class="h-32 bg-[#1e3a8a] relative">
                    <div class="absolute -bottom-16 left-8">
                        @if($organisasi->foto_profil)
                            <img src="{{ asset('storage/'.$organisasi->foto_profil) }}" class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover bg-white">
                        @else
                            <div class="w-32 h-32 rounded-full border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center text-gray-400 font-bold">
                                NO FOTO
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Profile Info Section -->
                <div class="pt-20 pb-8 px-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-black text-blue-900 uppercase tracking-tight">{{ $organisasi->nama_organisasi }}</h3>
                        <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full uppercase mt-1 border border-yellow-200">
                            {{ $organisasi->jenis_organisasi }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri: Detail Kontak -->
                        <div class="space-y-4">
                            <h4 class="text-sm font-black text-[#1e3a8a] border-b-2 border-yellow-500 pb-1 w-fit italic uppercase tracking-widest">Informasi Kontak</h4>

                            <div class="flex items-center space-x-3 text-sm">
                                <span class="font-bold text-gray-500 w-32 uppercase text-[10px]">Email Resmi</span>
                                <span class="text-gray-800 font-medium">: {{ $organisasi->user->email ?? $organisasi->email }}</span>
                            </div>

                            <div class="flex items-center space-x-3 text-sm">
                                <span class="font-bold text-gray-500 w-32 uppercase text-[10px]">No. WhatsApp</span>
                                <span class="text-gray-800 font-medium">: {{ $organisasi->no_hp }}</span>
                            </div>

                            <div class="flex items-center space-x-3 text-sm">
                                <span class="font-bold text-gray-500 w-32 uppercase text-[10px]">Username Akun</span>
                                <span class="text-gray-800 font-medium">: {{ $organisasi->user->username ?? $organisasi->username }}</span>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Detail Kepengurusan -->
                        <div class="space-y-4">
                            <h4 class="text-sm font-black text-[#1e3a8a] border-b-2 border-yellow-500 pb-1 w-fit italic uppercase tracking-widest">Detail Organisasi</h4>

                            <div class="flex items-center space-x-3 text-sm">
                                <span class="font-bold text-gray-500 w-32 uppercase text-[10px]">Ketua Umum</span>
                                <span class="text-gray-800 font-bold">: {{ $organisasi->nama_ketua }}</span>
                            </div>

                            <div class="flex items-center space-x-3 text-sm">
                                <span class="font-bold text-gray-500 w-32 uppercase text-[10px]">Total Pengurus</span>
                                <span class="text-gray-800 font-medium">: {{ $organisasi->jumlah_pengurus }} Orang</span>
                            </div>

                            <div class="flex items-center space-x-3 text-sm">
                                <span class="font-bold text-gray-500 w-32 uppercase text-[10px]">Status Aktif</span>
                                <span>:
                                    @if($organisasi->is_aktif)
                                        <span class="text-green-600 font-black uppercase text-xs">Aktif</span>
                                    @else
                                        <span class="text-red-600 font-black uppercase text-xs">Non-Aktif</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer ID Box -->
                    <div class="mt-12 pt-6 border-t border-gray-100 flex justify-between items-center text-[10px] text-gray-400 font-mono tracking-widest uppercase">
                        <span>Database Reference ID: {{ $organisasi->id_organisasi }}</span>
                        <span>Sistem Peminjaman Gedung UNEJ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
