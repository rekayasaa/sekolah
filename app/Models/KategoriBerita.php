<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'kategori_berita';
    protected $fillable = ['nama','slug','aktif'];
    public $timestamps = false;
}
