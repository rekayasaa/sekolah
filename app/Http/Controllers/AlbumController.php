<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;



class AlbumController extends Controller
{
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $album = Album::latest()
        ->orderBy('id','desc')
        ->get();

        $option = [
            'title' => 'Modul Album',
            'modul' => 'Album',
            'active' => 'Daftar Album'
        ];
       
        return view('album.album', ['option'=>$option, 'data_album'=>$album]);
    }

    public function tambah (){
        
        $option = [
            'title' => 'Modul Album',
            'modul' => 'Album',
            'active' => 'Daftar Album'
        ];
        
        return view('album.tambah', ['option'=>$option]);
        
    }

    public function store(Request $request)
{
     // Validasi input
     $data = $request->validate(
        [
            'judul' => 'required'
        ],
        [
            'judul.required' => 'Judul  tidak boleh kosong'
        ]
    );

    $data['slug'] = Str::slug($_POST['judul'], '-');
    $data['aktif'] = isset($request->aktif) ? $request->aktif : 'N';

    // Simpan data ke database menggunakan model
    Album::create($data);
    Alert::success('Sukses', 'Data berhasil ditambahkan');
    return redirect()->route('album.index')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{
    $data = album::where('id', $id)->first();
    $option = [
        'title' => 'Modul Album',
        'modul' => 'Album',
        'active' => 'Edit Album'
    ];    
    return view('album.edit', ['option'=>$option,'data'=>$data]);
}

public function update(Request $request, $id)

{
    $data = $request->validate([
        'judul'    => 'required'
    ]);

    $data['slug'] = Str::slug($data['judul'], '-');
    $data['aktif'] = isset($request->aktif) ? $request->aktif : 'N';

    album::where('id', $id)->update($data);
    Alert::success('Sukses', 'Data berhasil diubah');
    return redirect()->route('album.index');
}

public function destroy($id)
    {
        $data = album::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('album.index');
    }

    
}
