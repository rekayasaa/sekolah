<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\HalamanStatis;
use RealRashid\SweetAlert\Facades\Alert;



class HalamanStatisController extends Controller
{
    public function index()
    {
       
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $halaman_statis = HalamanStatis::latest()
        ->orderBy('id','desc')
        ->get();

       $option = [
            'title' => 'Modul Halaman_Statis',
            'modul' => 'Hlaman_Statis',
            'active' => 'Daftar Halman_Statis'
        ];
        return view('halaman_statis.halaman_statis', ['option'=>$option, 'data_statis'=>$halaman_statis]);
    }

    public function tambah()
    {
        $option = [
            'title' => 'Modul Halaman_Statis',
            'modul' => 'Halaman_Statis',
            'active' => 'Daftar Halaman_Statis'
        ];

        return view('halaman_statis.tambah', ['option' => $option]);
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'judul' => 'required',
        'isi_halaman'    => 'required',
        'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    ],
    [
        'judul.required' => 'Judul tidak boleh kosong',
        'isi_halaman.required' => 'Isi halaman Berita tidak boleh kosong',
        'gambar.required' => 'Gambar tidak boleh kosong',
    ]
);

    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/halaman_statis', $fileName, 'public');

        // Simpan path file gambar di data
        $data['gambar'] = '/storage/' . $filePath;
    }

    HalamanStatis::create($data);
    Alert::success('Sukses', 'Data berhasil ditambahkan');
    return redirect()->route('halaman_statis.index')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{

    $data = HalamanStatis::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

    $option = [
        'title' => 'Modul Halaman_Statis',
        'modul' => 'Halaman_Statis',
        'active' => 'Daftar Halaman_Statis'
    ];

    return view('halaman_statis.edit', ['option'=>$option,'data'=>$data]);
}

public function update(Request $request, $id)

{
    $data = $request->validate([
        'judul' => 'required',
        'isi_halaman' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       
    ]);
    
    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/gambar', $fileName, 'public');
        $data['gambar'] = '/storage/' . $filePath;
    }

    HalamanStatis::where('id', $id)->update($data);
    Alert::success('Sukses', 'Data berhasil diubah');
    return redirect()->route('halaman_statis.index')->with('success', 'Data berhasil diubah');
}

public function destroy($id)
    {
        $data = HalamanStatis::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route(route: 'halaman_statis.index')->with('success', 'Data berhasil dihapus');
    }

    
}
