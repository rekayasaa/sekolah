<?php

namespace App\Http\Controllers;

use \App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $album = Album::latest()->get();
        $title = 'DATA ALBUM';
        return view('album.album', ['title' => $title, 'data_album' => $album]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $title = 'Form Tambah Data';
        return view('album.tambah', ['title' => $title]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'aktif' => 'required'
            
        ]);

       

        // Simpan data ke database menggunakan model
        Album::create($data);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('album.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $title = 'Form Edit Data';
        $data = Album::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
        return view('album.edit', ['title' => $title, 'data' => $data]);
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',  
            'slug' => 'required',
            'aktif' => 'required'
            
        ]);

        // Temukan data berdasarkan ID dan update
        $album = Album::findOrFail($id);
        $album->update($data);

        // Redirect setelah update
        return redirect()->route('album.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = Album::find($id);
    
        if (!$data) {
            return redirect()->route('album.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    
        // Contoh validasi tambahan sebelum menghapus
        if ($data->status == 'protected') {
            return redirect()->route('album.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
        }
    
        $data->delete();
        return redirect()->route('album.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
