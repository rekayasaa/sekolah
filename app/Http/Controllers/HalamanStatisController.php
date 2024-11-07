<?php

namespace App\Http\Controllers;

use \App\Models\HalamanStatis;
use Illuminate\Http\Request;



class HalamanStatisController extends Controller
{
    public function index()
    {
        $statis = HalamanStatis::latest()->get();
        $title = 'DATA STATIS';
        return view('halaman_statis.halaman_statis', ['title'=>$title, 'data_statis'=>$statis]);
    }

    public function tambah()
    {
        $title = 'Form Tambah Data';
        return view('halaman_statis.tambah', ['title' => $title]);
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'judul' => 'required',
        'isi_halaman'    => 'required',
        'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    ]);

    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/halaman_statis', $fileName, 'public');

        // Simpan path file gambar di data
        $data['gambar'] = '/storage/' . $filePath;
    }

    HalamanStatis::create($data);

    return redirect()->route('halaman_statis.index')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{
    $title = 'Form Edit Data';
    $data = HalamanStatis::where('id', $id)->first();
    return view('halaman_statis.edit', ['title'=>$title,'data'=>$data]);
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

    return redirect()->route('halaman_statis.index')->with('success', 'Data berhasil diubah');
}

public function destroy($id)
    {
        $data = HalamanStatis::findOrFail($id);
        $data->delete();
        return redirect()->route(route: 'halaman_statis.index')->with('success', 'Data berhasil dihapus');
    }

    
}
