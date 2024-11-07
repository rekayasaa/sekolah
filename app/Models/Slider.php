<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'slider';
    protected $fillable = ['judul','keterangan','gambar'];
    public $timestamps = false;
}
