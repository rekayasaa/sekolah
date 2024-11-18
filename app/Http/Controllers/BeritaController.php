<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $berita = Berita::select('berita.id', 'berita.judul', 'berita.isi_berita', 'users.name AS penulis', 'kategori_berita.nama AS kategori', 'berita.headline', 'berita.publik', 'berita.gambar', 'berita.slug')
            ->join('users', 'berita.penulis_id', '=', 'users.id')
            ->join('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
            ->get();

        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Daftar Berita'
        ];

        return view('berita.berita', ['option' => $option, 'data_berita' => $berita]);
    }

    public function tambah()
    {
        $user  = User::select('id', 'name')->get();
        $kategori  = KategoriBerita::select('id', 'nama')->get();

        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Tambah Berita'
        ];

        return view('berita.tambah', ['option' => $option, 'user' => $user, 'kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'judul' => 'required',
                'isi_berita' => 'required',
                'penulis_id' => 'required',
                'kategori_id' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'isi_berita.required' => 'Isi Berita tidak boleh kosong',
                'penulis_id.required' => 'Penulis tidak boleh kosong',
                'kategori_id.required' => 'Kategori tidak boleh kosong',
            ]
        );

        // echo '<pre>';
        // print_r($request->input('judul'));
        // print_r($request->judul);
        // echo '</pre>';

        $data['slug'] = Str::slug($data['judul'], '-');
        $data['headline'] = isset($request->headline) ? $request->headline : 'N';
        $data['publik'] = isset($request->publik) ? $request->publik : 'N';

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/berita', $fileName, 'public');
            $data['gambar'] = '/storage/' . $filePath;
        }

        Berita::create($data);
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect()->route('berita.index');
    }

    public function show($slug)
    {
        $user  = User::select('id', 'name')->get();
        $kategori  = KategoriBerita::select('id', 'nama')->get();
        $data = Berita::where('slug', $slug)->first(); // Menggunakan findOrFail untuk kemudahan

        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Detail Berita'
        ];
        return view('berita.show', ['option' => $option, 'user' => $user, 'kategori' => $kategori, 'data' => $data]);
    }

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $user  = User::select('id', 'name')->get();
        $kategori  = KategoriBerita::select('id', 'nama')->get();
        $data = Berita::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Edit Berita'
        ];
        return view('berita.edit', ['option' => $option, 'user' => $user, 'kategori' => $kategori, 'data' => $data]);
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'penulis_id' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5100',
        ]);

        $data['slug'] = Str::slug($data['judul'], '-');
        $data['headline'] = isset($request->headline) ? $request->headline : 'N';
        $data['publik'] = isset($request->publik) ? $request->publik : 'N';

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/berita', $fileName, 'public');
            $data['gambar'] = '/storage/' . $filePath;
        }

        berita::where('id', $id)->update($data);
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('berita.index');
    }

    public function destroy($id)
    {
        $data = berita::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('berita.index');
    }
}
