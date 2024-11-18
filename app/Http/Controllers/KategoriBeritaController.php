<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Routing\Controller;



class KategoriBeritaController extends Controller
{
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $kategori = KategoriBerita::latest()->get();

        $option = [
            'title' => 'Modul Kategori Berita',
            'modul' => 'Kategori Berita',
            'active' => 'Daftar Kategori Berita'
        ];
        return view('kategori_berita.kategori_berita', ['option' => $option, 'data_kategori' => $kategori]);
    }

    public function tambah()
    {

        $option = [
            'title' => 'Modul Kategori Berita',
            'modul' => 'Kategori Berita',
            'active' => 'Tambah Kategori Berita'
        ];

        return view('kategori_berita.tambah', ['option' => $option]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate(
            [
                'nama' => 'required'
            ],
            [
                'nama.required' => 'Nama Ketegori tidak boleh kosong'
            ]
        );

        $data['slug'] = Str::slug($_POST['nama'], '-');
        $data['aktif'] = isset($request->aktif) ? $request->aktif : 'N';

        // Simpan data ke database menggunakan model
        KategoriBerita::create($data);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kategori_berita.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $title = 'Form Edit Data';
        $data = KategoriBerita::where('id', $id)->first();
        return view('kategori_berita.edit', ['title' => $title, 'data' => $data]);
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
