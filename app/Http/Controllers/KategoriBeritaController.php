<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Routing\Controller;



class KategoriBeritaController extends Controller
{
    public function index()
{
    $kategori = KategoriBerita::latest()->get();
    $title = 'DAFTAR KATEGORI';
    return view('kategori_berita.kategori_berita', ['title' => $title, 'data_kategori' => $kategori]);
}

    public function tambah (){
        
        $title = 'Form Tambah Data';
        
        return view('kategori_berita.tambah', ['title'=>$title]);
        
    }

    public function store(Request $request)
{
    // Validasi input
    $data = $request->validate([
        'nama' => 'required',
        'slug' => 'required',
        'aktif' => 'required'
    ]);

    // Simpan data ke database menggunakan model
    KategoriBerita::create($data);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('kategori_berita.index')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{
    $title = 'Form Edit Data';
    $data = KategoriBerita::where('id', $id)->first();
    return view('kategori_berita.edit', ['title'=>$title,'data'=>$data]);
}

public function update(Request $request, $id)

{
    $data = $request->validate([
        'nama' => 'required',
        'slug' => 'required',
        'aktif' => 'required',
        
    ]);

    KategoriBerita::where('id', $id)->update($data);

    return redirect()->route('kategori_berita.index')->with('success', 'Data berhasil diubah');
}
public function destroy($id)
    {
        $data = KategoriBerita::findOrFail($id);
        $data->delete();
        return redirect()->route('kategori_berita.index')->with('success', 'Data berhasil dihapus');
    }
}

