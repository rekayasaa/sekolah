<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;



class KategoriBeritaController extends Controller
{
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $kategori = KategoriBerita::latest()
        ->orderBy('id','desc')
        ->get();

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
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kategori_berita.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {

        $kategori_berita  = KategoriBerita::select('id', 'nama')
        ->where('aktif','Y')
        ->get();
        $data = KategoriBerita::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

        $option = [
            'title' => 'Modul Kategori Berita',
            'modul' => 'Kategori Berita',
            'active' => 'Edit Kategori Berita'
        ];
    
        return view('kategori_berita.edit', ['option' => $option, 'data' => $data]);
    }

    public function update(Request $request, $id)

    {
        $data = $request->validate([
            'nama' => 'required',
    

        ]);

        $data['slug'] = Str::slug($data['nama'], '-');
        $data['aktif'] = isset($request->aktif) ? $request->aktif : 'N';


        KategoriBerita::where('id', $id)->update($data);
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('kategori_berita.index');
    }
    public function destroy($id)
    {
        $data = kategoriberita::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('kategori_berita.index');
    }
}
