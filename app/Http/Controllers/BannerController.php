<?php

namespace App\Http\Controllers;

use \App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $banner = Banner::latest()
        ->orderBy('id','desc')
        ->get();

        $option = [
            'title' => 'Modul Banner',
            'modul' => 'Banner',
            'active' => 'Daftar Banner'
        ];
        return view('banner.banner', ['option' => $option, 'data_banner' => $banner]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $option = [
            'title' => 'Modul Banner',
            'modul' => 'Banner',
            'active' => 'Daftar Banner'
        ];
        return view('banner.tambah', ['option' => $option]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',
            'url' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5500',
            
        ],
        [
            'judul.required' => 'Judul tidak boleh kosong',
            'url.required' => 'Url  tidak boleh kosong',
            'gambar.required' => 'Gambar  tidak boleh kosong'
        ]
    );

        // Handle gambar upload
        if ($request->hasFile('gambar')) { 
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/banner', $fileName, 'public');
    
            // Simpan path file gambar di data
            $data['gambar'] = '/storage/' . $filePath; // Ubah 'gambar' menjadi 'foto'
        }

        Banner::create($data);
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect()->route('banner.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit data
   public function edit($id)
   {
       
       $data = banner::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

       $option = [
        'title' => 'Modul Banner',
        'modul' => 'Banner',
        'active' => 'Daftar Banner'
    ];

       return view('banner.edit', ['option' => $option, 'data' => $data]);
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
Alert::success('Sukses', 'Data berhasil diubah');
return redirect()->route('banner.index')->with('success', 'Data berhasil diubah');
}

    public function destroy($id)
    {
        $data = banner::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('banner.index')->with('success', 'Data berhasil dihapus');
    }
    
}
