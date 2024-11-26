<?php

namespace App\Http\Controllers;

use \App\Models\Identitas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class IdentitasController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $identitas = Identitas::latest()
        ->orderBy('id','desc')
        ->get();

        $option = [
            'title' => 'Modul Identitas',
            'modul' => 'Identitas',
            'active' => 'Daftar Identitas'
        ];
        return view('identitas.identitas', ['option' => $option, 'data_identitas' => $identitas]);
    }

 

    // Method untuk menampilkan form tambah data
    public function tambah()
    {
        $option = [
            'title' => 'Modul Identitas',
            'modul' => 'Identitas',
            'active' => 'Tambah Identitas'
        ];

        return view('identitas.tambah', ['option' => $option,]);
    }

    // Method untuk menyimpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',  
            'alamat' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'kor_lat' => 'required',
            'kor_long' => 'required',
            'url' => 'required',
            'email' => 'required|email'
        ]);

       

        // Simpan data ke database menggunakan model
        Identitas::create($data);
        Alert::success('Sukses', 'Data berhasil ditambahkan');


        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('identitas.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($nama)
    {
       
        $data = Identitas::where('nama', $nama)->first(); // Menggunakan findOrFail untuk kemudahan

        $option = [
            'title' => 'Modul Identitas',
            'modul' => 'Identitas',
            'active' => 'Detail Identitas'
        ];
        return view('identitas.show', ['option' => $option,'data' => $data]);
    }

    // Method untuk menampilkan form edit data  b
    public function edit($id)
    {
        $data = Identitas::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
        $option = [
            'title' => 'Modul Identitas',
            'modul' => 'Identitas',
            'active' => 'Edit Identitas'
        ];
        return view('identitas.edit', ['option' => $option, 'data' => $data]);
    }
    

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
            'nama' => 'required',  
            'alamat' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'kor_lat' => 'required',
            'kor_long' => 'required',
            'url' => 'required',
            'email' => 'required|email'
        ]);

        

        identitas::where('id', $id)->update($data);
        Alert::success('Sukses', text: 'Data berhasil diubah');
        return redirect()->route('identitas.index');
    }

    public function destroy($id)
    {
        $data = identitas::find($id);
    
        if (!$data) {
            return redirect()->route('identitas.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    
        // Contoh validasi tambahan sebelum menghapus
        if ($data->status == 'protected') {
            return redirect()->route('identitas.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
        }
    
        $data->delete();
        return redirect()->route('identitas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
