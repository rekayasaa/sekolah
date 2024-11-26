<?php

namespace App\Http\Controllers;

use \App\Models\Menu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class MenuController extends Controller
{
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        $menu = Menu::latest()
        ->orderBy('id','desc')
        ->get();

        $option = [
            'title' => 'Modul Menu',
            'modul' => 'Menu',
            'active' => 'Daftar Menu'
        ];
        return view('menu.menu', ['option'=>$option, 'data_menu'=>$menu]);
    }
 // Method untuk menampilkan form tambah data
 public function tambah()
 {
    $option = [
        'title' => 'Modul Menu',
        'modul' => 'Menu',
        'active' => 'Tambah Menu'
    ];

     return view('menu.tambah', ['option' => $option]);
 }

 // Method untuk menyimpan data baru
 public function store(Request $request)
 {
     // Validasi input
     $data = $request->validate([
         'nama' => 'required',
         'parent' => 'required',
         'urut' => 'required',
         'link' => 'required'
     ],
     [
        'nama.required' => 'Nama tidak boleh kosong',
        'parent.required' => 'Parent  tidak boleh kosong',
        'urut.required' => 'urut tidak boleh kosong',
        'link.required' => 'link tidak boleh kosong',
    ]
    );
    $data['aktif'] = isset($request->aktif) ? $request->aktif : 'N';
        $data['tipe'] = isset($request->tipe) ? $request->tipe : '2';

    

     // Simpan data ke database menggunakan model
     Menu::create($data);
     Alert::success('Sukses', 'Data berhasil ditambahkan');

     // Redirect kembali ke halaman index dengan pesan sukses
     return redirect()->route('menu.index');
    }

 // Method untuk menampilkan form edit data
 public function edit($id)
 {
    $data = Menu::findOrFail($id); // Menggunakan findOrFail untuk kemudahan
   
    $option = [
        'title' => 'Modul Menu',
        'modul' => 'Menu',
        'active' => 'Edit Menu',
    ];
     return view('menu.edit', ['option' => $option,  'data' => $data]);
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
     ]);

     $data['aktif'] = isset($request->aktif) ? $request->aktif : 'N';
        $data['tipe'] = isset($request->tipe) ? $request->tipe : '2';

        menu::where('id', $id)->update($data);
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('menu.index');
 }

 public function destroy($id)
 {
     $data = menu::findOrFail($id);
     $data->delete();
     alert()->success('Hore!', 'Data berhasil dihapus');
     return redirect()->route('menu.index');
 }
 
}
