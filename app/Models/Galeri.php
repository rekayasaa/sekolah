<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'galeri';
    protected $fillable = ['album_id','judul','slug','gambar','keterangan'];
    public $timestamps = false;
}
