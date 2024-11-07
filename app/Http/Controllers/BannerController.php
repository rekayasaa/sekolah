<?php

namespace App\Http\Controllers;

use \App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $banner = Banner::latest()->get();
        $title = 'DATA BANNER';
        return view('banner.banner', ['title' => $title, 'data_banner' => $banner]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $title = 'Form Tambah Data';
        return view('banner .tambah', ['title' => $title]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',
            'url' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5500',
            
        ]);

       

        // Simpan data ke database menggunakan model
        Banner::create($data);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('banner.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit data
   public function edit($id)
   {
       $title = 'Form Edit Data';
       $data = banner::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
       return view('banner.edit', ['title' => $title, 'data' => $data]);
   }

   // Method untuk mengupdate data
   public function update(Request $request, $id)
   {
       // Validasi input
       $data = $request->validate([
        'judul' => 'required',
        'url' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5500',
           
       ]);

  // Handle gambar upload
  if ($request->hasFile('gambar')) {
   $file = $request->file('gambar');
   $fileName = time() . '_' . $file->getClientOriginalName();
   $filePath = $file->storeAs('uploads/banner', $fileName, 'public');
   $data['gambar'] = '/storage/' . $filePath;
}

banner::where('id', $id)->update($data);

return redirect()->route('banner.index')->with('success', 'Data berhasil diubah');
}

    public function destroy($id)
    {
        $data = Banner::find($id);
    
        if (!$data) {
            return redirect()->route('banner.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    
        // Contoh validasi tambahan sebelum menghapus
        if ($data->status == 'protected') {
            return redirect()->route('banner.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
        }
    
        $data->delete();
        return redirect()->route('banner.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
