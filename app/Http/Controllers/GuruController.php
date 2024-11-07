<?php

namespace App\Http\Controllers;

use \App\Models\Guru;
use Illuminate\Http\Request;



class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();
        $title = 'DATA GURU';
        return view('guru.guru', ['title'=>$title, 'data_guru'=>$guru]);
    }

    public function tambah (){
        
        $title = 'Form Tambah Data';
        
        return view('guru.tambah', ['title'=>$title]);
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nip'    => 'required',
            'tempat_lahir'     => 'required',
            'tgl_lahir'     => 'required',
            'jabatan'     => 'required',
            'foto'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500'
        ]);
    
        // Handle gambar upload
        if ($request->hasFile('foto')) { 
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/guru', $fileName, 'public');
    
            // Simpan path file gambar di data
            $data['foto'] = '/storage/' . $filePath; // Ubah 'gambar' menjadi 'foto'
        }
    
        Guru::create($data);
    
        return redirect()->route('guru.index')->with('success', 'Data berhasil ditambahkan');
    }
    


// Method untuk menampilkan form edit data
public function edit($id)
{
    $title = 'Form Edit Data';
    $data = guru::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
    return view('guru.edit', ['title' => $title, 'data' => $data]);
}

// Method untuk mengupdate data
public function update(Request $request, $id)
{
    // Validasi input
    $data = $request->validate([
       'nama' => 'required',
            'nip'    => 'required',
            'tempat_lahir'     => 'required',
            'tgl_lahir'     => 'required',
            'jabatan'     => 'required',
            'foto'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500'
        
    ]);

// Handle gambar upload
if ($request->hasFile('foto')) {
$file = $request->file('foto');
$fileName = time() . '_' . $file->getClientOriginalName();
$filePath = $file->storeAs('uploads/guru', $fileName, 'public');
$data['foto'] = '/storage/' . $filePath;
}

guru::where('id', $id)->update($data);

return redirect()->route('guru.index')->with('success', 'Data berhasil diubah');
}

public function destroy($id)
    {
        $data = guru::findOrFail($id);
        $data->delete();
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus');
    }

    
}
