<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role == 'admin') {
            $organisasis = Organisasi::all();
        } else {
            $organisasis = Organisasi::where('user_id', $user->id)->get();
        }
        return view('organisasi.index', compact('organisasis'));
    }


    public function create()
    {
        return view('organisasi.create');
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'id_organisasi' => 'required|unique:organisasi,id_organisasi',
    //         'username' => 'required|unique:organisasi,username',
    //         'password' => 'required|min:6',
    //         'jenis_organisasi' => 'required|in:UKM,Himpunan,BEM',
    //         'nama_organisasi' => 'required|min:3',
    //         'nama_ketua' => 'required',
    //         'no_hp' => 'required',
    //         'email' => 'required|email|unique:organisasi,email',
    //         'jumlah_pengurus' => 'required|numeric',
    //         'is_aktif' => 'required|boolean',
    //         'foto_profil' => 'nullable|image|mimes:jpg,png|max:2048'
    //     ]);

    //     if ($request->hasFile('foto_profil')) {
    //         $validated['foto_profil'] = $request->file('foto_profil')->store('profil', 'public');
    //     }

    //     $validated['password'] = bcrypt($request->password);
    //     Organisasi::create($validated);

    //     return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil ditambahkan!');
    // }

public function store(Request $request)
{
    $validated = $request->validate([
        'id_organisasi' => 'required|unique:organisasi,id_organisasi',
        'username' => 'required|unique:organisasi,username',
        'password' => 'required|min:6',
        'jenis_organisasi' => 'required|in:UKM,Himpunan,BEM',
        'nama_organisasi' => 'required|min:3',
        'nama_ketua' => 'required',
        'no_hp' => 'required',
        'email' => 'required|email|unique:organisasi,email',
        'jumlah_pengurus' => 'required|numeric',
        'is_aktif' => 'required|boolean',
        'foto_profil' => 'nullable|image|mimes:jpg,png|max:2048'
    ]);

    try {
        if ($request->hasFile('foto_profil')) {
            $validated['foto_profil'] = $request->file('foto_profil')->store('profil', 'public');
        }

        $validated['password'] = bcrypt($request->password);

        // Proses simpan ke database
        Organisasi::create($validated);

        return redirect()->route('organisasi.index')
                         ->with('success', 'Organisasi berhasil ditambahkan!');

    } catch (\Exception $e) {
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Organisasi gagal ditambahkan!');
    }
}


    public function show(Organisasi $organisasi)
    {
        return view('organisasi.show', compact('organisasi'));
    }

public function edit(Organisasi $organisasi)
{
    return view('organisasi.edit', compact('organisasi'));
}


        public function update(Request $request, Organisasi $organisasi)
{
    // 1. Validasi data
    // Menggunakan $organisasi->id agar data lama tetap dianggap valid (ignore during update)
    $validatedData = $request->validate([
        'id_organisasi'    => 'required|unique:organisasi,id_organisasi,' . $organisasi->id,
        'username'         => 'required|unique:organisasi,username,' . $organisasi->id,
        'password'         => 'nullable|min:6',
        'jenis_organisasi' => 'required|in:UKM,Himpunan,BEM',
        'nama_organisasi'  => 'required|min:3',
        'nama_ketua'       => 'required',
        'no_hp'            => 'required',
        'email'            => 'required|email|unique:organisasi,email,' . $organisasi->id,
        'jumlah_pengurus'  => 'required|numeric',
        'is_aktif'         => 'required|boolean',
        'foto_profil'      => 'nullable|image|mimes:jpg,png|max:2048'
    ]);

    try {
        // 2. Logika untuk Password (hanya diupdate jika diisi)
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        // 3. Logika untuk Foto Profil
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama dari storage jika ada
            if ($organisasi->foto_profil) {
                \Storage::disk('public')->delete($organisasi->foto_profil);
            }
            $validatedData['foto_profil'] = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        // 4. Proses Update ke Database
        $organisasi->update($validatedData);

        return redirect()->route('organisasi.index')
            ->with('success', 'Data Organisasi ' . $organisasi->nama_organisasi . ' Organisasi berhasil diperbarui!');

    } catch (\Exception $e) {
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Organisasi gagal diperbarui!');
    }
}


    public function destroy(Organisasi $organisasi)
    {
        if ($organisasi->foto_profil) {
            Storage::disk('public')->delete($organisasi->foto_profil);
        }
        $organisasi->delete();
        return redirect()->route('organisasi.index')
                        ->with('success', 'Organisasi ' . $organisasi->nama_organisasi . ' berhasil dihapus.');
    }


    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        // Cari berdasarkan nama_organisasi atau nama_ketua
        $results = Organisasi::where('nama_organisasi', 'LIKE', "%{$keyword}%")
                            ->orWhere('nama_ketua', 'LIKE', "%{$keyword}%")
                            ->get();

        return response()->json($results);
    }



}
