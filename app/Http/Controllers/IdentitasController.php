<?php

namespace App\Http\Controllers;

use \App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $identitas = Identitas::latest()->get();
        $title = 'DATA IDENTITAS';
        return view('identitas.identitas', ['title' => $title, 'data_identitas' => $identitas]);
    }

 

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $title = 'Form Tambah Data';
        return view('identitas.tambah', ['title' => $title]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',  
            'alamat' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'kor_lat' => 'required',
            'kor_long' => 'required',
            'url' => 'required',
            'email' => 'required|email'
        ]);

       

        // Simpan data ke database menggunakan model
        Identitas::create($data);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('identitas.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit data  b
    public function edit($id)
    {
        $title = 'Form Edit Data';
        $data = Identitas::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
        return view('identitas.edit', ['title' => $title, 'data' => $data]);
    }
    

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
            'nama' => 'required',  
            'alamat' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'kor_lat' => 'required',
            'kor_long' => 'required',
            'url' => 'required',
            'email' => 'required|email'
        ]);

        // Temukan data berdasarkan ID dan update
        $identitas = Identitas::findOrFail($id);
        $identitas->update($data);

        // Redirect setelah update
        return redirect()->route('identitas.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = identitas::find($id);
    
        if (!$data) {
            return redirect()->route('identitas.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    
        // Contoh validasi tambahan sebelum menghapus
        if ($data->status == 'protected') {
            return redirect()->route('identitas.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
        }
    
        $data->delete();
        return redirect()->route('identitas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function detail()
{
    // Ambil semua data dari tabel identitas
    $data_identitas = Identitas::all();

    // Kirim ke view
    return view('identitas.detail', compact('data_identitas'));
}
}
