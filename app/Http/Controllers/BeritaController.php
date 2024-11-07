<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        $title = 'DATA BERITA';
        return view('berita.berita', ['title' => $title, 'data_berita' => $berita]);
    }

    public function tambah()
    {
        $title = 'Form Tambah Data';
        return view('berita.tambah', ['title' => $title]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'penulis_id' => 'required',
            'kategori_id' => 'required',
            'tag_id' => 'required',
            'slug' => 'required',
            'headline' => 'required',
            'publik' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hit' => 'required'
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/berita', $fileName, 'public');
            $data['gambar'] = '/storage/' . $filePath;
        }

        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Data berhasil ditambahkan');
    }

   // Method untuk menampilkan form edit data
   public function edit($id)
   {
       $title = 'Form Edit Data';
       $data = berita::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
       return view('berita.edit', ['title' => $title, 'data' => $data]);
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
            'tag_id' => 'required',
            'slug' => 'required',
            'headline' => 'required',
            'publik' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5100',
            'hit' => 'required'
           
       ]);

  // Handle gambar upload
  if ($request->hasFile('gambar')) {
   $file = $request->file('gambar');
   $fileName = time() . '_' . $file->getClientOriginalName();
   $filePath = $file->storeAs('uploads/berita', $fileName, 'public');
   $data['gambar'] = '/storage/' . $filePath;
}

berita::where('id', $id)->update($data);

return redirect()->route('berita.index')->with('success', 'Data berhasil diubah');
}

public function destroy($id)
{
    $data = berita::findOrFail($id);
    $data->delete();
    return redirect()->route('berita.index')->with('success', 'Data berhasil dihapus');
}
}
 