<?php

namespace App\Http\Controllers;

use \App\Models\Guru;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class GuruController extends Controller
{
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $guru = Guru::latest()
        ->orderBy('id','desc')
        ->get();

       $option = [
            'title' => 'Modul Guru',
            'modul' => 'Guru',
            'active' => 'Daftar Guru'
        ];
        return view('guru.guru', ['option'=>$option, 'data_guru'=>$guru]);
    }

    public function tambah (){
        
        $option = [
            'title' => 'Modul Guru',
            'modul' => 'Guru',
            'active' => 'Daftar Guru'
        ];

        
        return view('guru.tambah', ['option'=>$option]);
        
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
        ],
        [
            'nama.required' => 'nama tidak boleh kosong',
            'nip.required' => 'nip  tidak boleh kosong',
            'tempat_lahir.required' => 'tempat lahir tidak boleh kosong',
            'tgl_lahir.required' => 'tanggal lahir tidak boleh kosong',
            'jabatan.required' => 'jabatan tidak boleh kosong',
            'foto.required' => 'foto tidak boleh kosong',
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
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect()->route('guru.index')->with('success', 'Data berhasil ditambahkan');
    }
    


// Method untuk menampilkan form edit data
public function edit($id)
{

    $data = guru::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

    $option = [
        'title' => 'Modul Guru',
        'modul' => 'Guru',
        'active' => 'Daftar Guru'
    ];
    return view('guru.edit', ['option' => $option, 'data' => $data]);
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
Alert::success('Sukses', 'Data berhasil diubah');
return redirect()->route('guru.index')->with('success', 'Data berhasil diubah');
}

public function destroy($id)
    {
        $data = guru::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus');
    }

    
}
