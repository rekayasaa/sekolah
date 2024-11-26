<?php

namespace App\Http\Controllers;

use \App\Models\Downlod;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DownlodController extends Controller
{
    // Method untuk menampilkan data
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $downlod = Downlod ::latest()
        ->orderBy('id','desc')
        ->get();

        $option = [
            'title' => 'Modul Downlod',
            'modul' => 'Downlod',
            'active' => 'Daftar Downlod'
        ];        
        return view('downlod.downlod', ['option' => $option, 'data_downlod' => $downlod]);
    }

    // Method untuk menampilkan form tambah data
    public function tambah (){
        
        $option = [
            'title' => 'Modul Downlod',
            'modul' => 'Downlod',
            'active' => 'Tambah Downlod'
        ];        
        return view('downlod.tambah', ['option'=>$option]);
        
    }

    public function store(Request $request)
{
    // Validasi input
    $data = $request->validate([
        'judul' => 'required',
        'file' => 'required',
        'hit' => 'required'
    ]);

    // Simpan data ke database menggunakan model
    Downlod::create($data);
    Alert::success('Sukses', 'Data berhasil ditambahkan');

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('downlod.index')->with('success', 'Data berhasil ditambahkan');
}

    // Method untuk menampilkan form edit data
    public function edit($id)
    {
        $data = downlod::findOrFail($id); // Menggunakan findOrFail untuk kemudahan

        $option = [
            'title' => 'Modul Downlod',
            'modul' => 'Downlod',
            'active' => 'Tambah Downlod'
        ];         
        return view('downlod.edit', ['option' => $option, 'data' => $data]);
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
           'judul' => 'required',
        'file' => 'required',
        'hit' => 'required'
        ]);

        downlod::where('id', $id)->update($data);
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('downlod.index');
    }

    public function destroy($id)
    {
        $data = downlod::findOrFail($id);
        $data->delete();
        alert()->success('Hore!', 'Data berhasil dihapus');
        return redirect()->route('downlod.index');
    }
}
