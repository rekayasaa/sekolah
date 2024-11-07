<?php

namespace App\Http\Controllers;

use \App\Models\Galeri;
use Illuminate\Http\Request;



class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        $title = 'DATA GALERI';
        return view('galeri.galeri', ['title'=>$title, 'data_galeri'=>$galeri]);
    }

    public function tambah (){
        
        $title = 'Form Tambah Data';
        
        return view('galeri.tambah', ['title'=>$title]);
        
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'album_id' => 'required',
        'judul'    => 'required',
        'slug'     => 'required',
        'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500',
        'keterangan' => 'required'
    ]);

    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/galeri', $fileName, 'public');

        // Simpan path file gambar di data
        $data['gambar'] = '/storage/' . $filePath;
    }

    Galeri::create($data);

    return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{
    $title = 'Form Edit Data';
    $data = galeri::where('id', $id)->first();
    return view('galeri.edit', ['title'=>$title,'data'=>$data]);
}

public function update(Request $request, $id)

{
    $data = $request->validate([
        'album_id' => 'required',
        'judul' => 'required',
        'slug' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5500',
        'keterangan' => 'required'
    ]);
    
    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/galeri', $fileName, 'public');
        $data['gambar'] = '/storage/' . $filePath;
    }

    galeri::where('id', $id)->update($data);

    return redirect()->route('galeri.index')->with('success', 'Data berhasil diubah');
}

public function destroy($id)
    {
        $data = galeri::findOrFail($id);
        $data->delete();
        return redirect()->route(route: 'galeri.index')->with('success', 'Data berhasil dihapus');
    }

    
}
