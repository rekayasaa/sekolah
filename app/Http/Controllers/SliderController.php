<?php

namespace App\Http\Controllers;

use \App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $slider = Slider::latest()->get();
        $title = 'DATA SLIDER';
        return view('slider.slider', ['title' => $title, 'data_slider' => $slider]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $title = 'Form Tambah Data';
        return view('slider .tambah', ['title' => $title]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500'
            
        ]);

        // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/slider', $fileName, 'public');

        // Simpan path file gambar di data
        $data['gambar'] = '/storage/' . $filePath;
    }

    Slider::create($data);

    return redirect()->route('slider.index')->with('success', 'Data berhasil ditambahkan');
}

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $title = 'Form Edit Data';
        $data = Slider::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
        return view('slider.edit', ['title' => $title, 'data' => $data]);
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',  
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500'
            
        ]);

   // Handle gambar upload
   if ($request->hasFile('gambar')) {
    $file = $request->file('gambar');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('uploads/slider', $fileName, 'public');
    $data['gambar'] = '/storage/' . $filePath;
}

Slider::where('id', $id)->update($data);

return redirect()->route('slider.index')->with('success', 'Data berhasil diubah');
}
    public function destroy($id)
    {
        $data = Slider::find($id);
    
        if (!$data) {
            return redirect()->route('slider.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    
        // Contoh validasi tambahan sebelum menghapus
        if ($data->status == 'protected') {
            return redirect()->route('slider.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
        }
    
        $data->delete();
        return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
