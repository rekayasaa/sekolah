<?php

namespace App\Http\Controllers;

use \App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $slider = Slider::latest()
        ->orderBy('id','desc')
        ->get();

       $option = [
            'title' => 'Modul Slider',
            'modul' => 'Slider',
            'active' => 'Daftar Slider'
        ];
        return view('slider.slider', ['option' => $option, 'data_slider' => $slider]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $option = [
            'title' => 'Modul Slider',
            'modul' => 'Slider',
            'active' => 'Daftar Slider'
        ];
        return view('slider.tambah', ['option' => $option]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500'
            
        ],
        [
            'judul.required' => 'judul tidak boleh kosong',
            'keterangan.required' => 'keterangan  tidak boleh kosong',
            'gambar.required' => 'gambar  tidak boleh kosong'
        ]
    );

        // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/slider', $fileName, 'public');

        // Simpan path file gambar di data
        $data['gambar'] = '/storage/' . $filePath;
    }

    Slider::create($data);
    Alert::success('Sukses', 'Data berhasil ditambahkan');
    return redirect()->route('slider.index')->with('success', 'Data berhasil ditambahkan');
}

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        
        $data = Slider::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

        $option = [
            'title' => 'Modul Slider',
            'modul' => 'Slider',
            'active' => 'Daftar Slider'
        ];
        return view('slider.edit', ['option' => $option, 'data' => $data]);
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
Alert::success('Sukses', 'Data berhasil diubah');
return redirect()->route('slider.index')->with('success', 'Data berhasil diubah');
}
    public function destroy($id)
    {
        $data = Slider::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('slider.index')->with('success', 'Data berhasil dihapus');
    }

    
}
