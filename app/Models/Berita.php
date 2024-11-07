<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'berita';
    protected $fillable = ['judul','isi_berita','penulis_id','kategori_id','tag_id','slug','headline','publik','gambar','hit'];
    public $timestamps = false;
}
