<?php

namespace App\Http\Controllers;

use \App\Models\Downlod;
use Illuminate\Http\Request;

class DownlodController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $downlod = Downlod ::latest()->get();
        $title = 'DATA DOWNLOAD';
        return view('downlod.downlod', ['title' => $title, 'data_downlod' => $downlod]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah (){
        
        $title = 'Form Tambah Data';
        
        return view('downlod.tambah', ['title'=>$title]);
        
    }

    public function store(Request $request)
{
    // Validasi input
    $data = $request->validate([
        'judul' => 'required',
        'file' => 'required',
        'hit' => 'required'
    ]);

    // Simpan data ke database menggunakan model
    Downlod::create($data);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('downlod.index')->with('success', 'Data berhasil ditambahkan');
}

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $title = 'Form Edit Data';
        $data = downlod::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
        return view('downlod.edit', ['title' => $title, 'data' => $data]);
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
         'judul' => 'required',
            'file' => 'required',
            'hit' => 'required'
        ]);

        // Temukan data berdasarkan ID dan update
        $identitas = downlod::findOrFail($id);
        $identitas->update($data);

        // Redirect setelah update
        return redirect()->route('dwonlod.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = downlod::find($id);
    
        if (!$data) {
            return redirect()->route('downlod.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    
        // Contoh validasi tambahan sebelum menghapus
        if ($data->status == 'protected') {
            return redirect()->route('downlod.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
        }
    
        $data->delete();
        return redirect()->route('downlod.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
