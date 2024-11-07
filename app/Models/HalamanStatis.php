<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HalamanStatis extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'halaman_statis';
    protected $fillable = ['judul','isi_halaman','gambar'];
    public $timestamps = false;
}
