<?php

namespace App\Http\Controllers;

use \App\Models\Menu;
use Illuminate\Http\Request;



class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::latest()->get();
        $title = 'DATA MENU';
        return view('menu.menu', ['title'=>$title, 'data_menu'=>$menu]);
    }
 // Method untuk menampilkan form tambah data
 public function tambah()
 {
     $title = 'Form Tambah Data';
     return view('menu.tambah', ['title' => $title]);
 }

 // Method untuk menyimpan data baru
 public function store(Request $request)
 {
     // Validasi input
     $data = $request->validate([
         'nama' => 'required',
         'parent' => 'required',
         'urut' => 'required',
         'link' => 'required',
         'aktif' => 'required',
         'tipe' => 'required'
     ]);

    

     // Simpan data ke database menggunakan model
     Menu::create($data);

     // Redirect kembali ke halaman index dengan pesan sukses
     return redirect()->route('menu.index')->with('success', 'Data berhasil ditambahkan');
 }

 // Method untuk menampilkan form edit data
 public function edit($id)
 {
     $title = 'Form Edit Data';
     $data = menu::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
     return view('menu.edit', ['title' => $title, 'data' => $data]);
 }

 // Method untuk mengupdate data
 public function update(Request $request, $id)
 {
     // Validasi input
     $data = $request->validate([
        'nama' => 'required',
        'parent' => 'required',
        'urut' => 'required',
        'link' => 'required',
        'aktif' => 'required',
        'tipe' => 'required'
     ]);

     // Temukan data berdasarkan ID dan update
     $identitas = menu::findOrFail($id);
     $identitas->update($data);

     // Redirect setelah update
     return redirect()->route('menu.index')->with('success', 'Data berhasil diubah');
 }

 public function destroy($id)
 {
     $data = menu::find($id);
 
     if (!$data) {
         return redirect()->route('menu.index')->with(['error' => 'Data tidak ditemukan!']);
     }
 
     // Contoh validasi tambahan sebelum menghapus
     if ($data->status == 'protected') {
         return redirect()->route('menu.index')->with(['error' => 'Data ini tidak bisa dihapus!']);
     }
 
     $data->delete();
     return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Dihapus!']);
 }
 
}
