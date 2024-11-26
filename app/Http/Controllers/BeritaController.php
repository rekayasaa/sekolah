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
    // Method untuk menampilkan daftar berita
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text); // Menampilkan konfirmasi sebelum menghapus data

        // Mengambil data berita beserta relasinya dengan user dan kategori berita
        $berita = Berita::select('berita.id', 'berita.judul', 'berita.isi_berita', 'users.name AS penulis', 'kategori_berita.nama AS kategori', 'berita.headline', 'berita.publik', 'berita.gambar', 'berita.slug')
            ->join('users', 'berita.penulis_id', '=', 'users.id')
            ->join('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
            ->orderBy('id','desc')
            ->get();

        // Mengatur opsi untuk tampilan
        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Daftar Berita'
        ];

        // Mengirim data ke view 'berita.berita'
        return view('berita.berita', ['option' => $option, 'data_berita' => $berita]);
    }

    // Method untuk menampilkan form tambah berita
    public function tambah()
    {
        // Mengambil daftar user dan kategori berita
        $user = User::select('id', 'name')->get();
        $kategori = KategoriBerita::select('id', 'nama')
        ->where('aktif','Y')
        ->get();

        // Mengatur opsi untuk tampilan
        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Tambah Berita'
        ];

        // Mengirim data ke view 'berita.tambah'
        return view('berita.tambah', ['option' => $option, 'user' => $user, 'kategori' => $kategori]);
    }

    // Method untuk menyimpan data berita baru
    public function store(Request $request)
    {
        // Validasi data input
        $data = $request->validate(
            [
                'judul' => 'required',
                'isi_berita' => 'required',
                'penulis_id' => 'required',
                'kategori_id' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5555',
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'isi_berita.required' => 'Isi Berita tidak boleh kosong',
                'penulis_id.required' => 'Penulis tidak boleh kosong',
                'kategori_id.required' => 'Kategori tidak boleh kosong',
            ]
        );

        // Membuat slug untuk berita
        $data['slug'] = Str::slug($data['judul'], '-');
        $data['headline'] = isset($request->headline) ? $request->headline : 'N';
        $data['publik'] = isset($request->publik) ? $request->publik : 'N';

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/berita', $fileName, 'public');
            $data['gambar'] = '/storage/' . $filePath;
        }

        // Menyimpan data berita ke database
        Berita::create($data);
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect()->route(route: 'berita.index');
    }

    // Method untuk menampilkan detail berita berdasarkan slug
    public function show($slug)
    {
        // Mengambil daftar user dan kategori berita
        $user = User::select('id', 'name')->get();
        $kategori = KategoriBerita::select('id', 'nama')->get();

        // Mengambil data berita berdasarkan slug
        $data = Berita::where('slug', $slug)->first();

        // Mengatur opsi untuk tampilan
        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Detail Berita'
        ];

        // Mengirim data ke view 'berita.show'
        return view('berita.show', ['option' => $option, 'user' => $user, 'kategori' => $kategori, 'data' => $data]);
    }

    // Method untuk menampilkan form edit data berita
    public function edit($id)
    {
        // Mengambil daftar user dan kategori berita
        $user = User::select('id', 'name')
        ->get();
        $kategori = KategoriBerita::select('id', 'nama')
        ->where('aktif','Y')
        ->get();

        // Mengambil data berita berdasarkan ID
        $data = Berita::findOrFail($id);

        // Mengatur opsi untuk tampilan
        $option = [
            'title' => 'Modul Berita',
            'modul' => 'Berita',
            'active' => 'Edit Berita'
        ];

        // Mengirim data ke view 'berita.edit'
        return view('berita.edit', ['option' => $option, 'user' => $user, 'kategori' => $kategori, 'data' => $data]);
    }

    // Method untuk mengupdate data berita
    public function update(Request $request, $id)
    {
        // Validasi data input
        $data = $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'penulis_id' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5100',
        ]);

        // Membuat slug untuk berita
        $data['slug'] = Str::slug($data['judul'], '-');
        $data['headline'] = isset($request->headline) ? $request->headline : 'N';
        $data['publik'] = isset($request->publik) ? $request->publik : 'N';

        // Handle upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/berita', $fileName, 'public');
            $data['gambar'] = '/storage/' . $filePath;
        }

        // Mengupdate data berita di database
        Berita::where('id', $id)->update($data);
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('berita.index');
    }

    // Method untuk menghapus data berita
    public function destroy($id)
    {
        // Mengambil data berita berdasarkan ID
        $data = Berita::findOrFail($id);

        // Menghapus data berita
        $data->delete();
        Alert::success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('berita.index');
    }
}
