<?php

namespace App\Http\Controllers;

use App\Models\Album;
use \App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class GaleriController extends Controller
{
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        
        $galeri = Galeri::select('galeri.id', 'album.judul AS album','galeri.judul','galeri.slug','galeri.gambar', 'galeri.keterangan')
        ->join('album', 'galeri.album_id', '=', 'album.id')
        ->orderBy('id','desc')
        ->get();
        
        $option = [
            'title' => 'Modul Galeri',
            'modul' => 'Galeri',
            'active' => 'Daftar Galeri'
        ];

        return view('galeri.galeri', ['option'=>$option, 'data_galeri'=>$galeri]);
    }

    public function tambah (){
        
         $album  = Album::select('id', 'judul')
         ->where('aktif','Y')
         ->get();

        $option = [
            'title' => 'Modul Galeri',
            'modul' => 'Galeri',
            'active' => 'Daftar Galeri'
        ];
        
        return view('galeri.tambah', ['option'=>$option, 'album' => $album]);
        
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'album_id' => 'required',
        'judul'    => 'required',
        'keterangan' => 'required',
        'gambar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
    ],
[
     'album_id.required' => 'Album tidak boleh kosong',
     'judul.required' => 'Judul tidak boleh kosong',
     'keterangan.required' => 'keterangan tidak boleh kosong'
]);
$data['slug'] = Str::slug($data['judul'], '-');

    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/galeri', $fileName, 'public');

        // Simpan path file gambar di data
        $data['gambar'] = '/storage/' . $filePath;
    }

    Galeri::create($data);
    Alert::success('Sukses', 'Data berhasil ditambahkan');
    return redirect()->route(route: 'galeri.index');
}


public function edit($id)
{
    $album  = Album::select('id', 'judul')
    ->where('aktif','Y')
    ->get();
    $data = Galeri::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

    $option = [
        'title' => 'Modul Album',
        'modul' => 'Album',  
        'active' => 'Edit Album'
    ];    
    return view('galeri.edit', ['option'=>$option,'album'=>$album, 'data'=>$data]);
}

public function update(Request $request, $id)

{
    $data = $request->validate([
        'album_id' => 'required',
        'judul' => 'required',
        'keterangan' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
    ]);

    $data['slug'] = Str::slug($data['judul'], '-');

    
    // Handle gambar upload
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/galeri', $fileName, 'public');
        $data['gambar'] = '/storage/' . $filePath;
    }

    galeri::where('id', $id)->update($data);
    Alert::success('Sukses', 'Data berhasil diubah');
    return redirect()->route('galeri.index');
}

public function destroy($id)
    {
        $data = galeri::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('galeri.index');
    }
}
